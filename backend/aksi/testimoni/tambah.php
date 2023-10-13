<?php
    session_start();
    include "../../includes/koneksi.php";
    if (!isset($_POST)) {
        
        $_SESSION['status'] = 400;
        $_SESSION['message'] = "harus memberikan nilai POST";
        header("location:../../pages/testimoni/index.php");
    }

    $nama = $_POST['nama'];
    $asal = $_POST['asal'];
    $pesan = $_POST['pesan'];
    $gambar = $_FILES['pass_foto']['tmp_name'];
    $namaGambar = rand(111111,999999) . ".png";
    $upload = move_uploaded_file($gambar, "../../images/testimoni/$namaGambar");

    $qInsert = "INSERT INTO testimoni (nama, asal, pesan, pass_foto) VALUES ('$nama', '$asal', '$pesan', '$namaGambar')";

    $insert = mysqli_query($koneksi, $qInsert) or die(mysqli_error($koneksi));


    if ($insert) {
        $_SESSION['status'] = 200;
        $_SESSION['message'] = "berhasil menambah data😀😀😀😀";
        header("location:../../pages/testimoni/index.php");
    }else {
        $_SESSION['status'] = 400;
        $_SESSION['message'] = "gagal menambah data🙁🙁🙁🙁";
        header("location:../../pages/testimoni/index.php");
    }
?>