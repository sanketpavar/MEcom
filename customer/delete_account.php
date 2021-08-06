<center><!-- center Open -->
    <h1> Do you Really Want to Delete your Account ? </h1>
    <form action="" method="post"><!-- form Open -->
        <input type="submit" name="Yes" value="Yes, I want To Delete" class="btn btn-danger">
        <input type="submit" name="No" value="Yes, I Dont want To Delete" class="btn btn-primary">
    </form><!-- form Close -->
</center><!-- center Close -->

<?php 

$c_email = $_SESSION['customer_email'];

if(isset($_POST['Yes'])){
    
    $delete_customer = "delete from customers where customer_email='$c_email'";
    
    $run_delete_customer = mysqli_query($con,$delete_customer);
    
    if($run_delete_customer){
        
        session_destroy();
        
        echo "<script>alert('Successfully delete your account, feel sorry about this. Good Bye')</script>";
        
        echo "<script>window.open('../index.php','_self')</script>";
        
    }
    
}

if(isset($_POST['No'])){
    
    echo "<script>window.open('my_account.php?my_orders','_self')</script>";
    
}

?>