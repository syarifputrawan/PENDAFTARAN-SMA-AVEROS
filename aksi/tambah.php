<?php
    session_start();
    include "../includes/koneksi.php";
    if (!isset($_POST)) {
        
        $_SESSION['status'] = 400;
        $_SESSION['message'] = "harus memberikan nilai POST";
        header("location:../contact.php");
    }

    $nama = $_POST['nama'];
    $judul = $_POST['judul'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $pesan = $_POST['pesan'];

    $qInsert = "INSERT INTO pesan (nama, judul, email, no_hp, pesan) VALUES ('$nama', '$judul', '$email', '$no_hp', '$pesan')";

    $insert = mysqli_query($koneksi, $qInsert) or die(mysqli_error($koneksi));
    

    if ($insert) {
        $_SESSION['status'] = 200;
        $_SESSION['message'] = "berhasil mengirim pesan😀😀😀😀";
        header("location:../contact.php");
    }else {
        $_SESSION['status'] = 400;
        $_SESSION['message'] = "gagal mengirim pesan🙁🙁🙁🙁";
        header("location:../contact.php");
    }
?>