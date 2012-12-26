-- phpMyAdmin SQL Dump
-- version 3.4.11.1
-- http://www.phpmyadmin.net
--
-- Host: engr-cpanel-mysql.engr.illinois.edu
-- Generation Time: Oct 26, 2012 at 08:54 AM
-- Server version: 5.1.61
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `npanta2_badwords`
--

-- --------------------------------------------------------

--
-- Table structure for table `word_list`
--

CREATE TABLE IF NOT EXISTS `word_list` (
  `Index` int(11) NOT NULL AUTO_INCREMENT,
  `Bad` varchar(200) NOT NULL,
  `Replace` varchar(200) NOT NULL,
  PRIMARY KEY (`Index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `word_list`
--

INSERT INTO `word_list` (`Index`, `Bad`, `Replace`) VALUES
(1, 'damn', 'darn'),
(2, 'fuck', 'flowers'),
(3, 'dick', 'butkus'),
(4, 'ass', 'donkey kong'),
(5, 'bitch', 'lady of evil'),
(6, 'shit', 'poop');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
