-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2025 at 08:43 AM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

CREATE TABLE `alerts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'warning',
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alerts`
--

INSERT INTO `alerts` (`id`, `message`, `type`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 'Warning: Hair Scissors is running low on stock (Quantity: 2)', 'warning', 1, '2025-02-03 07:17:38', '2025-02-03 07:17:38'),
(2, 'Warning: Hair Scissors is running low on stock (Quantity: 2)', 'warning', 1, '2025-02-03 07:31:16', '2025-02-03 07:31:16'),
(3, 'Warning: Hair Scissors is running low on stock (Quantity: 2)', 'warning', 1, '2025-02-09 02:29:29', '2025-02-09 02:47:43'),
(4, 'Warning: Hair Scissors is running low on stock (Quantity: 1)', 'warning', 1, '2025-02-09 02:29:35', '2025-02-09 02:47:37'),
(5, 'Warning: Hair Scissors is running low on stock (Quantity: 2)', 'warning', 0, '2025-02-09 02:49:36', '2025-02-10 02:51:16');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `stylist_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `appointment_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending',
  `transaction_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `service_id`, `stylist_id`, `date`, `time`, `status`, `appointment_status`, `created_at`, `updated_at`, `payment_status`, `transaction_id`) VALUES
(22, 15, 2, 5, '2025-02-15', '07:00:00', 1, 1, '2025-02-08 02:01:43', '2025-02-08 22:55:08', 'paid', 'ch_3QqGy8Rv6uU6ULwb0kDiKwxW'),
(23, 15, 4, 5, '2025-02-18', '11:00:00', 1, 0, '2025-02-08 11:54:28', '2025-02-10 02:26:23', 'paid', 'ch_3QqrNfRv6uU6ULwb0FcFrtYy'),
(24, 15, 1, 5, '2025-02-11', '20:40:00', 0, 0, '2025-02-09 10:40:41', '2025-02-09 10:40:41', 'pending', NULL),
(25, 1, 1, 5, '2025-02-12', '14:50:00', 0, 0, '2025-02-10 02:47:55', '2025-02-10 02:47:55', 'pending', NULL);

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
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `unit` varchar(255) NOT NULL DEFAULT 'pcs',
  `threshold_level` int(11) NOT NULL DEFAULT 5,
  `supplier_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `product_name`, `quantity`, `unit`, `threshold_level`, `supplier_name`, `created_at`, `updated_at`) VALUES
