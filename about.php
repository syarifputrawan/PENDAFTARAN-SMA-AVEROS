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
            tentang kami </h2>
          <p class="inner-page-para mt-2">
            scroll kebawah untuk melihat apa saja tentang kami</p>
        </div>
        <div class="w3breadcrumb-right">
          <ul class="breadcrumbs-custom-path">
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!--//breadcrumb-->
<!--/w3l-aboutblock1-->
<section class="w3l-aboutblock1" id="about">
  <div class="midd-w3 py-2">
    <div class="container py-lg-5 py-md-4 py-2">
      <div class="row">
        <div class="col-lg-4 left-wthree-img pr-lg-5">
          <h1 class="title AboutPageBanner">
            sambutan kepala sekolah</h1>
          <img src='<?= 'backend/images/tentang/'.$data['gambar_rektor']?>' alt="" width="300" height="300">
        </div>
        <div class="col-lg-8 mt-lg-0 mt-5 about-right-faq align-self">

          <p class=""><?= $data['sambutan_rektor']?></p>

        </div>
      </div>
    </div>
  </div>
</section>
<!--//w3l-aboutblock1-->
<!--/team-sec-->
<section class="w3l-aboutblock1" id="about">
  <div class="midd-w3 py-2">
    <div class="container py-lg-5 py-md-4 py-2">
      <div class="row">

        <div class="col-lg-8 mt-lg-0 mt-5 about-right-faq align-self">

          <p class=""><?= $data['sejarah']?></p>

        </div>
        <div class="col-lg-4 left-wthree-img pr-lg-5">
          <h1 class="title AboutPageBanner">
            sejarah</h1>
          <img src='<?= 'backend/images/tentang/'.$data['gambar_sejarah']?>' alt="" width="300" height="300">
        </div>
      </div>
    </div>
  </div>
</section>

<section class="w3l-aboutblock1" id="about">
  <div class="midd-w3 py-2">
    <div class="container py-lg-5 py-md-4 py-2">
      <div class="row">

        <div class="col-lg-8 mt-lg-0 mt-5 about-right-faq align-self">

          <p class=""><?= $data['sejarah']?></p>

        </div>
        <div class="col-lg-4 left-wthree-img pr-lg-5">
          <h1 class="title AboutPageBanner">
            sejarah</h1>
          <img src='<?= 'backend/images/tentang/'.$data['gambar_sejarah']?>' alt="" width="300" height="300">
        </div>
      </div>
    </div>
  </div>
</section>
<!--//team-sec-->
<?php include 'includes/footer.php' ?>