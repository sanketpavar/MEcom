<?php
$active='Shop';
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
                </ul><!-- breadcrumb Close -->
            </div><!-- col-md-12 Close -->
            <div class="col-md-3"><!-- col-md-3 Open -->
                <?php
                include("includes/sidebar.php");    
                ?>
            </div><!-- col-md-3 Close -->
            <div class="col-md-9"><!-- col-md-9 Open -->
            <?php 
                if(!isset($_GET['p_cat'])){
                    if(!isset($_GET['cat'])){
                        echo "
                        <div class='box'><!-- box Open -->
                            <h1>Shop</h1>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi aliquam reiciendis aspernatur, iusto ratione perferendis quisquam rem, id tempora, possimus eligendi odio et. Neque expedita iure, eius similique ratione quas!
                            </p>
                        </div><!-- box Close -->
                        ";
                    }
                }
            ?>
                <div class="row"><!-- row Open -->
                <?php 
                   
                        if(!isset($_GET['p_cat'])){
                            
                         if(!isset($_GET['cat'])){
                            
                            $per_page=6; 
                             
                            if(isset($_GET['page'])){
                                
                                $page = $_GET['page'];
                                
                            }else{
                                
                                $page=1;
                                
                            }
                            
                            $start_from = ($page-1) * $per_page;
                             
                            $get_products = "select * from product order by 1 DESC LIMIT $start_from,$per_page";
                             
                            $run_products = mysqli_query($con,$get_products);
                             
                            while($row_products=mysqli_fetch_array($run_products)){
                                
                                $pro_id = $row_products['product_id'];
        
                                $pro_title = $row_products['product_title'];

                                $pro_price = $row_products['product_price'];

                                $pro_img1 = $row_products['product_img1'];
                                
                                echo "
                                
                                    <div class='col-md-4 col-sm-6 center-responsive'>
                                    
                                        <div class='product'>
                                        
                                            <a href='details.php?pro_id=$pro_id'>
                                            
                                                <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                                            
                                            </a>
                                            
                                            <div class='text'>
                                            
                                                <h3>
                                                
                                                    <a href='details.php?pro_id=$pro_id'> $pro_title </a>
                                                
                                                </h3>
                                            
                                                <p class='price'>

                                                    ₹$pro_price

                                                </p>

                                                <p class='buttons'>

                                                    <a class='btn btn-default' href='details.php?pro_id=$pro_id'>

                                                        View Details

                                                    </a>

                                                    <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>

                                                        <i class='fa fa-shopping-cart'></i> Add To Cart

                                                    </a>

                                                </p>
                                            
                                            </div>
                                        
                                        </div>
                                    
                                    </div>
                                
                                ";
                                
                        }
                        
                   ?>
                </div><!-- row Close -->
                    <center>
                        <ul class="pagination">
                            <?php
                             
                    $query = "select * from product";
                             
                    $result = mysqli_query($con,$query);
                             
                    $total_records = mysqli_num_rows($result);
                             
                    $total_pages = ceil($total_records / $per_page);
                             
                        echo "
                        
                            <li>
                            
                                <a href='shop.php?page=1'> ".'First Page'." </a>
                            
                            </li>
                        
                        ";
                             
                        for($i=1; $i<=$total_pages; $i++){
                            
                              echo "
                        
                            <li>
                            
                                <a href='shop.php?page=".$i."'> ".$i." </a>
                            
                            </li>
                        
                        ";  
                            
                        };
                             
                        echo "
                        
                            <li>
                            
                                <a href='shop.php?page=$total_pages'> ".'Last Page'." </a>
                            
                            </li>
                        
                        ";
                             
					    	}
							
						}
					 
					 ?> 
                        </ul>
                    </center>
                    <?php 
               
               getpcatpro(); 
               getcatpro();
               
               ?> 
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