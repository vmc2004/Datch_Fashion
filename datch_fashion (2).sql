-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 18, 2024 at 10:00 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datch_fashion`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `location` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `image`, `link`, `is_active`, `location`, `created_at`, `updated_at`) VALUES
(1, 'Áo phao', 'uploads/banner/m40pezoh9j22rf0z4lf1800x833.webp', 'http://127.0.0.1:8000/cua-hang/danh-muc/4', 1, 1, '2024-12-10 06:05:01', '2024-12-10 06:05:01'),
(2, 'Giữ nhiệt nữ', 'uploads/banner/m3znur9zvuebk2kiqxk3110_1800x833 copy (1).webp', 'http://127.0.0.1:8000/cua-hang/danh-muc/12', 1, 1, '2024-12-10 06:06:09', '2024-12-10 06:06:09'),
(3, 'Bán chạy', 'uploads/banner/hang-ban-chay-1800x600 (1).webp', 'http://127.0.0.1:8000/cua-hang', 1, 1, '2024-12-10 06:07:39', '2024-12-10 06:07:39');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `category_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `logo`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Nike', 'uploads/brands/1733725732_images.png', NULL, '2024-12-08 23:28:52', '2024-12-08 23:28:52'),
(2, 'Adidas', 'uploads/brands/1733725744_images (2).png', NULL, '2024-12-08 23:29:04', '2024-12-08 23:29:04'),
(3, 'Puma', 'uploads/brands/1733725768_images (4).png', NULL, '2024-12-08 23:29:28', '2024-12-08 23:29:28'),
(4, 'Channel', 'uploads/brands/1733725812_images (3).png', NULL, '2024-12-08 23:30:12', '2024-12-08 23:30:12'),
(5, 'Datch', 'uploads/brands/1733725838_logoDatch.png', NULL, '2024-12-08 23:30:38', '2024-12-17 07:54:46');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(15, 1, 'active', '2024-12-13 11:51:00', '2024-12-13 11:51:00'),
(26, 2, 'active', '2024-12-17 06:23:28', '2024-12-17 06:23:28');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint UNSIGNED NOT NULL,
  `cart_id` bigint UNSIGNED NOT NULL,
  `variant_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `price_at_purchase` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `variant_id`, `quantity`, `price_at_purchase`, `created_at`, `updated_at`) VALUES
(19, 15, 3, 10, '149000.00', '2024-12-13 11:51:00', '2024-12-13 11:51:40');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `parent_id` bigint DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `is_active`, `parent_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Nam', 'uploads/category/male-worker-icon-graphic-png_189128.jpg', 1, NULL, NULL, NULL, NULL),
(2, 'Nữ', 'uploads/category/pngtree-vector-female-student-icon-png-image_326761.jpg', 1, NULL, NULL, NULL, NULL),
(3, 'Áo phông', NULL, 1, 1, NULL, NULL, NULL),
(4, 'Áo khoác', NULL, 1, 1, NULL, NULL, NULL),
(5, 'Áo nỉ', NULL, 1, 1, NULL, NULL, NULL),
(6, 'Áo len', NULL, 1, 1, NULL, NULL, NULL),
(7, 'Áo polo', NULL, 1, 1, NULL, NULL, NULL),
(8, 'Quần dài', NULL, 1, 1, NULL, NULL, NULL),
(9, 'Áo phông nữ', NULL, 1, 2, NULL, NULL, NULL),
(10, 'Áo khoác nữ', NULL, 1, 2, NULL, NULL, NULL),
(11, 'Đồ ngủ', NULL, 1, 2, NULL, NULL, NULL),
(12, 'Áo len nữ', NULL, 1, 2, NULL, NULL, NULL),
(13, 'Áo nỉ nữ', NULL, 1, 2, NULL, NULL, NULL),
(14, 'Quần dài nữ', NULL, 1, 2, NULL, NULL, NULL),
(15, 'Quần jean', NULL, 1, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_code` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `color_code`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Đen', '#000000', NULL, NULL, NULL),
(2, 'Trắng', '#ffffff', NULL, NULL, NULL),
(3, 'Nâu', '#a41919', NULL, NULL, NULL),
(4, 'Đỏ', '#d50707', NULL, NULL, NULL),
(5, 'Xanh rêu', '#178a00', NULL, NULL, NULL),
(6, 'Màu be', '#f8f6af', NULL, NULL, NULL),
(7, 'Xanh đen', '#05147f', NULL, NULL, NULL),
(8, 'Xanh nhạt', '#477cae', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `status` enum('approved','pending','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `user_id`, `content`, `rating`, `status`, `created_at`, `updated_at`, `order_id`) VALUES
(1, 8, 2, 'Áo đẹp lắm', 5, 'pending', '2024-12-10 06:30:44', '2024-12-10 06:30:44', NULL),
(2, 7, 2, 'Áo rất đẹp', 5, 'pending', '2024-12-13 10:13:40', '2024-12-13 10:13:40', NULL),
(3, 7, 2, 'Áo rất đẹp', 5, 'pending', '2024-12-13 10:16:53', '2024-12-13 10:16:53', NULL),
(4, 7, 2, 'Áo rất đẹp', 5, 'pending', '2024-12-13 10:17:29', '2024-12-13 10:17:29', 18),
(5, 7, 2, 'Áo đẹp ác', 5, 'pending', '2024-12-13 10:18:01', '2024-12-13 10:18:01', 18),
(6, 7, 2, 'Áo đẹp ác', 5, 'pending', '2024-12-13 10:19:14', '2024-12-13 10:19:14', 18),
(7, 9, 2, 'adda', 5, 'pending', '2024-12-13 20:04:25', '2024-12-13 20:04:25', NULL),
(8, 1, 2, 'áda', 5, 'pending', '2024-12-17 01:12:46', '2024-12-17 01:12:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` double(10,2) NOT NULL,
  `discount_type` enum('fixed','percent') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int DEFAULT NULL,
  `used` int DEFAULT '0',
  `max_price` double DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `discount`, `discount_type`, `quantity`, `used`, `max_price`, `start_date`, `end_date`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'AHIHI', 25000.00, 'fixed', 9, 1, NULL, '2024-12-09', '2024-12-29', 1, '2024-12-10 06:20:45', '2024-12-17 03:36:19'),
