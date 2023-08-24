-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2023 at 06:07 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb_prestasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
('e442ef1c-e7ee-4959-aff6-cde6e1f07454', 'HashAdmin', '$2y$10$8YSJv8fSd1OHgkoCPMI8FenbGHWhJ1s3lPlcn/DEb9wz8sAflENz2', '2023-08-03 04:58:41', '2023-08-03 04:58:41');

-- --------------------------------------------------------

--
-- Table structure for table `bobots`
--

CREATE TABLE `bobots` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` double NOT NULL,
  `parameter_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bobots`
--

INSERT INTO `bobots` (`id`, `bobot`, `parameter_id`, `created_at`, `updated_at`) VALUES
('027b6407-028d-4c12-8232-a9d0785cf5ac', 0.3, 'da3d6098-0867-4941-a1ea-6c78e505df34', '2023-07-05 11:05:18', '2023-07-05 11:05:18'),
('280757d7-e0b8-4290-a6c5-215af9c966f5', 0.15, '2ea313de-7de2-41f1-8f66-d930f8c19c69', '2023-07-05 11:04:49', '2023-07-05 11:04:49'),
('346f4ca8-5633-4423-bebc-d6250efaecd4', 0.15, 'cafd98b2-8cd9-47ae-a2f2-4441f9755e1d', '2023-07-05 11:05:42', '2023-07-05 11:05:42'),
('9b83e460-9a54-4e5b-a7b7-4d789c024a33', 0.25, '17676edc-d434-4933-8085-ee631ff44e84', '2023-07-05 11:05:07', '2023-07-05 11:05:07'),
('fb68158e-5e80-4032-bf8d-f5b3ee0cd80f', 0.15, '557af787-4d72-43ca-99bf-537f62876f8c', '2023-06-22 03:10:38', '2023-07-05 11:04:29');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_04_03_050538_create_parameters_table', 1),
(3, '2023_04_03_064449_create_bobot_table', 1),
(4, '2023_04_03_070712_create_subbobot_table', 1),
(6, '2023_04_04_043716_create_juara_table', 1),
(7, '2023_04_04_044002_create_prestasi_akademik_table', 1),
(8, '2023_04_04_045635_create_prestasi_nonakademik_table', 1),
(9, '2023_04_04_055901_create_nilai_table', 1),
(10, '2023_04_04_061916_create_pendaftaran_table', 1),
(11, '2023_04_04_062931_create_admin_table', 1),
(12, '2023_04_05_070829_create_raports_table', 1),
(13, '2023_04_03_072147_create_sekolahs_table', 2),
(14, '2023_07_12_041745_create_prestasis_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `nilais`
--

CREATE TABLE `nilais` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parameter_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_parameter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilais`
--

