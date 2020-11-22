<?php 
	session_start();
	include_once "../config/connection.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Chat Application | Starfest</title>
		<link href="css/style.css" rel="stylesheet">
		<link rel="stylesheet" href="../dashboard/css/style.css">
		<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="js/chat.js"></script>
	</head>
	<body>
	<?php include('../common/header.php'); ?>
		<?php if(isset($_SESSION['user_id']) && $_SESSION['user_id']) { ?> 	
			<div class="chat">	
				<div id="frame">		
					<div id="sidepanel">
						<?php
							include ('Chat.php');
							$chat = new Chat();
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
								echo '<img src="userpics/user3.jpg" alt="" />';
								echo '<div class="meta">';
								echo '<p class="name">'.$user['username'].'<span id="unread_'.$user['userid'].'" class="unread">'.$chat->getUnreadMessageCount($user['userid'], $_SESSION['user_id']).'</span></p>';
								echo '</div>';
								echo '</div>';
								echo '</li>'; 
							}
							echo '</ul>';
							?>
						</div>
					</div>			
					<div class="content" id="content"> 
						<div class="messages" id="conversation">		
							<?php
							echo $chat->getUserChat($_SESSION['user_id'], $currentSession);						
							?>
						</div>
						<div class="message-input" id="replySection">				
							<div class="message-input" id="replyContainer">
								<div class="wrap">
									<input type="text" style="font-size:12px;" class="chatMessage" id="chatMessage<?php echo $currentSession; ?>" placeholder="Type your message..." />
									<button class="submit chatButton" id="chatButton<?php echo $currentSession; ?>"><i class="fa fa-paper-plane fa-lg" aria-hidden="true"></i></button>	
								</div>
							</div>					
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</body>
</html>