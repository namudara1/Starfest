<?php

require_once('connection.php'); 
session_start();

$e_type = $_GET['data2'];
$e_id = $_GET['data1'];

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
    <title> Event tickets</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/ticket_details.css" rel="stylesheet" media="all">

<style>
#ifYes, #ifNo { display: none;}
#yesCheck:checked ~ #ifYes {display: block;} 
#noCheck:checked ~ #ifNo {display: block;}
</style>
</head>

<body>

    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Ticket Details</h2>
                </div>
                <div class="card-body">

                <table id = "ticket_table">
                <tr>
                    <th><h2 class="text1">Ticket Price</h2></th>
                    <th><h2 class="text1">Quantity</h2></th>
                    <th><h2 class="text1">Issued Tickets</h2></th>
                    <th><h2 class="text1">Available Tickets</h2></th>
                </tr>
             
            <?php
             
             $query = "SELECT * FROM public_ticket_price where event_id='$e_id'";

             $result_set = mysqli_query($connection, $query);


             if($result_set){
                 while ($record = mysqli_fetch_assoc($result_set)){
                     $t_price = $record ['ticket_price'];
                     $quantity = $record ['quantity'];
                     $issue_ticket = $record ['issue_tickets'];
                     $ava_tick = $quantity - $issue_ticket;
                     echo '<tr>';
                     
                        echo '<td>';
                            echo $t_price;
                        echo '</td>';
                        echo '<td >';
                            echo $quantity;
                        echo '</td>';
                        echo '<td>';
                            echo $issue_ticket;
                        echo '</td>';
                        echo '<td>';
                            echo $ava_tick;
                        echo '</td>';
                    echo '</tr>';
                }
            }
            ?>
            </table>         
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
<!-- end document-->

<?php
    mysqli_close($connection);
?>