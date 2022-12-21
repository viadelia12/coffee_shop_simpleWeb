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
	<title>Cart</title>

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
						<h1>Cart</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Product Image</th>
									<th class="product-name">Name</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-total">Total</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$tot = 0;
								$username = $_SESSION["username"];
								$idUser = $konek->query("SELECT `id` FROM `user` WHERE `user`.`username` = '$username'") -> fetch_assoc()['id'];
								$dataCart = $konek->query("SELECT * FROM `cart` WHERE `cart`.`id` = '$idUser'");
								$i=1;
									if ($dataCart -> num_rows > 0) {
										while($value = $dataCart->fetch_assoc()){
											$idMenu = $value['id_menu'];
											$menu = $konek->query("SELECT * FROM `menu` WHERE `menu`.`id_menu` = '$idMenu'")->fetch_assoc();
											$total = 0;
											$total += $menu["harga"];
											?>
											<tr class="table-body-row">
												<td class="product-remove"><a href="delete_cart.php?id=<?= $value['id_cart'];?>"><i class="far fa-window-close"></i></a></td>
												<td class="product-image"><img src="menupict/<?php echo $menu["gambar"]; ?>" alt=""></td>
												<td class="product-name"><?php echo $menu["nama"] ?></td>
												<td class="product-price">Rp<?php echo $menu["harga"] ?></td>
												<form action="post"></form>
												<td class="product-quantity"><?=$value['byk_menu']?></td>
												<td class="product-total">Rp<?php echo $value['byk_menu']*$menu['harga'];?></td>
												<?php $tot = $tot + ($value['byk_menu']*$menu['harga']); ?>
											</tr>
											<?php
										}
									}
								 ?>
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Diskon: </strong></td>
									<?php
										$voucher = $konek->query("SELECT * FROM discount");
										$discount = $_GET["discount"];
										$diskon = query("SELECT * FROM discount WHERE discount = '$discount'");
										if($tot >= $diskon['min_order']){
											$kurang = $diskon['potongan'];
										}
										else{
											$kurang = 0;
										}
									?>
									<td><?php echo $kurang; ?></td>
								</tr>
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td>Rp<?php echo $tot ?></td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
							<a href="checkout.php?id=<?= $value["id_cart"]; ?>" class="cart-btn">Check Out</a>
						</div>
					</div>

					<div class="coupon-section">
						<h3>Apply Voucher</h3>
						<div class="coupon-form-wrap">
							<form action="" method="">
								<p><input type="text" placeholder="Voucher"></p>
								<p><a href="cart.php?id=<?= $voucher["discount"]; ?>" class="cart-btn"></a>Apply</p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end cart -->

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