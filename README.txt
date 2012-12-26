{\rtf1\ansi\ansicpg1252\cocoartf1187\cocoasubrtf340
{\fonttbl\f0\fswiss\fcharset0 Helvetica;}
{\colortbl;\red255\green255\blue255;}
\margl1440\margr1440\vieww10800\viewh8400\viewkind0
\pard\tx720\tx1440\tx2160\tx2880\tx3600\tx4320\tx5040\tx5760\tx6480\tx7200\tx7920\tx8640\pardirnatural

\f0\fs24 \cf0 -- phpMyAdmin SQL Dump\
-- version 3.4.11.1\
-- http://www.phpmyadmin.net\
--\
-- Host: engr-cpanel-mysql.engr.illinois.edu\
-- Generation Time: Oct 26, 2012 at 12:40 AM\
-- Server version: 5.1.61\
-- PHP Version: 5.2.6\
\
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";\
SET time_zone = "+00:00";\
\
\
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;\
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;\
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;\
/*!40101 SET NAMES utf8 */;\
\
--\
-- Database: `npanta2_comments`\
--\
\
-- --------------------------------------------------------\
\
--\
-- Table structure for table `threaded_comments`\
--\
\
CREATE TABLE IF NOT EXISTS `threaded_comments` (\
  `Index` int(11) NOT NULL AUTO_INCREMENT,\
  `UserName` varchar(20) NOT NULL,\
  `Comment` text NOT NULL,\
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,\
  `ParentNode` int(11) NOT NULL DEFAULT '0',\
  PRIMARY KEY (`Index`)\
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;\
\
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;\
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;\
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;\
}