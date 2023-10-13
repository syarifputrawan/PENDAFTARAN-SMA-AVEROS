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


        <h1 class="mt-4">menu lainnya</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">menu lainnya</li>
        </ol>

        <a href="<?= BASE_URL . 'pages/menu_lainnya/form_tambah.php' ?>" class="btn btn-success"><i class="fas fa-plus"></i>tambah data baru</a>
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>#</th>
                    <th>gambar</th>
                    <th>judul</th>
                    <th>link url</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "../../includes/koneksi.php";

                    $qSelect = "SELECT * FROM menu_lainnya";
                    $qselect = mysqli_query($koneksi, $qSelect) or die(mysqli_error($koneksi));
                    $nomor = 0;
                    while ($row = mysqli_fetch_array($qselect)) {
                        $nomor++;
                ?>
                <tr>
                    <td><?= $nomor?></td>
                    <td><img src="<?= BASE_URL . "images/menu_lainnya/" . $row['gambar']?>" alt="" width="100" height="100" style="object-fit: cover;">
                    </td>
                    <td><?= $row['judul']?></td>
                    <td><a href="<?= $row['link_url']?>"><?= $row['link_url']?></a></td>
                    <td>
                        <a class="btn btn-warning" href="<?= BASE_URL . 'pages/menu_lainnya/form_ubah.php?id=' .$row['id']?>"><i class="fas fa-edit"></i>edit</a>
                        <br>
                        <a class="btn btn-danger" href="<?= BASE_URL . 'aksi/menu_lainnya/hapus.php?id=' .$row['id']?>" onclick="return confirm('apakah anda yakin?🙁🙁🙁🙁')"><i class="fas fa-edit"></i>hapus</a>
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