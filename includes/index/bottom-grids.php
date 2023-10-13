<section class="w3l-bottom-grids-6 py-5" id="grids">
        <div class="container py-md-5 py-2">
            <h3 class="font-weight-bold text-center">FASILITAS SMA SYARIF PUTRAWAN</h3>
            <div class="grids-area-hny row text-left pt-lg-5 mt-lg-5">
    
                <?php
                    $fasilitasSelect = "SELECT * FROM fasilitas";
                    $select = mysqli_query($koneksi, $fasilitasSelect) or die (mysqli_error($koneksi));
                

                    while ($data = mysqli_fetch_assoc($select)) {
                ?>
                <div class="col-lg-4 col-md-6 grids-feature pr-lg-5">
                    <div class="area-box">
                        <span class="<?= $data['icon']?>"></span>
                        <h4><a href="#feature" class="title-head"> <?= $data['judul']?> </a></h4>
                        <?= substr(strip_tags($data['konten']), 0, 200) . '....'?> <br>
                    <a href="" data-toggle="modal" data-target="#lihat-<?=$data['id']?>">lihat selengkapnya</a>
                    <div class="modal fade" id="lihat-<?=$data['id']?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">lebih lengkap</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?= $data['konten'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
            }?>
            </div>
        </div>
    </section>
    