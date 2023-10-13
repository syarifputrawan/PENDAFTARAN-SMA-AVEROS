<?php include "../../includes/header.php";

    // session_start();
    //jika tidak ada data nim di urlnya maka pindah ke halaman index dengan pesan eror
    if (!isset($_GET['id'])) {
        $_SESSION['status'] = 400;
        $_SESSION['message']="tidak ada testimoni tidak valid";
        header('location:index.php');
    }
    include "../../includes/koneksi.php";
    $id = $_GET['id'];
    $selectNIM = "SELECT * FROM testimoni WHERE id=$id";
    $select = mysqli_query($koneksi, $selectNIM) or die(mysqli_error($koneksi));
    $data = mysqli_fetch_assoc($select);
?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">ubah data testimoni</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">testimoni</li>
            <li class="breadcrumb-item active">ubah data testimoni</li>
        </ol>
        <form action="<?= BASE_URL . 'aksi/testimoni/ubah.php'?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="form-group mb-3">
                <label for="">nama</label>
                <input type="text" name="nama" class="form-control" value="<?= $data['nama']?>">
            </div>
            <div class="form-group mb-3">
                <label for="">asal</label>
                <input type="text" name="asal" class="form-control" value="<?= $data['asal']?>">
            </div>
            <div class="form-group mb-3">
                <label for="">pesan</label>
                <input type="text" name="pesan" class="form-control" value="<?= $data['pesan']?>">
            </div>
            <div class="form-group mb-3">
                <label for="">pass foto</label> <br>
                <img id="tampilGambarDipilih" width="100" height="100" class="rounded"> <br>
                <input type="file" name="pass_foto" class="form-control" onchange="GambarYgDipilih(event)">
            </div>
            <button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i>ubahkan</button>
        </form>
    </div>
</main>

<script>
        // kondisi pertama pada saat halaman di load, tampilkan gambar di tag <img> dengan data gambar pada database
        // panggil id gambar dari tag <img>, ini untuk menampilkan gambarnya
        const tampilkanGambar = document.getElementById('tampilGambarDipilih');
        tampilkanGambar.src = "<?= BASE_URL . 'images/testimoni/' . $data['pass_foto']?>";
        // #####---------

        // function untuk menampilkan gambar pada saat setelah di pilih dari galery
        function GambarYgDipilih(event){
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