-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 25, 2013 at 03:20 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vcp279`
--
CREATE DATABASE IF NOT EXISTS `vcp279` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `vcp279`;

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE IF NOT EXISTS `equipment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serialNo` varchar(255) NOT NULL,
  `addedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(128) NOT NULL,
  `description` varchar(512) DEFAULT NULL,
  `status` enum('rented','repair','inactive','available') NOT NULL DEFAULT 'available',
  `rentedTo` varchar(128) DEFAULT 'available',
  `type` enum('camera','video camera','lighting','accessory') NOT NULL DEFAULT 'camera',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `serialNo`, `addedDate`, `name`, `description`, `status`, `rentedTo`, `type`) VALUES
(1, '002ws5xj7', '2013-10-10 21:06:53', 'camera one', 'This is a sweet camera', 'available', 'available', 'camera'),
(2, '45t7s5rj7', '2013-10-10 21:07:42', 'camera two', 'This is also a sweet camera', 'available', 'available', 'camera'),
(7, 'fg56xj2', '2013-10-19 20:01:17', 'Video Camera One', 'This is the first video camera!', 'available', 'available', 'video camera'),
(8, 'vf59q4', '2013-10-19 20:01:56', 'Video Camera Two', '										This is the second video camera!								', 'repair', 'available', 'video camera');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` varchar(128) DEFAULT NULL,
  `type` enum('Admin','Frontend','Student') NOT NULL DEFAULT 'Student',
  `status` enum('active','disabled') NOT NULL DEFAULT 'active',
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `zip` int(9) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(64) NOT NULL DEFAULT 'password',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `studentid`, `type`, `status`, `firstname`, `lastname`, `address1`, `address2`, `zip`, `email`, `password`) VALUES
(1, '00001', 'Admin', 'active', 'David', 'Herscher', '122 Gladstone Way', 'Newark DE', 17702, 'heer3906@chawk.cecil.edu', '4a23157209c98d318b78ee5678758df4'),
(2, '00002', 'Student', 'active', 'Bruce', 'Lee', '441 Madstone Dr', 'Newark DE', 17702, 'brucelee@karate.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(3, '00003', 'Student', 'active', 'Chuck', 'Norris', '356 Poopy Ct', 'Newark DE', 17702, 'walker@texaxranger.com', ''),
(4, '45789', 'Frontend', 'active', 'Johny', 'Appleseed', '123 orchard way', 'Newark De', 19702, 'johny@appleseed.com', ''),
(6, NULL, 'Student', 'active', 'Aaron', 'Weber', '122 Gladstone Way', 'Newark De', 19702, 'aaron@karate.com', ''),
(7, '', 'Frontend', 'active', 'Vcp', 'Admin', '', '', 19702, 'vcpadmin@vcp.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(10, '123', 'Student', 'active', 'Test', 'Registration', '122 Gladstone Way', 'Bear De', 19702, 'test@register.com', '482c811da5d5b4bc6d497ffa98491e38');

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE IF NOT EXISTS `rentals` (
  `rental_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_due` date NOT NULL,
  `rental_status` enum('out','returned') CHARACTER SET utf8 NOT NULL,
  `notes` varchar(512) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`rental_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
