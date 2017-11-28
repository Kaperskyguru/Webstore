<?php

$error = array();
$conn = new mysqli('us-cdbr-iron-east-05.cleardb.net', 'be808db55dbefa', 'c3116baf', 'heroku_76835da5755eded') or die(mysql_error());
$con = $conn;

//mysql://be808db55dbefa:c3116baf@us-cdbr-iron-east-05.cleardb.net/heroku_76835da5755eded?reconnect=true



if (mysqli_select_db($con,'sparepartsDB')) {
    createTables();
} else {
    if (mysqli_create_db($con, 'sparepartsDB')) {
        createTables($con);
    } else {
        echo 'cannot create DB';
    }
}

function mysqli_create_db( $con,$db) {
    $query = "create database `$db`";
    return ($con ->query($query)) ? true : false;
}

function createTables() {
    global $con;
    
    -- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 24, 2017 at 11:22 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `web_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(100) NOT NULL AUTO_INCREMENT,
  `brand_title` text NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

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

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `p_id` int(10) NOT NULL,
  `ip_address` varchar(250) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_title` varchar(300) NOT NULL,
  `product_image` text NOT NULL,
  `qty` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `total_amount` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_address`, `user_id`, `product_title`, `product_image`, `qty`, `price`, `total_amount`) VALUES
(20, 33, '0', 1, 'Brake system', '10559688-brake-disc.jpg', 4, 40000, 160000),
(21, 15, '0', 1, 'Body', '39374998-bumper-bumpers-isolated-car-auto-front-fender-parts-plastic-automobile-body.jpg', 1, 400000, 400000),
(22, 39, '0', 1, 'Body', '39374998-bumper-bumpers-isolated-car-auto-front-fender-parts-plastic-automobile-body.jpg', 1, 400000, 400000),
(23, 40, '0', 1, 'Engine', '10803093-close-up-of-gasoline-car-engine--three-valve-per-cylinder-system-lpg-converted.jpg', 1, 1000000, 1000000),
(24, 36, '0', 1, 'Front suspension', '20083246-multi-link-front-car-suspension-with-brake-perspective-view-photorealistic-3-d-rendering-with-morphi.jpg', 1, 40000, 40000),
(25, 38, '0', 1, 'Headlight', '10042065-modern-luminescent-lamp-design-of-a-car.jpg', 1, 10000, 10000),
(26, 50, '0', 1, 'Drum Brake', '1746443-system-of-drum-brake.jpg', 1, 20000, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(100) NOT NULL AUTO_INCREMENT,
  `cat_title` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

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
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `prod_id` int(100) NOT NULL AUTO_INCREMENT,
  `prod_cat` int(100) NOT NULL,
  `prod_brand` int(100) NOT NULL,
  `prod_title` varchar(300) NOT NULL,
  `prod_price` int(100) NOT NULL,
  `prod_desc` text NOT NULL,
  `prod_image` text NOT NULL,
  `prod_keywords` text NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_cat`, `prod_brand`, `prod_title`, `prod_price`, `prod_desc`, `prod_image`, `prod_keywords`) VALUES
