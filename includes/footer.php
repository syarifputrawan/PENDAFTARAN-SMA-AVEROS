<?php
    $about = "SELECT deskripsi_singkat FROM about";
    $dataAbout = mysqli_query($koneksi, $about) or die(mysqli_error($koneksi));
    $resAbout = mysqli_fetch_assoc($dataAbout);
?>


<footer class="w3l-footer-22 position-relative">
        <div class="footer-sub py-5">
            <div class="container py-md-5">
                <div class="row sub-columns">
                    <div class="col-lg-4 col-md-6 sub-one-left ab-right-cont pr-lg-5 mb-md-0  mb-4">
                        <h6>About </h6>
                        <p><?= $resAbout['deskripsi_singkat']?></p>
                        <div class="columns-2">
                            <ul class="social">
                    <?php
                            $socialMedia = "SELECT * FROM social_media";
                            $datasosialmedia = mysqli_query($koneksi, $socialMedia) or die(mysqli_error($koneksi));
                            while ($data = mysqli_fetch_assoc($datasosialmedia)) {
                    ?>
                                <li><a href='<?= $data['link_url']?>'><span class="<?= $data['icon']?>" aria-hidden="true"></span></a>
                                </li>
                                <?php
                            }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 sub-two-right pl-lg-5">
                        <h6>menuju halaman</h6>
                        <ul>
                            <li><a href="index.php"><span class="fas fa-chevron-right mr-2"></span>Home</a>
                            </li>
                            <li><a href="about.php"><span class="fas fa-chevron-right mr-2"></span>About</a>
                            </li>
                            <li><a href="prodi.php"><span class="fas fa-chevron-right mr-2"></span>prodi</a></li>
                            <li><a href="contact.php"><span class="fas fa-chevron-right mr-2"></span>Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6 sub-two-right pl-lg-5 mt-md-0 mt-4">
                        <h6>layanan dan informasi</h6>
                        <?php
                            $menuLainnya = "SELECT * FROM menu_lainnya";
                            $datamenuLainnya = mysqli_query($koneksi, $menuLainnya) or die(mysqli_error($koneksi));
                            while ($data = mysqli_fetch_assoc($datamenuLainnya)) {
                        ?>
                        <ul>
                        <li><a href='<?= $data['link_url']?>'><span class=fas fa-chevron-right mr-2></span><?= $data['judul']?></a>
                        </li>
                            <?php
                            }
                                ?>
                        </ul>
                    </div>
                </div>               
            </div>
        </div>
        </div>
        <!-- copyright -->
        <div class="copyright-footer text-center">
            <div class="container">
                <div class="columns">
                    <p>© 2021 SMA SYARIF PUTRAWAN. All rights reserved.Design by<a href="https://www.instagram.com/syarif_putrawan/" target="_blank">
                            SYARIF P HIDAYATULLAH</a>
                    </p>
                </div>
            </div>
        </div>
        <!-- //copyright -->
    </footer>
    <!-- //footer -->

    <!-- Js scripts -->
    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fas fa-level-up-alt" aria-hidden="true"></span>
    </button>
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("movetop").style.display = "block";
            } else {
                document.getElementById("movetop").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <!-- //move top -->
    <!-- Template JavaScript -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/theme-change.js"></script>
    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function () {
            $('.navbar-toggler').click(function () {
                $('body').toggleClass('noscroll');
            })
        });
    </script>
    <!-- disable body scroll which navbar is in active -->

    <!--/MENU-JS-->
    <script>
        $(window).on("scroll", function () {
            var scroll = $(window).scrollTop();

            if (scroll >= 80) {
                $("#site-header").addClass("nav-fixed");
            } else {
                $("#site-header").removeClass("nav-fixed");
            }
        });

        //Main navigation Active Class Add Remove
        $(".navbar-toggler").on("click", function () {
            $("header").toggleClass("active");
        });
        $(document).on("ready", function () {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
            $(window).on("resize", function () {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
            });
        });
    </script>
    <!--//MENU-JS-->
    <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>