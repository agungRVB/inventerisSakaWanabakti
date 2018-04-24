-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2017 at 11:37 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pramuka`
--

-- --------------------------------------------------------

--
-- Table structure for table `bukutamu`
--

CREATE TABLE `bukutamu` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bukutamu`
--

INSERT INTO `bukutamu` (`id`, `nama`, `email`, `komentar`) VALUES
(1, 'agung', 'asdjkfhadsjfh', 'fdsajhfjkdshfjkdhfdsa'),
(2, 'asakasa', 'kksalhsd', 'jksdfjkgfkdsf');

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
-- Table structure for table `log_book`
--

CREATE TABLE `log_book` (
  `kd_kegitan` int(10) NOT NULL,
  `kegiatan` varchar(100) NOT NULL,
  `tgl_kegiatan` varchar(50) NOT NULL,
  `deskripsi_kegiatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_book`
--

INSERT INTO `log_book` (`kd_kegitan`, `kegiatan`, `tgl_kegiatan`, `deskripsi_kegiatan`) VALUES
(1, 'Perti Kalpataru 2016', '05/05/2016', '               -	Yoga arif wibowo		: Staf Lurah Putra<br>\r\n-	Agung indra cahyono	: Lurah Putra<br>\r\n-	Diah fitria ningrum		: staf lurah putri<br>\r\n-	Putri puji lestari		: giat prestasi<br>\r\n                    '),
(2, 'Raimuna Ranting Mijen', '12/08/2016', 'kegiatan berlangsung selama 3 hari 12 - 14 agustus 2016 bertemakan "Budaya", dan di isi dengan berbagai kegiatan yang beracu pada wawasan, bakti, dan budaya dan banya kegiatan menarik lainya, yang di ikuti peserta peegak dan pandega di Kwarran Mijen dan Sekitarnya'),
(3, 'seleksi DKR Mijen 2016', '31/01/2016', 'menyeleksi T/D Se-Kwarran Mijen untuk, kaderisasi DKR'),
(4, 'PARTISIPASI PESTA SIAGA', '22/02/2016', 'partisipasi kegiatan kwarran mijen sinambi menyeleksi anggota baru DKR'),
(5, 'KEAKRABAN DKR MIJEN (MEI)', '01/05/2016', 'mengakrabkan anggota DKR terutama anggota baru dengan anggota yang sudah ada'),
(6, 'TURBA SMK PALAPA SEMARANG (KEMAH BESAR SMK PALAPA SEMARANG)', '20/05/2016', '- Pemantauan kegiatan kemah besar \r\n- Pola pembinaan smk palapa semarang'),
(7, 'Posko lebaran 2016', '28/06/2016', '1. Memantau pemudik yang melintasi posko lebaran\r\n2. Mengkondisikan pemudik yang memasuki posko\r\n3. Memberi fasilitas kepada pemudik\r\n'),
(8, 'Delegasi Pershabara 2016', '28/10/2016', 'Delegasi Perkemahan Saka Bhayangkara 2016 bertugas sebagai staf lurah'),
(9, 'Diklat dan sidang bantara SMA Unggulan Nurul Islami ', '29/10/2016', 'Pemantauan kegiatan dan pemberian informasi mengenai kepramukaan kepada gugus depan '),
(10, 'Pendadaran dan pelantikan bantara smk palapa semarang', '06/03/2016', 'Pemantauan jalannya kegiatan berlangsung dan pola pembinaan dewan kerja ranting mijen kepada anggota ambalan SMK Palapa Semarang'),
(11, 'Diklat dan pelantikan ambalan SMA N 13 Semarang', '14/05/2016', 'Pemantauan kegiatan ambalan SMA N 13 Semarang'),
(12, 'Keakraban DKR Mijen ', '05/11/2016', 'sharing sesama anggota dkr mijen'),
(13, 'TURBA LATIHAN KONSERVASII ANGGREK', '16/11/2016', 'penanaman bibit anggrek saka kalpataru dota semarang di desa sodong kecamatan mijen\r\n'),
(14, 'TURBA LATIHAN SAKA PARIWISATA', '07/12/2016', '-');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `kd_surat` int(10) NOT NULL,
  `judul_surat` varchar(50) NOT NULL,
  `nmr_surat` varchar(30) NOT NULL,
  `prihal` varchar(30) NOT NULL,
  `tgl_surat` varchar(12) NOT NULL,
  `jenis_surat` int(1) NOT NULL,
  `pengirim` varchar(50) NOT NULL,
  `penerima` varchar(400) NOT NULL,
  `tema` varchar(30) NOT NULL,
  `lampiran` varchar(100) NOT NULL,
  `bukti_surat` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`kd_surat`, `judul_surat`, `nmr_surat`, `prihal`, `tgl_surat`, `jenis_surat`, `pengirim`, `penerima`, `tema`, `lampiran`, `bukti_surat`, `keterangan`) VALUES
