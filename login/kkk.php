<?php
session_start();
require_once('connection.php'); ?>

<?php
$_SESSION['login_error'] = "";

//check for form submission
if (isset($_POST['submit'])) {

    // $errors = array();

    //check if the user name and password has been entered
    if (!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1) {
        $_SESSION['login_error'] = 'Username is Missing / Invalid';
        header('Location: index.php');
    }

    if (!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1) {
        $_SESSION['login_error'] = 'Password is Missing / Invalid';
        header('Location: index.php');
    }

    //check if there any errors in the form
    if (empty($_SESSION['login_error'])) {

        //save username and password into varible
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $hashed_password = sha1($password);

        $query = "SELECT * FROM user where email='{$email}' AND password = '{$hashed_password}'";

        $result_set = mysqli_query($connection, $query);
        $record = mysqli_fetch_assoc($result_set);
        $user_type = $record['type'];
        $user_id = $record['id'];
        // $num3 = 0;

        if (mysqli_num_rows($result_set) == 1) {
            $_SESSION['user_email'] = $email;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_type'] = $user_type;

            if ($user_type == 'ad') {
                    header('Location: admin/index.php');
                }

                elseif ($user_type == 'ep') {
                    header('Location: ep/index.php');
                }

                elseif ($user_type == 'sp') {
                    header('Location: sp/index.php');
                }

                elseif ($user_type == 'eo') {
                    header('Location: eo/index.php');
                }

            // while ($record = mysqli_fetch_assoc($result_set)) {
            //     $ema = $record['email'];
            //     $pass = $record['password'];
            //     // $hashed_password_db= sha1($pass);
            //     $user_id = $record['id'];
            //     $num1 = 2;
            //     $num2 = 3;

            //     if ($email == $ema && $hashed_password == $pass) {

            //         $num3 = $num1 + $num2;
            //         $user_id = $record['id'];
                    // $_SESSION['user_email'] = $ema;
                    // $_SESSION['user_id'] = $user_id;
                    // $user_type = $record['type'];
                    // $_SESSION['user_type'] = $user_type;
            //         if (isset($_SESSION['user_id']) && $_SESSION['user_id']) {

            //             // service provider login
            //             if ($user_type == 'sp') {
            //                 if (isset($_SESSION['tempery_another_log_id'])) {
            //                     $_SESSION['login_error'] = "Invalid username or password";
            //                     header('Location: index.php');
            //                 } else {
            //                     header('Location: sp/index.php');
            //                 }
            //             }
            //             //event orgizelogin
            //             if ($user_type == 'eo') {
            //                 if (isset($_SESSION['tempery_another_log_id'])) {
            //                     $_SESSION['login_error'] = "Invalid username or password";
            //                     header('Location: index.php');
            //                 } else {
            //                     header('Location: eo/index.php');
            //                 }
            //             }
            //             if ($user_type == 'ad') {
            //                 header('Location: admin/index.php');
            //             }
            //             if ($user_type == 'ep') {
            //                 $event_idd = $_SESSION['event_idd'];
            //                 if ($_SESSION['check_viewed_id'] == 1) {
            //                     $_SESSION['event_idd'] = NULL;
            //                     $_SESSION['tempery_id'] = NULL;
            //                     $_SESSION['tempery_another_log_id'] = NULL;
            //                     $_SESSION['check_viewed_id'] = NULL;
            //                     header('Location: ../public_event_paypage/index.php');
            //                 } else {
            //                     header('Location: ep/index.php');
            //                 }
            //             }
            //         }
            //     }
            // }
            //end while loop
        }
        // if ($num3 != 5) {
        //     // echo "hi";
        //     $_SESSION['login_error'] = "Invalid username or password";
        //     header('Location: index.php');
        // }
    }
    else{
        $_SESSION['login_error'] = "Invalid username or password";
        header('Location: index.php');
    }
}

mysqli_close($connection);
?>
