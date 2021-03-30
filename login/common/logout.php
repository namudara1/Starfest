<?php
SESSION_START();
$_SESSION['username'] = null;
$_SESSION['user_id']  = null;
$_SESSION['login_details_id']= null;
header("Location:../../home/index.php");
?>