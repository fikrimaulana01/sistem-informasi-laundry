-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 03, 2024 at 08:41 PM
-- Server version: 10.5.23-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hierkumy_sistem-informasi-laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `layanans`
--

CREATE TABLE `layanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tarif` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `layanans`
--

INSERT INTO `layanans` (`id`, `nama`, `tarif`, `created_at`, `updated_at`) VALUES
(1, 'Reguler', 6000.00, '2023-12-19 18:19:05', '2023-12-21 02:15:51'),
(2, 'Express', 8000.00, '2023-12-19 18:19:05', '2023-12-19 18:19:05'),
(3, 'Setrika', 3000.00, '2023-12-19 18:19:05', '2023-12-19 18:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(57, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(58, '2019_08_19_000000_create_failed_jobs_table', 1),
(59, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(60, '2023_12_16_052256_create_pegawais_table', 1),
(61, '2023_12_16_052316_create_pelanggans_table', 1),
(62, '2023_12_16_052349_create_layanans_table', 1),
(63, '2023_12_16_052421_create_pesanans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawais`
--

CREATE TABLE `pegawais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nomor_hp` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL DEFAULT 'Pegawai',
  `jenis_kelamin` varchar(255) NOT NULL,
  `profil` text DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawais`
--

INSERT INTO `pegawais` (`id`, `nama`, `nomor_hp`, `tanggal_lahir`, `alamat`, `jabatan`, `jenis_kelamin`, `profil`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Fikri Maulana', '089628437540', '2000-01-01', 'Jl. Lobak', 'Admin', 'Laki-Laki', NULL, 'fikrimaulana@gmail.com', '2023-12-19 18:19:01', '$2y$12$0w0Pt9WTjniN5IdjFHQNPuORr9SXHJ8tD.8ogPy0SDJGF93AIaiQu', 'kprqy4n4PcPgeGVr8wMWCAIBcC38YgS3pLeDuPdxfl2INlQAL6G3YvwF4ib8', '2023-12-19 18:19:01', '2023-12-19 18:19:01'),
(2, 'Abelardo Hudson', '+1.406.728.6732', '1995-01-23', '9497 Hilpert Park Apt. 083\nZulaufmouth, GA 43079-9316', 'Pegawai', 'Perempuan', NULL, 'chandler.wuckert@example.org', '2023-12-19 18:19:01', '$2y$12$o0RYZ/vwpdmGzGdr5Tu/4u8WuSlG0Ae1AGkxHqxAdFmRptX3Nli2i', 'FtjPRnqgqjuxY5U3KcDaykUe5W7Ke5pLHOpg4WZeatWeFEAJecMgJcLDD2B0', '2023-12-19 18:19:01', '2023-12-19 18:19:01'),
(3, 'Andreanne Lehner DVM', '+17602616668', '2011-05-20', '8700 Bayer Drive Apt. 104\nPort Johnnyland, DE 34591-1247', 'Pegawai', 'Perempuan', NULL, 'jzemlak@example.net', '2023-12-19 18:19:01', '$2y$12$Si991amOAYCwTM.MXd9wLuT/2.OoRxJ2CCXzTvG2lE.3HqsqziT/.', 'LJbvivYSrN', '2023-12-19 18:19:02', '2023-12-19 18:19:02'),
(4, 'Asia Ziemann', '630.278.5672', '2011-03-08', '70328 Damon Lake\nPort Aubree, GA 14433-7836', 'Pegawai', 'Perempuan', NULL, 'xstrosin@example.net', '2023-12-19 18:19:02', '$2y$12$DOOkafX8Tt3glUBRUPVyS.PvA.RamMnvvetXeznJpqckhm8XFKfJ2', 'EWAS2N7GQl', '2023-12-19 18:19:02', '2023-12-19 18:19:02'),
(5, 'Emerson Treutel V', '+1-979-430-7590', '1994-08-30', '338 Ratke Run\nLittelmouth, CA 95971-3264', 'Pegawai', 'Laki-Laki', NULL, 'scarlett.borer@example.net', '2023-12-19 18:19:02', '$2y$12$Ti33uTBKNqMvEW7qoerei.PIt4JvTxjnvhNi0cg055I8LEwuGyaZG', 'dgRYIM5VfX', '2023-12-19 18:19:02', '2023-12-19 18:19:02'),
(6, 'Rodolfo Davis DDS', '859-650-4076', '2016-03-24', '52566 Swaniawski Mews\nWest Kaylee, NY 82363-7719', 'Pegawai', 'Laki-Laki', NULL, 'maximus17@example.org', '2023-12-19 18:19:02', '$2y$12$yzjTLnpncL.Sy6P7VkaSp.m65jt5SYekzzqqm9TgSJmtDb4xQdZu2', 'MQasxeDC1v', '2023-12-19 18:19:03', '2023-12-19 18:19:03');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggans`
--

CREATE TABLE `pelanggans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nomor_hp` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `profil` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggans`
--

INSERT INTO `pelanggans` (`id`, `nama`, `nomor_hp`, `tanggal_lahir`, `alamat`, `jenis_kelamin`, `profil`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Fikri Maulana', '089628437540', '2000-01-01', 'Jl. Lobak', 'Laki-laki', NULL, 'fikrimaulana@gmail.com', '2023-12-19 18:19:03', '$2y$12$EoYnlBW2cwBhjYhmnq77cOwMtCeeZu/Vrw4KmZedEQXlB47YEp/em', 'tHNUOcDzOl', '2023-12-19 18:19:03', '2023-12-19 18:19:03'),
(2, 'Dr. Nicholas Schroeder', '1-630-302-8795', '1979-12-05', '723 Effie Court\nStefaniemouth, TX 46075', 'Laki-laki', NULL, 'pouros.gerald@example.com', '2023-12-19 18:19:03', '$2y$12$F0PqXiqPO2MhO5B6IlJReeKT9eX6YFGmqNxCubbxXj796heyaCBzO', 'H8nBInWpD2', '2023-12-19 18:19:03', '2023-12-19 18:19:03'),
(3, 'Alayna O\'Hara', '857-678-9833', '1976-12-28', '644 Eudora Summit\nEast Ken, GA 87788-3417', 'Laki-laki', NULL, 'jamey24@example.org', '2023-12-19 18:19:03', '$2y$12$hhoTX5n06AWpv8AocnSZOuHKrPrCrZxrnwZakPUUyfdvBMqdzc.qS', 'UVgorvUH8c', '2023-12-19 18:19:04', '2023-12-19 18:19:04'),
(4, 'Dr. Caitlyn Welch Jr.', '+1.574.844.5405', '1977-12-11', '80276 Ella Manor\nMarcellusstad, FL 61169-0171', 'Perempuan', NULL, 'rkunde@example.org', '2023-12-19 18:19:04', '$2y$12$.7A8C9BKu6u0RkFShQmboOzGXIEJkepkhsEMItG1/DNGgIlo1cmqi', '82Vc794tqm', '2023-12-19 18:19:04', '2023-12-19 18:19:04'),
(5, 'Sigrid Adams', '+1.458.381.3619', '1970-01-29', '8094 Ilene Glens Suite 376\nNorth Deontae, KS 50543', 'Perempuan', NULL, 'erohan@example.net', '2023-12-19 18:19:04', '$2y$12$ZtkAtjbQfza8a3lWO3x6d./L69fph7l5DGrMtZ0zOU1ipT8OUwy9u', 'rfh2Lluq0D', '2023-12-19 18:19:04', '2023-12-19 18:19:04'),
(6, 'Lilliana Rau', '+17404924746', '2023-05-30', '93843 Auer Mountains\nNorth Mae, AR 23207-3131', 'Laki-laki', NULL, 'dejah39@example.com', '2023-12-19 18:19:04', '$2y$12$0fdXCVGmyf0ESebG8ZBCxOCp7yLIzAa6bXsMjzN04gAAclcLNk13e', '20QUjRSVhi', '2023-12-19 18:19:05', '2023-12-19 18:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pegawai` bigint(20) UNSIGNED NOT NULL,
  `id_pelanggan` bigint(20) UNSIGNED NOT NULL,
  `id_layanan` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_layanan` text NOT NULL,
  `tarif` double(8,2) NOT NULL,
  `berat` double(8,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'sedang diproses',
  `total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanans`
--

INSERT INTO `pesanans` (`id`, `id_pegawai`, `id_pelanggan`, `id_layanan`, `nama_layanan`, `tarif`, `berat`, `status`, `total`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 'Reguler', 5000.00, 3.50, 'Sedang DiProses', 17500.00, '2023-12-19 18:19:05', '2023-12-19 18:19:05'),
(2, 2, 1, 2, 'Express', 8000.00, 3.00, 'Sedang DiProses', 24000.00, '2023-12-19 18:19:05', '2023-12-19 18:19:05'),
(3, 2, 1, 3, 'Setrika', 3000.00, 5.00, 'Sedang DiProses', 15000.00, '2023-12-19 18:19:05', '2023-12-19 18:19:05'),
(4, 2, 1, 3, 'Setrika', 3000.00, 2.00, 'Sedang DiProses', 6000.00, '2023-12-19 18:19:05', '2023-12-19 18:19:05'),
(5, 2, 1, 2, 'Express', 8000.00, 4.00, 'Sedang DiProses', 32000.00, '2023-12-19 18:19:05', '2023-12-19 18:19:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `layanans`
--
ALTER TABLE `layanans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pegawais`
--
ALTER TABLE `pegawais`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pegawais_email_unique` (`email`);

--
-- Indexes for table `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pelanggans_email_unique` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanans_id_pegawai_foreign` (`id_pegawai`),
  ADD KEY `pesanans_id_pelanggan_foreign` (`id_pelanggan`),
  ADD KEY `pesanans_id_layanan_foreign` (`id_layanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `layanans`
--
ALTER TABLE `layanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `pegawais`
--
ALTER TABLE `pegawais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD CONSTRAINT `pesanans_id_layanan_foreign` FOREIGN KEY (`id_layanan`) REFERENCES `layanans` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `pesanans_id_pegawai_foreign` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawais` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pesanans_id_pelanggan_foreign` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggans` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
