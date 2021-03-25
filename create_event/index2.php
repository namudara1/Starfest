<?php 
require 'db_conn.php';
require_once 'publicevent_db.php';

session_start();

$e_id = $_GET['data1'];
echo $e_id;




$message1 = $e_id;
$_SESSION['firstMessage'] = $message1;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket Prices</title>
    <link rel="stylesheet" href="css1/style.css">


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



    <script type="text/javascript">
function CheckColors(val){
 var element=document.getElementById('category1');
 if(val=='pick a color'||val=='others')
   element.style.display='block';
 else  
   element.style.display='none';
}

function goBack(){

window.history.back();

}


</script>

</head>
<body>


    <div class="main-section">
       <div class="add-section">
          <form action="app/add.php" method="POST" autocomplete="off">
             <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                
                <select name="category" onchange='CheckColors(this.value);'> 
    <option>Select the Ticket Category</option>  
    <option value="gold">Gold</option>
    <option value="silver">Silver</option>
    <option value="others">others</option>
  </select>
<input type="text" name="category1" id="category1" style='display:none;'/>

              <input type="text" 
                     name="ticket_price" 
                     placeholder="Ticket/ Entrance Fee prices?" />

                     <input type="text" 
                     name="quantity" 
                     placeholder="quantity" />
              <button type="submit">Add &nbsp; <span>&#43;</span></button>

             <?php }else{ ?>

                <select name="category" onchange='CheckColors(this.value);'> 
    <option>Select the Ticket Category</option>  
    <option value="gold">Gold</option>
    <option value="silver">Silver</option>
    <option value="others">others</option>
  </select>
<input type="text" name="category1" id="category1" style='display:none;'/>

              <input type="text" 
                     name="ticket_price" 
                     placeholder="Ticket/ Entrance Fee prices?" />

                     <input type="text" 
                     name="quantity" 
                     placeholder="quantity" />
              <button type="submit">Add &nbsp; <span>&#43;</span></button>
             <?php } ?>
          </form>
       </div>
       <?php



            
            // while($todo1 = $empty1->fetch(PDO::FETCH_ASSOC)) { 
                
            //     echo $todo1['count(empty)']; 

                             
             
    
          $todos = $conn->query("SELECT * FROM public_ticket_price where event_id= $e_id  ORDER BY ticket_price");
       ?>
       <div class="show-todo-section">
            <?php if($todos->rowCount() <= 0){ ?>
                <div class="todo-item">
                    <div class="empty">
                        <!-- <img src="img/f.png" width="100%" />
                        <img src="img/Ellipsis.gif" width="80px"> -->
                    </div>
                </div>
            <?php } ?>

            <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="todo-item">
                    <span id="<?php echo $todo['id']; ?>"
                          class="remove-to-do">x</span>
                    <!-- <?php if($todo['checked']){ ?>  -->
                        <!-- <input type="checkbox"
                               class="check-box"
                               data-todo-id ="<?php echo $todo['id']; ?>"
                               checked /> -->
                        <h2 class="checked"><?php echo $todo['ticket_price']; ?></h2>
                        
                    <!-- <?php }else { ?>
                        <input type="checkbox"
                               data-todo-id ="<?php echo $todo['id']; ?>"
                               class="check-box" /> -->
                        <h2><?php echo "Category:"; echo $todo['category']; echo "<br>"; echo "Price:"; echo $todo['ticket_price'];echo "<br>"; echo "Quantity:";
                          echo $todo['quantity']?></h2>
                    <?php } ?> 
                    <br>
                    
                </div>
            <?php } ?>
       </div>

       <div>
       <button class="btn btn--radius-2 btn--red" onclick="goBack()" >Back</button>
    <button class="btn btn--radius-2 btn--red" onclick="goBack()" >Continue</button>
    
    </div>
    </div>




    <script src="js1/jquery-3.2.1.min.js"></script>

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

            // $(".check-box").click(function(e){
            //     const id = $(this).attr('data-todo-id');
                
            //     $.post('app/check.php', 
            //           {
            //               id: id
            //           },
            //           (data) => {
            //               if(data != 'error'){
            //                   const h2 = $(this).next();
            //                   if(data === '1'){
            //                       h2.removeClass('checked');
            //                   }else {
            //                       h2.addClass('checked');
            //                   }
            //               }
            //           }
            //     );
            // });
        });
    </script>




</body>
</html>