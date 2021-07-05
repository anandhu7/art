<?php
$id=$_GET['order_id'];
include '../connection.php';
$up="UPDATE orders set payment_status='Completed' where  id=$id";
$up_result=mysqli_query($con, $up);
echo '<script type="text/javascript">';
echo 'window.location.href="orders.php"';
echo '</script>';
?>