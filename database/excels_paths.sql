-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2023 at 07:50 PM
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
-- Database: `msgsender`
--

-- --------------------------------------------------------

--
-- Table structure for table `excels_paths`
--

CREATE TABLE `excels_paths` (
  `excel_id` int(30) NOT NULL,
  `excel_path` text NOT NULL,
  `curr_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `excels_paths`
--

INSERT INTO `excels_paths` (`excel_id`, `excel_path`, `curr_date`) VALUES
(18, 'excels/mail_excels/exc1_2023-10-19_19-38-43.csv', '2023-10-19 23:08:43'),
(19, 'excels/mail_excels/exc1_2023-10-19_19-41-59.csv', '2023-10-19 23:11:59'),
(20, 'excels/mail_excels/exc1_2023-10-19_19-44-15.csv', '2023-10-19 23:14:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `excels_paths`
--
ALTER TABLE `excels_paths`
  ADD PRIMARY KEY (`excel_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `excels_paths`
--
ALTER TABLE `excels_paths`
  MODIFY `excel_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
