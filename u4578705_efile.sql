-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 26, 2019 at 02:41 PM
-- Server version: 10.2.29-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u4578705_efile`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `tglrapat` date NOT NULL,
  `deskripsi` text NOT NULL,
  `notulen` varchar(128) NOT NULL,
  `user` varchar(100) NOT NULL,
  `tgldetline` date NOT NULL,
  `caption_menu` text NOT NULL,
  `id_bantuan` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `arsip`
--

CREATE TABLE `arsip` (
  `id_arsip` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `id_agenda` int(11) NOT NULL,
  `tgl_upload` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `loc_file` varchar(255) NOT NULL,
  `desc_file` text NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `log_user` varchar(100) NOT NULL,
  `pengirim` varchar(255) NOT NULL,
  `menu_caption` text NOT NULL,
  `jenis_surat` int(100) NOT NULL,
  `id_status` int(10) NOT NULL,
  `id_jabatan` int(10) DEFAULT NULL,
  `uraian` text NOT NULL,
  `ditanggapi` text DEFAULT NULL,
  `dibaca` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arsip`
--

INSERT INTO `arsip` (`id_arsip`, `menu_id`, `id_agenda`, `tgl_upload`, `loc_file`, `desc_file`, `nama_file`, `log_user`, `pengirim`, `menu_caption`, `jenis_surat`, `id_status`, `id_jabatan`, `uraian`, `ditanggapi`, `dibaca`) VALUES
(46, 70, 0, '2019-12-17 14:37:24', 'SCANNER_PT_MY_ICON_TEKNOLOGI.pdf', 'scanner', '700.12/LKSA/2019', 'superadmin', '', '', 0, 0, NULL, '', NULL, NULL),
(48, 71, 0, '2019-12-17 15:04:35', 'besar_file_diatas_2_MB.pdf', 'upload file ditas 2 MB', '-', 'admin', '', '', 0, 0, NULL, '', NULL, NULL),
(49, 57, 0, '2019-12-18 01:51:11', 'notulen_rapat_1.pdf', 'Contoh', '123', 'superadmin', '', '', 0, 0, NULL, '', NULL, NULL),
(50, 77, 0, '2019-12-20 17:46:17', '111.pdf', 'tesssupload', '1', 'superadmin', '', '', 0, 0, NULL, '', NULL, NULL),
(51, 77, 0, '2019-12-20 17:46:30', 'BPJS1.pdf', 'tes2', '2', 'superadmin', '', '', 0, 0, NULL, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `level`) VALUES
(1, 'superadmin'),
(2, 'admin'),
(3, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0 COMMENT '0 if menu is root level or menuid if this is child on any menu',
  `link` varchar(255) NOT NULL,
  `class_id` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 for disabled menu or 1 for enabled menu'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `parent_id`, `link`, `class_id`, `status`) VALUES
(57, 'BIDANG A', 0, '#', 0, '1'),
(58, 'DANA BANSOS', 0, '#', 0, '1'),
(59, 'DANA HIBAH', 0, '#', 0, '1'),
(60, 'SURAT-SURAT', 0, '#', 0, '1'),
(62, 'LAPORAN', 0, '#', 0, '1'),
(67, 'LKSA', 58, '#', 0, '1'),
(68, 'KUBE', 58, '#', 0, '1'),
(69, 'BEDAH RUMAH', 58, '#', 0, '1'),
(70, '2017-2018', 67, '#', 0, '1'),
(71, '2019', 67, '#', 0, '1'),
(72, '2020', 67, '#', 0, '1'),
(73, '2017-2018', 68, '#', 0, '1'),
(74, '2019', 68, '#', 0, '1'),
(76, '2019', 57, '#', 0, '1'),
(77, 'RAPAT', 76, '#', 0, '1'),
(78, 'Hibah ke Rumah Ibadah', 59, '#', 0, '1'),
(79, 'Hibah ke Lembaga Organisasi', 59, '#', 0, '1'),
(80, 'Hibah ke Sekolah Swasta', 59, '#', 0, '1'),
(81, 'BOP PAUD', 59, '#', 0, '1'),
(82, '2017-2018', 78, '#', 0, '1'),
(83, '2019', 78, '#', 0, '1'),
(85, '2020', 78, '#', 0, '1'),
(86, '2017-2018', 79, '#', 0, '1'),
(87, '2019', 79, '#', 0, '1'),
(88, '2020', 79, '#', 0, '1'),
(89, '2017-2018', 80, '#', 0, '1'),
(90, '2019', 80, '#', 0, '1'),
(91, '2020', 80, '#', 0, '1'),
(92, '2017-2018', 81, '#', 0, '1'),
(93, '2019', 81, '#', 0, '1'),
(94, '2020', 81, '#', 0, '1'),
(95, '2019', 60, '#', 0, '1'),
(96, '2020', 60, '#', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id_jabatan` int(10) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `dihapus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id_jabatan`, `nama_jabatan`, `dihapus`) VALUES
(6, 'Bagian Keuangan', 'tidak'),
(7, 'Kepala Bagian', 'tidak'),
(8, 'Kepala Keuangan', 'ya'),
(9, 'Wakil Direktur', 'tidak');

-- --------------------------------------------------------

--
-- Table structure for table `track`
--

CREATE TABLE `track` (
  `id_track` int(10) NOT NULL,
  `id_arsip` int(11) DEFAULT NULL,
  `urut` int(5) DEFAULT NULL,
  `id_jabatan` int(10) DEFAULT NULL,
  `file_upload` varchar(255) NOT NULL,
  `dibaca` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `track`
--

INSERT INTO `track` (`id_track`, `id_arsip`, `urut`, `id_jabatan`, `file_upload`, `dibaca`) VALUES
(7, 1694, 1, 7, 'view_rapat_sidang.PNG', '1'),
(8, 1694, 2, 8, 'Contoh-surat-lamaran-kerja-pdf.pdf', '1'),
(9, 1694, 3, 9, 'Contoh_1.pdf', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `id_level`, `username`, `password`) VALUES
(4, 1, 'superadmin', 'superadmin'),
(94, 3, 'user', 'user'),
(95, 2, 'admin', 'admin'),
(96, 2, 'supriadi', '1234a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `arsip`
--
ALTER TABLE `arsip`
  ADD PRIMARY KEY (`id_arsip`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `track`
--
ALTER TABLE `track`
  ADD PRIMARY KEY (`id_track`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1577;

--
-- AUTO_INCREMENT for table `arsip`
--
ALTER TABLE `arsip`
  MODIFY `id_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id_jabatan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `track`
--
ALTER TABLE `track`
  MODIFY `id_track` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
