-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2021 at 05:25 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `markosis_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_02_16_055839_create_products_table', 1),
(6, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(7, '2021_02_16_161024_create_sessions_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'web_next_test', '3abc6e4c8f2b77a31405d819b24272d670fc7a541cee6d1cfed343a745ad68d3', '[\"*\"]', NULL, '2021-02-16 04:17:17', '2021-02-16 04:17:17'),
(2, 'App\\Models\\User', 1, 'web_next_test', 'f12f7a28878c77fb561700720262b57155ed595acea8022f6c23b6edf6f0f8f0', '[\"*\"]', NULL, '2021-02-16 04:21:47', '2021-02-16 04:21:47'),
(3, 'App\\Models\\User', 1, 'web_next_test', '54e32f60057bfff6bf3a15ff906444b47ec9ff07eb64d1f6a681b1ca3dfbdbac', '[\"*\"]', NULL, '2021-02-16 04:22:08', '2021-02-16 04:22:08'),
(4, 'App\\Models\\User', 1, 'web_next_test', '3e607f17de70fd43e3d7b9ae67ccc15026028d7cb74f6d0f357b938667fa853a', '[\"*\"]', NULL, '2021-02-16 13:42:02', '2021-02-16 13:42:02'),
(5, 'App\\Models\\User', 4, 'web_next_test', 'ffc7fe9fd3f73f60fa9119d02d57c336cda82af14d7e79c2738ab308d4646ca9', '[\"*\"]', NULL, '2021-02-16 20:02:04', '2021-02-16 20:02:04'),
(6, 'App\\Models\\User', 1, 'web_next_test', 'e2d89613ef4993e2598eeb6c68e8a795696dda1197259809183807930c84b3a5', '[\"*\"]', '2021-02-17 12:06:28', '2021-02-17 00:11:33', '2021-02-17 12:06:28'),
(7, 'App\\Models\\User', 13, 'web_next_test', '87c3bfddff7da5e2542ff8371de96f710a2719afb6d8c4a9f4bb21496b6fa014', '[\"*\"]', NULL, '2021-02-17 10:03:27', '2021-02-17 10:03:27'),
(8, 'App\\Models\\User', 13, 'web_next_test', '1c4d6ad4c38d2425f832a74e11b596d214e162da6bd1a8925cd7b523275a8358', '[\"*\"]', NULL, '2021-02-17 10:04:38', '2021-02-17 10:04:38'),
(9, 'App\\Models\\User', 14, 'web_next_test', '455498643bf570483c6adc6a0fbc2f88c84c5fefe9a56d0f9cdc5835ddbc24bb', '[\"*\"]', NULL, '2021-02-17 12:04:32', '2021-02-17 12:04:32'),
(10, 'App\\Models\\User', 14, 'web_next_test', '3f1df6ebf75875d737cc0afb79e44c6a0420b7846f9cdf60118c232ae334c2e5', '[\"*\"]', '2021-02-17 12:12:17', '2021-02-17 12:04:50', '2021-02-17 12:12:17'),
(11, 'App\\Models\\User', 15, 'web_next_test', '686cc1116e37ec84ebca4dbeb6536736d4b8dd759fe4b5257ebebc6ce851685f', '[\"*\"]', NULL, '2021-02-17 21:58:38', '2021-02-17 21:58:38'),
(12, 'App\\Models\\User', 15, 'web_next_test', 'bc758559cdea9629c3e7769244039b014da5416dff50fb40e75fd6da715fe79b', '[\"*\"]', '2021-02-17 22:06:00', '2021-02-17 21:58:53', '2021-02-17 22:06:00'),
(13, 'App\\Models\\User', 1, 'web_next_test', '1aab557f6b8876435b2a98010fe61b59fc6a66a862aa9f2ac0c5df157e5f8506', '[\"*\"]', '2021-02-17 22:09:27', '2021-02-17 22:06:57', '2021-02-17 22:09:27'),
(14, 'App\\Models\\User', 16, 'abcd_device', '74435326019e1fd6488b0c89d09778e3898c951ce40b3653cd6afebe3f57c67e', '[\"*\"]', NULL, '2021-02-18 04:16:04', '2021-02-18 04:16:04'),
(15, 'App\\Models\\User', 17, 'abcd_device', 'b2d6baab044675fccdeb655a5b3df529395bf68a950bd83e07191449d9168881', '[\"*\"]', NULL, '2021-02-18 04:27:16', '2021-02-18 04:27:16'),
(16, 'App\\Models\\User', 17, 'habijabi', 'f524b8c0d98546016ae0a58cae29f64922330a176a2a66a4a599e0f2968aa454', '[\"*\"]', NULL, '2021-02-18 04:27:51', '2021-02-18 04:27:51'),
(17, 'App\\Models\\User', 17, 'habijabi', 'e836192f1e80d2801b0ef9e83c19876318db0aacffb2c2a4768a6b3170036652', '[\"*\"]', NULL, '2021-02-18 04:31:49', '2021-02-18 04:31:49'),
(18, 'App\\Models\\User', 16, 'habijabi', '526220ba2e861527ea8d3c7e7fcdaf8044e6a842c79bfd3c4a48318d5721225b', '[\"*\"]', '2021-02-18 06:31:51', '2021-02-18 06:02:03', '2021-02-18 06:31:51'),
(19, 'App\\Models\\User', 18, 'abcd_device', '2052dab9cf052cc7da6cef497a5d93c52f85b9b7d981f1a88a6898c1f210e196', '[\"*\"]', NULL, '2021-02-18 06:33:27', '2021-02-18 06:33:27'),
(20, 'App\\Models\\User', 18, 'habijabi', 'a7867ffa048d5649d5f27a0feccf56ac3923d01aae9cb2ba0ac4a70c86b140f2', '[\"*\"]', '2021-02-18 08:59:50', '2021-02-18 06:33:44', '2021-02-18 08:59:50'),
(21, 'App\\Models\\User', 16, 'habijabi', '03467350888d7757ee434f28991ef5b8c7332630457e9b1c7bb87a742a30a462', '[\"*\"]', '2021-02-18 09:19:15', '2021-02-18 09:19:01', '2021-02-18 09:19:15'),
(22, 'App\\Models\\User', 16, 'habijabi', 'bb362e64e9c445852e68d16e8b03ec073612a0f303f093b5a036e2ad84818fce', '[\"*\"]', '2021-02-18 09:21:54', '2021-02-18 09:21:22', '2021-02-18 09:21:54'),
(23, 'App\\Models\\User', 16, 'habijabi', '74a9d7acd36440ee04598e6af1cdb8ec6b4bc820490c6cceae39e19299bc50f1', '[\"*\"]', '2021-02-18 09:22:24', '2021-02-18 09:22:24', '2021-02-18 09:22:24'),
(24, 'App\\Models\\User', 16, 'habijabi', '884acb24258ff528a56cebb276f18df0c2cb0df8c4ffbd83c6eb0d6671b9cd73', '[\"*\"]', '2021-02-18 09:26:09', '2021-02-18 09:26:08', '2021-02-18 09:26:09'),
(25, 'App\\Models\\User', 19, 'abcd_device', '4e83106b38b5d6976ceefdc855e3930025f9892f9dcfaab6786e1f6e79289f09', '[\"*\"]', '2021-02-18 09:49:11', '2021-02-18 09:31:45', '2021-02-18 09:49:11'),
(26, 'App\\Models\\User', 16, 'habijabi', '3dc0ce20bc9c7b0514f8829868cc25f34d9b0942e6f3f041b7c8f64658ec8d93', '[\"*\"]', '2021-02-18 10:04:36', '2021-02-18 09:49:25', '2021-02-18 10:04:36'),
(27, 'App\\Models\\User', 20, 'abcd_device', 'd35669ccd44cab5385e95396fb21d1cef76c8f2d4dfa5f08d174aef074de63c8', '[\"*\"]', '2021-02-18 10:17:48', '2021-02-18 10:12:00', '2021-02-18 10:17:48'),
(28, 'App\\Models\\User', 20, 'habijabi', '041535ca85bdfcc715879845022abeae69eeae13c58120c71e20b996107c471b', '[\"*\"]', '2021-02-18 10:19:07', '2021-02-18 10:17:58', '2021-02-18 10:19:07'),
(29, 'App\\Models\\User', 21, 'abcd_device', 'dd63ed2a5f386c88b5b463c1e60dda9a2520f4f5573e7f4cbec53e56c01754e4', '[\"*\"]', '2021-02-18 10:23:34', '2021-02-18 10:19:30', '2021-02-18 10:23:34');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_buying_cost` int(11) NOT NULL,
  `unit_selling_cost` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `tax_rate` int(11) NOT NULL DEFAULT 0,
  `sold_out_flag` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `name`, `code`, `unit_buying_cost`, `unit_selling_cost`, `quantity`, `tax_rate`, `sold_out_flag`, `created_at`, `updated_at`) VALUES