(2, 'ACACACA', 98.00, 'percent', 12, 0, NULL, '2024-12-13', '2024-12-27', 1, '2024-12-13 11:47:49', '2024-12-13 11:47:49'),
(3, 'BBBBB', 50.00, 'percent', 12, 0, 50000, '2024-12-13', '2024-12-20', 1, '2024-12-13 11:50:02', '2024-12-13 11:50:02'),
(4, 'CCCCC', 90.00, 'percent', 1, 0, 40000, '2024-12-13', '2024-12-29', 1, '2024-12-13 17:52:11', '2024-12-13 17:52:11'),
(5, 'GGDC', 90.00, 'percent', 10, 0, 50000, '2024-12-14', '2024-12-21', 1, '2024-12-13 20:13:02', '2024-12-17 03:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_user`
--

CREATE TABLE `coupon_user` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `coupon_id` bigint UNSIGNED NOT NULL,
  `used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupon_user`
--

INSERT INTO `coupon_user` (`id`, `user_id`, `coupon_id`, `used_at`, `created_at`, `updated_at`) VALUES
(17, 2, 1, '2024-12-17 03:36:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorite_products`
--

CREATE TABLE `favorite_products` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_09_22_075733_create_categories_table', 1),
(6, '2024_09_22_075741_create_brands_table', 1),
(7, '2024_09_22_075746_create_products_table', 1),
(8, '2024_09_22_075754_create_product_galleries_table', 1),
(9, '2024_09_22_075813_create_colors_table', 1),
(10, '2024_09_22_075818_create_sizes_table', 1),
(11, '2024_09_22_075824_create_coupons_table', 1),
(12, '2024_09_22_075849_create_shippers_table', 1),
(13, '2024_09_22_075902_create_blogs_table', 1),
(14, '2024_09_22_095313_create_product_variants_table', 1),
(17, '2024_09_22_141702_create_shipments_table', 1),
(18, '2024_10_01_165549_create_banners_table', 1),
(19, '2024_10_25_132800_create_favorite_products_table', 1),
(20, '2024_10_26_090944_create_comments_table', 1),
(21, '2024_11_13_060706_create_contacts_table', 1),
(22, '2024_12_04_060553_create_points_table', 1),
(23, '2024_12_08_162958_create_carts_table', 1),
(24, '2024_12_08_163019_create_cart_items_table', 1),
(25, '2024_12_11_181625_create_coupon_user_table', 2),
(26, '2024_12_13_092801_create_notifications_table', 3),
(27, '2024_12_16_174509_create_permission_tables', 4),
(28, '2024_12_17_164945_create_permission_role_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('086efbdc-4d8b-4418-94a0-2030812e1676', 'App\\Notifications\\OrderPlaced', 'App\\Models\\User', 2, '{\"message\":\"\\u0110\\u01a1n h\\u00e0ng ESZUZZ230 \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c \\u0111\\u1eb7t th\\u00e0nh c\\u00f4ng.\",\"order_code\":\"ESZUZZ230\",\"order_status\":\"Ch\\u01b0a thanh to\\u00e1n\",\"details_url\":\"http:\\/\\/127.0.0.1:8000\\/account\\/orders\\/edit\\/ESZUZZ230\",\"product_name\":\"\\u00c1o hoodie n\\u1eef\"}', '2024-12-17 04:40:09', '2024-12-13 20:13:42', '2024-12-17 04:40:09'),
('0c080afe-5e43-43e9-836d-bc4d47f06afc', 'App\\Notifications\\OrderPlaced', 'App\\Models\\User', 2, '{\"message\":\"\\u0110\\u01a1n h\\u00e0ng V9O1TJ855 \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c \\u0111\\u1eb7t th\\u00e0nh c\\u00f4ng.\",\"order_code\":\"V9O1TJ855\",\"order_status\":\"Ch\\u01b0a thanh to\\u00e1n\",\"details_url\":\"http:\\/\\/127.0.0.1:8000\\/account\\/orders\\/edit\\/V9O1TJ855\",\"product_name\":\"\\u00c1o len ghi l\\u00ea n\\u1eef c\\u1ed5 tim d\\u1ec7t ki\\u1ec3u\"}', '2024-12-13 11:10:24', '2024-12-13 11:00:27', '2024-12-13 11:10:24'),
('1c44a259-28e7-49e5-9cc1-6a8203d40acb', 'App\\Notifications\\OrderPlaced', 'App\\Models\\User', 2, '{\"message\":\"\\u0110\\u01a1n h\\u00e0ng 7WII9E540 \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c \\u0111\\u1eb7t th\\u00e0nh c\\u00f4ng.\",\"order_code\":\"7WII9E540\",\"order_status\":\"\\u0110\\u00e3 thanh to\\u00e1n\",\"details_url\":\"http:\\/\\/127.0.0.1:8000\\/account\\/orders\\/edit\\/7WII9E540\",\"product_name\":\"\\u00c1o kho\\u00e1c d\\u1ea1 n\\u1eef hai l\\u1edbp c\\u1ed5 tr\\u00f2n d\\u00e1ng su\\u00f4ng\"}', '2024-12-13 20:02:40', '2024-12-13 20:01:55', '2024-12-13 20:02:40'),
('20cbaa33-b947-4809-8f5e-2328e8e3c861', 'App\\Notifications\\OrderPlaced', 'App\\Models\\User', 2, '{\"message\":\"\\u0110\\u01a1n h\\u00e0ng #2DMG7L931 \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c \\u0111\\u1eb7t th\\u00e0nh c\\u00f4ng.\",\"order_code\":\"2DMG7L931\",\"order_status\":\"Ch\\u01b0a thanh to\\u00e1n\",\"details_url\":\"http:\\/\\/127.0.0.1:8000\\/account\\/orders\\/edit\\/2DMG7L931\",\"product_name\":\"\\u00c1o hoodie n\\u1eef\"}', '2024-12-13 10:12:50', '2024-12-13 10:12:38', '2024-12-13 10:12:50'),
('240efd80-f1dc-443c-b006-fc9350d5c48f', 'App\\Notifications\\OrderPlaced', 'App\\Models\\User', 2, '{\"message\":\"\\u0110\\u01a1n h\\u00e0ng BWLIUD964 \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c \\u0111\\u1eb7t th\\u00e0nh c\\u00f4ng.\",\"order_code\":\"BWLIUD964\",\"order_status\":\"\\u0110\\u00e3 thanh to\\u00e1n\",\"details_url\":\"http:\\/\\/127.0.0.1:8000\\/account\\/orders\\/edit\\/BWLIUD964\",\"product_name\":\"\\u00c1o ph\\u00f4ng nam\"}', '2024-12-13 17:54:49', '2024-12-13 17:53:51', '2024-12-13 17:54:49'),
('252e8b5e-83a6-49ab-91bd-4df31a48fbaf', 'App\\Notifications\\OrderPlaced', 'App\\Models\\User', 2, '{\"message\":\"\\u0110\\u01a1n h\\u00e0ng ATR09W299 \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c \\u0111\\u1eb7t th\\u00e0nh c\\u00f4ng.\",\"order_code\":\"ATR09W299\",\"order_status\":\"Ch\\u01b0a thanh to\\u00e1n\",\"details_url\":\"http:\\/\\/127.0.0.1:8000\\/account\\/orders\\/edit\\/ATR09W299\",\"product_name\":\"Qu\\u1ea7n jeans nam phom relaxed\"}', '2024-12-17 04:40:09', '2024-12-17 03:55:30', '2024-12-17 04:40:09'),
('2d9ed5aa-246d-4100-9712-d6b4f3b8ca36', 'App\\Notifications\\OrderPlaced', 'App\\Models\\User', 2, '{\"message\":\"\\u0110\\u01a1n h\\u00e0ng M0BXIL577 \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c \\u0111\\u1eb7t th\\u00e0nh c\\u00f4ng.\",\"order_code\":\"M0BXIL577\",\"order_status\":\"Ch\\u01b0a thanh to\\u00e1n\",\"details_url\":\"http:\\/\\/127.0.0.1:8000\\/account\\/orders\\/edit\\/M0BXIL577\",\"product_name\":\"\\u00c1o hoodie n\\u1eef\"}', '2024-12-13 18:10:26', '2024-12-13 18:09:44', '2024-12-13 18:10:26'),
('466e6484-1b53-4fb3-b8fc-6dfef4609b80', 'App\\Notifications\\OrderPlaced', 'App\\Models\\User', 2, '{\"message\":\"\\u0110\\u01a1n h\\u00e0ng OUR276364 \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c \\u0111\\u1eb7t th\\u00e0nh c\\u00f4ng.\",\"order_code\":\"OUR276364\",\"order_status\":\"\\u0110\\u00e3 thanh to\\u00e1n\",\"details_url\":\"http:\\/\\/127.0.0.1:8000\\/account\\/orders\\/edit\\/OUR276364\",\"product_name\":\"\\u00c1o ph\\u00f4ng nam\"}', '2024-12-17 04:40:09', '2024-12-13 20:08:30', '2024-12-17 04:40:09'),
('4ab17be2-136a-4343-92ea-18bc6b7810e2', 'App\\Notifications\\OrderPlaced', 'App\\Models\\User', 2, '{\"message\":\"\\u0110\\u01a1n h\\u00e0ng ESZUZZ230 \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c \\u0111\\u1eb7t th\\u00e0nh c\\u00f4ng.\",\"order_code\":\"ESZUZZ230\",\"order_status\":\"Ch\\u01b0a thanh to\\u00e1n\",\"details_url\":\"http:\\/\\/127.0.0.1:8000\\/account\\/orders\\/edit\\/ESZUZZ230\",\"product_name\":\"\\u00c1o hoodie n\\u1eef\"}', '2024-12-17 04:40:09', '2024-12-13 20:13:42', '2024-12-17 04:40:09'),
('52234bfa-12ac-45a0-ac58-3a764169cd6a', 'App\\Notifications\\OrderPlaced', 'App\\Models\\User', 2, '{\"message\":\"\\u0110\\u01a1n h\\u00e0ng FHTMUJ489 \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c \\u0111\\u1eb7t th\\u00e0nh c\\u00f4ng.\",\"order_code\":\"FHTMUJ489\",\"order_status\":\"\\u0110\\u00e3 thanh to\\u00e1n\",\"details_url\":\"http:\\/\\/127.0.0.1:8000\\/account\\/orders\\/edit\\/FHTMUJ489\",\"product_name\":\"\\u00c1o kho\\u00e1c d\\u1ea1 n\\u1eef hai l\\u1edbp c\\u1ed5 tr\\u00f2n d\\u00e1ng su\\u00f4ng\"}', '2024-12-13 11:10:24', '2024-12-13 11:02:24', '2024-12-13 11:10:24'),
('568d3aec-f13e-4f0e-bb74-b8ddd125b874', 'App\\Notifications\\OrderPlaced', 'App\\Models\\User', 2, '{\"message\":\"\\u0110\\u01a1n h\\u00e0ng MSOCWL620 \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c \\u0111\\u1eb7t th\\u00e0nh c\\u00f4ng.\",\"order_code\":\"MSOCWL620\",\"order_status\":\"Ch\\u01b0a thanh to\\u00e1n\",\"details_url\":\"http:\\/\\/127.0.0.1:8000\\/account\\/orders\\/edit\\/MSOCWL620\",\"product_name\":\"\\u00c1o hoodie n\\u1eef\"}', '2024-12-13 10:55:42', '2024-12-13 10:55:01', '2024-12-13 10:55:42'),
('697941fc-ab9a-4d36-8b08-2e198197f369', 'App\\Notifications\\OrderPlaced', 'App\\Models\\User', 2, '{\"message\":\"\\u0110\\u01a1n h\\u00e0ng M0BXIL577 \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c \\u0111\\u1eb7t th\\u00e0nh c\\u00f4ng.\",\"order_code\":\"M0BXIL577\",\"order_status\":\"Ch\\u01b0a thanh to\\u00e1n\",\"details_url\":\"http:\\/\\/127.0.0.1:8000\\/account\\/orders\\/edit\\/M0BXIL577\",\"product_name\":\"\\u00c1o hoodie n\\u1eef\"}', '2024-12-13 18:10:26', '2024-12-13 18:10:14', '2024-12-13 18:10:26'),
('7ecc1e00-da4f-4367-b7c2-6dabfb8afa1f', 'App\\Notifications\\OrderPlaced', 'App\\Models\\User', 2, '{\"message\":\"\\u0110\\u01a1n h\\u00e0ng WOB44G801 \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c \\u0111\\u1eb7t th\\u00e0nh c\\u00f4ng.\",\"order_code\":\"WOB44G801\",\"order_status\":\"Ch\\u01b0a thanh to\\u00e1n\",\"details_url\":\"http:\\/\\/127.0.0.1:8000\\/account\\/orders\\/edit\\/WOB44G801\",\"product_name\":\"\\u00c1o kho\\u00e1c unisex ng\\u01b0\\u1eddi l\\u1edbn d\\u00e1ng basic\"}', '2024-12-13 17:58:54', '2024-12-13 17:58:23', '2024-12-13 17:58:54'),
('827e634f-0efc-4c2b-a249-493964628237', 'App\\Notifications\\OrderPlaced', 'App\\Models\\User', 2, '{\"message\":\"\\u0110\\u01a1n h\\u00e0ng OUR276364 \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c \\u0111\\u1eb7t th\\u00e0nh c\\u00f4ng.\",\"order_code\":\"OUR276364\",\"order_status\":\"\\u0110\\u00e3 thanh to\\u00e1n\",\"details_url\":\"http:\\/\\/127.0.0.1:8000\\/account\\/orders\\/edit\\/OUR276364\",\"product_name\":\"\\u00c1o ph\\u00f4ng nam\"}', '2024-12-17 04:40:09', '2024-12-13 20:08:30', '2024-12-17 04:40:09'),
('a0fb25fd-7caf-41e6-8f77-4a13cacf604b', 'App\\Notifications\\OrderPlaced', 'App\\Models\\User', 2, '{\"message\":\"\\u0110\\u01a1n h\\u00e0ng LVZBNG692 \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c \\u0111\\u1eb7t th\\u00e0nh c\\u00f4ng.\",\"order_code\":\"LVZBNG692\",\"order_status\":\"Ch\\u01b0a thanh to\\u00e1n\",\"details_url\":\"http:\\/\\/127.0.0.1:8000\\/account\\/orders\\/edit\\/LVZBNG692\",\"product_name\":\"\\u00c1o hoodie n\\u1eef\"}', '2024-12-17 04:40:09', '2024-12-17 02:53:06', '2024-12-17 04:40:09'),
('aa1f1f93-7388-4ca8-a641-8b705b466b38', 'App\\Notifications\\OrderPlaced', 'App\\Models\\User', 4, '{\"message\":\"\\u0110\\u01a1n h\\u00e0ng YTEMA3914 \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c \\u0111\\u1eb7t th\\u00e0nh c\\u00f4ng.\",\"order_code\":\"YTEMA3914\",\"order_status\":\"Ch\\u01b0a thanh to\\u00e1n\",\"details_url\":\"http:\\/\\/127.0.0.1:8000\\/account\\/orders\\/edit\\/YTEMA3914\",\"product_name\":\"Qu\\u1ea7n khaki nam\"}', NULL, '2024-12-17 06:32:11', '2024-12-17 06:32:11'),
('aaf397d6-e338-41e6-b9c6-73ba87f4f13f', 'App\\Notifications\\OrderPlaced', 'App\\Models\\User', 2, '{\"message\":\"\\u0110\\u01a1n h\\u00e0ng WOB44G801 \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c \\u0111\\u1eb7t th\\u00e0nh c\\u00f4ng.\",\"order_code\":\"WOB44G801\",\"order_status\":\"Ch\\u01b0a thanh to\\u00e1n\",\"details_url\":\"http:\\/\\/127.0.0.1:8000\\/account\\/orders\\/edit\\/WOB44G801\",\"product_name\":\"\\u00c1o kho\\u00e1c unisex ng\\u01b0\\u1eddi l\\u1edbn d\\u00e1ng basic\"}', '2024-12-13 17:58:54', '2024-12-13 17:58:45', '2024-12-13 17:58:54'),
('aba8e4ed-a37f-4ad2-9fec-863105a9926f', 'App\\Notifications\\OrderPlaced', 'App\\Models\\User', 2, '{\"message\":\"\\u0110\\u01a1n h\\u00e0ng S2EYIO653 \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c \\u0111\\u1eb7t th\\u00e0nh c\\u00f4ng.\",\"order_code\":\"S2EYIO653\",\"order_status\":\"Ch\\u01b0a thanh to\\u00e1n\",\"details_url\":\"http:\\/\\/127.0.0.1:8000\\/account\\/orders\\/edit\\/S2EYIO653\",\"product_name\":\"\\u00c1o n\\u1ec9 c\\u00f3 m\\u0169 nam\"}', '2024-12-13 20:02:40', '2024-12-13 19:30:58', '2024-12-13 20:02:40'),
('b7eb5840-4e58-48f5-ae17-9b27a428464d', 'App\\Notifications\\OrderPlaced', 'App\\Models\\User', 2, '{\"message\":\"\\u0110\\u01a1n h\\u00e0ng G4LXWN408 \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c \\u0111\\u1eb7t th\\u00e0nh c\\u00f4ng.\",\"order_code\":\"G4LXWN408\",\"order_status\":\"Ch\\u01b0a thanh to\\u00e1n\",\"details_url\":\"http:\\/\\/127.0.0.1:8000\\/account\\/orders\\/edit\\/G4LXWN408\",\"product_name\":\"\\u00c1o ph\\u00f4ng nam d\\u00e1ng su\\u00f4ng in ch\\u1eef\"}', '2024-12-13 18:07:30', '2024-12-13 18:07:23', '2024-12-13 18:07:30'),
('ca7471e5-74e3-4ee0-978e-cc29c85b1a74', 'App\\Notifications\\OrderPlaced', 'App\\Models\\User', 2, '{\"message\":\"\\u0110\\u01a1n h\\u00e0ng ATR09W299 \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c \\u0111\\u1eb7t th\\u00e0nh c\\u00f4ng.\",\"order_code\":\"ATR09W299\",\"order_status\":\"Ch\\u01b0a thanh to\\u00e1n\",\"details_url\":\"http:\\/\\/127.0.0.1:8000\\/account\\/orders\\/edit\\/ATR09W299\",\"product_name\":\"Qu\\u1ea7n jeans nam phom relaxed\"}', '2024-12-17 04:40:09', '2024-12-17 03:53:41', '2024-12-17 04:40:09'),
('ff86abf5-c19d-487b-869a-f9f11af383d8', 'App\\Notifications\\OrderPlaced', 'App\\Models\\User', 2, '{\"message\":\"\\u0110\\u01a1n h\\u00e0ng ESZUZZ230 \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c \\u0111\\u1eb7t th\\u00e0nh c\\u00f4ng.\",\"order_code\":\"ESZUZZ230\",\"order_status\":\"Ch\\u01b0a thanh to\\u00e1n\",\"details_url\":\"http:\\/\\/127.0.0.1:8000\\/account\\/orders\\/edit\\/ESZUZZ230\",\"product_name\":\"\\u00c1o hoodie n\\u1eef\"}', '2024-12-17 04:40:09', '2024-12-13 20:13:42', '2024-12-17 04:40:09');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` enum('Thanh toán khi nhận hàng','Thanh toán bằng thẻ','Thanh toán qua VNPay') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Thanh toán khi nhận hàng',
  `status` enum('Chờ xác nhận','Đã xác nhận','Đang chuẩn bị hàng','Đang giao hàng','Đã giao hàng','Đơn hàng đã hủy') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Chờ xác nhận',
  `payment_status` enum('Chưa thanh toán','Đã thanh toán') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shiping` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `total_price` double NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `user_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `code`, `fullname`, `phone`, `address`, `email`, `payment`, `status`, `payment_status`, `shiping`, `discount`, `total_price`, `note`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'FPWZFO441', 'Admin 1', '0339381785', 'số 3 ngách 8 ngõ 106 Hoàng Quốc Việt, Nghĩa Đô, Cầu Giấy, Hà Nội', 'chienvu2k4@gmail.com', 'Thanh toán khi nhận hàng', 'Chờ xác nhận', 'Đã thanh toán', NULL, NULL, 329000, NULL, 1, NULL, '2024-12-09 10:18:12', '2024-12-09 11:54:59'),
(2, 'AOB9XO903', 'Chiến đẹp trai', '0339381785', 'Trường Tiểu học Yên Thắng A, Xóm 1, Yên Thắng, Yên Mô, Ninh Bình', 'chienvmph43391@fpt.edu.vn', 'Thanh toán khi nhận hàng', 'Chờ xác nhận', 'Chưa thanh toán', NULL, NULL, 329000, NULL, 2, NULL, '2024-12-10 04:42:36', '2024-12-10 06:19:39'),
(3, '9RPPRG106', 'Chiến đẹp trai', '0339381785', 'Trường Tiểu học Yên Thắng A, Xóm 1, Yên Thắng, Yên Mô, Ninh Bình', 'chienvmph43391@fpt.edu.vn', 'Thanh toán khi nhận hàng', 'Đã xác nhận', 'Chưa thanh toán', NULL, NULL, 179000, NULL, 2, NULL, '2024-12-10 04:45:16', '2024-12-10 05:20:20'),
(4, 'L2NPGG808', 'Chiến đẹp trai', '0339381785', 'Trường Tiểu học Yên Thắng A, Xóm 1, Yên Thắng, Yên Mô, Ninh Bình', 'chienvmph43391@fpt.edu.vn', 'Thanh toán khi nhận hàng', 'Chờ xác nhận', 'Chưa thanh toán', NULL, NULL, 204500, NULL, 2, NULL, '2024-12-10 06:20:00', '2024-12-10 06:20:00'),
(6, 'RBHAKK129', 'Chiến đẹp trai', '0339381785', 'Trường Tiểu học Yên Thắng A, Xóm 1, Yên Thắng, Yên Mô, Ninh Bình', 'chienvmph43391@fpt.edu.vn', 'Thanh toán qua VNPay', 'Đã giao hàng', 'Đã thanh toán', NULL, NULL, 429000, NULL, 2, NULL, '2024-12-10 06:27:18', '2024-12-10 06:28:35'),
(8, 'ANNYF6146', 'Chiến đẹp trai', '0339381785', 'Trường Tiểu học Yên Thắng A, Xóm 1, Yên Thắng, Yên Mô, Ninh Bình', 'chienvmph43391@fpt.edu.vn', 'Thanh toán khi nhận hàng', 'Đã giao hàng', 'Chưa thanh toán', NULL, NULL, 204500, NULL, 2, NULL, '2024-12-11 02:30:30', '2024-12-11 02:31:28'),
(9, 'VGEUDP876', 'Chiến đẹp trai', '0339381785', 'Trường Tiểu học Yên Thắng A, Xóm 1, Yên Thắng, Yên Mô, Ninh Bình', 'chienvmph43391@fpt.edu.vn', 'Thanh toán khi nhận hàng', 'Đang chuẩn bị hàng', 'Chưa thanh toán', NULL, NULL, 999000, NULL, 2, NULL, '2024-12-11 02:32:48', '2024-12-11 02:42:33'),
(11, '2DLXHN201', 'Chiến đẹp trai', '0339381785', 'Trường Tiểu học Yên Thắng A, Xóm 1, Yên Thắng, Yên Mô, Ninh Bình', 'chienvmph43391@fpt.edu.vn', 'Thanh toán khi nhận hàng', 'Chờ xác nhận', 'Chưa thanh toán', NULL, 25000, 404000, NULL, 2, NULL, '2024-12-11 10:56:58', '2024-12-11 10:56:58'),
(12, 'FA2MR8148', 'Chiến đẹp trai', '0339381785', 'Trường Tiểu học Yên Thắng A, Xóm 1, Yên Thắng, Yên Mô, Ninh Bình', 'chienvmph43391@fpt.edu.vn', 'Thanh toán khi nhận hàng', 'Chờ xác nhận', 'Chưa thanh toán', 30000, 25000, 504500, NULL, 2, NULL, '2024-12-11 10:58:49', '2024-12-11 10:58:49'),
(17, 'NS4POG658', 'Chiến đẹp trai', '0339381785', 'Trường Tiểu học Yên Thắng A, Xóm 1, Yên Thắng, Yên Mô, Ninh Bình', 'chienvmph43391@fpt.edu.vn', 'Thanh toán khi nhận hàng', 'Chờ xác nhận', 'Chưa thanh toán', 30000, 25000, 154000, NULL, 2, NULL, '2024-12-11 11:19:59', '2024-12-11 11:19:59'),
(18, '2DMG7L931', 'Chiến đẹp trai', '0339381785', 'Trường Tiểu học Yên Thắng A, Xóm 1, Yên Thắng, Yên Mô, Ninh Bình', 'chienvmph43391@fpt.edu.vn', 'Thanh toán khi nhận hàng', 'Đã giao hàng', 'Đã thanh toán', NULL, NULL, 699012, NULL, 2, NULL, '2024-12-13 10:12:37', '2024-12-13 10:13:18'),
(22, 'MSOCWL620', 'Chiến đẹp trai', '0339381785', 'Trường Tiểu học Yên Thắng A, Xóm 1, Yên Thắng, Yên Mô, Ninh Bình', 'chienvmph43391@fpt.edu.vn', 'Thanh toán khi nhận hàng', 'Chờ xác nhận', 'Chưa thanh toán', 0, 0, 699000, NULL, 2, NULL, '2024-12-13 10:55:00', '2024-12-13 10:55:00'),
(25, 'V9O1TJ855', 'Chiến đẹp trai', '0339381785', 'Trường Tiểu học Yên Thắng A, Xóm 1, Yên Thắng, Yên Mô, Ninh Bình', 'chienvmph43391@fpt.edu.vn', 'Thanh toán khi nhận hàng', 'Chờ xác nhận', 'Chưa thanh toán', 30000, 0, 429000, NULL, 2, NULL, '2024-12-13 11:00:27', '2024-12-13 11:00:27'),
(26, 'FHTMUJ489', 'Chiến đẹp trai', '0339381785', 'Trường Tiểu học Yên Thắng A, Xóm 1, Yên Thắng, Yên Mô, Ninh Bình', 'chienvmph43391@fpt.edu.vn', 'Thanh toán qua VNPay', 'Chờ xác nhận', 'Đã thanh toán', NULL, NULL, 999000, NULL, 2, NULL, '2024-12-13 11:01:51', '2024-12-13 11:01:51'),
(27, 'BWLIUD964', 'Vũ Minh Chiến', '0339381785', 'Trường Tiểu học Yên Thắng A, Xóm 1, Yên Thắng, Yên Mô, Ninh Bình', 'chienvmph43391@fpt.edu.vn', 'Thanh toán qua VNPay', 'Đã giao hàng', 'Đã thanh toán', NULL, NULL, 139000, NULL, 2, NULL, '2024-12-13 17:53:17', '2024-12-13 17:54:16'),
(28, 'WOB44G801', 'Vũ Minh Chiến', '0339381785', 'Trường Tiểu học Yên Thắng A, Xóm 1, Yên Thắng, Yên Mô, Ninh Bình', 'chienvmph43391@fpt.edu.vn', 'Thanh toán khi nhận hàng', 'Chờ xác nhận', 'Chưa thanh toán', 0, 0, 999000, NULL, 2, NULL, '2024-12-13 17:58:22', '2024-12-13 17:58:22'),
(29, 'G4LXWN408', 'Vũ Minh Chiến', '0339381785', 'Trường Tiểu học Yên Thắng A, Xóm 1, Yên Thắng, Yên Mô, Ninh Bình', 'chienvmph43391@fpt.edu.vn', 'Thanh toán khi nhận hàng', 'Chờ xác nhận', 'Chưa thanh toán', 30000, 0, 329000, NULL, 2, NULL, '2024-12-13 18:07:22', '2024-12-13 18:07:22'),
(30, 'M0BXIL577', 'Vũ Minh Chiến', '0339381785', 'Trường Tiểu học Yên Thắng A, Xóm 1, Yên Thắng, Yên Mô, Ninh Bình', 'chienvmph43391@fpt.edu.vn', 'Thanh toán khi nhận hàng', 'Chờ xác nhận', 'Chưa thanh toán', 0, 0, 699000, NULL, 2, NULL, '2024-12-13 18:09:43', '2024-12-13 18:09:43'),
(32, 'CWTWIS432', 'Vũ Minh Chiến', '0339381785', 'số 3 ngách 8 ngõ 106 Hoàng Quốc Việt, Nghĩa Đô, Cầu Giấy, Hà Nội', 'chienvmph43391@fpt.edu.vn', 'Thanh toán qua VNPay', 'Chờ xác nhận', 'Đã thanh toán', NULL, NULL, 799000, NULL, 2, NULL, '2024-12-13 19:30:19', '2024-12-13 19:30:19'),
(34, 'S2EYIO653', 'Vũ Minh Chiến', '0339381785', 'số 3 ngách 8 ngõ 106 Hoàng Quốc Việt, Nghĩa Đô, Cầu Giấy, Hà Nội', 'chienvmph43391@fpt.edu.vn', 'Thanh toán khi nhận hàng', 'Chờ xác nhận', 'Chưa thanh toán', 0, 0, 799000, NULL, 2, NULL, '2024-12-13 19:30:57', '2024-12-13 19:30:57'),
(36, '7WII9E540', 'Vũ Minh Chiến', '0339381785', 'số 3 ngách 8 ngõ 106 Hoàng Quốc Việt, Nghĩa Đô, Cầu Giấy, Hà Nội', 'chienvmph43391@fpt.edu.vn', 'Thanh toán qua VNPay', 'Đã giao hàng', 'Đã thanh toán', NULL, NULL, 959000, NULL, 2, NULL, '2024-12-13 20:01:29', '2024-12-13 20:03:28'),
(37, 'PFXQ9A136', 'Vũ Minh Chiến', '0339381785', 'số 3 ngách 8 ngõ 106 Hoàng Quốc Việt, Nghĩa Đô, Cầu Giấy, Hà Nội', 'chienvmph43391@fpt.edu.vn', 'Thanh toán qua VNPay', 'Đang chuẩn bị hàng', 'Đã thanh toán', NULL, NULL, 848000, NULL, 2, NULL, '2024-12-13 20:07:57', '2024-12-16 03:16:37'),
(38, 'OUR276364', 'Vũ Minh Chiến', '0339381785', 'số 3 ngách 8 ngõ 106 Hoàng Quốc Việt, Nghĩa Đô, Cầu Giấy, Hà Nội', 'chienvmph43391@fpt.edu.vn', 'Thanh toán qua VNPay', 'Đang giao hàng', 'Đã thanh toán', NULL, NULL, 848000, NULL, 2, NULL, '2024-12-13 20:08:11', '2024-12-16 03:20:35'),
(40, 'ESZUZZ230', 'Vũ Minh Chiến', '0339381785', 'số 3 ngách 8 ngõ 106 Hoàng Quốc Việt, Nghĩa Đô, Cầu Giấy, Hà Nội', 'chienvmph43391@fpt.edu.vn', 'Thanh toán khi nhận hàng', 'Đơn hàng đã hủy', 'Chưa thanh toán', 0, 50000, 3046000, 'Hết hàng mất rồi', 2, NULL, '2024-12-13 20:13:41', '2024-12-16 03:13:46'),
(41, 'LVZBNG692', 'Vũ Minh Chiến', '0339381785', 'Trường Tiểu học Yên Thắng A, Xóm 1, Yên Thắng, Yên Mô, Ninh Bình', 'chienvmph43391@fpt.edu.vn', 'Thanh toán khi nhận hàng', 'Chờ xác nhận', 'Chưa thanh toán', 0, 25000, 774000, NULL, 2, NULL, '2024-12-17 02:53:05', '2024-12-17 02:53:05'),
(43, 'ATR09W299', 'Vũ Minh Chiến', '0339381785', 'số 3 ngách 8 ngõ 106 Hoàng Quốc Việt, Nghĩa Đô, Cầu Giấy, Hà Nội', 'chienvmph43391@fpt.edu.vn', 'Thanh toán khi nhận hàng', 'Chờ xác nhận', 'Chưa thanh toán', 0, 0, 699000, NULL, 2, NULL, '2024-12-17 03:53:40', '2024-12-17 03:53:40'),
(46, 'YTEMA3914', 'Phạm Thị Phương Anh', '0123456789', 'số 3 ngách 8, phường Bưởi, Tây Hồ, Hà Nội', 'chienvu68004@gmail.com', 'Thanh toán khi nhận hàng', 'Đơn hàng đã hủy', 'Chưa thanh toán', 0, 0, 8990000, 'thích thì hủy', 4, NULL, '2024-12-17 06:32:10', '2024-12-18 02:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` bigint UNSIGNED NOT NULL,
  `variant_id` bigint UNSIGNED NOT NULL,
  `price` double(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `total_price` double(10,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_rated` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `variant_id`, `price`, `quantity`, `total_price`, `deleted_at`, `created_at`, `updated_at`, `is_rated`) VALUES
(1, 2, 299000.00, 1, 299000.00, NULL, '2024-12-09 10:18:12', '2024-12-09 10:18:12', 0),
(2, 2, 299000.00, 1, 299000.00, NULL, '2024-12-10 04:42:36', '2024-12-10 04:42:36', 0),
(3, 3, 149000.00, 1, 149000.00, NULL, '2024-12-10 04:45:16', '2024-12-10 04:45:16', 0),
(4, 38, 174500.00, 1, 174500.00, NULL, '2024-12-10 06:20:00', '2024-12-10 06:20:00', 0),
(6, 33, 399000.00, 1, 399000.00, NULL, '2024-12-10 06:27:18', '2024-12-10 06:27:18', 0),
(8, 36, 174500.00, 1, 174500.00, NULL, '2024-12-11 02:30:30', '2024-12-11 02:30:30', 0),
(9, 35, 999000.00, 1, 999000.00, NULL, '2024-12-11 02:32:48', '2024-12-11 02:32:48', 0),
(11, 31, 399000.00, 1, 399000.00, NULL, '2024-12-11 10:56:58', '2024-12-11 10:56:58', 0),
(12, 23, 499500.00, 1, 499500.00, NULL, '2024-12-11 10:58:49', '2024-12-11 10:58:49', 0),
(17, 3, 149000.00, 1, 149000.00, NULL, '2024-12-11 11:19:59', '2024-12-11 11:19:59', 0),
(18, 29, 699000.00, 1, 699000.00, NULL, '2024-12-13 10:12:37', '2024-12-13 10:19:14', 1),
(18, 37, 12.00, 1, 12.00, NULL, '2024-12-13 10:12:37', '2024-12-13 10:19:14', 1),
(22, 25, 699000.00, 1, 699000.00, NULL, '2024-12-13 10:55:00', '2024-12-13 10:55:00', 0),
(25, 33, 399000.00, 1, 399000.00, NULL, '2024-12-13 11:00:27', '2024-12-13 11:00:27', 0),
(26, 35, 999000.00, 1, 999000.00, NULL, '2024-12-13 11:01:51', '2024-12-13 11:01:51', 0),
(27, 9, 149000.00, 1, 149000.00, NULL, '2024-12-13 17:53:17', '2024-12-17 01:12:46', 1),
(28, 20, 999000.00, 1, 999000.00, NULL, '2024-12-13 17:58:22', '2024-12-13 17:58:22', 0),
(29, 1, 299000.00, 1, 299000.00, NULL, '2024-12-13 18:07:23', '2024-12-13 18:07:23', 0),
(30, 25, 699000.00, 1, 699000.00, NULL, '2024-12-13 18:09:43', '2024-12-13 18:09:43', 0),
(32, 13, 799000.00, 1, 799000.00, NULL, '2024-12-13 19:30:19', '2024-12-13 19:30:19', 0),
(34, 13, 799000.00, 1, 799000.00, NULL, '2024-12-13 19:30:57', '2024-12-13 19:30:57', 0),
(36, 35, 999000.00, 1, 999000.00, NULL, '2024-12-13 20:01:29', '2024-12-13 20:04:25', 1),
(37, 3, 149000.00, 1, 149000.00, NULL, '2024-12-13 20:07:57', '2024-12-13 20:07:57', 0),
(37, 25, 699000.00, 1, 699000.00, NULL, '2024-12-13 20:07:57', '2024-12-13 20:07:57', 0),
(38, 3, 149000.00, 1, 149000.00, NULL, '2024-12-13 20:08:11', '2024-12-13 20:08:11', 0),
(38, 25, 699000.00, 1, 699000.00, NULL, '2024-12-13 20:08:11', '2024-12-13 20:08:11', 0),
(40, 29, 699000.00, 1, 699000.00, NULL, '2024-12-13 20:13:41', '2024-12-13 20:13:41', 0),
(40, 30, 699000.00, 2, 1398000.00, NULL, '2024-12-13 20:13:41', '2024-12-13 20:13:41', 0),
(40, 35, 999000.00, 1, 999000.00, NULL, '2024-12-13 20:13:41', '2024-12-13 20:13:41', 0),
(41, 25, 799000.00, 1, 799000.00, NULL, '2024-12-17 02:53:05', '2024-12-17 02:53:05', 0),
(43, 40, 699000.00, 1, 699000.00, NULL, '2024-12-17 03:53:40', '2024-12-17 03:53:40', 0),
(46, 44, 899000.00, 10, 8990000.00, NULL, '2024-12-17 06:32:10', '2024-12-17 06:32:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint UNSIGNED NOT NULL,
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `points` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `user_id`, `points`, `created_at`, `updated_at`) VALUES
(1, 4, 899, '2024-12-17 06:32:11', '2024-12-17 06:32:11');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `material` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `views` double NOT NULL DEFAULT '0',
  `category_id` bigint UNSIGNED NOT NULL,
  `brand_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `slug`, `image`, `price`, `description`, `material`, `status`, `is_active`, `views`, `category_id`, `brand_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '8TS25A002', 'Áo phông nam', 'ao-phong-nam', 'uploads/products/1733726173_8ts25a002-se409-xl-1-u.webp', 149000, 'Áo phông nam', 'Áo phông nam', 1, 1, 21, 3, 5, NULL, '2024-12-01 07:07:04', '2024-12-17 07:55:02'),
(2, '8TS24W001', 'Áo phông nam dáng suông in chữ', 'ao-phong-nam-dang-suong-in-chu', 'uploads/products/1733726659_8ts24w001-sg650-4.webp', 299000, 'Áo phông nam basic dáng regular cổ tròn, có chi tiết đồ họa là điểm nhấn trên sản phẩm.', '60% cotton 40% polyester', 1, 1, 21, 3, 2, NULL, '2024-12-01 17:00:00', '2024-12-17 03:03:47'),
(3, '8TW24W009', 'Áo nỉ có mũ nam', 'ao-ni-co-mu-nam', 'uploads/products/1733835016_8tw24w009-se384-l-1-u.webp', 799000, 'Áo nỉ có mũ nam', '53% cotton 47% polyester.', 1, 1, 4, 5, 1, NULL, '2024-12-03 17:00:00', '2024-12-17 03:05:28'),
(4, '5OT24W001', 'Áo khoác unisex người lớn dáng basic', 'ao-khoac-unisex-nguoi-lon-dang-basic', 'uploads/products/1733835243_5ot24w001-sa142-xl-1-u.webp', 999000, 'Áo khoác unisex người lớn chất liệu cotton spandex. Áo được cắt may rộng rãi, tạo cảm giác dễ chịu khi vận động. Kiểu dáng basic dễ mặc, dễ dàng phối hợp với nhiều trang phục khác nhau, phù hợp với cả nam và nữ.\r\nƯu điểm chất liệu: Thân thiện với môi trường, không gây hại cho sức khỏe. Độ bền cao. Thấm hút tốt, thoáng mát khi mặc.', '99% cotton 1% spandex.', 1, 1, 2, 4, 2, NULL, '2024-12-05 07:08:42', '2024-12-05 07:08:42'),
(5, '5OT23W005', 'Áo khoác nỉ unisex người lớn in hình Mickey', 'ao-khoac-ni-unisex-nguoi-lon-in-hinh-mickey', 'uploads/products/1733835497_5ot23w005-sk010-l-1-u.webp', 499500, 'Áo khoác nỉ unisex dáng bomber, với chất liệu vải dày dặn kết hợp với phần thiết kế bo kẻ ấn tượng và đồ họa nhân vật Mickey nổi bật phía sau lưng áo, rất phụ hợp với giới trẻ.\r\nBề mặt vải đanh lỳ, cấu trúc dệt mặt trái giữ nhiệt tốt.', '83% cotton 17% polyester', 1, 1, 2, 4, 4, NULL, '2024-12-10 17:00:00', '2024-12-10 17:00:00'),
(6, '6TS25A001', 'Áo phông nữ cổ tròn', 'ao-phong-nu-co-tron', 'uploads/products/1733835799_6ts25a001-sn010-m-1-u.webp', 149000, 'Áo phông nữ cổ tròn', '57% cotton 38% polyester 5% spandex.', 1, 1, 1, 9, 5, NULL, '2024-12-10 07:09:01', '2024-12-10 07:09:01'),
(7, '6TW24W007', 'Áo hoodie nữ', 'ao-hoodie-nu', 'uploads/products/1733836152_6tw24w007-sl167-m-1-u.webp', 699000, 'Áo hoodie nữ dáng oversize, với chi tiết các đường cắt bổ trên tay áo tạo điểm nhấn tinh tế.', '53% cotton 47% polyester.', 1, 1, 62, 13, 3, NULL, '2024-12-10 10:00:00', '2024-12-17 02:51:39'),
(8, '6TE24W004', 'Áo len ghi lê nữ cổ tim dệt kiểu', 'ao-len-ghi-le-nu-co-tim-det-kieu', 'uploads/products/1733836331_6te24w004-sw371-l-1-u.webp', 399000, 'Áo len ghi lê, dáng áo rộng vừa, chất liệu dệt len mềm mại, ấm áp. Hoàn cảnh sử dụng linh hoạt.', '48% acrylic 47% polyester 5% nylon.', 1, 1, 11, 12, 5, NULL, '2024-12-03 17:00:00', '2024-12-03 17:00:00'),
(9, '6OT24W017', 'Áo khoác dạ nữ hai lớp cổ tròn dáng suông', 'ao-khoac-da-nu-hai-lop-co-tron-dang-suong', 'uploads/products/1733836480_6ot24w017-se065-m-1-u.webp', 999000, 'Áo dạ hai lớp dài tay, cổ tròn, cài cúc, dáng suông. Chất liệu dạ mịn mang lại cảm giác mềm mại, ấm áp, đứng dáng. Phù hợp với môi trường công sở, dạo phố.', 'Màu SP332, SE065: 90% polyester 10% rayon. Màu SK010: 80% polyester 20% rayon. Lớp lót: 100% polyester.', 1, 1, 13, 10, 3, NULL, '2024-12-08 17:00:00', '2024-12-08 17:00:00'),
(11, 'GUT7094', 'T-shirt Yoguu Better Things', 't-shirt-yoguu-better-things', 'uploads/products/1733836660_ao-thun-unisex-yoguu-GUT7094-DEN (1).webp', 174500, 'Mềm mại, thoáng mát, thấm hút mồ hôi tốt, bảo vệ làn da nhạy cảm. Thiết kế đơn giản dễ mặc, phù hợp với nhiều hoàn cảnh.', 'Áo thun Yoguu Better Things - 100% cotton tự nhiên.', 1, 1, 22, 3, 1, NULL, '2024-11-30 17:00:00', '2024-12-17 00:53:00'),
(12, '8BJ24W004', 'Quần jeans nam phom relaxed', 'quan-jeans-nam-phom-relaxed', 'uploads/products/1734419188_8bj24w004-sj891-1.webp', 699000, 'Quần jeans đen 5 túi, phom relaxed là kiểu dáng được may khá rộng rãi, thoải mái, kích thước quần lớn hơn một chút so với những kiểu dáng cơ bản khác như regular nhưng cũng không rộng thùng thình như oversize. Phom dáng này tạo sự thoải mái cho người mặc và có thể phù hợp với mọi vóc dáng.\r\nVải jeans dày đẹp, đứng form, tôn dáng người mặc.\r\nThiết kế basic có thể dễ dàng phối cùng nhiều item khác và phù hợp với mọi hoàn cảnh.\r\nChất liệu 100% cotton thân thiện với môi trường. Độ bền tốt. Thấm hút tốt, thoáng mát, không gây hại cho sức khỏe. Thoáng mát khi mặc.', '100% cotton.', 1, 1, 10, 15, 2, NULL, '2024-12-17 00:06:28', '2024-12-17 02:53:55'),
(13, '8BK24W001', 'Quần khaki nam', 'quan-khaki-nam', 'uploads/products/1734420362_8bk24w001-se331-3.webp', 899000, 'Quần khaki nam dáng regular thoải mái, dễ mặc.\r\nChất liệu khaki dày dặn, bền chắc.\r\nThiết kế basic, phù hợp với nhiều dáng người châu Á.\r\nThích hợp mặc đi làm, đi chơi, đi học.\r\nPhối đồ đa dạng cùng sơ mi, áo thun, áo polo, áo khoác…\r\nChất liệu 100% cotton thân thiện với môi trường. Độ bền tốt. Thấm hút tốt, thoáng mát, không gây hại cho sức khỏe. Thoáng mát khi mặc.', '100% cotton.', 1, 1, 39, 8, 5, NULL, '2024-12-17 00:26:02', '2024-12-17 06:31:33');

-- --------------------------------------------------------

--
-- Table structure for table `product_galleries`
--

CREATE TABLE `product_galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `color_id` bigint UNSIGNED NOT NULL,
  `size_id` bigint UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `sale_price` double DEFAULT NULL,
  `sale_date` date DEFAULT NULL,
  `quantity` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `color_id`, `size_id`, `price`, `sale_price`, `sale_date`, `quantity`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 299000, NULL, NULL, 9, 'uploads/variants/1733727020_8ts24w001-sk010-1.webp', NULL, NULL, NULL),
(2, 2, 5, 1, 299000, NULL, NULL, 12, 'uploads/variants/1734424139_8ts24w001-sg650-2.webp', NULL, NULL, NULL),
(3, 1, 6, 1, 149000, NULL, NULL, 10, 'uploads/variants/1733831093_8ts25a002-se409-xl-2.webp', NULL, NULL, NULL),
(4, 1, 6, 2, 149000, NULL, NULL, 5, 'uploads/variants/1733834715_8ts25a002-se409-xl-1-u.webp', NULL, NULL, NULL),
(5, 1, 6, 3, 149000, NULL, NULL, 5, 'uploads/variants/1734422032_8ts25a002-se409-xl-3.webp', NULL, NULL, NULL),
(6, 1, 1, 1, 149000, NULL, NULL, 4, 'uploads/variants/1734422046_8ts25a002-se409-xl-5.webp', NULL, NULL, NULL),
(7, 1, 1, 2, 149000, NULL, NULL, 5, 'uploads/variants/1733834789_8ts25a002-sk010-xl-1-u.webp', NULL, NULL, NULL),
(8, 1, 1, 4, 149000, NULL, NULL, 2, 'uploads/variants/1734422063_8ts25a002-sk010-xl-2.webp', NULL, NULL, NULL),
(9, 1, 2, 1, 149000, NULL, NULL, 4, 'uploads/variants/1733834835_8ts25a002-sw001-xl-1-u.webp', NULL, NULL, NULL),
(10, 1, 2, 2, 149000, NULL, NULL, 2, 'uploads/variants/1734422085_8ts25a002-sw001-xl-2.webp', NULL, NULL, NULL),
(11, 2, 1, 2, 299000, NULL, NULL, 10, 'uploads/variants/1733834892_8ts24w001-sg650-thumb.webp', NULL, NULL, NULL),
(12, 2, 1, 3, 299000, NULL, NULL, 1, 'uploads/variants/1733834931_8ts24w001-sk010-thumb.webp', NULL, NULL, NULL),
(13, 3, 6, 1, 799000, NULL, NULL, 4, 'uploads/variants/1734424040_8tw24w009-se384-4.webp', NULL, NULL, NULL),
(14, 3, 6, 2, 799000, NULL, NULL, 1, 'uploads/variants/1734424057_8tw24w009-se384-2.webp', NULL, NULL, NULL),
(15, 3, 6, 3, 799000, NULL, NULL, 12, 'uploads/variants/1733835087_8tw24w009-se384-l-3.webp', NULL, NULL, NULL),
(16, 3, 1, 1, 799000, NULL, NULL, 5, 'uploads/variants/1733835120_8tw24w009-sk010-xl-1-u.webp', NULL, NULL, NULL),
(17, 3, 1, 2, 799000, NULL, NULL, 4, 'uploads/variants/1734424084_8tw24w009-sk010-2.webp', NULL, NULL, NULL),
(18, 3, 2, 1, 799000, NULL, NULL, 5, 'uploads/variants/1733835161_8tw24w009-sw001-xl-1-u.webp', NULL, NULL, NULL),
(19, 3, 2, 2, 799000, NULL, NULL, 1, 'uploads/variants/1734424099_8tw24w009-sw001-thumb.webp', NULL, NULL, NULL),
(20, 4, 6, 1, 999000, NULL, NULL, 2, 'uploads/variants/1733835273_5ot24w001-sa142-xl-2.webp', NULL, NULL, NULL),
(21, 4, 6, 2, 999000, NULL, NULL, 5, 'uploads/variants/1733835296_5ot24w001-sa142-xl-2.webp', NULL, NULL, NULL),
(22, 4, 6, 3, 999000, NULL, NULL, 4, 'uploads/variants/1733835417_5ot24w001-sa142-xl-1-u.webp', NULL, NULL, NULL),
(23, 5, 1, 1, 499500, NULL, NULL, 4, 'uploads/variants/1734423893_5ot23w005-sk010-6-c.webp', NULL, NULL, NULL),
(24, 5, 1, 2, 499500, NULL, NULL, 1, 'uploads/variants/1734423909_5ot23w005-sk010-l-5.webp', NULL, NULL, NULL),
(25, 7, 7, 1, 799000, NULL, NULL, 0, 'uploads/variants/1733836181_6tw24w007-sl167-m-2.webp', NULL, NULL, NULL),
(26, 7, 7, 2, 699000, NULL, NULL, 4, 'uploads/variants/1734421697_6tw24w007-sl167-m-3.webp', NULL, NULL, NULL),
(27, 7, 7, 3, 699000, NULL, NULL, 4, 'uploads/variants/1734421706_6tw24w007-sl167-m-4.webp', NULL, NULL, NULL),
(28, 7, 7, 2, 699000, NULL, NULL, 4, 'uploads/variants/1734421724_6tw24w007-sl167-m-5.webp', NULL, NULL, NULL),
(29, 7, 3, 1, 699000, NULL, NULL, 2, 'uploads/variants/1733836245_6tw24w007-so036-m-1-u.webp', NULL, NULL, NULL),
(30, 7, 3, 2, 699000, NULL, NULL, 1, 'uploads/variants/1734421739_6tw24w007-so036-m-2.webp', NULL, NULL, NULL),
(31, 8, 2, 1, 399000, NULL, NULL, 10, 'uploads/variants/1734423579_6te24w004-sw371-l-3.webp', NULL, NULL, NULL),
(32, 8, 2, 2, 399000, NULL, NULL, 10, 'uploads/variants/1734423564_6te24w004-sw371-l-2.webp', NULL, NULL, NULL),
(33, 8, 4, 1, 399000, NULL, NULL, 10, 'uploads/variants/1733836390_6te24w004-sr310-l-1-u.webp', NULL, NULL, NULL),
(34, 8, 4, 3, 399000, NULL, NULL, 12, 'uploads/variants/1734423593_6te24w004-sr310-l-2.webp', NULL, NULL, NULL),
(35, 9, 6, 1, 999000, NULL, NULL, 3, 'uploads/variants/1733836568_6ot24w017-se065-m-3.webp', NULL, NULL, NULL),
(36, 11, 1, 1, 174500, NULL, NULL, 0, 'uploads/variants/1733836688_ao-thun-unisex-yoguu-GUT7094-DEN (5).webp', NULL, NULL, NULL),
(37, 11, 1, 2, 174500, NULL, NULL, 3, 'uploads/variants/1734423429_ao-thun-unisex-yoguu-GUT7094-DEN (7).webp', NULL, NULL, NULL),
(38, 11, 3, 3, 174500, NULL, NULL, 11, 'uploads/variants/1733836733_ao-thun-unisex-yoguu-GUT7094-NAD (6).webp', NULL, NULL, NULL),
(40, 12, 7, 1, 699000, NULL, NULL, 3, 'uploads/variants/1734423271_8bj24w004-sj891-31-4.webp', NULL, NULL, NULL),
(41, 12, 7, 2, 699000, NULL, NULL, 4, 'uploads/variants/1734423255_8bj24w004-sj891-31-1-u.webp', NULL, NULL, NULL),
(42, 12, 8, 3, 699000, NULL, NULL, 5, 'uploads/variants/1734420194_8bj24w004-sj890-2.webp', NULL, NULL, NULL),
(43, 12, 8, 4, 699000, NULL, NULL, 13, 'uploads/variants/1734423289_8bj24w004-sj890-thumb.webp', NULL, NULL, NULL),
(44, 13, 6, 1, 899000, NULL, NULL, 0, 'uploads/variants/1734422154_8bk24w001-se331-32-1-u.webp', NULL, NULL, NULL),
(45, 13, 6, 2, 899000, NULL, NULL, 15, 'uploads/variants/1734422134_8bk24w001-se331-2.webp', NULL, NULL, NULL),
(46, 13, 1, 3, 899000, NULL, NULL, 5, 'uploads/variants/1734420810_8bk24w001-sk010-2.webp', NULL, NULL, NULL),
(47, 13, 6, 3, 899000, NULL, NULL, 5, 'uploads/variants/1734422182_8bk24w001-se331-32-2.webp', NULL, NULL, NULL),
(48, 13, 1, 1, 899000, NULL, NULL, 5, 'uploads/variants/1734422206_8bk24w001-sk010-thumb.webp', NULL, NULL, NULL),
(49, 13, 1, 4, 899000, NULL, NULL, 12, 'uploads/variants/1734422237_8bk24w001-sk010-32-4.webp', NULL, NULL, NULL),
(50, 12, 8, 1, 699000, NULL, NULL, 5, 'uploads/variants/1734423311_8bj24w004-sj890-31-1-u.webp', NULL, NULL, NULL),
(51, 6, 3, 1, 149000, NULL, NULL, 10, 'uploads/variants/1734423680_6ts25a001-sn010-m-3.webp', NULL, NULL, NULL),
(52, 6, 3, 2, 149000, NULL, NULL, 5, 'uploads/variants/1734423729_6ts25a001-sn010-m-4.webp', NULL, NULL, NULL),
(53, 6, 3, 3, 149000, NULL, NULL, 4, 'uploads/variants/1734423747_6ts25a001-sn010-m-5.webp', NULL, NULL, NULL),
(54, 6, 1, 1, 149000, NULL, NULL, 5, 'uploads/variants/1734423768_6ts25a001-sk010-m-1-u.webp', NULL, NULL, NULL),
(55, 6, 1, 2, 149000, NULL, NULL, 5, 'uploads/variants/1734423787_6ts25a001-sk010-m-2.webp', NULL, NULL, NULL),
(56, 6, 1, 4, 149000, NULL, NULL, 4, 'uploads/variants/1734423810_6ts25a001-sk010-m-4.webp', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `shipper_id` bigint UNSIGNED NOT NULL,
  `estimated_delivery_date` date NOT NULL,
  `actual_delivery_date` date DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shippers`
--

CREATE TABLE `shippers` (
  `id` bigint UNSIGNED NOT NULL,
  `fullname` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'S', NULL, NULL, NULL),
(2, 'M', NULL, NULL, NULL),
(3, 'L', NULL, NULL, NULL),
(4, 'XL', NULL, NULL, NULL),
(5, '2XL', NULL, NULL, NULL),
(6, '3XL', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `fullname` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('member','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `otp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('Nam','Nữ','Khác') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `language` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Vietnamese',
  `introduction` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `avatar`, `phone`, `address`, `email`, `email_verified_at`, `password`, `role`, `status`, `otp`, `google_id`, `gender`, `birthday`, `language`, `introduction`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin 1', NULL, NULL, NULL, 'chienvu2k4@gmail.com', NULL, '$2y$10$tGCAd5s./r448PI40So/3uP8MEXnkB8SOnDit8KkIvSX2N6UbyOcG', 'admin', 1, NULL, NULL, NULL, NULL, 'Vietnamese', NULL, NULL, '2024-12-08 09:38:16', '2024-12-08 09:38:16'),
(2, 'Vũ Minh Chiến', 'avatars/1733816031-nui1.jpg', '0339381785', 'số 3 ngách 8 ngõ 106 Hoàng Quốc Việt, Nghĩa Đô, Cầu Giấy, Hà Nội', 'chienvmph43391@fpt.edu.vn', NULL, '$2y$10$lpQHJh2c2PyQHc0Sub1u5u0cUeTqZqsk3JTNdu/S0IgO7Xjim5W8q', 'member', 1, NULL, NULL, 'Nam', '2004-08-06', 'Vietnamese', NULL, NULL, '2024-12-10 00:30:31', '2024-12-13 19:25:09'),
(4, 'Phạm Thị Phương Anh', NULL, NULL, NULL, 'chienvu68004@gmail.com', NULL, '$2y$10$Cr10okF3g0mcSDt2SZ31rOYFxqgbdD7pM3hADUvdXy5UaaY.KWpDK', 'member', 1, NULL, NULL, NULL, NULL, 'Vietnamese', NULL, NULL, '2024-12-17 06:28:56', '2024-12-17 06:28:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`),
  ADD KEY `blogs_category_id_foreign` (`category_id`),
  ADD KEY `blogs_user_id_foreign` (`user_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_cart_id_foreign` (`cart_id`),
  ADD KEY `cart_items_variant_id_foreign` (`variant_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_product_id_foreign` (`product_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `coupon_user`
--
ALTER TABLE `coupon_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupon_user_user_id_foreign` (`user_id`),
  ADD KEY `coupon_user_coupon_id_foreign` (`coupon_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorite_products`
--
ALTER TABLE `favorite_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorite_products_user_id_foreign` (`user_id`),
  ADD KEY `favorite_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_code_unique` (`code`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`,`variant_id`),
  ADD KEY `order_details_variant_id_foreign` (`variant_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_code_unique` (`code`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_galleries_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variants_product_id_foreign` (`product_id`),
  ADD KEY `product_variants_color_id_foreign` (`color_id`),
  ADD KEY `product_variants_size_id_foreign` (`size_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipments_order_id_foreign` (`order_id`),
  ADD KEY `shipments_shipper_id_foreign` (`shipper_id`);

--
-- Indexes for table `shippers`
--
ALTER TABLE `shippers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_google_id_unique` (`google_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coupon_user`
--
ALTER TABLE `coupon_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorite_products`
--
ALTER TABLE `favorite_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shippers`
--
ALTER TABLE `shippers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`),
  ADD CONSTRAINT `cart_items_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `product_variants` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `coupon_user`
--
ALTER TABLE `coupon_user`
  ADD CONSTRAINT `coupon_user_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `coupon_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favorite_products`
--
ALTER TABLE `favorite_products`
  ADD CONSTRAINT `favorite_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorite_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `product_variants` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD CONSTRAINT `product_galleries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `product_variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_variants_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shipments`
--
ALTER TABLE `shipments`
  ADD CONSTRAINT `shipments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `shipments_shipper_id_foreign` FOREIGN KEY (`shipper_id`) REFERENCES `shippers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
