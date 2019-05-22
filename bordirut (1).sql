-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2019 at 07:08 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bordirut`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_mentah`
--

CREATE TABLE `activity_mentah` (
  `id` int(11) NOT NULL,
  `activity_id` varchar(45) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tanggal` varchar(45) DEFAULT NULL,
  `jenis` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_mentah`
--

INSERT INTO `activity_mentah` (`id`, `activity_id`, `nama`, `jumlah`, `tanggal`, `jenis`) VALUES
(1, '21052019221318UtKLXf5A', 'Kain satin sutra', 200, '21/05/2019', 'masuk'),
(2, '21052019221318UtKLXf5A', 'Kain beldru', 50, '21/05/2019', 'masuk'),
(3, '22052019052445UiWFIkuh', 'Kain lapis dalam taiwan', 10, '22/05/2019', 'masuk'),
(4, '22052019072220CDzZ3t1m', 'Kain satin sutra', 100, '22/05/2019', 'masuk'),
(5, '22052019072220CDzZ3t1m', 'Benang sulam', 500, '22/05/2019', 'masuk'),
(6, '22052019072220CDzZ3t1m', 'Sol karet sepatu', 50, '22/05/2019', 'masuk'),
(7, '22052019072220CDzZ3t1m', 'Kain lapis dalam taiwan', 50, '22/05/2019', 'masuk'),
(8, '22052019102014UWGrfFTH', 'Kain beldru', 105, '22/05/2019', 'masuk'),
(9, '22052019102014UWGrfFTH', 'Kain satin sutra', 100, '22/05/2019', 'masuk'),
(10, '22052019102014UWGrfFTH', 'Benang sulam', 1002, '22/05/2019', 'masuk'),
(11, '22052019102014UWGrfFTH', 'Sol karet sepatu', 103, '22/05/2019', 'masuk'),
(12, '22052019102014UWGrfFTH', 'Kain lapis dalam taiwan', 103, '22/05/2019', 'masuk'),
(13, '22052019102042fqjdW8H1', 'Kain beldru', 36, '22/05/2019', 'masuk'),
(14, '22052019102042fqjdW8H1', 'Kain satin sutra', 36, '22/05/2019', 'masuk'),
(15, '22052019102042fqjdW8H1', 'Benang sulam', 225, '22/05/2019', 'masuk'),
(16, '22052019102042fqjdW8H1', 'Sol karet sepatu', 36, '22/05/2019', 'masuk'),
(17, '22052019102042fqjdW8H1', 'Kain lapis dalam taiwan', 37, '22/05/2019', 'masuk');

-- --------------------------------------------------------

--
-- Table structure for table `activity_pendukung`
--

CREATE TABLE `activity_pendukung` (
  `id` int(11) NOT NULL,
  `activity_id` varchar(45) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tanggal` varchar(45) DEFAULT NULL,
  `jenis` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_pendukung`
--

INSERT INTO `activity_pendukung` (`id`, `activity_id`, `nama`, `jumlah`, `tanggal`, `jenis`) VALUES
(1, '22052019072220CDzZ3t1m', 'lem', 50, '22/05/2019', 'masuk'),
(2, '22052019102014UWGrfFTH', 'lem', 103, '22/05/2019', 'masuk'),
(3, '22052019102042fqjdW8H1', 'lem', 20, '22/05/2019', 'masuk');

-- --------------------------------------------------------

--
-- Table structure for table `barang_mentah`
--

CREATE TABLE `barang_mentah` (
  `id_mentah` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_mentah`
--

INSERT INTO `barang_mentah` (`id_mentah`, `nama`, `jumlah`) VALUES
(1, 'Kain satin sutra', 136),
(2, 'Kain lapis dalam taiwan', 140),
(3, 'Kain beldru', 191),
(4, 'Benang bordir', 0),
(5, 'Benang sulam', 1227),
(6, 'Sol karet sepatu', 139);

-- --------------------------------------------------------

--
-- Table structure for table `barang_pendukung`
--

CREATE TABLE `barang_pendukung` (
  `id_pendukung` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_pendukung`
--

INSERT INTO `barang_pendukung` (`id_pendukung`, `nama`, `jumlah`) VALUES
(1, 'lem', 123),
(2, 'gunting', 0),
(3, 'jarum', 0),
(4, 'kantong plastik', 0),
(5, 'kardus', 0),
(6, 'rol meteran', 0);

-- --------------------------------------------------------

--
-- Table structure for table `barang_produk`
--

CREATE TABLE `barang_produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `ukuran` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT '0',
  `satin` int(11) DEFAULT '0',
  `beldru` int(11) DEFAULT '0',
  `benang` int(11) DEFAULT '0',
  `lem` int(11) DEFAULT '0',
  `sol` int(11) DEFAULT '0',
  `taiwan` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_produk`
--

INSERT INTO `barang_produk` (`id`, `nama`, `ukuran`, `stok`, `satin`, `beldru`, `benang`, `lem`, `sol`, `taiwan`) VALUES
(1, 'bordir', 24, 0, 0, 50, 250, 25, 30, 30),
(2, 'bordir', 25, 0, 0, 52, 252, 27, 36, 32),
(3, 'bordir', 26, 0, 0, 56, 256, 30, 37, 35),
(4, 'bordir', 27, 0, 0, 58, 258, 33, 39, 39),
(5, 'bordir', 28, 0, 0, 60, 260, 35, 40, 40),
(6, 'bordir', 36, 0, 0, 100, 500, 50, 50, 50),
(7, 'bordir', 37, 0, 0, 105, 502, 53, 53, 53),
(8, 'bordir', 38, 0, 0, 109, 505, 59, 59, 59),
(9, 'bordir', 39, 0, 0, 110, 510, 63, 63, 63),
(10, 'bordir', 40, 0, 0, 112, 514, 65, 65, 65),
(11, 'bordir', 41, 0, 0, 115, 517, 67, 67, 67),
(12, 'bordir', 42, 0, 0, 118, 519, 69, 69, 69),
(13, 'bordir', 43, 0, 0, 120, 520, 70, 70, 70),
(14, 'sulam', 24, 0, 50, 0, 250, 25, 30, 30),
(15, 'sulam', 25, 0, 52, 0, 252, 27, 32, 32),
(16, 'sulam', 26, 0, 55, 0, 255, 28, 33, 33),
(17, 'sulam', 27, 0, 57, 0, 257, 30, 34, 34),
(18, 'sulam', 28, 0, 60, 0, 259, 31, 35, 35),
(19, 'sulam', 36, 0, 100, 0, 500, 50, 50, 50),
(20, 'sulam', 37, 0, 112, 0, 502, 55, 55, 55),
(21, 'sulam', 38, 0, 115, 0, 505, 59, 59, 59),
(22, 'sulam', 39, 0, 116, 0, 509, 61, 61, 61),
(23, 'sulam', 40, 0, 117, 0, 510, 63, 63, 63),
(24, 'sulam', 41, 0, 118, 0, 513, 65, 65, 65),
(25, 'sulam', 42, 0, 119, 0, 515, 68, 68, 68),
(26, 'sulam', 43, 0, 120, 0, 520, 70, 70, 70),
(27, 'selop', 24, 0, 20, 20, 150, 10, 15, 20),
(28, 'selop', 25, 0, 22, 22, 152, 12, 16, 22),
(29, 'selop', 26, 0, 23, 23, 155, 13, 17, 23),
(30, 'selop', 27, 0, 25, 25, 156, 14, 18, 25),
(31, 'selop', 28, 0, 26, 26, 157, 15, 19, 28),
(32, 'selop', 36, 0, 40, 40, 250, 20, 30, 21),
(33, 'selop', 37, 0, 41, 41, 252, 23, 31, 22),
(34, 'selop', 38, 0, 42, 42, 256, 25, 33, 24),
(35, 'selop', 39, 0, 43, 43, 257, 26, 34, 25),
(36, 'selop', 40, 5, 45, 45, 259, 26, 36, 26),
(37, 'selop', 41, 0, 46, 46, 262, 27, 36, 27),
(38, 'selop', 42, 0, 48, 48, 264, 28, 37, 28),
(39, 'selop', 43, 0, 50, 50, 250, 25, 50, 40),
(40, 'sandal', 24, 0, 10, 10, 100, 10, 7, 10),
(41, 'sandal', 25, 0, 11, 11, 102, 11, 9, 11),
(42, 'sandal', 26, 0, 12, 12, 104, 12, 10, 12),
(43, 'sandal', 27, 0, 13, 13, 106, 14, 13, 13),
(44, 'sandal', 28, 0, 14, 14, 110, 14, 15, 14),
(45, 'sandal', 36, 0, 20, 20, 200, 15, 25, 30),
(46, 'sandal', 37, 0, 24, 24, 205, 16, 26, 33),
(47, 'sandal', 38, 0, 26, 26, 210, 17, 28, 32),
(48, 'sandal', 39, 0, 28, 28, 215, 18, 30, 35),
(49, 'sandal', 40, 0, 32, 32, 220, 19, 34, 36),
(50, 'sandal', 41, 0, 36, 36, 225, 20, 36, 37),
(51, 'sandal', 42, 0, 38, 38, 240, 23, 43, 38),
(52, 'sandal', 43, 0, 40, 40, 250, 25, 50, 40);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_sepatu`
--

CREATE TABLE `jenis_sepatu` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `req_beli_mentah`
--

CREATE TABLE `req_beli_mentah` (
  `id` int(11) NOT NULL,
  `request_id` varchar(255) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tanggal` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT 'belum',
  `vendor` varchar(255) DEFAULT NULL,
  `total_harga` double DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `req_beli_mentah`
--

INSERT INTO `req_beli_mentah` (`id`, `request_id`, `nama`, `jumlah`, `tanggal`, `status`, `vendor`, `total_harga`) VALUES
(21, '22052019102014UWGrfFTH', 'Kain beldru', 105, '22/05/2019', 'selesai', 'gegv', 4515),
(22, '22052019102014UWGrfFTH', 'Kain satin sutra', 100, '22/05/2019', 'selesai', 'gvereg', 4300),
(23, '22052019102014UWGrfFTH', 'Benang sulam', 1002, '22/05/2019', 'selesai', 'g', 54108),
(24, '22052019102014UWGrfFTH', 'Sol karet sepatu', 103, '22/05/2019', 'selesai', '4g', 412),
(25, '22052019102014UWGrfFTH', 'Kain lapis dalam taiwan', 103, '22/05/2019', 'selesai', '4g4g', 5505762),
(26, '22052019102042fqjdW8H1', 'Kain beldru', 36, '22/05/2019', 'selesai', 'g43', 19243224),
(27, '22052019102042fqjdW8H1', 'Kain satin sutra', 36, '22/05/2019', 'selesai', '4t34', 19564344),
(28, '22052019102042fqjdW8H1', 'Benang sulam', 225, '22/05/2019', 'selesai', 't34t', 1125),
(29, '22052019102042fqjdW8H1', 'Sol karet sepatu', 36, '22/05/2019', 'selesai', '3', 127260),
(30, '22052019102042fqjdW8H1', 'Kain lapis dalam taiwan', 37, '22/05/2019', 'selesai', '34t443t', 130795),
(31, '22052019105040x1DASMeN', 'Kain beldru', 40, '22/05/2019', 'proses', NULL, 0),
(32, '22052019105040x1DASMeN', 'Kain satin sutra', 40, '22/05/2019', 'proses', NULL, 0),
(33, '22052019105040x1DASMeN', 'Benang sulam', 250, '22/05/2019', 'proses', NULL, 0),
(34, '22052019105040x1DASMeN', 'Sol karet sepatu', 50, '22/05/2019', 'proses', NULL, 0),
(35, '22052019105040x1DASMeN', 'Kain lapis dalam taiwan', 40, '22/05/2019', 'proses', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `req_beli_pendukung`
--

CREATE TABLE `req_beli_pendukung` (
  `id` int(11) NOT NULL,
  `request_id` varchar(255) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tanggal` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT 'belum',
  `vendor` varchar(255) DEFAULT NULL,
  `total_harga` double DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `req_beli_pendukung`
--

INSERT INTO `req_beli_pendukung` (`id`, `request_id`, `nama`, `jumlah`, `tanggal`, `status`, `vendor`, `total_harga`) VALUES
(5, '22052019102014UWGrfFTH', 'lem', 103, '22/05/2019', 'selesai', 'hrdg', 103000),
(6, '22052019102042fqjdW8H1', 'lem', 20, '22/05/2019', 'selesai', 'grerrgrerg', 480000),
(7, '22052019105040x1DASMeN', 'lem', 25, '22/05/2019', 'proses', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ukuran`
--

CREATE TABLE `ukuran` (
  `id` int(11) NOT NULL,
  `kategori` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ukuran`
--

INSERT INTO `ukuran` (`id`, `kategori`) VALUES
(24, 'anak'),
(25, 'anak'),
(26, 'anak'),
(27, 'anak'),
(28, 'anak'),
(36, 'dewasa'),
(37, 'dewasa'),
(38, 'dewasa'),
(39, 'dewasa'),
(40, 'dewasa'),
(41, 'dewasa'),
(42, 'dewasa'),
(43, 'dewasa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_mentah`
--
ALTER TABLE `activity_mentah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_pendukung`
--
ALTER TABLE `activity_pendukung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_mentah`
--
ALTER TABLE `barang_mentah`
  ADD PRIMARY KEY (`id_mentah`);

--
-- Indexes for table `barang_pendukung`
--
ALTER TABLE `barang_pendukung`
  ADD PRIMARY KEY (`id_pendukung`);

--
-- Indexes for table `barang_produk`
--
ALTER TABLE `barang_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_sepatu`
--
ALTER TABLE `jenis_sepatu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `req_beli_mentah`
--
ALTER TABLE `req_beli_mentah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `req_beli_pendukung`
--
ALTER TABLE `req_beli_pendukung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_mentah`
--
ALTER TABLE `activity_mentah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `activity_pendukung`
--
ALTER TABLE `activity_pendukung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `barang_mentah`
--
ALTER TABLE `barang_mentah`
  MODIFY `id_mentah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `barang_pendukung`
--
ALTER TABLE `barang_pendukung`
  MODIFY `id_pendukung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `barang_produk`
--
ALTER TABLE `barang_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `req_beli_mentah`
--
ALTER TABLE `req_beli_mentah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `req_beli_pendukung`
--
ALTER TABLE `req_beli_pendukung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
