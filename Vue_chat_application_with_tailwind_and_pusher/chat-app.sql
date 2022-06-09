-- -------------------------------------------------------------
-- TablePlus 4.6.4(414)
--
-- https://tableplus.com/
--
-- Database: chat-app
-- Generation Time: 2022-05-02 15:36:36.7170
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


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

CREATE TABLE `messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` bigint unsigned NOT NULL,
  `receiver_id` bigint unsigned NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `messages_sender_id_foreign` (`sender_id`),
  KEY `messages_receiver_id_foreign` (`receiver_id`),
  CONSTRAINT `messages_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`),
  CONSTRAINT `messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=395 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `text`, `created_at`, `updated_at`) VALUES
(391, 1, 2, 'que pasa', '2022-05-02 18:03:08', '2022-05-02 18:03:08'),
(392, 1, 2, 'sud', '2022-05-02 19:39:01', '2022-05-02 19:39:01'),
(393, 1, 2, 'no sirve esta mierd..', '2022-05-02 20:35:39', '2022-05-02 20:35:39'),
(394, 1, 2, 'jo', '2022-05-02 20:36:26', '2022-05-02 20:36:26');

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_29_171613_create_messages_table', 1);

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'user', 1, 'chat-app', '875ebaac09ddbd4413803b1e263babfd31f9a5bc64f9e6a23cc810b599bbe451', '[\"*\"]', '2022-05-01 03:46:29', '2022-05-01 03:46:29', '2022-05-01 03:46:29'),
(2, 'user', 2, 'chat-app', '3f901030038a86a0bf2bf34ab8db43d5d22cf39c07dfd106f046258132ad2ba1', '[\"*\"]', '2022-05-01 03:46:59', '2022-05-01 03:46:59', '2022-05-01 03:46:59'),
(3, 'user', 1, 'chat-app', 'f64327a68c05a33eb2c45769d85e5b6efad498e805fed9e6b4dd61a9f8d6b33d', '[\"*\"]', '2022-05-02 20:36:26', '2022-05-01 03:47:17', '2022-05-02 20:36:26'),
(4, 'user', 2, 'chat-app', 'be0f3e7766fc244985162419f228cfb843310d31c69ba40b56f43816087f3f88', '[\"*\"]', '2022-05-01 03:59:07', '2022-05-01 03:47:36', '2022-05-01 03:59:07'),
(5, 'user', 3, 'chat-app', 'ff80cb30aacf192e3202f32d61aae0c0fa80baa2cc134311d6cc284ec73dff1c', '[\"*\"]', '2022-05-01 04:18:00', '2022-05-01 03:59:42', '2022-05-01 04:18:00'),
(6, 'user', 2, 'chat-app', 'f9f9bada1bd4931472c682737ced1661053bd74bbdc7dcd2b01640a44796cc71', '[\"*\"]', '2022-05-01 04:22:38', '2022-05-01 04:20:01', '2022-05-01 04:22:38'),
(7, 'user', 3, 'chat-app', '5c1e7bda21f813085447dab595e5009efdeadbf6a8760d11e25ad55c60ba8423', '[\"*\"]', '2022-05-01 07:06:55', '2022-05-01 04:24:19', '2022-05-01 07:06:55'),
(8, 'user', 2, 'chat-app', '8a6c63e7ddea7454b0b79fc60cbb27ee9667aad22c6d075b5609336d910d7335', '[\"*\"]', '2022-05-01 19:03:15', '2022-05-01 17:36:58', '2022-05-01 19:03:15'),
(9, 'user', 3, 'chat-app', 'af03d7daca7501c44210a4e60e7fd1aa6648f99e0f8abbf59fca2b65e477e085', '[\"*\"]', '2022-05-02 03:31:27', '2022-05-01 19:07:00', '2022-05-02 03:31:27'),
(10, 'user', 2, 'chat-app', '4afeb1aa4e6d06b9ab3e77b8196b7aa5bde255ceaef3db4652cc36058ece7a80', '[\"*\"]', '2022-05-02 18:00:34', '2022-05-01 20:05:34', '2022-05-02 18:00:34'),
(11, 'user', 1, 'chat-app', 'c18ac97490f76c4cda948c81d5f8c873ac0c7c2144588b6cd3ddae094758f1d7', '[\"*\"]', '2022-05-02 03:33:54', '2022-05-02 03:31:46', '2022-05-02 03:33:54'),
(12, 'user', 1, 'chat-app', 'c43e17120a7adc11ad45bca9c4d031cf2cf01b6da8d3c0f38a86ec9eb10f59c1', '[\"*\"]', '2022-05-02 03:34:03', '2022-05-02 03:34:03', '2022-05-02 03:34:03'),
(13, 'user', 1, 'chat-app', 'd68c9364d3238608e450ca52d1438e0181e090558b2f0496298481d6bd803004', '[\"*\"]', '2022-05-02 03:34:10', '2022-05-02 03:34:09', '2022-05-02 03:34:10'),
(14, 'user', 3, 'chat-app', '48747b4a2930d47c072e969ef589146ab53b91ba79934d2f67e4f21cf329767c', '[\"*\"]', '2022-05-02 03:40:15', '2022-05-02 03:34:36', '2022-05-02 03:40:15'),
(15, 'user', 3, 'chat-app', 'a37fec1a2e32f295d2b553bd676ab85973cb84faa2ae77792e12a4ff7d97e240', '[\"*\"]', '2022-05-02 18:01:27', '2022-05-02 03:41:09', '2022-05-02 18:01:27'),
(16, 'user', 2, 'chat-app', '71be4993537fed6aa44658212e6faab8fbe3ab2ed4650f3bd77a5792893e3897', '[\"*\"]', '2022-05-02 18:00:54', '2022-05-02 18:00:53', '2022-05-02 18:00:54'),
(17, 'user', 2, 'chat-app', 'c0806e327242fde16c70ade4413035586fa0a4e47ef056d149d20644aeaac6b3', '[\"*\"]', '2022-05-02 18:01:10', '2022-05-02 18:01:09', '2022-05-02 18:01:10'),
(18, 'user', 2, 'chat-app', 'abf2fa07cb74e39df2262bb93930c8948e7a402bc5be09266e1f5739567b3026', '[\"*\"]', '2022-05-02 19:00:15', '2022-05-02 18:01:46', '2022-05-02 19:00:15');

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'candy', 'candy@cat.com', NULL, '$2y$10$QygGkJreZLe5PMvIj6fHZOCGXsD3DArzW6mphiM6jtapaoKtHF.7a', NULL, '2022-05-01 03:46:29', '2022-05-01 03:46:29'),
(2, 'oscar', 'oscar@aiuda.com', NULL, '$2y$10$jQGvcZPL92Qc5XXTUNxK1upTD02pjH2QBSGG.N1A2sN56xGynMI7K', NULL, '2022-05-01 03:46:59', '2022-05-01 03:46:59'),
(3, 'mimi', 'mimi@mimi.com', NULL, '$2y$10$zU1G01WyGO.BBaHIspIwZeEuTN1xnXTWno3.QIQ1HimvsoHF0Ofum', NULL, '2022-05-01 03:59:42', '2022-05-01 03:59:42');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;