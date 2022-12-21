<?php
include 'koneksi.php';
    session_start();
    // semisal belum login, langsung masuk ke index.php
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
    } else {
        $username = $_SESSION['username'];
        $idUser = $konek->query("SELECT `id` FROM `user` WHERE `user`.`username` = '$username'") -> fetch_assoc()['id'];
        $idMenu = $_GET['id'];
        $cek = $konek->query("SELECT * FROM `cart` WHERE `cart`.`id` = '$idUser' AND `cart`.`id_menu`='$idMenu'");
        $row = mysqli_fetch_assoc($cek);
        if($row == NULL){
            $bykMenu += 1;
            $sql = "INSERT INTO `cart` VALUES (NULL, '$idUser', '$idMenu', '$bykMenu')";
            if ($konek->query($sql)) {
                header("Location:cart.php");
            } else {
                header("index.php");
            }
        }else{
            $bykMenu = $row['byk_menu']+1;
            $idCart = $row['id_cart'];
            $sql = "UPDATE `cart` SET `byk_menu` = '$bykMenu' WHERE `cart`.`id_cart` = '$idCart'";
            if ($konek->query($sql)) {
                header("Location:cart.php");
            } else {
                header("index.php");
            }
        }
    }