-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 09, 2022 at 08:38 PM
-- Server version: 10.3.32-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internship`
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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `user_name`, `email`, `about`, `email_verified_at`, `password`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Cassandra Nguyen', 'wyvodokel', 'xydadoryto@mailinator.com', 'Cassandra Nguyen', NULL, '$2y$10$hier.Fuzpe2L8XMVe.ib4OG.4Se8TV1/Siq/pCD/x9Xkde/mcW/HC', NULL, 1, NULL, '2022-02-09 10:35:01', '2022-02-09 10:35:01'),
(3, 'Amber Best', 'vidyhuk', 'dinatus@mailinator.com', 'Amber Best', NULL, '$2y$10$qH99apO/mwMWzi1dRqnD5eZo0nchFdPuWX0ckGBf5NTZQvciB6.A6', NULL, 1, NULL, '2022-02-09 10:36:18', '2022-02-09 10:36:18'),
(4, 'Kirk Mullen', 'masejaza', 'legi@mailinator.com', 'Kirk Mullen', NULL, '$2y$10$8xUyN9UQ.WMADYGgVNR7TeaXE2ZGQxuaQyiMMZogIOAAPMSFwRDVG', NULL, 1, NULL, '2022-02-09 10:37:10', '2022-02-09 10:37:10'),
(5, 'Alyssa Landry', 'heler', 'hede@mailinator.com', 'Alyssa Landry', NULL, '$2y$10$P0wg/BQAz0BvQKrJxOBBZOVlSR4tKlwO7CnDnRftjj7yVuCu9V2Am', NULL, 0, NULL, '2022-02-09 10:37:27', '2022-02-09 12:51:54'),
(6, 'Russell Douglas', 'vogatuvu', 'zytucyja@mailinator.com', 'Russell Douglas', NULL, '$2y$10$74gs6awanRw13Q4Uu5MsZuZ60HHAhq9pch80245bybLxLS5Yjm5I2', NULL, 1, NULL, '2022-02-09 10:37:37', '2022-02-09 10:37:37'),
(7, 'Haley Hancock', 'fygakafoc', 'xiqyzo@mailinator.com', 'Haley Hancock', NULL, '$2y$10$cru6yiWmFydoRYkLwUmoXeE.SADVBcQOD4cycMpyO2HOpNzPP2Tu6', NULL, 0, NULL, '2022-02-09 10:38:02', '2022-02-09 12:51:45'),
(8, 'Dexter Montoya', 'hagadurow', 'falimobu@mailinator.com', 'Dexter Montoya', NULL, '$2y$10$vqtgo80DUZyuHVLU6xW1a.FSGMNoHW63h5L/.XvbkCEeP6zZDK/Zi', '6203ff02eff67.jpg', 1, NULL, '2022-02-09 10:39:25', '2022-02-09 12:51:53'),
(10, 'Felicia Keller', 'xotar', 'bujutocac@mailinator.com', 'Felicia Keller', NULL, '$2y$10$3mGNQlEVTvHEpf9xKPS0IebTy1Ep3GwKhZ4tVQB41FiYDGoRZal06', '6203fe36791fa.jpeg', 0, NULL, '2022-02-09 10:40:21', '2022-02-09 13:22:26'),
(11, 'Lilah Curtisd', 'sycona', 'zeni@mailinator.com', 'Lilah Curtisd', NULL, '$2y$10$db1Hhd5cj19K3yWb6hSzSeuAHGEN/kumzchF73h.vd2vmdj1wdddm', '62041346643f4.jpg', 1, NULL, '2022-02-09 10:47:42', '2022-02-09 13:17:26'),
(13, 'Summer Romero', 'hudup', 'sifynyg@mailinator.com', 'Summer Romero', NULL, '$2y$10$q/wwBnG0hUW1oPwR.mNdFOn9TJYjR5JbAK/8AXS04gyWzZGt2.o0y', NULL, 0, NULL, '2022-02-09 13:22:35', '2022-02-09 13:22:39'),
(14, 'Dakota Beach', 'poraw', 'xynuxa@mailinator.com', 'Dakota Beach', NULL, '$2y$10$NC9b.Ak8XZpr8NEr46GISeKiGEDB.lEUPg6NdVaW9MAOEfyozU0G6', '6204261009d07.png', 1, NULL, '2022-02-09 14:37:03', '2022-02-09 14:37:36');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
