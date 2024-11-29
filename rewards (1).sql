-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 29, 2024 at 08:46 PM
-- Server version: 8.3.0
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rewards`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `account_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `account_type` varchar(100) DEFAULT NULL,
  `points` int DEFAULT NULL,
  PRIMARY KEY (`account_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `user_id`, `account_type`, `points`) VALUES
(1, 1, 'Standard', 400),
(2, 2, 'Premium', 1800),
(3, 3, 'Standard', 500),
(4, 4, 'Premium', 1500),
(5, 5, 'Standard', 800);

-- --------------------------------------------------------

--
-- Table structure for table `giftcard`
--

DROP TABLE IF EXISTS `giftcard`;
CREATE TABLE IF NOT EXISTS `giftcard` (
  `card_id` int NOT NULL AUTO_INCREMENT,
  `card_name` varchar(100) DEFAULT NULL,
  `card_type` varchar(100) DEFAULT NULL,
  `card_value` float DEFAULT NULL,
  `points` int DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`card_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `giftcard`
--

INSERT INTO `giftcard` (`card_id`, `card_name`, `card_type`, `card_value`, `points`, `image_path`) VALUES
(1, 'Standard Gift Card 1', 'Modern', 250, 900, 'images/image2.jpg'),
(2, 'Standard Gift Card 2', 'Standard', 50, 100, 'images/image3.jpg'),
(3, 'Standard Gift Card 3', 'Standard', 50, 100, 'images/image2.jpg'),
(4, 'Standard Gift Card 4', 'Standard', 50, 100, 'images/image3.jpg'),
(5, 'Standard Gift Card 5', 'Standard', 50, 100, 'images/image2.jpg'),
(6, 'Premium Gift Card 1', 'Premium', 100, 200, 'images/image3.jpg'),
(7, 'Premium Gift Card 2', 'Premium', 100, 200, 'images/image2.jpg'),
(8, 'Premium Gift Card 3', 'Premium', 100, 200, 'images/image3.jpg'),
(9, 'Premium Gift Card 4', 'Premium', 100, 200, 'images/image2.jpg'),
(10, 'Premium Gift Card 5', 'Premium', 100, 200, 'images/image3.jpg'),
(11, 'Limited Edition Gift Card 1', 'Limited', 250, 500, 'images/image2.jpg'),
(12, 'Limited Edition Gift Card 2', 'Limited', 250, 500, 'images/image3.jpg'),
(13, 'Limited Edition Gift Card 3', 'Limited', 250, 500, 'images/image2.jpg'),
(14, 'Limited Edition Gift Card 4', 'Limited', 250, 500, 'images/image3.jpg'),
(15, 'Limited Edition Gift Card 5', 'Limited', 250, 500, 'images/image2.jpg'),
(16, 'Holiday Gift Card 1', 'Seasonal', 75, 150, 'images/image3.jpg'),
(17, 'Holiday Gift Card 2', 'Seasonal', 75, 150, 'images/image2.jpg'),
(18, 'Holiday Gift Card 3', 'Seasonal', 75, 150, 'images/image3.jpg'),
(19, 'Birthday Gift Card 1', 'Seasonal', 50, 100, 'images/image2.jpg'),
(20, 'Birthday Gift Card 2', 'Seasonal', 50, 100, 'images/image3.jpg'),
(21, 'Celebration Card', 'Standard', 200, 500, 'images/image2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `redemption`
--

DROP TABLE IF EXISTS `redemption`;
CREATE TABLE IF NOT EXISTS `redemption` (
  `redeemId` int NOT NULL AUTO_INCREMENT,
  `date` varchar(100) NOT NULL,
  `accountId` int NOT NULL,
  `cardId` int NOT NULL,
  `pointsRedeemed` int NOT NULL,
  PRIMARY KEY (`redeemId`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `redemption`
--

INSERT INTO `redemption` (`redeemId`, `date`, `accountId`, `cardId`, `pointsRedeemed`) VALUES
(1, '2024-11-29', 1, 1, 1500),
(2, '2024-11-28', 2, 2, 2000),
(3, '2024-11-27', 3, 3, 500),
(4, '2024-11-26', 4, 4, 750),
(5, '2024-11-25', 5, 5, 1200),
(6, '2024-11-24', 6, 6, 1800),
(7, '2024-11-23', 7, 7, 2500),
(8, '2024-11-22', 8, 8, 3000),
(9, '2024-11-21', 9, 9, 1000),
(10, '2024-11-20', 10, 10, 2200),
(11, '2024-11-29 13:40:39', 1, 2, 100),
(12, '2024-11-29 13:42:02', 1, 4, 100),
(13, '2024-11-29 13:42:08', 1, 4, 100),
(14, '2024-11-29 13:42:10', 1, 4, 100),
(15, '2024-11-29 13:42:13', 1, 4, 100),
(16, '2024-11-29 13:42:15', 1, 4, 100),
(17, '2024-11-29 13:45:06', 2, 10, 200);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `username`, `role`) VALUES
(1, 'bsmith', 'admin'),
(2, 'pjones', 'customer'),
(3, 'Rkclev18', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int NOT NULL AUTO_INCREMENT,
  `forename` varchar(128) NOT NULL,
  `surname` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `forename`, `surname`, `username`, `password`) VALUES
(1, 'Bill', 'Smith', 'bsmith', '$2y$10$1JZ.JEFMwbQV4IQBRBA4xOEttL8ZNbZX4Ujfp95HcwbnrgCz/KA4S'),
(2, 'Pauline', 'Jones', 'pjones', '$2y$10$ZTQddN7PweZRx13/vX/ti.EG2NlgdeQkDODJsBpQuFakTBwF5RLV2'),
(3, 'Ryan ', 'Cleverly', 'Rkclev18', '$2y$10$ibsVIQxiDLmtUdByE1Tyl.fhhZ0YkhrWF8/tQX1.6u4rCHU.7PEgS');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
