<?php
    session_start();
    if (!isset($_POST)) {
        // maka pindah ke halaman sebelumnya
        $_SESSION['status'] = 400;
        $_SESSION['message'] = "Tidak ada data POST!";
        header("location:../../pages/fasilitas/index.php");
    }
    if (!isset($_GET['id'])) {
        $_SESSION['status'] = 400;
        $_SESSION['message'] = "Harap sisipkan ID";
        header("location:../../pages/fasilitas/index.php");
    }


    include "../../includes/koneksi.php";

    $id = $_GET['id'];
    $icon = $_POST['icon'];
    $judul1 = $_POST['judul'];
    $konten1 = $_POST['konten'];

    // rancang querynya
    $qUpdate = "UPDATE fasilitas SET icon='$icon', judul='$judul1', konten='$konten1' WHERE id=$id";
    $update = mysqli_query($koneksi, $qUpdate) or die(mysqli_error($koneksi));

    if ($update) {
        $_SESSION['status'] = 200;
        $_SESSION['message'] = "Ubah fasilitas berhasil!";
        header('location:../../pages/fasilitas/index.php');
    }else {
        $_SESSION['status'] = 400;
        $_SESSION['message'] = "Ubah fasilitas gagal!";
        header('location:../../pages/fasilitas/index.php');
    }


?>