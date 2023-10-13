<?php
session_start();
if (!isset($_POST)) {

    $_SESSION['status'] = 400;
    $_SESSION['message'] = "tidak ada data pada post";
    header("location:../../pages/tentang/sejarah.php");
}
include "../../includes/koneksi.php";
$id = $_POST['id'];
$gambarSejarah = $_FILES['gambar_sejarah']['tmp_name'];
$sejarah = $_POST['sejarah'];

$namaGambar = rand(111111, 999999) . ".png";
// buat kosong dulu q variabelnya 
$queryImages = ",";
// buat variabel path untuk lokasi gambarnya 
$path = "../../images/tentang/";

// ambil data gambar belkang, logo, dan gambar sejarah dari datebase 
$qSelectOldData = "SELECT gambar_sejarah FROM about WHERE id=$id";
$select = mysqli_query($koneksi,$qSelectOldData) or die(mysqli_error($koneksi));
$oldData = mysqli_fetch_assoc($select);

//cek apakah ada file gambar belakang

if ($gambarSejarah != "") {
    //cek lagi gambarnya
    if (file_exists($path . $oldData['gambar_sejarah'])) {
        unlink($path . $oldData['gambar_sejarah']);
    }
    move_uploaded_file($gambarSejarah, $path . "img_sejarah_$namaGambar");
    $queryImages .= "gambar_sejarah='img_sejarah_$namaGambar',";
    //hasilnya : img_belakang_21424.pnp
}

// hilangkan, di akhir karakter supa tidak terjadi bug/eror pada query databasenya 

$trimImages = rtrim($queryImages, ',');


// berikan variabel qUpdate kosong ini
// untuk valuenya nanti akan diberikan ketika user upload gambar / tidak
$qUpdate = "UPDATE about SET sejarah='$sejarah' $trimImages WHERE id=$id";

// die($qUpdate);
// lakukan proses ubah
$update = mysqli_query($koneksi, $qUpdate) or die(mysqli_error($koneksi));


// header('location:index.php');
// jika proses update berhasil
if ($update) {
    $_SESSION['status'] = 200;
    $_SESSION['message'] = "ubah sejarah berhasil😀😀😀😀";
    header("location:../../pages/tentang/sejarah.php");
} else {
    // jika proses insert gagal
    $_SESSION['status'] = 400;
    $_SESSION['message'] = "ubah sejarah gagal🙁🙁🙁🙁";
    header("location:../../pages/tentang/sejarah.php");
}
