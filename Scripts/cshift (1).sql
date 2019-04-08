-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 04, 2019 at 07:30 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cshift`
--

-- --------------------------------------------------------

--
-- Table structure for table `cshift`
--

DROP TABLE IF EXISTS `cshift`;
CREATE TABLE IF NOT EXISTS `cshift` (
  `shift_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) DEFAULT NULL,
  `Period` varchar(10) NOT NULL,
  `PDay` varchar(10) NOT NULL,
  `Timing` varchar(10) NOT NULL,
  PRIMARY KEY (`shift_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cshift`
--

INSERT INTO `cshift` (`shift_id`, `employee_id`, `Period`, `PDay`, `Timing`) VALUES
(1, 5, '20190101', 'Friday', 'Afternoon'),
(2, 6, '20190101', 'Thursday', 'Afternoon'),
(3, 5, '20190101', 'Friday', 'Afternoon'),
(4, 6, '20190101', 'Thursday', 'Afternoon'),
(5, 5, '20190101', 'Friday', 'Afternoon'),
(6, 6, '20190101', 'Thursday', 'Afternoon'),
(7, 5, '20190101', 'Friday', 'Afternoon'),
(8, 6, '20190101', 'Thursday', 'Afternoon'),
(9, 5, '20190101', 'Friday', 'Morning'),
(10, 5, '20190101', 'Friday', 'Afternoon'),
(11, 6, '20190101', 'Thursday', 'Afternoon'),
(12, 5, '20190101', 'Friday', 'Afternoon'),
(13, 6, '20190101', 'Thursday', 'Afternoon');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
