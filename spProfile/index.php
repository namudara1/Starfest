<?php
 include_once "../config/connection.php";

 require 'db_conn1.php';

 session_start();
 $not_count = 0;

//  $spid = $_SESSION['spid'];

//  echo '$spid';

//  $userid = $_SESSION['userid'];

//  echo '$userid';


 $sp_id = $_GET['data1'];
 $user_id = $_GET['data2'];
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../dashboard/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <script>
        $(document).ready(function(){
            $('#MyButton').click(function(){
            CapacityChart();
            });
        });
    </script>
</head>
<body>
<?php include('../common/header.php'); ?>
    <div class="container">
        <div class="profile-header">
            <div class="profile-img">
                <img src="Starfest.png" width="200" alt="Starfest Inc logo">
            </div>
            <div class="profile-nav-info">
                <h3 class="user-name">Starfest Inc</h3>
                <div class="address">
                    <p class="state">London,</p>
                    <span class="country">United Kingdom</span>
                </div>
            </div>
         
        </div>
        <div class="main-bd">
            <div class="left-side">
                <div class="profile-side">

<?php


$sql1 = "SELECT * FROM service_provider where sp_id='$sp_id' ";

$result1 = mysqli_query($conn1,$sql1) ;
$row1 = mysqli_fetch_array($result1);




?>
                    <p >
                        <i></i><?php echo "Service Category: ";?> <?php echo "$row1[category]";?>
                    </p>
                    <p ><i ></i><?php echo "$row1[firstname]";?>  <?php echo "$row1[lastname]";?></p>

 
                    <div class="profile-btn">
                    <!-- <form method="post" action="action.php" enctype='multipart/form-data'> -->
                         <button class="chatbtn">
                         <a href="action.php" style="text-decoration: none;">
                             <i class="fa fa-comment"></i>Chat
                             </a>
                         </button>
                         <!-- <input class="chatbtn" type='submit' value='Chat' name='but_chat'/> -->
                         <button class="createbtn">
                             <i class="fa fa-plus"></i>Request 
                         </button>
						<!-- </form> -->
                    </div>
                    <div class="user-rating">
                        <h3 class="rating">4.5</h3>
                            <div class="rate">
                                <div class="stars">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <span class="no-user"><span>123</span>&nbsp;&nbsp; reviews     
                            </span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="right-side">
                <div class="nav">
                    <ul>
                        <li onclick="tabs(0)" class="user-post active">Posts</li>
                        <!-- <li onclick="tabs(1)" class="user-setting">Settings</li> -->
                        <li onclick="tabs(1)" class="user-review">Reviews</li>
                        
                    </ul>
                </div>
                <div class="profile-body">
                    <div class="profile-posts tab">
                        <h1>Your Posts</h1>
                        <!-- <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fuga perferendis nisi aliquid quas cum incidunt dignissimos quos laboriosam iusto quam!</p> -->
                        <div class="gallery">
                            <div class="img-w"><img src="https://images.unsplash.com/photo-1485766410122-1b403edb53db?dpr=1&auto=format&fit=crop&w=1500&h=846&q=80&cs=tinysrgb&crop=" alt="" /></div>
                            <div class="img-w"><img src="https://images.unsplash.com/photo-1485793997698-baba81bf21ab?dpr=1&auto=format&fit=crop&w=1500&h=1000&q=80&cs=tinysrgb&crop=" alt="" /></div>
                            <div class="img-w"><img src="https://images.unsplash.com/photo-1485871800663-71856dc09ec4?dpr=1&auto=format&fit=crop&w=1500&h=2250&q=80&cs=tinysrgb&crop=" alt="" /></div>
                            <div class="img-w"><img src="https://images.unsplash.com/photo-1485871882310-4ecdab8a6f94?dpr=1&auto=format&fit=crop&w=1500&h=2250&q=80&cs=tinysrgb&crop=" alt="" /></div>
                            <div class="img-w"><img src="https://images.unsplash.com/photo-1485872304698-0537e003288d?dpr=1&auto=format&fit=crop&w=1500&h=1000&q=80&cs=tinysrgb&crop=" alt="" /></div>
                            <div class="img-w"><img src="https://images.unsplash.com/photo-1485872325464-50f17b82075a?dpr=1&auto=format&fit=crop&w=1500&h=1000&q=80&cs=tinysrgb&crop=" alt="" /></div>
                            <div class="img-w"><img src="https://images.unsplash.com/photo-1470171119584-533105644520?dpr=1&auto=format&fit=crop&w=1500&h=886&q=80&cs=tinysrgb&crop=" alt="" /></div>
                            <div class="img-w"><img src="https://images.unsplash.com/photo-1485881787686-9314a2bc8f9b?dpr=1&auto=format&fit=crop&w=1500&h=969&q=80&cs=tinysrgb&crop=" alt="" /></div>
                            <div class="img-w"><img src="https://images.unsplash.com/photo-1485889397316-8393dd065127?dpr=1&auto=format&fit=crop&w=1500&h=843&q=80&cs=tinysrgb&crop=" alt="" /></div>
                        </div>
                    </div>
                    <!-- <div class="profile-settings tab">
                        <h1>Account Settings</h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fuga perferendis nisi aliquid quas cum incidunt dignissimos quos laboriosam iusto quam!</p>
                    </div> -->
                    <div class="profile-reviews tab">
                        <h1>User Reviews</h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fuga perferendis nisi aliquid quas cum incidunt dignissimos quos laboriosam iusto quam!</p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="main.js"></script>
    <script src="js/index.js"></script>
</body>
</html>