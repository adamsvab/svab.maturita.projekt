<?php
session_start();
include "connect.php";
require_once "layout/header.php";

?>

<link rel="stylesheet" href="css/style.css">

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

if(isset($_POST['checkout_btn'])){

    if(isset($_POST['submit'])){

        $city = $_POST['city'];
        $street = $_POST['street'];
        $postcode = $_POST['postcode'];
        $house_number = $_POST['house_number'];
        $user = $_SESSION['id'];
        $totalprice = $_SESSION['totalprice'];

        #tatto data potrebuju vlozit do tablu orders
        #zaroven potrebuju vlozit z tablu cart produkty do tablu order_items



    }



} else {

    header('location:kosik.php');

}

?>




<?php
require_once "layout/footer.php";
?>