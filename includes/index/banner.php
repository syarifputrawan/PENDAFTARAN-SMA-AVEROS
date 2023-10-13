<?php
$bannerSelect = "SELECT * FROM about LIMIT 1";
$select = mysqli_query($koneksi, $bannerSelect) or die (mysqli_error($koneksi));
$banner = mysqli_fetch_assoc($select);
?>
<section class="bannerw3l-hnyv">
        <div class="banner-layer">
            <img src="<?= 'backend/images/tentang/' . $banner['gambar_belakang']?>" id="bg-banner">
            <div class="main-content-top">
                <div class="container">
                    <div class="main-content">
                        <!-- if logo is image enable this   
                        <a class="logo" href="index.html">
                            <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
                        </a> -->
                        <h4><?=$banner['pesan']?></h4>
                        <h3>SMA SYARIF PUTRAWAN </h3>
                        <a href="#grids" class="btn btn-style transparant-btn mt-md-5 mt-4">baca lebih lanjut</a>
                    </div>   
                </div>
            </div>
        </div>
    </section>