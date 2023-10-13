<?php include "../../includes/header.php"  ?>
    
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Data social_media</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">social_media</li>
                <li class="breadcrumb-item active">Tambah Data social_media</li>
            </ol>
            <form action="<?= BASE_URL . 'aksi/social_media/tambah.php'?>" method="post" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label for="">Icon</label>
                    <button type="button" class="btn btn-primary btn-lg" name="icon" role="iconpicker"></button>
                </div>
                <div class="form-group mb-3">
                    <label for="">Link URL</label>
                    <input type="text" name="link_url" class="form-control">
                </div>

                <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Tambahkan</button>
            </form>

        </div>
    </main>

<?php include "../../includes/footer.php"  ?>
        
