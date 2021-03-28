<?php
session_start();
//echo "<pre>", print_r($_FILES['pro']['name']),"</pre>";

$id = $_GET['id'];
$host='localhost';
$username='root';
$password='';
$dbname = "starfest";
$conn=mysqli_connect($host,$username,$password,$dbname);


if (mysqli_connect_error()){
    die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
    }
    else{
    
    
    
    
    $sql = "INSERT INTO event_register (event_id)
    values ('$id')";
    
    
    
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
    
   
    ?>