-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2020 at 04:02 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

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
-- Table structure for table `tblakses`
--

CREATE TABLE `tblakses` (
  `id_akses` int(11) NOT NULL,
  `nama_akses` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblakses`
--

INSERT INTO `tblakses` (`id_akses`, `nama_akses`) VALUES
(1, 'Admin'),
(2, 'Dosen'),
(3, 'Tata Usaha');

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
(1, 'Teknik Informatika', 1, NULL, NULL),
(5, 'Teknik Akuntansi', 1, NULL, NULL),
(6, 'Teknik Geomatika', 1, NULL, NULL);

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
-- Table structure for table `tblnilai_pengajar`
--

CREATE TABLE `tblnilai_pengajar` (
  `id_nilaipengajar` int(11) NOT NULL,
  `id_reportkegiatan` int(11) NOT NULL,
  `namadosen_pengajar` varchar(50) NOT NULL,
  `sks_teori` int(11) NOT NULL,
  `sks_praktek` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblnilai_pengajar`
--

INSERT INTO `tblnilai_pengajar` (`id_nilaipengajar`, `id_reportkegiatan`, `namadosen_pengajar`, `sks_teori`, `sks_praktek`, `total`) VALUES
(1, 0, 'Riwinoto', 3, 2, 6),
(2, 2, 'Riwinoto', 2, 3, 4);

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
-- Table structure for table `tblreportkegiatan`
--

CREATE TABLE `tblreportkegiatan` (
  `id_reportkegiatan` int(11) NOT NULL,
  `jurusan` varchar(25) DEFAULT NULL,
  `subunsur` varchar(100) DEFAULT NULL,
  `kegiatan` varchar(50) DEFAULT NULL,
  `prodi` varchar(50) DEFAULT NULL,
  `th_ajaran` varchar(25) DEFAULT NULL,
  `semester` varchar(25) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `file` text DEFAULT NULL,
  `kodemakul` varchar(50) DEFAULT NULL,
  `namamakul` varchar(50) DEFAULT NULL,
  `jumlah_sks` int(11) DEFAULT NULL,
  `kelas` varchar(25) DEFAULT NULL,
  `sksteori_real` int(11) DEFAULT NULL,
  `skspraktek_real` int(11) DEFAULT NULL,
  `namadosenpengajar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblreportkegiatan`
--

INSERT INTO `tblreportkegiatan` (`id_reportkegiatan`, `jurusan`, `subunsur`, `kegiatan`, `prodi`, `th_ajaran`, `semester`, `tgl_mulai`, `tgl_selesai`, `file`, `kodemakul`, `namamakul`, `jumlah_sks`, `kelas`, `sksteori_real`, `skspraktek_real`, `namadosenpengajar`) VALUES
(2, 'Teknik informatika', 'Melaksanakan perkuliahan/tutorial dan membimbing', 'Melaksanakan perkulihan/ tutorial dan membimbing, ', 'Teknik Informatika', '2019/2020', 'Genap', '2020-03-01', '2020-03-27', 'File', 'Tj123', 'budaya', 3, 'Malam', 1, 2, 'Riwinoto'),
(3, 'Teknik informatika', 'Melaksanakan perkuliahan/tutorial dan membimbing', 'Melaksanakan perkulihan/ tutorial dan membimbing, ', 'Teknik Informatika', '2019/2020', 'Genap', '2020-03-01', '2020-03-27', 'File', 'Tj123', 'budaya', 3, 'Malam', 1, 2, 'Riwinoto'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Pilih Jurusan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Pilih Jurusan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '3', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '1', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '1', '3', NULL, '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '1', '3', '4', '1', '1', '1', '2020-03-02', '2020-03-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '1', '3', '4', '1', '1', '1', '2020-03-02', '2020-03-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '1', '3', '4', '1', '1', '1', '2020-03-01', '2020-03-20', NULL, 'jjh123', 'budaya', NULL, NULL, NULL, NULL, NULL),
(15, '1', '3', '4', '1', '1', '1', '2020-03-02', '2020-03-28', NULL, 'gggg11', 'eeee', 3, '1', NULL, NULL, NULL),
(16, '1', '3', '4', '1', '1', '1', '2020-03-03', '2020-03-27', NULL, '22ddd', 'ggggg', 4, 'Pagi', 2, 1, 'riwinoto');

-- --------------------------------------------------------

--
-- Table structure for table `tblsks`
--

CREATE TABLE `tblsks` (
  `id_sks` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `total_sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblsubkegiatan`
--

CREATE TABLE `tblsubkegiatan` (
  `id_subkegiatan` int(11) NOT NULL,
  `nama_subkegiatan` varchar(100) NOT NULL,
  `id_kegiatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubkegiatan`
--

INSERT INTO `tblsubkegiatan` (`id_subkegiatan`, `nama_subkegiatan`, `id_kegiatan`) VALUES
(1, 'Disertasi', 7),
(2, 'Tesis', 7),
(3, 'Skripsi\r\n', 7),
(4, 'Laporan akhir Studi', 7),
(5, 'Disertasi', 8),
(6, 'Tesis\r\n', 8),
(7, 'Skripsi\r\n', 8),
(8, 'Laporan akhir Studi', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubunsur`
--

CREATE TABLE `tblsubunsur` (
  `id_subunsur` int(11) NOT NULL,
  `nama_subunsur` varchar(100) NOT NULL,
  `id_unsur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubunsur`
--

INSERT INTO `tblsubunsur` (`id_subunsur`, `nama_subunsur`, `id_unsur`) VALUES
(1, 'Pendidikan Formal', 1),
(2, 'Diklat Pra Jabatan', 1),
(3, 'Melaksanakan perkuliahan/tutorial dan membimbing,menguji serta menyelenggarakan pendidikan dilabrato', 2),
(4, 'Membimbing seminar\r\n', 2),
(5, 'Membing kuliah kerja nyata,pratek kerja nyata, praktek kerja  lapangan', 2),
(6, 'Membimbing dan ikut\r\nmembimbing dalam menghasilkan disertasi, tesis,skripsi dan laporan akhir studi', 2),
(7, 'Bertugas sebagai penguji pada ujian akhir', 2),
(8, 'Membina kegiatan mahasiswa', 2),
(9, 'Mengembangkan program kuliah', 2),
(10, 'Mengembangkan bahan kuliah', 2),
(11, 'Mengembangkan bahan kuliah', 2),
(12, 'Membimbing Akademik Dosen yang lebih rendah jabatannya', 2),
(13, 'Melaksanakan kegiatan Detasering dan pencangkokan Akademik Dosen', 2),
(14, 'Melakukan kegiatan\r\npengembangan diri untuk meningkatan kompetensi', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblth_ajaran`
--

CREATE TABLE `tblth_ajaran` (
  `id_thajaran` int(11) NOT NULL,
  `tahun_ajaran` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblth_ajaran`
--

INSERT INTO `tblth_ajaran` (`id_thajaran`, `tahun_ajaran`) VALUES
(1, '2019/2020'),
(2, '2020/2021');

-- --------------------------------------------------------

--
-- Table structure for table `tblunsur`
--

CREATE TABLE `tblunsur` (
  `id_unsur` int(11) NOT NULL,
  `nama_unsur` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(29, 'mutia', 3123123, 'Admin', '2020-03-25', 'Sistem Informasi', 'Teknik', 'acepalan3@gmail.com', 'ac0318e30823429fed4a311abbfab9a8', 1, '2020-03-22 03:50:41', '2020-03-22 04:22:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblakses`
--
ALTER TABLE `tblakses`
  ADD PRIMARY KEY (`id_akses`);

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
-- Indexes for table `tblnilai_pengajar`
--
ALTER TABLE `tblnilai_pengajar`
  ADD PRIMARY KEY (`id_nilaipengajar`);

--
-- Indexes for table `tblprodi`
--
ALTER TABLE `tblprodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblreportkegiatan`
--
ALTER TABLE `tblreportkegiatan`
  ADD PRIMARY KEY (`id_reportkegiatan`);

--
-- Indexes for table `tblsks`
--
ALTER TABLE `tblsks`
  ADD PRIMARY KEY (`id_sks`);

--
-- Indexes for table `tblsubkegiatan`
--
ALTER TABLE `tblsubkegiatan`
  ADD PRIMARY KEY (`id_subkegiatan`);

--
-- Indexes for table `tblsubunsur`
--
ALTER TABLE `tblsubunsur`
  ADD PRIMARY KEY (`id_subunsur`);

--
-- Indexes for table `tblth_ajaran`
--
ALTER TABLE `tblth_ajaran`
  ADD PRIMARY KEY (`id_thajaran`);

--
-- Indexes for table `tblunsur`
--
ALTER TABLE `tblunsur`
  ADD PRIMARY KEY (`id_unsur`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblakses`
--
ALTER TABLE `tblakses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `tblnilai_pengajar`
--
ALTER TABLE `tblnilai_pengajar`
  MODIFY `id_nilaipengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblprodi`
--
ALTER TABLE `tblprodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblreportkegiatan`
--
ALTER TABLE `tblreportkegiatan`
  MODIFY `id_reportkegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblsks`
--
ALTER TABLE `tblsks`
  MODIFY `id_sks` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblsubkegiatan`
--
ALTER TABLE `tblsubkegiatan`
  MODIFY `id_subkegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblsubunsur`
--
ALTER TABLE `tblsubunsur`
  MODIFY `id_subunsur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblth_ajaran`
--
ALTER TABLE `tblth_ajaran`
  MODIFY `id_thajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblunsur`
--
ALTER TABLE `tblunsur`
  MODIFY `id_unsur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
