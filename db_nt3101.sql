-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 16, 2023 at 01:37 AM
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
-- Database: `db_nt3101`
--

-- --------------------------------------------------------

--
-- Table structure for table `booktable`
--

DROP TABLE IF EXISTS `booktable`;
CREATE TABLE IF NOT EXISTS `booktable` (
  `BookID` int NOT NULL AUTO_INCREMENT,
  `Author` varchar(255) NOT NULL,
  `BookNames` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `ISBN` varchar(255) NOT NULL,
  PRIMARY KEY (`BookID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booktable`
--

INSERT INTO `booktable` (`BookID`, `Author`, `BookNames`, `Description`, `Category`, `ISBN`) VALUES
(1, 'John Smith', 'The Adventures of Code', 'A thrilling journey through algorithms', 'Programming', '978-1-123456-78-9'),
(2, 'Jane Doe', 'Beyond the Horizon', 'Exploring the wonders of the universe', 'Science', '978-2-234567-89-0'),
(3, 'Alex Johnson', 'Echoes of Time', 'Historical tales of a bygone era', 'History', '978-3-345678-90-1'),
(4, 'Emma Thompson', 'Whispers in the Wind', 'Poetic expressions of natures beauty', 'Poetry', '978-4-456789-01-2'),
(5, 'Michael Brown', 'Quantum Realms', 'Unraveling the mysteries of quantum physics', 'Science', '978-5-567890-12-3'),
(6, 'Olivia White', 'The Art of Cooking Code', 'A culinary journey through coding', 'Cooking', '978-6-678901-23-4'),
(7, 'Ethan Miller', 'Mind Games', 'Exploring the complexities of the human mind', 'Psychology', '978-7-789012-34-5'),
(8, 'Sophia Martinez', 'Harmony in Design', 'Principles of aesthetically pleasing design', 'Design', '978-8-890123-45-6'),
(9, 'Daniel Taylor', 'Symphony of Algorithms', 'Music-inspired algorithms and coding', 'Music', '978-9-901234-56-7'),
(10, 'Lily Anderson', 'The Enchanted Garden', 'Fantasy tales from a magical garden', 'Fantasy', '978-0-012345-67-8');

-- --------------------------------------------------------

--
-- Table structure for table `logintable`
--

DROP TABLE IF EXISTS `logintable`;
CREATE TABLE IF NOT EXISTS `logintable` (
  `UserID` int NOT NULL AUTO_INCREMENT,
  `StudentID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `logintable`
--

INSERT INTO `logintable` (`UserID`, `StudentID`, `Password`) VALUES
(1, '1', '1234'),
(2, '2', '5678'),
(3, '3', '2117\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `reservetable`
--

DROP TABLE IF EXISTS `reservetable`;
CREATE TABLE IF NOT EXISTS `reservetable` (
  `ReserveID` int NOT NULL AUTO_INCREMENT,
  `StudentID` int NOT NULL,
  `BookID` int NOT NULL,
  `Status` varchar(255) NOT NULL,
  PRIMARY KEY (`ReserveID`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `returntable`
--

DROP TABLE IF EXISTS `returntable`;
CREATE TABLE IF NOT EXISTS `returntable` (
  `ReturnID` int NOT NULL AUTO_INCREMENT,
  `ReserveID` int NOT NULL,
  `Date Reserve` varchar(255) NOT NULL,
  `Time Reserve` varchar(255) NOT NULL,
  `Date Return` varchar(255) NOT NULL,
  `Time Return` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  PRIMARY KEY (`ReturnID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student table`
--

DROP TABLE IF EXISTS `student table`;
CREATE TABLE IF NOT EXISTS `student table` (
  `StudentID` int NOT NULL AUTO_INCREMENT,
  `StudentName` varchar(255) NOT NULL,
  `SR-Code` varchar(255) NOT NULL,
  `Year & Section` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  PRIMARY KEY (`StudentID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student table`
--

INSERT INTO `student table` (`StudentID`, `StudentName`, `SR-Code`, `Year & Section`, `Department`) VALUES
(1, 'Charles', '21-35071', '3rd Year NT-3101', 'CICS'),
(2, 'Aaron ', '21-33856', '3rd Year NT-3101', 'CICS'),
(3, 'Andrea', '21-68979', '3rd year - cvet - 3102', 'cit');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbempinfo`
--

INSERT INTO `tbempinfo` (`empid`, `lastname`, `firstname`, `department`) VALUES
(1, 'aguila', 'nina', 'cics');

-- --------------------------------------------------------

--
-- Table structure for table `tbstudinfo`
--

DROP TABLE IF EXISTS `tbstudinfo`;
CREATE TABLE IF NOT EXISTS `tbstudinfo` (
  `studid` int NOT NULL AUTO_INCREMENT,
  `lastname` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `course` varchar(20) NOT NULL,
  PRIMARY KEY (`studid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbstudinfo`
--

INSERT INTO `tbstudinfo` (`studid`, `lastname`, `firstname`, `course`) VALUES
(1, 'parker', 'peter', 'bsit'),
(2, 'kent', 'clark', 'bscs');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
