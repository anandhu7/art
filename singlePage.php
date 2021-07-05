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
	
	<section class="blog-single section">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-12">
						<div class="blog-single-main">
							<div class="row">
                            <?php
                                            include '../connection.php';
                                            $id=$_GET['product_id'];
                                            $sql = "SELECT * FROM arts_datas where id=$id" ;
                                            $result = mysqli_query($con,$sql);
                                            $product=$result->fetch_assoc();
                                        ?>
								<div class="col-12">
									<div class="image">
										<img src="../artist/images/<?php echo $product['file_name']; ?>" alt="#">
									</div>
									<div class="blog-detail">
										<h2 class="blog-title"><?php echo $product['title']; ?></h2>
                                        <div class="blog-meta">
											<span class="author"><a href="#"><i class="fa fa-user"></i>Art By : <?php echo $product['artist_name']; ?></a></span>
										</div>
										<div class="content">
											<p><?php echo $product['description']; ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-12">
						<div class="main-sidebar">
							<div class="single-widget category">
								<h3 class="title">Art Details</h3>
								<ul class="categor-list">
									<li><a href="#">Width : <?php echo $product['width']; ?></a></li>
									<li><a href="#">Height : <?php echo $product['height']; ?></a></li>
									<li><a href="#">Art Type : <?php echo $product['art_type']; ?></a></li>
									<li><a href="#" style="color:green"><b>Amount : Rs.<?php echo $product['amount']; ?></b></a></li>
								</ul>
							</div>
							<div class="single-widget newsletter">
								<div class="letter-inner">
									<div class="form-inner">
										<a href="singleaddtocart.php?id=<?php echo $product['id']; ?>">Add To cart</a>
									</div>
								</div>
							</div>
							<!--/ End Single Widget -->
						</div>
					</div>
				</div>
			</div>
		</section>
	
	<?php include('footer.php'); ?>
</body>
</html>