-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Des 2019 pada 12.34
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perumahan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE `chat` (
  `KD_CHAT` int(4) NOT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `PENERIMA` varchar(20) NOT NULL,
  `TGLWAKTU_CHAT` datetime NOT NULL,
  `ISI_CHAT` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `chat`
--

INSERT INTO `chat` (`KD_CHAT`, `USERNAME`, `PENERIMA`, `TGLWAKTU_CHAT`, `ISI_CHAT`) VALUES
(1, 'adi123', 'ani123', '2019-11-04 00:00:00', 'halo'),
(2, 'ani123', 'adi123', '2019-11-30 00:00:00', 'apa?'),
(3, 'adi123', 'ani123', '2019-11-05 00:00:00', 'kok nomornya gk aktif?'),
(16, 'adi123', 'ani123', '2019-12-01 15:32:07', 'kantornya dimana?'),
(19, 'adi123', 'ani123', '2019-12-01 16:14:24', 'saya hubungi nomronya gabisa?'),
(20, 'adi123', 'ani123', '2019-12-01 16:16:48', 'gimana? halo'),
(21, 'ani123', 'adi123', '2019-12-01 16:17:28', 'nomornya aktif kok'),
(22, 'ani123', 'adi123', '2019-12-01 17:55:57', 'alamat kantor sesuai dengan iklan'),
(70, 'bambang123', 'ani123', '2019-12-27 00:00:00', 'halo selamat siang'),
(71, 'ani123', 'bambang123', '2019-12-31 00:00:00', 'selamat siang, silahkan kalau mau tanya2'),
(72, 'adi123', 'agung123', '2019-12-15 17:44:45', '<p>halo</p>'),
(73, 'agung123', 'adi123', '2019-12-15 17:50:00', 'ada yg bisa dibantu?'),
(74, 'adi123', 'agung123', '2019-12-15 17:58:45', '<p>oke</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cluster`
--

CREATE TABLE `cluster` (
  `KD_CLUSTER` int(4) NOT NULL,
  `KD_PERUM` int(4) NOT NULL,
  `NAMA_CLUSTER` varchar(100) DEFAULT NULL,
  `TIPE` int(4) DEFAULT NULL,
  `LUAS_TANAH` int(4) DEFAULT NULL,
  `STOK` int(4) DEFAULT NULL,
  `HARGA` bigint(20) DEFAULT NULL,
  `FASILITAS` varchar(1000) DEFAULT NULL,
  `GAMBAR` varchar(100) DEFAULT NULL,
  `GAMBAR1` varchar(100) DEFAULT NULL,
  `GAMBAR2` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cluster`
--

INSERT INTO `cluster` (`KD_CLUSTER`, `KD_PERUM`, `NAMA_CLUSTER`, `TIPE`, `LUAS_TANAH`, `STOK`, `HARGA`, `FASILITAS`, `GAMBAR`, `GAMBAR1`, `GAMBAR2`) VALUES
(1, 5, 'Edge Gardenia', 60, 78, 32, 1000000000, '<p>Struktur Bangunan : Lantai 1 - Lantai 2</p>\r\n<p>Pondasi : Pondasi menerus batu kali</p>\r\n<p>Dinding :</p>\r\n<ol>\r\n<li>Bata merah diplester</li>\r\n</ol>\r\n<ol>\r\n<li>Finish Aci + Plamir dicat</li>\r\n</ol>\r\n<p>Finishing Lantai : Granit 60/60 (setara)</p>\r\n<p>Atap :</p>\r\n<ol>\r\n<li>Rangka Galvarum</li>\r\n</ol>\r\n<ol>\r\n<li>Penutup genteng gypsumboard dicat</li>\r\n</ol>\r\n<p>Plafond :</p>\r\n<ol>\r\n<li>Rangka Hollow</li>\r\n</ol>\r\n<ol>\r\n<li>Penutup Gypsumboard dicat</li>\r\n</ol>\r\n<p>Finishing kusen : Kusen Alumunium</p>\r\n<p>Daun pintu, jendela :</p>\r\n<ol>\r\n<li>Pintu utama : Solid cat Finish cat</li>\r\n</ol>\r\n<ol>\r\n<li>Pintu kamar : Double multiplek</li>\r\n<li>Pintu KM/WC : PVC</li>\r\n</ol>\r\n<p>Sanitair : Kloset duduk</p>\r\n<p>Listrik : PLN 1300 Watt</p>\r\n<p>Air : PDAM</p>\r\n<p>Finishing Kamar Mandi :</p>\r\n<ol>\r\n<li>Lantai keramik setara</li>\r\n</ol>\r\n<ol>\r\n<li>Dinding keramik setara</li>\r\n</ol>\r\n<p>**Include Kamopi dan Pagar Depan</p>', 'a.jpg', 'b.jpg', 'c.jpg'),
(2, 5, 'Boulevard Magnolia', 60, 105, 24, 1100000000, '<p>Struktur Bangunan : Lantai 1 - Lantai 2</p>\r\n<p>Pondasi : Pondasi menerus batu kali</p>\r\n<p>Dinding :</p>\r\n<ol>\r\n<li>Bata merah diplester</li>\r\n</ol>\r\n<ol>\r\n<li>Finish Aci + Plamir dicat</li>\r\n</ol>\r\n<p>Finishing Lantai : Granit 60/60 (setara)</p>\r\n<p>Atap :</p>\r\n<ol>\r\n<li>Rangka Galvarum</li>\r\n</ol>\r\n<ol>\r\n<li>Penutup genteng gypsumboard dicat</li>\r\n</ol>\r\n<p>Plafond :</p>\r\n<ol>\r\n<li>Rangka Hollow</li>\r\n</ol>\r\n<ol>\r\n<li>Penutup Gypsumboard dicat</li>\r\n</ol>\r\n<p>Finishing kusen : Kusen Alumunium</p>\r\n<p>Daun pintu, jendela :</p>\r\n<ol>\r\n<li>Pintu utama : Solid cat Finish cat</li>\r\n</ol>\r\n<ol>\r\n<li>Pintu kamar : Double multiplek</li>\r\n<li>Pintu KM/WC : PVC</li>\r\n</ol>\r\n<p>Sanitair : Kloset duduk</p>\r\n<p>Listrik : PLN 1300 Watt</p>\r\n<p>Air : PDAM</p>\r\n<p>Finishing Kamar Mandi :</p>\r\n<ol>\r\n<li>Lantai keramik setara</li>\r\n</ol>\r\n<ol>\r\n<li>Dinding keramik setara</li>\r\n</ol>\r\n<p>**Include Kamopi dan Pagar Depan</p>', 'b.jpg', 'a.jpg', 'd.jpg'),
(3, 1, 'Villa Bintaro Asri', 30, 60, 200, 130000000, '<p>Pondasi : Pondasi batu kali</p>\r\n<p>Bangunan : Sloof, Kolom dan Balok Beton Bertulang</p>\r\n<p>Dinding : Dinding Batu bata diplester, diaci, dan dichat</p>\r\n<p>Atap :</p>\r\n<ol>\r\n<li>Rangka Atap Baja Ringan</li>\r\n<li>Penutup Atap Genteng Beton</li>\r\n</ol>\r\n<p>Lantai : Keramik 40x40</p>\r\n<p>Plafond : Plafond dan Jendela</p>\r\n<p>Kusen, Pintu, dan Jendela : Kusen, Jendela, dan Pintu Kayu</p>\r\n<p>Kamar Mandi/WC</p>\r\n<ol>\r\n<li>Lantai Keramik 20x20</li>\r\n<li>Dinding Keramik 20x25</li>\r\n<li>Sanitasi dan Closet Jongkok</li>\r\n</ol>\r\n<p>Listrik dan Air :</p>\r\n<ol>\r\n<li>Listrik Daya 1300 Watt</li>\r\n<li>Sumur Bor</li>\r\n</ol>', 'a.jpg', 'c.jpg', 'e.jpg'),
(4, 2, 'Puri Antirogo 2', 30, 60, 34, 116000000, '<p>Pondasi : Pondasi batu kali</p>\r\n<p>Bangunan : Sloof, Kolom dan Balok Beton Bertulang</p>\r\n<p>Dinding : Dinding Batu bata diplester, diaci, dan dichat</p>\r\n<p>Atap :</p>\r\n<ol>\r\n<li>Rangka Atap Baja Ringan</li>\r\n<li>Penutup Atap Genteng Beton</li>\r\n</ol>\r\n<p>Lantai : Keramik 40x40</p>\r\n<p>Plafond : Plafond dan Jendela</p>\r\n<p>Kusen, Pintu, dan Jendela : Kusen, Jendela, dan Pintu Kayu</p>\r\n<p>Kamar Mandi/WC</p>\r\n<ol>\r\n<li>Lantai Keramik 20x20</li>\r\n<li>Dinding Keramik 20x25</li>\r\n<li>Sanitasi dan Closet Jongkok</li>\r\n</ol>\r\n<p>Listrik dan Air :</p>\r\n<ol>\r\n<li>Listrik Daya 1300 Watt</li>\r\n<li>Sumur Bor</li>\r\n</ol>', 'e.jpg', 'a.jpg', 'b.jpg'),
(5, 3, 'Arjasa Asri 2', 30, 72, 5, 110000000, '<p>Pondasi : Pondasi batu kali</p>\r\n<p>Bangunan : Sloof, Kolom dan Balok Beton Bertulang</p>\r\n<p>Dinding : Dinding Batu bata diplester, diaci, dan dichat</p>\r\n<p>Atap :</p>\r\n<ol>\r\n<li>Rangka Atap Baja Ringan</li>\r\n<li>Penutup Atap Genteng Beton</li>\r\n</ol>\r\n<p>Lantai : Keramik 40x40</p>\r\n<p>Plafond : Plafond dan Jendela</p>\r\n<p>Kusen, Pintu, dan Jendela : Kusen, Jendela, dan Pintu Kayu</p>\r\n<p>Kamar Mandi/WC</p>\r\n<ol>\r\n<li>Lantai Keramik 20x20</li>\r\n<li>Dinding Keramik 20x25</li>\r\n<li>Sanitasi dan Closet Jongkok</li>\r\n</ol>\r\n<p>Listrik dan Air :</p>\r\n<ol>\r\n<li>Listrik Daya 1300 Watt</li>\r\n<li>Sumur Bor</li>\r\n</ol>', 'd.jpg', 'c.jpg', 'b.jpg'),
(6, 3, 'Arjasa Asri 2', 36, 72, 5, 125000000, '<p>Pondasi : Pondasi batu kali</p>\r\n<p>Bangunan : Sloof, Kolom dan Balok Beton Bertulang</p>\r\n<p>Dinding : Dinding Batu bata diplester, diaci, dan dichat</p>\r\n<p>Atap :</p>\r\n<ol>\r\n<li>Rangka Atap Baja Ringan</li>\r\n<li>Penutup Atap Genteng Beton</li>\r\n</ol>\r\n<p>Lantai : Keramik 40x40</p>\r\n<p>Plafond : Plafond dan Jendela</p>\r\n<p>Kusen, Pintu, dan Jendela : Kusen, Jendela, dan Pintu Kayu</p>\r\n<p>Kamar Mandi/WC</p>\r\n<ol>\r\n<li>Lantai Keramik 20x20</li>\r\n<li>Dinding Keramik 20x25</li>\r\n<li>Sanitasi dan Closet Jongkok</li>\r\n</ol>\r\n<p>Listrik dan Air :</p>\r\n<ol>\r\n<li>Listrik Daya 1300 Watt</li>\r\n<li>Sumur Bor</li>\r\n</ol>', 'a.jpg', 'c.jpg', 'e.jpg'),
(7, 4, 'Saren Agung', 45, 63, 12, 400000000, '<p>Pondasi : Batu Kali</p>\r\n<p>Struktur : Beton Bertulang</p>\r\n<p>Dinding :</p>\r\n<ol>\r\n<li>Bata Merah</li>\r\n<li>Plester Aci &amp; Cat</li>\r\n</ol>\r\n<p>Lantai : Homogenous Tile</p>\r\n<p>Atap :</p>\r\n<ol>\r\n<li>Rangka Atap Baja Ringan</li>\r\n<li>Genteng Beton Flat</li>\r\n</ol>\r\n<p>Pintu Utama : Solid Engineering</p>\r\n<p>Pintu Kamar : Engineering</p>\r\n<p>Pintu Kamar Mandi/WC : PVC</p>\r\n<p>Jendela :</p>\r\n<ol>\r\n<li>Alumunium</li>\r\n<li>Kaca 5 mm</li>\r\n</ol>\r\n<p>Sanitari : Closet Duduk</p>\r\n<p>Air Bersih : Sumur</p>\r\n<p>Plafond : Gypsum</p>\r\n<p>Lisplank : Kalsiplank 9 mm</p>\r\n<p>Kusen : Alumunium</p>\r\n<p>Listrik : 1.300 Watt<br /> <br /> </p>', 'b.jpg', 'd.jpg', 'e.jpg'),
(8, 4, 'Indrapura', 47, 72, 7, 450000000, '<p>Pondasi : Batu Kali</p>\r\n<p>Struktur : Beton Bertulang</p>\r\n<p>Dinding :</p>\r\n<ol>\r\n<li>Bata Merah</li>\r\n<li>Plester Aci &amp; Cat</li>\r\n</ol>\r\n<p>Lantai : Homogenous Tile</p>\r\n<p>Atap :</p>\r\n<ol>\r\n<li>Rangka Atap Baja Ringan</li>\r\n<li>Genteng Beton Flat</li>\r\n</ol>\r\n<p>Pintu Utama : Solid Engineering</p>\r\n<p>Pintu Kamar : Engineering</p>\r\n<p>Pintu Kamar Mandi/WC : PVC</p>\r\n<p>Jendela :</p>\r\n<ol>\r\n<li>Alumunium</li>\r\n<li>Kaca 5 mm</li>\r\n</ol>\r\n<p>Sanitari : Closet Duduk</p>\r\n<p>Air Bersih : Sumur</p>\r\n<p>Plafond : Gypsum</p>\r\n<p>Lisplank : Kalsiplank 9 mm</p>\r\n<p>Kusen : Alumunium</p>\r\n<p>Listrik : 1.300 Watt<br /> <br /> </p>', 'a.jpg', 'c.jpg', 'e.jpg'),
(9, 4, 'Ismahayana', 50, 81, 5, 550000000, '<p>Pondasi : Batu Kali</p>\r\n<p>Struktur : Beton Bertulang</p>\r\n<p>Dinding :</p>\r\n<ol>\r\n<li>Bata Merah</li>\r\n<li>Plester Aci &amp; Cat</li>\r\n</ol>\r\n<p>Lantai : Homogenous Tile</p>\r\n<p>Atap :</p>\r\n<ol>\r\n<li>Rangka Atap Baja Ringan</li>\r\n<li>Genteng Beton Flat</li>\r\n</ol>\r\n<p>Pintu Utama : Solid Engineering</p>\r\n<p>Pintu Kamar : Engineering</p>\r\n<p>Pintu Kamar Mandi/WC : PVC</p>\r\n<p>Jendela :</p>\r\n<ol>\r\n<li>Alumunium</li>\r\n<li>Kaca 5 mm</li>\r\n</ol>\r\n<p>Sanitari : Closet Duduk</p>\r\n<p>Air Bersih : Sumur</p>\r\n<p>Plafond : Gypsum</p>\r\n<p>Lisplank : Kalsiplank 9 mm</p>\r\n<p>Kusen : Alumunium</p>\r\n<p>Listrik : 1.300 Watt<br /> <br /> </p>', 'c.jpg', 'e.jpg', 'a.jpg'),
(10, 6, 'Aster', 50, 90, 30, 590000000, '<p>Pondasi : Batu Kali</p>\r\n<p>Struktur : Beton Bertulang</p>\r\n<p>Dinding : Bata Merah Plaster Aci</p>\r\n<p>Kusen : Alumunium Putih</p>\r\n<p>Atap : Rangka Atap Baja Ringan</p>\r\n<p>Penutup Atap : Genteng Beton Flat</p>\r\n<p>Listrik dan Air :</p>\r\n<ol>\r\n<li>Listrik Daya 1300 Watt</li>\r\n<li>Air Bersih</li>\r\n</ol>\r\n<p>Plafond :</p>\r\n<ol>\r\n<li>Rangka Hollow 20x40</li>\r\n<li>Penutup Gypsum 9mm</li>\r\n</ol>\r\n<p>Sanitair : Closet Duduk</p>\r\n<p>Lantai :</p>\r\n<ol>\r\n<li>Keramik 40x40</li>\r\n<li>Granitile 60x60</li>\r\n</ol>\r\n<p>Pintu : Panel</p>', 'd.jpg', 'e.jpg', 'a.jpg'),
(11, 6, 'Aster', 50, 112, 36, 650000000, '<p>Pondasi : Batu Kali</p>\r\n<p>Struktur : Beton Bertulang</p>\r\n<p>Dinding : Bata Merah Plaster Aci</p>\r\n<p>Kusen : Alumunium Putih</p>\r\n<p>Atap : Rangka Atap Baja Ringan</p>\r\n<p>Penutup Atap : Genteng Beton Flat</p>\r\n<p>Listrik dan Air :</p>\r\n<ol>\r\n<li>Listrik Daya 1300 Watt</li>\r\n<li>Air Bersih</li>\r\n</ol>\r\n<p>Plafond :</p>\r\n<ol>\r\n<li>Rangka Hollow 20x40</li>\r\n<li>Penutup Gypsum 9mm</li>\r\n</ol>\r\n<p>Sanitair : Closet Duduk</p>\r\n<p>Lantai :</p>\r\n<ol>\r\n<li>Keramik 40x40</li>\r\n<li>Granitile 60x60</li>\r\n</ol>\r\n<p>Pintu : Panel</p>', 'e.jpg', 'c.jpg', 'a.jpg'),
(12, 6, 'Gardenia', 60, 120, 36, 900000000, '<p>Pondasi : Batu Kali</p>\r\n<p>Struktur : Beton Bertulang</p>\r\n<p>Dinding : Bata Merah Plaster Aci</p>\r\n<p>Kusen : Alumunium Putih</p>\r\n<p>Atap : Rangka Atap Baja Ringan</p>\r\n<p>Penutup Atap : Genteng Beton Flat</p>\r\n<p>Listrik dan Air :</p>\r\n<ol>\r\n<li>Listrik Daya 1300 Watt</li>\r\n<li>Air Bersih</li>\r\n</ol>\r\n<p>Plafond :</p>\r\n<ol>\r\n<li>Rangka Hollow 20x40</li>\r\n<li>Penutup Gypsum 9mm</li>\r\n</ol>\r\n<p>Sanitair : Closet Duduk</p>\r\n<p>Lantai :</p>\r\n<ol>\r\n<li>Keramik 40x40</li>\r\n<li>Granitile 60x60</li>\r\n</ol>\r\n<p>Pintu : Panel</p>', 'b.jpg', 'a.jpg', 'e.jpg'),
(13, 6, 'Gardenia', 45, 127, 32, 850000000, '<p>Pondasi : Batu Kali</p>\r\n<p>Struktur : Beton Bertulang</p>\r\n<p>Dinding : Bata Merah Plaster Aci</p>\r\n<p>Kusen : Alumunium Putih</p>\r\n<p>Atap : Rangka Atap Baja Ringan</p>\r\n<p>Penutup Atap : Genteng Beton Flat</p>\r\n<p>Listrik dan Air :</p>\r\n<ol>\r\n<li>Listrik Daya 1300 Watt</li>\r\n<li>Air Bersih</li>\r\n</ol>\r\n<p>Plafond :</p>\r\n<ol>\r\n<li>Rangka Hollow 20x40</li>\r\n<li>Penutup Gypsum 9mm</li>\r\n</ol>\r\n<p>Sanitair : Closet Duduk</p>\r\n<p>Lantai :</p>\r\n<ol>\r\n<li>Keramik 40x40</li>\r\n<li>Granitile 60x60</li>\r\n</ol>\r\n<p>Pintu : Panel</p>', 'a.jpg', 'c.jpg', 'b.jpg'),
(14, 6, 'Boulevard', 70, 120, 20, 1070000000, '<p>Pondasi : Batu Kali</p>\r\n<p>Struktur : Beton Bertulang</p>\r\n<p>Dinding : Bata Merah Plaster Aci</p>\r\n<p>Kusen : Alumunium Putih</p>\r\n<p>Atap : Rangka Atap Baja Ringan</p>\r\n<p>Penutup Atap : Genteng Beton Flat</p>\r\n<p>Listrik dan Air :</p>\r\n<ol>\r\n<li>Listrik Daya 1300 Watt</li>\r\n<li>Air Bersih</li>\r\n</ol>\r\n<p>Plafond :</p>\r\n<ol>\r\n<li>Rangka Hollow 20x40</li>\r\n<li>Penutup Gypsum 9mm</li>\r\n</ol>\r\n<p>Sanitair : Closet Duduk</p>\r\n<p>Lantai :</p>\r\n<ol>\r\n<li>Keramik 40x40</li>\r\n<li>Granitile 60x60</li>\r\n</ol>\r\n<p>Pintu : Panel</p>', 'b.jpg', 'a.jpg', 'c.jpg'),
(15, 6, 'Boulevard', 90, 120, 25, 1300000000, '<p>Pondasi : Batu Kali</p>\r\n<p>Struktur : Beton Bertulang</p>\r\n<p>Dinding : Bata Merah Plaster Aci</p>\r\n<p>Kusen : Alumunium Putih</p>\r\n<p>Atap : Rangka Atap Baja Ringan</p>\r\n<p>Penutup Atap : Genteng Beton Flat</p>\r\n<p>Listrik dan Air :</p>\r\n<ol>\r\n<li>Listrik Daya 1300 Watt</li>\r\n<li>Air Bersih</li>\r\n</ol>\r\n<p>Plafond :</p>\r\n<ol>\r\n<li>Rangka Hollow 20x40</li>\r\n<li>Penutup Gypsum 9mm</li>\r\n</ol>\r\n<p>Sanitair : Closet Duduk</p>\r\n<p>Lantai :</p>\r\n<ol>\r\n<li>Keramik 40x40</li>\r\n<li>Granitile 60x60</li>\r\n</ol>\r\n<p>Pintu : Panel</p>', 'e.jpg', 'a.jpg', 'b.jpg'),
(16, 6, 'Alamanda', 50, 90, 40, 720000000, '<p>Pondasi : Batu Kali</p>\r\n<p>Struktur : Beton Bertulang</p>\r\n<p>Dinding : Bata Merah Plaster Aci</p>\r\n<p>Kusen : Alumunium Putih</p>\r\n<p>Atap : Rangka Atap Baja Ringan</p>\r\n<p>Penutup Atap : Genteng Beton Flat</p>\r\n<p>Listrik dan Air :</p>\r\n<ol>\r\n<li>Listrik Daya 1300 Watt</li>\r\n<li>Air Bersih</li>\r\n</ol>\r\n<p>Plafond :</p>\r\n<ol>\r\n<li>Rangka Hollow 20x40</li>\r\n<li>Penutup Gypsum 9mm</li>\r\n</ol>\r\n<p>Sanitair : Closet Duduk</p>\r\n<p>Lantai :</p>\r\n<ol>\r\n<li>Keramik 40x40</li>\r\n<li>Granitile 60x60</li>\r\n</ol>\r\n<p>Pintu : Panel</p>', 'd.jpg', 'c.jpg', 'a.jpg'),
(17, 6, 'Alamanda', 47, 107, 29, 720000000, '<p>Pondasi : Batu Kali</p>\r\n<p>Struktur : Beton Bertulang</p>\r\n<p>Dinding : Bata Merah Plaster Aci</p>\r\n<p>Kusen : Alumunium Putih</p>\r\n<p>Atap : Rangka Atap Baja Ringan</p>\r\n<p>Penutup Atap : Genteng Beton Flat</p>\r\n<p>Listrik dan Air :</p>\r\n<ol>\r\n<li>Listrik Daya 1300 Watt</li>\r\n<li>Air Bersih</li>\r\n</ol>\r\n<p>Plafond :</p>\r\n<ol>\r\n<li>Rangka Hollow 20x40</li>\r\n<li>Penutup Gypsum 9mm</li>\r\n</ol>\r\n<p>Sanitair : Closet Duduk</p>\r\n<p>Lantai :</p>\r\n<ol>\r\n<li>Keramik 40x40</li>\r\n<li>Granitile 60x60</li>\r\n</ol>\r\n<p>Pintu : Panel</p>', 'c.jpg', 'd.jpg', 'b.jpg'),
(18, 6, 'Alamanda', 42, 72, 21, 400000000, '<p>Pondasi : Batu Kali</p>\r\n<p>Struktur : Beton Bertulang</p>\r\n<p>Dinding : Bata Merah Plaster Aci</p>\r\n<p>Kusen : Alumunium Putih</p>\r\n<p>Atap : Rangka Atap Baja Ringan</p>\r\n<p>Penutup Atap : Genteng Beton Flat</p>\r\n<p>Listrik dan Air :</p>\r\n<ol>\r\n<li>Listrik Daya 1300 Watt</li>\r\n<li>Air Bersih</li>\r\n</ol>\r\n<p>Plafond :</p>\r\n<ol>\r\n<li>Rangka Hollow 20x40</li>\r\n<li>Penutup Gypsum 9mm</li>\r\n</ol>\r\n<p>Sanitair : Closet Duduk</p>\r\n<p>Lantai :</p>\r\n<ol>\r\n<li>Keramik 40x40</li>\r\n<li>Granitile 60x60</li>\r\n</ol>\r\n<p>Pintu : Panel</p>', 'b.jpg', 'a.jpg', 'd.jpg'),
(19, 6, 'Edelweis', 36, 90, 33, 450000000, '<p>Pondasi : Batu Kali</p>\r\n<p>Struktur : Beton Bertulang</p>\r\n<p>Dinding : Bata Merah Plaster Aci</p>\r\n<p>Kusen : Alumunium Putih</p>\r\n<p>Atap : Rangka Atap Baja Ringan</p>\r\n<p>Penutup Atap : Genteng Beton Flat</p>\r\n<p>Listrik dan Air :</p>\r\n<ol>\r\n<li>Listrik Daya 1300 Watt</li>\r\n<li>Air Bersih</li>\r\n</ol>\r\n<p>Plafond :</p>\r\n<ol>\r\n<li>Rangka Hollow 20x40</li>\r\n<li>Penutup Gypsum 9mm</li>\r\n</ol>\r\n<p>Sanitair : Closet Duduk</p>\r\n<p>Lantai :</p>\r\n<ol>\r\n<li>Keramik 40x40</li>\r\n<li>Granitile 60x60</li>\r\n</ol>\r\n<p>Pintu : Panel</p>', 'a.jpg', 'b.jpg', 'c.jpg');

--
-- Trigger `cluster`
--
DELIMITER $$
CREATE TRIGGER `del_dis` BEFORE DELETE ON `cluster` FOR EACH ROW BEGIN
	DELETE FROM diskusi
    WHERE KD_CLUSTER=OLD.KD_CLUSTER;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del_rep` BEFORE DELETE ON `cluster` FOR EACH ROW BEGIN
	DELETE FROM report
    WHERE KD_CLUSTER=OLD.KD_CLUSTER;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del_rev` BEFORE DELETE ON `cluster` FOR EACH ROW BEGIN
	DELETE FROM review
    WHERE KD_CLUSTER=OLD.KD_CLUSTER;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskusi`
--

CREATE TABLE `diskusi` (
  `KD_DIS` int(4) NOT NULL,
  `KD_DISP` int(11) NOT NULL,
  `KD_CLUSTER` int(4) NOT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `PENERIMA_DIS` varchar(20) NOT NULL,
  `ISI_DIS` varchar(100) DEFAULT NULL,
  `TGLWAKTU_DIS` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `diskusi`
--

INSERT INTO `diskusi` (`KD_DIS`, `KD_DISP`, `KD_CLUSTER`, `USERNAME`, `PENERIMA_DIS`, `ISI_DIS`, `TGLWAKTU_DIS`) VALUES
(2, 0, 1, 'adi123', 'diah123', 'halo', '2019-10-23 04:00:00'),
(3, 0, 18, 'bambang123', 'agung123', 'masih ada?', '2019-10-23 02:22:00'),
(5, 0, 14, 'adi123', 'agung123', 'ready', '2019-10-20 04:00:13'),
(6, 0, 3, 'bambang123', 'ani123', 'nomornya gk aktif', '2019-10-21 02:00:00'),
(7, 0, 9, 'sri123', 'donny123', 'saya minat dong', '2019-10-09 06:00:22'),
(8, 0, 10, 'bambang123', 'agung123', 'tertarik', '2019-10-22 07:14:00'),
(9, 0, 11, 'sri123', 'agung123', 'aku mau beli', '2019-10-28 02:04:11'),
(10, 0, 16, 'adi123', 'agung123', 'bagus nih kayaknya', '2019-10-23 02:05:00'),
(285, 6, 3, 'ani123', 'bambang123', 'aktif kok gan', '2019-12-08 19:07:23'),
(296, 9, 11, 'agung123', 'sri123', 'langsung aja hubungi nomor telepon', '2019-12-31 00:00:00'),
(297, 0, 11, 'sri123', 'agung123', 'siap', '2019-12-15 17:37:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `marketing`
--

CREATE TABLE `marketing` (
  `KD_MARKET` int(4) NOT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `NAMA` varchar(100) DEFAULT NULL,
  `NO_TELEPON` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `marketing`
--

INSERT INTO `marketing` (`KD_MARKET`, `USERNAME`, `NAMA`, `NO_TELEPON`) VALUES
(1, 'ani123', 'ani', '0811354123'),
(2, 'donny123', 'donny', '08123486944'),
(3, 'ani123', 'andre', '081331253700'),
(6, 'agung123', 'penny', '085259747367'),
(7, 'diah123', 'eghie', '089526886400'),
(8, 'agung123', 'agung', '089678456782'),
(10, 'diah123', 'diah', '082232410112'),
(11, 'diah123', 'terry', '082336800768');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perum`
--

CREATE TABLE `perum` (
  `KD_PERUM` int(4) NOT NULL,
  `KD_PT` int(4) NOT NULL,
  `NAMA_PERUM` varchar(100) DEFAULT NULL,
  `LOKASI` varchar(100) DEFAULT NULL,
  `GAMBAR_PERUM` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perum`
--

INSERT INTO `perum` (`KD_PERUM`, `KD_PT`, `NAMA_PERUM`, `LOKASI`, `GAMBAR_PERUM`) VALUES
(1, 1, 'Villa Bintaro Asri', 'Jalan Semangka, Jember', 'a.jpg'),
(2, 1, 'Puri Antirogo 2', 'Jalan Sarangan, Bondowoso', 'b.jpg'),
(3, 2, 'Arjasa Asri 2', 'Jalan Letnan Suprayitno, Jember', 'c.jpg'),
(4, 5, 'Puri Tegal Gede Residence', 'Jalan Tawang Mangu, Jember', 'd.jpg'),
(5, 3, 'Bernady Land Slawu', 'Jalan Cendrawasih, Jember', 'e.jpg'),
(6, 4, 'Cendrawasih', 'Jalan Cendrawasih, Jember', 'a.jpg');

--
-- Trigger `perum`
--
DELIMITER $$
CREATE TRIGGER `del_clus` BEFORE DELETE ON `perum` FOR EACH ROW BEGIN
	DELETE FROM cluster
    WHERE KD_PERUM=OLD.KD_PERUM;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pt`
--

CREATE TABLE `pt` (
  `KD_PT` int(4) NOT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `NAMA_PT` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pt`
--

INSERT INTO `pt` (`KD_PT`, `USERNAME`, `NAMA_PT`) VALUES
(1, 'ani123', 'Alfatih Konstatinopel Putra'),
(2, 'ani123', 'Tenang Jaya Putra'),
(3, 'diah123', 'Ikasetia Agung Pratama'),
(4, 'agung123', 'PJM Group'),
(5, 'donny123', 'Barisan Binar Bintang');

--
-- Trigger `pt`
--
DELIMITER $$
CREATE TRIGGER `del_perum` BEFORE DELETE ON `pt` FOR EACH ROW BEGIN
	DELETE FROM perum
    WHERE KD_PT=OLD.KD_PT;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `report`
--

CREATE TABLE `report` (
  `KD_REP` int(4) NOT NULL,
  `KD_CLUSTER` int(4) NOT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `ISI_REP` varchar(100) DEFAULT NULL,
  `TGLWAKTU_REP` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `report`
--

INSERT INTO `report` (`KD_REP`, `KD_CLUSTER`, `USERNAME`, `ISI_REP`, `TGLWAKTU_REP`) VALUES
(3, 2, 'bambang123', 'astaga', '2019-10-28 04:00:00'),
(4, 3, 'sri123', 'aku tertipu', '2019-10-23 03:12:00'),
(5, 1, 'adi123', 'aku menyesal', '2019-10-27 03:05:00'),
(6, 1, 'sri123', 'tolong iklannya dihapus', '2019-10-24 04:14:00'),
(7, 2, 'adi123', 'admin, hapus iklannya', '2019-10-20 03:14:00'),
(8, 3, 'sri123', 'iklan palsu', '2019-10-24 05:09:00'),
(9, 3, 'sri123', 'zzzz', '2019-10-28 04:06:00'),
(10, 2, 'bambang123', 'tidak sesuai iklan', '2019-10-24 02:12:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `KD_REV` int(4) NOT NULL,
  `KD_CLUSTER` int(4) NOT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `PENERIMA_REV` varchar(20) NOT NULL,
  `ISI_REV` varchar(100) DEFAULT NULL,
  `TGLWAKTU_REV` datetime DEFAULT NULL,
  `FOTO_REV` varchar(100) DEFAULT NULL,
  `RATING` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `review`
--

INSERT INTO `review` (`KD_REV`, `KD_CLUSTER`, `USERNAME`, `PENERIMA_REV`, `ISI_REV`, `TGLWAKTU_REV`, `FOTO_REV`, `RATING`) VALUES
(1, 10, 'sri123', 'agung123', 'jalannya rusak', '2019-10-16 01:00:00', 'a.jpg', 3),
(2, 11, 'bambang123', 'agung123', 'rumahnya bagus', '2019-10-23 08:00:00', 'b.jpg', 4),
(4, 10, 'adi123', 'agung123', '<p>mahal ya</p>', '2019-10-13 03:11:02', 'c.jpg', 5),
(5, 18, 'sri123', 'agung123', 'bagus', '2019-10-14 04:10:07', 'a.jpg', 5),
(6, 9, 'adi123', 'donny123', 'banyak pohon', '2019-10-21 03:10:04', 'a.jpg', 5),
(7, 4, 'adi123', 'ani123', 'indah', '2019-10-21 02:07:06', 'c.jpg', 2),
(8, 5, 'bambang123', 'ani123', 'cemerlang', '2019-10-28 03:06:08', 'd.jpg', 4),
(9, 6, 'bambang123', 'ani123', 'sejuk', '2019-10-28 02:00:00', 'e.jpg', 3),
(10, 8, 'sri123', 'donny123', 'jalan bagus', '2019-10-28 03:09:00', 'c.jpg', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `KD_SLIDER` int(4) NOT NULL,
  `JUDUL` varchar(100) DEFAULT NULL,
  `KETERANGAN` varchar(100) DEFAULT NULL,
  `GAMBAR_SLIDER` varchar(100) DEFAULT NULL,
  `URUTAN` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`KD_SLIDER`, `JUDUL`, `KETERANGAN`, `GAMBAR_SLIDER`, `URUTAN`) VALUES
(15, 'carirumah.com', 'Situs Online Jual Beli Rumah', '27112019003313Untitled-10.jpg', 1),
(18, '', '', '27112019003013Desain FIX.png', 8),
(19, '', '', '27112019093047Perumahan.jpg', 7),
(20, '', '', '27112019224351benner iklan kuning.jpg', 6),
(22, '', '', '27112019224426desain iklan perumahan 1 fixs-Recovered-Recovered.jpg', 3),
(23, '', '', '27112019224436iklan web benner-Recovered.jpg', 4),
(24, '', '', '27112019224441karir.jpg', 5),
(27, '', '', '11122019100259iklan benner.jpg', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `USERNAME` varchar(20) NOT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `STATUS` varchar(10) DEFAULT NULL,
  `NAMA_LENGKAP` varchar(100) DEFAULT NULL,
  `TGL_LAHIR` date DEFAULT NULL,
  `JENIS_KELAMIN` varchar(20) DEFAULT NULL,
  `FOTO` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`USERNAME`, `EMAIL`, `PASSWORD`, `STATUS`, `NAMA_LENGKAP`, `TGL_LAHIR`, `JENIS_KELAMIN`, `FOTO`) VALUES
('aan123', 'aan123@gmail.com', '8def7880611c2a2656993f111033ec02', 'admin', 'aan', NULL, 'laki-laki', 'pp.jpg'),
('adi123', 'adi123@gmail.com', 'eccd98e2993c0d0f20634192bb99a28c', 'customer', 'adi ', '2019-11-05', 'laki-laki', 'pp.jpg'),
('agung123', 'agung123@gmail.com', 'e904e7f75558d764454629e05695603c', 'developer', 'agung', '2019-12-03', 'laki-laki', 'pp.jpg'),
('ani123', 'ani123@gmail.com', '688ad903b96c555a8ae82e34e55f2e4a', 'developer', 'ani', '2019-11-20', 'perempuan', 'pp.jpg'),
('bambang123', 'bambang123@gmail.com', '5fcb50372cea67d79b3de9a35a7196f9', 'customer', 'bambang', '2000-01-23', 'laki-laki', 'pp.jpg'),
('diah123', 'diah123@gmail.com', '02797d9b49c5fa41925df0972643ac3f', 'developer', 'diah', NULL, 'perempuan', 'pp.jpg'),
('donny123', 'donny123@gmail.com', '59c85e9eff01dd4c124a63ec26eba841', 'developer', 'donny', NULL, 'laki-laki', 'pp.jpg'),
('gede123', 'gede123@gmail.com', 'fcb01b685fe8568c9a5ad1fcb08aab48', 'admin', 'gede', NULL, 'laki-laki', 'pp.jpg'),
('nevin123', 'nevin123@gmail.com', '50582d86b0a6a69d9c6420c9c07e2fc0', 'admin', 'nevin', '2019-12-24', 'laki-laki', 'pp.jpg'),
('reza123', 'reza123@gmail.com', 'b42d644d30c1441c97f64ee8471f83e7', 'admin', 'reza', NULL, 'laki-laki', 'pp.jpg'),
('sri123', 'sri123@gmail.com', 'b22803be491d7997f5d265fdaed838ea', 'customer', 'sri', NULL, 'perempuan', 'pp.jpg');

--
-- Trigger `user`
--
DELIMITER $$
CREATE TRIGGER `del_chat` BEFORE DELETE ON `user` FOR EACH ROW BEGIN
	DELETE FROM chat
    WHERE USERNAME=OLD.USERNAME;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del_market` BEFORE DELETE ON `user` FOR EACH ROW BEGIN
	DELETE FROM marketing
    WHERE USERNAME=OLD.USERNAME;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del_pt` BEFORE DELETE ON `user` FOR EACH ROW BEGIN
	DELETE FROM pt
    WHERE USERNAME=OLD.USERNAME;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`KD_CHAT`),
  ADD KEY `USERNAME` (`USERNAME`);

--
-- Indeks untuk tabel `cluster`
--
ALTER TABLE `cluster`
  ADD PRIMARY KEY (`KD_CLUSTER`),
  ADD KEY `FK_MEMILIKI` (`KD_PERUM`);

--
-- Indeks untuk tabel `diskusi`
--
ALTER TABLE `diskusi`
  ADD PRIMARY KEY (`KD_DIS`),
  ADD KEY `FK_MENULIS` (`USERNAME`),
  ADD KEY `KD_CLUSTER` (`KD_CLUSTER`);

--
-- Indeks untuk tabel `marketing`
--
ALTER TABLE `marketing`
  ADD PRIMARY KEY (`KD_MARKET`),
  ADD KEY `FK_MELENGKAPI` (`USERNAME`);

--
-- Indeks untuk tabel `perum`
--
ALTER TABLE `perum`
  ADD PRIMARY KEY (`KD_PERUM`),
  ADD KEY `FK_MENDATA` (`KD_PT`);

--
-- Indeks untuk tabel `pt`
--
ALTER TABLE `pt`
  ADD PRIMARY KEY (`KD_PT`),
  ADD KEY `FK_MEMPUNYAI` (`USERNAME`);

--
-- Indeks untuk tabel `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`KD_REP`),
  ADD KEY `FK_BERISIKAN` (`KD_CLUSTER`),
  ADD KEY `FK_MEMBERI` (`USERNAME`);

--
-- Indeks untuk tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`KD_REV`),
  ADD KEY `FK_MEMBUAT` (`USERNAME`),
  ADD KEY `FK_TENTANG` (`KD_CLUSTER`);

--
-- Indeks untuk tabel `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`KD_SLIDER`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USERNAME`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `chat`
--
ALTER TABLE `chat`
  MODIFY `KD_CHAT` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `cluster`
--
ALTER TABLE `cluster`
  MODIFY `KD_CLUSTER` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `diskusi`
--
ALTER TABLE `diskusi`
  MODIFY `KD_DIS` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

--
-- AUTO_INCREMENT untuk tabel `marketing`
--
ALTER TABLE `marketing`
  MODIFY `KD_MARKET` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `perum`
--
ALTER TABLE `perum`
  MODIFY `KD_PERUM` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `pt`
--
ALTER TABLE `pt`
  MODIFY `KD_PT` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `report`
--
ALTER TABLE `report`
  MODIFY `KD_REP` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `review`
--
ALTER TABLE `review`
  MODIFY `KD_REV` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `slider`
--
ALTER TABLE `slider`
  MODIFY `KD_SLIDER` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`USERNAME`) REFERENCES `user` (`USERNAME`);

--
-- Ketidakleluasaan untuk tabel `cluster`
--
ALTER TABLE `cluster`
  ADD CONSTRAINT `FK_MEMILIKI` FOREIGN KEY (`KD_PERUM`) REFERENCES `perum` (`KD_PERUM`);

--
-- Ketidakleluasaan untuk tabel `diskusi`
--
ALTER TABLE `diskusi`
  ADD CONSTRAINT `diskusi_ibfk_1` FOREIGN KEY (`KD_CLUSTER`) REFERENCES `cluster` (`KD_CLUSTER`),
  ADD CONSTRAINT `diskusi_ibfk_2` FOREIGN KEY (`USERNAME`) REFERENCES `user` (`USERNAME`);

--
-- Ketidakleluasaan untuk tabel `marketing`
--
ALTER TABLE `marketing`
  ADD CONSTRAINT `marketing_ibfk_1` FOREIGN KEY (`USERNAME`) REFERENCES `user` (`USERNAME`);

--
-- Ketidakleluasaan untuk tabel `perum`
--
ALTER TABLE `perum`
  ADD CONSTRAINT `FK_MENDATA` FOREIGN KEY (`KD_PT`) REFERENCES `pt` (`KD_PT`);

--
-- Ketidakleluasaan untuk tabel `pt`
--
ALTER TABLE `pt`
  ADD CONSTRAINT `pt_ibfk_1` FOREIGN KEY (`USERNAME`) REFERENCES `user` (`USERNAME`);

--
-- Ketidakleluasaan untuk tabel `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `FK_BERISIKAN` FOREIGN KEY (`KD_CLUSTER`) REFERENCES `cluster` (`KD_CLUSTER`),
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`USERNAME`) REFERENCES `user` (`USERNAME`);

--
-- Ketidakleluasaan untuk tabel `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `FK_TENTANG` FOREIGN KEY (`KD_CLUSTER`) REFERENCES `cluster` (`KD_CLUSTER`),
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`USERNAME`) REFERENCES `user` (`USERNAME`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
