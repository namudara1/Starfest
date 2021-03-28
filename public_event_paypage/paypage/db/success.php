<?php 
    require_once('connection.php'); 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/success_style.css">
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    
    <div class="suc">
        <h1 style="font-size:400%;">Payment successfull</h1>
        <?php
       $eo_id = $_SESSION['user_id'];
       if(isset($_SESSION['redirect_pay'])){
        echo '<div class="cart_btn">';
        echo '<button id="redirect_button" class="redirect">HOME</button>';
        echo '</div>'; 
       } 

    ?>
    </div>

    

<script type="text/javascript">
    document.getElementById("redirect_button").onclick = function () {
        location.href = "../../../home/index.php";
    };
</script>
    
</body>
</html>
