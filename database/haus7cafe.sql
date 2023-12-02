-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2023 at 05:38 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `haus7cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` int(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` longtext NOT NULL,
  `message_status` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `phone`, `subject`, `message`, `message_status`, `date`) VALUES
(32, 'Alicia', 123456789, 'Test123', 'Function and Features Testing ', 'read', '2023-11-29 05:29:09'),
(33, 'Bryan', 198765432, 'Booking Reservation', 'Monday, 4 September 2023\r\n8:00pm - 9:30pm\r\n\r\n5 pax', 'read', '2023-11-30 02:08:25'),
(34, 'Bryan', 192345678, 'Contact Message', 'Hello World!', 'read', '2023-11-30 02:18:52'),
(35, 'Lim Mei Xuan', 134256987, 'Hello', 'Here are for the contact message content.', 'read', '2023-11-30 02:27:31'),
(36, 'Oh Wen Chi', 178923645, 'Birthday Party', 'Book for birthday party.\r\n\r\nFriday, 15 September 2023\r\n\r\nTime: 11:00am - 1:00pm\r\n\r\n10 pax', 'read', '2023-11-30 02:35:45'),
(37, 'Wong Chen Dong', 167234598, 'Problem faced when placing order', 'The voucher cannot be claim, please help to solve this issue', 'unread', '2023-12-01 04:28:29'),
(39, 'Celine KY', 2147483647, 'Asking for discount', 'Hi, There. Any Discount for Christmas', 'unread', '2023-12-02 11:57:49');

-- --------------------------------------------------------

--
-- Table structure for table `online_orders_new`
--

CREATE TABLE `online_orders_new` (
  `order_id` int(100) NOT NULL,
  `Item_Name` varchar(100) NOT NULL,
  `Price` int(100) NOT NULL,
  `Quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `online_orders_new`
--

INSERT INTO `online_orders_new` (`order_id`, `Item_Name`, `Price`, `Quantity`) VALUES
(137, 'Latte', 12, 1),
(137, 'Matcha Milk', 11, 1),
(138, 'Spicy Portuguese Chicken', 22, 1),
(138, 'Matcha Milk', 11, 1),
(139, 'Percik Chicken', 16, 1),
(139, 'Spicy Portuguese Chicken', 22, 1),
(140, 'Matcha Milk', 11, 1),
(140, 'Cappuccino', 11, 1),
(141, 'Nasi Goreng Petai', 15, 2),
(142, 'Matcha Milk', 11, 1),
(142, 'Latte', 12, 2),
(143, 'Spicy Portuguese Chicken', 22, 2),
(143, 'Uncle Paul Fish & Chips', 22, 3),
(144, 'Yuzu Spicy Mocktail', 12, 3),
(144, 'Uncle Paul Fish & Chips', 22, 1),
(144, 'Spicy Portuguese Chicken', 22, 1),
(145, 'Uncle Paul Fish & Chips', 22, 4),
(145, 'Nasi Goreng Petai', 15, 4),
(145, 'Butter Milk Chicken', 20, 2),
(145, 'Orange Cold Brew Coffee', 11, 3),
(145, 'Matcha Milk', 11, 2),
(145, 'Latte', 12, 3),
(145, 'Cappuccino', 11, 2),
(146, 'Nasi Goreng Petai', 15, 1),
(146, 'Orange Cold Brew Coffee', 11, 1),
(146, 'Spicy Portuguese Chicken', 22, 2),
(146, 'Butter Milk Chicken', 20, 2),
(146, 'Matcha Milk', 11, 2),
(146, 'Latte', 12, 2),
(146, 'Yuzu Spicy Mocktail', 12, 1),
(146, 'Cappuccino', 11, 1),
(147, 'Butter Milk Chicken', 20, 1),
(147, 'Orange Cold Brew Coffee', 11, 1),
(148, 'Nasi Goreng Petai', 15, 1),
(148, 'Uncle Paul Fish & Chips', 22, 1),
(148, 'Percik Chicken', 16, 1),
(148, 'Yuzu Spicy Mocktail', 12, 1),
(148, 'Latte', 12, 1),
(149, 'Spicy Portuguese Chicken', 22, 1),
(149, 'Percik Chicken', 16, 1),
(149, 'Yuzu Spicy Mocktail', 12, 1),
(149, 'Matcha Milk', 11, 1),
(150, 'Matcha Milk', 11, 1),
(150, 'Butter Milk Chicken', 20, 1),
(150, 'Uncle Paul Fish & Chips', 22, 2),
(150, 'Cappuccino', 11, 1),
(150, 'Orange Cold Brew Coffee', 11, 1),
(150, 'Spicy Portuguese Chicken', 22, 1),
(150, 'Percik Chicken', 16, 1),
(151, 'Orange Cold Brew Coffee', 11, 1),
(151, 'Percik Chicken', 16, 1),
(151, 'Uncle Paul Fish & Chips', 22, 1),
(151, 'Yuzu Spicy Mocktail', 12, 2),
(152, 'Matcha Milk', 11, 1),
(152, 'Butter Milk Chicken', 20, 1),
(152, 'Orange Cold Brew Coffee', 11, 1),
(153, 'Mushroom Soup', 10, 1),
(154, 'Mushroom Soup', 10, 1),
(155, 'Soup', 10, 8),
(156, 'Soup', 10, 2),
(157, 'Mushroom Soup', 10, 1),
(158, 'Soup', 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `order_manager`
--

CREATE TABLE `order_manager` (
  `order_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `cus_name` text NOT NULL,
  `cus_email` varchar(100) NOT NULL,
  `cus_add1` varchar(100) NOT NULL,
  `cus_city` text NOT NULL,
  `cus_phone` bigint(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `order_date` datetime NOT NULL,
  `total_amount` int(11) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `order_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order_manager`
--

INSERT INTO `order_manager` (`order_id`, `username`, `cus_name`, `cus_email`, `cus_add1`, `cus_city`, `cus_phone`, `payment_status`, `order_date`, `total_amount`, `transaction_id`, `order_status`) VALUES
(137, 'Alicia', 'Alicia', 'alicia@gmail.com', 'No.12, Jalan York, 11900', 'Puchong', 60123456789, 'successful', '2023-11-29 05:30:31', 23, 'ONL-PAY-Y516FSMFJN', 'Delivered'),
(138, 'Alicia', 'Alicia', 'alicia@gmail.com', 'No.12, Jalan York, 11900', 'Puchong', 60123456789, 'successful', '2023-11-29 05:38:24', 34, 'ONL-PAY-PM1KLOUN1W', 'Delivered'),
(139, 'Alicia', 'Alicia', 'alicia@gmail.com', 'No.12, Jalan York, 11900', 'Puchong', 60123456789, 'successful', '2023-11-30 01:54:27', 40, 'ONL-PAY-YTMU7YYWCE', 'Delivered'),
(140, 'Bryan', 'Bryan', 'bryan@gmail.com', 'No.14, Lintang Bendari 13002', 'George Town', 60129876543, 'successful', '2023-11-30 02:06:41', 22, 'ONL-PAY-8W3IK4UAIZ', 'Delivered'),
(141, 'Bryan', 'Bryan', 'bryan@gmail.com', 'No.14, Lintang Bendari 13002', 'George Town', 60129876543, 'Pending', '2023-11-30 02:08:51', 32, 'ONL-PAY-DZA4DAJ684', 'Cancelled'),
(142, 'Mei Xuan', 'Lim Mei Xuan', 'meixuan@gmail.com', 'Block A - 15 - 12, Ferehen Heights, 11400', 'Bayan Lepas', 601234657869, 'successful', '2023-11-30 02:21:47', 35, 'ONL-PAY-8D9QLM83LK', 'Delivered'),
(143, 'Mei Xuan', 'Lim Mei Xuan', 'meixuan@gmail.com', 'Block A - 15 - 12, Ferehen Heights, 11400', 'Bayan Lepas', 601234657869, 'successful', '2023-11-30 02:24:00', 114, 'ONL-PAY-8ZN52DCU8F', 'Delivered'),
(144, 'Mei Xuan', 'Lim Mei Xuan', 'meixuan@gmail.com', 'Block A - 15 - 12, Ferehen Heights, 11400', 'Bayan Lepas', 601234657869, 'successful', '2023-11-30 02:24:53', 82, 'ONL-PAY-LVCWQ04Z09', 'Delivered'),
(145, 'Wen Chi', 'Oh Wen Chi', 'wenchi@gmail.com', 'Block B - 12 - 01, Centrio Greens 11300', 'Klang', 60123498765, 'successful', '2023-11-30 02:34:08', 309, 'ONL-PAY-3XEO65FL1W', 'Delivered'),
(146, 'Chen Dong', 'Chen Dong', 'chendong@gmail.com', 'No.11, Jalan Gembira 11200', 'Klang', 60123456789, 'Pending', '2023-12-01 04:26:01', 183, 'ONL-PAY-AL8T0WETYY', 'Processing'),
(147, 'Chen Dong', 'Chen Dong', 'chendong@gmail.com', 'No.11, Jalan Gembira 11200', 'Klang', 60123456789, 'successful', '2023-12-01 04:26:25', 32, 'ONL-PAY-9U7CC82MWA', 'Delivered'),
(148, 'Bryan', 'Bryan', 'bryan@gmail.com', 'No.14, Lintang Bendari 13002', 'George Town', 60129876543, 'successful', '2023-12-01 05:41:42', 79, 'ONL-PAY-YOL0T87I71', 'Delivered'),
(149, 'Chen Dong', 'Chen Dong', 'chendong@gmail.com', 'No.11, Jalan Gembira 11200', 'Klang', 60123456789, 'successful', '2023-12-01 05:42:25', 63, 'ONL-PAY-HDVV1QKATH', 'Delivered'),
(150, 'Mei Xuan', 'Lim Mei Xuan', 'meixuan@gmail.com', 'Block A - 15 - 12, Ferehen Heights, 11400', 'Bayan Lepas', 601234657869, 'successful', '2023-12-01 06:20:25', 139, 'ONL-PAY-HGI0ETI2K8', 'Delivered'),
(151, 'Celine', 'Celine', 'celine@gmail.com', 'No. 31, Lintang Sungai Ara 10, 11900 Bayan Lepas', 'Penang', 60149826375, 'successful', '2023-12-02 11:51:46', 75, 'ONL-PAY-0LLUN7CO2X', 'Delivered'),
(152, 'Celine', 'Celine', 'celine@gmail.com', 'No. 31, Lintang Sungai Ara 10, 11900 Bayan Lepas', 'Penang', 60149826375, 'successful', '2023-12-03 12:01:30', 43, 'ONL-PAY-S74H3TSJ44', 'Delivered'),
(153, 'Celine', 'Celine', 'celine@gmail.com', 'No. 31, Lintang Sungai Ara 10, 11900 Bayan Lepas', 'Penang', 60149826375, 'Pending', '2023-12-03 12:13:16', 10, 'ONL-PAY-XS0CNGR6ZX', 'Cancelled'),
(154, 'Celine', 'Celine', 'celine@gmail.com', 'No. 31, Lintang Sungai Ara 10, 11900 Bayan Lepas', 'Penang', 60149826375, 'Pending', '2023-12-03 12:14:59', 10, 'ONL-PAY-LHQUGRZBTP', 'Cancelled'),
(155, 'Celine', 'Celine', 'celine@gmail.com', 'No. 31, Lintang Sungai Ara 10, 11900 Bayan Lepas', 'Penang', 60149826375, 'Pending', '2023-12-03 12:32:40', 80, 'ONL-PAY-ZNVHVA5PW8', 'Cancelled'),
(156, 'Celine', 'Celine', 'celine@gmail.com', 'No. 31, Lintang Sungai Ara 10, 11900 Bayan Lepas', 'Penang', 60149826375, 'Pending', '2023-12-03 12:33:11', 20, 'ONL-PAY-E9OCSFF2EB', 'Cancelled'),
(157, 'Celine', 'Celine', 'celine@gmail.com', 'No. 31, Lintang Sungai Ara 10, 11900 Bayan Lepas', 'Penang', 60149826375, 'Pending', '2023-12-03 12:33:49', 10, 'ONL-PAY-3DVJX9YCM5', 'Cancelled'),
(158, 'Celine', 'Celine', 'celine@gmail.com', 'No. 31, Lintang Sungai Ara 10, 11900 Bayan Lepas', 'Penang', 60149826375, 'pending', '2023-12-03 12:36:33', 30, 'ONL-PAY-2969CMN06A', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(44, 'Alicia', 'Alicia', '780ea9376333dabb1959f16e1622e00c'),
(46, 'Admin', 'Admin', '780ea9376333dabb1959f16e1622e00c'),
(48, 'Celine', 'Celine', '780ea9376333dabb1959f16e1622e00c');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(73, 'Coffee', 'Food_Category_59101.jpg', 'Yes', 'Yes'),
(74, 'Rice Selections', 'Food_Category_18938.jpg', 'Yes', 'Yes'),
(75, 'Main Course', 'Food_Category_10399.jpg', 'Yes', 'Yes'),
(76, 'Non - Coffee', 'Food_Category_31476.jpg', 'Yes', 'Yes'),
(77, 'Mocktail', 'Food_Category_6574.jpg', 'Yes', 'Yes'),
(79, 'Soup', 'Food_Category_90563.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_eipay`
--

CREATE TABLE `tbl_eipay` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_id` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `tran_id` varchar(50) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `payment_status` varchar(50) NOT NULL,
  `order_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_eipay`
--

INSERT INTO `tbl_eipay` (`id`, `table_id`, `amount`, `tran_id`, `order_date`, `payment_status`, `order_status`) VALUES
(434, 'Table 6', 59.60, '10110010250485450991', '2023-11-29 23:09:43', 'successful', 'Delivered'),
(435, 'Table 9', 61.60, '55979910010154551025', '2023-11-29 23:10:16', 'Pending', 'Cancelled'),
(436, 'Table 2', 61.60, '57495797989799974851', '2023-11-29 23:17:05', 'successful', 'Delivered'),
(437, 'Table 3', 62.60, '54102481029950565710', '2023-11-30 13:30:02', 'Pending', 'Processing'),
(438, 'Table 10', 43.80, '52985699102985110157', '2023-11-30 13:46:50', 'successful', 'Delivered'),
(439, 'Table 6', 61.60, '10099101565150974810', '2023-12-02 09:02:43', 'Pending', 'Pending'),
(440, 'Table 9', 23.00, '49101575410251561019', '2023-12-02 09:03:12', 'successful', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_eipay_details`
--

CREATE TABLE `tbl_eipay_details` (
  `tran_id` varchar(50) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(50) NOT NULL,
  `id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_eipay_details`
--

INSERT INTO `tbl_eipay_details` (`tran_id`, `item_name`, `price`, `quantity`, `id`) VALUES
('10110010250485450991', 'Latte', 12.00, 1, 43),
('10110010250485450991', 'Matcha Milk', 11.00, 1, 44),
('10110010250485450991', 'Butter Milk Chicken', 20.80, 1, 45),
('10110010250485450991', 'Nasi Goreng Petai', 15.80, 1, 46),
('55979910010154551025', 'Matcha Milk', 11.00, 1, 47),
('55979910010154551025', 'Spicy Portuguese Chicken', 22.80, 1, 48),
('55979910010154551025', 'Cappuccino', 11.00, 1, 49),
('55979910010154551025', 'Percik Chicken', 16.80, 1, 50),
('57495797989799974851', 'Nasi Goreng Petai', 15.80, 1, 51),
('57495797989799974851', 'Uncle Paul Fish & Chips', 22.80, 1, 52),
('57495797989799974851', 'Yuzu Spicy Mocktail', 12.00, 1, 53),
('57495797989799974851', 'Orange Cold Brew Coffee', 11.00, 1, 54),
('54102481029950565710', 'Percik Chicken', 16.80, 1, 55),
('54102481029950565710', 'Uncle Paul Fish & Chips', 22.80, 1, 56),
('54102481029950565710', 'Yuzu Spicy Mocktail', 12.00, 1, 57),
('54102481029950565710', 'Orange Cold Brew Coffee', 11.00, 1, 58),
('52985699102985110157', 'Latte', 12.00, 1, 59),
('52985699102985110157', 'Matcha Milk', 11.00, 1, 60),
('52985699102985110157', 'Butter Milk Chicken', 20.80, 1, 61),
('10099101565150974810', 'Matcha Milk', 11.00, 1, 62),
('10099101565150974810', 'Spicy Portuguese Chicken', 22.80, 1, 63),
('10099101565150974810', 'Cappuccino', 11.00, 1, 64),
('10099101565150974810', 'Percik Chicken', 16.80, 1, 65),
('49101575410251561019', 'Yuzu Spicy Mocktail', 12.00, 1, 66),
('49101575410251561019', 'Orange Cold Brew Coffee', 11.00, 1, 67);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `often_visit` varchar(100) NOT NULL,
  `quality` varchar(100) NOT NULL,
  `cleanliness` varchar(100) NOT NULL,
  `service_satisfaction` varchar(100) NOT NULL,
  `appreciate` varchar(100) NOT NULL,
  `other_feedback` longtext NOT NULL,
  `coupon_code` varchar(30) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `claim_indicator` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id`, `username`, `often_visit`, `quality`, `cleanliness`, `service_satisfaction`, `appreciate`, `other_feedback`, `coupon_code`, `date`, `claim_indicator`) VALUES
(11, 'Alicia', 'Weekly', 'Excellent', 'VeryClean', 'Satisfied', 'FoodQuality', 'No', 'Free fddc844b', '2023-11-29 10:29:38', 'Claimed'),
(12, 'Alicia', 'Weekly', 'VeryGood', 'VeryClean', 'Satisfied', 'Ambiance', 'Thank you for the good service.', 'Free 046af1a3', '2023-11-30 06:55:05', 'Cancelled'),
(13, 'Bryan', 'Monthly', 'Good', 'Clean', 'Neutral', 'Price', 'The price is reasonable.', 'Free a840d4ab', '2023-11-30 07:04:40', 'Claimed'),
(14, 'Mei Xuan', 'Rarely', 'Excellent', 'VeryClean', 'Neutral', 'Location', 'Easy to look for parking', 'Free 1388c0e9', '2023-11-30 07:25:32', 'Active'),
(15, 'Wen Chi', 'FirstTime', 'Excellent', 'VeryClean', 'VerySatisfied', 'FoodQuality', 'The food is delicious, Thanks for the services, will visit again.', 'Free a4b78d43', '2023-11-30 07:39:30', 'Claimed'),
(16, 'Chen Dong', 'Rarely', 'VeryGood', 'Clean', 'Satisfied', 'Ambiance', 'The food is nice, Thanks for the service', 'Free fd42ae5c', '2023-11-30 09:27:06', 'Claimed'),
(17, 'Chen Dong', 'FirstTime', 'Good', 'Clean', 'Neutral', 'Location', 'Nice Cafe', 'Free bc9b81d6', '2023-12-01 10:43:34', 'Claimed'),
(18, 'Celine', 'Weekly', 'Excellent', 'VeryClean', 'VerySatisfied', 'Ambiance', 'I like your cafe', 'Free a00a5727', '2023-12-02 04:58:09', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  `stock` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`, `stock`) VALUES
(95, 'Latte', 'A perfect blend of bold espresso and creamy steamed milk for a rich and comforting pick-me-up.', 12.00, 'Food-Name-9441.jpg', 73, 'Yes', 'Yes', 100),
(97, 'Matcha Milk', 'Savor the serene fusion of vibrant matcha and velvety milk in our Matcha Milk.', 11.00, 'Food-Name-4348.jpg', 76, 'Yes', 'Yes', 43),
(98, 'Spicy Portuguese Chicken', 'Embark on a flavor adventure with our Spicy Portuguese Chicken.', 22.80, 'Food-Name-4279.jpg', 75, 'Yes', 'Yes', 78),
(100, 'Cappuccino', 'Rich espresso crowned with a cloud of frothy steamed milk, creating a velvety symphony of flavors.', 11.00, 'Food-Name-5287.jpg', 73, 'No', 'Yes', 96),
(101, 'Percik Chicken', 'Percik Style Chicken serve with Jasmine White Rice and Mix Green Salad (Spicy).', 16.80, 'Food-Name-3581.jpg', 74, 'Yes', 'Yes', 57),
(102, 'Butter Milk Chicken', 'A crispy yet creamy sensation that promises a delectable twist on classic comfort.', 20.80, 'Food-Name-2626.jpg', 74, 'No', 'Yes', 20),
(103, 'Nasi Goreng Petai', 'Fried Rice with Haus made Shrimp Sambal, Petai, shrimps and Fried Egg.', 15.80, 'Food-Name-4935.jpg', 74, 'No', 'Yes', 98),
(104, 'Uncle Paul Fish & Chips', 'Crispy Soda Battered Fish Fillet (Perch) serve with Fries and Special Tartar Dipping Sauce.', 22.80, 'Food-Name-2878.jpg', 75, 'Yes', 'Yes', 100),
(105, 'Yuzu Spicy Mocktail', 'Monin Yuzu, Lemon Juice, Shichimi Togarashi Spice,  Sparkling Soda', 12.00, 'Food-Name-2889.jpg', 77, 'Yes', 'Yes', 72),
(106, 'Orange Cold Brew Coffee', 'This citrus-filled cold brew is perfect for a hot summer day.', 11.00, 'Food-Name-5199.jpg', 77, 'Yes', 'Yes', 95),
(108, 'Soup', 'Mushroom Soup', 10.00, 'Food-Name-2663.jpg', 79, 'Yes', 'Yes', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_id` varchar(150) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `transaction_id`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(39, '', 0.00, '0000-00-00 00:00:00', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `add1` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `phone` bigint(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `add1`, `city`, `phone`, `username`, `password`) VALUES
(1, 'Alvin', 'Alvin@gmail.com', 'No.1 Lorong Meranti 3, Off Jalan Kenanga, 55200, Kuala Lumpur, WP Kuala Lumpur', 'Kuala Lumpur', 138100233, 'Alvin', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, 'Kelvin', 'Kelvin@gmail.com', 'No.1 Jalan Kenanga, Off, Lorong Meranti 2 ', 'Kuala Lumpur', 112872293, 'Kelvin', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 'Maddie', 'Maddie@gmail.com', 'No.1, Jalan Megah 23, Batu 9 1/2 Taman Megah, Wilayah Persekutuan, 43200 Kuala Lumpur', 'Kuala Lumpur', 198273362, 'Maddie', '81dc9bdb52d04dc20036dbd8313ed055'),
(7, 'Alice', 'alice@gmail.com', 'test fucntion', 'penang', 1232456789, 'alice', '780ea9376333dabb1959f16e1622e00c'),
(8, 'Michelle', 'michelle@gmail.com', 'No.13, Jalan Gembira, 11300 Georgetown, Penang', 'Pulau Pinang', 60143256798, 'Michelle', '81dc9bdb52d04dc20036dbd8313ed055'),
(9, 'Jane', 'jane@example.com', 'Penang, Malaysia', 'Penang', 60123456789, 'jane', '81dc9bdb52d04dc20036dbd8313ed055'),
(10, 'Cheng Zhi Xuan', 'zhixuan@gmail.com', 'No.33, Jalan Bintang Tiru 1, 11300 Georgetown', 'Pulau Pinang', 60123456789, 'Zhi Xuan', '81dc9bdb52d04dc20036dbd8313ed055'),
(11, 'Bryan', 'bryan@gmail.com', 'No.14, Lintang Bendari 13002', 'George Town', 60129876543, 'Bryan', '780ea9376333dabb1959f16e1622e00c'),
(12, 'Khaw Hui Khim', 'k.dex18@gmail.com', 'NO. 16, Pintasan Cecil 10300', 'Georgetown, Penang.', 60145236798, 'huikhim', '780ea9376333dabb1959f16e1622e00c'),
(13, 'Slyvia', 'sylvia@gmail.com', 'Block A - 13 - 9, Centrio Avenue 10800', 'Alor Setar', 60189234567, 'slyvia', '780ea9376333dabb1959f16e1622e00c'),
(14, 'Chen Dong', 'chendong@gmail.com', 'No.11, Jalan Gembira 11200', 'Klang', 60123456789, 'Chen Dong', '780ea9376333dabb1959f16e1622e00c'),
(15, 'Oh Wen Chi', 'wenchi@gmail.com', 'Block B - 12 - 01, Centrio Greens 11300', 'Klang', 60123498765, 'Wen Chi', '780ea9376333dabb1959f16e1622e00c'),
(16, 'Alicia', 'alicia@gmail.com', 'No.12, Jalan York, 11900', 'Puchong', 60123456789, 'Alicia', '780ea9376333dabb1959f16e1622e00c'),
(17, 'Lim Mei Xuan', 'meixuan@gmail.com', 'Block A - 15 - 12, Ferehen Heights, 11400', 'Bayan Lepas', 601234657869, 'Mei Xuan', '780ea9376333dabb1959f16e1622e00c'),
(18, 'Celine', 'celine@gmail.com', 'No. 31, Lintang Sungai Ara 10, 11900 Bayan Lepas', 'Penang', 60149826375, 'Celine', '780ea9376333dabb1959f16e1622e00c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_manager`
--
ALTER TABLE `order_manager`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_eipay`
--
ALTER TABLE `tbl_eipay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_eipay_details`
--
ALTER TABLE `tbl_eipay_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `order_manager`
--
ALTER TABLE `order_manager`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `tbl_eipay`
--
ALTER TABLE `tbl_eipay`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=441;

--
-- AUTO_INCREMENT for table `tbl_eipay_details`
--
ALTER TABLE `tbl_eipay_details`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
