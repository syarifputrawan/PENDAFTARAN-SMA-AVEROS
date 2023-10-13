<!-- bagian kepala -->
<?php include "../../includes/header.php" ?>
<!-- contentnya apa  -->

<main>
    <div class="container-fluid px-4">

        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-md-7">
                    <?php include "../../includes/alert.php"; ?>
                </div>
            </div>
            <h1 class="mt-4">pendaftaran</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">peserta didik baru</li>
            </ol>
            <a href="<?= BASE_URL . 'pages/data_siswa/form_tambah.php' ?>" class="btn btn-success"><i class="fas fa-plus"></i>tambah data baru</a>
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NISN</th>
                        <th>nama</th>
                        <th>tempat lahir</th>
                        <th>tanggal lahir</th>
                        <th>sekolah asal</th>
                        <th>jurusan</th>
                        <th>pass foto</th>
                        <th>jenis kelamin</th>
                        <th>alamat</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "../../includes/koneksi.php";

                    $qSelect = "SELECT * FROM daftar";
                    $qselect = mysqli_query($koneksi, $qSelect) or die(mysqli_error($koneksi));
                    $nomor = 0;
                    while ($row = mysqli_fetch_array($qselect)) {
                        $nomor++;
                    ?>
                        <tr>
                            <td><?= $nomor ?></td>
                            <td><?= $row['nisn'] ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['tempat_lahir'] ?></td>
                            <td><?= $row['tanggal_lahir'] ?></td>
                            <td><?= $row['sekolah_asal'] ?></td>
                            <td><?= $row['jurusan'] ?></td>
                            <td><img src="<?= BASE_URL . "images/" . $row['pass_foto'] ?>" width="100" height="100" style="object-fit: cover;"></td>
                            <td><?= $row['jenis_kelamin'] ?></td>
                            <td><?= $row['alamat'] ?></td>
                            <td>
                                <a class="btn btn-warning" href="<?= BASE_URL . 'pages/data_siswa/form_ubah.php?nisn=' . $row['nisn'] ?>" onclick="return confirm('apakah anda yakin merubah data?🙁🙁🙁🙁')"></i>ubah</a>
                                <br>
                                <a class="btn btn-danger" href="<?= BASE_URL . 'aksi/siswa/hapus.php?nisn=' . $row['nisn'] ?>" onclick="return confirm('apakah anda yakin?🙁🙁🙁🙁')"><i class="fas fa-edit"></i>hapus</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
</main>
<?php include "../../includes/footer.php" ?>