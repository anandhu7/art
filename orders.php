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
								<th>Order Date</th>
                                <th>Cust Name</th>
								<th>Address</th>
                                <th>Phone</th>
								<th>Tot Amount</th>
                                <th>Payment Status</th>
                                <th></th>
							</tr>
						</thead>
						<tbody>
                        <?php
                                            include '../connection.php';
                                            $loginid=$_SESSION["loginid"];
                                            $sql = "SELECT * FROM orders where customer_id=$loginid" ;
                                            $result = mysqli_query($con,$sql);
                                            $i=1;
                                            while($row = $result->fetch_assoc()) {
                                                $product_id=$row['id'];
                                                $sql0 = "SELECT * FROM cart where order_id=$product_id" ;
                                                $result0 = mysqli_query($con,$sql0);
                                                // $carts=$result0->fetch_assoc();
                                        ?>
                                            <tr>
                                                <td class="action" data-title="Remove">
                                                    <?php echo $row['order_date']; ?>
                                                </td>
                                                <td class="action" data-title="Remove"><span><?php echo $row['first_name']; ?><?php echo $row['last_name']; ?></span></td>
                                                <td class="action" data-title="Remove"><?php echo $row['address_1']; ?></td>
                                                <td class="action" data-title="Remove"><?php echo $row['phone']; ?></td>
                                                <td class="action" data-title="Remove">Rs.<?php echo $row['total_amount']; ?>/-</td>
                                                <td class="action text-success" data-title="Remove">
                                                    <?php 
                                                    echo $row['payment_status']; 
                                                    if($row['payment_status']=='Pending'){
                                                        echo '<br><span class="text-danger">Order not completed.</span>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($row['payment_status']=='Completed'){
                                                        echo '<a href="pdfp.php?id='.$row['id'].'" class="btn btn-success">Download</a>';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr >
                                                <td colspan="7">
                                                    <h6>Product Details</h6>
                                                    <?php
                                                    $i=1;
                                                    while($cart = $result0->fetch_assoc()) {
                                                        ?>
                                                        <P>
                                                            <?php echo $i++.'. Product Name : '.$cart['product_name'].' | Amount : Rs.'.$cart['amount'] ?>
                                                        </P>
                                                        <?php
                                                    }
                                                    $i=1;
                                                    ?>
                                                </td>
                                            </tr>
                            <?php 
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
											<!-- <input name="Coupon" placeholder="Enter Your Coupon"> -->
											<!-- <button class="btn">Apply</button> -->
										</form>
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