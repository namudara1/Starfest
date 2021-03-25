<?php
    include_once "../config/connection.php";
    session_start();
    $sql_getusertype = mysqli_query($con,"SELECT type FROM user WHERE id = '".$_SESSION['user_id']."' ");
    $usertype=mysqli_fetch_assoc($sql_getusertype);
    $sql_getusername = mysqli_query($con,"SELECT firstname from '".$usertype["type"]."' where id = '".$_SESSION['user_id']."' ");
    $getname = mysqli_fetch_assoc($sql_getusername);
    mysqli_query($con,"INSERT INTO message (reciever_userid, sender_userid, message, status) values('".$_SESSION['spid']."', '".$_SESSION['user_id']."', null, '1') ");
    $sql_checkuser = mysqli_query($con,"SELECT userid from chat_users");
    // $checkuser = mysqli_fetch_assoc($sql_checkuser);
    $flags = 0;
    while ($checkuser = $sql_checkuser->fetch_assoc())
    {
        if($checkuser["userid"] == $_SESSION['user_id']){
            $flags = 1;
        }
    }
    $flagr = 0;
    while ($checkuser = $sql_checkuser->fetch_assoc())
    {
        if($checkuser["userid"] == $_SESSION['spid']){
            $flagr = 1;
        }
    }
    if(!$flags)
        mysqli_query($con,"INSERT INTO chat_users (userid, username, current_session) values('".$_SESSION['user_id']."', '".$getname['firstname']."', '".$_SESSION['spid']."') ");
    if(!$flagr)
        mysqli_query($con,"INSERT INTO chat_users (userid, username, current_session) values('".$getname['firstname']."', '".$_SESSION['user_id']."', '".$_SESSION['spid']."') ");
    header('Location: ../message/index.php');
?>