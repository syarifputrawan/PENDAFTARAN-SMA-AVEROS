<section class="w3l-homeblock1" id="about">
        <div class="midd-w3 py-5">
            <div class="container py-lg-5 py-md-3">
                <div class="row cwp23-grids align-items-center">
                    <div class="col-lg-6">
                        <h5 class="title-subw3hny">menu lainnya</h5>
                        <h3 class="title-w3l">menu yang terpilih untuk anda</h3>
                        <h6 class="mt-md-4 mt-md-5 mt-4">menu lainnya yang terkait dengan info/pegumuman disekitar kampus</h6>
                        <a href="pendaftaran.php" class="btn btn-style btn-primary mt-lg-5 mt-4">daftarkan dirimu</a>
                    </div>
                    <div class="HomeAboutImages col-lg-6 mt-lg-0 mt-5 pl-lg-5">
                        <div class="cwp23-text-cols row">
                        <?php
                            $menuMore = "SELECT * FROM menu_lainnya";
                            $menu = mysqli_query($koneksi, $menuMore) or die(mysqli_error($koneksi));
                            $index = 0;
                            while ($data = mysqli_fetch_assoc($menu)) {

                        ?>
                            <div class="column col-6 mt-2">
                                <div class='column-w3-img position-relative'>
                                    <a href='<?= $data['link_url']?>'>
                                    <img src='<?= 'backend/images/menu_lainnya/'.$data['gambar']?>' alt=''
                                            class='radius-image img-fluid' width='250'  height ='100'>
                                    </a>
                                    <div class='edu-info'>
                                        <h4 class='edu-heading-title'>
                                            <a href='<?= $data['link_url']?>'>
                                            <?= $data['judul']?>
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    