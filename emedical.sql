-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 19, 2021 at 11:39 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emedical`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=177 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`) VALUES
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `clientorders`
--

DROP TABLE IF EXISTS `clientorders`;
CREATE TABLE IF NOT EXISTS `clientorders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `userid` varchar(55) NOT NULL,
  `address` varchar(55) NOT NULL,
  `phone` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `orderDayTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `deliveryTime` varchar(55) NOT NULL,
  `deliveryStatus` varchar(55) NOT NULL,
  `charges` int(11) NOT NULL,
  `remainingDues` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientorders`
--

INSERT INTO `clientorders` (`id`, `name`, `userid`, `address`, `phone`, `email`, `orderDayTime`, `deliveryTime`, `deliveryStatus`, `charges`, `remainingDues`) VALUES
(1, 'thulla', 'cl12', 'a', 'abcd', 'abcd@email.com', '2021-02-18 07:31:40', '21-02-20', 'pending', 60, 999),
(2, 'abcd', 'cl12', 'a', 'thullalla', 'thulla@ads.com', '2021-02-18 07:53:52', '21-02-20', 'pending', 6600, 999),
(3, 'abcd', 'cl12', 'a', 'thullalla', 'abcd@email.com', '2021-02-18 07:54:59', '21-02-20', 'pending', 396, 999),
(4, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:05:23', '21-02-21', 'pending', 2200, 999),
(5, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:06:27', '21-02-21', 'pending', 2200, 999),
(6, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:06:29', '21-02-21', 'pending', 2200, 999),
(7, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:06:35', '21-02-21', 'pending', 2200, 999),
(8, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:10:03', '21-02-21', 'pending', 2200, 999),
(9, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:11:39', '21-02-21', 'pending', 2200, 999),
(10, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:11:40', '21-02-21', 'pending', 2200, 999),
(11, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:11:42', '21-02-21', 'pending', 2200, 999),
(12, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:11:49', '21-02-21', 'pending', 2200, 999),
(13, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:11:50', '21-02-21', 'pending', 2200, 999),
(14, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:12:17', '21-02-21', 'pending', 2200, 999),
(15, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:12:34', '21-02-21', 'pending', 2200, 999),
(16, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:12:35', '21-02-21', 'pending', 2200, 999),
(17, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:13:08', '21-02-21', 'pending', 2200, 999),
(18, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:13:10', '21-02-21', 'pending', 2200, 999),
(19, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:13:12', '21-02-21', 'pending', 2200, 999),
(20, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:13:14', '21-02-21', 'pending', 2200, 999),
(21, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:14:03', '21-02-21', 'pending', 2200, 999),
(22, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:14:04', '21-02-21', 'pending', 2200, 999),
(23, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:14:20', '21-02-21', 'pending', 2200, 999),
(24, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:15:12', '21-02-21', 'pending', 2200, 999),
(25, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:15:48', '21-02-21', 'pending', 2200, 999),
(26, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:16:34', '21-02-21', 'pending', 2200, 999),
(27, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:16:39', '21-02-21', 'pending', 2200, 999),
(28, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:17:14', '21-02-21', 'pending', 2200, 999),
(29, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:17:15', '21-02-21', 'pending', 2200, 999),
(30, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:17:16', '21-02-21', 'pending', 2200, 999),
(31, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:17:42', '21-02-21', 'pending', 2200, 999),
(32, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:19:23', '21-02-21', 'pending', 2200, 999),
(33, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:19:39', '21-02-21', 'pending', 2200, 999),
(34, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:20:14', '21-02-21', 'pending', 2200, 999),
(35, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:22:24', '21-02-21', 'pending', 2200, 999),
(36, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:22:26', '21-02-21', 'pending', 2200, 999),
(37, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:22:27', '21-02-21', 'pending', 2200, 999),
(38, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:23:07', '21-02-21', 'pending', 2200, 999),
(39, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:23:54', '21-02-21', 'pending', 2200, 999),
(40, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:24:20', '21-02-21', 'pending', 2200, 999),
(41, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:34:58', '21-02-21', 'pending', 8800, 999),
(42, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:35:57', '21-02-21', 'pending', 8800, 999),
(43, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:35:59', '21-02-21', 'pending', 8800, 999),
(44, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:36:41', '21-02-21', 'pending', 8800, 999),
(45, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:36:55', '21-02-21', 'pending', 8800, 999),
(46, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:36:56', '21-02-21', 'pending', 8800, 999),
(47, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:36:56', '21-02-21', 'pending', 8800, 999),
(48, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:37:17', '21-02-21', 'pending', 8800, 999),
(49, 'asdasd', 'cl12', 'adasd', 'asdasd', 'asdad@gmail.com', '2021-02-19 19:37:18', '21-02-21', 'pending', 8800, 999),
(50, 'mulla', 'cl17', 'hous2', '123123', 'sad@gm.com', '2021-02-20 02:03:45', '21-02-21', 'pending', 20, 999),
(51, 'asdasd', 'cl17', 'adasd', '1212', 'asdd@gmail.com', '2021-02-20 02:05:30', '21-02-21', 'pending', 20, 999);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `address` varchar(55) NOT NULL,
  `phone` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `password`, `address`, `phone`, `email`) VALUES
(12, 'thulla', 'thulla', 'thulla', 'thulla', 'thulla'),
(13, 'thulla', 'thulla', 'thulla', 'thulla', 'thulla'),
(14, 'thulla', 'thulla', 'thulla', 'thulla', 'thulla'),
(15, 'thulla', 'thulla', 'thulla', 'thulla', 'thulla'),
(16, 'thulla', 'thulla', 'thulla', 'thulla', 'thulla'),
(17, 'mulla', 'sahab', 'houw2', '1212', 'asdd@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `cnic` varchar(55) NOT NULL,
  `contact1` varchar(55) NOT NULL,
  `contact2` varchar(55) NOT NULL,
  `address` varchar(55) NOT NULL,
  `salary` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `joinedDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `leftDate` date DEFAULT NULL,
  `leaves` int(11) DEFAULT NULL,
  PRIMARY KEY (`cnic`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `password`, `cnic`, `contact1`, `contact2`, `address`, `salary`, `status`, `joinedDate`, `leftDate`, `leaves`) VALUES
