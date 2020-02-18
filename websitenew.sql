-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28 Jan 2020 pada 09.32
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websitenew`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblauth`
--

CREATE TABLE `tblauth` (
  `id` int(11) NOT NULL,
  `depart` varchar(100) NOT NULL,
  `depget` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `userType` varchar(20) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblauth`
--

INSERT INTO `tblauth` (`id`, `depart`, `depget`, `username`, `password`, `userType`, `CreationDate`, `UpdationDate`) VALUES
(54, 'Admin', 'Admin', 'admin', 'admin123', 'admin', '2020-01-22 17:00:00', NULL),
(76, 'Akuntansi', 'Akuntansi', 'akuntansi', 'petrokimia17', 'user', '2020-01-27 17:00:00', NULL),
(77, 'Anggaran', 'Anggaran', 'anggaran', 'petrokimia18', 'user', '2020-01-27 17:00:00', NULL),
(61, 'Audit Administrasi', 'Audit Administrasi', 'audit_ap', 'petrokimia2', 'user', '2020-01-27 17:00:00', NULL),
(60, 'Audit Operasional', 'Audit Operasional', 'audit_op', 'petrokimia1', 'user', '2020-01-27 17:00:00', NULL),
(107, 'Corporate Social Responsibility', 'Corporate Social Responsibility', 'csr', 'petrokimia47', 'user', '2020-01-27 17:00:00', NULL),
(73, 'Distribusi Wilayah I', 'Distribusi Wilayah I', 'distribusi_wil', 'petrokimia14', 'user', '2020-01-27 17:00:00', NULL),
(74, 'Distribusi Wilayah II', 'Distribusi Wilayah II', 'distribusi_wil2', 'petrokimia15', 'user', '2020-01-27 17:00:00', NULL),
(98, 'Fabrikasi', 'Fabrikasi', 'fabrikasi', 'petrokimia38', 'user', '2020-01-27 17:00:00', NULL),
(112, 'GP3K', 'GP3K', 'gp3k', 'petrokimia52', 'user', '2020-01-27 17:00:00', NULL),
(62, 'Hubungan Masyarakat', 'Hubungan Masyarakat', 'humas', 'petrokimia3', 'user', '2020-01-27 17:00:00', NULL),
(63, 'Hukum & Sekretariat', 'Hukum & Sekretariat', 'hukum_sekre', 'petrokimia4', 'user', '2020-01-27 17:00:00', NULL),
(91, 'Inspeksi Teknik', 'Inspeksi Teknik', 'inspeksi_teknik', 'petrokimia31', 'user', '2020-01-27 17:00:00', NULL),
(108, 'Keamanan', 'Keamanan', 'keamanan', 'petrokimia48', 'user', '2020-01-27 17:00:00', NULL),
(75, 'Keuangan', 'Keuangan', 'keuangan', 'petrokimia16', 'user', '2020-01-27 17:00:00', NULL),
(89, 'Lingkungan & K3', 'Lingkungan & K3', 'lingkungan_k3', 'petrokimia30', 'user', '2020-01-27 17:00:00', NULL),
(104, 'Operasional SDM', 'Operasional SDM', 'operasional_sdm', 'petrokimia44', 'user', '2020-01-27 17:00:00', NULL),
(106, 'Pelayanan Umum', 'Pelayanan Umum', 'pelayanan_umum', 'petrokimia46', 'user', '2020-01-27 17:00:00', NULL),
(81, 'Pemeliharaan I', 'Pemeliharaan I', 'pemeliharaan1', 'petrokimia22', 'user', '2020-01-27 17:00:00', NULL),
(84, 'Pemeliharaan II', 'Pemeliharaan II', 'pemeliharaan2', 'petrokimia25', 'user', '2020-01-27 17:00:00', NULL),
(87, 'Pemeliharaan III', 'Pemeliharaan III', 'pemeliharaan3', 'petrokimia28', 'user', '2020-01-27 17:00:00', NULL),
(100, 'Pengadaan Barang', 'Pengadaan Barang', 'pengadaan_barang', 'petrokimia40', 'user', '2020-01-27 17:00:00', NULL),
(101, 'Pengadaan Jasa', 'Pengadaan Jasa', 'pengadaan_jasa', 'petrokimia41', 'user', '2020-01-27 17:00:00', NULL),
(78, 'Pengelolaan Anak Perusahaan', 'Pengelolaan Anak Perusahaan', 'pengelolaan_ap', 'petrokimia19', 'user', '2020-01-27 17:00:00', NULL),
(71, 'Pengelolaan Mitra Produksi', 'Pengelolaan Mitra Produksi', 'pengelolaan_mp', 'petrokimia12', 'user', '2020-01-27 17:00:00', NULL),
(99, 'Pengelolaan Pelabuhan', 'Pengelolaan Pelabuhan', 'pengelolaan_pelabuhan', 'petrokimia39', 'user', '2020-01-27 17:00:00', NULL),
(105, 'Pengembangan SDM', 'Pengembangan SDM', 'pengembangan_sdm', 'petrokimia45', 'user', '2020-01-27 17:00:00', NULL),
(94, 'Pengembangan Usaha', 'Pengembangan Usaha', 'pengembangan_usaha', 'petrokimia34', 'user', '2020-01-27 17:00:00', NULL),
(97, 'Pengolahan Air', 'Pengolahan Air', 'pengolahan_air', 'petrokimia37', 'user', '2020-01-27 17:00:00', NULL),
(69, 'Penjualan Produk Non Pupuk & Jasa', 'Penjualan Produk Non Pupuk & Jasa', 'ppnpj', 'petrokimia10', 'user', '2020-01-27 17:00:00', NULL),
(70, 'Penjualan Produk Pengembangan', 'Penjualan Produk Pengembangan', 'penjualan_pp', 'petrokimia11', 'user', '2020-01-27 17:00:00', NULL),
(68, 'Penjualan Pupuk Korporasi', 'Penjualan Pupuk Korporasi', 'penjualan_pk', 'petrokimia9', 'user', '2020-01-27 17:00:00', NULL),
(66, 'Penjualan Retail Wilayah I', 'Penjualan Retail Wilayah I', 'prw1', 'petrokimia7', 'user', '2020-01-27 17:00:00', NULL),
(67, 'Penjualan Retail Wilayah II', 'Penjualan Retail Wilayah II', 'prw2', 'petrokimia8', 'user', '2020-01-27 17:00:00', NULL),
(102, 'Perencanaan & Pengawasan Barang/Jasa', 'Perencanaan & Pengawasan Barang/Jasa', 'ppbj', 'petrokimia42', 'user', '2020-01-27 17:00:00', NULL),
(103, 'Perencanaan SDM', 'Perencanaan SDM', 'perencanaan_sdm', 'petrokimia43', 'user', '2020-01-27 17:00:00', NULL),
(65, 'Perwakilan Jakarta', 'Perwakilan Jakarta', 'perwakilan_jkt', 'petrokimia6', 'user', '2020-01-27 17:00:00', NULL),
(79, 'Produksi I A', 'Produksi I A', 'produksi1a', 'petrokimia20', 'user', '2020-01-27 17:00:00', NULL),
(80, 'Produksi I B', 'Produksi I B', 'produksi1b', 'petrokimia21', 'user', '2020-01-27 17:00:00', NULL),
(82, 'Produksi II A', 'Produksi II A', 'produksi2a', 'petrokimia23', 'user', '2020-01-27 17:00:00', NULL),
(83, 'Produksi II B', 'Produksi II B', 'produksi2b', 'petrokimia24', 'user', '2020-01-27 17:00:00', NULL),
(85, 'Produksi III A', 'Produksi III A', 'produksi3a', 'petrokimia26', 'user', '2020-01-27 17:00:00', NULL),
(86, 'Produksi III B', 'Produksi III B', 'produksi3b', 'petrokimia27', 'user', '2020-01-27 17:00:00', NULL),
(72, 'Promosi & Perencanaan Pemasaran', 'Promosi & Perencanaan Pemasaran', 'promosi_pp', 'petrokimia13', 'user', '2020-01-27 17:00:00', NULL),
(88, 'Proses & Pengelolaan Energi', 'Proses & Pengelolaan Energi', 'proses_pe', 'petrokimia29', 'user', '2020-01-27 17:00:00', NULL),
(109, 'Proyek Amurea II', 'Proyek Amurea II', 'amunea2', 'petrokimia49', 'user', '2020-01-27 17:00:00', NULL),
(111, 'Proyek Pengembangan Tahun 2014', 'Proyek Pengembangan Tahun 2014', 'ppt14', 'petrokimia51', 'user', '2020-01-27 17:00:00', NULL),
(110, 'Proyek Upgrating IPA Gunung Sari', 'Proyek Upgrating IPA Gunung Sari', 'puigs', 'petrokimia50', 'user', '2020-01-27 17:00:00', NULL),
(95, 'Rancang Bangun', 'Rancang Bangun', 'rancang_bangun', 'petrokimia35', 'user', '2020-01-27 17:00:00', NULL),
(93, 'Riset Pemuliaan & Pengolahan hasil Tanaman', 'Riset Pemuliaan & Pengolahan hasil Tanaman', 'rppht', 'petrokimia33', 'user', '2020-01-27 17:00:00', NULL),
(92, 'Riset Pupuk & Produk Hayati', 'Riset Pupuk & Produk Hayati', 'rpph', 'petrokimia32', 'user', '2020-01-27 17:00:00', NULL),
(64, 'Tata Kelola Perusahaan & Manajemen Resiko', 'Tata Kelola Perusahaan & Manajemen Resiko', 'tkpmr', 'petrokimia5', 'user', '2020-01-27 17:00:00', NULL),
(96, 'TI PI PG', 'TI PI PG', 'tipipg', 'petrokimia36', 'user', '2020-01-27 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_permintaan`
--

CREATE TABLE `tbl_permintaan` (
  `id_permintaan` int(11) NOT NULL,
  `depart` varchar(100) NOT NULL,
  `userlog` varchar(100) NOT NULL,
  `nama_projek` varchar(100) NOT NULL,
  `jns_apk` varchar(100) NOT NULL,
  `tgl_minta` date NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `tahun` int(11) NOT NULL,
  `deskrip` text NOT NULL,
  `file_minta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_permintaan`
--

INSERT INTO `tbl_permintaan` (`id_permintaan`, `depart`, `userlog`, `nama_projek`, `jns_apk`, `tgl_minta`, `no_surat`, `tahun`, `deskrip`, `file_minta`) VALUES
(41, 'TI PI PG', 'tipipg01', 'Aplikasi Website Pengadaan Aplikasi Perdepartemen', 'Website', '2020-01-28', '03.001/Dept. TIPIPG/I/2020', 2020, 'Harus Jadi', 'bamman2017.pdf'),
(42, 'Akuntansi', 'akuntansi01', 'Aplikasi Penghitung Keuangan Biaya Keluar', 'Keduanya', '2020-01-28', '03.001/Dept. Akuntansi/I/2020', 2020, 'Selesai', 'davis2006.pdf'),
(43, 'Pengadaan Barang', 'pbarang01', 'Aplikasi Gudang', 'Mobile', '2020-01-28', '03.001/Dept. Pengadaan Barang/I/2020', 2020, 'Siap', 'fox1993.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_persetujuan`
--

CREATE TABLE `tb_persetujuan` (
  `id_persetujuan` int(11) NOT NULL,
  `depart` varchar(100) NOT NULL,
  `nama_projek` varchar(100) NOT NULL,
  `userlog` varchar(100) NOT NULL,
  `anggaran` varchar(100) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `prioritas` text,
  `tim_pm` varchar(100) DEFAULT NULL,
  `tim_ba` varchar(100) DEFAULT NULL,
  `tim_docs` varchar(100) DEFAULT NULL,
  `tim_prog` varchar(100) DEFAULT NULL,
  `tim_infra` varchar(100) DEFAULT NULL,
  `nama_vendor` varchar(100) DEFAULT NULL,
  `estimasi` int(11) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `brd` varchar(100) DEFAULT 'Belum Terupload',
  `tor` varchar(100) DEFAULT 'Belum Terupload',
  `sr` varchar(100) DEFAULT 'Belum Terupload',
  `ba` varchar(100) DEFAULT 'Belum Terupload',
  `ok` varchar(100) DEFAULT 'Belum Terupload',
  `user_man` varchar(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_persetujuan`
--

INSERT INTO `tb_persetujuan` (`id_persetujuan`, `depart`, `nama_projek`, `userlog`, `anggaran`, `nominal`, `prioritas`, `tim_pm`, `tim_ba`, `tim_docs`, `tim_prog`, `tim_infra`, `nama_vendor`, `estimasi`, `tgl_mulai`, `tgl_selesai`, `brd`, `tor`, `sr`, `ba`, `ok`, `user_man`, `status`) VALUES
(17, 'TI PI PG', 'Aplikasi Website Pengadaan Aplikasi Perdepartemen', 'tipipg01', 'Unit Kerja', 25000000, 'User Interface', 'AAAAA', 'BBBBB', 'CCCCC', 'DDDDD', 'EEEEE', 'Vendor1', 90, '2020-01-28', '2020-04-28', 'davis2006.pdf', 'felecia2017.pdf', 'fortenberry1999.pdf', 'fortenberry1999.pdf', 'hienert2019.pdf', 'hienert2019.pdf', 'done'),
(18, 'Akuntansi', 'Aplikasi Penghitung Keuangan Biaya Keluar', 'akuntansi01', '', 0, '', '', '', '', '', '', '', 0, '0000-00-00', '0000-00-00', '', '', '', '', '', '', ''),
(19, 'Pengadaan Barang', 'Aplikasi Gudang', 'pbarang01', '', 0, '', '', '', '', '', '', '', 0, '0000-00-00', '0000-00-00', 'bamman2017.pdf', '', '', '', '', '', 'progress');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblauth`
--
ALTER TABLE `tblauth`
  ADD PRIMARY KEY (`depart`),
  ADD KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `tbl_permintaan`
--
ALTER TABLE `tbl_permintaan`
  ADD PRIMARY KEY (`id_permintaan`),
  ADD KEY `id` (`depart`),
  ADD KEY `id_permintaan` (`id_permintaan`),
  ADD KEY `nama_projek` (`nama_projek`);

--
-- Indexes for table `tb_persetujuan`
--
ALTER TABLE `tb_persetujuan`
  ADD PRIMARY KEY (`id_persetujuan`),
  ADD KEY `id` (`depart`),
  ADD KEY `id_persetujuan` (`id_persetujuan`),
  ADD KEY `nama_projek` (`nama_projek`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblauth`
--
ALTER TABLE `tblauth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `tbl_permintaan`
--
ALTER TABLE `tbl_permintaan`
  MODIFY `id_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tb_persetujuan`
--
ALTER TABLE `tb_persetujuan`
  MODIFY `id_persetujuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_permintaan`
--
ALTER TABLE `tbl_permintaan`
  ADD CONSTRAINT `tbl_permintaan_ibfk_1` FOREIGN KEY (`depart`) REFERENCES `tblauth` (`depart`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_persetujuan`
--
ALTER TABLE `tb_persetujuan`
  ADD CONSTRAINT `tb_persetujuan_ibfk_1` FOREIGN KEY (`depart`) REFERENCES `tblauth` (`depart`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