(1, 'Pengiriman Pasukan ETK 2016', '84/11.33.015-C/2016', 'Pengiriman Pasukan', '31/08/2016', 2, 'tata usaha', 'SMA/SMK Se-Kwartir ranting mijen', 'Estafet Tunas Kelapa 2016', '1 lembar', '../bukti_surat/6174surat pengiriman pasuakn ETK 2016.pdf', 'hari, tanggal : Sabtu, 3 September 2016\r\nwaktu : 08.00-selesai\r\nTempat : Jln.Kol Sugiyono'),
(2, 'Permohonan Ijin Tempat  keakraban DKR Mijen', '030/33.015-J', 'Permohonan Ijin Tempat', '25/10/2016', 2, 'tata usaha', 'Kepala Penglola Desa Medini', 'keakraban Dewan Kerja Ranting ', '-', '../bukti_surat/5517surat peminjaman tempat medini.pdf', 'permohonan ijin tempat untuk keakraban DKR mijen '),
(3, 'PENDELEGASIAN PESERTA RAIRAN I MIJEN', '027/33.015-j', 'PEDELEGASIAN PESERTA RAIRAN', '17/07/2016', 2, 'tata usaha', 'KETUA KWARTI RANTING TEMBALANG', 'RAIMUNA RANTING I MIJEN', '2', '../bukti_surat/6310surat pendelegasian peserta rairan.pdf', 'KILAT'),
(4, 'Pendelegasian Sangga Kerja Rairan I Mijen', '027/33.015-J', 'Pendelegasian Sangga Kerja', '17/07/2016', 2, 'tata usaha', 'Ketua DKR Semarang Timur; Pin Saka Wanabakti; Pin ', 'RAIMUNA RANTING I MIJEN', '2 lembar', '../bukti_surat/9151delegasi sangker.docx', '-'),
(5, 'Izin orang tua Perkemahan Raimuna Ranting Mijen ke', '026/33.015-J', 'Izin orang tua', '17/07/2016', 2, 'tata usaha', 'Bapak/Ibu orang tua anggota DKR 33.15 Mijen', 'Perkemahan Raimuna Ranting Mij', '-', '../bukti_surat/4541disposisi dan ijin.docx', '-'),
(6, 'Pendelegasian Peserta Perkemahan Raimuna Ranting M', '027/33.015-J', 'Pendelegasian Peserta', '17/07/2017', 2, 'tata usaha', 'SMA N 13 Semarang; SMA N 16 Semarang; SMA Unggulan Nurul Islami Semarang; SMA Al-Azhar 16 Semarang; SMK Nurul Islami Semarang; SMK NU Maâ€™arif Semarang; SMK Palapa Semarang;SMA Askhabul Kahfi Semarang; MA Polaman Semarang', 'Perkemahan Raimuna Ranting Mij', '2 lembar', '../bukti_surat/6664edaran ambalan.docx', '-'),
(7, 'Permohonan Menjadi Juri Perkemahan Raimuna Ranting', '025/33.015-J	', 'Permohonan Menjadi Juri', '17/07/2016', 2, 'tata usaha', 'Ketua PKK Ds. Sodong', 'Perkemahan Raimuna Ranting Mij', '1 lembar', '../bukti_surat/5502juri.docx', '-'),
(8, 'Permohonan Menjadi Pemateri Perkemahan Raimuna Ran', '025/33.015-J', 'Permohonan Menjadi Pemateri', '17/07/2016', 2, 'tata usaha', 'Ketua Forum Indonesia Muda Regional Semarang; Ketua Forum Indonesia Muda Regional Semarang; Ketua Sobat Bumi Chapter Semarang; Ketua Forum Komunikasi Komunitas Sosial Pendidikan Kota Semarang; Rifa Irwan Sani; Ki Dartono Amijoyo;Dawud Budiharto;  Bpk. Hera; Ketua Kelas Insprasi Regional Semarang;', 'Perkemahan Raimuna Ranting Mij', '2 lembar', '../bukti_surat/9959pemateri.docx', '-'),
(9, 'Permohonan Ijin Pinjam Tempat Perkemahan Raimuna R', '022/33.015-J', 'Permohonan Ijin Pinjam Tempat;', '17/07/2016', 2, 'tata usaha', 'Kepala SDN Purwosari 01 Semarang; Ka. Kwarcab Kota Semarang;Kepala SDN Purwosari 01 Semarang', 'Perkemahan Raimuna Ranting Mij', '2 lembar', '../bukti_surat/5001peminjaman sarpras dan tempat.docx', '-'),
(10, 'Permohonan Pengisi Acara Perkemahan Raimuna Rantin', '028/33.015-J', 'Permohonan Pengisi Acara ', '17/07/2016', 2, 'tata usaha', 'Kepala SMPN 23 Semarang', 'Perkemahan Raimuna Ranting Mij', '-', '../bukti_surat/9402permintaan pengisi acara.docx', '-'),
(11, 'Pemberitahuan Kegiatan Perkemahan Raimuna Ranting ', '024/33.015-J	', 'Pemberitahuan Kegiatan', '17/06/2016', 2, 'tata usaha', 'Kepala Dinas Kesehatan Kota Semarang; Kepala PUSKESMAS Mijen', 'Perkemahan Raimuna Ranting Mij', '1 lembar', '../bukti_surat/7073surat dikes rairan.docx', '-'),
(12, 'Permohonan Ijin Pinjam Tempat Perkemahan Raimuna R', '022/33.015-J', 'Permohonan Ijin Pinjam Tempat', '20/06/2016', 2, 'tata usaha', 'Bapak Camat Mijen', 'Technical Meeting Sangga Kerja', '-', '../bukti_surat/1828SURAT pinjam tempat.docx', '-'),
(13, 'Permohonan Peserta Persabhara 2016', '076/1133-J', 'Permohonan Sangga Kerja Persab', '05/10/2016', 1, 'KWARCAB KOTA SEMARANG', 'tata usaha', 'Persabhara 2016', '-', '../bukti_surat/4223masuk- sangker persabara.pdf', 'yang mewakilkan kak diah fitria ningrum'),
(14, 'Kegiatan Temu DKR ke-3', '444/1133-B', 'Kegiatan Temu DKR ke-3', '04/12/2016', 1, 'KWARCAB KOTA SEMARANG', 'tata usaha', 'temu DKR', '1', '../bukti_surat/5516masuk- temu DKR.pdf', '-'),
(15, 'Pemberitahunan Perkemahan Tegak Tamu SMA Nuris', '003/Pan.PA/SMA.NI/II/2017', 'Pemberitahunan ', '21/01/2017', 1, 'SMA Unggulan Nurul Islami Semarang', 'tata usaha', 'Perkemahan Tegak Tamu SMA Nuri', '-', '../bukti_surat/5675masuk- tegak tamu sma nuris.pdf', '-'),
(16, 'Permohonan Kehadiran DKR Mijen Tegak Tamu SMAN 13 ', '001/GP/BRA-PIT/10/16', 'Permohonan', '10/10/2016', 1, 'SMAN 13 Semarang', 'tata usaha', 'Tegak tamu SMAN 13 Semarang 20', '2 lembar', '../bukti_surat/7849masuk tegak tamu sman 13.pdf', '-');

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
(1, 'sekertaris', 'agung'),
(3, 'a', 'a'),
(4, 'DKR', 'DKR'),
(5, 'sekertaris', 'agung'),
(6, 'dkr', 'dkr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukutamu`
--
ALTER TABLE `bukutamu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  ADD PRIMARY KEY (`kd_jenis`);

--
-- Indexes for table `log_book`
--
ALTER TABLE `log_book`
  ADD PRIMARY KEY (`kd_kegitan`);

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
-- AUTO_INCREMENT for table `bukutamu`
--
ALTER TABLE `bukutamu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  MODIFY `kd_jenis` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `log_book`
--
ALTER TABLE `log_book`
  MODIFY `kd_kegitan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `kd_surat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
