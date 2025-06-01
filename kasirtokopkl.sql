-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 01, 2025 at 06:08 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasirtokopkl`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_modal` decimal(10,2) NOT NULL,
  `harga_jual` decimal(10,2) NOT NULL,
  `stok` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `user_id`, `foto`, `nama_barang`, `harga_modal`, `harga_jual`, `stok`, `created_at`, `updated_at`) VALUES
(7, 3, 'uploads/items/LFD469MBCP3UGEIRVLZ2pHaEIpNGRybkwFp5LcV5.png', 'tess', 25000.00, 3000.00, 9, '2025-05-31 06:19:01', '2025-05-31 07:45:46'),
(10, 3, 'uploads/items/Ca5KBacv6lWI19jFJe9xmUI9r8Xyz5CYPPVKs7qk.png', 'tes2', 30000.00, 3500.00, 7, '2025-05-31 07:36:19', '2025-05-31 07:45:46'),
(12, 6, 'uploads/items/sVeB8Rt4a1vA5PyqyCI6fZ32CEsgbLajnoVCC4Eg.jpg', 'sabun batang', 28000.00, 3000.00, 4, '2025-05-31 21:07:06', '2025-05-31 21:22:00'),
(13, 6, 'uploads/items/kOIVuIjbz7729VVXXdR0ro0fAq0FeEGLDwjjEfch.jpg', 'indomie goreng original', 30000.00, 3500.00, 6, '2025-05-31 21:07:39', '2025-05-31 21:22:00'),
(14, 6, 'uploads/items/7JXtzsLFtQSh0bV3pAaCHFnRFqPDiJkyhYoP00na.jpg', 'air mineral botol kecil', 18000.00, 2000.00, 8, '2025-05-31 21:08:20', '2025-05-31 21:22:00'),
(16, 8, 'foto_item/96dfa65mqhSBoh8jflI9hrHI215jj5y5hg7Xay51.jpg', 'hoodie', 700000.00, 730000.00, 0, '2025-05-31 22:04:31', '2025-05-31 22:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_30_062235_create_items_table', 1),
(5, '2025_05_30_062601_create_sales_table', 1),
(6, '2025_05_30_062611_create_sale_items_table', 1),
(7, '2025_05_30_133630_create_products_table', 1),
(8, '2025_05_30_140957_add_user_id_to_sales_table', 2),
(9, '2025_05_31_115415_add_stok_to_items_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `total` int NOT NULL,
  `paid` int NOT NULL,
  `change` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `total`, `paid`, `change`, `created_at`, `updated_at`) VALUES
