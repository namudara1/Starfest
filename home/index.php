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
<title>Starfest</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

<link href="layout/styles/work.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link href="layout/styles/mainwork.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body id="top">
  
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
        <!-- <li><a href="#">Contact</a></li> -->
        
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
      <li class="active"><a href="../home/index.php">Home</a></li>
      <li><a class="drop" href="../public_events/all/index.php">Event Categories</a>
        <ul>
          <li><a href="../public_events/musical_shows/index.php">Musical Shows</a></li>
          <li><a href="../public_events/cooperate_events/index.php">Cooperate Events</a></li>
          <li><a href="../public_events/seminars/index.php">Seminars</a></li>
          <li><a href="../public_events/others/index.php">Others</a></li>
         
        </ul>
      </li>
      
      <li><a href="../contact_uspage/index.php">Contact Us</a></li>
      
      <li><a href="../signup/sign/index.php" >Signup</a></li>
      <li><a href="../login/index.php">Login</a></li>
      <li><a href="../rating/index.php">Rating</a></li>
    </ul>
    <!-- ################################################################################################ -->
  </nav>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper bgded overlay" style="background-image:url('img4.jpg');">
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <article>
      <p>Plan your day with us</p>
      <h3 class="heading">Starfest Event Planning</h3>
      <p>Dreaming after all, is a form of planning</p>
      <footer><a class="btn" href="../login1/index.php">Create Event</a></footer>
    </article>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->



    <!-- ################################################################################################ -->

    <br><br><br>
    <div class="sectiontitle">
     <b> <h1 class="logoname"><span>PUBLIC EVENTS</span></h1>
      <p>Register with events and enjoy your life</p></b>
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
<div class="w3-third w3-margin-bottom">
      <ul class="w3-ul w3-border w3-hover-shadow">
        <li class="w3-theme-l2">
          <p class="w3-xlarge"><a href="view.php?id=<?=$row['event_id']; ?>">
   <h6 class="heading"><?php echo $row["event_name"]; ?></h6>
       <?php echo "<li><img src='../create_event/upload/{$row['image']}' alt='{$row['event_name']}' class='gallery'></li>"; ?>
</a></p>
        </li>
        <li class="w3-padding-16"><p><?php echo $row["description"]; ?></p></li>
        <li><footer><a class="btn" href="view.php?id=<?=$row['event_id']; ?>">Book now</a></footer></li>
      
      </ul>
    </div>
 <?php


if($i%3 == 3){


}
$i++;
}

?>

</ul>




<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="w3-container w3-padding-64 w3-theme-l5" id="contact">
  <div class="w3-row">
    <div class="w3-col m5">
    <h1 class="logoname"><span>STAR</span>FEST</h1>
      <p class="btmspace-30"> Plan your day with us and register for public events and enjoy your life[<a href="#">&hellip;</a>]</p>
    <div class="w3-padding-16"><span class="w3-xlarge w3-border-teal w3-bottombar"></span></div>
      <h3>Address</h3>
      
      <p><i class="fa fa-map-marker w3-text-teal w3-xlarge"></i>  Colombo</p>
      <p><i class="fa fa-phone w3-text-teal w3-xlarge"></i>  +00 2324354657</p>
      <p><i class="fa fa-envelope-o w3-text-teal w3-xlarge"></i>  STARFEST@DOMAIN.com</p>
    </div>
    <div class="w3-col m7">
      <form class="w3-container w3-card-4 w3-padding-16 w3-white" method="POST" action="contact_db.php" >
      
      <div class="w3-section">      
        <label>Email</label>
        <input class="w3-input" type="text" name="email" required>
      </div>
      <div class="w3-section">      
        <label>Message</label>
        <input class="w3-input" type="text" name="message" required>
      </div>  
      <input class="w3-check" type="checkbox" checked name="Like">
      <label>I Like it!</label>
      <button type="submit" class="w3-button w3-right w3-theme" value="submit">Send</button>
      </form>
    </div>
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
  
<footer class="w3-container w3-padding-32 w3-theme-d1 w3-center">
  <h4>Follow Us</h4>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Facebook"><i class="fa fa-facebook"></i></a>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Twitter"><i class="fa fa-twitter"></i></a>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Google +"><i class="fa fa-google-plus"></i></a>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Google +"><i class="fa fa-instagram"></i></a>
  <a class="w3-button w3-large w3-teal w3-hide-small" href="javascript:void(0)" title="Linkedin"><i class="fa fa-linkedin"></i></a>
  <p> <a href="https://www.w3schools.com/w3css/default.asp" target="_blank"></a></p>

  <div style="position:relative;bottom:100px;z-index:1;" class="w3-tooltip w3-right">
    <span class="w3-text w3-padding w3-teal w3-hide-small">Go To Top</span>   
    <a class="w3-button w3-theme" href="#myPage"><span class="w3-xlarge">
    <i class="fa fa-chevron-circle-up"></i></span></a>
  </div>
</footer>


</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>