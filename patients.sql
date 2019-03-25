-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 23, 2019 at 11:21 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patients`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `Id` int(100) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` bigint(100) NOT NULL,
  `doctor` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`Id`, `fname`, `lname`, `email`, `contact`, `doctor`, `date`, `time`) VALUES
(12, 'Agrawal', 'Karan', 'agrawalkaran929@gmail.com', 8732993613, 'Dr. Karan Agrawal For Cardiologist', '2019-03-22', '8:00 to 8:30'),
(13, 'Agrawal', 'Karan', 'agrawalkaran929@gmail.com', 8732993613, 'Dr. Karan Agrawal For Cardiologist', '2019-03-22', '8:00 to 8:30'),
(14, 'Agrawal', 'Karan', 'agrawalkaran929@gmail.com', 8200937518, 'Dr. Karan Agrawal For Cardiologist', '2019-03-22', '8:00 to 8:30'),
(15, 'Agrawal', 'Karan', 'agrawalkaran929@gmail.com', 8732993613, 'Dr. Vedant Soni For Orthopedic', '2019-03-22', '8:00 to 8:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `Id` int(50) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `password_two` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `fname`, `lname`, `email`, `user`, `password`, `password_two`) VALUES
(2, 'assd', 'asds', 'qwewe@gmail.com', 'asder', 'qwerty', 'qwerty'),
(17, 'agrawal', 'karan', 'agrawalkaran@gmail.com', 'agkaran', '123456', '123456'),
(18, 'aasd', 'asddasd', 'asdasd@gmail.com', 'asdasd', '123456', '123456'),
(19, 'agrawa', 'jkarar', 'agra@gmail.com', 'asdfg', '123456', '123456');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
