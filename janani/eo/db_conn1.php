<?php 


session_start();

echo $_SESSION['firstMessage'];


$message1 = $_SESSION['firstMessage'];

echo $_SESSION['secondMessage'];


$message2 = $_SESSION['secondMessage'];

$sName = "localhost";
$uName = "root";
$pass = "";
$db_name = "starfest";


try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", 
                    $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if($message2=="wedding"){

    $sql =  $conn->query("INSERT INTO wedding(title,checked,event_id,empty) VALUE('catering',0,$message1 ,0)");
     $sql =  $conn->query("INSERT INTO wedding(title,checked,event_id,empty) VALUE('band',0,$message1 ,0)");

  }
  elseif($message2=="birthday" ){

    $sql =  $conn->query("INSERT INTO birthday(title,checked,event_id,empty) VALUE('catering',0,$message1 ,0)");
    $sql =  $conn->query("INSERT INTO birthday(title,checked,event_id,empty) VALUE('decos',0,$message1 ,0)");
  }

  else{
    $sql =  $conn->query("INSERT INTO other(title,checked,event_id,empty) VALUE('catering',0,$message1 ,0)");
    $sql =  $conn->query("INSERT INTO other(title,checked,event_id,empty) VALUE('chairs',0,$message1 ,0)");
   


  }

   


}catch(PDOException $e){
  echo "Connection failed : ". $e->getMessage();
}