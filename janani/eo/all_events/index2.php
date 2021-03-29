<?php 
require 'db_conn.php';
require_once 'publicevent_db.php';

session_start();

$e_id = $_GET['data1'];
// echo $e_id;

$cat = $_GET['data2'];
// echo $cat;


$message1 = $e_id;
$_SESSION['firstMessage'] = $message1;

$message2 = $cat;
$_SESSION['secondMessage'] = $message2;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php


if ($cat == "Sinhala wedding") {
  

?>

    <div class="main-section">
       <div class="add-section">
          <form action="app/add.php" method="POST" autocomplete="off">
             <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                <input type="text" 
                     name="title" 
                     style="border-color: #ff6666"
                     placeholder="This field is required" />
              <button type="submit">Add &nbsp; <span>&#43;</span></button>

             <?php }else{ ?>
              <input type="text" 
                     name="title" 
                     placeholder="What do you need to do?" />
              <button type="submit">Add &nbsp; <span>&#43;</span></button>
             <?php } ?>
          </form>
       </div>
       <?php



            $empty1 = $conn->query("SELECT count(empty) FROM todo_item where event_id=  $e_id ");
            while($todo1 = $empty1->fetch(PDO::FETCH_ASSOC)) { 
                
               

               
                
                if($todo1['count(empty)']==0){

                    
                    
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql1 = "SELECT todo_name FROM todo_template where event_cat_id='sinwed' ";

            $result1 = mysqli_query($conn1,$sql1) ;

            while($row1=mysqli_fetch_assoc($result1)){




            $sql = "INSERT INTO todo_item (title,checked,event_id,empty)
             VALUES ( '$row1[todo_name]',0,$e_id,0)";

            
if ($conn->query($sql)){
    // echo "New record is inserted sucessfully";
    // echo "user id: {$_SESSION['user_id']}<br>";
   
    }
    else{
    echo "Error: ". $sql ."
    ". $conn->error;
    }
      


        //    $conn->exec($sql);

                    
                }

            }

                         
             } 
    
          $todos = $conn->query("SELECT * FROM todo_item where event_id= $e_id or empty=1 ORDER BY id DESC");
       ?>
       <div class="show-todo-section">
            <?php if($todos->rowCount() <= 0){ ?>
                <div class="todo-item">
                    <div class="empty">
                        <img src="img/f.png" width="100%" />
                        <img src="img/Ellipsis.gif" width="80px">
                    </div>
                </div>
            <?php } ?>

            <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="todo-item">
                    <span id="<?php echo $todo['id']; ?>"
                          class="remove-to-do">x</span>
                    <?php if($todo['checked']){ ?> 
                        <input type="checkbox"
                               class="check-box"
                               data-todo-id ="<?php echo $todo['id']; ?>"
                               checked />
                        <h2 class="checked"><?php echo $todo['title'] ?></h2>
                    <?php }else { ?>
                        <input type="checkbox"
                               data-todo-id ="<?php echo $todo['id']; ?>"
                               class="check-box" />
                        <h2><?php echo $todo['title'] ?></h2>
                    <?php } ?>
                    <br>
                    
                </div>
            <?php } ?>
       </div>
    </div>

    <script src="js/jquery-3.2.1.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.remove-to-do').click(function(){
                const id = $(this).attr('id');
                
                $.post("app/remove.php", 
                      {
                          id: id
                      },
                      (data)  => {
                         if(data){
                             $(this).parent().hide(600);
                         }
                      }
                );
            });

            $(".check-box").click(function(e){
                const id = $(this).attr('data-todo-id');
                
                $.post('app/check.php', 
                      {
                          id: id
                      },
                      (data) => {
                          if(data != 'error'){
                              const h2 = $(this).next();
                              if(data === '1'){
                                  h2.removeClass('checked');
                              }else {
                                  h2.addClass('checked');
                              }
                          }
                      }
                );
            });
        });
    </script>


<?php
} 

