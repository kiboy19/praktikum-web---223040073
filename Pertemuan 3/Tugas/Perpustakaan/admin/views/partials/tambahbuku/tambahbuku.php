<div class="container-fluid">
    <div class="container mt-5 p-3">
        <div class="rounded-3 p-3 bg-primary mx-auto w-75">
            <h2 class="text-center text-white">Tambah Buku</h2>
            <div class="p-2">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="gambar_buku" class="form-label">Gambar Buku</label>
                        <input type="file" class="form-control" id="gambar_buku" name="gambar_buku" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_buku" class="form-label text-white">Nama Buku</label>
                        <input type="text" class="form-control" id="nama_buku" name="nama_buku" required>
                    </div>
                    <div class="mb-3">
                        <label for="terbit" class="form-label text-white">Tahun Terbit</label>
                        <input type="number" class="form-control" id="terbit" name="terbit" min="1000" max="9999" required>
                    </div>
                    <div class="mb-3">
                        <label for="penulis" class="form-label text-white">Penulis</label>
                        <input type="text" class="form-control" id="penulis" name="penulis" required>
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label text-white">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" required min="0">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label text-white">Deskripsi Buku</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
                    </div>
                    <div class="d-grid gap-2 w-25 mx-auto rounded-3">
                        <button type="submit" name="submit" class="btn btn-success">Tambah Buku</button>
                    </div>
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    include '../koneksi.php';

                    $gambar_buku = uploadImage();
                    if ($gambar_buku === false) {
                        // Jika upload gambar gagal, berhenti dan tidak lanjut insert ke database
                        exit;
                    }

                    $nama_buku = htmlspecialchars($_POST['nama_buku']);
                    $terbit = htmlspecialchars($_POST['terbit']);
                    $penulis = htmlspecialchars($_POST['penulis']);
                    $stock = htmlspecialchars($_POST['stock']);
                    $deskripsi = htmlspecialchars($_POST['deskripsi']);

                    $sql = "INSERT INTO `buku`(`gambar_buku`, `nama_buku`, `terbit`, `penulis`, `stock`, `deskripsi`) VALUES ('$gambar_buku', '$nama_buku', '$terbit', '$penulis', '$stock', '$deskripsi')";

                    if (mysqli_query($conn, $sql)) {
                        // Set pesan ke dalam variabel sesi atau gunakan echo setelah redirect
                        echo '<script>alert("Berhasil Menambahkan Buku")</script>';
                        // Redirect setelah penambahan buku berhasil
                        header("Location: kelolabuku.php");
                        exit;
                    } else {
                        echo '<script>alert("Menambahkan produk gagal");</script>';
                    }
                }
                ?>


            </div>
        </div>
    </div>
</div>