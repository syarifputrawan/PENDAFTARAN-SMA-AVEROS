<?php include "../../includes/header.php"?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">data testimoni</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">testimoni</li>
            <li class="breadcrumb-item active">tambah data testimoni</li>
        </ol>
        <form action="<?= BASE_URL . 'aksi/testimoni/tambah.php'?>" method="post" enctype="multipart/form-data">
            <div class="form-group mb-3">
            <div class="form-group mb-3">
                <label for="">nama</label>
                <input type="text" name="nama" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">asal</label>
                <input type="text" name="asal" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">pesan</label>
                <input type="text" name="pesan" class="form-control">
            </div>
                <label for="">pass foto</label>
                <!-- image viewer menggunakan js  -->
                <img alt="gambar" id="tampilGambarDipilih" width="100" height="100" class="rounded">
                <input type="file" name="pass_foto" class="form-control" onchange="GambarYgDipilih(event)">
            </div>
            <button type="submit" class="btn btn-success"><i class="fas fa-check"></i>tambahkan</button>
        </form>
    </div>
</main>

<script>
        // kondisi pertama pada saat halaman di load, tampilkan gambar di tag <img> dengan data gambar pada database
        // panggil id gambar dari tag <img>, ini untuk menampilkan gambarnya
        const tampilkanGambar = document.getElementById('tampilGambarDipilih');
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
