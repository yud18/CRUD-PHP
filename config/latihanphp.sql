-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 11 Agu 2024 pada 09.36
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihanphp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `barcode` varchar(15) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `jumlah`, `harga`, `barcode`, `tanggal`) VALUES
(23, 'Headset Gaming', '1', '10000', '799894', '2024-08-09 10:41:46'),
(24, 'Mouse', '1', '50000', '642927', '2024-08-11 11:57:43'),
(25, 'Alas Mouse  ', '10', '100000', '967329', '2024-08-11 14:21:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama`, `prodi`, `jk`, `telepon`, `alamat`, `email`, `foto`) VALUES
(9, 'Yuda Prasetia', 'Teknik Informatika', 'Laki-Laki', '081274249068', '<p><strong>TES TES </strong><em>HALO HALO</em></p>\r\n', 'auliajuwitaputri.11@gmail.com', '66b59c6d32e7d.jpg'),
(10, 'Aulia   ', 'Teknik Komputer', 'Perempuan', '081274249068', '<p>YA BENAR L</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/images/WhatsApp%20Image%202024-07-31%20at%2001_53_44.jpeg\" style=\"height:100px; width:100px\" />​​​​​​​</p>\r\n', 'auliajuwitaputri.11@gmail.com', '66b66043074bc.jpeg'),
(11, 'Riza', 'Sistem Informasi', 'Perempuan', '081293121231', '<p><strong>BAGUS <em>AJA</em></strong></p>\r\n', 'riza@gmail.com', '66b86a6b65336.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `modal`
--

CREATE TABLE `modal` (
  `no` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `modal`
--

INSERT INTO `modal` (`no`, `nama`, `username`, `email`, `password`, `level`) VALUES
(7, 'mahasiswa', 'mahasiswa', 'mahasiswa@gmail.com', '$2y$10$rpzVLHJecViM3GV7oTdMAudCOEzreK274Zx9WqenuPczpNgI8oJq.', '3'),
(8, 'admin', 'admin', 'admin@admin.com', '$2y$10$0aJTV0wOBnLC3E8yIU9/4uaNvv7ijrt5xGs8uLkXEN.W77vuy0U36', '1'),
(9, 'operator', 'operator', 'operator@gmail.com', '$2y$10$Cwqv9TRra2pcss1tjiLAUuOaIzanLw2g7ji6FryBKcumvEzqsJMAS', '2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indeks untuk tabel `modal`
--
ALTER TABLE `modal`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `modal`
--
ALTER TABLE `modal`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
