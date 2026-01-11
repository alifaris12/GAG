-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2026 at 03:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peminjaman_lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings_laboratorium_ekonomi_islam`
--

CREATE TABLE `bookings_laboratorium_ekonomi_islam` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `reason` text NOT NULL,
  `time_slot` varchar(255) NOT NULL,
  `booking_date` date NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings_laboratorium_ekonomi_islam`
--

INSERT INTO `bookings_laboratorium_ekonomi_islam` (`id`, `user_id`, `name`, `nim`, `whatsapp`, `reason`, `time_slot`, `booking_date`, `status`, `created_at`, `updated_at`) VALUES
(4, 7, 'Alfahrezi', '233140707111073', '123', '123', '07:00 - 10:00', '2026-01-12', 'pending', '2026-01-11 07:19:12', '2026-01-11 07:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `bookings_laboratorium_ilmu_ekonomi`
--

CREATE TABLE `bookings_laboratorium_ilmu_ekonomi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `reason` text NOT NULL,
  `time_slot` varchar(255) NOT NULL,
  `booking_date` date NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings_laboratorium_ilmu_ekonomi`
--

INSERT INTO `bookings_laboratorium_ilmu_ekonomi` (`id`, `user_id`, `name`, `nim`, `whatsapp`, `reason`, `time_slot`, `booking_date`, `status`, `created_at`, `updated_at`) VALUES
(6, 7, 'Alfahrezi', '233140707111073', '123', '123', '07:00 - 10:00', '2026-01-12', 'approved', '2026-01-11 07:18:21', '2026-01-11 07:28:57');

-- --------------------------------------------------------

--
-- Table structure for table `bookings_laboratorium_ilmu_keuangan_perbankan`
--

CREATE TABLE `bookings_laboratorium_ilmu_keuangan_perbankan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `reason` text NOT NULL,
  `time_slot` varchar(255) NOT NULL,
  `booking_date` date NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings_laboratorium_ilmu_keuangan_perbankan`
--

INSERT INTO `bookings_laboratorium_ilmu_keuangan_perbankan` (`id`, `user_id`, `name`, `nim`, `whatsapp`, `reason`, `time_slot`, `booking_date`, `status`, `created_at`, `updated_at`) VALUES
(3, 7, 'Alfahrezi', '233140707111073', '123', '123', '07:00 - 10:00', '2026-01-12', 'pending', '2026-01-11 07:18:49', '2026-01-11 07:18:49');

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
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_12_28_211124_create_bookings_laboratorium_ilmu_ekonomi_table', 1),
(6, '2025_12_28_215751_create_bookings_laboratorium_ilmu_keuangan_perbankan_table', 1),
(7, '2025_12_28_215816_create_bookings_laboratorium_ekonomi_islam_table', 1),
(8, '2026_01_05_070717_create_users_table', 2),
(9, '2026_01_11_141458_add_field_id_users_to_booking_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Administrator', 'admin@admin.com', '2025-11-06 00:30:44', '$2y$12$6JXtrosY98XLRbB6NLLWrOZkirOBGpvtDc8DtGK00tLPWCMb6gNk2', 'admin', 1, NULL, '2025-11-06 00:30:44', '2025-11-06 00:30:44'),
(7, 'alif', 'user@gmail.com', NULL, '$2y$12$6JXtrosY98XLRbB6NLLWrOZkirOBGpvtDc8DtGK00tLPWCMb6gNk2', 'user', 1, NULL, '2025-11-25 22:26:10', '2025-11-25 22:26:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings_laboratorium_ekonomi_islam`
--
ALTER TABLE `bookings_laboratorium_ekonomi_islam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_laboratorium_ekonomi_islam_user_id_foreign` (`user_id`);

--
-- Indexes for table `bookings_laboratorium_ilmu_ekonomi`
--
ALTER TABLE `bookings_laboratorium_ilmu_ekonomi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_laboratorium_ilmu_ekonomi_user_id_foreign` (`user_id`);

--
-- Indexes for table `bookings_laboratorium_ilmu_keuangan_perbankan`
--
ALTER TABLE `bookings_laboratorium_ilmu_keuangan_perbankan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_laboratorium_ilmu_keuangan_perbankan_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `bookings_laboratorium_ekonomi_islam`
--
ALTER TABLE `bookings_laboratorium_ekonomi_islam`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bookings_laboratorium_ilmu_ekonomi`
--
ALTER TABLE `bookings_laboratorium_ilmu_ekonomi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bookings_laboratorium_ilmu_keuangan_perbankan`
--
ALTER TABLE `bookings_laboratorium_ilmu_keuangan_perbankan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings_laboratorium_ekonomi_islam`
--
ALTER TABLE `bookings_laboratorium_ekonomi_islam`
  ADD CONSTRAINT `bookings_laboratorium_ekonomi_islam_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bookings_laboratorium_ilmu_ekonomi`
--
ALTER TABLE `bookings_laboratorium_ilmu_ekonomi`
  ADD CONSTRAINT `bookings_laboratorium_ilmu_ekonomi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bookings_laboratorium_ilmu_keuangan_perbankan`
--
ALTER TABLE `bookings_laboratorium_ilmu_keuangan_perbankan`
  ADD CONSTRAINT `bookings_laboratorium_ilmu_keuangan_perbankan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
