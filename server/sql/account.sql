-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2024 at 02:38 AM
-- Server version: 8.0.34
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment2db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `name`, `password`, `email`) VALUES
(1, 'Luxsan Jey', 'TestPass', 'jeya0029@algonquinlive.com'),
(2, 'Luxsan Jeyasingam', 'sqlp@$$01', 'luxsan234@gmail.com'),
(3, 'Tony Soprano', 'Password', 'gabagool894@gmail.com'),
(4, 'Silvio Dante', 'Newpass1', 'dante455@gmail.com'),
(5, 'Christopher Moltisanti', 'Password3', 'chrissy455@gmail.com'),
(6, 'Paulie Gualtieri', 'Password4', 'paulie455@gmail.com'),
(7, 'Richie Aprile', 'Password5', 'richie756@gmail.com'),
(8, 'Ralph Cifaretto', 'Password6', 'ralphie323@gmail.com'),
(9, 'Bobby Bacala', 'Password7', 'bacala489@gmail.com'),
(12, 'Richie Aprile', 'Password10', 'vealparm0994@gmail.com'),
(13, 'Phil Leotardo', 'Password11', 'philly0253@gmail.com'),
(14, 'Johnny Sack', 'Password12', 'sacromoni0253@gmail.com'),
(15, 'First Last', 'Password14', 'asdf@gmail.com');
--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
