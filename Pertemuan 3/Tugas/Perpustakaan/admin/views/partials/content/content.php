<?php
// Query Produk Berdasarkan kategori
// Ambil queri buku
$listbook = query("SELECT * FROM buku ");
?>
<!-- Container -->
<section class="container-fluid mb-5">
    <div class="container">
        <div class="rak mt-5">
            <h2 class="text-center">Daftar Buku Tersedia</h2>
            <div class="row justify-content-center">
                <?php foreach ($listbook as $listbuku): ?>
                    <div class="col m-2">
                        <div class="card mx-auto" style="width: 18rem;">
                            <img src="../img/<?= $listbuku['gambar_buku']; ?>" class="card-img-top" alt="Buku Java Referensi Lengkap Untuk Programmer">
                            <div class="card-body">
                                <h5 class="card-title"><?= $listbuku['nama_buku']; ?></h5>
                                <p><b>Penulis:</b> <?= $listbuku['penulis']; ?></p>
                                <p><b>Terbit:</b> <?= $listbuku['terbit']; ?></p>
                                <p class="card-text"><?= $listbuku['deskripsi']; ?>.</p>
                                <a href="ubahbuku.php?id_buku=<?= $listbuku["id_buku"]; ?>" class="btn btn-primary">Ubah Buku</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>