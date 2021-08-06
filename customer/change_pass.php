<h1 align="center"> Change Password </h1>

<form action="" method="post"><!-- form Open -->
    <div class="form-group"><!-- form-group Open -->
        <label> Your Old Password: </label>
        <input type="text" name="old_pass" class="form-control" required>
    </div><!-- form-group Close -->
    <div class="form-group"><!-- form-group Open -->
        <label> Your New Password: </label>
        <input type="text" name="new_pass" class="form-control" required>
    </div><!-- form-group Close -->
    <div class="form-group"><!-- form-group Open -->
        <label> Confirm New Password: </label>
        <input type="text" name="new_pass_again" class="form-control" required>
    </div><!-- form-group Close -->
    <div class="text-center"><!-- text-center Open -->
        <button type="submit" name="submit" class="btn btn-primary"><!-- btn btn-primary Open -->
            <i class="fa fa-user"></i> Update Now
        </button><!-- btn btn-primary Close -->
    </div><!-- text-center Close -->
</form><!-- form Close -->
<?php 

if(isset($_POST['submit'])){
    
    $c_email = $_SESSION['customer_email'];
    
    $c_old_pass = $_POST['old_pass'];
    
    $c_new_pass = $_POST['new_pass'];
    
    $c_new_pass_again = $_POST['new_pass_again'];
    
    $sel_c_old_pass = "select * from customers where customer_pass='$c_old_pass'";
    
    $run_c_old_pass = mysqli_query($con,$sel_c_old_pass);
    
    $check_c_old_pass = mysqli_fetch_array($run_c_old_pass);
    
    if($check_c_old_pass==0){
        
        echo "<script>alert('Sorry, your current password did not valid. Please try again')</script>";
        
        exit();
        
    }
    
    if($c_new_pass!=$c_new_pass_again){
        
        echo "<script>alert('Sorry, your new password did not match')</script>";
        
        exit();
        
    }
    
    $update_c_pass = "update customers set customer_pass='$c_new_pass' where customer_email='$c_email'";
    
    $run_c_pass = mysqli_query($con,$update_c_pass);
    
    if($run_c_pass){
        
        echo "<script>alert('Your password has been updated')</script>";
        
        echo "<script>window.open('my_account.php?my_orders','_self')</script>";
        
    }
    
}

?>