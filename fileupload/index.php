<?php
	session_start();
	include_once "../config/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>File Management | Starfest</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="../dashboard/css/style.css">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="js/upload.js"></script>
	</head>
	<body>
	<?php include('../common/header.php'); ?>	
	<?php if(isset($_SESSION['user_id']) && $_SESSION['user_id']) { ?> 	
			<div class="chat" >
				<div id="frame">
					<div id="sidepanel">
					<div id="profile">
					<div class="wrap">
						<?php
							if($usertype["type"] == "eo"){
							echo '<h3>Service Providers</h3>';}
							if($usertype["type"] == "sp"){
								echo '<h3>Event Organizers</h3>';}
						?>
					</div>
					</div>
						<?php
							include ('Upload.php');
							$upload = new Upload();
							$loggedUser = $upload->getUserDetails($_SESSION['user_id']);
							$currentSession = '';
							foreach ($loggedUser as $user) {
								$currentSession = $user['current_session'];
							}
						?>
						<div id="contacts">
							<?php
								echo '<ul>';
								$chatUsers = $upload->distinctUsers($_SESSION['user_id']);
								foreach ($chatUsers as $user) {
									$activeUser = '';
									if($user['userid'] == $currentSession) {
										$activeUser = "active";
									}
									echo '<li id="'.$user['userid'].'" class="contact '.$activeUser.'" data-touserid="'.$user['userid'].'" data-tousername="'.$user['username'].'">';
									echo '<div class="wrap">';
									echo '<img src="../message/userpics/user3.jpg" alt="" />';
									echo '<div class="meta">';
									echo '<p class="name">'.$user['username'].'<span id="unread_'.$user['userid'].'" class="unread">'.$upload->getUnreadNotifiCount($user['userid'], $_SESSION['user_id']).'</span></p>';
									echo '</div>';
									echo '</div>';
									echo '</li>'; 
								}
								echo '</ul>';
							?>
						</div>
					</div>
					<div class="right-side">
						<div class="contact-profile" id="userSection">	
						<?php
							$userDetails = $upload->getUserDetails($currentSession);
							foreach ($userDetails as $user) {
									echo '<h3>'.$user['username'].'</h3>';
							}	
						?>						
						</div>
						<div class="file_upload" >
							<div class="file_upload_list" id="file_upload_lists">
								<?php
									$sql_getusertype = mysqli_query($con,"SELECT type FROM user WHERE id = '".$_SESSION['user_id']."' ");
									$usertype=mysqli_fetch_assoc($sql_getusertype);
									echo $upload->getUserDocs($_SESSION['user_id'], $currentSession, $usertype["type"]);						
								?>
								<!-- <div class="file_close">X</div> -->
							</div>
						</div>
						<div class="choose_file">	
							<label for="choose_file">
								<form method="post" action="upload_action.php" enctype='multipart/form-data'>
									<input type="file" name='file' class="submit subButton" id="subButton<?php echo $currentSession; ?>"/>
									<!-- <input type="hidden" name="ruserid" value="<?php //echo $newSession; ?>"/> -->
									<span>File Description/Purpose</span>
									<select id="filepurpose" name="filedesc">
										<?php
											if($usertype["type"] == "sp"){
												echo '<option value="Invoice">Invoice</option>
												<option value="Voucher">Voucher</option>
												<option value="Quotation">Quotation</option>';
											}
											if($usertype["type"] == "eo"){
												echo '<option value="Event Plan">Event Plan</option>';
											}
										?>
										<option value="Other">Other</option>
									</select>
									<!-- <input type="text" name='filedesc'/> -->
									<input type='submit' value='Send File' name='but_upload'/>
								</form>
							</label>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</body>
</html>