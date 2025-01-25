
<?php
session_start();

require_once "layout/header.php";
include "connect.php";

?>

<link rel="stylesheet" href="css/style.css">

<h1>Naše Produkty</h1>

<?php

$sql = "SELECT id, name, image, description, price FROM products";

$sqlstat=mysqli_query($con,$sql);

if($sqlstat) {
    $num=mysqli_num_rows($sqlstat);
    if($num>0) {

            echo "<div class='product-container'>";

        while($row = mysqli_fetch_assoc($sqlstat)){
                
            // ZAČÁTEK SPRÁVNÝ KOD
            echo "<div class='product'>";
            echo "<img src='" . $row['image'] . "' alt='" .$row['name'] . "'>";           
            echo "<h3>" . $row['name'] . "</h3>";
            echo "<p class='box'>" . $row['description'] . "</p>";
            echo "<p><b>" . $row['price'] . " Kč</b></p>";

            echo "<form action='kosik.php' method='POST'>";
            echo "<input type='hidden' name='product_id' value='" . ($row['id']) . "'>";
            echo "<input type='submit' name='buy_btn' value='Přidat do košíku'>";
            echo "</form>";
            echo "</div>";
            // KONEC SPRAVNY KOD
            
            
            
            
            /*
                echo "<div class='product'>";
                echo "<img src='" . htmlspecialchars($row['immage']) . "' alt='" . htmlspecialchars($row['name']) . "'>";
                echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
                echo "<p>" . htmlspecialchars($row['description']) . "</p>";
                echo "<p><strong>" . htmlspecialchars($row['price']) . " Kč</strong></p>";
                echo "</div>";
            */
        }; 
    }
} 
?>





<?php
require_once "layout/footer.php";
?>