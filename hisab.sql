-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 04:11 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hisab`
--

-- --------------------------------------------------------

--
-- Table structure for table `chalan`
--

CREATE TABLE `chalan` (
  `id` int(6) UNSIGNED NOT NULL,
  `party_id` int(10) NOT NULL,
  `mal` int(10) NOT NULL,
  `truck_num` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chalan`
--

INSERT INTO `chalan` (`id`, `party_id`, `mal`, `truck_num`) VALUES
(150, 63, 3, '1'),
(151, 60, 15, '1'),
(152, 57, 19, '1'),
(153, 62, 6, '2'),
(154, 60, 17, '2'),
(155, 61, 5, '2'),
(156, 58, 10, '2'),
(157, 53, 16, '3'),
(158, 57, 9, '3'),
(159, 56, 29, '4'),
(160, 52, 9, '5'),
(161, 54, 14, '5'),
(162, 55, 4, '5'),
(163, 63, 5, '6'),
(164, 62, 2, '6'),
(165, 60, 13, '6'),
(166, 58, 4, '6'),
(167, 59, 3, '6'),
(168, 70, 3, '6');

-- --------------------------------------------------------

--
-- Table structure for table `ghor`
--

CREATE TABLE `ghor` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `loation` varchar(30) NOT NULL,
  `party` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `price`) VALUES
(1, 'Choudala', 1150),
(2, 'Rohonpur', 1100),
(3, 'Nachol', 1050),
(4, 'Amnura', 1020),
(5, 'Rajsahi', 900),
(6, 'Putia', 900),
(7, 'Chapai', 900),
(8, 'Switchgate', 950),
(9, 'Ramchandrapur', 950),
(10, 'Baroghoriya', 950),
(11, 'Ranihati', 950),
(12, 'Shibganj', 1050),
(13, 'Kansat', 1050),
(14, 'Rajsahi(c)', 850),
(15, 'Chapai(c)', 800),
(18, 'Moishalbari', 950);

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `location` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`id`, `name`, `location`) VALUES
(1, 'Diganta', 1),
(2, 'Sohobul', 1),
(3, 'Bodu', 1),
(4, 'Khalil', 1),
(5, 'Aynal', 1),
(6, 'Monirul', 1),
(7, 'Bondu', 1),
(8, 'Amirul', 1),
(9, 'Bismillah', 2),
(10, 'Akkel', 2),
(11, 'Badshah', 2),
(12, 'Bulbul', 2),
(13, 'Jalal', 2),
(14, 'Jakir', 2),
(15, 'Apon', 2),
(16, 'Polash', 2),
(17, 'Neuton', 2),
(18, 'Chomok', 2),
(19, 'Adorsho', 3),
(20, 'Najmul', 3),
(21, 'Jobbar', 3),
(22, 'Arshad', 3),
(23, 'Sattar', 3),
(24, 'Ekramul', 3),
(25, 'Wahid', 3),
(26, 'Sadedul', 4),
(27, 'Kadir', 4),
(28, 'Sumon-Sujon', 4),
(29, 'Rohis', 4),
(30, 'Sadekul', 4),
(31, 'Mujibor', 4),
(32, 'Janata', 5),
(33, 'Banik', 5),
(34, 'Komol', 14),
(35, 'nasir', 14),
(36, 'aminul', 7),
(37, 'Malek', 4),
(38, 'Halim', 3),
(39, 'Hafiz', 3),
(40, 'Salam', 2),
(41, 'Kalam', 2),
(42, 'Ansarul', 1),
(43, 'Firoz', 5),
(44, 'Nafiz', 5),
(45, 'Bootik', 5),
(46, 'Ansar', 5),
(47, 'Provat', 6),
(48, 'Ramprosad', 6),
(49, 'Shuvo', 6),
(50, 'Shantos', 6),
(51, 'Montu', 15),
(52, 'Choudala', 1),
(53, 'Rohonpur', 2),
(54, 'Nachol', 3),
(55, 'Amnura', 4),
(56, 'Rajsahi', 5),
(57, 'Putia', 6),
(58, 'Chapai', 7),
(59, 'Switchgate', 8),
(60, 'Ramchandrapur', 9),
(61, 'Baroghoriya', 10),
(62, 'Ranihati', 11),
(63, 'Shibganj', 12),
(64, 'Kansat', 13),
(65, 'Rajsahi (c)', 14),
(66, 'Chapai (c)', 15),
(67, 'half(500)', 16),
(68, 'half(600)', 17),
(69, 'Rahad', 3),
(70, 'Moishalbari', 18);

-- --------------------------------------------------------

--
-- Table structure for table `truck`
--

CREATE TABLE `truck` (
  `id` int(6) UNSIGNED NOT NULL,
  `t_num` varchar(30) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `rent` int(10) DEFAULT NULL,
  `mal` int(10) DEFAULT NULL,
  `adv` int(10) DEFAULT NULL,
  `totalTk` int(10) DEFAULT NULL,
  `avgMotiTk` int(10) DEFAULT NULL,
  `motiG` int(10) DEFAULT NULL,
  `t_inc` int(10) DEFAULT NULL,
  `iGet` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `truck`
--

INSERT INTO `truck` (`id`, `t_num`, `mobile`, `rent`, `mal`, `adv`, `totalTk`, `avgMotiTk`, `motiG`, `t_inc`, `iGet`) VALUES
(1, '1', '', 14000, 37, 10000, 34500, 25900, 11900, 0, 8600),
(3, '2', '', 14000, 38, 10000, 35600, 26600, 12600, 0, 9000),
(4, '3', '', 14000, 25, 5000, 25700, 17500, 3500, 0, 8200),
(5, '4', '', 14000, 29, 0, 26100, 20300, 6300, 0, 5800),
(6, '5', '', 15000, 27, 0, 29130, 18900, 3900, 0, 10230),
(7, '6', '', 15000, 30, 5000, 28800, 21000, 6000, 0, 7800);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chalan`
--
ALTER TABLE `chalan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ghor`
--
ALTER TABLE `ghor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `truck`
--
ALTER TABLE `truck`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chalan`
--
ALTER TABLE `chalan`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `ghor`
--
ALTER TABLE `ghor`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `truck`
--
ALTER TABLE `truck`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
