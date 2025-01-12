-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2025 at 05:03 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alnisiri-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `lawyer`
--

CREATE TABLE `lawyer` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `repeat_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` int NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_activity` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'lawyer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lawyer`
--

INSERT INTO `lawyer` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `city`, `password`, `repeat_password`, `otp`, `status`, `phone_number`, `experience`, `remember_token`, `last_activity`, `created_at`, `updated_at`, `user_type`) VALUES
(1, 'Ismail', 'ahmed', 'mohamed', 'xrgggg@gmail.com', 'Mansoura', '123456789', '123456789', '1234', 1, '01066085166', 4, 'yzF8n4TwKYCrHeLzRDCKBTWsYqHRwIpbLSDHxDi9Vwbx34DPgfYVztpuXtUs', NULL, '2025-01-09 18:24:58', '2025-01-09 18:24:58', 'lawyer'),
(2, 'Ismail', 'ahmed', 'mohamed', 'user@gmail.com', 'Mansoura', '$2y$10$KY97K09ZP5kJ7Z.5CmZHE.RMEE2IKgmrP47t2YHLzsRU9fCaFrZyq', '$2y$10$QyR4oKlp5CWI2YRDK0Wgi.Zvsh2dZa3RFjBQoVAx6jkkI64g.b4fO', '1234', 1, '01066085177', 4, 'GxPrqwtgVLwKfjkvF8teKIuV08eVZUDJdDfDgHQ3OJwt8bTPFe5qlH9pE2Be', NULL, '2025-01-09 18:30:41', '2025-01-10 13:43:33', 'lawyer'),
(3, 'string', 'string', 'string', 'user@example.com', 'string', '$2y$10$RidqLm1pFfD5PGFA0Qo/2.QdtI.hzjjEJMvSegyJ1h3nf0Kw3GUWe', '$2y$10$S8ElAITqqr9qcykiv7/9bu5/Z59FhfFlukQpaEoVztqFUncTfP3hy', 'string', 1, 'string', 0, 'vSnnprzgFeGzMyMmy24jJdOnRGPsldgaAWJhnswjWCQdgtJYjrUCUI3Myz3I', NULL, '2025-01-10 13:42:25', '2025-01-10 13:42:25', 'lawyer');

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_answers`
--

CREATE TABLE `lawyer_answers` (
  `id` bigint UNSIGNED NOT NULL,
  `question_id` bigint UNSIGNED NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lawyer_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lawyer_answers`
--

