<?php include "../../includes/header.php" ?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">data peserta</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">peserta</li>
            <li class="breadcrumb-item active">tambah data peserta</li>
        </ol>
        <form action="<?= BASE_URL . 'aksi/siswa/tambah.php' ?>" method="post" enctype="multipart/form-data">
            <div class="form-group mb-3">
                <label for="">nisn</label>
                <input type="number" name="nisn" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">nama</label>
                <input type="text" name="nama" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">tempat lahir</label>
                <input type="text" name="tempat_lahir" class="form-control">
                <!-- <select name="tempat_lahir">
                    <option value="teknik informatika">teknik informatika</option>
                    <option value="teknik informasi">teknik informasi</option>
                    <option value="teknik elektro  ">teknik elektro</option>
                </select> -->
            </div>
            <div class="form-group mb-3">
                <label for="">tanggal lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">sekolah asal</label>
                <input type="text" name="sekolah_asal" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">jurusan</label>
                <input type="text" name="jurusan" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">pass foto</label>
                <img id="tampilGambarDipilih" width="100" height="100" class="rounded">
                <input type="file" name="pass_foto" class="form-control" onchange="GambarYgDipilih(event)">
            </div>
            <div class="form-group mb-3">
                <label for="">jenis kelamin</label>
                <input type="text" name="jenis_kelamin" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">alamat</label>
                <input type="text" name="alamat" class="form-control">
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
