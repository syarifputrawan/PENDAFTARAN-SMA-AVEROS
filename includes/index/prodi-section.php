<section class="w3l-courses" id="courses">
    <div class="blog py-5">
        <div class="container py-md-5 py-2">
            <h3 class="title-w3l text-center">PROGRAM JURUSAN </h3>
            <div class="row">
            <?php
                            $prodi = "SELECT * FROM prodi Limit 4";
                            $dataprodi = mysqli_query($koneksi, $prodi) or die(mysqli_error($koneksi));
                            while ($data = mysqli_fetch_assoc($dataprodi)) {
            ?>
                <div class="col-lg-3 col-md-6 item mt-5">
                    <div class="card">
                        <div class="card-header p-0 position-relative">
                            <a href="#course-single" class="zoom d-block">
                                <img class="card-img-bottom d-block" src="<?= 'backend/images/prodi/'.$data['gambar']?>"
                                    alt="Card image cap"  width='150'  height ='100' style="object-fit: cover;">
                            </a>
                        </div>
                        <div class="card-body course-details">
                            <a href="#course-single" class="course-desc"> <?= $data['nama_prodi']?>
                            </a>
                            <div class="course-meta mt-4">
                                <div class="meta-item course-lesson">
                                    <span class="fas fa-users"></span>
                                    <span class="meta-value"> <?= $data['jumlah_mhs']?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                            }
                ?>
                <div class="mt-5 mx-auto text-more text-center pt-lg-4">
                    <a href="jurusan.php" class="btn btn-style btn-primary">lihat selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</section>