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
-- Table structure for table `BlockBuster`
--

CREATE TABLE `BlockBuster` (
  `ID` int(11) NOT NULL,
  `Name` text,
  `City` text,
  `Address` text,
  `Movie1ID` int(11) NOT NULL,
  `Movie2ID` int(11) NOT NULL,
  `Movie3ID` int(11) NOT NULL,
  `Slots1Booking` text NOT NULL,
  `Slots2Booking` text NOT NULL,
  `Slots3Booking` text NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BlockBuster`
--

INSERT INTO `BlockBuster` (`ID`, `Name`, `City`, `Address`, `Movie1ID`, `Movie2ID`, `Movie3ID`, `Slots1Booking`, `Slots2Booking`, `Slots3Booking`, `Price`) VALUES
(1, 'Cinepolis', 'Delhi', 'One Awadh Centre', 3, 1, 2, '', '', '', 100),
(2, 'Fun Cinemas \r\n\r\n', 'Lucknow', 'Fun Republic Mall', 3, 4, 1, '', '', '', 100),
(3, 'INOX\r\n', 'Lucknow', 'Crown Mall', 1, 2, 3, '', '', '', 150),
(4, 'Novelty MGS Cinemas Dolby Atmos\r\n\r\n', 'Lucknow', 'Lalbagh', 4, 3, 2, '', '', '', 90);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BlockBuster`
--
ALTER TABLE `BlockBuster`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BlockBuster`
--
ALTER TABLE `BlockBuster`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
