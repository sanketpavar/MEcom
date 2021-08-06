<?php

session_start();
include("includes/db.php");
include("functions/functions.php");
?>

<?php 

if(isset($_GET['pro_id'])){
    
    $product_id = $_GET['pro_id'];
    
    $get_product = "select * from product where product_id='$product_id'";
    
    $run_product = mysqli_query($con,$get_product);
    
    $row_product = mysqli_fetch_array($run_product);
    
    $p_cat_id = $row_product['p_cat_id'];
    
    $pro_title = $row_product['product_title'];
    
    $pro_price = $row_product['product_price'];
    
    $pro_desc = $row_product['product_desc'];
    
    $pro_img1 = $row_product['product_img1'];
    
    $pro_img2 = $row_product['product_img2'];
    
    $pro_img3 = $row_product['product_img3'];
    
    $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";
    
    $run_p_cat = mysqli_query($con,$get_p_cat);
    
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    
    $p_cat_title = $row_p_cat['p_cat_title'];
    
}

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
                    <li><a href="customer_register.php">Register</a></li>
                    <li><a href="customer/my_account.php">My Account</a></li>
                    <li><a href="cart.php">Go to Cart</a></li>
                    <li><a href="checkout.php">
                    <?php 
                           
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
                <a href="index.php" class="navbar-brand home"><!-- navbar-brand home Open -->
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
                    
                        <li class="<?php if($active=='Home') echo"active"; ?>"><a href="index.php">Home</a></li>
                        <li class="<?php if($active=='Shop') echo"active"; ?>"><a href="shop.php">Shop</a></li>
                        <li class="<?php if($active=='Account') echo"active"; ?>">
                            <?php 
                                if(!isset($_SESSION['customer_email'])){
                                    echo "<a href='checkout.php'>My Account</a>";
                                }else{
                                    echo "<a href='customer/my_account.php?myorders'>My Account</a>";
                                }
                                
                            ?>
                        </li>
                        <li class="<?php if($active=='Cart') echo"active"; ?>"><a href="cart.php">Shopping Cart</a></li>
                        <li class="<?php if($active=='Contact') echo"active"; ?>"><a href="contact.php">Contact Us</a></li>
                    </ul><!-- nav navbar-nav left Close -->
                </div><!-- padding-nav Close -->
                <a href="cart.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Open -->
                    <i class="fa fa-shopping-cart"></i>
                    <span><?php items(); ?> Items In Your Cart</span>
                </a><!-- btn navbar-btn btn-primary Close -->
               <!-- <div class="navbar-collapse collapse right">
                     <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">
                       <span class="sr-only">Toggle Search</span>
                       <i class="fa fa-search"></i> 
                    </button> 
                </div>
                <div class="collapse clearfix" id="search">
                    <form method="get" action="../results.php" class="navbar-form">
                        <div class="input-group">
                            <input type="text" class="form-control" name="user_query" placeholder="Search" required>
                            <span class="input-group-btn">
                            <button type="submit" name="search" value="Search" class="btn btn-primary">
                                <i class="fa fa-search"></i>
                            </button>
                            </span>
                        </div>
                    </form>
                </div>-->
            </div><!-- navbar-collapse collapse Close -->
        </div><!-- Container Close -->
    </div><!-- navbar navbar-default Close -->