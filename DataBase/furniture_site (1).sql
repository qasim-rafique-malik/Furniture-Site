-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2015 at 01:32 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(125) NOT NULL,
  `name` varchar(125) NOT NULL,
  `description` text,
  `image` text,
  `create_date` date DEFAULT NULL,
  `last_modified` date DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `create_date`, `last_modified`, `status`) VALUES
(12, 'name33eeee', 'test', 'category/original/2748slider-image3.png', '2015-09-16', '2015-09-17', 'Active'),
(13, 'asdfasd', 'asdfasdf', 'category/original/4763slider-img-4.jpg', '2015-09-17', '2015-09-17', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `cat_pro_xref`
--

CREATE TABLE IF NOT EXISTS `cat_pro_xref` (
`id` int(125) NOT NULL,
  `category_id` int(125) NOT NULL,
  `product_id` int(125) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat_pro_xref`
--

INSERT INTO `cat_pro_xref` (`id`, `category_id`, `product_id`) VALUES
(3, 12, 8),
(12, 12, 12),
(13, 13, 12);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
`id` int(125) NOT NULL,
  `address` text,
  `email` text,
  `phone` text
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `address`, `email`, `phone`) VALUES
(3, 'asdfasd', 'asdfasd', 'asdfasdf');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(125) NOT NULL,
  `name` varchar(125) NOT NULL,
  `code` varchar(125) NOT NULL,
  `price` int(125) NOT NULL,
  `description` text,
  `image` text,
  `create_date` date DEFAULT NULL,
  `last_modified` date DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `price`, `description`, `image`, `create_date`, `last_modified`, `status`) VALUES
(8, 'asdfasdf', 'asdfasdf', 0, 'asdfasdf', '', '2015-09-17', '2015-09-17', 'Active'),
(12, 'name ', '3307', 45, 'erererer', 'product/original/7428slider_img_1.png', '2015-09-17', '2015-09-17', 'Active');

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat_pro_xref`
--
ALTER TABLE `cat_pro_xref`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_cat_id` (`category_id`), ADD KEY `fk_pro_id` (`product_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(125) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `cat_pro_xref`
--
ALTER TABLE `cat_pro_xref`
MODIFY `id` int(125) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
MODIFY `id` int(125) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(125) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_login`
--
ALTER TABLE `admin_login`
ADD CONSTRAINT `fk_admin_role` FOREIGN KEY (`role_id`) REFERENCES `admin_role` (`id`);

--
-- Constraints for table `cat_pro_xref`
--
ALTER TABLE `cat_pro_xref`
ADD CONSTRAINT `fk_cat_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
ADD CONSTRAINT `fk_pro_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
