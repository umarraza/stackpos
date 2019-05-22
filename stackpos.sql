-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 22, 2019 at 12:12 AM
-- Server version: 5.6.43-cll-lve
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
-- Database: `purse_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
(4, 'Mobo Cafe', '2019-01-23 14:29:56', '2019-01-23 14:29:56'),
(5, 'Hard Disks', '2019-04-08 01:15:55', '2019-04-08 01:15:55'),
(6, 'Hard Disks', '2019-04-08 04:07:30', '2019-04-08 04:07:30'),
(7, 'she', '2019-05-21 04:18:42', '2019-05-21 04:18:42');

-- --------------------------------------------------------

--
-- Table structure for table `customerledgers`
--

CREATE TABLE `customerledgers` (
  `id` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `ammountReceived` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customerpayments`
--

CREATE TABLE `customerpayments` (
  `id` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `description` varchar(250) NOT NULL DEFAULT 'N/A',
  `customerId` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerpayments`
--

INSERT INTO `customerpayments` (`id`, `amount`, `description`, `customerId`, `created_at`, `updated_at`) VALUES
(4, 14000, 'Regular Sale', 0, '2019-01-23 14:33:01', '2019-01-23 14:33:01'),
(5, 45000, 'Regular Sale', 0, '2019-01-23 14:36:43', '2019-01-23 14:36:43'),
(6, 80000, 'Regular Sale', 3, '2019-01-23 14:42:44', '2019-01-23 14:42:44'),
(7, 200, 'Regular Sale', 0, '2019-04-08 01:36:58', '2019-04-08 01:36:58'),
(8, 110, 'Regular Sale', 0, '2019-04-08 04:05:53', '2019-04-08 04:05:53'),
(9, 5000, 'New payment against some product', 3, '2019-04-08 04:15:12', '2019-04-08 04:15:12'),
(10, 300, 'Regular Sale', 6, '2019-04-08 04:19:21', '2019-04-08 04:19:21'),
(11, 100, 'some description', 6, '2019-04-08 04:21:31', '2019-04-08 04:21:31'),
(12, 100, 'Regular Sale', 0, '2019-04-08 04:22:33', '2019-04-08 04:22:33'),
(13, 95000, 'Regular Sale', 0, '2019-04-23 19:36:37', '2019-04-23 19:36:37'),
(14, 11990, 'Regular Sale', 0, '2019-05-16 01:30:51', '2019-05-16 01:30:51'),
(15, 32000, 'Regular Sale', 0, '2019-05-18 05:57:56', '2019-05-18 05:57:56');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `shopName` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `accountNumber` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `shopName`, `address`, `accountNumber`, `userId`, `created_at`, `updated_at`) VALUES
(3, 'Umar Raza', 'Walk-In', 'Karachi, Pakistan', '000-1111-333', 1, '2019-04-08 09:10:24', '2019-04-08 04:10:24'),
(6, 'Numan', 'Walk-In', 'Lahore Pakistan', '122124', 1, '2019-04-08 01:19:33', '2019-04-08 01:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

CREATE TABLE `employe` (
  `id` int(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phoneNumber` varchar(100) NOT NULL,
  `age` int(20) NOT NULL,
  `userId` int(10) NOT NULL,
  `updated_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `created_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employe`
--

INSERT INTO `employe` (`id`, `name`, `email`, `address`, `phoneNumber`, `age`, `userId`, `updated_at`, `created_at`) VALUES
(19, 'Hassan Amir', 'umarraza2200@gmail.com', 'Lahore Pakistan', '321244122', 24, 0, '2019-04-08 07:01:02.510686', '2019-02-04 03:22:58.000000'),
(20, 'Hassan', 'alexa@gmail.com', 'Lahore Pakistan', '2147483647', 53, 0, '2019-04-08 07:01:07.623219', '2019-02-04 04:42:23.000000'),
(21, 'Rizwan', 'rizwan@gmail.com', 'Lahore Pakistan', '124412', 34, 0, '2019-04-08 07:01:14.178408', '2019-02-04 04:51:34.000000'),
(22, 'umarraza', 'abdurrehman345@gmail.com', 'street no 6', '03439180820', 24, 17, '2019-04-08 02:33:37.000000', '2019-04-08 02:33:37.000000'),
(23, 'Numan', 'numan@gmail.com', '555-New York, Man Hattan', '03439180820', 24, 18, '2019-04-08 03:28:39.000000', '2019-04-08 03:28:39.000000'),
(24, 'Hassan', 'hassanamir210@gmail.com', 'assasa', '123456789', 5, 19, '2019-05-22 14:00:13.000000', '2019-05-22 14:00:13.000000');

-- --------------------------------------------------------

--
-- Table structure for table `fixedexpenses`
--

CREATE TABLE `fixedexpenses` (
  `id` int(11) NOT NULL,
  `expenseName` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fixedexpenses`
--

INSERT INTO `fixedexpenses` (`id`, `expenseName`, `description`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'Ali', 'Electricity Bill, Building Rent, Pays, Other Amounts, Taxes', 150000, '2019-01-24 14:48:51', '2019-01-24 14:48:51'),
(2, 'Assets Reparing', 'Repaired some assets', 60000, '2019-04-08 09:37:32', '2019-04-08 04:37:32'),
(3, 'furniture', 'Some remaining amount  furniture', 1000, '2019-05-16 01:48:27', '2019-05-16 01:48:27'),
(4, 'Electricity Bill', 'Mandatory', 2000, '2019-05-21 02:11:41', '2019-05-21 02:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) NOT NULL,
  `purchaseId` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `purchaseId`, `created_at`, `updated_at`) VALUES
(13, 14, '2019-01-23 14:30:37', '2019-01-23 14:30:37'),
(14, 15, '2019-04-08 01:27:03', '2019-04-08 01:27:03'),
(15, 16, '2019-04-08 04:04:39', '2019-04-08 04:04:39'),
(16, 17, '2019-04-08 04:25:54', '2019-04-08 04:25:54'),
(17, 18, '2019-04-08 04:37:05', '2019-04-08 04:37:05'),
(18, 19, '2019-04-23 19:51:09', '2019-04-23 19:51:09'),
(19, 20, '2019-05-13 18:18:54', '2019-05-13 18:18:54'),
(20, 21, '2019-05-16 01:26:18', '2019-05-16 01:26:18'),
(21, 22, '2019-05-16 01:41:58', '2019-05-16 01:41:58'),
(22, 23, '2019-05-21 01:58:17', '2019-05-21 01:58:17'),
(23, 24, '2019-05-21 04:30:24', '2019-05-21 04:30:24'),
(24, 25, '2019-05-22 13:57:00', '2019-05-22 13:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` int(11) NOT NULL,
  `employeName` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `barCode` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `costPrice` int(11) NOT NULL,
  `totalPrice` int(10) NOT NULL,
  `purchaseId` int(10) NOT NULL,
  `salePrice` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `barCode`, `color`, `size`, `quantity`, `model`, `costPrice`, `totalPrice`, `purchaseId`, `salePrice`, `created_at`, `updated_at`) VALUES
(25, 'Mobiles', 'G54491472223', 'Red', '12', 20, 'Samsung', 17000, 340000, 14, 19000, '2019-04-08 09:03:50', '2019-01-23 14:30:37'),
(26, 'Keyboards', 'G54491472', 'Red', '15', 10, '121', 120, 1200, 15, 130, '2019-04-08 09:03:48', '2019-04-08 01:27:03'),
(27, 'Mouse', '121Mouse120', 'Red', '10', 10, '121', 120, 1200, 16, 130, '2019-04-08 04:04:39', '2019-04-08 04:04:39'),
(28, 'Head Phones', 'H-121Head Phones500', 'Black', '12', 10, 'H-121', 500, 5000, 17, 600, '2019-04-08 04:25:54', '2019-04-08 04:25:54'),
(29, 'Mobile Phones', 'SamsungMobile Phones30000', 'Red', '8', 20, 'Samsung', 30000, 600000, 18, 32000, '2019-04-08 04:37:05', '2019-04-08 04:37:05'),
(30, 'SamsungMobiles17000', '2010SamsungMobiles17000300', 'Red', '220', 250, '2010', 300, 75000, 19, 320, '2019-04-23 19:51:09', '2019-04-23 19:51:09'),
(31, 'Mobiles', 'SamsungMobiles3', 'red', '5', 1, 'Samsung', 3, 3, 20, 3, '2019-05-13 18:18:54', '2019-05-13 18:18:54'),
(32, 'wall panel', 'wwall panel240', '1', '10', 100, 'w', 240, 24000, 21, 250, '2019-05-16 01:26:18', '2019-05-16 01:26:18'),
(33, 'SamsungMobiles17000', 'LIKOSamsungMobiles170005', 'Red', '15', 16, 'LIKO', 5, 80, 22, 11, '2019-05-16 01:41:58', '2019-05-16 01:41:58'),
(34, 'Clutch Purse', '1093Clutch Purse10', 'Black', '10', 2, '1093', 10, 20, 23, 200, '2019-05-21 01:58:17', '2019-05-21 01:58:17'),
(35, 'Bridal Purse', '1094Bridal Purse13', 'Orange', '11', 4, '1094', 13, 52, 23, 16, '2019-05-21 01:58:17', '2019-05-21 01:58:17'),
(36, 'purs', '1122purs10', 'black', '12', 2, '1122', 10, 20, 24, 20, '2019-05-21 04:30:24', '2019-05-21 04:30:24'),
(37, 'test', '5test5', 'red', '5', 5, '5', 5, 25, 25, 5, '2019-05-22 13:57:00', '2019-05-22 13:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `products_inventory`
--

CREATE TABLE `products_inventory` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `barCode` varchar(250) NOT NULL,
  `color` varchar(250) NOT NULL,
  `size` varchar(250) NOT NULL,
  `quantity` int(10) NOT NULL,
  `model` varchar(250) NOT NULL,
  `costPrice` int(10) NOT NULL,
  `salePrice` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_inventory`
--

INSERT INTO `products_inventory` (`id`, `name`, `barCode`, `color`, `size`, `quantity`, `model`, `costPrice`, `salePrice`, `created_at`, `updated_at`) VALUES
(23, 'Mobiles', 'SamsungMobiles17000', 'Red', '12', 18, 'Samsung', 21, 19000, '2019-05-13 11:18:54', '2019-05-13 18:18:54'),
(24, 'Keyboards', 'g54491472', 'Red', '15', 9, '121', 138, 130, '2019-04-08 09:23:13', '2019-04-08 04:23:13'),
(25, 'Head Phones', 'H-121Head Phones500', 'Black', '12', 10, 'H-121', 500, 600, '2019-04-08 04:25:54', '2019-04-08 04:25:54'),
(26, 'SamsungMobiles17000', '2010SamsungMobiles17000300', 'Red', '220', 150, '2010', 300, 320, '2019-05-17 22:57:56', '2019-05-18 05:57:56'),
(27, 'wall panel', 'wwall panel240', '1', '10', 50, 'w', 240, 250, '2019-05-15 18:30:51', '2019-05-16 01:30:51'),
(28, 'SamsungMobiles17000', 'LIKOSamsungMobiles170005', 'Red', '15', 16, 'LIKO', 5, 11, '2019-05-16 01:41:58', '2019-05-16 01:41:58'),
(29, 'Clutch Purse', '1093Clutch Purse10', 'Black', '10', 2, '1093', 10, 200, '2019-05-21 01:58:17', '2019-05-21 01:58:17'),
(30, 'Bridal Purse', '1094Bridal Purse13', 'Orange', '11', 0, '1094', 13, 16, '2019-05-20 19:06:50', '2019-05-21 02:06:50'),
(31, 'purs', '1122purs10', 'black', '12', 2, '1122', 10, 20, '2019-05-21 04:30:24', '2019-05-21 04:30:24'),
(32, 'test', '5test5', 'red', '5', 5, '5', 5, 5, '2019-05-22 13:57:00', '2019-05-22 13:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `products_sale`
--

CREATE TABLE `products_sale` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `barCode` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `costPrice` int(11) NOT NULL,
  `totalPrice` int(10) NOT NULL,
  `saleId` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_sale`
--

INSERT INTO `products_sale` (`id`, `name`, `barCode`, `color`, `size`, `quantity`, `model`, `costPrice`, `totalPrice`, `saleId`, `created_at`, `updated_at`) VALUES
(7, 'Mobiles', '123', 'Red', '12', 5, 'Samsung', 19000, 95000, 8, '2019-01-23 14:42:44', '2019-01-23 14:42:44'),
(8, 'Keyboards', '123', 'Red', '15', 2, '121', 130, 260, 9, '2019-04-08 01:36:58', '2019-04-08 01:36:58'),
(9, 'Keyboards', '123', 'Red', '15', 1, '121', 130, 130, 10, '2019-04-08 04:05:54', '2019-04-08 04:05:54'),
(10, 'Keyboards', '123', 'Red', '15', 4, '121', 130, 520, 11, '2019-04-08 04:19:21', '2019-04-08 04:19:21'),
(11, 'Keyboards', '123', 'Red', '15', 2, '121', 130, 260, 12, '2019-04-08 04:22:33', '2019-04-08 04:22:33'),
(12, 'Keyboards', '123', 'Red', '15', 2, '121', 130, 260, 13, '2019-04-08 04:23:13', '2019-04-08 04:23:13'),
(13, 'Mobiles', '123', 'Red', '12', 5, 'Samsung', 19000, 95000, 14, '2019-04-23 19:36:37', '2019-04-23 19:36:37'),
(14, 'Mobiles', '123', 'Red', '12', 1, 'Samsung', 19000, 19000, 15, '2019-04-23 19:37:44', '2019-04-23 19:37:44'),
(15, 'Mobiles', '123', 'Red', '12', 1, 'Samsung', 19000, 19000, 16, '2019-04-23 19:38:31', '2019-04-23 19:38:31'),
(16, 'Mobiles', '123', 'Red', '12', 1, 'Samsung', 19000, 19000, 17, '2019-04-23 19:40:57', '2019-04-23 19:40:57'),
(17, 'Mobiles', '123', 'Red', '12', 1, 'Samsung', 19000, 19000, 17, '2019-04-23 19:40:57', '2019-04-23 19:40:57'),
(18, 'Mobiles', '123', 'Red', '12', 1, 'Samsung', 19000, 19000, 17, '2019-04-23 19:40:57', '2019-04-23 19:40:57'),
(19, 'Mobiles', '123', 'Red', '12', 1, 'Samsung', 19000, 19000, 18, '2019-04-23 19:41:41', '2019-04-23 19:41:41'),
(20, 'Mobiles', '123', 'Red', '12', 1, 'Samsung', 19000, 19000, 19, '2019-05-13 02:12:27', '2019-05-13 02:12:27'),
(21, 'Mobiles', '123', 'Red', '12', 1, 'Samsung', 19000, 19000, 20, '2019-05-13 02:13:06', '2019-05-13 02:13:06'),
(22, 'Mobiles', '123', 'Red', '12', 1, 'Samsung', 19000, 19000, 21, '2019-05-13 02:13:54', '2019-05-13 02:13:54'),
(23, 'wall panel', '123', '1', '10', 50, 'w', 250, 12500, 22, '2019-05-16 01:30:51', '2019-05-16 01:30:51'),
(24, 'SamsungMobiles17000', '123', 'Red', '220', 100, '2010', 320, 32000, 23, '2019-05-18 05:57:56', '2019-05-18 05:57:56'),
(25, 'Bridal Purse', '123', 'Orange', '11', 1, '1094', 500, 500, 24, '2019-05-21 02:04:37', '2019-05-21 02:04:37'),
(26, 'Bridal Purse', '123', 'Orange', '11', 1, '1094', 500, 500, 24, '2019-05-21 02:04:37', '2019-05-21 02:04:37'),
(27, 'Bridal Purse', '123', 'Orange', '11', 1, '1094', 300, 300, 24, '2019-05-21 02:04:37', '2019-05-21 02:04:37'),
(28, 'Bridal Purse', '123', 'Orange', '11', 1, '1094', 16, 16, 25, '2019-05-21 02:06:50', '2019-05-21 02:06:50');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `supplierId` int(11) NOT NULL,
  `finalAmount` int(10) NOT NULL,
  `totalBill` int(11) NOT NULL,
  `amountPaid` int(11) NOT NULL,
  `amountRemaining` int(10) NOT NULL,
  `discount` int(10) NOT NULL,
  `returnAmount` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `supplierId`, `finalAmount`, `totalBill`, `amountPaid`, `amountRemaining`, `discount`, `returnAmount`, `created_at`, `updated_at`) VALUES
(14, 10, 340000, 338000, 300000, 38000, 2000, 0, '2019-01-23 14:30:37', '2019-01-23 14:30:37'),
(15, 10, 1200, 1195, 1000, 195, 5, 0, '2019-04-08 01:27:03', '2019-04-08 01:27:03'),
(16, 10, 1200, 1200, 0, 1200, 0, 0, '2019-04-08 04:04:39', '2019-04-08 04:04:39'),
(17, 12, 5000, 4000, 3000, 1000, 1000, 0, '2019-04-08 04:25:54', '2019-04-08 04:25:54'),
(18, 10, 600000, 600000, 50000, 550000, 0, 0, '2019-04-08 04:37:04', '2019-04-08 04:37:04'),
(19, 12, 75000, 75000, 0, 75000, 0, 0, '2019-04-23 19:51:09', '2019-04-23 19:51:09'),
(20, 12, 0, 0, 0, 0, 0, 0, '2019-05-13 18:18:54', '2019-05-13 18:18:54'),
(21, 10, 24000, 24000, 14000, 10000, 0, 0, '2019-05-16 01:26:18', '2019-05-16 01:26:18'),
(22, 10, 80, 80, 80, 0, 0, 20, '2019-05-16 01:41:58', '2019-05-16 01:41:58'),
(23, 10, 72, 72, 30, 42, 0, 0, '2019-05-21 01:58:17', '2019-05-21 01:58:17'),
(24, 14, 20, 20, 0, 20, 0, 0, '2019-05-21 04:30:24', '2019-05-21 04:30:24'),
(25, 10, 25, 25, 25, 0, 0, 25, '2019-05-22 13:57:00', '2019-05-22 13:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `finalAmount` int(10) NOT NULL,
  `totalBill` int(11) NOT NULL,
  `amountPaid` int(11) NOT NULL,
  `amountRemaining` int(11) NOT NULL,
  `discount` int(10) NOT NULL,
  `returnAmount` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `customerId`, `finalAmount`, `totalBill`, `amountPaid`, `amountRemaining`, `discount`, `returnAmount`, `created_at`, `updated_at`) VALUES
(8, 3, 95000, 90000, 80000, 10000, 5000, 0, '2019-01-23 14:42:44', '2019-01-23 14:42:44'),
(9, 0, 260, 245, 200, 45, 15, 0, '2019-04-08 01:36:58', '2019-04-08 01:36:58'),
(10, 0, 130, 115, 110, 5, 15, 0, '2019-04-08 04:05:53', '2019-04-08 04:05:53'),
(11, 6, 520, 500, 300, 200, 20, 0, '2019-04-08 04:19:21', '2019-04-08 04:19:21'),
(12, 0, 260, 200, 100, 100, 60, 0, '2019-04-08 04:22:33', '2019-04-08 04:22:33'),
(13, 6, 260, 200, 0, 200, 60, 0, '2019-04-08 04:23:13', '2019-04-08 04:23:13'),
(14, 0, 95000, 95000, 95000, 0, 0, 5000, '2019-04-23 19:36:36', '2019-04-23 19:36:36'),
(15, 3, 19000, 19000, 0, 19000, 0, 0, '2019-04-23 19:37:44', '2019-04-23 19:37:44'),
(16, 3, 19000, 19000, 0, 19000, 0, 0, '2019-04-23 19:38:31', '2019-04-23 19:38:31'),
(17, 3, 57000, 57000, 0, 57000, 0, 0, '2019-04-23 19:40:57', '2019-04-23 19:40:57'),
(18, 3, 19000, 19000, 0, 19000, 0, 0, '2019-04-23 19:41:41', '2019-04-23 19:41:41'),
(19, 3, 19000, 19000, 0, 19000, 0, 0, '2019-05-13 02:12:26', '2019-05-13 02:12:26'),
(20, 3, 19000, 19000, 0, 19000, 0, 0, '2019-05-13 02:13:06', '2019-05-13 02:13:06'),
(21, 3, 19000, 19000, 0, 19000, 0, 0, '2019-05-13 02:13:54', '2019-05-13 02:13:54'),
(22, 0, 12500, 11990, 11990, 0, 501, 10, '2019-05-16 01:30:51', '2019-05-16 01:30:51'),
(23, 0, 32000, 32000, 32000, 0, 0, 218000, '2019-05-18 05:57:56', '2019-05-18 05:57:56'),
(24, 3, 1300, 1300, 0, 1300, 0, 0, '2019-05-21 02:04:37', '2019-05-21 02:04:37'),
(25, 0, 16, 16, 0, 16, 0, 0, '2019-05-21 02:06:50', '2019-05-21 02:06:50');

-- --------------------------------------------------------

--
-- Table structure for table `sale_invoices`
--

CREATE TABLE `sale_invoices` (
  `id` int(10) NOT NULL,
  `salesId` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_invoices`
--

INSERT INTO `sale_invoices` (`id`, `salesId`, `created_at`, `updated_at`) VALUES
(5, 6, '2019-01-23 14:33:01', '2019-01-23 14:33:01'),
(6, 7, '2019-01-23 14:36:43', '2019-01-23 14:36:43'),
(7, 8, '2019-01-23 14:42:44', '2019-01-23 14:42:44'),
(8, 9, '2019-04-08 01:36:58', '2019-04-08 01:36:58'),
(9, 10, '2019-04-08 04:05:53', '2019-04-08 04:05:53'),
(10, 11, '2019-04-08 04:19:21', '2019-04-08 04:19:21'),
(11, 12, '2019-04-08 04:22:33', '2019-04-08 04:22:33'),
(12, 13, '2019-04-08 04:23:13', '2019-04-08 04:23:13'),
(13, 14, '2019-04-23 19:36:36', '2019-04-23 19:36:36'),
(14, 15, '2019-04-23 19:37:44', '2019-04-23 19:37:44'),
(15, 16, '2019-04-23 19:38:31', '2019-04-23 19:38:31'),
(16, 17, '2019-04-23 19:40:57', '2019-04-23 19:40:57'),
(17, 18, '2019-04-23 19:41:41', '2019-04-23 19:41:41'),
(18, 19, '2019-05-13 02:12:27', '2019-05-13 02:12:27'),
(19, 20, '2019-05-13 02:13:06', '2019-05-13 02:13:06'),
(20, 21, '2019-05-13 02:13:54', '2019-05-13 02:13:54'),
(21, 22, '2019-05-16 01:30:51', '2019-05-16 01:30:51'),
(22, 23, '2019-05-18 05:57:56', '2019-05-18 05:57:56'),
(23, 24, '2019-05-21 02:04:37', '2019-05-21 02:04:37'),
(24, 25, '2019-05-21 02:06:50', '2019-05-21 02:06:50');

-- --------------------------------------------------------

--
-- Table structure for table `supplierledgers`
--

CREATE TABLE `supplierledgers` (
  `id` int(11) NOT NULL,
  `supplierId` int(11) NOT NULL,
  `ammountReceived` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplierpayments`
--

CREATE TABLE `supplierpayments` (
  `id` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `supplierId` int(10) NOT NULL,
  `description` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplierpayments`
--

INSERT INTO `supplierpayments` (`id`, `amount`, `supplierId`, `description`, `created_at`, `updated_at`) VALUES
(12, 300000, 10, 'Normal Purchase', '2019-01-23 14:30:37', '2019-01-23 14:30:37'),
(13, 1000, 10, 'Total amount of all purchases of clothes', '2019-01-24 21:03:03', '2019-01-24 21:03:03'),
(14, 1000, 10, 'Normal Purchase', '2019-04-08 01:27:03', '2019-04-08 01:27:03'),
(15, 3000, 12, 'Normal Purchase', '2019-04-08 04:25:54', '2019-04-08 04:25:54'),
(16, 50000, 10, 'Normal Purchase', '2019-04-08 04:37:05', '2019-04-08 04:37:05'),
(17, 4000, 10, 'pay rec', '2019-04-23 19:44:46', '2019-04-23 19:44:46'),
(18, 100000, 10, 'test', '2019-04-23 19:45:34', '2019-04-23 19:45:34'),
(19, 14000, 10, 'Normal Purchase', '2019-05-16 01:26:18', '2019-05-16 01:26:18'),
(20, 80, 10, 'Normal Purchase', '2019-05-16 01:41:58', '2019-05-16 01:41:58'),
(21, 30, 10, 'Normal Purchase', '2019-05-21 01:58:17', '2019-05-21 01:58:17'),
(22, 25, 10, 'Normal Purchase', '2019-05-22 13:57:00', '2019-05-22 13:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brandName` varchar(255) NOT NULL,
  `cellNumber` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `accountNumber` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `brandName`, `cellNumber`, `address`, `accountNumber`, `userId`, `created_at`, `updated_at`) VALUES
(10, 'Ali Raza', 'Mobo Cafe', '0303-4969407', 'Lahore, Pakistan', '000-1111-222', 1, '2019-02-04 08:03:00', '2019-02-04 03:03:00'),
(12, 'Mark', 'Mobo Cafe', '03034969407', 'Lahore Pakistan', '333-333-555-444', 1, '2019-04-08 09:07:56', '2019-04-08 04:07:56'),
(13, 'usama', 'Hard Disks', '3247400060', 'Hafizabad', '123-123103123-3', 1, '2019-05-16 01:17:02', '2019-05-16 01:17:02'),
(14, 'anas', 'she', '1234', 'asdxdsaxsa', '435345455', 1, '2019-05-21 04:18:42', '2019-05-21 04:18:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Pelican POS', 'pos@pelican.com', '$2y$10$y02bOucjX3oag3nMB0CgQOQpMdzLtLurFwomYFoSeuWQcnKlW89Lu', 'Admin', 'J4Wo5S1I3oG53IGMe2ttEW2YFKojus9tizVBsMCr59YPTrbQqUd00YudN4Og', '2018-08-09 19:38:50', '2018-08-09 19:38:50'),
(9, 'Umar Raza', 'umar@gmail.com', '$2y$10$y02bOucjX3oag3nMB0CgQOQpMdzLtLurFwomYFoSeuWQcnKlW89Lu', 'Employe', 'yOZvjyzq8DZOW3ceJjDQqgCmKJHPtIW5VLch2rTfUs5xZHOe9etlVrt3Rvsy', '2019-01-25 16:07:37', '2019-02-10 23:46:24'),
(10, 'Usama', 'Ali', '$2y$10$3mPVEdHIFFN/9PdQ2nYYYuJQF4kg7ssCu54N270DrVdKkm78t9ZNS', 'Employe', NULL, '2019-02-10 23:54:39', '2019-02-10 23:54:39'),
(18, 'Numan', 'numan@gmail.com', '$2y$10$HGKLA2ZRKPSjc4MZzR4T1eGBgdxoWM/6Zy6lK5hPULrS93j607nxm', 'Employe', NULL, '2019-04-08 03:28:39', '2019-04-08 03:28:39'),
(19, 'Hassan', 'hassanamir210@gmail.com', '$2y$10$nAii7J5Q.9utrRgPNN2Ez.mfw./7bIYAXeSSSccaLe7IiC.3Fuev6', 'Employe', 'xFdCsDJXWCTnh266GcPlcu0Rax0i79cKCINuVkXdT5KZuQVi9x1D76CNozfH', '2019-05-22 14:00:13', '2019-05-22 14:00:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerledgers`
--
ALTER TABLE `customerledgers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerpayments`
--
ALTER TABLE `customerpayments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fixedexpenses`
--
ALTER TABLE `fixedexpenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_inventory`
--
ALTER TABLE `products_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_sale`
--
ALTER TABLE `products_sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_invoices`
--
ALTER TABLE `sale_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplierledgers`
--
ALTER TABLE `supplierledgers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplierpayments`
--
ALTER TABLE `supplierpayments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customerledgers`
--
ALTER TABLE `customerledgers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customerpayments`
--
ALTER TABLE `customerpayments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employe`
--
ALTER TABLE `employe`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `fixedexpenses`
--
ALTER TABLE `fixedexpenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `products_inventory`
--
ALTER TABLE `products_inventory`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products_sale`
--
ALTER TABLE `products_sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sale_invoices`
--
ALTER TABLE `sale_invoices`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `supplierledgers`
--
ALTER TABLE `supplierledgers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplierpayments`
--
ALTER TABLE `supplierpayments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
