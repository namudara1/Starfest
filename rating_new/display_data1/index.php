<?php
$idd=$_GET['id'];
require_once 'publicevent_db.php';
// Connect to MySQL

$event_id = $_GET['data1'];


$sql = "SELECT e.event_name,s.firstname,s.lastname,er.sp_userid,er.eo_userid FROM event_request er 
        join event e on er.event_id=e.event_id 
        join service_provider s on er.sp_userid=s.id 
        where er.status='accepted' &&
         s.id='$idd' && e.event_id='$event_id'";



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
    <title>Rating</title>

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

    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

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

<svg style="display: none">
	<symbol id="star" viewBox="0 0 1024 1024">
		<polygon points="512 0 627 354 999 354 698 572 813 926 512 708 211 926 326 572 25 354 397 354 512 0" />
	</symbol>
</svg>
<?php 
$i=0;
while($row=mysqli_fetch_assoc($result)){

    if($i%3 == 0){

        // echo "<li class=\"one_third first\">";
        //echo"<li class=\"one_third \">";
        
        }
?> 

<div id="modal">
	<div class="overlay">
		<div class="feedback container--small align--center">
			<button id="close" ><a href="../home/index.php">Close</a></button>
			<h1 class="feedback__title">Reqest accpeted Service provider details</h1>
			<p class="feedback__description"></p>
                <form method="POST" action="signup_db.php?data1=<?=$row['sp_userid']; ?>&data2=<?=$row['eo_userid']; ?>">
                    <fieldset class="rating rating__plan">
					<h3> Service provider name&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row["firstname"]; ?>-<?php echo $row["lastname"]; ?></h3>
					<div class="flex-container">
						<input type="radio" id="plan-5" name="rating__plan" value="5">
						<label for="plan-5"><svg>
								<title>Five Stars</title>
								<use xlink:href="#star"></use>
							</svg></label>
						<input type="radio" id="plan-4" name="rating__plan" value="4">
						<label for="plan-4"><svg>
								<title>Four Stars</title>
								<use xlink:href="#star"></use>
							</svg></label>
						<input type="radio" id="plan-3" name="rating__plan" value="3">
						<label for="plan-3"><svg>
								<title>Three Stars</title>
								<use xlink:href="#star"></use>
							</svg></label>
						<input type="radio" id="plan-2" name="rating__plan" value="2">
						<label for="plan-2"><svg>
								<title>Two Stars</title>
								<use xlink:href="#star"></use>
							</svg></label>
						<input type="radio" id="plan-1" name="rating__plan" value="1">
						<label for="plan-1"><svg>
								<title>One Star</title>
								<use xlink:href="#star"></use>
							</svg></label>
					</div>
				</fieldset>
                <input class="input--style-5" type="text" name="feedback" placeholder='Type Feedback...............................................' required>
			
<br><br>
                        <button class="feedback__submit" type="submit" >Submit feedback</button>
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