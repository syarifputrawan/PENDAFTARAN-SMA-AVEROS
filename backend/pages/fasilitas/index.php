<?php include "../../includes/header.php" ?>

<!-- main content -->
<main>
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-md-7">
                <?php include "../../includes/alert.php";?>
            </div>
        </div>

        <h1 class="mt-4">fasilitas</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">fasilitas</li>
        </ol>


        <a href="<?= BASE_URL . 'pages/fasilitas/form_tambah.php'?>" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Data fasilitas</a>
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Icon</th>
                    <th>judul</th>
                    <th>konten</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "../../includes/koneksi.php";

                    $qSelect = "SELECT * FROM fasilitas";
                    $select = mysqli_query($koneksi, $qSelect) or die(mysqli_error($koneksi));
                    $nomor = 0;
                    while ($row = mysqli_fetch_array($select)) {
                        $nomor++;
                ?>
                <tr>
                    <td><?= $nomor?></td>
                    <td><i class="<?= $row['icon']?>"></i></td>
                    <td><?= $row['judul']?></td>
                    <td><?= $row['konten']?></td>
                    <td>
                        <a class="btn btn-warning" href="<?= BASE_URL . 'pages/fasilitas/form_ubah.php?id=' . $row['id'] ?>"><i class="fas fa-edit"></i> Edit</a>
                        <br>
                        <a class="btn btn-danger" href="<?= BASE_URL . 'aksi/fasilitas/hapus.php?id=' . $row['id']?>"  onclick="return confirm('Apakah Anda yakin?')" ><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                </tr>
                <?php
                // curly braces
                    }
                ?>
            </tbody>
        </table>
    </div>

</main>

<?php include "../../includes/footer.php" ?>