<?php 
    // jika tidak ada data id di URL nya, maka pindah ke halaman index dengan pesan error
    if (!isset($_GET['id'])) {
        session_start();
        $_SESSION['status'] = 400;
        $_SESSION['message'] = "Tidak ada ID/ ID tidak valid!";
        header('location:index.php');
    }
    include "../../includes/header.php";
    include '../../includes/koneksi.php';
    $id = $_GET['id'];
    $selectID = "SELECT * FROM social_media WHERE id=$id";
    $select = mysqli_query($koneksi, $selectID) or die(mysqli_error($koneksi));
    $data = mysqli_fetch_assoc($select);
?>
    
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Ubah Data social_media</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">social_media</li>
                <li class="breadcrumb-item active">Ubah Data social_media</li>
            </ol>
            <form action="<?= BASE_URL . 'aksi/social_media/ubah.php?id=' . $id?>" method="post" enctype="multipart/form-data">
                
                <div class="form-group mb-3">
                    <label for="">Icon</label>
                    <button type="button" class="btn btn-primary btn-lg" name="icon" data-icon="<?= $data['icon']?>" role="iconpicker"></button>
                </div>
                <div class="form-group mb-3">
                    <label for="">Link URL</label>
                    <input type="text" name="link_url" class="form-control" value="<?= $data['link_url']?>">
                </div>

                <button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i> Ubahkan</button>
            </form>


        </div>
    </main>
<?php include "../../includes/footer.php"  ?>