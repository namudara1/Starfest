<?php
session_start();
include_once "../../config/connection.php";
$not_count = 0;
?>

<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<style>
  html,
  body,
  h1,
  h2,
  h3,
  h4,
  h5 {
    font-family: "Open Sans", sans-serif
  }
</style>

<body class="w3-theme-l5">

  <?php include('../common/header.php'); ?>

  <!-- Page Container -->
  <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
    <!-- The Grid -->
    <div class="w3-row">
      <!-- Left Column -->
      <div class="w3-col m3" style="display:flex; width:100%">
        <!-- Profile -->
        <div class="w3-card w3-round w3-white" style="width:25%">
          <div class="w3-container">
            <h4 class="w3-center">My Profile</h4>
            <p class="w3-center"><img src="../../img/avatar3.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
            <hr>

            <p><i class="fa fa-user fa-fw w3-margin-right w3-text-theme"></i> System Admin</p>
            <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Admin</p>
            <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> Colombo, Sri Lanka</p>
          </div>

        </div>

        <div class="callender">
          <div class="title_t">
            <h1>Public Event Ticket Details</h1>
          </div>

          <!-- <hr style="color:black"> -->
          <form method="POST" action="search_data.php">
            <div class="form-row">
              <div class="name">Date</div>
              <div class="value">
                <div class="input-group">
                  <input class="input_date" type="date" name="date">
                </div>
              </div>
              <button class="submit_date-set">Submit</button>
            </div>

          </form>

          <?php
          $check_id_finished = 1;
          $check_id_Up = 2;

          echo '<a href="admin_view.php?check_id=' . $check_id_finished . '"><button id="redirect_button" class="redirect1">Finished Events</button></a>';
          echo '<a href="admin_view.php?check_id=' . $check_id_Up . '"><button id="redirect_button" class="redirect2">Up Comming Events</button></a>';
          ?>

        </div>

      </div>
      <!-- End Grid -->
    </div>
    <!-- End Page Container -->
  </div>
  <br>

  <script>
    // Accordion
    function myFunction(id) {
      var x = document.getElementById(id);
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
      } else {
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className =
          x.previousElementSibling.className.replace(" w3-theme-d1", "");
      }
    }

    // Used to toggle the menu on smaller screens when clicking on the menu button
    function openNav() {
      var x = document.getElementById("navDemo");
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
      } else {
        x.className = x.className.replace(" w3-show", "");
      }
    }
  </script>

</body>

</html>