-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2024 at 02:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbweb23`
--
CREATE DATABASE IF NOT EXISTS `dbweb23` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dbweb23`;

-- --------------------------------------------------------

--
-- Table structure for table `tbproduct`
--

CREATE TABLE `tbproduct` (
  `proid` int(11) NOT NULL,
  `proname` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `detail` text NOT NULL,
  `pic` varchar(30) NOT NULL,
  `typeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbproduct`
--

INSERT INTO `tbproduct` (`proid`, `proname`, `price`, `detail`, `pic`, `typeid`) VALUES
(1, 'iPhone 15 Pro fgfhfd', 45905, '<li>ความจุ 256GB</li>\r\n<li>สีไทเทเนียมขาว</li>', '202409111080516164.jpg', 2),
(2, 'iPhone 15 Pro Max', 48900, '<li>ความจุ 256GB</li>\r\n<li>สีไทเทเนียมดำ</li>', 'iphone-15-pro-max.jpg', 1),
(8, 'i5', 25000, 'fdhgj', '20240911297073638.jpeg', 2),
(9, 'ngvh', 2400, 'hghdfgdf', '202409111501511321.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbstudent`
--

CREATE TABLE `tbstudent` (
  `stdid` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbstudent`
--

INSERT INTO `tbstudent` (`stdid`, `firstname`, `lastname`, `address`) VALUES
(1, 'ปรเมศ', 'วิหคโต', '6/2 หมู่ 2 ต.บ้านหลวง อ.เสนา จ.พระนครศรีอยุธยา'),
(2, 'ณณิชา', 'รอดผัน', '71 หมู่ 1 ต.ชะแมบ อ.วังน้อย จ.พระนครศรีอยุธยา\r\n'),
(4, 'ภัทรวดี', 'นรสิงห์', '68 หมู่ 8 ต.วัดเสาธง อ.บางบาล จ.พระนครศรีอยุธยา'),
(5, 'เทเลอร์', 'สวิฟ', '1989 หมู่ 13 ต.บ้านยาง อ.บรุกลิน จ.นิวยอร์ก');

-- --------------------------------------------------------

--
-- Table structure for table `tbtypeproduct`
--

CREATE TABLE `tbtypeproduct` (
  `typeid` int(11) NOT NULL,
  `typename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbtypeproduct`
--

INSERT INTO `tbtypeproduct` (`typeid`, `typename`) VALUES
(1, 'โทรศัพท์'),
(2, 'แท็บเล็ต'),
(3, 'หูฟัง');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `userid` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`userid`, `firstname`, `lastname`, `username`, `password`, `status`) VALUES
(1, 'ปรเมศ', 'วิหคโต', 'ีuser1', '111111', 'staff'),
(2, 'เมลิษา', 'สว่างวงศ์', 'user2', '111111', 'staff'),
(3, 'ณณิชา', 'รอดผัน', 'admin1', '111111', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbproduct`
--
ALTER TABLE `tbproduct`
  ADD PRIMARY KEY (`proid`);

--
-- Indexes for table `tbstudent`
--
ALTER TABLE `tbstudent`
  ADD PRIMARY KEY (`stdid`);

--
-- Indexes for table `tbtypeproduct`
--
ALTER TABLE `tbtypeproduct`
  ADD PRIMARY KEY (`typeid`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbproduct`
--
ALTER TABLE `tbproduct`
  MODIFY `proid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbstudent`
--
ALTER TABLE `tbstudent`
  MODIFY `stdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbtypeproduct`
--
ALTER TABLE `tbtypeproduct`
  MODIFY `typeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
