<?php
session_start();
// check set the serach eventid
if (isset($_GET["search_event_id"])) {
    $event_id = $_GET["search_event_id"];
}

if (isset($_GET["id"])) {
    $event_id = $_GET["id"];
    $_SESSION['event_id'] = $event_id;
}
else{
    $event_id = $_SESSION['event_id'];
}



//redirec pay page 

$_SESSION['tempery_id'] = 1;

// session id generate for the block to the go to sp and eo account
$_SESSION['tempery_b_id'] = 1;

//redirect homepage when payment 
$re = 10;
$_SESSION['redirect_pay'] = $re;

require_once 'publicevent_db.php';
// Connect to MySQL

// $sql = "SELECT * FROM event ORDER BY date DESC";
$sql = "SELECT * FROM event where event_id='$event_id'";
$result = $conn->query($sql);

?>


<!DOCTYPE html>
<!--
Template Name: Surogou
Author: <a href="https://www.os-templates.com/">OS Templates</a>
Author URI: https://www.os-templates.com/
Copyright: OS-Templates.com
Licence: Free to use under our free template licence terms
Licence URI: https://www.os-templates.com/template-terms
-->
<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->

<head>
    <title>Starfest</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">


    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        #logo {
            position: fixed;
            top: 0;
            left: 0;
        }
    </style>

</head>

<body id="top">


    <?php
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {

        if ($i == 0) {

            echo "<tr>";
        }
    ?>

        <div class="main">
            <div class="container">
                <div class="booking-content">
                    <div class="booking-image">
                        <img class="booking-img" src="images/form-img.jpg" alt="Booking Image">
                    </div>
                    <div class="booking-form">
                        <form id="booking-form" method="post">
                            <h1><?php echo $row["event_name"]; ?></h1>
                            <?php echo "<li><img src='../create_event/upload/{$row['image']}' alt='{$row['event_name']}' class='gallery'></li>"; ?>
                            <div class="form-group form-input">
                                <label for="name" class="form-label"><u><b>Description </u></b></label>
                            </div>

                            <div class="form-group form-input">
                                <label for="name" class="form-label"><?php echo $row["description"]; ?> </label>
                            </div>
                            <br>
                            <div class="form-group form-input">

                                <label for="phone" class="form-label">DATE - <?php echo $row["date"]; ?> </label>
                            </div>
                            <div class="form-group form-input">
                                <label for="phone" class="form-label">TIME - <?php echo $row["time"]; ?> </label>
                            </div>
                            <br>
                            <div class="form-submit">
                                <?php
                                $is_free = $row['free'];
                                // if(isset($_SESSION['user_type']) || )
                                if (isset($_SESSION['user_type'])) {
                                    if (($_SESSION['user_type'] == 'ep' || $_SESSION['user_type'] == NULL)) {
                                        if ($is_free == 'yes') {
                                            echo '<input type="submit" value="REGISTER" class="submit" id="submit" name="submit" onclick="return register()"/>';
                                            
                                        } else {
                                            echo '<input type="submit" value="BOOK NOW" class="submit" id="submit" name="submit" onclick="return book()" />';
                                        }
                                    }
                                } else {
                                    if ($is_free == 'yes') {
                                        echo '<input type="submit" value="REGISTER" class="submit" id="submit" name="submit" onclick="return register()" />';
                                    } else {
                                        echo '<input type="submit" value="BOOK NOW" class="submit" id="submit" name="submit" onclick="return book()" />';
                                    }
                                }
                                ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <!-- JS -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="js/main.js"></script>
        
        <script>
        function register(){
            document.getElementById("booking-form").action = "../../public_event_paypage/register/index.php";
        }

        function book(){
            document.getElementById("booking-form").action = "../../public_event_paypage/index.php";
        }
        
        </script>

    <?php
        if ($i == 0) {
            echo "</tr>";
        }
        $i++;
    }

    ?>

    </ul>
    </table>

    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->

    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <div class="wrapper row5">


    </div>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->

    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
    <!-- JAVASCRIPTS -->
    <script src="layout/scripts/jquery.min.js"></script>
    <script src="layout/scripts/jquery.backtotop.js"></script>
    <script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>

</html>