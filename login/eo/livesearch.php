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

      $sql = "SELECT firstname,sp_id FROM service_provider WHERE firstname LIKE '$name%'";
      $result = $connection->query($sql);

      if ($result->num_rows > 0) {

        // output data of each row
        if($result->num_rows == 1){
          $row = $result->fetch_assoc();
          echo "<a href='../../spProfile/index.php?id={$row["sp_id"]}'>".$row["firstname"]."</a>";
        }
        while($row = $result->fetch_assoc()) {
          echo "<a href='../../spProfile/index.php?id={$row["sp_id"]}'>".$row["firstname"]."</a>";
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