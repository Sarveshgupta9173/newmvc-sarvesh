-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2023 at 10:14 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project-sarvesh-gupta`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
(2, 'test222', 'test@gmail.com', '', 1, '2023-03-29 11:09:50', '2023-03-30 11:44:33'),
(3, 'name', 'test@gmail.com', '', 1, '2023-03-30 12:05:17', '2023-03-30 12:12:09'),
(19, 'as', 'as@gmail.com', '', 1, '2023-03-30 12:12:19', '2023-03-31 10:46:09'),
(20, 'jhsuh', '1111@gmail.com', '', 2, '2023-03-30 12:15:35', '2023-03-30 12:16:10'),
(21, 'qqe', '', '', 1, '2023-03-30 12:27:22', NULL),
(22, 'qqe', '', '', 1, '2023-03-30 12:27:58', NULL),
(23, 'saw', 'test@gmail.com', 'iueu387', 2, '2023-03-30 01:45:42', '2023-03-31 10:46:19'),
(24, 'dhruv', 'dhruv@gmail.com', '', 1, '2023-03-31 09:45:49', '2023-03-31 10:45:45');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(5) NOT NULL,
  `parent_id` int(10) NOT NULL,
  `path` varchar(100) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `parent_id`, `path`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(0, 0, '', 'hdgy', '', 'active', '2023-02-08 07:51:42', '2023-04-06 11:32:38'),
(8, 0, NULL, 'kkkk', 'sssssss', 'inactive', NULL, '2023-03-31 12:12:12'),
(31, 0, NULL, 'qq', 'eeeeeee', 'active', '2023-02-14 11:58:34', '2023-02-14 11:58:45'),
(32, 0, NULL, 'rrsasa', 'tttrrr', 'active', '2023-02-14 11:59:34', '2023-03-31 12:30:30'),
(48, 0, '', 'car', 'civic', 'active', '2023-03-31 02:15:07', '2023-03-31 02:17:30'),
(49, 0, '', 'bike', 'splendor', 'active', '2023-03-31 02:15:19', '2023-03-31 02:17:23'),
(56, 0, '', 'lllllll', 'uyu', 'active', '2023-03-31 02:29:49', '2023-04-06 11:55:59'),
(58, 0, '', 'uyi', 'uyuyy', 'active', '2023-04-06 11:44:39', '2023-04-06 11:47:35');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` enum('male','female','others') NOT NULL,
  `mobile` int(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `shipping_address_id` int(11) NOT NULL,
  `billing_address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `fname`, `lname`, `email`, `gender`, `mobile`, `created_at`, `updated_at`, `shipping_address_id`, `billing_address_id`) VALUES
(1, 'sarvesh', 'gupta', 'sar@gmail.com', 'male', 9173, '0000-00-00 00:00:00', '2023-04-12 11:57:19', 0, 0),
(8, 'a', 's', 'a@gmail.com', 'male', 1, '2023-02-01 19:04:24', '2023-04-12 12:45:59', 0, 0),
(11, 'dhruv ', 'tilva', 's@gmail.com', 'others', 0, '2023-02-22 02:28:29', '2023-02-22 02:33:07', 0, 0),
(12, 'dhruv ', 'tilva', 's@gmail.com', 'male', 0, '2023-02-22 02:28:50', '2023-02-22 02:32:58', 0, 0),
(24, '', '', '', 'male', 0, '2023-04-12 10:46:06', '2023-04-12 10:47:10', 0, 0),
(38, 'hdjhs', 'dnjs', '', 'male', 0, '2023-04-12 01:49:53', NULL, 0, 0),
(39, 'hghg', 'hjh', '', 'male', 0, '2023-04-12 01:56:48', NULL, 0, 0),
(40, 'patel', 'bhai', 'patel@gmail.com', 'male', 87328, '2023-04-12 01:58:38', '2023-04-12 02:18:20', 0, 0),
(43, 'jshh', '', '', 'male', 0, '2023-04-12 02:24:43', NULL, 0, 0),
(45, '', '', '', 'male', 0, '2023-04-12 02:41:09', NULL, 0, 0),
(46, '', '', '', 'male', 0, '2023-04-12 02:41:35', NULL, 0, 0),
(47, '', '', '', 'male', 0, '2023-04-12 02:42:08', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `customer_id` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `country` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zipcode` int(10) NOT NULL,
  `created_at` datetime(6) DEFAULT NULL,
  `updated_at` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`customer_id`, `address`, `country`, `city`, `state`, `zipcode`, `created_at`, `updated_at`) VALUES
