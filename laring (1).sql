-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16 Apr 2020 pada 09.02
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laring`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama_admin` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telepon` char(13) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `nama_admin`, `alamat`, `no_telepon`, `foto`, `password`) VALUES
(1, 'babangtamvan', 'bambang', 'lumajang', '08123123123', '', 'aku123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `langganan`
--

CREATE TABLE `langganan` (
  `id_langganan` int(3) NOT NULL,
  `id_mitra` int(3) NOT NULL,
  `id_pelanggan` int(3) NOT NULL,
  `jumlah_hari` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(3) NOT NULL,
  `nama_menu` varchar(30) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `harga` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra`
--

CREATE TABLE `mitra` (
  `id_mitra` int(4) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama_katering` varchar(30) NOT NULL,
  `nama_pemilik` varchar(30) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telepon` char(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto_lokasi` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(4) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telepon` char(13) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_beli` int(3) NOT NULL,
  `id_mitra` int(3) NOT NULL,
  `id_pelanggan` int(3) NOT NULL,
  `id_menu` int(3) NOT NULL,
  `total_harga` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `langganan`
--
ALTER TABLE `langganan`
  ADD PRIMARY KEY (`id_langganan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_mitra` (`id_mitra`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id_mitra`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_beli`),
  ADD KEY `id_mitra` (`id_mitra`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_menu` (`id_menu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `langganan`
--
ALTER TABLE `langganan`
  MODIFY `id_langganan` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id_mitra` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_beli` int(3) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
