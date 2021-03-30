<?php
require_once('connection.php');
session_start();

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
    <div class="center">
        <div class="container">
            <div class="text">
                <h1>Booking Tickets</h1>
                <hr class="new1">
            </div>


            <div class="ticket_container">

                <table id="carttable">
                    <tr>
                        <th>
                            <h2 class="text2">DESCRIPTION</h2>
                        </th>
                        <th>
                            <h2 class="text3">QUANTITY</h2>
                        </th>
                        <th>
                            <h2 class="text4">TOTAL</h2>
                        </th>
                        <th>
                            <h2 class="text5">REMOVE</h2>
                        </th>
                    </tr>
                    <?php

                    $user_id = $_SESSION['user_id'];
                    $event_id = $_SESSION['event_id'];

                    $query1 = "SELECT * FROM event where event_id='$event_id'";
                    $result_set1 = mysqli_query($connection, $query1);
                    $record1 = mysqli_fetch_assoc($result_set1);
                    $event_name = $record1['event_name'];

                    $query = "SELECT * FROM cart where user_id='$user_id'";

                    $result_set = mysqli_query($connection, $query);


                    if ($result_set) {
                        $count = 0;
                        while ($record = mysqli_fetch_assoc($result_set)) {
                            echo '<tr>';
                            $user_id = $user_id;
                            $price = $record['ticket_price'];
                            $quantity = $record['quantity'];
                            $amount = $record['amount'];
                            $event_idd = $record['event_id'];
                            $k = $user_id + $price;

                            echo '<td>';
                            echo $price;
                            echo '</td>';
                            echo '<td >';
                            echo '<div class= "btn_t">';
                            echo '<button class="btn_minus" onclick="minus_ticket(' . $price . ',' . $event_idd . ',' . $user_id . ',' . $quantity . ', ' . $amount . ',' . $count . ')">-</button>';
                            echo '<div class="q_btn" id="quantity-' . $count . '">' . $quantity . '</div>';
                            echo '<button class="btn_plus" onclick="plus_ticket(' . $price . ',' . $event_idd . ',' . $user_id . ',' . $quantity . ', ' . $amount . ',' . $count . ')">+</button>';
                            echo '</div>';
                            echo '</td>';
                            echo '<td>';
                            echo '<div id="amount-' . $count . '">' . $amount . '</div>';
                            echo '</td>';
                            echo '<td>';
                            echo '<button class="btn_rm_cart" onclick="remove_to_cart(' . $price . ',' . $event_idd . ',' . $user_id . ')"></button>';
                            echo '</td>';

                            echo '</tr>';

                            $count++;
                        }
                    }
                    ?>
                </table>

            </div>
            <div class="check_out">
                <a href="../paypage/payment.php?"><button class="chk-out">Check Out</button>

            </div>
        </div>
    </div>
    <script src="cart.js"></script>
</body>

</html>
<?php
mysqli_close($connection);
?>