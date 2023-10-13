<?php
    session_start();
    if (!isset($_GET['nisn'])) {
        
        $_SESSION['status'] = 400;
        $_SESSION['message'] = "tidak ada data pada post";
        header("location:../../pages/data_siswa/index.php");
    }
    

    include "../../includes/koneksi.php";
    $nisn1 = $_GET['nisn'];
    
    // mencari data berdasarkan id buku
    $selectBy = "SELECT pass_foto FROM daftar WHERE nisn=$nisn1";
    $select = mysqli_query($koneksi, $selectBy);
    $oldData = mysqli_fetch_assoc($select);
    // cek apakah gambar ini ada di folder images/
    $path = "../../images/" . $oldData['pass_foto'];

    // jika sebelumnya ada gambar lama
    if (file_exists($path)) {
        // maka hapuskan gambar lama
        unlink($path);
    }

    $qDelete = "DELETE FROM daftar WHERE nisn=$nisn1";
    $delete = mysqli_query($koneksi, $qDelete) or die(mysqli_error($koneksi));

    // header('location:index.php');
    // jika proses update berhasil
    if ($delete  ) {
        $_SESSION['status'] = 200;
        $_SESSION['message'] = "hapus data berhasil😀😀😀😀";
        header("location:../../pages/data_siswa/index.php");
    }else{
    // jika proses insert gagal
        $_SESSION['status'] = 400;
        $_SESSION['message'] = "hapus data gagal🙁🙁🙁🙁";
        header("location:../../pages/data_siswa/index.php");
    }
?>
