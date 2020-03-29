-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2020 at 01:00 PM
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
  `filePendukung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelaksanaan`
--

INSERT INTO `pelaksanaan` (`id`, `idJurusan`, `subUnsur`, `kegiatan`, `idProdi`, `thnAjaran`, `semester`, `tglMulai`, `tglSelesai`, `filePendukung`, `created_at`, `updated_at`) VALUES
(19, 6, 1, 'Melaksanakan perkulihan / tutorial dan membimbing, menguji serta menyelenggarakan pendidikan di laboratorium, praktik keguruan bengkel / studio / kebun pada fakultas / sekolah tinggi / Akademik / Politeknik sendiri, pada fakultas lain dalam lingkungan Universitas / Institut sendiri, maupun di luar perguruan tinggi sendiri secara melembaga tiap sks(paling banyak 12 sks) per semester', 2, '2019/2020', 'Genap', '2020-03-12', '2020-03-28', '1585322522_TA1.Revisi 1.docx', '2020-03-27 08:22:02', '2020-03-27 23:47:35'),
(27, 5, 2, 'Membimbing mahasiswa seminar', 1, '2020/2021', 'Genap', '2020-03-25', '2020-03-28', '1585380489_TA1.Revisi 1.docx', '2020-03-28 00:28:09', '2020-03-28 00:28:09'),
(28, 5, 3, 'Membimbing mahasiswa kuliah kerja nyata, pratek kerja nyata, praktek kerja lapangan', 1, '2020/2021', 'Ganjil', '2020-03-18', '2020-03-28', '1585469045_TA1.Revisi 1.docx', '2020-03-29 01:04:05', '2020-03-29 01:04:05'),
(29, 6, 4, 'Membimbing dan ikut membimbing dalam menghasilkan disertasi, tesis, skripsi dan laporan akhir studi', 2, '2020/2021', 'Ganjil', '2020-03-28', '2020-03-14', '1585469265_TA1.Revisi 1.docx', '2020-03-29 01:07:45', '2020-03-29 01:07:45'),
(30, 5, 5, 'Menguji mahasiswa yang mengikuti ujian akhir', 1, '2022/2023', 'Ganjil', '2020-03-28', '2020-03-20', '1585470550_TA1.Revisi 1.docx', '2020-03-29 01:29:10', '2020-03-29 01:29:10'),
(32, 5, 6, 'Melakukan pembinaan kegiatan mahasiswa di bidang Akademik dan kemahasiswaan', 1, '2019/2020', 'Genap', '2020-03-19', '2020-03-28', '1585478734_TA1.Revisi 1.docx', '2020-03-29 03:45:34', '2020-03-29 03:45:34');

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
(37, 4, 1, '1', NULL, 28, 28, '2020-03-27 23:47:35', '2020-03-27 23:47:35'),
(38, 4, 1, '2', NULL, 30, 28, '2020-03-27 23:47:35', '2020-03-27 23:47:35'),
(39, 4, 1, '3', NULL, 30, 28, '2020-03-27 23:47:35', '2020-03-27 23:47:35'),
(40, 4, 1, '4', NULL, NULL, 28, '2020-03-27 23:47:35', '2020-03-27 23:47:35'),
(64, 8, 2, NULL, 28, NULL, NULL, '2020-03-29 00:19:33', '2020-03-29 00:19:33'),
(70, 9, 3, NULL, 28, NULL, NULL, '2020-03-29 01:06:24', '2020-03-29 01:06:24'),
(71, 9, 3, NULL, 28, NULL, NULL, '2020-03-29 01:06:24', '2020-03-29 01:06:24'),
(72, 9, 3, NULL, 30, NULL, NULL, '2020-03-29 01:06:24', '2020-03-29 01:06:24'),
(73, 9, 3, NULL, 30, NULL, NULL, '2020-03-29 01:06:24', '2020-03-29 01:06:24');

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
(4, 19, 'as', 'asasas', 3, 'pagi', 3, 1, '2020-03-27 08:22:02', '2020-03-27 14:35:35');

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
  `idDosen2` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subunsur4`
--

INSERT INTO `subunsur4` (`id`, `idpelaksanaan`, `jnsBimb`, `jmlMHS`, `jmlSKS`, `idDosen1`, `idDosen2`, `created_at`, `updated_at`) VALUES
(2, 29, 1, 23, 12, 30, 30, '2020-03-29 01:07:45', '2020-03-29 01:26:17');

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
(3, 30, 56, 30, 30, '2020-03-29 01:29:10', '2020-03-29 01:33:54');

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
(3, 32, 28, 23, 2, '2020-03-29 03:45:34', '2020-03-29 03:45:34');

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
(8, 27, 24, 1, '2020-03-28 00:28:09', '2020-03-28 00:28:09'),
(9, 28, 67, 3, '2020-03-29 01:04:05', '2020-03-29 01:04:05');

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

INSERT INTO `tbluser` (`id`, `nama`, `nip`, `jabatan`, `tgl_lahir`, `jurusan`, `prodi`, `email`, `password`, `akses`, `created_at`, `updated_at`) VALUES
(1, 'admin', 1234567, 'Admin', '1987-03-06', 'Sistem Informasi', 'Teknik', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, NULL, '2020-03-22 04:23:04'),
(28, 'dosen', 4567, 'Dosen', '2020-12-31', 'Sistem Informasi', 'Hukum', 'dosen@gmail.com', 'ce28eed1511f631af6b2a7bb0a85d636', 2, NULL, '2020-03-22 04:23:30'),
(29, 'mutia', 3123123, 'TU', '2020-03-25', 'Sistem Informasi', 'Teknik', 'tu@gmail.com', 'b6b4ce6df035dcfaa26f3bc32fb89e6a', 3, '2020-03-22 03:50:41', '2020-03-23 07:33:48'),
(30, 'tes dosen', 454442, 'Dosen', '2020-03-28', 'Hukum', 'Hukum', 'dosen2@gmail.com', 'b62f0ab35e8c2dcc22a627d1c6e39967', 2, '2020-03-27 12:55:08', '2020-03-27 12:55:08');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pelaksanaan`
--
ALTER TABLE `pelaksanaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `sesi`
--
ALTER TABLE `sesi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `subunsur1`
--
ALTER TABLE `subunsur1`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subunsur4`
--
ALTER TABLE `subunsur4`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subunsur5`
--
ALTER TABLE `subunsur5`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subunsur6`
--
ALTER TABLE `subunsur6`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subunsur23`
--
ALTER TABLE `subunsur23`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
