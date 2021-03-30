<?php 
session_start();
require_once('connection.php'); 
$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['user_type'];

if(!isset($user_id)){
    header('Location: ../login/index.php');
    $_SESSION['event_idd'] = $event_id;
}

// if($user_type == 'sp' || $user_type == 'eo'){
//     header('Location: ../login/index.php');
// }
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
    <!-- <div class="btn-container">
        <button herf='#' id="button-payment" class="button-payment">Click me</button>
    </div> -->
     <!-- <div class="cart-container">
        <button href='#' id="button-cart" class="button-cart">Cart</button>
    </div> -->
<div class="center">
    <div class="container">
        <div class="text"><h1>Booking Tickets</h1>
            <hr class="new1"> 
    </div>
        
        <!-- <form action="login.php" method="post">   -->
        <div class="ticket_container">


            <table id = "ticket_table">
                <tr>
                    <th><h2 class="text1">Description</h2></th>
                    <th><h2 class="text1">Ticket Price</h2></th>
                    <th><h2 class="text1">Add to Cart</h2></th>
                </tr>
             
            <?php


             $event_id = $_SESSION['event_id'];
             $query = "SELECT * FROM public_ticket_price where event_id='$event_id'";

             $result_set = mysqli_query($connection, $query);

             $query1 = "SELECT * FROM event where event_id=$event_id";
             $result_set1 = mysqli_query($connection, $query1);
             $record1 = mysqli_fetch_assoc($result_set1);
             $event_name = $record1['event_name'];

             if($result_set){
                 while ($record = mysqli_fetch_assoc($result_set)){
                     $price = $record ['ticket_price'];
                     $quantity = $record ['quantity'];
                     $issue_ticket = $record ['issue_tickets'];
                     
                     echo '<tr>';
                     
                        echo '<td>';
                            echo $event_name;
                        echo '</td>';
                        echo '<td >';
                            echo $price;
                        echo '</td>';
                        echo '<td>';
                            echo '<div class="cart_btn">';
                            echo '<button class="btn_add_cart" onclick="add_to_cart(' . $price . ',' . $event_id . ',' . $user_id . ', ' . $issue_ticket . ', ' . $quantity . ')"></button>';
                            echo '</div>';
                        echo '</td>';
                    echo '</tr>';
                }
            }
            ?>
            </table>
        </div>

        <div class="cart_button">
            <button id="redirect_cart_btn" class="cart_bt" href=""><h3>CART</h3></button>
            </div>
      </div>
</div>
<script src="ajax.js"></script>
</body>
</html>

<?php
    mysqli_close($connection);
?>