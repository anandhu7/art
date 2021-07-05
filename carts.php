<?php include('header.php'); ?>
<body class="js">
	
	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
	<?php include('menu.php'); ?>
	<?php
    if(!isset($_SESSION["loginid"])){
    ?>
    <script>
        alert('Please login or create new account.');
        window.location.href="index.php";
    </script>
    <?php
    }
?>
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>PRODUCT</th>
								<th>NAME</th>
								<th class="text-center">UNIT PRICE</th>
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody>
                        <?php
                                            include '../connection.php';
                                            $loginid=$_SESSION["loginid"];
                                            $sql = "SELECT * FROM cart where customer_id=$loginid and status='Pending'" ;
                                            $result = mysqli_query($con,$sql);
                                            $i=1;
                                            $total_amnt=0;
                                            while($row = $result->fetch_assoc()) {
                                                $product_id=$row['product_id'];
                                                $sql0 = "SELECT * FROM arts_datas where id=$product_id" ;
                                                $result0 = mysqli_query($con,$sql0);
                                                $product=$result0->fetch_assoc();
                                        ?>
							<tr>
								<td class="image" data-title="No"><img src="../artist/images/<?php echo $product['file_name']; ?>" alt="#"></td>
								<td class="product-des" data-title="Description">
									<p class="product-name"><a href="#"><?php echo $product['title']; ?></a></p>
								</td>
								<td class="price" data-title="Price"><span> Rs.<?php echo $product['amount']; ?></span></td>
								<td class="action" data-title="Remove"><a href="cartremove.php?id=<?php echo $row['id']; ?>"><i class="ti-trash remove-icon"></i></a></td>
							</tr>
                            <?php 
                            $total_amnt=$total_amnt+$product['amount'];
                        }
                         ?>
						</tbody>
					</table>

					<!--/ End Shopping Summery -->
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- Total Amount -->
					<div class="total-amount">
						<div class="row">
							<div class="col-lg-8 col-md-5 col-12">
								<div class="left">
									<div class="coupon">
										<form action="#" target="_blank">
                                        <?php
                    if($result->num_rows==0){
                        echo '<center><label style="color:red;">Your cart is empty</label></center>';
                    }
                    ?>
											<!-- <input name="Coupon" placeholder="Enter Your Coupon"> -->
											<!-- <button class="btn">Apply</button> -->
										</form>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-7 col-12">
								<div class="right">
									<ul>
										<li>Cart Subtotal<span>Rs.<?php echo $total_amnt; ?></span></li>
										<li>Shipping<span>Free</span></li>
										<li class="last">You Pay<span>Rs.<?php echo $total_amnt; ?></span></li>
									</ul>
									<div class="button5">
                                        <?php
                                        if($result->num_rows!=0){
                                        ?>
										<a href="checkout.php" class="btn">Checkout</a>
                                        <?php } ?>
										<a href="index.php" class="btn">Continue shopping</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/ End Total Amount -->
				</div>
			</div>
		</div>
	</div>
	
	<?php include('footer.php'); ?>
</body>
</html>