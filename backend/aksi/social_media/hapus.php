<?php
    session_start();
    if (!isset($_GET['id'])) {
        $_SESSION['status'] = 400;
        $_SESSION['message'] = "Tidak ada ID";
        header("location:../../pages/social_media/index.php");
    }

    include "../../includes/koneksi.php";
    $id = $_GET['id'];
    
    $qDelete = "DELETE FROM social_media WHERE id=$id";
    $delete = mysqli_query($koneksi, $qDelete) or die(mysqli_error($koneksi));

    if ($delete) {
        $_SESSION['status'] = 200;
        $_SESSION['message'] = "Berhasil menghapus data kontak";
        header("location:../../pages/social_media/index.php");
    }else{
    // jika proses delete gagal
        $_SESSION['status'] = 400;
        $_SESSION['message'] = "Gagal menghapus data kontak";
        header("location:../../pages/social_media/index.php");
    }


?>