<?php require_once('connection.php'); ?>
<?php
    session_start();
?>

<?php 

   

  // echo "payment successfull";
//    $amoun = mysqli_real_escape_string($connection,$_POST['amount']);
//    echo $amoun;
   
//    $amount = 1223;
//    $event_id = 7;
//    $eo_id = 41;
//    $ep_id = 4;

//     $host = "localhost";
//     $dbusername = "root";
//     $dbpassword = "";
//     $dbname = "starfest";
//     // Create connection
    // $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
    
    
    // if (mysqli_connect_error()){
    // die('Connect Error ('. mysqli_connect_errno() .') '
    // . mysqli_connect_error());
    // }
    // else{
    // $sql = "INSERT INTO payment (amount, event_id, eo_id, ep_id)
    // values ('$amount','$event_id','$eo_id','$ep_id')";
    // if ($connection->query($sql)){
    // echo "New record is inserted sucessfully";
    // }
    // else{
    // echo "Error: ". $sql ."
    // ". $connection->error;
    // }
    // $connection->close();
    // }
    
    // header('Location: success.php');
?>

<?php mysqli_close($connection); ?>

