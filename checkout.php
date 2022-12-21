<?php 
	session_start();

	if( !isset($_SESSION['username']) ) {
		header("Location: index.php");
		exit;
	}
	
	require 'koneksi.php';

	$id_transaksi = $_GET["id"];

	mysqli_query($konek, "INSERT INTO transaksi VALUES (NULL, )");

	if( mysqli_affected_rows($konek) > 0 ) {
		echo "
			<script>
				alert('Transaksi berhasil!');
				document.location.href = 'checkout.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Transaksi gagal!');
				document.location.href = 'checkout.php';
			</script>
		";
	}

?>