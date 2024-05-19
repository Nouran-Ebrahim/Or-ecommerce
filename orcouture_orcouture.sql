-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 19, 2024 at 09:39 AM
-- Server version: 10.6.16-MariaDB
-- PHP Version: 8.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orcouture_orcouture`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `long` varchar(255) DEFAULT NULL,
  `additional_directions` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zone` varchar(255) DEFAULT NULL,
  `block` varchar(100) DEFAULT NULL,
  `road` varchar(100) DEFAULT NULL,
  `building_no` varchar(100) DEFAULT NULL,
  `flat` varchar(255) DEFAULT NULL,
  `floor_no` varchar(100) DEFAULT NULL,
  `apartment` varchar(100) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `default` tinyint(1) NOT NULL DEFAULT 0,
  `country_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `client_id`, `lat`, `long`, `additional_directions`, `created_at`, `updated_at`, `region_id`, `city`, `zone`, `block`, `road`, `building_no`, `flat`, `floor_no`, `apartment`, `type`, `note`, `default`, `country_id`) VALUES
(39, 28, NULL, NULL, NULL, '2024-04-23 11:13:14', '2024-04-23 11:13:14', 94, NULL, 'hhh', NULL, 'ggg', '54', '5', NULL, NULL, NULL, NULL, 1, 2),
(40, 31, NULL, NULL, NULL, '2024-05-07 04:37:53', '2024-05-07 04:37:53', 94, NULL, 'Incidunt placeat s', NULL, 'Ullamco repellendus', 'In veniam ut vel ut', 'Natus reprehenderit', NULL, NULL, NULL, NULL, 0, 2),
(41, 28, NULL, NULL, NULL, '2024-05-08 12:17:39', '2024-05-08 12:17:39', 7, NULL, '44', NULL, '5', 'Molestiae saepe dele', '5', NULL, NULL, NULL, NULL, 1, 1),
(42, 28, NULL, NULL, NULL, '2024-05-08 12:25:38', '2024-05-08 12:25:38', 94, NULL, 'hhh', NULL, '5', 'Deserunt perspiciati', '5', NULL, NULL, NULL, NULL, 1, 2),
(43, 32, NULL, NULL, NULL, '2024-05-09 08:28:07', '2024-05-09 08:28:07', 95, NULL, '12', NULL, '12', '12', '12', NULL, NULL, NULL, NULL, 1, 2),
(44, 28, NULL, NULL, NULL, '2024-05-09 12:35:04', '2024-05-09 12:35:04', 94, NULL, '8', NULL, 'ggg', 'ppppppp', '5', NULL, NULL, NULL, NULL, 1, 2),
(45, 33, NULL, NULL, NULL, '2024-05-14 10:12:26', '2024-05-15 08:39:37', 94, NULL, '2', NULL, '3', '4', NULL, NULL, NULL, NULL, NULL, 1, 2),
(46, 33, NULL, NULL, NULL, '2024-05-14 10:23:40', '2024-05-14 10:23:40', 96, NULL, 'El taif', NULL, 'Wazeer', '12', '1', NULL, NULL, NULL, NULL, 0, 2),
(48, 33, NULL, NULL, NULL, '2024-05-14 10:32:45', '2024-05-14 10:35:06', 94, NULL, '1', NULL, '1', '1', '1', NULL, NULL, NULL, NULL, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `phone_code` varchar(255) DEFAULT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `theme` tinyint(1) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `image`, `code`, `phone_code`, `country_code`, `status`, `theme`, `email_verified_at`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '123456', NULL, NULL, '973', 'BH', 1, 1, NULL, '$2y$10$Ux05A7MTagNwS51QpRoEDe.nX1mKZyOy1xSLl1TjyeJP9O4Oy5i.2', 'D5zXfRD9AlxQ4htexnXjmTiRDcwej9TGUr72YLYKKnJ2Zhsc27Bgm7CN9HS6', NULL, '2022-10-09 11:52:15', '2023-11-28 13:48:05'),
(3, 'test', 'test@gmail.com', '123456789', NULL, NULL, '973', 'BH', 1, 1, NULL, '$2y$10$A3YAcGfNkKjpu2YhbTTOzujufTqhQ18vAwHVpwOqXl2XWXS.asA6S', NULL, '2024-03-10 14:55:44', '2024-03-10 14:55:01', '2024-03-10 14:55:44'),
(4, 'aya', 'test@gmail.com', '1234567', NULL, NULL, '973', 'BH', 1, 1, NULL, '$2y$10$LbwGDEMO4K30EIOy8sW.ROCarP9bkCIJ.VJSzA59uHOlja9varTp.', NULL, '2024-03-10 15:56:55', '2024-03-10 15:55:45', '2024-03-10 15:56:55'),
(5, 'test', 'test@gmail.com', '12345678', NULL, NULL, '973', 'BH', 1, 1, NULL, '$2y$10$3nOiE7OR4YznoP/ILrwgIuk7DREgxBP08oW28u3JgL0P2GTjwzlJK', NULL, '2024-03-10 16:03:01', '2024-03-10 16:02:25', '2024-03-10 16:03:01'),
(6, '1234567', '1@y', '123456789', NULL, NULL, '973', 'BH', 1, 1, NULL, '$2y$10$dncOFKoOWGbvg.uRsU4aZuu2cNynes8GtxTgN6FMr5tQm2OxbAj32', NULL, NULL, '2024-05-15 11:01:56', '2024-05-15 11:06:48');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `postion` varchar(255) NOT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `desc_ar` text DEFAULT NULL,
  `desc_en` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `postion`, `title_ar`, `title_en`, `desc_ar`, `desc_en`, `status`, `created_at`, `updated_at`) VALUES
(1, '/uploads/banner/1710688627_6759.png', '1', 'Your style journey starts here.', 'Your style journey starts here.', 'Discover the joy of online shopping, Where fashion meets convenience', 'Discover the joy of online shopping, Where fashion meets convenience', 1, '2024-03-17 16:17:07', '2024-03-17 16:17:07'),
(2, '/uploads/banner/1710688873_6233.png', '2', NULL, NULL, 'Embrace elegance with our stunning abaya collection!', 'Embrace elegance with our stunning abaya collection!', 1, '2024-03-17 16:19:25', '2024-03-17 16:21:13'),
(6, '/uploads/banner/1715767044_5514.jpg', '1', 'تست فوتور', 'test photor', 'هالو ايتس مي', 'test titles not important', 0, '2024-05-15 09:57:24', '2024-05-15 09:57:24');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `region_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address_ar` text DEFAULT NULL,
  `address_en` text DEFAULT NULL,
  `delivery` tinyint(1) NOT NULL DEFAULT 1,
  `pickup` tinyint(1) NOT NULL DEFAULT 1,
  `dinein` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `lat` varchar(255) DEFAULT NULL,
  `long` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `country_id`, `region_id`, `title_ar`, `title_en`, `phone`, `whatsapp`, `email`, `address_ar`, `address_en`, `delivery`, `pickup`, `dinein`, `status`, `lat`, `long`, `created_at`, `updated_at`) VALUES
(2, NULL, NULL, 'branch1', 'branch1', NULL, NULL, NULL, 'Riyadh, Malaz Dist., P.O.Box: 82373', 'Riyadh, Malaz Dist., P.O.Box: 82373', 1, 1, 1, 1, NULL, NULL, '2024-04-24 14:11:18', '2024-04-24 14:11:18'),
(5, NULL, NULL, 'الدمام', 'Damam', NULL, NULL, NULL, 'س ع ص', 'S D F', 1, 1, 1, 1, NULL, NULL, '2024-05-15 09:35:05', '2024-05-15 09:35:05');

-- --------------------------------------------------------

--
-- Table structure for table `branch_images`
--

CREATE TABLE `branch_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vacancy_id` bigint(20) UNSIGNED NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_code` varchar(255) NOT NULL DEFAULT '+973',
  `code` varchar(255) NOT NULL DEFAULT 'BH',
  `country_code` varchar(255) NOT NULL DEFAULT 'BH',
  `address` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `vacancy_id`, `last_name`, `first_name`, `phone`, `email`, `phone_code`, `code`, `country_code`, `address`, `file`, `created_at`, `updated_at`) VALUES
(1, 1, 'ebrahim', 'nouran', '1017944211', 'nouran.ssp@gmail.com', '20', 'BH', 'EG', 'nnnnnnnnnn', '/uploads/career/1714058624_6897.pdf', '2024-04-25 16:23:44', '2024-04-25 16:23:44'),
(2, 2, 'ebrahim', 'nadeen', '1223701860', 'nadeen@gmail.com', '20', 'BH', 'EG', 'ffffffff', '/uploads/career/1714202517_2384.pdf', '2024-04-27 07:21:57', '2024-04-27 07:21:57'),
(3, 2, 'el mohamday', 'ebrahim', '1017944211', 'ebrahim@admin.com', '20', 'BH', 'EG', 'fffffffff', '/uploads/career/1714202560_5542.pdf', '2024-04-27 07:22:40', '2024-04-27 07:22:40'),
(4, 3, 'gaber', 'mohamed', '1148888408', 'Mohammedg.abdelaal1@gmail.com', '20', 'BH', 'EG', NULL, '/uploads/career/1715691638_6062.pdf', '2024-05-14 13:00:38', '2024-05-14 13:00:38'),
(6, 3, 'gaber', 'mohamed', '1148888408', '1@y', '20', 'BH', 'EG', NULL, '/uploads/career/1715776177_2920.pdf', '2024-05-15 12:29:37', '2024-05-15 12:29:37'),
(7, 3, 'Gaber', 'mohamed', '1148888408', 'm@y', '20', 'BH', 'EG', NULL, '/uploads/career/1715844883_1922.pdf', '2024-05-16 07:34:43', '2024-05-16 07:34:43');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `size_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` smallint(6) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `client_id`, `product_id`, `color_id`, `size_id`, `quantity`, `created_at`, `updated_at`, `category`) VALUES
(1, 293938, 3, 1, 1, 2, '2024-03-22 23:39:35', '2024-03-23 00:18:14', NULL),
(2, 293938, 3, 1, 2, 2, '2024-03-23 00:18:33', '2024-03-23 00:18:53', NULL),
(3, 18, 3, 1, 1, 1, '2024-03-23 00:19:52', '2024-03-23 00:39:27', NULL),
(4, 18, 3, 2, 1, 1, '2024-03-23 00:21:26', '2024-03-23 00:21:40', NULL),
(9, 633941, 3, 1, 1, 1, '2024-03-24 15:12:32', '2024-03-24 15:12:32', NULL),
(10, 633941, 3, 2, 2, 2, '2024-03-24 15:29:01', '2024-03-24 15:29:01', NULL),
(11, 633941, 3, 1, 2, 3, '2024-03-24 15:48:38', '2024-03-24 15:48:38', NULL),
(12, 633941, 3, 2, 1, 2, '2024-03-24 15:49:49', '2024-03-24 15:49:49', NULL),
(13, 158242, 3, 1, 2, 2, '2024-03-25 11:20:30', '2024-03-25 11:22:45', '22'),
(14, 158242, 3, 1, 1, 2, '2024-03-25 11:23:27', '2024-03-25 11:23:27', '22'),
(15, 628377, 3, 1, 2, 2, '2024-04-02 09:37:07', '2024-04-02 09:37:07', '22'),
(16, 628377, 3, 2, 1, 1, '2024-04-02 09:37:18', '2024-04-02 09:37:18', '22'),
(22, 22, 3, 1, 1, 1, '2024-04-17 17:10:41', '2024-04-17 17:10:41', 'newCollection'),
(23, 22, 3, 1, 2, 2, '2024-04-18 11:20:56', '2024-04-18 11:20:56', '22'),
(46, 548899, 13, 1, 1, 2, '2024-05-07 16:51:05', '2024-05-07 16:51:05', 'newCollection'),
(67, 531238, 13, 1, 1, 1, '2024-05-15 10:18:49', '2024-05-15 10:18:49', '27'),
(70, 303062, 13, 1, 1, 1, '2024-05-15 13:54:04', '2024-05-15 13:54:04', '27');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_parent` tinyint(1) NOT NULL DEFAULT 1,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title_ar`, `title_en`, `status`, `created_at`, `updated_at`, `is_parent`, `parent_id`, `image`) VALUES
(9, 'عبايات كلاسيكية', 'Classic Abayas', 1, '2024-03-14 11:29:49', '2024-03-14 11:29:49', 1, NULL, '/uploads/Categories/1710412189_1929.png'),
(13, 'عبايات مطرزة', 'Embroidered Abayas', 1, '2024-03-14 11:39:40', '2024-03-14 11:39:40', 0, 9, '/uploads/Categories/1710412780_7099.png'),
(27, 'عبايات مطرزة واسعة', 'Wide Embroidered Abayas', 1, '2024-05-07 15:11:51', '2024-05-07 15:11:51', 0, 13, '/uploads/Categories/1715094711_8355.png'),
(28, 'عبايات مطرزة ضيقة', 'Narrow Embroidered Abayas', 1, '2024-05-07 15:13:26', '2024-05-07 15:13:26', 0, 13, '/uploads/Categories/1715094806_9944.png'),
(29, 'تست كاتيجوري', 'test category', 1, '2024-05-15 09:16:34', '2024-05-15 09:17:47', 1, NULL, '/uploads/Categories/1715764594_7415.jpg'),
(30, 'تست كاتيجوري', 'test category', 1, '2024-05-15 12:12:08', '2024-05-15 13:36:48', 0, 29, '/uploads/Categories/1715780208_6508.png');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) NOT NULL DEFAULT 'logo.png',
  `phone_code` varchar(255) NOT NULL DEFAULT '+973',
  `code` varchar(255) NOT NULL DEFAULT 'BH',
  `country_code` varchar(255) NOT NULL DEFAULT 'BH',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `password_confirmation` varchar(255) DEFAULT NULL,
  `otp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `phone`, `points`, `image`, `phone_code`, `code`, `country_code`, `status`, `email_verified_at`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`, `last_name`, `first_name`, `password_confirmation`, `otp`) VALUES
