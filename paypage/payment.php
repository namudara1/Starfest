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
<?php //include('../common/header.php'); ?>
<div class="frame">
<div class="wrapper">
        <div class="payment">
          <h1>Payment Details</h1>
          <form action="./charge.php" method="post" id="payment-form">
              <div class="form-row">
              <div class="receiver">
                  <input type="text" class="input" name="receiver" placeholder="Receiver's Name">
              </div>
              <div class="purpose">
                  <input type="text" class="input" name="purpose" placeholder="Purpose">
              </div>
              <div class="email">
                  <input type="text" class="input" name="email" placeholder="Email">
              </div>
              <div class="amount">
                  <input type="text" class="input" name="amount" placeholder="Amount(RS.)">
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