<?php
require_once('connection.php'); ?>
<?php

header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';
echo '<response>';

$price = $_GET['q'];
$event_id = $_GET['p'];
$user_id = $_GET['r'];
$issue_tickets = $_GET['r'];
$quatity = $_GET['r'];

if (mysqli_connect_error()) {
  die('Database connection faild' . $connection->connect_error);
} else {
  echo $sqll = "SELECT user_id FROM cart WHERE user_id='$user_id' AND event_id='$event_id' AND ticket_price='$price'";
  $result = $connection->query($sqll);
  if ($result->num_rows == 0) {
    $sql = "INSERT INTO cart(user_id, event_id, amount, ticket_price, quantity) VALUES('$user_id','$event_id','$price','$price','1')";
    $connection->query($sql);
  }
}

echo '</response>';
?>
<?php
mysqli_close($connection);
?>