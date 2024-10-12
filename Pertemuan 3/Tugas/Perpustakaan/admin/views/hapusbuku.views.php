<?php
require('../koneksi.php');

// Hapus data kesehatan
$id_buku = $_GET["id_buku"];

if (hapus($id_buku) > 0) {
    echo "
      <script>
          alert('data berhasil dihapus!');
          document.location = 'kelolabuku.php';
      </script>
  ";
} else {
    echo "
      <script>
          alert('data gagal dihapus!');
          document.location = 'kelolabuku.php';
      </script>
  ";
}
