<?php
$active='Cart';
include("includes/header.php");
?>
    
    <div id="content"><!-- content Open -->
        <div class="container"><!-- container Open -->
            <div class="col-md-12"><!-- col-md-12 Open -->
                <ul class="breadcrumb"><!-- breadcrumb Open -->
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        Shop
                    </li>
                    <li>
                        <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a>
                    </li>
                    <li> <?php echo $pro_title; ?> </li>
                </ul><!-- breadcrumb Close -->
            </div><!-- col-md-12 Close -->
            <div class="col-md-3"><!-- col-md-3 Open -->
                <?php
                include("includes/sidebar.php");    
                ?>
                
            </div><!-- col-md-3 Close -->
            <div class="col-md-9"><!-- col-md-9 Open -->
                <div id="productMain" class="row"><!-- productMain Open -->
                    <div class="col-sm-6"><!-- col-sm-6 Open -->
                        <div id="mainImage"><!-- mainImage Open -->
                            <div id="myCarousel" class="carousel slide" data-ride="carousel"><!-- myCarousel Open -->
                                <ol class="carousel-indicators"><!-- carousel-indicators Open -->
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                </ol><!-- carousel-indicators Close -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="Product 1"></center>
                                    </div>
                                    <div class="item">
                                        <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="Product 1a"></center>
                                    </div>
                                    <div class="item">
                                        <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="Product 1b"></center>
                                    </div>
                                </div>
                                <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Open -->
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a><!-- left carousel-control Close -->
                                
                                <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- right carousel-control Open -->
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a><!-- right carousel-control Close -->
                            </div><!-- myCarousel Close -->
                        </div><!-- mainImage Close -->
                    </div><!-- col-sm-6 Close -->
                    <div class="col-sm-6"><!-- col-sm-6 Open -->
                        <div class="box"><!-- box Open -->
                            <h1 class="text-center"><?php echo $pro_title; ?></h1>
                            <?php add_cart(); ?>
                            <form action="details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="post"><!-- form-horizontal Open -->
                                <div class="form-group"><!-- form-group Open -->
                                    <label for="" class="col-md-5 control-label">Product Quantity</label>
                                    <div class="col-md-7"><!-- col-md-7 Open -->
                                           <select name="product_qty" id="" class="form-control"><!-- select Open -->
                                            <option>50</option>
                                            <option>100</option>
                                            <option>150</option>
                                            <option>200</option>
                                            <option>250</option>
                                            </select><!-- select Close -->
                                    </div><!-- col-md-7 Close -->
                                </div><!-- form-group Close -->
                                <div class="form-group"><!-- form-group Open -->
                                    <label class="col-md-5 control-label">Product Size</label>
                                    <div class="col-md-7"><!-- col-md-7 Open -->
                                        <select name="product_size" class="form-control" required oninput="setCustomValidity('')" oninvalid="setCustomValidity('Must pick 1 size for the product')" required><!-- select Open -->
                                            <option disabled selected>Select a Size</option>
                                            <option>Small</option>
                                            <option>Medium</option>
                                            <option>Large</option>
                                        </select><!-- select Close -->
                                    </div><!-- col-md-7 Close -->
                                </div><!-- form-group Close -->
                                <p class="price">₹ <?php echo $pro_price; ?></p>
                                <p class="text-center buttons"><button class="btn btn-primary i fa fa-shopping-cart"> Add to cart</button></p>
                            </form><!-- form-horizontal Close -->
                        </div><!-- box Close -->
                        <div class="row" id="thumbs"><!-- row Open -->
                            <div class="col-xs-4"><!-- col-xs-4 Open -->
                                <a data-target="#myCarousel" data-slide-to="0" href="#" class="thumb"><!-- thumb Open -->
                                <img src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="Product 2" class="img-responsive">
                                </a><!-- thumb Close -->
                            </div><!-- col-xs-4 Close -->
                            <div class="col-xs-4"><!-- col-xs-4 Open -->
                                <a data-target="#myCarousel" data-slide-to="1" href="#" class="thumb"><!-- thumb Open -->
                                <img src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="Product 3" class="img-responsive">
                                </a><!-- thumb Close -->
                            </div><!-- col-xs-4 Close -->
                            <div class="col-xs-4"><!-- col-xs-4 Open -->
                                <a data-target="#myCarousel" data-slide-to="2" href="#" class="thumb"><!-- thumb Open -->
                                <img src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="Product 4" class="img-responsive">
                                </a><!-- thumb Close -->
                            </div><!-- col-xs-4 Close -->
                        </div><!-- row Close -->
                    </div><!-- col-sm-6 Close -->
                </div><!-- productMain Close -->
                <div class="box" id="details"><!-- box Open -->
                    <h4>Product Details</h4>
                    <p>
                        <?php echo $pro_desc; ?>
                    </p>
                    <h4>Size</h4>
                    <ul>
                        <li>Small</li>
                        <li>Medium</li>
                        <li>Large</li>
                    </ul>
                    <hr>
                </div><!-- box Close -->
                <div id="row same-height-row"><!-- row same-height-row Open -->
                    <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Open -->
                        <div class="box same-height headline"><!-- box same-height headline Open -->
                            <h3 class="text-center">Products You May Like</h3>
                        </div><!-- box same-height headline Close -->
                    </div><!-- col-md-3 col-sm-6 Close -->
                    <?php 
                   
                    $get_products = "select * from product order by rand() LIMIT 0,3";
                   
                    $run_products = mysqli_query($con,$get_products);
                   
                   while($row_products=mysqli_fetch_array($run_products)){
                       
                       $pro_id = $row_products['product_id'];
                       
                       $pro_title = $row_products['product_title'];
                       
                       $pro_img1 = $row_products['product_img1'];
                       
                       $pro_price = $row_products['product_price'];
                       
                       echo "
                       
                        <div class='col-md-3 col-sm-6 center-responsive'>
                        
                            <div class='product same-height'>
                            
                                <a href='details.php?pro_id=$pro_id'>
                                
                                    <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                                
                                </a>
                                
                                <div class='text'>
                                
                                    <h3> <a href='details.php?pro_id=$pro_id'> $pro_title </a> </h3>
                                    
                                    <p class='price'> ₹ $pro_price </p>
                                
                                </div>
                            
                            </div>
                        
                        </div>
                       
                       ";
                       
                   }
                   
                   ?>
                </div><!-- row same-height-row Close -->
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