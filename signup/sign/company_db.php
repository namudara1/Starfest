<?php


session_start();

$category = filter_input(INPUT_POST, 'category');
$category1 = filter_input(INPUT_POST, 'category1');
$company_name = filter_input(INPUT_POST, 'company_name');

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "starfest";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

// $data = mysqli_query($conn,"SELECT COUNT(`email`) AS num FROM `user` where email='$email'");
// $row = mysqli_fetch_assoc($data);
// $emailcount = $row['num'];


echo $_SESSION['email'];


$email1 = $_SESSION['email'];






if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{

    // $sql1="select sp_id from service_provider where email='$email1'";

if($category=='others'){

    $sql=  "UPDATE service_provider SET category='$category1', company_name='$company_name'  where email='$email1'";
    }
    
    else{
        
        
        $sql=  "UPDATE service_provider SET category='$category', company_name='$company_name'  where email='$email1'";
          
        
        
    }


    if ($conn->query($sql)){
        // echo "New record is inserted sucessfully";
     
     
         header('location:../../login/index.php'); 
         
     }
         else{
         echo "Error: ". $sql ."
         ". $conn->error;
         }

// if ($conn->query($sql)){
// echo "New record is inserted sucessfully";
// }
// else{
// echo "Error: ". $sql ."
// ". $conn->error;
// }
// $conn->close();
}




?>