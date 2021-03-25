<?php

session_start();
include_once "../config/connection.php";
$not_count = 0;
require_once 'publicevent_db.php';
// Connect to MySQL

// $sql = "SELECT * FROM event ORDER BY date DESC";
$sql = "SELECT * FROM event_organizer";

$result2 = mysqli_query($conn,$sql) ;
//$row1 = mysqli_fetch_array($result2);


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
<link rel="stylesheet" href="../login/css/style.css">
<!-- <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css"> -->
<link href="layout/styles/mainwork.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<?php include('../common/header.php'); ?>
<body id="top">

  

    <div class="sectiontitle">
     <b> <h1 class="logoname"><span><b><u>Service providers</u></b></span></h1>

    </div>




<ul class="nospace group overview">

   
      
<?php 
$i=0;
while($row=mysqli_fetch_assoc($result2)){

if($i%3 == 0){

// echo "<li class=\"one_third first\">";
//echo"<li class=\"one_third \">";

}
?> 
<div class="w3-third w3-margin-bottom">
      <ul class="w3-ul w3-border w3-hover-shadow">
        <li class="w3-theme-l2">
       <h3 class="logoname"> <img src="1.png"> <b> <?php echo $row["firstname"]; ?>         <b><?php echo $row["lastname"]; ?></b></h3>
      
        </li>
        <li class="w3-padding-16"><p>Address - <?php echo $row["address"]; ?></p></li>
        <li class="w3-padding-16"><p>Email - <?php echo $row["email"]; ?></p></li>
        <li class="w3-padding-16"><p>Telephone Number - <?php echo $row["telno"]; ?></p></li>
      
      </ul>
    </div>
 <?php


if($i%3 == 3){


}
$i++;
}

?>

</ul>
<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>