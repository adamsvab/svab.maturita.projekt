
<?php
session_start();
include "connect.php"; 
require_once "layout/header.php";

?>



<title>Nákupní košík</title>        

    <h1>Košík</h1>

    
    
        <?php 
        
        if(isset($_SESSION['logged_id'])){

            $user = $_SESSION['id']; 

            $sql = "select * from cart where user_id = $user";
            $sqlstat = mysqli_query($con, $sql);

            if($sqlstat) {
                $num=mysqli_num_rows($sqlstat);
                if($num>0) {

                    $sql = "SELECT p.image, p.name, c.quantiti, p.price 
                    FROM cart c
                    JOIN products p ON c.product_id = p.id
                    WHERE c.user_id = $user";
            
            $sqlstat = mysqli_query($con, $sql);
    
    
            echo '<table>
                  <thead>
                        <tr>
                            <th>Položka</th>
                            <th>Popis</th>
                            <th>Množství</th>
                            <th>Cena</th>
                            <th>Mezisoučet</th>
                            <th>Odstranit</th>
                        </tr>
                  </thead>';
    
    
            while ($row = mysqli_fetch_assoc($sqlstat)) {
                echo '<tr>
                        <td><img src="' . $row['image'] . '" alt="' . $row['name'] . '" width="50"></td>
                        <td>' . $row['name'] . '</td>
                        <td>' . $row['quantiti'] . '</td>
                        <td>' . number_format($row['price'], 2) . ' Kč</td>
                        <td></td>
                        <td></td>
                      </tr>';
            }
            
            echo '</table>';

                } else {

                    echo "v kosiku nejsou zadne produkty";
                }




                }

        } else {

            echo "nejste prihlaseni";
        }

        
        /*
        $sql = "SELECT p.image, p.name, c.quantiti, p.price 
                FROM cart c
                JOIN products p ON c.product_id = p.id
                WHERE c.user_id = $user";
        
        $sqlstat = mysqli_query($con, $sql);


        echo '<table>
              <thead>
                    <tr>
                        <th>Položka</th>
                        <th>Popis</th>
                        <th>Množství</th>
                        <th>Cena</th>
                        <th>Mezisoučet</th>
                        <th>Odstranit</th>
                    </tr>
              </thead>';


        while ($row = mysqli_fetch_assoc($sqlstat)) {
            echo '<tr>
                    <td><img src="' . $row['image'] . '" alt="' . $row['name'] . '" width="50"></td>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['quantiti'] . '</td>
                    <td>' . number_format($row['price'], 2) . ' Kč</td>
                    <td></td>
                    <td></td>
                  </tr>';
        }
        
        echo '</table>';
        */
    

        ?>
    















<?php
require_once "layout/footer.php";
?>
