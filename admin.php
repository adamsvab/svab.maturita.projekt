<?php
session_start();


require_once "layout/header.php";
include "connect.php";
?>

<link rel="stylesheet" href="css/style.css">

<h1>Přehled objednávek</h1>

<table>
    <tr>
        <th>#</th>
        <th>Jméno</th>
        <th>Příjmení</th>
        <th>Datum vytvoření</th>
        <th>Stav</th>
        <th>Změna</th>
    </tr>


<?php 



if(!isset($_SESSION['admin_checked'])) {
    header('location:ucet.php');
} else {


$sql = "select id, name, surname, created_at, state from admin_panel";
$sqlstat = mysqli_query($con, $sql);

if($sqlstat) {

    while($row = mysqli_fetch_assoc($sqlstat)) {

        $id = $row['id'];
        $name = $row['name'];
        $surname = $row['surname'];
        $create = $row['created_at'];
        $state = $row['state'];


    echo "<tr>        
            <td>$id</td>
            <td>$name</td>
            <td>$surname</td>
            <td>$create</td>
            <td>$state</td>
          </tr>
        ";

        }

    }

}


?>


</table>





<?php
require_once "layout/footer.php";
?>