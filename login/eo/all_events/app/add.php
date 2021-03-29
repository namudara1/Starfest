<?php


session_start();

echo $_SESSION['firstMessage'];
$a= $_SESSION['firstMessage'];
 
echo $_SESSION['secondMessage'];


if(isset($_POST['title'])){
    require '../db_conn.php';

    $title = $_POST['title'];

    if(empty($title)){
        header("Location: ../index.php?mess=error");
    }else {
        $stmt = $conn->prepare("INSERT INTO todo_item(title,event_id,empty) VALUE(?,$a,0)");
        $res = $stmt->execute([$title]);

        if($res){
            header("Location: ../event_dashboard.php?mess=success"); 
        }else {
            header("Location: ../event_dashboard.php");
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../event_dashboard.php?mess=error");
}