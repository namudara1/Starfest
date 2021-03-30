<?php
session_start();

// if (isset($_SESSION['user_id']) && $_SESSION['user_type']) {
//     $user_type = $_SESSION['user_type'];
//     // if(isset($_SESSION['event_id'] )){
//     //     //event participant login
//     //     if($user_type == 'ep'){
//     //         header('Location: ../public_event_paypage/index.php');
//     //     }
//     // }

//     //event participant login
//     if ($user_type == 'ep') {
//         header('Location: ep/index.php');
//     }

//     // service provider login
//     if ($user_type == 'sp') {
//         header('Location: sp/index.php');
//     }

//     //event orgizelogin
//     if ($user_type == 'eo') {
//         header('Location: eo/index.php');
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Log in form</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">

</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Login</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="kkk.php">

                        <legend>
                            <h1>Log In</h1>
                        </legend>

                        <?php
                        if (isset($_SESSION['tempery_id'])) {
                            echo '<div class="book_ticket">';
                            echo '<h4>Please signup or login before booking..</h4>';
                            echo '</div>';
                            $_SESSION['tempery_id'] = NULL;
                            $_SESSION['tempery_another_log_id'] = 1;
                        }
                        ?>

                        <?php
                        echo '<div class="book_ticket">';
                        if (isset($_SESSION['login_error'])) {
                            echo '<p class="error">' . $_SESSION['login_error'] . '</p>';
                        }
                        echo '</div>';
                        ?>

                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="email">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="password" name="password">
                                </div>
                            </div>
                        </div>


                        <p>

                            <button class="btn btn--radius-2 btn--red" type="submit" name="submit">Login</button>

                        </p>
                    </form>
                    <p><span>Not a member? </span><a href="../signup/sign/index.php">Sign Up</a></p>
                </div>
                <!-- <div class="signup">
            <</p>
        </div> -->
            </div>
</body>

</html>