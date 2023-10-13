<?php
    session_start();
    if (!isset($_GET['nama_prodi'])) 
if (!isset($_POST)) {
    
    $_SESSION['status'] = 400;
    $_SESSION['message'] = "tidak ada data pada post";
    header("location:../../pages/prodi/index.php");
}
    

    include "../../includes/koneksi.php";
    $id = $_GET['id'];
    
    // mencari data berdasarkan id buku
    $selectBy = "SELECT * FROM prodi WHERE id=$id";
    $select = mysqli_query($koneksi, $selectBy);
    $oldData = mysqli_fetch_assoc($select);
    // cek apakah gambar ini ada di folder images/
    $path = "../../images/prodi/" . $oldData['gambar'];

    // jika sebelumnya ada gambar lama
    if (file_exists($path)) {
        // maka hapuskan gambar lama
        unlink($path);
    }

    $qDelete = "DELETE FROM prodi WHERE id=$id";
    $delete = mysqli_query($koneksi, $qDelete) or die(mysqli_error($koneksi));

    // header('location:index.php');
    // jika proses update berhasil
    if ($delete  ) {
        $_SESSION['status'] = 200;
        $_SESSION['message'] = "hapus data berhasil😀😀😀😀";
        header("location:../../pages/prodi/index.php");
    }else{
    // jika proses insert gagal
        $_SESSION['status'] = 400;
        $_SESSION['message'] = "hapus data gagal🙁🙁🙁🙁";
        header("location:../../pages/prodi/index.php");
    }
?>
