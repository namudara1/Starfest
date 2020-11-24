
<?php 
session_start();
require_once('connection.php'); ?>

<?php
    //check for form submission
    if (isset($_POST['submit'])){

        $errors = array();

        //check if the user name and password has been entered
        if (!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1 ){
            $errors[] = 'Username is Missing / Invalid';    
        }

        if (!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1 ){
            $errors[] = 'Password is Missing / Invalid';
        }

        //check if there any errors in the form
        if (empty($errors)) {

            //save username and password into varible
            $email = mysqli_real_escape_string($connection, $_POST['email']);
            $password = mysqli_real_escape_string($connection, $_POST['password']);
            // $hashed_password = sha1($password);
       
            $query = "SELECT * FROM user";

            $result_set = mysqli_query($connection, $query);
            $num3 = 0;

            if($result_set){
                
                while ($record = mysqli_fetch_assoc($result_set)){
                    $ema = $record ['email'];
                    $pass = $record ['password'];
                    $user_id = $record ['id'];
                    $num1 = 2;
                    $num2 = 3;
                    
                        if($email == $ema && $password == $pass){
                            
                           $num3 = $num1 + $num2;
                           $user_id = $record ['id'];
                           $_SESSION['user_email'] = $ema;
                           $_SESSION['user_id'] = $user_id;
                           $user_type = $record ['type'];
                           $_SESSION['user_type'] = $user_type;
                           if(isset($_SESSION['user_id']) && $_SESSION['user_id']) {
                           if($user_type == 'sp'){
                                
                                header('Location: sp/index.php');
                           }
                           if($user_type == 'eo'){
                                header('Location: eo/index.php');
                           }
                           if($user_type == 'ep'){
                                header('Location: ep/index.php');
                           }
                        }
                        }
                    }
            } 
            if($num3 != 5 ){
                echo "hi";
                $errors[] = "Invalid username and password";
            }
       }
    }

    mysqli_close($connection);
?>
