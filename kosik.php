
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

                    $sql = "SELECT p.image, p.name, c.quantiti, p.price, p.id 
                    FROM cart c
                    JOIN products p ON c.product_id = p.id
                    WHERE c.user_id = $user";
            
            $sqlstat = mysqli_query($con, $sql);
    
    
            echo '<table class="kosik">
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
            $_SESSION['totalprice'] = 0;        
    
            while ($row = mysqli_fetch_assoc($sqlstat)) {

                $subtotal = $row['quantiti'] * $row['price'];
                $_SESSION['totalprice'] += $subtotal;

                echo '<tbody>
                      <tr>
                        <td><img src="' . $row['image'] . '" alt="' . $row['name'] . '" width="80"></td>
                        <td>' . $row['name'] . '</td>
                        <td>
                            <form method="POST">

                                
                                <input type="hidden" name="product_id" value="' . $row['id'] . '">
                                <input type="number" name="quantiti" value="' . $row['quantiti'] . '" min="1" class="input_mnozstvi">
                                <button type="submit" name="update_btn" class="update_btn"><i class="fa-sharp fa-solid fa-arrows-rotate" style="color:green;"></i></button>
                                

                            </form>
                        
                        
                        </td>
                        <td>' . number_format($row['price'], 2) . ' Kč</td>
                        <td>' . number_format($subtotal, 2) . ' Kč</td>
                        <td>
                            <form method="POST">

                                <input type="hidden" name="product_id" value="' . $row['id'] . '">
                                <button type="submit" name="remove_btn" class="remove_btn"><i class="fa-sharp fa-solid fa-trash" style="color:red;"></i></button>
                         
                            </form>
                        </td>
                      </tr>
                      </tbody>';
            }
            
            echo '</table>';

            echo '<form action="objednavka.php" method="POST">
            
                       <button type="submit" name="checkout_btn">Pokladna</button> 

                  </form>';
            echo $_SESSION['totalprice'];

            echo '<form method="POST">
            
                       <button type="submit" name="removeall_btn">Odstranit košík</button> 

                  </form>';



                } else {

                    echo "V košíku nejsou žádné produkty";

                }




                }

        } else {

            echo "nejste prihlaseni";
        }

    

        ?>
    



        <?php

            if (isset($_POST['remove_btn'])) {
                $product_id = $_POST['product_id'];
                $sql = "DELETE FROM cart WHERE user_id = $user AND product_id = $product_id";
                mysqli_query($con, $sql);
                echo "<meta http-equiv='refresh' content='0'>"; // Obnoví stránku

            }


            if (isset($_POST['update_btn'])) {

                $product_id = $_POST['product_id'];
                $new_quantiti = $_POST['quantiti'];
                $user = $_SESSION['id']; 
            
                
                $sql = "UPDATE cart SET quantiti = $new_quantiti WHERE product_id = $product_id AND user_id = $user";
                if (mysqli_query($con, $sql)) {
                    
                    echo "<meta http-equiv='refresh' content='0'>"; // Obnoví stránku

                } 
                
            }


            if(isset($_POST['removeall_btn'])){

                $user = $_SESSION['id']; 
                $sql = "DELETE FROM cart WHERE user_id = $user";
                mysqli_query($con, $sql);
                echo "<meta http-equiv='refresh' content='0'>"; // Obnoví stránku
            }



        ?>




   


<?php
require_once "layout/footer.php";
?>
