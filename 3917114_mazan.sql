-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: fdb33.awardspace.net
-- Generation Time: Apr 20, 2022 at 06:32 AM
-- Server version: 5.7.20-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `3917114_mazan`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `sno` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`sno`, `title`, `description`, `timestamp`) VALUES
(83, '', 'https://file.io/ssQLVj95CZgd', '2022-02-19 08:16:04'),
(81, '', 'https://www.youtube.com/watch?v=6sy8Si574AU', '2021-11-16 14:52:00'),
(82, '', 'PUSH\r\n	chest, shoulders, triceps\r\nPULL\r\n	back, biceps, forearms, rear deltoids\r\nLEGS\r\n	LEGS + ABS', '2021-11-17 14:57:18'),
(80, '', 'https://towardsdatascience.com/how-to-detect-objects-in-real-time-using-opencv-and-python-c1ba0c2c69c0', '2021-11-09 08:15:53'),
(77, '', 'asC7Vd4yRHydNiIa', '2021-11-01 21:30:39'),
(78, '8090', '', '2021-11-01 21:30:51'),
(79, '', 'https://dronebotworkshop.com/servo-motors-with-arduino/', '2021-11-09 07:47:36'),
(76, '', '20.65.59.141', '2021-11-01 21:27:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(10) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(22) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `username`, `password`, `timestamp`) VALUES
(41, 'mazan', 'test', '2021-08-15 15:43:26'),
(43, 'siami', 'siami', '2021-08-15 15:48:57'),
(44, 'testing', 'a', '2021-08-15 15:51:23'),
(45, '', '', '2021-08-15 16:31:57'),
(46, 'lm', 'lm', '2021-08-16 08:16:26'),
(47, '1', '1', '2021-08-31 19:26:11'),
(48, 'kali', 'kali', '2021-09-22 10:49:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
