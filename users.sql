-- phpMyAdmin SQL Dump
-- version 5.2.1-2.fc39
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2023 at 05:45 PM
-- Server version: 10.5.22-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contactbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'sri', 'sri123@abc.com', '$2y$10$mOm47pJQ83HWTHVFdemeRuq0JaYCGTroLFm3jPeV5zvaULntc3JGC'),
(2, 'sri', 'sri123@1234.com', '$2y$10$sV2XgWRmBr5RMaQ76UjqCuGZMtQ3am5bdCmfLb2shbIEXsahK6Ba2'),
(3, 'sri1', 'sri1abc@123.com', '$2y$10$nZQnmdAjPll3LUHA2yTY4eqkR32wMqX9WA.EXQGGRQUrmo72BfHIG'),
(4, 'user', 'user@123.com', '$2y$10$qQt4HHjuWOu2XTW/OVpY3eMvyHhnX6VYGGaqvWBVT2RGliNhCCzK2'),
(5, 'revoise', 'revoise@abc.com', '$2y$10$EDtlZvuW8rcMp0kty/EbzekhJdJLkNJmPx37muRTe7SotVRd88LAi'),
(6, 'user', 'user5@abc.com', '$2y$10$Hca88r3cnYAW4A5xpdvWY.P3sgtL5UxUH4TbqdAkHdmz9gbAjLYZq'),
(7, 'abc', 'ab@123.com', '$2y$10$/5fihcWD65h92iMrxTggH.wL.uAvhxYvxuD8PmwDt0VXeS5Eh7e4a'),
(8, 'sri lanka', 'sri@abc.com', '$2y$10$KoQIGgoCWgsNJKEgGhRdQ.ZGEOxQDXEsUr93y4lG6p/JeqHZU8PYy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
