-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 23, 2021 at 03:05 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sk_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
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
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1);

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

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('user@user.com', '$2y$10$GkdCLYrVwOjpRVC6E8aWXudjv7Ngv7r9RluPgJWQ5ZDI.NQuFbEim', '2021-03-19 17:31:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` int UNSIGNED NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `phone_number`, `email_verified_at`, `is_admin`, `image`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'admin@admin.com', 3002323230, NULL, 1, 'checkup_5.png', '$2y$10$oKnV/uBt/aE/5M7wKm17POtcsBdx5U.tpgxErRB38CLk4PgJUGHTi', NULL, '2021-03-19 12:50:33', '2021-03-19 18:02:46'),
(2, 'User', 'User', 'user@user.com', 3002323210, NULL, 0, 'avatar-1.jpg', '$2y$10$xNaG3ZkYyuiwdS7TNGG./e5Q0mWQ8qSYTDecVvTgFuGbKznq47cfu', NULL, '2021-03-19 12:50:33', '2021-03-19 17:32:49'),
(4, '212eww', 'ewwwe', 'grg@erferf', 3443, NULL, 0, NULL, '$2y$10$pYqT5WEj0UZYx3Ammd899enuUuihVPEpUfd5Y2bwdJMoUW4bJpEU.', NULL, '2021-03-19 16:47:49', '2021-03-19 17:10:47'),
(5, 'asad', 'asad', 'asad@eferf', 3000000000, NULL, 0, NULL, '$2y$10$WpYS3sA0wi7uu8sHOoVXE.NC2/xg6mj5wQAH6Vet3bhEbs1XRRl7y', NULL, '2021-03-19 16:48:29', '2021-03-19 17:10:34'),
(7, 'ef', 'ferferf', '34r43@efref.com', 3000000000, NULL, 0, 'checkup_3.png', '$2y$10$OwjGiT5mjxnvcr1wz0YfjO1BA2ak4XJpIS8bATbBg.aH/.7ZUNsZ2', NULL, '2021-03-19 17:38:19', '2021-03-19 17:38:19'),
(8, 'bn b', 'bn bn', 'erfef@ederf', 3000000000, NULL, 0, 'checkup_4.png', '$2y$10$juN0ulOrmJG3Lgk3DOitb.cy0.hhOCBfJ2klJFXoE5o4/HXU6TEKC', NULL, '2021-03-19 17:41:30', '2021-03-19 17:41:30'),
(17, 'ali', 'khan', 'ali@gmail.com', 3445545445, NULL, 0, 'download (1).jpg', '$2y$10$SXuOIVW2ms08QiccHj7vGetiHNQWggrMo0gZaOmvm/AKt1ztrXHHS', NULL, '2021-03-22 17:12:30', '2021-03-22 17:12:55'),
(10, 'khan ali', 'khan', 'khan@gmail.com', 3444444444, NULL, 0, 'download (1).jpg', '$2y$10$gvHSjiuzoFRnnfXee209Z.oQVrJ.MJV3oC3agBPsx6FYOuSxp7NEm', NULL, '2021-03-20 08:49:53', '2021-03-20 09:31:40'),
(12, 'testing', 'testing khan', 'testing@gmail.com', 3003434000, NULL, 0, NULL, '$2y$10$QQO1Ax9E0EXMQAcW1TtmzOtJM.iD5uBPVe2zhjauJfaWNPyFMnoaK', NULL, '2021-03-20 10:18:41', '2021-03-20 10:18:41'),
(18, 'sdf', 'wedwe', 'ali12@gmail.com', 3000000000, NULL, 0, 'download (1).jpg', '$2y$10$oGXLnww.IZyKlN2/ygXza.yqsAyzGD9st7/LmY/kcj29Wjgo0bnKK', NULL, '2021-03-23 03:49:54', '2021-03-23 03:50:07'),
(14, 'testupdate', 'test8', 'test3@gmail.com', 3002323232, NULL, 0, 'checkup_3.png', '$2y$10$0Go0Nr7PQ/iAMNTqU9bNQup2ClCd3hQ6xgr7pPodQxBUkxSU.WQWS', NULL, '2021-03-20 10:25:32', '2021-03-20 10:25:49'),
(19, 'ttftfr', 'rtft', 'abc@abc.com', 3357844987, NULL, 0, 'checkup_5.png', '$2y$10$JobqTClMYOSURZu6ombRGu8FxXJWixt8.gVS01pOMH2bQwusCTEDS', NULL, '2021-03-23 04:48:25', '2021-03-23 04:48:37');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
