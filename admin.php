<?php
session_start();

require_once "layout/header.php";
include "connect.php";
?>

<title>Stránka admina</title>

<h1>Přehled objednávek</h1>

<table>
    <tr>
        <th>#</th>
        <th>Jméno</th>
        <th>Příjmení</th>
        <th>Datum vytvoření</th>
        <th>Celková cena</th>
        <th>Stav</th>
        <th></th>
    </tr>


<?php 



if(!isset($_SESSION['admin_checked'])) {
    header('location:ucet.php');
} else {


$sql = "select id, name, surname, created_at, total_price, state from admin_panel";
$sqlstat = mysqli_query($con, $sql);

if($sqlstat) {

    while($row = mysqli_fetch_assoc($sqlstat)) {
          
        
        $id = $row['id'];
        $name = $row['name'];
        $surname = $row['surname'];
        $create = $row['created_at'];
        $totalprice = number_format($row['total_price'], 2);
        $state = $row['state'];
        

    echo "<tr>        
            <td>$id</td>
            <td>$name</td>
            <td>$surname</td>
            <td>$create</td>
            <td>$totalprice</td>
            <td>$state</td>
            <td><a href='detail.php?cislo_objednavky=$id'><button type='submit' name='edit_btn' class='edit_btn'><i class='fa-solid fa-pen-to-square' style='color:red;'></i></button></a></td>
          </tr>";
        

        }

    }

}


?>


</table>





<?php
require_once "layout/footer.php";
?>