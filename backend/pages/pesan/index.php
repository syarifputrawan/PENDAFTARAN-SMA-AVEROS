<?php include "../../includes/header.php" ?>

<!-- main content -->
<main>
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-md-7">
                <?php include "../../includes/alert.php";?>
            </div>
        </div>

        <h1 class="mt-4">pesan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">pesan</li>
        </ol>

        <table id="datatablesSimple">

            <thead>
                <tr>
                    <th>#</th>
                    <th>nama</th>
                    <th>email</th>
                    <th>judul</th>
                    <th>no hp</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "../../includes/koneksi.php";

                    $qSelect = "SELECT * FROM pesan";
                    $select = mysqli_query($koneksi, $qSelect) or die(mysqli_error($koneksi));
                    $nomor = 0;
                    while ($row = mysqli_fetch_array($select)) {
                        $nomor++;
                ?>
                <tr>
                    <td><?= $nomor?></td>
                    <td><?= $row['nama']?></td>
                    <td><?= $row['email']?></td>
                    <td><?= $row['judul']?></td>
                    <td><?= $row['no_hp']?></td>
                    
                    <td>
                    <a class="btn btn-warning" href="<?= BASE_URL . 'pages/pesan/detail.php?id=' . $row['id']?>" ><i class="fas fa-info"></i> pesan</a>
                        <a class="btn btn-danger" href="<?= BASE_URL . 'aksi/pesan/hapus.php?id=' . $row['id']?>"  onclick="return confirm('Apakah Anda yakin?')" ><i class="fas fa-trash"></i> Hapus</a>
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