-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2023 at 02:12 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_tm`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
`id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`) VALUES
(1, 'Oli Motor');

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE IF NOT EXISTS `detail_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_barang` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `pendapatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `detail_penjualan`
--
DELIMITER //
CREATE TRIGGER `addStok` AFTER DELETE ON `detail_penjualan`
 FOR EACH ROW BEGIN
	UPDATE barang SET stok = stok + OLD.jumlah WHERE id_barang = OLD.id_barang;
END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `stok` AFTER INSERT ON `detail_penjualan`
 FOR EACH ROW BEGIN
 UPDATE barang SET stok=stok-NEW.jumlah
 WHERE id_barang=NEW.id_barang;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE IF NOT EXISTS `hasil` (
`id_hasil` int(11) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `tahun` varchar(30) NOT NULL,
  `bulan` varchar(30) NOT NULL,
  `forcasting` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bulan` int(2) NOT NULL,
  `harga` int(11) NOT NULL,
  `hasil_penjualan` int(11) NOT NULL,
  `pendapatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `nama_barang`, `tahun`, `bulan`, `harga`, `hasil_penjualan`, `pendapatan`) VALUES
(1, 'Oli Motor', 2020, 1, 52000, 45, 2340000),
(2, 'Oli Motor', 2020, 2, 52000, 35, 1820000),
(3, 'Oli Motor', 2020, 3, 52000, 38, 1976000),
(4, 'Oli Motor', 2020, 4, 52000, 56, 2912000),
(5, 'Oli Motor', 2020, 5, 52000, 40, 2080000),
(6, 'Oli Motor', 2020, 6, 52000, 28, 1456000),
(7, 'Oli Motor', 2020, 7, 52000, 33, 1716000),
(8, 'Oli Motor', 2020, 8, 52000, 40, 2080000),
(9, 'Oli Motor', 2020, 9, 52000, 50, 2600000),
(10, 'Oli Motor', 2020, 10, 52000, 64, 3328000),
(11, 'Oli Motor', 2020, 11, 52000, 12, 624000),
(12, 'Oli Motor', 2020, 12, 52000, 37, 1924000),
(13, 'Oli Motor', 2021, 1, 52000, 30, 1560000),
(14, 'Oli Motor', 2021, 2, 52000, 32, 1664000),
(15, 'Oli Motor', 2021, 3, 52000, 28, 1456000),
(16, 'Oli Motor', 2021, 4, 52000, 30, 1560000),
(17, 'Oli Motor', 2021, 5, 52000, 36, 1872000),
(18, 'Oli Motor', 2021, 6, 52000, 19, 988000),
(19, 'Oli Motor', 2021, 7, 52000, 22, 1144000),
(20, 'Oli Motor', 2021, 8, 52000, 36, 1872000),
(21, 'Oli Motor', 2021, 9, 52000, 45, 2340000),
(22, 'Oli Motor', 2021, 10, 52000, 55, 2860000),
(23, 'Oli Motor', 2021, 11, 52000, 50, 2600000),
(24, 'Oli Motor', 2021, 12, 52000, 30, 1560000),
(25, 'Oli Motor', 2022, 1, 52000, 24, 1248000),
(26, 'Oli Motor', 2022, 2, 52000, 36, 1872000),
(27, 'Oli Motor', 2022, 3, 52000, 20, 1040000),
(28, 'Oli Motor', 2022, 4, 52000, 34, 1768000),
(29, 'Oli Motor', 2022, 5, 52000, 44, 2288000),
(30, 'Oli Motor', 2022, 6, 52000, 27, 1404000),
(31, 'Oli Motor', 2022, 7, 52000, 33, 1716000),
(32, 'Oli Motor', 2022, 8, 52000, 24, 1248000),
(33, 'Oli Motor', 2022, 9, 52000, 16, 832000),
(34, 'Oli Motor', 2022, 10, 52000, 32, 1664000),
(35, 'Oli Motor', 2022, 11, 52000, 36, 1872000),
(36, 'Oli Motor', 2022, 12, 52000, 24, 1248000);

-- --------------------------------------------------------

--
-- Table structure for table `peramalan`
--

CREATE TABLE IF NOT EXISTS `peramalan` (
`id_peramalan` int(11) NOT NULL,
  `bulan` varchar(4) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `hasil` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id_user` int(11) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `username`, `password`) VALUES
(1, 'Admin', 'admin', 'admin'),
(3, 'Riska', 'riska', 'riska');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
 ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
 ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
 ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `peramalan`
--
ALTER TABLE `peramalan`
 ADD PRIMARY KEY (`id_peramalan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `peramalan`
--
ALTER TABLE `peramalan`
MODIFY `id_peramalan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
