<?php require_once('connection.php');

  session_start();  

  require_once('vendor/autoload.php');

  // Set your secret key. Remember to switch to your live secret key in production.
  // See your keys here: https://dashboard.stripe.com/account/apikeys
  \Stripe\Stripe::setApiKey('sk_test_51Ho62uJixMHAqmvGxoc5jdNsJJWWDZk0sXHldeA6jGHV84rPlemuBinak6I6IKUycnf48rOKHGkf6k1JxPu2dF2600I8YkHRJT');

  $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

  $token = $POST['stripeToken'];
  //***********methana session id eka */
  $ep_id = $_SESSION['user_id'];
  // $ep_id = 32;

  $query = "SELECT SUM(amount) AS amount FROM cart WHERE user_id='$ep_id'";
  $result_set = mysqli_query($connection, $query); 
  $record = mysqli_fetch_assoc($result_set);
  $amount = $record['amount'];

  $query1 = "SELECT * FROM user where id=$ep_id";
  $result_set1 = mysqli_query($connection, $query1);
  $record1 = mysqli_fetch_assoc($result_set1);
  $email = $record1['email'];
  $des = ("Payment by user id:");
  $purpose = $des . ' ' .$ep_id;

  $token = $_POST['stripeToken'];
  $customer = \Stripe\customer::create([
    "email" => $email,
    "source" => $token
  ]);

  $charge = \Stripe\Charge::create([
    "amount" => $amount,
    "currency" => "usd",
    "description" => $purpose,
    "customer" => $customer->id
  ]);
   
  //sent data in to database
  
  $query2 = "SELECT * FROM cart where user_id=$ep_id";
  $result_set2 = mysqli_query($connection, $query2);

  if($result_set2){
    while ($record2 = mysqli_fetch_assoc($result_set2)){
      $event_id = $record2['event_id'];
      $quanty1 = $record2['quantity'];
      $ticket_price1 = $record2['ticket_price'];
      
      $sql1 = "INSERT INTO issued_ticket_details (user_id, event_id, ticket_price,	booked_quantity)
      values ('$ep_id','$event_id','$ticket_price1','$quanty1')";
      $connection->query($sql1);
    }
  }

  // delete a record
$sql3 = "DELETE FROM cart WHERE user_id=$ep_id";
$connection->query($sql3);

  //redirect to success
 header('Location: ./db/success.php');

?>
<?php mysqli_close($connection); ?>
  