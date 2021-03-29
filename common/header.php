<!-- Navbar -->
<?php
  $not_count=0;
  $sql_getusertype = mysqli_query($con,"SELECT type FROM user WHERE id = '".$_SESSION['user_id']."' ");
  $usertype=mysqli_fetch_assoc($sql_getusertype);
  if($usertype["type"] == "sp"  || $usertype["type"] == "eo"){
  $sql_get=mysqli_query($con,"SELECT * FROM message WHERE status=1 and reciever_userid = '".$_SESSION['user_id']."'");
  if(mysqli_num_rows($sql_get)>0)
    $not_count++;
  $msgcount=mysqli_num_rows($sql_get);
  $sql_get=mysqli_query($con,"SELECT * FROM document WHERE status=1 and reciever_userid = '".$_SESSION['user_id']."'");
  if(mysqli_num_rows($sql_get)>0)
    $not_count++;
  $doccount=mysqli_num_rows($sql_get);
  }
  if($usertype["type"] == "eo"){
  $sql_get=mysqli_query($con,"SELECT date FROM event WHERE eo_id IN (SELECT eo_id from event_organizer where id = '".$_SESSION['user_id']."')");
  while ($row = $sql_get->fetch_assoc())
  {
    $oneweekbefore = date('Y-m-d', strtotime('-1 week', strtotime($row["date"])));
    $todate = date('Y-m-d');
    $today_time = strtotime($todate);
    if(($todate > $oneweekbefore) && $todate < strtotime($row["date"])){
      $not_count++;
    }
  }
}
if($usertype["type"] == "sp"){
  $sql_getreqsp=mysqli_query($con,"SELECT * FROM event_request WHERE status='pending' and sp_userid = '".$_SESSION['user_id']."'");
  if(mysqli_num_rows($sql_getreqsp)>0){
    $not_count++;
  }
}
// if($usertype["type"] == "ep"){
//   $sql_get=mysqli_query($con,"SELECT event_name,date FROM event WHERE eo_id IN (SELECT eo_id from event_organizer where id = '".$_SESSION['user_id']."')");
//   while ($row = $sql_get->fetch_assoc())
//   {
//     $todate = date('Y-m-d');
//     foreach($row as $value){
//       if($todate > $value){
//         $not_count++;
//       }
//     }
//   }
//   $count=$msgcount+$doccount;
// }
  
