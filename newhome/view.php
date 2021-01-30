<?php
$event_id=$_GET['id'];
require_once 'publicevent_db.php';
// Connect to MySQL

// $sql = "SELECT * FROM event ORDER BY date DESC";
$sql = "SELECT * FROM event where event_id='$event_id'";
$result = $conn->query($sql);
 
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

<style>
#logo{ 
	position:fixed; 
	top:0; 
	left:0; 
} 
</style>

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
      <li class="active"><a href="index.html">Home</a></li>
      <li><a class="drop" href="#">Event Categories</a>
        <ul>
          <li><a href="pages/gallery.html">Musical Shows</a></li>
          <li><a href="pages/full-width.html">Cooperate Events</a></li>
          <li><a href="pages/sidebar-left.html">Seminars</a></li>
          <li><a href="pages/sidebar-right.html">Others</a></li>
         
        </ul>
      </li>
      
      <li><a href="#">Contact Us</a></li>
      
      <li><a href="../signup/user_selection/index.php" >Signup</a></li>
      <li><a href="../login/index.php">Login</a></li>
      
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
    <div class="sectiontitle">
      <h6 class="heading">Public events </h6>
      
    </div>

<table>

<ul class="nospace group">
      
<?php 
$i=0;
while($row=mysqli_fetch_assoc($result)){

if($i == 0){

echo"<tr>";

}
?>



<td>
<li class="one_third">
  <h6></h6>
</li>
      <li class="one_third">
      <article>
          <!-- <figure><a href="#"><img src='<?php echo $image_src;  ?>' ></a> -->
          <h6 class="logoname" ><?php echo $row["event_name"]; ?></h6>
          <?php echo "<li><img src='../create_event/upload/{$row['image']}' alt='{$row['event_name']}' class='gallery'></li>"; ?>

           
          <p ><?php echo $row["description"]; ?> </p>
              
           
            <!-- <ul class="nospace meta">
              <li><i class="fas fa-user"></i> <a href="#">Admin</a></li>
              <li><i class="fas fa-tags"></i> <a href="#">Tag 1</a>, <a href="#">Tag 2</a></li>
            </ul> -->
            <p >DATE-<?php echo $row["date"]; ?> </p>
            
            <p >TIME-<?php echo $row["time"]; ?> </p>
            <p>VENUE-<?php echo $row["venue"]; ?> </p>
            <p>CATEGORY-<?php echo $row["category"]; ?> </p>
            <p>PARTICIPANT AMOUNT-<?php echo $row["participant_amt"]; ?> </p>
            <a class="btn" href="#">Register</a>
          </div>
          </article> 
      </li>
      
          </td> 
          <?php
if($i == 0){
echo "</tr>";

}
$i++;
}

?>




</ul>
</table>




<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
  
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="one_third first">
      <h1 class="logoname"><span>STAR</span>FEST</h1>
      <p class="btmspace-30"> Plan your day with us and register for public events and enjoy your life[<a href="#">&hellip;</a>]</p>
      
    </div>
    <div class="one_third">
      <h6 class="heading">Register with public events</h6>
      <ul class="nospace linklist">
        <li><a href="#">Musical shows</a></li>
        <li><a href="#">Cooperate events</a></li>
        <li><a href="#">Seminars</a></li>
        <li><a href="#">Others</a></li>
      </ul>
    </div>
    <div class="one_third">
      <h6 class="heading">Contact Us</h6>
      <p class="nospace btmspace-15"></p>
      <form method="post" action="contact_db.php">
        <fieldset>
          <legend>Newsletter:</legend>
          <input class="btmspace-15" type="text" value="email" name="email" placeholder="Email">
          <input class="btmspace-15" type="text" value="message" name="message" placeholder="Message">
          <button type="submit" value="submit">Submit</button>
        </fieldset>
      </form>
    </div>

    <!-- ################################################################################################ -->
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