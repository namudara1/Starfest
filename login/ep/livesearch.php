<?php
 
  header('Content-Type: text/xml');
  echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';
  echo '<response>';

  $name = $_GET['q'];

  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = '';
  $dbname = 'starfest';

  $connection = mysqli_connect('localhost', 'root', '', 'starfest');

  if(mysqli_connect_error()){
      die('Database connection faild' . $connection->connect_error);
  } 
  if($name == ''){
    echo (" ");
  }
  
  else {

      //lookup all links from the xml file if length of q>0

      $sql = "SELECT event_name,event_id FROM event WHERE event_name LIKE '$name%'";
      // $sql = "SELECT firstname,sp_id FROM event WHERE firstname LIKE '$name%'";
      $result = $connection->query($sql);

      if ($result->num_rows > 0) {

        // output data of each row
        if($result->num_rows == 1){
          $row = $result->fetch_assoc();
          echo "<a href='view.php?search_event_id={$row["event_id"]}'>".$row["event_name"]."</a>";
        }
        while($row = $result->fetch_assoc()) {
          echo "<a href='view.php?search_event_id={$row["event_id"]}'>".$row["event_name"]."</a>";
          echo "<br>";
        }
      }
      else{
        echo "No Suggetions.";
      }
    }

  echo '</response>';
  $connection->close();
?>