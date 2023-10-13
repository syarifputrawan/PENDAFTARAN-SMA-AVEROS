<?php
    session_start();
    include "../../includes/koneksi.php";
    if (!isset($_POST)) {
        
        $_SESSION['status'] = 400;
        $_SESSION['message'] = "harus memberikan nilai POST";
        header("location:../../pages/menu_lainnnya/index.php");
    }

    $gambar = $_FILES['gambar']['tmp_name'];
    $judul1 = $_POST['judul'];
    $link_url = $_POST['link_url'];
    $namaGambar = rand(111111,999999) . ".png";
    $upload = move_uploaded_file($gambar, "../../images/menu_lainnya/$namaGambar");

    $qInsert = "INSERT INTO menu_lainnya (gambar, judul, link_url) VALUES ('$namaGambar', '$judul1', '$link_url')";

    $insert = mysqli_query($koneksi, $qInsert) or die(mysqli_error($koneksi));


    if ($insert) {
        $_SESSION['status'] = 200;
        $_SESSION['message'] = "berhasil menambah data😀😀😀😀";
        header("location:../../pages/menu_lainnya/index.php");
    }else {
        $_SESSION['status'] = 400;
        $_SESSION['message'] = "gagal menambah data🙁🙁🙁🙁";
        header("location:../../pages/menu_lainnya/index.php");
    }
?>