<?php
    session_start();
    include "koneksi.php";

    $username = $_POST ['username'];
    $password = $_POST ['password'];

    $query = mysqli_query($konek, "SELECT * FROM admin WHERE username='$username' && password='$password'")
    or die(mysqli_error($konek));

    $cek = mysqli_num_rows($query);

    if($cek > 0){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header("location:shop_admin.php");
    }
    else{
        header("Location:login.php?message=failed");
    }
?>