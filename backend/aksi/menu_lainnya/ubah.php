<?php 
session_start();
if (!isset($_POST)) {
    
    $_SESSION['status'] = 400;
    $_SESSION['message'] = "tidak ada data pada post";
    header("location:../../pages/menu_lainnya/index.php");
}
include "../../includes/koneksi.php";
$id = $_POST['id'];
$gambar = $_FILES['gambar']['tmp_name'];
$judul1 = $_POST['judul'];
$link_url = $_POST['link_url'];
// berikan variabel qUpdate kosong ini
    // untuk valuenya nanti akan diberikan ketika user upload gambar / tidak
    $qUpdate = "";

    // jika user ingin merubah gambar/ ada file yang di input yang artinya tidak kosong
    if (!empty($gambar)) {
        // cari data berdasarkan nim, yang diambil cuma kolom gambar
        $selectBy = "SELECT * FROM menu_lainnya WHERE id='$id'";
        $select = mysqli_query($koneksi, $selectBy);
        $oldData = mysqli_fetch_assoc($select);
        // definisikan sebuah lokasi gambar/ path gambar
        $path = "../../images/menu_lainnya/" . $oldData['gambar'];

        // jika sebelumnya ada gambar lama
        if (file_exists($path)) {
            // maka hapuskan gambar lama
            unlink($path);
        }

        $namaGambar = rand(111111,999999) . '.png';
        $upload = move_uploaded_file($gambar, "../../images/menu_lainnya/$namaGambar");
        // rancang querynya
        $qUpdate = "UPDATE menu_lainnya SET  gambar='$namaGambar', judul='$judul1', link_url='$link_url' WHERE id=$id";
    }else {
        // rancang querynya
        $qUpdate = "UPDATE menu_lainnya SET judul='$judul1', link_url='$link_url' WHERE id=$id";
    }

    
    // lakukan proses ubah
    $update = mysqli_query($koneksi, $qUpdate) or die(mysqli_error($koneksi));



    // header('location:index.php');
    // jika proses update berhasil
    if ($update) {
        $_SESSION['status'] = 200;
        $_SESSION['message'] = "ubah data berhasil😀😀😀😀";
        header("location:../../pages/menu_lainnya/index.php");
    }else{
    // jika proses insert gagal
    $_SESSION['status'] = 400;
    $_SESSION['message'] = "ubah data gagal🙁🙁🙁🙁";
    header("location:../../pages/menu_lainnya/index.php");
    }
?>
