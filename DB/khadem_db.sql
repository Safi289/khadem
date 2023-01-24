-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2023 at 11:17 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khadem_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `product_quantity`, `product_price`, `user_ip`, `created_at`, `updated_at`) VALUES
(160, 22, 1, '215', '127.0.0.1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_description`, `category_slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'example', '', 'example', 0, '2020-10-12 13:33:48', '2020-10-23 09:05:47', NULL),
(5, 'blueprint', '', 'blueprint', 0, '2020-10-12 13:38:59', '2023-01-23 06:02:37', '2023-01-23 06:02:37'),
(8, 'java script', '', 'java script', 0, '2020-10-12 13:55:21', '2020-11-04 19:53:55', NULL),
(9, 'php', '', 'php', 0, '2020-10-12 13:59:29', '2020-10-23 09:05:33', NULL),
(12, 'জায়নামাজ', 'test mat', 'জায়নামাজ', 1, '2020-10-23 15:27:29', '2020-11-06 18:10:44', NULL),
(13, 'ইসলামিক বই', 'sample book', 'ইসলামিক বই', 0, '2020-10-23 15:27:55', '2020-11-22 13:38:18', NULL),
(15, 'Food', 'রিলিজিয়াস স্টাফ গুলো সবার নাগালে আনাই আমাদের স্বপ্ন,,,,,,', 'Food', 1, '2020-10-26 23:36:31', '2020-11-06 18:12:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courier` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checkouts`
--

INSERT INTO `checkouts` (`id`, `customer_name`, `phone_number`, `address`, `city`, `courier`, `payment`, `total_price`, `shipping_price`, `notes`, `user_ip`, `created_at`, `updated_at`) VALUES
(52, 'safi', '01521100281', 'jaleswaritola', 'bogra', NULL, '', '1400', '', 'hi', '127.0.0.1', '2020-10-24 07:00:51', '2020-10-24 07:00:51'),
(53, 'rafi', '01911160762', 'mahanagar', 'dhaka', NULL, '', '350', '', 'hi', '127.0.0.1', '2020-10-24 07:36:13', '2020-10-24 07:36:13'),
(54, 'sahid', '7565745385', 'rahman nagar', 'bogura', NULL, '', '1400', '', 'ssssssssssssss', '127.0.0.1', '2020-10-24 16:17:23', '2020-10-24 16:17:23'),
(55, 'kafi', '12345678', 'banani', 'sirajganj', NULL, '', '1650', '', 'hhiiihjiii', '127.0.0.1', '2020-10-24 18:49:35', '2020-10-24 18:49:35'),
(56, 'sohel', '017223452424', 'manikganj', 'dhaka', NULL, '', '1530', '', 'new order', '127.0.0.1', '2020-10-26 23:31:00', '2020-10-26 23:31:00'),
(57, 'safi ul sahid', '01911160762', 'manikganj', 'bogura', NULL, '', '1480', '100', 'sample order', '127.0.0.1', '2020-10-27 10:38:05', '2020-10-27 10:38:05'),
(58, 'mohaimanul', '01911160762', 'koigari', 'bogura', NULL, '', '2840', '', 'test order', '127.0.0.1', '2020-11-01 11:03:07', '2020-11-01 11:03:07'),
(59, 'safi', '01521100281', 'naogaon', 'bogra', NULL, '', '2180', '500', 'hhhhhhh', '127.0.0.1', '2020-11-04 10:15:41', '2020-11-04 10:15:41'),
(60, 'nafi', '866554433', 'cumilla', 'bogura', NULL, '', '740', '500', 'hello', '127.0.0.1', '2020-11-04 18:07:23', '2020-11-04 18:07:23'),
(61, 'sahid', '017223452424', 'chittagong', 'pabna', NULL, '', '2160', '100', 'fffffffff', '127.0.0.1', '2020-11-08 21:24:52', '2020-11-08 21:24:52'),
(62, 'kafi', '01911160762', 'manikganj', 'sirajganj', NULL, '', '2570', '80', 'ggfsgfxhg', '127.0.0.1', '2020-11-09 12:59:15', '2020-11-09 12:59:15'),
(64, 'rizu', '01521100281', 'barisal', 'dhaka', NULL, '', '215', '50', 'bbbbbbbbbbbbbbb', '127.0.0.1', '2020-11-11 13:56:21', '2020-11-11 13:56:21'),
(67, 'rafi', '01521100281', 'barisal', 'dhaka', NULL, '', '900', '120', 'cccccccccccc', '127.0.0.1', '2020-11-11 14:16:33', '2020-11-11 14:16:33'),
(68, 'ahmad', '01890365343', 'jaleswaritola', 'bogura', 'Sundarban Courier', '', '2560', '120', 'test notes', '127.0.0.1', '2020-11-16 14:00:04', '2020-11-16 14:00:04'),
(69, 'kafi', '01521100281', 'barisal', 'dhaka', 'Sundarban Courier', 'Card', '740', '100', 'bbbbbbbbbbbbbb', '127.0.0.1', '2020-11-16 16:28:44', '2020-11-16 16:28:44'),
(70, 'mohaimanul', '01521100281', 'manikganj sadar', 'pabna', 'Sundarban Courier', 'Mobile', '740', NULL, 'hello', '127.0.0.1', '2020-11-19 17:32:57', '2020-11-19 17:32:57'),
(71, 'mim', '0152', 'manikganj', 'dhaka', 'Sundarban Courier', 'Card', '1080', '500', 'hi', '127.0.0.1', '2020-11-19 17:34:16', '2020-11-19 17:34:16'),
(72, 'kafi', '01521100281', 'manikganj', 'bogra', 'Sundarban Courier', 'Card', '1000', '100', 'gggggggggggggg', '127.0.0.1', '2020-11-24 12:40:47', '2020-11-24 12:40:47'),
(73, 'mafi', '017223452424', 'manikganj', 'dhaka', 'Sundarban Courier', 'Bkash', '300', NULL, '01911160762', '127.0.0.1', '2020-11-24 16:40:54', '2020-11-24 16:40:54'),
(74, 'Hello', '01911160762', 'Romena Afaz Complex, Jaleswaritola', 'Bogra', 'SA Paribahan', 'Cash On Delivery', '1400', '100', '01521100281', '127.0.0.1', '2020-11-24 19:01:20', '2020-11-24 19:01:20'),
(75, 'safi', '01521100281', 'Banani', 'Dhaka', NULL, 'Cash On Delivery', '700', '100', 'Cash On Delivery', '127.0.0.1', '2022-10-31 11:45:42', '2022-10-31 11:45:42'),
(76, 'Sahid', '01911160762', 'Romena Afaz Road', 'bogra', NULL, 'Cash On Delivery', '300', '60', 'Cash On Delivery', '127.0.0.1', '2022-10-31 11:56:47', '2022-10-31 11:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `company_description`, `company_phone`, `company_email`, `company_address`, `company_logo`, `created_at`, `updated_at`) VALUES
(1, 'Khadem Islamic Shop', 'রিলিজিয়াস স্টাফ গুলো সবার নাগালে আনাই আমাদের স্বপ্ন,,', '01936-467459', 'khademonlineshop@gmail.com', 'Bogura', 'images/company/1683719351756293.jpg', '2020-11-18 16:37:46', '2020-11-18 17:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_name`, `user_email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'dream', 'safi@gmail.com', 'test subject', 'test message', '2020-11-18 15:28:05', '2020-11-18 15:28:05'),
(2, 'safi', 'everythingdies821@gmail.com', 'sample', 'sample message', '2020-11-18 15:28:59', '2020-11-18 15:28:59');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `normal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `email_verified_at`, `password`, `normal`, `remember_token`, `address`, `phone`, `city`, `created_at`, `updated_at`) VALUES
(1, 'mohaimanul', 'mim@gmail.com', NULL, '$2y$10$MvI2X5DcsXkTsgFirjyI6OBb.GZRHdjBAzhcdp30QiGPtpbj7LY5K', '12345678', 'EfDn6AVqpcecqMl8GR5cQuTcJsICAFgwDEAalSaNlvP8tsNn8I2uRcaOmhL9', 'manikganj sadar', '01521100281', 'pabna', NULL, '2020-11-24 18:53:29'),
(6, 'Rafi', 'ssahid151289@bscse.uiu.ac.bd', NULL, '$2y$10$jSkgFp33rdoWYkuXXvCmLedObyMnkdrhQZ3LWm7hSljwwV9a4dcb2', '', '8H6CZDJv8m7oZMN6GtSg6cuXbaCtJjYewj1UWhnQtVX2DqfmvFpfF59dfUqA', 'mohanagar', '01911160762', 'dhaka', '2020-10-27 12:12:38', '2020-11-20 14:12:20'),
(9, 'slayer Band', 'everythingdies821@gmail.com', NULL, '$2y$10$v3TT4O.aTnSgcGHTevOPuOBW71kASKEMgFTnG/.OooLqzqMl8NPzC', '', '00LDw7HyFfz50fdbdrQjXUfKz35eGlopsTmLEgpsrqyTSXqsxIXzdCHHJiEU', 'jaleswaritola', '01521100281', 'bogra', '2020-11-07 17:52:39', '2020-11-20 14:11:23'),
(13, 'Sahid', 'sahid@gmail.com', NULL, '$2y$10$nL040wSZCm1/84ruqyHaEOW4XNEDXBcHsjPdwWQuVy2.yeNtH3eM.', '', 'bCCbMH1xB16bBcQBKOJGPz1Ue2QRKqzu4hYj4N49xCMiw7kFhaoBI0Kl6ZBG', 'Romena Afaz Road', '01911160762', 'bogra', '2020-11-20 14:12:58', '2020-11-20 14:13:39');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_10_12_182748_create_categories_table', 2),
(5, '2020_10_15_164005_create_products_table', 3),
(6, '2020_10_15_171252_add_product_price_prev_to_products_table', 4),
(7, '2020_10_18_153339_create_carts_table', 5),
(8, '2020_10_19_182131_create_checkouts_table', 6),
(9, '2020_10_21_151254_create_orders_table', 7),
(10, '2020_10_27_001637_create_customers_table', 8),
(11, '2020_11_16_203932_create_payments_table', 9),
(12, '2020_11_18_210258_create_contacts_table', 10),
(13, '2020_11_18_220005_create_companies_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `checkout_id` bigint(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `checkout_id`, `product_id`, `product_quantity`, `product_price`, `user_ip`, `created_at`, `updated_at`) VALUES
(38, 52, 17, 2, '350', '127.0.0.1', '2020-10-24 07:00:51', '2020-10-24 07:00:51'),
(39, 52, 16, 1, '700', '127.0.0.1', '2020-10-24 07:00:51', '2020-10-24 07:00:51'),
(40, 53, 17, 1, '350', '127.0.0.1', '2020-10-24 07:36:13', '2020-10-24 07:36:13'),
(41, 54, 16, 2, '700', '127.0.0.1', '2020-10-24 16:17:23', '2020-10-24 16:17:23'),
(42, 55, 18, 3, '550', '127.0.0.1', '2020-10-24 18:49:35', '2020-10-24 18:49:35'),
(43, 56, 16, 1, '700', '127.0.0.1', '2020-10-26 23:31:00', '2020-10-26 23:31:00'),
(44, 56, 15, 1, '280', '127.0.0.1', '2020-10-26 23:31:00', '2020-10-26 23:31:00'),
(45, 56, 18, 1, '550', '127.0.0.1', '2020-10-26 23:31:00', '2020-10-26 23:31:00'),
(46, 57, 19, 2, '740', '127.0.0.1', '2020-10-27 10:38:05', '2020-10-27 10:38:05'),
(47, 58, 16, 3, '700', '127.0.0.1', '2020-11-01 11:03:07', '2020-11-01 11:03:07'),
(48, 58, 19, 1, '740', '127.0.0.1', '2020-11-01 11:03:07', '2020-11-01 11:03:07'),
(49, 59, 19, 2, '740', '127.0.0.1', '2020-11-04 10:15:41', '2020-11-04 10:15:41'),
(50, 59, 16, 1, '700', '127.0.0.1', '2020-11-04 10:15:41', '2020-11-04 10:15:41'),
(51, 60, 19, 1, '740', '127.0.0.1', '2020-11-04 18:07:23', '2020-11-04 18:07:23'),
(52, 61, 20, 2, '1080', '127.0.0.1', '2020-11-08 21:24:52', '2020-11-08 21:24:52'),
(53, 62, 19, 3, '740', '127.0.0.1', '2020-11-09 12:59:15', '2020-11-09 12:59:15'),
(54, 62, 17, 1, '350', '127.0.0.1', '2020-11-09 12:59:15', '2020-11-09 12:59:15'),
(55, 64, 22, 1, '215', '127.0.0.1', '2020-11-11 13:56:21', '2020-11-11 13:56:21'),
(58, 67, 21, 3, '300', '127.0.0.1', '2020-11-11 14:16:33', '2020-11-11 14:16:33'),
(59, 68, 20, 1, '1080', '127.0.0.1', '2020-11-16 14:00:04', '2020-11-16 14:00:04'),
(60, 68, 19, 2, '740', '127.0.0.1', '2020-11-16 14:00:04', '2020-11-16 14:00:04'),
(61, 69, 19, 1, '740', '127.0.0.1', '2020-11-16 16:28:44', '2020-11-16 16:28:44'),
(62, 70, 19, 1, '740', '127.0.0.1', '2020-11-19 17:32:57', '2020-11-19 17:32:57'),
(63, 71, 20, 1, '1080', '127.0.0.1', '2020-11-19 17:34:16', '2020-11-19 17:34:16'),
(64, 72, 16, 1, '700', '127.0.0.1', '2020-11-24 12:40:47', '2020-11-24 12:40:47'),
(65, 72, 21, 1, '300', '127.0.0.1', '2020-11-24 12:40:47', '2020-11-24 12:40:47'),
(66, 73, 21, 1, '300', '127.0.0.1', '2020-11-24 16:40:54', '2020-11-24 16:40:54'),
(67, 74, 16, 2, '700', '127.0.0.1', '2020-11-24 19:01:20', '2020-11-24 19:01:20'),
(68, 75, 17, 2, '350', '127.0.0.1', '2022-10-31 11:45:42', '2022-10-31 11:45:42'),
(69, 76, 21, 1, '300', '127.0.0.1', '2022-10-31 11:56:47', '2022-10-31 11:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `method_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `method_name`, `method_description`, `created_at`, `updated_at`) VALUES
(1, 'Bkash', 'send last 4 digit', '2020-11-16 15:14:35', '2020-11-24 13:13:27'),
(3, 'Cash On Delivery', 'sample111', '2020-11-16 15:16:06', '2020-11-16 16:03:27'),
(6, 'Card', 'test card', '2020-11-16 15:18:47', '2020-11-16 15:18:47'),
(7, 'Mobile', 'Test sample', '2020-11-16 16:37:49', '2020-11-16 16:38:02');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `writer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publisher` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price_prev` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` decimal(10,0) NOT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `writer`, `publisher`, `page_no`, `size`, `product_quantity`, `product_unit`, `product_price_prev`, `product_price`, `product_image`, `product_description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '4', 'sample product', '', NULL, NULL, NULL, '1', 'kg', NULL, '400', 'images/products/phpF80.tmp.jpg', 'test', 1, '2020-10-15 10:55:58', '2020-10-16 15:01:54', '2020-10-16 15:01:54'),
(2, '7', 'test', '', NULL, NULL, NULL, '5', 'gm', NULL, '250', 'images/products/phpA995.tmp.jpg', 'sample', 1, '2020-10-15 10:58:49', '2020-10-16 18:06:58', '2020-10-16 18:06:58'),
(3, '8', 'java', '', NULL, NULL, NULL, '3', 'ml', NULL, '550', 'images/products/php5FE9.tmp.jpg', 'hello', 0, '2020-10-15 11:24:43', '2020-10-16 18:06:55', '2020-10-16 18:06:55'),
(4, '10', 'hello', '', NULL, NULL, NULL, NULL, NULL, NULL, '300', 'images/products/phpF363.tmp.jpg', 'hihihi', 1, '2020-10-15 11:28:37', '2020-10-16 18:06:52', '2020-10-16 18:06:52'),
(5, '10', 'hi there', '', NULL, NULL, NULL, '5', 'ml', NULL, '400', 'images/products/php1762.tmp.jpg', 'ccbcbb', 1, '2020-10-15 12:24:29', '2020-10-16 14:56:20', '2020-10-16 14:56:20'),
(6, '3', 'abcd', '', NULL, NULL, NULL, '5', 'kg', NULL, '400', 'images/products/phpB3F1.tmp.jpg', 'vngjg', 1, '2020-10-15 12:25:09', '2020-10-16 14:58:59', '2020-10-16 14:58:59'),
(7, '3', 'test111', '', NULL, NULL, NULL, '5', 'ml', NULL, '550', 'images/products/1680643731256599.jpg', 'asssccc', 1, '2020-10-15 12:32:41', '2020-10-16 15:28:10', '2020-10-16 15:28:10'),
(8, '7', 'safi', '', NULL, NULL, NULL, '5', 'ml', '300', '444', 'images/products/1680743816791106.jpg', 'fffff', 1, '2020-10-16 15:03:30', '2020-10-16 15:04:25', '2020-10-16 15:04:25'),
(9, '4', 'test', '', NULL, NULL, NULL, '1', 'kg', '600', '400', 'images/products/1680755446501184.jpg', 'aaaaaaaaaaaaaa', 1, '2020-10-16 18:08:21', '2020-10-16 18:10:03', '2020-10-16 18:10:03'),
(10, '4', 'java1234', '', NULL, NULL, NULL, '1', 'kg', '3005', '2505', NULL, 'abcdxxx', 1, '2020-10-16 18:13:00', '2020-10-16 18:39:59', '2020-10-16 18:39:59'),
(11, '4', 'hello there', '', NULL, NULL, NULL, '1', 'kg', '600', '400', 'images/products/1680757490197488.jpg', 'xcxc', 1, '2020-10-16 18:40:50', '2020-10-16 18:46:20', '2020-10-16 18:46:20'),
(12, '4', 'test111', '', NULL, NULL, NULL, '1', 'kg', '600', '2505', NULL, 'bbnbm', 1, '2020-10-16 18:42:40', '2020-10-16 18:46:17', '2020-10-16 18:46:17'),
(13, '7', 'java789xxx', '', NULL, NULL, NULL, '1', 'ml', '600', '444', 'images/products/1680758050461875.jpg', 'aaaaaaa', 1, '2020-10-16 18:46:51', '2020-10-16 19:06:49', '2020-10-16 19:06:49'),
(14, '7', 'sample prod', '', NULL, NULL, NULL, '1', 'kg', '600', '2505', 'images/products/1680759285032154.jpg', 'sample product', 1, '2020-10-16 19:09:22', '2020-11-22 13:23:15', '2020-11-22 13:23:15'),
(15, '8', 'Java Product', '', NULL, NULL, NULL, '2', 'gm', '330', '280', 'images/products/1680809755571663.jpg', 'জাভা', 0, '2020-10-17 08:31:34', '2022-10-31 12:17:33', NULL),
(16, '12', 'কম্বল জায়নামায', NULL, NULL, NULL, '27 x 43 inch', NULL, NULL, NULL, '700', 'images/products/1681379727828774.jpg', 'একজন মুসলিমের জীবনের অপরিহার্য একটি অংশ। একটা সময় ছিল যখন মানুষ বিপদে পরলে ওজু করে ২রাকাত নামাযে দাঁড়িয়ে যেতেন। \r\nদুনিয়ার পথে চলতে গিয়ে যে কোনন পরিস্থিতির সমাধান তারা সরাসরি আল্লহ এর থেকে করে নিতেন ২ রাকাত নামাযের দ্বারা। \r\nসন্তান মারা গেছে একজন সাহাবীর। ২ রাকাত নামায পড়েছেন। মৃত সন্তান কে আল্লহ জীবিত করে দিয়েছেন। ক্ষেতে পানির দরকার, ২ রাকাত নামায পড়েছেন। এক খন্ড মেঘ এসে তার ক্ষেতে পানি দিয়ে চলে গেল।\r\n২ রাকাত নামায সহজ নাকি শ্যালো মেশিন,ইলেক্টেইসিটির ব্যবস্থা করা, মেশিন চালাতে তেল এর ব্যবস্থা করা অধিক সহজ?\r\nআজ আমরা আল্লহ এর থেকে চেয়ে নিতে ভুলে গিয়েছি। নামায কে শুধু আখিরাত এর জন্য রেখেছি।', 1, '2020-10-23 15:31:02', '2020-11-10 18:44:39', NULL),
(17, '13', 'হাদীসে কুদসী', '', NULL, NULL, NULL, NULL, NULL, '600', '350', 'images/products/1681380010444711.jpg', 'সুস্থ শরীর,সুন্দর মন\r\nগড়তে পারে সুন্দর ভূবন এই -মোটো নিয়েই #khadem_Islamic_shop এর যাত্রা। \r\nসত্যিকার অর্থে তো আল্লহ সুব হা\'নাহু ওয়া তা আ\'লা এর তৌফিক ছাড়া কিছুই সম্ভব না। কিন্তু বস্তু জগতে আসবাব এর উপর মেহনত করার শিক্ষা আল্লহ ই দিছেন। আমরা সর্বোচ্চ চেষ্টা করে যেতে পারি। হাদীসে আসছে দুর্বল ঈমানদার এর চাইতে শক্তিশালী ঈমানদার আল্লহ এর কাছে অধিক প্রিয়। আর সুস্থ শরীর এর জন্য হেলথি ডায়েট জরুরী আর রসূল স থেকে আমরা সেই শিক্ষা পাই। আর এসব নিয়েই এই বইটি সাজানো। \r\nএছাড়াও এতে থাকছে →আল্লহ এর গুণবাচক নাম\r\n                                   →হাদীসে কুদসী\r\n                                   → কুরআন এ বর্ণিত দুয়া\r\nবইটি হাতে আমাদের হাতে এসেছে আলহামদুলিল্লাহ্‌, সুম্মা আলহামদুলিল্লাহ। দেরি না করে আজই অর্ডার করে ফেলুন', 1, '2020-10-23 15:35:32', '2020-11-07 19:05:56', NULL),
(18, '14', 'test product', '', NULL, NULL, NULL, '1', 'kg', '600', '550', 'images/products/1681427843431442.jpg', 'description', 0, '2020-10-24 04:14:18', '2020-11-22 13:24:26', '2020-11-22 13:24:26'),
(19, '15', 'Honey', '', NULL, NULL, NULL, '1', 'kg', '980', '740', 'images/products/1681659621961572.jpg', 'pure honey', 0, '2020-10-26 23:38:25', '2020-11-04 19:01:23', NULL),
(20, '12', 'Turkish mat', NULL, NULL, NULL, '25 x 40 inch', NULL, NULL, '1200', '1080', 'images/products/1682461751793626.jpg', 'Very Good quality', 0, '2020-11-04 20:09:21', '2020-11-23 12:22:22', NULL),
(21, '15', 'Honey Lemon', '', NULL, NULL, NULL, '500', 'gm', NULL, '300', 'images/products/1682907878201589.jpg', 'good quality', 1, '2020-11-09 18:20:20', '2020-11-09 18:50:09', NULL),
(22, '13', 'বেলা ফুরাবার আগে', 'আরিফ আজাদ', 'সমকালীন প্রকাশন', '192', NULL, NULL, NULL, '287', '215', 'images/products/1682998255014522.jpg', 'বেলা ফুরাবার আগে (পেপারব্যাক) Description বেলা ফুরাবার আগে (পেপারব্যাক) Description বেলা ফুরাবার আগে (পেপারব্যাক) Description বেলা ফুরাবার আগে (পেপারব্যাক) Description বেলা ফুরাবার আগে (পেপারব্যাক) Description', 1, '2020-11-10 18:16:50', '2020-11-21 14:09:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `normal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `normal`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mim', 'mim@gmail.com', NULL, '$2y$10$Dy7.WhAPTyINUBnhYWYW3uNRmsLNEP5TpvKooWyYCANkZ2qEHgTaq', '12345678', NULL, NULL, '2020-11-24 18:45:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
