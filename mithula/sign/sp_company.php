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
    <title>Starfest Service Providers</title>

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

<script type="text/javascript">
function toggle(obj) {
          var obj=document.getElementById(obj);
          if (obj.style.display == "block") obj.style.display = "none";
          else obj.style.display = "block";
}
</script>

    <script type="text/javascript">
function CheckColors(val){
 var element=document.getElementById('category1');
 if(val=='pick a color'||val=='others')
   element.style.display='block';
 else  
   element.style.display='none';
}
</script>

</head>

<body>

    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Service Details</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="company_db.php">
                    
                    <select name="category" onchange='CheckColors(this.value);'> 
                    <option>Service Category</option>  
                    <option value="catering">Catering</option>
                    <option value="band">Band</option>
                    <option value="others">others</option>
                </select>
                <input class="input--style-5" type="text" name="category1" id="category1" style='display:none;'/> <br>


                        <div class="form-row">
                            <div class="name">Company Name</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="company_name">
                                </div>
                            </div>
                        </div>

                        
                    
                        <button class="btn btn--radius-2 btn--red" type="submit" >Finish</button>
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