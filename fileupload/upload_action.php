<?php
session_start();
include ('Upload.php');
include ('../config/connection.php');

$upload = new Upload();

if(isset($_POST['but_upload'])){
 
  $filename = $_FILES['file']['name'];
  $size=$_FILES['file']['size'];
  $target_dir = "uploads/".$_SESSION['user_type']."/".$_SESSION['user_email']."/";
  if ( !is_dir( $target_dir ) ) {
    mkdir( $target_dir );       
  }
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  $reciever_userid = $_POST['ruserid'];
  $user_id = $_SESSION['user_id'];

  // Select file type
  $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif","pdf","docx","xlsx");

  // Check extension
  if( in_array($FileType,$extensions_arr) ){
 
     // Insert record
     $sqlInsert = "
                INSERT INTO document
                (reciever_userid, sender_userid, file_path, file_name, type, file_size, status) 
                VALUES ('".$reciever_userid."', '".$user_id."', '".$target_dir."', '".$filename."', '".$FileType."','".$size."','1')";
     mysqli_query($con,$sqlInsert);
  
     // Upload file
     move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$filename);
     header("location:index.php");
  }

}

if($_POST['action'] == 'show_docs') {
	$upload->showUserDocs($_SESSION['user_id'], $_POST['to_user_id']);
}
if($_POST['action'] == 'update_user_docs') {
	$conversation = $upload->getUserDocs($_SESSION['user_id'], $_POST['to_user_id']);
	$data = array(
		"conversation" => $conversation			
	);
	echo json_encode($data);
}
if($_POST['action'] == 'update_unread_message') {
	$count = $upload->getUnreadNotifiCount($_POST['to_user_id'], $_SESSION['user_id']);
	$data = array(
		"count" => $count			
	);
	echo json_encode($data);
}
?>