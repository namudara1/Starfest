<?php
    include_once "../config/connection.php";
    session_start();
    $sql_getusertype = mysqli_query($con,"SELECT type FROM user WHERE id = '".$_SESSION['user_id']."' ");
    $usertype=mysqli_fetch_assoc($sql_getusertype);
    $sql_getusername = mysqli_query($con,"SELECT firstname from event_organizer where id = '".$_SESSION['user_id']."' ");
    $getname = mysqli_fetch_assoc($sql_getusername);
    $sql_getspname = mysqli_query($con,"SELECT firstname from service_provider where id = '".$_SESSION['spid']."' ");
    $getspname = mysqli_fetch_assoc($sql_getspname);
    mysqli_query($con,"INSERT INTO message (reciever_userid, sender_userid, message, status) values('".$_SESSION['spid']."', '".$_SESSION['user_id']."', null, '0') ");
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
        if($checkuser['userid'] == $_SESSION['spid']){
            $flagr = 1;
        }
    }
    if($flags == 0){
        mysqli_query($con,"INSERT INTO chat_users (userid, username, current_session) values('".$_SESSION['user_id']."', '".$getname['firstname']."', '".$_SESSION['spid']."') ");
    }
    else{
        mysqli_query($con,"UPDATE chat_users SET current_session = '".$_SESSION['spid']."' WHERE userid = '".$_SESSION['user_id']."' ");
    }
    // echo $getname['firstname'];
    if($flagr == 0)
        mysqli_query($con,"INSERT INTO chat_users (userid, username, current_session) values('".$_SESSION['spid']."', '".$getspname['firstname']."', '".$_SESSION['user_id']."') ");
    header('Location: ../message/index.php');
?>