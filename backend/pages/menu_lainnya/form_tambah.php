<?php include "../../includes/header.php"?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">data menu lainnya</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">menu lainnya</li>
            <li class="breadcrumb-item active">tambah data menu lainnya</li>
        </ol>
        <form action="<?= BASE_URL . 'aksi/menu_lainnya/tambah.php'?>" method="post" enctype="multipart/form-data">
            <div class="form-group mb-3">
                <label for="">gambar</label>
                <!-- image viewer menggunakan js  -->
                <img alt="gambar" id="tampilGambarDipilih" width="100" height="100" class="rounded">
                <input type="file" name="gambar" class="form-control" onchange="GambarYgDipilih(event)">
            </div>
            <div class="form-group mb-3">
                <label for="">judul</label>
                <input type="text" name="judul" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">link url</label>
                <input type="text" name="link_url" class="form-control">
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
