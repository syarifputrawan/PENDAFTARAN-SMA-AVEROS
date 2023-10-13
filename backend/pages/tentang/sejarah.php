<?php include "../../includes/header.php" ?>

<!-- main content -->
<main>
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-md-7">
                <?php include "../../includes/alert.php"; ?>
            </div>
        </div>

        <h1 class="mt-4">sejarah</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">sejarah</li>
        </ol>
        <?php
        include "../../includes/koneksi.php";
        //menampilkan semua kolom pada tabel about dan diberi batas 1 data saja {limit}
        $qSelect = "SELECT id ,gambar_sejarah, sejarah FROM about LIMIT 1";
        $select = mysqli_query($koneksi, $qSelect) or die(mysqli_error($koneksi));
        $data = mysqli_fetch_assoc($select);
        ?>

        <a href="<?= BASE_URL . 'pages/tentang/form_ubah_sejarah.php?id=' . $data['id'] ?>" class="btn btn-warning"><i class="fas fa-edit"></i> ubah data</a>

        <div class="row">
            <div class="col-md-5">
                <div class="card mt-3">
                    <h5 class="card-header">gambar sejarah</h5>
                    <div class="card-body">
                        <img src="<?= '../../images/tentang/' . $data['gambar_sejarah'] ?>" style="width:100%;height:250px;object-fit:cover;">
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card mt-3">
                    <h5 class="card-header">sejarah</h5>
                    <div class="card-body">
                        <!-- <-strip_tags = menghilangkan tag html jadi yang di ambil hanya plaint taxt aja 
                        substr = untuk untuk mengambil beberapa bagian karakter aja berdasarkan dari karakter berapa (start) sampai ke akhir dari jumlah karakter (LENGTHT)-> -->
                        <?= substr(strip_tags($data['sejarah']), 0, 600) . "..." ?>
                        <br>
                        <a href="#" data-toggle="modal" data-target="#exampleModal"> lihat selengkapnya </a>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <?= $data['sejarah']?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</main>

<?php include "../../includes/footer.php" ?>