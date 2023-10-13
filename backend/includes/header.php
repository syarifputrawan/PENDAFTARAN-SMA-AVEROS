<?php
// definikan sebuah variabel konstanta 
// variable ini bisa digunakan di berbagai halaman
define('BASE_URL', 'http://localhost/pendaftaran-sma-averos/backend/');
session_start();

// cek apkah id tidak ada tau username tidak ada di dalam session
if (!isset($_SESSION['id']) || !isset($_SESSION['username'])) {
    // maka pindah ke halaman selanjutnya  
    $_SESSION['status'] = 400;
    $_SESSION['message'] = "anda harus login terlebih dahulu";
    header("location:../../login.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>bagian admin pendaftaran sma</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../../css/styles.css" rel="stylesheet" />
    <link href="../../css/mystyle.css" rel="stylesheet" />
    <!--font awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
    <link rel="stylesheet" href="../../vendor/icon-picker/dist/css/bootstrap-iconpicker.min.css" />

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <!-- <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script> -->
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">pendaftaran sma</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu" alria-labeled="navbarDropdown">
                    <p class="dropdown-item mx-5"><?= $_SESSION['username'] ?></p>
                    <hr class="dropdown-item dropdown-divider" />
                    <a class="dropdown-item" onclick="return confirm('apakah anda yakin ingin logout?') " href="../../aksi/auth/logout.php">Logout</a>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <!-- side navigation -->
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu Utama</div>
                            <a class="nav-link" href="<?= BASE_URL . 'pages/data_siswa/index.php' ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Data siswa
                            </a>

                            <div class="sb-sidenav-menu-heading">Pengaturan Frontend</div>

                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                tentang
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?= BASE_URL . 'pages/tentang/info_kampus.php' ?>">info sekolah</a>
                                    <a class="dropdown-item" href="<?= BASE_URL . 'pages/tentang/sejarah.php' ?>">sejarah</a>
                                    <a class="dropdown-item" href="<?= BASE_URL . 'pages/tentang/info_sambutan_rektor.php' ?>">sambutan kepsek</a>
                                </div>
                            </div>
                            <a class="nav-link" href="<?= BASE_URL . 'pages/fasilitas/index.php' ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-desktop"></i></div>
                                Fasilitas
                            </a>
                            <a class="nav-link" href="<?= BASE_URL . 'pages/kontak/index.php' ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                                Kontak
                            </a>
                            <a class="nav-link" href="<?= BASE_URL . 'pages/menu_lainnya/index.php' ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-bars"></i></div>
                                Menu Lainnya
                            </a>
                            <a class="nav-link" href="<?= BASE_URL . 'pages/pesan/index.php' ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                                Pesan
                            </a>
                            <a class="nav-link" href="<?= BASE_URL . 'pages/prodi/index.php' ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-graduation-cap"></i></div>
                                jurusan
                            </a>
                            <a class="nav-link" href="<?= BASE_URL . 'pages/social_media/index.php' ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-link"></i></div>
                                Social Media
                            </a>
                            <a class="nav-link" href="<?= BASE_URL . 'pages/testimoni/index.php' ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-comment-dots"></i></div>
                                Testimoni
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        admin
                    </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">