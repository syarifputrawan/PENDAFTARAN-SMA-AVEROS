<?php
    session_start();
    include "../../includes/koneksi.php";
    if (!isset($_POST)) {
        
        $_SESSION['status'] = 400;
        $_SESSION['message'] = "harus memberikan nilai POST";
        header("location:../../pages/prodi/index.php");
    }

    $prodi = $_POST['nama_prodi'];
    $gambar = $_FILES['gambar']['tmp_name'];
    $mahasiswa = $_POST['jumlah_mhs'];
    $namaGambar = rand(111111,999999) . ".png";
    $upload = move_uploaded_file($gambar, "../../images/prodi/$namaGambar");

    $qInsert = "INSERT INTO prodi (nama_prodi, gambar, jumlah_mhs) VALUES ('$prodi', '$namaGambar', '$mahasiswa')";

    $insert = mysqli_query($koneksi, $qInsert) or die(mysqli_error($koneksi));


    if ($insert) {
        $_SESSION['status'] = 200;
        $_SESSION['message'] = "berhasil menambah data😀😀😀😀";
        header("location:../../pages/prodi/index.php");
    }else {
        $_SESSION['status'] = 400;
        $_SESSION['message'] = "gagal menambah data🙁🙁🙁🙁";
        header("location:../../pages/prodi/index.php");
    }
?>