<?php
session_start();
include "includes/koneksi.php";
include "includes/navbar.php";

?>
<!-- breadcrumb -->
<section class="w3l-about-breadcrumb text-center">
  <div class="breadcrumb-bg breadcrumb-bg-about py-5">
    <div class="container py-lg-5 py-md-4">
      <div class="w3breadcrumb-gids">
        <div class="w3breadcrumb-left text-left">
          <h2 class="title AboutPageBanner">
            hubungi kami</h2>
          <p class="inner-page-para mt-2">
            tingalkan pesan maupun masukan</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!--//breadcrumb-->
<!-- contacts-5-grid -->
<div class="w3l-contact-10 py-5" id="contact">
  <div class="form-41-mian pt-lg-4 pt-md-3 pb-lg-4">
    <div class="container">
      <div class="heading text-center mx-auto">
        <h5 class="title-subw3hny text-center">Contact our team</h5>
        <h3 class="title-w3l">silahkan beri pesan dan masukan di form dibawah sini <span class="inn-text"> </span></h3>
      </div>

      <div class="contacts-5-grid-main mt-5">
        <div class="contacts-5-grid">
          <div class="map-content-5">
            <div class="d-grid grid-col-2">
              <div class="contact-type">
                <?php
                $about = "SELECT * FROM kontak";
                $dataAbout = mysqli_query($koneksi, $about) or die(mysqli_error($koneksi));
                while ($resAbout = mysqli_fetch_assoc($dataAbout)) {
                ?>
                  <div class="address-grid">
                    <h6><a href='<?= $resAbout['link_url'] ?>'><span class="<?= $resAbout['icon'] ?>" aria-hidden="true"></span></a></h6>
                    <p><?= $resAbout['isi'] ?></p>
                  </div>
                <?php
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid px-4">
        <div class="row">
            <div class="col-md-7">
                <?php include "alert/alert.php";?>
            </div>
        </div>
      <form action="aksi/tambah.php" method="post">
      <div class="form-inner-cont mt-5">
          <div class="form-grids">
            <div class="form-input"> nama
              <input type="text" name="nama" placeholder="masukan nama anda" required="" />
            </div>
            <div class="form-input"> judul pesan
              <input type="text" name="judul" placeholder="masukan judul pesan anda" required />
            </div>
            <div class="form-input"> email
              <input type="email" name="email" placeholder="masukan email anda" required />
            </div>
            <div class="form-input"> nomor hp
              <input type="text" name="no_hp" placeholder="masukan nomor hp anda" required />
            </div>
          </div>
          <div class="form-input"> pesan
            <textarea name="pesan" placeholder="masukan pesan yang anda sampaikan" required=""></textarea>
          </div>
          <div class="text-right">
            <button class="btn btn-style btn-primary">kirim</button>
          </div>
      </div>
      </form>
    </div>
  </div>
  <!-- //contacts-5-grid -->
</div>
    </div>
  </div>
  <!-- //contacts-5-grid -->
</div>

<div class="contacts-sub-5">
<?php
                $about = "SELECT * FROM about";
                $dataAbout = mysqli_query($koneksi, $about) or die(mysqli_error($koneksi));
                $data = mysqli_fetch_assoc($dataAbout);
                ?>
 
  <?= $data['map'];?>
</div>
<?php include 'includes/footer.php'?>