<?php 
require_once('connection.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Organizer Public event ticket dashboard</title>
</head>
<body>
    <div class="btn-container">
        <button href='#' id="button-payment" class="button-payment">issue tickets</button>
    </div>

    <div class="center">
        <div class="container">
            <div class="close">X</div>
            <!-- <button class="close"></button> -->
            <div class="text"><h1>Remaining Tickets</h1>
        <hr class="new1">
        </div>

        <div class="ticket-container">
            <table id="remainig_tickets">
                <th><h2 class="text1">Ticket Price</h2></th>
                <th><h2 class="text2">All Tickets</h2></th>
                <th><h2 class="text3">Sold Out Tickets</h2></th>
                <th><h2 class="text4">Remaining Tickets</h2></th>

            <?php
            //methana event id ek session krl dann 
            $event_id = 31;

            $query = "SELECT * FROM public_ticket_price WHERE event_id = '$event_id'";
            $result = mysqli_query($connection,$query);

            if($result){
                while($record = mysqli_fetch_assoc($result)){
                    echo '<tr>';
                     $ticket_price = $record ['ticket_price'];
                     $quantity = $record ['quantity'];
                     $sold_ticket = $record['issue_tickets'];
                     $remaining_tickets = $quantity - $sold_ticket;
                     
                        echo '<td>';
                            echo $ticket_price;
                        echo '</td>';
                        echo '<td >';                            
                            echo $quantity;
                        echo '</td>';
                        echo '<td>';
                            echo $sold_ticket;
                        echo '</td>';
                        echo '<td>';
                            echo $remaining_tickets;
                        echo '</td>';
                    
                     echo '</tr>';
                }
            }

            ?>
            </table>

        </div>
        </div>
    </div>

<script src="remianing.js"></script> 
</body>

</html>

<?php
    mysqli_close($connection);
?>