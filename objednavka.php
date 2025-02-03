<?php
session_start();
include "connect.php";
require_once "layout/header.php";

?>



<h1>Detail objednávky</h1>

<h2>Doručovací údaje</h2>
<form action="objednavka.php" method="post"> 
<div> 
        <div class="box"> <!-- TODO DORUCENI NA ADRESU-->
        <label for="city">Město:</label><br>
        <input type="text" name="city" required><br>
        <label for="street">Ulice:</label><br>
        <input type="text" name="street" required><br>
        <label for="postcode">PSČ:</label><br>
        <input type="number" name="postcode" required><br>
        <label for="house_number">č.p:</label><br>
        <input type="number" name="house_number" required>
    </div>
    <h2>Způsob platby</h2>
    <div class="box">
            <!-- TODO DOBIRKA-->
    </div>
        <input type="submit" name="submit" value="Potvrdit">
</div>
</form>



<?php

    if(!isset($_POST['checkout_btn'])){

        header('location:kosik.php');

    } 



    if (isset($_POST['submit'])) {

        $city = $_POST['city'];
        $street = $_POST['street'];
        $postcode = $_POST['postcode'];
        $house_number = $_POST['house_number'];
        $user = $_SESSION['id'];
        $totalprice = $_SESSION['totalprice'];
    
        $sql = "INSERT INTO orders (user_id, total_price, city, street, house_number, postcode) 
                VALUES ('$user', '$totalprice', '$city', '$street', '$house_number', '$postcode')";
        $sqlstat = mysqli_query($con, $sql);
    
        if ($sqlstat) {
            $order_id = mysqli_insert_id($con);
    
            $sql = "SELECT * FROM cart WHERE user_id = $user";
            $sqlstat = mysqli_query($con, $sql);
    
            while ($row = mysqli_fetch_assoc($sqlstat)) {
                $product_id = $row['product_id'];
                $quantity = $row['quantiti'];
    
                $sql_price = "SELECT price FROM products WHERE id = $product_id";
                $sqlstat_price = mysqli_query($con, $sql_price);
                $row_price = mysqli_fetch_assoc($sqlstat_price);
                $price = $row_price['price'];
    
                $sql_insert = "INSERT INTO order_items (order_id, product_id, quantity, price) 
                               VALUES ($order_id, $product_id, $quantity, $price)";
                mysqli_query($con, $sql_insert);
            }
    
            
            $sql_delete = "DELETE FROM cart WHERE user_id = $user";
            mysqli_query($con, $sql_delete);
    
            
            header('location:shrnuti.php');
            exit();
        } else {
            echo "Něco je špatně";
        }
    }


?>




<?php
require_once "layout/footer.php";
?>