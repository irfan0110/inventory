-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Jan 2019 pada 01.58
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id` int(11) NOT NULL,
  `no_transaksi` varchar(15) NOT NULL,
  `kode_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(191) NOT NULL,
  `jenis_barang` varchar(191) NOT NULL,
  `qty` int(11) NOT NULL,
  `lokasi` varchar(10) NOT NULL,
  `pallet_id` varchar(10) NOT NULL,
  `keterangan` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id`, `no_transaksi`, `kode_barang`, `nama_barang`, `jenis_barang`, `qty`, `lokasi`, `pallet_id`, `keterangan`, `created_at`, `updated_at`) VALUES
(10, '2801190001', 'J0001', 'Jam Lama', 'Jam Tangan', 20, 'AI-001-1', 'P000000001', 'Shipement Philippine', '2019-01-28 11:19:51', '2019-01-28 11:19:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id` int(11) NOT NULL,
  `no_transaksi` varchar(15) NOT NULL,
  `kode_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(191) NOT NULL,
  `jenis_barang` varchar(191) NOT NULL,
  `qty` int(11) NOT NULL,
  `supplier` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id`, `no_transaksi`, `kode_barang`, `nama_barang`, `jenis_barang`, `qty`, `supplier`, `created_at`, `updated_at`) VALUES
(21, '2801190001', 'J0001', 'Jam Lama', 'Jam Tangan', 200, 'PT. Supplier Baru', '2019-01-28 11:19:04', '2019-01-28 11:19:04'),
(22, '3001190001', 'T0001', 'TAS BARU', 'Tas', 125, 'PT. Kedua ', '2019-01-30 00:42:40', '2019-01-30 00:42:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `lokasi` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id`, `lokasi`, `created_at`, `updated_at`) VALUES
(1, 'AI-001-1', '2019-01-20 06:47:19', '2019-01-20 06:47:19'),
(2, 'AI-001A-1A', '2019-01-20 07:45:45', '2019-01-20 07:45:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapping`
--

CREATE TABLE `mapping` (
  `pallet_id` varchar(10) NOT NULL,
  `kode_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(191) NOT NULL,
  `jenis_barang` varchar(191) NOT NULL,
  `qty` int(11) NOT NULL,
  `lokasi` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapping`
--

INSERT INTO `mapping` (`pallet_id`, `kode_barang`, `nama_barang`, `jenis_barang`, `qty`, `lokasi`, `created_at`, `updated_at`) VALUES
('P000000001', 'J0001', 'Jam Lama', 'Jam Tangan', 180, 'AI-001-1', '2019-01-28 11:19:21', '2019-01-28 11:19:51'),
('P000000002', 'T0001', 'TAS BARU', 'Tas', 100, 'AI-001-1', '2019-01-30 00:43:01', '2019-01-30 00:43:01'),
('P000000003', 'T0001', 'TAS BARU', 'Tas', 25, 'AI-001A-1A', '2019-01-30 00:43:33', '2019-01-31 00:17:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_barang`
--

CREATE TABLE `master_barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(191) NOT NULL,
  `jenis_barang` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_barang`
--

INSERT INTO `master_barang` (`id`, `kode_barang`, `nama_barang`, `jenis_barang`, `created_at`, `updated_at`) VALUES
(4, 'J0001', 'Jam Lama', 'Jam Tangan', '2018-12-28 00:42:16', '2018-12-30 03:43:39'),
(5, 'T0001', 'TAS BARU', 'Tas', '2019-01-06 04:45:45', '2019-01-06 04:45:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock_barang`
--

CREATE TABLE `stock_barang` (
  `kode_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(191) NOT NULL,
  `jenis_barang` varchar(191) NOT NULL,
  `stock` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stock_barang`
--

INSERT INTO `stock_barang` (`kode_barang`, `nama_barang`, `jenis_barang`, `stock`, `updated_at`) VALUES
('J0001', 'Jam Lama', 'Jam Tangan', 180, '2019-01-28 11:19:51'),
('T0001', 'TAS BARU', 'Tas', 125, '2019-01-30 00:42:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `kode_suppliers` varchar(4) NOT NULL,
  `nama_suppliers` varchar(191) NOT NULL,
  `alamat` varchar(191) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`id`, `kode_suppliers`, `nama_suppliers`, `alamat`, `no_tlp`, `created_at`, `updated_at`) VALUES
(1, 'S001', 'PT. Supplier Baru', 'JL Baru No 1 kecamatan baru keluarahan baru kota baru', '021901412113', '2018-12-26 12:04:15', '2018-12-26 13:26:17'),
(2, 'S002', 'PT. Kedua ', 'Jl Kedua No 2 kecamatan dua kelurahan dua kota dua', '0213421455222', '2018-12-26 12:30:19', '2018-12-26 12:30:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `avatar` varchar(191) DEFAULT NULL,
  `roles` varchar(191) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `avatar`, `roles`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Irfan Heriyawan', 'administrator', '$2y$10$E7HPjMhds5goxDaipIt4h.HDmShcyurXsf4BLBLZd8eff5MHOylYW', '1.jpg', 'ADMIN', 'active', '2018-12-26 00:18:22', '2019-01-31 00:21:16'),
(2, 'User', 'user', '$2y$10$/FASgpBk.xJyChwbLpBlUO7C1ENA/OzGqnzFNSN613LFYz.B0RC5W', '3_michaelbreitung_walchensee1.jpg', 'STAFF', 'active', '2018-12-26 00:14:46', '2019-01-31 00:20:21'),
(3, 'user2', 'user2', '$2y$10$sO4VKLcvizwmI9SzqULinerYbr2Wp5yju6cw5jMN5lkQGygIteM9u', '1_michaelbreitung_quiraingview.jpg', 'STAFF', 'active', '2018-12-26 00:15:43', '2018-12-26 00:15:43'),
(4, 'tes', 'tes', '$2y$10$IutEwOsDMbvwFu7vthP0EOZxqGsBxX4Cmw1MESTik4LcXmGWNUXRK', '12_michaelbreitung_hovshallar.jpg', 'STAFF', 'active', '2018-12-22 10:46:26', '2019-01-30 14:05:26'),
(7, 'usergambar', 'usergambar', '$2y$10$0HqnK.iVnZoJagBD9UVY0.ed9C39qPagNbxpMIH79SEEcYhX3L0Hq', 'img102.jpg', 'STAFF', 'active', '2019-01-30 11:54:28', '2019-01-30 13:49:04'),
(8, 'baru', 'coba', '$2y$10$ihnAHHGend0Tdbjci/c27uHgnXOKhtvyzN2mWwH/bpLVCRWYSz89y', '2_michaelbreitung_franconia.jpg', 'STAFF', 'active', '2019-01-30 12:01:11', '2019-01-30 13:56:31');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_transaksi` (`no_transaksi`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_transaksi` (`no_transaksi`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_barang`
--
ALTER TABLE `master_barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_suppliers` (`kode_suppliers`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `master_barang`
--
ALTER TABLE `master_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