(28, NULL, 'nouran.ssp@gmail.com', '1017944211', 0, 'logo.png', '20', 'BH', 'EG', 1, NULL, '$2y$10$7/Qe1LqE4BHbtyxIZzhLruyegcq.yvnPdSTmXVvA9Tzs2N0nmw/oi', NULL, NULL, '2024-04-23 11:13:14', '2024-05-13 13:15:35', 'ebrahim', 'nouran2', '$2y$10$MQePloz/6.TL8kOBb9XXj.hEmLARm2BBiAPyzoklDldjEoIjp1Qgq', '770692'),
(30, NULL, 'halah@gmail.com', '1027696654', 0, 'logo.png', '20', 'BH', 'EG', 1, NULL, '$2y$10$8XcaobuTaXP728P4SfRLC.gsTcFSiCF6dVjhAeKKOMCT7U2QoBzxy', NULL, NULL, '2024-04-24 10:53:45', '2024-04-27 06:22:08', 'Abdelhamed', 'halah', '$2y$10$PGgfqfs0BkC5oPFBt180EuievsdHytT4Wqhw71IimsK9rRcWS3muq', '482938'),
(31, NULL, NULL, '123456789', 0, 'logo.png', '966', 'BH', 'SA', 1, NULL, '$2y$10$aro2nv0U7sb5OPlyVg2ece./E/eTmv7wm9XcdTZ6GTTtAkQJ4E6EC', NULL, NULL, '2024-05-07 04:36:34', '2024-05-18 07:51:32', 'Bailey', 'Keefe', NULL, '268268'),
(32, NULL, 'mostafazarea69@gmail.com', '33467117', 0, 'logo.png', '973', 'BH', 'BH', 1, NULL, '$2y$10$3b7MZcmOD7S2tidjnfz7puoClYj.oWRcC5ietBa5nfZzShEvlP7zm', NULL, NULL, '2024-05-09 08:28:07', '2024-05-09 08:31:46', 'Mahmoud', 'Mostafa', '$2y$10$9TzsA1IfdR.6Do1t9rtIEeRfSwc0DlL3aBQ907Q0NHqel6zXuZBUG', '941465'),
(33, NULL, 'Mohammedg.abdelaal1@gmail.com', '1148888408', 0, 'logo.png', '20', 'BH', 'EG', 1, NULL, '$2y$10$I/xifPW4HqW1gfNahKgtmujs5SehvV2ridbuB/VhYmsrdhIxG6gI6', NULL, NULL, '2024-05-14 07:46:51', '2024-05-16 08:49:15', 'gaber', 'mohamed', '$2y$10$vEOrXRVmccIAAxFgdhJRmuCIl4k7is9QAy50zlBvaF.zCsegfEdL6', '306467'),
(34, NULL, NULL, '234567890', 0, 'logo.png', '966', 'BH', 'SA', 1, NULL, '$2y$10$iXzwVE40DN9qSqq5R4gzc.b5V6ZGX6NB08lJFb4SnFsCOImMto0Bi', NULL, NULL, '2024-05-14 08:06:39', '2024-05-14 08:06:39', 'gaber', 'mohamed', NULL, NULL),
(35, NULL, NULL, '334455667', 0, 'logo.png', '966', 'BH', 'SA', 1, NULL, '$2y$10$mGf1ajZsB35HZxUme5Kl0uqRC31J41o6HHrxyhgOJWrG04DKHHpQy', NULL, NULL, '2024-05-14 08:11:32', '2024-05-14 08:11:32', 'gaber', 'mohamed', NULL, NULL),
(36, NULL, '1@y', '114455667', 0, 'logo.png', '966', 'BH', 'SA', 1, NULL, '$2y$10$SB9R8PfJiomuqCBcoOALM.WTz8Ew25Mo17Ztlzu4p/8Lk9mPdRw7G', NULL, NULL, '2024-05-14 08:18:43', '2024-05-15 12:00:06', 'gaber', 'mohamed', '$2y$10$jt.kcc/mccQX0veENrbvCeY1Q.CWSQHdp45cmVOxoNPTjCV6DdV9W', NULL),
(37, NULL, 'mohamed@yahoo', '224455667', 0, 'logo.png', '966', 'BH', 'SA', 1, NULL, '$2y$10$8j7Us.LHlTcgVnRwcpCN2efQRgpyRhjHOHrTVPyEYi8ArQyk/TH16', NULL, '2024-05-15 11:45:12', '2024-05-14 08:22:21', '2024-05-15 11:45:12', 'gaber', 'mohamed', '$2y$10$vMpj6evXhuPfSreh0SEZwuI1J.0x.WkPS7qF9NKOk5yqbDhwFV9nC', NULL),
(38, NULL, NULL, '12345678', 0, 'logo.png', '973', 'BH', 'BH', 1, NULL, '$2y$10$o7lJW21ij0hMzEK5mmW3euAK9f8GPNycN4qsrF3UA9OhQSnkxwTM6', NULL, NULL, '2024-05-14 08:29:37', '2024-05-14 08:29:37', 'alo', 'mm', NULL, NULL),
(39, NULL, NULL, '445566778', 0, 'logo.png', '966', 'BH', 'SA', 1, NULL, '$2y$10$lyqkcWzEDN8dvlLbfykukusg.4s9EsHqOagLDhv0LOcwcq6iTWVru', NULL, NULL, '2024-05-16 07:49:24', '2024-05-16 07:49:24', 'gaber', 'mohamed', NULL, NULL),
(40, NULL, NULL, '123456345', 0, 'logo.png', '966', 'BH', 'SA', 1, NULL, '$2y$10$UVucInnxf.LsSxW9Oouo8.kfonJYrOq5qwbkGCOLQWsOb3zEm3J7i', NULL, NULL, '2024-05-16 07:57:58', '2024-05-16 07:57:58', 'Weeks', 'Kenyon', NULL, NULL),
(41, NULL, NULL, '015530489', 0, 'logo.png', '966', 'BH', 'SA', 1, NULL, '$2y$10$Dv8nxwtCWtNTGOHPZrAKpO/4K7rY0KqYHzMw4uW1et1XbK3cbuMPm', NULL, NULL, '2024-05-18 00:50:09', '2024-05-18 00:50:09', 'Ahmed', 'Dina', NULL, NULL),
(42, NULL, NULL, '1553048031', 0, 'logo.png', '20', 'BH', 'EG', 1, NULL, '$2y$10$UQuZNBIs.DcI8EkdP0uOBOwgq.1HYKL0cyp2R8SfYvT7QDiWEbpvu', NULL, NULL, '2024-05-19 04:40:02', '2024-05-19 04:44:42', 'Ahmed', 'Dina', '$2y$10$XaotrA.Gq.vxE0TuksWOCufO45sS2CHPSeVDo7OdUT/yHmyPeG7QG', '713881');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `hexa` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `title_ar`, `title_en`, `hexa`, `status`, `created_at`, `updated_at`, `image`) VALUES
(1, 'أحمر', 'Red', '#ff0000', 1, '2021-06-07 08:22:08', '2022-03-04 18:36:33', NULL),
(2, 'أصفر', 'Yellow', '#fbe80e', 1, '2021-06-07 08:22:08', '2022-03-04 18:36:39', NULL),
(3, 'أخضر', 'Green', '#40f000', 1, '2021-06-07 08:22:08', '2022-03-04 18:36:41', NULL),
(4, 'أزرق', 'Blue', '#2206b2', 1, '2021-06-07 08:22:08', '2022-03-04 18:36:44', NULL),
(5, 'نيلى', 'Indigo', '#4B0082', 1, '2021-06-07 08:22:08', '2022-03-04 18:36:46', NULL),
(6, 'بنفسجى', 'Violet', '#8F00FF', 1, '2021-06-07 08:22:08', '2022-03-04 18:36:52', NULL),
(7, 'الزيتي', 'Dark green', '#013220 ', 1, '2021-06-14 15:33:35', '2022-03-04 18:36:50', NULL),
(8, 'أسود', 'Black', '#000', 1, '2021-06-14 15:33:57', '2022-03-04 18:36:56', NULL),
(9, 'أبيض', 'White', '#ffffff', 1, '2021-06-14 15:34:18', '2022-03-04 18:36:54', NULL),
(10, 'سماوي', 'Light blue', '#ADD8E6', 1, '2021-06-14 15:34:47', '2022-03-04 18:37:08', NULL),
(11, 'وردي', 'Pink', '#FFC0CB ', 1, '2021-06-15 04:38:41', '2022-03-04 18:37:07', NULL),
(12, 'ماروني', 'Maroon', '#800000', 1, '2021-06-15 06:20:03', '2022-03-04 18:37:04', NULL),
(13, 'بيج', 'Node', '#000000', 1, '2021-06-15 07:27:35', '2024-03-21 09:34:13', '/uploads/Colors/1711010053_9058.png'),
(14, 'بني', 'Brown', '#000000', 1, '2021-06-15 08:25:03', '2024-03-17 09:41:27', '/uploads/Colors/1710664887_2231.png'),
(19, 'ازرق', 'blue', '#0145e4', 1, '2024-03-17 09:40:59', '2024-03-17 09:40:59', '/uploads/Colors/1710664859_6859.png'),
(20, 'فسكوز', 'Fiscooz', '#00fac8', 1, '2024-05-15 09:33:22', '2024-05-15 09:33:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Emery Clark', '+1 (452) 621-7461', 'xibibar@mailinator.com', 'Laboris voluptatem o', 'Fugiat dolor aliqua', '2024-02-28 12:37:29', '2024-02-28 12:37:29'),
(2, 'nouran ebrahim', '+201017944211', 'nouran.ssp@gmail.com', 'nnnnn', 'jhgy', '2024-04-24 14:59:34', '2024-04-24 14:59:34'),
(3, 'Mark Gray', '+966333333333', 'fymiqila@mailinator.com', 'Nulla laudantium qu', 'Culpa nihil in amet', '2024-05-09 08:33:45', '2024-05-09 08:33:45'),
(4, 'mohamed Gaber', '+201148888408', 'Mohammedg.abdelaal1@gmail.com', 'test', 'Test', '2024-05-14 12:51:18', '2024-05-14 12:51:18');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `currancy_code_ar` varchar(255) DEFAULT NULL,
  `currancy_code_en` varchar(255) DEFAULT NULL,
  `currancy_value` decimal(5,3) NOT NULL DEFAULT 0.000,
  `phone_code` varchar(255) DEFAULT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `long` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `accept_orders` tinyint(1) NOT NULL DEFAULT 1,
  `length` int(11) NOT NULL DEFAULT 10,
  `decimals` int(11) NOT NULL DEFAULT 3,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `title_ar`, `title_en`, `currancy_code_ar`, `currancy_code_en`, `currancy_value`, `phone_code`, `country_code`, `lat`, `long`, `status`, `accept_orders`, `length`, `decimals`, `image`, `created_at`, `updated_at`) VALUES
