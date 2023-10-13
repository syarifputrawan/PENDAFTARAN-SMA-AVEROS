<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbName = "averos";
    // koneksi ke database dari PHP
    $koneksi = mysqli_connect($host, $user, $pass, $dbName) or die (mysqli_error($koneksi));
?>