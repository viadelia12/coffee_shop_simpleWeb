<?php
	include 'koneksi.php';
	session_start();
	// semisal belum login, langsung masuk ke index.php
		if(!isset($_SESSION['username'])){
			header("Location: index.php");
		}

		$sql = "SELECT * FROM best_seller";
		$query = $konek->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- title -->
	<title>Menu</title>

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
								<li class="current-list-item"><a href="shop.php">Menu</a>
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
	
	<!-- menu-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>Menu</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end menu-section -->

	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row text-center" style="margin-bottom: 30px;">
				<h2 class="best-seller">Our Best Sellers</h2>
			</div>

			<div class="row product-lists">
				<?php $i = 1; ?>
				<?php foreach ($query as $id) : ?>
				<div class="col-lg-4 col-md-6 text-center strawberry">
					<div class="single-product-item">
						<form action="" method="POST">
							<div class="product-image">
								<img src="menupictbestseller/<?= $id["gambar"]; ?>" alt="">
							</div>
							<h3><?= $id["nama"]; ?></h3>
							<p class="product-price">Rp<?= $id["harga"]; ?></p>
							<a href="cart.php" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
						</form>
					</div>
				</div>
				<?php $i++; ?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<!-- end products -->

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
