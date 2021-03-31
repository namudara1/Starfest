<?php 
require_once('connection.php'); 

$response = [];

if(isset($_GET['q'])){
  $price = $_GET['q'];
  $event_id = $_GET['p'];
  $user_id = $_GET['r'];

  if(mysqli_connect_error()){
      die('Database connection faild' . $connection->connect_error);
  }

  else {
      $sqll = "DELETE FROM cart WHERE user_id='$user_id' AND event_id='$event_id' AND ticket_price='$price'";     
      mysqli_query($connection,$sqll);
    }
  }elseif(isset($_GET['l'])){
    //plus tickets

    $price1 = $_GET['l'];
    $event_id1 = $_GET['m'];
    $user_id1 = $_GET['n'];
    $quanty = $_GET['j'];
    $amount = $_GET['h'];

    if(mysqli_connect_error()){
      die('Database connection faild' . $connection->connect_error);
  }

  else {
        $sqll1 = "SELECT * FROM public_ticket_price WHERE event_id='$event_id1' AND ticket_price='$price1'";
        $result1 = $connection->query($sqll1);
        $record1 = mysqli_fetch_assoc($result1);
        $quatity1 = $record1 ['quantity'];
        $issue_tickets1 = $record1 ['issue_tickets'];

        if ($quatity1 >= $issue_tickets1){
            $sql="UPDATE cart SET quantity = quantity + 1 , amount = amount + $price1 where user_id = '$user_id1' And event_id = '$event_id1' AND ticket_price = '$price1'";
            $connection->query($sql);
            $response['quanty'] = $quanty + 1;
            $response['amount'] = $amount + $price1;
            echo (json_encode($response));
        }
    }

    // minus tickets
  }elseif(isset($_GET['k'])){
      $price2 = $_GET['k'];
      $event_id2 = $_GET['kk'];
      $user_id2 = $_GET['kkk'];
      $quanty = $_GET['kkkk'];
      $amount = $_GET['kkkkk'];

      if(mysqli_connect_error()){
        die('Database connection faild' . $connection->connect_error);
    }

    else {    
      if($quanty > 1){ 
        $sql3="UPDATE cart SET quantity = quantity - 1 , amount = amount - $price2 WHERE user_id = '$user_id2' And event_id = '$event_id2' and ticket_price = '$price2' ";
        $connection->query($sql3);
        $response['quanty'] = $quanty - 1;
        $response['amount'] = $amount - $price2;
        echo (json_encode($response));

      }
      else{
        $response['quanty'] = $quanty;
        $response['amount'] = $amount;
        echo (json_encode($response));
      }        
      }
  }

    mysqli_close($connection);
