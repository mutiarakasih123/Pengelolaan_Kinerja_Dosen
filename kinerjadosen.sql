-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2020 at 03:12 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kinerjadosen`
--

-- --------------------------------------------------------

--
-- Table structure for table `countsks`
--

CREATE TABLE `countsks` (
  `id` int(11) NOT NULL,
  `pelaksanaan` int(11) NOT NULL,
  `sesi` int(11) NOT NULL,
  `dosen` int(11) NOT NULL,
  `countBkd` varchar(50) NOT NULL,
  `countSkp` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countsks`
--

INSERT INTO `countsks` (`id`, `pelaksanaan`, `sesi`, `dosen`, `countBkd`, `countSkp`, `created_at`, `updated_at`) VALUES
(37, 49, 1, 32, '1', '1', '2020-04-14 07:30:04', '2020-04-14 07:30:04'),
(38, 49, 2, 28, '0.5', '0.5', '2020-04-14 07:30:04', '2020-04-14 07:30:04'),
(39, 49, 1, 28, '0.125', '0.125', '2020-04-14 07:30:04', '2020-04-14 07:30:04'),
(40, 49, 2, 32, '0.25', '0.25', '2020-04-14 07:30:05', '2020-04-14 07:30:05'),
(41, 49, 3, 28, '0.125', '0.125', '2020-04-14 07:30:05', '2020-04-14 07:30:05'),
(42, 49, 4, 32, '0.25', '0.25', '2020-04-14 07:30:05', '2020-04-14 07:30:05'),
(52, 50, 1, 28, '1.50', '1.50', '2020-04-14 17:31:22', '2020-04-14 17:31:22'),
(53, 50, 2, 32, '1.50', '1.50', '2020-04-14 17:31:22', '2020-04-14 17:31:22'),
(57, 51, 1, 32, '1.33', '1.33', '2020-04-14 17:56:33', '2020-04-14 17:56:33'),
(58, 51, 2, 28, '1.33', '1.33', '2020-04-14 17:56:33', '2020-04-14 17:56:33'),
(59, 51, 3, 28, '1.33', '1.33', '2020-04-14 17:56:34', '2020-04-14 17:56:34'),
(62, 52, 1, 28, '11.25', '18', '2020-04-14 18:02:18', '2020-04-14 18:02:18'),
(63, 52, 2, 32, '9', '13.5', '2020-04-14 18:02:18', '2020-04-14 18:02:18'),
(66, 53, 1, 28, '12.5', '12.5', '2020-04-14 18:08:08', '2020-04-14 18:08:08'),
(67, 53, 2, 32, '6.25', '6.25', '2020-04-14 18:08:08', '2020-04-14 18:08:08'),
(69, 54, 1, 28, '3', '3', '2020-04-14 18:10:57', '2020-04-14 18:10:57');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_03_23_145936_pelaksanaan', 1),
(2, '2020_03_25_145640_sub_unsur1', 2),
(3, '2020_03_25_150937_sesi', 2),
(4, '2020_03_26_083017_sub_unsur2', 3),
(5, '2020_03_26_083017_sub_unsur23', 4),
(6, '2020_03_26_111410_sub_unsur4', 4),
(7, '2020_03_26_112008_sub_unsur5', 4),
(8, '2020_03_27_143214_sub_unsur6', 5);

-- --------------------------------------------------------

--
-- Table structure for table `pelaksanaan`
--

CREATE TABLE `pelaksanaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idJurusan` int(11) NOT NULL,
  `subUnsur` int(11) NOT NULL,
  `kegiatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `idProdi` int(11) NOT NULL,
  `thnAjaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tglMulai` date NOT NULL,
  `tglSelesai` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelaksanaan`
--

