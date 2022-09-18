-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2022 at 07:47 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cashier_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` longtext NOT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `brand` longtext NOT NULL,
  `category` longtext NOT NULL,
  `bar_code` varchar(200) NOT NULL,
  `cgst` decimal(10,2) NOT NULL,
  `sgst` decimal(10,2) NOT NULL,
  `igst` decimal(10,2) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `status` tinytext NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `mrp`, `sale_price`, `unit`, `brand`, `category`, `bar_code`, `cgst`, `sgst`, `igst`, `alias`, `status`, `created`) VALUES
(13, 'Magic Sarap All-In-one', '4.00', '2.00', 'Pcs', '', '', '48025522', '0.00', '0.00', '0.00', '', '', '2022-04-26 20:29:09'),
(14, 'Datu Puti Soy Sauce', '47.00', '47.00', 'Pcs', '', '', '4801668500224', '0.00', '0.00', '0.00', '', '', '2022-04-26 20:31:40'),
(17, 'Baby wipes skin friendly dedicated', '45.00', '45.00', 'Box', '', '', '4806506313981', '0.00', '0.00', '0.00', '', '', '2022-04-26 20:42:32'),
(19, 'CLARO PALM OLEIN', '75.00', '75.00', 'Pcs', '', '', '4806014093344', '0.00', '0.00', '0.00', '', '', '2022-05-19 14:58:35'),
(20, 'test', '123.00', '123.00', 'Pcs', '', '', '4809010740014', '0.00', '0.00', '0.00', '', '', '2022-05-20 11:15:15'),
(21, 'datu  puti vinegar', '50.00', '50.00', 'Pcs', '', '', '4801668100141', '0.00', '0.00', '0.00', 'vinegar', '', '2022-05-20 21:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_list`
--

