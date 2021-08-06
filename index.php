<?php
$active='Home';
include("includes/header.php");

?>
    
    <div class="container" id="slider"><!-- container Open -->
        <div class="col-md-12"><!-- col-md-12 Open -->
            <div class="carousel slide" id="myCarousel" data-ride="carousel"><!-- carousel slide Open -->
                <ol class="carousel-indicators"><!-- carousel-indicator Open -->
                    <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol><!-- carousel-indicator Close -->
                <div class="carousel-inner"><!-- carousel-inner Open -->
                    <?php
                    $get_slides = "select * from slider LIMIT 0,1";
                    $run_slides = mysqli_query($con,$get_slides);
                    while($row_slides=mysqli_fetch_array($run_slides)){
                        $slide_name = $row_slides['slide_name'];
                        $slide_image = $row_slides['slide_image'];
                        $slide_url = $row_slides['slide_url'];
                        echo "
                        <div class='item active'>
                            <a href='$slide_url'>
                                <img src='admin_area/slides_images/$slide_image'>
                            </a>
                        </div>
                        ";
                    }
                    
                    $get_slides = "select * from slider LIMIT 1,3";
                    $run_slides = mysqli_query($con,$get_slides);
                    while($row_slides=mysqli_fetch_array($run_slides)){
                        $slide_name = $row_slides['slide_name'];
                        $slide_image = $row_slides['slide_image'];
                        $slide_url = $row_slides['slide_url'];
                        echo "
                        <div class='item'>
                            <a href='$slide_url'>
                                <img src='admin_area/slides_images/$slide_image'>
                            </a>
                        </div>
                        ";
                    }
                    ?>
                </div><!-- carousel-inner Close -->
                <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Open -->
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a><!-- left carousel-control Close -->
                <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- left carousel-control Open -->
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a><!-- left carousel-control Close -->
            </div><!-- carousel slide Close -->
        </div><!-- col-md-12 Close -->
    </div><!-- container Close -->
    
    <div id="advantages"><!-- advantages Open -->
        <div class="container"><!-- container Open -->
            <div class="same-height-row"><!-- same-height-row Open -->
                <div class="col-sm-4"><!-- col-sm-4 Open -->
                    <div class="box same-height"><!-- box same-height Open -->
                        <div class="icon"><!-- icon Open -->
                            <i class="fa fa-heart"></i>
                        </div><!-- icon Close -->
                        <h3><a href="#">Wide Variety</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div><!-- box same-height Close -->
                </div><!-- col-sm-4 Close -->
                <div class="col-sm-4"><!-- col-sm-4 Open -->
                    <div class="box same-height"><!-- box same-height Open -->
                        <div class="icon"><!-- icon Open -->
                            <i class="fa fa-tag"></i>
                        </div><!-- icon Close -->
                        <h3><a href="#">Best Prices</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div><!-- box same-height Close -->
                </div><!-- col-sm-4 Close -->
                <div class="col-sm-4"><!-- col-sm-4 Open -->
                    <div class="box same-height"><!-- box same-height Open -->
                        <div class="icon"><!-- icon Open -->
                            <i class="fa fa-thumbs-up"></i>
                        </div><!-- icon Close -->
                        <h3><a href="#">100% Original</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        
                    </div><!-- box same-height Close -->
                </div><!-- col-sm-4 Close -->
            </div><!-- same-height-row Close -->
        </div><!-- container Close -->
    </div><!-- advantages Close -->
    
    <div id="hot"><!-- hot Open -->
        <div class="box"><!-- box Open -->
            <div class="container"><!-- container Open -->
                <div class="col-md-12"><!-- col-md-12 Open -->
                    <h2>
                        Our Latest Products
                    </h2>
                </div><!-- col-md-12 Close -->
            </div><!-- container Close -->
        </div><!-- box Close -->
    </div><!-- hot Close -->
    
    <div id="content" class="container"><!-- container Open -->
        <div class="row"><!-- row Open -->
            <?php 
            getPro();
            ?>
        </div><!-- row Close -->
    </div><!-- container Close -->
    
    <?php
    include("includes/footer.php");    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
</body>
</html>