<?php
 session_start();
 include_once "../../config/connection.php";


 $not_count = 0;

 require_once 'publicevent_db.php';


 // Connect to MySQL
 
 $id=$_SESSION['user_id'];
 
 $sql = "SELECT e.event_id,e.event_name, e.date FROM issued_ticket_id er 
         join event e on er.event_id=e.event_id 
         join event_participant p on er.user_id=p.id 
         where  p.user_id=$id";
 
 
 
 $result = mysqli_query($conn,$sql) ;
 




?>
<!DOCTYPE html>
<html>
<title>Event Participant Dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/style.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
</style>
<body class="dashboard-theme-l5">

<?php include('../common/header.php'); ?>

<!-- Page Container -->
<div class="dashboard-container dashboard-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="dashboard-row">
    <!-- Left Column -->
    <div class="dashboard-col m3">
      <!-- Profile -->
      <div class="dashboard-card dashboard-round dashboard-white">
        <div class="dashboard-container">
         <h4 class="dashboard-center">My Profile</h4>
         <p class="dashboard-center"><img src="../../img/avatar3.png" class="dashboard-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <?php  
          $sql_getuser=mysqli_query($con,"SELECT * FROM event_participant WHERE id = '".$_SESSION['user_id']."'");
          if(mysqli_num_rows($sql_getuser)>0){
            while($result1=mysqli_fetch_assoc($sql_getuser)){
              echo '<p><i class="fa fa-user fa-fw dashboard-margin-right dashboard-text-theme"></i>'.$result1["firstname"].' '.$result1["lastname"].'</p>';
              echo '<p><i class="fa fa-pencil fa-fw dashboard-margin-right dashboard-text-theme"></i>Event Participant</p>';
              echo '<p><i class="fa fa-home fa-fw dashboard-margin-right dashboard-text-theme"></i>'.$result1["address"].'</p>';
              echo '<p><i class="fa fa-envelope fa-fw dashboard-margin-right dashboard-text-theme"></i>'.$result1["email"].'</p>';
            }
          }
          ?>
        </div>
      </div>
      <br>
      
      <!-- Accordion -->
      <div class="dashboard-card dashboard-round">
        <div class="dashboard-white">
          
        </div>      
      </div>
      <br>
      
     
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="dashboard-col m7">
    
      <div class="dashboard-row-padding">
        <div class="dashboard-col m12">
          <div class="dashboard-card dashboard-round dashboard-white">
            <div class="dashboard-container dashboard-padding">
            <header class="showcase">
            <h1>Find amazing Events</h1>
                    <p>Simply search and register for any events</p>
                    <a href="search.php" class="btn" >Search Events</a>
            </header>
            </div>
          </div>
        </div>
      </div>

    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="dashboard-col m2">
      <div class="dashboard-card dashboard-round dashboard-white dashboard-center">
        <div class="dashboard-container">
          <p>Upcoming Events:</p>
          <img src="../../img/forest.jpg" alt="Forest" style="width:100%;">



          <?php 
$i=0;

if($result){
while($row=mysqli_fetch_assoc($result)){
  if(date("Y-m-d") < $row['date']){
  
   

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


// if($i% 1== 1){


// }
// $i++;
  }
}
}
else{

  echo "No upcoming events";
}

?>
         
        </div>
      </div>
      <br>

    <!-- End Right Column -->
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
  if (x.className.indexOf("dashboard-show") == -1) {
    x.className += " dashboard-show";
    x.previousElementSibling.className += " dashboard-theme-d1";
  } else { 
    x.className = x.className.replace("dashboard-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" dashboard-theme-d1", "");
  }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("dashboard-show") == -1) {
    x.className += " dashboard-show";
  } else { 
    x.className = x.className.replace(" dashboard-show", "");
  }
}
</script>

</body>
</html> 
