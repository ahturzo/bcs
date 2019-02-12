-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 12, 2019 at 03:27 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `practice`
--

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_02_10_203824_create_roles_table', 1),
(3, '2019_02_10_204055_create_questions_table', 1),
(4, '2019_02_11_145818_create_questioncatagories_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `questioncatagories`
--

DROP TABLE IF EXISTS `questioncatagories`;
CREATE TABLE IF NOT EXISTS `questioncatagories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `catagory` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questioncatagories`
--

INSERT INTO `questioncatagories` (`id`, `catagory`, `created_at`, `updated_at`) VALUES
(1, 'বাংলা', NULL, NULL),
(2, 'বিজ্ঞান', NULL, NULL),
(3, 'গণিত', NULL, NULL),
(4, 'বুদ্ধিমত্তা', NULL, NULL),
(5, 'ভুগোল', NULL, NULL),
(6, 'আইন বিষয়ক', NULL, NULL),
(7, 'ইংরেজি', NULL, NULL),
(8, 'বাংলাদেশ বিষয়াবলি', NULL, NULL),
(9, 'আন্তর্জাতিক বিষয়াবলী', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opt_A` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opt_B` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opt_C` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opt_D` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct_opt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catagory_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `questions_user_id_foreign` (`user_id`),
  KEY `questions_catagory_id_foreign` (`catagory_id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `opt_A`, `opt_B`, `opt_C`, `opt_D`, `correct_opt`, `catagory_id`, `user_id`, `created_at`, `updated_at`) VALUES
(39, 'has', 'd', 'c', 'b', 'a', 'd', 1, 1, '2019-02-11 21:25:01', '2019-02-11 21:25:01'),
(37, '???? ?????? ??????? ??????? ?? ???????? ?????? ??? ?? ?????  , ???????? ????????? ?? ?', '?? ?????????', '?? ?????????', '?? ?????????', '? ?????????', 'a', 9, 1, '2019-02-11 21:24:07', '2019-02-11 21:24:07'),
(38, 'turh', 'a', 'b', 'c', 'd', 'a', 1, 1, '2019-02-11 21:25:01', '2019-02-11 21:25:01'),
(36, 'has', 'd', 'c', 'b', 'a', 'd', 9, 1, '2019-02-11 21:24:07', '2019-02-11 21:24:07'),
(35, 'turh', 'a', 'b', 'c', 'd', 'a', 9, 1, '2019-02-11 21:24:07', '2019-02-11 21:24:07');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'user', NULL, NULL),
(2, 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Abid Hasan Turzo', 'tabidhasan003@gmail.com', '$2y$10$plXZrtWnbgPzBtREEZpL.eP19JjEHAF0mz79BUYxr27DzJmEAncN6', 2, NULL, '2019-02-11 09:24:23', '2019-02-11 09:24:23');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
