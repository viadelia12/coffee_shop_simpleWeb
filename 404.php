<?php
	include 'koneksi.php';
	session_start();
	// semisal belum login, langsung masuk ke index.php
		if(!isset($_SESSION['username'])){
			header("Location: index.php");
		}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- title -->
	<title>404!</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/icon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">

</head>
<body>
	<!-- header -->
    <div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="homepage.php">
								<img src="assets/img/kawfee.png" alt="">
							</a>
						</div>
						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li><a href="homepage.php">Home</a></li>
								<li><a href="shop.php">Menu</a>
									<ul class="sub-menu">
										<li><a href="kategori.php?tag=espresso hot">Espresso Hot</a></li>
										<li><a href="kategori.php?tag=espresso ice">Espresso Ice</a></li>
										<li><a href="kategori.php?tag=frappes">Frappe</a></li>
										<li><a href="kategori.php?tag=non-coffee">Non-coffee</a></li>
										<li><a href="kategori.php?tag=signature">Signature</a></li>
									</ul>
								</li>
								<li><a href="discount.php">Discount</a></li>
								<li>
									<div class="header-icons">
										<a href="logout.php">Logout</a>
										<a class="shopping-cart" href="cart.php"><i class="fas fa-shopping-cart"></i></a>
									</div>
								</li>
							</ul>
						</nav>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- end header -->

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>404 - Not Found</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
		
	<!-- error section -->
	<div class="full-height-section error-section">
		<div class="full-height-tablecell">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 text-center">
						<div class="error-text">
							<i class="far fa-sad-cry"></i>
							<h1>Oops! Not Found.</h1>
							<p>The page you requested for is not found.</p>
							<a href="homepage.php" class="boxed-btn">Back to Home</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end error section -->

	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2021 - <a href="homepage.php">Final Project - Web</a>,  All Rights Reserved.</p>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->
</body>
</html>
