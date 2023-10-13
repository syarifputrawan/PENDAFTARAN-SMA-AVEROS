<?php
    session_start();
    include "../../includes/koneksi.php";
    
    if (!isset($_POST)) {
        $_SESSION['status'] = 400;
        $_SESSION['message'] = "Harus Memberikan nilai POST";
        header("location:../../pages/fasilitas/index.php");
    }


    $id = rand(11111,99999);
    $icon = htmlentities($_POST['icon']);
    $judul1 = $_POST['judul'];
    $konten1 = $_POST['konten'];

    $qInsert = "INSERT INTO fasilitas (id, icon, judul, konten) VALUES ($id, '$icon', '$judul1', '$konten1')";
    $insert = mysqli_query($koneksi, $qInsert) or die(mysqli_error($koneksi));
    if ($insert) {
        $_SESSION['status'] = 200;
        $_SESSION['message'] = "Berhasil menambahkan data";
        header("location:../../pages/fasilitas/index.php");
    }else {
        $_SESSION['status'] = 400;
        $_SESSION['message'] = "Gagal menambahkan data";
        header("location:../../pages/fasilitas/index.php");
    }
?>