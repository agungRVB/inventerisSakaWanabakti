-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2017 at 07:38 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `aset`
--

CREATE TABLE `aset` (
  `kd_aset` int(5) NOT NULL,
  `nm_aset` varchar(50) NOT NULL,
  `jml_aset` int(10) NOT NULL,
  `jml_baik` int(10) NOT NULL,
  `jml_rusak` int(10) NOT NULL,
  `keterangan` text NOT NULL,
  `stts` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aset`
--

INSERT INTO `aset` (`kd_aset`, `nm_aset`, `jml_aset`, `jml_baik`, `jml_rusak`, `keterangan`, `stts`) VALUES
(1, 'Tongkat', 28, 24, 4, 'baik', 1),
(2, 'tali', 10, 8, 2, 'sdfsasdf', 1),
(3, 'bendera cikal', -7, -7, 0, '-', 1),
(4, 'bedera merah putih', 4, 4, 0, '-', 1),
(5, 'dudukan bendera', 0, 0, 0, 'sdfjlaskdfjklsdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `kd_pinjam` int(11) NOT NULL,
  `kd_aset` int(11) NOT NULL,
  `nm_peminjam` varchar(50) NOT NULL,
  `jml_baik` int(11) NOT NULL,
  `jml_rusak` int(11) NOT NULL,
  `tgl_pinjam` varchar(11) NOT NULL,
  `keterangan` text NOT NULL,
  `stts_pinjam` enum('Pinjam','Dikembalikan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`kd_pinjam`, `kd_aset`, `nm_peminjam`, `jml_baik`, `jml_rusak`, `tgl_pinjam`, `keterangan`, `stts_pinjam`) VALUES
(2, 3, 'agung', 4, 0, '20/08/2017', 'sa ae lu', 'Dikembalikan'),
(3, 2, '', 3, 0, '12/09/2017', 'akan di kembalikan tgl 20', 'Dikembalikan'),
(6, 2, '', 3, 1, '17/09/2017', 'd', 'Pinjam'),
(7, 3, 'iindra', 4, 0, '12/09/2017', 'disileh kae', 'Dikembalikan');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `kd_kembali` int(10) NOT NULL,
  `kd_pinjam` int(10) NOT NULL,
  `kd_aset` int(5) NOT NULL,
  `jml_baik` int(10) NOT NULL,
  `jml_rusak` int(10) NOT NULL,
  `tgl_kembali` varchar(10) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`kd_kembali`, `kd_pinjam`, `kd_aset`, `jml_baik`, `jml_rusak`, `tgl_kembali`, `keterangan`) VALUES
(1, 3, 3, 4, 5, '14-09-2917', ''),
(2, 4, 2, 4, 4, '15/09/2017', 'keterangan'),
(3, 2, 3, 3, 0, '15/06/2017', 'lengkap'),
(4, 7, 3, 4, 0, '16/09/2017', 'lengkap'),
(5, 3, 2, 3, 0, '16/09/2017', 'adf');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `kd_pesan` int(10) NOT NULL,
  `kd_aset` int(5) NOT NULL,
  `jml_pesan` varchar(30) NOT NULL,
  `tgl_pesan` varchar(10) NOT NULL,
  `keterangan` text NOT NULL,
  `stts_pesan` enum('1','2','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`kd_pesan`, `kd_aset`, `jml_pesan`, `tgl_pesan`, `keterangan`, `stts_pesan`) VALUES
(3, 4, '50', '16/09/2017', 'adfaf', '1'),
(4, 1, '2', '16/09/2017', 'okok', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `namauser` varchar(30) NOT NULL,
  `sandi` varchar(30) NOT NULL,
  `level_akses` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `namauser`, `sandi`, `level_akses`) VALUES
(1, 'admin', 'admin', '1'),
(2, 'andi', 'andi', '3'),
(3, 'kaka', '1', '1'),
(4, 'ika', '123', '3'),
(5, 'didit', 'didit', '2'),
(6, 'koko', 'koko', '1'),
(7, 'eko', 'eko', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`kd_aset`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`kd_pinjam`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`kd_kembali`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`kd_pesan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aset`
--
ALTER TABLE `aset`
  MODIFY `kd_aset` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `kd_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `kd_kembali` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `kd_pesan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
