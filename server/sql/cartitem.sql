-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2024 at 03:01 AM
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
-- Table structure for table `cartitem`
--

CREATE TABLE `cartitem` (
  `id` int NOT NULL,
  `account_id` int NOT NULL,
  `item_id` int NOT NULL,
  `size` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cartitem`
--

INSERT INTO `cartitem` (`id`, `account_id`, `item_id`, `size`) VALUES
(47, 1, 1, 'M'),
(48, 1, 1, 'L'),
(50, 1, 1, 'XL'),
(54, 1, 1, 'S'),
(55, 1, 2, 'M'),
(56, 1, 3, 'S');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cartitem`
--
ALTER TABLE `cartitem`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cartitem`
--
ALTER TABLE `cartitem`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
