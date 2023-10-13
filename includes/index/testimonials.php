<section class="w3l-testimonials" style="background: red;" id="testimonials">
        <!-- /grids -->
        <div class="cusrtomer-layout py-5">
            <div class="container py-lg-4 py-md-3 py-2 pb-lg-0">
                <h5 class="title-subw3hny text-center mb-1">Reviews</h5>
                <h3 class="title-w3l two text-center mb-sm-5 mb-4">testimoni & <span
                        class="inn-text">apa kata mereka</span></h3>
                <!-- /grids -->
                <div class="testimonial-width">
                    <div class="owl-two row">
                    <?php
                            $testimoni = "SELECT * FROM testimoni";
                            $datatestimoni = mysqli_query($koneksi, $testimoni) or die(mysqli_error($koneksi));
                            while ($data = mysqli_fetch_assoc($datatestimoni)) {
                    ?>
                        <div class="col-lg-4 col-md-6 item mt-md-5 mt-4">
                            <div class="testimonial-content">
                                <div class="testimonial">
                                    <i class="fas fa-quote-right"></i>
                                    <blockquote>
                                        <q><?= $data['pesan']?></q>
                                    </blockquote>
                                    <div class="testi-des">
                                        <div class="row">
                                            <div class="col-sm-3">
                                            <img src="<?= 'backend/images/testimoni/' . $data['pass_foto']?>" class="rounded_circle" width='50'  height ='50'>
                                            </div>
                                        <div class="col">
                                            <div class="peopl align-self">
                                            <h3><?= $data['nama']?></h3>
                                            <p class="indentity"><?= $data['asal']?></p>
                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php
                }
            ?>
            </div>
            <!-- /grids -->
        </div>
        <!-- //grids -->
    </section>