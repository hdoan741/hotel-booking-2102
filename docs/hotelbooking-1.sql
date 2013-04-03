-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 03, 2013 at 06:10 AM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hotelbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `customer` varchar(128) DEFAULT NULL,
  `num_child` int(11) DEFAULT NULL,
  `num_adult` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `start_date`, `end_date`, `customer`, `num_child`, `num_adult`) VALUES
(8, '2013-03-07 00:00:00', '2013-03-14 00:00:00', 'aaa', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE IF NOT EXISTS `features` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`, `description`) VALUES
(1, 'a', 'a'),
(2, 'b', 'bbb'),
(3, 'b', 'bbb'),
(4, 'b', 'bbb');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE IF NOT EXISTS `hotels` (
  `name` varchar(256) DEFAULT NULL,
  `location` varchar(256) DEFAULT NULL,
  `hotel_code` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`hotel_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotels`
--


-- --------------------------------------------------------

--
-- Table structure for table `hotel_feature`
--

CREATE TABLE IF NOT EXISTS `hotel_feature` (
  `hotel_code` varchar(20) NOT NULL DEFAULT '',
  `feature_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`hotel_code`,`feature_id`),
  KEY `feature_id` (`feature_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotel_feature`
--


-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `login_attempts`
--


-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `version` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(2);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `room_code` int(11) NOT NULL AUTO_INCREMENT,
  `num_bed` int(11) DEFAULT NULL,
  `comfort_level` varchar(256) DEFAULT NULL,
  `hotel_code` varchar(20) NOT NULL DEFAULT '',
  `max_capacity` int(11) DEFAULT NULL,
  `fee` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`room_code`,`hotel_code`),
  KEY `hotel_code` (`hotel_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rooms`
--


-- --------------------------------------------------------

--
-- Table structure for table `room_booking`
--

CREATE TABLE IF NOT EXISTS `room_booking` (
  `room_code` int(11) NOT NULL,
  `hotel_code` varchar(20) NOT NULL DEFAULT '',
  `booking_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`room_code`,`hotel_code`,`booking_id`),
  KEY `booking_id` (`booking_id`),
  KEY `room_booking_ibfk_2` (`hotel_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_booking`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `card_no` varchar(256) DEFAULT NULL,
  `user_type` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `address`, `card_no`, `user_type`) VALUES
(1, '2130706433', 'administrator', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1364483121, 1, 'Admin', 'istrator', 'ADMIN', '0', NULL, NULL, NULL),
(2, '', '', 'a', '', 'a', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'a', 'a', NULL, 'a', 'a', '', 1),
(3, '', '', 'a', '', 'a', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'a', 'a', NULL, 'a', 'a', '', 1),
(4, '', '', 'a', '', 'a', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'a', 'a', NULL, 'a', 'a', '', 1),
(5, '', '', 'a', '', 'a', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'a', 'a', NULL, 'a', 'a', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotel_feature`
--
ALTER TABLE `hotel_feature`
  ADD CONSTRAINT `hotel_feature_ibfk_1` FOREIGN KEY (`hotel_code`) REFERENCES `hotels` (`hotel_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hotel_feature_ibfk_2` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`hotel_code`) REFERENCES `hotels` (`hotel_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room_booking`
--
ALTER TABLE `room_booking`
  ADD CONSTRAINT `room_booking_ibfk_1` FOREIGN KEY (`room_code`) REFERENCES `rooms` (`room_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_booking_ibfk_2` FOREIGN KEY (`hotel_code`) REFERENCES `rooms` (`hotel_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_booking_ibfk_3` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
