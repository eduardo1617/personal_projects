-- -------------------------------------------------------------
-- TablePlus 4.6.2(410)
--
-- https://tableplus.com/
--
-- Database: candys_abarrotes
-- Generation Time: 2022-03-27 18:38:41.5900
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
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `id_seller` int unsigned NOT NULL,
  `id_branch` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_seller` (`id_seller`),
  KEY `id_branch` (`id_branch`),
  CONSTRAINT `branch_seller_ibfk_1` FOREIGN KEY (`id_seller`) REFERENCES `sellers` (`id`),
  CONSTRAINT `branch_seller_ibfk_2` FOREIGN KEY (`id_branch`) REFERENCES `branches` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `branches` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `products` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `category_id` int NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `sales` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `seller_id` int unsigned NOT NULL,
  `product_id` int unsigned NOT NULL,
  `branch_id` int unsigned NOT NULL,
  `quantity` int unsigned NOT NULL,
  `price` float NOT NULL,
  `sale_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `seller_id` (`seller_id`),
  KEY `product_id` (`product_id`),
  KEY `branch_id` (`branch_id`),
  CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`),
  CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `sales_ibfk_3` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `sellers` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `dni` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `birthday` date NOT NULL,
  `hiring_date` date NOT NULL,
  `work_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `branch_seller` (`id`, `id_seller`, `id_branch`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 2),
(5, 5, 2),
(6, 6, 2),
(7, 7, 3),
(8, 8, 3),
(9, 9, 3),
(10, 10, 4),
(11, 11, 4),
(12, 12, 4),
(13, 13, 5),
(14, 14, 5),
(15, 15, 5),
(19, 19, 1),
(20, 20, 1),
(21, 16, 6),
(22, 17, 6),
(23, 18, 6),
(24, 21, 5),
(25, 23, 3),
(26, 24, 5),
(28, 25, 2),
(29, 26, 5),
(30, 28, 6);

INSERT INTO `branches` (`id`, `state`, `city`, `address`, `phone`, `status`) VALUES
(1, 'Florida', 'West Palm Beach', '4233 Pierstorff Drive', '(954) 1183626', 1),
(2, 'Missouri', 'Kansas City', '2 Kropf Court', '(816) 9061544', 1),
(3, 'Colorado', 'Aurora', '89 Eagan Way', '(303) 5776949', 1),
(4, 'Minnesota', 'Minneapolis', '13 Beilfuss Lane', '(612) 7066458', 1),
(5, 'Illinois', 'Chicago', '55 Maywood Avenue', '(312) 8623420', 1),
(6, 'Florida', 'Jacksonville', '512 Loeprich Lane', '(904) 7130595', 1),
(12, 'qwuieioir', 'ajsbdkjwheid', 'asbdkjahdkj', 'jkabsdjksk', 0),
(13, 'testbranch', 'testbranch', 'testbranch', 'testbranch', 0);

INSERT INTO `category` (`id`, `category_name`, `status`) VALUES
(1, 'beverages', 1),
(2, 'grains', 1),
(3, 'fruits', 1),
(4, 'snack', 1),
(5, 'dairy products', 1),
(8, 'vegetables', 1),
(9, 'cleaning products', 1),
(10, 'meats', 1),
(11, 'liquor', 1),
(12, 'bakery', 1),
(13, 'pharmacy', 1),
(14, 'pasta', 1),
(15, 'pets', 1),
(17, 'seafood', 1),
(18, 'testcategory', 1),
(19, 'test2', 0);

INSERT INTO `products` (`id`, `product_name`, `category_id`, `status`) VALUES
(1, 'raptor', 1, 1),
(2, 'arroz lib', 2, 1),
(3, 'limon', 3, 1),
(4, 'oreo', 4, 1),
(5, 'coca cola peq', 1, 1),
(6, 'pepsi peq', 1, 1),
(7, 'hi-c', 1, 1),
(8, 'big cola peq', 1, 1),
(9, 'prix cola peq', 1, 1),
(10, 'jugo del valle peq', 1, 1),
(11, 'azucar lib', 2, 1),
(12, 'crema perfecta peq', 5, 1),
(13, 'leche eskimo 1/2 lit', 5, 1),
(14, 'banano', 3, 1),
(15, 'redbull', 1, 0);