CREATE TABLE `transaction_list` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `TOTAL_AMOUNT` decimal(10,0) NOT NULL,
  `TENDERED_AMOUNT` decimal(10,0) NOT NULL,
  `DISCOUNT` int(11) DEFAULT NULL,
  `TOTAL_CHANGE` decimal(10,0) NOT NULL,
  `CREATED` datetime NOT NULL DEFAULT current_timestamp(),
  `MONTH` int(11) DEFAULT NULL,
  `YEAR` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_list`
--

INSERT INTO `transaction_list` (`ID`, `USERNAME`, `TOTAL_AMOUNT`, `TENDERED_AMOUNT`, `DISCOUNT`, `TOTAL_CHANGE`, `CREATED`, `MONTH`, `YEAR`) VALUES
(26, 'cashier1', '172', '172', 0, '0', '2022-05-16 20:27:22', 5, 2022),
(28, 'admin', '0', '0', 0, '0', '2022-05-17 11:35:06', 5, 2022),
(29, 'admin', '0', '0', 0, '0', '2022-05-17 11:35:32', 5, 2022),
(30, 'admin', '78', '0', 0, '0', '2022-05-17 11:35:36', 5, 2022),
(31, 'admin', '47', '0', 0, '0', '2022-05-17 11:36:07', 5, 2022),
(32, 'admin', '78', '80', 0, '2', '2022-05-17 11:44:41', 5, 2022),
(33, 'admin', '150', '200', 0, '50', '2022-05-17 11:45:35', 5, 2022),
(34, 'admin', '47', '50', 0, '3', '2022-05-17 12:04:15', 5, 2022),
(35, 'admin', '47', '47', 0, '0', '2022-05-17 12:04:58', 5, 2022),
(36, 'admin', '47', '5', 0, '-42', '2022-05-17 12:06:26', 5, 2022),
(37, 'admin', '45', '45', 0, '0', '2022-05-17 12:06:48', 5, 2022),
(38, 'admin', '244', '25', 0, '-219', '2022-05-17 12:07:48', 5, 2022),
(39, 'admin', '92', '92', 0, '0', '2022-05-17 12:08:22', 5, 2022),
(40, 'admin', '129', '15', 0, '-114', '2022-05-17 12:11:10', 5, 2022),
(41, 'admin', '129', '15', 0, '-114', '2022-05-17 12:11:47', 5, 2022),
(42, 'admin', '367', '367', 0, '0', '2022-05-17 12:12:34', 5, 2022),
(43, 'admin', '174', '174', 0, '0', '2022-05-17 14:45:59', 5, 2022),
(44, 'admin', '170', '66', 0, '-104', '2022-05-17 14:46:40', 5, 2022),
(45, 'admin', '232', '66', 0, '-166', '2022-05-17 14:47:02', 5, 2022),
(46, 'admin', '277', '66', 0, '-211', '2022-05-17 14:47:39', 5, 2022),
(47, 'admin', '371', '66', 0, '-305', '2022-05-17 14:50:32', 5, 2022),
(48, 'admin', '170', '66', 0, '-104', '2022-05-17 14:50:52', 5, 2022),
(49, 'admin', '92', '66', 0, '-26', '2022-05-17 14:53:44', 5, 2022),
(50, 'admin', '92', '66', 0, '-26', '2022-05-17 14:53:58', 5, 2022),
(51, 'admin', '123', '66', 0, '-57', '2022-05-17 14:54:11', 5, 2022),
(52, 'admin', '217', '66', 0, '-151', '2022-05-17 14:54:26', 5, 2022),
(53, 'admin', '217', '66', 0, '-151', '2022-05-17 14:55:28', 5, 2022),
(54, 'admin', '217', '66', 0, '-151', '2022-05-17 15:17:22', 5, 2022),
(55, 'admin', '49', '50', 0, '1', '2022-05-17 15:17:30', 5, 2022),
(56, 'admin', '170', '170', 0, '0', '2022-05-17 15:18:10', 5, 2022),
(57, 'admin', '217', '5', 0, '-212', '2022-05-17 19:33:38', 5, 2022),
(58, 'admin', '47', '66', 0, '19', '2022-05-17 19:33:52', 5, 2022),
(59, 'admin', '78', '78', 0, '0', '2022-05-17 19:34:44', 5, 2022),
(60, 'admin', '125', '500', 0, '375', '2022-05-17 19:37:39', 5, 2022),
(61, 'admin', '217', '25', 0, '-192', '2022-05-17 19:41:35', 5, 2022),
(62, 'admin', '242', '250', 0, '8', '2022-05-17 20:34:21', 5, 2022),
(63, 'admin', '242', '250', 0, '8', '2022-05-17 20:35:13', 5, 2022),
(64, 'admin', '217', '217', 0, '0', '2022-05-17 20:40:03', 5, 2022),
(65, 'admin', '217', '217', 0, '0', '2022-05-17 20:43:03', 5, 2022),
(66, 'admin', '217', '217', 0, '0', '2022-05-17 20:44:15', 5, 2022),
(67, 'admin', '217', '217', 0, '0', '2022-05-17 20:44:37', 5, 2022),
(68, 'admin', '217', '217', 0, '0', '2022-05-17 20:44:40', 5, 2022),
(69, 'admin', '217', '217', 0, '0', '2022-05-17 20:44:51', 5, 2022),
(70, 'admin', '217', '217', 0, '0', '2022-05-17 20:44:56', 5, 2022),
(71, 'admin', '217', '217', 0, '0', '2022-05-17 20:50:33', 5, 2022),
(72, 'admin', '125', '130', 0, '5', '2022-05-17 20:50:53', 5, 2022),
(73, 'admin', '125', '130', 0, '5', '2022-05-17 21:02:01', 5, 2022),
(74, 'admin', '125', '130', 0, '5', '2022-05-17 21:02:39', 5, 2022),
(75, 'admin', '125', '130', 0, '5', '2022-05-17 21:03:01', 5, 2022),
(76, 'admin', '92', '92', 0, '0', '2022-05-17 21:04:02', 5, 2022),
(77, 'admin', '92', '92', 0, '0', '2022-05-17 21:04:21', 5, 2022),
(78, 'admin', '125', '130', 0, '5', '2022-05-17 21:04:30', 5, 2022),
(79, 'admin', '125', '130', 0, '5', '2022-05-17 21:04:36', 5, 2022),
(80, 'admin', '51', '51', 0, '0', '2022-05-17 21:05:03', 5, 2022),
(81, 'admin', '125', '200', 0, '75', '2022-05-17 21:06:19', 5, 2022),
(82, 'admin', '125', '200', 0, '75', '2022-05-17 21:07:15', 5, 2022),
(83, 'admin', '125', '200', 0, '75', '2022-05-17 21:07:51', 5, 2022),
(84, 'admin', '125', '200', 0, '75', '2022-05-17 21:08:09', 5, 2022),
(85, 'admin', '139', '140', 0, '1', '2022-05-17 21:08:18', 5, 2022),
(86, 'admin', '125', '500', 0, '375', '2022-05-17 21:14:52', 5, 2022),
(87, 'admin', '125', '500', 0, '375', '2022-05-17 21:15:02', 5, 2022),
(88, 'admin', '123', '130', 0, '7', '2022-05-17 21:20:57', 5, 2022),
(89, 'admin', '123', '130', 0, '7', '2022-05-17 21:21:33', 5, 2022),
(90, 'admin', '94', '94', 0, '0', '2022-05-17 21:22:32', 5, 2022),
(91, 'admin', '78', '80', 0, '2', '2022-05-17 21:24:52', 5, 2022),
(92, 'admin', '170', '170', 0, '0', '2022-05-17 21:25:52', 5, 2022),
(93, 'admin', '170', '170', 0, '0', '2022-05-17 21:32:45', 5, 2022),
(94, 'admin', '277', '280', 0, '3', '2022-05-17 21:36:05', 5, 2022),
(95, 'admin', '47', '50', 0, '3', '2022-05-17 21:39:50', 5, 2022),
(96, 'admin', '170', '170', 0, '0', '2022-05-17 21:40:22', 5, 2022),
(97, 'admin', '273', '280', 0, '7', '2022-05-17 21:40:41', 5, 2022),
(98, 'admin', '170', '170', 0, '0', '2022-05-17 21:44:51', 5, 2022),
(99, 'admin', '170', '170', 0, '0', '2022-05-18 10:39:03', 5, 2022),
(100, 'admin', '139', '139', 0, '0', '2022-05-18 10:39:53', 5, 2022),
(101, 'admin', '139', '139', 0, '0', '2022-05-18 10:45:36', 5, 2022),
(102, 'admin', '170', '170', 0, '0', '2022-05-18 10:56:18', 5, 2022),
(103, 'admin', '127', '127', 0, '0', '2022-05-18 11:03:29', 5, 2022),
(104, 'admin', '170', '170', 0, '0', '2022-05-18 11:04:29', 5, 2022),
(105, 'admin', '170', '170', 0, '0', '2022-05-18 11:11:51', 5, 2022),
(106, 'admin', '170', '170', 0, '0', '2022-05-18 11:13:27', 5, 2022),
(107, 'admin', '92', '92', 0, '0', '2022-05-18 11:40:55', 5, 2022),
(108, 'admin', '170', '170', 0, '0', '2022-05-18 11:44:09', 5, 2022),
(109, 'admin', '170', '170', 0, '0', '2022-05-18 11:46:04', 5, 2022),
(110, 'admin', '170', '170', 0, '0', '2022-05-18 11:48:10', 5, 2022),
(111, 'admin', '170', '170', 0, '0', '2022-05-18 12:14:49', 5, 2022),
(112, 'admin', '170', '170', 0, '0', '2022-05-18 12:16:48', 5, 2022),
(113, 'admin', '199', '199', 0, '0', '2022-05-18 12:17:03', 5, 2022),
(114, 'admin', '78', '78', 0, '0', '2022-05-18 12:18:26', 5, 2022),
(115, 'admin', '154', '154', 0, '0', '2022-05-18 12:19:59', 5, 2022),
(116, 'admin', '45', '45', 0, '0', '2022-05-18 12:20:35', 5, 2022),
(117, 'admin', '78', '78', 0, '0', '2022-05-18 12:22:10', 5, 2022),
(118, 'admin', '150', '150', 0, '0', '2022-05-18 12:23:40', 5, 2022),
(119, 'admin', '150', '150', 0, '0', '2022-05-18 12:24:03', 5, 2022),
(120, 'admin', '62', '62', 0, '1', '2022-05-18 12:24:18', 5, 2022),
(121, 'admin', '78', '78', 0, '0', '2022-05-18 12:34:59', 5, 2022),
(122, 'admin', '170', '170', 0, '0', '2022-05-18 12:56:38', 5, 2022),
(123, 'admin', '170', '170', 0, '0', '2022-05-18 13:01:35', 5, 2022),
(124, 'admin', '96', '96', 0, '0', '2022-05-18 13:01:45', 5, 2022),
(125, 'admin', '92', '92', 0, '0', '2022-05-18 14:14:18', 5, 2022),
(126, 'admin', '129', '129', 0, '0', '2022-05-18 14:16:54', 5, 2022),
(127, 'admin', '49', '49', 0, '0', '2022-05-18 14:18:28', 5, 2022),
(128, 'admin', '49', '49', 0, '0', '2022-05-18 14:24:38', 5, 2022),
(129, 'admin', '228', '228', 0, '0', '2022-05-18 14:24:44', 5, 2022),
(130, 'admin', '228', '228', 0, '0', '2022-05-18 14:28:10', 5, 2022),
(131, 'admin', '125', '125', 0, '0', '2022-05-18 14:28:24', 5, 2022),
(132, 'admin', '92', '92', 0, '0', '2022-05-18 14:29:43', 5, 2022),
(133, 'admin', '246', '246', 0, '0', '2022-05-18 14:38:24', 5, 2022),
(134, 'admin', '228', '228', 0, '0', '2022-05-18 14:38:42', 5, 2022),
(135, 'admin', '228', '228', 0, '0', '2022-05-18 14:48:47', 5, 2022),
(136, 'admin', '129', '129', 0, '0', '2022-05-18 14:48:56', 5, 2022),
(137, 'admin', '322', '322', 0, '0', '2022-05-18 14:49:14', 5, 2022),
(138, 'admin', '170', '170', 0, '0', '2022-05-18 14:51:02', 5, 2022),
(139, 'admin', '170', '170', 0, '0', '2022-05-18 15:01:17', 5, 2022),
(140, 'admin', '172', '172', 0, '0', '2022-05-18 15:01:26', 5, 2022),
(141, 'admin', '174', '174', 0, '0', '2022-05-18 15:07:25', 5, 2022),
(142, 'admin', '45', '5', 0, '-40', '2022-05-18 15:12:17', 5, 2022),
(143, 'admin', '78', '78', 0, '0', '2022-05-18 15:12:25', 5, 2022),
(144, 'admin', '78', '78', 0, '0', '2022-05-18 15:14:27', 5, 2022),
(145, 'admin', '92', '92', 0, '0', '2022-05-18 15:14:43', 5, 2022),
(146, 'admin', '289', '289', 0, '0', '2022-05-18 16:06:37', 5, 2022),
(147, 'admin', '45', '45', 0, '0', '2022-05-18 16:13:52', 5, 2022),
(148, 'admin', '123', '123', 0, '0', '2022-05-18 16:20:45', 5, 2022),
(149, 'admin', '82', '82', 0, '0', '2022-05-18 16:24:36', 5, 2022),
(150, 'admin', '92', '92', 0, '0', '2022-05-18 16:39:19', 5, 2022),
(151, 'admin', '92', '92', 0, '0', '2022-05-18 16:39:49', 5, 2022),
(152, 'admin', '78', '78', 0, '0', '2022-05-18 16:39:58', 5, 2022),
(153, 'admin', '78', '78', 0, '0', '2022-05-18 16:54:20', 5, 2022),
(154, 'admin', '78', '78', 0, '0', '2022-05-18 16:54:41', 5, 2022),
(155, 'admin', '195', '195', 0, '0', '2022-05-18 16:56:41', 5, 2022),
(156, 'admin', '195', '195', 0, '0', '2022-05-18 16:58:39', 5, 2022),
(157, 'admin', '125', '125', 0, '0', '2022-05-18 16:58:53', 5, 2022),
(158, 'admin', '170', '170', 0, '0', '2022-05-18 16:59:46', 5, 2022),
(159, 'admin', '96', '96', 0, '0', '2022-05-18 17:02:06', 5, 2022),
(160, 'admin', '96', '96', 0, '0', '2022-05-18 17:03:46', 5, 2022),
(161, 'admin', '82', '82', 0, '0', '2022-05-18 17:06:10', 5, 2022),
(162, 'admin', '125', '125', 0, '0', '2022-05-18 17:12:18', 5, 2022),
(163, 'admin', '125', '125', 0, '0', '2022-05-18 17:12:59', 5, 2022),
(164, 'admin', '125', '125', 0, '0', '2022-05-18 17:13:11', 5, 2022),
(165, 'admin', '125', '125', 0, '0', '2022-05-18 17:13:27', 5, 2022),
(166, 'admin', '125', '125', 0, '0', '2022-05-18 17:13:57', 5, 2022),
(167, 'admin', '125', '125', 0, '0', '2022-05-18 17:16:13', 5, 2022),
(168, 'admin', '92', '92', 0, '0', '2022-05-18 17:16:24', 5, 2022),
(169, 'admin', '92', '92', 0, '0', '2022-05-18 17:16:41', 5, 2022),
(170, 'admin', '96', '96', 0, '0', '2022-05-18 17:50:27', 5, 2022),
(171, 'admin', '96', '96', 0, '0', '2022-05-18 17:50:52', 5, 2022),
(172, 'admin', '96', '96', 0, '0', '2022-05-18 17:51:01', 5, 2022),
(173, 'admin', '170', '170', 0, '0', '2022-05-18 17:54:58', 5, 2022),
(174, 'admin', '170', '170', 0, '0', '2022-05-18 17:55:25', 5, 2022),
(175, 'admin', '170', '170', 0, '0', '2022-05-18 17:55:55', 5, 2022),
(176, 'admin', '170', '170', 0, '0', '2022-05-18 17:57:11', 5, 2022),
(177, 'admin', '127', '127', 0, '0', '2022-05-18 17:57:27', 5, 2022),
(178, 'admin', '244', '244', 0, '0', '2022-05-18 17:58:27', 5, 2022),
(179, 'admin', '143', '143', 0, '0', '2022-05-18 18:05:03', 5, 2022),
(180, 'admin', '143', '143', 0, '0', '2022-05-18 18:05:11', 5, 2022),
(181, 'admin', '320', '320', 0, '0', '2022-05-18 18:05:27', 5, 2022),
(182, 'admin', '371', '371', 0, '0', '2022-05-18 21:27:20', 5, 2022),
(183, 'admin', '92', '92', 0, '0', '2022-05-18 21:30:39', 5, 2022),
(184, 'admin', '129', '129', 0, '0', '2022-05-18 21:31:33', 5, 2022),
(185, 'admin', '125', '125', 0, '0', '2022-05-18 21:32:44', 5, 2022),
(186, 'admin', '125', '125', 0, '0', '2022-05-18 21:34:36', 5, 2022),
(187, 'admin', '123', '123', 0, '0', '2022-05-18 21:34:42', 5, 2022),
(188, 'admin', '123', '123', 0, '0', '2022-05-18 21:35:42', 5, 2022),
(189, 'admin', '123', '123', 0, '0', '2022-05-18 21:35:49', 5, 2022),
(190, 'admin', '123', '123', 0, '0', '2022-05-18 21:43:44', 5, 2022),
(191, 'admin', '123', '123', 0, '0', '2022-05-18 21:43:52', 5, 2022),
(192, 'admin', '273', '273', 0, '0', '2022-05-18 21:44:08', 5, 2022),
(193, 'admin', '217', '217', 0, '0', '2022-05-18 21:46:06', 5, 2022),
(194, 'admin', '371', '371', 0, '0', '2022-05-18 21:47:13', 5, 2022),
(195, 'admin', '217', '217', 0, '0', '2022-05-18 21:47:25', 5, 2022),
(196, 'admin', '217', '217', 0, '0', '2022-05-18 21:48:53', 5, 2022),
(197, 'admin', '320', '320', 0, '0', '2022-05-18 21:49:04', 5, 2022),
(198, 'admin', '123', '123', 0, '0', '2022-05-18 21:49:10', 5, 2022),
(199, 'admin', '170', '170', 0, '0', '2022-05-18 21:50:03', 5, 2022),
(200, 'admin', '170', '170', 0, '0', '2022-05-18 21:50:45', 5, 2022),
(201, 'admin', '170', '170', 0, '0', '2022-05-18 21:51:23', 5, 2022),
(202, 'admin', '170', '170', 0, '0', '2022-05-18 21:51:30', 5, 2022),
(203, 'admin', '170', '170', 0, '0', '2022-05-18 21:53:49', 5, 2022),
(204, 'admin', '125', '125', 0, '0', '2022-05-18 21:54:14', 5, 2022),
(205, 'admin', '221', '221', 0, '0', '2022-05-18 21:55:36', 5, 2022),
(206, 'admin', '221', '221', 0, '0', '2022-05-18 21:55:44', 5, 2022),
(207, 'admin', '125', '125', 0, '0', '2022-05-18 21:55:50', 5, 2022),
(208, 'admin', '174', '174', 0, '0', '2022-05-18 21:57:10', 5, 2022),
(209, 'admin', '371', '371', 0, '0', '2022-05-18 21:57:30', 5, 2022),
(210, 'admin', '371', '371', 0, '0', '2022-05-18 22:00:02', 5, 2022),
(211, 'admin', '174', '174', 0, '0', '2022-05-18 22:00:12', 5, 2022),
(212, 'admin', '174', '174', 0, '0', '2022-05-18 22:02:28', 5, 2022),
(213, 'admin', '221', '221', 0, '0', '2022-05-18 22:02:40', 5, 2022),
(214, 'admin', '221', '221', 0, '0', '2022-05-18 22:05:08', 5, 2022),
(215, 'admin', '371', '371', 0, '0', '2022-05-18 22:05:21', 5, 2022),
(216, 'admin', '371', '371', 0, '0', '2022-05-18 22:06:31', 5, 2022),
(217, 'admin', '371', '371', 0, '0', '2022-05-18 22:06:51', 5, 2022),
(218, 'admin', '371', '371', 0, '0', '2022-05-18 22:07:44', 5, 2022),
(219, 'admin', '371', '371', 0, '0', '2022-05-18 22:08:03', 5, 2022),
(220, 'admin', '371', '371', 0, '0', '2022-05-18 22:08:25', 5, 2022),
(221, 'admin', '320', '320', 0, '0', '2022-05-18 22:08:34', 5, 2022),
(222, 'admin', '123', '123', 0, '0', '2022-05-18 22:13:34', 5, 2022),
(223, 'admin', '123', '123', 0, '0', '2022-05-18 22:13:51', 5, 2022),
(224, 'admin', '123', '123', 0, '0', '2022-05-18 22:13:56', 5, 2022),
(225, 'admin', '125', '125', 0, '0', '2022-05-18 22:14:17', 5, 2022),
(226, 'admin', '125', '125', 0, '0', '2022-05-18 22:14:50', 5, 2022),
(227, 'admin', '92', '92', 0, '0', '2022-05-18 22:14:55', 5, 2022),
(228, 'admin', '123', '123', 0, '0', '2022-05-18 22:15:12', 5, 2022),
(229, 'admin', '96', '96', 0, '0', '2022-05-18 22:21:24', 5, 2022),
(230, 'admin', '96', '96', 0, '0', '2022-05-18 22:22:04', 5, 2022),
(231, 'admin', '123', '123', 0, '0', '2022-05-18 22:22:14', 5, 2022),
(232, 'admin', '123', '123', 0, '0', '2022-05-18 22:23:06', 5, 2022),
(233, 'admin', '92', '92', 0, '0', '2022-05-18 22:23:13', 5, 2022),
(234, 'admin', '92', '92', 0, '0', '2022-05-18 22:24:38', 5, 2022),
(235, 'admin', '170', '170', 0, '0', '2022-05-18 22:24:43', 5, 2022),
(236, 'admin', '45', '45', 0, '0', '2022-05-18 22:24:53', 5, 2022),
(237, 'admin', '45', '45', 0, '0', '2022-05-18 22:26:26', 5, 2022),
(238, 'admin', '170', '170', 0, '0', '2022-05-18 22:26:35', 5, 2022),
(239, 'admin', '170', '170', 0, '0', '2022-05-18 22:27:04', 5, 2022),
(240, 'admin', '92', '92', 0, '0', '2022-05-18 22:27:10', 5, 2022),
(241, 'admin', '92', '92', 0, '0', '2022-05-18 22:27:36', 5, 2022),
(242, 'admin', '129', '129', 0, '0', '2022-05-18 22:27:45', 5, 2022),
(243, 'admin', '129', '129', 0, '0', '2022-05-18 22:28:19', 5, 2022),
(244, 'admin', '170', '170', 0, '0', '2022-05-18 22:28:27', 5, 2022),
(245, 'admin', '174', '174', 0, '0', '2022-05-18 22:28:39', 5, 2022),
(246, 'admin', '174', '174', 0, '0', '2022-05-18 22:29:05', 5, 2022),
(247, 'admin', '143', '143', 0, '0', '2022-05-18 22:29:12', 5, 2022),
(248, 'admin', '324', '324', 0, '0', '2022-05-18 22:29:29', 5, 2022),
(249, 'admin', '371', '371', 0, '0', '2022-05-18 22:30:23', 5, 2022),
(250, 'admin', '371', '371', 0, '0', '2022-05-18 22:30:48', 5, 2022),
(251, 'admin', '371', '371', 0, '0', '2022-05-19 09:08:39', 5, 2022),
(252, 'admin', '371', '371', 0, '0', '2022-05-19 09:12:22', 5, 2022),
(253, 'admin', '170', '170', 0, '0', '2022-05-19 09:12:30', 5, 2022),
(254, 'admin', '371', '371', 0, '0', '2022-05-19 09:12:47', 5, 2022),
(255, 'admin', '45', '45', 0, '0', '2022-05-19 09:13:17', 5, 2022),
(256, 'admin', '45', '45', 0, '0', '2022-05-19 09:19:25', 5, 2022),
(257, 'admin', '123', '123', 0, '0', '2022-05-19 09:19:59', 5, 2022),
(258, 'admin', '45', '45', 0, '0', '2022-05-19 09:25:51', 5, 2022),
(259, 'admin', '45', '45', 0, '0', '2022-05-19 09:32:56', 5, 2022),
(260, 'admin', '45', '45', 0, '0', '2022-05-19 09:33:33', 5, 2022),
(261, 'admin', '78', '78', 0, '0', '2022-05-19 09:35:12', 5, 2022),
(262, 'admin', '78', '78', 0, '0', '2022-05-19 09:40:32', 5, 2022),
(263, 'admin', '47', '47', 0, '0', '2022-05-19 09:40:38', 5, 2022),
(264, 'admin', '47', '47', 0, '0', '2022-05-19 09:48:44', 5, 2022),
(265, 'admin', '92', '92', 0, '0', '2022-05-19 09:48:50', 5, 2022),
(266, 'admin', '217', '217', 0, '0', '2022-05-19 09:50:30', 5, 2022),
(267, 'admin', '217', '217', 0, '0', '2022-05-19 09:51:56', 5, 2022),
(268, 'admin', '78', '78', 0, '0', '2022-05-19 09:52:00', 5, 2022),
(269, 'admin', '125', '125', 0, '0', '2022-05-19 09:52:12', 5, 2022),
(270, 'admin', '125', '125', 0, '0', '2022-05-19 09:54:34', 5, 2022),
(271, 'admin', '45', '45', 0, '0', '2022-05-19 09:54:39', 5, 2022),
(272, 'admin', '45', '45', 0, '0', '2022-05-19 09:54:47', 5, 2022),
(273, 'admin', '45', '45', 0, '0', '2022-05-19 09:55:28', 5, 2022),
(274, 'admin', '78', '78', 0, '0', '2022-05-19 09:55:31', 5, 2022),
(275, 'admin', '78', '78', 0, '0', '2022-05-19 09:55:43', 5, 2022),
(276, 'admin', '78', '78', 0, '0', '2022-05-19 09:55:55', 5, 2022),
(277, 'admin', '45', '45', 0, '0', '2022-05-19 09:58:19', 5, 2022),
(278, 'admin', '170', '170', 0, '0', '2022-05-19 10:03:27', 5, 2022),
(279, 'admin', '139', '139', 0, '0', '2022-05-19 10:04:00', 5, 2022),
(280, 'admin', '45', '45', 0, '0', '2022-05-19 10:08:36', 5, 2022),
(281, 'admin', '123', '123', 0, '0', '2022-05-19 11:22:25', 5, 2022),
(282, 'admin', '78', '78', 0, '0', '2022-05-19 11:26:01', 5, 2022),
(283, 'admin', '45', '45', 0, '0', '2022-05-19 11:26:35', 5, 2022),
(284, 'admin', '78', '78', 0, '0', '2022-05-19 11:27:31', 5, 2022),
(285, 'admin', '78', '78', 0, '0', '2022-05-19 11:28:06', 5, 2022),
(286, 'admin', '45', '45', 0, '0', '2022-05-19 11:28:17', 5, 2022),
(287, 'admin', '45', '45', 0, '0', '2022-05-19 11:28:36', 5, 2022),
(288, 'admin', '45', '45', 0, '0', '2022-05-19 11:28:43', 5, 2022),
(289, 'admin', '45', '45', 0, '0', '2022-05-19 11:28:50', 5, 2022),
(290, 'admin', '123', '123', 0, '0', '2022-05-19 11:29:53', 5, 2022),
(291, 'admin', '92', '92', 0, '0', '2022-05-19 11:31:50', 5, 2022),
(292, 'admin', '123', '123', 0, '0', '2022-05-19 11:32:56', 5, 2022),
(293, 'admin', '123', '123', 0, '0', '2022-05-19 11:34:27', 5, 2022),
(294, 'admin', '150', '150', 0, '0', '2022-05-19 11:36:32', 5, 2022),
(295, 'admin', '78', '78', 0, '0', '2022-05-19 11:38:25', 5, 2022),
(296, 'admin', '78', '78', 0, '0', '2022-05-19 11:39:02', 5, 2022),
(297, 'admin', '125', '125', 0, '0', '2022-05-19 11:39:13', 5, 2022),
(298, 'admin', '125', '125', 0, '0', '2022-05-19 11:39:32', 5, 2022),
(299, 'admin', '47', '47', 0, '0', '2022-05-19 11:40:01', 5, 2022),
(300, 'admin', '47', '47', 0, '0', '2022-05-19 11:40:30', 5, 2022),
(301, 'admin', '139', '139', 0, '0', '2022-05-19 11:42:38', 5, 2022),
(302, 'admin', '139', '139', 0, '0', '2022-05-19 11:43:10', 5, 2022),
(303, 'admin', '92', '92', 0, '0', '2022-05-19 11:43:50', 5, 2022),
(304, 'admin', '92', '92', 0, '0', '2022-05-19 11:44:09', 5, 2022),
(305, 'admin', '92', '92', 0, '0', '2022-05-19 11:44:24', 5, 2022),
(306, 'admin', '47', '47', 0, '0', '2022-05-19 11:48:52', 5, 2022),
(307, 'admin', '123', '123', 0, '0', '2022-05-19 11:49:55', 5, 2022),
(308, 'admin', '47', '47', 0, '0', '2022-05-19 11:50:24', 5, 2022),
(309, 'admin', '49', '49', 0, '0', '2022-05-19 11:51:12', 5, 2022),
(310, 'admin', '49', '49', 0, '0', '2022-05-19 11:51:20', 5, 2022),
(311, 'admin', '49', '49', 0, '0', '2022-05-19 11:51:39', 5, 2022),
(312, 'admin', '195', '195', 0, '0', '2022-05-19 11:52:03', 5, 2022),
(313, 'admin', '125', '125', 0, '0', '2022-05-19 11:53:39', 5, 2022),
(314, 'admin', '125', '125', 0, '0', '2022-05-19 11:53:40', 5, 2022),
(315, 'admin', '78', '78', 0, '0', '2022-05-19 11:54:25', 5, 2022),
(316, 'admin', '78', '78', 0, '0', '2022-05-19 11:54:27', 5, 2022),
(317, 'admin', '92', '92', 0, '0', '2022-05-19 11:54:43', 5, 2022),
(318, 'admin', '92', '92', 0, '0', '2022-05-19 11:55:00', 5, 2022),
(319, 'admin', '92', '92', 0, '0', '2022-05-19 11:55:19', 5, 2022),
(320, 'admin', '92', '92', 0, '0', '2022-05-19 11:55:50', 5, 2022),
(321, 'admin', '92', '92', 0, '0', '2022-05-19 11:58:14', 5, 2022),
(322, 'admin', '94', '94', 0, '0', '2022-05-19 12:00:14', 5, 2022),
(323, 'admin', '94', '94', 0, '0', '2022-05-19 12:00:43', 5, 2022),
(324, 'admin', '49', '49', 0, '0', '2022-05-19 12:01:01', 5, 2022),
(325, 'admin', '123', '123', 0, '0', '2022-05-19 12:02:00', 5, 2022),
(326, 'admin', '123', '123', 0, '0', '2022-05-19 12:02:27', 5, 2022),
(327, 'admin', '92', '92', 0, '0', '2022-05-19 12:02:54', 5, 2022),
(328, 'admin', '82', '82', 0, '0', '2022-05-19 12:03:54', 5, 2022),
(329, 'admin', '82', '82', 0, '0', '2022-05-19 12:03:55', 5, 2022),
(330, 'admin', '45', '45', 0, '0', '2022-05-19 12:04:16', 5, 2022),
(331, 'admin', '129', '129', 0, '0', '2022-05-19 12:04:39', 5, 2022),
(332, 'admin', '129', '129', 0, '0', '2022-05-19 12:05:04', 5, 2022),
(333, 'admin', '123', '123', 0, '0', '2022-05-19 12:05:23', 5, 2022),
(334, 'admin', '123', '123', 0, '0', '2022-05-19 12:05:30', 5, 2022),
(335, 'admin', '47', '47', 0, '0', '2022-05-19 12:06:08', 5, 2022),
(336, 'admin', '47', '47', 0, '0', '2022-05-19 12:06:09', 5, 2022),
(337, 'admin', '94', '94', 0, '0', '2022-05-19 12:06:29', 5, 2022),
(338, 'admin', '228', '228', 0, '0', '2022-05-19 12:55:30', 5, 2022),
(339, 'admin', '123', '123', 0, '0', '2022-05-19 12:56:31', 5, 2022),
(340, 'admin', '123', '123', 0, '0', '2022-05-19 12:57:20', 5, 2022),
(341, 'admin', '125', '125', 0, '0', '2022-05-19 12:57:34', 5, 2022),
(342, 'admin', '125', '125', 0, '0', '2022-05-19 12:57:39', 5, 2022),
(343, 'admin', '47', '47', 0, '0', '2022-05-19 12:58:02', 5, 2022),
(344, 'admin', '47', '47', 0, '0', '2022-05-19 12:58:03', 5, 2022),
(345, 'admin', '92', '92', 0, '0', '2022-05-19 12:58:15', 5, 2022),
(346, 'admin', '92', '92', 0, '0', '2022-05-19 12:58:24', 5, 2022),
(347, 'admin', '82', '82', 0, '0', '2022-05-19 12:58:35', 5, 2022),
(348, 'admin', '82', '82', 0, '0', '2022-05-19 12:58:43', 5, 2022),
(349, 'admin', '45', '45', 0, '0', '2022-05-19 12:58:59', 5, 2022),
(350, 'admin', '45', '45', 0, '0', '2022-05-19 12:59:12', 5, 2022),
(351, 'admin', '123', '123', 0, '0', '2022-05-19 13:00:08', 5, 2022),
(352, 'admin', '123', '123', 0, '0', '2022-05-19 13:00:09', 5, 2022),
(353, 'admin', '125', '125', 0, '0', '2022-05-19 13:00:29', 5, 2022),
(354, 'admin', '123', '123', 0, '0', '2022-05-19 13:00:39', 5, 2022),
(355, 'admin', '123', '123', 0, '0', '2022-05-19 13:00:49', 5, 2022),
(356, 'admin', '125', '125', 0, '0', '2022-05-19 13:01:01', 5, 2022),
(357, 'admin', '125', '125', 0, '0', '2022-05-19 13:01:12', 5, 2022),
(358, 'admin', '49', '49', 0, '0', '2022-05-19 13:01:29', 5, 2022),
(359, 'admin', '49', '49', 0, '0', '2022-05-19 13:01:30', 5, 2022),
(360, 'admin', '92', '92', 0, '0', '2022-05-19 13:01:41', 5, 2022),
(361, 'admin', '92', '92', 0, '0', '2022-05-19 13:01:47', 5, 2022),
(362, 'admin', '92', '92', 0, '0', '2022-05-19 13:03:10', 5, 2022),
(363, 'admin', '92', '92', 0, '0', '2022-05-19 13:03:11', 5, 2022),
(364, 'admin', '92', '92', 0, '0', '2022-05-19 13:03:39', 5, 2022),
(365, 'admin', '92', '92', 0, '0', '2022-05-19 13:04:05', 5, 2022),
(366, 'admin', '78', '78', 0, '0', '2022-05-19 13:04:21', 5, 2022),
(367, 'admin', '195', '195', 0, '0', '2022-05-19 13:04:55', 5, 2022),
(368, 'admin', '195', '195', 0, '0', '2022-05-19 13:04:56', 5, 2022),
(369, 'admin', '51', '51', 0, '0', '2022-05-19 13:05:10', 5, 2022),
(370, 'admin', '51', '51', 0, '0', '2022-05-19 13:05:12', 5, 2022),
(371, 'admin', '92', '92', 0, '0', '2022-05-19 13:05:43', 5, 2022),
(372, 'admin', '92', '92', 0, '0', '2022-05-19 13:06:10', 5, 2022),
(373, 'admin', '92', '92', 0, '0', '2022-05-19 13:06:17', 5, 2022),
(374, 'admin', '92', '92', 0, '0', '2022-05-19 13:06:24', 5, 2022),
(375, 'admin', '92', '92', 0, '0', '2022-05-19 13:08:04', 5, 2022),
(376, 'admin', '92', '92', 0, '0', '2022-05-19 13:08:28', 5, 2022),
(377, 'admin', '129', '129', 0, '0', '2022-05-19 13:10:41', 5, 2022),
(378, 'admin', '129', '129', 0, '0', '2022-05-19 13:10:42', 5, 2022),
(379, 'admin', '92', '92', 0, '0', '2022-05-19 13:11:07', 5, 2022),
(380, 'admin', '320', '320', 0, '0', '2022-05-19 13:14:25', 5, 2022),
(381, 'admin', '92', '92', 0, '0', '2022-05-19 13:15:00', 5, 2022),
(382, 'admin', '92', '92', 0, '0', '2022-05-19 13:15:42', 5, 2022),
(383, 'admin', '82', '82', 0, '0', '2022-05-19 13:16:31', 5, 2022),
(384, 'admin', '82', '82', 0, '0', '2022-05-19 13:17:13', 5, 2022),
(385, 'admin', '94', '94', 0, '0', '2022-05-19 13:17:31', 5, 2022),
(386, 'admin', '47', '47', 0, '0', '2022-05-19 13:18:02', 5, 2022),
(387, 'admin', '47', '47', 0, '0', '2022-05-19 13:18:11', 5, 2022),
(388, 'admin', '92', '92', 0, '0', '2022-05-19 13:21:52', 5, 2022),
(389, 'admin', '92', '92', 0, '0', '2022-05-19 13:21:55', 5, 2022),
(390, 'admin', '92', '92', 0, '0', '2022-05-19 13:22:04', 5, 2022),
(391, 'admin', '51', '51', 0, '0', '2022-05-19 13:35:16', 5, 2022),
(392, 'cashier', '170', '170', 0, '0', '2022-05-19 14:20:00', 5, 2022),
(393, 'cashier', '170', '170', 0, '0', '2022-05-19 14:20:57', 5, 2022),
(394, 'cashier', '92', '92', 0, '0', '2022-05-19 14:21:34', 5, 2022),
(395, 'cashier', '92', '92', 0, '0', '2022-05-19 14:21:37', 5, 2022),
(396, 'cashier', '123', '123', 0, '0', '2022-05-19 14:22:01', 5, 2022),
(397, 'cashier', '170', '170', 0, '0', '2022-05-19 14:23:45', 5, 2022),
(398, 'cashier', '170', '170', 0, '0', '2022-05-19 14:24:49', 5, 2022),
(399, 'cashier', '51', '51', 0, '0', '2022-05-19 14:25:05', 5, 2022),
(400, 'cashier', '51', '51', 0, '0', '2022-05-19 14:25:15', 5, 2022),
(401, 'cashier', '92', '92', 0, '0', '2022-05-19 14:25:29', 5, 2022),
(402, 'cashier', '92', '92', 0, '0', '2022-05-19 14:25:55', 5, 2022),
(403, 'cashier', '170', '170', 0, '0', '2022-05-19 14:26:23', 5, 2022),
(404, 'cashier', '92', '92', 0, '0', '2022-05-19 14:26:59', 5, 2022),
(405, 'cashier', '92', '92', 0, '0', '2022-05-19 14:27:01', 5, 2022),
(406, 'cashier', '123', '123', 0, '0', '2022-05-19 14:27:25', 5, 2022),
(407, 'cashier', '123', '123', 0, '0', '2022-05-19 14:27:26', 5, 2022),
(408, 'cashier', '123', '123', 0, '0', '2022-05-19 14:29:30', 5, 2022),
(409, 'cashier', '92', '92', 0, '0', '2022-05-19 14:33:22', 5, 2022),
(410, 'cashier', '92', '92', 0, '0', '2022-05-19 14:33:23', 5, 2022),
(411, 'cashier', '92', '92', 0, '0', '2022-05-19 14:35:38', 5, 2022),
(412, 'cashier', '92', '92', 0, '0', '2022-05-19 14:37:41', 5, 2022),
(413, 'cashier', '92', '92', 0, '0', '2022-05-19 14:38:47', 5, 2022),
(414, 'cashier', '92', '92', 0, '0', '2022-05-19 14:39:34', 5, 2022),
(415, 'cashier', '123', '123', 0, '0', '2022-05-19 14:41:29', 5, 2022),
(416, 'cashier', '123', '123', 0, '0', '2022-05-19 14:43:01', 5, 2022),
(417, 'cashier', '123', '123', 0, '0', '2022-05-19 14:43:02', 5, 2022),
(418, 'cashier', '123', '123', 0, '0', '2022-05-19 14:43:52', 5, 2022),
(419, 'cashier', '123', '123', 0, '0', '2022-05-19 14:46:30', 5, 2022),
(420, 'cashier', '92', '92', 0, '0', '2022-05-19 14:46:44', 5, 2022),
(421, 'cashier', '92', '92', 0, '0', '2022-05-19 14:50:43', 5, 2022),
(422, 'cashier', '82', '82', 0, '0', '2022-05-19 14:51:01', 5, 2022),
(423, 'cashier', '92', '92', 0, '0', '2022-05-19 14:54:54', 5, 2022),
(424, 'admin', '49', '49', 0, '0', '2022-05-19 15:03:09', 5, 2022),
(425, 'admin', '49', '49', 0, '0', '2022-05-19 15:03:34', 5, 2022),
(426, 'admin', '120', '120', 0, '0', '2022-05-19 15:03:58', 5, 2022),
(427, 'admin', '120', '120', 0, '0', '2022-05-19 15:05:34', 5, 2022),
(428, 'admin', '120', '120', 0, '0', '2022-05-19 15:05:44', 5, 2022),
(429, 'admin', '120', '120', 0, '0', '2022-05-19 15:06:09', 5, 2022),
(430, 'admin', '120', '120', 0, '0', '2022-05-19 15:06:22', 5, 2022),
(431, 'admin', '82', '82', 0, '0', '2022-05-19 15:07:27', 5, 2022),
(432, 'admin', '82', '82', 0, '0', '2022-05-19 15:07:28', 5, 2022),
(433, 'admin', '82', '82', 0, '0', '2022-05-19 15:07:35', 5, 2022),
(434, 'admin', '82', '82', 0, '0', '2022-05-19 15:08:19', 5, 2022),
(435, 'admin', '167', '167', 0, '0', '2022-05-19 15:09:03', 5, 2022),
(436, 'admin', '167', '167', 0, '0', '2022-05-19 15:09:04', 5, 2022),
(437, 'admin', '125', '125', 0, '0', '2022-05-19 15:09:28', 5, 2022),
(438, 'admin', '125', '125', 0, '0', '2022-05-19 15:09:37', 5, 2022),
(439, 'admin', '92', '92', 0, '0', '2022-05-19 15:10:31', 5, 2022),
(440, 'admin', '125', '125', 0, '0', '2022-05-19 15:10:50', 5, 2022),
(441, 'admin', '125', '125', 0, '0', '2022-05-19 15:10:50', 5, 2022),
(442, 'admin', '94', '94', 0, '0', '2022-05-19 15:11:54', 5, 2022),
(443, 'admin', '274', '274', 0, '0', '2022-05-19 15:14:29', 5, 2022),
(444, 'admin', '92', '92', 0, '0', '2022-05-19 15:16:19', 5, 2022),
(445, 'admin', '94', '94', 0, '0', '2022-05-19 15:43:23', 5, 2022),
(446, 'admin', '75', '75', 0, '0', '2022-05-20 11:12:59', 5, 2022),
(447, 'admin', '123', '123', 0, '0', '2022-05-20 11:16:53', 5, 2022),
(448, 'jake', '7590', '8000', 0, '410', '2022-05-20 21:19:18', 5, 2022),
(449, 'admin', '2', '2', 0, '0', '2022-05-20 21:33:07', 5, 2022);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `TYPE` text NOT NULL,
  `DATE_CREATED` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `NAME`, `USERNAME`, `PASSWORD`, `TYPE`, `DATE_CREATED`) VALUES
(2, 'admin', 'admin', 'admin', 'Administrator', '2022-04-15 10:34:28'),
(44, 'user1', 'cashier', 'cashier', 'Cashier', '2022-04-21 17:57:40'),
(52, 'user2', 'cashier1', 'test', 'Cashier', '2022-04-24 14:15:39'),
(53, 'user3', 'cashier2', 'cashier2', 'Cashier', '2022-04-24 14:15:50'),
(54, 'jake', 'jake', 'datamex', 'Cashier', '2022-05-20 21:10:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_list`
--
ALTER TABLE `transaction_list`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `transaction_list`
--
ALTER TABLE `transaction_list`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=450;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
