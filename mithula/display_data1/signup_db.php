<?php

$sp_id = $_GET['data1'];
$eo_id = $_GET['data2'];
$count = filter_input(INPUT_POST, 'rating__plan');


if (!empty($sp_id)){
if (!empty($count)){
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "starfest";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);


if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
    $sql = "INSERT INTO rating(sp_id, eo_id, star_count) VALUES ('$sp_id','$eo_id','$count')";
    

if ($conn->query($sql)){
echo "<script> alert('Thank you for your rating')</script>";
echo"<script>window.open('index.php?','_self')</script>";
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
else{
echo "count should not be empty";
die();
}
}

?>