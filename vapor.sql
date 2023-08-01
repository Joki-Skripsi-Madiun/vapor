-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 31, 2023 at 06:08 AM
-- Server version: 8.0.31
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vapor`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(255) NOT NULL,
  `id_kategori` int NOT NULL,
  `jumlah_barang` int NOT NULL,
  `harga_barang` int NOT NULL,
  `foto` varchar(225) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `id_kategori`, `jumlah_barang`, `harga_barang`, `foto`) VALUES
(1, 'Caliburn', 1, 88, 350000, '1689926834_c12dfad27308c0b753bf.png'),
(3, 'Pod caliburn', 2, 87, 500000, '1689926583_c344c855ebac758f284e.png'),
(4, 'dfsfsadr32342 fgsr23423', 1, 3, 23333, '1690783679_d50257403553e2aafb62.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

DROP TABLE IF EXISTS `detail_transaksi`;
CREATE TABLE IF NOT EXISTS `detail_transaksi` (
  `id_detail` int NOT NULL AUTO_INCREMENT,
  `id_transaksi` int NOT NULL,
  `id_barang` int NOT NULL,
  `qty` int NOT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `id_barang`, `qty`) VALUES
(10, 6, 3, 2),
(11, 7, 1, 2),
(12, 7, 3, 1),
(13, 8, 1, 2),
(14, 8, 3, 1),
(15, 9, 3, 1),
(16, 10, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'vape mini'),
(2, 'Pod');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id_pembayaran` int NOT NULL AUTO_INCREMENT,
  `nama_pembayaran` varchar(255) NOT NULL,
  `nomer` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `nama_pembayaran`, `nomer`) VALUES
(2, 'Bank BCA', '901808100');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int NOT NULL AUTO_INCREMENT,
  `id_pembayaran` int NOT NULL,
  `id_user` int NOT NULL,
  `tgl` date NOT NULL,
  `ekspedisi` varchar(60) NOT NULL,
  `no_resi` bigint DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `bukti_pembayaran` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pembayaran`, `id_user`, `tgl`, `ekspedisi`, `no_resi`, `keterangan`, `bukti_pembayaran`) VALUES
(6, 2, 2, '2023-07-23', 'Ambil di Toko', 2131231431, 'Membeli 2', '1690781145_fe2f5ebce87ccf5ab254.jpg'),
(7, 0, 2, '2023-07-23', '', 0, '', ''),
(8, 2, 2, '2023-07-24', 'J&T', 32423423, 'beli', '1690780875_cc1648fc1367d5acbc32.jpg'),
(9, 2, 2, '2023-07-27', '', 2342342423, 'sdsdds', '1690464336_a5c99d46dab2fccc9da2.jpg'),
(10, 2, 1, '2023-07-31', 'JNE', 0, 'azzazazaza', '1690778366_7b7919d4d69d35520b01.jpg'),
(11, 2, 2, '2023-07-31', 'J&T', 23424232323232, 'sdfsf', '1690778622_b58739bcfcc05555aa77.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `tlp` varchar(255) NOT NULL,
  `alamat` varchar(80) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `tlp`, `alamat`, `password`, `role`) VALUES
(1, 'admin baru', 'admin1', '09875656565', '', '$2y$10$IQuwnnjyC9hZOQGmjAOyb.I8yIsRn7yQjw9bAglNkXvplw5a31Zr.', 1),
(2, 'aisah', 'aisah21', '989879879', 'ihkihkj', '$2y$10$IQuwnnjyC9hZOQGmjAOyb.I8yIsRn7yQjw9bAglNkXvplw5a31Zr.', 2),
(4, 'Anatasya', 'anatasya1', '09817181718', '', '$2y$10$1CTwy2kq1V9IvKuGW/rubuG4HLg7kwZ71OI31soxTDQvwhyftb59K', 1),
(5, 'Eka Namira', 'qwreqqw', '2134124312', 'qwedq', '$2y$10$i/LxH1y24q1EixWcMi6rPuNDMcK8yuGmVykMZNToZEeUwj9c6/BKC', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
