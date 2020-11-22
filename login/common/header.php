<!-- Navbar -->
<?php
  $sql_get=mysqli_query($con,"SELECT * FROM message WHERE status=1");
  if(mysqli_num_rows($sql_get)>0)
    $not_count++;
  $count=mysqli_num_rows($sql_get);
?>
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Starfest</a>
  <!-- <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a> -->
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a>
  <div class="w3-dropdown-hover w3-hide-small w3-right">
    <a href="../../message/index.php">
    <button class="w3-button w3-padding-large" title="My Account">
    <img src="../../img/avatar3.png" class="w3-circle" style="height:23px;width:23px" alt="Avatar">
    </button>
    </a>
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
    <a class="w3-bar-item w3-button" href="../common/logout.php">Log out</a>
    </div>
  </div>
  <!-- <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a> -->
  <div class="w3-dropdown-hover w3-hide-small w3-right">
    <a href="../../message/index.php">
    <button class="w3-button w3-padding-large" title="Messages"><i class="fa fa-envelope"></i><span class="w3-badge w3-right w3-small w3-green"><?php echo $count; ?></span></button>
    </a>
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
    <?php
          $sql_getmsg=mysqli_query($con,"SELECT * FROM message WHERE status=1");
          if(mysqli_num_rows($sql_getmsg)>0){
            while($result=mysqli_fetch_assoc($sql_getmsg)){
              // href="../message/index.php?id='.$result['id'].'"
              echo '<a class="w3-bar-item w3-button" href="../../message/index.php">'.$result['message'].'</a>';
            }
          }
          else{
            echo '<a class="w3-bar-item w3-button" href="#">No new messages!</a>';
          }
      ?>
    </div>
  </div>
  <div class="w3-dropdown-hover w3-hide-small w3-right">
    <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green"><?php echo $not_count; ?></span></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
    <?php
          $sql_getmsg=mysqli_query($con,"SELECT * FROM message WHERE status=1");
          if(mysqli_num_rows($sql_getmsg)>0){
            echo '<a class="w3-bar-item w3-button" href="../../message/index.php">You have '.$count.' new messages</a>';
          }
          else{
            echo '<a class="w3-bar-item w3-button" href="#">No new notifications!</a>';
          }
      ?>
    </div>
  </div>
  
 </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
</div>