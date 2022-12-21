<?php
	include 'koneksi.php';
	session_start();
	if (isset($_SESSION['username'])) {
	    header("location: homepage.php");
	}

	if (isset($_POST['submit'])) {
		$username = $_POST ['username'];
	    $password = $_POST ['password'];

	    $query = mysqli_query($konek, "SELECT * FROM user WHERE username='$username' AND password='$password'");

	    $cek = mysqli_num_rows($query);

	    if($cek > 0){
	        $_SESSION['username'] = $username;
	        $_SESSION['password'] = $password;
	        header("location:homepage.php");
	    }
	    else{
	        echo "<script>alert('Username atau Password Salah!')</script>";
	    }
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- title -->
    <title>kawfee - login</title>
    <!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/icon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<!-- <link rel="stylesheet" href="assets/css/all.min.css"> -->
	<!-- bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<!-- <link rel="stylesheet" href="assets/css/owl.carousel.css"> -->
	<!-- magnific popup -->
	<!-- <link rel="stylesheet" href="assets/css/magnific-popup.css"> -->
	<!-- animate css -->
	<!-- <link rel="stylesheet" href="assets/css/animate.css"> -->
	<!-- mean menu css -->
	<!-- <link rel="stylesheet" href="assets/css/meanmenu.min.css"> -->
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
							<a href="index.php">
								<img src="assets/img/kawfee.png" alt="">
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header area -->

	<!-- hero area -->
	<div class="hero-area hero-bg">
		<div class="container">
			<div class="text-center">
				<div class="hero-text">
					<div class="hero-text-tablecell">
						<!-- login area -->
						<div class="logres-form">
						<h3>Log In</h3>
						<hr size="large" width="400px">
							<form method="post" action="">
								<h6 class="logres"><label for="username">Username</label></h6>
								<p><input type="text" placeholder="input username" name="username" id="username"></p>
								<h6 class="logres"><label for="password">Password</label></h6>
								<p><input type="password" placeholder="input password" name="password" id="password"></p>
								<p><input type="submit" class="bordered-btn" name="submit" value="log in"></p>
							</form>
						</div>
						<!-- end login area -->

						<!-- login as admin area -->
						<div class="admin" style="margin-top: 30px;">
							<a href="login_admin.php">Login as admin?</a>
						</div>
						<!-- end login as admin area -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end hero area -->
</body>
</html>