elseif ($cat == "Tamil wedding") {

    ?>
   
   
   <div class="main-section">
       <div class="add-section">
          <form action="app/add.php" method="POST" autocomplete="off">
             <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                <input type="text" 
                     name="title" 
                     style="border-color: #ff6666"
                     placeholder="This field is required" />
              <button type="submit">Add &nbsp; <span>&#43;</span></button>

             <?php }else{ ?>
              <input type="text" 
                     name="title" 
                     placeholder="What do you need to do?" />
              <button type="submit">Add &nbsp; <span>&#43;</span></button>
             <?php } ?>
          </form>
       </div>
       <?php 

            $empty2 = $conn->query("SELECT count(empty) FROM todo_item where event_id=  $e_id ");
            while($todo2 = $empty2->fetch(PDO::FETCH_ASSOC)) { 
                
                // echo $todo2['count(empty)']; 

               
                
                if($todo2['count(empty)']==0){


                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $sql1 = "SELECT todo_name FROM todo_template where event_cat_id='tamwed' ";
        
                    $result1 = mysqli_query($conn1,$sql1) ;
        
                    while($row1=mysqli_fetch_assoc($result1)){
        
        
        
        
                    $sql = "INSERT INTO todo_item (title,checked,event_id,empty)
                     VALUES ( '$row1[todo_name]',0,$e_id,0)";
        
                //    $conn->exec($sql);
        

                if ($conn->query($sql)){
                    // echo "New record is inserted sucessfully";
                    // echo "user id: {$_SESSION['user_id']}<br>";
                   
                    }
                    else{
                    echo "Error: ". $sql ."
                    ". $conn->error;
                    }
                            
                        }

                    
                }

                

                         
             } 




          $todos = $conn->query("SELECT * FROM todo_item where event_id= $e_id or empty=1 ORDER BY id DESC");
       ?>
       <div class="show-todo-section">
            <?php if($todos->rowCount() <= 0){ ?>
                <div class="todo-item">
                    <div class="empty">
                        <img src="img/f.png" width="100%" />
                        <img src="img/Ellipsis.gif" width="80px">
                    </div>
                </div>
            <?php } ?>

            <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="todo-item">
                    <span id="<?php echo $todo['id']; ?>"
                          class="remove-to-do">x</span>
                    <?php if($todo['checked']){ ?> 
                        <input type="checkbox"
                               class="check-box"
                               data-todo-id ="<?php echo $todo['id']; ?>"
                               checked />
                        <h2 class="checked"><?php echo $todo['title'] ?></h2>
                    <?php }else { ?>
                        <input type="checkbox"
                               data-todo-id ="<?php echo $todo['id']; ?>"
                               class="check-box" />
                        <h2><?php echo $todo['title'] ?></h2>
                    <?php } ?>
                    <br>
                    
                </div>
            <?php } ?>
       </div>
    </div>

    <script src="js/jquery-3.2.1.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.remove-to-do').click(function(){
                const id = $(this).attr('id');
                
                $.post("app/remove.php", 
                      {
                          id: id
                      },
                      (data)  => {
                         if(data){
                             $(this).parent().hide(600);
                         }
                      }
                );
            });

            $(".check-box").click(function(e){
                const id = $(this).attr('data-todo-id');
                
                $.post('app/check.php', 
                      {
                          id: id
                      },
                      (data) => {
                          if(data != 'error'){
                              const h2 = $(this).next();
                              if(data === '1'){
                                  h2.removeClass('checked');
                              }else {
                                  h2.addClass('checked');
                              }
                          }
                      }
                );
            });
        });
    </script>




<?php
}

elseif ($cat == "birthday") {

    ?>
   
   
   <div class="main-section">
       <div class="add-section">
          <form action="app/add.php" method="POST" autocomplete="off">
             <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                <input type="text" 
                     name="title" 
                     style="border-color: #ff6666"
                     placeholder="This field is required" />
              <button type="submit">Add &nbsp; <span>&#43;</span></button>

             <?php }else{ ?>
              <input type="text" 
                     name="title" 
                     placeholder="What do you need to do?" />
              <button type="submit">Add &nbsp; <span>&#43;</span></button>
             <?php } ?>
          </form>
       </div>
       <?php 

            $empty2 = $conn->query("SELECT count(empty) FROM todo_item where event_id=  $e_id ");
            while($todo2 = $empty2->fetch(PDO::FETCH_ASSOC)) { 
                
                // echo $todo2['count(empty)']; 

               
                
                if($todo2['count(empty)']==0){


                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $sql1 = "SELECT todo_name FROM todo_template where event_cat_id='bir' ";
        
                    $result1 = mysqli_query($conn1,$sql1) ;
        
                    while($row1=mysqli_fetch_assoc($result1)){
        
        
        
        
                    $sql = "INSERT INTO todo_item (title,checked,event_id,empty)
                     VALUES ( '$row1[todo_name]',0,$e_id,0)";
        
                //    $conn->exec($sql);
                if ($conn->query($sql)){
                    // echo "New record is inserted sucessfully";
                    // echo "user id: {$_SESSION['user_id']}<br>";
                   
                    }
                    else{
                    echo "Error: ". $sql ."
                    ". $conn->error;
                    }
                            
                        }

                    
                }

                

                         
             } 




          $todos = $conn->query("SELECT * FROM todo_item where event_id= $e_id or empty=1 ORDER BY id DESC");
       ?>
       <div class="show-todo-section">
            <?php if($todos->rowCount() <= 0){ ?>
                <div class="todo-item">
                    <div class="empty">
                        <img src="img/f.png" width="100%" />
                        <img src="img/Ellipsis.gif" width="80px">
                    </div>
                </div>
            <?php } ?>

            <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="todo-item">
                    <span id="<?php echo $todo['id']; ?>"
                          class="remove-to-do">x</span>
                    <?php if($todo['checked']){ ?> 
                        <input type="checkbox"
                               class="check-box"
                               data-todo-id ="<?php echo $todo['id']; ?>"
                               checked />
                        <h2 class="checked"><?php echo $todo['title'] ?></h2>
                    <?php }else { ?>
                        <input type="checkbox"
                               data-todo-id ="<?php echo $todo['id']; ?>"
                               class="check-box" />
                        <h2><?php echo $todo['title'] ?></h2>
                    <?php } ?>
                    <br>
                    
                </div>
            <?php } ?>
       </div>
    </div>

    <script src="js/jquery-3.2.1.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.remove-to-do').click(function(){
                const id = $(this).attr('id');
                
                $.post("app/remove.php", 
                      {
                          id: id
                      },
                      (data)  => {
                         if(data){
                             $(this).parent().hide(600);
                         }
                      }
                );
            });

            $(".check-box").click(function(e){
                const id = $(this).attr('data-todo-id');
                
                $.post('app/check.php', 
                      {
                          id: id
                      },
                      (data) => {
                          if(data != 'error'){
                              const h2 = $(this).next();
                              if(data === '1'){
                                  h2.removeClass('checked');
                              }else {
                                  h2.addClass('checked');
                              }
                          }
                      }
                );
            });
        });
    </script>




