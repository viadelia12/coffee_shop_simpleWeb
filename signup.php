<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- title -->
    <title>kawfee</title>
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
							<a href="index.php">
								<img src="assets/img/kawfee.png" alt="">
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- end header -->

	<!-- hero area -->
	<div class="hero-area hero-bg">
		<div class="container">
			<div class="col-12 text-center">
				<div class="hero-text">
					<div class="hero-text-tablecell">
						<!-- signup area -->
						<div class="logres-form">
						<h3>Sign Up</h3>
						<hr size="large" width="400px">
							<form method="post" action="cek_sign_up.php">
								<h6 class="logres"><label for="username">Username</label></h6>
								<p><input type="text" placeholder="input username" name="username" id="username"></p>
								<h6 class="logres"><label for="password">Password</label></h6>
								<p><input type="password" placeholder="input password" name="password" id="password"></p>
                                <h6 class="logres"><label for="co-password">Confirm Password</label></h6>
								<p><input type="password" placeholder="confirm password" name="co_password" id="co_password"></p>
								<p><input type="submit" class="bordered-btn" value="sign up"></p>
							</form>
						</div>
						<!-- end signup area -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end hero area -->
</body>
</html>