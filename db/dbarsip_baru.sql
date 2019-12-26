-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Okt 2019 pada 13.28
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbarsip_baru`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda`
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
-- Struktur dari tabel `arsip`
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
-- Dumping data untuk tabel `arsip`
--

INSERT INTO `arsip` (`id_arsip`, `menu_id`, `id_agenda`, `tgl_upload`, `loc_file`, `desc_file`, `nama_file`, `log_user`, `pengirim`, `menu_caption`, `jenis_surat`, `id_status`, `id_jabatan`, `uraian`, `ditanggapi`, `dibaca`) VALUES
(19, 3, 0, '2019-10-14 13:07:47', 'Capture.PNG', 'asasa', '21212', 'superadmin', '', '', 0, 0, NULL, '', NULL, NULL),
(26, 18, 0, '2019-10-16 15:08:14', 'PKM_LAKAWALI.pdf', 'Testing', '123456', 'superadmin', '', '', 0, 0, NULL, '', NULL, NULL),
(27, 18, 0, '2019-10-18 10:49:05', '9LINGKUNGAN_HIDUP.pdf', 'Testing 2', '21212', 'superadmin', '', '', 0, 0, NULL, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `level`) VALUES
(1, 'superadmin'),
(2, 'admin'),
(3, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
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
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `parent_id`, `link`, `class_id`, `status`) VALUES
(1, 'BAGIAN UMUM', 0, '#', 0, '1'),
(2, '2019', 1, '#', 0, '1'),
(3, 'JANUARI', 2, '#', 0, '1'),
(4, 'FEBRUARI', 2, '#', 0, '1'),
(5, '2020', 1, '#', 0, '1'),
(6, 'JANUARI', 5, '#', 0, '1'),
(7, 'FEBRUARI', 5, '#', 0, '1'),
(8, 'RAPAT SIDANG', 0, '#', 0, '1'),
(9, 'SURAT MASUK', 8, '#', 0, '1'),
(10, 'SURAT KELUAR', 8, '#', 0, '1'),
(11, '2018', 9, '#', 0, '1'),
(12, 'JANUARI', 11, '#', 0, '1'),
(13, 'FEBRUARI', 11, '#', 0, '1'),
(14, '2018', 10, '#', 0, '1'),
(15, 'JANUARI', 14, '#', 0, '1'),
(16, 'FEBRUARI', 14, '#', 0, '1'),
(18, 'DATA UMUM TESTING', 0, '#', 0, '1'),
(21, '2019', 9, '#', 0, '1'),
(22, 'JANUARI', 21, '#', 0, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id_jabatan` int(10) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `dihapus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id_jabatan`, `nama_jabatan`, `dihapus`) VALUES
(6, 'Bagian Keuangan', 'tidak'),
(7, 'Kepala Bagian', 'tidak'),
(8, 'Kepala Keuangan', 'ya'),
(9, 'Wakil Direktur', 'tidak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `track`
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
-- Dumping data untuk tabel `track`
--

INSERT INTO `track` (`id_track`, `id_arsip`, `urut`, `id_jabatan`, `file_upload`, `dibaca`) VALUES
(7, 1694, 1, 7, 'view_rapat_sidang.PNG', '1'),
(8, 1694, 2, 8, 'Contoh-surat-lamaran-kerja-pdf.pdf', '1'),
(9, 1694, 3, 9, 'Contoh_1.pdf', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `id_level`, `username`, `password`) VALUES
(4, 1, 'superadmin', '12345'),
(89, 2, 'admin', 'admin'),
(90, 3, 'user', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indeks untuk tabel `arsip`
--
ALTER TABLE `arsip`
  ADD PRIMARY KEY (`id_arsip`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indeks untuk tabel `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `track`
--
ALTER TABLE `track`
  ADD PRIMARY KEY (`id_track`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1577;

--
-- AUTO_INCREMENT untuk tabel `arsip`
--
ALTER TABLE `arsip`
  MODIFY `id_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id_jabatan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `track`
--
ALTER TABLE `track`
  MODIFY `id_track` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
