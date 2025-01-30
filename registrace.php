<?php
require_once "layout/header.php";
include "connect.php";


?>

<title>Registrace</title>


<h1>Registrace</h1>




<form action="registrace.php" method="post">
    <div class="box">
        <label for="name">Jméno:</label><br>
        <input type="text" name="name"><br>
        <label for="surname">Příjmení:</label><br>
        <input type="text" name="surname" required><br>
        <label for="email">Email:</label><br>
        <input type="email" name="email" required><br>
        <label for="password">Heslo:</label><br>
        <input type="password" name="password" required><br>    
    </div>
        <input type="submit" name="register" value="registrovat se">
</form>

<div>
Máte účet?
<a href="login.php">Přihlašte se</a>
</div>


<?php

$user=0;
$success=0;


if(isset($_POST['register'])){

    $name=mysqli_real_escape_string($con, $_POST['name']);
    $surname=mysqli_real_escape_string($con, $_POST['surname'] );
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password=mysqli_real_escape_string($con, $_POST['password']);

    $sql="select * from `users` where email='$email'";

    $sqlstat=mysqli_query($con,$sql);
    if($sqlstat) {
        $num=mysqli_num_rows($sqlstat);
        if($num>0) {
            $user=1;
        } else {
            $sql="insert into `users` (name, surname, email, password)
                  values ('$name', '$surname', '$email', md5($password))";
            $sqlstat=mysqli_query($con,$sql);
            if($sqlstat) {
                $success=1;
                
            } else {
                die(mysqli_error($con));
            }      
        }
    }
}

?>

<?php

if($user){
    echo '<script>alert("Tento email už je zaregistrován")</script>';;
}


if($success){
    echo '<script>alert("Účet byl vytvořen")</script>';;
}
   

?>


<?php
require_once "layout/footer.php";
?>