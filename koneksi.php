<?php
    $host       = "localhost";
    $username   = "root";
    $password   = "";
    $database   = "project";
     
    $konek = new mysqli($host, $username, $password, $database);

    function hapus($id_menu){
        global $konek;

        mysqli_query($konek, "DELETE FROM menu WHERE id_menu = '$id_menu'");
        return mysqli_affected_rows($konek);
    }
?>