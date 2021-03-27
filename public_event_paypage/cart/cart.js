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

    function remove_to_cart(price,eve_id,user_id) {

      var xmlhttp=new XMLHttpRequest();
       //data binding over url parameters
      xmlhttp.open("GET","cart.php?q="+price+"&p="+eve_id+"&r="+user_id,true);
      xmlhttp.send();
    }


    function plus_ticket(price,eve_id,user_id,quanty,amount,id){
        var xmlhttp=new XMLHttpRequest();
        
        quanty = document.getElementById('quantity-'+id).innerHTML;
        amount = document.getElementById('amount-'+id).innerHTML;

         xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          // console.log(this.responseText);
          var response = JSON.parse(this.responseText);
          // console.log(response)
          document.getElementById('quantity-'+id).innerHTML=response.quanty;
          document.getElementById('amount-'+id).innerHTML=response.amount;
        }
      }
        xmlhttp.open("GET","cart.php?l="+price+"&m="+eve_id+"&n="+user_id+"&j="+quanty+"&h="+amount,true);
        xmlhttp.send();
    }


    function minus_ticket(price,eve_id,user_id,quanty,amount,id){
        var xmlhttp=new XMLHttpRequest();
        
        quanty = document.getElementById('quantity-'+id).innerHTML;
        amount = document.getElementById('amount-'+id).innerHTML;

        // jj = price+user_id;
        // alert(typeof(jj));


          xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
           var response = JSON.parse(this.responseText);
          // console.log(response)
          document.getElementById('quantity-'+id).innerHTML=response.quanty;
          document.getElementById('amount-'+id).innerHTML=response.amount;
        }
      }
        xmlhttp.open("GET","cart.php?k="+price+"&kk="+eve_id+"&kkk="+user_id+"&kkkk="+quanty+"&kkkkk="+amount);
        xmlhttp.send();


    }