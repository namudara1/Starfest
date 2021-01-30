<?php

//session_start();

require_once 'publicevent_db.php';
// Connect to MySQL

// $sql = "SELECT * FROM event ORDER BY date DESC";
$sql = "SELECT * FROM event where eo_id='42' ORDER BY date desc ";

$result = mysqli_query($conn1,$sql) ;
//$row1 = mysqli_fetch_array($result);


//$image1 = $row1['image'];
 //$image_src = "../create_event/upload/".$image1;






?>




<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/style.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
</style>
<body class="w3-theme-l5">


<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">My Events</h4>
         
         <hr>
         <?php 
$i=0;
while($row=mysqli_fetch_assoc($result)){


if($i%3 == 0){

// echo "<li class=\"one_third first\">";
//echo"<li class=\"one_third \">";

}
?> 

<li class="one_third">
   <figure>
     <figcaption>
       <h6 class="heading"><?php echo $row["event_name"]; ?></h6>
       



       <!-- <button onclick="myFunction('Demo1')"  name="subject" type="submit" value="<?php echo $row["event_name"]; ?>" class="w3-button w3-button-border w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> To-do list</button> -->
       <!-- <button onclick="myFunction('Demo1')"  name="subject" type="submit" value="fav_HTML">HTML</button> -->

       <?php
       
        // $message1 = $row["event_id"];;
        // $_SESSION['firstMessage'] = $message1;
       
       
      //  $event=$row["event_id"];?>


       <a href="index2.php?data1=<?php echo $row["event_id"]?> & data2=<?php echo $row["category"]?>"> Todo Items</a>



       <?php 
       
      //  $events= array();


      //  $p=0;
      
      //  $events[$p]=$event;
      //  $p=$p+1;

       
       ?>
     
      
     </figcaption>
   </figure>
 </li>
 

 <?php


if($i%3 == 3){


}
$i++;
}

?>

        </div>
      </div>
      <br>
      

     

      <!-- Accordion -->

     



    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <!-- <a name="middle"></a>   -->
    <div id="Demo1" class="w3-col m8">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
          
            <header class="showcase">

            <?php echo $row["event_name"]; ?>


         
            
        
            </header>
            </div>
          </div>
        </div>
      </div>

     
      
    <!-- End Middle Column -->
    </div>
    
   
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

  -->
<script>
// Accordion
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-theme-d1";
  } else { 
    x.className = x.className.replace("w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-theme-d1", "");
  }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

</body>
</html> 
