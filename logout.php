<?php
session_start();
require_once "layout/header.php";


session_destroy();

header('location:ucet.php');
?>



<?php
require_once "layout/footer.php";
?>