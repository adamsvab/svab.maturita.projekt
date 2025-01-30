<?php
session_start();
if(!isset($_SESSION['logged_id'])) {
    header('location:login.php');
}

require_once "layout/header.php";
include "connect.php";

?>

<title>Můj účet</title>

<h1>Můj účet</h1>


<div class="box">
<label>Jméno:</label><br>
    <?php echo $_SESSION['name']."<br>"; ?>
<label>Příjmení</label><br>
    <?php echo $_SESSION['surname']."<br>"; ?>
<label>Email:</label><br>
    <?php echo $_SESSION['email']."<br>"; ?> 
    
</div>
<form action="ucet.php" method="post">
    <input type="submit" name="logout" value="odhlásit se"> <br>

<?php 
    
    if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
    
        
        $sql = "select * from users where email = '$email' and role = 'admin'";
        $sqlstat = mysqli_query($con, $sql);
    
        if($sqlstat) 
        $num=mysqli_num_rows($sqlstat);
            if($num>0) {
            echo '<input type="submit" name="admin_btn" value="Admin panel">';
            $_SESSION['admin_checked'] = true;    
            //echo '<button>Admin panel</button>';
        }
    
    }


    if(isset($_POST['admin_btn'])) {
        header('location:admin.php');
    }

?>




</form>

<?php 

if(isset($_POST['logout'])) {
    header('location:logout.php');
}



?>






<?php
require_once "layout/footer.php";
?>