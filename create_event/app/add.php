<?php


session_start();

echo $_SESSION['firstMessage'];
$a= $_SESSION['firstMessage'];
 



if(isset($_POST['ticket_price'])){
    require '../db_conn.php';

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "starfest";
    // Create connection
    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
    


    $ticket_price = $_POST['ticket_price'];
    $category = $_POST['category'];
    $category1 = $_POST['category1'];
    $quantity = $_POST['quantity'];


    if(empty($ticket_price)){
        header("Location: ../index3.php?mess=error");
    }else {

        if($category!='others'){

        $sql = "INSERT INTO public_ticket_price (ticket_price,event_id,quantity,category,issue_tickets)
        values ($ticket_price,$a,$quantity,'$category',0)";
        
        }
        else{


            $sql = "INSERT INTO public_ticket_price (ticket_price,event_id,quantity,category,issue_tickets)
            values ($ticket_price,$a,$quantity,'$category1',0)";

        }
        
        if ($conn->query($sql)){
            header("Location: ../index3.php?mess=success"); 
        }
        else{
        echo "Error: ". $sql ."
        ". $conn->error;
        }
        $conn->close();
        }
        // }
        // else{
        // echo "Password should not be empty";
        // die();
        // }
        }
        else{
        echo "error";
        die();
        }