?>
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="../login/eo/index.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Starfest</a>
  <!-- <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a> -->
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a>
  <div class="w3-dropdown-hover w3-hide-small w3-right">
    <a href="../../message/index.php">
    <button class="w3-button w3-padding-large" title="My Account">
    <img src="../img/avatar3.png" class="w3-circle" style="height:23px;width:23px" alt="Avatar">
    </button>
    </a>
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
    <a class="w3-bar-item w3-button" href="../common/logout.php">Log out</a>
    </div>
  </div>
  <!-- <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a> -->
  <div class="w3-dropdown-hover w3-hide-small w3-right">
  <?php
  if($usertype["type"] == "eo" || $usertype["type"] == "sp"){
    echo '<a href="../../message/index.php">
    <button class="w3-button w3-padding-large" title="Messages"><i class="fa fa-envelope"></i><span class="w3-badge w3-right w3-small w3-green">'.$msgcount.'</span></button>
    </a>
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:220px">';
          $sql_getmsg=mysqli_query($con,"SELECT COUNT(sender_userid) as sender,sender_userid FROM message WHERE status=1 and reciever_userid = '".$_SESSION['user_id']."' GROUP BY sender_userid");
          if(mysqli_num_rows($sql_getmsg)>0){
            while($result=mysqli_fetch_assoc($sql_getmsg)){
              // href="../message/index.php?id='.$result['id'].'"
              $sql_getmsgsender=mysqli_query($con,"SELECT email FROM user WHERE id = '".$result['sender_userid']."'");
              $senderResult=mysqli_fetch_assoc($sql_getmsgsender);
              echo '<a class="w3-bar-item w3-button" href="../../message/index.php">'.$result['sender'].' new messages from '.$senderResult['email'].'</a><hr style="height:2px;border-width:0;color:gray;background-color:gray;margin:0;">';
            }
          }
          else{
            echo '<a class="w3-bar-item w3-button" href="#">No new messages!</a><hr style="height:2px;border-width:0;color:gray;background-color:gray;margin:0;">';
          }
      
    echo '</div>';
        }?>
  </div>
  <div class="w3-dropdown-hover w3-hide-small w3-right">
  <?php
  if($usertype["type"] != "ad")
    echo '<button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">'.$not_count.'</span></button>';

    ?>
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px;height:500px;overflow:auto;">
    <?php
    if($usertype["type"] == "sp"){
      echo '<div class="w3-bar-item w3-button" style="background-color: lightblue;text-align: center;">Event Requests</div>
      <div class="w3-container" >';
      $sql_getreq=mysqli_query($con,"SELECT * FROM event_request WHERE status='pending' and sp_userid = '".$_SESSION['user_id']."'");
      while ($row = $sql_getreq->fetch_assoc()){
        $sql_getEventDet=mysqli_query($con,"SELECT event_name,date,time FROM event WHERE event_id = '".$row['event_id']."' ");
        $res =$sql_getEventDet->fetch_assoc();
        echo '<div class="reqitem"><a href="../home/view.php?id='.$row["event_id"].'" style="text-decoration: none;"><span>'.$res['event_name'].' on '.$res['date'].' at '.$res['time'].'</span></a>';
        echo '<div class="w3-row w3-opacity">
              <div class="w3-half">
                <button event-id= "'.$row['id'].'" class="w3-button w3-block w3-green w3-section" title="Accept" id="request-accept"><i class="fa fa-check"></i></button>
              </div>
              <div class="w3-half">
                <button event-id= "'.$row['id'].'" class="w3-button w3-block w3-red w3-section" title="Decline" id="request-decline"><i class="fa fa-remove"></i></button>
              </div>
            </div><hr style="height:2px;border-width:0;color:gray;background-color:gray;margin:0;">
            </div>';
      }
      if(mysqli_num_rows($sql_getreq)<=0){
        echo '<a class="w3-bar-item w3-button" href="#">No new event requests!</a><hr style="height:2px;border-width:0;color:gray;background-color:gray;margin:0;">';
      }
      echo '</div>';
    }
    if($usertype["type"] == "eo" || $usertype["type"] == "sp"){
          echo '<div class="w3-bar-item w3-button" style="background-color: lightblue;text-align: center;">Messages</div>';
          $sql_getmsg=mysqli_query($con,"SELECT * FROM message WHERE status=1 and reciever_userid = '".$_SESSION['user_id']."'");
          if(mysqli_num_rows($sql_getmsg)>0){
            echo '<a class="w3-bar-item w3-button" href="../../message/index.php">You have '.$msgcount.' new messages</a><hr style="height:2px;border-width:0;color:gray;background-color:gray;margin:0;">';
          }
          else{
            echo '<a class="w3-bar-item w3-button" href="#">No new messages!</a><hr style="height:2px;border-width:0;color:gray;background-color:gray;margin:0;">';
          }
          echo '<div class="w3-bar-item w3-button" style="background-color: lightblue;text-align: center;">Documents</div>';
          $sql_getmsg=mysqli_query($con,"SELECT * FROM document WHERE status=1 and reciever_userid = '".$_SESSION['user_id']."'");
          if(mysqli_num_rows($sql_getmsg)>0){
            echo '<a class="w3-bar-item w3-button" href="../../fileupload/index.php">You have '.$doccount.' new documents</a><hr style="height:2px;border-width:0;color:gray;background-color:gray;margin:0;">';
          }
          else{
            echo '<a class="w3-bar-item w3-button" href="#">No new documents!</a><hr style="height:2px;border-width:0;color:gray;background-color:gray;margin:0;">';
          }
        }
          // if($not_count==0){
          //   echo '<a class="w3-bar-item w3-button" href="#">No new notifications!</a>';
          // }
          
          echo '<div class="w3-bar-item w3-button" style="background-color: lightblue;text-align: center;">Upcoming Events</div>';
          $sql_getEventDate=mysqli_query($con,"SELECT date FROM event WHERE eo_id IN (SELECT eo_id from event_organizer where id = '".$_SESSION['user_id']."')");
          $flag1 = 0;
          while ($row = $sql_getEventDate->fetch_assoc())
          {
            $oneweekbefore = date('Y-m-d', strtotime('-1 week', strtotime($row["date"])));
            
            $todate = date('Y-m-d');
            
            if(($todate > $oneweekbefore) && $todate < strtotime($row["date"])){
              $flag1 = 1;
              echo '<a class="w3-bar-item w3-button" href="#">You have an upcoming event on '.$row["date"].'</a><hr style="height:2px;border-width:0;color:gray;background-color:gray;margin:0;">';
            }
          }
          if($flag1 == 0)
            echo '<a class="w3-bar-item w3-button" href="#">No new upcoming events!</a><hr style="height:2px;border-width:0;color:gray;background-color:gray;margin:0;">';
          
            if($usertype["type"] == "ep")
            {
          echo '<div class="w3-bar-item w3-button" style="background-color: lightblue;text-align: center;">Rate Events</div>';
          $sql_getEventDetails=mysqli_query($con,"SELECT event_name,date,event_id FROM event WHERE eo_id IN (SELECT eo_id from event_organizer where id = '".$_SESSION['user_id']."')");
          $flag2 = 0;
          while ($row = $sql_getEventDetails->fetch_assoc())
          {
            $todate = date('Y-m-d');
            foreach($row as $value){
              if($todate > $value){
                $flag2 =1;
                echo '<a class="w3-bar-item w3-button" href="../../rating/index.php?id='.$row["event_id"].'">Rate event '.$row["event_name"].'</a><hr style="height:2px;border-width:0;color:gray;background-color:gray;margin:0;">';
              }
            }
          }
          if($flag2 == 0)
            echo '<a class="w3-bar-item w3-button" href="#">No new evets to rate!</a><hr style="height:2px;border-width:0;color:gray;background-color:gray;margin:0;">'; 
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