INSERT INTO `nilais` (`id`, `nisn`, `parameter_id`, `nama_parameter`, `nilai`, `created_at`, `updated_at`) VALUES
('199e43ca-999e-4c9e-b1af-30feeb3fe056', '1111987', '17676edc-d434-4933-8085-ee631ff44e84', 'Prestasi akademik', 3, '2023-07-31 12:23:54', '2023-07-31 12:23:54'),
('1d8de792-4658-4c86-805a-64e6bb937d5a', '1111987', 'da3d6098-0867-4941-a1ea-6c78e505df34', 'Prestasi non-akademik', 2, '2023-07-31 12:23:54', '2023-07-31 12:23:54'),
('232692b9-9e0d-4eee-aa77-7d987da0da8a', '11119777', 'da3d6098-0867-4941-a1ea-6c78e505df34', 'Prestasi non-akademik', 7, '2023-07-20 03:14:00', '2023-07-20 03:14:00'),
('2f51a7dc-2707-4123-af0b-d6c660fa921d', '11119777', 'cafd98b2-8cd9-47ae-a2f2-4441f9755e1d', 'Rata - rata nilai Ujian Nasional', 2, '2023-07-20 03:14:00', '2023-07-20 03:14:00'),
('44fc5cfe-f62b-4d71-a851-14b57965843a', '11119777', '2ea313de-7de2-41f1-8f66-d930f8c19c69', 'Rata-rata nilai semester 1 - 5', 3, '2023-07-20 03:14:00', '2023-07-20 03:14:00'),
('638701c8-ba48-4062-92e8-6f3799e61f3e', '11119777', '557af787-4d72-43ca-99bf-537f62876f8c', 'Rata-rata nilai UAS', 3, '2023-07-20 03:14:00', '2023-07-20 03:14:00'),
('78e08e7b-a910-4b3b-96ac-94f633bf5575', '1111987', '2ea313de-7de2-41f1-8f66-d930f8c19c69', 'Rata-rata nilai semester 1 - 5', 3, '2023-07-31 12:23:54', '2023-07-31 12:23:54'),
('9c236e9d-ce63-4d33-aea8-6c68771ba7d5', '1111987', '557af787-4d72-43ca-99bf-537f62876f8c', 'Rata-rata nilai UAS', 3, '2023-07-31 12:23:54', '2023-07-31 12:23:54'),
('d85b0e4f-b60f-4897-a892-c01c23165ba3', '1111987', 'cafd98b2-8cd9-47ae-a2f2-4441f9755e1d', 'Rata - rata nilai Ujian Nasional', 2, '2023-07-31 12:23:54', '2023-07-31 12:23:54'),
('e0b59735-f26d-4d90-985a-7a067daf88a6', '11119777', '17676edc-d434-4933-8085-ee631ff44e84', 'Prestasi akademik', 3, '2023-07-20 03:14:00', '2023-07-20 03:14:00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `normalization`
-- (See below for the actual view)
--
CREATE TABLE `normalization` (
`parameter_id` varchar(255)
,`sifat` enum('max','min')
,`bobot` double
,`normalization` double(18,1)
);

-- --------------------------------------------------------

--
-- Table structure for table `parameters`
--

CREATE TABLE `parameters` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sifat` enum('max','min') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parameters`
--

INSERT INTO `parameters` (`id`, `nama`, `sifat`, `created_at`, `updated_at`) VALUES
('17676edc-d434-4933-8085-ee631ff44e84', 'Prestasi akademik', 'max', '2023-07-05 11:02:02', '2023-07-05 11:02:02'),
('2ea313de-7de2-41f1-8f66-d930f8c19c69', 'Rata-rata nilai semester 1 - 5', 'max', '2023-06-22 03:05:20', '2023-07-05 10:59:14'),
('557af787-4d72-43ca-99bf-537f62876f8c', 'Rata-rata nilai Ujian Nasional', 'max', '2023-06-22 03:08:11', '2023-06-22 03:08:11'),
('cafd98b2-8cd9-47ae-a2f2-4441f9755e1d', 'Rata - rata nilai UAS', 'max', '2023-07-05 11:02:38', '2023-07-05 11:02:38'),
('da3d6098-0867-4941-a1ea-6c78e505df34', 'Prestasi non-akademik', 'max', '2023-07-05 11:02:13', '2023-07-05 11:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(205, 'App\\Models\\Admin', 0, 'auth_token', 'ca2a7736bcf0258141e25122fda5dc9fe0db2258c0ef786778f3d081db6ccb50', '[\"admin\"]', '2023-08-10 03:13:41', NULL, '2023-08-10 03:13:39', '2023-08-10 03:13:41');

-- --------------------------------------------------------

--
-- Table structure for table `prestasis`
--

CREATE TABLE `prestasis` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_semester` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_uas` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_un` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prestasi_akademik` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prestasi_non_akademik` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prestasis`
--

INSERT INTO `prestasis` (`id`, `nisn`, `nilai_semester`, `nilai_uas`, `nilai_un`, `prestasi_akademik`, `prestasi_non_akademik`, `created_at`, `updated_at`) VALUES
('20e0a744-fa9e-4351-951b-fdbcdedf26bc', '11119777', '64b78dd52f960_RangkumanNilai.pdf', '64b78dd530bb3_RangkumanNilai.pdf', '64b78dd5302f7_RangkumanNilai.pdf', '64b78dd53149b_RangkumanNilai.pdf', '64b78dd531d5f_RangkumanNilai.pdf', '2023-07-12 10:35:04', '2023-07-19 00:16:37'),
('8117bf7d-e225-4867-8a1f-cf357343e484', '1111987', '64c808460ff89_RangkumanNilai.pdf', '64c8084610d13_RangkumanNilai.pdf', '64c80846107dc_RangkumanNilai.pdf', '64c808461123c_RangkumanNilai.pdf', '64c8084611737_RangkumanNilai.pdf', '2023-07-31 12:15:18', '2023-07-31 12:15:18');

-- --------------------------------------------------------

--
-- Stand-in structure for view `rankings`
-- (See below for the actual view)
--
CREATE TABLE `rankings` (
`nama` varchar(30)
,`nisn` varchar(10)
,`asal_sekolah` varchar(20)
,`ranking` double
);

-- --------------------------------------------------------

--
-- Table structure for table `sekolahs`
--

CREATE TABLE `sekolahs` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_identitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_alur_pendaftaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendaftaran_buka` datetime NOT NULL,
  `pendaftaran_tutup` datetime NOT NULL,
  `pengumuman_seleksi` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sekolahs`
--

INSERT INTO `sekolahs` (`id`, `nama`, `deskripsi`, `foto_logo`, `foto_identitas`, `foto_alur_pendaftaran`, `pendaftaran_buka`, `pendaftaran_tutup`, `pengumuman_seleksi`, `created_at`, `updated_at`) VALUES
('57d1e78b-9a6b-4e90-ad71-a352025921cf', 'SMAN 6 Depok', 'Sekolah yang dikenal dengan segudang prestasi. Mulai dari bidang akademik sampai non-akademik. SMAN 6 Depok memiliki tujuan utama dengan menjadikan lulusannya menjadi orang yang agamis dan religius di semua bidang yang dikuasai', 'logo-hexa.png', 'sekolah1.jpeg|sekolah2.jpeg|sekolah3.jpg', 'pendaftaran.jpg', '2023-07-05 00:00:00', '2023-07-19 00:00:00', '2023-07-31 00:00:00', '2023-07-02 06:15:01', '2023-07-05 00:58:09');

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `nisn` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_sekolah` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp_ortu` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_profil` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_akte` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_ijazah` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_kk` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_ktp_ortu` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`nisn`, `asal_sekolah`, `email`, `password`, `nama`, `alamat`, `no_hp_ortu`, `jenis_kelamin`, `foto_profil`, `foto_akte`, `foto_ijazah`, `foto_kk`, `foto_ktp_ortu`, `created_at`, `updated_at`) VALUES
('111191238', 'SMPN 234 Jakarta', 'don_q@gmail.com', '$2y$10$YiVwF7ChJR1Mga8qIRPcGOjgvyaKJDsX5trT2QVaGvtBphur8FiRm', 'Don Quixote', 'Jl jalan', '08983714619', 'L', '1687942858_building1.jpg', '1687942858_building1.jpg', '1687942858_building1.jpg', '1687942858_building1.jpg', '1687942858_building1.jpg', '2023-06-25 04:20:23', '2023-06-28 02:00:58'),
('11119777', 'SMPN 17 Depok', 'kale@gmail.com', '$2y$10$dChx1.VUWc6RtuIdh4s68.bSisAqsO0JtJMZxsek92P68c34ZlNjm', 'Kale Pramono', 'Jl jalan aja', '089675379948', 'L', '1688545846_unsplash1.jpg', '1688545846_unsplash1.jpg', '1688545846_unsplash1.jpg', '1688545846_unsplash1.jpg', '1688545846_unsplash1.jpg', '2023-06-22 06:34:39', '2023-07-05 01:30:46'),
('1111987', 'SMPN 253 Jakarta', 'don@gmail.com', '$2y$10$GlcKs09R10AmTg0ssfrXo.BYzhLedoabh374BQ/1oA5AoYyXqq0Hq', 'Ratu Bilqis', 'jl. jalan ke dufan', '08976543', 'P', '1688552295_unsplash1.jpg', '1688552295_unsplash1.jpg', '1688552295_unsplash1.jpg', '1688552295_unsplash1.jpg', '1688552295_unsplash1.jpg', '2023-06-25 04:44:36', '2023-07-22 01:54:33');

-- --------------------------------------------------------

--
-- Table structure for table `sub_bobots`
--

CREATE TABLE `sub_bobots` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` smallint(6) NOT NULL,
  `keterangan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parameter_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_bobots`
--

INSERT INTO `sub_bobots` (`id`, `bobot`, `keterangan`, `parameter_id`, `created_at`, `updated_at`) VALUES
('011f6221-4b3a-434a-8ba4-44d52c8cebe7', 3, 'Juara 1 tingkat Walikota', '17676edc-d434-4933-8085-ee631ff44e84', '2023-07-05 11:08:42', '2023-07-05 11:08:42'),
('0c84f273-8505-45e9-a334-8493e7c0d95b', 3, '71 - 80', '2ea313de-7de2-41f1-8f66-d930f8c19c69', '2023-07-05 11:11:04', '2023-07-05 11:11:54'),
('1ba94325-2dc7-42e1-83b8-b7575c52aad5', 2, 'Niilai < 70', 'cafd98b2-8cd9-47ae-a2f2-4441f9755e1d', '2023-07-09 10:12:01', '2023-07-09 10:12:01'),
('2e63811a-1e7e-433b-a72e-65da2e1fb4f6', 6, 'Juara 1 tingkat Provinsi', '17676edc-d434-4933-8085-ee631ff44e84', '2023-07-05 11:13:22', '2023-07-05 11:13:22'),
('38aee539-bcf1-4e92-b53d-a37ef61b061e', 7, 'Diatas tingkat provinsi', 'da3d6098-0867-4941-a1ea-6c78e505df34', '2023-07-09 10:14:35', '2023-07-09 10:14:35'),
('4199db2b-7221-45ac-a831-de88e4668111', 5, 'Juara 2 tingkat provinsi', '17676edc-d434-4933-8085-ee631ff44e84', '2023-07-05 11:07:48', '2023-07-05 11:07:48'),
('691e3760-f0fa-413c-a218-8e249705510f', 3, '71 - 80', 'cafd98b2-8cd9-47ae-a2f2-4441f9755e1d', '2023-07-09 10:12:19', '2023-07-09 10:12:19'),
('76381108-8eed-4fb8-840d-4ac2e6d1bb36', 3, '71 - 80', '557af787-4d72-43ca-99bf-537f62876f8c', '2023-07-09 10:10:55', '2023-07-09 10:10:55'),
('83fbe741-d25d-46c2-9627-8918695f53ff', 4, '81 - 90', '2ea313de-7de2-41f1-8f66-d930f8c19c69', '2023-07-05 11:10:22', '2023-07-05 11:12:12'),
('8c6b58c3-0c38-4494-8aa0-1a843fa72fc3', 4, 'Juara 3 tingkat provinsi', '17676edc-d434-4933-8085-ee631ff44e84', '2023-07-05 11:08:07', '2023-07-05 11:08:07'),
('91a7032d-f382-47fb-976d-3094088420af', 5, 'Nilai > 91', 'cafd98b2-8cd9-47ae-a2f2-4441f9755e1d', '2023-07-09 10:12:47', '2023-07-09 10:12:47'),
('9526260e-1f9f-4b17-8e79-4383bdf81ee2', 2, 'Nilai < 70', '557af787-4d72-43ca-99bf-537f62876f8c', '2023-07-09 10:09:43', '2023-07-09 10:10:29'),
('96e0b48c-6817-4d7e-8758-e9782acab0de', 7, 'Diatas tingkat provinsi', '17676edc-d434-4933-8085-ee631ff44e84', '2023-07-09 10:13:11', '2023-07-09 10:13:11'),
('98998fa4-e3fc-4802-a432-cc747b493322', 2, 'Juara 2 tingkat walikota', '17676edc-d434-4933-8085-ee631ff44e84', '2023-07-05 11:08:59', '2023-07-05 11:08:59'),
('b968799c-88bc-4c7b-a9c3-59d2b858602c', 1, 'Tingkat sekolah (ranking)', '17676edc-d434-4933-8085-ee631ff44e84', '2023-07-09 10:14:04', '2023-07-09 10:14:04'),
('bd6f11f8-9976-4473-8d15-65e216b07c79', 1, 'Juara 3 tingkat walikota', '17676edc-d434-4933-8085-ee631ff44e84', '2023-07-05 11:09:12', '2023-07-05 11:09:12'),
('c3e1769a-7845-4bd6-9438-9b94388dee46', 4, '81 - 90', 'cafd98b2-8cd9-47ae-a2f2-4441f9755e1d', '2023-07-09 10:12:32', '2023-07-09 10:12:32'),
('d45abf22-5ba1-494b-8e29-d49b76b6b9ef', 5, '91 - 100', '2ea313de-7de2-41f1-8f66-d930f8c19c69', '2023-06-22 03:15:53', '2023-07-05 11:12:05'),
('dc279e93-6e19-439d-8fa2-22277b24a658', 2, 'nilai < 70', '2ea313de-7de2-41f1-8f66-d930f8c19c69', '2023-07-05 11:11:35', '2023-07-05 11:11:39'),
('e41ce766-a838-4772-85d7-af913ce3808e', 5, 'Nilai > 91', '557af787-4d72-43ca-99bf-537f62876f8c', '2023-07-09 10:11:31', '2023-07-09 10:11:31'),
('f794e5d3-a3c0-4e90-a91d-14b9dac8e487', 4, '81 - 90', '557af787-4d72-43ca-99bf-537f62876f8c', '2023-07-09 10:11:11', '2023-07-09 10:11:11');

-- --------------------------------------------------------

--
-- Structure for view `normalization`
--
DROP TABLE IF EXISTS `normalization`;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `normalization`  AS SELECT `nilais`.`parameter_id` AS `parameter_id`, `parameters`.`sifat` AS `sifat`, (select `bobots`.`bobot` from `bobots` where `bobots`.`parameter_id` = `parameters`.`id`) AS `bobot`, round(if(`parameters`.`sifat` = 'max',max(`nilais`.`nilai`),min(`nilais`.`nilai`)),1) AS `normalization` FROM (`nilais` join `parameters` on(`nilais`.`parameter_id` = `parameters`.`id`)) GROUP BY `nilais`.`parameter_id``parameter_id`  ;

-- --------------------------------------------------------

--
-- Structure for view `rankings`
--
DROP TABLE IF EXISTS `rankings`;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `rankings`  AS SELECT (select `siswas`.`nama` from `siswas` where `siswas`.`nisn` = `sis`.`nisn`) AS `nama`, (select `siswas`.`nisn` from `siswas` where `siswas`.`nisn` = `sis`.`nisn`) AS `nisn`, (select `siswas`.`asal_sekolah` from `siswas` where `siswas`.`nisn` = `sis`.`nisn`) AS `asal_sekolah`, sum(if(`c`.`sifat` = 'max',`nilais`.`nilai` / `c`.`normalization`,`c`.`normalization` / `nilais`.`nilai`) * `c`.`bobot`) AS `ranking` FROM ((`nilais` join `siswas` `sis` on(`sis`.`nisn` = `nilais`.`nisn`)) join (select `nilais`.`parameter_id` AS `parameter_id`,`parameters`.`sifat` AS `sifat`,(select `bobots`.`bobot` from `bobots` where `bobots`.`parameter_id` = `parameters`.`id`) AS `bobot`,round(if(`parameters`.`sifat` = 'max',max(`nilais`.`nilai`),min(`nilais`.`nilai`)),1) AS `normalization` from (`nilais` join `parameters` on(`nilais`.`parameter_id` = `parameters`.`id`)) group by `nilais`.`parameter_id`) `c`) GROUP BY `nilais`.`nisn``nisn`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bobots`
--
ALTER TABLE `bobots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bobots_parameter_id_foreign` (`parameter_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilais`
--
ALTER TABLE `nilais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilais_parameter_id_foreign` (`parameter_id`);

--
-- Indexes for table `parameters`
--
ALTER TABLE `parameters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prestasis`
--
ALTER TABLE `prestasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prestasis_nisn_foreign` (`nisn`);

--
-- Indexes for table `sekolahs`
--
ALTER TABLE `sekolahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `sub_bobots`
--
ALTER TABLE `sub_bobots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_bobots_parameter_id_foreign` (`parameter_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bobots`
--
ALTER TABLE `bobots`
  ADD CONSTRAINT `bobots_parameter_id_foreign` FOREIGN KEY (`parameter_id`) REFERENCES `parameters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nilais`
--
ALTER TABLE `nilais`
  ADD CONSTRAINT `nilais_parameter_id_foreign` FOREIGN KEY (`parameter_id`) REFERENCES `parameters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prestasis`
--
ALTER TABLE `prestasis`
  ADD CONSTRAINT `prestasis_nisn_foreign` FOREIGN KEY (`nisn`) REFERENCES `siswas` (`nisn`) ON DELETE CASCADE;

--
-- Constraints for table `sub_bobots`
--
ALTER TABLE `sub_bobots`
  ADD CONSTRAINT `sub_bobots_parameter_id_foreign` FOREIGN KEY (`parameter_id`) REFERENCES `parameters` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
