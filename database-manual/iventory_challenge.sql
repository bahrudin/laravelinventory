/*
 Navicat Premium Data Transfer

 Source Server         : Laragon
 Source Server Type    : MySQL
 Source Server Version : 80030
 Source Host           : localhost:3306
 Source Schema         : iventory_laravel

 Target Server Type    : MySQL
 Target Server Version : 80030
 File Encoding         : 65001

 Date: 18/10/2023 16:29:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_card` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `customers_customer_card_unique`(`customer_card`) USING BTREE,
  UNIQUE INDEX `customers_phone_unique`(`phone`) USING BTREE,
  UNIQUE INDEX `customers_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES (1, 'ME2023100200053', 'Kiara Simonis MD', '651-263-1192', 'hwill@hodkiewicz.com', '856 Hank Brooks\nLake Leonel, AZ 05181-3610', 0, '2023-10-18 09:22:11', '2023-10-18 09:22:11');
INSERT INTO `customers` VALUES (2, 'ME2023100400012', 'Muhammad Kozey', '1-501-866-7005', 'violet.thiel@hotmail.com', '472 Walsh Cliff Suite 629\nFeilmouth, MS 07797-4739', 1, '2023-10-18 09:22:11', '2023-10-18 09:22:11');
INSERT INTO `customers` VALUES (3, 'ME2023102500063', 'Benton Brown', '(979) 247-6933', 'streich.ally@hotmail.com', '122 Garett Wall\nO\'Keefeville, ME 68151-1694', 1, '2023-10-18 09:22:11', '2023-10-18 09:22:11');
INSERT INTO `customers` VALUES (4, 'ME2023092600076', 'Filomena Abernathy', '(520) 314-9981', 'schuyler84@kassulke.com', '50167 Freda Port\nNew Sylvester, TN 65546', 0, '2023-10-18 09:22:11', '2023-10-18 09:22:11');
INSERT INTO `customers` VALUES (5, 'ME202309290000', 'Ms. Lucile Homenick V', '+1-986-877-1983', 'baron63@bergstrom.com', '11078 Lowe Track Apt. 273\nWilkinsonview, MN 06790', 0, '2023-10-18 09:22:11', '2023-10-18 09:22:11');
INSERT INTO `customers` VALUES (6, 'ME2023101600066', 'Golden Veum', '(310) 317-9168', 'htremblay@gmail.com', '7040 Mante Square\nMurrayview, RI 47771-4553', 1, '2023-10-18 09:22:11', '2023-10-18 09:22:11');
INSERT INTO `customers` VALUES (7, 'ME2023110800089', 'Horacio Hegmann MD', '+1-737-913-2618', 'murphy.guadalupe@gmail.com', '34322 Block Harbor Apt. 048\nUllrichburgh, MN 45398', 1, '2023-10-18 09:22:11', '2023-10-18 09:22:11');
INSERT INTO `customers` VALUES (8, 'ME2023111000026', 'Dovie Stracke', '+19043159405', 'dooley.everett@gmail.com', '23519 Einar Creek Suite 447\nGerholdport, TX 48022-0821', 0, '2023-10-18 09:22:11', '2023-10-18 09:22:11');
INSERT INTO `customers` VALUES (9, 'ME2023111000015', 'Rashad Blick', '608.258.9184', 'bryana.wilderman@hotmail.com', '393 Maynard Islands Apt. 285\nIcieborough, ID 70375-6368', 0, '2023-10-18 09:22:11', '2023-10-18 09:22:11');
INSERT INTO `customers` VALUES (10, 'ME2023102400071', 'Prof. Asha Denesik', '+1 (309) 640-6934', 'angelo64@yahoo.com', '58210 Kelli Garden Apt. 733\nSouth Aimee, HI 64748', 1, '2023-10-18 09:22:11', '2023-10-18 09:22:11');

-- ----------------------------
-- Table structure for employees
-- ----------------------------
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NULL DEFAULT NULL,
  `job_id` bigint UNSIGNED NULL DEFAULT NULL,
  `emp_card` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `birth_place` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `birth_day` date NULL DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone_urgent` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `employees_emp_card_unique`(`emp_card`) USING BTREE,
  UNIQUE INDEX `employees_phone_unique`(`phone`) USING BTREE,
  UNIQUE INDEX `employees_phone_urgent_unique`(`phone_urgent`) USING BTREE,
  INDEX `employees_user_id_foreign`(`user_id`) USING BTREE,
  INDEX `employees_job_id_foreign`(`job_id`) USING BTREE,
  CONSTRAINT `employees_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of employees
-- ----------------------------
INSERT INTO `employees` VALUES (1, 12, 5, '20231111000161', 'Jessica', '', 'Ortiz', 'Trinidad and Tobago', '2017-03-19', 'male', '380-783-3504', '+1-812-682-5741', '2265 Alfonso Inlet\nEast Waldofort, NE 56597-0785', 0, '2023-10-18 09:22:12', '2023-10-18 09:22:12');
INSERT INTO `employees` VALUES (2, 13, 6, '20231104000132', 'Darion', '', 'Kuhic', 'Kyrgyz Republic', '1976-06-16', 'female', '283-989-4376', '+1-714-600-7312', '95809 Mikayla Glen Apt. 606\nSatterfieldville, MO 36231', 0, '2023-10-18 09:22:12', '2023-10-18 09:22:12');
INSERT INTO `employees` VALUES (3, 14, 7, '20230919000233', 'Raphael', '', 'Boyle', 'Madagascar', '1972-05-12', 'female', '(830) 692-1606', '+1 (509) 559-3957', '7400 Rodriguez Drive Suite 351\nNikolaustown, NC 04906', 1, '2023-10-18 09:22:12', '2023-10-18 09:22:12');
INSERT INTO `employees` VALUES (4, 15, 8, '20231018000174', 'Brenna', '', 'Monahan', 'Turkmenistan', '1972-07-04', 'female', '1-870-963-5703', '+1-689-653-7264', '6316 Nicolas Dam\nTrompmouth, NH 60630-9502', 0, '2023-10-18 09:22:12', '2023-10-18 09:22:12');
INSERT INTO `employees` VALUES (5, 16, 9, '20231002000365', 'Theodore', '', 'Hintz', 'Antarctica (the territory South of 60 deg S)', '1997-08-05', 'male', '1-754-792-4842', '1-714-607-8738', '867 Shea Shore Suite 268\nHartmannville, AR 63151-1328', 0, '2023-10-18 09:22:12', '2023-10-18 09:22:12');
INSERT INTO `employees` VALUES (6, 17, 10, '20231116000276', 'Cora', '', 'Wiegand', 'Kazakhstan', '1984-05-17', 'female', '+1-334-250-5804', '+1 (425) 309-6391', '6998 Lavada Hollow\nSchuppetown, KS 86959-9048', 1, '2023-10-18 09:22:12', '2023-10-18 09:22:12');
INSERT INTO `employees` VALUES (7, 18, 11, '2023101800057', 'Kareem', '', 'Wuckert', 'Cameroon', '2006-11-01', 'female', '+1-863-592-1275', '+1-458-994-1173', '34179 Granville Union\nWolffburgh, MS 57556-8564', 1, '2023-10-18 09:22:12', '2023-10-18 09:22:12');
INSERT INTO `employees` VALUES (8, 19, 12, '2023101400098', 'Wilfred', '', 'O\'Connell', 'Kazakhstan', '2003-06-03', 'female', '+14147842316', '+1-769-852-4249', '8583 Jade Freeway Apt. 116\nCormierberg, GA 93402', 0, '2023-10-18 09:22:12', '2023-10-18 09:22:12');
INSERT INTO `employees` VALUES (9, 20, 13, '2023092800049', 'Colton', '', 'McGlynn', 'Kazakhstan', '2013-01-16', 'female', '+15625607651', '(669) 800-2818', '6515 Gulgowski Village Suite 203\nSouth Peter, KS 47546', 1, '2023-10-18 09:22:13', '2023-10-18 09:22:13');
INSERT INTO `employees` VALUES (10, 21, 14, '202311030002110', 'Raphaelle', '', 'Altenwerth', 'American Samoa', '2002-12-28', 'male', '+1-858-818-1022', '361-997-4432', '9369 Kuhlman Estate Apt. 811\nHayesstad, GA 27329', 1, '2023-10-18 09:22:13', '2023-10-18 09:22:13');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptions` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jobs
-- ----------------------------
INSERT INTO `jobs` VALUES (1, 'Fiberglass Laminator and Fabricator', 'Mollitia dolores pariatur doloremque ut exercitationem modi sunt. Omnis minus voluptatem est quo officiis placeat aliquam. Odit eveniet non delectus rem amet. Molestiae voluptatem consequatur consectetur excepturi asperiores omnis.', '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `jobs` VALUES (2, 'Manager of Weapons Specialists', 'Praesentium sunt reprehenderit quod reiciendis placeat necessitatibus in. Accusamus rem ullam pariatur aliquam deserunt recusandae ut. Assumenda ipsum et sit.', '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `jobs` VALUES (3, 'Title Examiner', 'Et quis recusandae voluptate illo perspiciatis omnis. Consequatur quas exercitationem autem odio eos rerum quaerat. Eveniet temporibus voluptatem consectetur commodi eveniet aut nam dolorem. Molestiae sed id quia nobis ut sed.', '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `jobs` VALUES (4, 'Electronics Engineer', 'Quia ullam ipsa deserunt placeat et consectetur modi. Non debitis autem temporibus. Debitis sit et adipisci sunt laborum. Sequi at accusamus assumenda doloremque fugit aliquam ut.', '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `jobs` VALUES (5, 'Pipefitter', 'Perspiciatis consectetur labore id corporis a maiores. Voluptas rerum at consequuntur quidem harum molestiae ipsum ab. Explicabo dolores at veniam adipisci quia quidem assumenda.', '2023-10-18 09:22:12', '2023-10-18 09:22:12');
INSERT INTO `jobs` VALUES (6, 'Forester', 'Aspernatur et quia id dolore ducimus. Architecto corrupti consequatur dolores in sed rerum nobis. Et sed sit repellendus aut quas.', '2023-10-18 09:22:12', '2023-10-18 09:22:12');
INSERT INTO `jobs` VALUES (7, 'Building Inspector', 'Rerum repellendus rem eos aliquid rerum aut. Aut nesciunt omnis velit corrupti quod atque in. Aliquam consequatur vel facere eligendi dignissimos tenetur ex. Vel molestiae consequuntur similique autem ex.', '2023-10-18 09:22:12', '2023-10-18 09:22:12');
INSERT INTO `jobs` VALUES (8, 'City', 'Sit blanditiis necessitatibus iste praesentium consequatur. Aut nihil nam qui delectus. Vitae incidunt beatae enim nesciunt.', '2023-10-18 09:22:12', '2023-10-18 09:22:12');
INSERT INTO `jobs` VALUES (9, 'Audiologist', 'Totam voluptates repellendus est. Tempore incidunt et quis possimus vel. Et consequuntur iure inventore excepturi fugiat dolor reprehenderit. Non magni necessitatibus nam natus est dolorum.', '2023-10-18 09:22:12', '2023-10-18 09:22:12');
INSERT INTO `jobs` VALUES (10, 'Bartender Helper', 'Saepe perspiciatis voluptatum accusantium facilis. Explicabo consequatur laboriosam tempora minus vero. Et deleniti dolor dolorum aut.', '2023-10-18 09:22:12', '2023-10-18 09:22:12');
INSERT INTO `jobs` VALUES (11, 'Tire Builder', 'Itaque qui quibusdam debitis impedit beatae. Id ipsa eius omnis recusandae enim consequatur repellat assumenda. Voluptatibus debitis qui et. Dolore laborum dicta numquam laboriosam. Temporibus optio sit consequatur itaque explicabo ad occaecati in.', '2023-10-18 09:22:12', '2023-10-18 09:22:12');
INSERT INTO `jobs` VALUES (12, 'Tool and Die Maker', 'Assumenda sapiente soluta sunt aut quia minima corrupti. Assumenda soluta dignissimos sed cupiditate corporis nihil reprehenderit. Et et et animi quam incidunt.', '2023-10-18 09:22:12', '2023-10-18 09:22:12');
INSERT INTO `jobs` VALUES (13, 'Environmental Science Teacher', 'Vitae dolores nam aperiam nam est saepe possimus. Ipsa rerum cupiditate recusandae ut nihil aliquid culpa quaerat. Temporibus libero qui sint est eveniet autem.', '2023-10-18 09:22:13', '2023-10-18 09:22:13');
INSERT INTO `jobs` VALUES (14, 'Freight Agent', 'Maxime tempora eius omnis temporibus voluptate quos. Optio possimus cupiditate ab. Hic cupiditate et nihil repudiandae. In enim autem vero quia sed.', '2023-10-18 09:22:13', '2023-10-18 09:22:13');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2023_10_11_171348_create_jobs_table', 1);
INSERT INTO `migrations` VALUES (6, '2023_10_11_171349_create_employees_table', 1);
INSERT INTO `migrations` VALUES (7, '2023_10_12_111927_create_customers_table', 1);
INSERT INTO `migrations` VALUES (8, '2023_10_12_133523_create_product_categories_table', 1);
INSERT INTO `migrations` VALUES (9, '2023_10_12_133531_create_suppliers_table', 1);
INSERT INTO `migrations` VALUES (10, '2023_10_12_133639_create_products_table', 1);
INSERT INTO `migrations` VALUES (11, '2023_10_16_053315_create_orders_table', 1);
INSERT INTO `migrations` VALUES (12, '2023_10_16_075807_create_order_details_table', 1);

-- ----------------------------
-- Table structure for order_details
-- ----------------------------
DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_order` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `product_code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `order_details_product_code_foreign`(`product_code`) USING BTREE,
  INDEX `order_details_invoice_order_foreign`(`invoice_order`) USING BTREE,
  CONSTRAINT `order_details_product_code_foreign` FOREIGN KEY (`product_code`) REFERENCES `products` (`code`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `order_details_invoice_order_foreign` FOREIGN KEY (`invoice_order`) REFERENCES `orders` (`invoice_order`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_details
-- ----------------------------

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_order` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `customer_card` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `emp_card` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `descriptions` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `order_date` timestamp NOT NULL,
  `created_by` bigint UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `orders_customer_card_foreign`(`customer_card`) USING BTREE,
  INDEX `orders_emp_card_foreign`(`emp_card`) USING BTREE,
  UNIQUE INDEX `orders_invoice_order_unique`(`invoice_order`) USING BTREE,
  CONSTRAINT `orders_customer_card_foreign` FOREIGN KEY (`customer_card`) REFERENCES `customers` (`customer_card`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `orders_emp_card_foreign` FOREIGN KEY (`emp_card`) REFERENCES `employees` (`emp_card`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (1, 'INV202311080002', 'ME2023101600066', '20231018000174', 'Itaque omnis voluptas ut maiores. Consequatur sequi est rerum corrupti velit nemo aut. Voluptatem dolores sunt dolorem.', '1977-01-14 00:00:00', NULL, NULL, NULL, NULL, '2023-10-18 09:22:13', '2023-10-18 09:22:13');
INSERT INTO `orders` VALUES (2, 'INV2023092300037', 'ME2023111000015', '20231018000174', 'Cum beatae suscipit quaerat quia ipsam soluta. Quia et ut architecto nihil rerum numquam odit et. Laboriosam magnam eligendi dolorum maiores cumque aliquid provident.', '2022-05-17 00:00:00', NULL, NULL, NULL, NULL, '2023-10-18 09:22:13', '2023-10-18 09:22:13');
INSERT INTO `orders` VALUES (3, 'INV2023092400044', 'ME2023100400012', '20231111000161', 'Et sint id nihil quo non eius. Id sit atque quae ratione. Exercitationem quaerat soluta veniam quisquam consequatur perspiciatis.', '1970-10-18 00:00:00', NULL, NULL, NULL, NULL, '2023-10-18 09:22:13', '2023-10-18 09:22:13');
INSERT INTO `orders` VALUES (4, 'INV2023100600056', 'ME2023100400012', '20231104000132', 'Officia ut ipsa quaerat omnis non. A eaque labore voluptatem debitis.', '1990-11-22 00:00:00', NULL, NULL, NULL, NULL, '2023-10-18 09:22:13', '2023-10-18 09:22:13');
INSERT INTO `orders` VALUES (5, 'INV2023110400028', 'ME2023111000015', '20231116000276', 'Aspernatur amet impedit dolorem itaque iure tenetur blanditiis. Dicta molestiae iusto non qui laborum et. Recusandae voluptatem dolorem dicta. Ad est eos in in atque culpa quo in.', '1976-01-08 00:00:00', NULL, NULL, NULL, NULL, '2023-10-18 09:22:13', '2023-10-18 09:22:13');
INSERT INTO `orders` VALUES (6, 'INV2023102800042', 'ME2023110800089', '202311030002110', 'Deleniti est aspernatur voluptates temporibus commodi voluptas sapiente. Ducimus eos rerum harum.', '2002-01-28 00:00:00', NULL, NULL, NULL, NULL, '2023-10-18 09:22:13', '2023-10-18 09:22:13');
INSERT INTO `orders` VALUES (7, 'INV2023091900052', 'ME2023092600076', '20231002000365', 'Assumenda facere vero soluta ipsa omnis molestias. Ratione corporis iusto voluptatibus itaque. Voluptate et est aut ducimus sed. Placeat voluptatibus id iste quibusdam quia enim quis. Non veritatis voluptatem mollitia atque.', '2021-10-18 00:00:00', NULL, NULL, NULL, NULL, '2023-10-18 09:22:13', '2023-10-18 09:22:13');
INSERT INTO `orders` VALUES (8, 'INV2023100400055', 'ME202309290000', '20230919000233', 'Architecto sint expedita ea. Fuga non earum similique quas. Repellendus qui dicta qui veritatis autem. Voluptatibus quisquam cum neque et labore.', '1989-05-07 00:00:00', NULL, NULL, NULL, NULL, '2023-10-18 09:22:13', '2023-10-18 09:22:13');
INSERT INTO `orders` VALUES (9, 'INV2023102300013', 'ME2023100400012', '2023092800049', 'Deserunt aliquid corrupti molestiae est. Modi non est officia corrupti officiis laboriosam rerum. Nisi non velit doloribus pariatur labore quasi.', '1973-05-15 00:00:00', NULL, NULL, NULL, NULL, '2023-10-18 09:22:13', '2023-10-18 09:22:13');
INSERT INTO `orders` VALUES (10, 'INV2023092600018', 'ME2023111000015', '20231111000161', 'Tenetur in laborum inventore voluptatem modi quia ut quae. Architecto illum amet labore nihil praesentium modi. Ipsum voluptate quia facere ad sunt harum dolor. Exercitationem a sed distinctio facilis.', '2003-02-12 00:00:00', NULL, NULL, NULL, NULL, '2023-10-18 09:22:13', '2023-10-18 09:22:13');

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for product_categories
-- ----------------------------
DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT 0,
  `descriptions` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `sort_order` int NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `product_categories_code_unique`(`code`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product_categories
-- ----------------------------
INSERT INTO `product_categories` VALUES (1, 'EGJ511', 'Ms. Bethel Turcotte Sr.', 1, 'Et et commodi sint blanditiis incidunt. Non et suscipit ut doloribus ratione rem. Alias in accusantium dolor fugiat voluptas dolor voluptatem.', 8, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `product_categories` VALUES (2, 'YMW932', 'Rita Greenholt', 1, 'Dolorem earum quo deleniti ut sit inventore aut. Eveniet dolor officia deleniti sunt. Tenetur non sunt illum expedita rerum qui dolore. Suscipit id architecto ipsum et dolorem.', 3, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `product_categories` VALUES (3, 'WMH144', 'Miss Rachael Jerde I', 0, 'Quasi et eos sunt ut. Quis aut qui qui et et dolor.', 8, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `product_categories` VALUES (4, 'D8N308', 'Brennan Oberbrunner', 1, 'Eius autem odio et et voluptate nihil nihil. Rerum commodi unde corrupti. Facilis aut at qui nesciunt deleniti.', 1, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int NULL DEFAULT NULL,
  `price_purchase` decimal(10, 2) NULL DEFAULT NULL,
  `price_sale` decimal(10, 2) NULL DEFAULT NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT 0,
  `descriptions` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `sort_order` int NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `products_code_unique`(`code`) USING BTREE,
  INDEX `products_cat_code_index`(`cat_code`) USING BTREE,
  CONSTRAINT `products_cat_code_foreign` FOREIGN KEY (`cat_code`) REFERENCES `product_categories` (`code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 51 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 'P0019', 'WMH144', 'Randall Satterfield', 4, 399.00, 274.21, 0, 'Fugit quaerat laborum non aut ducimus iste dolor. Ea accusamus ducimus ad adipisci ut qui praesentium voluptas. Qui ea reiciendis illum qui et dignissimos. Et autem vel dolorem debitis neque sed rerum.', 9, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (2, 'P0065', 'D8N308', 'Moshe Schinner', 8805510, 608.67, 728.26, 1, 'Natus voluptatem eligendi voluptatem ut similique. Omnis quo facilis nihil ut. Harum ab eum accusamus nostrum.', 1, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (3, 'P0011', 'EGJ511', 'Russ Douglas', 611, 518.74, 54.10, 1, 'Perspiciatis vel ad doloribus explicabo suscipit quam dolores. Atque vitae commodi est natus est. Eum in dolore culpa. Distinctio distinctio vel et possimus. Voluptatem est repudiandae vel veniam quo consequuntur.', 5, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (4, 'P007', 'D8N308', 'Carmella Kshlerin Jr.', 2502, 784.53, 966.04, 1, 'Sint id animi officiis aut quibusdam vel occaecati iusto. Sit aspernatur veritatis ut iste. Qui ipsum similique reiciendis et repudiandae laborum rem.', 8, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (5, 'P0021', 'WMH144', 'Jesse Schulist', 69657763, 660.71, 112.06, 0, 'Autem atque dolore velit pariatur est odit sit et. Ratione atque dicta et cupiditate molestiae.', 10, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (6, 'P0023', 'EGJ511', 'Prof. Greta Spencer', 9615, 539.67, 851.82, 1, 'Mollitia minima velit nihil aut. Nisi non sunt praesentium laboriosam in rem facere. Sint quis aut sint modi in.', 6, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (7, 'P0083', 'D8N308', 'Melba Dibbert', 890, 495.94, 624.30, 1, 'Fugiat itaque inventore consequatur aut. Tenetur et repudiandae necessitatibus quis beatae placeat non molestiae. Eligendi nemo aspernatur id ipsam in. Recusandae cum molestiae facere.', 7, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (8, 'P0093', 'D8N308', 'Freeman Hagenes', 92458, 180.15, 462.27, 0, 'Quam error corporis rerum. Ipsa atque possimus corrupti et. Eum delectus nihil similique id non laborum sequi.', 3, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (9, 'P0092', 'YMW932', 'Merlin Feest', 972, 693.44, 389.26, 1, 'Incidunt dolorem maiores dicta qui est voluptas. Nam voluptas architecto voluptas ipsa ipsum aliquam cumque. Sint et id sit et. Nobis eligendi omnis hic dolorum dolores voluptas. Quos sit quae consequatur perferendis qui.', 6, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (10, 'P0095', 'WMH144', 'Prof. Horace Kunde DDS', 95, 343.85, 645.24, 1, 'Porro voluptatibus sint qui modi cumque consequatur temporibus. Dolorem quam eum facere suscipit enim est tempora. Libero omnis pariatur voluptas temporibus. Voluptas voluptatem ipsa voluptatem sit.', 6, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (11, 'P0049', 'YMW932', 'Collin Feil', 3622, 841.52, 511.31, 1, 'Reiciendis asperiores illum officia eum. Sed ut ad voluptate ullam. Voluptas ducimus consequatur et sit enim voluptatibus dolores.', 4, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (12, 'P0047', 'EGJ511', 'Verner Kshlerin', 8575912, 154.25, 590.25, 1, 'Aut eveniet voluptas voluptatum eveniet. Quibusdam sed laudantium similique explicabo rerum. Asperiores et officiis expedita rerum consectetur pariatur similique et.', 1, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (13, 'P0027', 'WMH144', 'Colby Nienow', 2, 304.93, 607.47, 1, 'Consequatur consequuntur magnam ipsum distinctio. Laboriosam sit ab ullam perferendis. Autem explicabo possimus distinctio voluptates dignissimos deserunt. Ratione vel nesciunt officia ipsum recusandae.', 1, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (14, 'P0091', 'YMW932', 'Jacklyn Batz V', 7, 879.09, 942.15, 0, 'Cum illo voluptatibus eum aut ut optio. Explicabo quaerat natus officia.', 6, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (15, 'P005', 'YMW932', 'Casimer Rau', 443, 539.36, 236.43, 0, 'Blanditiis rerum nihil illo enim quis. Tenetur corporis sit sunt dolore voluptatem. Asperiores dignissimos mollitia quibusdam quia sequi exercitationem laboriosam. Repudiandae reiciendis harum nihil hic sed.', 7, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (16, 'P0010', 'YMW932', 'Chanelle Leuschke', 90206338, 548.76, 926.13, 0, 'Dignissimos nesciunt laborum repellat dolorem in perferendis accusamus. Incidunt consectetur officiis non qui corrupti. Amet tempora similique ducimus ut ipsum officia. Sit est necessitatibus dolorem dolor nisi aut ad inventore.', 5, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (17, 'P0084', 'EGJ511', 'Rosella Gutkowski', 9, 708.18, 223.71, 1, 'Aut rerum dolorem aut consequatur. Laudantium aliquid veniam dolores numquam id delectus. Et qui debitis a nulla. Et sit ea voluptatem nesciunt.', 4, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (18, 'P0099', 'WMH144', 'Felicity Langworth', 2, 862.66, 950.00, 0, 'Velit voluptates omnis quos sit quaerat quia sit. Aspernatur odit accusantium velit mollitia. Vel non eaque quia tempore. Voluptas fugit dolorum aut consequatur laborum porro ipsa.', 1, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (19, 'P0035', 'EGJ511', 'Dawson McDermott', 4473, 222.19, 580.00, 0, 'Hic autem iusto suscipit ducimus ut magni voluptatem et. Omnis architecto architecto sunt doloremque eum nostrum voluptatem eum. Aut natus excepturi doloremque non nesciunt. Error eos ea nulla nostrum numquam explicabo.', 6, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (20, 'P0058', 'D8N308', 'Zion Feest II', 7001, 741.30, 562.83, 0, 'Repudiandae excepturi aut ut aliquid et. Commodi quas temporibus eius et dolorem quia. Est officia harum tenetur explicabo sed. Dignissimos deserunt voluptatum rerum aut consequuntur. Mollitia sint praesentium et impedit eaque qui.', 4, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (21, 'P0045', 'WMH144', 'Esta Nolan', 300, 72.08, 518.40, 1, 'Enim aliquam praesentium mollitia eveniet. Reprehenderit eveniet ducimus expedita qui vero. Cum aut ipsam voluptatum suscipit quasi maiores similique. Ullam omnis id quod.', 3, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (22, 'P0072', 'EGJ511', 'Ms. Kayla Waelchi V', 40039407, 116.04, 76.46, 0, 'Autem id temporibus eveniet et. Quidem assumenda harum ratione sit rerum. Facilis accusantium maiores nihil pariatur repellat.', 10, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (23, 'P0029', 'WMH144', 'Dario Zieme', 74, 231.48, 362.18, 0, 'Numquam corporis suscipit voluptatem nihil. Voluptas repudiandae optio eos perferendis magni excepturi voluptas. Ut aut tempora dolorem molestiae labore qui id.', 5, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (24, 'P0077', 'WMH144', 'Prof. Dedric Smitham', 17, 201.74, 32.74, 1, 'Dolore similique impedit est sit. Sunt corrupti consequatur qui temporibus in at aut. Ipsa illum voluptas quia esse. Quisquam eum debitis ut.', 5, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (25, 'P0059', 'WMH144', 'Miss Winnifred Schoen', 1294518, 269.85, 933.96, 1, 'Accusantium aliquam sit qui at ab. Mollitia sit aspernatur quae nesciunt quam vitae ducimus aperiam. Consequuntur odit perspiciatis ratione magnam et saepe cupiditate.', 2, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (26, 'P0064', 'YMW932', 'Raven Kassulke', 745990, 355.81, 77.36, 0, 'Facilis quam hic molestias maxime iure. Dolorum itaque illum quaerat voluptas.', 7, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (27, 'P0073', 'D8N308', 'Ms. Raquel Greenfelder', 228059, 745.84, 683.12, 1, 'Nesciunt quasi est beatae non aut. Voluptas qui sint ut et fuga ut. Facere culpa rerum ut qui est aperiam. Consequatur odio fuga perferendis.', 5, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (28, 'P0051', 'WMH144', 'Aisha Sawayn', 8450242, 826.04, 678.43, 0, 'Explicabo perferendis consequatur similique veritatis distinctio voluptatem. Et modi sit eligendi voluptas consectetur nesciunt. Distinctio ut quo rerum asperiores quaerat voluptates exercitationem. Eveniet quaerat quis ea ipsa voluptatem provident et.', 9, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (29, 'P0097', 'D8N308', 'Eliseo Toy', 815781, 100.62, 817.98, 1, 'Explicabo id velit error porro consectetur aut repellendus. Nobis quis eveniet pariatur aliquam. Ut aut atque qui commodi.', 10, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (30, 'P0081', 'D8N308', 'Terrell Pfeffer', 998, 232.33, 291.07, 1, 'Quidem repellat asperiores aliquid et nihil impedit. Natus blanditiis minus deserunt. Doloremque necessitatibus sequi recusandae repellat neque.', 1, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (31, 'P0022', 'D8N308', 'Damien Metz', 3489, 982.67, 899.52, 1, 'Atque consectetur libero autem est. Eum sit aperiam sint provident accusantium eos officiis. Occaecati magni quidem vel quaerat quam distinctio.', 4, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (32, 'P0085', 'YMW932', 'Laisha Ebert', 733365, 323.78, 29.58, 1, 'Autem expedita odit rerum. Accusantium omnis veniam fugiat blanditiis delectus. Beatae magni nemo placeat numquam. Blanditiis reiciendis esse commodi velit et.', 9, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (33, 'P0050', 'YMW932', 'Stephon Hayes', 114565, 238.51, 677.95, 1, 'Sint expedita sunt magni eligendi sint amet qui. Vitae ut consequatur fugiat sunt aut et a. Aliquid non voluptate temporibus qui. Aperiam ut animi quia fuga quia.', 10, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (34, 'P0030', 'YMW932', 'Mrs. Rebecca Heaney IV', 816074740, 193.51, 927.62, 1, 'Nulla velit possimus possimus quis. Numquam amet quidem tenetur nisi culpa iste. Illum cum et ea accusamus reiciendis omnis inventore. Ipsam doloremque non voluptatem aut.', 7, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (35, 'P0068', 'D8N308', 'Jennifer Reichel', 268142, 711.00, 244.40, 1, 'Sunt consequatur nihil earum quidem non ratione quasi quo. Animi beatae architecto velit officia. Aperiam omnis quam soluta provident. Adipisci vero magni in ea ducimus accusantium.', 7, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (36, 'P0069', 'YMW932', 'Maryjane Dooley PhD', 5, 176.58, 546.21, 1, 'Quia et similique voluptatum dignissimos quia cum. Amet dolores velit id molestias tempora necessitatibus quam dignissimos. Omnis illo expedita ipsam dolore ipsa ut omnis. Voluptate libero cupiditate similique architecto magni at.', 6, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (37, 'P0067', 'D8N308', 'Prof. Coleman King II', 76133656, 353.55, 812.02, 0, 'Est sit dolores ipsa et minima quasi ipsum. Illo qui distinctio dolor voluptatem neque. Praesentium nobis et incidunt ut dolorem officia. Impedit sed voluptatem porro nihil praesentium inventore. Maxime enim dolore commodi nobis quia id nostrum.', 7, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (38, 'P0075', 'WMH144', 'Brisa Towne', 2025582, 765.58, 889.20, 0, 'Molestiae nisi asperiores quis non molestiae quam. Accusantium omnis maiores soluta ea. Qui qui non quam est. Et voluptas assumenda sit in qui sit.', 2, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (39, 'P0034', 'YMW932', 'Cierra Witting', 294, 728.41, 374.87, 1, 'Omnis voluptatem magni veritatis esse et et harum. Accusantium qui et omnis voluptatem non. Quos repellendus rerum ducimus quia. Perferendis aliquam asperiores deserunt et fugiat voluptate sequi quis.', 8, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (40, 'P0060', 'WMH144', 'Dr. Margie Marks', 857, 456.68, 276.24, 0, 'Esse sint omnis nobis voluptates eos. Cupiditate dolor voluptatem ut sunt blanditiis. Iure quis ab explicabo quis distinctio. Sint dolorem odit similique eligendi animi dolorem.', 6, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (41, 'P008', 'EGJ511', 'Virginie Jones', 7421371, 966.71, 90.67, 0, 'Natus voluptas nihil officia repudiandae nisi dolorum praesentium similique. Magnam ut dignissimos dolor impedit suscipit qui optio. Quam inventore sequi sint cum atque delectus molestiae.', 9, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (42, 'P0024', 'YMW932', 'Deonte Powlowski II', 69914, 107.95, 89.54, 1, 'Numquam ex aspernatur facilis. Nisi optio non fuga aut exercitationem mollitia. Ut possimus nihil non reiciendis. Enim sint provident asperiores eos repudiandae.', 9, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (43, 'P001', 'EGJ511', 'Kade Zulauf', 248221, 782.26, 433.22, 1, 'Provident odit totam nobis laborum nesciunt. Blanditiis commodi sed sequi voluptates commodi doloremque voluptatibus. Et ut nihil ut. Cumque maiores qui aut perspiciatis voluptatem nostrum.', 1, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (44, 'P0014', 'WMH144', 'Lurline Lemke', 508736992, 194.56, 909.02, 1, 'Et harum magni ipsa. Iste aliquam fuga laudantium rerum quam quis. Quos soluta at impedit neque alias veniam id voluptas.', 3, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (45, 'P0038', 'D8N308', 'Ms. Beatrice Abernathy IV', 4, 848.78, 774.92, 0, 'Labore quo voluptas illum et. Et eveniet tenetur reiciendis et. Doloremque quaerat eum voluptas.', 5, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (46, 'P003', 'EGJ511', 'Katelin Senger', 720, 450.45, 600.01, 0, 'Molestiae dolores ipsum repudiandae a iste. Placeat fuga dignissimos quasi qui. Placeat eligendi modi quas est.', 8, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (47, 'P004', 'YMW932', 'Gardner Murazik', 79895, 380.99, 194.53, 1, 'Praesentium distinctio non quo totam ut. Et autem dicta facilis autem. Dolores reiciendis aliquam molestiae minima labore. Dolor vel earum quo nesciunt eos maiores voluptatem.', 5, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (48, 'P0082', 'WMH144', 'Darlene Gaylord', 44346, 238.42, 215.88, 1, 'Est rerum eaque sit quisquam nulla qui omnis. Et qui non perferendis ex facilis. Commodi nisi qui voluptas labore ea aut.', 10, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (49, 'P0090', 'YMW932', 'Aubree O\'Reilly', 29, 610.77, 82.37, 1, 'Aliquam illum fugiat animi libero voluptatem assumenda. Dolores neque maxime omnis eos molestiae dolorum et. In qui sequi ea optio repellat dolorum. Officiis maxime reiciendis aspernatur similique nesciunt sunt omnis.', 9, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `products` VALUES (50, 'P0033', 'YMW932', 'Gregory Romaguera', 633089, 590.65, 84.12, 1, 'Repudiandae nisi veritatis voluptas. Pariatur qui deleniti eum saepe. Voluptatem qui maiores velit officia et dolor et. Odit voluptas doloribus sed velit quia aperiam.', 3, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');

-- ----------------------------
-- Table structure for suppliers
-- ----------------------------
DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE `suppliers`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` bigint UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `suppliers_code_unique`(`code`) USING BTREE,
  UNIQUE INDEX `suppliers_phone_unique`(`phone`) USING BTREE,
  INDEX `suppliers_cat_code_foreign`(`cat_code`) USING BTREE,
  UNIQUE INDEX `suppliers_email_unique`(`email`) USING BTREE,
  CONSTRAINT `suppliers_cat_code_foreign` FOREIGN KEY (`cat_code`) REFERENCES `product_categories` (`code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of suppliers
-- ----------------------------
INSERT INTO `suppliers` VALUES (1, 'Prof. Mae Cormier', 'SUP17', 'YMW932', '785-538-6323', 'hgrady@reynolds.info', '72544 Jones Hills Apt. 153\nBashirianside, CT 40611-9613', 0, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `suppliers` VALUES (2, 'Dr. Mayra Lueilwitz', 'SUP36', 'D8N308', '(828) 886-5217', 'jovanny65@medhurst.biz', '415 Daniel Route Apt. 193\nSouth Cora, MN 94118-0612', 1, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `suppliers` VALUES (3, 'Prof. Alessandro Daniel', 'SUP46', 'EGJ511', '+1-279-350-7807', 'zora13@rolfson.info', '490 Considine Falls\nShawnaburgh, LA 17047', 0, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `suppliers` VALUES (4, 'Ian Moen', 'SUP41', 'WMH144', '+1-719-453-2014', 'xgoodwin@yahoo.com', '716 Luettgen Valley Suite 656\nKovacekchester, MS 49040-4942', 1, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `suppliers` VALUES (5, 'Mozelle Tremblay Jr.', 'SUP57', 'YMW932', '+1-540-474-7942', 'ygorczany@wintheiser.biz', '525 Marvin Cove\nMurphyfort, DC 66560-2864', 1, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `suppliers` VALUES (6, 'Humberto O\'Kon DDS', 'SUP48', 'D8N308', '1-224-831-6989', 'nadia.willms@robel.com', '51373 Xzavier Spring\nSouth Dock, HI 38104', 0, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `suppliers` VALUES (7, 'Derek Brakus MD', 'SUP9', 'D8N308', '435.436.8383', 'littel.calista@hotmail.com', '9801 Viviane Parks Suite 974\nEast Isaiastown, CO 86190-2706', 0, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `suppliers` VALUES (8, 'Arvid Beatty', 'SUP61', 'D8N308', '346.480.4173', 'fharvey@hintz.org', '356 Wisozk Mount Suite 423\nAltenwerthtown, AR 81559-0311', 0, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `suppliers` VALUES (9, 'Kaya Corkery', 'SUP54', 'YMW932', '276-980-9537', 'ardella.barton@gmail.com', '26768 Fatima Common Suite 460\nClarefort, LA 11498-6043', 0, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `suppliers` VALUES (10, 'Kavon Turcotte PhD', 'SUP94', 'D8N308', '+1.424.321.7957', 'drunolfsson@schimmel.biz', '21425 Jeff Trail Apt. 907\nCrystelmouth, NH 03933-5075', 1, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `suppliers` VALUES (11, 'Douglas Homenick', 'SUP86', 'D8N308', '(364) 513-8895', 'michele.williamson@yahoo.com', '33082 Francisca Burgs\nNorth Arielle, NJ 07062-6739', 1, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `suppliers` VALUES (12, 'Noah Pfannerstill', 'SUP20', 'YMW932', '925-496-0438', 'bpouros@gmail.com', '9262 Fletcher Stream Apt. 883\nHayesmouth, HI 51435', 1, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `suppliers` VALUES (13, 'Myra Luettgen III', 'SUP88', 'WMH144', '978.438.0101', 'bryana22@barrows.net', '52040 Collins Centers\nPort Wiley, MD 77783-5327', 1, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `suppliers` VALUES (14, 'Camren Medhurst', 'SUP6', 'EGJ511', '425-639-5651', 'gutkowski.fannie@koss.org', '62326 Haag Cliffs\nWest Kadin, PA 33145-3622', 0, NULL, NULL, NULL, NULL, '2023-10-18 09:22:10', '2023-10-18 09:22:10');
INSERT INTO `suppliers` VALUES (15, 'Robyn Altenwerth', 'SUP79', 'EGJ511', '+1.680.927.0050', 'fboehm@gmail.com', '307 Cole Shore Apt. 147\nSouth Winfield, TN 01738', 1, NULL, NULL, NULL, NULL, '2023-10-18 09:22:11', '2023-10-18 09:22:11');
INSERT INTO `suppliers` VALUES (16, 'Ryleigh Barrows II', 'SUP96', 'WMH144', '+1-878-847-9568', 'krutherford@white.com', '825 Barbara Center Apt. 217\nBogisichfort, KS 77922-8235', 1, NULL, NULL, NULL, NULL, '2023-10-18 09:22:11', '2023-10-18 09:22:11');
INSERT INTO `suppliers` VALUES (17, 'Nakia Reinger', 'SUP32', 'WMH144', '1-406-925-5337', 'kmcdermott@yahoo.com', '26520 Treva Trail Suite 793\nSunnyhaven, OH 82940', 1, NULL, NULL, NULL, NULL, '2023-10-18 09:22:11', '2023-10-18 09:22:11');
INSERT INTO `suppliers` VALUES (18, 'Cesar Lang', 'SUP62', 'EGJ511', '667-945-1414', 'berta86@hotmail.com', '9888 Bergnaum Centers Suite 903\nSouth Geoffreymouth, AZ 27906', 1, NULL, NULL, NULL, NULL, '2023-10-18 09:22:11', '2023-10-18 09:22:11');
INSERT INTO `suppliers` VALUES (19, 'Mrs. Mona Harber PhD', 'SUP70', 'YMW932', '1-520-815-8985', 'jaskolski.ashlynn@gmail.com', '28992 Adrain Avenue Suite 358\nEast Doug, DE 35423-3196', 0, NULL, NULL, NULL, NULL, '2023-10-18 09:22:11', '2023-10-18 09:22:11');
INSERT INTO `suppliers` VALUES (20, 'Ibrahim Jacobi', 'SUP39', 'YMW932', '585.292.6980', 'serena.jast@yahoo.com', '8786 Otto Bridge\nLeuschkeville, CT 53275', 1, NULL, NULL, NULL, NULL, '2023-10-18 09:22:11', '2023-10-18 09:22:11');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_status` tinyint(1) NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Mrs. Dasia Watsica III', 'brebes_prince60@example.net', '2023-10-18 09:22:11', '$2y$10$27/b9NMlXRFQmPtvsO1hPOupXTA7g0Yn8zJa3Z5RHKpaofb3SVPgK', 0, '2YSVkgzGUf', '1988-02-06 10:21:12', '1975-03-20 01:07:50');
INSERT INTO `users` VALUES (2, 'Dr. Sandy Crooks I', 'brebes_soledad.bradtke@example.org', '2023-10-18 09:22:11', '$2y$10$lnlWtUhfKad9IXsFkPgfp.qD4oQvmpUGkQ.L2mg0t6.v8kdlzAhH.', 0, 'XovshOJoxO', '2001-07-01 13:18:10', '1975-10-07 10:34:43');
INSERT INTO `users` VALUES (3, 'Talia Flatley DDS', 'brebes_joaquin.schamberger@example.com', '2023-10-18 09:22:11', '$2y$10$wy9/xo5fbdN4WhSNGS4WreG4YTdHP0SHtPwVmoWFWWKzJDVZiw02i', 0, 'ToEKU7tvv4', '2011-11-07 08:23:19', '2008-11-10 13:55:49');
INSERT INTO `users` VALUES (4, 'Ms. Sabryna Brekke', 'brebes_mertie.mcdermott@example.net', '2023-10-18 09:22:11', '$2y$10$HB0lCAknWtSJ3fnvi.LcFu1Z9tcYk3Bh20bhSk68VmI006zYAKq4a', 0, 'KDszeXsN26', '2004-05-03 15:36:11', '2005-05-30 21:48:45');
INSERT INTO `users` VALUES (5, 'Rod Balistreri', 'brebes_jonathon.ritchie@example.com', '2023-10-18 09:22:11', '$2y$10$heFukK6aW3.WcHyXPBRjq.n8lnMlzremCh3La8UMl.a5jZf.dAGbS', 0, 'yaCVZLjFG2', '1977-07-25 04:33:18', '1975-07-02 10:31:10');
INSERT INTO `users` VALUES (6, 'Prof. Alexander Hartmann III', 'brebes_bogan.sterling@example.com', '2023-10-18 09:22:11', '$2y$10$a98hk2yi3u/Bs/WaxCLrqe4eL.vNI9ATTv6BHpHx5tIh95dUUiGLK', 0, 'JHd5y0VxXR', '1992-04-15 12:01:19', '1983-09-23 08:41:31');
INSERT INTO `users` VALUES (7, 'Fernando DuBuque DVM', 'brebes_effertz.rene@example.net', '2023-10-18 09:22:11', '$2y$10$O2AqPlB9PVh.cPi./e5NT.CoaO7sby2QI8QCvdyS6.0z9Hw2orM2G', 1, 'bzTYJ4OzjL', '1993-10-10 11:13:03', '1975-01-21 23:10:53');
INSERT INTO `users` VALUES (8, 'Dr. Boris Johnston', 'brebes_allie.bruen@example.com', '2023-10-18 09:22:11', '$2y$10$mJQlc2IDidtHPdqWnBBfFOBfAAxJIKfKMLH.HMdLdKQ81Rr5gHKNe', 0, 'gtpmUnLr7h', '2004-04-16 23:57:02', '2017-04-10 19:34:17');
INSERT INTO `users` VALUES (9, 'Ms. Mozell Mayert DDS', 'brebes_giovanni.farrell@example.com', '2023-10-18 09:22:11', '$2y$10$HdpgLk.DNgR5rQOeA.EdZ.NDWx8W8XdzzEGIKceFu.rG.zzgEJSNq', 0, 'FbBxnEOK9E', '2021-12-19 21:11:03', '1974-11-08 11:25:07');
INSERT INTO `users` VALUES (10, 'Irma Waters', 'brebes_zechariah43@example.com', '2023-10-18 09:22:11', '$2y$10$WggZnuSFigqS102YEer4aeMbrnEdXJo0lciwgAc0ry4rj7VVW6G7y', 0, '2G2du9eeOL', '2009-02-20 05:18:30', '2023-08-01 14:45:33');
INSERT INTO `users` VALUES (11, 'Bahrudin', 'bahrudin.no8@gmail.com', NULL, '$2y$10$UUYuRtI3ch1tzCWeao/eg.kgAfdjVGV1wimpq1BBbbF4kofdtQL8G', 1, 'O2YUQAVmjS', NULL, NULL);
INSERT INTO `users` VALUES (12, 'Raleigh Bechtelar', 'sromaguera@example.com', '2023-10-18 09:22:12', '$2y$10$QxlF83x3k/4DiLviQGDIie4mWQ8q.T1ATSjkPNKuBrBbV/pISCe9W', 1, 'I9cuEhC92T', '2023-10-18 09:22:12', '2023-10-18 09:22:12');
INSERT INTO `users` VALUES (13, 'Prof. Carlie Keebler', 'tavares62@example.org', '2023-10-18 09:22:12', '$2y$10$KMq9LhshaWV5o.z/b2Qu1.btx8xo7x0NVQpza5Ib49e5EQ7g713UG', 1, 'JmdMq0szxE', '2023-10-18 09:22:12', '2023-10-18 09:22:12');
INSERT INTO `users` VALUES (14, 'Roy Borer PhD', 'emelia.swift@example.org', '2023-10-18 09:22:12', '$2y$10$SVCOCa5nSP7phyg9WPrARuzYXAnm49hZeUdB85pij/slVQEnNKjka', 0, '2zgFNt54wa', '2023-10-18 09:22:12', '2023-10-18 09:22:12');
INSERT INTO `users` VALUES (15, 'Christelle Nolan IV', 'dawn.kihn@example.org', '2023-10-18 09:22:12', '$2y$10$DaiqSyVsJFqoXlya7vrz7OM9ldE/laSHxCwm1/OP0HVyKuH074WGa', 0, '6mpwE2jG6f', '2023-10-18 09:22:12', '2023-10-18 09:22:12');
INSERT INTO `users` VALUES (16, 'Mrs. Krista Funk', 'major16@example.net', '2023-10-18 09:22:12', '$2y$10$T7NyyC5XP4A.J0UFIKa/Be7/uKX/LYniFNX0KoWnRDMJiS2OPAy0G', 0, '0PprvVF2Db', '2023-10-18 09:22:12', '2023-10-18 09:22:12');
INSERT INTO `users` VALUES (17, 'Quincy Altenwerth', 'korey.murazik@example.org', '2023-10-18 09:22:12', '$2y$10$FoPo6tAyX0GhoxdRu9e4I.VV3ZRJ6lMaWdamlOYwF/P3277p.kDT2', 1, 'ooVWSQbG4b', '2023-10-18 09:22:12', '2023-10-18 09:22:12');
INSERT INTO `users` VALUES (18, 'Adah Nikolaus', 'franecki.rowena@example.net', '2023-10-18 09:22:12', '$2y$10$JqRvkvRFqRVW3sIPzHFkmu3dOstOD9eMnWYF8n0jyxjvU2uq/me2S', 0, 'CWfUfhfCNs', '2023-10-18 09:22:12', '2023-10-18 09:22:12');
INSERT INTO `users` VALUES (19, 'Shane Hackett', 'autumn19@example.net', '2023-10-18 09:22:12', '$2y$10$cq0B6W6IWNlEct64ZMaKeuHtPom4vWfixbVj3BltzvczJFvl6I1Pi', 1, 'LK1aQeV6nr', '2023-10-18 09:22:12', '2023-10-18 09:22:12');
INSERT INTO `users` VALUES (20, 'Miss Ima Osinski', 'hgrant@example.org', '2023-10-18 09:22:12', '$2y$10$qGwPLuuCW.n00D0M22SJXOR.fcBWr60uF4nrHptpW00MpLM2hUgPW', 0, 'xZyBEGW0bj', '2023-10-18 09:22:13', '2023-10-18 09:22:13');
INSERT INTO `users` VALUES (21, 'Alanis Brown II', 'meaghan.boehm@example.org', '2023-10-18 09:22:13', '$2y$10$l.FpfWl6NNYEBc79vVlPBuk3hXPtDO8uujPjtRBCH305OTrV/2i5a', 0, 'a7md7g1JPE', '2023-10-18 09:22:13', '2023-10-18 09:22:13');

SET FOREIGN_KEY_CHECKS = 1;
