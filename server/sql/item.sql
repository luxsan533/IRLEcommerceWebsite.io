-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2024 at 02:59 AM
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
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int NOT NULL,
  `Name` varchar(50) NOT NULL,
  `FullPrice` decimal(10,2) NOT NULL,
  `Image` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Brand` varchar(50) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Description` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `SellerAccountId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `Name`, `FullPrice`, `Image`, `Brand`, `Category`, `Description`, `SellerAccountId`) VALUES
(1, 'Cartoon Astronaut T-shirt', 120.57, '../0-assets/irl-images/products/f1.jpg', 'adidas', 'Men', 'One of the best-selling items at Adidas.', 2),
(2, 'Women\'s Belice Ballet Flat', 75.70, '../0-assets/irl-images/products/beliceballetflat.jpg', 'Amazon', 'Ladies', 'Fashionable shoes for a great price.', 4),
(3, 'Autumn Casual Kids Shoes', 268.55, '../0-assets/irl-images/products/kidsautumncasualshoes.jpg', 'Koppu', 'Kids', 'Great shoes to wear for autumn fall season.', 5),
(4, 'Jerzees T-Shirt', 31.60, 'https://tse3.mm.bing.net/th?id=OIP.gAr5QHncV3nEajtFJXJlOgHaHa&pid=Api&P=0&h=180', 'Jerzees', 'Men', 'Highest selling T-shirt from Jerzees', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