INSERT INTO `pelaksanaan` (`id`, `idJurusan`, `subUnsur`, `kegiatan`, `idProdi`, `thnAjaran`, `semester`, `tglMulai`, `tglSelesai`, `created_at`, `updated_at`) VALUES
(49, 6, 1, 'Melaksanakan perkulihan / tutorial dan membimbing, menguji serta menyelenggarakan pendidikan di laboratorium, praktik keguruan bengkel / studio / kebun pada fakultas / sekolah tinggi / Akademik / Politeknik sendiri, pada fakultas lain dalam lingkungan Universitas / Institut sendiri, maupun di luar perguruan tinggi sendiri secara melembaga tiap sks(paling banyak 12 sks) per semester', 2, '2019/2020', 'Genap', '2020-04-14', '2020-04-15', '2020-04-14 07:23:56', '2020-04-14 07:23:56'),
(50, 6, 2, 'Membimbing mahasiswa seminar', 2, '2019/2020', 'Genap', '2020-04-16', '2020-04-24', '2020-04-14 17:26:14', '2020-04-14 17:26:14'),
(51, 6, 3, 'Membimbing mahasiswa kuliah kerja nyata, pratek kerja nyata, praktek kerja lapangan', 2, '2019/2020', 'Genap', '2020-04-24', '2020-04-25', '2020-04-14 17:56:25', '2020-04-14 17:56:25'),
(52, 6, 4, 'Membimbing dan ikut membimbing dalam menghasilkan disertasi, tesis, skripsi dan laporan akhir studi', 2, '2019/2020', 'Genap', '2020-04-17', '2020-04-25', '2020-04-14 18:00:56', '2020-04-14 18:00:56'),
(53, 6, 5, 'Menguji mahasiswa yang mengikuti ujian akhir', 2, '2019/2020', 'Genap', '2020-04-23', '2020-04-25', '2020-04-14 18:07:50', '2020-04-14 18:07:50'),
(54, 6, 6, 'Melakukan pembinaan kegiatan mahasiswa di bidang Akademik dan kemahasiswaan', 2, '2019/2020', 'Genap', '2020-04-17', '2020-04-24', '2020-04-14 18:10:44', '2020-04-14 18:10:44');

-- --------------------------------------------------------

--
-- Table structure for table `sesi`
--

CREATE TABLE `sesi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idUnsur` int(11) NOT NULL,
  `unsur` int(11) DEFAULT NULL,
  `sesiKe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idDosenG` int(11) DEFAULT NULL,
  `idDosenT` int(11) DEFAULT NULL,
  `idDosenP` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sesi`
--

INSERT INTO `sesi` (`id`, `idUnsur`, `unsur`, `sesiKe`, `idDosenG`, `idDosenT`, `idDosenP`, `created_at`, `updated_at`) VALUES
(142, 12, 1, '1', NULL, 32, 28, '2020-04-14 07:30:04', '2020-04-14 07:30:04'),
(143, 12, 1, '2', NULL, 28, 32, '2020-04-14 07:30:04', '2020-04-14 07:30:04'),
(144, 12, 1, '3', NULL, NULL, 28, '2020-04-14 07:30:04', '2020-04-14 07:30:04'),
(145, 12, 1, '4', NULL, NULL, 32, '2020-04-14 07:30:04', '2020-04-14 07:30:04'),
(158, 12, 2, NULL, 28, NULL, NULL, '2020-04-14 17:31:22', '2020-04-14 17:31:22'),
(159, 12, 2, NULL, 32, NULL, NULL, '2020-04-14 17:31:22', '2020-04-14 17:31:22'),
(163, 13, 3, NULL, 32, NULL, NULL, '2020-04-14 17:56:33', '2020-04-14 17:56:33'),
(164, 13, 3, NULL, 28, NULL, NULL, '2020-04-14 17:56:33', '2020-04-14 17:56:33'),
(165, 13, 3, NULL, 28, NULL, NULL, '2020-04-14 17:56:34', '2020-04-14 17:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `subunsur1`
--

CREATE TABLE `subunsur1` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idPelaksanaan` int(11) NOT NULL,
  `kodeMK` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaMK` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumSKS` int(11) NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumSKST` int(11) NOT NULL,
  `jumSKSP` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subunsur1`
--

INSERT INTO `subunsur1` (`id`, `idPelaksanaan`, `kodeMK`, `namaMK`, `jumSKS`, `kelas`, `jumSKST`, `jumSKSP`, `created_at`, `updated_at`) VALUES
(12, 49, 'asdasdas', 'adasda', 3, 'pagi', 2, 1, '2020-04-14 07:23:56', '2020-04-14 07:23:56');

-- --------------------------------------------------------

--
-- Table structure for table `subunsur4`
--

