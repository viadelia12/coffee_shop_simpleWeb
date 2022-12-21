<?php 
	session_start();

	if( !isset($_SESSION['username']) ) {
		header("Location: index.php");
		exit;
	}

	require 'koneksi.php';

	if( isset($_POST["submit"]) ){
		if( ubah($_POST) > 0){
			echo "
				<script>
					alert('Data Berhasil Diubah!');
					document.location.href = 'discount_admin.php';
				</script>
			";
		} else {
			echo "
				<script>
					alert('Data Gagal Diubah!');
				</script>
			";
			var_dump($_POST);
		}
	}

	// ambil data dari url
	$discount = $_GET["discount"];

	// fungsi untuk mengambil isi database dan memasukkan ke dalam variable
	function query($query){
		global $konek;

		$result = mysqli_query($konek, $query);

	// membuat array rows untuk menampung isi database
		$rows = []; 

	// memasukkan isi database satu-persatu ke dalam array rows
		while($row = mysqli_fetch_assoc($result)){
			$rows[] = $row; 
		}
		return $rows;
	}

		// query data mhs berdasarkan id_menu
	$diskon = query("SELECT * FROM discount WHERE discount = '$discount'") [0];
		
// fungsi ubah
	function ubah($data){
		global $konek, $discount;

		$discount = $data["discount"];
		$potongan = htmlspecialchars($data["potongan"]);
		$min_order = htmlspecialchars($data["min_order"]);

	// query update menu
		$query = "UPDATE discount SET
			 discount = '$discount',
			 potongan = '$potongan',
			 min_order = '$min_order'
			WHERE discount = '$discount'
		";
		mysqli_query($konek, $query);

		return mysqli_affected_rows($konek);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- title -->
	<title>Edit Voucher</title>

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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li><a href="homepage_admin.php">Home</a></li>
								<li><a href="shop_admin.php">Menu</a>
									<ul class="sub-menu">
										<li><a href="kategori_admin.php?tag=espresso hot">Espresso Hot</a></li>
										<li><a href="kategori_admin.php?tag=espresso ice">Espresso Ice</a></li>
										<li><a href="kategori_admin.php?tag=frappes">Frappe</a></li>
										<li><a href="kategori_admin.php?tag=non-coffee">Non-coffee</a></li>
										<li><a href="kategori_admin.php?tag=signature">Signature</a></li>
									</ul>
								</li>
								<li class="current-list-item"><a href="discount_admin.php">Discount</a></li>
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
						<h1>Menu</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end menu-section -->

	<!-- update voucher -->
	<div class="product-section mt-150 mb-150">
			<div class="container">
				<div class="coupon-section">
					<h2 style="font-weight: bold; margin-bottom: 30px;">Edit Voucher</h2>
						<div class="coupon-form-wrap">
							<form action="" method="post" enctype="multipart/form-data">
								<input type="hidden" name="discount" value="<?= $diskon["discount"]; ?>">
								<label for="potongan">Potongan :</label>
								<p><input type="text" name="potongan" required value="<?= $diskon["potongan"]; ?>"></p>
								<label for="min_order">Minimal Order :</label>
								<p><input type="text" name="min_order" required value="<?= $diskon["min_order"]; ?>"></p>
								<p><input type="submit" name="submit" value="Ubah Data"></p>
                                <a class="cart-btn" href="discount_admin.php" style="text-decoration: none;">Batal</a>
						</form>
					</div>
				</div>
			</div>
	</div>

<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2021 - <a href="homepage_admin.php">Final Project - Web</a>,  All Rights Reserved.</p>
				</div>
			</div>
		</div>
	</div>
<!-- end copyright -->

</body>
</html>