-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 08, 2022 at 03:32 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_gamestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2022_03_18_095626_create_users_table', 1),
(5, '2022_03_18_131443_user_role_table', 1),
(6, '2022_03_18_132024_create_products_table', 1),
(7, '2022_03_18_133340_create_to_ship_table', 1),
(8, '2022_04_07_082610_to_ship_table', 2),
(9, '2022_04_07_110659_to_ships_table', 3),
(10, '2022_04_07_111239_create_ships_table', 4),
(11, '2022_04_07_111551_create_ships_table', 5),
(12, '2022_04_07_111710_create_ships_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `productName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `console` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productName`, `console`, `price`, `image`, `created_at`, `updated_at`) VALUES
(1, 'GTA7', 'Nintendo Switch', 'RM100', 'https://m.media-amazon.com/images/M/MV5BYWQyNTY1NzAtMGJiYi00ZTcwLWE0ZjktYjY4YTZkMzA1YzZmXkEyXkFqcGdeQXVyNTgyNTA4MjM@._V1_.jpg', '2022-04-06 01:08:24', '2022-04-07 07:16:57'),
(2, 'Zelda', 'Nintendo Switch', 'RM135', 'https://images.nintendolife.com/15a20bc6c7642/legend-of-zelda-breath-of-the-wild-cover.cover_large.jpg', '2022-04-06 01:09:44', '2022-04-06 01:09:44'),
(3, 'Dark Souls III', 'PC', 'RM100', 'https://upload.wikimedia.org/wikipedia/zh/thumb/b/bb/Dark_souls_3_cover_art.jpg/220px-Dark_souls_3_cover_art.jpg', '2022-04-06 08:37:40', '2022-04-07 07:46:32'),
(4, 'It Takes 2', 'PC', 'RM100', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ2mSAvZE120JZwIysUzoy6-Wmc5xBU9zHqLi_yGJSr6dbBJ461jSIXA5dsTNxXF3pjjno&usqp=CAU', '2022-04-07 07:51:10', '2022-04-07 07:51:37');

-- --------------------------------------------------------

--
-- Table structure for table `ships`
--

DROP TABLE IF EXISTS `ships`;
CREATE TABLE IF NOT EXISTS `ships` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `CustomerId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cphone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Caddress` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipped` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ships`
--

INSERT INTO `ships` (`id`, `CustomerId`, `Cname`, `Cphone`, `Caddress`, `productName`, `shipped`, `created_at`, `updated_at`) VALUES
(1, '2', 'Lim', '1234567', 'Lorong banana 34', 'GTA5', 1, NULL, '2022-04-07 06:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('customer','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `contact`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Ong Teng Hong', 'th2000@gmail.com', 'No.34, Lorong Impian 6, Taman Impian', '123456789', NULL, '$2y$10$HkkZD2BnQ8mpM2NJvdEJgezxT70knh0idIhiQMTxfi87JKjJAzH26', NULL, '2022-04-06 00:40:55', '2022-04-06 00:40:55', 'admin'),
(2, 'Lim', 'lim@gmail.com', 'lorong banana 34', '123456789', NULL, '$2y$10$x8LCNMyJvaDdxbSJHSSM4eU71LdBAu5CMvbHov278/opkUU7h87v.', NULL, '2022-04-06 00:41:53', '2022-04-06 00:41:53', 'customer'),
(3, 'coconut', 'coconut123@gmail.com', '12345', '12345678', NULL, '$2y$10$xPzQX.CTpGyI8huNDEGcy.oNXlLjicUOV4rlfk8qFV7sL4qnod7eS', NULL, '2022-04-06 03:18:01', '2022-04-06 03:18:01', 'customer');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
