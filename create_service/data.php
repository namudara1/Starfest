<?php

session_start();
//echo "<pre>", print_r($_FILES['pro']['name']),"</pre>";

$service = filter_input(INPUT_POST, 'service');
$type = filter_input(INPUT_POST, 'type');
$category = filter_input(INPUT_POST, 'category');

if (!empty($service)){
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
    
    $p="Select sp_id from service_provider where id='$id'";
    
    $data1 = mysqli_query($conn,"Select sp_id from service_provider where id='$id'");
    $row = mysqli_fetch_assoc($data1);
    $sp_idd = $row['sp_id'];
    
    // echo $eo_idd;
    
    $sql = "INSERT INTO service(service,type,name, sp_id)
values ('$servce','$type','$category','$sp_idd')";
    
    
    
    if ($conn->query($sql)){
    // echo "New record is inserted sucessfully";
    // echo "user id: {$_SESSION['user_id']}<br>";
    header('Location: ../login/sp/index.php');
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