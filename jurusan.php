<!-- breadcrumb -->
<?php 
session_start();
include "includes/koneksi.php";
include 'includes/navbar.php'

  
  ?>


  <section class="w3l-about-breadcrumb text-center">
    <div class="breadcrumb-bg breadcrumb-bg-about py-5">
      <div class="container py-lg-5 py-md-4">
        <div class="w3breadcrumb-gids">
          <div class="w3breadcrumb-left text-left">
            <h2 class="title AboutPageBanner">
              jurusan yang tersedia</h2>
            <p class="inner-page-para mt-2">
              silahkan memilih jurusan yang anda mau</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--//breadcrumb-->
  <!--/popular-Courses-->
  <section class="w3l-courses" id="courses">
    <div class="blog py-5">
      <div class="container py-md-5 py-2">
        <h5 class="title-subw3hny text-center">Featured Courses</h5>
        <h3 class="title-w3l text-center">Popular <span class="inn-text">Courses</span></h3>

        <div class="row">
        <?php
                            $prodi = "SELECT * FROM prodi";
                            $dataprodi = mysqli_query($koneksi, $prodi) or die(mysqli_error($koneksi));
                            while ($data = mysqli_fetch_assoc($dataprodi)) {
            ?>
          <div class="col-lg-3 col-md-6 item mt-5">
            <div class="card">
              <div class="card-header p-0 position-relative">
                <a href="#course-single" class="zoom d-block">
                <img class="card-img-bottom d-block" src="<?= 'backend/images/prodi/'.$data['gambar']?>"
                    alt="foto"  width='150'  height ='100' style="object-fit: cover;">
                </a>
              </div>
              <div class="card-body course-details">
                <div class="price-review d-flex justify-content-between mb-1align-items-center">
                </div>
                <a href="#course-single" class="course-desc"> <?= $data['nama_prodi']?>
                </a>
                <div class="course-meta mt-4">
                  <div class="meta-item course-lesson">
                    <span class="fas fa-users"></span>
                    <span class="meta-value"> <?= $data['jumlah_mhs']. ' mahasiswa terdaftar'?></span>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <?php
                            }
          ?>
        </div>
      </div>
    </div>
  </section>
  <!--//popular-Courses-->
  <?php include 'includes/footer.php'?>