(1, 'thulla', 'abc', '123', 'cx', 's', 'a', 12, 'Manager', '2021-02-17 06:14:08', NULL, NULL),
(4, 'abcd', 'thulla', '12366', 'cx', 's', 'thulla', 12, 'as', '2021-02-17 06:23:22', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `type` varchar(55) NOT NULL,
  `manufacturer` varchar(55) NOT NULL,
  `countDrugs` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `name`, `type`, `manufacturer`, `countDrugs`, `price`) VALUES
(1, 'masks', 'medical accessory', 'osama', 12, 10),
(4, 'pancakee ka bacha', 'cakes', 'dadabbu', 22, 99),
(3, 'paracetamol', 'sardard ki dawa', 'mein hi hun', 21, 20),
(2, 'panadol', 'hbv drug', 'getz', 4, 2200),
(5, 'masks', 'surgical masks', 'abbott', 23, 10),
(6, 'syringes', 'teeka', 'feroz', 12, 12),
(7, 'masks', 'surgical masks', 'getz', 10, 12),
(8, 'panadol', 'nn', 'abbott', 12, 100),
(9, 'paracetamol', 'asd', 'abbott', 123, 122),
(10, 'asd', 'asdasd', 'asdasd', 12, 12),
(11, 'asd', 'asdasd', 'asdasd', 12, 12),
(12, 'asd', 'asdasd', 'asdasd', 12, 12),
(13, 'asd', 'asdasd', 'asdasd', 12, 12),
(14, 'asd', 'asdasd', 'asdasd', 12, 12),
(15, 'asd', 'asdasd', 'asdasd', 12, 12),
(16, 'asd', 'asdasd', 'asdasd', 12, 12),
(17, 'asd', 'asdasd', 'asdasd', 12, 12),
(18, 'asd', 'asdasd', 'asdasd', 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `type` varchar(55) NOT NULL,
  `manufacturer` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `type`, `manufacturer`) VALUES
