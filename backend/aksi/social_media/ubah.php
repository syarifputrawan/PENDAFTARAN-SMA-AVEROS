<?php
    session_start();
    if (!isset($_POST)) {
        // maka pindah ke halaman sebelumnya
        $_SESSION['status'] = 400;
        $_SESSION['message'] = "Tidak ada data POST!";
        header("location:../../pages/social_media/index.php");
    }
    if (!isset($_GET['id'])) {
        $_SESSION['status'] = 400;
        $_SESSION['message'] = "Harap sisipkan ID";
        header("location:../../pages/social_media/index.php");
    }


    include "../../includes/koneksi.php";

    $id = $_GET['id'];
    $icon = $_POST['icon'];
    $linkURL = $_POST['link_url'];

    // rancang querynya
    $qUpdate = "UPDATE social_media SET icon='$icon', link_url='$linkURL' WHERE id='$id'";
    $update = mysqli_query($koneksi, $qUpdate) or die(mysqli_error($koneksi));

    if ($update) {
        $_SESSION['status'] = 200;
        $_SESSION['message'] = "Ubah social_media berhasil!";
        header('location:../../pages/social_media/index.php');
    }else {
        $_SESSION['status'] = 400;
        $_SESSION['message'] = "Ubah social_media gagal!";
        header('location:../../pages/social_media/index.php');
    }


?>