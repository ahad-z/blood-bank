-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for blood_bank
CREATE DATABASE IF NOT EXISTS `blood_bank` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `blood_bank`;

-- Dumping structure for table blood_bank.accept_requests
CREATE TABLE IF NOT EXISTS `accept_requests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `request_user_id` int(11) NOT NULL,
  `accept_user_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blood_bank.accept_requests: ~2 rows (approximately)
/*!40000 ALTER TABLE `accept_requests` DISABLE KEYS */;
INSERT INTO `accept_requests` (`id`, `request_user_id`, `accept_user_id`, `request_id`, `created_at`, `updated_at`) VALUES
	(1, 2, 10, 1, '2021-01-21 13:23:38', '2021-01-21 13:23:38'),
	(2, 2, 9, 1, '2021-01-21 13:23:46', '2021-01-21 13:23:46'),
	(3, 2, 8, 1, '2021-01-21 13:23:54', '2021-01-21 13:23:54');
/*!40000 ALTER TABLE `accept_requests` ENABLE KEYS */;

-- Dumping structure for table blood_bank.donations
CREATE TABLE IF NOT EXISTS `donations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `donor_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `donation_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blood_bank.donations: ~0 rows (approximately)
/*!40000 ALTER TABLE `donations` DISABLE KEYS */;
INSERT INTO `donations` (`id`, `donor_id`, `receiver_id`, `request_id`, `donation_date`, `created_at`, `updated_at`) VALUES
	(1, 10, 2, 1, '2020-01-22 01:04:10', '2021-01-21 20:24:42', '2021-01-21 20:24:42');
/*!40000 ALTER TABLE `donations` ENABLE KEYS */;

-- Dumping structure for table blood_bank.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blood_bank.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table blood_bank.feedback
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `donation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blood_bank.feedback: ~2 rows (approximately)
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` (`id`, `donation_id`, `user_id`, `feedback`, `type`, `created_at`, `updated_at`) VALUES
	(1, 1, 10, 'Very kindful persion', 'donor', '2021-01-21 20:30:07', '2021-01-21 20:30:07'),
	(2, 1, 2, 'Very Weired Persion I had I ever seen', 'receiver', '2021-01-21 20:31:56', '2021-01-21 20:31:56');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;

-- Dumping structure for table blood_bank.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blood_bank.jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;

-- Dumping structure for table blood_bank.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blood_bank.migrations: ~9 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2021_01_20_132732_create_user_details_table', 1),
	(7, '2021_01_20_175804_create_request_bloods_table', 2),
	(8, '2021_01_20_192312_create_jobs_table', 3),
	(9, '2021_01_21_053240_create_accept_requests_table', 4),
	(10, '2021_01_21_125610_create_dontations_table', 5),
	(11, '2021_01_21_134701_create_feedback_table', 6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table blood_bank.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blood_bank.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table blood_bank.request_bloods
CREATE TABLE IF NOT EXISTS `request_bloods` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `request_user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_user_id` int(100) NOT NULL DEFAULT 0,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternate_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_datetime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blood_bank.request_bloods: ~1 rows (approximately)
/*!40000 ALTER TABLE `request_bloods` DISABLE KEYS */;
INSERT INTO `request_bloods` (`id`, `request_user_name`, `request_user_id`, `blood_group`, `location`, `alternate_mobile`, `relation`, `request_datetime`, `created_at`, `updated_at`) VALUES
	(1, 'Ahad', 2, 'A-', 'mugdha', '01981732112', 'wife', '02-01-21 01:30 pm', '2021-01-21 13:21:24', '2021-01-21 13:21:24'),
	(5, 'AhadPathan', 2, 'A-', 'mugdha', '0184539521', 'sister', '2021-02-22 01:04:10', '2021-01-21 22:19:15', '2021-01-21 22:19:15');
/*!40000 ALTER TABLE `request_bloods` ENABLE KEYS */;

-- Dumping structure for table blood_bank.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blood_bank.users: ~11 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `type`, `created_at`, `updated_at`) VALUES
	(1, 'Ahad', 'ahadcseuits@gmail.com', NULL, '$2y$10$gLwAhJOfcEzkhprR.N0ek.HSChIIOSVMQxBIUjaoJc.fyBtg6Cbiy', NULL, 'admin', '2021-01-20 14:00:11', '2021-01-20 14:00:11'),
	(2, 'AhadPathan', 'ahad@gmail.com', NULL, '$2y$10$gLwAhJOfcEzkhprR.N0ek.HSChIIOSVMQxBIUjaoJc.fyBtg6Cbiy', NULL, 'user', '2021-01-20 14:48:45', '2021-01-20 14:48:45'),
	(3, 'Ahad', 'ahad1@gmail.com', NULL, '$2y$10$8yZlNNLrDOP.y12slk2Yj.m1tS7NOHaaVNHxvT0IU95Fo2twPCIji', NULL, 'user', '2021-01-20 17:36:22', '2021-01-20 17:36:22'),
	(4, 'Ahad2', 'ahad2@gmail.com', NULL, '$2y$10$N8EwGTnkIH7cJ1SKZtRcVegEWemfo7YLEblvlvdwja.bSJsoFmhBy', NULL, 'user', '2021-01-20 17:36:58', '2021-01-20 17:36:58'),
	(5, 'Ahad3', 'ahad3@gmail.com', NULL, '$2y$10$/7H89TQLfDJOe.VlyxVjPeasSmOuE7lsSTvrbGHavoHKmMKRVsho6', NULL, 'user', '2021-01-20 17:37:20', '2021-01-20 17:37:20'),
	(6, 'Ahad4', 'ahad4@gmail.com', NULL, '$2y$10$R13uMtl2P/KifrocMubfROaukORHwd6OpKAJtsMcXDcFbk/Tz0yDm', NULL, 'user', '2021-01-20 17:37:33', '2021-01-20 17:37:33'),
	(7, 'Mahamud1', 'mahmud1@gmail.com', NULL, '$2y$10$Xk6B0R92DFO5ONMbuIhZ5OKkqRsBe4u2B.fJWEGUJgRO3Ue77UzLi', NULL, 'user', '2021-01-20 17:38:35', '2021-01-20 17:38:35'),
	(8, 'Mahamud2', 'mahmud2@gmail.com', NULL, '$2y$10$DhjUS3SdHZUZlzOMkad0wOQRKLc.EvDJmYSZluIzXlsJu6JSGUvOC', NULL, 'user', '2021-01-20 17:38:47', '2021-01-20 17:38:47'),
	(9, 'Mahamud3', 'mahmud3@gmail.com', NULL, '$2y$10$VSU8s3AYWQMKmGV83qxbt.sdGv1IDip4Ua2jxEhxINR/iuBlNRThy', NULL, 'user', '2021-01-20 17:38:57', '2021-01-20 17:38:57'),
	(10, 'Mahamud4', 'mahmud4@gmail.com', NULL, '$2y$10$08lELltwMxAi9VvqC9Tgxex5KsBgF0.ZR1warEUXoqnsU93y4jaVm', NULL, 'user', '2021-01-20 17:39:07', '2021-01-20 17:39:07'),
	(11, 'OMI2', 'Omi2@gmail.com', NULL, '$2y$10$RmfHVHFn/XBf4SILPR1j0OF6XvKK8tgP79E75u48S4cNxBGmVTbdK', NULL, 'user', '2021-01-20 17:40:19', '2021-01-20 17:40:19'),
	(12, 'OMI3', 'Omi3@gmail.com', NULL, '$2y$10$PQ71cbYoE8CNAFjM0JrRKOMJMqtP8OKMW9/WjYnbZG8bEGrjTbTYm', NULL, 'user', '2021-01-20 17:40:27', '2021-01-20 17:40:27'),
	(13, 'OMI4', 'Omi4@gmail.com', NULL, '$2y$10$Cobmawd3GsIOcwVZ.X3dAOJWLb4LlKgHCdXBMoZU.xH/nP.EP8gD6', NULL, 'user', '2021-01-20 17:40:34', '2021-01-20 17:40:34');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table blood_bank.user_details
CREATE TABLE IF NOT EXISTS `user_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternate_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `police_station` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_office` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `union` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_donation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blood_bank.user_details: ~13 rows (approximately)
/*!40000 ALTER TABLE `user_details` DISABLE KEYS */;
INSERT INTO `user_details` (`id`, `user_id`, `mobile`, `alternate_mobile`, `blood_group`, `district`, `police_station`, `post_office`, `union`, `religion`, `weight`, `birth_date`, `last_donation_date`, `created_at`, `updated_at`) VALUES
	(1, 1, '01845392010', '01845392010', 'A+', 'lakshmipur', 'lakshmipur', 'lakshmipur', 'lakshmipur', 'Islam', '45kg', '01-02-21', '2021-01-22 01:04:10', '2021-01-20 14:00:11', '2021-01-20 14:00:11'),
	(2, 2, '01845392010', '01845392010', 'A+', 'chandpur', 'chandpur', 'chandpur', 'chandpur', 'Islam', '45kg', '01-02-21', '2021-01-22 01:04:10', '2021-01-20 14:48:45', '2021-01-20 14:48:45'),
	(3, 3, '01845392010', '01845392010', 'B+', 'raipur', 'raipur', 'raipur', 'raipur', 'Islam', '45kg', '01-02-21', '2021-01-22 01:04:10', '2021-01-20 17:36:22', '2021-01-20 17:36:22'),
	(4, 4, '01845392010', '01845392010', 'B+', 'raipur', 'raipur', 'raipur', 'raipur', 'Islam', '45kg', '01-02-21', '2021-01-22 01:04:10', '2021-01-20 17:36:58', '2021-01-20 17:36:58'),
	(5, 5, '01845392010', '01845392010', 'B+', 'lakshmipur', 'lakshmipur', 'lakshmipur', 'lakshmipur', 'Islam', '45kg', '01-02-21', '2021-01-22 01:04:10', '2021-01-20 17:37:20', '2021-01-20 17:37:20'),
	(6, 6, '01845392010', '01845392010', 'A+', 'mirpur', 'mirpur', 'mirpur', 'mirpur', 'Islam', '45kg', '01-02-21', '2021-01-22 01:04:10', '2021-01-20 17:37:33', '2021-01-20 17:37:33'),
	(7, 7, '01845392011', '01845392010', 'A-', 'mirpur', 'mirpur', 'mirpur', 'mirpur', 'Islam', '45kg', '01-02-21', '2021-01-22 01:04:10', '2021-01-20 17:38:35', '2021-01-20 17:38:35'),
	(8, 8, '01845392011', '01845392010', 'A-', 'mugdha', 'mugdha', 'mugdha', 'mugdha', 'Islam', '45kg', '01-02-21', '2020-11-22 01:04:10', '2021-01-20 17:38:47', '2021-01-20 17:38:47'),
	(9, 9, '01845392011', '01845392010', 'A-', 'mugdha', 'mugdha', 'mugdha', 'mugdha', 'Islam', '45kg', '01-02-21', '2020-01-22 01:04:10', '2021-01-20 17:38:57', '2021-01-20 17:38:57'),
	(10, 10, '01845392011', '01845392010', 'A-', 'mugdha', 'mugdha', 'mugdha', 'mugdha', 'Islam', '45kg', '01-02-21', '2020-01-22 01:04:10', '2021-01-20 17:39:07', '2021-01-21 19:09:35'),
	(11, 11, '01845392011', '01845392010', 'AB-', 'gulshan', 'gulshan', 'gulshan', 'gulshan', 'Islam', '45kg', '01-02-21', '2021-01-22 01:04:10', '2021-01-20 17:40:19', '2021-01-20 17:40:19'),
	(12, 12, '01845392011', '01845392010', 'AB-', 'gulshan', 'gulshan', 'gulshan', 'gulshan', 'Islam', '45kg', '01-02-21', '2021-01-22 01:04:10', '2021-01-20 17:40:27', '2021-01-20 17:40:27'),
	(13, 13, '01845392011', '01845392010', 'AB-', 'gulshan', 'gulshan', 'gulshan', 'gulshan', 'Islam', '45kg', '01-02-21', '2021-01-22 01:04:10', '2021-01-20 17:40:34', '2021-01-20 17:40:34');
/*!40000 ALTER TABLE `user_details` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
