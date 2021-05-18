-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2019 at 05:38 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mitfarm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_phone`, `admin_password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '09876543', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blog_id` int(10) UNSIGNED NOT NULL,
  `blog_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_category_id` int(11) NOT NULL,
  `blog_user_id` int(11) NOT NULL DEFAULT '1',
  `blog_detels` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_tag` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `blog_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blog_id`, `blog_title`, `blog_category_id`, `blog_user_id`, `blog_detels`, `blog_tag`, `blog_image`, `blog_date`, `blog_status`, `created_at`, `updated_at`) VALUES
(26, 'demo title laravel templates', 5, 33, 'demo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templates', 'demo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templates', 'image/5obwfbT2Oefvr3PE19is.png', '2018-10-29 16:32:49', 0, NULL, NULL),
(27, 'demo title laravel templates', 6, 33, 'demo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templates', 'demo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templates', 'image/7o4tvVlotF072pWkP0I7.png', '2018-10-29 16:33:07', 0, NULL, NULL),
(28, 'demo title laravel templates', 7, 33, 'demo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templates', 'demo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templates', 'image/yEwlUrIn6XfxoxmxlKYD.png', '2018-10-29 16:33:27', 0, NULL, NULL),
(29, 'demo title laravel templates', 7, 33, 'demo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templates', 'demo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templates', 'image/FeNr612GPl5P2oIpGXFa.png', '2018-10-29 16:34:01', 0, NULL, NULL),
(30, 'demo title laravel templates', 9, 33, 'demo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templates', 'demo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templatesdemo title laravel templates', 'image/L0TLZDdL9s9KkTji3EUL.png', '2018-10-29 16:34:28', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` int(11) NOT NULL DEFAULT '0',
  `category_type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_status`, `category_type`, `created_at`, `updated_at`) VALUES
(2, 'cat', 0, 2, NULL, NULL),
(3, 'woman', 0, 2, NULL, NULL),
(4, 'news', 0, 1, NULL, NULL),
(5, 'country', 0, 1, NULL, NULL),
(6, 'play', 0, 1, NULL, NULL),
(7, 'top news', 0, 1, NULL, NULL),
(8, 'wathe', 0, 2, NULL, NULL),
(9, 'Man', 0, 1, NULL, NULL),
(10, 'php', 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gelleries`
--

CREATE TABLE `gelleries` (
  `gellery_id` int(10) UNSIGNED NOT NULL,
  `phote_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phote_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phote_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gelleries`
--

INSERT INTO `gelleries` (`gellery_id`, `phote_name`, `phote_image`, `phote_status`, `created_at`, `updated_at`) VALUES
(10, 'domo', 'image/SR14xJRp1AYpYPLm4lIY.jpg', 0, NULL, NULL),
(11, 'domo', 'image/RHNEpq00dScB1YBWJS6O.jpg', 0, NULL, NULL),
(12, 'domo', 'image/WwFlgCNY9zZryhpldyB9.jpg', 0, NULL, NULL),
(13, 'domo', 'image/uPq8uikxpWGYbcFyWaea.jpg', 0, NULL, NULL),
(14, 'demo', 'image/OTDqAoHKJZXaMEOZH7wU.jpg', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_09_20_164022_create_services_table', 1),
(2, '2018_09_21_091047_create_categories_table', 2),
(3, '2018_09_22_105807_create_blogs_table', 3),
(4, '2018_09_23_172539_create_sliders_table', 4),
(5, '2018_09_24_112152_create_admins_table', 5),
(7, '2018_09_24_162656_create_team_mambers_table', 6),
(9, '2018_09_27_093652_create_products_table', 7),
(11, '2018_10_03_115626_create_tbl_customer_table', 8),
(12, '2018_10_05_031524_create_tbl_orders_table', 9),
(13, '2018_10_05_162212_create_tbl_contacks_table', 10),
(14, '2018_10_06_164101_create_tbl_comments_table', 11),
(15, '2018_10_12_151831_create_gelleries_table', 12),
(16, '2018_10_14_024919_create_seo_table', 13),
(18, '2019_01_26_161149_create_shepping_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_detels` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_image`, `product_category_id`, `product_detels`, `product_tags`, `product_price`, `product_status`, `created_at`, `updated_at`) VALUES
(11, 'demo Product pgtemplates', 'image/LgXzyIMcvMuYphPlJRgc.png', 2, 'demo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplates', 'demo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplates', 22, 0, NULL, NULL),
(12, 'demo Product pgtemplates', 'image/nd1lV44ojNOMqJmfXcHp.png', 3, 'demo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplates', 'demo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplates', 22, 0, NULL, NULL),
(13, 'demo Product pgtemplates', 'image/gvDzEHge5uve0kdxAcnC.png', 8, 'demo Product pgtemplates demo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplates', 'demo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplates', 22, 0, NULL, NULL),
(14, 'demo Product pgtemplates', 'image/lj4tYl4lvBm3MKh3OoUa.png', 2, 'demo Product pgtemplates demo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplates', 'demo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplates', 22, 0, NULL, NULL),
(15, 'demo Product pgtemplates', 'image/uWKJLltsNJHhxwhaWIWR.png', 3, 'demo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplates', 'demo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplates', 22, 0, NULL, NULL),
(16, 'demo Product pgtemplates', 'image/LWsluk7q06dqTpbIWgao.png', 8, 'demo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplates', 'demo Product pgtemplates demo Product pgtemplates', 22, 0, NULL, NULL),
(17, 'demo Product pgtemplates', 'image/4nrHDSrpMmHm439GVJZU.png', 8, 'demo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplates', 'demo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplates', 22, 0, NULL, NULL),
(18, 'demo Product pgtemplates', 'image/NwNSELjXSD3vjv26ZBrO.png', 2, 'demo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplates', 'demo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplates', 22, 0, NULL, NULL),
(19, 'demo Product pgtemplates', 'image/OTt1FbyU8k0djXzcPgDJ.png', 3, 'demo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplates', 'demo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplates', 22, 0, NULL, NULL),
(20, 'demo Product pgtemplates', 'image/vi6qvvsHMYIHhcj4xysh.png', 2, 'demo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplates', 'demo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplatesdemo Product pgtemplates', 22, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `website_id` int(10) UNSIGNED NOT NULL,
  `website_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_detels` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_tags` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`website_id`, `website_title`, `website_detels`, `website_tags`, `website_image`, `created_at`, `updated_at`) VALUES
(1, 'Mit-Farm website title', 'Search engine optimization (SEO)There are many of passages of Lorem Ipsum is a available but the majority have suffered alteration injectedSearch engine optimization (SEO)There are many of passages of Lorem Ipsum is a available but the majority have suffered alteration injectedSearch engine optimization (SEO)There are many of passages of Lorem Ipsum is a available but the majority have suffered alteration injectedSearch engine optimization (SEO)There are many of passages of Lorem Ipsum is a available but the majority have suffered alteration injectedSearch engine optimization (SEO)There are many of passages of Lorem Ipsum is a available but the majority have suffered alteration injectedSearch engine optimization (SEO)There are many of passages of Lorem Ipsum is a available but the majority have suffered alteration injected', 'mit farm ,MIT FARM ,mitfarm ,mit farm ,MIT FARM ,mitfarm ,mit farm ,MIT FARM ,mitfarm ,mit farm ,MIT FARM ,mitfarm ,mit farm ,MIT FARM ,mitfarm ,mit farm ,MIT FARM ,mitfarm ,mit farm ,MIT FARM ,mitfarm ,mit farm ,MIT FARM ,mitfarm ,mit farm ,MIT FARM ,mitfarm ,mit farm ,MIT FARM ,mitfarm ,mit farm ,MIT FARM ,mitfarm ,mit farm ,MIT FARM ,mitfarm ,mit farm ,MIT FARM ,mitfarm ,mit farm ,MIT FARM ,mitfarm ,mit farm ,MIT FARM ,mitfarm ,', 'image/2LysmP7vLXNX6NSj2UUv.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(10) UNSIGNED NOT NULL,
  `service_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_detels` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_type` varchar(23) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_title`, `service_image`, `service_detels`, `service_type`, `service_status`, `created_at`, `updated_at`) VALUES
(30, 'demo Service Title  laravel template', 'image/8wHGVqTjcUN30MToYKCp.png', 'demo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel template', '1', 0, NULL, NULL),
(31, 'demo Service Title  laravel template', 'image/9BUW8gnVCWDct6Le9Lzd.png', 'demo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel template', '1', 0, NULL, NULL),
(32, 'demo Service Title  laravel template', 'image/FPxWjRqFVfPBY3mgmr9C.png', 'demo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel template', '1', 0, NULL, NULL),
(39, 'demo Service Title  laravel template', 'image/aJflAz0I09goNKbsw3fg.png', 'demo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel template', '3', 0, NULL, NULL),
(40, 'demo Service Title  laravel template', 'image/kAZrwtY8XOmU9zQDA1gJ.png', 'demo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel template', '3', 0, NULL, NULL),
(41, 'demo Service Title  laravel template', 'image/uignw6XlFGPK9kpiJsb0.png', 'demo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel template', '3', 0, NULL, NULL),
(42, 'demo Service Title  laravel template', 'image/T37g46UY7DpFiFBXsGWU.png', 'demo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel template', '3', 0, NULL, NULL),
(43, 'demo Service Title  laravel template', 'image/63EghquKGNYKgmu26TKY.png', 'demo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel template', '3', 0, NULL, NULL),
(44, 'demo Service Title  laravel template', 'image/xijo4iKRnvZCi4rYgCu1.png', 'demo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel temp', '3', 0, NULL, NULL),
(45, 'demo Service Title  laravel template', 'image/z05x5GD4kotCYipIw8Qo.png', 'demo Service Title  laravel template', '3', 0, NULL, NULL),
(46, 'demo Service Title  laravel template', 'image/IvnqaziiFopb3foHDZYw.png', 'demo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel templatedemo Service Title  laravel temp', '3', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shepping`
--

CREATE TABLE `shepping` (
  `sheping_id` int(10) UNSIGNED NOT NULL,
  `sheping_customer_id` int(11) NOT NULL,
  `sheping_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sheping_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sheping_adders` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sheping_zip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sheping_city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sheping_country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sheping_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shepping`
--

INSERT INTO `shepping` (`sheping_id`, `sheping_customer_id`, `sheping_name`, `sheping_phone`, `sheping_adders`, `sheping_zip`, `sheping_city`, `sheping_country`, `sheping_status`, `created_at`, `updated_at`) VALUES
(15, 33, 'gd', '3466', 'gf', '55', 'gdf', 'dfg', 0, NULL, NULL),
(16, 33, 'parvez', '01861559750', 'Rahimanager', '3632', 'Kachua', 'Bangladesh', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `slider_id` int(10) UNSIGNED NOT NULL,
  `slider_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`slider_id`, `slider_title`, `slider_image`, `slider_status`, `created_at`, `updated_at`) VALUES
(7, 'demo slider laravel template', 'image/uYkd83cBlpXRxIoaRtIR.png', 0, NULL, NULL),
(8, 'demo slider laravel template', 'image/xMToMZlWoh5UKme9m1uI.png', 0, NULL, NULL),
(9, 'demo slider laravel template', 'image/OW3Sr7QrtdeJ2kIBpxhE.png', 0, NULL, NULL),
(10, 'demo slider laravel template', 'image/2CzPK0vLGKVrXdE35Ry0.png', 0, NULL, NULL),
(11, 'demo slider laravel template', 'image/uuPtmLA1zyYGsqkXrjip.png', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `comment_id` int(10) UNSIGNED NOT NULL,
  `comments_blog_id` int(11) NOT NULL,
  `comment_service_id` int(11) NOT NULL DEFAULT '0',
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_massage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_comments`
--

INSERT INTO `tbl_comments` (`comment_id`, `comments_blog_id`, `comment_service_id`, `user_name`, `user_email`, `user_massage`, `user_status`, `created_at`, `updated_at`) VALUES
(2, 0, 9, 'fd', 'parvez@gmail.com', 's dsfd gdfg sfdg sdfdf gsf', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contacks`
--

CREATE TABLE `tbl_contacks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `massage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_contacks`
--

INSERT INTO `tbl_contacks` (`id`, `name`, `email`, `massage`, `type`, `created_at`, `updated_at`) VALUES
(44, 'Parvez gazi', 'gaziparvez452@gmail.com', 'You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from', 1, NULL, NULL),
(45, 'Juwel', 'storybook133@gmail.com', 'inbox You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from You can contact or visit us in our office from', 1, NULL, NULL),
(46, 'parvez gazi', 'php@gmail.com', 'g dfgd', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_type` int(11) NOT NULL DEFAULT '0',
  `code` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_photo`, `customer_name`, `customer_email`, `customer_password`, `customer_phone`, `customer_city`, `customer_type`, `code`, `created_at`, `updated_at`) VALUES
(33, 'image/iG6MOcM6EMvsaIaqW2PS.png', 'parvez', 'gaziparvez452@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1861559750', 'Kachua', 0, 114004497, NULL, NULL),
(34, 'image/fNsSCzhKSsmb01EQAb99.jpg', 'parvez gazi', 'storybook133@gmail.com', 'b9c5f038e9c412ac0171c7c8eed09c8d', '01861559750', 'Kachua', 0, 366099605, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `sheping_id` int(11) NOT NULL,
  `or_product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `or_product_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `or_product_qty` int(11) NOT NULL,
  `or_product_price` int(23) NOT NULL,
  `or_product_total` int(11) NOT NULL,
  `order_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT '0',
  `order_pandding` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_id`, `product_id`, `customer_id`, `sheping_id`, `or_product_name`, `or_product_image`, `or_product_qty`, `or_product_price`, `or_product_total`, `order_type`, `order_status`, `order_pandding`, `created_at`, `updated_at`) VALUES
(19, 16, 33, 15, 'Light Led', 'image/IlDxR0EXaGrgx1rugl3S.png', 1, 567, 567, 'Hand Cash', 0, 1, NULL, NULL),
(20, 15, 33, 15, 'Microsoft Office', 'image/9IIRyUCIeTPZsNWmaWG4.jpg', 3, 567, 1701, 'Hand Cash', 0, 1, NULL, NULL),
(21, 13, 33, 15, 'Gstar', 'image/rZ1mnPUGinytXRJhpJnK.jpg', 4, 456, 1824, 'Hand Cash', 0, 1, NULL, NULL),
(22, 11, 33, 16, 'Loptop', 'image/qejoHhHffsLNWCjkgOGv.jpg', 1, 456, 456, 'Hand Cash', 0, 1, NULL, NULL),
(23, 13, 33, 16, 'Gstar', 'image/rZ1mnPUGinytXRJhpJnK.jpg', 1, 456, 456, 'Hand Cash', 0, 1, NULL, NULL),
(24, 14, 33, 16, 'Led Lemp', 'image/ypxzCZwXBntsZvZRJcul.png', 1, 56, 56, 'Hand Cash', 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `team_mambers`
--

CREATE TABLE `team_mambers` (
  `member_id` int(10) UNSIGNED NOT NULL,
  `member_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_detels` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_type` int(11) NOT NULL,
  `member_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_mambers`
--

INSERT INTO `team_mambers` (`member_id`, `member_name`, `member_image`, `member_detels`, `member_type`, `member_status`, `created_at`, `updated_at`) VALUES
(19, 'md parvez gaziss', 'image/fhYNMcCCy5sEFpNFASZA.jpg', 'fgh', 1, 1, NULL, NULL),
(20, 'md parvez gazi', 'image/panrL9OcixWaJ6aylFVo.png', 'fgh', 2, 1, NULL, NULL),
(21, 'md parvez', 'image/ENEM6QWBb5VSSMWeJcxC.png', 'cvb', 3, 1, NULL, NULL),
(22, 'xcvb', 'image/A5LEHnD9vkGAKL2bpwXO.png', 'xcvb', 3, 1, NULL, NULL),
(23, 'jowel', 'image/GBYoET4zFkSMnkePRnBB.jpg', 'cvb', 4, 1, NULL, NULL),
(24, 'rakive', 'image/dtadLjdeErXsqKFcf0Wa.jpg', 'cvb', 5, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `uds`
--

CREATE TABLE `uds` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uds`
--

INSERT INTO `uds` (`id`, `name`, `price`, `date`) VALUES
(1, 'e-commers templates in laravel', '101', '2019');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `gelleries`
--
ALTER TABLE `gelleries`
  ADD PRIMARY KEY (`gellery_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`website_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `shepping`
--
ALTER TABLE `shepping`
  ADD PRIMARY KEY (`sheping_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tbl_contacks`
--
ALTER TABLE `tbl_contacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `team_mambers`
--
ALTER TABLE `team_mambers`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `uds`
--
ALTER TABLE `uds`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gelleries`
--
ALTER TABLE `gelleries`
  MODIFY `gellery_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `seo`
--
ALTER TABLE `seo`
  MODIFY `website_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `shepping`
--
ALTER TABLE `shepping`
  MODIFY `sheping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `slider_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `comment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_contacks`
--
ALTER TABLE `tbl_contacks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `team_mambers`
--
ALTER TABLE `team_mambers`
  MODIFY `member_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `uds`
--
ALTER TABLE `uds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
