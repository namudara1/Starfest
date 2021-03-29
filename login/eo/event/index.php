<?php

require 'db_conn1.php';



session_start();

$e_id = $_GET['data1'];

$sql1 = "SELECT * FROM event where event_id='$e_id' ";

$result1 = mysqli_query($conn1,$sql1) ;
$row1 = mysqli_fetch_array($result1);
$ename=$row1['event_name'];

// echo $ename;

//$image1 = $row1['image'];

$currentId=$e_id;

// echo $e_id;





?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title> Event Details</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">

    <!-- <script>

// function check2(x){

// if(x==0)
// document.getElementById('c2_check').style.display='block';

// else
// document.getElementById('c2_check').style.display='none';
// return;

// }

function check1(x){

if(x==0)
document.getElementById('isBox').style.display='block.c1_check';
//document.getElementById('c2_check').style.display='none';
// else
//document.getElementById('c1_check').style.display='none';
else
document.getElementById('isBox').style.display='block.c2_check';

return;

}


</script> -->
<style>
#ifYes, #ifNo { display: none;}
#yesCheck:checked ~ #ifYes {display: block;} 
#noCheck:checked ~ #ifNo {display: block;}
</style>
</head>

<body>

    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Event Details</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="data.php?data3=<?php echo $e_id?>" enctype="multipart/form-data">
                    
                        <div class="form-row m-b-55">
                            <div class="name">Event Name</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="event_name" value="<?php echo $row1['event_name']?>">
                                </div>
                            </div>   
                        </div>
                        <div class="form-row">
                            <div class="name">Event Venue</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="venue" value="<?php echo $row1['venue']?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Date</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="date" name="date" value="<?php echo $row1['date']?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Time</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="time" name="time" value="<?php echo $row1['time']?>">
                                </div>
                            </div>
                        </div>
                    
                        <!-- <div class="form-row">
                            <div class="name">Participant Amount</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="participant_amt" value="<?php echo $row1['participant_amt']?>">
                                </div>
                            </div>
                        </div> -->
                        <div class="form-row">
                            <div class="name">Description</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="description" value="<?php echo $row1['description']?>">
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-row p-t-20">
                            <label class="label label--block">Event Type</label>

                            <?php 
                            
                            $type1=$row1['type'];
                            if($type1=='Private'){
                            
                            ?>
                            
                            <br><br>
                            Private<input type="radio" name="type" id="yesCheck" value="Private" checked >  Public<input type="radio" name="type" id="noCheck" value="public">
                        

<?php }

else{
?>

<br><br>
                            Private<input type="radio" name="type" id="yesCheck" value="Private"  >  Public<input type="radio" name="type" id="noCheck" value="public" checked>
                        
<?php }?>




                         <div class="form-row" id="ifYes">
                            <div class="form-row">
                                <div class="name">Event Category</div>
                                <div class="value">
                                    <div class="input-group">
                                        <div class="rs-select2 js-select-simple select--no-search">
                                            <select name="category">
                                                <option disabled="disabled" selected="selected"><?php echo $row1['category']?></option>
                                                <option value="birthday">Birthday</option>
                                                <option value="Sinhala wedding">Sinhala Wedding</option>
                                                <option value="Tamil wedding">Tamil Wedding</option>
                                                <option value="seminar">Seminar</option>
                                                <option value="musical show">Musical Show</option>
                                                <option value="cooperate event">Cooperate Event</option>
                                                <option value="other">Other</option>
                                            </select>
                                            <div class="select-dropdown"></div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="form-row" id="ifNo">
                            <div class="form-row">
                                <div class="name">Event Category</div>
                                <div class="value">
                                    <div class="input-group">
                                        <div class="rs-select2 js-select-simple select--no-search">
                                            <select name="category">
                                                <option value="disabled" selected="selected"><?php echo $row1['category']?></option>
                                                <option value="seminar">Seminar</option>
                                                <option value="musical show">Musical Show</option>
                                                <option value="cooperate event">Cooperate Event</option>
                                                <option value="other">Other</option>
                                            </select>
                                            <div class="select-dropdown"></div>
                                        </div>
                                    </div>
                                </div>
                                <div> -->
<!--                             
                                <input type="file" name="pro" id="pro">
                                
                                </div>
                                </div> 
 -->

      



                                <!-- <a href="index2.php?data1=<?php echo $currentId?>> Add ticket prices</a> --> 
<!--                                  
                                <label class="label label--block">
                                 
                                 <a href="index2.php?data1=<?php echo $currentId?>"> Change ticket prices</a>
                                 </label>
                             -->
                              
<!-- </div> -->


                            <!-- </div> -->

                       
                        <!-- </div> -->
                        <div>
                        <br>
                        

                            <button class="btn btn--radius-2 btn--red" type="submit" >Edit Event</button>
                            
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
    
   

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->