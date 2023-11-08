-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2023 at 05:12 PM
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
(20, 'Jane', 2147483647, 'Test Features', 'Demo 123...', 'read', '2023-10-18 01:21:14'),
(21, 'Alice', 123456789, 'Feedback', 'Hello World!', 'read', '2023-10-18 02:19:30'),
(22, 'Michelle', 2147483647, 'Hello', 'Hello World', 'read', '2023-10-27 10:21:14'),
(23, 'Cheng Zhi Xuan', 2147483647, 'Comment about restaurant', 'The foods is very delicious.', 'read', '2023-11-02 03:26:32'),
(24, 'Zhi Xuan', 2147483647, 'Booking Reserve', 'I would like to book a table for birthday celebration.', 'read', '2023-11-02 03:53:15'),
(25, 'Bryan', 2147483647, 'Book Reserve', 'Table 3, 5 person, for birthday party.', 'read', '2023-11-06 04:43:43'),
(26, 'Chen Dong', 2147483647, 'Book A Table', 'Birthday Party, 10 pax', 'read', '2023-11-06 09:27:38'),
(27, 'Wen Chi', 2147483647, 'Demo', 'Booking', 'read', '2023-11-06 10:40:14'),
(28, 'Alicia', 2147483647, 'Book A Table', 'Tuesday 8pm 10 person', 'read', '2023-11-07 04:14:02'),
(29, 'Lim Mei Xuan', 2147483647, 'Hello', 'Can we have more discount on the holidays', 'read', '2023-11-07 10:07:00');

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
(36, 'French Fries', 80, 1),
(37, 'Beef Burger', 150, 1),
(38, 'Beef Burger', 150, 3),
(38, 'Pizza', 250, 1),
(39, 'French Fries', 80, 1),
(40, 'Beef Burger', 150, 4),
(41, 'Beef Burger', 150, 1),
(42, 'Margherita Pizza', 200, 1),
(42, 'Regular French Fries', 100, 2),
(43, 'Beef Burger', 150, 1),
(44, 'Beef Burger', 150, 1),
(45, 'Vegetarian Pizza', 180, 1),
(46, 'Mexican Pizza', 250, 1),
(47, 'Vegetarian Pizza', 180, 1),
(48, 'Beef Burger', 150, 1),
(1, 'Mexican Pizza', 250, 1),
(1, 'Buffalo Wings', 250, 1),
(1, 'Regular French Fries', 100, 2),
(2, 'Pepperoni Pizza', 220, 1),
(3, 'Mexican Pizza', 250, 1),
(3, 'Beef Burger', 150, 1),
(3, 'Regular French Fries', 100, 2),
(4, 'Vegetarian Pizza', 180, 1),
(5, 'Buffalo Wings', 250, 1),
(6, 'Buffalo Wings', 250, 1),
(7, 'Vegetarian Pizza', 180, 1),
(8, 'Beef Burger', 150, 1),
(9, 'Buffalo Wings', 250, 1),
(9, 'Pepperoni Pizza', 220, 1),
(10, 'Regular French Fries', 100, 1),
(11, 'Regular French Fries', 100, 1),
(12, 'Mexican Pizza', 250, 1),
(12, 'Pepperoni Pizza', 220, 1),
(13, 'Cheese Burger', 170, 1),
(14, 'Hone Glazed Chicken', 270, 1),
(15, 'Popcorn Chicken', 150, 1),
(16, 'Samoosa ', 100, 1),
(17, 'French Fries ', 130, 1),
(18, 'Pepperoni Pizza ', 270, 1),
(19, 'Popcorn Chicken', 150, 1),
(20, 'BBQ Wings', 230, 1),
(21, 'Hone Glazed Chicken', 270, 1),
(22, 'BBQ Wings', 230, 1),
(23, 'Mushroom Pizza', 280, 1),
(24, 'Samoosa ', 100, 1),
(25, 'Vegetarian Pizza', 300, 1),
(26, 'Crispy Wings', 250, 1),
(27, 'Hone Glazed Chicken', 270, 1),
(28, 'Cheese Pizza', 290, 1),
(29, 'Crispy Wings', 250, 2),
(29, 'Hone Glazed Chicken', 270, 2),
(29, 'Pepperoni Pizza ', 270, 1),
(30, 'Chicken Kiev Balls', 200, 1),
(30, 'Chicken Burger', 120, 1),
(30, 'Onion Rings', 100, 1),
(31, 'Deluxe Pizza ', 490, 1),
(31, 'Beef Burger', 150, 3),
(32, 'Beef Burger', 150, 2),
(32, 'Hamburger', 160, 1),
(33, 'Beef Burger', 150, 5),
(34, 'Red Hot', 120, 1),
(34, 'Beef Burger', 150, 4),
(34, 'Hamburger', 160, 1),
(35, 'Deluxe Pizza ', 490, 2),
(35, 'Shingara', 100, 1),
(36, 'Cheese Burger', 100, 1),
(36, 'Samoosa', 100, 2),
(37, 'Chicken Nuggets', 150, 1),
(37, 'Onion Rings', 100, 1),
(38, 'Deluxe Pizza ', 490, 1),
(39, 'Chicken Burger', 120, 2),
(40, 'French Fries', 120, 3),
(41, 'Hamburger', 160, 1),
(42, 'Hamburger', 160, 1),
(43, 'Hamburger', 160, 1),
(44, 'Hamburger', 160, 1),
(45, 'Hamburger', 160, 1),
(46, 'Hamburger', 160, 1),
(47, 'Hamburger', 160, 1),
(48, 'Hamburger', 160, 1),
(49, 'Hamburger', 160, 1),
(50, 'Cheese Dog', 110, 1),
(51, 'Cheese Dog', 110, 1),
(52, 'Cheese Dog', 110, 1),
(53, 'Cheese Dog', 110, 1),
(54, 'Cheese Dog', 110, 1),
(55, 'Cheese Dog', 110, 1),
(56, 'Cheese Dog', 110, 1),
(57, 'Cheese Dog', 110, 1),
(58, 'Cheese Dog', 110, 1),
(59, 'Cheese Dog', 110, 1),
(60, 'Cheese Dog', 110, 1),
(61, 'Deluxe Pizza ', 490, 1),
(61, 'Samoosa', 100, 1),
(62, 'Deluxe Pizza ', 490, 1),
(62, 'Samoosa', 100, 1),
(63, 'Deluxe Pizza ', 490, 1),
(63, 'Samoosa', 100, 1),
(64, 'Deluxe Pizza ', 490, 1),
(64, 'Samoosa', 100, 1),
(65, 'Deluxe Pizza ', 490, 1),
(65, 'Samoosa', 100, 1),
(66, 'Deluxe Pizza ', 490, 1),
(66, 'Samoosa', 100, 1),
(67, 'Supreme Pizza', 450, 1),
(68, 'Red Hot', 120, 1),
(69, 'Red Hot', 120, 1),
(70, 'Red Hot', 120, 1),
(71, 'Red Hot', 120, 1),
(72, 'Red Hot', 120, 1),
(73, 'Cheese Dog', 110, 1),
(74, 'Cheese Dog', 110, 1),
(75, 'Chicken Nuggets', 150, 2),
(76, 'Chicken Burger', 120, 1),
(77, 'Chicken Burger', 120, 2),
(77, 'Beef Burger', 150, 1),
(78, 'Chicken Burger', 120, 2),
(78, 'Beef Burger', 150, 2),
(79, 'Chicken Burger', 120, 2),
(79, 'Beef Burger', 150, 2),
(80, 'Chicken Kiev Balls', 200, 1),
(81, 'Chicken Kiev Balls', 200, 1),
(82, 'Hamburger', 160, 2),
(83, 'Chicken Burger', 120, 3),
(83, 'Beef Burger', 150, 2),
(84, 'Chicken Burger', 120, 4),
(85, 'Cheese Burger', 100, 2),
(86, 'Cheese Burger', 100, 3),
(86, 'Cheese Pizza', 350, 4),
(87, 'Chicken Burger', 120, 3),
(87, 'Beef Burger', 150, 2),
(88, 'French Fries', 120, 4),
(89, 'Vegetarian Pizza', 300, 1),
(90, 'Hot Onion Dog', 100, 1),
(91, 'Shingara', 100, 2),
(91, 'Chicken Nuggets', 150, 1),
(92, 'Onion Rings', 100, 1),
(93, 'Chili Hot Dog', 80, 4),
(94, 'Vegetarian Pizza', 300, 1),
(95, 'Cheese Burger', 100, 1),
(96, 'Vegetarian Pizza', 300, 1),
(96, 'Chili Hot Dog', 80, 1),
(97, 'Red Hot', 120, 1),
(98, 'Vegetarian Pizza', 300, 1),
(99, 'Supreme Pizza', 450, 1),
(100, 'Cheese Burger', 100, 1),
(100, 'Beef Burger', 150, 1),
(101, 'Beef Burger', 150, 1),
(102, 'Beef Burger', 150, 1),
(103, 'Cheese Burger', 100, 1),
(104, 'Cheese Dog', 110, 1),
(105, 'Hot Onion Dog', 100, 1),
(106, 'Cheese Burger', 100, 1),
(107, 'Beef Burger', 150, 1),
(108, 'Red Hot', 120, 1),
(109, 'Beef Burger', 150, 1),
(110, 'Grilled Spicy Lemon & Herbs 1/4 chicken leg serve with salad, fries and our special cooling sauce.', 22, 1),
(110, 'A shot or two of bold, tasty espresso with fresh, sweet steamed milk over it.', 12, 1),
(111, 'A deliciously simple Italian dish of fresh garlic, olive oil, and Parmesan cheese tossed with freshl', 22, 1),
(111, 'Orange Cold Brew Coffee', 11, 1),
(111, 'A crips waffle topped with slices of farm-fresh sweet banana, Premium Vanilla ice cream, whipping cr', 23, 1),
(112, 'Aglio Olio', 22, 1),
(112, 'Espresso', 7, 1),
(112, 'Signature Overload Waffles', 36, 1),
(113, 'Percik Chicken', 16, 1),
(113, 'Spicy Portugese Chicken', 22, 1),
(113, 'Latte', 12, 1),
(113, 'Cappucino', 12, 1),
(113, 'Lotus Biscoff Waffle', 30, 1),
(114, 'Signature Overload Waffles', 36, 1),
(114, 'Cappucino', 12, 1),
(114, 'Percik Chicken', 16, 1),
(114, 'Espresso', 7, 1),
(114, 'Nasi Goreng Petai', 15, 1),
(114, 'Butter Milk Chicken', 20, 1),
(115, 'Lotus Biscoff Waffle', 30, 1),
(115, 'Butter Milk Chicken', 20, 1),
(115, 'Aglio Olio', 22, 1),
(116, 'Crispy Soda Battered Fish Fillet (Perch) serve with Fries and Special Tartar Dipping Sauce.', 22, 1),
(116, 'Grilled Spicy Lemon & Herbs 1/4 chicken leg serve with salad, fries and our special cooling sauce', 22, 1),
(116, 'Latte', 12, 2),
(117, 'Lotus Biscoff Waffle', 30, 1),
(117, 'Banana Waffle', 23, 1),
(117, 'Uncle Paul Fish & Fries', 22, 1),
(117, 'Cappucino', 12, 1),
(117, 'Latte', 12, 1),
(117, 'Percik Chicken', 16, 1),
(118, 'Espresso', 7, 1),
(118, 'Latte', 12, 1),
(118, 'Signature Overload Waffles', 36, 1),
(119, 'Uncle Paul Fish & Fries', 22, 1),
(119, 'Aglio Olio', 22, 2),
(119, '', 12, 2),
(120, 'Grilled Spicy Lemon & Herbs 1/4 chicken leg serve with salad, fries and our special cooling sauce', 22, 2),
(121, 'Crispy Soda Battered Fish Fillet (Perch) serve with Fries and Special Tartar Dipping Sauce.', 22, 1),
(121, 'Jasmine white rice serve with deep fried chicken chop with spicy butter milk sauce, Mix Salad, fried', 20, 1),
(121, '', 12, 1),
(121, 'Percik Chicken', 16, 1),
(121, 'Latte', 12, 2),
(122, 'A crips waffle topped with slices of form-fresh sweet banana, Premium  Vanilla ice cream, whipping c', 23, 1),
(122, 'Cappucino', 12, 2),
(122, 'Simply Waffle', 14, 1),
(123, 'Pudding', 10, 1),
(123, 'Uncle Paul Fish & Fries', 22, 1),
(123, 'Nasi Goreng Petai', 15, 1),
(123, 'Latte', 12, 2),
(124, 'Jasmine white rice serve with deep fried chicken chop with spicy butter milk sauce, Mix Salad, fried', 20, 1),
(124, 'Butter Milk Chicken', 20, 1),
(124, 'Spicy Portugese Chicken', 22, 1),
(124, '', 12, 1),
(124, 'Espresso', 7, 1),
(125, 'Jasmine white rice serve with deep fried chicken chop with spicy butter milk sauce, Mix Salad, fried', 20, 1),
(125, 'Aglio Olio', 22, 2),
(125, 'Cappucino', 12, 1),
(126, 'This citrus-filled cold brew is perfect for a hot summer day.', 11, 1),
(126, 'Yuzu Spicy Mocktail', 12, 1),
(126, 'Espresso', 7, 1),
(127, 'Fried Rice with Haus made Shrimp Sambal, Petai, shrimps and Fried Egg. (Spicy/non-Spicy)', 15, 1),
(127, 'Butter Milk Chicken', 20, 1),
(127, 'Lotus Biscoff Waffle', 30, 1),
(127, 'Latte', 12, 1),
(127, 'Espresso', 7, 1),
(128, 'Percik Style Chicken serve with Jasmine White Rice and Mix Green Salad.  (Spicy)', 16, 2),
(128, 'Latte', 12, 1),
(128, 'Yuzu Spicy Mocktail', 12, 1),
(129, 'Aglio Olio', 22, 1),
(129, 'Spicy Portugese Chicken', 22, 1),
(129, 'Cappucino', 12, 1),
(129, 'Latte', 12, 1),
(130, 'Aglio Olio', 22, 1),
(130, 'Pudding', 10, 1),
(130, 'Cappucino', 12, 1),
(131, '', 12, 1),
(132, '', 12, 1),
(132, 'Lotus Biscoff Waffle', 30, 1),
(133, '', 10, 1),
(133, 'Latte', 12, 2),
(133, 'Aglio Olio', 22, 1);

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
(112, 'Kelvin', 'Kelvin', 'Kelvin@gmail.com', 'No.1 Jalan Kenanga, Off, Lorong Meranti 2 ', 'Kuala Lumpur', 112872293, 'successful', '2023-10-26 03:45:13', 66, 'ONL-PAY-V3JEQMFTHT', 'Delivered'),
(113, 'alice', 'Alice', 'alice@gmail.com', 'test fucntion', 'penang', 1232456789, 'successful', '2023-10-26 03:46:24', 94, 'ONL-PAY-YOBPHYXRWK', 'Delivered'),
(114, 'alice', 'Alice', 'alice@gmail.com', 'test fucntion', 'penang', 1232456789, 'successful', '2023-10-27 09:58:25', 108, 'ONL-PAY-4ETJKZ0S2H', 'Delivered'),
(115, 'alice', 'Alice', 'alice@gmail.com', 'test fucntion', 'penang', 1232456789, 'successful', '2023-10-27 09:59:11', 74, 'ONL-PAY-BG831HKGG0', 'Delivered'),
(116, 'Kelvin', 'Kelvin', 'Kelvin@gmail.com', 'No.1 Jalan Kenanga, Off, Lorong Meranti 2 ', 'Kuala Lumpur', 112872293, 'successful', '2023-10-27 09:59:59', 70, 'ONL-PAY-FQMENABNAH', 'Delivered'),
(117, 'Michelle', 'Michelle', 'michelle@gmail.com', 'No.13, Jalan Gembira, 11300 Georgetown, Penang', 'Pulau Pinang', 60123456789, 'successful', '2023-10-27 10:16:39', 117, 'ONL-PAY-DG59TOI59A', 'Delivered'),
(118, 'Michelle', 'Michelle', 'michelle@gmail.com', 'No.13, Jalan Gembira, 11300 Georgetown, Penang', 'Pulau Pinang', 60123456789, 'successful', '2023-10-27 10:24:56', 55, 'ONL-PAY-6ICV2HOE9B', 'Delivered'),
(119, 'Michelle', 'Michelle', 'michelle@gmail.com', 'No.13, Jalan Gembira, 11300 Georgetown, Penang', 'Pulau Pinang', 60123456789, 'successful', '2023-10-27 11:13:32', 92, 'ONL-PAY-4KYYE7W9RM', 'Delivered'),
(120, 'jane', 'Jane', 'jane@example.com', 'Penang, Malaysia', 'Penang', 60123456789, 'successful', '2023-10-27 04:01:40', 46, 'ONL-PAY-TPSWL77HEH', 'Delivered'),
(121, 'Zhi Xuan', 'Cheng Zhi Xuan', 'zhixuan@gmail.com', 'No.33, Jalan Bintang Tiru 1, 11300 Georgetown', 'Pulau Pinang', 60123456789, 'successful', '2023-11-02 03:27:13', 96, 'ONL-PAY-HKHJO4WUBO', 'Delivered'),
(122, 'Bryan', 'Bryan', 'bryan@gmail.com', 'No.14, Lintang Bendari 13002', 'George Town', 60129876543, 'successful', '2023-11-06 04:43:04', 61, 'ONL-PAY-FYSQ885MCZ', 'Delivered'),
(123, 'huikhim', 'Khaw Hui Khim', 'k.dex18@gmail.com', 'NO. 16, Pintasan Cecil 10300', 'Georgetown, Penang.', 60145236798, 'successful', '2023-11-06 05:39:58', 73, 'ONL-PAY-YPCK6XJ7S2', 'Delivered'),
(124, 'slyvia', 'Slyvia', 'sylvia@gmail.com', 'Block A - 13 - 9, Centrio Avenue 10800', 'Alor Setar', 60189234567, 'successful', '2023-11-06 06:05:53', 83, 'ONL-PAY-YM6BFONADH', 'Delivered'),
(125, 'Chen Dong', 'Chen Dong', 'chendong@gmail.com', 'No.11, Jalan Gembira 11200', 'Klang', 60123456789, 'successful', '2023-11-06 09:23:05', 78, 'ONL-PAY-GQG0TICMEG', 'Delivered'),
(126, 'Chen Dong', 'Chen Dong', 'chendong@gmail.com', 'No.11, Jalan Gembira 11200', 'Klang', 60123456789, 'pending', '2023-11-06 09:34:47', 30, 'ONL-PAY-2JBAWDI33G', 'Pending'),
(127, 'slyvia', 'Slyvia', 'sylvia@gmail.com', 'Block A - 13 - 9, Centrio Avenue 10800', 'Alor Setar', 60189234567, 'pending', '2023-11-06 09:45:38', 86, 'ONL-PAY-V02TREE8QO', 'Pending'),
(128, 'Wen Chi', 'Oh Wen Chi', 'wenchi@gmail.com', 'Block B - 12 - 01, Centrio Greens 11300', 'Klang', 60123498765, 'successful', '2023-11-06 10:36:34', 58, 'ONL-PAY-N82KSLCEMX', 'Delivered'),
(129, 'Chen Dong', 'Chen Dong', 'chendong@gmail.com', 'No.11, Jalan Gembira 11200', 'Klang', 60123456789, 'successful', '2023-11-06 11:59:25', 70, 'ONL-PAY-TM73XWRGR1', 'Delivered'),
(130, 'Alicia', 'Alicia', 'alicia@gmail.com', 'No.12, Jalan York, 11900', 'Puchong', 60123456789, 'successful', '2023-11-07 04:11:59', 45, 'ONL-PAY-O2FXGTPNX9', 'Delivered'),
(131, 'Alicia', 'Alicia', 'alicia@gmail.com', 'No.12, Jalan York, 11900', 'Puchong', 60123456789, 'successful', '2023-11-07 04:34:13', 12, 'ONL-PAY-4JQLE6GMXJ', 'Delivered'),
(132, 'Alicia', 'Alicia', 'alicia@gmail.com', 'No.12, Jalan York, 11900', 'Puchong', 60123456789, 'pending', '2023-11-07 09:52:24', 42, 'ONL-PAY-RSI1Q7NC14', 'Pending'),
(133, 'Mei Xuan', 'Lim Mei Xuan', 'meixuan@gmail.com', 'Block A - 15 - 12, Ferehen Heights, 11400', 'Bayan Lepas', 601234657869, 'successful', '2023-11-07 10:06:31', 57, 'ONL-PAY-1QTQVGQNWG', 'Delivered');

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
(45, 'Celine', 'Celine', '780ea9376333dabb1959f16e1622e00c'),
(46, 'Admin', 'Admin', '780ea9376333dabb1959f16e1622e00c');

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
(58, 'Waffle', 'Food_Category_66808.jpg', 'Yes', 'Yes'),
(59, 'Main Course', 'Food_Category_16051.jpg', 'Yes', 'Yes'),
(60, 'Coffee', 'Food_Category_56745.jpg', 'Yes', 'Yes'),
(61, 'Spaghetti', 'Food_Category_31185.jpg', 'Yes', 'Yes'),
(62, 'Rice', 'Food_Category_34774.jpg', 'Yes', 'Yes'),
(64, 'Dessert', 'Food_Category_74288.jpg', 'Yes', 'Yes'),
(66, 'Non - Coffee', 'Food_Category_63356.jpg', 'Yes', 'Yes'),
(67, 'Mocktail', 'Food_Category_89791.jpg', 'Yes', 'Yes'),
(71, 'Alcohol', 'Food_Category_7613.jpg', 'Yes', 'Yes');

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
(422, 'Table 8', 66.60, '10256525610156575451', '2023-11-01 12:32:00', 'successful', 'Delivered'),
(423, 'Table 5', 69.60, '56545210154102525057', '2023-11-01 12:32:46', 'successful', 'Delivered'),
(424, 'Table 4', 53.40, '54495610257531015756', '2023-11-02 00:34:53', 'successful', 'Delivered'),
(425, 'Table 4', 17.00, '57534855485210110055', '2023-11-02 00:55:31', 'successful', 'Delivered'),
(426, 'Table 7', 53.40, '50515099505449995753', '2023-11-02 01:28:36', 'successful', 'Delivered'),
(427, 'Table 8', 63.60, '51544852102551015710', '2023-11-06 01:45:25', 'successful', 'Processing'),
(428, 'Table 6', 40.00, '10148554948524953984', '2023-11-06 06:24:38', 'Pending', 'Pending'),
(429, 'Table 5', 44.00, '10248481021025010151', '2023-11-06 06:34:26', 'successful', 'Delivered'),
(430, 'Table 7', 55.80, '10010155525149985399', '2023-11-06 07:41:32', 'successful', 'Delivered'),
(431, 'Table 6', 110.00, '10097100535455534810', '2023-11-07 01:14:45', 'successful', 'Pending'),
(432, 'Table 8', 63.60, '10151101575397999953', '2023-11-07 07:09:35', 'Pending', 'Pending');

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
('10256525610156575451', 'Nasi Goreng Petai', 15.80, 1, 1),
('10256525610156575451', 'Butter Milk Chicken', 20.80, 1, 2),
('10256525610156575451', 'Banana Waffle', 23.00, 1, 3),
('10256525610156575451', 'Espresso', 7.00, 1, 4),
('56545210154102525057', 'Nasi Goreng Petai', 15.80, 1, 5),
('56545210154102525057', 'Latte', 12.00, 1, 6),
('56545210154102525057', 'Cappucino', 12.00, 1, 7),
('56545210154102525057', 'Aglio Olio', 22.80, 1, 8),
('56545210154102525057', 'Espresso', 7.00, 1, 9),
('54495610257531015756', 'Nasi Goreng Petai', 15.80, 1, 10),
('54495610257531015756', 'Butter Milk Chicken', 20.80, 1, 11),
('54495610257531015756', 'Percik Chicken', 16.80, 1, 12),
('57534855485210110055', 'Espresso', 7.00, 1, 13),
('57534855485210110055', 'Pudding', 10.00, 1, 14),
('50515099505449995753', 'Nasi Goreng Petai', 15.80, 1, 15),
('50515099505449995753', 'Butter Milk Chicken', 20.80, 1, 16),
('50515099505449995753', 'Percik Chicken', 16.80, 1, 17),
('51544852102551015710', 'Percik Chicken', 16.80, 1, 18),
('51544852102551015710', 'Spicy Portugese Chicken', 22.80, 1, 19),
('51544852102551015710', 'Latte', 12.00, 1, 20),
('51544852102551015710', 'Cappucino', 12.00, 1, 21),
('10148554948524953984', 'Espresso', 7.00, 1, 22),
('10148554948524953984', 'Pudding', 10.00, 1, 23),
('10148554948524953984', 'Matcha Milk', 11.00, 1, 24),
('10148554948524953984', 'Yuzu Spicy Mocktail', 12.00, 1, 25),
('10248481021025010151', 'Pudding', 10.00, 1, 26),
('10248481021025010151', 'Matcha Milk', 11.00, 1, 27),
('10248481021025010151', 'Yuzu Spicy Mocktail', 12.00, 1, 28),
('10248481021025010151', 'Orange Cold Brew Coffee', 11.00, 1, 29),
('10010155525149985399', 'Aglio Olio', 22.80, 1, 30),
('10010155525149985399', 'Pudding', 10.00, 1, 31),
('10010155525149985399', 'Matcha Milk', 11.00, 1, 32),
('10010155525149985399', 'Yuzu Spicy Mocktail', 12.00, 1, 33),
('10097100535455534810', 'Banana Waffle', 23.00, 1, 34),
('10097100535455534810', 'Lotus Biscoff Waffle', 30.00, 1, 35),
('10097100535455534810', 'Signature Overload Waffles', 36.00, 1, 36),
('10097100535455534810', 'Pudding', 10.00, 1, 37),
('10097100535455534810', 'Matcha Milk', 11.00, 1, 38),
('10151101575397999953', 'Percik Chicken', 16.80, 1, 39),
('10151101575397999953', 'Spicy Portugese Chicken', 22.80, 1, 40),
('10151101575397999953', 'Latte', 12.00, 1, 41),
('10151101575397999953', 'Cappucino', 12.00, 1, 42);

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
(1, 'Zhi Xuan', 'Monthly', 'Excellent', 'VeryClean', 'Satisfied', 'Price', 'The staff there are very nice and the meals is delicious.', 'Free53971015599101511015', '2023-11-01 08:31:06', 'Claimed'),
(2, 'Zhi Xuan', 'Rarely', 'VeryGood', 'Clean', 'Neutral', 'Location', 'Test Function & Features', 'Free53574910010151575753', '2023-11-02 08:19:00', 'Cancelled'),
(3, 'Zhi Xuan', 'Weekly', 'Good', 'Neutral', 'Satisfied', 'FoodQuality', 'The food is yummy.', 'Free 32c4be', '2023-11-02 08:22:43', 'Claimed'),
(4, 'Zhi Xuan', 'Weekly', 'VeryGood', 'VeryClean', 'Satisfied', 'Ambiance', 'Thank you for the service', 'Free 618fa9', '2023-11-02 09:25:35', 'Active'),
(5, 'Bryan', 'Monthly', 'VeryGood', 'VeryClean', 'Satisfied', 'FoodQuality', 'The food is delicious.', 'Free ee0684b2', '2023-11-06 09:41:34', 'Claimed'),
(6, 'Chen Dong', 'Weekly', 'VeryGood', 'VeryClean', 'Neutral', 'Service', 'Nice Service', 'Free 7bcf85cb', '2023-11-06 02:21:21', 'Claimed'),
(7, 'Wen Chi', 'Monthly', 'Excellent', 'VeryClean', 'Satisfied', 'FoodQuality', 'The food is delicious, but hard to find parking slot.', 'Free 58f2d3e1', '2023-11-06 03:37:36', 'Cancelled'),
(8, 'Alicia', 'Weekly', 'Excellent', 'Clean', 'VerySatisfied', 'Service', 'The food is delicious', 'Free 836c2662', '2023-11-07 09:10:10', 'Claimed'),
(9, 'Mei Xuan', 'Weekly', 'Excellent', 'VeryClean', 'VerySatisfied', 'Price', 'The price here are quite reasonable', 'Free eb2aed7a', '2023-11-07 03:07:35', 'Active');

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
(71, 'Nasi Goreng Petai', 'Fried Rice with Haus made Shrimp Sambal, Petai, shrimps and Fried Egg. (Spicy/non-Spicy)', 15.80, 'Food-Name-8090.jpg', 62, 'No', 'Yes', 64),
(72, 'Butter Milk Chicken', 'Jasmine white rice serve with deep fried chicken chop with spicy butter milk sauce, Mix Salad, fried egg (Spicy)', 20.80, 'Food-Name-383.jpg', 62, 'No', 'Yes', 47),
(73, 'Percik Chicken', 'Percik Style Chicken serve with Jasmine White Rice and Mix Green Salad.  (Spicy)', 16.80, 'Food-Name-3545.jpg', 62, 'Yes', 'Yes', 96),
(74, 'Spicy Portugese Chicken', 'Grilled Spicy Lemon & Herbs 1/4 chicken leg serve with salad, fries and our special cooling sauce', 22.80, 'Food-Name-9506.jpg', 59, 'Yes', 'Yes', 94),
(75, 'Latte', '', 12.00, 'Food-Name-2900.jpg', 60, 'Yes', 'Yes', 86),
(76, 'Cappucino', '', 12.00, 'Food-Name-4575.jpg', 60, 'No', 'Yes', 100),
(77, 'Aglio Olio', 'A deliciously simple Italian dish of fresh garlic, olive oil, and Parmesan cheese tossed with freshly cooked spaghetti.\r\n(Smoked duck/Shrimps)', 22.80, 'Food-Name-3892.jpg', 61, 'Yes', 'Yes', 83),
(78, 'Uncle Paul Fish & Fries', 'Crispy Soda Battered Fish Fillet (Perch) serve with Fries and Special Tartar Dipping Sauce.', 22.80, 'Food-Name-2611.jpg', 59, 'Yes', 'Yes', 27),
(79, 'Simply Waffle', 'A crips waffle topped with strawberry slices, blueberries serve with Queen maple syrup (sugar free), unsalted butter and sprinkled with granola and icing sugar', 14.00, 'Food-Name-1152.jpg', 58, 'No', 'Yes', 33),
(80, 'Banana Waffle', 'A crips waffle topped with slices of form-fresh sweet banana, Premium  Vanilla ice cream, whipping cream, drizzled with caramel sauce and sprinkled with cinnamon sugar', 23.00, 'Food-Name-8496.jpg', 58, 'No', 'Yes', 54),
(81, 'Lotus Biscoff Waffle', 'A crips waffle topped with 5 pcs Nutella Chocolate Brownies, Premium Vanilla Ice Cream, Lotus Biscoff biscuits, Biscoff sauce and one shot of Alturra espresso (Suitable for sharing)', 30.00, 'Food-Name-1.jpg', 58, 'Yes', 'Yes', 85),
(82, 'Signature Overload Waffles', 'Two crips waffles topped with Premium Vanilla ice cream, Premium Mini Almond ice cream , Gery chocolate wafer roll, strawberries and blueberries, serve with chocolate sauce, drizzled with chocolate sauce and sprinkled with icing sugar and almond (Suitable for sharing)', 36.00, 'Food-Name-5029.jpg', 58, 'Yes', 'Yes', 100),
(83, 'Espresso', '', 7.00, 'Food-Name-7507.jpg', 58, 'No', 'Yes', 97),
(85, 'Pudding', '', 10.00, 'Food-Name-256.jpg', 64, 'Yes', 'Yes', 95),
(87, 'Matcha Milk', '', 11.00, 'Food-Name-2945.jpg', 66, 'Yes', 'Yes', 75),
(88, 'Yuzu Spicy Mocktail', 'Monin Yuzu, Lemon Juice, Shichimi Togarashi Spice,  Sparkling Soda', 12.00, 'Food-Name-5121.jpg', 67, 'No', 'Yes', 49),
(89, 'Orange Cold Brew Coffee', 'This citrus-filled cold brew is perfect for a hot summer day.', 11.00, 'Food-Name-6518.jpg', 67, 'Yes', 'Yes', 100),
(93, 'Cold Brew', '', 12.90, 'Food-Name-347.jpg', 71, 'No', 'Yes', 56);

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
(17, 'Lim Mei Xuan', 'meixuan@gmail.com', 'Block A - 15 - 12, Ferehen Heights, 11400', 'Bayan Lepas', 601234657869, 'Mei Xuan', '780ea9376333dabb1959f16e1622e00c');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `order_manager`
--
ALTER TABLE `order_manager`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tbl_eipay`
--
ALTER TABLE `tbl_eipay`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=433;

--
-- AUTO_INCREMENT for table `tbl_eipay_details`
--
ALTER TABLE `tbl_eipay_details`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
