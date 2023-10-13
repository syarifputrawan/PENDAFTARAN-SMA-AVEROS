<?php include "../../includes/header.php" ?>

<!-- main content -->
<main>
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-md-7">
                <?php include "../../includes/alert.php";?>
            </div>
        </div>

        <h1 class="mt-4">social_media</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">social_media</li>
        </ol>


        <a href="<?= BASE_URL . 'pages/social_media/form_tambah.php'?>" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Data social_media</a>
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Icon</th>
                    <th>Link URL</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "../../includes/koneksi.php";

                    $qSelect = "SELECT * FROM social_media";
                    $select = mysqli_query($koneksi, $qSelect) or die(mysqli_error($koneksi));
                    $nomor = 0;
                    while ($row = mysqli_fetch_array($select)) {
                        $nomor++;
                ?>
                <tr>
                    <td><?= $nomor?></td>
                    <td><i class="<?= $row['icon']?>"></i></td>
                    <td><a href="<?= $row['link_url']?>"><?= $row['link_url']?></a></td>
                    <td>
                        <a class="btn btn-warning" href="<?= BASE_URL . 'pages/social_media/form_ubah.php?id=' . $row['id'] ?>"><i class="fas fa-edit"></i> Edit</a>
                        <br>
                        <a class="btn btn-danger" href="<?= BASE_URL . 'aksi/social_media/hapus.php?id=' . $row['id']?>"  onclick="return confirm('Apakah Anda yakin?')" ><i class="fas fa-trash"></i> Hapus</a>
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