(1, 1, 12000, 15000, 3000, '2025-05-30 07:20:45', '2025-05-30 07:20:45'),
(2, 1, 12000, 15000, 3000, '2025-05-30 07:22:56', '2025-05-30 07:22:56'),
(3, 1, 12000, 15000, 3000, '2025-05-30 07:23:36', '2025-05-30 07:23:36'),
(4, 1, 62000, 70000, 8000, '2025-05-30 07:29:37', '2025-05-30 07:29:37'),
(5, 2, 3000, 10000, 7000, '2025-05-31 01:08:21', '2025-05-31 01:08:21'),
(6, 3, 0, 20000, 20000, '2025-05-31 07:30:16', '2025-05-31 07:30:16'),
(7, 3, 0, 20000, 20000, '2025-05-31 07:35:39', '2025-05-31 07:35:39'),
(8, 3, 0, 20000, 20000, '2025-05-31 07:37:03', '2025-05-31 07:37:03'),
(9, 3, 0, 10000, 10000, '2025-05-31 07:37:42', '2025-05-31 07:37:42'),
(10, 3, 16500, 20000, 3500, '2025-05-31 07:45:46', '2025-05-31 07:45:46'),
(11, 6, 27500, 30000, 2500, '2025-05-31 21:09:19', '2025-05-31 21:09:19'),
(12, 6, 8500, 10000, 1500, '2025-05-31 21:22:00', '2025-05-31 21:22:00'),
(13, 8, 730000, 750000, 20000, '2025-05-31 22:07:00', '2025-05-31 22:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `sale_items`
--

CREATE TABLE `sale_items` (
  `id` bigint UNSIGNED NOT NULL,
  `sale_id` bigint UNSIGNED NOT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_items`
--

INSERT INTO `sale_items` (`id`, `sale_id`, `item_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(6, 10, 7, 2, 3000, '2025-05-31 07:45:46', '2025-05-31 07:45:46'),
(7, 10, 10, 3, 3500, '2025-05-31 07:45:46', '2025-05-31 07:45:46'),
(8, 11, 12, 5, 3000, '2025-05-31 21:09:19', '2025-05-31 21:09:19'),
(9, 11, 13, 3, 3500, '2025-05-31 21:09:19', '2025-05-31 21:09:19'),
(10, 11, 14, 1, 2000, '2025-05-31 21:09:19', '2025-05-31 21:09:19'),
(11, 12, 12, 1, 3000, '2025-05-31 21:22:00', '2025-05-31 21:22:00'),
(12, 12, 13, 1, 3500, '2025-05-31 21:22:00', '2025-05-31 21:22:00'),
(13, 12, 14, 1, 2000, '2025-05-31 21:22:00', '2025-05-31 21:22:00'),
(14, 13, 16, 1, 730000, '2025-05-31 22:07:00', '2025-05-31 22:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('AASwfH97aONOlAN5Yzf88FnDcZohUeKhcX2LumS9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia200b1BuR1RxUEhzMk1pNmRnMXdVdkJqeWJUcDJjQXJ0RERHQ3V3MSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1748755828);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `store_name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'tes', 'testore', 'tes@gmail.com', NULL, '$2y$12$9jkS5NEHguRf7ii2TvIV2.C8oO72ls9CKXCdra6PqrSinB7qnspTW', NULL, '2025-05-30 06:47:46', '2025-05-30 06:47:46'),
(2, 'arip', 'aripstore', 'arip@gmail.com', NULL, '$2y$12$XvDht3vZjdhBdYH.NuIspORh5hYN4Nx1RVPgvyT/N2aYjRPlaJCSe', NULL, '2025-05-30 08:58:24', '2025-05-30 08:58:24'),
(3, 'arippp', 'storee', 'arippp@gmail.com', NULL, '$2y$12$fsClt4xoT.QdxuoV8m4B/u/Apy8YNA7irA.ydtDA0a9KJWGrtrxaa', NULL, '2025-05-31 01:39:50', '2025-05-31 01:39:50'),
(4, 'tess', 'tess', 'tess@gmail.com', NULL, '$2y$12$1hUW.Z1pfQxziX/cTpPgNOsTajhm5hg17w6Nh32K1O84YvwFd8M2e', NULL, '2025-05-31 19:56:40', '2025-05-31 19:56:40'),
(5, 'tes', 'tes', 'tesss@gmail.com', NULL, '$2y$12$jCP5M2pr2GPZQ1teDKPAIeHdzE5ZYgxTXJs/oDeLRGt3/GSmeX3.S', NULL, '2025-05-31 20:05:57', '2025-05-31 20:05:57'),
(6, 'aripppp', 'arpppp', 'aripppp@gmail.com', NULL, '$2y$12$KbD7iPde68W2q1msIvGYy.AOBljO2iMYU.BuGXycDVzDNyZ.Fjkh.', NULL, '2025-05-31 20:10:22', '2025-05-31 20:10:22'),
(7, 'stevan', 'stevan store', 'stevan@gmail.com', NULL, '$2y$12$WpWUxfPFnUQzZXkPkQoLk.nVS8mfjRFDecGKWB82RAFhw21Uj/mqK', NULL, '2025-05-31 21:51:43', '2025-05-31 21:51:43'),
(8, 'Andro', 'Andro Store', 'ndro@gmail.com', NULL, '$2y$12$HGnEBm2EDWkSRbe8gfNukeQCzISh3WIjMhsazUAi/zLM3F439fTNG', NULL, '2025-05-31 22:00:00', '2025-05-31 22:00:00'),
(9, 'stevan', 'stevan store', 'andro@gmail.com', NULL, '$2y$12$oughfEWX5cNJXkCuE7I6muFVhpoyUBUFfLOYEBqVyGSNNfkRvfAJq', NULL, '2025-05-31 22:00:38', '2025-05-31 22:00:38');

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_user_id_foreign` (`user_id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_user_id_foreign` (`user_id`);

--
-- Indexes for table `sale_items`
--
ALTER TABLE `sale_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sale_items_sale_id_foreign` (`sale_id`),
  ADD KEY `sale_items_item_id_foreign` (`item_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sale_items`
--
ALTER TABLE `sale_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sale_items`
--
ALTER TABLE `sale_items`
  ADD CONSTRAINT `sale_items_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sale_items_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