INSERT INTO `lawyer_answers` (`id`, `question_id`, `answer`, `lawyer_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'tesssssssting', 1, '2025-01-11 20:20:10', '2025-01-11 20:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_chances`
--

CREATE TABLE `lawyer_chances` (
  `id` bigint UNSIGNED NOT NULL,
  `order_number` int NOT NULL,
  `case_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `case_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `price` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `user_id` bigint UNSIGNED NOT NULL,
  `lawyer_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `speciality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lawyer_chances`
--

INSERT INTO `lawyer_chances` (`id`, `order_number`, `case_type`, `case_details`, `city`, `date`, `price`, `status`, `user_id`, `lawyer_id`, `created_at`, `updated_at`, `speciality`) VALUES
(1, 1, 'uyfdufuyf', 'gdzysztgszujtxsutxutd', 'hxcyfdx', '2025-01-01', 2333, '1', 2, 1, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_office`
--

CREATE TABLE `lawyer_office` (
  `id` bigint UNSIGNED NOT NULL,
  `office_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lawyer_id` bigint UNSIGNED NOT NULL,
  `speciality_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lawyer_office`
--

INSERT INTO `lawyer_office` (`id`, `office_name`, `office_address`, `office_phone`, `office_email`, `lawyer_id`, `speciality_id`, `created_at`, `updated_at`) VALUES
(1, 'string', 'string', 'string', 'user@example.com', 1, 1, '2025-01-12 13:49:54', '2025-01-12 13:49:54');

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_rate`
--

CREATE TABLE `lawyer_rate` (
  `id` bigint UNSIGNED NOT NULL,
  `rate_count` int NOT NULL,
  `lawyer_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rate_content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lawyer_rate`
--

INSERT INTO `lawyer_rate` (`id`, `rate_count`, `lawyer_id`, `user_id`, `created_at`, `updated_at`, `rate_content`) VALUES
(1, 1, 1, 2, '2025-01-11 19:56:18', '2025-01-11 19:56:18', 'test');

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
(25, '2014_10_12_000000_create_users_table', 1),
(26, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(27, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(28, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(29, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(30, '2016_06_01_000004_create_oauth_clients_table', 1),
(31, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(32, '2019_08_19_000000_create_failed_jobs_table', 1),
(33, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(34, '2025_01_09_174310_create_admin_table', 1),
(35, '2025_01_09_174326_create_lawyer_table', 1),
(36, '2025_01_09_185049_create_otps_table', 1),
(37, '2025_01_11_143157_create_questions_table', 2),
(39, '2025_01_11_161553_create_question_table', 3),
(40, '2025_01_11_170825_create_lawyer_chances_table', 4),
(41, '2025_01_11_172352_create_lawyer_rate_table', 5),
(42, '2025_01_11_220137_create_lawyer_answers_table', 6),
(43, '2025_01_11_233150_create_speciality_table', 7),
(44, '2025_01_12_133855_add_column_to_users_table', 7),
(45, '2025_01_12_134246_add_column_to_lawyer_table', 8),
(46, '2025_01_12_134925_create_speciality_table', 9),
(47, '2025_01_12_135207_add_column_to_lawyer_rate_table', 10),
(49, '2025_01_12_140005_add_column_to_lawyer_chances_table', 11),
(50, '2025_01_12_153828_create_speciality_table', 12),
(51, '2025_01_12_153918_create_lawyer_office_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'authToken', '319bd36e8a125f5af95be8337ff75e81861f66e8b81ffb5d4ae18de7533e4e1a', '[\"*\"]', NULL, NULL, '2025-01-09 21:46:12', '2025-01-09 21:46:12'),
(2, 'App\\Models\\User', 1, 'authToken', '9da79fa023c65498ab378e7e7d18225a196a52c49106a75fd45dc914c7aaa13d', '[\"*\"]', NULL, NULL, '2025-01-09 21:46:25', '2025-01-09 21:46:25'),
(3, 'App\\Models\\User', 1, 'authToken', '22629e55081dc688686db53c8855615a4b23a703e9a72a3896a1c91fffbd0a5a', '[\"*\"]', NULL, NULL, '2025-01-10 13:45:07', '2025-01-10 13:45:07'),
(4, 'App\\Models\\User', 1, 'authToken', 'abedaeca12c110d7b23b0e6d94f7bae57249a8f67ed9ddbaf7847de9e6558c6b', '[\"*\"]', NULL, NULL, '2025-01-10 13:50:26', '2025-01-10 13:50:26'),
(5, 'App\\Models\\User', 1, 'authToken', 'a70fac538fcc5ab5592fc6d1304483a0be8c95de2b3764a042ea4bf4d7cb8ee6', '[\"*\"]', NULL, NULL, '2025-01-10 13:52:41', '2025-01-10 13:52:41'),
(6, 'App\\Models\\User', 1, 'authToken', '567147afbca72ea450d71f33d671a5dd248643d526fedbed87f2f08892acb979', '[\"*\"]', NULL, NULL, '2025-01-10 13:54:24', '2025-01-10 13:54:24'),
(7, 'App\\Models\\User', 1, 'authToken', '49523197f0b1d35ec2c24a85b99558839fc359414155036fc3ab9401ce1eb249', '[\"*\"]', NULL, NULL, '2025-01-10 13:55:06', '2025-01-10 13:55:06'),
(8, 'App\\Models\\User', 1, 'authToken', '468779cf2d8cf60de8ed3e6dd4193115c21d1b0568c1758d725cc4d3c01ab9ae', '[\"*\"]', NULL, NULL, '2025-01-10 13:57:00', '2025-01-10 13:57:00'),
(9, 'App\\Models\\User', 1, 'authToken', 'c8eca0fe081560677142c507f3c3d21e11ba698d34e8ea14831392fd0f298e61', '[\"*\"]', NULL, NULL, '2025-01-10 13:58:23', '2025-01-10 13:58:23'),
(10, 'App\\Models\\User', 1, 'authToken', 'eccd7d5e591aaf2304ae429e86a146854b62bcf18b70fcf8d9e5d9e206be0043', '[\"*\"]', NULL, NULL, '2025-01-10 14:01:48', '2025-01-10 14:01:48');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` bigint UNSIGNED NOT NULL,
  `question_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'email',
  `case_specialization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question_title`, `question_content`, `question_city`, `question_status`, `contact_method`, `case_specialization`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'string', 'string', 'string', 'string', 'email', 'string', 2, '2025-01-11 14:43:15', '2025-01-11 14:43:15'),
(2, 'Helllllllllo', 'this is content bro', 'maka', 'hello', 'phone_number', 'nenenenenenenene', 2, '2025-01-11 15:04:12', '2025-01-11 15:04:12');

-- --------------------------------------------------------

--
-- Table structure for table `speciality`
--

CREATE TABLE `speciality` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `speciality`
--

INSERT INTO `speciality` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'gfdsyrdstr', 'ytdstuye75td7eutdxu75td', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `token`, `remember_token`, `created_at`, `updated_at`, `user_type`) VALUES
(1, 'Ismail', 'user.2ad@gmail.com', '123456788', '$2y$10$nSWpQx4Xf2jOEJ4dN7iQue/GtC3nrUrkN3AIEuVCP3QWLtBqYGlnW', NULL, 'HV0VhiYa56bbH4i7ffsfxekcupkLA62lpgraiWFjIpC77tGUmbnzGmPxfMVg', '2025-01-09 21:46:11', '2025-01-12 13:24:24', 'user'),
(2, 'Ismail', 'useggrr@gmail.com', '12345678999', '$2y$10$lBNId2eealorx2RCcq5.HOMl2FCN6R2sWzp0FzV04pDuDeo/kbZ1i', NULL, '11J93Dd8GAtlAAzsagZK3uUJ7qXdar0vwtyEcG6evTVGu4VV6pRIu8wXqOAG', '2025-01-10 14:01:56', '2025-01-10 14:01:56', 'user'),
(3, 'Ismail', 'usggrr@gmail.com', '1234567', '$2y$10$633ApxO2kju4lt5Z0JcSwug8pEIVgXaZp.W8/rpD/XUTJZhCn1K7O', NULL, 'L9GHO0P0sQuOG40um6eNNU2XdEY1SpncIFzT5QWAyjlsWXeuqUfIuk4OSbq1', '2025-01-10 14:02:22', '2025-01-10 14:02:22', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`),
  ADD UNIQUE KEY `admin_phone_unique` (`phone`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `lawyer`
--
ALTER TABLE `lawyer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lawyer_email_unique` (`email`),
  ADD UNIQUE KEY `lawyer_phone_number_unique` (`phone_number`);

--
-- Indexes for table `lawyer_answers`
--
ALTER TABLE `lawyer_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lawyer_answers_question_id_foreign` (`question_id`),
  ADD KEY `lawyer_answers_lawyer_id_foreign` (`lawyer_id`);

--
-- Indexes for table `lawyer_chances`
--
ALTER TABLE `lawyer_chances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lawyer_chances_user_id_foreign` (`user_id`),
  ADD KEY `lawyer_chances_lawyer_id_foreign` (`lawyer_id`);

--
-- Indexes for table `lawyer_office`
--
ALTER TABLE `lawyer_office`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lawyer_office_lawyer_id_foreign` (`lawyer_id`),
  ADD KEY `lawyer_office_speciality_id_foreign` (`speciality_id`);

--
-- Indexes for table `lawyer_rate`
--
ALTER TABLE `lawyer_rate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lawyer_rate_lawyer_id_foreign` (`lawyer_id`),
  ADD KEY `lawyer_rate_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `otps_user_id_foreign` (`user_id`);

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
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_user_id_foreign` (`user_id`);

--
-- Indexes for table `speciality`
--
ALTER TABLE `speciality`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lawyer`
--
ALTER TABLE `lawyer`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lawyer_answers`
--
ALTER TABLE `lawyer_answers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lawyer_chances`
--
ALTER TABLE `lawyer_chances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lawyer_office`
--
ALTER TABLE `lawyer_office`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lawyer_rate`
--
ALTER TABLE `lawyer_rate`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `speciality`
--
ALTER TABLE `speciality`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lawyer_answers`
--
ALTER TABLE `lawyer_answers`
  ADD CONSTRAINT `lawyer_answers_lawyer_id_foreign` FOREIGN KEY (`lawyer_id`) REFERENCES `lawyer` (`id`),
  ADD CONSTRAINT `lawyer_answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`);

--
-- Constraints for table `lawyer_chances`
--
ALTER TABLE `lawyer_chances`
  ADD CONSTRAINT `lawyer_chances_lawyer_id_foreign` FOREIGN KEY (`lawyer_id`) REFERENCES `lawyer` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lawyer_chances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lawyer_office`
--
ALTER TABLE `lawyer_office`
  ADD CONSTRAINT `lawyer_office_lawyer_id_foreign` FOREIGN KEY (`lawyer_id`) REFERENCES `lawyer` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lawyer_office_speciality_id_foreign` FOREIGN KEY (`speciality_id`) REFERENCES `speciality` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lawyer_rate`
--
ALTER TABLE `lawyer_rate`
  ADD CONSTRAINT `lawyer_rate_lawyer_id_foreign` FOREIGN KEY (`lawyer_id`) REFERENCES `lawyer` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lawyer_rate_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `otps`
--
ALTER TABLE `otps`
  ADD CONSTRAINT `otps_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `lawyer` (`id`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
