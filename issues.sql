-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2024 at 01:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `issues`
--

-- --------------------------------------------------------

--
-- Table structure for table `issue_details`
--

CREATE TABLE `issue_details` (
  `issue_id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `number` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` text NOT NULL,
  `issue` text NOT NULL,
  `date` date NOT NULL,
  `time` time DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `link` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issue_details`
--

INSERT INTO `issue_details` (`issue_id`, `name`, `number`, `email`, `subject`, `issue`, `date`, `time`, `status`, `link`) VALUES
(1, 'naveen Pal', 7415233022, 'paln76050@gmail.com', 'myproblem', 'Ensure your database and table names (issues and issue_details) match exactly with those in your MySQL setup.\r\nConsider adding further validation and sanitization for user inputs for improved security and robustness.', '2024-05-21', '04:29:46', 1, 'https://youtube.com/'),
(6, 'Naveen Pal', 7415233022, 'paln76050@gmail.com', 'need help regarding internet', 'fan is too slow in room no . 332', '2024-05-21', '16:46:29', 0, 'https://google.com/'),
(7, 'lakshya', 9999999999, '6172@gmail.com', 'technical issue', 'light is too dim in room no, 332', '2024-05-21', '16:48:31', 0, 'https://github.com/'),
(8, 'naveen', 999999999, '46356@gmail.com', 'Parking light fixture not working', 'explaination of my issue \r\nghmghjg  g g  gjggj gj g   gj gg gj g h g hg jhg jhg j j j j gjhg hg hjggjgjhg fhgfhfhfj', '2024-05-28', '14:41:34', 0, 'https://naveen-pal.github.io/web/');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `issue_details`
--
ALTER TABLE `issue_details`
  ADD PRIMARY KEY (`issue_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `issue_details`
--
ALTER TABLE `issue_details`
  MODIFY `issue_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
