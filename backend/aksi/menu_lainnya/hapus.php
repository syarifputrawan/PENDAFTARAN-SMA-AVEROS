<?php
    session_start();
    if (!isset($_GET['gambar'])) 
if (!isset($_POST)) {
    
    $_SESSION['status'] = 400;
    $_SESSION['message'] = "tidak ada data pada post";
    header("location:../../pages/menu_lainnya/index.php");
}
    

    include "../../includes/koneksi.php";
    $id = $_GET['id'];
    
    // mencari data berdasarkan id buku
    $selectBy = "SELECT gambar FROM menu_lainnya WHERE id=$id";
    $select = mysqli_query($koneksi, $selectBy);
    $oldData = mysqli_fetch_assoc($select);
    // cek apakah gambar ini ada di folder images/
    $path = "../../images/menu_lainnya/" . $oldData['gambar'];

    // jika sebelumnya ada gambar lama
    if (file_exists($path)) {
        // maka hapuskan gambar lama
        unlink($path);
    }

    $qDelete = "DELETE FROM menu_lainnya WHERE id=$id";
    $delete = mysqli_query($koneksi, $qDelete) or die(mysqli_error($koneksi));

    // header('location:index.php');
    // jika proses update berhasil
    if ($delete  ) {
        $_SESSION['status'] = 200;
        $_SESSION['message'] = "hapus data berhasil😀😀😀😀";
        header("location:../../pages/menu_lainnya/index.php");
    }else{
    // jika proses insert gagal
        $_SESSION['status'] = 400;
        $_SESSION['message'] = "hapus data gagal🙁🙁🙁🙁";
        header("location:../../pages/menu_lainnya/index.php");
    }
?>
