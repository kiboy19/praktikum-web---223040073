<?php

class Produk
{
    public $judul = "Judul1",
        $penulis = "penulis",
        $penerbit = "penerbit",
        $harga = 0;

    public function getLabel()
    {
        return "$this->penulis, $this->penerbit";
    }
}

// $produk1 = new Produk();
// $produk1->judul = "Naruto";
// var_dump($produk1);
// $produk2 = new Produk();
// $produk2->judul = "Uncharted";
// var_dump($produk2->judul);


$produk3 = new Produk();
$produk3->judul = "Naruto";
$produk3->penulis = "Masashi Kisimoto";
$produk3->penerbit = "ShonenJump";
$produk3->harga = "15000";

$produk4 = new Produk();
$produk4->judul = "Uncharted";
$produk4->penulis = "Neil Druckmann";
$produk4->penerbit = "Sony Computer";
$produk4->harga = "250000";

echo "Komik: " . $produk3->getLabel();
echo "<hr>";
echo "Game: " . $produk4->getLabel();
