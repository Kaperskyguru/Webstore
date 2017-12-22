-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2017 at 04:03 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sparepartsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Brembo '),
(2, 'AC Delco'),
(3, 'Akebono'),
(4, 'General Electric'),
(5, 'Universal Air Suspension'),
(6, 'Air Lift'),
(7, 'Torque'),
(8, 'Honda'),
(9, 'BMW'),
(10, 'Mercedes-Benz'),
(11, 'Toyota'),
(12, 'Ford'),
(13, 'Lycoming Engines'),
(14, 'Sparco'),
(15, 'GT Performance'),
(16, 'Matrix Steering Wheels'),
(17, 'Flaming River');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_address` varchar(250) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_title` varchar(300) NOT NULL,
  `product_image` text NOT NULL,
  `qty` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `total_amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_address`, `user_id`, `product_title`, `product_image`, `qty`, `price`, `total_amount`) VALUES
(1, 2, '0', 0, 'Drum Brake', '1746443-system-of-drum-brake.jpg', 1, 20000, 20000),
(4, 8, '0', 0, 'Engine', '10803093-close-up-of-gasoline-car-engine--three-valve-per-cylinder-system-lpg-converted.jpg', 1, 1000000, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Brakes, Suspension and Steering'),
(2, 'Headlights and Lighting'),
(3, 'Body Parts'),
(4, 'Engine'),
(5, 'Accessories (Interior and External)');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `id` int(100) NOT NULL,
  `uid` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_price` decimal(10,0) NOT NULL,
  `p_qty` int(100) NOT NULL,
  `t_amount` int(100) NOT NULL,
  `p_status` varchar(100) NOT NULL,
  `trxn_id` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `uid`, `pid`, `p_name`, `p_price`, `p_qty`, `t_amount`, `p_status`, `trxn_id`) VALUES
(1, 1, 1, '1', '1', 1, 1, '1', '1'),
(2, 1, 1, 'd', '1', 1, 1, '1', '1'),
(3, 1, 22, 'Headlight', '10000', 10, 100000, '1', '1'),
(4, 1, 22, 'Headlight', '10000', 10, 100000, '1', '1'),
(5, 1, 1, 'Brake system', '40000', 7, 280000, '1', '1'),
(6, 1, 1, 'Brake system', '40000', 7, 280000, '1', '1'),
(7, 1, 1, 'Brake system', '40000', 7, 280000, '1', '1'),
(8, 1, 1, 'Brake system', '40000', 7, 280000, '1', '1'),
(9, 1, 1, 'Brake system', '40000', 7, 280000, '1', '1'),
(10, 1, 1, 'Brake system', '40000', 7, 280000, '1', '1'),
(11, 1, 3, 'Brake Crossout', '30000', 1, 30000, '1', '1'),
(12, 1, 3, 'Brake Crossout', '30000', 1, 30000, '1', '1'),
(13, 1, 3, 'Brake Crossout', '30000', 1, 30000, '1', '1'),
(14, 1, 1, 'Brake system', '40000', 1, 40000, '1', '1'),
(15, 1, 2, 'Drum Brake', '20000', 1, 20000, '1', '1'),
(16, 1, 1, 'Brake system', '40000', 1, 40000, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacktable`
--

CREATE TABLE `feedbacktable` (
  `feed_ID` int(11) NOT NULL,
  `feed_Desc` text NOT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `Prod_ID` int(11) DEFAULT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacktable`
--

INSERT INTO `feedbacktable` (`feed_ID`, `feed_Desc`, `User_ID`, `Prod_ID`, `DateCreated`) VALUES
(1, 'this is a great product', 1, 1, '2017-08-30 15:19:29'),
(2, 'TRYING', 2, 2, '2017-12-05 10:04:20'),
(3, 'Great Product', 2, 2, '2017-12-05 10:06:00'),
(4, 'Its working', 2, 2, '2017-12-05 10:08:27'),
(5, 'HHHHHHHHHH', 2, 2, '2017-12-05 10:10:07'),
(6, 'HHHHHHHHHH', 2, 2, '2017-12-05 10:10:08'),
(7, 'this is a great product', 2, 6, '2017-12-05 10:45:27'),
(10, 'hello great product', 2, 2, '2017-12-21 15:05:13'),
(11, 'hi great product', 2, 1, '2017-12-21 15:32:58'),
(12, 'Hi', 2, 2, '2017-12-22 11:10:23'),
(13, 'Hi', 2, 2, '2017-12-22 11:10:24'),
(14, 'helo', 2, 2, '2017-12-22 11:12:02'),
(15, 'testing', 1, 2, '2017-12-22 11:20:45'),
(16, 'this a grat', 3, 3, '2017-12-22 11:22:22'),
(17, 'Skreeeeya!', 3, 3, '2017-12-22 11:24:29'),
(18, 'Ka ka ka ka pa pa', 3, 3, '2017-12-22 11:25:17'),
(19, 'working', 3, 3, '2017-12-22 11:26:28'),
(20, 'working agian', 3, 3, '2017-12-22 11:27:13'),
(21, 'still testing', 3, 3, '2017-12-22 12:35:22'),
(22, 'gfuhidj', 3, 3, '2017-12-22 12:44:30'),
(23, 'Boom!', 3, 3, '2017-12-22 12:45:36'),
(24, 'hh', 3, 5, '2017-12-22 12:48:22'),
(25, 'hjhkajsal', 3, 5, '2017-12-22 12:49:36'),
(26, 'hiii', 3, 5, '2017-12-22 12:50:26'),
(27, 'dfhghdty', 1, 3, '2017-12-22 13:07:11');

-- --------------------------------------------------------

--
-- Table structure for table `ordertable`
--

CREATE TABLE `ordertable` (
  `Ord_ID` int(11) NOT NULL,
  `Prod_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Ord_Qty` int(11) NOT NULL,
  `Ord_TotalPrice` decimal(10,0) NOT NULL,
  `Sta_ID` int(11) NOT NULL DEFAULT '2',
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `TrackingID` bigint(20) NOT NULL,
  `Items_No` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertable`
--

INSERT INTO `ordertable` (`Ord_ID`, `Prod_ID`, `User_ID`, `Ord_Qty`, `Ord_TotalPrice`, `Sta_ID`, `DateCreated`, `TrackingID`, `Items_No`) VALUES
(1, 15, 1, 70, '7000', 2, '2017-12-21 11:56:56', 0, 0),
(2, 1, 1, 1, '40000', 2, '2017-12-21 13:58:58', 76798, 0),
(3, 3, 1, 1, '30000', 2, '2017-12-21 15:53:10', 76798, 0),
(4, 3, 1, 1, '30000', 2, '2017-12-22 13:06:26', 76798, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(100) NOT NULL,
  `prod_cat` int(100) NOT NULL,
  `prod_brand` int(100) NOT NULL,
  `prod_title` varchar(300) NOT NULL,
  `prod_qty` int(11) NOT NULL DEFAULT '1',
  `prod_price` int(100) NOT NULL,
  `prod_desc` text NOT NULL,
  `prod_image` text NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `prod_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_cat`, `prod_brand`, `prod_title`, `prod_qty`, `prod_price`, `prod_desc`, `prod_image`, `dateCreated`, `prod_keywords`) VALUES
(1, 1, 1, 'Brake system', 1, 40000, 'This is a Description of the Brake system. ', '10559688-brake-disc.jpg', '2017-07-31 14:26:17', 'Brakes Brembo '),
(2, 1, 2, 'Drum Brake', 1, 20000, 'This is a description of the Drum brake.', '1746443-system-of-drum-brake.jpg', '2017-07-31 14:26:17', 'Brakes AC Delco'),
(3, 1, 3, 'Brake Crossout', 1, 30000, 'This is a description of the Brake crossout', '8891811-brake-crosscut.jpg', '2017-07-31 14:26:17', 'Brakes Akebono c C'),
(4, 1, 6, 'Front suspension', 1, 40000, 'Description of front car suspension', '20083246-multi-link-front-car-suspension-with-brake-perspective-view-photorealistic-3-d-rendering-with-morphi.jpg', '2017-07-31 14:26:17', 'Suspension Air Lift'),
(5, 1, 7, 'Suspension', 1, 50000, 'Description of Suspension system', 'suspension.jpg', '2017-07-31 14:26:17', 'Suspension Torque'),
(6, 2, 8, 'Headlight', 1, 10000, 'Description of Headlight', '10042065-modern-luminescent-lamp-design-of-a-car.jpg', '2017-07-31 14:26:17', 'Headlights Honda'),
(7, 3, 11, 'Body', 1, 400000, 'Description of Body', '39374998-bumper-bumpers-isolated-car-auto-front-fender-parts-plastic-automobile-body.jpg', '2017-07-31 14:26:17', 'Body Toyota'),
(8, 4, 12, 'Engine', 1, 1000000, 'Description of Engine', '10803093-close-up-of-gasoline-car-engine--three-valve-per-cylinder-system-lpg-converted.jpg', '2017-07-31 14:26:17', 'Engine Ford'),
(9, 1, 1, 'Brake system', 1, 40000, 'This is a Description of the Brake system. ', '10559688-brake-disc.jpg', '2017-07-31 14:26:17', 'Brakes Brembo '),
(10, 1, 2, 'Drum Brake', 1, 20000, 'This is a description of the Drum brake.', '1746443-system-of-drum-brake.jpg', '2017-07-31 14:26:17', 'Brakes AC Delco'),
(11, 1, 3, 'Brake Crossout', 1, 30000, 'This is a description of the Brake crossout', '8891811-brake-crosscut.jpg', '2017-07-31 14:26:17', 'Brakes Akebono c C'),
(12, 1, 6, 'Front suspension', 1, 40000, 'Description of front car suspension', '20083246-multi-link-front-car-suspension-with-brake-perspective-view-photorealistic-3-d-rendering-with-morphi.jpg', '2017-07-31 14:26:17', 'Suspension Air Lift'),
(13, 1, 7, 'Suspension', 1, 50000, 'Description of Suspension system', 'suspension.jpg', '2017-07-31 14:26:17', 'Suspension Torque'),
(14, 2, 8, 'Headlight', 1, 10000, 'Description of Headlight', '10042065-modern-luminescent-lamp-design-of-a-car.jpg', '2017-07-31 14:26:17', 'Headlights Honda'),
(15, 3, 11, 'Body', 1, 400000, 'Description of Body', '39374998-bumper-bumpers-isolated-car-auto-front-fender-parts-plastic-automobile-body.jpg', '2017-07-31 14:26:17', 'Body Toyota'),
(16, 4, 12, 'Engine', 1, 1000000, 'Description of Engine', '10803093-close-up-of-gasoline-car-engine--three-valve-per-cylinder-system-lpg-converted.jpg', '2017-07-31 14:26:17', 'Engine Ford'),
(17, 1, 1, 'Brake system', 1, 40000, 'This is a Description of the Brake system. ', '10559688-brake-disc.jpg', '2017-07-31 14:26:17', 'Brakes Brembo '),
(18, 1, 2, 'Drum Brake', 1, 20000, 'This is a description of the Drum brake.', '1746443-system-of-drum-brake.jpg', '2017-07-31 14:26:17', 'Brakes AC Delco'),
(19, 1, 3, 'Brake Crossout', 1, 30000, 'This is a description of the Brake crossout', '8891811-brake-crosscut.jpg', '2017-07-31 14:26:17', 'Brakes Akebono c C'),
(20, 1, 6, 'Front suspension', 1, 40000, 'Description of front car suspension', '20083246-multi-link-front-car-suspension-with-brake-perspective-view-photorealistic-3-d-rendering-with-morphi.jpg', '2017-07-31 14:26:17', 'Suspension Air Lift'),
(21, 1, 7, 'Suspension', 1, 50000, 'Description of Suspension system', 'suspension.jpg', '2017-07-31 14:26:17', 'Suspension Torque'),
(22, 2, 8, 'Headlight', 1, 10000, 'Description of Headlight', '10042065-modern-luminescent-lamp-design-of-a-car.jpg', '2017-07-31 14:26:17', 'Headlights Honda'),
(23, 3, 11, 'Body', 1, 400000, 'Description of Body', '39374998-bumper-bumpers-isolated-car-auto-front-fender-parts-plastic-automobile-body.jpg', '2017-07-31 14:26:17', 'Body Toyota'),
(24, 4, 12, 'Engine', 1, 1000000, 'Description of Engine', '10803093-close-up-of-gasoline-car-engine--three-valve-per-cylinder-system-lpg-converted.jpg', '2017-07-31 14:26:17', 'Engine Ford'),
(25, 1, 1, 'Brake system', 1, 40000, 'This is a Description of the Brake system. ', '10559688-brake-disc.jpg', '2017-07-31 14:26:17', 'Brakes Brembo '),
(26, 1, 2, 'Drum Brake', 1, 20000, 'This is a description of the Drum brake.', '1746443-system-of-drum-brake.jpg', '2017-07-31 14:26:17', 'Brakes AC Delco'),
(27, 1, 3, 'Brake Crossout', 1, 30000, 'This is a description of the Brake crossout', '8891811-brake-crosscut.jpg', '2017-07-31 14:26:17', 'Brakes Akebono c C'),
(28, 1, 6, 'Front suspension', 1, 40000, 'Description of front car suspension', '20083246-multi-link-front-car-suspension-with-brake-perspective-view-photorealistic-3-d-rendering-with-morphi.jpg', '2017-07-31 14:26:17', 'Suspension Air Lift'),
(29, 1, 7, 'Suspension', 1, 50000, 'Description of Suspension system', 'suspension.jpg', '2017-07-31 14:26:17', 'Suspension Torque'),
(30, 2, 8, 'Headlight', 1, 10000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '10042065-modern-luminescent-lamp-design-of-a-car.jpg', '2017-09-08 16:06:49', 'Headlights Honda'),
(31, 3, 11, 'Body', 1, 400000, 'Description of Body', '39374998-bumper-bumpers-isolated-car-auto-front-fender-parts-plastic-automobile-body.jpg', '2017-07-31 14:26:17', 'Body Toyota'),
(32, 4, 12, 'Engine', 1, 1000000, 'Description of Engine', '10803093-close-up-of-gasoline-car-engine--three-valve-per-cylinder-system-lpg-converted.jpg', '2017-07-31 14:26:17', 'Engine Ford'),
(33, 1, 1, 'Brake system', 1, 40000, 'This is a Description of the Brake system. ', '10559688-brake-disc.jpg', '2017-07-31 14:26:17', 'Brakes Brembo '),
(34, 1, 2, 'Drum Brake', 1, 20000, 'This is a description of the Drum brake.', '1746443-system-of-drum-brake.jpg', '2017-07-31 14:26:17', 'Brakes AC Delco'),
(35, 1, 3, 'Brake Crossout', 1, 30000, 'This is a description of the Brake crossout', '8891811-brake-crosscut.jpg', '2017-07-31 14:26:17', 'Brakes Akebono c C'),
(36, 1, 6, 'Front suspension', 1, 40000, 'Description of front car suspension', '20083246-multi-link-front-car-suspension-with-brake-perspective-view-photorealistic-3-d-rendering-with-morphi.jpg', '2017-07-31 14:26:17', 'Suspension Air Lift'),
(37, 1, 7, 'Suspension', 1, 50000, 'Description of Suspension system', 'suspension.jpg', '2017-07-31 14:26:17', 'Suspension Torque'),
(38, 2, 8, 'Headlight', 1, 10000, 'Description of Headlight', '10042065-modern-luminescent-lamp-design-of-a-car.jpg', '2017-07-31 14:26:17', 'Headlights Honda'),
(39, 3, 11, 'Body', 1, 400000, 'Description of Body', '39374998-bumper-bumpers-isolated-car-auto-front-fender-parts-plastic-automobile-body.jpg', '2017-07-31 14:26:17', 'Body Toyota'),
(40, 4, 12, 'Engine', 1, 1000000, 'Description of Engine', '10803093-close-up-of-gasoline-car-engine--three-valve-per-cylinder-system-lpg-converted.jpg', '2017-07-31 14:26:17', 'Engine Ford'),
(41, 1, 1, 'Brake system', 1, 40000, 'This is a Description of the Brake system. ', '10559688-brake-disc.jpg', '2017-07-31 14:26:17', 'Brakes Brembo '),
(42, 1, 2, 'Drum Brake', 1, 20000, 'This is a description of the Drum brake.', '1746443-system-of-drum-brake.jpg', '2017-07-31 14:26:17', 'Brakes AC Delco'),
(43, 1, 3, 'Brake Crossout', 1, 30000, 'This is a description of the Brake crossout', '8891811-brake-crosscut.jpg', '2017-07-31 14:26:17', 'Brakes Akebono c C'),
(44, 1, 4, 'Front suspension', 1, 40000, 'Description of front car suspension', '20083246-multi-link-front-car-suspension-with-brake-perspective-view-photorealistic-3-d-rendering-with-morphi.jpg', '2017-07-31 14:26:17', 'Suspension Air Lift'),
(45, 1, 8, 'Suspension', 1, 50000, 'Description of Suspension system', 'suspension.jpg', '2017-07-31 14:26:17', 'Suspension Torque'),
(46, 2, 9, 'Headlight', 1, 10000, 'Description of Headlight', '10042065-modern-luminescent-lamp-design-of-a-car.jpg', '2017-07-31 14:26:17', 'Headlights Honda'),
(47, 3, 12, 'Body', 1, 400000, 'Description of Body', '39374998-bumper-bumpers-isolated-car-auto-front-fender-parts-plastic-automobile-body.jpg', '2017-07-31 14:26:17', 'Body Toyota'),
(48, 4, 13, 'Engine', 1, 1000000, 'Description of Engine', '10803093-close-up-of-gasoline-car-engine--three-valve-per-cylinder-system-lpg-converted.jpg', '2017-07-31 14:26:17', 'Engine Ford'),
(49, 1, 1, 'Brake system', 1, 40000, 'This is a Description of the Brake system. ', '10559688-brake-disc.jpg', '2017-07-31 14:26:17', 'Brakes Brembo '),
(50, 1, 3, 'Drum Brake', 1, 20000, 'This is a description of the Drum brake.', '1746443-system-of-drum-brake.jpg', '2017-07-31 14:26:17', 'Brakes AC Delco'),
(51, 1, 10, 'Brake Crossout', 1, 30000, 'This is a description of the Brake crossout', '8891811-brake-crosscut.jpg', '2017-07-31 14:26:17', 'Brakes Akebono c C'),
(52, 1, 5, 'Front suspension', 1, 40000, 'Description of front car suspension', '20083246-multi-link-front-car-suspension-with-brake-perspective-view-photorealistic-3-d-rendering-with-morphi.jpg', '2017-07-31 14:26:17', 'Suspension Air Lift'),
(53, 1, 6, 'Suspension', 1, 50000, 'Description of Suspension system', 'suspension.jpg', '2017-07-31 14:26:17', 'Suspension Torque'),
(54, 2, 9, 'Headlight', 1, 10000, 'Description of Headlight', '10042065-modern-luminescent-lamp-design-of-a-car.jpg', '2017-07-31 14:26:17', 'Headlights Honda'),
(55, 3, 13, 'Body', 1, 400000, 'Description of Body', '39374998-bumper-bumpers-isolated-car-auto-front-fender-parts-plastic-automobile-body.jpg', '2017-07-31 14:26:17', 'Body Toyota'),
(56, 4, 11, 'Engine', 1, 1000000, 'Description of Engine', '10803093-close-up-of-gasoline-car-engine--three-valve-per-cylinder-system-lpg-converted.jpg', '2017-07-31 14:26:17', 'Engine Ford'),
(57, 0, 16, 'NUTS', 888, 78, 'ths wed', '', '2017-07-31 14:26:17', ''),
(58, 0, 15, 'NUTS', 78, 67, 'uyhjuhjhj', '', '2017-07-31 14:26:17', ''),
(59, 0, 4, 'kak', 89, 67, 'kkkaaa', '', '2017-08-30 10:35:18', ''),
(60, 2, 10, 'kakakakakakkkkkkk', 89, 67, 'rthifjmm', 'uploads/Abia Poly.png', '2017-08-30 14:42:02', '');

-- --------------------------------------------------------

--
-- Table structure for table `statustable`
--

CREATE TABLE `statustable` (
  `Sta_ID` int(11) NOT NULL,
  `Sta_Name` varchar(25) NOT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statustable`
--

INSERT INTO `statustable` (`Sta_ID`, `Sta_Name`, `DateCreated`) VALUES
(1, 'Active', '2017-09-08 10:41:27'),
(2, 'Pending', '2017-09-08 10:41:33'),
(3, 'On Ship', '2017-09-08 10:41:44'),
(4, 'Delivered', '2017-09-11 08:47:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `username` varchar(225) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_address1` text NOT NULL,
  `user_address2` text NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `user_role` int(11) NOT NULL DEFAULT '0',
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `f_name`, `username`, `user_password`, `user_email`, `user_address1`, `user_address2`, `phone_number`, `user_role`, `dateCreated`) VALUES
(1, 'Victory Efedjarho', '', 'so', 'efedjarhovictory@gmail.com', 'No 2 Pinnacle close off Refinery road Effurun, Delta State, Nigeria.', 'No 6 Okotie Avenue opp. Agofure yard, Agbarho, Delta State, Nigeria.', '', 0, '2017-10-20 09:51:13'),
(2, 'Solomon Eseme', '', 'so', 'solomoneseme@gmail.com', '22 Wokenkoro Street', 'Iwofe, Port Harcourt, Rivers State', '', 1, '2017-10-20 09:51:13'),
(3, 'Solomon Eseme Paul', '', 'solo', 'kapman@gmail.com', 'Intels', '', '', 0, '2017-12-05 07:56:59'),
(4, 'nam', '', 'so', 'haha@gmail.com', '22 Intels', '', '', 0, '2017-10-20 09:51:13'),
(5, 'solo P', '', 'solo', 'hh@gmail.com', 'Aba', '', '', 0, '2017-10-20 09:54:52'),
(6, 'Donor', 'kapersky', 'Changeless11', 'solo@gmail.com', 'kllkdladla', '', '', 0, '2017-12-05 13:22:35'),
(7, 'Donor', 'kapersky', 'Changeless11', 'solo@gmail.com', 'kllkdladla', '', '', 0, '2017-12-05 13:22:37'),
(8, 'Solo P', 'kapersky', 'Changeless11', 'jsjsjs@gmail.com', 'Ph', '', '', 0, '2017-12-05 13:27:12'),
(9, 'lkjlkll', 'kapersky', 'Changeless11', 'k,snkdnla@gmail.com', 'lklkl', '', '', 0, '2017-12-05 13:30:01'),
(10, 'aksjjsjsjdcfskl', 'kapersky', 'Changeless11', 'opaipdoapod@gamil.com', 'kjhadkahodia', '', '', 0, '2017-12-05 13:33:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacktable`
--
ALTER TABLE `feedbacktable`
  ADD PRIMARY KEY (`feed_ID`),
  ADD KEY `FK_F_prod` (`Prod_ID`),
  ADD KEY `FK_F_user` (`User_ID`);

--
-- Indexes for table `ordertable`
--
ALTER TABLE `ordertable`
  ADD PRIMARY KEY (`Ord_ID`),
  ADD KEY `FK_O_sta` (`Sta_ID`),
  ADD KEY `FK_O_prod` (`Prod_ID`),
  ADD KEY `FK_O_user` (`User_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `statustable`
--
ALTER TABLE `statustable`
  ADD PRIMARY KEY (`Sta_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `feedbacktable`
--
ALTER TABLE `feedbacktable`
  MODIFY `feed_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `ordertable`
--
ALTER TABLE `ordertable`
  MODIFY `Ord_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `statustable`
--
ALTER TABLE `statustable`
  MODIFY `Sta_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedbacktable`
--
ALTER TABLE `feedbacktable`
  ADD CONSTRAINT `FK_F_prod` FOREIGN KEY (`Prod_ID`) REFERENCES `products` (`prod_id`),
  ADD CONSTRAINT `FK_F_user` FOREIGN KEY (`User_ID`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `ordertable`
--
ALTER TABLE `ordertable`
  ADD CONSTRAINT `FK_O_prod` FOREIGN KEY (`Prod_ID`) REFERENCES `products` (`prod_id`),
  ADD CONSTRAINT `FK_O_sta` FOREIGN KEY (`Sta_ID`) REFERENCES `statustable` (`Sta_ID`),
  ADD CONSTRAINT `FK_O_user` FOREIGN KEY (`User_ID`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
