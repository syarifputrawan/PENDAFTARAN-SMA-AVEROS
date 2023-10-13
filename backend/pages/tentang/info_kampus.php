<?php include "../../includes/header.php" ?>

<!-- main content -->
<main>
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-md-7">
                <?php include "../../includes/alert.php"; ?>
            </div>
        </div>

        <h1 class="mt-4">info sekolah</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">tentang</li>
            <li class="breadcrumb-item active">info sekolah</li>
        </ol>
        <?php
        include "../../includes/koneksi.php";
        //menampilkan semua kolom pada tabel about dan diberi batas 1 data saja {limit}
        $qSelect = "SELECT * FROM about LIMIT 1";
        $select = mysqli_query($koneksi, $qSelect) or die(mysqli_error($koneksi));
        $data = mysqli_fetch_assoc($select);
        ?>

        <a href="<?= BASE_URL . 'pages/tentang/form_ubah_info_kampus.php?id=' . $data['id'] ?>" class="btn btn-warning"><i class="fas fa-edit"></i> ubah data</a>
        <div class="row">
            <div class="col-md-8">
                <div class="card mt-3">
                    <h5 class="card-header">Gambar Belakang</h5>
                    <div class="card-body">
                        <img src="<?= '../../images/tentang/' . $data['gambar_belakang'] ?>" style="width:100%;height:250px;object-fit:cover;">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mt-3">
                    <h5 class="card-header">Logo</h5>
                    <div class="card-body">
                        <img src="<?= '../../images/tentang/' . $data['logo'] ?>" style="width:100%;height:250px;object-fit:cover;">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card mt-3">
                    <h5 class="card-header">nama sma</h5>
                    <div class="card-body">
                        <?= $data['nama_kampus'] ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mt-3">
                    <h5 class="card-header">Pesan</h5>
                    <div class="card-body">
                        <?= $data['pesan'] ?>
                    </div>
                </div>
            </div>
            <!-- deskripsi -->
            <div class="col-md-4">
                <div class="card mt-3">
                    <h5 class="card-header">Deskripsi Singkat</h5>
                    <div class="card-body">
                        <?= substr(strip_tags($data['deskripsi_singkat']), 0, 600) . '....' ?> <br>
                        <a href="" data-toggle="modal" data-target="#lihat">lihat selengkapnya</a>
                        <!-- Modal -->
                        <div class="modal fade" id="lihat" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?= $data['deskripsi_singkat'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                        <!-- strips_tags adalah menghilangkan tag html jadi yang diamnbil hanya plain text aja -->
                        <!-- substr adalah untuk mengambil beberapa bagian karakter aja berdasarkan dari karakter berapa (star) sampai ke akhir dari jumlah karakter (lenght) -->
                        <?= substr(strip_tags($data['sejarah']), 0, 600) . '....' ?> <br>
                        <a href="#" data-toggle="modal" data-target="#staticBackdrop">lihat selengkapnya</a>
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">sejarah</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?= $data['sejarah'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="card mt-3">
                    <h5 class="card-header">map</h5>
                    <div class="card-body">
                        <div class="uni-map">
                            <?= $data['map'] ?>
                        </div>
                    </div>
                </div>

            </div>

</main>

<?php include "../../includes/footer.php" ?>