
<?php
session_start();

require_once "layout/header.php";
include "connect.php";

?>

<title>Produkty</title>

<h1>Naše Produkty</h1>

<?php

$sql = "SELECT id, name, image, description, price FROM products";

$sqlstat=mysqli_query($con,$sql);

if($sqlstat) {
    $num=mysqli_num_rows($sqlstat);
    if($num>0) {

            echo "<div class='product-container'>";

        while($row = mysqli_fetch_assoc($sqlstat)){
                
            
            echo "<div class='product'>";
            echo "<img src='" . $row['image'] . "' alt='" .$row['name'] . "'>";           
            echo "<h3>" . $row['name'] . "</h3>";
            echo "<p>" . $row['description'] . "</p>";
            echo "<p><b>" . number_format($row['price']) . " Kč</b></p>";

            echo "<form action='index.php' method='POST'>";
            echo "<input type='hidden' name='product_id' value='" . ($row['id']) . "'>";
            echo "<input type='submit' name='buy_btn' value='Přidat do košíku'>";
            echo "</form>";
            echo "</div>";
                                   
        }; 
    }
} 
?>


<?php


 
    
    
    if(isset($_POST['buy_btn'])){


        if(isset($_SESSION['logged_id'])) {



        $user = $_SESSION['id'];
        $product = $_POST['product_id'];

        
        $sql = "SELECT * FROM CART WHERE user_id = $user AND product_id = $product";
        $sqlstat = mysqli_query($con, $sql);

            if (mysqli_num_rows($sqlstat) > 0) {
                
                $sql = "UPDATE CART SET quantiti = quantiti + 1 WHERE user_id = $user AND product_id = $product";
                $sqlstat = mysqli_query($con, $sql);
            } else {
                
                $sql = "INSERT INTO CART (user_id, product_id) VALUES ($user, $product)";
                $sqlstat = mysqli_query($con, $sql);
            }
        
        } else {

            echo '<script>alert("Nejste přihlášeni, pro přidání zboží se prosím přihlašte.")</script>';
        }
      
    }
   
  

    




  








?>

<?php
require_once "layout/footer.php";
?>