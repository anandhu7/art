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
	
	<!-- Slider Area -->
	<section class="hero-slider">
		<!-- Single Slider -->
		<div class="single-slider">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-lg-9 offset-lg-3 col-12">
						<div class="text-inner">
							<div class="row">
								<!-- <div class="col-lg-7 col-12">
									<div class="hero-text">
										<h1><span>UP TO 50% OFF </span>Shirt For Man</h1>
										<p>Maboriosam in a nesciung eget magnae <br> dapibus disting tloctio in the find it pereri <br> odiy maboriosm.</p>
										<div class="button">
											<a href="#" class="btn">Shop Now!</a>
										</div>
									</div>
								</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Single Slider -->
	</section>
	<!--/ End Slider Area -->
	
	<!-- Start Small Banner  -->
	
	<!-- Start Product Area -->
    <div class="product-area section">
            <div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-title">
							<h2>Trending Item</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="product-info">
							<div class="tab-content" id="myTabContent">
								<!-- Start Single Tab -->
								<div class="tab-pane fade show active" id="man" role="tabpanel">
									<div class="tab-single">
										<div class="row">
                                        <?php
                                            include '../connection.php';
                                            
                                            $sql = "SELECT * FROM arts_datas where status='Approved'" ;
                                            if(isset($_GET['category']) && $_GET['category'] !='All Category'){
                                                $category=$_GET['category'];
                                                $sql = "SELECT * FROM arts_datas where status='Approved' and  art_type='$category'" ;
                                            }
                                            // echo $category;
                                            
                                            $result = mysqli_query($con,$sql);
                                            $i=1;
                                            while($row = $result->fetch_assoc()) {
                                        ?>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="singlePage.php?product_id=<?php echo $row['id']; ?>">
															<img class="default-img" style="height:300px" src="../artist/images/<?php echo $row['file_name'];?>" alt="#">
															<img class="hover-img" style="height:300px" src="../artist/images/<?php echo $row['file_name'];?>" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a href="addtocart.php?id=<?php echo $row['id']; ?>"><i class="ti-bag"></i><span>Add to Cart</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Art By: <?php echo $row['artist_name']; ?></a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="product-details.html"><?php echo $row['title']; ?></a></h3>
														<div class="product-price">
															<span>Rs.<?php echo $row['amount']; ?></span>
														</div>
													</div>
												</div>
											</div>
                                        <?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
            <?php
            if($result->num_rows==0){
                echo '<center><label style="color:red;font-size:20px">Products not available</label></center>';
            }
            ?>
    </div>
	
	<section class="section free-version-banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8 offset-md-2 col-xs-12">
                    <div class="section-title mb-60">
                        <span class="text-white wow fadeInDown" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInDown;">Eshop Free Lite version</span>
                        <h2 class="text-white wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">Currently You are using free<br> lite Version of Eshop.</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	<?php include('footer.php'); ?>
</body>
</html>