(1, 'البحرين', 'Bahrain', 'دينار بحريني', 'BHD', 0.100, '+973', 'BH', '25.93041400', '50.63777200', 1, 1, 8, 3, '/countries/Bahrain.png', '2022-10-09 13:52:15', '2023-10-15 16:19:25'),
(2, 'المملكة العربية السعودية', 'Saudi Arabia', 'ريال سعودي', 'SAR', 1.000, '+966', 'SA', '23.88594200', '45.07916200', 1, 1, 9, 2, '/countries/SaudiArabia.png', '2022-10-09 13:52:15', '2023-10-15 16:19:25'),
(3, 'سلطنة عمان', 'Oman', 'ريال عماني', 'OR', 0.102, '+968', 'OM', '21.51258300', '55.92325500', 1, 1, 10, 3, '/countries/Oman.png', '2022-10-09 13:52:15', '2023-10-15 16:19:25'),
(4, 'الإمارات العربية المتحدة', 'United Arab Emirates', 'درهم إماراتي', 'AED', 1.000, '+971', 'AE', '23.42407600', '53.84781800', 1, 1, 9, 3, '/countries/UnitedArabEmirates.png', '2022-10-09 13:52:15', '2023-10-15 16:19:25'),
(5, 'قطر', 'Qatar', 'ريال قطري', 'QR', 1.000, '+974', 'QA', '25.35482600', '51.18388400', 1, 1, 10, 3, '/countries/Qatar.png', '2022-10-09 13:52:15', '2023-10-15 16:19:25'),
(6, 'الكويت', 'Kuwait', 'دينار كويتي', 'KWD', 0.081, '+965', 'KW', '29.31166000', '47.48176600', 1, 1, 10, 3, '/countries/Kuwait.png', '2022-10-09 13:52:15', '2023-10-15 16:19:25'),
(7, 'مصر', 'Egypt', 'جنيه مصري', 'EGP', 6.141, '+20', 'EG', '26.82055300', '30.80249800', 1, 1, 10, 3, '/countries/Egypt.png', '2022-10-09 13:52:15', '2023-10-15 16:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `type` enum('discount','percent_off') NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `percent_off` int(11) DEFAULT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `discount`, `percent_off`, `from`, `to`, `status`, `created_at`, `updated_at`) VALUES
(1, 'code 1', 'discount', 10.00, NULL, '2024-04-02', '2024-05-30', 1, '2024-04-02 11:34:58', '2024-05-08 11:57:03'),
(2, 'code 2', 'percent_off', NULL, 10, '2024-04-02', '2024-05-24', 1, '2024-04-02 11:35:20', '2024-05-08 11:56:49'),
(3, 'CODE 3', 'percent_off', NULL, 25, '2024-02-01', '2024-12-05', 1, '2024-05-15 10:28:11', '2024-05-15 10:28:11'),
(5, 'CODE 3', 'discount', 20.00, NULL, '2024-02-02', '2024-05-15', 1, '2024-05-15 10:35:13', '2024-05-15 10:35:13');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_products`
--

CREATE TABLE `coupon_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivries`
--

CREATE TABLE `delivries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivries`
--

INSERT INTO `delivries` (`id`, `title_ar`, `title_en`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'توصيل إلى المنزل', 'Delivery', '', 1, '2022-08-23 09:36:08', '2022-08-23 09:36:08'),
(2, 'إستلام من  المحل', 'Pick Up', '', 1, '2022-08-23 09:36:28', '2022-08-23 09:36:28');

-- --------------------------------------------------------

--
-- Table structure for table `device_tokens`
--

CREATE TABLE `device_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `device_token` longtext DEFAULT NULL,
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
-- Table structure for table `f_a_q_s`
--

CREATE TABLE `f_a_q_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_ar` varchar(255) DEFAULT NULL,
  `question_en` varchar(255) DEFAULT NULL,
  `answer_ar` text DEFAULT NULL,
  `answer_en` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `f_a_q_s`
--

INSERT INTO `f_a_q_s` (`id`, `question_ar`, `question_en`, `answer_ar`, `answer_en`, `status`, `created_at`, `updated_at`, `type`) VALUES
(1, 'How can I place an online order?', 'How can I place an online order?', 'How can I place an online order', 'How can I place an online order', 1, '2024-04-24 12:04:46', '2024-04-24 12:37:32', 'orders'),
(2, 'Can I cancel or change my order?', 'Can I cancel or change my order?', 'can i cancel', 'can i cancel', 1, '2024-04-24 12:05:30', '2024-04-24 12:58:00', 'orders'),
(3, 'How can I place an online order?', 'How can I place an online order?', 'How can I place an online order', 'How can I place an online order', 1, '2024-04-24 12:31:12', '2024-04-24 12:58:31', 'payments'),
(4, 'Can I cancel or change my order?', 'Can I cancel or change my order?', 'Can I cancel or change my order', 'Can I cancel or change my order', 1, '2024-04-24 12:31:32', '2024-04-24 12:58:46', 'payments'),
(5, 'How do I know my size', 'How do I know my size', 'How do I know my size', 'How do I know my size', 1, '2024-04-24 12:32:07', '2024-04-24 12:59:10', 'returns'),
(6, 'كيف اوصل لخدمة العملاء', 'How to reach customer support', 'باتباع الخطوات الاتية :\r\n1 - افتح الموقع', 'By doing these steps :\r\n1- open website', 1, '2024-05-15 09:41:17', '2024-05-15 09:41:17', 'returns');

-- --------------------------------------------------------

--
-- Table structure for table `life_styles`
--

CREATE TABLE `life_styles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `life_styles`
--

INSERT INTO `life_styles` (`id`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '/uploads/lifstyle/1710681499_3328.png', '2024-03-17 14:18:19', '2024-03-17 14:18:19'),
(2, 1, '/uploads/lifstyle/1710681499_6680.png', '2024-03-17 14:18:19', '2024-03-17 14:18:19'),
(4, 1, '/uploads/lifstyle/1710681814_6274.png', '2024-03-17 14:23:34', '2024-03-17 14:23:34'),
(6, 1, '/uploads/lifstyle/1715766936_7897.jpg', '2024-05-15 09:55:36', '2024-05-15 09:55:36');

-- --------------------------------------------------------

--
-- Table structure for table `mail_offers`
--

CREATE TABLE `mail_offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `desc` longtext DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mail_offers`
--

INSERT INTO `mail_offers` (`id`, `title`, `desc`, `image`, `created_at`, `updated_at`) VALUES
(1, 'test', '<p>test offer</p>', '/uploads/mail_offer/1710074050_1911.jpg', '2024-03-10 13:34:10', '2024-03-10 13:34:10'),
(2, 'test', '<p>test offer</p>', '/uploads/mail_offer/1710074115_3004.jpg', '2024-03-10 13:35:15', '2024-03-10 13:35:15');

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
(1, '2014_10_11_000000_create_countries_table', 1),
(2, '2014_10_11_000000_create_days_table', 1),
(3, '2014_10_12_000000_create_admins_table', 1),
(4, '2014_10_12_000000_create_clients_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2019_12_14_000001_create_device_tokens_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2022_04_18_080645_create_settings_table', 1),
(10, '2022_04_18_084603_create_contacts_table', 1),
(11, '2022_04_18_084626_create_f_a_q_s_table', 1),
(12, '2022_04_19_100517_create_payment_methods_table', 1),
(13, '2022_04_21_113420_create_sliders_table', 1),
(14, '2022_05_10_080543_create_coupons_table', 1),
(15, '2022_05_11_072964_create_colors_table', 1),
(16, '2022_06_12_113616_create_sizes_table', 1),
(17, '2022_06_12_120004_create_products_table', 1),
(18, '2022_07_31_120624_create_delivries_table', 1),
(19, '2022_07_31_120839_create_orders_table', 1),
(20, '2022_07_31_120840_create_transactions_table', 1),
(21, '2022_09_19_140023_create_visits_table', 1),
(22, '2022_12_04_145833_create_mail_offers_table', 1),
(23, '2022_12_20_145248_create_social_media_icons_table', 1),
(24, '2024_03_14_113929_add_parent_id_to_categories_table', 2),
(25, '2024_03_14_132308_add_image_to_categories_table', 3),
(26, '2024_03_17_112141_add_image_to_colors_table', 4),
(27, '2024_03_17_114301_add_in_stock_to_products_table', 5),
(28, '2024_03_17_122323_create_product_galleries_table', 6),
(29, '2024_03_17_153735_create_life_styles_table', 7),
(30, '2024_03_17_171239_create_banners_table', 8),
(31, '2024_03_18_170741_add_new_collection_to_products_table', 9),
(32, '2024_03_20_112205_add_price_after_discount_to_products_table', 10),
(34, '2024_03_20_133833_add_matrial_to_products_table', 11),
(35, '2024_03_21_120019_create_product_headers_table', 12),
(36, '2024_03_21_150659_add_last_first_name_to_clients_table', 13),
(37, '2024_03_23_012417_create_cart_table', 14),
(38, '2024_03_23_022225_create_whish_lists_table', 15),
(39, '2024_03_25_115359_add_category_id_to_whish_lists_table', 16),
(40, '2024_03_25_130740_add_category_id_to_cart_table', 17),
(43, '2024_04_07_113949_add_region_id_to_addresses_table', 18),
(44, '2024_04_07_115310_add_notes_to_orders_table', 19),
(45, '2024_04_07_115619_add_coupon_id_to_orders_table', 20),
(46, '2024_04_07_121015_add_default_to_addresses_table', 21),
(47, '2024_04_07_122648_add_password_confirmation_to_clients_table', 22),
(48, '2024_04_07_131454_add_category_to_order_product_table', 23),
(49, '2024_04_07_135545_add_country_id_to_addresses_table', 24),
(51, '2024_04_24_101250_add_otp_to_clients_table', 25),
(52, '2024_04_24_141923_add_type_to_f_a_q_s_table', 26),
(53, '2024_04_24_152042_create_branches_table', 27),
(55, '2024_04_24_152708_create_branch_images_table', 28),
(56, '2024_04_25_160637_create_vacancies_table', 29),
(57, '2024_04_25_162956_add_status_to_vacancies_table', 30),
(59, '2024_04_25_175408_create_careers_table', 31);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `delivery_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_total` decimal(9,3) DEFAULT 0.000,
  `discount` decimal(9,3) DEFAULT 0.000,
  `discount_percentage` int(11) DEFAULT 0,
  `vat` decimal(9,3) DEFAULT 0.000,
  `vat_percentage` int(11) DEFAULT 0,
  `coupon` decimal(9,3) DEFAULT 0.000,
  `coupon_text` varchar(255) DEFAULT NULL,
  `coupon_percentage` int(11) DEFAULT 0,
  `charge_cost` decimal(9,3) DEFAULT 0.000,
  `net_total` decimal(9,3) DEFAULT 0.000,
  `status` int(11) DEFAULT 0,
  `follow` int(11) DEFAULT 0,
  `use_points` tinyint(1) DEFAULT 0,
  `points_number` int(11) DEFAULT 0,
  `gained_points` int(11) DEFAULT 0,
  `client_points` int(11) DEFAULT 0,
  `mobile_type` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `notes` varchar(255) NOT NULL,
  `coupon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_after_coupon` decimal(9,3) DEFAULT 0.000,
  `sub_total_after_coupon` decimal(9,3) DEFAULT 0.000
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `delivery_id`, `client_id`, `address_id`, `payment_id`, `sub_total`, `discount`, `discount_percentage`, `vat`, `vat_percentage`, `coupon`, `coupon_text`, `coupon_percentage`, `charge_cost`, `net_total`, `status`, `follow`, `use_points`, `points_number`, `gained_points`, `client_points`, `mobile_type`, `deleted_at`, `created_at`, `updated_at`, `notes`, `coupon_id`, `total_after_coupon`, `sub_total_after_coupon`) VALUES
(32, 1, 28, 42, 1, 180.000, 0.000, 0, 27.000, 15, 10.000, NULL, 0, 25.000, 222.000, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-05-08 12:25:38', '2024-05-08 12:25:38', '', 1, 0.000, 170.000),
(33, 1, 32, 43, 1, 180.000, 0.000, 0, 27.000, 15, 0.000, NULL, 0, 25.000, 232.000, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-05-09 08:28:07', '2024-05-09 08:28:07', '', NULL, 0.000, 0.000),
(34, 1, 28, 44, 1, 180.000, 0.000, 0, 27.000, 15, 0.000, NULL, 0, 25.000, 232.000, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-05-09 12:35:04', '2024-05-09 12:35:04', '', NULL, 0.000, 0.000),
(35, 1, 33, 45, 1, 180.000, 0.000, 0, 27.000, 15, 0.000, NULL, 0, 25.000, 232.000, 1, 2, 0, 0, 0, 0, NULL, NULL, '2024-05-14 10:59:54', '2024-05-15 13:11:17', '', NULL, 0.000, 0.000),
(36, 1, 33, 45, 1, 180.000, 0.000, 0, 27.000, 15, 0.000, NULL, 0, 0.000, 0.000, 2, 0, 0, 0, 0, 0, NULL, NULL, '2024-05-14 11:00:50', '2024-05-15 12:07:22', '', NULL, 0.000, 0.000),
(37, 1, 33, 48, 1, 180.000, 0.000, 0, 27.000, 15, 0.000, NULL, 0, 25.000, 232.000, 1, 3, 0, 0, 0, 0, NULL, NULL, '2024-05-14 11:14:03', '2024-05-15 13:10:41', '', NULL, 0.000, 0.000),
(44, 1, 33, 45, 1, 648.000, 0.000, 0, 97.200, 15, 10.000, NULL, 0, 25.000, 760.200, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-05-16 08:38:44', '2024-05-16 08:38:44', '', 1, 0.000, 638.000),
(45, 1, 33, 45, 1, 648.000, 0.000, 0, 97.200, 15, 10.000, NULL, 0, 25.000, 760.200, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-05-16 08:38:59', '2024-05-16 08:38:59', '', 1, 0.000, 638.000),
(46, 1, 33, 45, 1, 648.000, 0.000, 0, 97.200, 15, 64.800, NULL, 0, 25.000, 705.400, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-05-16 08:42:18', '2024-05-16 08:42:18', '', 2, 0.000, 583.200),
(47, 1, 33, 45, 1, 648.000, 0.000, 0, 97.200, 15, 64.800, NULL, 0, 25.000, 705.400, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-05-16 08:42:30', '2024-05-16 08:42:30', '', 2, 0.000, 583.200),
(48, 1, 33, 45, 1, 648.000, 0.000, 0, 97.200, 15, 64.800, NULL, 0, 25.000, 705.400, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-05-16 08:42:36', '2024-05-16 08:42:36', '', 2, 0.000, 583.200),
(49, 1, 33, 45, 1, 486.000, 0.000, 0, 72.900, 15, 0.000, NULL, 0, 25.000, 583.900, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-05-16 08:46:44', '2024-05-16 08:46:44', '', NULL, 0.000, 0.000),
(50, 1, 33, 45, 1, 486.000, 0.000, 0, 72.900, 15, 0.000, NULL, 0, 25.000, 583.900, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-05-16 08:46:54', '2024-05-16 08:46:54', '', NULL, 0.000, 0.000),
(51, 1, 33, 45, 1, 486.000, 0.000, 0, 72.900, 15, 0.000, NULL, 0, 25.000, 583.900, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-05-16 08:47:01', '2024-05-16 08:47:01', '', NULL, 0.000, 0.000),
(53, 1, 33, 45, 1, 162.000, 0.000, 0, 24.300, 15, 0.000, NULL, 0, 25.000, 211.300, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-05-16 08:50:38', '2024-05-16 08:50:38', '', NULL, 0.000, 0.000),
(54, 1, 33, 45, 1, 1836.000, 0.000, 0, 275.400, 15, 183.600, NULL, 0, 25.000, 1952.800, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-05-16 13:14:12', '2024-05-16 13:14:12', '', 2, 0.000, 1652.400),
(55, 1, 33, 45, 1, 162.000, 0.000, 0, 24.300, 15, 40.500, NULL, 0, 25.000, 170.800, 0, 0, 0, 0, 0, 0, NULL, NULL, '2024-05-16 13:33:53', '2024-05-16 13:33:53', '', 3, 0.000, 121.500);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `size_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` decimal(8,3) DEFAULT NULL,
  `quantity` smallint(6) NOT NULL,
  `total` decimal(9,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `color_id`, `size_id`, `price`, `quantity`, `total`, `created_at`, `updated_at`, `category`) VALUES
(37, 32, 14, 2, 2, 180.000, 1, 180.000, '2024-05-08 12:25:38', '2024-05-08 12:25:38', 'bestSelling'),
(38, 33, 14, 2, 2, 180.000, 1, 180.000, '2024-05-09 08:28:07', '2024-05-09 08:28:07', 'bestSelling'),
(39, 34, 13, 1, 1, 180.000, 1, 180.000, '2024-05-09 12:35:04', '2024-05-09 12:35:04', '27'),
(40, 35, 13, 1, 1, 180.000, 1, 180.000, '2024-05-14 10:59:54', '2024-05-14 10:59:54', 'newCollection'),
(41, 37, 13, 1, 1, 180.000, 1, 180.000, '2024-05-14 11:14:03', '2024-05-14 11:14:03', '27'),
(50, 44, 13, 2, 1, 162.000, 4, 648.000, '2024-05-16 08:38:44', '2024-05-16 08:38:44', 'newCollection'),
(51, 46, 13, 1, 1, 162.000, 4, 648.000, '2024-05-16 08:42:18', '2024-05-16 08:42:18', '27'),
(52, 49, 13, 1, 1, 162.000, 3, 486.000, '2024-05-16 08:46:44', '2024-05-16 08:46:44', 'newCollection'),
(54, 53, 13, 1, 1, 162.000, 1, 162.000, '2024-05-16 08:50:38', '2024-05-16 08:50:38', 'newCollection'),
(55, 54, 13, 1, 2, 162.000, 3, 486.000, '2024-05-16 13:14:12', '2024-05-16 13:14:12', '27'),
(56, 54, 13, 1, 1, 162.000, 3, 486.000, '2024-05-16 13:14:12', '2024-05-16 13:14:12', '27'),
(57, 54, 13, 2, 2, 162.000, 2, 324.000, '2024-05-16 13:14:12', '2024-05-16 13:14:12', '27'),
(58, 54, 14, 1, 3, 162.000, 2, 324.000, '2024-05-16 13:14:12', '2024-05-16 13:14:12', '28'),
(59, 54, 14, 2, 3, 162.000, 1, 162.000, '2024-05-16 13:14:12', '2024-05-16 13:14:12', '28'),
(60, 55, 13, 1, 1, 162.000, 1, 162.000, '2024-05-16 13:33:53', '2024-05-16 13:33:53', 'newCollection');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `title_ar`, `title_en`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'كاش', 'cash', 1, '/uploads/PaymentMethods/1697900757_2398.webp', '2022-10-06 06:56:58', '2024-03-10 13:20:18'),
(2, 'ديبت كارد', 'Detbit Card', 1, '/uploads/PaymentMethods/1697900766_7660.webp', '2022-10-06 06:57:16', '2023-10-21 12:06:06'),
(3, 'بطاقة الإئتمان', 'Credit Card', 1, '/uploads/PaymentMethods/1697900773_7679.webp', '2022-10-06 06:57:31', '2023-10-21 12:06:13'),
(4, 'بنفت باي', 'Benefit Pay', 1, '/uploads/PaymentMethods/1697900780_3097.webp', '2022-10-06 06:57:46', '2023-10-21 12:06:20'),
(5, 'ابل باي', 'Apple Pay', 1, '/uploads/PaymentMethods/1697900788_3799.webp', '2022-12-20 13:55:39', '2023-10-21 12:06:48');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `desc_ar` text DEFAULT NULL,
  `desc_en` text DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `arrangement` int(11) NOT NULL DEFAULT 0,
  `VAT` enum('inclusive','exclusive') NOT NULL DEFAULT 'exclusive',
  `most_selling` tinyint(1) NOT NULL DEFAULT 0,
  `popular` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `price` decimal(8,3) NOT NULL DEFAULT 0.000,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `discount` decimal(8,3) DEFAULT 0.000,
  `from` date DEFAULT NULL,
  `to` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `in_stock` tinyint(1) NOT NULL DEFAULT 1,
  `new_collection` tinyint(1) NOT NULL DEFAULT 1,
  `price_after_discount` decimal(8,3) NOT NULL DEFAULT 0.000,
  `material_ar` text DEFAULT NULL,
  `material_en` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title_ar`, `title_en`, `desc_ar`, `desc_en`, `code`, `arrangement`, `VAT`, `most_selling`, `popular`, `status`, `price`, `quantity`, `discount`, `from`, `to`, `deleted_at`, `created_at`, `updated_at`, `in_stock`, `new_collection`, `price_after_discount`, `material_ar`, `material_en`) VALUES
