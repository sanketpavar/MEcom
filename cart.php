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
                        Cart
                    </li>
                </ul><!-- breadcrumb Close -->
            </div><!-- col-md-12 Close -->
            <div id="cart" class="col-md-9"><!-- col-md-9 Open -->
                <div class="box"><!-- box Open -->
                    <form action="cart.php" method="post" enctype="multipart/form-data"><!-- form Open -->
                        <h1>Shopping Cart</h1>
                        <?php 
                       
                       $ip_add = getRealIpUser();
                       
                       $select_cart = "select * from cart where ip_add='$ip_add'";
                       
                       $run_cart = mysqli_query($con,$select_cart);
                       
                       $count = mysqli_num_rows($run_cart);
                       
                       ?>
                        <p class="text-muted">You currently have <?php echo $count; ?> item(s) in your cart</p>
                        <div class="table-responsive"><!-- table-responsive Open -->
                            <table class="table"><!-- table Open -->
                                <thead><!-- thead Open -->
                                    <tr><!-- tr Open -->
                                        <th colspan="2">Product</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Size</th>
                                        <th  colspan="1">Delete</th>
                                        <th  colspan="2">Sub-Total</th>
                                    </tr><!-- tr Close -->
                                </thead><!-- thead Close -->
                                <tbody><!-- tbody Open -->
                                    <?php 
                                   
                                   $total = 0;
                                   
                                   while($row_cart = mysqli_fetch_array($run_cart)){
                                       
                                     $pro_id = $row_cart['p_id'];
                                       
                                     $pro_size = $row_cart['size'];
                                       
                                     $pro_qty = $row_cart['qty'];
                                       
                                       $get_products = "select * from product where product_id='$pro_id'";
                                       
                                       $run_products = mysqli_query($con,$get_products);
                                       
                                       while($row_products = mysqli_fetch_array($run_products)){
                                           
                                           $product_title = $row_products['product_title'];
                                           
                                           $product_img1 = $row_products['product_img1'];
                                           
                                           $only_price = $row_products['product_price'];
                                           
                                           $sub_total = $row_products['product_price']*$pro_qty;
                                           
                                           $total += $sub_total;
                                           
                                   ?>
                                    <tr><!-- tr Open -->
                                        <td>
                                            <img class="img-responsive" src="admin_area/product_images/<?php echo $product_img1; ?>" alt="Product 1">
                                        </td>
                                        <td>
                                            <a href="details.php?pro_id=<?php echo $pro_id; ?>"> <?php echo $product_title; ?> </a>
                                        </td>
                                        <td>
                                            <?php echo $pro_qty; ?>
                                        </td>
                                        <td>
                                            ₹ <?php echo $only_price; ?>
                                        </td>
                                        <td>
                                            <?php echo $pro_size; ?>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">
                                        </td>
                                        <td>
                                            ₹ <?php echo $sub_total; ?>
                                        </td>
                                    </tr><!-- tr Close -->
                                    <?php } } ?>
                                </tbody><!-- tbody Close -->
                                
                                <tfoot><!-- tfoot Open -->
                                    <tr><!-- tr Open -->
                                        <th colspan="5">Total</th>
                                        <th colspan="2">₹ <?php echo $total; ?></th>
                                    </tr><!-- tr Close -->
                                </tfoot><!-- tfoot Close -->
                            </table><!-- table Close -->
                            <div class="form-inline pull-right"><!-- form-inline Begin -->
                               <div class="form-group"><!-- form-group Begin -->

                                    <label> Coupon Code: </label>
                                    <input type="text" name="code" class="form-control">
                                    <input type="submit" class="btn btn-primary" value="Use Coupon" name="apply_coupon">
                               
                               </div><!-- form-group Finish -->
                           </div><!-- form-inline Finish -->
                        </div><!-- table-responsive Close -->
                        <div class="box-footer"><!-- box-footer Open -->
                            <div class="pull-left"><!-- pull-left Open -->
                                <a href="index.php" class="btn btn-default"><!-- btn btn-default Open -->
                                    <i class="fa fa-chevron-left"></i> Continue Shopping
                                </a><!-- btn btn-default Close -->
                            </div><!-- pull-left Close -->
                            <div class="pull-right"><!-- pull-right Open -->
                                <button type="submit" name="update" value="Update Cart" class="btn btn-default"><!-- btn btn-default Open -->
                                    <i class="fa fa-refresh"></i> Update Cart
                                </button><!-- btn btn-default Close -->
                                <a href="checkout.php" class="btn btn-primary">
                                    Proceed Checkout <i class="fafa-chevron-right"></i>
                                </a>
                            </div><!-- pull-right Close -->
                        </div><!-- box-footer Close -->
                    </form><!-- form Close -->
                </div><!-- box Close -->
                <?php 
               
                    if(isset($_POST['apply_coupon'])){

                        $code = $_POST['code'];

                        if($code == ""){

                        }else{

                            $get_coupons = "select * from coupons where coupon_code='$code'";
                            $run_coupons = mysqli_query($con,$get_coupons);
                            $check_coupons = mysqli_num_rows($run_coupons);

                            if($check_coupons == "1"){

                                $row_coupons = mysqli_fetch_array($run_coupons);

                                $coupon_pro_id = $row_coupons['product_id'];
                                $coupon_price = $row_coupons['coupon_price'];
                                $coupon_limit = $row_coupons['coupon_limit'];
                                $coupon_used = $row_coupons['coupon_used'];

                                if($coupon_limit == $coupon_used){

                                    echo "<script>alert('Your Coupon Already Expired')</script>";

                                }else{

                                    $get_cart = "select * from cart where p_id='$coupon_pro_id' AND ip_add='$ip_add'";
                                    $run_cart = mysqli_query($con,$get_cart);
                                    $check_cart = mysqli_num_rows($run_cart);

                                    if($check_cart == "1"){

                                        $add_used = "update coupons set coupon_used=coupon_used+1 where coupon_code='$code'";
                                        $run_used = mysqli_query($con,$add_used);
                                        $update_cart = "update cart set p_price='$coupon_price' where p_id='$coupon_pro_id' AND ip_add='$ip_add'";
                                        $run_update_cart = mysqli_query($con,$update_cart);

                                        echo "<script>alert('Your Coupon Has Been Applied')</script>";
                                        echo "<script>window.open('cart.php','_self')</script>";

                                    }else{

                                        echo "<script>alert('Your Coupon Didnt Match With Your Product On Your Cart')</script>";

                                    }

                                }

                            }else{

                                echo "<script>alert('You Coupon Is Not Valid')</script>";

                            }

                        }

                    }
               
               ?>
                <?php 
               
                function update_cart(){
                    
                    global $con;
                    
                    if(isset($_POST['update'])){
                        
                        foreach($_POST['remove'] as $remove_id){
                            
                            $delete_product = "delete from cart where p_id='$remove_id'";
                            
                            $run_delete = mysqli_query($con,$delete_product);
                            
                            if($run_delete){
                                
                                echo "<script>window.open('cart.php','_self')</script>";
                                
                            }
                            
                        }
                        
                    }
                    
                }
               
               echo @$up_cart = update_cart();
               
               ?>
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
                       
                       $pro_price = $row_products['product_price'];
                       
                       $pro_img1 = $row_products['product_img1'];
                       
                       echo "
                       
                    <div class='col-md-3 col-sm-6 center-responsive'><!-- col-md-3 col-sm-6 center-responsive Begin -->
                       <div class='product same-height'><!-- product same-height Begin -->
                           <a href='details.php?pro_id=$pro_id'>
                               <img class='img-responsive' src='admin_area/product_images/$pro_img1' alt='Product 6'>
                            </a>
                            
                            <div class='text'><!-- text Begin -->
                                <h3><a href='details.php?pro_id=$pro_id'> $pro_title </a></h3>
                                
                                <p class='price'>$$pro_price</p>
                                
                            </div><!-- text Finish -->
                            
                        </div><!-- product same-height Finish -->
                   </div><!-- col-md-3 col-sm-6 center-responsive Finish -->
                   
                       ";
                       
                   }
                   
                   ?>
                </div><!-- row same-height-row Close -->
            </div><!-- col-md-9 Close -->
            <div class="col-md-3"><!-- col-md-3 Open -->
                <div id="order-summary" class="box"><!-- box Open -->
                    <div class="box-header"><!-- box-header Open -->
                        <h3>Order Summary</h3>
                    </div><!-- box-header Close -->
                    <p class="text-muted"><!-- text-muted Open -->
                        Shipping and Additional costs are calculated based on value you have entered
                    </p><!-- text-muted Close -->
                    <div class="table-responsive"><!-- table-responsive Open -->
                        <table class="table"><!-- table Open -->
                            <tbody><!-- tbody Open -->
                                <tr><!-- tr Open -->
                                    <td> Order Sub-Total </td>
                                    <th> ₹ <?php echo $total; ?> </th>
                                </tr><!-- tr Close -->
                                <tr><!-- tr Open -->
                                    <td> Shipping and Handling </td>
                                    <td> ₹ 100 </td>
                                </tr><!-- tr Close -->
                                <tr><!-- tr Open -->
                                    <td> Tax </td>
                                    <td> ₹ 0 </td>
                                </tr><!-- tr Close -->
                                <tr class="total"><!-- tr Open -->
                                    <td> Total </td>
                                    <td> ₹ <?php echo $total; ?> </td>
                                </tr><!-- tr Close -->
                            </tbody><!-- tbody Close -->
                        </table><!-- table Close -->
                    </div><!-- table-responsive Close -->
                </div><!-- box Close -->
            </div><!-- col-md-3 Close -->
        </div><!-- container Close -->
    </div><!-- content Close -->
    
    <?php
    include("includes/footer.php");    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
</body>
</html>