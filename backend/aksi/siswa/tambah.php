<?php
    session_start();
    include "../../includes/koneksi.php";
    if (!isset($_POST)) {
        
        $_SESSION['status'] = 400;
        $_SESSION['message'] = "harus memberikan nilai POST";
        header("location:../../pages/data_siswa/index.php");
    }

    $nisn1 = $_POST['nisn'];
    $nama1 = $_POST['nama'];
    $tempatLahir = $_POST['tempat_lahir'];
    $tanggalLahir = $_POST['tanggal_lahir'];
    $sekolahAsal = $_POST['sekolah_asal'];
    $jurusan1 = $_POST['jurusan'];
    $passFoto = $_FILES['pass_foto']['tmp_name'];
    $namaGambar = rand(111111,999999) . ".png";
    $jenisKelamin = $_POST['jenis_kelamin'];
    $alamat1 = $_POST['alamat'];
    

    $upload = move_uploaded_file($passFoto, "../../images/$namaGambar");

    $qInsert = "INSERT INTO daftar (nisn, nama, tempat_lahir, tanggal_lahir, sekolah_asal, jurusan, pass_foto, jenis_kelamin, alamat) VALUES ($nisn1, '$nama1', '$tempatLahir', '$tanggalLahir', '$sekolahAsal', '$jurusan1', '$namaGambar', '$jenisKelamin', '$alamat1')";
    // die($qInsert);
    $insert = mysqli_query($koneksi, $qInsert) or die(mysqli_error($koneksi));


    if ($insert) {
        $_SESSION['status'] = 200;
        $_SESSION['message'] = "berhasil menambah data😀😀😀😀";
        header("location:../../pages/data_siswa/index.php");
    }else {
        $_SESSION['status'] = 400;
        $_SESSION['message'] = "gagal menambah data🙁🙁🙁🙁";
        header("location:../../pages/data_siswa/index.php");
    }
?>