<?php
$active='Contact';
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
                        Contact Us
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
                       <div class="box-header"><!-- box-header Open -->
                           <center><!-- center Open -->
                               <h2> Feel free to Contact Us </h2>
                               <p class="text-muted"><!-- text-muted Open -->
                                   If you have any queries, feel free to contact us. We work <strong>24*7</strong> for our Customers.
                               </p><!-- text-muted Close -->
                           </center><!-- center Close -->
                           <form action="contact.php" method="post"><!-- form Open -->
                               <div class="form-group"><!-- form-group Open -->
                                   <label>Name</label>
                                   <input type="text" class="form-control" name="name" required>
                               </div><!-- form-group Close -->
                               <div class="form-group"><!-- form-group Open -->
                                   <label>Email</label>
                                   <input type="text" class="form-control" name="email" required>
                               </div><!-- form-group Close -->
                               <div class="form-group"><!-- form-group Open -->
                                   <label>Subject</label>
                                   <input type="text" class="form-control" name="subject" required>
                               </div><!-- form-group Close -->
                               <div class="form-group"><!-- form-group Open -->
                                   <label>Message</label>
                                   <textarea name="message" class="form-control"></textarea>
                               </div><!-- form-group Close -->
                               <div class="text-center"><!-- text-center Open -->
                                   <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Send Message</button>
                               </div><!-- text-center Close -->
                           </form><!-- form Close -->
                           <?php 
                       
                       if(isset($_POST['submit'])){
                           
                           /// Admin receives message with this ///
                           
                           $sender_name = $_POST['name'];
                           
                           $sender_email = $_POST['email'];
                           
                           $sender_subject = $_POST['subject'];
                           
                           $sender_message = $_POST['message'];
                           
                           $receiver_email = "ayush.sah@spit.ac.in";
                           
                           mail($receiver_email,$sender_name,$sender_subject,$sender_message,$sender_email);
                           
                           /// Auto reply to sender with this ///
                           
                           $email = $_POST['email'];
                           
                           $subject = "Welcome to my website";
                           
                           $msg = "Thanks for sending us message. ASAP we will reply your message";
                           
                           $from = "ayush.sah@spit.ac.in";
                           
                           mail($email,$subject,$msg,$from);
                           
                           echo "<h2 align='center'> Your message has sent sucessfully </h2>";
                           
                       }
                       
                       ?>
                       </div><!-- box-header Close -->
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