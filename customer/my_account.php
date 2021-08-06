<?php
session_start();
if(!isset($_SESSION['customer_email'])){
    echo "<script>window.open('../checkout.php','_self')</script>";
}else{
include("includes/db.php");
include("functions/functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale-1">
    <title>Ecommerce Website</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    
    <div id="top"><!-- Top Open -->
        <div class="container"><!-- Container Open -->
            <div class="col-md-6 offer"><!-- col-md-6 offer Open -->
                <a href="#" class="btn btn-success btn-sm">
                    <?php 
                   if(!isset($_SESSION['customer_email'])){
                       echo "Welcome: Guest";
                   }else{
                       echo "Welcome: " . $_SESSION['customer_email'] . "";
                   }
                   ?>
                </a>
                
                <a href="checkout.php"><?php items(); ?> Items In Your Cart | Total Price: <?php total_price(); ?></a>
            </div><!-- col-md-6 offer Close -->
            <div class="col-md-6 offer"><!-- col-md-6 Open -->
                <ul class="menu"><!-- menu Open -->
                    <li><a href="../customer_register.php">Register</a></li>
                    <li><a href="my_account.php">My Account</a></li>
                    <li><a href="../cart.php">Go to Cart</a></li>
                    <li><a href="../checkout.php"><?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                       
                                echo "<a href='checkout.php'> Login </a>";

                               }else{

                                echo " <a href='logout.php'> Log Out </a> ";

                               }
                           
                           ?></a></li>
                </ul><!-- menu Close -->
            </div><!-- col-md-6 Close -->
        </div><!-- Container Close -->
    </div><!-- Top Close -->
    
    <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Open -->
        <div class="container"><!-- Container Open -->
            <div class="navbar-header"><!-- navbar-header Open -->
                <a href="../index.php" class="navbar-brand home"><!-- navbar-brand home Open -->
                    <img src="images/ecom-store-logo.png" alt="Website Logo" class="hidden-xs">
                    <img src="images/ecom-store-logo-mobile.png" alt="Website Mobile logo" class="visible-xs">
                </a><!-- navbar-brand home Close -->
                <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle Navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle Search</span>
                    <i class="fa fa-search"></i>
                </button>
            </div><!-- navbar-header Close -->
            <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Open -->
                <div class="padding-nav"><!-- padding-nav Open -->
                    <ul class="nav navbar-nav left"><!-- nav navbar-nav left Open -->
                        <li>
                            <a href="../index.php">Home</a>
                        </li>
                        <li>
                            <a href="../shop.php">Shop</a>
                        </li>
                        <li class="active">
                            <a href="my_account.php">My Account</a>
                        </li>
                        <li>
                            <a href="../cart.php">Shopping Cart</a>
                        </li>
                        <li>
                            <a href="../contact.php">Contact Us</a>
                        </li>
                    </ul><!-- nav navbar-nav left Close -->
                </div><!-- padding-nav Close -->
                <a href="../cart.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Open -->
                    <i class="fa fa-shopping-cart"></i>
                    <span><?php items(); ?> Items In Your Cart</span>
                </a><!-- btn navbar-btn btn-primary Close -->
                <div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Open -->
                    <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!-- navbar-collapse collapse right Close -->
                       <span class="sr-only">Toggle Search</span>
                       <i class="fa fa-search"></i> 
                    </button><!-- btn btn-primary navbar-btn Close -->
                </div><!-- navbar-collapse collapse right Close -->
                <div class="collapse clearfix" id="search"><!-- collapse clearfix Open -->
                    <form method="get" action="results.php" class="navbar-form"><!-- navbar-form Open -->
                        <div class="input-group"><!-- input-group Open -->
                            <input type="text" class="form-control" name="user_query" placeholder="Search" required>
                            <span class="input-group-btn"><!-- nput-group-btn Open -->
                            <button type="submit" name="search" value="Search" class="btn btn-primary"><!-- btn btn-primary Open -->
                                <i class="fa fa-search"></i>
                            </button><!-- btn btn-primary Close -->
                            </span><!-- nput-group-btn Close -->
                        </div><!-- input-group Close -->
                    </form><!-- navbar-form Close -->
                </div><!-- collapse clearfix Close -->
            </div><!-- navbar-collapse collapse Close -->
        </div><!-- Container Close -->
    </div><!-- navbar navbar-default Close -->
    
    <div id="content"><!-- content Open -->
        <div class="container"><!-- container Open -->
            <div class="col-md-12"><!-- col-md-12 Open -->
                <ul class="breadcrumb"><!-- breadcrumb Open -->
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        My Account
                    </li>
                </ul><!-- breadcrumb Close -->
            </div><!-- col-md-12 Close -->
            <div class="col-md-3"><!-- col-md-3 Open -->
                    <?php
                    include("includes/sidebar.php");    
                    ?>
            </div><!-- col-md-3 Close -->
            <div class="col-md-9"><!-- col-md-9 Open -->
                <div class="box"><!-- box Open -->
                    <?php
                    if(isset($_GET['my_orders'])){
                        include("my_orders.php");
                    }
                    ?>
                    <?php
                    if(isset($_GET['pay_offline'])){
                        include("pay_offline.php");
                    }
                    ?>
                    <?php
                    if(isset($_GET['edit_account'])){
                        include("edit_account.php");
                    }
                    ?>
                    <?php
                    if(isset($_GET['change_pass'])){
                        include("change_pass.php");
                    }
                    ?>                    
                    <?php
                    if(isset($_GET['delete_account'])){
                        include("delete_account.php");
                    }
                    ?>
                </div><!-- box Close -->
            </div><!-- col-md-9 Close -->
            </div><!-- container Close -->
    </div><!-- content Close -->
    
    <?php
    include("includes/footer.php");    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
</body>
</html>

<?php } ?>