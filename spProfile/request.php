<?php
    include_once "../config/connection.php";
    session_start();
    if(isset($_POST['but_req'])){
        foreach($_POST['check_list'] as $checked) {
            mysqli_query($con,"INSERT INTO event_request (eo_userid, sp_userid, event_id) values('".$_SESSION['user_id']."', '".$_SESSION['spid']."', '".$checked."') ");
        }
    }
    header('Location: ../service_pro/index.php');
?>