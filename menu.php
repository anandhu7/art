<header class="header shop">
		<!-- Topbar -->
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-12 col-12">
						<!-- Top Left -->
						<div class="top-left">
							<ul class="list-main">
								<li><i class="ti-headphone-alt"></i> +060 (800) 801-582</li>
								<li><i class="ti-email"></i> artworld@shophub.com</li>
							</ul>
						</div>
						<!--/ End Top Left -->
					</div>
					<div class="col-lg-7 col-md-12 col-12">
						<!-- Top Right -->
						<div class="right-content">
							<ul class="list-main">
                                Hello <?php
								if(isset($_SESSION["cust_name"])){
									echo $_SESSION["cust_name"];
								}
								 ?>!
                                <?php
                                    if(!isset($_SESSION["cust_name"])){
                                        echo '<li><i class="ti-power-off"></i><a href="../login.html">Login</a></li>';
                                    }
                                ?>
							</ul>
						</div>
						<!-- End Top Right -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Topbar -->
		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<!-- Logo -->
						<div class="logo">
							<!-- <a href="index.html"><img src="images/logo.png" alt="logo"></a> -->
						</div>
						<!--/ End Logo -->
						<!-- Search Form -->
						<div class="search-top">
							<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
							<!-- Search Form -->
							<div class="search-top">
								<form class="search-form">
									<input type="text" placeholder="Search here..." name="search">
									<button value="search" type="submit"><i class="ti-search"></i></button>
								</form>
							</div>
							<!--/ End Search Form -->
						</div>
						<!--/ End Search Form -->
						<div class="mobile-nav"></div>
					</div>
					<div class="col-lg-8 col-md-12 col-12">
						<div class="search-bar-top">
							<div class="search-bar">
							<form method="GET" action="" id="searh_form">
								<select name="category" onchange="submitCat()">
									<option>All Category</option>
									<option value= "pencildrawing" <?php if(isset($_GET['category']) && $_GET['category']=='pencildrawing') echo 'Selected'; ?>>PENCIL DRAWING</option>
                                    <option value= "watercoloring" <?php if(isset($_GET['category']) && $_GET['category']=='watercoloring') echo 'Selected'; ?>>WATER COLORING</option>
                                    <option value= "oilpainting" <?php if(isset($_GET['category']) && $_GET['category']=='oilpainting') echo 'Selected'; ?>>OIL PAINTING</option>
                                    <option value= "metalengraving" <?php if(isset($_GET['category']) && $_GET['category']=='metalengraving') echo 'Selected'; ?>>METAL ENGRAVING</option>
								</select>
								</form>
								<!-- <form method="GET" action="">
									<input name="search" placeholder="Search Products Here....." type="search">
									<button class="btnn"><i class="ti-search"></i></button>
								</form> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<style>
			.nice-select{
				width:534px !important;
			}
			.list{
				width:534px !important;
			}
		</style>
		<script>
			function submitCat(){
				document.getElementById("searh_form").submit();
			}
		</script>
		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="cat-nav-head">
					<div class="row">
						<div class="col-lg-9 col-12">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">	
										<div class="nav-inner">	
											<ul class="nav main-menu menu navbar-nav">
													<li class="active"><a href="index.php">Home</a></li>
													<li><a href="carts.php">Cart</a></li>												
													<li><a href="checkout.php">Checkout</a></li>
                                                    <li><a href="orders.php">My Orders</a></li>
													<li><a href="profile.php">My Profile</a></li>			
                                                    <li><a href="../artist/logout.php">Logout</a></li>									
												</ul>
										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
	</header>