CREATE TABLE `subunsur4` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idpelaksanaan` int(11) NOT NULL,
  `jnsBimb` smallint(6) NOT NULL,
  `jmlMHS` int(11) NOT NULL,
  `jmlSKS` int(11) NOT NULL,
  `idDosen1` int(11) NOT NULL,
  `bkd1` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skp1` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idDosen2` int(11) NOT NULL,
  `bkd2` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skp2` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subunsur4`
--

INSERT INTO `subunsur4` (`id`, `idpelaksanaan`, `jnsBimb`, `jmlMHS`, `jmlSKS`, `idDosen1`, `bkd1`, `skp1`, `idDosen2`, `bkd2`, `skp2`, `created_at`, `updated_at`) VALUES
(6, 52, 1, 9, 0, 28, '11.25', '18', 32, '9', '13.5', '2020-04-14 18:00:56', '2020-04-14 18:02:17');

-- --------------------------------------------------------

--
-- Table structure for table `subunsur5`
--

CREATE TABLE `subunsur5` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idpelaksanaan` int(11) NOT NULL,
  `jmlMHS` int(11) NOT NULL,
  `idDosenK` int(11) NOT NULL,
  `idDosenA` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subunsur5`
--

INSERT INTO `subunsur5` (`id`, `idpelaksanaan`, `jmlMHS`, `idDosenK`, `idDosenA`, `created_at`, `updated_at`) VALUES
(5, 53, 50, 28, 32, '2020-04-14 18:07:50', '2020-04-14 18:08:08');

-- --------------------------------------------------------

--
-- Table structure for table `subunsur6`
--

CREATE TABLE `subunsur6` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idpelaksanaan` int(11) NOT NULL,
  `idDosen` int(11) NOT NULL,
  `jmlKeg` int(11) NOT NULL,
  `jmlSKS` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subunsur6`
--

INSERT INTO `subunsur6` (`id`, `idpelaksanaan`, `idDosen`, `jmlKeg`, `jmlSKS`, `created_at`, `updated_at`) VALUES
(5, 54, 28, 3, 3, '2020-04-14 18:10:45', '2020-04-14 18:10:57');

-- --------------------------------------------------------

--
-- Table structure for table `subunsur23`
--

CREATE TABLE `subunsur23` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idPelaksanaan` int(11) NOT NULL,
  `jmlMHS` int(11) NOT NULL,
  `jmlSKS` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subunsur23`
--

INSERT INTO `subunsur23` (`id`, `idPelaksanaan`, `jmlMHS`, `jmlSKS`, `created_at`, `updated_at`) VALUES
(12, 50, 67, 3, '2020-04-14 17:26:14', '2020-04-14 17:26:14'),
(13, 51, 98, 4, '2020-04-14 17:56:25', '2020-04-14 17:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbljurusan`
--

