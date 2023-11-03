-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2023 at 09:32 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `ann`, `date`, `status`) VALUES
(31, '<p><div style=\"text-align: center;\"><b style=\"font-size: 36px;\">HI</b></div><br><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32</span><br></p>', '2023-03-09 00:10:30', '1'),
(40, '<div style=\"text-align: center;\"><span style=\"font-weight: bolder; font-size: 36px;\">HI</span></div><p><br><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32</span><br></p>', '2023-03-09 15:11:21', '1'),
(41, '<div style=\"text-align: center;\"><span style=\"font-weight: bolder; font-size: 36px;\">HI</span></div><br><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Contrary\r\n to popular belief, Lorem Ipsum is not simply random text. It has roots \r\nin a piece of classical Latin literature from 45 BC, making it over 2000\r\n years old. Richard McClintock, a Latin professor at Hampden-Sydney \r\nCollege in Virginia, looked up one of the more obscure Latin words, \r\nconsectetur, from a Lorem Ipsum passage, and going through the cites of \r\nthe word in classical literature, discovered the undoubtable source. \r\nLorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus \r\nBonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written \r\nin 45 BC. This book is a treatise on the theory</span><p></p>', '2023-03-09 16:05:37', '1');

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
  `statusB` varchar(10) NOT NULL,
  `statusC` varchar(10) NOT NULL DEFAULT '0',
  `cdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(11, '01-1920-05878', 'Ernest MikhailSacdal', 'John Smith', '2023-02-21', 'Tuesday', '3:00 PM - 3:30 PM', '123', '0', '', '1', '2023-02-25 22:23:37'),
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
(22, '01-1920-05878', 'Ernest Mikhail Sacdal', 'John Smith', '2023-02-23', 'Thursday', '2:00 PM - 2:30 PM', '123', '0', '1', '1', '2023-03-01 22:07:38');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course` text NOT NULL,
  `department_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(7, 'POLSCI', 3),
(8, 'SHS', 4),
(9, 'BSC', 5);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department`) VALUES
(1, 'CITE'),
(2, 'CMA'),
(3, 'CELA'),
(4, 'SHS'),
(5, 'CCJE');

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
  `status` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `dname`, `spe`, `sdate`, `edate`, `time`, `ttime`, `status`) VALUES
(11, 'John Smith', 'Dentist', '2023-02-21', '2023-02-24', '08:00 AM', '05:00 PM', 0),
(14, 'Shaun Murphy', 'Physiciann', '2023-02-24', '2023-02-28', '12:00 PM', '05:30 PM', 0),
(15, 'Drake Ramoray', 'Surgeon', '2023-02-24', '2023-02-28', '10:30 AM', '02:30 PM', 0),
(18, 'Sample Doctor', 'Physician', '2023-02-01', '2023-02-24', '01:00 PM', '04:30 PM', 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `meds`, `quantity`, `price`, `cons`, `status`, `total`) VALUES
(2, 'Alaxan', '29', 6, 69, '0', 378),
(3, 'Bioflu', '53', 7, 18, '0', 126),
(4, 'Biogesic', '0', 8, 20, '1', 144),
(5, 'Diatabs', '31', 9, 2, '0', 18),
(24, 'Advil', '21', 11, 0, '0', 0),
(25, 'Lomotil', '38', 5, 4, '0', 20),
(26, 'Coamoxiclav', '0', 5, 6, '1', 30);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(67, '2023-03-06', '5:06 pm', 'Supply of Bioflu has been restocked. Restock Quantity = 20', 'admin');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(212, '01-1920-12345', 'Uchi Luffy', 'BSCE', '2023-03-02', 'Bioflu', '1', 7, '123', 'CAS', 3, 2025, 7, 'N/A', '091234567812', 'Monkey D. luffy', '091234567812', 'N/A', '1st Year', 'N/A', 'N/A', 'N/A');

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
  `cdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rappoint`
--

