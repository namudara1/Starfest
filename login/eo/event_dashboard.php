<?php
  session_start();
 include_once "../../config/connection.php";
 $not_count = 0;


//session_start();

require_once 'publicevent_db.php';
// Connect to MySQL

// $sql = "SELECT * FROM event ORDER BY date DESC";
$id=$_SESSION['user_id'];


$event_id = $_GET['data1'];
$type = $_GET['data2'];
$category = $_GET['data3'];

//$pe="Select eo_id from event_organizer where id='$id'";
$data3 = mysqli_query($conn1,"Select eo_id from event_organizer where id='$id'");
$row = mysqli_fetch_assoc($data3);
$eo_id1 = $row['eo_id'];


$sql = "SELECT * FROM event where eo_id=$eo_id1 && event_id=$event_id  ";


$result2 = mysqli_query($conn1,$sql) ;




// $row1 = mysqli_fetch_array($result);


//$image1 = $row1['image'];
 //$image_src = "../create_event/upload/".$image1;



?>



<!DOCTYPE html>
<html>
<title>Event Organizer Dashbord</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/style.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/search_bar.css" rel="stylesheet">
<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}

button {
  background-color: grey; /* Green */
  border: none;
  color: white;
  padding: 5px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}




</style>
<body class="w3-theme-l5">
<?php if(isset($_SESSION['user_id']) && $_SESSION['user_id']) { ?> 

<?php include('../common/header.php'); ?>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">My Profile</h4>
         <p class="w3-center"><img src="../../img/avatar3.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <?php  
        $sql_getuser=mysqli_query($con,"SELECT * FROM event_organizer WHERE id = '".$_SESSION['user_id']."'");
        if(mysqli_num_rows($sql_getuser)>0){
          while($result1=mysqli_fetch_assoc($sql_getuser)){
            echo '<p><i class="fa fa-user fa-fw w3-margin-right w3-text-theme"></i>'.$result1["firstname"].' '.$result1["lastname"].'</p>';
            echo '<p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i>Event Organizer</p>';
            echo '<p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i>'.$result1["address"].'</p>';
            echo '<p><i class="fa fa-envelope fa-fw w3-margin-right w3-text-theme"></i>'.$result1["email"].'</p>';
          }
        }
        ?>
         <!-- <p><i class="fa fa-user fa-fw w3-margin-right w3-text-theme"></i> Name</p>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Event Organizer</p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> London, UK</p> -->
         <!-- <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> April 1, 1988</p> -->
        </div>
      </div>
      <br>
      
      <!-- Accordion -->
      <div class="w3-card w3-round">
        <div class="w3-white">
          <!-- <button onclick="myFunction('Demo1')" class="w3-button w3-button-border w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> To-do list</button>
          <div id="Demo1" class="w3-hide w3-container">
            <p>Some text..</p>
          </div>-->
          <!-- <button onclick="myFunction('Demo2')" class="w3-button w3-button-border w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> My Events</button>
          <div id="Demo2" class="w3-hide w3-container">
            <p>Some other text..</p>
          </div>  -->
          <!-- <button onclick="myFunction('Demo3')" class="w3-button w3-button-border w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> My Photos</button>
          <div id="Demo3" class="w3-hide w3-container">
         <div class="w3-row-padding">
         <br>
           <div class="w3-half">
             <img src="../../img/lights.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="../../img/nature.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="../../img/mountains.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="../../img/forest.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="../../img/nature.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="../../img/snow.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
         </div>
          </div> -->
          <a href="../../fileupload/index.php" style="text-decoration: none;">
          <button class="w3-button w3-button-border w3-block w3-theme-l1 w3-left-align"><i class="fa fa-file fa-fw w3-margin-right"></i>My Files</button>
        </a>
        <a href="../../message/index.php" style="text-decoration: none;">
          <button class="w3-button w3-button-border w3-block w3-theme-l1 w3-left-align"><i class="fa fa-whatsapp fa-fw w3-margin-right"></i>Messages</button>
        </a>
        <a href="../../fileupload/index.php" style="text-decoration: none;">
          <button class="w3-button w3-button-border w3-block w3-theme-l1 w3-left-align"><i class="fa fa-line-chart fa-fw w3-margin-right"></i>Reports</button>
        </a>

        <a href="all_events/index2.php?data1=<?php echo $event_id?> & data2=<?php echo $category?>" style="text-decoration: none;">
        <button class="w3-button w3-button-border w3-block w3-theme-l1 w3-left-align"><i class="fa fa-line-chart fa-fw w3-margin-right"></i>Todos </button>
        </a>

        <a href="event/index.php?data1=<?php echo $event_id?> & data2=<?php echo $type?>" style="text-decoration: none;">
        <button class="w3-button w3-button-border w3-block w3-theme-l1 w3-left-align"><i class="fa fa-line-chart fa-fw w3-margin-right"></i>Edit event</button>
        </a>

        <a href="event/ticket.php?data1=<?php echo $event_id?> & data2=<?php echo $type?>" style="text-decoration: none;">
        <button class="w3-button w3-button-border w3-block w3-theme-l1 w3-left-align"><i class="fa fa-line-chart fa-fw w3-margin-right"></i>Ticket details </button>
        </a>

        <a href="../../rating_new/index.php?data1=<?php echo $event_id?>?>" style="text-decoration: none;">
        <button class="w3-button w3-button-border w3-block w3-theme-l1 w3-left-align"><i class="fa fa-line-chart fa-fw w3-margin-right"></i>Service providers </button>
        </a>

        <a href="event/data1.php?data1=<?php echo $event_id?> & data2=<?php echo $type?>" style="text-decoration: none;">
        <button class="w3-button w3-button-border w3-block w3-theme-l1 w3-left-align"><i class="fa fa-line-chart fa-fw w3-margin-right"></i>Remove event </button>
        </a>

        </div>      
      </div>
      <br>
      
      <!-- Interests --> 
      <!-- <div class="w3-card w3-round w3-white w3-hide-small">
        <div class="w3-container">
          <p>Interests</p>
          <p>
            <span class="w3-tag w3-small w3-theme-d5">News</span>
            <span class="w3-tag w3-small w3-theme-d4">W3Schools</span>
            <span class="w3-tag w3-small w3-theme-d3">Labels</span>
            <span class="w3-tag w3-small w3-theme-d2">Games</span>
            <span class="w3-tag w3-small w3-theme-d1">Friends</span>
            <span class="w3-tag w3-small w3-theme">Games</span>
            <span class="w3-tag w3-small w3-theme-l1">Friends</span>
            <span class="w3-tag w3-small w3-theme-l2">Food</span>
            <span class="w3-tag w3-small w3-theme-l3">Design</span>
            <span class="w3-tag w3-small w3-theme-l4">Art</span>
            <span class="w3-tag w3-small w3-theme-l5">Photos</span>
          </p>
        </div>
      </div>
      <br> -->
      
      <!-- Alert Box -->
      <!-- <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Hey!</strong></p>
        <p>People are looking at your profile. Find out who.</p>
      </div> -->
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
            <header class="showcase">
            <h1>Organize Your Event</h1>
                    <p>Simply learn how to create and manage your event with us</p>
                    <!-- <a href="all_events/index2.php?data1=<?php echo $event_id?> & data2=<?php echo $category?>" class ="btn">Todos</a> <br> -->
                    <a href="../../create_event/index.php" class="btn" >Event details</a> <br>
                    <!-- <a href="event/index.php?data1=<?php echo $event_id?> & data2=<?php echo $type?>" class="btn">Edit event</a> <br>
                    <a href="event/ticket.php?data1=<?php echo $event_id?> & data2=<?php echo $type?>" class="btn">Ticket details</a> <br>
                    <a href="accepted_sp.php?data1=<?php echo $event_id?>?>" class="btn">Service providers</a> <br>
                    <a href="event/data1.php?data1=<?php echo $event_id?> & data2=<?php echo $type?>" class="btn">Remove event</a> <br> -->
            </header>
            </div>
          </div>
        </div>
      </div>

      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
            <header class="showcase" style="background:url(../../img/restaurant-3597677_1920.jpg);">
            <h1>Browse Service Providers</h1>
                    <p>Browse for service providers under any service category</p>
                    <a href="../../service_pro/index.php" class="btn" >Manage Service Providers</a>
            </header>
            </div>
          </div>
        </div>
      </div>
      
       <!-- <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <img src="img/avatar2.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
        <span class="w3-right w3-opacity">1 min</span>
        <h4>John Doe</h4><br>
        <hr class="w3-clear">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half">
              <img src="img/lights.jpg" style="width:100%" alt="Northern Lights" class="w3-margin-bottom">
            </div>
            <div class="w3-half">
              <img src="img/nature.jpg" style="width:100%" alt="Nature" class="w3-margin-bottom">
          </div>
        </div>
        <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button> 
        <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button> 
      </div> -->
      
      <!--<div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <img src="img/avatar5.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
        <span class="w3-right w3-opacity">16 min</span>
        <h4>Jane Doe</h4><br>
        <hr class="w3-clear">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button> 
        <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button> 
      </div>  

      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <img src="img/avatar6.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
        <span class="w3-right w3-opacity">32 min</span>
        <h4>Angie Jane</h4><br>
        <hr class="w3-clear">
        <p>Have you seen this?</p>
        <img src="img/nature.jpg" style="width:100%" class="w3-margin-bottom">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button> 
        <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button> 
      </div>  -->
      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m2">
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p>My Event:</p>
          
          <img src="../../img/forest.jpg" alt="Forest" style="width:100%;">
          
          <?php 

// if (mysqli_fetch_assoc($result2)==NULL){ 
//  echo "No created events yet"; }?>

          <?php 



$i=0;


if($result2){
while ($row=mysqli_fetch_assoc($result2)){


//if($i%3 == 0){

// echo "<li class=\"one_third first\">";
//echo"<li class=\"one_third \">";

//}
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


       <!-- <a href="all_events/index2.php?data1=<?php echo $row["event_id"]?> & data2=<?php echo $row["category"]?>"><button type="button"> Todos</button></a> <br><br> -->

       <!-- <a href="event_dashboard.php?data1=<?php echo $row["event_id"]?> & data2=<?php echo $row["type"]?> & data3=<?php echo $row["category"]?>"><button type="button"> More info</button></a><br><br>
       -->
      <!-- check before add ticket details button -->
      <!-- <?php
      $event_type = "public";
      if($row["type"] == $event_type){
       ?>

        <a href="event/ticket.php?data1=<?php echo $row["event_id"]?> & data2=<?php echo $row["type"]?>"><button type="button">  Ticket Details</button></a><br><br>
      <?php
      }
       ?>

       <a href="accepted_sp.php?data1=<?php echo $row["event_id"]?>?>"><button type="button"> Service Providers</button></a><br><br>

       <a href="event/data1.php?data1=<?php echo $row["event_id"]?> & data2=<?php echo $row["type"]?>"><button type="button">  Remove event</button></a><br><br>

        -->

       <!-- <a href="attendees/index2.php?data1=<?php echo $row["event_id"]?> & data2=<?php echo $row["type"]?>"><button type="button"> Attendees</button></a> -->


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
}
else{

  echo "no events created yet";
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
    <!-- <div id="Demo1" class="w3-col m8">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding"> -->
          
            <!-- <header class="showcase">

            <?php echo $row["event_name"]; ?>


         
            
        
            </header> -->
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








        </div>
      </div>
      <br>
      
      <!-- <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Friend Request</p>
          <img src="../../img/avatar6.png" alt="Avatar" style="width:50%"><br>
          <span>Jane Doe</span>
          <div class="w3-row w3-opacity">
            <div class="w3-half">
              <button class="w3-button w3-block w3-green w3-section" title="Accept"><i class="fa fa-check"></i></button>
            </div>
            <div class="w3-half">
              <button class="w3-button w3-block w3-red w3-section" title="Decline"><i class="fa fa-remove"></i></button>
            </div>
          </div>
        </div>
      </div>
      <br> -->
      
      <!-- <div class="w3-card w3-round w3-white w3-padding-16 w3-center">
        <p>ADS</p>
      </div>
      <br> -->
      
      <!-- <div class="w3-card w3-round w3-white w3-padding-32 w3-center">
        <p><i class="fa fa-bug w3-xxlarge"></i></p>
      </div> -->
      
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<!-- <footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>Footer</h5>
</footer>

<footer class="w3-container w3-theme-d5">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>
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
<?php } ?>
<!-- <script  src="livesearch.js"></script> -->
</body>
</html> 
