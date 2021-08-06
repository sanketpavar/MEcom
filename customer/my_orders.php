<center><!-- center Open -->
    <p class="lead">Your orders on one place</p>
    <p class="text-muted">
        If you have any queries, feel free to <a href="../contact.php">contact us</a>. We work <strong>24*7</strong> for our Customers.
    </p>
</center><!-- center Close -->
<hr>
<div class="table-responsive"><!-- table-responsive Open -->
    <table class="table table-bordered table-hover"><!-- table table-bordered table-hover Open -->
        <thead><!-- thead Open -->
            <tr><!-- tr Open -->
                <th> ON: </th>
                <th>Due Amount: </th>
                <th> Invoice No: </th>
                <th> Qty: </th>
                <th> Size: </th>
                <th> Order Date: </th>
                <th> Paid / Unpaid: </th>
                
            </tr><!-- tr Close -->
        </thead><!-- thead Close -->
        <tbody><!-- tbody Open -->
        <?php 
            
            $customer_session = $_SESSION['customer_email'];
            
            $get_customer = "select * from customers where customer_email='$customer_session'";
            
            $run_customer = mysqli_query($con,$get_customer);
            
            $row_customer = mysqli_fetch_array($run_customer);
            
            $customer_id = $row_customer['customer_id'];
            
            $get_orders = "select * from customer_orders where customer_id='$customer_id'";
            
            $run_orders = mysqli_query($con,$get_orders);
            
            $i = 0;
            
            while($row_orders = mysqli_fetch_array($run_orders)){
                
                $order_id = $row_orders['order_id'];
                
                $due_amount = $row_orders['due_amount'];
                
                $invoice_no = $row_orders['invoice_no'];
                
                $qty = $row_orders['qty'];
                
                $size = $row_orders['size'];
                
                $order_date = substr($row_orders['order_date'],0,11);
                
                $order_status = $row_orders['order_status'];
                
                $i++;
                
                if($order_status=='pending'){
                    
                    $order_status = 'Unpaid';
                    
                }else{
                    
                    $order_status = 'Paid';
                    
                }
            
            ?>
            <tr><!-- tr Open -->
                <th> <?php echo $i; ?> </th>
                <td> ₹ <?php echo $due_amount; ?> </td>
                <td> <?php echo $invoice_no; ?> </td>
                <td> <?php echo $qty; ?> </td>
                <td> <?php echo $size; ?> </td>
                <td> <?php echo $order_date; ?> </td>
                <td> <?php echo $order_status; ?> </td>
                
            </tr><!-- tr Close -->
             <?php } ?>
        </tbody><!-- tbody Close -->
    </table><!-- table table-bordered table-hover Close -->
</div><!-- table-responsive Close -->