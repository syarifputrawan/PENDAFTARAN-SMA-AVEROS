<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>pmb sma averos</title>
    <!-- google fonts -->
    <link href="//fonts.googleapis.com/css2?family=Jost:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <!-- Template ke 2 css -->
    <link rel="stylesheet" href="assets/css/mystyle.css">
</head>

<body>
<?php
$navbarSelect = "SELECT * FROM about LIMIT 1";
$select = mysqli_query($koneksi, $navbarSelect) or die (mysqli_error($koneksi));
$navbar = mysqli_fetch_assoc($select);
?>
    <!--header-->
    <header id="site-header" class="fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark stroke">
                <h1>
                    <a class="navbar-brand" href="#index.html">
                        <img src="<?= 'backend/images/tentang/' . $navbar['logo']?>" style="height:35px;" /> <?= $navbar['nama_kampus']?>
                    </a>
                </h1>
                <!-- if logo is image enable this   
        <a class="navbar-brand" href="#index.html">
            <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
        </a> -->
                <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ml-lg-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pendaftaran.php">pendaftaran</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="jurusan.php">jurusan</a>
                        </li>
                        <li class="nav-item mr-lg-1">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <!--/search-right-->
                        <li class="header-search mr-lg-2 mt-lg-0 mt-4 position-relative">
                        </li>
                        <!--//search-right-->
                    </ul>
                </div>


                <!-- toggle switch for light and dark theme -->
                <div class="mobile-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container py-1">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div>
                <!-- //toggle switch for light and dark theme -->
            </nav>

        </div>
    </header>
    <!--/header-->