<?php
require_once('connection.php');
?>

<!DOCTYPE html>

<html lang="">

<head>
  <title>Starfest</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

  <link href="layout/styles/work.css" rel="stylesheet" type="text/css" media="all">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
  <link href="layout/styles/mainwork.css" rel="stylesheet" type="text/css" media="all">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body id="top">

  <div class="wrapper row0">
    <div id="topbar" class="hoc clear">
    </div>
  </div>
  <div class="wrapper row1">
  </div>

  <br><br><br>
  <div class="sectiontitle">

    <?php
    if ($_GET['check_id'] == 1) {
      $check_id = $_GET['check_id'];
      // $dd = '2020-11-13';
      $dd = date("Y-m-d");
      $sql = "SELECT * FROM event where type='public' AND date < '{$dd}'";
      $result = mysqli_query($connection, $sql);
      echo '<b> <h1 class="logoname"><span>Finished Events</span></h1>';
    } else {
      $check_id = $_GET['check_id'];
      // $dd = '2020-11-13';
      $dd = date("Y-m-d");
      $sql = "SELECT * FROM event where type='public' AND date > '{$dd}'";
      $result = mysqli_query($connection, $sql);
      echo '<b> <h1 class="logoname"><span>Up Comming Events</span></h1>';
    }
    ?>

    <ul class="nospace group overview">

      <?php
      while ($row = mysqli_fetch_assoc($result)) {

      ?>
        <div class="w3-third w3-margin-bottom">
          <ul class="w3-ul w3-border w3-hover-shadow">
            <li class="w3-theme-l2">

              <h6 class="heading"><?php echo $row["event_name"]; ?></h6>
              <?php echo "<li><img src='../../create_event/upload/{$row['image']}' alt='{$row['event_name']}' class='gallery'></li>"; ?>
              </a></p>
            </li>
            <li class="w3-padding-16">
              <p><?php echo $row["description"]; ?></p>
            </li>
            <li>
              <footer><a class="btn" href="report/index.php?id=<?= $row['event_id']; ?>">TICKET DETAILS</a></footer>
            </li>

          </ul>
        </div>
      <?php
      }

      ?>

    </ul>

  </div>

  <a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
</body>

</html>
<?php
mysqli_close($connection);
?>