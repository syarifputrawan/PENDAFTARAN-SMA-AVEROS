<?php
    session_start();
    include "../../includes/koneksi.php";
    
    if (!isset($_POST)) {
        $_SESSION['status'] = 400;
        $_SESSION['message'] = "Harus Memberikan nilai POST";
        header("location:../../pages/social_media/index.php");
    }


    $id = rand(11111,99999);
    $icon = htmlentities($_POST['icon']);
    $linkURL = $_POST['link_url'];

    $qInsert = "INSERT INTO social_media (id, icon, link_url) VALUES ($id, '$icon', '$linkURL')";
    $insert = mysqli_query($koneksi, $qInsert) or die(mysqli_error($koneksi));
    if ($insert) {
        $_SESSION['status'] = 200;
        $_SESSION['message'] = "Berhasil menambahkan data";
        header("location:../../pages/social_media/index.php");
    }else {
        $_SESSION['status'] = 400;
        $_SESSION['message'] = "Gagal menambahkan data";
        header("location:../../pages/social_media/index.php");
    }
?>