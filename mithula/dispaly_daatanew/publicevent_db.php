<?php
$host='localhost';
$username='root';
$password='';
$dbname = "starfest";
$conn1=mysqli_connect($host,$username,$password,$dbname);
if(!$conn1){
 die('Could not Connect My Sql:' .mysql_error());
}
?>