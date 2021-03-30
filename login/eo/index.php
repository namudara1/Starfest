<?php
  session_start();
 include_once "../../config/connection.php";
 $not_count = 0;


//session_start();

require_once 'publicevent_db.php';
// Connect to MySQL

// $sql = "SELECT * FROM event ORDER BY date DESC";
$id=$_SESSION['user_id'];
//$pe="Select eo_id from event_organizer where id='$id'";
$data3 = mysqli_query($conn1,"Select eo_id from event_organizer where id='$id'");
$row = mysqli_fetch_assoc($data3);
$eo_id1 = $row['eo_id'];


$sql = "SELECT * FROM event where eo_id=$eo_id1 ORDER BY date  ";


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
<body class="dashboard-theme-l5">
<?php if(isset($_SESSION['user_id']) && $_SESSION['user_id']) { ?> 

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
        $sql_getuser=mysqli_query($con,"SELECT * FROM event_organizer WHERE id = '".$_SESSION['user_id']."'");
        if(mysqli_num_rows($sql_getuser)>0){
          while($result1=mysqli_fetch_assoc($sql_getuser)){
            echo '<p><i class="fa fa-user fa-fw dashboard-margin-right dashboard-text-theme"></i>'.$result1["firstname"].' '.$result1["lastname"].'</p>';
            echo '<p><i class="fa fa-pencil fa-fw dashboard-margin-right dashboard-text-theme"></i>Event Organizer</p>';
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
          
          <!-- <a href="../../fileupload/index.php" style="text-decoration: none;">
          <button class="dashboard-button dashboard-button-border dashboard-block dashboard-theme-l1 dashboard-left-align"><i class="fa fa-file fa-fw dashboard-margin-right"></i>My Files</button>
        </a> -->
        <a href="../../message/index.php" style="text-decoration: none;">
          <button class="dashboard-button dashboard-button-border dashboard-block dashboard-theme-l1 dashboard-left-align"><i class="fa fa-whatsapp fa-fw dashboard-margin-right"></i>Messages</button>
        </a>
        <!-- <a href="../../fileupload/index.php" style="text-decoration: none;">
          <button class="dashboard-button dashboard-button-border dashboard-block dashboard-theme-l1 dashboard-left-align"><i class="fa fa-line-chart fa-fw dashboard-margin-right"></i>Reports</button>
        </a> -->
        </div>      
      </div>
      <br>
      
      
    </div>
    
    <!-- Middle Column -->
    <div class="dashboard-col m7">
    
      <div class="dashboard-row-padding">
        <div class="dashboard-col m12">
          <div class="dashboard-card dashboard-round dashboard-white">
            <div class="dashboard-container dashboard-padding">
            <header class="showcase">
            <h1>Organize Your Event</h1>
                    <p>Simply learn how to create and manage your event with us</p>
                    <a href="../../create_event/index.php" class="btn" >Create Event</a>
            </header>
            </div>
          </div>
        </div>
      </div>

      <div class="dashboard-row-padding">
        <div class="dashboard-col m12">
          <div class="dashboard-card dashboard-round dashboard-white">
            <div class="dashboard-container dashboard-padding">
            <header class="showcase" style="background:url(../../img/restaurant-3597677_1920.jpg);">
            <h1>Browse Service Providers</h1>
                    <p>Browse for service providers under any service category</p>
                    <a href="../../service_pro/index.php" class="btn" >Manage Service Providers</a>
            </header>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    
    <!-- Right Column -->
    <div class="dashboard-col m2">
      <div class="dashboard-card dashboard-round dashboard-white dashboard-center">
        <div class="dashboard-container">
          <p>My Events:</p>
          
          <img src="../../img/forest.jpg" alt="Forest" style="width:100%;">
          
          <?php 

// if (mysqli_fetch_assoc($result2)==NULL){ 
//  echo "No created events yet"; }?>

          <?php 




$i=0;


if($result2){
while ($row=mysqli_fetch_assoc($result2)){

  if(date("Y-m-d") < $row['date']){
  
    



//if($i%3 == 0){

// echo "<li class=\"one_third first\">";
//echo"<li class=\"one_third \">";

//}
?> 

<li class="one_third">
   <figure>
     <figcaption>
       <h6 class="heading"><?php echo $row["event_name"]; ?></h6>
       



       <!-- <button onclick="myFunction('Demo1')"  name="subject" type="submit" value="<?php echo $row["event_name"]; ?>" class="dashboard-button dashboard-button-border dashboard-block dashboard-theme-l1 dashboard-left-align"><i class="fa fa-circle-o-notch fa-fw dashboard-margin-right"></i> To-do list</button> -->
       <!-- <button onclick="myFunction('Demo1')"  name="subject" type="submit" value="fav_HTML">HTML</button> -->

       <?php
       
        // $message1 = $row["event_id"];;
        // $_SESSION['firstMessage'] = $message1;
       
       
      //  $event=$row["event_id"];?>


       <!-- <a href="all_events/index2.php?data1=<?php echo $row["event_id"]?> & data2=<?php echo $row["category"]?>"><button type="button"> Todos</button></a> <br><br> -->

       <a href="event_dashboard.php?data1=<?php echo $row["event_id"]?> & data2=<?php echo $row["type"]?> & data3=<?php echo $row["category"]?>"><button type="button"> More info</button></a><br><br>
      
      <!-- check before add ticket details button -->
      <!-- <?php
      $event_type = "public";
      if($row["type"] == $event_type){
       ?>

        <a href="event/ticket.php?data1=<?php echo $row["event_id"]?> & data2=<?php echo $row["type"]?>"><button type="button">  Ticket Details</button></a><br><br>
      <?php
      }
       ?>

       <a href="../../rating_new/index.php?data1=<?php echo $row["event_id"]?>?>"><button type="button"> Service Providers</button></a><br><br>

       <a href="event/data1.php?data1=<?php echo $row["event_id"]?> & data2=<?php echo $row["type"]?>"><button type="button">  Remove event</button></a><br><br>

        -->

       <!-- <a href="attendees/index2.php?data1=<?php echo $row["event_id"]?> & data2=<?php echo $row["type"]?>"><button type="button"> Attendees</button></a> -->

     
      
     </figcaption>
   </figure>
 </li>
 

 <?php


if($i%3 == 3){


}
$i++;
  }
}
}
else{

  echo "no events created yet";
}
?>


        </div>
      </div>
      <br>
    </div>
            <?php echo $row["event_name"]; ?>

            </div>
          </div>
        </div>
      </div>

    </div>
    
   
    </div>
    
  </div>
  
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
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("dashboard-show") == -1) {
    x.className += " dashboard-show";
  } else { 
    x.className = x.className.replace(" dashboard-show", "");
  }
}
</script>
        </div>
      </div>
      <br>
    </div>
  </div>
</div>
<br>


<script>
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
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("dashboard-show") == -1) {
    x.className += " dashboard-show";
  } else { 
    x.className = x.className.replace(" dashboard-show", "");
  }
}
</script>
<?php } ?>
</body>
</html> 
