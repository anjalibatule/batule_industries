-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2025 at 04:49 PM
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
-- Database: `laravel_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(10) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `company_email` varchar(200) NOT NULL,
  `company_address` text NOT NULL,
  `company_mobile` varchar(20) NOT NULL,
  `gst_no` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `company_email`, `company_address`, `company_mobile`, `gst_no`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Atharv Fabricators', 'atharvfabricators@gmail.com', 'kundaim Goa', '+91-7785677878', '11AAAAA1111A1Z1', '2025-07-12', 1, '2025-07-10 13:16:15', '2025-07-12 04:41:20'),
(3, 'AB Services', 'ab@abc.com', 'maharashtra', '+91-6785678765', '11AAAAA1111A1Z1', '2025-07-12', 0, '2025-07-12 04:11:26', '2025-07-12 04:47:50');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) NOT NULL,
  `map` text NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `contact_address` text NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('PP5DDBELFrOvnrCb4s4EWlFxFqhSFx4TaG1ylPnk', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVnl6M1AxUUdPTnVmT1Q5czBRMmlNTGFhUW04UE5JcVNZZXVCeEl2USI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNzoiaHR0cDovL2xvY2FsaG9zdC9sYXJhdmVsX3Byb2plY3QvdXNlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly9sb2NhbGhvc3QvbGFyYXZlbF9wcm9qZWN0L2NvbXBhbnlfZGV0YWlscyI7fX0=', 1752322241),
('YP2NJ4pXxgNSdnECFLKhAOPJCzX6yg7f6PfVYCB0', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZWptVUd0amFHclZQVk5XWFF5U1h0ZGtsb1RVek9KQWZLeFdZWFQ5UyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly9sb2NhbGhvc3QvbGFyYXZlbF9wcm9qZWN0L2NvbXBhbnlfZGV0YWlscyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1752331217);

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
  `phone` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `role`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$12$ukiU6ool5F8BkotVz5HGfu6J3.uGPbMPdQIk80mpfeRBSL8NMu5Z.', '9885654646', 'Admin', '/public/uploads/images/user.png', NULL, '2025-07-09 11:45:01', '2025-07-09 11:45:01'),
(3, 'Anjali Batule', 'anjali@gmail.com', NULL, '$2y$12$1icmh4hqB3qIATn5.5Rrv.9l9OzBhtrqD5yTJ6Nd7uO0qRauCSbmu', '6758787875', 'User', 'public/uploads/images/female.png', NULL, '2025-07-10 01:26:54', '2025-07-10 01:26:54'),
(4, 'Akshay', 'akshay@gmail.com', NULL, '$2y$12$8otPceJ4/GO0pzs0aMg9dORzfSALnCt2leoN7ZTylQjGigFQDnb5e', '9766543233', 'User', 'public/uploads/images/male.jpg', NULL, '2025-07-10 02:51:08', '2025-07-10 02:51:08'),
(5, 'Atharv', 'ath@gmail.com', NULL, '$2y$12$.3GoGtVx94xV1yLE/cOTre7YgaCQAVyA81YOp.XHeJjULhYbuekX6', '8767567876', 'User', 'public/uploads/images/male.jpg', NULL, '2025-07-10 02:55:49', '2025-07-10 02:55:49'),
(6, 'Vijaya', 'vij@gmail.com', NULL, '$2y$12$QGQRz9UdBy27.oTPT35TDuopBGhNagQuM5VYd0o/pONQVzMN.bt3q', '9766543233', 'User', 'public/uploads/images/female.png', NULL, '2025-07-10 03:09:28', '2025-07-10 03:09:28'),
(7, 'Arjun', 'arjun@gmail.com', NULL, '$2y$12$u8znpZknNq.nj8m6tI.5wu5gYIspH1P6Lc4CjEIR0PFB4jbLHk0G2', '7666554444', 'User', 'public/uploads/images/male.jpg', NULL, '2025-07-10 03:19:25', '2025-07-10 03:19:25'),
(8, 'Akshay', 'akshay@abc.com', NULL, '$2y$12$3AItcUvlcvrtO2TU8l751.31wyQC0DGWK6L.6b5qW7eNZoo3wAms2', '7666554444', 'User', 'public/uploads/images/male.jpg', NULL, '2025-07-10 03:28:44', '2025-07-10 03:28:44'),
(9, 'Anjali Batule', 'anj@abc.com', NULL, '$2y$12$YRtVgi/oUAtMqdafVIap2eCv3pxDmTTzT4NSAE5yhLgf.Y1T16/NK', '6797585565', 'User', 'public/uploads/images/female.png', NULL, '2025-07-10 03:34:05', '2025-07-10 03:34:05'),
(10, 'Akshay', 'akshay123@abc.com', NULL, '$2y$12$Y6MlaKkTMykln0nVYitjWeHPmAW3YycKJkDpo80YajFntUm89agc6', '7666554444', 'User', 'public/uploads/images/male.jpg', NULL, '2025-07-10 03:38:02', '2025-07-10 03:38:02'),
(11, 'Atharv', 'ath@abc.com', NULL, '$2y$12$/NrPEcmegHpXZzo7W99C5OyC.Yg8JRJiW22d44Uu6SY5rPBaQrgla', '7868564567', 'User', 'public/uploads/images/male.jpg', NULL, '2025-07-10 03:49:42', '2025-07-10 03:49:42'),
(12, 'Admin', 'admin123@abc.com', NULL, '$2y$12$Hsw3rU4YxfKqRZcVSU7f0edY7OtenwQhlLZs2uaA61Oy.qUnYWQh.', '6785676766', 'User', 'public/uploads/images/male.jpg', NULL, '2025-07-10 04:09:52', '2025-07-10 04:09:52'),
(13, 'Akshay', 'akshay12@abc.com', NULL, '$2y$12$bTqo0D834h.4J14tiMTgE.9lE9kTS92ii2AGq7FCxoTu/tFcwE/q6', '6785676766', 'User', 'public/uploads/images/male.jpg', NULL, '2025-07-10 04:12:14', '2025-07-10 04:12:14'),
(14, 'Anjali', 'anjali12345@abc.com', NULL, '$2y$12$zIJy/9Gq/.HZ4ZvNanTEyetUTMMd4MdT1ZzbY0Hp6XgrYmCF.nGEq', '6785676766', 'User', 'public/uploads/images/female.png', NULL, '2025-07-10 04:15:11', '2025-07-10 04:15:11'),
(15, 'Rohit', 'rohit@abc.com', NULL, '$2y$12$/WVPI6tmMGkpBjVfQ9D0l.PsZl6OVmVzd7DDpYnPwkxiUgJCHZIPC', '6797585565', 'Admin', 'public/uploads/images/male.jpg', NULL, '2025-07-10 05:05:20', '2025-07-10 05:05:20'),
(16, 'Admin', 'adm@abc.com', NULL, '$2y$12$s50dgY2knhkgHQj2SzFvSeO1C1s7bjYGssZLk9U8KIcooKISl3VNm', '6785676766', 'User', '/public/uploads/images/user.png', NULL, '2025-07-10 05:53:05', '2025-07-10 05:53:05'),
(17, 'Admin123', 'aadmin1234@gmail', NULL, '$2y$12$3/4CQNZfjDr0AKH6t4uxweYAcZTgBIE6nE8BDogGttJQckspPezDy', '6785676766', 'User', 'public/uploads/images/LZRoCnPCX5CUZMZ7M9xtWT4U7muUnti6on7RvB6W.jpg', NULL, '2025-07-11 10:05:00', '2025-07-11 10:05:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
