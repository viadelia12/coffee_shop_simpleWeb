<?php 
	session_start();

	if( !isset($_SESSION['username']) ) {
		header("Location: index.php");
		exit;
	}

	require 'koneksi.php';

// cek apakah tombol tambah sudah ditekan atau belum
	if( isset($_POST["tambah"]) ) {
		$nama = htmlspecialchars($_POST["nama"]);
		$harga = htmlspecialchars($_POST["harga"]);
		$kategori = htmlspecialchars($_POST["kategori"]);
		$gambar = upload();
		if( !$gambar ) {
			return false;
		}

	// query insert data
		$query = "INSERT INTO menu VALUES
			('', '$nama', '$harga', '$kategori', '$gambar')
		";
		mysqli_query($konek, $query);

	// cek keberhasilan input data
		if( mysqli_affected_rows($konek) > 0){
			echo "
				<script>
					alert('Data Berhasil Ditambahkan!');
					document.location.href = 'shop_admin.php';
				</script>
			";
		} else {
			echo "
				<script>
					alert('Data Gagal Ditambahkan!');
					document.location.href = 'add.php';
				</script>
			";
		}
	}

// fungsi upload gambar
	function upload() {
		$namaFile = $_FILES['gambar']['name'];
		$ukuranFile = $_FILES['gambar']['size'];
		$error = $_FILES['gambar']['error'];
		$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah ada gambar yang diupload
		if( $error === 4 ) {
			echo "
				<script>
					alert('Gambar Belum Diinputkan!');
					document.location.href = 'add.php';
				</script>
			";
			return false;
		}

	// cek apakah yang diupload adalah gambar
		$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
		$ekstensiGambar = explode ('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar) );

	// adakah sebuah string dalam sebuah array
		if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
			echo "
				<script>
					alert('Yang Anda Upload Bukan Gambar!');
					document.location.href = 'add.php';
				</script>
			";
			return false;
		}
	// jika ukuran terlalu besar
		if( $ukuranFile > 10000000) {
			echo "
				<script>
					alert('Ukuran Gambar Terlalu Besar!');
					document.location.href = 'add.php';
				</script>
			";
			return false;
		}

	// generate nama gambar baru
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensiGambar;

	// lolos pengecekan, gambar siap diupload
		move_uploaded_file($tmpName, 'menupict/' . $namaFileBaru);
		return $namaFileBaru;
	} 
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
							<a href="homepage_admin.php">
								<img src="assets/img/kawfee.png" alt="">
							</a>
						</div>
						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li><a href="homepage_admin.php">Home</a></li>
								<li class="current-list-item"><a href="shop_admin.php">Menu</a>
									<ul class="sub-menu">
										<li><a href="kategori_admin.php?tag=espresso hot">Espresso Hot</a></li>
										<li><a href="kategori_admin.php?tag=espresso ice">Espresso Ice</a></li>
										<li><a href="kategori_admin.php?tag=frappes">Frappe</a></li>
										<li><a href="kategori_admin.php?tag=non-coffee">Non-coffee</a></li>
										<li><a href="kategori_admin.php?tag=signature">Signature</a></li>
									</ul>
								</li>
								<li><a href="discount.php">Discount</a></li>
								<li><a href="add.php">Tambahkan Data</a></li>
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

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="nama">Nama :</label>
				<input type="text" name="nama" id="nama" required>
			</li>
			<li>
				<label for="harga">Harga :</label>
				<input type="text" name="harga" id="harga" required>
			</li>
			<li>
				<label for="kategori">Kategori :</label>
				<select name="kategori" id="kategori" required>
					<option name="kategori">Espresso Hot</option>
					<option name="kategori">Espresso Ice</option>
					<option name="kategori">Signature</option>
					<option name="kategori">Frappes</option>
				</select>
			</li>
			<li>
				<label for="gambar">Gambar :</label>
				<input type="file" name="gambar" id="gambar" required>
			</li>
			<li>
				<button type="submit" name="tambah">Tambahkan!</button>
			</li>
		</ul>
	</form>

	<a href="index.php">Batal</a>

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