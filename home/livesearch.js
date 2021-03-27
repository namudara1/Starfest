var xmlHttp = createXmlHttpRequest();
function createXmlHttpRequest(){

    var xmlHttp;

    //IE5 or IE6
    if(window.ActiveXObject){
       try
       {
           xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
       }
       catch(e)
       {
           xmlHttp = false;
       }
    }
    else{
        try
        {
           xmlHttp = new XMLHttpRequest();
        }
        catch(e) 
        {
           xmlHttp = false;
        }
    }

   if(!xmlHttp)
       alert("Error creating XMLRequest object.");
   else
   
       return xmlHttp;
}
    function showResult(str) {
      if (str.length==0) {
        document.getElementById("livesearch").innerHTML="";
        document.getElementById("livesearch").style.border="0px";
        return;
      }
      var xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("livesearch").innerHTML=this.responseText;
          document.getElementById("livesearch").style.border="1px solid #A5ACB2";
        }
      }
      xmlhttp.open("GET","livesearch.php?q="+str,true);
      xmlhttp.send();
    }