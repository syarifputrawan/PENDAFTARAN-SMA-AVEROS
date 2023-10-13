<?php
session_start();
include "includes/koneksi.php";
include "includes/navbar.php";
$menuMore = "SELECT * FROM about";
$menu = mysqli_query($koneksi, $menuMore) or die(mysqli_error($koneksi));
$data = mysqli_fetch_assoc($menu);

?>
<!-- breadcrumb -->
<section class="w3l-about-breadcrumb text-center">
    <div class="breadcrumb-bg breadcrumb-bg-about py-5">
        <div class="container py-lg-5 py-md-4">
            <div class="w3breadcrumb-gids">
                <div class="w3breadcrumb-left text-left">
                <h2 class="title AboutPageBanner">
            silahkan daftarkan dirimu</h2>
          <p class="inner-page-para mt-2">
            siapkan dirimu untuk bergabung bersama kami</p>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-7">
            <?php include "alert/alert.php"; ?>
        </div>
    </div>
    <!-- data input -->
    <div class="container">
        <center>
            <h1>Formulir Pendaftaran</h1>
        </center>
        <form action='aksi/tambah_pendaftaran.php' method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">nisn</label>
                <input type="number" name="nisn" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">nama</label>
                <input type="text" name="nama" class="form-control">
            </div>
            <div class="form-group">
                <label for="data1">tempat lahir</label>
                <input type="text" name="tempat_lahir" class="form-control">
            </div>
            <div class="form-group">
                <label for="data2">tanggal lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control">
            </div>
            <div class="form-group">
                <label for="data3">alamat</label>
                <input type="text" name="alamat" class="form-control">
            </div>
            <div class="form-group">
                <label for="data4">sekolah asal</label>
                <input type="text" name="sekolah_asal" class="form-control">
            </div>
            <div class="form-group">
                <label for="data4">jenis kelamin</label>
                <input type="text" name="jenis_kelamin" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">prodi</label>
                <select name="jurusan">
                    <option value="teknik informatika">teknik informatika</option>
                    <option value="teknik informasi">teknik informasi</option>
                    <option value="teknik elektro  ">teknik elektro</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="">foto</label>
                <!-- image viewer menggunakan js  -->
                <input type="file" name="pass_foto" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">daftar</button>
        </form>
    </div>
</div>
    <!-- data input -->

    <?php include 'includes/footer.php' ?>