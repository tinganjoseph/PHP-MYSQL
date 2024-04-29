-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 29, 2024 at 07:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `requestform`
--

CREATE TABLE `requestform` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(500) NOT NULL DEFAULT 'uncompleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requestform`
--

INSERT INTO `requestform` (`id`, `name`, `email`, `location`, `subject`, `message`, `status`) VALUES
(1, 'teign', 'testing@gmail.com', 'Accra', 'steisn', 'stesing', 'completed'),
(2, 'thshs', 'teshg@gmail.com', 'tslslsl', 'sssthths', 'sshshhs', 'completed'),
(3, 'thshs', 'teshg@gmail.com', 'tslslsl', 'sssthths', 'sshshhs', 'uncompleted'),
(4, 'aaahha', 'tingsn@gmail.com', 'slslsl', 'sshshs', 'sshshs', 'uncompleted'),
(5, 'aaahha', 'tingsn@gmail.com', 'slslsl', 'sshshs', 'sshshs', 'uncompleted'),
(6, 'jjjjjjjjj', 'jjjj@GMAIL.COM', 'GGG', 'HHH', 'VGGG', 'uncompleted');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(6, 'admin', 'admin@gmail.com', '$2y$10$uof41TYop.vc4QjKDxz3u.PKnjE58PENPcvllHx0BKSV.fA476YNy'),
(7, 'staff', 'staff@gmail.com', '$2y$10$5OVn0RuUTDSbwLz5DPDw1uvAeR9Sw1kK2ZPdkX5WwPG3NgQi.QrRq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `requestform`
--
ALTER TABLE `requestform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `requestform`
--
ALTER TABLE `requestform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
