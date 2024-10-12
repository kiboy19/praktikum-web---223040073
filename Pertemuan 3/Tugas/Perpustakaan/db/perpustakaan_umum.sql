-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 12, 2024 at 08:25 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan_umum`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `email`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `password`, `role`) VALUES
(1, 'arielseptiadi', 'arielseptiadi3@gmail.com', 'Muhamad Ariel Septiadi', 'L', '2000-03-19', '$2y$10$kfj3.9e7QGMfaYBM3PpvgullAoROEmalczoJhgIdDn8L3eogjI54O', 'admin'),
(2, 'kiboy19', 'kingboying19@gmail.com', 'Muhamad Ariel Septiadi', 'L', '2000-03-19', '$2y$10$gpm1Qu59qGyVUZfWKR7sq.z2eKVZ7VswoMnvd98nF5rvpY5Y/L.QC', 'user'),
(3, 'yulisputri', 'yulisramadhani0106@gmail.com', 'Yulis Ramadhani Putri', 'P', '2003-11-03', '$2y$10$9.AmErJEXP0Layt3myAvJ.OZR2n1vPGdDNIMHOMB4erbb3zwH1cry', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int NOT NULL,
  `gambar_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terbit` year NOT NULL,
  `penulis` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `gambar_buku`, `nama_buku`, `terbit`, `penulis`, `stock`, `deskripsi`) VALUES
(6, '67093b5999aae.jpg', 'Buku Dasar-Dasar Teknik Informatika', '2020', 'Novega Pratama Adiputra', 200, 'Ilmu pengetahuan dan teknologi terus berkembang, bahkan dewasa ini berlangsung dengan pesat. Perkembangan itu bukan hanya dalam hitungan tahun, bulan, atau hari, melainkan jam bahkan menit atau detik, terutama berkaitan dengan teknologi informasi dan komunikasi yang ditunjang dengan teknologi elektronika.'),
(7, '67093c222c530.jpg', 'Buku Komputer Cerdas Untuk Mahasiswa Teknik Informatika', '2017', 'Nur Nafi’iyah', 200, 'Kecerdasan buatan merupakan mata kuliah wajib yang harus diajarkan di program studi Teknik Informatika di UNISLA semester 5. Mata kuliah kecerdasan buatan merupakan mata kuliah yang menganjarkan komputer menjadi cerdas.'),
(8, '67093d145798e.jpg', 'Buku Pengantar Teknologi Informasi – Teknik Informatika', '2017', 'Buhori Muslim', 200, 'Pengantar Teknologi Informasi ini hampir bisa di katakan sebagai Mata Kuliah Pembuka untuk mata kuliah yang lain, seperti: Organisasi Komputer, Arsitektur Komputer, Maintenance, Sistem operasi, Keamanan, Internet, jaringan dan lain-lain'),
(9, '67093d8e20889.jpg', 'Buku Pengantar Teknologi Informatika Dan Komunikasi Data', '2019', 'Bagaskoro, S.Kom., M.M.', 200, 'Buku ini menulis sejarah teknologi informatika dari sejak zaman prasejarah bagaimana manusia zaman dulu saling berbagi informasi hingga masa kini.');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int NOT NULL,
  `id_buku` int DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `durasi_pinjam` int NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `status` enum('dipinjam','dikembalikan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'dipinjam'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idx_username` (`username`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `idx_buku` (`nama_buku`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `idx_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `akun` (`id_akun`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
