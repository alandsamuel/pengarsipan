-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2017 at 09:16 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pengarsipan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `kode_admin` varchar(11) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `telepon` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `status` enum('Aktif','Tidak Aktif') COLLATE latin1_general_ci NOT NULL DEFAULT 'Aktif'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`kode_admin`, `username`, `password`, `telepon`, `email`, `gambar`, `status`) VALUES
('ADM02', 'a', 'a', '0234567845678', 'admin@yahoo.com', 'wifi.png', 'Aktif'),
('ADM03', 'array', 'array', '02345678923456', 'array@a.com', 'keys.jpg', 'Aktif'),
('ADM01', 'jokowi', 'jokowi', '021-11111111', 'presidenri@gmail.com', 'key.jpg', 'Aktif'),
('ADM17090', 'admin', 'admin', '00000000', 'aaaa@aaaa.com', 'avatar.jpg', 'Aktif'),
('ADM1709001', 'almer', 'rafi', '087718791005', 'aland_samuel@yahoo.com', 'avatar.jpg', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bagian`
--

CREATE TABLE IF NOT EXISTS `tb_bagian` (
  `id_bagian` varchar(12) NOT NULL,
  `nama_bagian` varchar(20) NOT NULL,
  `username_bagian` varchar(15) NOT NULL,
  `password_bagian` varchar(15) NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bagian`
--

INSERT INTO `tb_bagian` (`id_bagian`, `nama_bagian`, `username_bagian`, `password_bagian`, `tanggal_dibuat`) VALUES
('b1', 'hrd', 'b', 'b', '2017-08-12 05:41:49'),
('b2', 'keuangan', 'keu', 'keu', '2017-08-12 05:57:56');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE IF NOT EXISTS `tb_berita` (
`id_berita` int(11) NOT NULL,
  `judul` varchar(60) NOT NULL,
  `isi` text NOT NULL,
  `singkat` varchar(255) NOT NULL,
  `pembuat` varchar(30) NOT NULL,
  `dipost` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `judul`, `isi`, `singkat`, `pembuat`, `dipost`) VALUES
(2, '$judul', '$isi', '$singkat', '$pembuat', '2017-08-30 00:47:23'),
(3, 'test', 'test', 'test', 'a', '2017-08-30 00:55:36'),
(4, 'test 1', 'test', 'test', 'a', '2017-08-30 00:55:47'),
(6, 'teee', 'teeee', 'teeee', 'a', '2017-08-30 01:01:09'),
(7, 'teeeee', 'teeee', 'teeee', 'a', '2017-08-30 01:01:21'),
(8, 'tee', 'teee', 'teee', 'a', '2017-08-30 01:05:57');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE IF NOT EXISTS `tb_pegawai` (
  `id_pegawai` varchar(12) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `bagian_pegawai` varchar(20) NOT NULL,
  `email_pegawai` varchar(50) NOT NULL,
  `username_pegawai` varchar(50) NOT NULL,
  `password_pegawai` varchar(10) NOT NULL,
  `status_pegawai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `nama_pegawai`, `bagian_pegawai`, `email_pegawai`, `username_pegawai`, `password_pegawai`, `status_pegawai`) VALUES
('PEG17080', 'J-Cole', 'DITPONTREN', 'aland_samuel@yahoo.com', 'user', 'user', 'Aktif'),
('PEG1709001', 'almer', 'MENAG', 'almer@rafi.com', 'almer', 'rafi', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat`
--

CREATE TABLE IF NOT EXISTS `tb_surat` (
  `id_surat` varchar(10) NOT NULL,
  `tipe_surat` enum('sm','sk') NOT NULL,
  `klasifikasi_surat` varchar(3) NOT NULL,
  `tanggalterima_surat` date NOT NULL,
  `nourut_surat` int(10) NOT NULL,
  `no_surat` int(11) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `sifat_surat` enum('biasa','penting','rahasia','segera','sangatrahasia') NOT NULL,
  `status_surat` enum('diterima','proses','dibalas','diarsipkan') NOT NULL,
  `asal_surat` varchar(11) NOT NULL,
  `perihal_surat` varchar(255) NOT NULL,
  `lampiran_surat` varchar(11) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `tujuan_surat` varchar(12) NOT NULL,
  `pengelola_surat` varchar(8) NOT NULL,
  `lokasi_surat` varchar(20) NOT NULL,
  `deadline_surat` date NOT NULL,
  `file_surat` varchar(50) NOT NULL,
  `konfirmasi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_surat`
--

INSERT INTO `tb_surat` (`id_surat`, `tipe_surat`, `klasifikasi_surat`, `tanggalterima_surat`, `nourut_surat`, `no_surat`, `tanggal_surat`, `sifat_surat`, `status_surat`, `asal_surat`, `perihal_surat`, `lampiran_surat`, `catatan`, `tujuan_surat`, `pengelola_surat`, `lokasi_surat`, `deadline_surat`, `file_surat`, `konfirmasi`) VALUES
('SR', 'sk', 'HJ', '2017-09-12', 23, 123, '2017-09-14', 'biasa', 'diterima', 'asal', 'peri', 'lampi', 'catatan', 'DIKTIS', 'DITPAIS', '', '2017-09-15', 'Sistem Operasi.docx', 0),
('SR11', 'sk', 'HJ', '2017-09-13', 22, 123123, '2017-09-14', 'rahasia', 'diterima', 'sdasda', 'asdasd', 'asdasd', 'asdas', 'DITPENMAD', 'DITPAIS', '', '2017-09-14', '', 0),
('SR12', 'sk', 'HJ', '2017-09-06', 21, 123, '2017-09-14', 'biasa', 'diterima', 'asdas', 'asdas', 'asdada', 'adsada', 'DIKTIS', 'DITPAIS', '', '2017-09-13', 'Keamanan Komputer.do', 0),
('SR13', 'sk', 'HJ', '2017-09-06', 20, 123, '2017-09-12', 'biasa', 'diterima', 'asdas', 'asdas', 'asdada', 'adsada', 'DIKTIS', 'DITPAIS', '', '2017-09-13', 'Keamanan Komputer.do', 0),
('SR14', 'sk', 'HJ', '2017-09-13', 19, 123, '2017-09-10', 'biasa', 'diterima', 'DITPONTREN', 'adsasd', 'asdad', 'addas', 'DIKTIS', 'DITPAIS', '', '2017-09-14', 'materi HTML persenta', 0),
('SR15', 'sk', 'HJ', '2017-09-13', 18, 123, '2017-09-10', 'biasa', 'diterima', 'DITPONTREN', 'adsasd', 'asdad', 'addas', 'DIKTIS', 'DITPAIS', '', '2017-09-14', 'materi HTML persenta', 0),
('SR16', 'sk', 'HJ', '2017-09-13', 17, 123, '2017-09-10', 'biasa', 'diterima', 'DITPONTREN', 'adsasd', 'asdad', 'addas', 'DIKTIS', 'DITPAIS', '', '2017-09-14', 'materi HTML persenta', 0),
('SR17', 'sk', 'HJ', '2017-09-13', 16, 123, '2017-09-10', 'biasa', 'diterima', 'DITPONTREN', 'adsasd', 'asdad', 'addas', 'DIKTIS', 'DITPAIS', '', '2017-09-14', 'materi HTML persenta', 0),
('SR1708001', 'sm', 'HJ', '2017-08-01', 15, 10113575, '2017-08-23', 'penting', 'diterima', 'MENAG', 'iseng', '1', 'iseng', 'DITPAS', 'BAGI', '', '2017-08-24', 'iseng.doc', 0),
('SR1708002', 'sk', 'HJ', '2017-08-23', 14, 10113576, '2017-08-23', 'rahasia', 'proses', 'DIKTIS', 'iseng', 'LAMP1', 'iseng', 'DIRJEN', 'BAGII', '', '2017-08-24', 'iseng2.doc', 0),
('SR1708010', 'sk', 'HJ', '2017-08-01', 13, 10113575, '2017-08-23', 'penting', 'diterima', 'MENAG', 'iseng', '1', 'iseng', 'DITPONTREN', 'BAGI', '', '2017-08-24', 'iseng.doc', 1),
('SR18', 'sk', 'HJ', '2017-09-13', 12, 123, '2017-09-10', 'biasa', 'diterima', 'DITPONTREN', 'adsasd', 'asdad', 'addas', 'DIKTIS', 'DITPAIS', '', '2017-09-14', 'materi HTML persenta', 0),
('SR19', 'sk', 'HJ', '2017-09-13', 11, 123, '2017-09-10', 'biasa', 'diterima', 'DITPONTREN', 'adsasd', 'asdad', 'addas', 'DIKTIS', 'DITPAIS', '', '2017-09-14', 'materi HTML persenta', 0),
('SR20', 'sk', 'HJ', '2017-09-14', 10, 12312, '2017-09-12', 'rahasia', 'diterima', 'DITPONTREN', 'baru', 'baru', 'baru', 'MENAG', 'DITPAIS', '', '2017-09-16', '', 0),
('SR21', 'sk', 'Kla', '2017-09-14', 9, 1409, '2017-09-12', 'rahasia', 'diterima', 'DITPONTREN', '1409', '1409', '1409', 'DITPENMAD', 'DITPKPON', '', '2017-09-16', 'Form Sidang Skripsi.docx', 0),
('SR22', 'sm', 'kp', '2017-09-13', 8, 1409, '2017-09-12', 'rahasia', 'diterima', 'DITPONTREN', '1409', '1409', '1409', 'DITPONTREN', 'DITPKPON', '', '2017-09-16', 'Form Sidang Skripsi.docx', 1),
('SR23', 'sm', 'Kla', '2017-09-13', 7, 1509, '2017-09-14', 'biasa', 'diterima', 'DITPONTREN', '1509', '1509', '1509', 'DITPONTREN', 'DITPKPON', '', '2017-09-14', 'Form Sidang Skripsi.docx', 1),
('SR3', 'sm', 'HJ', '2017-06-11', 6, 10113578, '2017-06-13', 'biasa', 'diterima', 'asal', 'perihal', 'lampiran', 'catatan', 'DITPONTREN', 'DIRJEN', '', '0000-00-00', 'isi.docx', 1),
('SR4', 'sm', 'HJ', '2017-09-03', 5, 10113579, '2017-09-01', 'biasa', 'diterima', 'darimanasaj', 'perihalapasaja', 'lampirannya', 'catatin', 'DITPONTREN', 'DITPAIS', '', '0000-00-00', 'isi.docx', 1),
('SR5', 'sm', 'HJ', '2017-09-03', 4, 10113579, '2017-09-01', 'biasa', 'diterima', 'darimanasaj', 'perihalapasaja', 'lampirannya', 'catatin', '', '', '', '0000-00-00', 'isi.docx', 1),
('SR6', 'sm', 'HJ', '2017-09-03', 3, 10113579, '2017-09-01', 'rahasia', 'diterima', 'ASAL', 'PERI', 'LAMP', 'CATT', 'PENDIS', 'DIKTIS', '', '2017-09-06', 'ISI.DOCX', 0),
('SR7', 'sm', 'HJ', '2017-09-03', 2, 12312, '2017-09-03', 'penting', 'diterima', 'asdsa', 'asdasd', 'adasda', 'asdasd', 'DIKTIS', 'DIKTIS', '', '2017-09-03', '', 0),
('SR8', 'sm', 'HJ', '2017-09-03', 1, 12312, '2017-09-03', 'rahasia', 'diterima', 'asdasd', 'asdasda', 'asdasdsa', 'adasda', 'DIKTIS', 'DITPAIS', '', '2017-09-01', 'nilai utama.docx', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
 ADD PRIMARY KEY (`kode_admin`);

--
-- Indexes for table `tb_bagian`
--
ALTER TABLE `tb_bagian`
 ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
 ADD UNIQUE KEY `id_berita` (`id_berita`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
 ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tb_surat`
--
ALTER TABLE `tb_surat`
 ADD UNIQUE KEY `id_surat` (`id_surat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
