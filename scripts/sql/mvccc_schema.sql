-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 05, 2014 at 06:43 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mvccc`
--
CREATE DATABASE IF NOT EXISTS `mvdb1` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `mvdb1`;

-- --------------------------------------------------------

--
--
--
CREATE TABLE IF NOT EXISTS `Persons`
(
  PId int NOT NULL AUTO_INCREMENT,
  PName varchar(255) NOT NULL UNIQUE,
  PRIMARY KEY (PId)
);

-- --------------------------------------------------------


--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` mediumint(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `content` varchar(5000) COLLATE utf8_bin DEFAULT NULL,
  `category` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `event_tag`
--

CREATE TABLE IF NOT EXISTS `event_tag` (
  `id` mediumint(11) NOT NULL AUTO_INCREMENT,
  `event_id` mediumint(11) NOT NULL,
  `tag_id` mediumint(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tag_id` (`tag_id`),
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` mediumint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_tag`
--
ALTER TABLE `event_tag`
  ADD CONSTRAINT `FK_TAG` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_EVENT` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;