<?php

require 'db_conn1.php';


$rowSQL = mysqli_query($conn1,"SELECT MAX(event_id) AS max FROM event" );
$row = mysqli_fetch_array( $rowSQL );
$preid = $row['max'];

$currentId=$preid+1;


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
    <title>Create Event Form</title>

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

<!-- <style>
 #no { display: none;}
/* #yes1:checked ~ #yes {display: block;}  */
#no1:checked ~ #no {display: block;}
</style> -->

<script type="text/javascript">
function toggle(obj) {
          var obj=document.getElementById(obj);
          if (obj.style.display == "block") obj.style.display = "none";
          else obj.style.display = "block";
}
</script>


</head>

<body>

    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Create Event</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="data.php" enctype="multipart/form-data">
                    
                        <div class="form-row m-b-55">
                            <div class="name">Event Name</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="event_name">
                                </div>
                            </div>   
                        </div>
                        <div class="form-row">
                            <div class="name">Event Venue</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="venue">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Date</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="date" name="date">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Time</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="time" name="time">
                                </div>
                            </div>
                        </div>
                    
                        <div class="form-row">
                            <div class="name">Participant Amount</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="participant_amt">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Description</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="description">
                                </div>
                            </div>
                        </div>
                        <div class="form-check-inline">
                            <label class="label label--block">Event Type</label>
                            
                            <br><br>
                            <!-- <label class="radio-inline"> -->
                            Private<input type="radio" name="type" id="yesCheck" value="Private" checked/> Public<input type="radio" name="type" id="noCheck" value="public"/>
                        
                    
                         <div class="form-row" id="ifYes">
                            <div class="form-row">
                                <div class="name">Event Category</div>
                                <div class="value">
                                    <div class="input-group">
                                        <div class="rs-select2 js-select-simple select--no-search">
                                            <select name="category">
                                                <option disabled="disabled" selected="selected">Choose option</option>
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
                                                <option disabled="disabled" selected="selected">Choose option</option>
                                                <option value="seminar">Seminar</option>
                                                <option value="musical show">Musical Show</option>
                                                <option value="cooperate event">Cooperate Event</option>
                                                <option value="other">Other</option>
                                            </select>
                                            <div class="select-dropdown"></div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                            
                                <input type="file" name="pro" id="pro">
                                
                                </div>
                                </div> 


                                <div class="form-row p-t-20">
                        
<!-- 
                                <a href="javascript: void(0);" onClick="toggle('q1')">
                                <label class="label label--block">
                                Do you want to ask some questions from the event participants
                                </label>
                                </a>
                                <div id="q1" style="display:none;">
                                TEXT WHAT U WILL SEE WHEN CLICKED HERE
                                </div>
                     
                                 -->


                            <!-- <br><br>
                            Yes<input type="radio" name="qselection"  value="yes" checked >  No<input type="radio" name="qselection"  value="no"> -->



                                <!-- <a href="index2.php?data1=<?php echo $currentId?>> Add ticket prices</a> --> 

                                <p> Is this event Free of charge?</p>
                                <input type="radio" id="yes" name="free" value="yes">
                                <label for="yes">Yes</label><br>
                                <input type="radio" id="no" name="free" value="no">
                                <label for="no">No</label><br>

                                 
                                <label class="label label--block">
                                 
                                 <a href="index2.php?data1=<?php echo $currentId?>"> Add ticket prices</a>
                                 </label>

                                


                            
                              
</div>


                            </div>

                       
                        </div>
                        <div>
                        <br><br><br><br><br><br><br><br><br><br><br><br><br>
                        

                            <button class="btn btn--radius-2 btn--red" type="submit" >Register</button>
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