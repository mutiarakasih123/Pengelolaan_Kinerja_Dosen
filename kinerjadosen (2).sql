-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Mar 2020 pada 12.51
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

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
-- Struktur dari tabel `tblakses`
--

CREATE TABLE `tblakses` (
  `id_akses` int(11) NOT NULL,
  `nama_akses` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblakses`
--

INSERT INTO `tblakses` (`id_akses`, `nama_akses`) VALUES
(1, 'Admin'),
(2, 'Dosen'),
(3, 'Tata Usaha');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbljurusan`
--

CREATE TABLE `tbljurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbljurusan`
--

INSERT INTO `tbljurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Teknik Informatika'),
(2, 'Teknik Mesin'),
(5, 'Teknik Akuntansi'),
(6, 'Teknik Geomatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblkegiatan`
--

CREATE TABLE `tblkegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `id_subunsur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblkegiatan`
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
-- Struktur dari tabel `tblnilai_pengajar`
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
-- Dumping data untuk tabel `tblnilai_pengajar`
--

INSERT INTO `tblnilai_pengajar` (`id_nilaipengajar`, `id_reportkegiatan`, `namadosen_pengajar`, `sks_teori`, `sks_praktek`, `total`) VALUES
(1, 0, 'Riwinoto', 3, 2, 6),
(2, 2, 'Riwinoto', 2, 3, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblprodi`
--

CREATE TABLE `tblprodi` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblprodi`
--

INSERT INTO `tblprodi` (`id_prodi`, `nama_prodi`) VALUES
(1, 'Teknik Informatika'),
(2, 'Teknik Geomatika'),
(3, 'Teknik Geomatika & Jaring'),
(4, 'Animasi'),
(5, 'Rekayasa Keamanan Siber');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblreportkegiatan`
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
  `file` text,
  `kodemakul` varchar(50) DEFAULT NULL,
  `namamakul` varchar(50) DEFAULT NULL,
  `jumlah_sks` int(11) DEFAULT NULL,
  `kelas` varchar(25) DEFAULT NULL,
  `sksteori_real` int(11) DEFAULT NULL,
  `skspraktek_real` int(11) DEFAULT NULL,
  `namadosenpengajar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblreportkegiatan`
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
-- Struktur dari tabel `tblsks`
--

CREATE TABLE `tblsks` (
  `id_sks` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `total_sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblsubkegiatan`
--

CREATE TABLE `tblsubkegiatan` (
  `id_subkegiatan` int(11) NOT NULL,
  `nama_subkegiatan` varchar(100) NOT NULL,
  `id_kegiatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblsubkegiatan`
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
-- Struktur dari tabel `tblsubunsur`
--

CREATE TABLE `tblsubunsur` (
  `id_subunsur` int(11) NOT NULL,
  `nama_subunsur` varchar(100) NOT NULL,
  `id_unsur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblsubunsur`
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
-- Struktur dari tabel `tblth_ajaran`
--

CREATE TABLE `tblth_ajaran` (
  `id_thajaran` int(11) NOT NULL,
  `tahun_ajaran` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblth_ajaran`
--

INSERT INTO `tblth_ajaran` (`id_thajaran`, `tahun_ajaran`) VALUES
(1, '2019/2020'),
(2, '2020/2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblunsur`
--

CREATE TABLE `tblunsur` (
  `id_unsur` int(11) NOT NULL,
  `nama_unsur` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbluser`
--

CREATE TABLE `tbluser` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` int(11) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jurusan` varchar(25) NOT NULL,
  `prodi` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `id_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbluser`
--

INSERT INTO `tbluser` (`id_user`, `nama`, `nip`, `jabatan`, `tgl_lahir`, `jurusan`, `prodi`, `email`, `password`, `id_akses`) VALUES
(1, 'admin', 1234567, 'admin', '1987-03-06', 'Pilih Jurusan...', 'Pilih Prodi...', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1),
(27, 'tu', 45678, 'fgdfgh', '2020-03-18', 'Teknik Informatika', 'Teknik Informatika', 'tu', 'b6b4ce6df035dcfaa26f3bc32fb89e6a', 3),
(28, 'dosen', 4567, 'dfghjkl', '2020-12-31', 'Teknik Informatika', 'Teknik Informatika', 'dosen', 'ce28eed1511f631af6b2a7bb0a85d636', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tblakses`
--
ALTER TABLE `tblakses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indeks untuk tabel `tbljurusan`
--
ALTER TABLE `tbljurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `tblkegiatan`
--
ALTER TABLE `tblkegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indeks untuk tabel `tblnilai_pengajar`
--
ALTER TABLE `tblnilai_pengajar`
  ADD PRIMARY KEY (`id_nilaipengajar`);

--
-- Indeks untuk tabel `tblprodi`
--
ALTER TABLE `tblprodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indeks untuk tabel `tblreportkegiatan`
--
ALTER TABLE `tblreportkegiatan`
  ADD PRIMARY KEY (`id_reportkegiatan`);

--
-- Indeks untuk tabel `tblsks`
--
ALTER TABLE `tblsks`
  ADD PRIMARY KEY (`id_sks`);

--
-- Indeks untuk tabel `tblsubkegiatan`
--
ALTER TABLE `tblsubkegiatan`
  ADD PRIMARY KEY (`id_subkegiatan`);

--
-- Indeks untuk tabel `tblsubunsur`
--
ALTER TABLE `tblsubunsur`
  ADD PRIMARY KEY (`id_subunsur`);

--
-- Indeks untuk tabel `tblth_ajaran`
--
ALTER TABLE `tblth_ajaran`
  ADD PRIMARY KEY (`id_thajaran`);

--
-- Indeks untuk tabel `tblunsur`
--
ALTER TABLE `tblunsur`
  ADD PRIMARY KEY (`id_unsur`);

--
-- Indeks untuk tabel `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tblakses`
--
ALTER TABLE `tblakses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbljurusan`
--
ALTER TABLE `tbljurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tblkegiatan`
--
ALTER TABLE `tblkegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tblnilai_pengajar`
--
ALTER TABLE `tblnilai_pengajar`
  MODIFY `id_nilaipengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tblprodi`
--
ALTER TABLE `tblprodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tblreportkegiatan`
--
ALTER TABLE `tblreportkegiatan`
  MODIFY `id_reportkegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tblsks`
--
ALTER TABLE `tblsks`
  MODIFY `id_sks` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tblsubkegiatan`
--
ALTER TABLE `tblsubkegiatan`
  MODIFY `id_subkegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tblsubunsur`
--
ALTER TABLE `tblsubunsur`
  MODIFY `id_subunsur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tblth_ajaran`
--
ALTER TABLE `tblth_ajaran`
  MODIFY `id_thajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tblunsur`
--
ALTER TABLE `tblunsur`
  MODIFY `id_unsur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
