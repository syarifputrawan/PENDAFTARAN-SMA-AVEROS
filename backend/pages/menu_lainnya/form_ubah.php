<?php include "../../includes/header.php";

    // session_start();
    //jika tidak ada data nim di urlnya maka pindah ke halaman index dengan pesan eror
    if (!isset($_GET['id'])) {
        $_SESSION['status'] = 400;
        $_SESSION['message']="tidak ada gambar tidak valid";
        header('location:index.php');
    }
    include "../../includes/koneksi.php";
    $id = $_GET['id'];
    $selectNIM = "SELECT * FROM menu_lainnya WHERE id=$id";
    $select = mysqli_query($koneksi, $selectNIM) or die(mysqli_error($koneksi));
    $data = mysqli_fetch_assoc($select);
?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">ubah data menu lainnya</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">menu lainnya</li>
            <li class="breadcrumb-item active">ubah data menu lainnya</li>
        </ol>
        <form action="<?= BASE_URL . 'aksi/menu_lainnya/ubah.php'?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id ?>">
            <div class="form-group mb-3">
                <label for="">gambar</label> <br>
                <img id="tampilGambarDipilih" width="100" height="100" class="rounded"> <br>
                <input type="file" name="gambar" class="form-control" onchange="GambarYgDipilih(event)">
            </div>
            <div class="form-group mb-3">
                <label for="">judul</label>
                <input type="text" name="judul" class="form-control" value="<?= $data['judul']?>">
            </div>
            <div class="form-group mb-3">
                <label for="">link url</label>
                <input type="text" name="link_url" class="form-control" value="<?= $data['link_url']?>">
            </div>

            <button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i>ubahkan</button>
        </form>
    </div>
</main>

<script>
        // kondisi pertama pada saat halaman di load, tampilkan gambar di tag <img> dengan data gambar pada database
        // panggil id gambar dari tag <img>, ini untuk menampilkan gambarnya
        const tampilkanGambar = document.getElementById('tampilGambarDipilih');
        tampilkanGambar.src = "<?= BASE_URL . 'images/menu_lainnya/' . $data['gambar']?>";
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