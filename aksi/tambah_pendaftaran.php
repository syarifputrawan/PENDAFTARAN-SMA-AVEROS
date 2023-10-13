<?php
    session_start();
    include "../includes/koneksi.php";
    if (!isset($_POST)) {
        
        $_SESSION['status'] = 400;
        $_SESSION['message'] = "harus memberikan nilai POST";
        header("location:../pendaftaran.php");
    }

    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $tempatlahir = $_POST['tempat_lahir'];
    $tanggal1lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $sekolahasal = $_POST['sekolah_asal'];
    $jeniskelamin = $_POST['jenis_kelamin'];
    $prodi = $_POST['jurusan'];
    $passFoto = $_FILES['pass_foto']['tmp_name'];
    $namaGambar = rand(111111,999999) . ".png";
    
    $upload = move_uploaded_file($passFoto, "../backend/images/$namaGambar");

    $qInsert = "INSERT INTO daftar (nisn, nama, tempat_lahir, tanggal_lahir, alamat, sekolah_asal, jenis_kelamin, jurusan, pass_foto) VALUES ($nisn, '$nama', '$tempatlahir', '$tanggal1lahir', '$alamat','$sekolahasal','$jeniskelamin','$prodi', '$namaGambar')";

    $insert = mysqli_query($koneksi, $qInsert) or die(mysqli_error($koneksi));


    if ($insert) {
        $_SESSION['status'] = 200;
        $_SESSION['message'] = "berhasil menambah data😀😀😀😀";
        header("location:../pendaftaran.php");
    }else {
        $_SESSION['status'] = 400;
        $_SESSION['message'] = "gagal menambah data🙁🙁🙁🙁";
        header("location:../pendaftaran.php");
    }
    
?>