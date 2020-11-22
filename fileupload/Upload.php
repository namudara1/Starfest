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
    }
?>