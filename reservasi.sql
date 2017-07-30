-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost:8080
-- Generation Time: Jul 30, 2017 at 10:52 PM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservasi_lapang`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id` int(11) UNSIGNED NOT NULL,
  `kode_reservasi` varchar(16) NOT NULL,
  `id_user` mediumint(8) UNSIGNED NOT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `email` text,
  `no_hp` varchar(13) DEFAULT NULL,
  `id_detail_lapang` int(11) UNSIGNED NOT NULL,
  `status` int(1) DEFAULT NULL,
  `tanggal_reservasi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `durasi` int(11) NOT NULL DEFAULT '1',
  `tanggal` datetime NOT NULL DEFAULT '2017-07-27 00:43:05',
  `tanggal_update` datetime DEFAULT '2017-07-27 00:43:05'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id`, `kode_reservasi`, `id_user`, `nama_user`, `email`, `no_hp`, `id_detail_lapang`, `status`, `tanggal_reservasi`, `durasi`, `tanggal`, `tanggal_update`) VALUES
(1, 'BO20170727170221', 3, 'Ajid', NULL, NULL, 1, 3, '2017-07-27 09:00:00', 1, '2017-07-27 00:43:05', '2017-07-30 16:21:07'),
(4, 'BO20170730151216', 9, 'ace', 'ac@gmail.com', '0222', 1, 3, '2017-07-30 15:12:16', 1, '2017-07-30 15:39:46', '2017-07-30 16:26:27'),
(5, 'BO20170730154603', 10, 'Asdam', 'dx.excel@gmail.com', '0225858', 1, 1, '2017-07-30 19:00:00', 1, '2017-07-30 15:46:35', '2017-07-30 18:35:53'),
(6, 'BO20170730222619', 11, '12345678', 'ab@cdh.com', '12345678', 8, 3, '2017-07-30 15:00:00', 1, '2017-07-30 22:30:20', '2017-07-30 22:46:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_detail_lapang` (`id_detail_lapang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `reservasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservasi_ibfk_2` FOREIGN KEY (`id_detail_lapang`) REFERENCES `detail_lapang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
