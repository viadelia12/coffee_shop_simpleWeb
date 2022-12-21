<?php
	include 'koneksi.php';
	session_start();
	// semisal belum login, langsung masuk ke index.php
		if(!isset($_SESSION['username'])){
			header("Location: index.php");
		}

		$sql = "SELECT * FROM discount";
		$query = $konek->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- title -->
	<title>Discount</title>

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
							<a href="homepage_admin.php">
								<img src="assets/img/kawfee.png" alt="">
							</a>
						</div>
						<nav class="main-menu">
							<ul>
								<li><a href="homepage_admin.php">Home</a></li>
								<li ><a href="shop_admin.php">Menu</a>
									<ul class="sub-menu">
										<li><a href="kategori_admin.php?tag=espresso hot">Espresso Hot</a></li>
										<li><a href="kategori_admin.php?tag=espresso ice">Espresso Ice</a></li>
										<li><a href="kategori_admin.php?tag=frappes">Frappe</a></li>
										<li><a href="kategori_admin.php?tag=non-coffee">Non-coffee</a></li>
										<li><a href="kategori_admin.php?tag=signature">Signature</a></li>
									</ul>
								</li>
								<li class="current-list-item"><a href="discount_admin.php">Discount</a></li>
                                <li><a href="upload_discount.php">Tambahkan Data</a></li>
								<li>
									<div class="header-icons">
										<a href="logout.php">Logout</a>
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
						<h1>Discount</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end menu-section -->

	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<h2 class="best-seller" style="margin-bottom: 30px">Apply Voucher and Get Your Drinks Now!</h2>
			</div>

			<div class="row product-lists">
				<?php $i = 1; ?>
				<?php foreach ($query as $id) : ?>
				<div class="col-lg-4 col-md-6 text-center strawberry">
					<div class="single-product-item">
						<form action="" method="POST">
							<div class="product-image">
							</div>
							<h3><?= $id["discount"]; ?></h3>
							<h6>Potongan :</h6>
							<p class="product-price">Rp<?= $id["potongan"]; ?></p>
							<h6>Minimal Order :</h6>
							<p class="product-price">Rp<?= $id["min_order"]; ?></p>
							<a href="update_discount.php?discount=<?= $id["discount"]; ?>" class="cart-btn">Update</a>
							<a href="delete_discount.php?discount=<?= $id["discount"]; ?>" class="cart-btn" onclick="return confirm('Yakin Untuk Menghapus?');">Delete</a>
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