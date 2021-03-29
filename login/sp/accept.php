<?php
session_start();
include_once "../../config/connection.php";
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $sql_deletereq=mysqli_query($con,"UPDATE event_request SET status= 'accepted' WHERE id='".$id."' ");

    $sql_deletereq=mysqli_query($con,"SELECT * from event_request WHERE id='".$id."' ");
    $sql_eouser = $sql_deletereq->fetch_assoc();
    $sql_getusername = mysqli_query($con,"SELECT firstname from event_organizer where id = '".$sql_eouser['eo_userid']."' ");
    $getname = mysqli_fetch_assoc($sql_getusername);
    $sql_getspname = mysqli_query($con,"SELECT firstname from service_provider where id = '".$_SESSION['user_id']."' ");
    $getspname = mysqli_fetch_assoc($sql_getspname);
    //Chat
    mysqli_query($con,"INSERT INTO message (reciever_userid, sender_userid, message, status) values('".$sql_eouser['eo_userid']."', '".$_SESSION['user_id']."', null, '0') ");
    $sql_checkuser = mysqli_query($con,"SELECT * from chat_users");
    $flags = 0;
    while ($checkuser = $sql_checkuser->fetch_assoc())
    {
        if($checkuser['userid'] == $_SESSION['user_id']){
            $flags = 1;
        }
    }
    $flagr = 0;
    while ($checkuser = $sql_checkuser->fetch_assoc())
    {
        if($checkuser['userid'] == $sql_eouser['eo_userid']){
            $flagr = 1;
        }
    }
    if($flags == 0){
        mysqli_query($con,"INSERT INTO chat_users (userid, username, current_session) values('".$_SESSION['user_id']."', '".$getspname['firstname']."', '".$sql_eouser['eo_userid']."') ");
    }
    else{
        mysqli_query($con,"UPDATE chat_users SET current_session = '".$sql_eouser['eo_userid']."' WHERE userid = '".$_SESSION['user_id']."' ");
    }
    if($flagr == 0){
        mysqli_query($con,"INSERT INTO chat_users (userid, username, current_session) values('".$sql_eouser['eo_userid']."', '".$getname['firstname']."', '".$_SESSION['user_id']."') ");
    }
    else{
        mysqli_query($con,"UPDATE chat_users SET current_session = '".$_SESSION['user_id']."' WHERE userid = '".$sql_eouser['eo_userid']."' ");
    }

    //Documents
    mysqli_query($con,"INSERT INTO document (sender_userid, reciever_userid, file_path, file_name, type, file_size, file_desc, status) values('".$sql_eouser['eo_userid']."', '".$_SESSION['user_id']."', null, null, null, null, null, '0') ");
    $sql_checkuser = mysqli_query($con,"SELECT * from doc_users");
    $flags = 0;
    while ($checkuser = $sql_checkuser->fetch_assoc())
    {
        if($checkuser['userid'] == $_SESSION['user_id']){
            $flags = 1;
        }
    }
    $flagr = 0;
    while ($checkuser = $sql_checkuser->fetch_assoc())
    {
        if($checkuser['userid'] == $sql_eouser['eo_userid']){
            $flagr = 1;
        }
    }
    if($flags == 0){
        mysqli_query($con,"INSERT INTO doc_users (userid, username, current_session) values('".$_SESSION['user_id']."', '".$getspname['firstname']."', '".$sql_eouser['eo_userid']."') ");
    }
    else{
        mysqli_query($con,"UPDATE doc_users SET current_session = '".$sql_eouser['eo_userid']."' WHERE userid = '".$_SESSION['user_id']."' ");
    }
    if($flagr == 0){
        mysqli_query($con,"INSERT INTO doc_users (userid, username, current_session) values('".$sql_eouser['eo_userid']."', '".$getname['firstname']."', '".$_SESSION['user_id']."') ");
    }
    else{
        mysqli_query($con,"UPDATE doc_users SET current_session = '".$_SESSION['user_id']."' WHERE userid = '".$sql_eouser['eo_userid']."' ");
    }

    echo 1;
    exit();
}else {
    header("Location: ../../newhomw/index.php");
}