(3, '‎رمضــان ٢٠٢٤ ✨', '✨ ramadhan bisht', '<p style=\"text-align: right;\">قماش السلعة: 100% كتان<br>الحزام متضمن: لا<br>العناية بالملابس: تنظيف جاف<br>ملاحظة المصمم: يرجى ذكر طول عبايتك المعتادة</p>', '<p style=\"text-align: left;\">Item fabric : 100% Linen<br>Belt Included : No<br>Garment Care : Dry Clean<br>Designer note : Please mention your usual abaya lenth</p>', '26317', 3, 'exclusive', 0, 0, 1, 100.000, 0, 50.000, '2024-02-01', '2024-03-27', '2024-05-07 15:26:34', '2024-02-25 10:04:54', '2024-05-07 15:26:34', 1, 0, 50.000, '92% Polyester, 8% Elastane', '92% Polyester, 8% Elastane'),
(13, 'ساتان فاخر متوهج', 'Premium satin flared', NULL, NULL, 'DAV0033D', 13, 'exclusive', 0, 0, 1, 180.000, 0, 10.000, '2024-05-01', '2024-05-17', NULL, '2024-05-07 15:22:25', '2024-05-15 13:49:24', 1, 1, 162.000, '92% بوليستر، 8% إيلاستان', '92% Polyester, 8% Elastane'),
(14, 'غابة عميقة متميزة مفتوحة', 'Premium deep forest open', NULL, NULL, 'DAV0033N', 14, 'exclusive', 1, 1, 1, 180.000, 0, NULL, NULL, NULL, NULL, '2024-05-07 15:34:58', '2024-05-07 15:34:58', 1, 1, 0.000, '92% بوليستر، 8% إيلاستان', '92% Polyester, 8% Elastane'),
(15, 'test', 'test', NULL, NULL, 'E5', 15, 'exclusive', 1, 0, 1, 50.000, 0, NULL, NULL, NULL, '2024-05-15 09:09:28', '2024-05-08 08:03:34', '2024-05-15 09:09:28', 1, 1, 0.000, 'test', 'test'),
(16, 'تست', 'test', NULL, NULL, 'test', 16, 'exclusive', 1, 0, 1, 50.000, 0, NULL, NULL, NULL, NULL, '2024-05-15 09:10:28', '2024-05-15 09:33:58', 1, 1, 0.000, 'تست', 'Test'),
(17, 'عباية مطرزة واسعة', 'Wide embroidered abaya', NULL, NULL, 'ABDC1234', 17, 'exclusive', 1, 0, 1, 200.000, 0, NULL, NULL, NULL, NULL, '2024-05-15 09:21:50', '2024-05-15 09:22:20', 1, 1, 0.000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(58, 27, 13, NULL, NULL),
(59, 28, 13, NULL, NULL),
(60, 28, 14, NULL, NULL),
(61, 28, 15, NULL, NULL),
(62, 27, 16, NULL, NULL),
(63, 28, 16, NULL, NULL),
(64, 27, 17, NULL, NULL),
(65, 28, 17, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE `product_color` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_color`
--

INSERT INTO `product_color` (`id`, `product_id`, `color_id`, `created_at`, `updated_at`) VALUES
(62, 3, 1, NULL, NULL),
(63, 3, 2, NULL, NULL),
(82, 13, 1, NULL, NULL),
(83, 13, 2, NULL, NULL),
(85, 14, 1, NULL, NULL),
(86, 14, 2, NULL, NULL),
(87, 15, 14, NULL, NULL),
(88, 16, 5, NULL, NULL),
(89, 16, 6, NULL, NULL),
(90, 16, 7, NULL, NULL),
(91, 16, 8, NULL, NULL),
(92, 16, 9, NULL, NULL),
(93, 16, 10, NULL, NULL),
(94, 16, 11, NULL, NULL),
(95, 16, 12, NULL, NULL),
(96, 17, 9, NULL, NULL),
(97, 17, 10, NULL, NULL),
(98, 17, 12, NULL, NULL),
(99, 16, 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_favourites`
--

CREATE TABLE `product_favourites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_galleries`
--

CREATE TABLE `product_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_galleries`
--

INSERT INTO `product_galleries` (`id`, `image`, `status`, `product_id`, `color_id`, `created_at`, `updated_at`) VALUES
(10, '/uploads/productGallery/1711014683_9630.webp', 1, 3, 1, '2024-03-21 10:51:23', '2024-03-21 10:51:23'),
(11, '/uploads/productGallery/1711014683_2904.webp', 1, 3, 1, '2024-03-21 10:51:23', '2024-03-21 10:51:23'),
(12, '/uploads/productGallery/1711014683_3717.webp', 1, 3, 1, '2024-03-21 10:51:23', '2024-03-21 10:51:23'),
(13, '/uploads/productGallery/1711016372_3845.webp', 1, 3, 1, '2024-03-21 11:19:32', '2024-03-21 11:19:32'),
(16, '/uploads/productGallery/1711017285_5780.jpg', 1, 3, 2, '2024-03-21 11:34:45', '2024-03-21 11:34:45'),
(17, '/uploads/productGallery/1711017285_7772.jpg', 1, 3, 2, '2024-03-21 11:34:45', '2024-03-21 11:34:45'),
(18, '/uploads/productGallery/1711017285_6851.jpg', 1, 3, 2, '2024-03-21 11:34:45', '2024-03-21 11:34:45'),
(19, '/uploads/productGallery/1715095684_1775.jpg', 1, 13, 1, '2024-05-07 15:28:04', '2024-05-07 15:28:04'),
(20, '/uploads/productGallery/1715095684_3976.jpg', 1, 13, 1, '2024-05-07 15:28:04', '2024-05-07 15:28:04'),
(21, '/uploads/productGallery/1715095684_2283.jpg', 1, 13, 1, '2024-05-07 15:28:04', '2024-05-07 15:28:04'),
(22, '/uploads/productGallery/1715095819_8362.jpg', 1, 13, 2, '2024-05-07 15:30:19', '2024-05-07 15:30:19'),
(23, '/uploads/productGallery/1715095819_3231.jpg', 1, 13, 2, '2024-05-07 15:30:19', '2024-05-07 15:30:19'),
(26, '/uploads/productGallery/1715096507_6691.jpg', 1, 14, 1, '2024-05-07 15:41:47', '2024-05-07 15:41:47'),
(27, '/uploads/productGallery/1715096507_6691.jpg', 1, 14, 1, '2024-05-07 15:41:47', '2024-05-07 15:41:47'),
(28, '/uploads/productGallery/1715096507_1290.jpg', 1, 14, 1, '2024-05-07 15:41:47', '2024-05-07 15:41:47'),
(29, '/uploads/productGallery/1715096507_3004.jpg', 1, 14, 1, '2024-05-07 15:41:47', '2024-05-07 15:41:47'),
(30, '/uploads/productGallery/1715096538_4290.jpg', 1, 14, 2, '2024-05-07 15:42:18', '2024-05-07 15:42:18'),
(31, '/uploads/productGallery/1715096538_9126.jpg', 1, 14, 2, '2024-05-07 15:42:18', '2024-05-07 15:42:18');

-- --------------------------------------------------------

--
-- Table structure for table `product_headers`
--

CREATE TABLE `product_headers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_headers`
--

INSERT INTO `product_headers` (`id`, `header`, `status`, `product_id`, `color_id`, `created_at`, `updated_at`) VALUES
(1, '/uploads/productGallery/1711016395_6660.webp', 1, 3, 1, '2024-03-21 10:51:23', '2024-03-21 11:19:55'),
(3, '/uploads/productGallery/1711017347_6855.jpg', 1, 3, 2, '2024-03-21 11:34:45', '2024-03-21 11:35:47'),
(4, '/uploads/productGallery/1715095684_9725.jpg', 1, 13, 1, '2024-05-07 15:28:04', '2024-05-07 15:28:04'),
(5, '/uploads/productGallery/1715095837_6580.jpg', 1, 13, 2, '2024-05-07 15:30:19', '2024-05-07 15:30:37'),
(6, '/uploads/productGallery/1715096507_2546.jpg', 1, 14, 1, '2024-05-07 15:41:47', '2024-05-07 15:41:47'),
(7, '/uploads/productGallery/1715096538_9743.jpg', 1, 14, 2, '2024-05-07 15:42:18', '2024-05-07 15:42:18');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `main` int(11) NOT NULL DEFAULT 1,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `status`, `main`, `color_id`, `product_id`, `created_at`, `updated_at`) VALUES
(3, '/uploads/products/1708855494_3939.jpg', 1, 0, NULL, 3, '2024-02-25 10:04:54', '2024-03-17 09:46:03'),
(11, '/uploads/products/1710665100_8080.png', 1, 1, NULL, 3, '2024-03-17 09:45:00', '2024-03-17 09:46:03'),
(12, '/uploads/products/1710665100_7402.png', 1, 0, NULL, 3, '2024-03-17 09:45:00', '2024-03-17 09:46:03'),
(13, '/uploads/products/1710665100_5951.png', 1, 0, NULL, 3, '2024-03-17 09:45:00', '2024-03-17 09:46:03'),
(20, '/uploads/products/1715095345_8596.png', 1, 1, NULL, 13, '2024-05-07 15:22:25', '2024-05-07 15:22:25'),
(21, '/uploads/products/1715096098_5170.png', 1, 1, NULL, 14, '2024-05-07 15:34:58', '2024-05-07 15:34:58'),
(22, '/uploads/products/1715155414_6171.png', 1, 1, NULL, 15, '2024-05-08 08:03:34', '2024-05-08 08:03:34'),
(23, '/uploads/products/1715764385_5665.jpg', 1, 1, NULL, 16, '2024-05-15 09:13:05', '2024-05-15 09:13:05'),
(24, '/uploads/products/1715764940_2687.jpg', 1, 1, NULL, 17, '2024-05-15 09:22:20', '2024-05-15 09:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rate` enum('1','2','3','4','5') NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `client_id`, `product_id`, `rate`, `comment`, `created_at`, `updated_at`) VALUES
(5, 28, 3, '3', 'nnnnnn', '2024-04-29 12:49:35', '2024-04-29 12:49:35'),
(9, 33, 13, '1', 'cool', '2024-05-14 13:29:43', '2024-05-14 13:29:43'),
(10, 33, 13, '', NULL, '2024-05-14 13:29:55', '2024-05-14 13:29:55'),
(11, 33, 13, '5', NULL, '2024-05-14 13:35:16', '2024-05-14 13:35:16'),
(12, 33, 13, '5', NULL, '2024-05-14 13:35:32', '2024-05-14 13:35:32'),
(13, 33, 13, '1', NULL, '2024-05-14 13:35:39', '2024-05-14 13:35:39'),
(14, 33, 13, '5', NULL, '2024-05-14 13:36:06', '2024-05-14 13:36:06'),
(15, 33, 13, '5', NULL, '2024-05-14 13:36:15', '2024-05-14 13:36:15'),
(16, 33, 13, '5', NULL, '2024-05-14 13:39:32', '2024-05-14 13:39:32'),
(17, 33, 13, '5', NULL, '2024-05-14 13:40:12', '2024-05-14 13:40:12');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`id`, `product_id`, `size_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, NULL, NULL),
(2, 3, 2, NULL, NULL),
(29, 13, 1, NULL, NULL),
(30, 13, 2, NULL, NULL),
(31, 14, 1, NULL, NULL),
(32, 14, 2, NULL, NULL),
(33, 14, 3, NULL, NULL),
(34, 15, 1, NULL, NULL),
(35, 15, 2, NULL, NULL),
(36, 16, 1, NULL, NULL),
(37, 17, 1, NULL, NULL),
(38, 13, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `long` varchar(255) DEFAULT NULL,
  `delivery_cost` decimal(9,3) NOT NULL DEFAULT 0.000,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `country_id`, `title_ar`, `title_en`, `lat`, `long`, `delivery_cost`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'العكر', ' Al Eker', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(3, 1, 'القدم', 'Al Qadam', NULL, NULL, 2.000, 1, NULL, '2024-01-24 16:44:24'),
(4, 1, 'القرية', 'Quraiyah', NULL, NULL, 2.000, 1, NULL, '2024-01-24 16:44:24'),
(5, 1, 'القضيبية', 'Qudaibiya', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(6, 1, 'قلالي', 'Qalali', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(7, 1, 'القلعة', 'Al Qalah', NULL, NULL, 2.000, 1, NULL, '2024-01-24 16:44:24'),
(8, 1, 'كرانة', 'Karranah', NULL, NULL, 2.000, 1, NULL, '2024-01-24 16:44:24'),
(9, 1, 'الحجر', 'Al Hajar', NULL, NULL, 2.000, 1, NULL, '2024-01-24 16:44:24'),
(10, 1, 'كرباباد', 'Karbabad', NULL, NULL, 2.000, 1, NULL, '2024-01-24 16:44:24'),
(11, 1, 'كرزكان', 'Karzakan', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(12, 1, 'الماحوز', 'Mahooz', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(13, 1, 'المالكية', 'Malkiah', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(14, 1, 'مدينة حمد من دوار 1 إلى دوار 10', 'Madinat Hamad From R 1 to R 10', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(15, 1, 'مدينة زايد', 'Zayed Town', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(16, 1, 'مدينة عيسي', 'Isa Town', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(17, 1, 'المحرق', 'Al Muharraq', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(18, 1, 'مقابة', 'Maqabah', NULL, NULL, 2.000, 1, NULL, '2024-01-24 16:44:24'),
(19, 1, 'المقشع', 'Al Maqsha', NULL, NULL, 2.000, 1, NULL, '2024-01-24 16:44:24'),
(20, 1, 'المنامة', 'Manama', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(21, 1, 'النبيه صالح', 'Nabih Saleh', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(22, 1, 'النعيم', 'Alnaim', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(23, 1, 'النويدرات', 'Nuwaidrat', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(24, 1, 'الهملة', 'Al Hamala', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(25, 1, 'البلاد القديم', 'Bilad Al Qadeem', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(26, 1, 'الكورة', 'Kawarah', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(27, 1, 'سلماباد', 'Salmabad', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(28, 1, 'أبو صيبع', 'Abu Saiba', NULL, NULL, 2.000, 1, NULL, '2024-01-24 16:44:24'),
(29, 1, 'أبوقوة', 'Bu Quwah', NULL, NULL, 2.000, 1, NULL, '2024-01-24 16:44:24'),
(30, 1, 'أم الحصم', 'Umm Al Hassam', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(31, 1, 'المصلي', 'Al Musalla', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(32, 1, 'توبلي', 'Tubli', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(33, 1, 'باربار', 'Barbar', NULL, NULL, 2.000, 1, NULL, '2024-01-24 16:44:24'),
(34, 1, 'البديع', 'Budaiya', NULL, NULL, 2.000, 1, NULL, '2024-01-24 16:44:24'),
(35, 1, 'البسيتين', 'Busaiten', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(36, 1, 'بوكوارة', 'Bu Kowarah', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(37, 1, 'البحير', 'Al Bahair', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(38, 1, 'بني جمرة', 'Bani Jamra', NULL, NULL, 2.000, 1, NULL, '2024-01-24 16:44:24'),
(39, 1, 'بوري', 'Buri', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(40, 1, 'جبلة حبشي', 'Jeblat Hebshi', NULL, NULL, 2.000, 1, NULL, '2024-01-24 16:44:24'),
(41, 1, 'جد الحاج', 'Jid Al Haj', NULL, NULL, 2.000, 1, NULL, '2024-01-24 16:44:24'),
(42, 1, 'جد حفص', 'Jidhafs', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(43, 1, 'جد علي', 'Jid Ali', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(44, 1, 'جرداب', 'Jurdab', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(46, 1, 'الجسرة', 'Aljasrah', NULL, NULL, 2.000, 1, NULL, '2024-01-24 16:44:24'),
(47, 1, 'الجفير', 'AlJuffair', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(48, 1, 'الجنبية', 'ُEljanabiya', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(49, 1, 'جنوسان', 'Jannusan', NULL, NULL, 2.000, 1, NULL, '2024-01-24 16:44:24'),
(50, 1, 'جو', 'Jaw', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(51, 1, 'الحد', 'AL Hidd', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(52, 1, 'الحجيات', 'Alhajiyat', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(53, 1, 'حلة العبد الصالح', 'Hillat Abdul Saleh', NULL, NULL, 2.000, 1, NULL, '2024-01-24 16:44:24'),
(54, 1, 'الحورة', 'Al Hoora', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(55, 1, 'الخميس', 'Khamis', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(56, 1, 'دار كليب', 'Dar Kulaib', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(57, 1, 'المنطقة الدبلوماسية', 'Diplomatic Area', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(58, 1, 'الدراز', 'Diraz', NULL, NULL, 2.000, 1, NULL, '2024-01-24 16:44:24'),
(59, 1, 'دمستان', 'Dimstan', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(60, 1, 'الدير', 'Aldair', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(61, 1, 'الديه', 'Daih', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(62, 1, 'رأس رمان', 'Ras Rumman', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(63, 1, 'الرفاع(الشرقي)', 'East Riffa', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(64, 1, 'الرفاع(الغربي)', 'West Riffa', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(65, 1, 'الزلاق', 'Al zallaq', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(66, 1, 'الزنج', 'Zinj', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(67, 1, 'السقيه', 'AL SAGYAH', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(68, 1, 'سار', 'Saar', NULL, NULL, 2.000, 1, NULL, '2024-01-24 16:44:24'),
(69, 1, 'سترة', 'sitra', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(70, 1, 'سماهيج', 'Samahej', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(71, 1, 'السنابس', 'Sanabis', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(72, 1, 'سند', 'Sanad', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(73, 1, 'السهلة(الشمالية والجنوبية)', 'Sehla', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(74, 1, 'ضاحية السيف', 'seef', NULL, NULL, 2.000, 1, NULL, '2024-01-24 16:44:24'),
(75, 1, 'الشاخورة', 'Shakhurah', NULL, NULL, 2.000, 1, NULL, '2024-01-24 16:44:24'),
(76, 1, 'شهركان', 'Sharakan', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(77, 1, 'جامعة البحرين ', 'university of bahrain', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(78, 1, 'الصالحيه', 'Salihiya', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(79, 1, 'صدد', 'Sadad', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(80, 1, 'عالي', 'Aali', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(81, 1, 'العدلية', 'Adliya', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(82, 1, 'عذاري', 'AZARY', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(83, 1, 'عراد', 'Arad', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(84, 1, 'عسكر', 'askr', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(85, 1, 'مدينة حمد من دوار 11 إلى دوار 22', 'Madinat Hamad From R 11 to R 22', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(86, 1, 'اللوزي', 'Al lozy', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(87, 1, 'المرخ', 'Al Markh', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(88, 1, 'مدينة سلمان', 'Salman City', NULL, NULL, 2.000, 1, NULL, '2024-01-24 16:44:24'),
(91, 1, 'القفول', 'Algufool', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(92, 1, 'المعامير', 'Maameer', NULL, NULL, 2.000, 0, NULL, '2024-01-24 16:44:24'),
(93, 1, 'عوالي', 'Awali', '26.227934462972144', '50.58910840410498', 2.000, 0, '2023-04-01 19:16:46', '2024-01-24 16:44:24'),
(94, 2, 'تبوك', 'Tabuk', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(95, 2, 'الرياض', 'Riyadh', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(96, 2, 'الطائف', 'At Taif', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(97, 2, 'مكة المكرمة', 'Makkah Al Mukarramah', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(98, 2, 'حائل', 'Hail', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(99, 2, 'بريدة', 'Buraydah', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(100, 2, 'الهفوف', 'Al Hufuf', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(101, 2, 'الدمام', 'Ad Dammam', '26.227934462972', '50.589108404105', 15.000, 1, NULL, '2023-05-09 08:52:37'),
(102, 2, 'المدينة المنورة', 'Al Madinah Al Munawwarah', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(103, 2, 'ابها', 'Abha', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(104, 2, 'جازان', 'Jazan', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(105, 2, 'جدة', 'Jeddah', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(106, 2, 'المجمعة', 'Al Majmaah', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(107, 2, 'الخبر', 'Al Khubar', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(108, 2, 'حفر الباطن', 'Hafar Al Batin', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(109, 2, 'خميس مشيط', 'Khamis Mushayt', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(110, 2, 'احد رفيده', 'Ahad Rifaydah', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(111, 2, 'القطيف', 'Al Qatif', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(112, 2, 'عنيزة', 'Unayzah', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(113, 2, 'قرية العليا', 'Qaryat Al Ulya', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(114, 2, 'الجبيل', 'Al Jubail', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(115, 2, 'النعيرية', 'An Nuayriyah', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(116, 2, 'الظهران', 'Dhahran', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(117, 2, 'الوجه', 'Al Wajh', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(118, 2, 'بقيق', 'Buqayq', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(119, 2, 'الزلفي', 'Az Zulfi', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(120, 2, 'خيبر', 'Khaybar', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(121, 2, 'الغاط', 'Al Ghat', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(122, 2, 'املج', 'Umluj', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(123, 2, 'رابغ', 'Rabigh', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(124, 2, 'عفيف', 'Afif', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(125, 2, 'ثادق', 'Thadiq', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(126, 2, 'سيهات', 'Sayhat', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(127, 2, 'تاروت', 'Tarut', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(128, 2, 'ينبع', 'Yanbu', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(129, 2, 'شقراء', 'Shaqra', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(130, 2, 'الدوادمي', 'Ad Duwadimi', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(131, 2, 'الدرعية', 'Ad Diriyah', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(132, 2, 'القويعية', 'Quwayiyah', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(133, 2, 'المزاحمية', 'Al Muzahimiyah', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(134, 2, 'بدر', 'Badr', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(135, 2, 'الخرج', 'Al Kharj', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(136, 2, 'الدلم', 'Ad Dilam', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(137, 2, 'الشنان', 'Ash Shinan', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(138, 2, 'الخرمة', 'Al Khurmah', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(139, 2, 'الجموم', 'Al Jumum', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(140, 2, 'المجاردة', 'Al Majardah', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(141, 2, 'السليل', 'As Sulayyil', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(142, 2, 'تثليث', 'Tathilith', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(143, 2, 'بيشة', 'Bishah', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(144, 2, 'الباحة', 'Al Baha', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(145, 2, 'القنفذة', 'Al Qunfidhah', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(146, 2, 'محايل', 'Muhayil', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(147, 2, 'ثول', 'Thuwal', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(148, 2, 'ضبا', 'Duba', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(149, 2, 'تربه', 'Turbah', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(150, 2, 'صفوى', 'Safwa', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(151, 2, 'عنك', 'Inak', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(152, 2, 'طريف', 'Turaif', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(153, 2, 'عرعر', 'Arar', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(154, 2, 'القريات', 'Al Qurayyat', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(155, 2, 'سكاكا', 'Sakaka', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(156, 2, 'رفحاء', 'Rafha', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(157, 2, 'دومة الجندل', 'Dawmat Al Jandal', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(158, 2, 'الرس', 'Ar Rass', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(159, 2, 'المذنب', 'Al Midhnab', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(160, 2, 'الخفجي', 'Al Khafji', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(161, 2, 'رياض الخبراء', 'Riyad Al Khabra', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(162, 2, 'البدائع', 'Al Badai', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(163, 2, 'رأس تنورة', 'Ras Tannurah', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(164, 2, 'البكيرية', 'Al Bukayriyah', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(165, 2, 'الشماسية', 'Ash Shimasiyah', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(166, 2, 'الحريق', 'Al Hariq', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(167, 2, 'حوطة بني تميم', 'Hawtat Bani Tamim', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(168, 2, 'ليلى', 'Layla', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(169, 2, 'بللسمر', 'Billasmar', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(170, 2, 'شرورة', 'Sharurah', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(171, 2, 'نجران', 'Najran', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(172, 2, 'صبيا', 'Sabya', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(173, 2, 'ابو عريش', 'Abu Arish', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(174, 2, 'صامطة', 'Samtah', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(175, 2, 'احد المسارحة', 'Ahad Al Musarihah', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(176, 2, 'مدينة الملك عبدالله الاقتصادية', 'King Abdullah Economic City', NULL, NULL, 25.000, 1, NULL, '2023-05-09 08:52:25'),
(177, 2, 'Riyadh Province', 'Riyadh Province', NULL, NULL, 25.000, 1, '2023-01-03 13:35:51', '2023-05-09 08:52:25'),
(178, 2, 'Al Madinah Province', 'Al Madinah Province', NULL, NULL, 25.000, 1, '2023-01-03 13:37:10', '2023-05-09 08:52:25'),
(179, 2, 'Medina', 'Medina', NULL, NULL, 25.000, 1, '2023-01-03 13:37:10', '2023-05-09 08:52:25'),
(180, 2, 'Makkah Province', 'Makkah Province', NULL, NULL, 25.000, 1, '2023-01-03 13:37:13', '2023-05-09 08:52:25'),
(181, 2, 'Asfan', 'Asfan', NULL, NULL, 25.000, 1, '2023-01-03 13:37:13', '2023-05-09 08:52:25'),
(182, 2, 'Maysaan', 'Maysaan', NULL, NULL, 25.000, 1, '2023-01-03 13:37:48', '2023-05-09 08:52:25'),
(183, 2, 'Quday\'an', 'Quday\'an', NULL, NULL, 25.000, 1, '2023-01-03 13:41:28', '2023-05-09 08:52:25'),
(184, 2, 'Halban', 'Halban', NULL, NULL, 25.000, 1, '2023-01-03 13:41:37', '2023-05-09 08:52:25'),
(185, 2, 'Al Wahwahi', 'Al Wahwahi', NULL, NULL, 25.000, 1, '2023-01-03 13:41:40', '2023-05-09 08:52:25'),
(186, 2, 'Al Khasrah', 'Al Khasrah', NULL, NULL, 25.000, 1, '2023-01-03 13:41:49', '2023-05-09 08:52:25'),
(187, 2, 'منطقة الرياض', 'منطقة الرياض', NULL, NULL, 25.000, 1, '2023-01-03 13:45:50', '2023-05-09 08:52:25'),
(188, 2, 'الحصاة', 'الحصاة', NULL, NULL, 25.000, 1, '2023-01-03 13:45:50', '2023-05-09 08:52:25'),
(189, 2, 'Alquwayiyah', 'Alquwayiyah', NULL, NULL, 25.000, 1, '2023-01-03 13:46:23', '2023-05-09 08:52:25'),
(190, 2, 'Miz\'il', 'Miz\'il', NULL, NULL, 25.000, 1, '2023-01-03 13:49:20', '2023-05-09 08:52:25'),
(191, 2, 'Al Duwadimi', 'Al Duwadimi', NULL, NULL, 25.000, 1, '2023-01-03 13:49:26', '2023-05-09 08:52:25'),
(192, 2, 'Jilah', 'Jilah', NULL, NULL, 25.000, 1, '2023-01-03 13:49:32', '2023-05-09 08:52:25'),
(193, 2, 'Al Quwaiiyah', 'Al Quwaiiyah', NULL, NULL, 25.000, 1, '2023-01-03 13:49:38', '2023-05-09 08:52:25'),
(194, 2, 'Al Qassim Province', 'Al Qassim Province', NULL, NULL, 25.000, 1, '2023-01-03 13:50:34', '2023-05-09 08:52:25'),
(195, 2, 'Dariyah', 'Dariyah', NULL, NULL, 25.000, 1, '2023-01-03 13:50:34', '2023-05-09 08:52:25'),
(196, 2, 'Al Humaij', 'Al Humaij', NULL, NULL, 25.000, 1, '2023-01-03 13:50:36', '2023-05-09 08:52:25'),
(197, 2, 'Yanbu Al Nakhal', 'Yanbu Al Nakhal', NULL, NULL, 25.000, 1, '2023-01-03 13:50:43', '2023-05-09 08:52:25'),
(198, 2, 'Al Figrah', 'Al Figrah', NULL, NULL, 25.000, 1, '2023-01-03 13:50:52', '2023-05-09 08:52:25'),
(199, 2, 'Alyutamah', 'Alyutamah', NULL, NULL, 25.000, 1, '2023-01-03 13:50:54', '2023-05-09 08:52:25'),
(200, 2, 'Mahd Al Thahab', 'Mahd Al Thahab', NULL, NULL, 25.000, 1, '2023-01-03 13:50:56', '2023-05-09 08:52:25'),
(201, 2, 'Ad Dumayriyah', 'Ad Dumayriyah', NULL, NULL, 25.000, 1, '2023-01-03 13:50:58', '2023-05-09 08:52:25'),
(202, 2, 'Al Uyaynah', 'Al Uyaynah', NULL, NULL, 25.000, 1, '2023-01-03 13:51:47', '2023-05-09 08:52:25'),
(203, 2, 'Rughabah', 'Rughabah', NULL, NULL, 25.000, 1, '2023-01-03 13:51:52', '2023-05-09 08:52:25'),
(204, 2, 'Shaqra', 'Shaqra', NULL, NULL, 25.000, 1, '2023-01-03 13:51:54', '2023-05-09 08:52:25'),
(205, 2, 'الفيضة بالسر', 'الفيضة بالسر', NULL, NULL, 25.000, 1, '2023-01-03 13:51:56', '2023-05-09 08:52:25'),
(206, 2, 'Muhayriqah', 'Muhayriqah', NULL, NULL, 25.000, 1, '2023-01-03 13:54:27', '2023-05-09 08:52:25'),
(207, 2, 'الجله الأعلى', 'الجله الأعلى', NULL, NULL, 25.000, 1, '2023-01-03 13:55:03', '2023-05-09 08:52:25'),
(208, 2, 'الثقبة', 'Al-Thuqbah', '26.30587656348251', '50.189212716533525', 1.000, 1, '2023-09-05 11:04:57', '2023-09-05 11:04:57'),
(209, 2, 'الجسر', 'Bridge', '26.185203022364654', '50.318986449166935', 1.000, 1, '2023-09-05 11:06:05', '2023-09-05 11:06:05'),
(210, 2, 'العزيزية', 'Aziziyah', '26.18835199672054', '50.213627919987026', 1.000, 1, '2023-09-05 11:07:08', '2023-09-05 11:07:08'),
(211, 2, 'الاسكان', 'Aliskan', '26.38785247402411', '50.112405096216605', 1.000, 1, '2023-09-05 11:07:55', '2023-09-05 11:07:55'),
(212, 2, 'تست هوم', 'test home', '26.23213416111676', '50.60593121773671', 1.200, 1, '2024-05-16 06:49:14', '2024-05-16 06:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `value` longtext DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'about_ar', '<div>\r\n<div id=\"tw-target-text-container\" class=\"tw-ta-container F0azHf tw-lfl\" tabindex=\"0\">\r\n<h2>مرحبا بيكم في OR لتصميم الازياء</h2>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliqu Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliqu</p>\r\n</div>\r\n<div id=\"tw-target-rmn-container\" class=\"tw-target-rmn tw-ta-container F0azHf tw-nfl\"></div>\r\n</div>\r\n<p>&nbsp;</p>\r\n<div>&nbsp;</div>', 'about', 1, '2022-10-09 11:52:15', '2024-05-15 10:56:47'),
(2, 'about_en', '<h2>WELCOME TO OR COUTURE</h2>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliqu Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliqu</p>', 'about', 1, '2022-10-09 11:52:15', '2024-05-15 10:56:47'),
(3, 'about_image', '/uploads/settings/1715770607_7388.png', 'about', 1, '2022-10-09 11:52:15', '2024-05-15 10:56:47'),
(4, 'return_refund_policy_ar', '<h2>RETURN AND REFUND POLICY</h2>\r\n<h3>ORDERS CANCELLECTION</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Nec sagittis aliquam malesuada bibendum. Lacus sed turpis tincidunt id aliquet risus feugiat in. Aenean sed adipiscing diam donec adipiscing tristique. Proin sed libero enim sed faucibus. Dui sapien eget mi proin sed libero. At quis risus sed vulputate. Elit eget gravida cum sociis natoque penatibus et. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Sit amet luctus venenatis lectus magna fringilla urna. Elit ut aliquam purus sit.</p>\r\n<h3>EXCHANGE</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Nec sagittis aliquam malesuada bibendum. Lacus sed turpis tincidunt id aliquet risus feugiat in. Aenean sed adipiscing diam donec adipiscing tristique. Proin sed libero enim sed faucibus. Dui sapien eget mi proin sed libero. At quis risus sed vulputate. Elit eget gravida cum sociis natoque penatibus et. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Sit amet luctus venenatis lectus magna fringilla urna. Elit ut aliquam purus sit.</p>\r\n<h3>REFUND</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Nec sagittis aliquam malesuada bibendum. Lacus sed turpis tincidunt id aliquet risus feugiat in. Aenean sed adipiscing diam donec adipiscing tristique. Proin sed libero enim sed faucibus. Dui sapien eget mi proin sed libero. At quis risus sed vulputate. Elit eget gravida cum sociis natoque penatibus et. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Sit amet luctus venenatis lectus magna fringilla urna. Elit ut aliquam purus sit.</p>', 'return_refund_policy', 1, '2022-10-09 11:52:15', '2024-04-25 13:01:53'),
(5, 'return_refund_policy_en', '<h2 style=\"text-align: left;\">RETURN AND REFUND POLICY</h2>\r\n<h3 style=\"text-align: left;\">ORDERS CANCELLECTION</h3>\r\n<p style=\"text-align: left;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Nec sagittis aliquam malesuada bibendum. Lacus sed turpis tincidunt id aliquet risus feugiat in. Aenean sed adipiscing diam donec adipiscing tristique. Proin sed libero enim sed faucibus. Dui sapien eget mi proin sed libero. At quis risus sed vulputate. Elit eget gravida cum sociis natoque penatibus et. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Sit amet luctus venenatis lectus magna fringilla urna. Elit ut aliquam purus sit.</p>\r\n<h3 style=\"text-align: left;\">EXCHANGE</h3>\r\n<p style=\"text-align: left;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Nec sagittis aliquam malesuada bibendum. Lacus sed turpis tincidunt id aliquet risus feugiat in. Aenean sed adipiscing diam donec adipiscing tristique. Proin sed libero enim sed faucibus. Dui sapien eget mi proin sed libero. At quis risus sed vulputate. Elit eget gravida cum sociis natoque penatibus et. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Sit amet luctus venenatis lectus magna fringilla urna. Elit ut aliquam purus sit.</p>\r\n<h3 style=\"text-align: left;\">REFUND</h3>\r\n<p style=\"text-align: left;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Nec sagittis aliquam malesuada bibendum. Lacus sed turpis tincidunt id aliquet risus feugiat in. Aenean sed adipiscing diam donec adipiscing tristique. Proin sed libero enim sed faucibus. Dui sapien eget mi proin sed libero. At quis risus sed vulputate. Elit eget gravida cum sociis natoque penatibus et. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Sit amet luctus venenatis lectus magna fringilla urna. Elit ut aliquam purus sit.</p>', 'return_refund_policy', 1, '2022-10-09 11:52:15', '2024-04-25 13:01:53'),
(6, 'return_refund_policy_image', '/uploads/settings/1710077647_9115.png', 'return_refund_policy', 0, '2022-10-09 11:52:15', '2024-03-10 14:34:07'),
(7, 'title_ar', 'OR Couture', 'publicSettings', 1, '2022-10-09 11:52:15', '2024-05-15 10:20:27'),
(8, 'title_en', 'OR Couture', 'publicSettings', 1, '2022-10-09 11:52:15', '2024-05-15 10:20:27'),
(9, 'terms_ar', '<div class=\"policy-section container section-top\">\r\n<h2>TERMS OF SERVICE</h2>\r\n<h3>OVERVIEW</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et.</p>\r\n<h3>SECTION 1 - ONLINE STORE TERMS</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Nec sagittis aliquam malesuada bibendum. Lacus sed turpis tincidunt id aliquet risus feugiat in. Aenean sed adipiscing diam donec adipiscing tristique. Proin sed libero enim sed faucibus. Dui sapien eget mi proin sed libero. At quis risus sed vulputate. Elit eget gravida cum sociis natoque penatibus et. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Sit amet luctus venenatis lectus magna fringilla urna. Elit ut aliquam purus sit.</p>\r\n<h3>SECTION 2 - GENERAL CONDITIONS</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Nec sagittis aliquam malesuada bibendum. Lacus sed turpis tincidunt id aliquet risus feugiat in. Aenean sed adipiscing diam donec adipiscing tristique. Proin sed libero enim sed faucibus. Dui sapien eget mi proin sed libero. At quis risus sed vulputate. Elit eget gravida cum sociis natoque penatibus et. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Sit amet luctus venenatis lectus magna fringilla urna. Elit ut aliquam purus sit.</p>\r\n<h3>SECTION 3 - ACCURACY, COMPLETENESS, AND TIMELINESS OF INFORMATION</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Nec sagittis aliquam malesuada bibendum. Lacus sed turpis tincidunt id aliquet risus feugiat in. Aenean sed adipiscing diam donec adipiscing tristique. Proin sed libero enim sed faucibus. Dui sapien eget mi proin sed libero. At quis risus sed vulputate. Elit eget gravida cum sociis natoque penatibus et. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Sit amet luctus venenatis lectus magna fringilla urna. Elit ut aliquam purus sit.</p>\r\n<h3>SECTION 4 - MODIFICATIONS TO THE SERVICE AND PRICES</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Nec sagittis aliquam malesuada bibendum. Lacus sed turpis tincidunt id aliquet risus feugiat in. Aenean sed adipiscing diam donec adipiscing tristique. Proin sed libero enim sed faucibus. Dui sapien eget mi proin sed libero. At quis risus sed vulputate. Elit eget gravida cum sociis natoque penatibus et. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Sit amet luctus venenatis lectus magna fringilla urna. Elit ut aliquam purus sit.</p>\r\n<h3>SECTION 5 - PRODUCTS OR SERVICES</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Nec sagittis aliquam malesuada bibendum. Lacus sed turpis tincidunt id aliquet risus feugiat in. Aenean sed adipiscing diam donec adipiscing tristique. Proin sed libero enim sed faucibus. Dui sapien eget mi proin sed libero. At quis risus sed vulputate. Elit eget gravida cum sociis natoque penatibus et. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Sit amet luctus venenatis lectus magna fringilla urna. Elit ut aliquam purus sit.</p>\r\n</div>\r\n<footer id=\"footer\" class=\"container mt-5\"></footer>', 'terms', 1, '2022-10-09 11:52:15', '2024-04-25 13:40:10'),
(10, 'terms_en', '<div class=\"policy-section container section-top\">\r\n<h2>TERMS OF SERVICE</h2>\r\n<h3>OVERVIEW</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et.</p>\r\n<h3>SECTION 1 - ONLINE STORE TERMS</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Nec sagittis aliquam malesuada bibendum. Lacus sed turpis tincidunt id aliquet risus feugiat in. Aenean sed adipiscing diam donec adipiscing tristique. Proin sed libero enim sed faucibus. Dui sapien eget mi proin sed libero. At quis risus sed vulputate. Elit eget gravida cum sociis natoque penatibus et. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Sit amet luctus venenatis lectus magna fringilla urna. Elit ut aliquam purus sit.</p>\r\n<h3>SECTION 2 - GENERAL CONDITIONS</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Nec sagittis aliquam malesuada bibendum. Lacus sed turpis tincidunt id aliquet risus feugiat in. Aenean sed adipiscing diam donec adipiscing tristique. Proin sed libero enim sed faucibus. Dui sapien eget mi proin sed libero. At quis risus sed vulputate. Elit eget gravida cum sociis natoque penatibus et. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Sit amet luctus venenatis lectus magna fringilla urna. Elit ut aliquam purus sit.</p>\r\n<h3>SECTION 3 - ACCURACY, COMPLETENESS, AND TIMELINESS OF INFORMATION</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Nec sagittis aliquam malesuada bibendum. Lacus sed turpis tincidunt id aliquet risus feugiat in. Aenean sed adipiscing diam donec adipiscing tristique. Proin sed libero enim sed faucibus. Dui sapien eget mi proin sed libero. At quis risus sed vulputate. Elit eget gravida cum sociis natoque penatibus et. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Sit amet luctus venenatis lectus magna fringilla urna. Elit ut aliquam purus sit.</p>\r\n<h3>SECTION 4 - MODIFICATIONS TO THE SERVICE AND PRICES</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Nec sagittis aliquam malesuada bibendum. Lacus sed turpis tincidunt id aliquet risus feugiat in. Aenean sed adipiscing diam donec adipiscing tristique. Proin sed libero enim sed faucibus. Dui sapien eget mi proin sed libero. At quis risus sed vulputate. Elit eget gravida cum sociis natoque penatibus et. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Sit amet luctus venenatis lectus magna fringilla urna. Elit ut aliquam purus sit.</p>\r\n<h3>SECTION 5 - PRODUCTS OR SERVICES</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Nec sagittis aliquam malesuada bibendum. Lacus sed turpis tincidunt id aliquet risus feugiat in. Aenean sed adipiscing diam donec adipiscing tristique. Proin sed libero enim sed faucibus. Dui sapien eget mi proin sed libero. At quis risus sed vulputate. Elit eget gravida cum sociis natoque penatibus et. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Sit amet luctus venenatis lectus magna fringilla urna. Elit ut aliquam purus sit.</p>\r\n</div>\r\n<footer id=\"footer\" class=\"container mt-5\"></footer>', 'terms', 1, '2022-10-09 11:52:15', '2024-04-25 13:40:10'),
(11, 'terms_image', '/uploads/settings/1710078184_4266.png', 'terms', 0, '2022-10-09 11:52:15', '2024-03-10 14:43:04'),
(12, 'logo', '/uploads/settings/1710767657_6001.png', 'publicSettings', 1, '2022-10-09 11:52:15', '2024-03-18 14:14:17'),
(13, 'email', 'OR-couture@gmail.com', 'publicSettings', 1, '2022-10-09 11:52:15', '2024-05-15 10:20:27'),
(14, 'phone', '96601235745', 'publicSettings', 1, '2022-10-09 11:52:15', '2024-05-15 10:20:27'),
(15, 'whatsapp', '96601235745', 'publicSettings', 1, '2022-10-09 11:52:15', '2024-05-15 10:20:27'),
(16, 'desc', 'Or is Bring You to Update New Fantastic Footwear with Us, Enjoy the Whole Experience.', 'publicSettings', 1, '2022-10-09 11:52:15', '2024-05-15 10:20:27'),
(17, 'keywords', 'Or is Bring You to Update New Fantastic Footwear with Us, Enjoy the Whole Experience.', 'publicSettings', 1, '2022-10-09 11:52:15', '2024-05-15 10:20:27'),
(18, 'author', 'OR Couture', 'publicSettings', 1, '2022-10-09 11:52:15', '2024-05-15 10:20:27'),
(20, 'VAT', '15', 'publicSettings', 1, '2022-10-09 11:52:15', '2024-05-15 10:20:27'),
(24, 'min_order', '1', 'publicSettings', 1, '2022-10-09 11:52:15', '2024-05-15 10:20:27'),
(34, 'main_color', '#000000', 'publicSettings', 1, '2022-10-09 11:52:15', '2024-05-15 10:20:27'),
(37, 'DefaultLang', 'ar', 'publicSettings', 1, '2022-10-09 11:52:15', '2024-05-15 10:20:27'),
(46, 'snapchat_services', NULL, 'advertising', 0, NULL, '2023-04-10 10:05:48'),
(47, 'twitter_services', NULL, 'advertising', 0, NULL, '2023-04-10 10:05:48'),
(48, 'facebbok_services', NULL, 'advertising', 0, NULL, '2023-04-10 10:05:48'),
(49, 'google_services', NULL, 'advertising', 0, NULL, '2023-04-10 10:05:48'),
(50, 'tiktok_services', NULL, 'advertising', 0, NULL, '2023-04-10 10:05:48'),
(51, 'instagram_services', NULL, 'advertising', 0, NULL, '2023-04-10 10:05:48'),
(52, 'shipping_policy_ar', '<h2>SHIPPING POLICY</h2>\r\n<h3>DELIVERY</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Nec sagittis aliquam malesuada bibendum. Lacus sed turpis tincidunt id aliquet risus feugiat in. Aenean sed adipiscing diam donec adipiscing tristique. Proin sed libero enim sed faucibus. Dui sapien eget mi proin sed libero. At quis risus sed vulputate. Elit eget gravida cum sociis natoque penatibus et. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Sit amet luctus venenatis lectus magna fringilla urna. Elit ut aliquam purus sit.</p>\r\n<h3>Refusing or Not Accepting Shipped Orders</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Nec sagittis aliquam malesuada bibendum. Lacus sed turpis tincidunt id aliquet risus feugiat in. Aenean sed adipiscing diam donec adipiscing tristique. Proin sed libero enim sed faucibus. Dui sapien eget mi proin sed libero. At quis risus sed vulputate. Elit eget gravida cum sociis natoque penatibus et. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Sit amet luctus venenatis lectus magna fringilla urna. Elit ut aliquam purus sit.</p>\r\n<h3>CARRIERS</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Nec sagittis aliquam malesuada bibendum. Lacus sed turpis tincidunt id aliquet risus feugiat in. Aenean sed adipiscing diam donec adipiscing tristique. Proin sed libero enim sed faucibus. Dui sapien eget mi proin sed libero. At quis risus sed vulputate. Elit eget gravida cum sociis natoque penatibus et. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Sit amet luctus venenatis lectus magna fringilla urna. Elit ut aliquam purus sit.</p>', 'shipping_policy', 1, '2022-10-09 11:52:15', '2024-04-25 13:37:38'),
(53, 'shipping_policy_en', '<h2>SHIPPING POLICY</h2>\r\n<h3>DELIVERY</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Nec sagittis aliquam malesuada bibendum. Lacus sed turpis tincidunt id aliquet risus feugiat in. Aenean sed adipiscing diam donec adipiscing tristique. Proin sed libero enim sed faucibus. Dui sapien eget mi proin sed libero. At quis risus sed vulputate. Elit eget gravida cum sociis natoque penatibus et. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Sit amet luctus venenatis lectus magna fringilla urna. Elit ut aliquam purus sit.</p>\r\n<h3>Refusing or Not Accepting Shipped Orders</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Nec sagittis aliquam malesuada bibendum. Lacus sed turpis tincidunt id aliquet risus feugiat in. Aenean sed adipiscing diam donec adipiscing tristique. Proin sed libero enim sed faucibus. Dui sapien eget mi proin sed libero. At quis risus sed vulputate. Elit eget gravida cum sociis natoque penatibus et. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Sit amet luctus venenatis lectus magna fringilla urna. Elit ut aliquam purus sit.</p>\r\n<h3>CARRIERS</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Nec sagittis aliquam malesuada bibendum. Lacus sed turpis tincidunt id aliquet risus feugiat in. Aenean sed adipiscing diam donec adipiscing tristique. Proin sed libero enim sed faucibus. Dui sapien eget mi proin sed libero. At quis risus sed vulputate. Elit eget gravida cum sociis natoque penatibus et. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Sit amet luctus venenatis lectus magna fringilla urna. Elit ut aliquam purus sit.</p>', 'shipping_policy', 1, '2022-10-09 11:52:15', '2024-04-25 13:37:38'),
(54, 'shipping_policy_image', '/uploads/settings/1710078408_2013.png', 'shipping_policy', 0, '2022-10-09 11:52:15', '2024-03-10 14:46:48'),
(55, 'logo_dark', '/uploads/settings/1710769010_5556.png', 'publicSettings', 1, '2024-03-18 13:33:08', '2024-03-18 14:36:50'),
(56, 'contactus_image', '/uploads/settings/1713966047_7805.png', 'publicSettings', 1, '2024-04-24 13:36:29', '2024-04-24 14:40:47'),
(57, 'privacy_ar', '<div class=\"policy-section container section-top\">\r\n<h2>PRIVACY POLICY</h2>\r\n<h3>OVERVIEW</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et.</p>\r\n<h3>COLLECTING PERSONAL INFORMATION</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Nec sagittis aliquam malesuada bibendum. Lacus sed turpis tincidunt id aliquet risus feugiat in. Aenean sed adipiscing diam donec adipiscing tristique. Proin sed libero enim sed faucibus. Dui sapien eget mi proin sed libero. At quis risus sed vulputate. Elit eget gravida cum sociis natoque penatibus et. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Sit amet luctus venenatis lectus magna fringilla urna. Elit ut aliquam purus sit.</p>\r\n<h3>SHARING PERSONAL INFORMATION</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Nec sagittis aliquam malesuada bibendum. Lacus sed turpis tincidunt id aliquet risus feugiat in. Aenean sed adipiscing diam donec adipiscing tristique. Proin sed libero enim sed faucibus. Dui sapien eget mi proin sed libero. At quis risus sed vulputate. Elit eget gravida cum sociis natoque penatibus et. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Sit amet luctus venenatis lectus magna fringilla urna. Elit ut aliquam purus sit.</p>\r\n<h3>USING PERSONAL INFORMATION</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Nec sagittis aliquam malesuada bibendum. Lacus sed turpis tincidunt id aliquet risus feugiat in. Aenean sed adipiscing diam donec adipiscing tristique. Proin sed libero enim sed faucibus. Dui sapien eget mi proin sed libero. At quis risus sed vulputate. Elit eget gravida cum sociis natoque penatibus et. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Sit amet luctus venenatis lectus magna fringilla urna. Elit ut aliquam purus sit.</p>\r\n<h3>GDPR</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Nec sagittis aliquam malesuada bibendum. Lacus sed turpis tincidunt id aliquet risus feugiat in. Aenean sed adipiscing diam donec adipiscing tristique. Proin sed libero enim sed faucibus. Dui sapien eget mi proin sed libero. At quis risus sed vulputate. Elit eget gravida cum sociis natoque penatibus et. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Sit amet luctus venenatis lectus magna fringilla urna. Elit ut aliquam purus sit.</p>\r\n<h3>COOKIES</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Nec sagittis aliquam malesuada bibendum. Lacus sed turpis tincidunt id aliquet risus feugiat in. Aenean sed adipiscing diam donec adipiscing tristique. Proin sed libero enim sed faucibus. Dui sapien eget mi proin sed libero. At quis risus sed vulputate. Elit eget gravida cum sociis natoque penatibus et. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Sit amet luctus venenatis lectus magna fringilla urna. Elit ut aliquam purus sit.</p>\r\n</div>\r\n<footer id=\"footer\" class=\"container mt-5\"></footer>', 'privacy', 1, '2024-04-25 12:48:50', '2024-04-25 13:50:01'),
(58, 'privacy_en', '<div class=\"policy-section container section-top\">\r\n<h2>PRIVACY POLICY</h2>\r\n<h3>OVERVIEW</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et.</p>\r\n<h3>COLLECTING PERSONAL INFORMATION</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Nec sagittis aliquam malesuada bibendum. Lacus sed turpis tincidunt id aliquet risus feugiat in. Aenean sed adipiscing diam donec adipiscing tristique. Proin sed libero enim sed faucibus. Dui sapien eget mi proin sed libero. At quis risus sed vulputate. Elit eget gravida cum sociis natoque penatibus et. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Sit amet luctus venenatis lectus magna fringilla urna. Elit ut aliquam purus sit.</p>\r\n<h3>SHARING PERSONAL INFORMATION</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Nec sagittis aliquam malesuada bibendum. Lacus sed turpis tincidunt id aliquet risus feugiat in. Aenean sed adipiscing diam donec adipiscing tristique. Proin sed libero enim sed faucibus. Dui sapien eget mi proin sed libero. At quis risus sed vulputate. Elit eget gravida cum sociis natoque penatibus et. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Sit amet luctus venenatis lectus magna fringilla urna. Elit ut aliquam purus sit.</p>\r\n<h3>USING PERSONAL INFORMATION</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Nec sagittis aliquam malesuada bibendum. Lacus sed turpis tincidunt id aliquet risus feugiat in. Aenean sed adipiscing diam donec adipiscing tristique. Proin sed libero enim sed faucibus. Dui sapien eget mi proin sed libero. At quis risus sed vulputate. Elit eget gravida cum sociis natoque penatibus et. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Sit amet luctus venenatis lectus magna fringilla urna. Elit ut aliquam purus sit.</p>\r\n<h3>GDPR</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Nec sagittis aliquam malesuada bibendum. Lacus sed turpis tincidunt id aliquet risus feugiat in. Aenean sed adipiscing diam donec adipiscing tristique. Proin sed libero enim sed faucibus. Dui sapien eget mi proin sed libero. At quis risus sed vulputate. Elit eget gravida cum sociis natoque penatibus et. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Sit amet luctus venenatis lectus magna fringilla urna. Elit ut aliquam purus sit.</p>\r\n<h3>COOKIES</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae et leo duis ut. Erat imperdiet sed euismod nisi porta. Turpis egestas pretium aenean pharetra magna ac placerat. Odio ut enim blandit volutpat maecenas volutpat blandit. Feugiat in fermentum posuere urna nec. Lorem sed risus ultricies tristique. Sed id semper risus in hendrerit gravida rutrum quisque. Sit amet nulla facilisi morbi. Risus nullam eget felis eget nunc lobortis mattis aliquam faucibus. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Mattis enim ut tellus elementum sagittis vitae et. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Nec sagittis aliquam malesuada bibendum. Lacus sed turpis tincidunt id aliquet risus feugiat in. Aenean sed adipiscing diam donec adipiscing tristique. Proin sed libero enim sed faucibus. Dui sapien eget mi proin sed libero. At quis risus sed vulputate. Elit eget gravida cum sociis natoque penatibus et. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Sit amet luctus venenatis lectus magna fringilla urna. Elit ut aliquam purus sit.</p>\r\n</div>\r\n<footer id=\"footer\" class=\"container mt-5\"></footer>', 'privacy', 1, '2024-04-25 12:48:50', '2024-04-25 13:50:01'),
(59, 'vacancy_image', '/uploads/settings/1714055105_4639.png', 'publicSettings', 1, '2024-04-25 14:22:30', '2024-04-25 15:25:05'),
(60, 'about_side_image', '/uploads/settings/1714205049_7883.png', 'about', 1, '2024-04-27 08:02:03', '2024-04-27 08:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `shetabit_visits`
--

CREATE TABLE `shetabit_visits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `method` varchar(255) DEFAULT NULL,
  `request` mediumtext DEFAULT NULL,
  `url` mediumtext DEFAULT NULL,
  `referer` mediumtext DEFAULT NULL,
  `languages` text DEFAULT NULL,
  `useragent` text DEFAULT NULL,
  `headers` text DEFAULT NULL,
  `device` text DEFAULT NULL,
  `platform` text DEFAULT NULL,
  `browser` text DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `visitable_type` varchar(255) DEFAULT NULL,
  `visitable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `visitor_type` varchar(255) DEFAULT NULL,
  `visitor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `title_ar`, `title_en`, `status`, `created_at`, `updated_at`) VALUES
(1, 'S', 'S', 1, '2024-02-25 09:52:30', '2024-02-25 09:52:30'),
(2, 'M', 'M', 1, '2024-02-25 09:52:35', '2024-02-25 09:52:35'),
(3, 'L', 'L', 1, '2024-02-25 09:52:42', '2024-02-25 09:52:42'),
(7, 'كبير جدا', 'XL', 1, '2024-05-15 09:30:54', '2024-05-15 09:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `screen` varchar(255) NOT NULL DEFAULT 'lg',
  `image` varchar(255) DEFAULT NULL,
  `vedio` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'image',
  `title_ar` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `desc_ar` text DEFAULT NULL,
  `desc_en` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `screen`, `image`, `vedio`, `type`, `title_ar`, `title_en`, `desc_ar`, `desc_en`, `status`, `created_at`, `updated_at`) VALUES
(0, 'lg', '/uploads/Images/1715770307_3583.png', '/uploads/Images/1710677273_9614.mp4', 'image', 'Elevate Your Style with our Exquisite Abayas', 'Elevate Your Style with our Exquisite Abayas', 'Embrace Modest Fashion with Confidence', 'Embrace Modest Fashion with Confidence', 1, '2024-03-17 12:30:18', '2024-05-15 10:51:47'),
(0, 'lg', '/uploads/Images/1715770307_3583.png', '/uploads/Images/1710677273_9614.mp4', 'vedio', 'Elevate Your Style with our Exquisite Abayas', 'Elevate Your Style with our Exquisite Abayas', 'Embrace Modest Fashion with Confidence', 'Embrace Modest Fashion with Confidence', 1, '2024-03-17 13:07:53', '2024-05-15 10:51:47'),
(0, 'lg', '/uploads/Images/1715770307_3583.png', NULL, 'image', 'تست سلايدر', 'Test slider', 'اهلا و مرحبا', 'hallo it\'s me', 1, '2024-05-15 10:43:44', '2024-05-15 10:51:47'),
(0, 'lg', '/uploads/Images/1715770307_3583.png', NULL, 'image', 'تست كاتيجوري', 'test category', '0', '0', 1, '2024-05-15 10:49:07', '2024-05-15 10:51:47'),
(0, 'lg', '/uploads/Images/1715770307_3583.png', NULL, 'image', 'عباية مطرزة واسعة', 'test category', '0', '0', 1, '2024-05-15 10:49:58', '2024-05-15 10:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `social_media_icons`
--

CREATE TABLE `social_media_icons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media_icons`
--

INSERT INTO `social_media_icons` (`id`, `icon`, `link`, `created_at`, `updated_at`) VALUES
(13, 'fa-brands fa-instagram', 'https://www.instagram.com/RibbonBow11/', '2024-04-29 08:30:32', '2024-04-29 08:30:32'),
(14, 'fa-brands fa-twitter', 'www.', '2024-05-15 10:57:59', '2024-05-15 10:57:59');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_number` varchar(255) DEFAULT NULL,
  `value` decimal(9,3) NOT NULL,
  `result` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vacancies`
--

CREATE TABLE `vacancies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `desc_ar` longtext DEFAULT NULL,
  `desc_en` longtext DEFAULT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vacancies`
--

INSERT INTO `vacancies` (`id`, `title_ar`, `title_en`, `desc_ar`, `desc_en`, `from`, `to`, `created_at`, `updated_at`, `status`) VALUES
(1, 'vacancy1', 'vacancy1', NULL, NULL, '2024-04-25', '2024-04-30', '2024-04-25 14:49:27', '2024-04-25 14:49:27', 1),
(2, 'vacancy2', 'vacancy2', NULL, NULL, '2024-04-23', '2024-04-30', '2024-04-30 13:57:13', '2024-04-25 14:57:13', 1),
(3, 'Vacancy3', 'Vacancy3', NULL, NULL, '2024-05-09', '2024-07-19', '2024-05-09 10:31:42', '2024-05-09 10:31:42', 1),
(4, 'Vacancy 4', 'Vacancy 4', NULL, NULL, '2024-05-09', '2024-07-31', '2024-05-09 10:33:22', '2024-05-09 10:33:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `whish_lists`
--

CREATE TABLE `whish_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `size_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` smallint(6) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `whish_lists`
--

INSERT INTO `whish_lists` (`id`, `client_id`, `product_id`, `color_id`, `size_id`, `quantity`, `created_at`, `updated_at`, `category`) VALUES
(1, 18, 3, 1, 1, 1, '2024-03-23 00:44:38', '2024-03-23 00:56:39', NULL),
(15, 158242, 3, NULL, NULL, 1, '2024-03-25 12:20:08', '2024-03-25 12:20:08', '22'),
(17, 602599, 3, NULL, NULL, 1, '2024-04-07 12:36:36', '2024-04-07 12:36:36', '22'),
(30, 230322, 3, NULL, NULL, 1, '2024-04-28 10:01:29', '2024-04-28 10:01:29', '22'),
(66, 28, 3, NULL, NULL, 1, '2024-04-29 11:35:27', '2024-04-29 11:35:27', 'bestSelling');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_client_id_foreign` (`client_id`),
  ADD KEY `addresses_region_id_foreign` (`region_id`),
  ADD KEY `addresses_country_id_foreign` (`country_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branches_country_id_foreign` (`country_id`),
  ADD KEY `branches_region_id_foreign` (`region_id`);

--
-- Indexes for table `branch_images`
--
ALTER TABLE `branch_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_images_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `careers_vacancy_id_foreign` (`vacancy_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_product_id_foreign` (`product_id`),
  ADD KEY `cart_color_id_foreign` (`color_id`),
  ADD KEY `cart_size_id_foreign` (`size_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_products`
--
ALTER TABLE `coupon_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupon_products_product_id_foreign` (`product_id`),
  ADD KEY `coupon_products_coupon_id_foreign` (`coupon_id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivries`
--
ALTER TABLE `delivries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device_tokens`
--
ALTER TABLE `device_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `device_tokens_client_id_foreign` (`client_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `f_a_q_s`
--
ALTER TABLE `f_a_q_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `life_styles`
--
ALTER TABLE `life_styles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_offers`
--
ALTER TABLE `mail_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_delivery_id_foreign` (`delivery_id`),
  ADD KEY `orders_client_id_foreign` (`client_id`),
  ADD KEY `orders_address_id_foreign` (`address_id`),
  ADD KEY `orders_payment_id_foreign` (`payment_id`),
  ADD KEY `orders_coupon_id_foreign` (`coupon_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_order_id_foreign` (`order_id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`),
  ADD KEY `order_product_color_id_foreign` (`color_id`),
  ADD KEY `order_product_size_id_foreign` (`size_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_categories_category_id_foreign` (`category_id`),
  ADD KEY `product_categories_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_color_product_id_foreign` (`product_id`),
  ADD KEY `product_color_color_id_foreign` (`color_id`);

--
-- Indexes for table `product_favourites`
--
ALTER TABLE `product_favourites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_favourites_client_id_foreign` (`client_id`),
  ADD KEY `product_favourites_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_galleries_product_id_foreign` (`product_id`),
  ADD KEY `product_galleries_color_id_foreign` (`color_id`);

--
-- Indexes for table `product_headers`
--
ALTER TABLE `product_headers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_headers_product_id_foreign` (`product_id`),
  ADD KEY `product_headers_color_id_foreign` (`color_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_color_id_foreign` (`color_id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_reviews_client_id_foreign` (`client_id`),
  ADD KEY `product_reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_size_product_id_foreign` (`product_id`),
  ADD KEY `product_size_size_id_foreign` (`size_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regions_country_id_foreign` (`country_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shetabit_visits`
--
ALTER TABLE `shetabit_visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shetabit_visits_visitable_type_visitable_id_index` (`visitable_type`,`visitable_id`),
  ADD KEY `shetabit_visits_visitor_type_visitor_id_index` (`visitor_type`,`visitor_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media_icons`
--
ALTER TABLE `social_media_icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_client_id_foreign` (`client_id`),
  ADD KEY `transactions_order_id_foreign` (`order_id`);

--
-- Indexes for table `vacancies`
--
ALTER TABLE `vacancies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whish_lists`
--
ALTER TABLE `whish_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `whish_lists_product_id_foreign` (`product_id`),
  ADD KEY `whish_lists_color_id_foreign` (`color_id`),
  ADD KEY `whish_lists_size_id_foreign` (`size_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `branch_images`
--
ALTER TABLE `branch_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coupon_products`
--
ALTER TABLE `coupon_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivries`
--
ALTER TABLE `delivries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `device_tokens`
--
ALTER TABLE `device_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `f_a_q_s`
--
ALTER TABLE `f_a_q_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `life_styles`
--
ALTER TABLE `life_styles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mail_offers`
--
ALTER TABLE `mail_offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `product_color`
--
ALTER TABLE `product_color`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `product_favourites`
--
ALTER TABLE `product_favourites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `product_headers`
--
ALTER TABLE `product_headers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `shetabit_visits`
--
ALTER TABLE `shetabit_visits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `social_media_icons`
--
ALTER TABLE `social_media_icons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `whish_lists`
--
ALTER TABLE `whish_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `addresses_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `addresses_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `branches_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `branches_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `branch_images`
--
ALTER TABLE `branch_images`
  ADD CONSTRAINT `branch_images_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `careers`
--
ALTER TABLE `careers`
  ADD CONSTRAINT `careers_vacancy_id_foreign` FOREIGN KEY (`vacancy_id`) REFERENCES `vacancies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `coupon_products`
--
ALTER TABLE `coupon_products`
  ADD CONSTRAINT `coupon_products_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `coupon_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `device_tokens`
--
ALTER TABLE `device_tokens`
  ADD CONSTRAINT `device_tokens_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_delivery_id_foreign` FOREIGN KEY (`delivery_id`) REFERENCES `delivries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_color`
--
ALTER TABLE `product_color`
  ADD CONSTRAINT `product_color_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_color_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_favourites`
--
ALTER TABLE `product_favourites`
  ADD CONSTRAINT `product_favourites_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_favourites_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD CONSTRAINT `product_galleries_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_galleries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_headers`
--
ALTER TABLE `product_headers`
  ADD CONSTRAINT `product_headers_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_headers_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_size`
--
ALTER TABLE `product_size`
  ADD CONSTRAINT `product_size_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_size_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `regions_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `whish_lists`
--
ALTER TABLE `whish_lists`
  ADD CONSTRAINT `whish_lists_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `whish_lists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `whish_lists_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
