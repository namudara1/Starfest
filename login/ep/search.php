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
<link href="css/search_bar.css" rel="stylesheet">

</head>
<body id="top">
  
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    
    <!-- ################################################################################################ -->
 

    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
  
 
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->



    <!-- ################################################################################################ -->

    <br><br><br>
    <div class="sectiontitle">
     <b> <h1 class="logoname"><span>PUBLIC EVENTS</span></h1>
      <p>Register with events and enjoy your life</p></b>

     <!-- ****search bar******  -->
     <div class="search_bar">
      <input id="search_input" type="text" placeholder="Search..." class="search" size="30" onkeyup="showResult(this.value)" list="x">
      <datalist id="x" > </datalist> 
    </div>
    <div id="livesearch" class="lives"></div>
    </div>
    <!-- searchbar  -->

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
       <?php echo "<li><img src='../../create_event/upload/{$row['image']}' alt='{$row['event_name']}' class='gallery'></li>"; ?>
</a></p>
        </li>
        <li class="w3-padding-16"><p><?php echo $row["description"]; ?></p></li>
        <li><footer><a class="btn" href="view.php?id=<?=$row['event_id']; ?>">MORE DETAILS</a></footer></li>
      
      </ul>
    </div>
 <?php


if($i%3 == 3){


}
$i++;
}

?>

</ul>







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
<script  src="livesearch.js"></script>
</body>
</html>