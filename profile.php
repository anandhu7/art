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
	<div class="shop checkout section">
		<div class="container">
        <form class="form" method="POST" action="">
			<div class="row">
				<div class="col-12">
                    <?php
                    include '../connection.php';
                    $loginid=$_SESSION["loginid"];
                     $sql0 = "SELECT * FROM curegtable where loginid=$loginid" ;
                     $result0 = mysqli_query($con,$sql0);
                     $data=$result0->fetch_assoc();
                    ?>
                    <div class="col-lg-10 col-md-10 col-12">
                    <div class="checkout-form">
						<div class="form-group">
                            <label>Name<span>*</span></label><br>
                            <input type="text" name="name" value="<?php echo $data['name']; ?>" required="required">
						</div>
                        <div class="form-group">
                            <label>Address<span>*</span></label><br>
                            <input type="text" name="address" value="<?php echo $data['address']; ?>" required="required">
						</div>
                        <div class="form-group">
                            <label>Phone<span>*</span></label><br>
                            <input type="text" name="phone" value="<?php echo $data['phone']; ?>" required="required">
						</div>
                        <div class="form-group">
                            <label>New Password</label><br>
                            <input type="password" name="password" placeholder="">
						</div>
                        <div class="form-group">
                            <button name="up_prof" type="submit" class="btn btn-success">Update Profile</button>
                        </div>
					</div>
                </div>
				</div>
			</div>
            </form>
            <?php
            if(isset($_POST['up_prof']))
            { 
                $name=$_POST["name"];
                $address=$_POST["address"];
                $phone=$_POST["phone"];
                $password=$_POST["password"];

                    $login_id=$_SESSION["loginid"];
					$up="UPDATE curegtable set name='$name',address='$address',phone='$phone' where loginid=$login_id";
					$up_result=mysqli_query($con, $up);
                    if(!empty($password)){
                        $up1="UPDATE logintable set password='$password' where loginid=$login_id";
					    $up_result0=mysqli_query($con, $up1);
                    }
					if($up_result){
						echo '<script type="text/javascript">';
                        echo 'alert("Profile Updated");';
                        echo 'window.location.href="index.php"';
                        echo '</script>';
					}else
					{
					   echo '<script type="text/javascript">';
					   echo 'alert("ERROR Update into database")';
					   echo '</script>';
				   }
           }
            ?>
		</div>
	</div>
	
	<?php include('footer.php'); ?>
</body>
</html>