<?php
session_start();
include_once "../../config/connection.php";
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $sql_deletereq=mysqli_query($con,"UPDATE event_request SET status= 'declined' WHERE id='".$id."' ");
    echo 1;
    exit();
}else {
    header("Location: ../../newhomw/index.php");
}