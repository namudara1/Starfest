<?php

session_start();
//echo "<pre>", print_r($_FILES['pro']['name']),"</pre>";

$email = filter_input(INPUT_POST, 'email');
$message = filter_input(INPUT_POST, 'message');

// echo "<pre>", print_r($_FILES),"</pre>";
// echo "<pre>", print_r($_FILES['pro']),"</pre>";


// die();



if (!empty($email)){

    echo "aaa";
    
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




$sql = "INSERT INTO contact (email,message)
values ('$email','$message')";



if ($conn->query($sql)){

header('location:index.php'); 

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