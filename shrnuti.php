<?php
session_start();
include "connect.php";
require_once "layout/header.php";

?>

<?php


if (isset($_GET['id'])) {
    $order_id = $_GET['id'];
    $user = $_SESSION['id'];
    $sql = "SELECT * FROM Orders WHERE id = $order_id AND user_id = $user";
    $sqlstat = mysqli_query($con, $sql);

    if (mysqli_num_rows($sqlstat) > 0) {
        $row = mysqli_fetch_assoc($sqlstat);
        echo "<h1>Shrnutí</h1>";
        echo "<h2>Vaše objednávka číslo " . $row['id'] . " byla vytvořena</h2>";
        echo "<div class='box'>Vaše objednávka bude doručena na adresu: " . $row['street'] . " " . $row['house_number'] . ", " . $row['postcode'] . " " . $row['city'] . "</div>";
    } else {
        echo "Objednávka nebyla nalezena.";
    }
} else {
    
    header('location:kosik.php');
}


?>





<?php
require_once "layout/footer.php";
?>