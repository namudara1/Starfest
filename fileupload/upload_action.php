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

  $logUser = $upload->getUserDetails($_SESSION['user_id']);
  $newSession = '';
  foreach ($logUser as $user) {
    $newSession = $user['current_session'];
  }

  $reciever_userid = $newSession;
  $user_id = $_SESSION['user_id'];
  $file_desc = $_POST['filedesc'];

  // Select file type
  $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif","pdf","docx","xlsx");

  // Check extension
  if( in_array($FileType,$extensions_arr) ){
 
     // Insert record
     $sqlInsert = "
                INSERT INTO document
                (reciever_userid, sender_userid, event_id, file_path, file_name, type, file_size, file_desc, status) 
                VALUES ('".$reciever_userid."', '".$user_id."', '".$_SESSION['event_id']."', '".$target_dir."', '".$filename."', '".$FileType."','".$size."','".$file_desc."','1')";
     mysqli_query($con,$sqlInsert);
  
     // Upload file
     move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$filename);
     header("location:index.php");
  }

}

$sql_getusertype = mysqli_query($con,"SELECT type FROM user WHERE id = '".$_SESSION['user_id']."' ");
$usertype=mysqli_fetch_assoc($sql_getusertype);

if($_POST['action'] == 'show_docs') {
	$upload->showUserDocs($_SESSION['user_id'], $_POST['to_user_id'], $usertype["type"]);
}
if($_POST['action'] == 'update_user_docs') {
	$conversation = $upload->getUserDocs($_SESSION['user_id'], $_POST['to_user_id'], $usertype["type"]);
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