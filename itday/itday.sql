-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2018 at 10:48 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itday`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintable`
--

CREATE TABLE `admintable` (
  `id` int(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `dt` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admintable`
--

INSERT INTO `admintable` (`id`, `firstname`, `lastname`, `username`, `pass`, `dt`) VALUES
(1, 'firstname', 'lastname', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', '2018-03-19 07:20:15.000000');

-- --------------------------------------------------------

--
-- Table structure for table `ownerbidstable`
--

CREATE TABLE `ownerbidstable` (
  `id` int(255) NOT NULL,
  `ownerid` int(255) DEFAULT NULL,
  `duration` int(255) DEFAULT NULL,
  `pay` int(255) DEFAULT NULL,
  `descr` varchar(255) DEFAULT NULL,
  `completed` int(255) DEFAULT NULL,
  `workerid` int(255) DEFAULT NULL,
  `dt` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ownerbidstable`
--

INSERT INTO `ownerbidstable` (`id`, `ownerid`, `duration`, `pay`, `descr`, `completed`, `workerid`, `dt`) VALUES
(1, 4, 3, 5000, 'new wok', 0, NULL, '2018-03-20 04:42:30.000000'),
(2, 5, 7, 5000, 'it is good work', 0, NULL, '2018-03-20 04:41:29.000000');

-- --------------------------------------------------------

--
-- Table structure for table `ownertable`
--

CREATE TABLE `ownertable` (
  `id` int(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lon` double DEFAULT NULL,
  `rad` double DEFAULT NULL,
  `dt` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t`
--

CREATE TABLE `t` (
  `val` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t`
--

INSERT INTO `t` (`val`) VALUES
('hellp');

-- --------------------------------------------------------

--
-- Table structure for table `workerbidstable`
--

CREATE TABLE `workerbidstable` (
  `id` int(255) NOT NULL,
  `workerid` int(255) DEFAULT NULL,
  `duration` int(255) DEFAULT NULL,
  `pay` int(255) DEFAULT NULL,
  `descr` varchar(255) DEFAULT NULL,
  `completed` int(255) DEFAULT NULL,
  `ownerid` int(255) DEFAULT NULL,
  `dt` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workerbidstable`
--

INSERT INTO `workerbidstable` (`id`, `workerid`, `duration`, `pay`, `descr`, `completed`, `ownerid`, `dt`) VALUES
(1, 4, 4, 4000, 'good job', 0, NULL, '2018-03-20 06:46:27.000000'),
(2, 0, 5, 5000, 'now right now!!', 0, NULL, '2018-03-20 06:48:43.000000'),
(3, 5, 3, 1500, 'i want life and money', 0, NULL, '2018-03-20 06:52:26.000000');

-- --------------------------------------------------------

--
-- Table structure for table `workertable`
--

CREATE TABLE `workertable` (
  `id` int(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `dt` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workertable`
--

INSERT INTO `workertable` (`id`, `firstname`, `lastname`, `username`, `email`, `pass`, `dt`) VALUES
(1, 'fnw', 'lnw', 'unw', 'emw', 'ed0518100ede5b9f9938eadf2f608e8d', '2018-03-19 11:11:32.000000'),
(2, 'fnw', 'lnw', 'unw', 'emw', 'ed0518100ede5b9f9938eadf2f608e8d', '2018-03-19 11:11:32.000000'),
(3, 'f', 'f', 'f', 'f', '8fa14cdd754f91cc6554c9e71929cce7', '2018-03-19 11:12:14.000000'),
(4, 'un4', 'un4', 'un4', 'un4', 'd83b4e10e9b322be007a56324c4d10f7', '2018-03-20 08:16:50.000000'),
(5, 'un5', 'un5', 'un5', 'un5', '1ea68971b746ac6e19b2253a48fb6eb1', '2018-03-20 06:47:54.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintable`
--
ALTER TABLE `admintable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ownerbidstable`
--
ALTER TABLE `ownerbidstable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ownertable`
--
ALTER TABLE `ownertable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workerbidstable`
--
ALTER TABLE `workerbidstable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workertable`
--
ALTER TABLE `workertable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintable`
--
ALTER TABLE `admintable`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ownerbidstable`
--
ALTER TABLE `ownerbidstable`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ownertable`
--
ALTER TABLE `ownertable`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `workerbidstable`
--
ALTER TABLE `workerbidstable`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `workertable`
--
ALTER TABLE `workertable`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