(1, 'Hair Scissors', 10, 'pcs', 2, 'HairPro Inc.', '2025-02-01 10:54:15', '2025-02-09 02:49:36'),
(2, 'Facial Cleanser', 25, 'bottles', 5, 'Dermalogica', '2025-02-01 10:57:40', '2025-02-06 11:12:10'),
(3, 'Pedicure & Menicure Kit', 10, 'sets', 2, 'Sally Beauty', '2025-02-01 10:58:52', '2025-02-06 11:13:40'),
(4, 'Hair Color Kit', 15, 'boxes', 5, 'ColorPro Pvt.', '2025-02-01 11:00:49', '2025-02-01 11:00:49'),
(5, 'Face Masks & Serums', 25, 'packs', 5, 'GlowSkin Co.', '2025-02-01 11:01:44', '2025-02-03 03:07:48'),
(6, 'Cotton & Disposables', 40, 'pcs', 4, 'Beauty Supply Co', '2025-02-06 11:14:36', '2025-02-06 11:14:36');

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
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_12_31_124739_create_products_table', 1),
(5, '2025_01_09_162519_create_carts_table', 1),
(6, '2025_01_22_075811_add_image_to_users_table', 2),
(8, '2025_01_22_075819_add_image_to_users_table', 3),
(9, '2025_01_22_161542_create_clients_table', 4),
(10, '2025_01_22_161543_create_feedback_table', 4),
(11, '2025_01_22_162033_create_inventory_table', 4),
(12, '2025_01_22_162033_create_payments_table', 4),
(13, '2025_01_22_161542_create_appointments_table', 5),
(14, '2025_01_22_164640_create_staff_table', 6),
(15, '2025_01_22_165008_create_clients_table', 7),
(16, '2025_01_23_080259_create_services_table', 8),
(17, '2024_12_31_124739_create_services_table', 9),
(18, '2025_01_24_163715_create_appointments_table', 10),
(19, '2025_01_26_190213_change_status_to_boolean_in_appointments_table', 11),
(20, '2025_01_27_160735_create_stylists_table', 12),
(21, '2025_01_28_064648_create_stylists_table', 13),
(22, '2025_01_30_073840_update_status_default_value_in_stylists_table', 14),
(23, '2025_01_30_155503_create_stylist_availability_table', 15),
(24, '2025_01_30_161249_add_image_to_stylists_table', 16),
(25, '2025_01_31_074640_add_appointment_status_to_appointments_table', 17),
(26, '2025_01_31_162330_add_payment_fields_to_appointments', 18),
(27, '2025_02_01_121704_create_inventory_table', 19),
(28, '2025_02_02_032833_create_stylist_commissions_table', 20),
(29, '2025_02_03_074156_create_admin_alerts_table', 21),
(30, '2025_02_03_082559_create_alerts_table', 22),
(31, '2025_02_03_115741_create_alerts_table', 23),
(33, '2025_02_07_074147_create_stylist_availabilities_table', 24),
(34, '2025_02_09_033557_update_status_default_in_stylists_table', 25);

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
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Price` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `Name`, `Description`, `Price`, `Image`, `Status`, `created_at`, `updated_at`) VALUES
(1, 'Haircut', 'Get a fresh and stylish haircut tailored to your personality, enhancing your overall look with precision and care.', 800, '1738825832.png', 1, '2025-01-23 07:53:59', '2025-02-10 02:43:19'),
(2, 'Menicure', 'Pamper your hands with a professional manicure, ensuring clean, well-shaped nails and healthy cuticles for a polished look.', 1200, '1738837278.png', 1, '2025-01-23 11:40:34', '2025-02-06 05:21:19'),
(3, 'Pedicure', 'Treat your feet to a relaxing pedicure, removing dead skin, shaping nails, and providing deep  smooth feet.', 1400, '1738837318.png', 1, '2025-01-23 11:42:15', '2025-02-06 05:21:58'),
(4, 'Hair Dyeing', 'Advanced color transformation service creating vibrant, long-lasting hair color matching your unique personality.', 1800, '1738825864.png', 1, '2025-01-23 11:43:01', '2025-02-06 02:11:04'),
(5, 'Skin Care', 'Advanced skincare techniques enhance skin health by combining nourishing ingredients and modern treatments for a glowing, youthful look.', 1800, '1738837340.png', 1, '2025-01-23 11:43:33', '2025-02-06 05:22:20'),
(6, 'Facial', 'Experience a deep-cleansing and nourishing facial that refreshes your skin, leaving it smooth and radient.', 2200, '1738837369.png', 1, '2025-01-23 11:43:53', '2025-02-06 05:22:49');

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
('MXVkAvjMnoBqaTFkg2PEDzgzm9acNRmRK7k98NQf', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicWpCSGNwOTV1a0NBWVVGWVVMdXhFM1l0cjYwM2VQVVJPc1k2ZzkzUyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1739417913),
('Ra9VbBkYbPUemvp59ARsdScxG89L9bjtmc8N9V0r', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNnlVd2RzS1N4NE5GUGNsTFV0alFEZUs3VDB0V2dBSzNVWFc4ejNwZiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1739365228);

-- --------------------------------------------------------

--
-- Table structure for table `stylists`
--

CREATE TABLE `stylists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `commission_rate` decimal(5,2) NOT NULL DEFAULT 0.00,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stylists`
--

INSERT INTO `stylists` (`id`, `user_id`, `name`, `description`, `commission_rate`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 11, 'Muhammad Usman', 'Beauty & Hair Specialist', 20.00, '1738067466.jpg', 1, '2025-01-28 07:31:07', '2025-02-09 02:24:56'),
(3, 9, 'Ahmed', ' Senior Cosmetologist', 15.00, '1738166130.jpg', 1, '2025-01-28 07:34:45', '2025-02-12 07:01:16'),
(5, 13, 'Hafeez', 'All-Rounder Beautician', 25.00, '1738151209.jpg', 1, '2025-01-29 06:46:49', '2025-02-08 22:28:14'),
(10, 16, 'Shahab', 'Grooming Expert', 15.00, '1738827170.jpg', 1, '2025-02-06 02:32:50', '2025-02-06 02:32:50');

-- --------------------------------------------------------

--
-- Table structure for table `stylist_availabilities`
--

CREATE TABLE `stylist_availabilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stylist_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stylist_availabilities`
--

INSERT INTO `stylist_availabilities` (`id`, `stylist_id`, `start_date`, `end_date`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 5, '2025-02-10', '2025-02-15', '10:00:00', '22:00:00', '2025-02-08 22:56:18', '2025-02-08 22:56:18'),
(3, 2, '2025-02-15', '2025-02-20', '08:00:00', '20:00:00', '2025-02-09 10:47:12', '2025-02-09 10:47:12'),
(4, 10, '2025-02-20', '2025-02-25', '10:00:00', '20:00:00', '2025-02-09 10:48:52', '2025-02-09 10:48:52'),
(5, 3, '2025-02-20', '2025-02-25', '00:00:00', '20:00:00', '2025-02-09 10:49:51', '2025-02-09 10:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `stylist_commissions`
--

CREATE TABLE `stylist_commissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stylist_id` bigint(20) UNSIGNED NOT NULL,
  `total_commission` decimal(10,2) NOT NULL,
  `completed_appointments` int(11) NOT NULL,
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
  `roles` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `roles`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user@gmail.com', NULL, '$2y$12$F3qJ3Fo7Nmjsuferx7UMvenbgDAkq1kqepWvRRf9.Pl4DBbOhoxti', 4, NULL, '2025-01-22 02:27:57', '2025-01-23 02:43:14'),
(6, 'Recipients', 'recipients@gmail.com', NULL, '$2y$12$hGqHgCdPEGyYtqH9ZZhfj.gFko8Bz2OathC8dSi6jJIL.4BUYxU7C', 2, NULL, '2025-01-23 02:52:42', '2025-02-09 02:54:03'),
(7, 'Admin', 'admin@gmail.com', NULL, '$2y$12$lYfWgdsjj22izyYmupoAhez9Ii5t32umuJ8sqhjWu20GceXXzxVxG', 1, NULL, '2025-01-23 02:59:29', '2025-01-23 03:00:00'),
(8, 'Muhammad Hamza', 'hamza@gmail.com', NULL, '$2y$12$BhwW9Za5xZoqWIzwRymSLO/T9lG8Pn8FiJ3/OfqdABeOAJZCmVb3C', 4, NULL, '2025-01-25 11:06:30', '2025-01-25 11:06:30'),
(9, 'Ahmed', 'ahmed@gmail.com', NULL, '$2y$12$Wx0lL88dEQa8m.3beCE9HOeOwHN8IUst18JMuhnWbNCKMPexY6ghO', 3, NULL, '2025-01-25 11:34:15', '2025-01-25 11:34:15'),
(10, 'Zain', 'zain@gmail.com', NULL, '$2y$12$iKvZEPUW/KtZR3B7SwhEX.vEvs3C1wMJb3Gj3e6ZB9y8Wax/cuFOS', 3, NULL, '2025-01-26 14:46:12', '2025-01-26 14:46:12'),
(11, 'Usman', 'usman@gmail.com', NULL, '$2y$12$oTHNQnssDzix5TnEiu9TT.KVaoJvXe5wbOoM1FjELdEAnXgSqrkRa', 3, NULL, '2025-01-27 02:17:43', '2025-01-27 02:17:43'),
(12, 'kara usman', 'kara@gmail.com', NULL, '$2y$12$Zh.RT0Vxme6eJibOfHt49eWYhs6/mAreLUQe9vnnyDzNfVMVGM/72', 4, NULL, '2025-01-28 07:43:49', '2025-01-28 07:43:49'),
(13, 'Hafeez', 'hafeez@gmail.com', NULL, '$2y$12$a9w2YMdW.G3ovRrKNqeep.D/43jCHWgDcunD95pu7zR62D6D2jqxG', 3, NULL, '2025-01-29 06:45:50', '2025-01-29 06:45:50'),
(14, 'Muhammad Hamza', 'hamzaka549@gmail.com', NULL, '$2y$12$296RDMF1cwreItYdqfq.yOQT/KBrjzT6xeVJc.0soY7g7kMEvQsm2', 1, NULL, '2025-01-31 07:53:02', '2025-01-31 07:53:02'),
(15, 'Hamza', 'hmzaka49@gmail.com', NULL, '$2y$12$iCcoUWQ/lFB68MwR.sKDDOLlYzWqZlZSUog.EvZoH99T4wfFNziJ6', 4, NULL, '2025-02-04 11:16:39', '2025-02-04 11:16:39'),
(16, 'Shahab', 'shahab@gmail.com', NULL, '$2y$12$CF7lXZJQ4bxRnvVQZlD/ROtCF6BFPWLKIknzNQoA2Ou7t2jAk8sKC', 3, NULL, '2025-02-06 02:31:58', '2025-02-06 02:31:58'),
(17, 'Promptive', 'promptive.0@gmail.com', NULL, '$2y$12$WctNPJvY46YHzslBZVAo7.EtC7zy1HYVYM8N1vxfL2e9zDXGvXWTi', 4, NULL, '2025-02-06 11:43:06', '2025-02-06 11:43:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `stylists`
--
ALTER TABLE `stylists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stylist_availabilities`
--
ALTER TABLE `stylist_availabilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stylist_availabilities_stylist_id_foreign` (`stylist_id`);

--
-- Indexes for table `stylist_commissions`
--
ALTER TABLE `stylist_commissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stylist_commissions_stylist_id_foreign` (`stylist_id`);

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
-- AUTO_INCREMENT for table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `stylists`
--
ALTER TABLE `stylists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `stylist_availabilities`
--
ALTER TABLE `stylist_availabilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stylist_commissions`
--
ALTER TABLE `stylist_commissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `stylist_availabilities`
--
ALTER TABLE `stylist_availabilities`
  ADD CONSTRAINT `stylist_availabilities_stylist_id_foreign` FOREIGN KEY (`stylist_id`) REFERENCES `stylists` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stylist_commissions`
--
ALTER TABLE `stylist_commissions`
  ADD CONSTRAINT `stylist_commissions_stylist_id_foreign` FOREIGN KEY (`stylist_id`) REFERENCES `stylists` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
