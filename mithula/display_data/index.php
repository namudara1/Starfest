<?php
require_once 'publicevent_db.php';
// Connect to MySQL

$sql = "SELECT e.event_name,s.firstname,s.lastname,er.sp_userid,er.eo_userid FROM event_request er 
        join event e on er.event_id=e.event_id 
        join service_provider s on er.sp_userid=s.id 
        where er.status='accepted'";



$result = mysqli_query($conn,$sql) ;



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
    <title>Starfest Signup Form</title>

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


</head>

<body>
      
<?php 
$i=0;
while($row=mysqli_fetch_assoc($result)){

?> 

    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
               
                
                    <div class="card-heading">
                    <h2 class="title">Reqest accpeted details</h2>
                        </div>   
                    <div class="card-body">
                    <form >
                        <div class="form-row">
                            
                            <div class="value">
                            <div class="input-group">
                              <b> Event name</b>&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row["event_name"]; ?>
                                </div>
                                <br><br><br>
                                <div class="input-group">
                               <b>Service provider name</b>&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row["firstname"]; ?>-<?php echo $row["lastname"]; ?>
                                </div>
                            </div>
                        </div>

                      
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php


if($i% 1== 1){


}
$i++;
}
?>

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