INSERT INTO `sales` (`id`, `seller_id`, `product_id`, `branch_id`, `quantity`, `price`, `sale_date`) VALUES
(1, 1, 1, 1, 1, 30, '2022-03-25'),
(2, 2, 2, 1, 1, 16, '2022-03-25'),
(3, 3, 3, 1, 3, 18, '2022-03-25'),
(4, 21, 1, 5, 5, 30, '2022-03-27'),
(5, 25, 8, 4, 30, 11, '2022-03-08'),
(6, 23, 7, 6, 5, 9, '2022-03-17'),
(7, 21, 11, 3, 20, 13, '2022-03-12'),
(8, 21, 13, 2, 4, 16, '2022-02-16'),
(9, 25, 14, 2, 24, 2, '2022-01-12'),
(10, 25, 3, 5, 12, 5, '2022-02-16'),
(11, 25, 5, 2, 4, 16, '2022-02-18'),
(12, 25, 4, 3, 7, 6.5, '2022-03-08'),
(13, 24, 9, 5, 3, 12.5, '2022-02-25'),
(14, 24, 5, 5, 5, 16.5, '2022-03-16'),
(15, 24, 4, 5, 5, 6.5, '2022-03-16'),
(16, 21, 14, 2, 40, 2.5, '2022-03-15'),
(17, 21, 12, 6, 3, 9.5, '2022-03-26'),
(18, 23, 13, 1, 2, 16.5, '2022-03-15'),
(19, 28, 1, 6, 3, 30, '2022-03-09'),
(20, 28, 14, 6, 12, 2.5, '2022-03-03');

INSERT INTO `sellers` (`id`, `first_name`, `last_name`, `dni`, `birthday`, `hiring_date`, `work_id`, `phone`, `status`) VALUES
(1, 'Xena', 'Rostern', '68-7287639', '1998-05-12', '2011-10-10', '406336-2022', '496-206-9986', 1),
(2, 'Farleigh', 'Brearton', '21-7575705', '1995-12-06', '2012-11-14', '79128-2022', '374-296-8357', 1),
(3, 'Joseito', 'Elleray', '48-1968198', '1996-01-11', '2017-04-14', '176631-2022', '814-455-1206', 1),
(4, 'Shannon', 'Arger', '71-2854938', '1997-11-08', '2014-12-09', '645773-2022', '248-767-2975', 1),
(5, 'Cristina', 'Grason', '68-0575974', '1995-08-09', '2012-11-01', '698970-2022', '285-663-5142', 1),
(6, 'Aldrich', 'Leverette', '91-7909162', '1997-09-29', '2020-05-21', '557530-2022', '725-121-1398', 1),
(7, 'Elyse', 'Fellona', '26-7780962', '1997-12-09', '2017-02-27', '690743-2022', '230-491-5284', 1),
(8, 'Mady', 'Hargate', '51-8251662', '1996-05-24', '2016-05-19', '781124-2022', '182-449-3463', 1),
(9, 'Rheta', 'Minshaw', '81-3682112', '1995-05-09', '2019-12-02', '833393-2022', '861-271-1757', 1),
(10, 'Ree', 'Lyman', '90-5825625', '1999-01-17', '2014-09-14', '823590-2022', '946-322-6347', 1),
(11, 'Josi', 'De Zuani', '97-1620250', '1996-02-20', '2014-08-21', '617771-2022', '940-864-9175', 1),
(12, 'Graham', 'Heighton', '47-4758304', '1998-09-19', '2017-08-24', '618088-2022', '549-846-4319', 1),
(13, 'Florie', 'O\' Mulderrig', '90-9244943', '1997-12-24', '2012-01-13', '237125-2022', '659-712-7999', 1),
(14, 'Salem', 'Lethardy', '72-1880260', '1998-04-12', '2017-06-17', '331361-2022', '673-805-7866', 1),
(15, 'Travis', 'Biles', '25-8096403', '1996-12-19', '2018-02-03', '945431-2022', '494-937-2265', 1),
(16, 'Charlotta', 'Feake', '58-0541717', '1998-04-21', '2015-09-11', '733072-2022', '710-513-5307', 1),
(17, 'Demetri', 'Muffett', '56-0461000', '1998-12-18', '2011-12-29', '829067-2022', '943-816-3165', 1),
(18, 'Kanya', 'Antognazzi', '92-9844173', '1997-02-13', '2014-09-20', '946120-2022', '541-886-5924', 1),
(19, 'Henryetta', 'Awde', '58-2484020', '1995-05-02', '2018-08-09', '243399-2022', '600-125-2370', 1),
(20, 'Cam', 'Davydychev', '74-5623718', '1998-12-24', '2010-07-24', '378633-2022', '508-955-4169', 1),
(21, 'Oscar', 'Negruki', '1234', '1997-12-09', '1997-12-09', '162969-2022', '122446', 1),
(23, 'Miriam', 'Vargas', '0011704940000U', '1994-04-17', '2021-01-17', '678948-2022', '87551619', 1),
(24, 'Osita', 'Osuna', '123098', '1986-03-12', '2015-02-11', '905832-2022', '43210987', 1),
(25, 'Candy ', 'Canduchilla', '12345', '2000-05-16', '2019-11-11', '492316-2022', '3456789', 1),
(26, 'Juam', 'Lagarton', '3450987', '2002-05-22', '2022-01-05', '744083-2022', '234567', 1),
(27, 'jose', 'maria', '1234', '2000-02-02', '2020-02-02', '243466-2022', '1234567890', 1),
(28, 'Eminem', 'Rapgod', '12345-09876', '1997-03-06', '2022-03-08', '985083-2022', '234-567890', 1);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;