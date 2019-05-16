-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2019 at 07:14 PM
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
(1, 'Kain satin sutra', 25),
(2, 'Kain lapis dalam taiwan', 35),
(3, '	Kain beldru', 0),
(4, 'Benang bordir', 10),
(5, 'Benang sulam', 0),
(6, 'Sol sepatu', 0);

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
(1, 'lem', 0),
(2, 'gunting', 3),
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
  `stok` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_produk`
--

INSERT INTO `barang_produk` (`id`, `nama`, `ukuran`, `stok`) VALUES
(1, 'bordir', 24, 0),
(2, 'bordir', 25, 0),
(3, 'bordir', 26, 0),
(4, 'bordir', 27, 0),
(5, 'bordir', 28, 0),
(6, 'bordir', 36, 0),
(7, 'bordir', 37, 0),
(8, 'bordir', 38, 0),
(9, 'bordir', 39, 0),
(10, 'bordir', 40, 0),
(11, 'bordir', 41, 0),
(12, 'bordir', 42, 0),
(13, 'bordir', 43, 0),
(14, 'sulam', 24, 0),
(15, 'sulam', 25, 0),
(16, 'sulam', 26, 0),
(17, 'sulam', 27, 0),
(18, 'sulam', 28, 0),
(19, 'sulam', 36, 0),
(20, 'sulam', 37, 0),
(21, 'sulam', 38, 0),
(22, 'sulam', 39, 0),
(23, 'sulam', 40, 0),
(24, 'sulam', 41, 0),
(25, 'sulam', 42, 0),
(26, 'sulam', 43, 0),
(27, 'selop', 24, 0),
(28, 'selop', 25, 0),
(29, 'selop', 26, 0),
(30, 'selop', 27, 0),
(31, 'selop', 28, 0),
(32, 'selop', 36, 0),
(33, 'selop', 37, 0),
(34, 'selop', 38, 0),
(35, 'selop', 39, 0),
(36, 'selop', 40, 5),
(37, 'selop', 41, 0),
(38, 'selop', 42, 0),
(39, 'selop', 43, 0),
(40, 'sandal', 24, 0),
(41, 'sandal', 25, 0),
(42, 'sandal', 26, 0),
(43, 'sandal', 27, 0),
(44, 'sandal', 28, 0),
(45, 'sandal', 36, 0),
(46, 'sandal', 37, 0),
(47, 'sandal', 38, 0),
(48, 'sandal', 39, 0),
(49, 'sandal', 40, 0),
(50, 'sandal', 41, 0),
(51, 'sandal', 42, 0),
(52, 'sandal', 43, 0);

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
  `vendor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `req_beli_mentah`
--

INSERT INTO `req_beli_mentah` (`id`, `request_id`, `nama`, `jumlah`, `tanggal`, `status`, `vendor`) VALUES
(12, '14/05/2019/21/05KylHzOxG', 'Sol karet sepatu', 12, '14/05/2019', 'terkonfirmasi', 'kucing'),
(13, '14/05/2019/21/05KylHzOxG', 'Benang sulam', 11, '14/05/2019', 'terkonfirmasi', 'hehe'),
(19, '14/05/2019/23/48x9luHjKU', 'Kain satin sutra', 50, '14/05/2019', 'terkonfirmasi', 'sutra jaya'),
(20, '14/05/2019/23/48x9luHjKU', 'Benang sulam', 22, '14/05/2019', 'terkonfirmasi', 'sulam maju'),
(21, '14/05/2019/23/48x9luHjKU', 'Kain lapis dalam taiwan', 33, '14/05/2019', 'terkonfirmasi', 'taiwan mundur'),
(23, '14/05/2019/23/48Bo9mCqtA', 'Kain lapis dalam taiwan', 3, '14/05/2019', 'terkonfirmasi', 'taiwan mundur'),
(24, '14/05/2019/23/48Bo9mCqtA', 'Benang sulam', 31, '14/05/2019', 'terkonfirmasi', 'menyulam'),
(25, '14/05/2019/23/512xFJ63po', 'Kain satin sutra', 12, '14/05/2019', 'terkonfirmasi', 'sutra halus'),
(28, '15/05/2019/00/03459O3DPq', 'Kain satin sutra', 13, '15/05/2019', 'terkonfirmasi', 'haiya'),
(29, '15/05/2019/00/03459O3DPq', 'Sol karet sepatu', 55, '15/05/2019', 'terkonfirmasi', 'wkwkwk'),
(33, '15/05/2019/00/05qzsICm0w', 'Benang bordir', 21, '15/05/2019', 'terkonfirmasi', 'weed'),
(34, '15/05/2019/00/05qzsICm0w', 'Benang sulam', 11, '15/05/2019', 'terkonfirmasi', 'dwed'),
(35, '15/05/2019/00/05qzsICm0w', 'Kain lapis dalam taiwan', 33, '15/05/2019', 'terkonfirmasi', 'fewfwef'),
(38, '15/05/2019/00/09FsbET80g', 'Kain satin sutra', 20, '15/05/2019', 'terkonfirmasi', 'suta'),
(39, '15/05/2019/00/09FsbET80g', 'Benang bordir', 10, '15/05/2019', 'terkonfirmasi', 'fesf'),
(42, '15/05/2019/00/10UCDaedvs', 'Kain satin sutra', 5, '15/05/2019', 'terkonfirmasi', '3w3sf'),
(43, '15/05/2019/00/10UCDaedvs', 'Kain lapis dalam taiwan', 35, '15/05/2019', 'terkonfirmasi', 'w3srf');

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
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
