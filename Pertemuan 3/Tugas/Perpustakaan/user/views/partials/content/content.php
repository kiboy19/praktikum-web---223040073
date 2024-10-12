<?php
// Query Produk Berdasarkan kategori
// Ambil queri buku
$listbook = query("SELECT * FROM buku ");
?>
<div class="container-fluid">
    <div class="container p-5">
        <div class="row">
            <?php foreach ($listbook as $listbuku): ?>
                <div class="col m-2">
                    <div class="card mx-auto" style="width: 18rem;">
                        <img src="../img/<?= $listbuku['gambar_buku']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $listbuku['nama_buku']; ?></h5>
                            <p class="card-text"><?= $listbuku['deskripsi']; ?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Terbit: </b><?= $listbuku['terbit']; ?></li>
                            <li class="list-group-item"><b>Penulis: </b><?= $listbuku['penulis']; ?></li>
                            <li class="list-group-item"><b>Stock: </b><?= $listbuku['stock']; ?></li>
                        </ul>
                        <div class="card-body mx-auto">
                            <a href="#" class="btn btn-primary">Pinjam</a>
                            <a href="#" class="btn btn-primary">Beli</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>