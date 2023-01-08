-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2023 at 06:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `map`
--

-- --------------------------------------------------------

--
-- Table structure for table `stall`
--

CREATE TABLE `stall` (
  `stall_ID` int(3) NOT NULL,
  `map_ID` int(2) DEFAULT NULL,
  `market_admin_ID` int(4) DEFAULT NULL,
  `vendor_ID` int(4) DEFAULT NULL,
  `stall_name` varchar(50) DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stall`
--

INSERT INTO `stall` (`stall_ID`, `map_ID`, `market_admin_ID`, `vendor_ID`, `stall_name`, `latitude`, `longitude`) VALUES
(17, 1, 2, 3, '', 45.8884, 44.0529),
(18, 1, 2, 3, '', 7.12188, 8.81057),
(19, 1, 2, 3, '', 87.1737, 51.3059),
(20, 1, 2, 3, '', 23.2746, 61.4537),
(21, 1, 2, 3, '', 60.7498, 68.2927),
(22, 1, 2, 3, 'Aguy', 51.1747, 14.0969);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stall`
--
ALTER TABLE `stall`
  ADD PRIMARY KEY (`stall_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stall`
--
ALTER TABLE `stall`
  MODIFY `stall_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
