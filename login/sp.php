<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <h1>service provider</h1>
    <?php
        echo "user id: {$_SESSION['user_id']}<br>";
    ?>    
</body>
</html>