INSERT INTO `rappoint` (`id`, `dname`, `stid`, `fname`, `date`, `day`, `time`, `reason`, `status`, `cdate`) VALUES
(47, 'Shaun Murphy', '01-1920-12345', 'Uchi Luffy', '2023-02-27', 'Monday', '1:00 PM - 1:30 PM', '123', '1', '2023-03-02 07:26:10'),
(48, 'Shaun Murphy', '01-1920-12345', 'Uchi Luffy', '2023-02-27', 'Monday', '1:00 PM - 1:30 PM', '123', '1', '2023-03-02 07:26:13'),
(49, 'Shaun Murphy', '01-1920-12345', 'Uchi Luffy', '2023-02-27', 'Monday', '1:00 PM - 1:30 PM', '123', '1', '2023-03-02 07:26:17'),
(50, 'Shaun Murphy', '01-1920-12345', 'Uchi Luffy', '2023-02-26', 'Sunday', '12:30 PM - 1:00 PM', '123', '1', '2023-03-02 07:26:20'),
(51, 'John Smith', '01-1920-05878', 'Ernest Mikhail Sacdal', '2023-02-23', 'Thursday', '3:00 PM - 3:30 PM', '123', '1', '2023-03-02 07:26:40');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `stid`, `type`, `name`, `size`, `download`, `added`) VALUES
(14, '01-1920-12345', 'Sample docu', 'erich math.pdf', 468650, '7', '2023-01-25'),
(15, '01-1920-12345', 'Sample docu', 'Zombatar_1.jpg', 9855, '2', '2023-01-25'),
(16, '01-1920-12345', 'Sample docu', 'licensed-image.jpg', 282368, '1', '2023-01-25'),
(18, '01-1920-12345', 'BC', 'srm.png', 10084, '2', '2023-02-19'),
(19, '01-1920-12345', 'BC', '4.png', 158321, '1', '2023-02-19');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(11) NOT NULL,
  `rem` mediumtext NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`id`, `rem`, `date`) VALUES
(1, '<p></p><div style=\"text-align: center;\"><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; color: rgb(10, 10, 10); font-family: &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; text-align: start;\"><div dir=\"auto\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\"><span style=\"font-weight: bolder;\">Hotlines Numbers:</span></div><div dir=\"auto\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">&nbsp;</div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; color: rgb(10, 10, 10); font-family: &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; text-align: start;\"><div dir=\"auto\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">City Social Welfare and Development Office (CSWDO)</div><div dir=\"auto\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">Smart:&nbsp;<span style=\"font-weight: bolder;\">0919-081-1345</span></div><div dir=\"auto\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">&nbsp;</div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; color: rgb(10, 10, 10); font-family: &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; text-align: start;\"><div dir=\"auto\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">City Disaster Risk Reduction and Management Office (CDRRMO)</div><div dir=\"auto\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">Smart:&nbsp;<span style=\"font-weight: bolder;\">0919-081-1394</span></div><div dir=\"auto\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">Globe:&nbsp;<span style=\"font-weight: bolder;\">0917-851-1320</span></div><div dir=\"auto\" style=\"box-sizing: inherit; margin: 0px; padding: 0px;\">Landline:&nbsp;<span style=\"font-weight: bolder;\">(044)940-0161</span></div></div></div><p></p>', '2023-03-09 14:50:22');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `passw` varchar(40) NOT NULL,
  `cpassw` varchar(255) NOT NULL,
  `added` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `uname`, `namee`, `mail`, `contact`, `passw`, `cpassw`, `added`) VALUES
