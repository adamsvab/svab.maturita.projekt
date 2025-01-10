<?php
$SERVER = "localhost";
$LOGIN = "root";
$PASSWORD = "root";
$SCHEMA = "eshop";

$con=mysqli_connect($SERVER, $LOGIN, $PASSWORD, $SCHEMA);

if (!$con) {
    return mysqli_connect_error();
} 


//return $con;

?>
