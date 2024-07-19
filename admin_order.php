<?php
/*include 'config.php';
session_start();
$admin_id=$_SESSION['admin_id'];
if(!isset($admin_id)){
    header('location:login.php');
}*/
?>
<?php
/*include 'config.php';
session_start();
$admin_id=$_SESSION['admin_id'];
if(!isset( $admin_id )) {
    header( 'Location: login.php' );
}
if(isset($_POST['update_order'])){
    $order_update_id=$_POST['order_id']
    $order_query($conn,"UPDATE 'orders' SET payment_status='$update_payment'") or die('query failed');
    echo "<script>alert('Order Updated Success')</script>";
    $message[]='payment status has  been updated successfully!';

}
if(isset($_GET['delete'])){
    $delete_id= $_GET['delete'];
    mysqli_query($conn,"DELETE FROM 'orders' WHERE id='$delete_id'") or die('query failed');
    header('location:admin_order.php');
}

*/
?>

<?php
    error_reporting(0);
    ini_set('display_errors',0);
    ?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <?php include 'aheader.php'; ?>
    <section class="order">
        <h1 class="title">Placed Order</h1>
        <div class="box-container">
            <?php
            /*$select_orders=mysqli_query( $conn,"SELECT * FROM 'orders'") or die('Query Failed!');
            if(mysqli_num_rows( $select_orders )>0){
                while($fetch_orders=mysqli_fetch_assoc( $select_orders )){*/
           
            ?>
            <div class="box">
                <p> user id: <span><?php echo $fetch_order[ 'user_id' ]; ?></span></p>
                <p> placed on: <span><?php echo $fetch_order[ 'placed_on']; ?></span></p>
                <p> name : <span><?php echo $fetch_order[ 'name' ]; ?></span></p>
                <p> number : <span><?php echo $fetch_order[ 'number' ]; ?></span></p>
                <p> email : <span><?php echo $fetch_order[ 'email' ]; ?></span></p>
                <p> address : <span><?php echo $fetch_order[ 'address' ]; ?></span></p>
                <p> total products : <span><?php echo $fetch_order[ 'total_products' ]; ?></span></p>
                <p> total price : <span><?php echo $fetch_order[ 'total_price' ]; ?></span></p>
                <p> payment method : <span><?php echo $fetch_order[ 'method' ]; ?></span></p>
                <form action="" method="post">
                    <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>"
                     <select name="update_payment">
                     <option value="" selected disabled><?php echo $fetch_orders['payment_status']; ?></option>
                    <option value="Pending">Pending</option>
                    <option value="completed">completed</option>

                     </select>
                    <input type="submit" value="update" name="update" class="option-btn">
                    <a href="admin_order.php?delete=<?php echo $fetch_orders['id'];?>" onclick="return confirm('delete this order?');" class="delete-btn">delete order</a>
                </form>







            </div>
                <?php
                 /*}
                }else{
                    echo '<p class="empty">No orders yet.</p>';
                }*/
                ?>
        </div>
    
        
    
    </section>




    
</body>
</html>