-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: fdb30.awardspace.net
-- Generation Time: Jan 02, 2021 at 12:49 PM
-- Server version: 5.7.20-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `3532067_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `MovieBlock`
--

CREATE TABLE `MovieBlock` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Rating` float DEFAULT NULL,
  `Language` varchar(50) DEFAULT NULL,
  `MovieImageLink` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `MovieBlock`
--

INSERT INTO `MovieBlock` (`ID`, `Name`, `Rating`, `Language`, `MovieImageLink`) VALUES
(1, 'Wonder Woman 1984', 5.6, 'Hindi', 'https://in.bmscdn.com/iedb/movies/images/mobile/thumbnail/xlarge/wonder-woman-1984-et00077622-04-12-2020-12-31-26.jpg'),
(2, 'Suraj Pe Mangal Bhari', 5.6, 'Hindi', 'https://in.bmscdn.com/iedb/movies/images/mobile/thumbnail/xlarge/suraj-pe-mangal-bhari-et00126788-21-10-2020-06-54-18.jpg'),
(3, 'Vanguard', 4.6, 'Hindi', 'https://in.bmscdn.com/iedb/movies/images/mobile/thumbnail/xlarge/vanguard-et00302890-25-12-2020-11-53-53.jpg'),
(4, 'Ramprasad Ki Tehrvi', 7.9, 'Hindi', 'https://in.bmscdn.com/iedb/movies/images/mobile/thumbnail/xlarge/ramprasad-ki-tehrvi-et00117699-28-12-2020-11-41-57.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `MovieBlock`
--
ALTER TABLE `MovieBlock`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `MovieBlock`
--
ALTER TABLE `MovieBlock`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
