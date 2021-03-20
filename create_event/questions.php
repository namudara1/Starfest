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
    <title>Au Register Forms by Colorlib</title>

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

    <link rel="stylesheet" href="css_switch/style.css">

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
                    <h2 class="title">Questions</h2>
                </div>
                <div class="card-body">
                    
                    1. What is your food preferrence?
                    <br><br>
                    <input type="radio" name="Vegetarian">Vegetarian
                    <input type="radio" name="nonVegetarian">Non vegetarian

                    <br><br>
                    
<b>Do you want to ask this question from Event participants? </b> 

        
          <label class="toggleSwitch nolabel" onclick="">
                <input type="checkbox" checked />
                <span>
                    <span>NO</span>
                    <span>YES</span>
                </span>
                <a></a>
            </label>

                </div>
                <div class="card-body">
                2. How did you get to know about this Event?

                <br><br>
                    <input type="radio" name="Vegetarian">Whatsapp
                    <input type="radio" name="nonVegetarian">Facebook
                    <input type="radio" name="nonVegetarian">STARFEST website
                    <input type="radio" name="nonVegetarian">Other

                    <br><br>
                    
                    <b>Do you want to ask this question from Event participants? </b> 

        
          <label class="toggleSwitch nolabel" onclick="">
                <input type="checkbox" checked />
                <span>
                    <span>NO</span>
                    <span>YES</span>
                </span>
                <a></a>
            </label>
            </div>
            <div class="card-body">
                3. What is your T-shirt size?

                <br><br>
                    <input type="radio" name="Vegetarian">S
                    <input type="radio" name="nonVegetarian">M
                    <input type="radio" name="nonVegetarian">L
                    <input type="radio" name="nonVegetarian">XL

                    <br><br>
                    
                    <b>Do you want to ask this question from Event participants? </b> 

        
          <label class="toggleSwitch nolabel" onclick="">
                <input type="checkbox" checked />
                <span>
                    <span>NO</span>
                    <span>YES</span>
                </span>
                <a></a>
            </label>
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