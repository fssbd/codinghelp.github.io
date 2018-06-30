-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2018 at 08:35 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_management`
--
CREATE DATABASE IF NOT EXISTS `inventory_management` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `inventory_management`;

-- --------------------------------------------------------

--
-- Table structure for table `registration_info`
--

CREATE TABLE `registration_info` (
  `id` int(11) NOT NULL,
  `first_name` varchar(11) NOT NULL,
  `last_name` varchar(111) NOT NULL,
  `email_id` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `gender` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration_info`
--

INSERT INTO `registration_info` (`id`, `first_name`, `last_name`, `email_id`, `password`, `phone_number`, `gender`) VALUES
(1, 're', 'dfds', '', '', '', ''),
(2, 're', 'dfds', 'rashu.web@gmail.com', 'dffds', '01829695454', 'on'),
(3, 'dsfd', 'dsfd', 'rashu.web@gmail.com', 'dfgdf', '01829695454', 'on'),
(4, 'dsf', 'dsfds', 'rashu.web@gmail.com', 'df', '01829695454', 'on'),
(5, 'dsf', 'dsfds', 'rashu.web@gmail.com', 'df', '01829695454', 'on'),
(6, 'dsf', 'dsfds', 'rashu.web@gmail.com', 'df', '01829695454', 'on'),
(7, 'dsf', 'dsfds', 'rashu.web@gmail.com', 'df', '01829695454', 'on'),
(8, 'dsf', 'dsfds', 'rashu.web@gmail.com', 'df', '01829695454', 'on'),
(9, 'Rashu', 'Nath', 'rashu.web@gmail.com', '1234', '01829695454', 'on'),
(10, 'miton', 'kljd', 'mitonshil48@gmail.com', '456', '018296', 'on');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration_info`
--
ALTER TABLE `registration_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration_info`
--
ALTER TABLE `registration_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
