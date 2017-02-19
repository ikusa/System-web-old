-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2017 at 03:54 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `systemwebsu`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `kodeMK` int(11) NOT NULL,
  `namaMK` text NOT NULL,
  `sks` int(11) NOT NULL,
  `id_term` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `status` varchar(1) NOT NULL,
  `program_studi` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `kodeMK`, `namaMK`, `sks`, `id_term`, `id_dosen`, `status`, `program_studi`) VALUES
(1, 123, 'Pemograman Dasar\r\n', 3, 1, 1, '1', 'HCI'),
(2, 234, 'Pengantar Informatika', 2, 1, 1, '1', 'HCI'),
(3, 324, 'Pengantar Kimia', 2, 1, 1, '1', 'CHE');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `program_studi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nama`, `program_studi`) VALUES
(1, 'asdas', 'HCI');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `user_id` varchar(45) DEFAULT NULL,
  `nama` text NOT NULL,
  `nim` int(11) NOT NULL,
  `program_studi` varchar(45) NOT NULL,
  `email` text NOT NULL,
  `no_telephone` text,
  `agama` text,
  `tempat_lahir` text,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `ipk` double DEFAULT NULL,
  `nama_ibu` text,
  `nama_ayah` text,
  `tanggal_lahir` date DEFAULT NULL,
  `nisn` text,
  `nik` text,
  `npwp` text,
  `kewarganegaraan` text,
  `jalan` text,
  `dusun` text,
  `rt` text,
  `rw` text,
  `kodepos` text,
  `kelurahan` text,
  `kecamatan` text,
  `jenis_tinggal` text,
  `transportasi` text,
  `hp` text,
  `status_kps` text,
  `no_kps` text,
  `angkatan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `user_id`, `nama`, `nim`, `program_studi`, `email`, `no_telephone`, `agama`, `tempat_lahir`, `jenis_kelamin`, `ipk`, `nama_ibu`, `nama_ayah`, `tanggal_lahir`, `nisn`, `nik`, `npwp`, `kewarganegaraan`, `jalan`, `dusun`, `rt`, `rw`, `kodepos`, `kelurahan`, `kecamatan`, `jenis_tinggal`, `transportasi`, `hp`, `status_kps`, `no_kps`, `angkatan`) VALUES
(1, '1', 'Joshua Setiawan', 1500910005, 'HCI', 'joshuasetiawan@ymail.com', NULL, 'asdd', 'czxv', 'Laki-Laki', 4, 'zvdsf', NULL, NULL, 'dsfasdfa', 'fasdfas', 'fsadfas', 'fsafsadf', 'sdf', 'asdfasdf', 'sdfasf', 'asdfadsf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2', 'Adi Budi Charlie', 1432310002, 'HCI', 'abcde@abcde.com', NULL, 'anjkkdn', 'bkbaskbfd', 'Laki-Laki', 2.5, 'jhjasjdb', NULL, NULL, 'andnsjkabd', 'kjbkbsak ', 'kjnkjnsajkdnk', 'nkjnkjasandkjn', 'njnsnnkj', 'jnksankn', 'jknaasdjk', 'jknsnkj', 'jnkjnasdjk', 'kjadns', 'jknjasdjn', 'njasdjkn', 'kjnnkasd', 'jknjasdnj', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `id_tipenilai` int(11) DEFAULT NULL,
  `percentage` double DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('abc@dispostable.com', '27c13451e1804b09e63a58dcabe3b36ec5e6cff9653e724290fc4f2ded7d3297', '2017-02-08 02:33:30');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `judul` text,
  `isi` text,
  `date_create` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `isActive` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `user_id`, `judul`, `isi`, `date_create`, `isActive`) VALUES
(1, 12, 'Kartu Ujian', 'Silahkan mengambil kartu ujian di BAA', '2017-02-09 02:28:34', '1'),
(2, 15, 'Surat Magang', 'Silahkan mengumpulkan surat magang', '2017-02-09 02:38:06', '1'),
(3, 17, 'Biodata', 'Silahkan melengkapi biodata', '2017-02-09 02:38:06', '1'),
(4, 10, 'Surat Edaran', 'Silahkan mengambil surat edaran di BAA', '2017-02-09 02:52:28', '1');

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `id` int(11) NOT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `id_course` int(11) DEFAULT NULL,
  `final` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`id`, `id_mahasiswa`, `id_course`, `final`) VALUES
(3, 1, 1, NULL),
(4, 1, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `id` int(11) NOT NULL,
  `term` text NOT NULL,
  `kode_dikti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`id`, `term`, `kode_dikti`) VALUES
(1, '2013/2014-1', '1234'),
(2, '2013/2014-2', '2345'),
(3, '2014/2015-1', '34567'),
(4, '2014/2015-2', '45678');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ikusa', 'joshuasetiawan@ymail.com', '$2y$10$o5mvqAfAf8xhfI6qKQZzV.2gTfnuwUsZw9n7E3.PZh6kkTg/Jxd2O', 'PVpE0DZiDACP2kTOkpnGQxItUXDeFNZRgvX0lQJSx0w4CQFTwd39PuZpcShs', '2017-01-04 02:55:06', '2017-01-22 04:43:42'),
(2, 'testing', 'abc@dispostable.com', '$2y$10$SzdUOkq3sxGv7nBLvC9BG.lIWf3OLhQqq5tWHyLBHC.Q/SF5CIF2K', '5uEShUbQbok1V96zT5Uz4yOP4ahnPjBtJr9YuWGI8igycet3bVppnVQNF2WJ', '2017-02-08 02:25:43', '2017-02-08 04:49:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kodeMK` (`kodeMK`),
  ADD KEY `id_term` (`id_term`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_course` (`id_course`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_course` (`id_course`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `student_course`
--
ALTER TABLE `student_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`id_term`) REFERENCES `term` (`id`),
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id`),
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_course`) REFERENCES `course` (`id`);

--
-- Constraints for table `student_course`
--
ALTER TABLE `student_course`
  ADD CONSTRAINT `student_course_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id`),
  ADD CONSTRAINT `student_course_ibfk_2` FOREIGN KEY (`id_course`) REFERENCES `course` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
