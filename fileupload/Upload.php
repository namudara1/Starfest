<?php
    class Upload{
        private $host  = 'localhost';
        private $user  = 'root';
        private $password   = "";
        private $database  = "starfest"; 
        private $chatTable = 'document';
	    private $chatUsersTable = 'doc_users';  
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
        //Get unread message count
        public function getUnreadNotifiCount($senderUserid, $recieverUserid) {
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
        //Get all messages of the current chat session and display them
        public function getUserDocs($from_user_id, $to_user_id) {			
            $sqlQuery = "
                SELECT * FROM ".$this->chatTable." 
                WHERE (sender_userid = '".$from_user_id."' 
                AND reciever_userid = '".$to_user_id."') 
                OR (sender_userid = '".$to_user_id."' 
                AND reciever_userid = '".$from_user_id."') 
                ORDER BY timestamp ASC";
            $userChat = $this->getData($sqlQuery);	
            $doclist = '<ul>';
            foreach($userChat as $files){
                $file_sizemb=$files["file_size"]/1000000;
                $doclist .= '<li>';
                $doclist .= '<div class="file_item">';
                $doclist .= '<div class="format">';
                $doclist .= '<p>'.$files["type"].'</p>';
                $doclist .= '</div>';
                $doclist .= '<div class="file_progress">';
                $doclist .= '<div class="file_info">';
                $doclist .= '<div class="file_name">';
                $doclist .= '<a href="'.$files["file_path"].$files["file_name"].'" target="_blank" style="text-decoration: none;">'.$files["type"].$files["file_name"].'</a>';
                $doclist .= '</div>';
                $doclist .= '<div class="file_size_wrap">';
                $doclist .= '<div class="file_size">'.number_format($file_sizemb, 2).' MB';
                $doclist .= '</div>';
                $doclist .= '</div>';
                $doclist .= '</div>';
                $doclist .= '<div class="progress">';
                $doclist .= '<div class="inner_progress" style="width: 100%;"></div>';
                $doclist .= '</div>';
                $doclist .= '</div>';
                $doclist .= '<a href="../paypage/payment.php" style="text-decoration: none;">';
                $doclist .= '<div class="file_close">Pay</div>';
                $doclist .= '</a>';
                $doclist .= '</div>';
                $doclist .= '</li>';
            }		
            $doclist .= '</ul>';
            return $doclist;
        }
        
        //Show chat session of a user when click on his chat contact
        public function showUserDocs($from_user_id, $to_user_id) {		
            $userDetails = $this->getUserDetails($to_user_id);	
            // get user conversation
            $doclists = $this->getUserDocs($from_user_id, $to_user_id);	
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
                "conversation" => $doclists		
            );
            echo json_encode($data);		
        }	
    }
?>