<?php
SESSION_START();
$_SESSION['username'] = "";
$_SESSION['user_id']  = "";
$_SESSION['login_details_id']= "";
header("Location:../login/index.php");
?>