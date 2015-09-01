-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Apr 14, 2014 at 09:56 PM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mysql`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentID` int(100) NOT NULL AUTO_INCREMENT,
  `questionID` int(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`commentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentID`, `questionID`, `username`, `comment`) VALUES
(20, 8, 'jennie', 'salads!');

-- --------------------------------------------------------

--
-- Table structure for table `discussions`
--

CREATE TABLE `discussions` (
  `questionID` int(100) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `topic` text NOT NULL,
  PRIMARY KEY (`questionID`),
  UNIQUE KEY `questionID` (`questionID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `discussions`
--

INSERT INTO `discussions` (`questionID`, `question`, `username`, `topic`) VALUES
(7, 'who''s running in the 2016 POTS election?', 'jon', 'news'),
(8, 'what''re some healthy lunch options?', 'jon', 'lifestyle'),
(9, 'who''s justin bieber?', 'jennie', 'media');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`) VALUES
('jennie', 'password', 'jennie@usc.edu'),
('jon', 'password', 'jon@usc.edu'),
('calvin', 'hi', 'hi@hi.com'),
('eric', 'password', 'eric@usc.edu'),
('joey', 'password', 'joey@joey.com'),
('himynameis', 'password', 'hi@hi.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
