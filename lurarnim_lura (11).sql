-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 02, 2021 at 05:12 PM
-- Server version: 10.3.32-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lurarnim_lura`
--

-- --------------------------------------------------------

--
-- Table structure for table `cleaning_service`
--

CREATE TABLE `cleaning_service` (
  `id_surat` int(10) NOT NULL,
  `nama_pembuat` varchar(100) NOT NULL,
  `kode_bon` varchar(50) NOT NULL,
  `nominal` int(50) NOT NULL,
  `vendor` varchar(30) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_diterima` date NOT NULL,
  `file` varchar(250) NOT NULL,
  `id_user` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cleaning_service`
--

INSERT INTO `cleaning_service` (`id_surat`, `nama_pembuat`, `kode_bon`, `nominal`, `vendor`, `tgl_surat`, `tgl_diterima`, `file`, `id_user`) VALUES
(33, 'Nama', 'Kode Bon Keuangan', 23455, 'Nama Vendor', '2021-12-02', '2021-12-02', '2165-Screenshot (1).png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ekspedisi`
--

CREATE TABLE `ekspedisi` (
  `id_surat` int(10) NOT NULL,
  `nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tujuan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sifat_dokumen` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `no_resi` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `divisi` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pemeriksa` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_diterima` date NOT NULL,
  `file` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `no_surat` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `id_user` tinyint(2) NOT NULL,
  `ttd_avp` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ttd_pemeriksa` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ekspedisi`
--

INSERT INTO `ekspedisi` (`id_surat`, `nama`, `tujuan`, `sifat_dokumen`, `no_resi`, `divisi`, `pemeriksa`, `tgl_surat`, `tgl_diterima`, `file`, `no_surat`, `id_user`, `ttd_avp`, `ttd_pemeriksa`) VALUES
(31, 'Nama', 'Tujuan Pengiriman', 'Biasa - Ekspedisi', '12345', 'Divisi', 'VP SDM & Umum', '2021-11-29', '2021-11-29', '4022-1464-Dipindai_20211022-1046.pdf', '12345', 1, 'Belum Disetujui', 'Belum Disetujui'),
(32, 'Nama User', 'Tujuan Pengiriman', 'Biasa - Ekspedisi', '972351826', 'Divisi', 'VP SDM & Umum', '2021-11-30', '2021-11-30', '', '1821462', 20, 'Belum Disetujui', 'Belum Disetujui'),
(33, ' Prilambang Dzikry Jatnika', 'Tujuan Pengiriman', 'Biasa - Ekspedisi', '12345', 'VP Riset & Pengembangan', 'VP Keuangan Korporasi', '2021-12-02', '2021-12-02', '3742-Screenshot (1).png', '12345', 1, 'Belum Disetujui', 'Belum Disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_ekspedisi`
--

CREATE TABLE `invoice_ekspedisi` (
  `id_surat` int(10) NOT NULL,
  `nama_pembuat` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kode_bon` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nominal` int(50) NOT NULL,
  `vendor` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_diterima` date NOT NULL,
  `file` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `id_user` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoice_ekspedisi`
--

INSERT INTO `invoice_ekspedisi` (`id_surat`, `nama_pembuat`, `kode_bon`, `nominal`, `vendor`, `tgl_surat`, `tgl_diterima`, `file`, `id_user`) VALUES
(15, 'Nama', 'Kode Bon Keuangan', 23455, 'Nama Vendor', '2021-12-02', '2021-12-02', '5161-Screenshot (1).png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_maintenance`
--

CREATE TABLE `invoice_maintenance` (
  `id_surat` int(10) NOT NULL,
  `nama_pembuat` varchar(100) NOT NULL,
  `kode_bon` varchar(50) NOT NULL,
  `nominal` int(50) NOT NULL,
  `vendor` varchar(30) NOT NULL,
  `lampiran` varchar(50) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_diterima` date NOT NULL,
  `file` varchar(250) NOT NULL,
  `id_user` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_maintenance`
--

INSERT INTO `invoice_maintenance` (`id_surat`, `nama_pembuat`, `kode_bon`, `nominal`, `vendor`, `lampiran`, `tgl_surat`, `tgl_diterima`, `file`, `id_user`) VALUES
(71, 'Nama', 'Kode Bon Keuangan', 23455, 'Nama Vendor', 'Lampiran Permintaan', '2021-12-02', '2021-12-02', '9055-Screenshot (1).png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_transportasi`
--

CREATE TABLE `invoice_transportasi` (
  `id_surat` int(10) NOT NULL,
  `nama_pembuat` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kode_bon` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `nominal` int(50) NOT NULL,
  `vendor` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lampiran` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_diterima` date NOT NULL,
  `file` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `id_user` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoice_transportasi`
--

INSERT INTO `invoice_transportasi` (`id_surat`, `nama_pembuat`, `kode_bon`, `nominal`, `vendor`, `lampiran`, `tgl_surat`, `tgl_diterima`, `file`, `id_user`) VALUES
(28, 'Nama', 'Kode Bon Keuangan', 23455, 'Nama Vendor', 'Lampiran Permintaan', '2021-12-02', '2021-12-02', '1059-Screenshot (1).png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `id_surat` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status` mediumtext NOT NULL,
  `keterangan` mediumtext NOT NULL,
  `permintaan` mediumtext NOT NULL,
  `divisi` varchar(30) NOT NULL,
  `pemeriksa` varchar(250) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_diterima` date NOT NULL,
  `file` varchar(250) NOT NULL,
  `id_user` tinyint(2) NOT NULL,
  `ttd_avp` varchar(250) NOT NULL,
  `ttd_pemeriksa` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id_surat`, `nama`, `status`, `keterangan`, `permintaan`, `divisi`, `pemeriksa`, `tgl_surat`, `tgl_diterima`, `file`, `id_user`, `ttd_avp`, `ttd_pemeriksa`) VALUES
(48, 'rika fitriyati', 'Sedang di proses', 'Jam Dinding 1', 'Permintaan jam dinding u/ ruang kerja Komisaris Utama PT RNI (Persero)', 'sekor', '', '2021-11-13', '2021-10-22', '1464-Dipindai_20211022-1046.pdf', 1, '', ''),
(49, 'Rika Fitriyati', 'Sedang di proses', 'BAYU KRISNAMURTHI -1, MARSUDI WAHYU KISWORO -1, ARIE SUJITO -1, HIMAWAN ARIEF SUGOTO -1, ABDUL ROCHIM -1, ABDI MUSTAKIM -1', 'Permintaan Papan Nama KOMISARIS PT RNI (Persero)', 'Sekor', '', '2021-09-14', '2021-10-22', '674-Scanned_20211022-1039.pdf', 1, '', ''),
(53, 'Masayu Olivia Nurjanah', 'Sedang di proses', '', 'Permohonan  Pembuatan ID Card untuk Sdr. Saut dan Permohonan  Akses Parkir untuk Sdr. Saut', 'Pengembangan SDM', '', '2021-09-06', '2021-10-22', '222-Dipindai_20211022-1146.pdf', 1, '', ''),
(54, 'Yudi Juni Ardi', 'Sedang di proses', 'Kartu Id dan Kartu Akses', 'Kartu akses untuk Pak Eko Purwanto TI', 'Unit Teknologi Informasi', '', '2021-09-02', '2021-10-22', '7034-Scanned_20211022-1328.pdf', 1, '', ''),
(55, 'Sutarto', 'Sedang di proses', 'Kartu akses masuk RNI (id card) dan kartu akses parkir', 'Mohon dibuatkan kartu ini atas nama Christ Ekaprianda (VP Audit Operasional)', 'Satuan Pengawas Intern', '', '2021-09-06', '2021-10-22', '9313-Scanned_20211022-1148.pdf', 1, '', ''),
(56, 'Shanya Audita K', 'Belum di proses', 'Meja dan Ruang Kerja  -   2', 'Permintaan Ruang Kerja, Meja Kerja dan Perlengkapannya untuk AVP Non Agro I dan AVP Perdagangan & Pengembangan Produk', 'Sales', '', '2021-09-06', '2021-10-22', '8891-Scanned_20211022-1353.pdf', 1, '', ''),
(57, 'Dea Aprilia ', 'Belum di proses', '', 'Perbaikan Lampu di Ruang Manager Strategi & Sinergi Aset (C. Kristywulan W.) dan Ruang Manager Optimalisasi & Komersialisasi Aset (Ricko Wahyudi)', 'Pengembangan Aset', '', '2021-03-30', '2021-10-22', '1718-Dipindai_20211022-1634.pdf', 1, '', ''),
(140, 'Rika Fitriyati', 'Belum Diproses', 'Jam Dinding 1', 'Permintaan jam dinding u/ ruang kerja Komisaris Utama PT RNI (Persero)', 'Sekor', 'Direktur Utama', '2021-11-29', '2021-11-29', '4734-1464-Dipindai_20211022-1046.pdf', 1, 'Belum Disetujui', 'Belum Disetujui'),
(141, 'Rika Fitriyati', 'Belum Diproses', 'Satu set', 'Permintaan kabel 5 meter, colokan stop kontak 1 set untuk mesin kopi VP Akuntansi', 'Unit Teknologi Informasi', 'VP SDM & Umum', '2021-11-29', '2021-11-29', '', 20, 'Belum Disetujui', 'Belum Disetujui'),
(142, ' Prilambang Dzikry Jatnika', 'Sedang di proses', 'Barang', 'Permintaan Layanan', 'Divisi', 'VP Non Agro', '2021-12-02', '2021-12-02', '', 1, 'Disetujui', 'Belum Disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_disposisi` int(10) NOT NULL,
  `jenis_mobil_detail` varchar(100) NOT NULL,
  `nama_detail` varchar(100) NOT NULL,
  `divisi_detail` varchar(100) NOT NULL,
  `deskripsi_detail` varchar(50) NOT NULL,
  `id_user` tinyint(2) NOT NULL,
  `tgl_surat_detail` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_detail` varchar(100) NOT NULL,
  `id_surat` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_disposisi`, `jenis_mobil_detail`, `nama_detail`, `divisi_detail`, `deskripsi_detail`, `id_user`, `tgl_surat_detail`, `status_detail`, `id_surat`) VALUES
(91, 'Nissan Evalia - B 1148 SYG', 'Name', 'divisi', '', 1, '2021-11-30 06:50:43', 'Sudah kembali', 153);

--
-- Triggers `mobil`
--
DELIMITER $$
CREATE TRIGGER `mobil` AFTER INSERT ON `mobil` FOR EACH ROW INSERT INTO stock VALUES(null, NEW.jenis_mobil_detail)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `mobil2` AFTER INSERT ON `mobil` FOR EACH ROW BEGIN
UPDATE transportasi SET status = NEW.status_detail
WHERE id_surat = NEW.id_surat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksa_ekspedisi`
--

CREATE TABLE `pemeriksa_ekspedisi` (
  `id_disposisi` int(10) NOT NULL,
  `nama_ttd` varchar(250) NOT NULL,
  `divisi_ttd` varchar(250) NOT NULL,
  `status_ttd` varchar(250) NOT NULL,
  `tgl_surat_ttd` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_surat` int(10) NOT NULL,
  `id_user` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Triggers `pemeriksa_ekspedisi`
--
DELIMITER $$
CREATE TRIGGER `setuju_pemeriksa_ekspedisi` AFTER INSERT ON `pemeriksa_ekspedisi` FOR EACH ROW BEGIN
UPDATE ekspedisi SET ttd_pemeriksa = 'Disetujui'
WHERE id_surat = NEW.id_surat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksa_maintenance`
--

CREATE TABLE `pemeriksa_maintenance` (
  `id_disposisi` int(10) NOT NULL,
  `nama_ttd` varchar(100) NOT NULL,
  `divisi_ttd` varchar(100) NOT NULL,
  `status_ttd` varchar(100) NOT NULL,
  `tgl_surat_ttd` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_surat` int(10) NOT NULL,
  `id_user` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Triggers `pemeriksa_maintenance`
--
DELIMITER $$
CREATE TRIGGER `setuju_pemeriksa_maintenance` AFTER INSERT ON `pemeriksa_maintenance` FOR EACH ROW BEGIN
UPDATE maintenance SET ttd_pemeriksa = 'Disetujui'
WHERE id_surat = NEW.id_surat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksa_transportasi`
--

CREATE TABLE `pemeriksa_transportasi` (
  `id_disposisi` int(10) NOT NULL,
  `nama_ttd` varchar(100) NOT NULL,
  `divisi_ttd` varchar(100) NOT NULL,
  `status_ttd` varchar(100) NOT NULL,
  `tgl_surat_ttd` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_surat` int(10) NOT NULL,
  `id_user` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Triggers `pemeriksa_transportasi`
--
DELIMITER $$
CREATE TRIGGER `setuju_pemeriksa_transportasi` AFTER INSERT ON `pemeriksa_transportasi` FOR EACH ROW BEGIN
UPDATE transportasi SET ttd_pemeriksa = 'Disetujui'
WHERE id_surat = NEW.id_surat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `security`
--

CREATE TABLE `security` (
  `id_surat` int(10) NOT NULL,
  `nama_pembuat` varchar(100) NOT NULL,
  `kode_bon` varchar(50) NOT NULL,
  `nominal` int(50) NOT NULL,
  `vendor` varchar(30) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_diterima` date NOT NULL,
  `file` varchar(250) NOT NULL,
  `id_user` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `security`
--

INSERT INTO `security` (`id_surat`, `nama_pembuat`, `kode_bon`, `nominal`, `vendor`, `tgl_surat`, `tgl_diterima`, `file`, `id_user`) VALUES
(33, 'Nama ', 'Kode Bon Keuangan', 23455, 'Nama Vendor', '2021-12-02', '2021-12-02', '833-Screenshot (1).png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id_surat` int(11) NOT NULL,
  `jenis_mobil` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id_surat`, `jenis_mobil`) VALUES
(136, 'Mazda Biante - B 1607 SYI'),
(130, 'Suzuki Ertiga - B 1858 SRQ'),
(107, 'Suzuki Ertiga - B 1635 SRQ'),
(91, 'Toyota Innova - B 2753 STM'),
(137, 'Nissan Evalia - B 1148 SYG'),
(133, 'Suzuki Ertiga - B 1863 SRQ'),
(113, 'GRAB'),
(143, 'Nissan Serena - B 3760 SUE'),
(140, 'Grab 6');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_instansi`
--

CREATE TABLE `tbl_instansi` (
  `id_instansi` tinyint(1) NOT NULL,
  `institusi` varchar(150) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `direktorat` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `id_user` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_instansi`
--

INSERT INTO `tbl_instansi` (`id_instansi`, `institusi`, `nama`, `status`, `alamat`, `direktorat`, `website`, `email`, `logo`, `id_user`) VALUES
(1, 'LARAS', 'LAYANAN UMUM STRATEGIS V1.0', '/', 'Jl. Letjen M.T. Haryono No.12, RT.4/RW.11, Kp. Melayu, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13330', 'SDM & Umum', 'https://lura-rni.my.id', 'LURA@RNI.COM', '48EEAB2B-4AA2-42E3-9140-A77306A258C8.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proses`
--

CREATE TABLE `tbl_proses` (
  `id_disposisi` int(10) NOT NULL,
  `nama_detail` varchar(50) NOT NULL,
  `divisi_detail` varchar(50) NOT NULL,
  `catatan_detail` varchar(100) NOT NULL,
  `status_detail` varchar(250) NOT NULL,
  `tgl_surat_detail` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_surat` int(10) NOT NULL,
  `id_user` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_proses`
--

INSERT INTO `tbl_proses` (`id_disposisi`, `nama_detail`, `divisi_detail`, `catatan_detail`, `status_detail`, `tgl_surat_detail`, `id_surat`, `id_user`) VALUES
(59, 'Awi', 'Staff Pelayanan Umum', 'Catatan', 'Sedang di proses', '2021-11-29 02:58:33', 136, 9),
(60, 'Awi', 'Staff Pelayanan Umum', 'Catatan', 'Selesai', '2021-11-29 02:58:45', 136, 9),
(61, 'Awi', 'Staff Pelayanan Umum', 'Catatan', 'Sedang di proses', '2021-11-29 07:21:54', 56, 9),
(62, 'Awi', 'Staff Pelayanan Umum', 'Catatan', 'Selesai', '2021-11-29 07:22:05', 56, 9),
(63, 'Awi', 'Staff Pelayanan Umum', 'Catatan', 'Belum di proses', '2021-11-29 07:30:45', 56, 9),
(64, 'Awi', 'Staff Pelayanan Umum', 'Catatan', 'Sedang di proses', '2021-12-02 10:09:37', 142, 1);

--
-- Triggers `tbl_proses`
--
DELIMITER $$
CREATE TRIGGER `status` AFTER INSERT ON `tbl_proses` FOR EACH ROW BEGIN
UPDATE maintenance SET status = NEW.status_detail
WHERE id_surat = NEW.id_surat;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `status2` AFTER UPDATE ON `tbl_proses` FOR EACH ROW BEGIN
UPDATE maintenance SET status = NEW.status_detail
WHERE id_surat = NEW.id_surat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sett`
--

CREATE TABLE `tbl_sett` (
  `id_sett` tinyint(1) NOT NULL,
  `surat_masuk` tinyint(2) NOT NULL,
  `surat_keluar` tinyint(2) NOT NULL,
  `referensi` tinyint(2) NOT NULL,
  `id_user` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sett`
--

INSERT INTO `tbl_sett` (`id_sett`, `surat_masuk`, `surat_keluar`, `referensi`, `id_user`) VALUES
(1, 20, 5, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` tinyint(2) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nama`, `nip`, `admin`) VALUES
(1, 'muhajir', '8677d87667dcf02b9125a585d0c777bd', 'Muhajir', '-', 1),
(4, 'Efrizal', '827ccb0eea8a706c4c34a16891f84e7b', 'Izal', '12345', 3),
(5, 'ficko', 'bcf0365ac679c28d21caf5d5b559f356', 'ficko', '12345', 3),
(9, 'staff', '827ccb0eea8a706c4c34a16891f84e7b', 'staff', '12345', 4),
(11, 'staff2', '8bc01711b8163ec3f2aa0688d12cdf3b', 'Awi', '-', 4),
(17, 'nuril fikri', '8677d87667dcf02b9125a585d0c777bd', 'Nuril Fikri', '-', 4),
(18, 'pemeriksa', 'b87592bc5660ff1ead42308835a42897', 'pemeriksa', '-', 2),
(19, 'pemeriksa2', '08c69ed230b37dc2ee95f4fd6b5a89b5', 'pemeriksa 2', '-', 2),
(20, 'user1', '6ad14ba9986e3615423dfca256d04e3f', 'User', '-', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tidak_setuju_avp_ekspedisi`
--

CREATE TABLE `tidak_setuju_avp_ekspedisi` (
  `id_disposisi` int(10) NOT NULL,
  `nama_ttd` varchar(250) NOT NULL,
  `divisi_ttd` varchar(250) NOT NULL,
  `status_ttd` varchar(250) NOT NULL,
  `tgl_surat_ttd` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_surat` int(10) NOT NULL,
  `id_user` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Triggers `tidak_setuju_avp_ekspedisi`
--
DELIMITER $$
CREATE TRIGGER `tidak_setuju_avp_ekspedisi` AFTER INSERT ON `tidak_setuju_avp_ekspedisi` FOR EACH ROW BEGIN
UPDATE ekspedisi SET ttd_avp = 'Tidak Disetujui'
WHERE id_surat = NEW.id_surat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tidak_setuju_avp_maintenance`
--

CREATE TABLE `tidak_setuju_avp_maintenance` (
  `id_disposisi` int(10) NOT NULL,
  `nama_ttd` varchar(250) NOT NULL,
  `divisi_ttd` varchar(250) NOT NULL,
  `status_ttd` varchar(250) NOT NULL,
  `tgl_surat_ttd` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_surat` int(10) NOT NULL,
  `id_user` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Triggers `tidak_setuju_avp_maintenance`
--
DELIMITER $$
CREATE TRIGGER `tidak_setuju_avp_maintenance` AFTER INSERT ON `tidak_setuju_avp_maintenance` FOR EACH ROW BEGIN
UPDATE maintenance SET ttd_avp = 'Tidak Disetujui'
WHERE id_surat = NEW.id_surat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tidak_setuju_avp_transportasi`
--

CREATE TABLE `tidak_setuju_avp_transportasi` (
  `id_disposisi` int(10) NOT NULL,
  `nama_ttd` varchar(250) NOT NULL,
  `status_ttd` varchar(250) NOT NULL,
  `tgl_surat_ttd` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_surat` int(10) NOT NULL,
  `id_user` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Triggers `tidak_setuju_avp_transportasi`
--
DELIMITER $$
CREATE TRIGGER `tidak_setuju_avp_transportasi` AFTER INSERT ON `tidak_setuju_avp_transportasi` FOR EACH ROW BEGIN
UPDATE transportasi SET ttd_avp = 'Tidak Disetujui'
WHERE id_surat = NEW.id_surat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tidak_setuju_pemeriksa_ekspedisi`
--

CREATE TABLE `tidak_setuju_pemeriksa_ekspedisi` (
  `id_disposisi` int(10) NOT NULL,
  `nama_ttd` varchar(250) NOT NULL,
  `divisi_ttd` varchar(250) NOT NULL,
  `status_ttd` varchar(250) NOT NULL,
  `tgl_surat_ttd` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_surat` int(10) NOT NULL,
  `id_user` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Triggers `tidak_setuju_pemeriksa_ekspedisi`
--
DELIMITER $$
CREATE TRIGGER `tidak_setuju_pemeriksa_ekspedisi` AFTER INSERT ON `tidak_setuju_pemeriksa_ekspedisi` FOR EACH ROW BEGIN
UPDATE ekspedisi SET ttd_pemeriksa = 'Tidak Disetujui'
WHERE id_surat = NEW.id_surat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tidak_setuju_pemeriksa_maintenance`
--

CREATE TABLE `tidak_setuju_pemeriksa_maintenance` (
  `id_disposisi` int(10) NOT NULL,
  `nama_ttd` varchar(250) NOT NULL,
  `divisi_ttd` varchar(250) NOT NULL,
  `status_ttd` varchar(250) NOT NULL,
  `tgl_surat_ttd` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_surat` int(10) NOT NULL,
  `id_user` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Triggers `tidak_setuju_pemeriksa_maintenance`
--
DELIMITER $$
CREATE TRIGGER `tidak_setuju_pemeriksa_maintenance` AFTER INSERT ON `tidak_setuju_pemeriksa_maintenance` FOR EACH ROW BEGIN
UPDATE maintenance SET ttd_pemeriksa = 'Tidak Disetujui'
WHERE id_surat = NEW.id_surat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tidak_setuju_pemeriksa_transportasi`
--

CREATE TABLE `tidak_setuju_pemeriksa_transportasi` (
  `id_disposisi` int(10) NOT NULL,
  `nama_ttd` varchar(250) NOT NULL,
  `divisi_ttd` varchar(250) NOT NULL,
  `status_ttd` varchar(250) NOT NULL,
  `tgl_surat_ttd` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_surat` int(10) NOT NULL,
  `id_user` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Triggers `tidak_setuju_pemeriksa_transportasi`
--
DELIMITER $$
CREATE TRIGGER `tidak_setuju_pemeriksa_transportasi` AFTER INSERT ON `tidak_setuju_pemeriksa_transportasi` FOR EACH ROW BEGIN
UPDATE transportasi SET ttd_pemeriksa = 'Tidak Disetujui'
WHERE id_surat = NEW.id_surat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transportasi`
--

CREATE TABLE `transportasi` (
  `id_surat` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tujuan` varchar(250) NOT NULL,
  `keperluan` mediumtext NOT NULL,
  `divisi` varchar(30) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_diterima` date NOT NULL,
  `file` varchar(250) NOT NULL,
  `jam_pakai` varchar(250) NOT NULL,
  `id_user` tinyint(2) NOT NULL,
  `jenis_mobil` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `pemeriksa` varchar(250) NOT NULL,
  `ttd_avp` varchar(250) NOT NULL,
  `ttd_pemeriksa` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transportasi`
--

INSERT INTO `transportasi` (`id_surat`, `nama`, `tujuan`, `keperluan`, `divisi`, `tgl_kembali`, `tgl_surat`, `tgl_diterima`, `file`, `jam_pakai`, `id_user`, `jenis_mobil`, `status`, `pemeriksa`, `ttd_avp`, `ttd_pemeriksa`) VALUES
(127, 'Ajeng Azani / Ida Inawati', 'Sukamandi, Subang Jawa Barat', 'Peminjaman Driver untuk SPPDke Sukamandi', 'VP Riset & Pengembangan', '2021-10-31', '2021-10-31', '2021-10-31', '', '06 s/d 21', 1, 'Nissan Evalia - B 1148 SYG', 'Sudah kembali', 'VP SDM & Umum', '', ''),
(153, 'Ajeng Azani / Ida Inawati', 'Sukamandi, Subang Jawa Barat', 'Peminjaman Driver untuk SPPDke Sukamandi', 'VP Riset & Pengembangan', '2021-11-30', '2021-11-29', '2021-11-29', '9096-Dipindai_20211022-1146.pdf', '06 s/d 21', 1, 'Nissan Evalia - B 1148 SYG', 'Sudah kembali', 'VP SDM & Umum', 'Belum Disetujui', 'Belum Disetujui');

--
-- Triggers `transportasi`
--
DELIMITER $$
CREATE TRIGGER `transportasi` AFTER INSERT ON `transportasi` FOR EACH ROW BEGIN
DELETE FROM stock
WHERE jenis_mobil = new.jenis_mobil;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `transportasi2` AFTER DELETE ON `transportasi` FOR EACH ROW INSERT INTO stock VALUES(null, old.jenis_mobil)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ttd_vp`
--

CREATE TABLE `ttd_vp` (
  `id_disposisi` int(10) NOT NULL,
  `nama_ttd` varchar(250) NOT NULL,
  `divisi_ttd` varchar(250) NOT NULL,
  `status_ttd` varchar(250) NOT NULL,
  `tgl_surat_ttd` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_surat` int(10) NOT NULL,
  `id_user` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ttd_vp`
--

INSERT INTO `ttd_vp` (`id_disposisi`, `nama_ttd`, `divisi_ttd`, `status_ttd`, `tgl_surat_ttd`, `id_surat`, `id_user`) VALUES
(49, 'Muhajir', '', 'barcode_avp_maintenance', '2021-12-02 08:11:47', 142, 1);

--
-- Triggers `ttd_vp`
--
DELIMITER $$
CREATE TRIGGER `setuju_avp_maintenance` AFTER INSERT ON `ttd_vp` FOR EACH ROW BEGIN
UPDATE maintenance SET ttd_avp = 'Disetujui'
WHERE id_surat = NEW.id_surat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ttd_vp_ekspedisi`
--

CREATE TABLE `ttd_vp_ekspedisi` (
  `id_disposisi` int(10) NOT NULL,
  `nama_ttd` varchar(250) NOT NULL,
  `divisi_ttd` varchar(250) NOT NULL,
  `status_ttd` varchar(250) NOT NULL,
  `tgl_surat_ttd` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_surat` int(10) NOT NULL,
  `id_user` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Triggers `ttd_vp_ekspedisi`
--
DELIMITER $$
CREATE TRIGGER `setuju_avp_ekspedisi` AFTER INSERT ON `ttd_vp_ekspedisi` FOR EACH ROW BEGIN
UPDATE ekspedisi SET ttd_avp = 'Disetujui'
WHERE id_surat = NEW.id_surat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ttd_vp_transportasi`
--

CREATE TABLE `ttd_vp_transportasi` (
  `id_disposisi` int(10) NOT NULL,
  `nama_ttd` varchar(100) NOT NULL,
  `divisi_ttd` varchar(100) NOT NULL,
  `status_ttd` varchar(100) NOT NULL,
  `tgl_surat_ttd` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_user` tinyint(2) NOT NULL,
  `id_surat` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Triggers `ttd_vp_transportasi`
--
DELIMITER $$
CREATE TRIGGER `setuju_avp_transportasi` AFTER INSERT ON `ttd_vp_transportasi` FOR EACH ROW BEGIN
UPDATE transportasi SET ttd_avp = 'Disetujui'
WHERE id_surat = NEW.id_surat;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cleaning_service`
--
ALTER TABLE `cleaning_service`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `ekspedisi`
--
ALTER TABLE `ekspedisi`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `invoice_ekspedisi`
--
ALTER TABLE `invoice_ekspedisi`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `invoice_maintenance`
--
ALTER TABLE `invoice_maintenance`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `invoice_transportasi`
--
ALTER TABLE `invoice_transportasi`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `pemeriksa_ekspedisi`
--
ALTER TABLE `pemeriksa_ekspedisi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `pemeriksa_maintenance`
--
ALTER TABLE `pemeriksa_maintenance`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `pemeriksa_transportasi`
--
ALTER TABLE `pemeriksa_transportasi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `security`
--
ALTER TABLE `security`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_surat`),
  ADD UNIQUE KEY `jenis_mobil` (`jenis_mobil`);

--
-- Indexes for table `tbl_proses`
--
ALTER TABLE `tbl_proses`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tidak_setuju_avp_ekspedisi`
--
ALTER TABLE `tidak_setuju_avp_ekspedisi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `tidak_setuju_avp_maintenance`
--
ALTER TABLE `tidak_setuju_avp_maintenance`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `tidak_setuju_avp_transportasi`
--
ALTER TABLE `tidak_setuju_avp_transportasi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `tidak_setuju_pemeriksa_ekspedisi`
--
ALTER TABLE `tidak_setuju_pemeriksa_ekspedisi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `tidak_setuju_pemeriksa_maintenance`
--
ALTER TABLE `tidak_setuju_pemeriksa_maintenance`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `tidak_setuju_pemeriksa_transportasi`
--
ALTER TABLE `tidak_setuju_pemeriksa_transportasi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `transportasi`
--
ALTER TABLE `transportasi`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `ttd_vp`
--
ALTER TABLE `ttd_vp`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `ttd_vp_ekspedisi`
--
ALTER TABLE `ttd_vp_ekspedisi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `ttd_vp_transportasi`
--
ALTER TABLE `ttd_vp_transportasi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cleaning_service`
--
ALTER TABLE `cleaning_service`
  MODIFY `id_surat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `ekspedisi`
--
ALTER TABLE `ekspedisi`
  MODIFY `id_surat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `invoice_ekspedisi`
--
ALTER TABLE `invoice_ekspedisi`
  MODIFY `id_surat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `invoice_maintenance`
--
ALTER TABLE `invoice_maintenance`
  MODIFY `id_surat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `invoice_transportasi`
--
ALTER TABLE `invoice_transportasi`
  MODIFY `id_surat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id_surat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_disposisi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `pemeriksa_ekspedisi`
--
ALTER TABLE `pemeriksa_ekspedisi`
  MODIFY `id_disposisi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pemeriksa_maintenance`
--
ALTER TABLE `pemeriksa_maintenance`
  MODIFY `id_disposisi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pemeriksa_transportasi`
--
ALTER TABLE `pemeriksa_transportasi`
  MODIFY `id_disposisi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `security`
--
ALTER TABLE `security`
  MODIFY `id_surat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `tbl_proses`
--
ALTER TABLE `tbl_proses`
  MODIFY `id_disposisi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tidak_setuju_avp_ekspedisi`
--
ALTER TABLE `tidak_setuju_avp_ekspedisi`
  MODIFY `id_disposisi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tidak_setuju_avp_maintenance`
--
ALTER TABLE `tidak_setuju_avp_maintenance`
  MODIFY `id_disposisi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tidak_setuju_avp_transportasi`
--
ALTER TABLE `tidak_setuju_avp_transportasi`
  MODIFY `id_disposisi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tidak_setuju_pemeriksa_ekspedisi`
--
ALTER TABLE `tidak_setuju_pemeriksa_ekspedisi`
  MODIFY `id_disposisi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tidak_setuju_pemeriksa_maintenance`
--
ALTER TABLE `tidak_setuju_pemeriksa_maintenance`
  MODIFY `id_disposisi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tidak_setuju_pemeriksa_transportasi`
--
ALTER TABLE `tidak_setuju_pemeriksa_transportasi`
  MODIFY `id_disposisi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transportasi`
--
ALTER TABLE `transportasi`
  MODIFY `id_surat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `ttd_vp`
--
ALTER TABLE `ttd_vp`
  MODIFY `id_disposisi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `ttd_vp_ekspedisi`
--
ALTER TABLE `ttd_vp_ekspedisi`
  MODIFY `id_disposisi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ttd_vp_transportasi`
--
ALTER TABLE `ttd_vp_transportasi`
  MODIFY `id_disposisi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
