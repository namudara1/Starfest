<?php
class Chat{
    private $host  = 'localhost';
    private $user  = 'root';
    private $password   = "";
    private $database  = "starfest";      
    private $chatTable = 'message';
	private $chatUsersTable = 'chat_users';
	private $dbConnect = false;

	//Defualt constructor for establishing the connection with the database
    public function __construct(){
        if(!$this->dbConnect){ 
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }else{
                $this->dbConnect = $conn;
            }
        }
	}

	//Getting data from the tables and assigning them to an array
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error($this->dbConnect));
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}

	//Counting number of rows in a query
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error($this->dbConnect));
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}

	//Get user details of the logged in user of chat application
	public function getUserDetails($userid){
		$sqlQuery = "
			SELECT * FROM ".$this->chatUsersTable." 
			WHERE userid = '$userid'";
		return  $this->getData($sqlQuery);
	}

	//Get User Deatails of users who sent messages to logged in user
	public function senderchatUsers($userid){
		$sqlQuery = "
		SELECT * FROM ".$this->chatUsersTable." WHERE userid IN
		(SELECT DISTINCT sender_userid FROM ".$this->chatTable." WHERE reciever_userid = '$userid')";
		return  $this->getData($sqlQuery);
	}

	//Get User Deatails of users who recieved messages from logged in user
	public function recieverchatUsers($userid){
		$sqlQuery = "
		SELECT * FROM ".$this->chatUsersTable." WHERE userid IN
		(SELECT DISTINCT reciever_userid FROM ".$this->chatTable." WHERE sender_userid = '$userid')";
		return  $this->getData($sqlQuery);
	}

	//Get a distinct list of users who had chat sessions with logged in user
	public function distinctUsers($userid){
		$senderChatUsers = $this->senderchatUsers($userid);
		$recieverChatUsers = $this->recieverchatUsers($userid);
		foreach ($recieverChatUsers as $ruser) {
			$flag = 0;
			foreach ($senderChatUsers as $suser) {
				if($ruser['userid'] == $suser['userid'])
					$flag = 1;
			}
			if($flag == 0)
				$senderChatUsers[] = $ruser;
		}
		return $senderChatUsers;
	}
	
	//Send a new message and set status to 1
	public function insertChat($reciever_userid, $user_id, $chat_message) {		
		$sqlInsert = "
			INSERT INTO ".$this->chatTable." 
			(reciever_userid, sender_userid, message, status) 
			VALUES ('".$reciever_userid."', '".$user_id."', '".$chat_message."', '1')";
		$result = mysqli_query($this->dbConnect, $sqlInsert);
		if(!$result){
			return ('Error in query: '. mysqli_error($this->dbConnect));
		} else {
			$conversation = $this->getUserChat($user_id, $reciever_userid);
			$data = array(
				"conversation" => $conversation			
			);
			echo json_encode($data);	
		}
	}

	//Get all messages of the current chat session and display them
	public function getUserChat($from_user_id, $to_user_id) {			
		$sqlQuery = "
			SELECT * FROM ".$this->chatTable." 
			WHERE (sender_userid = '".$from_user_id."' 
			AND reciever_userid = '".$to_user_id."') 
			OR (sender_userid = '".$to_user_id."' 
			AND reciever_userid = '".$from_user_id."') 
			ORDER BY timestamp ASC";
		$userChat = $this->getData($sqlQuery);	
		$conversation = '<ul>';
		foreach($userChat as $chat){
			$user_name = '';
			if($chat["sender_userid"] == $from_user_id) {
				$conversation .= '<li class="msg">';
			} else {
				$conversation .= '<li class="msgr">';
				$conversation .= '<img width="22px" height="22px" src="userpics/user3.jpg" alt="" />';
			}			
			$conversation .= '<p>'.$chat["message"].'</p>';		
			$conversation .= '<span>'.$chat["timestamp"].'</span>';		
			$conversation .= '</li>';
		}		
		$conversation .= '</ul>';
		return $conversation;
	}

	//Show chat session of a user when click on his chat contact
	public function showUserChat($from_user_id, $to_user_id) {		
		$userDetails = $this->getUserDetails($to_user_id);	
		// get user conversation
		$conversation = $this->getUserChat($from_user_id, $to_user_id);	
		// update chat user read status		
		$sqlUpdate = "
			UPDATE ".$this->chatTable." 
			SET status = '0' 
			WHERE sender_userid = '".$to_user_id."' AND reciever_userid = '".$from_user_id."' AND status = '1'";
		mysqli_query($this->dbConnect, $sqlUpdate);		
		// update users current chat session
		$sqlUserUpdate = "
			UPDATE ".$this->chatUsersTable." 
			SET current_session = '".$to_user_id."' 
			WHERE userid = '".$from_user_id."'";
		mysqli_query($this->dbConnect, $sqlUserUpdate);		
		$data = array(
			"conversation" => $conversation			
		 );
		 echo json_encode($data);		
	}	

	//Get unread message count
	public function getUnreadMessageCount($senderUserid, $recieverUserid) {
		$sqlQuery = "
			SELECT * FROM ".$this->chatTable."  
			WHERE sender_userid = '$senderUserid' AND reciever_userid = '$recieverUserid' AND status = '1'";
		$numRows = $this->getNumRows($sqlQuery);
		$output = '';
		if($numRows > 0){
			$output = $numRows;
		}
		return $output;
	}				
}
?>