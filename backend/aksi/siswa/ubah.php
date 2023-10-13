<?php 
session_start();
if (!isset($_POST)) {
    
    $_SESSION['status'] = 400;
    $_SESSION['message'] = "tidak ada data pada post";
    header("location:../../pages/data_siswa/index.php");
}
include "../../includes/koneksi.php";
$nisn1 = $_POST['nisn'];
$nama1 = $_POST['nama'];
$tempatLahir = $_POST['tempat_lahir'];
$tanggalLahir = $_POST['tanggal_lahir'];
$sekolahAsal = $_POST['sekolah_asal'];
$jurusan1 = $_POST['jurusan'];
$passFoto = $_FILES['pass_foto']['tmp_name'];
$jenisKelamin = $_POST['jenis_kelamin'];
$alamat1 = $_POST['alamat'];
// berikan variabel qUpdate kosong ini
    // untuk valuenya nanti akan diberikan ketika user upload gambar / tidak
    $qUpdate = "";

    // jika user ingin merubah gambar/ ada file yang di input yang artinya tidak kosong
    if (!empty($passFoto)) {
        // cari data berdasarkan nim, yang diambil cuma kolom gambar
        $selectBy = "SELECT pass_foto FROM daftar WHERE nisn=$nisn1";
        $select = mysqli_query($koneksi, $selectBy);
        $oldData = mysqli_fetch_assoc($select);
        // definisikan sebuah lokasi gambar/ path gambar
        $path = "images/" . $oldData['pass_foto'];

        // jika sebelumnya ada gambar lama
        if (file_exists($path)) {
            // maka hapuskan gambar lama
            unlink($path);
        }

        $namaGambar = rand(111111,999999) . '.png';
        $upload = move_uploaded_file($passFoto, "../../images/$namaGambar");
        // rancang querynya
        $qUpdate = "UPDATE daftar SET nisn='$nisn1', nama='$nama1', tempat_lahir='$tempatLahir', tanggal_lahir='$tanggalLahir', sekolah_asal='$sekolahAsal', jurusan='$jurusan1', pass_foto='$namaGambar', jenis_kelamin='$jenisKelamin', alamat='$alamat1' WHERE nisn=$nisn1";
    }else {
        // rancang querynya
        $qUpdate = "UPDATE daftar SET nisn='$nisn1', nama='$nama1', tempat_lahir=' $tempatLahir', tanggal_lahir='$tanggalLahir', sekolah_asal='$sekolahAsal', jurusan='$jurusan1',  jenis_kelamin='$jenisKelamin', alamat='$alamat1' WHERE nisn=$nisn1";
    }

    
    // lakukan proses ubah
    $update = mysqli_query($koneksi, $qUpdate) or die(mysqli_error($koneksi));


    // header('location:index.php');
    // jika proses update berhasil
    if ($update) {
        $_SESSION['status'] = 200;
        $_SESSION['message'] = "ubah data berhasil😀😀😀😀";
        header("location:../../pages/data_siswa/index.php");
    }else{
        // jika proses insert gagal
        $_SESSION['status'] = 400;
        $_SESSION['message'] = "ubah data gagal🙁🙁🙁🙁";
        header("location:../../pages/data_siswa/index.php");
    }
?>
