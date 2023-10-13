<?php
session_start();
if (!isset($_POST)) {

    $_SESSION['status'] = 400;
    $_SESSION['message'] = "tidak ada data pada post";
    header("location:../../pages/tentang/info_kampus.php");
}
include "../../includes/koneksi.php";
$id = $_POST['id'];
$gambarBelakang = $_FILES['gambar_belakang']['tmp_name'];
$nama_kampus1 = $_POST['nama_kampus'];
$logo = $_FILES['logo']['tmp_name'];
$pesan = $_POST['pesan'];
$deskripsiSingkat = $_POST['deskripsi_singkat'];
$gambarSejarah = $_FILES['gambar_sejarah']['tmp_name'];
$sejarah = $_POST['sejarah'];
$map =$_POST['map'];

$namaGambar = rand(111111, 999999) . ".png";
// buat kosong dulu q variabelnya 
$queryImages = ",";
// buat variabel path untuk lokasi gambarnya 
$path = "../../images/tentang/";

// ambil data gambar belkang, logo, dan gambar sejarah dari datebase 
$qSelectOldData = "SELECT gambar_belakang, logo, gambar_sejarah FROM about WHERE id=$id";
$select = mysqli_query($koneksi,$qSelectOldData) or die(mysqli_error($koneksi));
$oldData = mysqli_fetch_assoc($select);

//cek apakah ada file gambar belakang
if ($gambarBelakang != "") {
    // cek lagi gambarnya
    if (file_exists($path . $oldData['gambar_belakang'])) {
        unlink($path . $oldData['gambar_belakang']);
    }
    // uppload gambarnya 
    move_uploaded_file($gambarBelakang, $path . "img_belakang_$namaGambar");
    // gabungkan karakter dengan karater sebelumnya 
    $queryImages .= "gambar_belakang='img_belakang_$namaGambar',";
    //hasilnya : img_belakang_21424.pnp
}

if ($logo != "") {
    // cek lagi gambarnya
    if (file_exists($path . $oldData['logo'])) {
        unlink($path . $oldData['logo']);
    }
    move_uploaded_file($logo, $path . "logo_$namaGambar");
    $queryImages .= "logo='logo_$namaGambar',";
    //hasilnya : img_belakang_21424.pnp
}

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
$qUpdate = "UPDATE about SET pesan='$pesan', deskripsi_singkat='$deskripsiSingkat', sejarah='$sejarah', nama_kampus='$nama_kampus1', map='$map' $trimImages WHERE id=$id";

// die($qUpdate);
// lakukan proses ubah
$update = mysqli_query($koneksi, $qUpdate) or die(mysqli_error($koneksi));


// header('location:index.php');
// jika proses update berhasil
if ($update) {
    $_SESSION['status'] = 200;
    $_SESSION['message'] = "ubah tentang berhasil😀😀😀😀";
    header("location:../../pages/tentang/info_kampus.php");
} else {
    // jika proses insert gagal
    $_SESSION['status'] = 400;
    $_SESSION['message'] = "ubah tentang gagal🙁🙁🙁🙁";
    header("location:../../pages/tentang/info_kampus.php");
}
