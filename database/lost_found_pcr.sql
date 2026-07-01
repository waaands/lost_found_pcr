-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2026 at 05:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lost_found_pcr`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Elektronik'),
(2, 'Dokumen'),
(3, 'Aksesoris'),
(4, 'Pakaian'),
(5, 'Tas'),
(6, 'Kunci'),
(7, 'Peralatan Kuliah'),
(8, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_laporan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `isi_komentar` text NOT NULL,
  `foto_bukti` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_laporan`, `id_user`, `isi_komentar`, `foto_bukti`, `created_at`) VALUES
(1, 2, 5, '        hi', NULL, '2026-06-16 06:16:38'),
(2, 4, 5, 'ini?', 'ikan.png', '2026-06-23 15:13:36'),
(3, 5, 6, 'di baak bg', '', '2026-06-24 05:10:27'),
(4, 4, 5, 'hi', '', '2026-06-26 02:50:45'),
(5, 4, 5, 'hayo', 'ikan.png', '2026-06-26 02:51:00'),
(6, 9, 5, 'hi', '', '2026-06-29 08:51:37'),
(7, 9, 5, 'ho', '', '2026-06-29 09:27:15'),
(8, 9, 5, 'tes', '', '2026-06-29 11:41:33'),
(9, 9, 5, 'tes', '', '2026-06-29 11:41:34'),
(10, 9, 5, 'tus', '', '2026-06-29 11:42:02');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `jenis_laporan` enum('kehilangan','penemuan') NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto_barang` varchar(255) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `tanggal_kejadian` date NOT NULL,
  `status_barang` enum('dipegang_sendiri','dititip_baak') DEFAULT 'dipegang_sendiri',
  `status_laporan` enum('aktif','selesai') DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `id_user`, `id_kategori`, `jenis_laporan`, `nama_barang`, `deskripsi`, `foto_barang`, `lokasi`, `tanggal_kejadian`, `status_barang`, `status_laporan`, `created_at`) VALUES
(2, 5, 2, 'penemuan', 'laprak', '                    ini ikan', 'dkjlh.png', 'gsg', '2026-06-16', 'dipegang_sendiri', 'aktif', '2026-06-16 06:07:43'),
(4, 6, 1, 'kehilangan', 'tes anu', 'anu', 'ikan.png', 'gsg', '2026-06-03', 'dipegang_sendiri', 'aktif', '2026-06-23 13:57:17'),
(5, 5, 5, 'penemuan', 'tas', '                    tas hilang warna hitam', 'bas.jpg', 'amphi', '2026-06-24', 'dipegang_sendiri', 'selesai', '2026-06-24 05:09:25'),
(8, 5, 1, 'kehilangan', 'laprak', '                    ddd', 'logo.png', 'gsg', '2026-06-29', 'dipegang_sendiri', 'aktif', '2026-06-28 23:43:38'),
(9, 5, 1, 'kehilangan', 'buku', '                    buku', 'Honda-BeAT-FI-Black.jpg', 'masjid', '2026-06-05', 'dipegang_sendiri', 'aktif', '2026-06-29 01:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `serah_terima`
--

CREATE TABLE `serah_terima` (
  `id_serah_terima` int(11) NOT NULL,
  `id_laporan` int(11) NOT NULL,
  `id_user_konfirmasi` int(11) NOT NULL,
  `foto_bukti` varchar(255) NOT NULL,
  `catatan` text DEFAULT NULL,
  `tanggal_konfirmasi` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('mahasiswa','admin') NOT NULL DEFAULT 'mahasiswa',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nim`, `nama_lengkap`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'ADMIN001', 'Admin BAAK', 'admin@pcr.ac.id', 'admin123', 'admin', '2026-06-16 03:40:40'),
(2, '2355201010', 'Budi Santoso', 'budi@mahasiswa.pcr.ac.id', '123456', 'mahasiswa', '2026-06-16 03:41:12'),
(3, '2355201011', 'Siti Rahma', 'rahma@mahasiswa.pcr.ac.id', '123456', 'mahasiswa', '2026-06-16 03:41:12'),
(4, '2355201012', 'Andi Pratama', 'andi@mahasiswa.pcr.ac.id', '123456', 'mahasiswa', '2026-06-16 03:41:12'),
(5, '2555301014', 'ahmad firqo dzakwan', 'firqo25ti@mahasiswa.pcr.ac.id', '12345678', 'mahasiswa', '2026-06-16 04:32:22'),
(6, '2555301015', 'anu', 'anu@mahasiswa.pcr.ac.id', '12345678', 'mahasiswa', '2026-06-16 06:18:08'),
(7, '2555301016', 'cicoco', 'cicoco@mahasiswa.pcr.ac.id', '12345678', 'mahasiswa', '2026-06-28 06:33:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `fk_komentar_laporan` (`id_laporan`),
  ADD KEY `fk_komentar_user` (`id_user`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `fk_laporan_user` (`id_user`),
  ADD KEY `fk_laporan_kategori` (`id_kategori`);

--
-- Indexes for table `serah_terima`
--
ALTER TABLE `serah_terima`
  ADD PRIMARY KEY (`id_serah_terima`),
  ADD UNIQUE KEY `id_laporan` (`id_laporan`),
  ADD KEY `fk_serah_user` (`id_user_konfirmasi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `serah_terima`
--
ALTER TABLE `serah_terima`
  MODIFY `id_serah_terima` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `fk_komentar_laporan` FOREIGN KEY (`id_laporan`) REFERENCES `laporan` (`id_laporan`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_komentar_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `fk_laporan_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_laporan_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `serah_terima`
--
ALTER TABLE `serah_terima`
  ADD CONSTRAINT `fk_serah_laporan` FOREIGN KEY (`id_laporan`) REFERENCES `laporan` (`id_laporan`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_serah_user` FOREIGN KEY (`id_user_konfirmasi`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
