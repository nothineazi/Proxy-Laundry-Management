-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 02, 2018 at 03:11 PM
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
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `phone`, `email`, `password`) VALUES
(1, 'Ahmad', '07089392879', 'ahmad@gmail.com', '$2y$10$L7Y.n6tZKhsAabIMCithmOX8J/CkZe7TaNFBXNFGNllf28kBsSCuy'),
(2, 'Ashir', '07089392879', 'ashir@gmail.com', '$2y$10$Zh/X9VphNODz4PvZ8c/o6OZeRZNAIZsTJYo2X5DtKQz8MmPKFH6PS'),
(3, 'Ashir', '07089392879', 'ashir@gmail.com', '$2y$10$Zh/X9VphNODz4PvZ8c/o6OZeRZNAIZsTJYo2X5DtKQz8MmPKFH6PS');

-- --------------------------------------------------------

--
-- Table structure for table `clothe`
--

DROP TABLE IF EXISTS `clothe`;
CREATE TABLE IF NOT EXISTS `clothe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `customer` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clothe`
--

INSERT INTO `clothe` (`id`, `type`, `customer`, `status`, `image`) VALUES
(1, 'Men wears', 3, 'Pending', '1543692427.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(70) NOT NULL,
  `status` varchar(10) NOT NULL,
  `password` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `phone`, `email`, `status`, `password`) VALUES
(1, 'Ashir', '07089392879', 'ashir@gmail.com', 'Active', '$2y$10$h0DWf043kBeLoD8FvIBfNu4zmNCGa12p5I77lcilJuRJv5fz6nL8a'),
(3, 'Ahmad', '07089392879', 'ahmad@gmail.com', 'Active', '$2y$10$JRw.Db0UZflgN1pzI4KPN.zcnIPwJjF8b1dkHThEGqgevskEDTZo2');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

DROP TABLE IF EXISTS `customer_order`;
CREATE TABLE IF NOT EXISTS `customer_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(25) NOT NULL,
  `clothe` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  `date` date NOT NULL,
  `service` int(11) NOT NULL,
  `mode` varchar(50) NOT NULL,
  `cost` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `status`, `clothe`, `admin`, `date`, `service`, `mode`, `cost`) VALUES
(1, 'Pending', 1, 1, '2018-12-01', 4, 'Home Delivery', '400');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer` int(11) DEFAULT NULL,
  `outstanding` varchar(100) DEFAULT '0',
  `amount` varchar(100) DEFAULT '0',
  `admin` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `customer`, `outstanding`, `amount`, `admin`, `date`) VALUES
(1, 1, '0', '0', 2, '2018-12-01'),
(2, 1, '0', '0', NULL, NULL),
(3, 3, '0', '400', 2, '2018-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  `cost` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`, `cost`) VALUES
(1, 'warshing', '200'),
(2, 'ironing', '50'),
(3, 'Washing and Ironing', '200'),
(4, 'Washing and Ironing and Stach', '400'),
(5, '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
