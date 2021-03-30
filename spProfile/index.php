<?php
 include_once "../config/connection.php";

 require 'db_conn1.php';

 session_start();
 $not_count = 0;



 if(isset($_GET['data1'])){
    $sp_id = $_GET['data1'];
    $user_id = $_GET['data2'];
 }
 
 $_SESSION['spid'] = $user_id;

 $_SESSION['unid'] = $sp_id;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/checkboxes.css">
    <link rel="stylesheet" href="../dashboard/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script> -->
    <script>
        function showDiv() {
             document.getElementById('welcomeDiv').style.display = "block";
        }
    </script>
</head>
<body>
<?php include('../common/header.php'); 

if(isset($_GET["id"])){
    $sp_id = $_GET["id"];
    $user_id = $_SESSION['user_id'];
    // echo $spid;


}


?>
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


$sql_getevents = mysqli_query($con,"SELECT event_name,date,event_id FROM event WHERE eo_id IN (SELECT eo_id from event_organizer where id = '".$_SESSION['user_id']."') ");

?>
                    <p >
                        <i></i><?php echo "Service Category: ";?> <?php echo "$row1[category]";?>
                    </p>
                    <p ><i ></i><?php echo "$row1[firstname]";?>  <?php echo "$row1[lastname]";?></p>

 
                    <div class="profile-btn">
                         <button class="chatbtn">
                         <a href="action.php" style="text-decoration: none;">
                             <i class="fa fa-comment"></i>Chat
                             </a>
                         </button>
                         <button class="createbtn" onclick="showDiv()">
                         <!-- <a href="request.php" style="text-decoration: none;"> -->
                             <i class="fa fa-plus"></i>Request 
                             <!-- </a> -->
                         </button>
                         
                    </div>
                    <div id="welcomeDiv"  style="display:none;" class="event_list" >
                        <ul>
                        <h4>Choose Event/s </h4>
                        <form method="post" action="request.php" enctype='multipart/form-data'>
                            <?php 
                                
                                while ($row = $sql_getevents->fetch_assoc())
                                {
                                    $todate = date('Y-m-d');
                                    if($todate < $row['date']){
                                    echo '<li> 
                                        <input name="check_list[]" type="checkbox" value="'.$row['event_id'].'">
                                        <label>'.$row['event_name'].'</label>
                                    </li>';
                                    }
                                }
                            ?>
                            <input type='submit' value='Submit Request' name='but_req'/>
                        </form>
                        </ul>
                    </div>
                    <div class="user-rating">
                        <h3 class="rating"><?php //echo $row['star_count']; ?>4.5</h3>
                            <div class="rate">
                                <div class="stars">
                                    <?php
                                // for ($x = 1; $x <= $row['star_count']; $x++) {
                                //         echo '<i class="fa fa-star"></i>';
                                //     }

                                //     for ($x = 1; $x <= (5-$row['star_count']); $x++) {
                                //         echo '<i class="fr fa-star"></i><!--Empty star-->';
                                //     }
                                ?>
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
                        <li onclick="tabs(0)" class="user-review active">Reviews</li>
                        <!-- <li onclick="tabs(1)" class="user-post">Posts</li> -->
                        <!-- <li onclick="tabs(1)" class="user-setting">Settings</li> -->
                        
                        
                    </ul>
                </div>
                <div class="profile-body">
                    
                    <!-- <div class="profile-settings tab">
                        <h1>Account Settings</h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fuga perferendis nisi aliquid quas cum incidunt dignissimos quos laboriosam iusto quam!</p>
                    </div> -->
                    <div class="profile-reviews tab">
                        <!-- <h1>User Reviews</h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fuga perferendis nisi aliquid quas cum incidunt dignissimos quos laboriosam iusto quam!</p> -->

        <section id="testimonials">

            <!--heading--->
            <div class="testimonial-heading">
                <span>Comments and Feedbacks</span>
                <!-- <h1></h1> -->
            </div>

            <!--testimonials-box-container------>
            <div class="testimonial-box-container">

                <?php 
                    $rtflag = 0;
                    $sql_getratings = mysqli_query($con,"SELECT * FROM rating WHERE sp_id = '".$_SESSION['spid']."' ");
                    while ($row = $sql_getratings->fetch_assoc())
                    {
                        $rtflag = 1; 
                    $sql_getusername = mysqli_query($con,"SELECT firstname from event_organizer where id = '".$row['eo_id']."' ");
                    $getname = mysqli_fetch_assoc($sql_getusername);

                echo '<div class="testimonial-box">
                    <div class="box-top">
                        <div class="profile">
                            <div class="pro-img">
                                <img src="../img/avatar3.png" />
                            </div>
                            <div class="name-user">
                                <strong>'.$getname['firstname'].'</strong>
                                <span>@'.$row['date'].'</span>
                            </div>
                        </div>

                        <div class="reviews">';

                        for ($x = 1; $x <= $row['star_count']; $x++) {
                            echo '<i class="fas fa-star"></i>';
                        }

                        for ($x = 1; $x <= (5-$row['star_count']); $x++) {
                            echo '<i class="far fa-star"></i><!--Empty star-->';
                        }
                        echo '</div>

                    </div>

                    <div class="client-comment">
                        <p>'.$row['feedback'].'</p>
                    </div>

                </div>';

                }
                if($rtflag == 0){
                    echo '<p>No reviews yet</p>' ;
                } ?>

            </div>

        </section>
                    </div>
                    <!-- <div class="profile-posts tab">
                        <h1>Your Posts</h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fuga perferendis nisi aliquid quas cum incidunt dignissimos quos laboriosam iusto quam!</p>
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
                    </div> -->
                    
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