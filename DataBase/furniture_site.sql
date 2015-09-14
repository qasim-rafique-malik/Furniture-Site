-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2015 at 11:05 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `furniture_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
`id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(255) NOT NULL,
  `admin_status` enum('Active','Inacitve') DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `first_name`, `last_name`, `email`, `password`, `role_id`, `admin_status`) VALUES
(1, 'Qasim', 'Rafique', 'qasim.online.now@gmail.com', '123456', 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `admin_role`
--

CREATE TABLE IF NOT EXISTS `admin_role` (
`id` int(11) NOT NULL,
  `admin_role` enum('Superadmin','Subadmin') DEFAULT 'Subadmin',
  `role_status` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_role`
--

INSERT INTO `admin_role` (`id`, `admin_role`, `role_status`) VALUES
(1, 'Superadmin', 'Active'),
(2, 'Subadmin', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_admin_role` (`role_id`);

--
-- Indexes for table `admin_role`
--
ALTER TABLE `admin_role`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admin_role`
--
ALTER TABLE `admin_role`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_login`
--
ALTER TABLE `admin_login`
ADD CONSTRAINT `fk_admin_role` FOREIGN KEY (`role_id`) REFERENCES `admin_role` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