<?php
}





else{

?>

<div class="main-section">
       <div class="add-section">
          <form action="app/add.php" method="POST" autocomplete="off">
             <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                <input type="text" 
                     name="title" 
                     style="border-color: #ff6666"
                     placeholder="This field is required" />
              <button type="submit">Add &nbsp; <span>&#43;</span></button>

             <?php }else{ ?>
              <input type="text" 
                     name="title" 
                     placeholder="What do you need to do?" />
              <button type="submit">Add &nbsp; <span>&#43;</span></button>
             <?php } ?>
          </form>
       </div>
       <?php 

      
            // $empty3 = "SELECT empty FROM other where event_id=  $e_id";
            // $result = mysqli_query($conn,$empty3) ;
            // $row=mysqli_fetch_assoc($result);
        

            // echo $row["empty"];

            
            // $retval = mysql_query( $sql, $conn );
            // $row = mysql_fetch_array($retval, MYSQL_ASSOC);

            $empty3 = $conn->query("SELECT count(empty) FROM todo_item where event_id=  $e_id ");
            while($todo3 = $empty3->fetch(PDO::FETCH_ASSOC)) { 
                
                // echo $todo3['count(empty)']; 

               
                
                if($todo3['count(empty)']==0){


                    if ($conn1->connect_error) {
                        die("Connection failed: " . $conn1->connect_error);
                      }
                   

                    $sql1 = "SELECT todo_name FROM todo_template where event_cat_id='oth' ";
        
                    $result1 = mysqli_query($conn1,$sql1) ;
        
                    while($row1=mysqli_fetch_assoc($result1)){
        
        
      
        
                    // $sql2 = "INSERT INTO todo_item (title,checked,event_id,empty)
                    //  VALUES ( $row1[todo_name],0,$e_id,0)";
                   
// ssss

$aa=$row1["todo_name"];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "starfest";

// Create connection
$conn2 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn2->connect_error) {
  die("Connection failed: " . $conn2->connect_error);
}


$sql = "INSERT INTO todo_item (title,checked,event_id,empty)
VALUES ( '$aa',0,$e_id,0)";
// $sql = "INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('John', 'Doe', 'john@example.com')";




if ($conn2->query($sql) === TRUE) {

 
} else {
 
}

$conn2->close();



                //   $conn1->exec($sql1);
        
                            
                        }
                    
                }

                

                         
             } 
          
            
           
            


          $todos = $conn->query("SELECT * FROM todo_item where event_id= $e_id or empty=1 ORDER BY id DESC");

         
       ?>
       <div class="show-todo-section">
            <?php if($todos->rowCount() <= 0){ ?>
                <div class="todo-item">
                    <div class="empty">
                        <img src="img/f.png" width="100%" />
                        <img src="img/Ellipsis.gif" width="80px">
                    </div>
                </div>
            <?php } ?>

            <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="todo-item">
                    <span id="<?php echo $todo['id']; ?>"
                          class="remove-to-do">x</span>
                    <?php if($todo['checked']){ ?> 
                        <input type="checkbox"
                               class="check-box"
                               data-todo-id ="<?php echo $todo['id']; ?>"
                               checked />
                        <h2 class="checked"><?php echo $todo['title'] ?></h2>
                    <?php }else { ?>
                        <input type="checkbox"
                               data-todo-id ="<?php echo $todo['id']; ?>"
                               class="check-box" />
                        <h2><?php echo $todo['title'] ?></h2>
                    <?php } ?>
                    <br>
                    
                </div>
            <?php } ?>
       </div>
    </div>

    <script src="js/jquery-3.2.1.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.remove-to-do').click(function(){
                const id = $(this).attr('id');
                
                $.post("app/remove.php", 
                      {
                          id: id
                      },
                      (data)  => {
                         if(data){
                             $(this).parent().hide(600);
                         }
                      }
                );
            });

            $(".check-box").click(function(e){
                const id = $(this).attr('data-todo-id');
                
                $.post('app/check.php', 
                      {
                          id: id
                      },
                      (data) => {
                          if(data != 'error'){
                              const h2 = $(this).next();
                              if(data === '1'){
                                  h2.removeClass('checked');
                              }else {
                                  h2.addClass('checked');
                              }
                          }
                      }
                );
            });
        });
    </script>

<?php 
}
?>


</body>
</html>