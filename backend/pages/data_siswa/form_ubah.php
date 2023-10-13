<?php include "../../includes/header.php";
//jika tidak ada data nim di urlnya maka pindah ke halaman index dengan pesan eror
if (!isset($_GET['nisn'])) {
    $_SESSION['status'] = 400;
    $_SESSION['message'] = "tidak ada nisn tidak valid";
    header('location:index.php');
}
include "../../includes/koneksi.php";
$nisn1 = $_GET['nisn'];
$selectNISN = "SELECT * FROM daftar WHERE nisn=$nisn1";
$select = mysqli_query($koneksi, $selectNISN) or die(mysqli_error($koneksi));
$data = mysqli_fetch_assoc($select);
?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">ubah data peserta</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">peserta</li>
            <li class="breadcrumb-item active">ubah data peserta</li>
        </ol>
        <form action="<?= BASE_URL . 'aksi/siswa/ubah.php' ?>" method="post" enctype="multipart/form-data">
            <div class="form-group mb-3">
                <label for="">nisn</label>
                <input type="number" name="nisn" class="form-control" value="<?= $data['nisn'] ?>" readonly>
            </div>
            <div class="form-group mb-3">
                <label for="">nama</label>
                <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="">tempat lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" value="<?= $data['tempat_lahir'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="">tanggal lahir</label>
                <input type="text" name="tanggal_lahir" class="form-control" value="<?= $data['tanggal_lahir'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="">sekolah asal</label>
                <input type="text" name="sekolah_asal" class="form-control" value="<?= $data['sekolah_asal'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="">jurusan</label>
                <input type="text" name="jurusan" class="form-control" value="<?= $data['jurusan'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="">pass foto</label>
                <img id="tampilGambarDipilih" width="100" height="100" class="rounded">
                <input type="file" name="pass_foto" class="form-control" onchange="GambarYgDipilih(event)">
            </div>
            <div class="form-group mb-3">
                <label for="">jenis kelamin</label>
                <input type="text" name="jenis_kelamin" class="form-control" value="<?= $data['jenis_kelamin'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="">alamat</label>
                <input type="text" name="alamat" class="form-control" value="<?= $data['alamat'] ?>">
            </div>

            <button type="submit" class="btn btn-success"><i class="fas fa-check"></i>ubahkan</button>
        </form>
    </div>
</main>




<script>
    // kondisi pertama pada saat halaman di load, tampilkan gambar di tag <img> dengan data gambar pada database
    // panggil id gambar dari tag <img>, ini untuk menampilkan gambarnya
    const tampilkanGambar = document.getElementById('tampilGambarDipilih');
    tampilkanGambar.src = "<?= BASE_URL . 'images/' . $data['pass_foto'] ?>";
    // #####---------

    // function untuk menampilkan gambar pada saat setelah di pilih dari galery
    function GambarYgDipilih(event) {
        // ambil data eventnya
        const eventGambar = event.target.files;
        // kemudian tambahkan attribut src nya seperti <img src="link disini dari javacript">
        // atur src dengan nama file yang ada di filegambar[0]
        tampilkanGambar.src = URL.createObjectURL(eventGambar[0]);
        // // kemudian  
        tampilkanGambar.style.display = "block";
    }
</script>

<?php include "../../includes/footer.php";