(15, 20, 'lungi', '123D', 150, 255, 8, 1, 1, '2021-02-18 10:14:21', '2021-02-18 10:14:21'),
(16, 20, 'Shoe', '4DpS', 120, 120, 5, 1, 1, '2021-02-18 10:16:39', '2021-02-18 10:16:39'),
(17, 20, 'Calculator', '99', 120, 255, 8, 1, 1, '2021-02-18 10:17:06', '2021-02-18 10:17:06'),
(18, 20, 'Shirt', '4DpS', 120, 1, 8, 1, 1, '2021-02-18 10:17:25', '2021-02-18 10:17:25'),
(19, 20, 'Panjabi', '4DpS', 120, 250, 8, 1, 1, '2021-02-18 10:17:47', '2021-02-18 10:17:47'),
(20, 20, 'pencil', '2B', 100, 200, 20, 1, 1, '2021-02-18 10:18:29', '2021-02-18 10:18:29'),
(21, 20, 'Waterpot', '1B', 100, 200, 120, 1, 1, '2021-02-18 10:19:06', '2021-02-18 10:19:06'),
(22, 21, 'Pen', 'rtq', 1250, 12563, 500, 1, 1, '2021-02-18 10:22:26', '2021-02-18 10:22:26'),
(23, 21, 'Football', '2k', 2500, 4500, 256, 10, 1, '2021-02-18 10:23:26', '2021-02-18 10:23:26');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('DVgCEY8wY374708UE8FejRSOwcDfTXvOKIYEHvNF', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT2lrcDJDbHN4RVA2WlBPWXp3OU1Mc0o3TUNYdDBFTlVDQ3l3SGNhWCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1613494711);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`) VALUES
(20, 'ibnul imtiaz', 'imtiazeemel42@gmail.com', NULL, '$2y$10$Io/bL1ymfAglezB1Yt1ZROebBMxMjOZVkW/EKjCNlu23G/DszDj76', NULL, NULL, NULL, '2021-02-18 10:12:00', '2021-02-18 10:12:00'),
(21, 'ibnul imtiaz', 'yehtiaz@gmail.com', NULL, '$2y$10$t0lDtQqTc.Pt7SMVYb2XHujdN5CC9mblOhTmTw4Lmo.HheZ2f46vK', NULL, NULL, NULL, '2021-02-18 10:19:29', '2021-02-18 10:19:29');

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
