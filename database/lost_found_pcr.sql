-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2026 at 02:44 PM
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
  `status_laporan` enum('aktif','selesai','baak') DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `id_user`, `id_kategori`, `jenis_laporan`, `nama_barang`, `deskripsi`, `foto_barang`, `lokasi`, `tanggal_kejadian`, `status_laporan`, `created_at`) VALUES
(21, 23, 1, 'kehilangan', 'Headset Bluetooth', 'Headset hilang setelah praktikum di labor komputer.', 'bpw.jpg', 'Lab Komputer 2', '2026-06-10', 'aktif', '2026-07-03 06:05:37'),
(22, 24, 2, 'kehilangan', 'Kartu Identitas PCR', 'Kartu mahasiswa hilang saat perjalanan ke kampus.', 'spotify-card (1).png', 'Gedung A', '2026-06-11', 'selesai', '2026-07-03 06:05:37'),
(23, 25, 5, 'penemuan', 'Tas Hitam', 'Menemukan tas hitam di kantin PCR.', 'download (10).jpg', 'Kantin PCR', '2026-06-12', 'baak', '2026-07-03 06:05:37'),
(24, 26, 6, 'kehilangan', 'Kunci Motor Honda', 'Kunci motor hilang di area parkir.', 'Honda-BeAT-FI-Black.jpg', 'Parkiran Gedung B', '2026-06-13', 'aktif', '2026-07-03 06:05:37'),
(26, 28, 7, 'kehilangan', 'Modul Praktikum Basis Data', 'Modul praktikum tertinggal setelah kelas selesai.', 'bpw.jpg', 'Ruang ICT-304', '2026-06-15', 'aktif', '2026-07-03 06:05:37'),
(27, 29, 3, 'kehilangan', 'Mouse Wireless', 'Mouse wireless warna hitam hilang.', 'dkjlh.png', 'Perpustakaan', '2026-06-16', 'selesai', '2026-07-03 06:05:37'),
(28, 30, 4, 'penemuan', 'Jaket Hitam', 'Jaket ditemukan di depan Auditorium.', 'tl.webp', 'Auditorium', '2026-06-17', 'baak', '2026-07-03 06:05:37'),
(29, 31, 2, 'kehilangan', 'Flashdisk 32GB', 'Flashdisk berisi tugas kuliah hilang.', 'logo.png', 'Lab Jaringan', '2026-06-18', 'aktif', '2026-07-03 06:05:37'),
(30, 32, 8, 'penemuan', 'Boneka Ikan', 'Boneka kecil ditemukan di taman kampus.', 'ikan.png', 'Taman PCR', '2026-06-19', 'baak', '2026-07-03 06:05:37'),
(31, 23, 5, 'kehilangan', 'Tas Laptop ASUS', 'Tas laptop warna abu-abu hilang.', 'download (10).jpg', 'Perpustakaan', '2026-06-20', 'aktif', '2026-07-03 06:05:37'),
(32, 24, 6, 'penemuan', 'Kunci Kos', 'Menemukan satu set kunci kos.', 'Honda-BeAT-FI-Black.jpg', 'Lobby Gedung C', '2026-06-21', 'aktif', '2026-07-03 06:05:37'),
(33, 25, 1, 'kehilangan', 'Laptop ASUS Vivobook', 'Laptop tertinggal setelah presentasi.', 'bpw.jpg', 'ICT-304', '2026-06-22', 'selesai', '2026-07-03 06:05:37'),
(34, 26, 2, 'penemuan', 'KTM PCR', 'Menemukan KTM di area parkir.', 'logo_pcr.png', 'Parkiran PCR', '2026-06-23', 'aktif', '2026-07-03 06:05:37'),
(35, 27, 3, 'kehilangan', 'Jam Tangan Casio', 'Jam tangan hilang saat olahraga.', 'tl.webp', 'Lapangan PCR', '2026-06-24', 'aktif', '2026-07-03 06:05:37'),
(36, 28, 4, 'penemuan', 'Jaket Hoodie Abu', 'Jaket ditemukan di ruang kelas.', 'dkjlh.png', 'Ruang DYH-305', '2026-06-25', 'baak', '2026-07-03 06:05:37'),
(37, 29, 7, 'kehilangan', 'Buku Organisasi Komputer', 'Buku hilang setelah perkuliahan.', 'bpw.jpg', 'Perpustakaan', '2026-06-26', 'aktif', '2026-07-03 06:05:37'),
(38, 30, 8, 'penemuan', 'Power Bank Xiaomi', 'Power bank ditemukan di kantin.', 'spotify-card (1).png', 'Kantin PCR', '2026-06-27', 'baak', '2026-07-03 06:05:37'),
(39, 31, 5, 'kehilangan', 'Tas Selempang', 'Tas kecil warna coklat hilang.', 'download (10).jpg', 'Gedung B', '2026-06-28', 'aktif', '2026-07-03 06:05:37'),
(41, 33, 1, 'kehilangan', 'topi', 'topi hitam', '9b6605dd.jpg', 'parkiran gsg', '2026-07-01', 'aktif', '2026-07-03 06:08:34');

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
(1, 'ADMIN', 'admin cico', 'admin@pcr.ac.id', '$2y$10$vUAuJfqrZzi13.F.9wE7c.B1dPYOKXmCrD82D3XEgnjpiCZqs8osW', 'admin', '2026-07-03 06:00:46'),
(23, '2255301011', 'Muhammad Rizky Pratama', 'rizky22ti@mahasiswa.pcr.ac.id', '$2y$10$XGJesmuZwhKQ0XJq2LkKoups6nDpKzuvqMDah69Qa70YBzH.H36lO', 'admin', '2026-07-03 05:38:24'),
(24, '2255401012', 'Dinda Aulia Putri', 'dinda22si@mahasiswa.pcr.ac.id', '$2y$10$XGJesmuZwhKQ0XJq2LkKoups6nDpKzuvqMDah69Qa70YBzH.H36lO', 'mahasiswa', '2026-07-03 05:38:24'),
(25, '2355301013', 'Fajar Ramadhan', 'fajar23ti@mahasiswa.pcr.ac.id', '$2y$10$XGJesmuZwhKQ0XJq2LkKoups6nDpKzuvqMDah69Qa70YBzH.H36lO', 'mahasiswa', '2026-07-03 05:38:24'),
(26, '2355501014', 'Nabila Safitri', 'nabila23trk@mahasiswa.pcr.ac.id', '$2y$10$XGJesmuZwhKQ0XJq2LkKoups6nDpKzuvqMDah69Qa70YBzH.H36lO', 'mahasiswa', '2026-07-03 05:38:24'),
(27, '2455301015', 'Rafi Maulana', 'rafi24ti@mahasiswa.pcr.ac.id', '$2y$10$XGJesmuZwhKQ0XJq2LkKoups6nDpKzuvqMDah69Qa70YBzH.H36lO', 'mahasiswa', '2026-07-03 05:38:24'),
(28, '2455601016', 'Salsa Maharani', 'salsa24bd@mahasiswa.pcr.ac.id', '$2y$10$XGJesmuZwhKQ0XJq2LkKoups6nDpKzuvqMDah69Qa70YBzH.H36lO', 'mahasiswa', '2026-07-03 05:38:24'),
(29, '2555301017', 'Iqbal Saputra', 'iqbal25ti@mahasiswa.pcr.ac.id', '$2y$10$XGJesmuZwhKQ0XJq2LkKoups6nDpKzuvqMDah69Qa70YBzH.H36lO', 'mahasiswa', '2026-07-03 05:38:24'),
(30, '2555401018', 'Nadya Khairunnisa', 'nadya25si@mahasiswa.pcr.ac.id', '$2y$10$XGJesmuZwhKQ0XJq2LkKoups6nDpKzuvqMDah69Qa70YBzH.H36lO', 'mahasiswa', '2026-07-03 05:38:24'),
(31, '2555501019', 'Kevin Christian', 'kevin25trk@mahasiswa.pcr.ac.id', '$2y$10$XGJesmuZwhKQ0XJq2LkKoups6nDpKzuvqMDah69Qa70YBzH.H36lO', 'mahasiswa', '2026-07-03 05:38:24'),
(32, '2555701020', 'Aisyah Nurhaliza', 'aisyah25tet@mahasiswa.pcr.ac.id', '$2y$10$XGJesmuZwhKQ0XJq2LkKoups6nDpKzuvqMDah69Qa70YBzH.H36lO', 'mahasiswa', '2026-07-03 05:38:24'),
(33, '2555301014', 'dzakwan', 'firqo25ti@mahasiswa.pcr.ac.id', '$2y$10$hRlDBSqtIF6SYIWYd7BnP.JikSdjx17jAh4TOn2KTymO8WujjYZT.', 'mahasiswa', '2026-07-03 06:07:25');

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
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