(1, 'admin', 'Sample Name', 'samplemail@gmail.com', '12345678', '123', '123', '2023-01-22'),
(2, 'admin2', 'Juan Dela Cruz', 'samplemail2@gmail.com', '0917345', '123', '123', '2023-01-22'),
(4, 'admin3', 'Sample Name', 'samplemail3@gmail.com', '12345378', '123', '123', '2023-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stid` varchar(40) NOT NULL,
  `aumail` varchar(40) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `bdate` date NOT NULL,
  `cnumber` varchar(40) NOT NULL,
  `year` varchar(40) NOT NULL,
  `course` varchar(40) NOT NULL,
  `passw` varchar(40) NOT NULL,
  `cpassw` varchar(40) NOT NULL,
  `guardian` varchar(40) NOT NULL,
  `gcnumber` varchar(40) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp(),
  `department` text NOT NULL,
  `gender` varchar(255) NOT NULL DEFAULT 'N/A',
  `address` varchar(40) NOT NULL DEFAULT 'N/A',
  `image` varchar(255) NOT NULL DEFAULT 'profile-1.png',
  `status` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stid`, `aumail`, `fname`, `lname`, `bdate`, `cnumber`, `year`, `course`, `passw`, `cpassw`, `guardian`, `gcnumber`, `created`, `department`, `gender`, `address`, `image`, `status`) VALUES
('01-1920-05878', 'ersa.sacdal@phinmaed.com', 'Ernest Mikhail', 'Sacdal', '2001-07-20', '09772929879', '3', 'BSIT', '123', '123', 'Mary Joyce Reyes', '09123456789', '2022-10-19', 'SHS', 'N/A', 'N/A', 'profile-1.png', '0'),
('01-1920-12345', 'ernest1@au.phinmaed.com', 'Uchi', 'Luffy', '2001-07-20', '091234567812', '1st Year', 'BSCE', '123', '123', 'Monkey D. luffy', '091234567812', '2022-10-19', 'CAS', 'N/A', 'N/A', 'Zombatar_1 (10).jpg', '0'),
('01-1920-12346', '', 'asdasd', 'Reyes', '0000-00-00', '', '0', 'SHS', '123', '123', 'Monkey D. luffy', '091234567812', '2023-02-26', 'SHS', 'N/A', 'N/A', 'profile-1.png', '0'),
('01-1920-67890', '', 'Mary Joyce', 'Reyes', '0000-00-00', '', '1', 'BSIT', '123', '123', 'Monkey D. luffy', '091234567812', '2023-02-26', 'CAS', 'N/A', 'N/A', 'profile-1.png', '0'),
('1111111', 'sorar384@gmail.com', 'bryan', 'starl', '2023-01-29', '09123456789', '4', 'BSCE', '123', '123', 'sorar', '345345', '2023-01-14', 'CAHS', 'N/A', 'N/A', 'profile-1.png', '0'),
('123123', '', 'qwer', 'asdsda', '0000-00-00', '', '2', 'BSIT', '123', '123', 'Sample Guardian', '091234567813', '2023-02-26', 'CITE', 'N/A', 'N/A', 'profile-1.png', '0');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`id`, `meds`, `cons`, `stotal`, `month`, `year`, `department`) VALUES
(21, 'Bioflu', '1', '7', '1', '2023', 'SHS'),
(22, 'Biogesic', '1', '8', '1', '2023', 'CITE'),
(23, 'Biogesic', '1', '8', '2', '2023', 'SHS'),
(24, 'Biogesic', '1', '8', '2', '2023', 'CMA'),
(25, 'Bioflu', '1', '7', '2', '2023', 'SHS'),
(26, 'Bioflu', '1', '7', '2', '2023', 'CITE'),
(27, 'Bioflu', '1', '7', '3', '2023', 'CITE'),
(28, 'Bioflu', '1', '7', '3', '2023', 'CMA'),
(29, 'Bioflu', '1', '7', '3', '2023', 'CMA');

-- --------------------------------------------------------

--
-- Table structure for table `tempapp`
--

CREATE TABLE `tempapp` (
  `id` int(10) NOT NULL,
  `no` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`id`, `term`, `cost`, `cons`, `logs`, `app`) VALUES
(1, '1st Sem 22-23', '112', '15', '15', '2'),
(2, '2nd Sem 22-23', '112', '15', '15', '2'),
(3, '3rd Sem 22-23', '112', '15', '15', '2');

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
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `invhis`
--
ALTER TABLE `invhis`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `rappoint`
--
ALTER TABLE `rappoint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rlogs`
--
ALTER TABLE `rlogs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tempapp`
--
ALTER TABLE `tempapp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
