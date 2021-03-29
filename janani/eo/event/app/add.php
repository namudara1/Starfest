<?php


session_start();

echo $_SESSION['firstMessage'];
$a= $_SESSION['firstMessage'];
 



if(isset($_POST['title'])){
    require '../db_conn.php';

    $title = $_POST['title'];

    if(empty($title)){
        header("Location: ../index3.php?mess=error");
    }else {
        $stmt = $conn->prepare("INSERT INTO public_ticket_price(title,event_id) VALUE(?,$a)");
        $res = $stmt->execute([$title]);

        if($res){
            header("Location: ../index3.php?mess=success"); 
        }else {
            header("Location: ../index3.php");
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../index3.php?mess=error");
}