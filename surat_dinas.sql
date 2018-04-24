-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2017 at 09:12 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat_dinas`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_surat`
--

CREATE TABLE `jenis_surat` (
  `kd_jenis` int(1) NOT NULL,
  `jenis` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_surat`
--

INSERT INTO `jenis_surat` (`kd_jenis`, `jenis`) VALUES
(1, 'masuk'),
(2, 'keluar');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `kd_surat` int(10) NOT NULL,
  `judul_surat` varchar(50) NOT NULL,
  `nmr_surat` varchar(30) NOT NULL,
  `prihal` varchar(30) NOT NULL,
  `jenis_surat` int(1) NOT NULL,
  `pengirim` varchar(50) NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `tema` varchar(30) NOT NULL,
  `lampiran` varchar(100) NOT NULL,
  `bukti_surat` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`kd_surat`, `judul_surat`, `nmr_surat`, `prihal`, `jenis_surat`, `pengirim`, `penerima`, `tema`, `lampiran`, `bukti_surat`, `keterangan`) VALUES
(9, 'keluar', '002/DKR/08', 'peminjaman tempat', 2, 'tata usaha', 'UPTD Kecamatan miijen', '-', '4 lembar', '../bukti_surat/4596lambang swb.png', 'sadasdkasldsa'),
(11, 'effr', 'ggfg', 'vhvhgv', 1, 'huyu', 'tata usaha', 'yuytyu', 'uytuyt', '../bukti_surat/311proposal komaber cup (fix).docx', 'hgkhgkhgkhg'),
(12, 'asdfdsl', 'asdfa', 'acasdmk', 1, 'dsafas', 'tata usaha', 'kadms', 'mkmkasd', '../bukti_surat/3321simpul.docx', 'asdfkasmdkss'),
(13, 'asdf', 'adsfd', 'asdf', 1, 'adfas', 'tata usaha', 'adsf', 'assfa', '../bukti_surat/1486sandi morse.docx', 'asdfasf'),
(14, 'ddsf', 'sdfsd', 'sdfsd', 1, 'dsfs', 'tata usaha', 'dsfds', 'sdfs', '../bukti_surat/4580IMG-20160823-WA0006.jpg', 'dsfsdf'),
(15, 'ffdg', 'fdfsgs', 'sdfgs', 2, 'tata usaha', 'sdfgds', 'sfds', 'sdfgs', '../bukti_surat/3165mas pri.pdf', 'sdfgsf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `namauser` varchar(50) NOT NULL,
  `sandi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `namauser`, `sandi`) VALUES
(1, 'hiro', 'hiro'),
(3, 'a', 'a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  ADD PRIMARY KEY (`kd_jenis`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`kd_surat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  MODIFY `kd_jenis` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `kd_surat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
