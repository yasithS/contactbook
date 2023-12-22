-- phpMyAdmin SQL Dump
-- version 5.2.1-2.fc39
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2023 at 04:11 PM
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
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `nick` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile1` varchar(12) NOT NULL,
  `mobile2` varchar(12) NOT NULL,
  `Land` varchar(12) NOT NULL,
  `address` varchar(160) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `note` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `nick`, `email`, `mobile1`, `mobile2`, `Land`, `address`, `type`, `gender`, `note`) VALUES
(16, 'revoise ', 'voise', 'revoise@abc.com', '0789685742', '0796251423', '0775145467', '', 2, 1, 'hellow!'),
(17, 'sri lanka', 'sri', 'sri@abc.com', '0789685742', '0785289686', '+94465446895', '', 1, 1, ''),
(18, 'saman rathnayaka', 'saman', 'saman@abc.com', '0782596357', '+96758936512', '0983258741', 'colombo 02,sri lanaka', 1, 1, 'hellow!'),
(24, 'revoise ', '', '', '0789685742', '0785289686', '046544689', '', 3, 1, ''),
(25, 'sigiriya frock', 'sigiri', 'sigi@123.com', '0796333213', '0147852546', '+96541321512', 'dambulla,sri lanka', 2, 1, 'awesome!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
