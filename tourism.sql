-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2016 at 02:36 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tourism`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `country` varchar(250) NOT NULL,
  `tour_package` varchar(250) NOT NULL,
  `person_no` varchar(250) NOT NULL,
  `payment_method` varchar(250) NOT NULL,
  `acc_number` int(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `trash_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `name`, `email`, `gender`, `phone`, `address`, `country`, `tour_package`, `person_no`, `payment_method`, `acc_number`, `password`, `trash_at`) VALUES
(4, 'a', 'a@g.com', 'Female', '1812974410', 'East madarbar', 'Bangladesh', 'Alaska', '5', 'Bkash', 123456798, '123', '1470592128'),
(8, 'Irin Sultana Mukta', 'sumonsbgc@gmail.com', 'Female', '1515000000', '112, East Madarbari, Mazirghat Road, Ward No:30, PO:sadar-4000', 'Bangladesh', 'Alaska', '3', 'Bkash', 1812974410, '00000', NULL),
(9, 'Mohammad Sumon', 'sumon@yahoo.com', 'Male', '1515000000', 'SSSSSSSSSS uuuuuuuuuu MMMMMMMM oooooooo NNNNNNN', 'Bangladesh', 'Alabama', '2', 'Bkash', 1813937494, 'aaaaa', NULL),
(10, 'Sumon', 'sumon@yahoo.com', 'Male', '1515000000', 'fasdfsdaa jlfkadfjlk', 'Bangladesh', 'Alabama', '3', 'Bkash', 2147483647, 'aaaaaa', NULL),
(11, 'Sumon', 'sumonsbgc@gmail.com', '', '1812974410', 'sss', 'BD', 'Package One', '3', 'Bkash', 1516120343, 'abc', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone_no` int(250) NOT NULL,
  `subject` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone_no`, `subject`) VALUES
(1, 'Mohammad Sumon', 'sumonsbgc@gmail.com', 1812974410, 'Subjet ');

-- --------------------------------------------------------

--
-- Table structure for table `img_package`
--

CREATE TABLE IF NOT EXISTS `img_package` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `package_id` int(250) NOT NULL,
  `img_name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `img_package`
--

INSERT INTO `img_package` (`id`, `package_id`, `img_name`) VALUES
(2, 2, '146981937317.jpg'),
(3, 3, '1469980047Penguins.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `img_post`
--

CREATE TABLE IF NOT EXISTS `img_post` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `post_id` int(250) NOT NULL,
  `img_post` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `img_post`
--

INSERT INTO `img_post` (`id`, `post_id`, `img_post`) VALUES
(1, 1, '1469995678grids-img2.jpg'),
(2, 2, '1470758795grids-img1.jpg'),
(3, 3, '1470759023slider4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `tour_place` varchar(250) NOT NULL,
  `tour_location` varchar(250) NOT NULL,
  `hotel_name` varchar(250) NOT NULL,
  `duration` varchar(250) NOT NULL,
  `vehicle` varchar(250) NOT NULL,
  `package_cost` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `title`, `tour_place`, `tour_location`, `hotel_name`, `duration`, `vehicle`, `package_cost`) VALUES
(2, 'Package One', 'Rangamati', 'Rangamati,CTG', 'yang min', '4 days', 'Bus', '3000'),
(3, 'Package Two', 'Sundarban', 'Khulna, Sundarban', 'Mirang', '3 days 2 days', 'Air Plan', '10000');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `img_name` varchar(250) NOT NULL,
  `trash_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `title`, `content`, `img_name`, `trash_at`) VALUES
(1, 'Home', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoconsequat. Duis aute irure dolo', '1469989781Lighthouse.jpg', NULL),
(2, 'About Us', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoconsequat. Duis aute irure dolo Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoconsequat. Duis aute irure dolo Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoconsequat. Duis aute irure dolo Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoconsequat. Duis aute irure dolo ', '1470955284cropper.jpg', NULL),
(3, 'Packages', '', '1470754164', NULL),
(4, 'Booking', '', '1470754357No title.jpg', NULL),
(5, 'Contact Us', '', '1470754403download.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `content` varchar(250) NOT NULL,
  `category` varchar(250) NOT NULL,
  `trash_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `category`, `trash_at`) VALUES
(1, 'Destination', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoconsequat. Duis aute irure dolo', 'thumbnail', NULL),
(2, 'NEWS & EVENTS', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet obcaecati eos sunt consequuntur, dolore adipisci voluptatibus, aut tenetur aliquam alias nisi voluptas molestiae, dignissimos suscipit ab esse praesentium facere. Dicta?', 'thumbnail', NULL),
(3, 'Support', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet obcaecati eos sunt consequuntur, dolore adipisci voluptatibus, aut tenetur aliquam alias nisi voluptas molestiae, dignissimos suscipit ab esse praesentium facere. Dicta?', 'thumbnail', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `total_amount`
--

CREATE TABLE IF NOT EXISTS `total_amount` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `booking_id` int(250) NOT NULL,
  `is_paid` varchar(250) DEFAULT NULL,
  `total_amount` int(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `user_name`, `email`, `password`, `date`) VALUES
(1, 'Mohammad', 'sumonsbgc', 'sumonsbgc@gmail.com', '202cb962ac59075b964b07152d234b70', '2016-08-11');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