(6, 'ljkl', 'khkh', 'lkjl'),
(3, 'temp2', 'medical ', 'abbott'),
(4, 'temp3', 'accessories', 'feroz sons'),
(5, 'asd', 'asd', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `supply_orders`
--

DROP TABLE IF EXISTS `supply_orders`;
CREATE TABLE IF NOT EXISTS `supply_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplierName` varchar(55) NOT NULL,
  `type` varchar(55) NOT NULL,
  `manufName` varchar(55) NOT NULL,
  `quantity` int(11) NOT NULL,
  `orderDateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supply_orders`
--

INSERT INTO `supply_orders` (`id`, `supplierName`, `type`, `manufName`, `quantity`, `orderDateTime`) VALUES
(1, 'masks', 'surgical masks', 'feroz', 23, '2021-02-19 02:57:19'),
(2, 'asdasd', 'asdasd', 'asdasd', 121, '2021-02-19 06:39:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userid` varchar(55) NOT NULL,
  `visit_on` varchar(55) NOT NULL,
  `end_at` varchar(55) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `visit_on`, `end_at`) VALUES
('ad2', '2021-2-15 22:20:40', '2021-2-15 22:20:51'),
('cl12', '2021-2-15 23:7:3', '2021-2-15 23:7:7'),
('cl12', '2021-2-15 23:8:20', '2021-2-15 23:8:54'),
('cl13', '2021-2-15 23:12:17', '2021-2-15 23:12:28'),
('cl12', '2021-2-15 23:17:38', '2021-2-15 23:17:46'),
('cl', '', '2021-2-15 23:17:49'),
('cl12', '2021-2-15 23:23:55', '2021-2-15 23:23:59'),
('cl12', '2021-2-15 23:25:54', '2021-2-15 23:25:57'),
('em1', '2021-2-15 23:27:38', '2021-2-15 23:27:48'),
('ad2', '2021-2-15 23:28:11', '2021-2-15 23:28:16'),
('cl13', '2021-2-15 23:29:39', '2021-2-15 23:29:42'),
('cl12', '2021-2-15 23:31:17', '2021-2-15 23:37:10'),
('cl12', '2021-2-15 23:37:41', '2021-2-15 23:37:48'),
('cl12', '2021-2-15 23:39:0', '2021-2-15 23:41:30'),
('cl12', '2021-2-15 23:41:46', '2021-2-15 23:42:3'),
('cl16', '2021-2-15 23:53:3', '2021-2-15 23:53:8'),
('em1', '2021-2-16 0:40:3', '2021-2-16 8:39:14'),
('em1', '2021-2-16 8:39:25', '2021-2-16 21:43:54'),
('ad2', '2021-2-16 23:46:11', '2021-2-16 23:46:26'),
('ad2', '2021-2-17 21:30:17', '2021-2-17 21:30:36'),
('ad2', '2021-2-17 21:38:36', '2021-2-17 21:39:8'),
('ad2', '2021-2-17 22:27:30', '2021-2-17 22:28:38'),
('em1', '2021-2-17 22:30:41', '2021-2-17 22:32:14'),
('cl12', '2021-2-17 23:56:19', '2021-2-17 23:56:47'),
('cl12', '2021-2-18 0:31:14', '2021-2-18 0:32:17'),
('cl12', '2021-2-18 0:32:29', '2021-2-18 0:32:44'),
('cl12', '2021-2-18 0:32:54', '2021-2-18 0:33:41'),
('cl12', '2021-2-18 0:33:52', '2021-2-18 0:41:19'),
('cl12', '2021-2-18 0:41:32', '2021-2-18 0:57:23'),
('cl12', '2021-2-18 1:4:4', '2021-2-18 1:39:9'),
('cl12', '2021-2-18 2:10:51', '2021-2-18 2:13:32'),
('cl12', '2021-2-18 2:14:22', '2021-2-18 2:15:39'),
('cl12', '2021-2-18 2:15:50', '2021-2-18 2:24:57'),
('cl12', '2021-2-18 2:25:12', '2021-2-18 2:28:49'),
('cl12', '2021-2-18 2:29:11', '2021-2-18 2:31:12'),
('cl12', '2021-2-18 2:31:24', '2021-2-18 2:45:50'),
('em1', '2021-2-18 20:24:54', '2021-2-18 20:26:16'),
('em1', '2021-2-18 20:27:5', '2021-2-18 20:27:43'),
('em1', '2021-2-18 20:30:12', '2021-2-18 20:30:52'),
('cl12', '2021-2-18 23:6:31', '2021-2-18 23:6:54'),
('cl12', '2021-2-18 23:41:34', '2021-2-18 23:43:45'),
('em1', '2021-2-19 2:2:26', '2021-2-19 12:5:43'),
('cl12', '2021-2-19 13:53:45', '2021-2-19 14:44:2'),
('em1', '2021-2-19 14:49:40', '2021-2-19 15:0:58'),
('cl12', '2021-2-19 21:1:29', '2021-2-19 21:1:57');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
