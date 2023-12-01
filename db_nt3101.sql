-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 24, 2023 at 04:24 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_nt3101s`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbadminacc`
--

DROP TABLE IF EXISTS `tbadminacc`;
CREATE TABLE IF NOT EXISTS `tbadminacc` (
  `adminid` int NOT NULL AUTO_INCREMENT,
  `empid` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`adminid`),
  KEY `empid` (`empid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbadminacc`
--

INSERT INTO `tbadminacc` (`adminid`, `empid`, `username`, `password`) VALUES
(1, 1, 'nina', 'aguila');

-- --------------------------------------------------------

--
-- Table structure for table `tbempinfo`
--

DROP TABLE IF EXISTS `tbempinfo`;
CREATE TABLE IF NOT EXISTS `tbempinfo` (
  `empid` int NOT NULL AUTO_INCREMENT,
  `lastname` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `department` varchar(20) NOT NULL,
  PRIMARY KEY (`empid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbempinfo`
--

INSERT INTO `tbempinfo` (`empid`, `lastname`, `firstname`, `department`) VALUES
(1, 'aguila', 'nina', 'cics');

-- --------------------------------------------------------

--
-- Table structure for table `tbproductinfo`
--

DROP TABLE IF EXISTS `tbproductinfo`;
CREATE TABLE IF NOT EXISTS `tbproductinfo` (
  `itemid` int NOT NULL AUTO_INCREMENT,
  `itemname` varchar(100) NOT NULL,
  `item_img` mediumblob NOT NULL,
  `sizes` varchar(50) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `stocks` int NOT NULL,
  PRIMARY KEY (`itemid`),
  UNIQUE KEY `itemid` (`itemid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `tbreservedetails`
--

DROP TABLE IF EXISTS `tbreservedetails`;
CREATE TABLE IF NOT EXISTS `tbreservedetails` (
  `reservationid` int NOT NULL AUTO_INCREMENT,
  `itemid` int DEFAULT NULL,
  `itemSize` varchar(50) NOT NULL,
  `quantity` int NOT NULL,
  `total_price` decimal(10,0) NOT NULL,
  `SRcode` varchar(10) NOT NULL,
  `reservation_date` date NOT NULL,
  `status` varchar(255) DEFAULT 'pending',
  PRIMARY KEY (`reservationid`),
  UNIQUE KEY `reservationid` (`reservationid`),
  UNIQUE KEY `reservationid_2` (`reservationid`),
  KEY `itemid` (`itemid`),
  KEY `studid` (`SRcode`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbreservedetails`
--

INSERT INTO `tbreservedetails` (`reservationid`, `itemid`, `itemSize`, `quantity`, `total_price`, `SRcode`, `reservation_date`, `status`) VALUES
(1, 9, 'Medium', 2, '700', '21-33878', '2023-11-23', 'accepted'),
(2, 9, 'Medium', 7, '2450', '21-30452', '2023-11-23', 'accepted'),
(3, 6, 'xl', 1, '350', '21-34134', '2023-11-24', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbstatus`
--

DROP TABLE IF EXISTS `tbstatus`;
CREATE TABLE IF NOT EXISTS `tbstatus` (
  `reservationid` int DEFAULT NULL,
  `resStatus` varchar(50) NOT NULL,
  `statusNote` varchar(100) NOT NULL,
  KEY `reservationid` (`reservationid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `tbstudacc`
--

DROP TABLE IF EXISTS `tbstudacc`;
CREATE TABLE IF NOT EXISTS `tbstudacc` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `studid` int DEFAULT NULL,
  `srcode` varchar(15) DEFAULT NULL,
  UNIQUE KEY `srcode` (`srcode`),
  KEY `studid` (`studid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbstudacc`
--

INSERT INTO `tbstudacc` (`username`, `password`, `studid`, `srcode`) VALUES
('Jerome', 'student123', 1, '21-30452'),
('Max', 'student101', 2, '21-35348'),
('Neil', 'nt3101', 3, '21-37635'),
('Dom', 'kumarecakes01', 4, '21-33878'),
('laud zion', 'Sayon19', 5, '21-34134');

-- --------------------------------------------------------

--
-- Table structure for table `tbstudinfo`
--

DROP TABLE IF EXISTS `tbstudinfo`;
CREATE TABLE IF NOT EXISTS `tbstudinfo` (
  `lastname` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `course` varchar(20) NOT NULL,
  `studid` int NOT NULL AUTO_INCREMENT,
  UNIQUE KEY `studid` (`studid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbstudinfo`
--

INSERT INTO `tbstudinfo` (`lastname`, `firstname`, `course`, `studid`) VALUES
('Panganiban', 'Jerome', 'BSIT-NT', 1),
('Cabangisan', 'Dominic', 'BSIT', 2),
('De Silva', 'Max Daniel', 'BSIT-NT', 3),
('Pamintuan', 'Neil Daniel', 'BSIT-NT', 4),
('cascalla', 'laud zion', 'BSIT NT - 3101', 5);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbstudacc`
--
ALTER TABLE `tbstudacc`
  ADD CONSTRAINT `tbstudacc_ibfk_1` FOREIGN KEY (`studid`) REFERENCES `tbstudinfo` (`studid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
