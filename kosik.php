
<?php
session_start();
include "connect.php"; 
require_once "layout/header.php";

?>

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<h1>Košík</h1>


<?php

if(isset($_SESSION['logged_id'])){

    $customer_id = $_SESSION['id'];
    //$product_id = $_POST['product_id'];

    $sql = "select product_id from `cart` where customer_id = $customer_id ";
    $sqlstat = mysqli_query($con, $sql);

    if($sqlstat) {
        $num=mysqli_num_rows($sqlstat);
        if($num>0) {

            $sql = "select name, image, price from `products` where id = $product_id";
            $sqlstat = mysqli_query($con, $sql);

            if($sqlstat) {

                while($row = mysqli_fetch_assoc($sqlstat)) {

                    echo $row['name'];

                }
            }
        }
    }
}










if(isset($_POST['buy_btn'])){
    
    $customer_id = $_SESSION['id'];
    $product_id = $row['id'];







    $sql = "insert into `cart` (customer_id, product_id)
            values ('$customer_id', '$product_id')";
    $sqlstat = mysqli_query($con, $sql);        
}



?>





<?php
require_once "layout/footer.php";
?>









<!--

// Kontrola, zda byl formulář odeslán
if (isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']);

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (!in_array($product_id, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $product_id;
        echo "Produkt byl přidán do košíku.<br>";
    } else {
        echo "Produkt je již v košíku.<br>";
    }
}

// Zobrazení obsahu košíku
if (!empty($_SESSION['cart'])) {
    $ids = implode(',', array_map('intval', $_SESSION['cart'])); // Získání všech ID produktů v košíku
    $sql = "SELECT id, name, price FROM products WHERE id IN ($ids)";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "Produkty v košíku:<br>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Produkt: " . htmlspecialchars($row['name']) . " - " . number_format($row['price'], 2, ',', ' ') . " Kč<br>";
        }
    }
} else {
    echo "Košík je prázdný.";
}
?>




-->



















<!--

<table>
<tr>
    <th>číslo</th>
    <th>název</th>
    <th>cena</th>
    <th>množství</th>
    <th>celková cena</th>
    <th>odstranit</th>
</tr>
<tr>
    <td>01</td>
    <td>rolex</td>
    <td>2</td>    
    <td><input type="number"></td>
    <td>1000000</td>
    <td><i class="fas fa-trash"></i></td>

</tr>
<tr>
    <td>02</td>
    <td>rolex</td>
    <td>1</td>    
    <td><input type="number"></td>
    <td>4s000</td>
    <td><input type="submit" name="remove" value="odstranit"></td>

</tr>


</table>
<br>
<input type="submit" name="submit" value="objednat">

-->
