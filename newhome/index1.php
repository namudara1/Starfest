<?php
require_once 'publicevent_db.php';
// Connect to MySQL

// $sql = "SELECT * FROM event ORDER BY date DESC";
$sql = "SELECT * FROM event where type='public' ORDER BY date desc limit 6";

$result = mysqli_query($conn,$sql) ;
//$row1 = mysqli_fetch_array($result);


//$image1 = $row1['image'];
 //$image_src = "../create_event/upload/".$image1;



?>



<!DOCTYPE html>
<!--
Template Name: Surogou
Author: <a href="https://www.os-templates.com/">OS Templates</a>
Author URI: https://www.os-templates.com/
Copyright: OS-Templates.com
Licence: Free to use under our free template licence terms
Licence URI: https://www.os-templates.com/template-terms
-->
<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<head>
<title>Surogou</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

<style>
#logo{ 
	position:fixed; 
	top:0; 
	left:0; 
} 
</style>

</head>
<body id="top">
  <div id="logo"> 
    <img src="logo.jpg" width="50" height="50"> 
  </div> 
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    
    <!-- ################################################################################################ -->
    <div class="fl_left">
      <ul class="nospace">
        <li><a href="index.html"><i class="fas fa-home fa-lg"></i></a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Contact</a></li>
        
      </ul>
    </div>
    <div class="fl_right">
      <ul class="nospace">
        
        <li><i class="fas fa-envelope rgtspace-5"></i> Starfest@domain.com</li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
  
  <nav id="mainav" class="hoc clear"> 
  
    <!-- ################################################################################################ -->
    <ul class="clear">
      <li class="active"><a href="index.html">Home</a></li>
      <li><a class="drop" href="#">Event Categories</a>
        <ul>
          <li><a href="pages/gallery.html">Musical Shows</a></li>
          <li><a href="pages/full-width.html">Cooperate Events</a></li>
          <li><a href="pages/sidebar-left.html">Seminars</a></li>
          <li><a href="pages/sidebar-right.html">Others</a></li>
         
        </ul>
      </li>
      <li><a href="#">Services</a></li>
      <li><a href="#">Photos</a></li>
      
      <li><a class="drop" >Signup</a>
        <ul>
          <li><a class="drop" href="#">Event Organizer</a>
            <ul>
              <li><a href="#">Organize your event with STARFEST</a></li>  
            </ul>
          </li>

          <li><a class="drop" href="#">Service Provider</a>
            <ul>
              <li><a href="#">Register as a service provider</a></li>  
            </ul>
          </li>

          <li><a class="drop" href="#">Event Participant</a>
            <ul>
              <li><a href="#">Register for an event at STARFEST</a></li>  
            </ul>
          </li>
          
        </ul>
      </li>
      <li><a class="drop">Login</a>
        <ul>
          <li><a href="pages/gallery.html">Event Organizer</a></li>
          <li><a href="pages/full-width.html">Service Provider</a></li>
          <li><a href="pages/sidebar-left.html">Event Participant</a></li>
          
         
        </ul>
      </li>
      
    </ul>
    <!-- ################################################################################################ -->
  </nav>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <section id="latest" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <h6 class="heading">Public Events</h6>
      <p>yayyyyyyy</p>
    </div>




    <ul class="nospace group overview">

   
      
     <?php 
$i=0;
while($row=mysqli_fetch_assoc($result)){

if($i%3 == 0){

    // echo "<li class=\"one_third first\">";
//echo"<li class=\"one_third \">";

}
?> 

<li class="one_third">
        <figure><a href="#">  <?php echo "<li><img src='../create_event/upload/{$row['image']}' alt='{$row['event_name']}' class='gallery'></li>"; ?>
</a>
          <figcaption>
            <h6 class="heading"><?php echo $row["event_name"]; ?></h6>
            <p><?php echo $row["description"]; ?></p>
          </figcaption>
        </figure>
      </li>
      

      <?php


if($i%3 == 3){


}
$i++;
}

?>


    </ul>





    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->


</body>
</html>