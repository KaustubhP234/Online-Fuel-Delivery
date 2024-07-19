<?php
/*include 'config.php';
session_start();
$admin_id=$_SESSION['admin_id'];
if(!isset($admin_id)){
    header('location:login.php');
}
if(isset($_GET['delete'])){
    $delete_id= $_GET['delete'];
    mysqli_query($conn,"DELETE FROM 'message' WHERE id='$delete_id'") or die('query failed');
    header('location:admin_contact.php');
}*/

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
    <title>Messages</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <?php include 'aheader.php'; ?>
    <h1 class="title">Messages</h1>
    <div class="box-container">
        <?php
       /* $select_messages=mysqli_query($conn, "SELECT * FROM 'message'") or die('query failed');
       if(mysqli_num_rows($select_messages)>0){
        while($fetch_messages=mysqli_fetch_assoc($select_messages)){*/

       
       
       ?>
        <div class="box">
            <p> name: <span><?php echo $fetch_messages['name']?></span></p>
            <p> number: <span><?php echo $fetch_messages['number']?></span></p>
            <p> email: <span><?php echo $fetch_messages['email']?></span></p>
            <p> message: <span><?php echo $fetch_messages['message']?></span></p>
            <a href="admin_contact.php?delete=<?php echo $fetch_messages['id'];?>" 
            onclick="return confirm('delete this message?');"
            class="delete-btn">delete message</a>



        </div>
        





    <script src="js/admin_script.js"></script>  
    
</body>
</html>