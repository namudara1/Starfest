<?php
  session_start();
 include_once "../../config/connection.php";

 require_once 'publicevent_db.php';
 // Connect to MySQL
 
 $id=$_SESSION['user_id'];
 
 $sql = "SELECT e.event_id,e.event_name,s.firstname,s.lastname,er.sp_userid,er.eo_userid FROM event_request er 
         join event e on er.event_id=e.event_id 
         join service_provider s on er.sp_userid=s.id 
         where er.status='accepted' && er.sp_userid=$id";
 
 
 
 $result = mysqli_query($conn,$sql) ;
 


 $not_count = 0;
?>
<!DOCTYPE html>
<html>
<head>
<title>Service Provider Dashbord</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/style.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
</style>
<script src="../js/jquery-3.2.1.min.js"></script>
<script>
        $(document).ready(function(){
              $('.reqitem').on('click', '#request-decline', function(){
                const id = $(this).attr('event-id');
                
                $.post("deny.php", 
                      {
                          id: id
                      },
                      (data)  => {
                         if(data){
                             $(this).closest("div.reqitem").hide();
                         }
                      }
                );
            });

            $('.reqitem').on('click', '#request-accept', function(){
                const id = $(this).attr('event-id');
                
                $.post("accept.php", 
                      {
                          id: id
                      },
                      (data)  => {
                         if(data){
                          $(this).closest("div.reqitem").hide();
                         }
                      }
                );
            });
        });
    </script>

</head>
<body class="w3-theme-l5">

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
          $sql_getuser=mysqli_query($con,"SELECT * FROM service_provider WHERE id = '".$_SESSION['user_id']."'");
          if(mysqli_num_rows($sql_getuser)>0){
            while($result1=mysqli_fetch_assoc($sql_getuser)){
              echo '<p><i class="fa fa-user fa-fw w3-margin-right w3-text-theme"></i>'.$result1["firstname"].' '.$result1["lastname"].'</p>';
              echo '<p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i>Event Participant</p>';
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
          </div>
          <button onclick="myFunction('Demo2')" class="w3-button w3-button-border w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> My Events</button>
          <div id="Demo2" class="w3-hide w3-container">
            <p>Some other text..</p>
          </div> -->
          <button onclick="myFunction('Demo3')" class="w3-button w3-button-border w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> My Photos</button>
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
          </div>
          <a href="../../fileupload/index.php" style="text-decoration: none;">
          <button class="w3-button w3-button-border w3-block w3-theme-l1 w3-left-align"><i class="fa fa-file fa-fw w3-margin-right"></i>My Files</button>
        </a>
        <a href="../../message/index.php" style="text-decoration: none;">
          <button class="w3-button w3-button-border w3-block w3-theme-l1 w3-left-align"><i class="fa fa-whatsapp fa-fw w3-margin-right"></i>Messages</button>
        </a>
        <a href="report/index.php" style="text-decoration: none;">
          <button class="w3-button w3-button-border w3-block w3-theme-l1 w3-left-align"><i class="fa fa-line-chart fa-fw w3-margin-right"></i>Reports</button>
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
            <h1>Manage Events</h1>
                    <p>Simply manage events that are connected</p>
                    <a href="../create_event/index.php" class="btn" >Events Connected</a>
            </header>
            </div>
          </div>
        </div>
      </div>

      <!-- <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
            <header class="showcase" style="background:url(../../img/restaurant-3597677_1920.jpg);">
            <h1>Browse Service Providers</h1>
                    <p>Simply learn how to create and manage your event with us</p>
                    <a href="#" class="btn" >Manage Service Providers</a>
            </header>
            </div>
          </div>
        </div>
      </div> -->
      
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
          <p>Upcoming Events:</p>
          <img src="../../img/forest.jpg" alt="Forest" style="width:100%;">



          <?php 
$i=0;
if($result){
while($row=mysqli_fetch_assoc($result)){

?> 

   
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
            <li class="one_third"> 
 <figure>
     <figcaption>
       <h6 class="heading"><?php echo $row["event_name"]; ?></h6>

       <a href="event_details.php?data1=<?php echo $row["event_id"]?> ?>"><button type="button"> Event details</button></a><br><br>

           
     </figcaption>
   </figure>
   </li>
                              
                                <br><br><br>
                             
               
           
        </div>
    </div>

    <?php


if($i% 1== 1){


}
$i++;
}
}
else{
  echo "no upcoming events";
}
?>
         
        </div>
      </div>
      <br>
      
 
      
      <!-- <div class="w3-card w3-round w3-white w3-padding-16 w3-center">
        <p>ADS</p>
      </div>
      <br>
      
      <div class="w3-card w3-round w3-white w3-padding-32 w3-center">
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

</body>
</html> 
