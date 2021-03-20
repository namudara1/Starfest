<?php

session_start();
//echo "<pre>", print_r($_FILES['pro']['name']),"</pre>";

$event_name = filter_input(INPUT_POST, 'event_name');
$venue = filter_input(INPUT_POST, 'venue');
$date = filter_input(INPUT_POST, 'date');
$time = filter_input(INPUT_POST, 'time');
$type = filter_input(INPUT_POST, 'type');
$category = filter_input(INPUT_POST, 'category');
$participant_amt = filter_input(INPUT_POST, 'participant_amt');
$description = filter_input(INPUT_POST, 'description');
$eo_id = filter_input(INPUT_POST, 'eo_id');
$question = filter_input(INPUT_POST, 'qselection');
$profileImage =$_FILES['pro']['name'];

// echo "<pre>", print_r($_FILES),"</pre>";
// echo "<pre>", print_r($_FILES['pro']),"</pre>";


// die();

$target='upload/'.$profileImage;
move_uploaded_file($_FILES['pro']['tmp_name'],$target);


if (!empty($event_name)){
// if (!empty($venue)){
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

$id= $_SESSION['user_id'];

$p="Select eo_id from event_organizer where id='$id'";
//$result_set= mysqli_query($conn, $p);

$data1 = mysqli_query($conn,"Select eo_id from event_organizer where id='$id'");
$row = mysqli_fetch_assoc($data1);
$eo_idd = $row['eo_id'];

// echo $eo_idd;

$sql = "INSERT INTO event (event_name,category,type,date,time,participant_amt,description, venue,image,question, eo_id)
values ('$event_name','$category','$type','$date','$time','$participant_amt','$description','$venue','$profileImage','$question','$eo_idd')";



if ($conn->query($sql)){
// echo "New record is inserted sucessfully";
// echo "user id: {$_SESSION['user_id']}<br>";
header('Location: ../login/eo/index.php');
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
// }
// else{
// echo "Password should not be empty";
// die();
// }
}
else{
echo "Username should not be empty";
die();
}
?>