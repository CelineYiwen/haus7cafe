-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2023 at 03:54 AM
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
(18, 'Mohammad Wasikuzzaman', 1717731002, 'Hi There', 'Aasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'read', '2022-02-13 11:23:36'),
(19, 'Maheosy Haque', 1867348264, 'Test Subject', 'Test Message', 'read', '2022-02-14 12:24:15'),
(20, 'Jane', 2147483647, 'Test Features', 'Demo 123...', 'unread', '2023-10-18 01:21:14'),
(21, 'Alice', 123456789, 'Feedback', 'Hello World!', 'read', '2023-10-18 02:19:30');

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
(111, 'A crips waffle topped with slices of farm-fresh sweet banana, Premium Vanilla ice cream, whipping cr', 23, 1);

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
(12, '', 'Nazrul Islam', 'nazrul.334@gmail.com', 'Badda, Dhaka', 'Dhaka', 16475347689, 'successful', '2022-02-16 08:17:29', 470, 'ONL-PAY-20XSKIEKLF', 'Cancelled'),
(13, '', 'Maheosy Haque', 'maheosy.sristy@gmail.com', 'Banani, Dhaka', 'Dhaka', 34534534, 'successful', '2022-02-08 10:19:27', 170, 'ONL-PAY-QM7XFUQYHR', 'Cancelled'),
(14, '', 'Mohammad Wasikuzzaman', 'maheosy.sristy@gmail.com', 'Banani, Dhaka', 'city name', 56756, 'successful', '2022-02-01 06:22:22', 270, 'ONL-PAY-COBQ6KWJSQ', 'Cancelled'),
(15, '', 'my full name', 'me@mydomain.com', '01', 'city name', 65, 'successful', '2022-02-01 07:42:35', 150, 'ONL-PAY-LJIBHV3TK8', ''),
(16, '', 'my full name', 'me@mydomain.com', '01', 'city name', 67, 'successful', '0000-00-00 00:00:00', 100, 'ONL-PAY-TFWV0J5REO', ''),
(17, '', 'my full name', 'me@mydomain.com', '01', 'city name', 76, 'successful', '0000-00-00 00:00:00', 130, 'ONL-PAY-GY1UBIG5RX', ''),
(18, '', 'my full name', 'me@mydomain.com', '01', 'city name', 54, 'successful', '0000-00-00 00:00:00', 270, 'ONL-PAY-FYCCSXTQHX', ''),
(19, '', 'my full name', 'me@mydomain.com', '01', 'city name', 54, 'successful', '0000-00-00 00:00:00', 150, 'ONL-PAY-DRV44CERAQ', ''),
(20, '', 'my full name', 'me@mydomain.com', '01', 'city name', 78, 'successful', '0000-00-00 00:00:00', 230, 'ONL-PAY-UXZ7UIZ402', ''),
(21, '', 'This is a Test', 'test@sfdf.com', 'asdasd', 'dhaka', 3232, 'successful', '0000-00-00 00:00:00', 270, 'ONL-PAY-SSRRW2IYZE', ''),
(22, '', 'my full name', 'me@mydomain.com', '01', 'city name', 556, 'successful', '0000-00-00 00:00:00', 230, 'ONL-PAY-68N704WBI7', ''),
(23, '', 'my full name', 'me@mydomain.com', '01', 'city name', 76, 'successful', '0000-00-00 00:00:00', 280, 'ONL-PAY-PI6P46TMJS', ''),
(24, '', 'my full name', 'me@mydomain.com', '01', 'city name', 65, 'successful', '0000-00-00 00:00:00', 100, 'ONL-PAY-3M2UBMTZ01', ''),
(25, '', 'my full name', 'me@mydomain.com', '01', 'city name', 65, 'pending', '0000-00-00 00:00:00', 300, 'ONL-PAY-AWGN1Q66L9', ''),
(26, '', 'my full name', 'me@mydomain.com', '01', 'city name', 65, 'pending', '0000-00-00 00:00:00', 250, 'ONL-PAY-JSD8Y4AWW9', ''),
(27, '', 'my full name', 'me@mydomain.com', '01', 'city name', 65, 'pending', '0000-00-00 00:00:00', 270, 'ONL-PAY-S89OQX0OZD', ''),
(28, '', 'my full name', 'me@mydomain.com', '01', 'city name', 66, 'pending', '0000-00-00 00:00:00', 290, 'ONL-PAY-3EZX9X9K5J', ''),
(29, '', 'Asad Ali', 'asad45@gmail.com', 'House-34, Road 5, Sector7, Uttara', 'Dhaka', 1765349826, 'successful', '0000-00-00 00:00:00', 1310, 'ONL-PAY-6V6RYWX24Z', ''),
(30, '', 'Tamin Ahmed', 'tamim354@gmail.com', 'Uttara, Dhaka', 'Dhaka', 1876563854, 'successful', '0000-00-00 00:00:00', 420, 'ONL-PAY-WVQRSZGWMW', 'Cancelled'),
(31, '', 'my full name', 'me@mydomain.com', '01', 'city name', 8, 'successful', '0000-00-00 00:00:00', 940, 'ONL-PAY-LDFBBO3TJW', 'Cancelled'),
(32, '', 'Wasikuzzaman', 'wasik0003@gmail.com', 'House -15, Road - 19, Nikunja', 'Dhaka', 1717731002, 'successful', '0000-00-00 00:00:00', 460, 'ONL-PAY-7UBFJLE87H', ''),
(33, '', 'Eureka', 'euiiak@gmals.com', 'Sjsjsk', 'Djdjskş', 101, 'successful', '0000-00-00 00:00:00', 750, 'ONL-PAY-GWBLBMSVB8', ''),
(34, '', 'Seems like This is working', 'Yeahh@sohappy.com', 'Finally after all the hardworks', 'I can sigh a breath of relief', 999999, 'successful', '0000-00-00 00:00:00', 880, 'ONL-PAY-VHMONRPXA1', ''),
(35, '', 'Maheosy Haque', 'maheosy.sristy@gmail.com', 'Banani, Dhaka', 'Dhaka', 2121212, 'successful', '0000-00-00 00:00:00', 1080, 'ONL-PAY-C67X5PHHX4', ''),
(36, '', 'Shoriful Islam', 'shorif65@gmail.com', 'House 45, Road 2, Nikunja ', 'Dhaka', 1876349236, 'successful', '0000-00-00 00:00:00', 300, 'ONL-PAY-OSKZYF7J42', 'Cancelled'),
(37, '', 'Farook Ahmed', 'farook345@hotmail.com', 'House 4, Road 19, Sector 3, Uttara', 'Dhaka', 1934826457, 'successful', '0000-00-00 00:00:00', 250, 'ONL-PAY-X3U8QMX9UG', ''),
(38, '', 'Nazmul Islam', 'naz90@yahoo.com', 'House 20, Road 4, Block D, Aftabnagar', 'Dhaka', 1729458729, 'Pending', '0000-00-00 00:00:00', 490, 'ONL-PAY-7PVDA9NVIL', 'Cancelled'),
(39, '', 'my full name', 'me@mydomain.com', '01', 'city name', 11, 'successful', '0000-00-00 00:00:00', 240, 'ONL-PAY-GDGUVQOCL3', ''),
(40, '', 'Monir Ali', 'monir56@gmail.com', 'Uttara, Dhaka', 'Dhaka', 17232567642, 'successful', '0000-00-00 00:00:00', 360, 'ONL-PAY-IRDBF59HGR', 'Cancelled'),
(41, '', 'Jalal Molla', 'jalal34@gmail.com', 'Basabo, Dhaka', 'Dhaka', 17822347345, 'successful', '0000-00-00 00:00:00', 160, 'ONL-PAY-9U0IWYR96U', ''),
(42, '', 'Jalal Molla', 'jalal34@gmail.com', 'Basabo, Dhaka', 'Dhaka', 17822347345, 'successful', '0000-00-00 00:00:00', 160, 'ONL-PAY-9U0IWYR96U', ''),
(43, '', 'Jalal Molla', 'jalal34@gmail.com', 'Basabo, Dhaka', 'Dhaka', 17822347345, 'successful', '0000-00-00 00:00:00', 160, 'ONL-PAY-9U0IWYR96U', ''),
(44, '', 'Jalal Molla', 'jalal34@gmail.com', 'Basabo, Dhaka', 'Dhaka', 17822347345, 'successful', '0000-00-00 00:00:00', 160, 'ONL-PAY-9U0IWYR96U', ''),
(45, '', 'Jalal Molla', 'jalal34@gmail.com', 'Basabo, Dhaka', 'Dhaka', 17822347345, 'successful', '0000-00-00 00:00:00', 160, 'ONL-PAY-9U0IWYR96U', ''),
(46, '', 'Jalal Molla', 'jalal34@gmail.com', 'Basabo, Dhaka', 'Dhaka', 17822347345, 'successful', '0000-00-00 00:00:00', 160, 'ONL-PAY-9U0IWYR96U', ''),
(47, '', 'Jalal Molla', 'jalal34@gmail.com', 'Basabo, Dhaka', 'Dhaka', 17822347345, 'successful', '0000-00-00 00:00:00', 160, 'ONL-PAY-9U0IWYR96U', ''),
(48, '', 'Jalal Molla', 'jalal34@gmail.com', 'Basabo, Dhaka', 'Dhaka', 17822347345, 'successful', '0000-00-00 00:00:00', 160, 'ONL-PAY-9U0IWYR96U', ''),
(49, '', 'Jalal Molla', 'jalal34@gmail.com', 'Basabo, Dhaka', 'Dhaka', 17822347345, 'successful', '0000-00-00 00:00:00', 160, 'ONL-PAY-9U0IWYR96U', ''),
(50, '', 'Kobita Begum', 'kobita456@gmail.com', 'Dhanmondi,Dhaka', 'Dhaka', 1876452946, 'successful', '0000-00-00 00:00:00', 110, 'ONL-PAY-FSSWV66LPV', ''),
(51, '', 'Kobita Begum', 'kobita456@gmail.com', 'Dhanmondi,Dhaka', 'Dhaka', 1876452946, 'successful', '0000-00-00 00:00:00', 110, 'ONL-PAY-FSSWV66LPV', 'Cancelled'),
(52, '', 'Kobita Begum', 'kobita456@gmail.com', 'Dhanmondi,Dhaka', 'Dhaka', 1876452946, 'successful', '0000-00-00 00:00:00', 110, 'ONL-PAY-FSSWV66LPV', ''),
(53, '', 'Kobita Begum', 'kobita456@gmail.com', 'Dhanmondi,Dhaka', 'Dhaka', 1876452946, 'successful', '0000-00-00 00:00:00', 110, 'ONL-PAY-FSSWV66LPV', ''),
(54, '', 'Kobita Begum', 'kobita456@gmail.com', 'Dhanmondi,Dhaka', 'Dhaka', 1876452946, 'successful', '0000-00-00 00:00:00', 110, 'ONL-PAY-FSSWV66LPV', ''),
(55, '', 'Kobita Begum', 'kobita456@gmail.com', 'Dhanmondi,Dhaka', 'Dhaka', 1876452946, 'successful', '0000-00-00 00:00:00', 110, 'ONL-PAY-FSSWV66LPV', ''),
(56, '', 'Kobita Begum', 'kobita456@gmail.com', 'Dhanmondi,Dhaka', 'Dhaka', 1876452946, 'successful', '0000-00-00 00:00:00', 110, 'ONL-PAY-FSSWV66LPV', ''),
(57, '', 'Kobita Begum', 'kobita456@gmail.com', 'Dhanmondi,Dhaka', 'Dhaka', 1876452946, 'successful', '0000-00-00 00:00:00', 110, 'ONL-PAY-FSSWV66LPV', ''),
(58, '', 'Kobita Begum', 'kobita456@gmail.com', 'Dhanmondi,Dhaka', 'Dhaka', 1876452946, 'successful', '0000-00-00 00:00:00', 110, 'ONL-PAY-FSSWV66LPV', ''),
(59, '', 'Kobita Begum', 'kobita456@gmail.com', 'Dhanmondi,Dhaka', 'Dhaka', 1876452946, 'successful', '0000-00-00 00:00:00', 110, 'ONL-PAY-FSSWV66LPV', ''),
(60, '', 'Kobita Begum', 'kobita456@gmail.com', 'Dhanmondi,Dhaka', 'Dhaka', 1876452946, 'successful', '0000-00-00 00:00:00', 110, 'ONL-PAY-FSSWV66LPV', ''),
(61, '', 'Tashin', 'tash7@gmail.com', 'Basundhara RA', 'Dhaka', 1863495433, 'successful', '0000-00-00 00:00:00', 590, 'ONL-PAY-KR8K8ZYVGM', ''),
(62, '', 'Tashin', 'tash7@gmail.com', 'Basundhara RA', 'Dhaka', 1863495433, 'successful', '0000-00-00 00:00:00', 590, 'ONL-PAY-KR8K8ZYVGM', ''),
(63, '', 'Tashin', 'tash7@gmail.com', 'Basundhara RA', 'Dhaka', 1863495433, 'successful', '0000-00-00 00:00:00', 590, 'ONL-PAY-KR8K8ZYVGM', ''),
(64, '', 'Tashin', 'tash7@gmail.com', 'Basundhara RA', 'Dhaka', 1863495433, 'successful', '0000-00-00 00:00:00', 590, 'ONL-PAY-KR8K8ZYVGM', ''),
(65, '', 'Tashin', 'tash7@gmail.com', 'Basundhara RA', 'Dhaka', 1863495433, 'successful', '0000-00-00 00:00:00', 590, 'ONL-PAY-KR8K8ZYVGM', ''),
(66, '', 'Tashin', 'tash7@gmail.com', 'Basundhara RA', 'Dhaka', 1863495433, 'successful', '0000-00-00 00:00:00', 590, 'ONL-PAY-KR8K8ZYVGM', ''),
(67, '', 'Xasha Rahman', 'xasha34@gmail.com', 'Banani, Dhaka', 'Dhaka', 1967349323, 'successful', '0000-00-00 00:00:00', 450, 'ONL-PAY-Y7OP0RYLOB', ''),
(68, '', 'Lokman Rahman', 'lokman56@gmail.com', 'Uttara, Dhaka', 'Dhaka', 1873343234, 'pending', '0000-00-00 00:00:00', 120, 'ONL-PAY-01H14DTP77', ''),
(69, '', 'Lokman Rahman', 'lokman56@gmail.com', 'Uttara, Dhaka', 'Dhaka', 1873343234, 'pending', '0000-00-00 00:00:00', 120, 'ONL-PAY-01H14DTP77', ''),
(70, '', 'Lokman Rahman', 'lokman56@gmail.com', 'Uttara, Dhaka', 'Dhaka', 1873343234, 'pending', '0000-00-00 00:00:00', 120, 'ONL-PAY-01H14DTP77', ''),
(71, '', 'Lokman Rahman', 'lokman56@gmail.com', 'Uttara, Dhaka', 'Dhaka', 1873343234, 'pending', '0000-00-00 00:00:00', 120, 'ONL-PAY-01H14DTP77', ''),
(72, '', 'Lokman Rahman', 'lokman56@gmail.com', 'Uttara, Dhaka', 'Dhaka', 1873343234, 'pending', '0000-00-00 00:00:00', 120, 'ONL-PAY-01H14DTP77', ''),
(73, '', 'Numna', 'numna34@gmail.com', 'Demra, Dhaka', 'Dhaka', 1876349934, 'successful', '0000-00-00 00:00:00', 110, 'ONL-PAY-CF0ZZ553WD', ''),
(74, '', 'Numna', 'numna34@gmail.com', 'Demra, Dhaka', 'Dhaka', 1876349934, 'successful', '0000-00-00 00:00:00', 110, 'ONL-PAY-CF0ZZ553WD', 'Pending'),
(75, '', 'Sultan', 'sultan45@gmail.com', 'Nikunja, Dhaka', 'Dhaka', 1876348465, 'successful', '0000-00-00 00:00:00', 300, 'ONL-PAY-EWEJN2ZP7P', ''),
(76, '', 'Jamila Jameel', 'jamila34@gmail.com', 'Badda, Dhaka', 'Dhaka', 1876343495, 'successful', '0000-00-00 00:00:00', 120, 'ONL-PAY-C1HFESV819', 'Processing'),
(77, '', 'Tom Hanks', 'tom45@gmail.com', 'Dhanmondi, Dhaka', 'Dhaka', 17656349832, 'successful', '0000-00-00 00:00:00', 390, 'ONL-PAY-G7PB7WULEF', 'Processing'),
(78, '', 'Sumona Akter', 'sumona43@yahoo.com', 'Cantonment,Dhaka', 'Dhaka', 1763838232, 'successful', '0000-00-00 00:00:00', 540, 'ONL-PAY-H8GFL3LYB7', 'Delivered'),
(79, '', 'Sumona Akter', 'sumona43@yahoo.com', 'Cantonment,Dhaka', 'Dhaka', 1763838232, 'successful', '0000-00-00 00:00:00', 540, 'ONL-PAY-H8GFL3LYB7', 'Delivered'),
(80, '', 'Sabir Ahmed', 'sabir34@gmail.com', 'Mirpur,Dhaka', 'Dhaka', 1876344832, 'successful', '0000-00-00 00:00:00', 200, 'ONL-PAY-3XF146V92Q', 'Cancelled'),
(81, '', 'Sabir Ahmed', 'sabir34@gmail.com', 'Mirpur,Dhaka', 'Dhaka', 1876344832, 'successful', '0000-00-00 00:00:00', 200, 'ONL-PAY-3XF146V92Q', 'Processing'),
(82, '', 'Jahangir Alom', 'jahnalom@yahoo.com', 'Uttara,Dhaka', 'Dhaka', 1986473747, 'successful', '0000-00-00 00:00:00', 320, 'ONL-PAY-6EF97NAH6Y', 'Cancelled'),
(83, '', 'Muhtasim Mubassir', 'aumi65@gmail.com', 'Dhanmondi, Dhaka', 'Dhaka', 1867346529, 'successful', '0000-00-00 00:00:00', 660, 'ONL-PAY-17FUFJJVGE', 'Processing'),
(84, '', 'Shanto Islam', 'shanto342@yahoo.com', 'Mirpur 14, Dhaka', 'Dhaka', 1673495624, 'successful', '0000-00-00 00:00:00', 480, 'ONL-PAY-W4VHG5CDC4', 'Delivered'),
(85, '', 'Abir Ahmed', 'abir@gmail.com', 'Fargate,Dhaka', 'Dhaka', 1876374823, 'successful', '0000-00-00 00:00:00', 200, 'ONL-PAY-RVDHMHT7Z8', 'Delivered'),
(86, '', 'Maheosy Haque', 'maheosy.sristy@gmail.com', 'Banani,Dhaka', 'Dhaka', 1878456734, 'successful', '0000-00-00 00:00:00', 1700, 'ONL-PAY-RA3OFS3JAG', 'Delivered'),
(87, '', 'Mohammad Wasikuzzaman', 'wasik0003@gmail.com', 'Nikunja,Dhaka', 'Dhaka', 17177301002, 'successful', '0000-00-00 00:00:00', 660, 'ONL-PAY-V5AA6J9NHX', 'Delivered'),
(88, '', 'Robin', 'rob31@yahoo.com', 'Mirpur,Dhaka', 'Dhaka', 19672345423, 'successful', '0000-00-00 00:00:00', 480, 'ONL-PAY-CUGZZYPKXL', 'Delivered'),
(89, '', 'Maheosy Haque', 'numna34@gmail.com', 'Dhanmondi, Dhaka', 'Dhaka', 1723453478, 'successful', '0000-00-00 00:00:00', 300, 'ONL-PAY-03OZKBZ163', 'Delivered'),
(90, '', 'Jay Shah', 'jay69@gmail.com', 'Uttara,Dhaka', 'Dhaka ', 167349264, 'successful', '0000-00-00 00:00:00', 100, 'ONL-PAY-J1VSWT7Y36', 'Delivered'),
(91, '', 'Abdul ', 'abdul@gmail.com', 'Demra, Dhaka', 'Dhaka', 1756369234, 'successful', '0000-00-00 00:00:00', 350, 'ONL-PAY-VU2GQSCWIE', 'Delivered'),
(92, '', 'Rahi', 'rahi67@yahoo.com', 'Banani,Dhaka', 'Dhaka', 156394534, 'successful', '2022-02-10 12:33:45', 100, 'ONL-PAY-GWG4PRVRS6', 'Processing'),
(93, '', 'Bashar', 'bash97@yahoo.com', 'Mirpur 14, Dhaka', 'Dhaka', 1345982634, 'successful', '2022-02-10 05:35:19', 320, 'ONL-PAY-DTYI65WPX7', 'Delivered'),
(94, '', 'Kamal Khan', 'kamal65@gmail.com', 'Dhanmondi, Dhaka', 'Dhaka', 1763482934, 'successful', '2022-02-10 05:41:22', 300, 'ONL-PAY-9M8MHK5ROM', 'Delivered'),
(95, 'wasik0003', 'Mohammad Wasikuzzaman', 'wasikz331@gmail.com', 'Bhaluka Municipality, Bhaluka, Mymensingh.', 'Mymensingh', 1717731002, 'successful', '2022-02-14 03:38:43', 100, 'ONL-PAY-KI6TWT6P0S', 'Pending'),
(96, 'wasik0003', 'Mohammad Wasikuzzaman', 'wasikz331@gmail.com', 'Bhaluka Municipality, Bhaluka, Mymensingh.', 'Mymensingh', 1717731002, 'successful', '2022-02-14 03:41:19', 380, 'ONL-PAY-6NW73HW7WR', 'Pending'),
(97, 'wasik0003', 'Mohammad Wasikuzzaman', 'wasikz331@gmail.com', 'Bhaluka Municipality, Bhaluka, Mymensingh.', 'Mymensingh', 1717731002, 'successful', '2022-02-14 03:46:19', 120, 'ONL-PAY-SK7IM5U84G', 'Delivered'),
(98, 'wasik0003', 'Wasikuzzaman', 'wasik0003@gmail.com', 'Bhaluka Municipality, Bhaluka, Mymensingh.', 'Mymensingh', 1717731002, 'successful', '2022-02-14 06:16:15', 300, 'ONL-PAY-8E5L7NIWAE', 'Processing'),
(99, 'wasik0003', 'Wasikuzzaman', 'wasik0003@gmail.com', 'Bhaluka Municipality, Bhaluka, Mymensingh.', 'Mymensingh', 1717731002, 'successful', '2022-02-14 06:26:37', 450, 'ONL-PAY-VPE49B581W', 'Processing'),
(100, 'mofiz11', 'Mofiz Mia', 'mofiz@gmail.com', 'Dhaka', 'Dhaka', 1717122112, 'Pending', '2023-09-19 08:18:49', 250, 'ONL-PAY-02H137JNWT', 'Cancelled'),
(101, 'Alvin', 'Alvin', 'Alvin@gmail.com', 'No.1 Lorong Meranti 3, Off Jalan Kenanga, 55200, Kuala Lumpur, WP Kuala Lumpur', 'Kuala Lumpur', 138100233, 'Pending', '2023-10-16 01:20:12', 150, 'ONL-PAY-M20W3QIZJ8', 'Cancelled'),
(102, 'Alvin', 'Alvin', 'Alvin@gmail.com', 'No.1 Lorong Meranti 3, Off Jalan Kenanga, 55200, Kuala Lumpur, WP Kuala Lumpur', 'Kuala Lumpur', 138100233, 'pending', '2023-10-16 03:30:16', 150, 'ONL-PAY-LK8DXA0D1U', 'Pending'),
(103, 'Alvin', 'Alvin', 'Alvin@gmail.com', 'No.1 Lorong Meranti 3, Off Jalan Kenanga, 55200, Kuala Lumpur, WP Kuala Lumpur', 'Kuala Lumpur', 138100233, 'pending', '2023-10-16 03:34:55', 100, 'ONL-PAY-MDYY2P6V2O', 'Pending'),
(104, 'Maddie', 'Maddie', 'Maddie@gmail.com', 'No.1, Jalan Megah 23, Batu 9 1/2 Taman Megah, Wilayah Persekutuan, 43200 Kuala Lumpur', 'Kuala Lumpur', 198273362, 'pending', '2023-10-16 03:38:03', 110, 'ONL-PAY-FU028CJNM9', 'Pending'),
(105, 'Maddie', 'Maddie', 'Maddie@gmail.com', 'No.1, Jalan Megah 23, Batu 9 1/2 Taman Megah, Wilayah Persekutuan, 43200 Kuala Lumpur', 'Kuala Lumpur', 198273362, 'pending', '2023-10-16 03:39:30', 100, 'ONL-PAY-X8JH1XBGLE', 'Pending'),
(106, 'Maddie', 'Maddie', 'Maddie@gmail.com', 'No.1, Jalan Megah 23, Batu 9 1/2 Taman Megah, Wilayah Persekutuan, 43200 Kuala Lumpur', 'Kuala Lumpur', 198273362, 'successful', '2023-10-16 03:41:08', 100, 'ONL-PAY-J2V92Y2B56', 'Delivered'),
(107, 'Kelvin', 'Kelvin', 'Kelvin@gmail.com', 'No.1 Jalan Kenanga, Off, Lorong Meranti 2 ', 'Kuala Lumpur', 112872293, 'successful', '2023-10-16 03:41:43', 150, 'ONL-PAY-ZQYEVOOM2S', 'Delivered'),
(108, 'Kelvin', 'Kelvin', 'Kelvin@gmail.com', 'No.1 Jalan Kenanga, Off, Lorong Meranti 2 ', 'Kuala Lumpur', 112872293, 'successful', '2023-10-16 03:43:31', 120, 'ONL-PAY-WXJTH1BCMF', 'Delivered'),
(109, 'Kelvin', 'Kelvin', 'Kelvin@gmail.com', 'No.1 Jalan Kenanga, Off, Lorong Meranti 2 ', 'Kuala Lumpur', 112872293, 'successful', '2023-10-16 03:46:16', 150, 'ONL-PAY-KHV4WBCR07', 'Delivered'),
(110, 'alice', 'Alice', 'alice@gmail.com', 'test fucntion', 'penang', 1232456789, 'successful', '2023-10-18 02:07:51', 35, 'ONL-PAY-FSZYKS5XHC', 'Delivered'),
(111, 'alice', 'Alice', 'alice@gmail.com', 'test fucntion', 'penang', 1232456789, 'successful', '2023-10-25 03:23:47', 57, 'ONL-PAY-FU0Q5V97I5', 'Delivered');

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
(39, 'celine', 'celine', '81dc9bdb52d04dc20036dbd8313ed055'),
(41, 'admin', 'admin', '81dc9bdb52d04dc20036dbd8313ed055');

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
(62, 'Rice', 'Food_Category_34774.jpg', 'Yes', 'Yes');

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
(415, 'Table 3', 763.00, 'EI-PAY-GKKQXXZ42C', '2022-02-09 10:36:18', 'Successful', 'Delivered'),
(416, 'Table 2', 460.00, 'EI-PAY-5SA6TNEO29', '2022-02-09 12:14:30', 'Successful', 'Delivered'),
(418, 'Table 4', 450.00, 'EI-PAY-65IYLWUW2S', '2022-02-09 14:11:26', 'Successful', 'Delivered'),
(420, 'Table 4', 678.00, 'EI-PAY-245XLV2144', '2022-02-09 16:41:41', 'Successful', 'Pending');

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
(71, 'Nasi Goreng Petai', 'Fried Rice with Haus made Shrimp Sambal, Petai, shrimps and Fried Egg. (Spicy/non-Spicy)', 15.80, 'Food-Name-8090.jpg', 62, 'No', 'Yes', 66),
(72, 'Butter Milk Chicken', 'Jasmine white rice serve with deep fried chicken chop with spicy butter milk sauce, Mix Salad, fried egg (Spicy)', 20.80, 'Food-Name-383.jpg', 62, 'No', 'Yes', 51),
(73, 'Percik Chicken', 'Percik Style Chicken serve with Jasmine White Rice and Mix Green Salad.  (Spicy)', 16.80, 'Food-Name-3545.jpg', 62, 'Yes', 'Yes', 100),
(74, 'Spicy Portugese Chicken', 'Grilled Spicy Lemon & Herbs 1/4 chicken leg serve with salad, fries and our special cooling sauce', 22.80, 'Food-Name-9506.jpg', 59, 'Yes', 'Yes', 97),
(75, 'Latte', '', 12.00, 'Food-Name-2900.jpg', 60, 'Yes', 'Yes', 100),
(76, 'Cappucino', '', 12.00, 'Food-Name-4575.jpg', 60, 'No', 'Yes', 43),
(77, 'Aglio Olio', 'A deliciously simple Italian dish of fresh garlic, olive oil, and Parmesan cheese tossed with freshly cooked spaghetti.\r\n(Smoked duck/Shrimps)', 22.80, 'Food-Name-3892.jpg', 61, 'Yes', 'Yes', 92),
(78, 'Uncle Paul Fish & Fries', 'Crispy Soda Battered Fish Fillet (Perch) serve with Fries and Special Tartar Dipping Sauce.', 22.80, 'Food-Name-2611.jpg', 59, 'Yes', 'Yes', 30),
(79, 'Simply Waffle', 'A crips waffle topped with strawberry slices, blueberries serve with Queen maple syrup (sugar free), unsalted butter and sprinkled with granola and icing sugar', 14.00, 'Food-Name-1152.jpg', 58, 'No', 'Yes', 34),
(80, 'Banana Waffle', 'A crips waffle topped with slices of form-fresh sweet banana, Premium  Vanilla ice cream, whipping cream, drizzled with caramel sauce and sprinkled with cinnamon sugar', 23.00, 'Food-Name-8496.jpg', 58, 'No', 'Yes', 55),
(81, 'Lotus Biscoff Waffle', 'A crips waffle topped with 5 pcs Nutella Chocolate Brownies, Premium Vanilla Ice Cream, Lotus Biscoff biscuits, Biscoff sauce and one shot of Alturra espresso (Suitable for sharing)', 30.00, 'Food-Name-1.jpg', 58, 'Yes', 'Yes', 90),
(82, 'Signature Overload Waffles', 'Two crips waffles topped with Premium Vanilla ice cream, Premium Mini Almond ice cream , Gery chocolate wafer roll, strawberries and blueberries, serve with chocolate sauce, drizzled with chocolate sauce and sprinkled with icing sugar and almond (Suitable for sharing)', 36.00, 'Food-Name-5029.jpg', 58, 'Yes', 'Yes', 71),
(83, 'Espresso', '', 7.00, 'Food-Name-7507.jpg', 58, 'No', 'Yes', 7);

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
(1, 'Pepperoni Pizza', 220.00, '2022-01-16 06:47:44', 'Ordered', 'my full name', 'country name', 'me@mydomain.com', ''),
(2, 'Pepperoni Pizza', 220.00, '2022-01-16 06:50:46', 'Delivered', 'my full name', 'country name', 'me@mydomain.com', ''),
(3, 'Beef Burger', 150.00, '2022-01-16 08:09:49', 'Cancelled', 'my full name', 'country name', 'me@mydomain.com', ''),
(4, 'Mexican Pizza', 750.00, '2022-01-16 08:10:16', 'Ordered', 'my full name', 'country name', 'me@mydomain.com', ''),
(5, 'Buffalo Wings', 250.00, '2022-01-16 08:35:55', 'On Delivery', 'Maheosy Haque', '01717731002', 'me@mydomain.com', ''),
(6, 'Pepperoni Pizza', 220.00, '2022-01-17 07:10:28', 'Ordered', 'my full name', 'country name', 'me@mydomain.com', ''),
(7, 'Buffalo Wings', 250.00, '2022-01-17 07:11:00', 'Ordered', 'my full name', 'country name', 'me@mydomain.com', ''),
(8, 'Mexican Pizza', 250.00, '2022-01-17 07:11:56', 'Ordered', 'my full name', 'country name', 'me@mydomain.com', ''),
(9, '', 200.00, '2022-01-21 21:29:42', 'Successful', 'Maheosy Haque', '01717731002', 'maheosy.sristy@gmail.com', ''),
(10, '', 220.00, '2022-01-21 21:31:46', 'Successful', 'Maheosy Haque', '01717731002', 'me@mydomain.com', ''),
(11, '', 250.00, '2022-01-21 21:32:43', 'Successful', 'Maheosy Haque', '01717731002', 'maheosy.sristy@gmail.com', ''),
(12, 'HF141T', 220.00, '2022-01-21 21:38:46', 'Successful', 'Forest Gump', '01717731002', 'forest@gmail.com', ''),
(13, 'IVVOP1', 250.00, '2022-01-21 21:40:30', 'Successful', 'Maheosy Haque', '9', 'me@mydomain.com', ''),
(14, 'ROBO-CAFEMP5J31', 250.00, '2022-01-21 21:42:27', 'Successful', 'Maheosy Haque', '23', 'maheosy.sristy@gmail.com', ''),
(15, 'ROBO-CAFE-K0WPJ8', 150.00, '2022-01-21 21:49:59', 'Successful', 'Maheosy Haque', '2', 'maheosy.sristy@gmail.com', ''),
(16, 'ROBO-CAFE-7XS507', 680.00, '2022-01-21 23:18:36', 'Successful', 'Maheosy Haque', '01717732432', 'maheosy.sristy@gmail.com', ''),
(17, 'ROBO-CAFE-0GI4JT', 180.00, '2022-01-21 23:21:39', 'Successful', 'Maheosy Haque', '45345345', 'maheosy.sristy@gmail.com', ''),
(18, '', 0.00, '2022-01-22 02:05:57', '', '', '', '', ''),
(19, '', 0.00, '2022-01-22 02:14:44', '', '', '', '', ''),
(20, '', 0.00, '2022-01-22 02:15:44', '', '', '', '', ''),
(21, '', 0.00, '2022-01-22 02:17:10', '', '', '', '', 'Array'),
(22, 'Array', 0.00, '2022-01-22 02:18:24', '', '', '', '', 'cus_add1'),
(23, 'Array', 0.00, '2022-01-22 02:22:21', '', '', '', '', ''),
(24, 'Array', 0.00, '2022-01-22 02:23:30', '', '', '', '', ''),
(25, 'ROBO-CAFE-MML336', 250.00, '2022-01-22 02:27:11', '', 'my full name', '34534', 'me@mydomain.com', '01'),
(26, 'ROBO-CAFE-MML336', 250.00, '2022-01-22 02:28:40', '', 'my full name', '34534', 'me@mydomain.com', '01'),
(27, 'ROBO-CAFE-A1DFRQ', 250.00, '2022-01-22 02:29:22', '', 'my full name', '45', 'me@mydomain.com', '01'),
(28, 'ROBO-CAFE-S4B37V', 250.00, '2022-01-22 02:30:25', '', 'my full name', '45', 'me@mydomain.com', '01'),
(29, 'ROBO-CAFE-F7Y4XU', 250.00, '2022-01-22 02:31:15', '', 'my full name', '56', 'me@mydomain.com', '01'),
(30, 'ROBO-CAFE-F7Y4XU', 250.00, '2022-01-22 02:32:19', '', 'my full name', '56', 'me@mydomain.com', '01'),
(31, 'ROBO-CAFE-PQZ46L', 250.00, '2022-01-22 02:32:26', '', 'my full name', '4', 'me@mydomain.com', '01'),
(32, 'ROBO-CAFE-9F5EG7', 250.00, '2022-01-22 02:57:56', '', 'my full name', '345', 'me@mydomain.com', '01'),
(33, 'ROBO-CAFE-9F5EG7', 250.00, '2022-01-22 02:57:59', '', 'my full name', '345', 'me@mydomain.com', '01'),
(34, 'ROBO-CAFE-3N4U4N', 250.00, '2022-01-22 02:58:04', '', 'my full name', '234', 'me@mydomain.com', '01'),
(35, 'ROBO-CAFE-3N4U4N', 250.00, '2022-01-22 02:58:52', '', 'my full name', '234', 'me@mydomain.com', '01'),
(36, 'ROBO-CAFE-51G6DI', 100.00, '2022-01-22 05:52:14', '', 'Mohammad Wasikuzzaman', '01717731002', 'wasik@gmail.com', 'Banani, Dhaka'),
(37, 'ROBO-CAFE-CJAJIH', 250.00, '2022-01-22 05:54:56', '', 'my full name', '4', 'me@mydomain.com', '01'),
(38, 'ROBO-CAFE-MH9P87', 150.00, '2022-01-22 17:56:12', 'Successful', 'my full name', '8', 'me@mydomain.com', '');

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
(7, 'Alice', 'alice@gmail.com', 'test fucntion', 'penang', 1232456789, 'alice', '81dc9bdb52d04dc20036dbd8313ed055');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order_manager`
--
ALTER TABLE `order_manager`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tbl_eipay`
--
ALTER TABLE `tbl_eipay`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=422;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
