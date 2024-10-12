<?php
// Query Produk Berdasarkan kategori
// Ambil queri buku
$listbook = query("SELECT * FROM buku ");

?>
<section class="continer-fluid">
    <div class="container p-5">
        <div class="row">
            <?php $i = 1; ?>
            <?php foreach ($listbook as $listbuku): ?>
                <div class="bg-primary p-3 text-white mx-auto rounded-3 mt-2">
                    <div class="row">
                        <div class="col-1">
                            <p class="fs-4"><?= $i ?></p>
                        </div>
                        <div class="col-1">
                            <img src="./img/<?= $listbuku['gambar_buku']; ?>" alt="" width="30" height="40">
                        </div>
                        <div class="col-sm-7">
                            <p class="fs-4"><?= $listbuku['nama_buku']; ?></p>
                        </div>
                        <div class="col-auto">
                            <p class="text-center p-2"><a href="ubahbuku.php?id_buku=<?= $listbuku["id_buku"]; ?>" class="text-white" style="text-decoration:none;">Ubah Buku</a></p>
                        </div>
                        <div class="col-auto">
                            <p class="text-center p-2"><a href="hapusbuku.php?id_buku=<?= $listbuku["id_buku"]; ?>" onclick="return confirm('Anda yakin ingin menghapus Buku ini ?')" class="text-white" style="text-decoration: none;">Hapus Buku</a></p>
                        </div>
                    </div>
                </div>
                <?php $i++ ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>