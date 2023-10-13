<?php include "../../includes/header.php"  ?>
    
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Data fasilitas</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">fasilitas</li>
                <li class="breadcrumb-item active">Tambah Data fasilitas</li>
            </ol>
            <form action="<?= BASE_URL . 'aksi/fasilitas/tambah.php'?>" method="post" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label for="">Icon</label>
                    <button type="button" class="btn btn-primary btn-lg" name="icon" role="iconpicker"></button>
                </div>
                <div class="form-group mb-3">
                    <label for="">judul</label>
                    <input type="text" name="judul" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">konten</label>
                    <input type="text" name="konten" class="form-control">
                </div>
                <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Tambahkan</button>
            </form>

        </div>
    </main>

<?php include "../../includes/footer.php"  ?>