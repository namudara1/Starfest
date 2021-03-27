<?php 
    session_start();
    require_once('connection.php');
    //include_once "../config/connection.php";
    $not_count = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css" >
  <!-- <link rel="stylesheet" href="../dashboard/css/style.css"> -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet"/>
  <title>pay page</title>
</head>
<body>
<div class="frame">
<div class="wrapper">
        <div class="payment">
          <h1>Payment Details</h1>
          <form action="./charge.php" method="post" id="payment-form">

              <div class="form-row">
              
              <div class="amount">
  <?php 
  
  //*******************methenta session eka denn ona */
  $ep_id = $_SESSION['user_id'];
  // $ep_id = 32;
  
  $query = "SELECT SUM(amount) AS amount FROM cart WHERE user_id='$ep_id'";

  $result_set = mysqli_query($connection, $query);  
       $record = mysqli_fetch_assoc($result_set);
      $amount = $record['amount'];
      echo '<div class= "amo">';
      echo ("Total Amount:  $amount");
      echo '</div>';
?>
      
              </div>
              
              
              <label for="card-element">
                <div class="te">
                Credit or debit card
                </div>
              </label>
              <div id="card-element">
              <!-- A Stripe Element will be inserted here. -->
              </div>

              <!-- Used to display form errors. -->
             <div id="card-errors" role="alert"></div>
             </div>

            <button>Submit Payment</button>
          </form>
        </div>
    </div>
</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <script src="./js/charge.js"></script>
  
  

</body>
</html>

<?php mysqli_close($connection); ?>