<!-- bagian kepala -->
<?php include "../../includes/header.php" ?>
<!-- contentnya apa  -->
<main>
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-md-7">
                <?php include "../../includes/alert.php";?>
            </div>
        </div>


        <h1 class="mt-4">testimoni</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">testimoni</li>
        </ol>

        <a href="<?= BASE_URL . 'pages/testimoni/form_tambah.php' ?>" class="btn btn-success"><i class="fas fa-plus"></i>tambah data baru</a>
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>#</th>
                    <th>nama</th>
                    <th>asal</th>
                    <th>pesan</th>
                    <th>pass foto</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "../../includes/koneksi.php";

                    $qSelect = "SELECT * FROM testimoni";
                    $qselect = mysqli_query($koneksi, $qSelect) or die(mysqli_error($koneksi));
                    $nomor = 0;
                    while ($row = mysqli_fetch_array($qselect)) {
                        $nomor++;
                ?>
                <tr>
                    <td><?= $nomor?></td>
                    <td><?= $row['nama']?></td>
                    <td><?= $row['asal']?></td>
                    <td><?= $row['pesan']?></td>
                    <td><img src="<?= BASE_URL . "images/testimoni/" . $row['pass_foto']?>" alt="" width="100" height="100" style="object-fit: cover;">
                    </td>
                    <td>
                        <a class="btn btn-warning" href="<?= BASE_URL . 'pages/testimoni/form_ubah.php?id=' .$row['id']?>"><i class="fas fa-edit"></i>edit</a>
                        <br>
                        <a class="btn btn-danger" href="<?= BASE_URL . 'aksi/testimoni/hapus.php?id=' .$row['id']?>" onclick="return confirm('apakah anda yakin?🙁🙁🙁🙁')"><i class="fas fa-edit"></i>hapus</a>
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