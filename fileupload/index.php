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
	</head>
<body>
	<?php include('../common/header.php'); ?>	
	<?php if(isset($_SESSION['user_id']) && $_SESSION['user_id']) { ?> 	
			<div class="chat" >
				<div id="frame">
					<div id="sidepanel">
						<?php
							include ('Upload.php');
							$chat = new Upload();
							$loggedUser = $chat->getUserDetails($_SESSION['user_id']);
							$currentSession = '';
							foreach ($loggedUser as $user) {
								$currentSession = $user['current_session'];
							}
						?>
						<div id="contacts">
							
							<?php
							echo '<ul>';
							$chatUsers = $chat->distinctUsers($_SESSION['user_id']);
							foreach ($chatUsers as $user) {
								$activeUser = '';
								if($user['userid'] == $currentSession) {
									$activeUser = "active";
								}
								echo '<li id="'.$user['userid'].'" class="contact '.$activeUser.'" data-touserid="'.$user['userid'].'" data-tousername="'.$user['username'].'">';
								echo '<div class="wrap">';
								echo '<img src="../message/userpics/user3.jpg" alt="" />';
								echo '<div class="meta">';
								echo '<p class="name">'.$user['username'].'<span id="unread_'.$user['userid'].'" class="unread">'.$chat->getUnreadNotifiCount($user['userid'], $_SESSION['user_id']).'</span></p>';
								echo '</div>';
								echo '</div>';
								echo '</li>'; 
							}
							echo '</ul>';
							?>
						</div>
					</div>
		
					<div class="right-side">
						<div class="file_upload">
							<div class="file_upload_list">
								<ul>
									<li>
										<div class="file_item">
											<div class="format">
												<p>PDF</p>
											</div>
											<div class="file_progress">
												<div class="file_info">
													<div class="file_name">
													<a href="wordpress-pdf-invoice-plugin-sample.pdf" target="_blank" style="text-decoration: none;">
														Invoice.pdf
														</a>
													</div>
													<div class="file_size_wrap">
														<div class="file_size">2 MB</div>
														<!-- <div class="file_close">X</div> -->
													</div>
												</div>
												<div class="progress">
													<div class="inner_progress" style="width: 100%;"></div>
												</div>
											</div>
											<a href="../paypage/payment.php" style="text-decoration: none;">
											<div class="file_close">Pay</div>
											</a>	
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="choose_file">
							<label for="choose_file">
								<input type="file" id="choose_file">
								<span>Choose Files</span>
							</label>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</body>
</html>