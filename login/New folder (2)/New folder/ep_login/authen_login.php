<?php



 require('db_connect.php');

if (isset($_POST['firstname']) and isset($_POST['password'])){
	
// Assigning POST values to variables.
$firstname = $_POST['firstname'];
$password = $_POST['password'];

// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM event_participant WHERE firstname='$firstname' and password='$password'";
 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if ($count == 1){

        $id= "SELECT ep_id FROM event_participant WHERE firstname='$firstname' and password='$password'";
        $result = mysqli_query($connection, $id);
        $row = mysqli_fetch_assoc($result);
        //echo $row['eo_id'];
        $user = $row['ep_id'];

        header('location:../eo_dashboard/index.php?user='.$user); 
        
        exit();  
        
//echo "Login Credentials verified";
echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";

}else{
echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
//echo "Invalid Login Credentials";

// if($firstname && $password){

}
}
?>