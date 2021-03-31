<?php
session_start();
require_once('../connection.php');
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    $_SESSION['check_viewed_id'] = 1;
    // $_SESSION['event_idd'] = $event_id;
    header('Location: ../../login/login3/index.php');
}


$event_id = $_SESSION['event_id'];
$query1 = "SELECT * FROM public_ticket_price where event_id='$event_id'";
$result_set1 = mysqli_query($connection, $query1);
$record1 = mysqli_fetch_assoc($result_set1);
$quantity = $record1['quantity'];
$issue_tickets = $record1['issue_tickets'];

$query2 = "SELECT * FROM event where event_id='$event_id'";
$result_set2 = mysqli_query($connection, $query2);
$record2 = mysqli_fetch_assoc($result_set2);
$event_name = $record2['event_name'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<div class="reg">
    <div class="btn-container">
        <div class="tit">
            <h1 class="h11"><?php echo $event_name; ?></h1>
        </div>
        <button herf='#' id="button-payment" class="button-reg">Register Now</button>
    </div>

    </div>
    <div class="center">
        <div class="container">
            <div class="close">X</div>
            <div class="text">
                <?php
                if($issue_tickets >= $quantity){
                    echo '<h3 class="ha1">All seats are reserved.</h3>';
                    
                }
                else{
                    echo '<h1>Registration successful.</h1>';
                    $sql3="UPDATE public_ticket_price SET quantity = quantity - 1 , issue_tickets = issue_tickets + 1 WHERE event_id = $event_id";
                    $connection->query($sql3);
                }
                ?>
                <hr class="new1">
            </div>
        </div>
    </div>
    <script src="register.js"></script>
</body>

</html>
<?php
mysqli_close($connection);
?>