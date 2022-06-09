-- -------------------------------------------------------------
-- TablePlus 4.6.4(414)
--
-- https://tableplus.com/
--
-- Database: axis_db
-- Generation Time: 2022-04-11 14:56:55.4620
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `collections` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `collections_author_id_foreign` (`author_id`),
  CONSTRAINT `collections_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `likes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `likeable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `likeable_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `likes_user_id_foreign` (`user_id`),
  KEY `likes_likeable_type_likeable_id_index` (`likeable_type`,`likeable_id`),
  CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `nfts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `author_id` bigint unsigned NOT NULL,
  `owner_id` bigint unsigned NOT NULL,
  `collection_id` bigint unsigned NOT NULL,
  `img_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint unsigned NOT NULL,
  `royalty` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nfts_author_id_foreign` (`author_id`),
  KEY `nfts_owner_id_foreign` (`owner_id`),
  KEY `nfts_collection_id_foreign` (`collection_id`),
  CONSTRAINT `nfts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  CONSTRAINT `nfts_collection_id_foreign` FOREIGN KEY (`collection_id`) REFERENCES `collections` (`id`),
  CONSTRAINT `nfts_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `collections` (`id`, `name`, `description`, `author_id`, `created_at`, `updated_at`) VALUES
(1, 'Genshin Impact', 'A Genshin Impact Collection', 1, '2022-04-07 13:30:15', '2022-04-07 13:30:15'),
(2, 'Epic Seven', 'a epic seven collection', 1, '2022-04-08 01:04:38', '2022-04-08 01:14:57'),
(3, 'Bleach', 'a bleach collection', 1, '2022-04-08 02:59:15', '2022-04-08 02:59:34'),
(4, 'Sailor Collection', 'a sailor moon collection', 2, '2022-04-09 15:33:13', '2022-04-09 15:33:13');

INSERT INTO `likes` (`id`, `user_id`, `likeable_type`, `likeable_id`, `created_at`, `updated_at`) VALUES
(27, 1, 'collection', 1, '2022-04-08 02:18:07', '2022-04-08 02:18:07'),
(32, 1, 'nft', 1, '2022-04-08 05:01:31', '2022-04-08 05:01:31'),
(34, 1, 'nft', 2, '2022-04-08 22:17:10', '2022-04-08 22:17:10'),
(35, 2, 'nft', 1, '2022-04-09 15:31:41', '2022-04-09 15:31:41'),
(36, 1, 'nft', 3, '2022-04-09 23:25:31', '2022-04-09 23:25:31'),
(37, 1, 'nft', 4, '2022-04-09 23:30:38', '2022-04-09 23:30:38'),
(38, 1, 'nft', 6, '2022-04-09 23:30:43', '2022-04-09 23:30:43'),
(39, 2, 'nft', 9, '2022-04-11 00:32:26', '2022-04-11 00:32:26'),
(40, 2, 'nft', 11, '2022-04-11 01:51:21', '2022-04-11 01:51:21');

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_01_204905_create_collections_table', 1),
(6, '2022_04_01_205502_create_nfts_table', 1),
(7, '2022_04_06_021040_create_likes_table', 1);

INSERT INTO `nfts` (`id`, `author_id`, `owner_id`, `collection_id`, `img_path`, `name`, `description`, `price`, `royalty`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'images/35xyOhQB0TtXPez6qjxxScAkCYJlFKgyb9ozneTW.jpg', 'Hu Tao', 'la fire waifu', 9, 9, '2022-04-07 13:31:07', '2022-04-08 04:54:56'),
(2, 1, 1, 1, 'images/43Xoa11HGcAqOZu8taOVdrXkuIFg2LT4q703qQnZ.jpg', 'Raiden - Shogun', 'Besto waifu', 15, 10, '2022-04-08 19:55:02', '2022-04-08 21:24:29'),
(3, 1, 1, 1, 'images/PzEWNy1mBqP1g9Ah0lUDxPL7mKTbI1LcOQxr3Drz.jpg', 'Jean', 'anemo element swordman', 8, 5, '2022-04-08 19:56:30', '2022-04-08 19:56:30'),
(4, 1, 1, 1, 'images/b4AsMFX7R9aP6gokAhEEXNtEuD3SS4zBAQcgRRtw.jpg', 'Ningguang', 'heavenly balance', 12, 7, '2022-04-08 19:57:08', '2022-04-08 19:57:08'),
(5, 1, 1, 1, 'images/xJB0mgWtnkQhzm7fm70OMgER9lpmfjMb7dCJ4lse.jpg', 'Ganyu', 'coco cabra', 5, 2, '2022-04-08 20:01:04', '2022-04-08 20:01:04'),
(6, 1, 1, 1, 'images/TeOjPp0PQQCCmybZaOVhLJigjyOSOnMZKRyrzZ9J.jpg', 'Xiang Ling and Traveler', 'at the Wangshu inn', 10, 7, '2022-04-08 20:14:31', '2022-04-08 20:14:31'),
(7, 1, 1, 1, 'images/WBaqkLSMUgBZEIjRHStqGeNvHR7RDp7FLQA7Faey.jpg', 'Keqing', 'electro waifu', 8, 6, '2022-04-08 20:32:57', '2022-04-08 20:32:57'),
(8, 1, 2, 1, 'images/Qu6QzdThF9S5OqSuz0EVUqQepgRNC7utosqQ5Rbu.jpg', 'Hu Tao - Fire', 'Hu Tao - Fire', 9, 7, '2022-04-09 03:53:12', '2022-04-10 00:30:49'),
(9, 2, 2, 4, 'images/PcCCDeFD3MLun92R3nDydqtaXpE9jrgzlFhtYrQY.jpg', 'Serenity & Endimion', 'Serenity & Endimion', 10, 4, '2022-04-09 15:33:55', '2022-04-09 15:33:55'),
(10, 1, 1, 2, 'images/hDJetQOZenKw2cLoe7AKh5nAhQf9HeaaHhLEAde2.png', 'Fairytail - Tenebria', 'Fairytail - Tenebria', 9, 5, '2022-04-10 00:40:44', '2022-04-10 00:40:44'),
(11, 2, 2, 4, 'images/U26aKkO1l0HZtixSbNxjnjEYu96mNb4GYg4DI7cv.jpg', 'Serenity & Endimion', 'Serenity & Endimion during their past lives, before the tragedy.', 90, 6, '2022-04-11 01:51:17', '2022-04-11 01:52:03');

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'oscar', 'oscar@gmail.com', NULL, '$2y$10$3GLc2dSpgfRHAUF/QZjfoujM/FUbLQXiaQnWOfMLFxTj2he/HMgUC', 'avatars/rSi0jwVuZZVJusoje0wxrB5esPmdnvavhVRTpeQy.jpg', NULL, '2022-04-07 13:30:01', '2022-04-07 13:30:01'),
(2, 'Miriam', 'miriamv@gmail.com', NULL, '$2y$10$GqyVS79nIypaVUy3XF58SusCInsfKBNMbLy167xVpZhSyUTIR/g/W', 'avatars/HSSkH5gxzAJ4ICDAmyQilLHmTlsDUUlWs6bgXnoC.jpg', NULL, '2022-04-09 15:31:36', '2022-04-09 15:31:36');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;