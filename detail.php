<?php
session_start();

require_once "layout/header.php";
include "connect.php";


$cislo_objednavky = $_GET['cislo_objednavky'];

?>

<title>Stránka admina</title>

<h1>Detail objednávky č. <?php echo $cislo_objednavky ?></h1>

<table>
    <tr>
        <th>Číslo produktu</th>
        <th>Množství</th>
        <th>Cena</th>       
    </tr>




<?php


if(!isset($_SESSION['admin_checked'])) {
    header('location:ucet.php');
} else {

    $sql = "select * from order_items where order_id = $cislo_objednavky";
    $sqlstat = mysqli_query($con, $sql);



    if($sqlstat) {

        while($row = mysqli_fetch_assoc($sqlstat)) {
    
            $product_id = $row['product_id'];
            $quantity = $row['quantity'];
            $price = number_format($row['price'], 2);




            echo "<tr>        
                    <td>$product_id</td>
                    <td>$quantity</td>
                    <td>$price Kč</td>                    
                  </tr>";            
    
            }
    
        }
    

}



?>

</table>

<form method="post">
<input type="submit" name="change_btn" value="Změnit na odesláno">
</form>


<?php 



if(isset($_POST['change_btn'])){

    $sql = "update orders set state = 'sent' where id = $cislo_objednavky";

    $sqlstat = mysqli_query($con, $sql);

    if($sqlstat) {
         
        echo '<script>alert("Stav objednávky byl změněn na sent")</script>';
    } else {
        
        echo '<script>alert("Změnu stavu objednávky se nepodařilo uskutečnit")</script>';
    }

    }

?>






<?php
require_once "layout/footer.php";
?>