<?php
    session_start();
    if (!isset($_GET['id'])) {
        $_SESSION['status'] = 400;
        $_SESSION['message'] = "Tidak ada ID";
        header("location:../../pages/fasilitas/index.php");
    }

    include "../../includes/koneksi.php";
    $id = $_GET['id'];
    
    $qDelete = "DELETE FROM fasilitas WHERE id=$id";
    $delete = mysqli_query($koneksi, $qDelete) or die(mysqli_error($koneksi));

    if ($delete) {
        $_SESSION['status'] = 200;
        $_SESSION['message'] = "Berhasil menghapus data fasilitas";
        header("location:../../pages/fasilitas/index.php");
    }else{
    // jika proses delete gagal
        $_SESSION['status'] = 400;
        $_SESSION['message'] = "Gagal menghapus data fasilitas";
        header("location:../../pages/fasilitas/index.php");
    }


?>