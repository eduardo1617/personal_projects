-- -------------------------------------------------------------
-- TablePlus 4.6.2(410)
--
-- https://tableplus.com/
--
-- Database: candy_bd
-- Generation Time: 2022-03-31 01:35:50.1400
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `branch_seller` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` bigint unsigned NOT NULL,
  `seller_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `branch_seller_branch_id_foreign` (`branch_id`),
  KEY `branch_seller_seller_id_foreign` (`seller_id`),
  CONSTRAINT `branch_seller_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  CONSTRAINT `branch_seller_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `branches` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
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

CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint unsigned NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `sales` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `seller_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `branch_id` bigint unsigned NOT NULL,
  `price` bigint unsigned NOT NULL,
  `quantity` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sales_seller_id_foreign` (`seller_id`),
  KEY `sales_product_id_foreign` (`product_id`),
  KEY `sales_branch_id_foreign` (`branch_id`),
  CONSTRAINT `sales_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  CONSTRAINT `sales_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `sales_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `sellers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hired_at` timestamp NOT NULL,
  `carnet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sellers_dni_unique` (`dni`),
  UNIQUE KEY `sellers_carnet_unique` (`carnet`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `branch_seller` (`id`, `branch_id`, `seller_id`, `created_at`, `updated_at`) VALUES
(2, 2, 11, '2022-03-30 20:44:24', '2022-03-30 20:44:24'),
(3, 4, 12, '2022-03-30 22:10:45', '2022-03-30 22:10:45'),
(4, 1, 1, '2022-03-31 01:38:34', '2022-03-31 01:38:34');

INSERT INTO `branches` (`id`, `name`, `city`, `state`, `address`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Lomitas Lindas', 'managua', 'managua', 'calle lomalinda', '65439876', 'active', '2022-03-30 16:30:58', '2022-03-30 16:57:25'),
(2, 'Rotondita', 'managua', 'managua', 'en la rotonda', '12244621', 'active', '2022-03-30 17:11:03', '2022-03-30 20:50:04'),
(3, 'Antena', 'managua', 'managua', 'de la antena 2c arriba', '54312366', 'inactive', '2022-03-30 17:12:36', '2022-03-30 17:22:10'),
(4, 'las peñitas', 'rivas', 'rivas', 'por haya', '(303) 9761871', 'active', '2022-03-30 20:49:32', '2022-03-30 20:49:32');

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'beverages', 'bev+++++++', 'active', '2022-03-30 21:15:44', '2022-03-30 21:44:29'),
(2, 'snacks', 'asdf', 'active', '2022-03-31 03:36:46', '2022-03-31 03:36:46');

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_03_29_162701_create_sellers_table', 2),
(7, '2022_03_29_164733_create_branches_table', 3),
(8, '2022_03_29_165628_create_branch_seller_table', 4),
(9, '2022_03_29_170835_create_categories_table', 5),
(10, '2022_03_29_171422_create_products_table', 6),
(11, '2022_03_29_171948_create_sales_table', 7);

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Big cola', 7, 'active', '2022-03-30 22:56:27', '2022-03-30 22:56:27'),
(2, 1, 'prix cola peq', 7, 'active', '2022-03-30 22:59:46', '2022-03-30 22:59:46'),
(3, 1, 'raptor', 30, 'active', '2022-03-30 23:00:17', '2022-03-30 23:00:17'),
(4, 2, 'papas zibbas', 9, 'active', '2022-03-31 03:40:29', '2022-03-31 03:40:29'),
(5, 2, 'Ranchitas', 9, 'active', '2022-03-31 03:42:01', '2022-03-31 04:51:05'),
(6, 2, 'sneaker', 25, 'active', '2022-03-31 07:05:14', '2022-03-31 07:05:14');

INSERT INTO `sales` (`id`, `seller_id`, `product_id`, `branch_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 5, 5, '2022-03-31 01:17:13', '2022-03-31 01:17:13'),
(2, 1, 1, 1, 10, 5, '2022-03-31 07:31:01', '2022-03-31 07:31:01'),
(3, 1, 1, 1, 10, 5, '2022-03-31 07:31:01', '2022-03-31 07:31:01'),
(4, 1, 1, 1, 10, 5, '2022-03-31 07:31:01', '2022-03-31 07:31:01'),
(5, 6, 4, 3, 7, 4, '2022-03-31 07:31:31', '2022-03-31 07:31:31'),
(6, 6, 4, 3, 7, 4, '2022-03-31 07:31:31', '2022-03-31 07:31:31'),
(7, 6, 4, 3, 7, 4, '2022-03-31 07:31:31', '2022-03-31 07:31:31'),
(8, 2, 6, 1, 25, 5, '2022-03-31 07:34:29', '2022-03-31 07:34:29');

INSERT INTO `sellers` (`id`, `first_name`, `last_name`, `dni`, `phone`, `hired_at`, `carnet`, `status`, `created_at`, `updated_at`) VALUES
(1, 'firulai', 'firuuu', '1234-0927', '234-567890', '2022-03-30 00:00:00', '2014-0021e', 'active', '2022-03-29 20:11:13', '2022-03-31 01:38:34'),
(2, 'Oscar', 'Molina', '12345-09876', '1234-098765', '2022-03-07 00:00:00', '2014-0021', 'active', '2022-03-29 20:15:54', '2022-03-29 20:15:54'),
(6, 'Miriam', 'Negruki', '12345678912345', '12244678', '2022-03-29 00:00:00', '2014-0021z', 'active', '2022-03-29 21:32:52', '2022-03-30 15:12:44'),
(7, 'Miriam', 'Vargas', '12345678912347', '12244678', '2022-03-29 00:00:00', '2014-0021q', 'active', '2022-03-29 21:36:40', '2022-03-30 15:12:59'),
(8, 'Miriam', 'Miri', '12345678912341', '12244671', '2022-03-30 00:00:00', '2014-0021p', 'active', '2022-03-29 21:44:19', '2022-03-30 14:43:01'),
(9, 'erick', 'narvaez', '001-031094-0020m', '12354678', '2022-03-30 00:00:00', '2014-0021t', 'active', '2022-03-30 15:05:48', '2022-03-30 15:06:04'),
(10, 'javier', 'gonzales', '12345-09854', '12244765', '2022-03-30 00:00:00', '2014-0021x', 'active', '2022-03-30 15:46:47', '2022-03-30 15:46:47'),
(11, 'veronica', 'picta', '1123456789h', '122446', '2022-03-30 00:00:00', '2014-0021m', 'active', '2022-03-30 20:36:46', '2022-03-30 20:36:46'),
(12, 'Omar', 'Tyfer', '12345-09123', '1234-01123', '2022-03-30 00:00:00', '2014-0021j', 'active', '2022-03-30 22:10:45', '2022-03-30 22:10:45');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;