(1, 'satellite', 'india', 'amdawad', 'gujrat', 7689, '2023-04-12 01:47:09.000000', '2023-04-12 11:57:19.000000'),
(40, 'surat', 'dubai', 'chorbazar', '', 6768765, '2023-04-12 01:58:38.000000', '2023-04-12 02:18:20.000000');

-- --------------------------------------------------------

--
-- Table structure for table `eav_attribute`
--

CREATE TABLE `eav_attribute` (
  `attribute_id` int(11) NOT NULL,
  `entity_type_id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `backend_type` varchar(20) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `backend_model` varchar(255) NOT NULL,
  `input_type` varchar(20) NOT NULL,
  `created_at` int(6) NOT NULL,
  `updated_at` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eav_attribute`
--

INSERT INTO `eav_attribute` (`attribute_id`, `entity_type_id`, `code`, `backend_type`, `name`, `status`, `backend_model`, `input_type`, `created_at`, `updated_at`) VALUES
(1, 1, 'color', 'int', 'Color', 1, '', 'select', 0, NULL),
(2, 1, 'style', 'int', 'Style', 1, '', 'select', 0, NULL),
(3, 1, 'short_desc', 'int', 'Short Description', 1, '', 'textarea', 0, '2023-04-11 03:10:57.000000'),
(4, 1, 'gender', 'int', 'Gender', 2, '', 'select', 2023, '2023-04-11 03:19:07.000000');

-- --------------------------------------------------------

--
-- Table structure for table `eav_attribute_option`
--

CREATE TABLE `eav_attribute_option` (
  `option_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `position` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eav_attribute_option`
--

INSERT INTO `eav_attribute_option` (`option_id`, `name`, `attribute_id`, `position`) VALUES
(1, 'Red', 1, 1),
(2, 'Black', 1, 2),
(3, 'White', 1, 3),
(4, 'Brown', 1, 4),
(5, 'Silver', 1, 5),
(6, 'Traditional', 2, 1),
(7, 'Modern', 2, 2),
(8, 'Minimilastic', 2, 1),
(9, 'Bohemian', 2, 1),
(10, 'Electric', 2, 1),
(11, 'Contemprory', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `entity_type`
--

CREATE TABLE `entity_type` (
  `entity_type_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `entity_model` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `entity_type`
--

INSERT INTO `entity_type` (`entity_type_id`, `name`, `entity_model`) VALUES
(1, 'product', ''),
(2, 'category', ''),
(3, 'customer', ''),
(4, 'vendor', ''),
(5, 'salesman', '');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `media_id` int(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `img_url` varchar(150) NOT NULL,
  `base` tinyint(4) NOT NULL,
  `thumb` tinyint(4) NOT NULL,
  `small` tinyint(4) NOT NULL,
  `gallery` tinyint(4) NOT NULL,
  `created_at` datetime(6) NOT NULL,
  `delete_` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_id`, `product_id`, `img_url`, `base`, `thumb`, `small`, `gallery`, `created_at`, `delete_`) VALUES
(1, 30, 'jean-woloszczyk-CcPE98IQJGo-unsplash.jpg', 0, 0, 0, 1, '2023-03-06 05:57:10.000000', 0),
(2, 44, 'gian-porsius-b9qBWrxmbUE-unsplash.jpg', 1, 0, 0, 0, '2023-03-06 06:27:16.000000', 0),
(3, 30, 'WhatsApp Image 2023-02-06 at 10.34.09 AM (8).jpeg', 0, 1, 0, 1, '2023-03-06 07:37:22.000000', 0),
(15, 0, 'WhatsApp Image 2023-02-06 at 10.34.09 AM.jpeg', 0, 0, 0, 0, '2023-03-25 11:38:22.000000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` enum('complete','pending') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `name`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'phonepe', 200, 'complete', NULL, NULL),
(2, 'gpayqq', 100, 'pending', NULL, NULL),
(6, 'wqe', 1112, 'pending', '0000-00-00 00:00:00', '2023-04-11 09:30:56'),
(8, 'wow', 88887777, 'complete', '0000-00-00 00:00:00', '2023-04-12 11:57:44'),
(9, 'ssss', 11177, 'complete', '2023-02-14 12:36:01', '2023-04-13 12:01:56');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `cost` int(20) NOT NULL,
  `price` int(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `cost`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(30, 'nuikkkjkj', 6722333, 673333, 699999, '2023-02-13 11:29:34', '2023-02-22 02:16:07'),
(44, 'eee', 33, 2456, 987389, '2023-02-22 01:52:22', '2023-03-27 11:02:42'),
(104, 'kahskir', 7387289, 768178, 23, '2023-03-28 11:48:46', '2023-03-28 11:59:59'),
(107, 'harrier', 150000, 0, 2, '2023-03-29 12:37:04', '2023-04-06 11:00:35'),
(132, 'jh', 0, 0, 0, '2023-04-06 11:40:41', '2023-04-11 03:30:50'),
(134, 'kji', 89, 0, 0, '2023-04-06 11:52:39', '2023-04-06 11:52:49'),
(136, 'iphone', 100000, 105000, 8, '2023-04-11 12:31:10', '2023-04-11 12:31:32');

-- --------------------------------------------------------

--
-- Table structure for table `product_int`
--

CREATE TABLE `product_int` (
  `value_id` int(11) NOT NULL,
  `entity_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salesman`
--

CREATE TABLE `salesman` (
  `sales_id` int(5) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` enum('male','female','others') NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salesman`
--

INSERT INTO `salesman` (`sales_id`, `fname`, `lname`, `email`, `gender`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ramesh', 'shah', 'ram@gmail.com', 'male', 'active', NULL, NULL),
(2, 'sarvesh', 'gupta', 'sar@gmail.com', 'female', 'inactive', NULL, '2023-02-17 10:27:19'),
(10, 'sw', 'qw', 'par@gmail.com', 'male', 'active', '2023-03-22 09:43:41', NULL),
(11, 'nik', 'parmar', 'i@gmail.com', 'female', 'inactive', '2023-02-14 12:24:54', '2023-03-16 02:36:26'),
(19, 's1', 'a', 's1@gmail.com', 'male', 'active', '2023-03-22 09:42:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salesman_price`
--

CREATE TABLE `salesman_price` (
  `entity_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `salesman_price` int(11) NOT NULL,
  `remove` enum('1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shipping_id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `amount` int(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shipping_id`, `name`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(0, 'kjsdkj', 0, 'active', '2023-04-01 06:36:14', '2023-04-01 06:39:36'),
(1, 'phone', 10000, 'active', '0000-00-00 00:00:00', NULL),
(2, 'bluetooth', 2000, 'active', '0000-00-00 00:00:00', NULL),
(8, 'wkjjilkj', 1225, 'active', '0000-00-00 00:00:00', '2023-03-01 12:34:08'),
(14, 'jhsjh', 7777, 'inactive', '2023-03-14 03:49:01', '2023-04-01 06:39:45');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(10) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` enum('male','female','others') NOT NULL,
  `company` varchar(30) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `fname`, `lname`, `email`, `gender`, `company`, `created_at`, `updated_at`) VALUES
(1, 'aditya chemical', 'rai', 'adi@gmail.com', 'male', 'cybercom', NULL, '2023-02-22 06:13:15'),
(2, 'aditya', 'rai', 'adi@gmail.com', 'male', 'cybercom creations', '2023-02-08 08:12:57', '2023-03-25 11:59:13'),
(7, 'aa', 'wwa', 'a@gmail.com', 'female', 'ss', NULL, NULL),
(12, 'zzzzz', 'zz', 'z@gmail.com', 'male', 'zzzz', '2023-02-14 02:02:03', NULL),
(20, 'dhruv', 'tilva', 'd@gmail.com', 'others', 'cybercom', '2023-02-22 05:59:47', NULL),
(21, 'dhruv', 'tilva', 'd@gmail.com', 'others', 'cybercom', '2023-02-22 06:00:06', NULL),
(23, 'surya', 'prasd', 'surya@gmail.com', 'male', 'idol', '2023-02-22 06:03:08', '2023-03-25 11:21:32'),
(27, 'aditya israel', 'patel', '', 'male', '', '2023-03-25 12:46:29', NULL),
(110, 'yash', 'variya', '', 'male', '', '2023-04-03 02:42:24', NULL),
(112, 'nik', 'parmar', 'nik@gmail.com', 'male', 'googl', '2023-04-03 02:49:00', '2023-04-03 02:49:55'),
(118, 'dshj', 'nchb', '', 'male', '', '2023-04-12 01:52:34', NULL),
(119, 'bxczhvcs', 'ndbsh', '', 'male', '', '2023-04-12 01:53:37', NULL),
(120, 'bxczhvcs', 'ndbsh', '', 'male', '', '2023-04-12 01:54:01', NULL),
(121, 'bxczhvcs', 'ndbsh', '', 'male', '', '2023-04-12 01:56:05', NULL),
(122, '', '', '', 'male', '', '2023-04-12 01:58:46', '2023-04-12 02:00:22'),
(123, '', '', '', 'male', '', '2023-04-12 02:00:13', NULL),
(124, 'kjsjk', '', '', 'male', '', '2023-04-12 02:02:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_address`
--

CREATE TABLE `vendor_address` (
  `vendor_id` int(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `country` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(30) NOT NULL,
  `zipcode` int(7) NOT NULL,
  `created_at` datetime(6) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor_address`
--

INSERT INTO `vendor_address` (`vendor_id`, `address`, `country`, `state`, `city`, `zipcode`, `created_at`, `updated_at`) VALUES
(0, '', '', '', '', 0, '2023-04-11 06:02:05.000000', '2023-04-11 06:06:03'),
(1, 'nhy', '0', '0', '0', 23444, NULL, NULL),
(2, 'xyz', 'india', 'gujrat', 'surat', 222, NULL, NULL),
(3, 'samarvai', 'india', 'dnh', 'silvassa', 396230, NULL, NULL),
(6, 'ppp', 'india', 'gujrat', 'surat', 999, NULL, NULL),
(8, 'iiii', 'india', 'gujrat', 'surat', 0, NULL, NULL),
(11, 'q', 'q', 'q', 'q', 1, NULL, NULL),
(20, 'amreli', 'india', 'gujrat', 'amdavad', 534356, NULL, NULL),
(21, 'samarvani', 'india', 'dnh', 'silvassa', 396230, NULL, NULL),
(57, '', '', '', '', 0, NULL, NULL),
(58, 'lapinoz', 'india', 'gujrat', 'patan', 278641, NULL, NULL),
(111, 'lahore', 'pakistan', '', '', 0, NULL, NULL),
(112, 'lahore', 'pakistan', '', '', 0, '2023-04-03 02:49:00.000000', NULL),
(113, '', '', '', '', 0, '2023-04-03 02:53:55.000000', '2023-04-12 10:13:15'),
(114, '', '', '', '', 0, '2023-04-06 02:16:33.000000', '2023-04-06 02:18:13'),
(115, '', '', '', '', 0, '2023-04-11 06:01:58.000000', '2023-04-12 10:12:13'),
(117, '', '', '', '', 0, '2023-04-12 10:41:00.000000', '2023-04-12 10:41:05'),
(118, 'ncjd', 'djhd', '', '', 736, '2023-04-12 01:52:34.000000', NULL),
(119, 'nbshbd', '', '', '', 0, '2023-04-12 01:53:37.000000', NULL),
(120, 'nbshbd', '', '', '', 0, '2023-04-12 01:54:01.000000', NULL),
(121, 'nbshbd', '', '', '', 0, '2023-04-12 01:56:05.000000', NULL),
(122, 'hgashgas', '', '', '', 0, '2023-04-12 02:00:13.000000', '2023-04-12 02:00:23'),
(123, 'uwqu', '', '', '', 0, '2023-04-12 02:02:51.000000', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `eav_attribute`
--
ALTER TABLE `eav_attribute`
  ADD PRIMARY KEY (`attribute_id`),
  ADD KEY `entity_type_id` (`entity_type_id`);

--
-- Indexes for table `eav_attribute_option`
--
ALTER TABLE `eav_attribute_option`
  ADD PRIMARY KEY (`option_id`),
  ADD KEY `attribute_id` (`attribute_id`);

--
-- Indexes for table `entity_type`
--
ALTER TABLE `entity_type`
  ADD PRIMARY KEY (`entity_type_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_int`
--
ALTER TABLE `product_int`
  ADD PRIMARY KEY (`value_id`),
  ADD UNIQUE KEY `entity_id` (`entity_id`),
  ADD UNIQUE KEY `attribute_id` (`attribute_id`);

--
-- Indexes for table `salesman`
--
ALTER TABLE `salesman`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `salesman_price`
--
ALTER TABLE `salesman_price`
  ADD PRIMARY KEY (`entity_id`),
  ADD KEY `salesman_id` (`sales_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `vendor_address`
--
ALTER TABLE `vendor_address`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `eav_attribute`
--
ALTER TABLE `eav_attribute`
  MODIFY `attribute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `eav_attribute_option`
--
ALTER TABLE `eav_attribute_option`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `entity_type`
--
ALTER TABLE `entity_type`
  MODIFY `entity_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `media_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `product_int`
--
ALTER TABLE `product_int`
  MODIFY `value_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salesman`
--
ALTER TABLE `salesman`
  MODIFY `sales_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `salesman_price`
--
ALTER TABLE `salesman_price`
  MODIFY `entity_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `vendor_address`
--
ALTER TABLE `vendor_address`
  MODIFY `vendor_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD CONSTRAINT `customer_address_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eav_attribute`
--
ALTER TABLE `eav_attribute`
  ADD CONSTRAINT `eav_attribute_ibfk_1` FOREIGN KEY (`entity_type_id`) REFERENCES `entity_type` (`entity_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eav_attribute_option`
--
ALTER TABLE `eav_attribute_option`
  ADD CONSTRAINT `eav_attribute_option_ibfk_1` FOREIGN KEY (`attribute_id`) REFERENCES `eav_attribute` (`attribute_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_int`
--
ALTER TABLE `product_int`
  ADD CONSTRAINT `product_int_ibfk_1` FOREIGN KEY (`attribute_id`) REFERENCES `eav_attribute` (`attribute_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_int_ibfk_2` FOREIGN KEY (`entity_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salesman_price`
--
ALTER TABLE `salesman_price`
  ADD CONSTRAINT `salesman_price_ibfk_1` FOREIGN KEY (`sales_id`) REFERENCES `salesman` (`sales_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
