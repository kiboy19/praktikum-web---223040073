<?php

class Produk
{
    // Property
    public $judul,
        $penulis,
        $penerbit,
        $harga;

    // Constructor Method
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    // Fungsi Mengembalikan Nilai dari Contructor
    public function getLabel()
    {
        return "$this->penulis, $this->penerbit";
    }
}


$produk1 = new Produk("Naruto", "Masashi Kisimoto", "ShonenJump", 15000);
$produk2 = new Produk("Uncharted", "Neil Druckman", "Sony Computer", 250000);

echo "Komik: " . $produk1->getLabel();
echo "<hr>";
echo "Game: " . $produk2->getLabel();
