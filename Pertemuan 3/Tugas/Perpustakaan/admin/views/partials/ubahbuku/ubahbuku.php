<?php
$id_buku = $_GET["id_buku"];

// Querry berdasarkan id

$buku = query("SELECT * FROM buku WHERE id_buku = $id_buku")[0];


// Cek apakah tombol submit sudah ditekan atau belum ?
if (isset($_POST["submit"])) {

    // cek apakah data berhasil diubah atau tidak
    if (ubahbuku($_POST) > 0) {
        echo "
    <script>
    alert('data berhasil diubah!');
    document.location.href= 'kelolabuku.php';
    </script>
    ";
    } else {
        echo "
    <script>
    alert('data gagal diubah');
    document.location.href = 'kelolabuku.php';
    </script>
    ";
    }
}

?>
<div class="container-fluid">
    <div class="container mt-5 p-3">
        <div class="rounded-3 p-3 bg-primary mx-auto w-75">
            <h2 class="text-center text-white">Ubah Buku</h2>
            <div class="p-2">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_buku" value="<?= $buku["id_buku"]; ?>">
                    <input type="hidden" name="gambarLama" value="<?= $buku["gambar_buku"]; ?>">
                    <div class="mb-3">
                        <label for="gambar_buku" class="form-label">Gambar Buku</label>
                        <input type="file" class="form-control" id="gambar_buku" name="gambar_buku" autofocus autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="nama_buku" class="form-label text-white">Nama Buku</label>
                        <input type="text" class="form-control" id="nama_buku" name="nama_buku" value="<?= $buku["nama_buku"]; ?>" autocomplete="off" required />
                    </div>
                    <div class="mb-3">
                        <label for="terbit" class="form-label text-white">Tahun Terbit</label>
                        <input type="number" class="form-control" id="terbit" name="terbit" min="1000" max="9999" value="<?= $buku["terbit"]; ?>" autocomplete="off" required />
                    </div>
                    <div class="mb-3">
                        <label for="penulis" class="form-label text-white">Penulis</label>
                        <input type="text" class="form-control" id="penulis" name="penulis" value="<?= $buku["penulis"]; ?>" autocomplete="off" required />
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label text-white">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" min="0" value="<?= $buku["stock"]; ?>" autocomplete="off" required />
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label text-white">Deskripsi Buku</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required><?= $buku["deskripsi"]; ?></textarea>
                    </div>
                    <div class="d-grid gap-2 w-25 mx-auto rounded-3">
                        <button type="submit" name="submit" class="btn btn-success">Tambah Buku</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>