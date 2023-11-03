-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2023 at 07:34 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(40) NOT NULL,
  `ann` mediumtext NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `ann`, `date`, `status`) VALUES
(46, '<p style=\"text-align: center;\"><span style=\"font-size: 36px;\"><b>﻿HELLO</b></span></p><p style=\"text-align: center; \"><span style=\"text-align: start; font-size: 18px;\"><b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</b></span><br></p><p style=\"text-align: center;\"><br></p>', '2023-03-09 22:11:47', '0'),
(47, '<p style=\"text-align: center; \"><span style=\"font-size: 36px;\"><u><i>﻿<b>Announcement</b></i></u></span></p><p style=\"text-align: center;\"><span style=\"text-align: start; font-size: 18px;\"><span style=\"font-weight: bolder;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></span><br></p><p style=\"text-align: center;\"><br></p><p style=\"text-align: center; \"><span style=\"font-size: 11px;\">﻿</span><span style=\"font-size: 36px;\"><u><i><b><br></b></i></u></span><br></p>', '2023-03-09 23:02:50', '0'),
(48, '<p style=\"text-align: center;\"><span style=\"font-size: 36px;\"><u><i>﻿<span style=\"font-weight: bolder;\">Announcement</span></i></u></span></p><p style=\"text-align: center;\"><span style=\"text-align: start; font-size: 18px;\"><span style=\"font-weight: bolder;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></span><br></p><p style=\"text-align: center;\"><br></p><p style=\"text-align: center;\"><span style=\"font-size: 11px;\">﻿</span></p>', '2023-03-09 23:05:18', '0');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(10) NOT NULL,
  `stid` varchar(20) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `dname` varchar(40) NOT NULL,
  `date` varchar(40) NOT NULL,
  `day` varchar(10) NOT NULL,
  `time` varchar(40) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `statusA` varchar(10) NOT NULL,
  `statusB` varchar(10) NOT NULL DEFAULT '0',
  `statusC` varchar(10) NOT NULL DEFAULT '0',
  `cdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `stid`, `fname`, `dname`, `date`, `day`, `time`, `reason`, `statusA`, `statusB`, `statusC`, `cdate`) VALUES
(1, '01-1920-12345', 'Ernest Mikhail Sacdal', 'Drake Ramoray', '2022-10-23', '', '23:09', 'awsdasdas', '1', '0', '1', '2023-02-25 22:23:37'),
(2, '01-1920-12345', 'Uchi         Luffy', 'Shaun Murphy', '2023-02-26', 'Sunday', '1:00 PM - 1:30 PM', '123', '0', '1', '1', '2023-02-25 22:23:37'),
(3, '01-1920-05878', 'UchiLuffy', 'Shaun Murphy', '2023-02-26', 'Sunday', '12:30 PM - 1:00 PM', '123', '0', '1', '1', '2023-02-25 22:23:37'),
(4, '01-1920-05878', 'UchiLuffy', 'Shaun Murphy', '2023-02-26', 'Sunday', '1:00 PM - 1:30 PM', '123', '1', '1', '1', '2023-02-25 22:23:37'),
(5, '01-1920-05878', 'UchiLuffy', 'John Smith', '2023-02-23', 'Thursday', '3:00 PM - 3:30 PM', '123', '1', '', '1', '2023-02-25 22:23:37'),
(6, '01-1920-12345', 'UchiLuffy', 'John Smith', '2023-02-24', 'Friday', '1:30 PM - 2:00 PM', '123', '0', '', '1', '2023-02-25 22:23:37'),
(7, '01-1920-05878', 'Ernest MikhailSacdal', 'John Smith', '2023-02-23', 'Thursday', '1:30 PM - 2:00 PM', '123', '0', '', '1', '2023-02-25 22:23:37'),
(8, '01-1920-05878', 'Ernest MikhailSacdal', 'John Smith', '2023-02-22', 'Wednesday', '1:00 PM - 1:30 PM', '123', '0', '', '1', '2023-02-25 22:23:37'),
(9, '01-1920-12345', 'UchiLuffy', 'John Smith', '2023-02-23', 'Thursday', '1:30 PM - 2:00 PM', '123', '0', '', '1', '2023-02-25 22:23:37'),
(10, '01-1920-12345', 'UchiLuffy', 'John Smith', '2023-02-22', 'Wednesday', '2:00 PM - 2:30 PM', '123', '0', '', '1', '2023-02-25 22:23:37'),
(11, '01-1920-05878', 'Ernest MikhailSacdal', 'John Smith', '2023-02-21', 'Tuesday', '3:00 PM - 3:30 PM', '123', '0', '1', '1', '2023-02-25 22:23:37'),
(12, '01-1920-12345', 'UchiLuffy', 'John Smith', '2023-02-23', 'Thursday', '2:30 PM - 3:00 PM', '123', '1', '', '1', '2023-02-25 22:23:37'),
(13, '01-1920-05878', 'Ernest MikhailSacdal', 'Sample Doctor', '2023-02-04', 'Saturday', '2:30 PM - 3:00 PM', '123', '0', '', '1', '2023-02-25 22:23:37'),
(14, '01-1920-12345', 'UchiLuffy', 'John Smith', '2023-02-23', 'Thursday', '2:00 PM - 2:30 PM', '123', '0', '', '1', '2023-02-25 22:23:37'),
(15, '01-1920-05878', 'Ernest MikhailSacdal', 'John Smith', '2023-02-22', 'Wednesday', '2:30 PM - 3:00 PM', '123', '0', '', '1', '2023-02-25 22:23:37'),
(16, '01-1920-12345', 'UchiLuffy', 'John Smith', '2023-02-22', 'Wednesday', '2:30 PM - 3:00 PM', '123', '0', '', '1', '2023-02-25 22:23:37'),
(17, '01-1920-12345', 'UchiLuffy', 'Sample Doctor', '2023-02-03', 'Friday', '2:00 PM - 2:30 PM', '123', '0', '', '1', '2023-02-25 22:23:37'),
(18, '01-1920-05878', 'Ernest MikhailSacdal', 'Shaun Murphy', '2023-02-25', 'Saturday', '1:00 PM - 1:30 PM', '123', '0', '', '1', '2023-02-25 22:23:37'),
(19, '01-1920-12345', 'UchiLuffy', 'Shaun Murphy', '2023-02-25', 'Saturday', '12:30 PM - 1:00 PM', '123', '0', '0', '1', '2023-02-25 22:23:37'),
(20, '01-1920-05878', 'Ernest MikhailSacdal', 'John Smith', '2023-02-23', 'Thursday', '1:00 PM - 1:30 PM', '123', '0', '1', '1', '2023-02-25 22:23:37'),
(21, '01-1920-12345', 'Uchi Luffy', 'John Smith', '2023-02-22', 'Wednesday', '2:00 PM - 2:30 PM', '123', '0', '1', '1', '2023-03-01 22:07:37'),
(22, '01-1920-05878', 'Ernest Mikhail Sacdal', 'John Smith', '2023-02-23', 'Thursday', '2:00 PM - 2:30 PM', '123', '0', '1', '1', '2023-03-01 22:07:38'),
(23, '01-1920-12345', 'Uchi         Luffy', 'Shaun Murphy', '2023-02-25', 'Saturday', '1:00 PM - 1:30 PM', '123', '0', '1', '1', '2023-03-09 22:33:51'),
(24, '01-1920-12345', 'Uchi         Luffy', 'Shaun Murphy', '2023-02-25', 'Saturday', '12:30 PM - 1:00 PM', '123', '0', '1', '1', '2023-03-09 22:34:12'),
(25, '01-1920-12345', 'Uchi Luffy', 'Drake Ramoray', '2023-02-28', 'Tuesday', '11:00 AM - 11:30 AM', 'qwe', '0', '', '1', '2023-03-09 22:34:30'),
(26, '01-1920-12345', 'Uchi Luffy', 'Shaun Murphy', '2023-02-26', 'Sunday', '12:30 PM - 1:00 PM', '123', '1', '', '1', '2023-03-09 22:34:59'),
(27, '01-1920-12345', 'Uchi Luffy', 'John Smith', '2023-02-22', 'Wednesday', '2:30 PM - 3:00 PM', '123', '0', '0', '1', '2023-03-09 22:35:30'),
(28, '01-1920-12345', 'Uchi         Luffy', 'John Smith', '2023-02-23', 'Thursday', '2:00 PM - 2:30 PM', 'qwe', '0', '1', '1', '2023-03-09 23:54:28'),
(29, '01-1920-12345', 'Uchi Luffy', 'Shaun Murphy', '2023-02-27', 'Monday', '1:30 PM - 2:00 PM', '123', '1', '', '1', '2023-03-09 23:54:31'),
(30, '01-1920-12345', 'Uchi Luffy', 'Shaun Murphy', '2023-02-26', 'Sunday', '1:00 PM - 1:30 PM', '123', '0', '1', '1', '2023-03-10 00:10:56'),
(31, '01-1920-12345', 'Uchi Luffy', 'John Smith', '2023-02-23', 'Thursday', '3:30 PM - 4:00 PM', '123', '0', '1', '1', '2023-03-10 00:23:58'),
(32, '01-1920-05878', 'Ernest Mikhail Sacdal', 'John Smith', '2023-02-23', 'Thursday', '3:00 PM - 3:30 PM', '123', '0', '1', '0', '2023-03-10 00:24:14'),
(33, '01-1920-12345', 'Uchi Luffy', 'Shaun Murphy', '2023-02-26', 'Sunday', '12:30 PM - 1:00 PM', '123', '0', '1', '1', '2023-03-10 00:24:15'),
(34, '01-1920-12345', 'Uchi Luffy', 'John Smith', '2023-02-23', 'Thursday', '2:30 PM - 3:00 PM', '123', '0', '', '1', '2023-03-12 22:34:13'),
(35, '01-1920-12345', 'Uchi Luffy', 'Shaun Murphy', '2023-02-27', 'Monday', '1:00 PM - 1:30 PM', '123', '0', '1', '1', '2023-03-12 22:34:14'),
(36, '01-1920-12345', 'Uchi Luffy', 'Shaun Murphy', '2023-02-27', 'Monday', '1:00 PM - 1:30 PM', '123', '0', '', '1', '2023-03-12 23:25:20'),
(37, '01-1920-12345', 'Uchi Luffy', 'Shaun Murphy', '2023-02-27', 'Monday', '1:00 PM - 1:30 PM', '123', '1', '', '1', '2023-03-12 23:30:34'),
(38, '01-1920-12345', 'Uchi Luffy', 'John Smith', '2023-02-24', 'Friday', '2:30 PM - 3:00 PM', '123', '0', '', '1', '2023-03-12 23:30:51'),
(39, '01-1920-12345', 'Uchi Luffy', 'John Smith', '2023-02-22', 'Wednesday', '2:30 PM - 3:00 PM', 'qwe', '0', '', '1', '2023-03-12 23:34:08'),
(40, '01-1920-12345', 'Uchi Luffy', 'Shaun Murphy', '2023-02-26', 'Sunday', '1:00 PM - 1:30 PM', 'qwe', '0', '', '1', '2023-03-12 23:35:11'),
(41, '01-1920-12345', 'Uchi Luffy', 'John Smith', '2023-02-23', 'Thursday', '3:00 PM - 3:30 PM', 'qwe', '0', '', '1', '2023-03-12 23:40:35'),
(42, '01-1920-12345', 'Uchi Luffy', 'John Smith', '2023-02-24', 'Friday', '2:30 PM - 3:00 PM', 'qwe', '0', '', '1', '2023-03-12 23:41:25'),
(43, '01-1920-12345', 'Uchi Luffy', 'John Smith', '2023-02-23', 'Thursday', '3:30 PM - 4:00 PM', '123', '0', '', '1', '2023-03-12 23:47:12'),
(44, '01-1920-12345', 'Uchi Luffy', 'John Smith', '2023-02-23', 'Thursday', '3:00 PM - 3:30 PM', '123', '0', '', '1', '2023-03-12 23:49:41'),
(45, '01-1920-12345', 'Uchi Luffy', 'John Smith', '2023-02-23', 'Thursday', '2:30 PM - 3:00 PM', '123', '0', '', '1', '2023-03-12 23:51:07'),
(46, '01-1920-12345', 'Uchi Luffy', 'Shaun Murphy', '2023-02-25', 'Saturday', '1:00 PM - 1:30 PM', '123', '0', '', '1', '2023-03-12 23:53:04'),
(47, '01-1920-12345', 'Uchi Luffy', 'John Smith', '2023-02-24', 'Friday', '3:30 PM - 4:00 PM', '123', '0', '', '1', '2023-03-12 23:53:41'),
(48, '01-1920-12345', 'Uchi Luffy', 'John Smith', '2023-02-23', 'Thursday', '3:00 PM - 3:30 PM', '123', '0', '', '1', '2023-03-12 23:55:55'),
(49, '01-1920-12345', 'Uchi Luffy', 'John Smith', '2023-02-22', 'Wednesday', '3:30 PM - 4:00 PM', '123', '0', '', '1', '2023-03-12 23:56:30'),
(50, '01-1920-12345', 'Uchi Luffy', 'John Smith', '2023-02-23', 'Thursday', '3:30 PM - 4:00 PM', '123', '0', '', '1', '2023-03-12 23:56:34'),
(51, '01-1920-12345', 'Uchi Luffy', 'Shaun Murphy', '2023-02-25', 'Saturday', '2:00 PM - 2:30 PM', 'asd', '0', '', '1', '2023-03-13 00:09:20'),
(52, '01-1920-12345', 'Uchi Luffy', 'John Smith', '2023-02-22', 'Wednesday', '3:00 PM - 3:30 PM', 'asd', '0', '', '1', '2023-03-13 00:09:38'),
(53, '01-1920-12345', 'Uchi Luffy', 'John Smith', '2023-02-23', 'Thursday', '4:00 PM - 4:30 PM', 'qwe', '0', '', '1', '2023-03-13 23:49:37'),
(54, '01-1920-12345', 'Uchi Luffy', 'John Smith', '2023-02-21', 'Tuesday', '8:00 AM - 8:30 AM', '123123123', '0', '1', '1', '2023-03-13 23:52:36'),
(55, '01-1920-12345', 'Uchi Luffy', 'John Smith', '2023-02-23', 'Thursday', '3:00 PM - 3:30 PM', '123', '0', '0', '1', '2023-03-13 23:54:08'),
(56, '01-1920-12345', 'Uchi Luffy', 'John Smith', '2023-02-23', 'Thursday', '3:00 PM - 3:30 PM', 'asd', '0', '0', '1', '2023-03-13 23:54:51'),
(57, '01-1920-12345', 'Uchi Luffy', 'John Smith', '2023-02-24', 'Friday', '3:30 PM - 4:00 PM', '123', '0', '0', '1', '2023-03-14 10:33:25'),
(58, '01-1920-12345', 'Ernest Mikhail Sacdal', 'Dr. John Smith', '2023-02-23', 'Thursday', '3:00 PM - 3:30 PM', '123', '0', '0', '1', '2023-03-16 16:11:23'),
(59, '01-1920-12345', 'Ernest Mikhail Sacdal', 'Dr. John Smith', '2023-02-23', 'Thursday', '2:30 PM - 3:00 PM', '123', '0', '0', '1', '2023-03-16 16:12:31'),
(60, '01-1920-12345', 'Ernest Mikhail Sacdal', 'Dr. Shaun Murphy', '2023-02-26', 'Sunday', '1:30 PM - 2:00 PM', '123', '0', '0', '1', '2023-03-16 16:26:48'),
(61, '01-1920-12345', 'Ernest Mikhail Sacdal', 'Dr. John Smith', '2023-02-23', 'Thursday', '3:00 PM - 3:30 PM', '123', '0', '0', '1', '2023-03-16 16:28:27'),
(62, '01-1920-12345', 'Ernest Mikhail Sacdal', 'Dr. John Smith', '2023-02-23', 'Thursday', '4:30 PM - 5:00 PM', '123', '0', '0', '1', '2023-03-16 16:34:41'),
(63, '01-1920-12345', 'Ernest Mikhail Sacdal', 'Dr. John Smith', '2023-02-22', 'Wednesday', '', '123', '0', '0', '1', '2023-03-16 16:37:34'),
(64, '01-1920-12345', 'Ernest Mikhail Sacdal', 'Dr. John Smith', '2023-02-23', 'Thursday', '3:30 PM - 4:00 PM', '123', '0', '0', '1', '2023-03-16 16:39:43'),
(65, '01-1920-12345', 'Ernest Mikhail Sacdal', 'Dr. John Smith', '2023-02-23', 'Thursday', '2:00 PM - 2:30 PM', 'qwe', '0', '0', '1', '2023-03-16 16:40:37'),
(66, '01-1920-12345', 'Ernest Mikhail Sacdal', 'Dr. John Smith', '2023-02-24', 'Friday', '3:30 PM - 4:00 PM', 'qwe', '1', '0', '1', '2023-03-16 17:20:32'),
(67, '01-1920-12345', 'Ernest Mikhail Sacdal', 'Dr. John Smith', '2023-02-23', 'Thursday', '3:00 PM - 3:30 PM', '123', '1', '0', '1', '2023-03-16 17:21:46'),
(68, '01-1920-12345', 'Ernest Mikhail Sacdal', 'Dr. Shaun Murphy', '2023-02-25', 'Saturday', '12:30 PM - 1:00 PM', 'qweqwe', '0', '0', '1', '2023-03-16 17:22:07'),
(69, '01-1920-12345', 'Ernest Mikhail Sacdal', 'Dr. Shaun Murphy', '2023-02-26', 'Sunday', '2:00 PM - 2:30 PM', 'qweqwe', '1', '0', '1', '2023-03-16 17:22:09'),
(70, '01-1920-12345', 'Ernest Mikhail Sacdal', 'Dr. Shaun Murphy', '2023-02-25', 'Saturday', '1:00 PM - 1:30 PM', 'qweqwe', '1', '0', '1', '2023-03-16 17:22:50'),
(71, '01-1920-12345', 'Ernest Mikhail Sacdal', 'Dr. John Smith', '2023-02-23', 'Thursday', '2:30 PM - 3:00 PM', '123', '1', '0', '1', '2023-03-16 17:28:02'),
(72, '01-1920-12345', 'Ernest Mikhail Sacdal', 'Dr. John Smith', '2023-02-22', 'Wednesday', '2:30 PM - 3:00 PM', '123', '0', '0', '1', '2023-03-16 17:31:13'),
(73, '01-1920-12345', 'Ernest Mikhail Sacdal', 'Dr. John Smith', '2023-02-22', 'Wednesday', '4:00 PM - 4:30 PM', '123', '1', '0', '1', '2023-03-16 17:31:16'),
(74, '01-1920-12345', 'Ernest Mikhail Sacdal', 'Dr. John Smith', '2023-02-22', 'Wednesday', '3:00 PM - 3:30 PM', 'Qwe', '0', '0', '1', '2023-03-16 21:00:53'),
(75, '01-1920-12345', 'Ernest Mikhail Sacdal', 'Dr. John Smith', '2023-02-23', 'Thursday', '2:00 PM - 2:30 PM', 'QWe', '1', '0', '1', '2023-03-16 21:01:53');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course` text NOT NULL,
  `department_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `department_id`) VALUES
(1, 'BSIT', 1),
(2, 'BSCE', 1),
(3, 'BSA', 2),
(4, 'BSBA', 2),
(5, 'BSED', 3),
(6, 'BEED', 3),
(7, 'BAPS\r\n', 3),
(8, 'SHS', 4),
(9, 'BSC', 5),
(10, 'BSN', 6),
(11, 'BSPH', 6),
(12, 'BSTM', 2),
(13, 'BSHM', 2);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department`) VALUES
(1, 'CITE'),
(2, 'CMA'),
(3, 'CELA'),
(4, 'SHS'),
(5, 'CCJE'),
(6, 'CAHS'),
(7, 'CAS');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `dname` varchar(40) NOT NULL,
  `spe` varchar(40) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `time` varchar(40) NOT NULL,
  `ttime` varchar(40) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `dname`, `spe`, `sdate`, `edate`, `time`, `ttime`, `status`, `email`) VALUES
