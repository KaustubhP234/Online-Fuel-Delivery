<?php
    /*if(isset($message)){
        foreach($message as $message){
            echo
            '<div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
            </div>
        ';        }
    }*/

?>



<?php
    error_reporting(0);
    ini_set('display_errors',0);
    ?>
    <?php
    if(isset($message)){
        foreach($message as $message){
            echo '<div class="message"> 
            <span>.$message.</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>';
        }
    }
    ?>

<header class="header">
    <div class="flex">
        <a href="admin.php" class="logo">Admin<span>Panel</span></a>
        <nav class="navbar">
            <a href="admin.php">Home</a>
            
            <a href="admin_order.php">Order</a>
            <a href="admin_user.php">Users</a>
            <a href="admin_contact.php">Messages</a>
            <a href="login.php">Login</a>


            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


        </nav>
        
        <div class="account-box">
            <p>username : <span><?php echo $_SESSION['admin_name'];?></span></p>
            <p>email : <span><?php echo $_SESSION['admin_email'];?></span></p>
            <a href="logout.php" class="delete-btn">Log Out</a>
    
        </div>
    </div>
</header>