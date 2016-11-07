-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2016 at 05:49 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `acceptvisitor`
--

CREATE TABLE IF NOT EXISTS `acceptvisitor` (
  `accept_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_no` int(11) NOT NULL,
  `deadname` varchar(200) NOT NULL,
  `visname` varchar(200) NOT NULL,
  `visnic` varchar(15) NOT NULL,
  `relation` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`accept_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `acceptvisitor`
--

INSERT INTO `acceptvisitor` (`accept_id`, `msg_no`, `deadname`, `visname`, `visnic`, `relation`, `message`) VALUES
(1, 11, 'sdfadsf', 'asdfds', '942900171V', 'sfsdfsd', 'sdfsdfsdfsd'),
(2, 16, 'sdfadsf', 'asdfds', '942900171V', 'sfsdfsd', 'sdfsdfsdfsd'),
(5, 1, 'thurunu', 'amila', '9123455V', 'friend', 'aneeee maye thurunuwooo ai uba dala giyeeee');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `cusname` varchar(30) DEFAULT NULL,
  `deadname` varchar(30) DEFAULT NULL,
  `connumber` int(11) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `repassword` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`no`, `cusname`, `deadname`, `connumber`, `email`, `gender`, `password`, `repassword`, `dob`) VALUES
(1, 'sfa', 'xcb', 0, 'ROSHSADK@GMAIL.COM', 'male', 'cbx', 'cbx', '0000-00-00'),
(2, 'we', 'we', 0, 'ROSHSADK@GMAIL.COM', 'male', 'we', 'we', '0000-00-00'),
(3, 'asd', 'asd', 710416774, 'ROSHSADK@GMAIL.COM', 'male', 'asd', 'asd', '0000-00-00'),
(4, 'a', 'l', 712229473, 'ROSHSADK@GMAIL.COM', 'male', 'l', 'l', '0000-00-00'),
(5, 'a', 'l', 712229473, 'ROSHSADK@GMAIL.COM', 'male', 'l', 'l', '0000-00-00'),
(6, 'a', 'l', 712229473, 'ROSHSADK@GMAIL.COM', 'male', 'l', 'l', '0000-00-00'),
(7, 'a', 'l', 712229473, 'ROSHSADK@GMAIL.COM', 'male', 'l', 'l', '0000-00-00'),
(8, 'a', 'l', 712229473, 'ROSHSADK@GMAIL.COM', 'male', 'l', 'l', '0000-00-00'),
(9, 'a', 'l', 712229473, 'ROSHSADK@GMAIL.COM', 'male', 'l', 'l', '2014-01-01'),
(10, 'kasun', 'ama', 702034567, 'klakmal@gmail.com', 'female', '123', '123', '2016-01-01'),
(11, 'ssasa', 'asdasdasdsdasd', 2147483647, 'ROSHSADK@GMAIL.COM', 'male', 'asd', 'asd', '1994-08-14'),
(12, 'Roshan', 'man', 766396770, 'roshanmw88@gmail.com', 'male', '12345678', '12345678', '1991-07-22'),
(13, 'hjhjhh', '.m.mm', 98, 'sdfsdsfd@ymail.com', 'male', '17', '17', '2013-11-22'),
(14, 'aSA', 'ASA', 0, 'sasikajayawardana@ymail.com', 'male', '17', '17', '1993-11-11'),
(15, 'ssdsd', 'dsfsdfds', 1233, 'sasikajayawardana@ymail.com', 'male', '17', '17', '0022-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `no` int(200) NOT NULL AUTO_INCREMENT,
  `yourname` varchar(100) NOT NULL,
  `fdback` varchar(200) NOT NULL,
  `status` varchar(16) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`no`, `yourname`, `fdback`, `status`) VALUES
(1, 'asd', 'zxczxc', 'Unsatisfied'),
(2, 'fds', 'sdf', 'Satisfied'),
(3, 'fds', 'sdf', 'Satisfied'),
(4, 'rty', 'ryrrtyr', 'Satisfied'),
(5, 'rty', 'ryrrtyr', 'Satisfied'),
(6, 'tyu', 'ghj', 'Unsatisfied'),
(7, 'ert', 'ertertertertertt', 'Satisfied'),
(8, 'dsf', 'dsf', 'Unsatisfied'),
(9, 'd', 'dd', 'Satisfied'),
(10, 'Roshan', 'Now I Think correct', 'Satisfied'),
(11, 'Roshan', 'Woooooooow patta', 'Satisfied'),
(12, 'Roshan', 'Woooooooow patta', 'Satisfied'),
(13, 'thinker', 'what', 'Unsatisfied'),
(14, 'a', 'aaa', 'Unsatisfied'),
(15, 'g', 'ggg', 'Unsatisfied'),
(16, 't', 'ttt', 'Unsatisfied'),
(17, 'et', 'sddvvc', 'Satisfied'),
(18, 'xx', 'xxxx', 'Satisfied'),
(19, 'zz', 'zzzz', 'Satisfied'),
(20, 'a', 'a', 'Unsatisfied'),
(21, 'a', 'a', 'Unsatisfied'),
(22, 'v', 'vvv', 'Satisfied'),
(23, 'd', 'dddddddd', 'Satisfied'),
(24, 'c', 'cccc', 'Satisfied'),
(25, 'j', 'jjjj', 'Satisfied'),
(26, 'n', 'nnnnn', 'Unsatisfied'),
(27, 'l', 'love', 'Satisfied'),
(28, '```', 'e', 'Unsatisfied'),
(29, 'f', 'sds', 'Satisfied'),
(30, 'as', 'asasas', 'Unsatisfied'),
(31, 'sera', 'fake', 'Satisfied'),
(32, 'g', 'ggg', 'Unsatisfied'),
(33, 'g', 'ggg', 'Unsatisfied'),
(34, 'g', 'ggg', 'Unsatisfied'),
(35, 'q', 'qqq', 'Satisfied'),
(36, 'Ro', 'Harryyyyy', 'Satisfied'),
(37, 'd', 'd', 'Satisfied'),
(38, 'd', 'g', 'Satisfied'),
(39, 'roshan', 'thama madi', 'Unsatisfied'),
(40, 'fgdfg', 'sdfdsf', 'Satisfied'),
(41, 'dkfjhg', 'fsd', 'Satisfied'),
(42, 'ds', 'dsf', 'Unsatisfied'),
(43, 's', 's', 'Unsatisfied'),
(44, 'wer', 'sdf', 'Satisfied'),
(45, 'e', 'viv', 'Unsatisfied'),
(46, 't', 'puh', 'Unsatisfied'),
(47, 't', 'puh', 'Unsatisfied'),
(48, 'w', 'x', 'Satisfied'),
(49, 'w', 'x', 'Satisfied'),
(50, 'zxc', 'zxczxczxczczxczxc', 'Unsatisfied'),
(51, 's', 'f', 'Satisfied'),
(52, 's', 'f', 'Satisfied'),
(53, 'v', 'v', 'Unsatisfied'),
(54, '1', '2', 'Unsatisfied'),
(55, 'zxc', 'zxc', 'Satisfied'),
(56, 'q', 'w', 'Satisfied'),
(57, 'd', 'd', 'Satisfied'),
(58, 'g', 'gg', 'Satisfied'),
(59, 'g', 'xcv', 'Satisfied'),
(60, 'c', 'zxc', 'Satisfied'),
(61, 'x', 'y', 'Satisfied'),
(62, 'x', 'y', 'Satisfied'),
(63, 'd', 'f', 'Unsatisfied'),
(64, 'f', 'ff', 'Satisfied'),
(65, 'e', 'f', 'Unsatisfied'),
(66, 'v', 'c', 'Satisfied'),
(67, 'x', 'j', 'Unsatisfied'),
(68, 'b', 'bb', 'Satisfied'),
(69, 'h', 'h', 'Unsatisfied'),
(70, 'v', 'v', 'Satisfied'),
(71, 'c', 'x', 'Satisfied'),
(72, 'qwe', 'uy', 'Satisfied'),
(73, 'Roshan', 'ela', 'Satisfied'),
(74, 'bvnbvnb', 'mnvhjvhj', 'Satisfied'),
(75, 'sasika', 'vhjvjgvh', 'Satisfied'),
(76, 'sada', 'hjkdhsjhda', 'Satisfied'),
(77, 'ewrwer', 'sdfsf', 'Satisfied'),
(78, 'ass', 'sadsa', 'Unsatisfied');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
  `res_id` int(11) NOT NULL AUTO_INCREMENT,
  `cusname` varchar(200) NOT NULL,
  `diladd` varchar(200) NOT NULL,
  `dildate` date NOT NULL,
  `diltime` varchar(20) NOT NULL,
  `mobilenum` varchar(20) NOT NULL,
  PRIMARY KEY (`res_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`res_id`, `cusname`, `diladd`, `dildate`, `diltime`, `mobilenum`) VALUES
(1, 'name', 'add', '0000-00-00', 'time', 'mobino'),
(2, 'qwe', 'qwe', '0000-00-00', 'qwe', 'qwe'),
(3, 'qwe', 'qwe', '0000-00-00', 'qwe', 'qwe'),
(4, 'asd', 'asd', '1991-10-10', 'asd', 'asd'),
(5, 'Roshan', '123/B hewahata road thalwatta kandy', '2016-09-05', '10.55 A.M', '0766396770'),
(6, 'sad', 'sad', '0000-00-00', 'sad', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE IF NOT EXISTS `visitors` (
  `msg_no` int(11) NOT NULL AUTO_INCREMENT,
  `deadname` varchar(50) DEFAULT NULL,
  `visname` varchar(50) DEFAULT NULL,
  `visnic` varchar(10) DEFAULT NULL,
  `relation` varchar(20) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`msg_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`msg_no`, `deadname`, `visname`, `visnic`, `relation`, `message`) VALUES
(3, 'nalin', 'roshan', '912044475V', 'hathura', 'adoo tho maruna patta doooo\r\nmn balana hitiye uba marenakan :) :D ;)'),
(4, 'd', 'd', 'd', 'd', 'd'),
(5, 'a', 's', 'd', 'f', 'f'),
(6, 'sd', 'v', 'z', 'n', 'yu'),
(7, 'q', 'q', 'q', 'q', 'q'),
(8, 'aSas', 'sadas', '56788999', 'bro', 'sdad'),
(9, 'sadsa', 'saad', 'dddddddddd', 'sdad', 'sadsad'),
(10, 'adsasd', 'adsad', 'asdad', 'dsada', 'adsad'),
(11, 'fsds', 'sdsad', 'sdd', 'sdsd', 'sadsad'),
(12, '1233', '1234', '56788999', 'sdad', 'sdsd'),
(13, 'dserw', 'fggf', '3434555555', 'hgjg', 'dgf'),
(14, 'ssss', 'cccc', '1234567890', 'ccc', 'zzz');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
