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

        // $num3 = 0;

        if (mysqli_num_rows($result_set) == 1) {
            $user_type = $record['type'];
            $user_id = $record['id'];
            $_SESSION['user_email'] = $email;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_type'] = $user_type;

            if ($user_type == 'ad') {
                header('Location: admin/index.php');
            } elseif ($user_type == 'ep') {
                header('Location: ep/index.php');
            } elseif ($user_type == 'sp') {
                header('Location: sp/index.php');
            } elseif ($user_type == 'eo') {
                header('Location: eo/index.php');
            }
        }
        else {
            $_SESSION['login_error'] = "Invalid username or password";
            header('Location: index.php');
    } 
    }
}

mysqli_close($connection);
?>
