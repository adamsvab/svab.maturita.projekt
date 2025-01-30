
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>

<nav class="navbar">    
<ul>
  <span><li><a href="index.php">Produkty</a></li></span>
  <span><li><a href="kosik.php">Košík</a></li></span>
  <span><li><a href="ucet.php">
    
  <?php

        if(isset($_SESSION['logged_id'])) {
            echo "Můj účet";
        } else {
            echo "Přihlásit se";
        }           

  ?>
  </a></li></span>

  <span><li><a href="objednavka.php">(Objednávka)</a></li></span>
  <span><li><a href="admin.php">(Přehled)</a></li></span>
  <span><li><a href="login.php">(Přihlášeni)</a></li></span>
  <span><li><a href="shrnuti.php">(Shrnutí)</a></li></span>
</ul>
</nav>


<!--
<div class="navbar">
    <div class="logo">E-shop</div>
    <div>
        <span><a href="index.php">Produkty</a></span>
        <span><a href="kosik.php">Košík</a></span>
        <span><a href="login.php">Přihlášení</a></span>
        <span><a href="objednavka.php">Objednávka</a></span>
    </div>
</div>
-->