(11, 'John Smith', 'Dentist', '2023-03-20', '2023-03-24', '08:00 AM', '11:30 AM', 0, 'sacdalernest02@gmail.com'),
(14, 'Shaun Murphy', 'Physician', '2023-03-27', '2023-03-31', '01:30 PM', '05:00 PM', 0, 'sacdalernest02@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(40) NOT NULL,
  `meds` varchar(40) NOT NULL,
  `quantity` varchar(40) NOT NULL,
  `price` int(40) NOT NULL,
  `cons` int(40) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `total` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `meds`, `quantity`, `price`, `cons`, `status`, `total`) VALUES
(2, 'Alaxan', '20', 8, 0, '0', 0),
(3, 'Bioflu', '42', 7, 2, '0', 14),
(4, 'Biogesic', '0', 8, 0, '1', 0),
(5, 'Diatabs', '29', 9, 1, '0', 9),
(24, 'Advil', '1', 11, 20, '0', 220),
(25, 'Memo Plus Gold', '38', 5, 0, '0', 0),
(26, 'Neozep', '0', 5, 0, '1', 0),
(28, 'Medicol', '20', 5, 0, '0', 0),
(31, 'Alerta', '20', 5, 0, '0', 0),
(32, 'Tempra Tablets', '20', 5, 0, '0', 0),
(33, 'Ceelin Tablets', '20', 5, 0, '0', 0),
(34, 'Dolfenal', '20', 5, 0, '0', 0),
(35, 'Tuseran', '20', 5, 0, '0', 0),
(36, 'Rexidol', '20', 5, 0, '0', 0),
(37, 'Solmux', '20', 5, 0, '0', 0),
(38, 'Decolgen', '20', 5, 0, '0', 0),
(39, 'Skelan', '20', 5, 0, '0', 0),
(40, 'Conzace', '20', 5, 0, '0', 0),
(41, 'Alendra', '20', 5, 0, '0', 0),
(42, 'Asmalin', '20', 4, 0, '0', 0),
(43, 'Aspilets', '20', 5, 0, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `invhis`
--

CREATE TABLE `invhis` (
  `id` int(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` varchar(255) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invhis`
--

INSERT INTO `invhis` (`id`, `date`, `time`, `activity`, `user`) VALUES
(1, '2023-02-12', '', '5 of Alaxan was added to the Inventory', 'admin'),
(2, '2023-02-12', '', '5 quantity of Bioflu was added to the Inventory', 'admin'),
(3, '2023-02-12', '', '4 quantity of Diatabs was added to the Inventory', 'admin'),
(4, '2023-02-13', '', 'Supply of Alerta has been added to the Inventory. Starting Quantity = 5, Unit Price = 11.', 'admin'),
(5, '2023-02-13', '', 'Supply of Alerta has been deleted in the Inventory', ''),
(6, '2023-02-13', '', 'Supply of Alerta has been deleted in the Inventory', ''),
(7, '2023-02-13', '', 'Supply of Alerta has been deleted in the Inventory', ''),
(8, '2023-02-13', '', 'Supply of Alerta has been added to the Inventory. Starting Quantity = 20 Unit Price = ₱5.', 'admin'),
(9, '2023-02-13', '', 'Supply of Alerta has been restocked. Restock Quantity = 20', 'admin'),
(10, '2023-02-13', '', 'Supply of Alerta has been deleted in the Inventory', 'admin'),
(11, '2023-02-13', '', 'Supply of Advilllllllll has been deleted in the Inventory', 'admin'),
(12, '2023-02-13', '14:12:09', 'Supply of Alaxan has been restocked. Restock Quantity = 5', 'admin'),
(13, '2023-02-13', '14:15:32', 'Supply of Bioflu has been restocked. Restock Quantity = 5', 'admin'),
(14, '2023-02-13', '21:31:42:pm', 'Supply of Bioflu has been restocked. Restock Quantity = 5', 'admin'),
(15, '2023-02-13', '08:00:00:am', 'Supply of Alaxan has been restocked. Restock Quantity = 5', 'admin'),
(16, '2023-02-13', '', 'Supply of Bioflu has been restocked. Restock Quantity = 5', 'admin'),
(17, '2023-02-13', '22:14:11:pm', 'Supply of Bioflu has been restocked. Restock Quantity = 5', 'admin'),
(18, '2023-02-13', '10:23 pm', 'Supply of Bioflu has been restocked. Restock Quantity = 5', 'admin'),
(19, '2023-02-13', '10:40 pm', 'Supply of Advil has been deleted in the Inventory', 'admin'),
(20, '2023-02-13', '10:41 pm', 'Supply of Advil has been added to the Inventory. Starting Quantity = 20 Unit Price = ₱10.', 'admin'),
(21, '2023-02-13', '11:11 pm', 'Advill Advil', 'admin'),
(22, '2023-02-15', '8:24 pm', 'Alaxan Alaxan', 'admin'),
(23, '2023-02-15', '11:47 pm', 'Supply of Lomotil has been added to the Inventory. Starting Quantity = 1 Unit Price = ₱5.', 'admin'),
(24, '2023-02-16', '12:14 am', 'Supply of Lomotil has been restocked. Restock Quantity = 1', 'admin'),
(25, '2023-02-16', '12:15 am', 'Supply of Lomotil has been restocked. Restock Quantity = 1', 'admin'),
(26, '2023-02-16', '12:17 am', 'Supply of Lomotil has been restocked. Restock Quantity = 1', 'admin'),
(27, '2023-02-16', '12:18 am', 'Supply of Lomotil has been restocked. Restock Quantity = 1', 'admin'),
(28, '2023-02-16', '12:18 am', 'Supply of Lomotil has been restocked. Restock Quantity = 2', 'admin'),
(29, '2023-02-16', '12:19 am', 'Supply of Lomotil has been restocked. Restock Quantity = 1', 'admin'),
(30, '2023-02-16', '12:20 am', 'Supply of Lomotil has been restocked. Restock Quantity = 1', 'admin'),
(31, '2023-02-16', '12:21 am', 'Supply of Lomotil has been restocked. Restock Quantity = 1', 'admin'),
(32, '2023-02-16', '12:23 am', 'Supply of Lomotil has been restocked. Restock Quantity = 1', 'admin'),
(33, '2023-02-16', '12:23 am', 'Supply of Lomotil has been restocked. Restock Quantity = 25', 'admin'),
(34, '2023-02-16', '12:24 am', 'Supply of Lomotil has been restocked. Restock Quantity = 1', 'admin'),
(35, '2023-02-16', '12:26 am', 'Supply of Lomotil has been restocked. Restock Quantity = 1', 'admin'),
(36, '2023-02-16', '12:27 am', 'Supply of Lomotil has been restocked. Restock Quantity = 1', 'admin'),
(37, '2023-02-16', '12:28 am', 'Supply of Lomotil has been restocked. Restock Quantity = 1', 'admin'),
(38, '2023-02-16', '12:29 am', 'Supply of Lomotil has been restocked. Restock Quantity = 1', 'admin'),
(39, '2023-02-16', '12:31 am', 'Supply of Lomotil has been restocked. Restock Quantity = 1', 'admin'),
(40, '2023-02-16', '10:34 pm', 'Supply of Alaxan has been restocked. Restock Quantity = 1', 'admin'),
(41, '2023-02-16', '10:48 pm', 'Supply of Alaxan has been restocked. Restock Quantity = 5', 'admin'),
(42, '2023-02-16', '10:51 pm', 'Supply of Alaxan has been restocked. Restock Quantity = 4', 'admin'),
(43, '2023-02-16', '10:52 pm', 'Supply of Alaxan has been restocked. Restock Quantity = 44', 'admin'),
(44, '2023-02-19', '8:43 pm', 'Supply of Coamoxiclav has been added to the Inventory. Starting Quantity = 1 Unit Price = ₱5.', 'admin'),
(45, '2023-02-19', '8:44 pm', 'Supply of Coamoxiclav has been restocked. Restock Quantity = 4', 'admin'),
(46, '2023-02-20', '9:53 pm', 'Supply of Coamoxiclav has been restocked. Restock Quantity = 1', 'admin'),
(47, '2023-02-20', '10:12 pm', 'Inctive', 'admin'),
(48, '2023-02-20', '10:13 pm', 'Active', 'admin'),
(49, '2023-02-20', '10:51 pm', 'Lomotil set the status to Inactive', 'admin'),
(50, '2023-02-20', '10:51 pm', 'Advil set the status to Inactive', 'admin'),
(51, '2023-02-20', '10:51 pm', 'Advil set the status to Active', 'admin'),
(52, '2023-02-20', '10:51 pm', 'Lomotil set the status to Active', 'admin'),
(53, '2023-02-20', '10:55 pm', 'Advil status is Inactive', 'admin'),
(54, '2023-02-20', '10:55 pm', 'Advil status is Active', 'admin'),
(55, '2023-02-20', '10:55 pm', 'Lomotil status is Inactive', 'admin'),
(56, '2023-02-20', '10:55 pm', 'Lomotil status is Active', 'admin'),
(57, '2023-02-21', '3:37 pm', 'Alaxan status is Inactive', 'admin'),
(58, '2023-02-21', '3:37 pm', 'Alaxan status is Active', 'admin'),
(59, '2023-02-21', '10:11 pm', 'Lomotil status is Inactive', 'admin'),
(60, '2023-02-21', '10:11 pm', 'Lomotil status is Active', 'admin'),
(61, '2023-02-21', '10:11 pm', 'Advil status is Inactive', 'admin'),
(62, '2023-02-21', '10:11 pm', 'Advil status is Active', 'admin'),
(63, '2023-02-21', '10:11 pm', 'Advil Advill', 'admin'),
(64, '2023-02-21', '10:11 pm', 'Advill Advil', 'admin'),
(65, '2023-02-22', '9:02 pm', ' ', 'admin'),
(66, '2023-02-22', '9:53 pm', 'Supply of  has been deleted in the Inventory', 'admin'),
(67, '2023-03-06', '5:06 pm', 'Supply of Bioflu has been restocked. Restock Quantity = 20', 'admin'),
(68, '2023-03-09', '10:42 pm', 'Alaxan Alaxan', 'admin'),
(69, '2023-03-09', '10:43 pm', 'Supply of Sample has been added to the Inventory. Starting Quantity = 20 Unit Price = ₱5.', 'admin'),
(70, '2023-03-09', '10:43 pm', 'Supply of Sample has been restocked. Restock Quantity = 5', 'admin'),
(71, '2023-03-09', '10:44 pm', 'Diatabs status is Inactive', 'admin'),
(72, '2023-03-09', '10:44 pm', 'Diatabs status is Active', 'admin'),
(73, '2023-03-09', '10:47 pm', 'Supply of Alaxan has been restocked. Restock Quantity = 20', 'admin'),
(74, '2023-03-09', '10:55 pm', 'Supply of Bioflu has been restocked. Restock Quantity = 20', 'admin'),
(75, '2023-03-09', '10:56 pm', 'Supply of Sample has been deleted in the Inventory', 'admin'),
(76, '2023-03-09', '10:57 pm', 'Supply of Sample has been added to the Inventory. Starting Quantity = 20 Unit Price = ₱5.', 'admin'),
(77, '2023-03-09', '10:57 pm', 'Lomotil status is Inactive', 'admin'),
(78, '2023-03-09', '10:57 pm', 'Lomotil status is Active', 'admin'),
(79, '2023-03-09', '11:00 pm', 'Bioflu Biofluuuuuuu', 'admin'),
(80, '2023-03-09', '11:38 pm', 'Alaxan Alaxann', 'admin'),
(81, '2023-03-09', '11:40 pm', 'Diatabs Diatab', 'admin'),
(82, '2023-03-09', '11:40 pm', 'Diatab Diatabs', 'admin'),
(83, '2023-03-17', '1:06 am', 'A new medicine named Sample was added to the inventory. The initial quantity of the medicine added was 25 unit, with a unit price of ₱23.', 'admin'),
(84, '2023-03-17', '1:07 am', 'Supply of Sample was deleted from the inventory', 'admin'),
(85, '2023-03-17', '1:07 am', 'A new medicine named <b>Sample</b> was added to the inventory. The initial quantity of the medicine added was 22 units, with a unit price of ₱22.', 'admin'),
(86, '2023-03-17', '1:09 am', 'Medicine: Alaxan (renamed to <b>Alaxan</b>) Quantity: 20 units (updated to <b>20</b> units) Unit Price: $7 (updated to <b>$8</b>)', 'admin'),
(87, '2023-03-17', '1:10 am', 'A quantity of 50 units of <b>Sample</b> was added to the inventory of medicine.', 'admin'),
(88, '2023-03-17', '1:10 am', 'A quantity of <b>2</b> units of <b>Sample</b> was added to the inventory of medicine.', 'admin'),
(89, '2023-03-17', '1:11 am', 'Supply of <b>Sample</b> was deleted from the inventory', 'admin'),
(90, '2023-03-17', '1:30 am', 'A new medicine named <b>Alerta</b> was added to the inventory. The initial quantity of the medicine added was <b>20</b> units, with a unit price of <b>₱5</b>.', 'admin'),
(91, '2023-03-17', '1:30 am', 'A new medicine named <b>Tempra</b> was added to the inventory. The initial quantity of the medicine added was <b>20</b> units, with a unit price of <b>₱5</b>.', 'admin'),
(92, '2023-03-17', '1:31 am', 'A new medicine named <b>Ceelin Tablets</b> was added to the inventory. The initial quantity of the medicine added was <b>20</b> units, with a unit price of <b>₱5</b>.', 'admin'),
(93, '2023-03-17', '1:31 am', 'Medicine: Tempra (renamed to <b>Tempra Tablets</b>) Quantity: 20 units (updated to <b>20</b> units) Unit Price: $5 (updated to <b>$5</b>).', 'admin'),
(94, '2023-03-17', '1:32 am', 'A new medicine named <b>Dolfenal</b> was added to the inventory. The initial quantity of the medicine added was <b>20</b> units, with a unit price of <b>₱5</b>.', 'admin'),
(95, '2023-03-17', '1:32 am', 'A new medicine named <b>Tuseran</b> was added to the inventory. The initial quantity of the medicine added was <b>20</b> units, with a unit price of <b>₱5</b>.', 'admin'),
(96, '2023-03-17', '1:33 am', 'A new medicine named <b>Rexidol</b> was added to the inventory. The initial quantity of the medicine added was <b>20</b> units, with a unit price of <b>₱5</b>.', 'admin'),
(97, '2023-03-17', '1:34 am', 'A new medicine named <b>Solmux</b> was added to the inventory. The initial quantity of the medicine added was <b>20</b> units, with a unit price of <b>₱5</b>.', 'admin'),
(98, '2023-03-17', '1:34 am', 'A new medicine named <b>Decolgen</b> was added to the inventory. The initial quantity of the medicine added was <b>20</b> units, with a unit price of <b>₱5</b>.', 'admin'),
(99, '2023-03-17', '1:37 am', 'A new medicine named <b>Skelan</b> was added to the inventory. The initial quantity of the medicine added was <b>20</b> units, with a unit price of <b>₱5</b>.', 'admin'),
(100, '2023-03-17', '1:37 am', 'A new medicine named <b>Conzace</b> was added to the inventory. The initial quantity of the medicine added was <b>20</b> units, with a unit price of <b>₱5</b>.', 'admin'),
(101, '2023-03-17', '1:39 am', 'A new medicine named <b>Alendra</b> was added to the inventory. The initial quantity of the medicine added was <b>20</b> units, with a unit price of <b>₱5</b>.', 'admin'),
(102, '2023-03-17', '1:39 am', 'A new medicine named <b>Asmalin</b> was added to the inventory. The initial quantity of the medicine added was <b>20</b> units, with a unit price of <b>₱4</b>.', 'admin'),
(103, '2023-03-17', '1:39 am', 'A new medicine named <b>Aspilets</b> was added to the inventory. The initial quantity of the medicine added was <b>20</b> units, with a unit price of <b>₱5</b>.', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(40) NOT NULL,
  `stid` varchar(40) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `course` varchar(40) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `meds` varchar(40) NOT NULL,
  `qty` varchar(40) NOT NULL DEFAULT '0',
  `rate` int(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `department` text NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `stotal` int(255) NOT NULL DEFAULT 0,
  `address` varchar(255) NOT NULL DEFAULT 'N/A',
  `con` varchar(40) NOT NULL DEFAULT 'N/A',
  `guardian` varchar(40) NOT NULL DEFAULT 'N/A',
  `gcnumber` varchar(255) NOT NULL DEFAULT 'N/A',
  `gender` varchar(40) NOT NULL DEFAULT 'N/A',
  `level` varchar(40) NOT NULL DEFAULT 'N/A',
  `treat` varchar(255) NOT NULL DEFAULT 'N/A',
  `physical` varchar(255) NOT NULL DEFAULT 'N/A',
  `plan` varchar(255) NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `stid`, `fullname`, `course`, `date`, `meds`, `qty`, `rate`, `reason`, `department`, `month`, `year`, `stotal`, `address`, `con`, `guardian`, `gcnumber`, `gender`, `level`, `treat`, `physical`, `plan`) VALUES
(117, '01-1920-12345', 'Uchi Luffy ', 'BSIT', '2023-01-08', 'Medicol', '1', 6, 'aaa', 'CITE', 1, 2023, 0, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A'),
(118, '01-1920-12345', 'Uchi Luffy ', 'BSIT', '2023-01-08', 'Diatabs', '1', 5, 'asdasdsad', 'CELA', 1, 2023, 0, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A'),
(119, '1111111', 'bryan starl	', 'BSCE', '2023-01-08', 'Diatabs', '1', 78, 'asdasd', 'CITE', 2, 2023, 0, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A'),
(120, '01-1920-05878', 'Uchi Luffy ', 'BSCE', '2023-01-08', 'Diatabs', '1', 10, 'asdsadasd', 'CITE', 3, 2023, 0, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A'),
(121, '01-1920-12345', 'Uchi Luffy ', 'BSIT', '2023-01-08', 'Medicol', '1', 60, 'aasdasd', 'CITE', 4, 2023, 0, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A'),
(122, '01-1920-12345', 'Uchi Luffy ', 'BSCE', '2023-01-08', 'Medicol', '1', 70, 'fdgdfgdfg', 'CELA', 5, 2023, 6, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A'),
(123, '01-1920-12345', 'Uchi Luffy ', 'BSIT', '2023-01-08', 'Medicol', '1', 55, 'vbnvbnvbn', 'CELA', 6, 2023, 0, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A'),
(124, '01-1920-12345', 'Uchi Luffy ', 'SHS', '2023-01-08', 'Medicol', '1', 50, 'sdfsdf', 'SHS', 7, 2023, 6, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A'),
(125, '01-1920-12345', 'Uchi Luffy ', 'BSCE', '2023-01-08', 'Medicol', '1', 34, 'fghfgh', 'CITE', 8, 2023, 6, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A'),
(126, '01-1920-12345', 'Uchi Luffy ', 'BSCE', '2023-01-08', 'Medicol', '1', 10, 'sdfsdf', 'CITE', 9, 2023, 6, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A'),
(127, '01-1920-12345', 'Uchi Luffy ', 'BSA', '2023-01-09', 'Medicol', '1', 20, 'asdasdasd', 'CMA', 10, 2023, 6, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A'),
(128, '01-1920-12345', 'Uchi Luffy ', 'BSA', '2023-01-12', 'Bioflu', '1', 6, 'dfgfdg', 'CMA', 11, 2023, 0, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A'),
(129, '1111111', 'bryan starl ', 'BSBA', '2023-01-15', 'Diatabs', '1', 6, 'asdsad', 'SHS', 12, 2023, 0, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A'),
(130, '1111111', 'bryan starl ', 'BSIT', '2023-01-15', 'Diatabs', '1', 5, 'asdsad', 'CITE', 2, 2023, 0, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A'),
(131, '1111111', 'bryan starl ', 'BSCE', '2023-01-15', 'Diatabs', '1', 4, 'asdasdas', 'CAHS', 1, 2023, 0, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A'),
(132, '01-1920-12345', 'Uchi Luffy ', 'BSCE', '2023-01-29', 'Medicol', '1', 5, 'qwe', 'CMA', 1, 2023, 0, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A'),
(133, '01-1920-12345', 'Uchi Luffy ', 'BSCE', '2023-01-29', 'Biogesic', '1', 8, '123', 'CMA', 12, 2023, 64, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A'),
(134, '01-1920-12345', 'Uchi Luffy ', 'BSCE', '2023-01-29', 'Medicol', '1', 5, '123', 'CMA', 1, 2023, 5, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A'),
(135, '01-1920-12345', 'Uchi Luffy ', 'BSCE', '2023-01-29', 'Alaxan', '1', 6, '123', 'CMA', 1, 2023, 6, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A'),
(136, '01-1920-12345', 'Ernest Sacdal', 'BSCE', '2023-01-31', 'Medicol', '2', 5, '123', 'CELA', 2, 2023, 10, 'Pula cab', '098098-', 'Monkey D. luffy', '091234567812', 'Male', '', 'qwe', '', 'qwe'),
(137, '01-1920-12345', 'Ernest Sacdal', 'BSCE', '2023-01-31', 'Medicol', '2', 5, 'ew', 'CITE', 1, 2023, 10, 'Pula cab', '098098-', 'Monkey D. luffy', '091234567812', 'Male', '3', 'asd', '', 'asd'),
(138, '01-1920-12345', 'Ernest Sacdal', 'BSCE', '2023-01-31', 'Medicol', '2', 5, '123', 'CITE', 1, 2023, 10, 'Pula cab', '098098-', 'Monkey D. luffy', '091234567812', 'Male', '3', '123', 'qwe', 'qwe'),
(145, '01-1920-05878', 'Ernest Mikhail Sacdal', 'BSIT', '2023-02-01', 'Diatabs', '1', 9, '123', 'SHS', 2, 2023, 9, 'N/A', '09772929879', 'Mary Joyce Reyes', '09123456789', 'N/A', '3', 'N/A', 'N/A', 'N/A'),
(146, '01-1920-05878', 'Ernest Mikhail Sacdal', 'BSIT', '2023-01-01', 'Biogesic', '1', 8, '123', 'SHS', 2, 2023, 8, 'N/A', '09772929879', 'Mary Joyce Reyes', '09123456789', 'N/A', '3', 'N/A', 'N/A', 'N/A'),
(147, '01-1920-05878', 'Ernest Mikhail Sacdal', 'BSIT', '2023-02-01', 'Medicol', '1', 5, '123', 'SHS', 2, 2023, 5, 'N/A', '09772929879', 'Mary Joyce Reyes', '09123456789', 'N/A', '3', 'N/A', 'N/A', 'N/A'),
(148, '01-1920-05878', 'Ernest Mikhail Sacdal', 'BSIT', '2023-02-07', 'Bioflu', '1', 7, '123', 'SHS', 2, 2023, 7, 'N/A', '09772929879', 'Mary Joyce Reyes', '09123456789', 'N/A', '3', 'N/A', 'N/A', 'N/A'),
(149, '01-1920-12345', 'Ernest Mikhail Sacdal', 'BSIT', '2023-02-15', 'Alaxan', '2', 6, 'qwe', 'CITE', 2, 2023, 12, 'Pula cab', '09772929879', 'Monkey D. luffy', '091234567812', 'Male', '3', 'wqe', 'qwe', 'qwe'),
(150, '01-1920-12345', 'Ernest Mikhail Sacdal', 'BSIT', '2023-02-15', 'Alaxan', '2', 6, 'qwe', 'CITE', 2, 2023, 12, '', '', '', '', '', '', 'qwe', 'qwe', 'qwe'),
(151, '01-1920-12345', 'Ernest Mikhail Sacdal', 'BSIT', '2023-02-15', 'Alaxan', '2', 6, 'swqade', 'CITE', 2, 2023, 12, '', '', '', '', '', '', '', 'asd', 'asd'),
(152, '01-1920-12345', 'Ernest Mikhail Sacdal', 'BSIT', '2023-02-15', 'Alaxan', '2', 6, 'qwe', 'CITE', 2, 2023, 12, '', '', '', '', '', '', 'qwe', 'qwe', 'qwe'),
(153, '01-1920-12345', 'Ernest Mikhail Sacdal', 'BSCE', '2023-02-15', 'Biogesic', '1', 8, '123', 'CAHS', 2, 2025, 8, '', '', '', '', '', '', '123', '123', '123'),
(154, '01-1920-12345', 'Ernest Mikhail Sacdal', 'BSIT', '2023-02-15', 'Lomotil', '1', 5, '123', 'CAHS', 2, 2025, 5, '', '', '', '', '', '', 'qwe', 'qwe', 'qwe'),
(155, '01-1920-12345', 'er', 'BSCE', '2023-02-16', 'Alaxan', '3', 6, '123', 'CITE', 2, 2023, 18, '', '', '', '', '', '', '123', '123', '123'),
(156, '01-1920-12345', 'Ernest Mikhail Sacdal', 'BSIT', '2023-02-16', 'Lomotil', '3', 5, '123', 'CITE', 2, 2023, 15, '', '', '', '', '', '', '123', '123', '123'),
(157, '01-1920-12345', 'Ernest Mikhail Sacdal', 'BSIT', '2023-02-16', 'Alaxan', '36', 6, 'qwe', 'CITE', 2, 2023, 216, '', '', '', '', '', '', 'qwe', 'qwe', 'qwe'),
(158, '01-1920-12345', 'Ernest Mikhail Sacdal', 'BSCE', '2023-02-16', 'Alaxan', '5', 6, 'qwe', 'CITE', 2, 2023, 30, '', '', '', '', '', '', 'qwe', 'qwe', 'qwe'),
(159, '01-1920-12345', 'Ernest Mikhail Sacdal', 'BSIT', '2023-02-16', 'Alaxan', '4', 6, '123', 'CITE', 2, 2023, 24, '', '', '', '', '', '', '123', '', ''),
(160, '01-1920-12345', 'ernest sacdal', 'BSIT', '2023-02-17', 'Alaxan', '1', 6, '123', 'CCJE', 2, 2023, 6, '', '', '', '', '', '', '123', '', ''),
(161, '01-1920-12345', 'ernest sacdal', 'BSIT', '2023-02-17', 'Alaxan', '1', 6, '123', 'CCJE', 2, 2023, 6, '', '', '', '', '', '', '', '', ''),
(162, '01-1920-12345', 'Ernest Mikhail Sacdal', 'BSIT', '2023-02-18', 'Alaxan', '2', 6, '123', 'CITE', 2, 2023, 12, '', '', '', '', '', '', '', '', ''),
(163, '01-1920-12345', 'Ernest Mikhail Sacdal', 'BSIT', '2023-02-18', 'Biogesic', '2', 8, '123', 'CITE', 2, 2023, 16, '', '', '', '', '', '', '', '', ''),
(164, '01-1920-12345', 'Ernest Mikhail Sacdal', 'BSIT', '2023-02-18', 'Alaxan', '2', 6, '123', 'CITE', 2, 2023, 12, '', '', '', '', '', '', '', '', ''),
(165, '01-1920-12345', 'Ernest Mikhail Sacdal', 'BSIT', '2023-02-18', 'Alaxan', '2', 6, '123', 'CAS', 2, 2023, 12, '', '', '', '', '', '', '', '', ''),
(167, '01-1920-12345', 'Ernest Mikhail Sacdal', 'BSIT', '2023-02-19', 'None', '0', 0, '', 'CAS', 2, 2023, 0, '', '', '', '', '', '', '', '', ''),
(168, '01-1920-12345', 'Ernest Mikhail Sacdal', 'BSIT', '2023-02-19', 'None', '0', 0, '', 'CITE', 2, 2023, 0, '', '', '', '', '', '', '', '', ''),
(169, '01-1920-12345', 'Ernest Mikhail Sacdal', 'BSIT', '2023-02-19', 'None', '0', 0, '', 'CAHS', 2, 2023, 0, '', '', '', '', '', '', '', '', ''),
(170, '01-1920-12345', 'Ernest Mikhail Sacdal', 'BSIT', '2023-02-19', 'Coamoxiclav', '1', 5, '', 'CITE', 2, 2023, 5, 'Pula cab', '', '', '', '', '', '', '', ''),
(171, '01-1920-12345', 'Ernest Mikhail Sacdal', 'BSIT', '2023-02-20', 'Coamoxiclav', '4', 5, '', 'CITE', 2, 2023, 20, '', '', '', '', '', '', '', '', ''),
(172, '01-1920-12345', 'Ernest Mikhail Sacdal', 'BSIT', '2023-02-20', 'Coamoxiclav', '1', 5, '', 'CITE', 1, 2023, 5, '', '', '', '', '', '', '', '', ''),
(174, '01-1920-12345', 'Uchi Luffy', 'BSCE', '2023-02-21', 'Bioflu', '1', 7, '123', 'CMA', 2, 2023, 7, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '4', 'N/A', 'N/A', 'N/A'),
(175, '01-1920-12345', 'Uchi Luffy', 'BSCE', '2023-02-21', 'None', '1', 0, 'asdsda', 'CMA', 2, 2023, 0, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '4', 'N/A', 'N/A', 'N/A'),
(176, '01-1920-05878', 'Ernest Mikhail Sacdal', 'BSIT', '2023-02-21', 'Biogesic', '1', 8, '123', 'SHS', 2, 2023, 8, 'N/A', '09772929879', 'Mary Joyce Reyes', '09123456789', 'N/A', '3', 'N/A', 'N/A', 'N/A'),
(177, '01-1920-05878', 'Ernest Mikhail Sacdal', 'BSIT', '2023-02-21', 'Diatabs', '1', 9, '123', 'SHS', 2, 2023, 9, 'N/A', '09772929879', 'Mary Joyce Reyes', '09123456789', 'N/A', '3', 'N/A', 'N/A', 'N/A'),
(178, '01-1920-05878', 'Ernest Mikhail Sacdal', 'BSIT', '2023-02-21', 'Bioflu', '1', 7, '1', 'CAHS', 2, 2023, 7, 'N/A', '09772929879', 'Mary Joyce Reyes', '09123456789', 'N/A', '3', 'N/A', 'N/A', 'N/A'),
(179, '01-1920-05878', 'Ernest Mikhail Sacdal', 'BSIT', '2023-02-21', 'Bioflu', '1', 7, '123', 'SHS', 2, 2023, 7, 'N/A', '09772929879', 'Mary Joyce Reyes', '09123456789', 'N/A', '3', 'N/A', 'N/A', 'N/A'),
(180, '01-1920-12345', 'Uchi Luffy', 'BSIT', '2023-02-21', 'Alaxan', '1', 6, '123', 'CMA', 2, 2023, 6, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '2', '', '', ''),
(181, '01-1920-12345', 'Uchi Luffy', 'BSIT', '2023-02-21', 'Alaxan', '2', 6, '123', 'CAHS', 2, 2023, 12, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '2', '', '', ''),
(182, '01-1920-12345', 'Uchi Luffy', 'BSIT', '2023-02-21', 'None', '0', 0, '123', 'CMA', 2, 2023, 0, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '2', '', '', ''),
(183, '1', 'qweqwe', 'BSA', '2023-02-21', 'Alaxan', '2', 6, '123', 'CITE', 1, 2024, 12, 'Pula cab', '09772929879', 'Monkey D. luffy', '091234567812', 'Male', '3', '', '', ''),
(184, '01-1920-05878', 'Ernest Mikhail Sacdal', 'BSIT', '2023-02-28', 'Biogesic', '1', 8, '123', 'SHS', 2, 2023, 8, 'N/A', '09772929879', 'Mary Joyce Reyes', '09123456789', 'N/A', '3', 'N/A', 'N/A', 'N/A'),
(185, '01-1920-05878', 'Ernest Mikhail Sacdal', 'BSIT', '2023-02-28', 'Biogesic', '1', 8, '123', 'SHS', 2, 2023, 8, 'N/A', '09772929879', 'Mary Joyce Reyes', '09123456789', 'N/A', '3', 'N/A', 'N/A', 'N/A'),
(186, '01-1920-12345', 'Uchi Luffy', 'BSBA', '2023-02-28', 'Alaxan', '1', 6, '123', 'CMA', 2, 2023, 6, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '0', 'N/A', 'N/A', 'N/A'),
(187, '01-1920-12345', 'Uchi Luffy', 'BSBA', '2023-02-28', 'Biogesic', '1', 8, '123', 'CMA', 2, 2023, 8, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '0', 'N/A', 'N/A', 'N/A'),
(188, '01-1920-12345', 'Uchi Luffy', '2,BSBA', '2023-02-28', 'Biogesic', '1', 8, '123', 'CMA', 2, 2023, 8, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '0', 'N/A', 'N/A', 'N/A'),
(189, '01-1920-05878', 'Ernest Mikhail Sacdal', 'BSIT', '2023-02-28', 'Biogesic', '1', 8, '123', 'SHS', 2, 2023, 8, 'N/A', '09772929879', 'Mary Joyce Reyes', '09123456789', 'N/A', '3', 'N/A', 'N/A', 'N/A'),
(190, '01-1920-05878', 'Ernest Mikhail Sacdal', 'BSIT', '2023-02-28', 'Bioflu', '1', 7, '123', 'SHS', 2, 2023, 7, 'N/A', '09772929879', 'Mary Joyce Reyes', '09123456789', 'N/A', '3', 'N/A', 'N/A', 'N/A'),
(191, '01-1920-05878', 'Ernest Mikhail Sacdal', 'BSIT', '2023-02-28', 'Bioflu', '1', 7, '123', 'SHS', 2, 2023, 7, 'N/A', '09772929879', 'Mary Joyce Reyes', '09123456789', 'N/A', '3', 'N/A', 'N/A', 'N/A'),
(192, '01-1920-05878', 'Ernest Mikhail Sacdal', 'BSIT', '2023-02-28', 'Bioflu', '1', 7, '123', 'SHS', 2, 2023, 7, 'N/A', '09772929879', 'Mary Joyce Reyes', '09123456789', 'N/A', '3', 'N/A', 'N/A', 'N/A'),
(193, '01-1920-12345', 'Uchi Luffy', '2,BSBA', '2023-02-28', 'Bioflu', '1', 7, '123', 'CMA', 2, 2023, 7, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '0', 'N/A', 'N/A', 'N/A'),
(194, '01-1920-12345', 'Uchi Luffy', 'BSIT', '2023-02-28', 'Bioflu', '1', 8, '123', 'CMA', 2, 2023, 8, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '2', 'N/A', 'N/A', 'N/A'),
(195, '01-1920-12345', 'Uchi Luffy', 'BSCE', '2023-02-28', 'Biogesic', '1', 8, '123333222', 'CMA', 2, 2023, 8, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '4', 'N/A', 'N/A', 'N/A'),
(196, '01-1920-12345', 'Uchi Luffy', 'BSCE', '2023-02-28', 'Biogesic', '1', 8, '123', 'CMA', 2, 2023, 8, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '4', 'N/A', 'N/A', 'N/A'),
(197, '01-1920-12345', 'Uchi Luffy', 'BSCE', '2023-02-28', 'Bioflu', '1', 7, '123', 'CMA', 2, 2024, 7, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '4', 'N/A', 'N/A', 'N/A'),
(198, '01-1920-05878', 'Ernest Mikhail Sacdal', 'BSIT', '2023-02-28', 'Bioflu', '1', 7, '123', 'SHS', 2, 2024, 7, 'N/A', '09772929879', 'Mary Joyce Reyes', '09123456789', 'N/A', '3', 'N/A', 'N/A', 'N/A'),
(199, '01-1920-12345', 'Uchi Luffy', 'BSCE', '2023-03-02', 'Bioflu', '1', 7, '123', 'CAS', 3, 2023, 7, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '1st Year', 'N/A', 'N/A', 'N/A'),
(200, '01-1920-12345', 'Uchi Luffy', 'BSCE', '2023-03-02', 'Biogesic', '1', 8, '123', 'CAS', 3, 2023, 8, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '1st Year', 'N/A', 'N/A', 'N/A'),
(201, '01-1920-12345', 'Uchi Luffy', 'BSCE', '2023-03-02', 'Biogesic', '1', 8, '123', 'CAS', 3, 2023, 8, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '1st Year', 'N/A', 'N/A', 'N/A'),
(202, '01-1920-12345', 'Uchi Luffy', 'BSCE', '2023-03-02', 'Biogesic', '1', 8, '123', 'CAS', 3, 2023, 8, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '1st Year', 'N/A', 'N/A', 'N/A'),
(203, '01-1920-12345', 'Uchi Luffy', 'BSCE', '2023-03-02', 'Bioflu', '1', 7, '123', 'CAS', 3, 2023, 7, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '1st Year', 'N/A', 'N/A', 'N/A'),
(204, '01-1920-05878', 'Ernest Mikhail Sacdal', 'BSIT', '2023-03-02', 'Bioflu', '1', 7, '123', 'SHS', 3, 2023, 7, 'N/A', '09772929879', 'Mary Joyce Reyes', '09123456789', 'N/A', '3', 'N/A', 'N/A', 'N/A'),
(205, '01-1920-12345', 'Uchi Luffy', 'BSCE', '2023-03-02', 'Bioflu', '1', 8, '123', 'CAS', 3, 2023, 8, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '1st Year', 'N/A', 'N/A', 'N/A'),
(206, '01-1920-05878', 'Ernest Mikhail Sacdal', 'BSIT', '2023-03-02', 'Bioflu', '1', 8, '123', 'SHS', 3, 2023, 8, 'N/A', '09772929879', 'Mary Joyce Reyes', '09123456789', 'N/A', '3', 'N/A', 'N/A', 'N/A'),
(207, '01-1920-05878', 'Ernest Mikhail Sacdal', 'BSIT', '2023-03-02', 'Bioflu', '1', 8, '123', 'SHS', 3, 2023, 8, 'N/A', '09772929879', 'Mary Joyce Reyes', '09123456789', 'N/A', '3', 'N/A', 'N/A', 'N/A'),
(208, '01-1920-05878', 'Ernest Mikhail Sacdal', 'BSIT', '2023-03-02', 'Bioflu', '1', 7, '123', 'SHS', 3, 2023, 7, 'N/A', '09772929879', 'Mary Joyce Reyes', '09123456789', 'N/A', '3', 'N/A', 'N/A', 'N/A'),
(209, '01-1920-12345', 'Uchi Luffy', 'BSCE', '2023-03-02', 'Bioflu', '1', 7, '123', 'CAS', 3, 2023, 7, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '1st Year', 'N/A', 'N/A', 'N/A'),
(210, '01-1920-12345', 'Uchi Luffy', 'BSCE', '2023-03-02', 'Bioflu', '1', 7, '123', 'CAS', 3, 2023, 7, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '1st Year', 'N/A', 'N/A', 'N/A'),
(211, '01-1920-12345', 'Uchi Luffy', 'BSCE', '2023-03-02', 'Bioflu', '1', 7, '123', 'CAS', 3, 2023, 7, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '1st Year', 'N/A', 'N/A', 'N/A'),
(212, '01-1920-12345', 'Uchi Luffy', 'BSCE', '2023-03-02', 'Bioflu', '1', 7, '123', 'CAS', 3, 2025, 7, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '1st Year', 'N/A', 'N/A', 'N/A'),
(213, '01-1920-12345', 'Uchi Luffy', 'BSCE', '2023-03-09', 'Bioflu', '5', 7, '123', 'CAS', 3, 2023, 35, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '1st Year', '123', '', '123'),
(214, '01-1920-12348', 'Ernest Mikhail Sacdal', 'BSIT', '2023-03-09', 'Diatabs', '1', 9, '1', 'CITE', 3, 2023, 9, 'Pula cab', '09772929879', 'Monkey D. luffy', '091234567812', 'Male', '3', '1', '1', '1'),
(215, '01-1920-12345', 'Uchi Luffy', 'BSCE', '2023-03-09', 'Alaxan', '1', 9, '123', 'CAS', 3, 2023, 9, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '1st Year', 'N/A', 'N/A', 'N/A'),
(216, '01-1920-12345', 'Uchi Luffy', 'BSCE', '2023-03-09', 'Bioflu', '1', 7, '123', 'CAS', 3, 2023, 7, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '1st Year', 'N/A', 'N/A', 'N/A'),
(217, '01-1920-12345', 'Uchi Luffy', 'BSCE', '2023-03-09', 'Alaxan', '28', 7, '123', 'CAS', 3, 2023, 196, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '1st Year', '123', '123', '123'),
(218, '01-1920-12345', 'Uchi Luffy', 'BSCE', '2023-03-10', 'None', '0', 0, '123', 'CAS', 3, 2023, 0, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '1st Year', '', '', ''),
(219, '01-1920-12345', 'Uchi Luffy', 'BSCE', '2023-03-10', 'Bioflu', '23', 7, '123', 'CAS', 3, 2023, 161, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '1st Year', '123', '', ''),
(220, '01-1920-12345', 'Uchi Luffy', 'BSCE', '2023-03-10', 'Bioflu', '2', 7, '123', 'CAS', 3, 2023, 14, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '1st Year', '', '', ''),
(221, '01-1920-12345', 'Uchi Luffy', 'BSCE', '2023-03-13', 'Advil', '5', 11, '123', 'CAS', 3, 2023, 55, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '1st Year', '', '', ''),
(222, '01-1920-058788', 'qwe', 'BSCE', '2023-03-13', 'Advil', '5', 11, 'qwe', 'CAHS', 3, 2023, 55, 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', '', '', ''),
(223, '01-1920-05878', 'Ernest Mikhail Sacdal', 'BSIT', '2023-03-13', 'Advil', '5', 11, '123', 'SHS', 3, 2023, 55, 'N/A', '09772929879', 'Mary Joyce Reyes', '09123456789', 'N/A', '3', '', '', ''),
(224, '01-1920-12345', 'Uchi Luffy', 'BSCE', '2023-03-14', 'Advil', '5', 11, '123', 'CAS', 3, 2023, 55, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '1st Year', '', '', ''),
(225, '01-1920-12345', 'Uchi Luffy', 'BSCE', '2023-03-16', 'Diatabs', '1', 9, '123', 'CAS', 3, 2023, 9, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '1st Year', 'N/A', 'N/A', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `rappoint`
--

CREATE TABLE `rappoint` (
  `id` int(11) NOT NULL,
  `dname` varchar(40) NOT NULL,
  `stid` varchar(40) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `day` varchar(40) NOT NULL,
  `time` varchar(40) NOT NULL,
  `reason` varchar(40) NOT NULL,
  `status` varchar(6) NOT NULL DEFAULT '0',
  `cdate` datetime NOT NULL DEFAULT current_timestamp(),
  `aumail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rappoint`
--

INSERT INTO `rappoint` (`id`, `dname`, `stid`, `fname`, `date`, `day`, `time`, `reason`, `status`, `cdate`, `aumail`) VALUES
(106, 'Dr. John Smith', '01-1920-12345', 'Ernest Mikhail Sacdal', '2023-02-23', 'Thursday', '2:00 PM - 2:30 PM', '123', '1', '2023-03-16 23:30:27', 'ersa.sacdal.au@phinmaed.com'),
(107, 'Dr. John Smith', '01-1920-12345', 'Ernest Mikhail Sacdal', '2023-02-23', 'Thursday', '3:00 PM - 3:30 PM', '123', '1', '2023-03-17 00:09:37', 'ersa.sacdal.au@phinmaed.com'),
(108, 'Dr. John Smith', '01-1920-12345', 'Ernest Mikhail Sacdal', '2023-02-23', 'Thursday', '1:30 PM - 2:00 PM', 'qwe', '1', '2023-03-17 00:18:46', 'ersa.sacdal.au@phinmaed.com'),
(109, 'Dr. John Smith', '01-1920-12345', 'Ernest Mikhail Sacdal', '2023-02-23', 'Thursday', '1:30 PM - 2:00 PM', 'qwe', '1', '2023-03-17 00:18:48', 'ersa.sacdal.au@phinmaed.com'),
(110, 'Dr. John Smith', '01-1920-12345', 'Ernest Mikhail Sacdal', '2023-02-22', 'Wednesday', '1:30 PM - 2:00 PM', '123', '1', '2023-03-17 00:19:38', 'ersa.sacdal.au@phinmaed.com'),
(111, 'Dr. John Smith', '01-1920-12345', 'Ernest Mikhail Sacdal', '2023-02-22', 'Wednesday', '2:00 PM - 2:30 PM', 'qwe', '1', '2023-03-17 00:21:05', 'ersa.sacdal.au@phinmaed.com'),
(112, 'Dr. John Smith', '01-1920-12345', 'Ernest Mikhail Sacdal', '2023-02-23', 'Thursday', '9:30 AM - 10:00 AM', 'Qwe', '1', '2023-03-17 00:26:25', 'ersa.sacdal.au@phinmaed.com');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(255) NOT NULL,
  `stid` varchar(40) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(40) NOT NULL,
  `size` int(255) NOT NULL,
  `download` varchar(255) NOT NULL,
  `added` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `stid`, `type`, `name`, `size`, `download`, `added`) VALUES
(14, '01-1920-12345', 'Sample docu', 'erich math.pdf', 468650, '8', '2023-01-25'),
(15, '01-1920-12345', 'Sample docu', 'Zombatar_1.jpg', 9855, '2', '2023-01-25'),
(16, '01-1920-12345', 'Sample docu', 'licensed-image.jpg', 282368, '1', '2023-01-25'),
(18, '01-1920-12345', 'BC', 'srm.png', 10084, '2', '2023-02-19'),
(19, '01-1920-12345', 'BC', '4.png', 158321, '1', '2023-02-19'),
(20, '01-1920-12345', '123', 'srm.png', 10084, '0', '2023-03-09'),
(21, '01-1920-12345', 'BC', '6411df2fd2a1d.pdf', 3686731, '1', '2023-03-15');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(11) NOT NULL,
  `rem` mediumtext NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`id`, `rem`, `date`) VALUES
(1, '<p></p><div style=\"text-align: center;\"><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; color: rgb(10, 10, 10); font-family: &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; text-align: start;\"><div dir=\"auto\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\"><span style=\"font-weight: bolder;\">Hotlines Numbers:</span></div><div dir=\"auto\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">&nbsp;</div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; color: rgb(10, 10, 10); font-family: &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; text-align: start;\"><div dir=\"auto\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">City Social Welfare and Development Office (CSWDO)</div><div dir=\"auto\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">Smart:&nbsp;<span style=\"font-weight: bolder;\">0919-081-1345</span></div><div dir=\"auto\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">&nbsp;</div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; color: rgb(10, 10, 10); font-family: &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; text-align: start;\"><div dir=\"auto\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">City Disaster Risk Reduction and Management Office (CDRRMO)</div><div dir=\"auto\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">Smart:&nbsp;<span style=\"font-weight: bolder;\">0919-081-1394</span></div><div dir=\"auto\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">Globe:&nbsp;<span style=\"font-weight: bolder;\">0917-851-1320</span></div><div dir=\"auto\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">Landline:&nbsp;<span style=\"font-weight: bolder;\">(044)940-0161</span></div><div dir=\"auto\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\"><span style=\"font-weight: bolder;\">Hospitals</span></div><div dir=\"auto\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\"><div dir=\"auto\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">Smart:&nbsp;<span style=\"font-weight: bolder;\">0919-081-1394</span></div><div dir=\"auto\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">Globe:&nbsp;<span style=\"font-weight: bolder;\">0917-851-1320</span></div><div dir=\"auto\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">Landline:&nbsp;<span style=\"font-weight: bolder;\">(044)940-0161</span></div></div></div></div><p></p>', '2023-03-09 14:50:22');

-- --------------------------------------------------------

--
-- Table structure for table `rlogs`
--

CREATE TABLE `rlogs` (
  `id` int(255) NOT NULL,
  `stid` varchar(40) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `course` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `meds` varchar(40) NOT NULL,
  `qty` varchar(40) NOT NULL,
  `rate` int(40) NOT NULL,
  `reason` varchar(40) NOT NULL,
  `department` varchar(40) NOT NULL,
  `month` int(40) NOT NULL,
  `year` int(40) NOT NULL,
  `stotal` int(40) NOT NULL,
  `address` varchar(255) NOT NULL DEFAULT 'N/A',
  `con` varchar(255) NOT NULL,
  `guardian` varchar(255) NOT NULL,
  `gcnumber` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL DEFAULT 'N/A',
  `level` varchar(255) NOT NULL DEFAULT 'N/A',
  `treat` varchar(255) NOT NULL DEFAULT 'N/A',
  `physical` varchar(255) NOT NULL DEFAULT 'N/A',
  `plan` varchar(255) NOT NULL DEFAULT 'N/A',
  `status` varchar(255) NOT NULL DEFAULT '0',
  `image` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rlogs`
--

INSERT INTO `rlogs` (`id`, `stid`, `fullname`, `course`, `date`, `meds`, `qty`, `rate`, `reason`, `department`, `month`, `year`, `stotal`, `address`, `con`, `guardian`, `gcnumber`, `gender`, `level`, `treat`, `physical`, `plan`, `status`, `image`) VALUES
(65, '01-1920-12345', 'Ernest Mikhail Sacdal', 'BSIT', '2023-03-16 23:49:22', 'Alaxann', '1', 7, '123', 'CITE', 3, 2023, 7, 'N/A', '', 'Monkey D. luffy', '091234567812', 'N/A', '3rd Year', 'N/A', 'N/A', 'N/A', '1', '6411eb53ea6bd-appointment.png'),
(66, '01-1920-12345', 'Ernest Mikhail Sacdal', 'BSIT', '2023-03-16 23:53:31', 'Biofluuuuuuu', '1', 7, '123', 'CITE', 3, 2023, 7, 'N/A', '', 'Monkey D. luffy', '091234567812', 'N/A', '3rd Year', 'N/A', 'N/A', 'N/A', '1', '6411eb53ea6bd-appointment.png'),
(67, '01-1920-12345', 'Ernest Mikhail Sacdal', 'BSIT', '2023-03-16 23:53:43', 'Advil', '1', 11, '123', 'CITE', 3, 2023, 11, 'N/A', '', 'Monkey D. luffy', '091234567812', 'N/A', '3rd Year', 'N/A', 'N/A', 'N/A', '1', '6411eb53ea6bd-appointment.png'),
(68, '01-1920-12345', 'Ernest Mikhail Sacdal', 'BSIT', '2023-03-16 23:54:12', 'Lomotil', '1', 5, '123', 'CITE', 3, 2023, 5, 'N/A', '', 'Monkey D. luffy', '091234567812', 'N/A', '3rd Year', 'N/A', 'N/A', 'N/A', '1', '6411eb53ea6bd-appointment.png'),
(69, '01-1920-12345', 'Ernest Mikhail Sacdal', 'BSIT', '2023-03-16 23:56:05', 'Advil', '1', 11, '123', 'CITE', 3, 2023, 11, 'N/A', '', 'Monkey D. luffy', '091234567812', 'N/A', '3rd Year', 'N/A', 'N/A', 'N/A', '1', '6411eb53ea6bd-appointment.png'),
(70, '01-1920-12345', 'Ernest Mikhail Sacdal', 'BSIT', '2023-03-16 23:56:31', 'Advil', '1', 11, '123', 'CITE', 3, 2023, 11, 'N/A', '', 'Monkey D. luffy', '091234567812', 'N/A', '3rd Year', 'N/A', 'N/A', 'N/A', '1', '6411eb53ea6bd-appointment.png'),
(71, '01-1920-12345', 'Ernest Mikhail Sacdal', 'BSIT', '2023-03-16 23:56:38', 'Alaxann', '1', 7, '123', 'CITE', 3, 2023, 7, 'N/A', '', 'Monkey D. luffy', '091234567812', 'N/A', '3rd Year', 'N/A', 'N/A', 'N/A', '1', '6411eb53ea6bd-appointment.png');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `uname` varchar(40) NOT NULL,
  `namee` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `passw` varchar(80) NOT NULL,
  `added` date NOT NULL DEFAULT current_timestamp(),
  `login_attempts` varchar(40) NOT NULL,
  `attempts` varchar(40) NOT NULL,
  `last_attempt_time` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `uname`, `namee`, `mail`, `contact`, `passw`, `added`, `login_attempts`, `attempts`, `last_attempt_time`) VALUES
(1, 'admin', 'Sample Name', 'ersa.sacdal.au@phinmaed.com', '12345678', '$2y$10$HOSnkdzQuGMQVqcomjq1V.I4j.mV6w6a9LqbDJS6.y27lST7vpnsC', '2023-01-22', '', '5', '1678990139'),
(6, 'admin2', 'Sample Name', 'ersa.sacdal.au@phinmaed.com', '09123456', '$2y$10$SkATe5IRRS764tDq4I20dewOYGQw.vkNbr5AGMKCFPBMdpxlC5FeW', '2023-03-09', '', '0', '1678990204'),
(7, 'admin3', 'Sample name', 'ersa.sacdal.au@phinmaed.com', '09123123123', '$2y$10$oB8UakA5q6IZ.wi1lX/11un1IbGcLJzX2GE7E92QSvZB8JiRHqBxa', '2023-03-10', '', '', ''),
(8, 'admin4', 'Sample admin', 'ersa.sacdal.au@phinmaed.com', '098098908', '$2y$10$ATbfobk0j3tOd2IYjFtB6Ogtpdq1CW6kzA4JNC.8HBqJoNodnlMGy', '2023-03-14', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stid` varchar(40) NOT NULL,
  `aumail` varchar(40) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `bdate` varchar(40) NOT NULL,
  `cnumber` varchar(40) NOT NULL,
  `year` varchar(40) NOT NULL,
  `course` varchar(40) NOT NULL,
  `passw` varchar(80) NOT NULL,
  `guardian` varchar(40) NOT NULL,
  `gcnumber` varchar(40) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp(),
  `department` text NOT NULL,
  `gender` varchar(255) NOT NULL DEFAULT 'N/A',
  `address` varchar(40) NOT NULL DEFAULT 'N/A',
  `image` varchar(255) NOT NULL DEFAULT 'profile-1.png',
  `status` varchar(10) NOT NULL DEFAULT '0',
  `notif` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stid`, `aumail`, `fname`, `lname`, `bdate`, `cnumber`, `year`, `course`, `passw`, `guardian`, `gcnumber`, `created`, `department`, `gender`, `address`, `image`, `status`, `notif`) VALUES
('01-1920-00001', 'sacdalernest02@gmail.com', 'Laurence', 'Javier', '', '09913229913', '1st Year', 'BSA', '$2y$10$HwDOxolRysQ99jX7yAgYeuGZS0/yBcPaZ35BE9sHWRPDJqArCbLt.', 'Kyrie Irving', '091234567812', '2023-03-14', 'CAS', 'Male', 'San Isidro', 'profile-1.png', '0', '1'),
('01-1920-00002', 'ersa.sacdal.au@phinmaed.com', 'Kailee', 'Feliciano', '', '09913229913', '1st Year', 'BSA', '$2y$10$QI7RD7uDPqk.4KVIHjJ7YO40ZkiIZ6BneQAcfxbi1ai1drKsrQMNS', 'Lebron James', '091234567812', '2023-03-14', 'CAS', 'Female', 'Sto. Domingo', 'profile-1.png', '0', '0'),
('01-1920-00003', 'sacdalernest03@gmail', 'Andrew', 'Panganiban', '', '09913229913', '4th Year', 'BSN', '$2y$10$TI3Z8sxsXgz0ST5wk2rBo.UUx5HPkXf386DBTeTFsnjKDLIpP9YBK', 'Ja Morant', '091234567812', '2023-03-14', 'CAHS', 'Male', 'Capt. Pepe', 'profile-1.png', '0', '0'),
('01-1920-00004', 'sacdalernest03@gmail', 'Merry Grace', 'Tanguilig', '', '09913229913', 'SHS', 'SHS', '$2y$10$qKIGmQBprPOMo0Tvxg7c7u9j.ma1JSg9KUCsiSOW/x/myN5L9n1bC', 'Scottie Thompson', '091234567812', '2023-03-14', 'SHS', 'Female', 'Talavera', 'profile-1.png', '0', '1'),
('01-1920-12345', 'ersa.sacdal.au@phinmaed.com', 'Ernest Mikhail', 'Sacdal', '', '09913229913', '3rd Year', 'BSIT', '$2y$10$eEPhIdh/nYHZBga1KcZJv.GlbNpb61mHgfq6Yfx1ASHbEvniHvCe2', 'Ja Morant', '091234567812', '2023-03-14', 'CITE', 'Male', 'Pula', '6411eb53ea6bd-appointment.png', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id` int(10) NOT NULL,
  `meds` varchar(40) NOT NULL,
  `cons` varchar(40) NOT NULL,
  `stotal` varchar(40) NOT NULL,
  `month` varchar(40) NOT NULL,
  `year` varchar(40) NOT NULL,
  `department` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`id`, `meds`, `cons`, `stotal`, `month`, `year`, `department`) VALUES
(34, 'Biofluuuuuuu', '2', '14', '03', '2023', 'CAS'),
(35, 'Advil', '5', '55', '03', '2023', 'CAS'),
(36, 'Advil', '5', '55', '03', '2023', 'qwe'),
(37, 'Advil', '5', '55', '03', '2023', 'SHS'),
(38, 'Advil', '5', '55', '03', '2023', 'CAS'),
(39, 'Diatabs', '1', '9', '3', '2023', 'CAS');

-- --------------------------------------------------------

--
-- Table structure for table `tempapp`
--

CREATE TABLE `tempapp` (
  `id` int(10) NOT NULL,
  `no` varchar(40) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tempapp`
--

INSERT INTO `tempapp` (`id`, `no`, `status`) VALUES
(12, '34', '0'),
(13, '35', '1'),
(14, '36', '0'),
(15, '38', '0'),
(16, '39', '0'),
(17, '40', '0'),
(18, '41', '0'),
(19, '42', '0'),
(20, '43', '0'),
(21, '44', '0'),
(22, '45', '0'),
(23, '46', '0'),
(24, '47', '0'),
(25, '48', '0'),
(26, '49', '0'),
(27, '50', '0'),
(28, '51', '0'),
(29, '52', '0'),
(30, '53', '0'),
(31, '54', '1'),
(32, '55', '0'),
(33, '56', '0'),
(34, '57', '0'),
(35, '58', '0'),
(36, '59', '0'),
(37, '60', '0'),
(38, '61', '0'),
(39, '62', '0'),
(40, '63', '0'),
(41, '64', '0'),
(42, '65', '0'),
(43, '68', '0'),
(44, '72', '0'),
(45, '74', '0');

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `id` int(10) NOT NULL,
  `term` varchar(100) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `cons` varchar(40) NOT NULL,
  `logs` varchar(40) NOT NULL,
  `app` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`id`, `term`, `cost`, `cons`, `logs`, `app`) VALUES
(1, '1st Sem 22-23', '112', '15', '15', '2'),
(2, '2nd Sem 22-23', '112', '15', '15', '2'),
(3, '3rd Sem 22-23', '112', '15', '15', '2'),
(9, '1st SEM 23-24', '82', '11', '11', '4'),
(10, '2nd Sem 23-24', '161', '23', '2', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invhis`
--
ALTER TABLE `invhis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rappoint`
--
ALTER TABLE `rappoint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rlogs`
--
ALTER TABLE `rlogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stid`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempapp`
--
ALTER TABLE `tempapp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `invhis`
--
ALTER TABLE `invhis`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `rappoint`
--
ALTER TABLE `rappoint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rlogs`
--
ALTER TABLE `rlogs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tempapp`
--
ALTER TABLE `tempapp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
