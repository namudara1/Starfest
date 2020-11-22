<?php
SESSION_START();
$_SESSION['username'] = "";
$_SESSION['userid']  = "";
$_SESSION['login_details_id']= "";
header("Location:index.php");
?>