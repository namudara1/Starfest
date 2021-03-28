<?php
    include_once "../config/connection.php";
    session_start();
    if(isset($_POST['but_req'])){
        foreach($_POST['check_list'] as $checked) {
            $flagch = 0;
            $sql_getreq=mysqli_query($con,"SELECT * FROM event_request WHERE (status='accepted' or status='pending') and sp_userid = '".$_SESSION['spid']."' and eo_userid = '".$_SESSION['user_id']."' and event_id = '".$checked."'");
            if(mysqli_num_rows($sql_getreq)>0)
                $flagch = 1;
            if($flagch == 0)
                mysqli_query($con,"INSERT INTO event_request (eo_userid, sp_userid, event_id) values('".$_SESSION['user_id']."', '".$_SESSION['spid']."', '".$checked."') ");
        }
    }
    header('Location: ../service_pro/index.php');
?>