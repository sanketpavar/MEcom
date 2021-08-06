<div id="footer"><!-- footer Open -->
    <div class="container"><!-- container Open -->
        <div class="row"><!-- row Open -->
            <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Open -->
                <ul><!-- ul Open -->
                   <h4>Pages</h4>
                    <li><a href="cart.php">Shopping Cart</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="customer/my_account.php">My Account</a></li>
                </ul><!-- ul Close -->
                <br>
                <h4>User Section</h4>
                <ul><!-- ul Open -->
                    <?php 
                                if(!isset($_SESSION['customer_email'])){
                                    echo "<a href='checkout.php'>Login</a>";
                                }else{
                                    echo "<a href='customer/my_account.php?myorders'>My Account</a>";
                                }
                                
                            ?>
                    <li><a href="customer_register.php">Register</a></li>
                </ul><!-- ul Close -->
                <hr class="hidden-md hidden-lg hidden-sm">
            </div><!-- col-sm-6 col-md-3 Close -->
            <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Open -->
                <h4>Top Products Categories</h4>
                <ul><!-- ul Open -->
                <?php 
                    
                        $get_p_cats = "select * from product_categories";
                    
                        $run_p_cats = mysqli_query($con,$get_p_cats);
                    
                        while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                            
                            $p_cat_id = $row_p_cats['p_cat_id'];
                            
                            $p_cat_title = $row_p_cats['p_cat_title'];
                            
                            echo "
                            
                                <li>
                                
                                    <a href='shop.php?p_cat=$p_cat_id'>
                                    
                                        $p_cat_title
                                    
                                    </a>
                                
                                </li>
                            
                            ";
                            
                        }
                    
                    ?>
                </ul><!-- ul Close -->
                <hr class="hidden-md hidden-lg">
            </div><!-- col-sm-6 col-md-3 Close -->
            <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Open -->
                <h4>Find Us:</h4> 
                <p><!-- p Open -->
                    <strong>Sardar Patel Institute of Technology</strong>
                    <br>Bhavans Campus, Old D N Nagar
                    <br>Munshi Nagar, Andheri West
                    <br>Mumbai, Maharashtra - 400058
                    <br><strong>Mr. Sanket Pawar</strong>&nbsp;<br><strong>Mr. Dhiraj Rawat</strong>&nbsp;<br><strong>Mr. Ayush Sah</strong>
                </p><!-- p Close -->       
                <a href="contact.php">Check Our Contact Page</a>
                <hr class="hidden-md hidden-lg">
            </div><!-- col-sm-6 col-md-3 Close -->
                <div class="col-sm-6 col-md-3">
                    <h4>Get The News</h4>
                    <p class="text-muted">
                        Get latest updates regarding our website.
                    </p>
                    <form action="" method="post"><!-- form Open -->
                        <div class="input-group"><!-- input-group Open -->
                            <input type="text" class="form-control" name="email">
                            <span class="input-group-btn"><!-- input-group-btn Open -->
                                <input type="submit" value="subscribe" class="btn btn-default">
                            </span><!-- input-group-btn Close -->
                        </div><!-- input-group Close -->
                    </form><!-- form Close -->
                    <hr>
                    <h4>Keep In Touch</h4>
                    <p class="social">
                        <a href="#" class="fa fa-facebook"></a>
                        <a href="#" class="fa fa-twitter"></a>
                        <a href="#" class="fa fa-instagram"></a>
                        <a href="#" class="fa fa-google-plus"></a>
                        <a href="#" class="fa fa-envelope"></a>
                    </p>
                </div>
        </div><!-- row Close -->
    </div><!-- container Close -->
</div><!-- footer Close -->


<div id="copyright"><!-- copyright Open -->
    <div class="container"><!-- container Open -->
        <div class="col-md-6"><!-- col-md-6 Open -->
            <p class="pull-left">&copy; MCA Students 2019-2022 All Rights Reserved</p>
        </div><!-- col-md-6 Close -->
        
        <div class="col-md-6"><!-- col-md-6 Open -->
            <p class="pull-right"> Made By: <a href="https://www.facebook.com/pavarsanket">Sanket</a>, <a href="https://www.facebook.com/Dhirajsinghrawat">Dhiraj</a>, <a href="https://www.facebook.com/Sah.Ayush">Ayush</a></p>
        </div><!-- col-md-6 Close -->
    </div><!-- container Close -->
</div><!-- copyright Close -->