CREATE TABLE `tbljurusan` (
  `id` int(11) NOT NULL,
  `nama_jurusan` varchar(25) NOT NULL,
  `idKaprodi` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbljurusan`
--

INSERT INTO `tbljurusan` (`id`, `nama_jurusan`, `idKaprodi`, `created_at`, `updated_at`) VALUES
(1, 'Teknik Informatika', 2, NULL, NULL),
(5, 'Teknik Akuntansi', 1, NULL, NULL),
(6, 'Teknik Geomatika', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblkegiatan`
--

CREATE TABLE `tblkegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `id_subunsur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblkegiatan`
--

INSERT INTO `tblkegiatan` (`id_kegiatan`, `nama_kegiatan`, `id_subunsur`) VALUES
(1, 'Doktor (S3)', 1),
(2, 'Megister (S2)\r\n', 1),
(3, 'Diklat PraJabatan golongan III', 2),
(4, 'Melaksanakan perkulihan/ tutorial dan membimbing, menguji serta menyelenggarakan pendidikan di labor', 3),
(5, 'Membimbing mahasiswa seminar', 4),
(6, 'Membimbing mahasiswa kuliah kerja nyata, pratek kerja nyata, praktek kerja lapangan', 5),
(7, 'Pembimbing utama	', 6),
(8, 'Pembimbing pendamping/pembantu', 6),
(9, 'Ketua penguji', 7),
(10, 'Anggota penguji	', 7),
(11, 'Melakukan pembinaan kegiatan mahasiswa di bidang Akademik dan kemahasiswaan', 8),
(12, 'Melakukan kegiatan pengembangan program kuliah', 9),
(13, 'Buku ajar		\r\n', 10),
(14, 'Diktat, modul, petunjuk praktikum, model, alat bantu, audio visual, naskah tutorial', 10),
(15, 'Pembimbing pencangkokan', 12),
(16, 'Reguler', 12),
(17, 'Detasering\r\n', 13),
(18, 'Pencangkokan', 13),
(19, 'Lamanya lebih dari 960 jam', 14),
(20, 'Lamanya 641-960 jam', 14),
(21, 'Lamanya 481-640 jam', 14),
(22, 'Lamanya 161-480 jam', 14),
(23, 'Lamanya 81-160 jam', 14),
(24, 'Lamanya 31-80 jam', 14),
(25, 'Lamanya 10-30 jam', 14);

-- --------------------------------------------------------

--
-- Table structure for table `tblprodi`
--

CREATE TABLE `tblprodi` (
  `id` int(11) NOT NULL,
  `nama_prodi` varchar(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblprodi`
--

INSERT INTO `tblprodi` (`id`, `nama_prodi`, `created_at`, `updated_at`) VALUES
(1, 'Teknik Informatika', NULL, NULL),
(2, 'Teknik Geomatika', NULL, NULL),
(3, 'Teknik Geomatika & Jaring', NULL, NULL),
(4, 'Animasi', NULL, NULL),
(5, 'Rekayasa Keamanan Siber', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` int(11) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `jakademi` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jurusan` varchar(25) NOT NULL,
  `prodi` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `akses` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `nama`, `nip`, `jabatan`, `jakademi`, `tgl_lahir`, `jurusan`, `prodi`, `email`, `password`, `akses`, `created_at`, `updated_at`) VALUES
(1, 'admin', 1234567, 'Admin', 'Lektor', '1987-03-06', '5', '1', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, NULL, '2020-04-11 06:33:35'),
(28, 'dosen', 4567, 'Dosen', 'Asisten Ahli', '2020-12-31', '6', '2', 'dosen@gmail.com', 'ce28eed1511f631af6b2a7bb0a85d636', 2, NULL, '2020-04-11 06:34:31'),
(29, 'mutia', 3123123, 'TU', 'TU', '2020-03-25', '6', '2', 'tu@gmail.com', 'b6b4ce6df035dcfaa26f3bc32fb89e6a', 3, '2020-03-22 03:50:41', '2020-04-11 06:34:59'),
(31, 'tes', 7866666, 'Admin', 'Asisten Ahli', '2020-04-17', '5', '1', 'tes@gmail.com', '098659262db01a0fbaf7059850a276ca', 1, '2020-04-11 06:17:06', '2020-04-11 06:17:06'),
(32, 'dosen2', 31231312, 'Dosen', 'Lektor', '2020-04-15', '5', '1', 'dosen2@gmail.com', 'b62f0ab35e8c2dcc22a627d1c6e39967', 2, '2020-04-11 08:06:14', '2020-04-11 08:06:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countsks`
--
ALTER TABLE `countsks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelaksanaan`
--
ALTER TABLE `pelaksanaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sesi`
--
ALTER TABLE `sesi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subunsur1`
--
ALTER TABLE `subunsur1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subunsur4`
--
ALTER TABLE `subunsur4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subunsur5`
--
ALTER TABLE `subunsur5`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subunsur6`
--
ALTER TABLE `subunsur6`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subunsur23`
--
ALTER TABLE `subunsur23`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbljurusan`
--
ALTER TABLE `tbljurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblkegiatan`
--
ALTER TABLE `tblkegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tblprodi`
--
ALTER TABLE `tblprodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countsks`
--
ALTER TABLE `countsks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pelaksanaan`
--
ALTER TABLE `pelaksanaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `sesi`
--
ALTER TABLE `sesi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `subunsur1`
--
ALTER TABLE `subunsur1`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subunsur4`
--
ALTER TABLE `subunsur4`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subunsur5`
--
ALTER TABLE `subunsur5`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subunsur6`
--
ALTER TABLE `subunsur6`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subunsur23`
--
ALTER TABLE `subunsur23`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbljurusan`
--
ALTER TABLE `tbljurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblkegiatan`
--
ALTER TABLE `tblkegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tblprodi`
--
ALTER TABLE `tblprodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
