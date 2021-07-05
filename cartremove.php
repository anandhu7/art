<?php
include '../connection.php';
$art_id=$_GET['id'];
$sql="DELETE from cart where id=$art_id";
$result=mysqli_query($con, $sql);
if ($result)
{  
    ?>
   <script>
       alert('Item removed from cart');
       window.location.href="carts.php";
   </script>
   <?php
                 }
                  else
                 {
                    ?>
   <script>
       alert('Error');
       window.location.href="carts.php";
   </script>
   <?php
                }
?>