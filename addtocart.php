<?php
include '../connection.php';
$art_id=$_GET['id'];
session_start();
if(!isset($_SESSION["loginid"])){
    ?>
   <script>
       alert('Please login or create new account.');
       window.location.href="index.php";
   </script>
   <?php
   return;
}
$loginid=$_SESSION["loginid"];
$sql = "SELECT * FROM arts_datas where id=$art_id" ;
$result = mysqli_query($con,$sql);
$product=$result->fetch_assoc();
$product_name=$product['title'];
$amount=$product['amount'];
$sql="INSERT INTO `cart`(product_id,customer_id,product_name,amount,status) VALUES ('$art_id','$loginid','$product_name','$amount','Pending')";
$result=mysqli_query($con, $sql);
if ($result)
{  
    ?>
   <script>
       alert('Item added to cart');
       window.location.href="index.php";
   </script>
   <?php
                 }
                  else
                 {
                    ?>
   <script>
       alert('Error');
       window.location.href="index.php";
   </script>
   <?php
                }
?>