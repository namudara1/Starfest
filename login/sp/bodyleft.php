<html>
<link rel="stylesheet" href="../css/styleadmins.css">
    <body>
        <nav class="sidebar">
            <div class="text">Content Management</div>
            <ul>
                <li><a href="indexadmin.php?home">Home</a></li>

                <li><a href="indexadmin.php?viewall_cat">Categories</a></li>

                <li><a href="#" class="feat-btn">Products<span class="fas fa-caret-down first"></span></a>
                    <ul class="feat-show">
                    <li><a href="indexadmin.php?add_product">ADD New Products</a></li>
                    <li><a href="indexadmin.php?viewall_products">View All Products</a></li>
                    </ul>
                </li>

                <li><a href="#" class="deli-btn">View Orders<span class="fas fa-caret-down second"></span></a>
                    <ul class="deli-show">
                    <li><a href="indexadmin.php?view_normal">View Normal Orders</a></li>
                    <li><a href="indexadmin.php?view_urgent">View Urgent Orders</a></li>
                    </ul>
                </li>
                <!-- <li><a href="indexadmin.php?view_order">View Orders</a></li> -->


                <li><a href="indexadmin.php?view_user">View Users</a></li>

                <li><a href="#" class="serv-btn">Manager<span class="fas fa-caret-down second"></span></a>
                    <ul class="serv-show">
                    <li><a href="indexadmin.php?add_manager">Add New Manager</a></li>
                    <li><a href="indexadmin.php?view_manager">View Manager</a></li>
                    </ul>
                </li>
                <li><a href="#" class="deli-btn">Deliver<span class="fas fa-caret-down third"></span></a>
                    <ul class="deli-show">
                    <li><a href="indexadmin.php?add_deliver">Add New Delivery Person</a></li>
                    <li><a href="indexadmin.php?view_deliver">View Delivery Person</a></li>
                    </ul>
                </li>
                <li><a href="indexadmin.php?view_deliverstatus">Deliver Status</a></li>
                <li><a href="indexadmin.php?returned">Returned Items</a></li>

            </ul>
        </nav>

        <script>

         $('.feat-btn').click(function()
         {
             $('nav ul .feat-show').toggleClass('show');
             $('nav ul .first').toggleClass('rotate');
         });
         $('.serv-btn').click(function()
         {
             $('nav ul .serv-show').toggleClass('show1');
             $('nav ul .second').toggleClass('rotate');
         });
         $('.deli-btn').click(function()
         {
             $('nav ul .deli-show').toggleClass('show2');
             $('nav ul .third').toggleClass('rotate');
         });
         $('nav ul li').click(function()
         {
             $(this).addClass("active").siblings().removeClass("active");
         })
         </script>

        <!-- <script>

         $('.feat-btn').click(function()
         {
             $('nav ul .feat-show').toggleClass('show');
             $('nav ul .first').toggleClass('rotate');
         });

         $('.order-btn').click(function()
         {
             $('nav ul .order-show').toggleClass('show1');
             $('nav ul .second').toggleClass('rotate');
         });

         $('.serv-btn').click(function()
         {
             $('nav ul .serv-show').toggleClass('show2');
             $('nav ul .third').toggleClass('rotate');
         });

         $('.deli-btn').click(function()
         {
             $('nav ul .deli-show').toggleClass('show3');
             $('nav ul .fourth').toggleClass('rotate');
         });



         $('nav ul li').click(function()
         {
             $(this).addClass("active").siblings().removeClass("active");
         })

         </script> -->


    <?php
        if(isset($_GET['home'])){
            include("home.php");
        }

        if(isset($_GET['viewall_cat'])){
            include("cat.php");
        }
        if(isset($_GET['add_product'])){
            include("add_product.php");
        }
        if(isset($_GET['viewall_products'])){
            include("viewall_products.php");
        }


        if(isset($_GET['view_normal'])){
            include("view_normal.php");
        }

                if(isset($_GET['view_Normalorder_VIEW'])){
                    include("view_Normalorder_VIEW.php");
                }

        if(isset($_GET['view_urgent'])){
            include("view_urgent.php");
        }
                if(isset($_GET['view_Urgentorder_VIEW'])){
                    include("view_Urgentorder_VIEW.php");
                }


        if(isset($_GET['view_user'])){
            include("view_user.php");
        }


        if(isset($_GET['add_manager'])){
            include("add_manager.php");
        }
        if(isset($_GET['view_manager'])){
            include("view_manager.php");
        }


        if(isset($_GET['add_deliver'])){
            include("add_deliver.php");
        }
        if(isset($_GET['view_deliver'])){
            include("view_deliver.php");
        }

        if(isset($_GET['view_deliverstatus'])){
             include("view_deliverstatus.php");
        }

        if(isset($_GET['returned'])){
             include("returned.php");
        }
    ?>
</body>
</html>