(1, 1, 1, 'Brake system', 40000, 'This is a Description of the Brake system. ', '10559688-brake-disc.jpg', 'Brakes Brembo '),
(2, 1, 2, 'Drum Brake', 20000, 'This is a description of the Drum brake.', '1746443-system-of-drum-brake.jpg', 'Brakes AC Delco'),
(3, 1, 3, 'Brake Crossout', 30000, 'This is a description of the Brake crossout', '8891811-brake-crosscut.jpg', 'Brakes Akebono c C'),
(4, 1, 6, 'Front suspension', 40000, 'Description of front car suspension', '20083246-multi-link-front-car-suspension-with-brake-perspective-view-photorealistic-3-d-rendering-with-morphi.jpg', 'Suspension Air Lift'),
(5, 1, 7, 'Suspension', 50000, 'Description of Suspension system', 'suspension.jpg', 'Suspension Torque'),
(6, 2, 8, 'Headlight', 10000, 'Description of Headlight', '10042065-modern-luminescent-lamp-design-of-a-car.jpg', 'Headlights Honda'),
(7, 3, 11, 'Body', 400000, 'Description of Body', '39374998-bumper-bumpers-isolated-car-auto-front-fender-parts-plastic-automobile-body.jpg', 'Body Toyota'),
(8, 4, 12, 'Engine', 1000000, 'Description of Engine', '10803093-close-up-of-gasoline-car-engine--three-valve-per-cylinder-system-lpg-converted.jpg', 'Engine Ford'),
(9, 1, 1, 'Brake system', 40000, 'This is a Description of the Brake system. ', '10559688-brake-disc.jpg', 'Brakes Brembo '),
(10, 1, 2, 'Drum Brake', 20000, 'This is a description of the Drum brake.', '1746443-system-of-drum-brake.jpg', 'Brakes AC Delco'),
(11, 1, 3, 'Brake Crossout', 30000, 'This is a description of the Brake crossout', '8891811-brake-crosscut.jpg', 'Brakes Akebono c C'),
(12, 1, 6, 'Front suspension', 40000, 'Description of front car suspension', '20083246-multi-link-front-car-suspension-with-brake-perspective-view-photorealistic-3-d-rendering-with-morphi.jpg', 'Suspension Air Lift'),
(13, 1, 7, 'Suspension', 50000, 'Description of Suspension system', 'suspension.jpg', 'Suspension Torque'),
(14, 2, 8, 'Headlight', 10000, 'Description of Headlight', '10042065-modern-luminescent-lamp-design-of-a-car.jpg', 'Headlights Honda'),
(15, 3, 11, 'Body', 400000, 'Description of Body', '39374998-bumper-bumpers-isolated-car-auto-front-fender-parts-plastic-automobile-body.jpg', 'Body Toyota'),
(16, 4, 12, 'Engine', 1000000, 'Description of Engine', '10803093-close-up-of-gasoline-car-engine--three-valve-per-cylinder-system-lpg-converted.jpg', 'Engine Ford'),
(17, 1, 1, 'Brake system', 40000, 'This is a Description of the Brake system. ', '10559688-brake-disc.jpg', 'Brakes Brembo '),
(18, 1, 2, 'Drum Brake', 20000, 'This is a description of the Drum brake.', '1746443-system-of-drum-brake.jpg', 'Brakes AC Delco'),
(19, 1, 3, 'Brake Crossout', 30000, 'This is a description of the Brake crossout', '8891811-brake-crosscut.jpg', 'Brakes Akebono c C'),
(20, 1, 6, 'Front suspension', 40000, 'Description of front car suspension', '20083246-multi-link-front-car-suspension-with-brake-perspective-view-photorealistic-3-d-rendering-with-morphi.jpg', 'Suspension Air Lift'),
(21, 1, 7, 'Suspension', 50000, 'Description of Suspension system', 'suspension.jpg', 'Suspension Torque'),
(22, 2, 8, 'Headlight', 10000, 'Description of Headlight', '10042065-modern-luminescent-lamp-design-of-a-car.jpg', 'Headlights Honda'),
(23, 3, 11, 'Body', 400000, 'Description of Body', '39374998-bumper-bumpers-isolated-car-auto-front-fender-parts-plastic-automobile-body.jpg', 'Body Toyota'),
(24, 4, 12, 'Engine', 1000000, 'Description of Engine', '10803093-close-up-of-gasoline-car-engine--three-valve-per-cylinder-system-lpg-converted.jpg', 'Engine Ford'),
(25, 1, 1, 'Brake system', 40000, 'This is a Description of the Brake system. ', '10559688-brake-disc.jpg', 'Brakes Brembo '),
(26, 1, 2, 'Drum Brake', 20000, 'This is a description of the Drum brake.', '1746443-system-of-drum-brake.jpg', 'Brakes AC Delco'),
(27, 1, 3, 'Brake Crossout', 30000, 'This is a description of the Brake crossout', '8891811-brake-crosscut.jpg', 'Brakes Akebono c C'),
(28, 1, 6, 'Front suspension', 40000, 'Description of front car suspension', '20083246-multi-link-front-car-suspension-with-brake-perspective-view-photorealistic-3-d-rendering-with-morphi.jpg', 'Suspension Air Lift'),
(29, 1, 7, 'Suspension', 50000, 'Description of Suspension system', 'suspension.jpg', 'Suspension Torque'),
(30, 2, 8, 'Headlight', 10000, 'Description of Headlight', '10042065-modern-luminescent-lamp-design-of-a-car.jpg', 'Headlights Honda'),
(31, 3, 11, 'Body', 400000, 'Description of Body', '39374998-bumper-bumpers-isolated-car-auto-front-fender-parts-plastic-automobile-body.jpg', 'Body Toyota'),
(32, 4, 12, 'Engine', 1000000, 'Description of Engine', '10803093-close-up-of-gasoline-car-engine--three-valve-per-cylinder-system-lpg-converted.jpg', 'Engine Ford'),
(33, 1, 1, 'Brake system', 40000, 'This is a Description of the Brake system. ', '10559688-brake-disc.jpg', 'Brakes Brembo '),
(34, 1, 2, 'Drum Brake', 20000, 'This is a description of the Drum brake.', '1746443-system-of-drum-brake.jpg', 'Brakes AC Delco'),
(35, 1, 3, 'Brake Crossout', 30000, 'This is a description of the Brake crossout', '8891811-brake-crosscut.jpg', 'Brakes Akebono c C'),
(36, 1, 6, 'Front suspension', 40000, 'Description of front car suspension', '20083246-multi-link-front-car-suspension-with-brake-perspective-view-photorealistic-3-d-rendering-with-morphi.jpg', 'Suspension Air Lift'),
(37, 1, 7, 'Suspension', 50000, 'Description of Suspension system', 'suspension.jpg', 'Suspension Torque'),
(38, 2, 8, 'Headlight', 10000, 'Description of Headlight', '10042065-modern-luminescent-lamp-design-of-a-car.jpg', 'Headlights Honda'),
(39, 3, 11, 'Body', 400000, 'Description of Body', '39374998-bumper-bumpers-isolated-car-auto-front-fender-parts-plastic-automobile-body.jpg', 'Body Toyota'),
(40, 4, 12, 'Engine', 1000000, 'Description of Engine', '10803093-close-up-of-gasoline-car-engine--three-valve-per-cylinder-system-lpg-converted.jpg', 'Engine Ford'),
(41, 1, 1, 'Brake system', 40000, 'This is a Description of the Brake system. ', '10559688-brake-disc.jpg', 'Brakes Brembo '),
(42, 1, 2, 'Drum Brake', 20000, 'This is a description of the Drum brake.', '1746443-system-of-drum-brake.jpg', 'Brakes AC Delco'),
(43, 1, 3, 'Brake Crossout', 30000, 'This is a description of the Brake crossout', '8891811-brake-crosscut.jpg', 'Brakes Akebono c C'),
(44, 1, 4, 'Front suspension', 40000, 'Description of front car suspension', '20083246-multi-link-front-car-suspension-with-brake-perspective-view-photorealistic-3-d-rendering-with-morphi.jpg', 'Suspension Air Lift'),
(45, 1, 8, 'Suspension', 50000, 'Description of Suspension system', 'suspension.jpg', 'Suspension Torque'),
(46, 2, 9, 'Headlight', 10000, 'Description of Headlight', '10042065-modern-luminescent-lamp-design-of-a-car.jpg', 'Headlights Honda'),
(47, 3, 12, 'Body', 400000, 'Description of Body', '39374998-bumper-bumpers-isolated-car-auto-front-fender-parts-plastic-automobile-body.jpg', 'Body Toyota'),
(48, 4, 13, 'Engine', 1000000, 'Description of Engine', '10803093-close-up-of-gasoline-car-engine--three-valve-per-cylinder-system-lpg-converted.jpg', 'Engine Ford'),
(49, 1, 1, 'Brake system', 40000, 'This is a Description of the Brake system. ', '10559688-brake-disc.jpg', 'Brakes Brembo '),
(50, 1, 3, 'Drum Brake', 20000, 'This is a description of the Drum brake.', '1746443-system-of-drum-brake.jpg', 'Brakes AC Delco'),
(51, 1, 10, 'Brake Crossout', 30000, 'This is a description of the Brake crossout', '8891811-brake-crosscut.jpg', 'Brakes Akebono c C'),
(52, 1, 5, 'Front suspension', 40000, 'Description of front car suspension', '20083246-multi-link-front-car-suspension-with-brake-perspective-view-photorealistic-3-d-rendering-with-morphi.jpg', 'Suspension Air Lift'),
(53, 1, 6, 'Suspension', 50000, 'Description of Suspension system', 'suspension.jpg', 'Suspension Torque'),
(54, 2, 9, 'Headlight', 10000, 'Description of Headlight', '10042065-modern-luminescent-lamp-design-of-a-car.jpg', 'Headlights Honda'),
(55, 3, 13, 'Body', 400000, 'Description of Body', '39374998-bumper-bumpers-isolated-car-auto-front-fender-parts-plastic-automobile-body.jpg', 'Body Toyota'),
(56, 4, 11, 'Engine', 1000000, 'Description of Engine', '10803093-close-up-of-gasoline-car-engine--three-valve-per-cylinder-system-lpg-converted.jpg', 'Engine Ford');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_address1` text NOT NULL,
  `user_address2` text NOT NULL,
  `dateCreated` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `f_name`, `l_name`, `gender`, `user_password`, `user_email`, `user_address1`, `user_address2`, `dateCreated`) VALUES
(1, 'Victory', 'Efedjarho', 'Female', 'efe', 'efedjarhovictory@gmail.com', 'No 2 Pinnacle close off Refinery road Effurun, Delta State, Nigeria.', 'No 6 Okotie Avenue opp. Agofure yard, Agbarho, Delta State, Nigeria.', '2017-06-28 13:57:30');

}
    
    
    
    
    
    
    /*
    
    $query = "CREATE TABLE IF NOT EXISTS `users` (`User_ID` int(11) NOT NULL AUTO_INCREMENT,`User_Name` varchar(50) NOT NULL, `Username` varchar(50) NOT NULL,`User_Password` varchar(50) NOT NULL,`User_Email` varchar(100) NOT NULL,`User_Address` text NOT NULL, `Role` INT NOT NULL,`DateCreated` TIMESTAMP NOT NULL, PRIMARY KEY (`User_ID`))";
    $con -> query($query);

    $query1 = "CREATE TABLE IF NOT EXISTS `producttable` (
                `Prod_ID` INT NOT NULL AUTO_INCREMENT ,
                `Prod_Name` TEXT NOT NULL ,
                `Prod_Desc` TEXT NOT NULL ,
                `Cat_ID` INT NOT NULL ,
                `Prod_Qty` INT NOT NULL ,
                `Prod_Price` DECIMAL NOT NULL ,
                `Prod_Image` TEXT NOT NULL,
                `DateCreated` TIMESTAMP NOT NULL ,
                PRIMARY KEY ( `Prod_ID` )
                );";
    mysqli_query($con,$query1);


    $query2 = "CREATE TABLE IF NOT EXISTS `ordertable` (
            `Ord_ID` INT NOT NULL AUTO_INCREMENT ,
            `Prod_ID` INT NOT NULL ,
            `User_ID` INT NOT NULL ,
            `Ord_Qty` INT NOT NULL ,
            `Ord_TotalPrice` DECIMAL NOT NULL ,
            `Sta_ID` INT NOT NULL ,
            `DateCreated` TIMESTAMP NOT NULL,
            PRIMARY KEY ( `Ord_ID` ),
            FOREIGN KEY FK_O_prod(`Prod_ID`) REFERENCES producttable(`Prod_ID`),
            FOREIGN KEY FK_O_user(`User_ID`) REFERENCES users(`User_ID`),
            FOREIGN KEY FK_O_sta(`Sta_ID`) REFERENCES statustable(`Sta_ID`)
            );";
    mysqli_query($con,$query2);

    $query3 = "CREATE TABLE IF NOT EXISTS `feedbacktable` (
            `feed_ID` INT NOT NULL AUTO_INCREMENT ,
            `feed_Title` VARCHAR( 40 ) NOT NULL ,
            `feed_Desc` TEXT NOT NULL ,
            `User_ID` INT NOT NULL ,
            `Prod_ID` INT NOT NULL ,
            `DateCreated` TIMESTAMP NOT NULL,
            PRIMARY KEY ( `feed_ID` ),
            FOREIGN KEY FK_F_user(`User_ID`) REFERENCES users(`User_ID`),
            FOREIGN KEY FK_F_prod(`Prod_ID`) REFERENCES producttable(`Prod_ID`)
            );";
    mysqli_query($con,$query3);

    $query4 = "CREATE TABLE IF NOT EXISTS `statustable` (
            `Sta_ID` INT NOT NULL AUTO_INCREMENT ,
            `Sta_Name` VARCHAR( 25 ) NOT NULL ,
            `DateCreated` TIMESTAMP NOT NULL,
            PRIMARY KEY ( `Sta_ID` ));";
    mysqli_query($con,$query4);
}
