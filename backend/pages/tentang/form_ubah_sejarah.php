<?php include "../../includes/header.php";

//jika tidak ada data nim di urlnya maka pindah ke halaman index dengan pesan eror
if (!isset($_GET['id'])) {
    $_SESSION['status'] = 400;
    $_SESSION['message'] = "tidak ada id/id tidak valid";
    header('location:index.php');
}
include "../../includes/koneksi.php";
$id = $_GET['id'];
$selectID = "SELECT id, gambar_sejarah, sejarah FROM about WHERE id=$id";
$select = mysqli_query($koneksi, $selectID) or die(mysqli_error($koneksi));
$data = mysqli_fetch_assoc($select);
?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">ubah data sejarah</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">tentang</li>
            <li class="breadcrumb-item active">ubah data sejarah</li>
        </ol>
        <form action="<?= BASE_URL . 'aksi/tentang/ubah_info_sejarah.php' ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <div class="form-group mb-3">
                <label for="">gambar sejarah</label> <br>
                <img id="gambarSejarah" width="100" height="100" class="rounded"> <br>
                <input type="file" name="gambar_sejarah" class="form-control" onchange="gambarSejarahDipilih(event)">
            </div>
            <div class="form-group mb-3">
                <label for="">sejarah</label> <br>
                <textarea name="sejarah" class="buatText form-control" cols="30" rows="5"><?= $data['sejarah'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i>ubahkan</button>
        </form>
    </div>
</main>

<script>
    // kondisi pertama pada saat halaman di load, tampilkan gambar di tag <img> dengan data gambar pada database
    // panggil id gambar dari tag <img>, ini untuk menampilkan gambarnya
    const gambarSejarah = document.getElementById('gambarSejarah');
    
    gambarSejarah.src = "<?= BASE_URL . 'images/tentang/' . $data['gambar_sejarah'] ?>";
    // #####---------

    // function untuk menampilkan gambar pada saat setelah di pilih dari galery

    function gambarSejarahDipilih(event) {
        // ambil data eventnya
        const eventGambar = event.target.files;
        // kemudian tambahkan attribut src nya seperti <img src="link disini dari javacript">
        // atur src dengan nama file yang ada di filegambar[0]
        gambarSejarah.src = URL.createObjectURL(eventGambar[0]);
        // // kemudian  
        gambarSejarah.style.display = "block";
    }
</script>

<script>
    // jquery 
    // jika jquery sudah ready maka
    $(document).ready(function() {
        //lakukan sesuatu disini
        $('.buatText').summernote();
    });
</script>

<?php include "../../includes/footer.php";
