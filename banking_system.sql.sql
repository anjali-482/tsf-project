-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 04:22 PM
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
-- Database: `banking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(2) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `E-mail` varchar(20) NOT NULL,
  `Current Balance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `Name`, `E-mail`, `Current Balance`) VALUES
(1, 'Anjali Singh', 'anj5@gmail.com', 4839),
(2, 'Anshika Kaur', 'anshikaur@gmail.com', 28111),
(3, 'Anuj Reddy', 'anujr45@gmail.com', 12100),
(4, 'Harshit Singh', 'harshh18@gmail.com', 6900),
(5, 'Rohit Sharma', 'sharmaro998@gmail.co', 30000),
(6, 'Kamini Sharma', 'kamsh21@gmail.com', 47000),
(7, 'Mayank Singh Chauhan', 'mayank02@gmail.com', 35000),
(8, 'Divya Aggarwal', 'aggdiv7@gmail.com', 9000),
(9, 'Manoj Kumar Singh', 'smanoj49@gmail.com', 77000),
(10, 'Vaishnavi Pal', 'vaishj04@gmail.com', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `S.no` int(255) NOT NULL,
  `Sender` varchar(255) NOT NULL,
  `Receiver` varchar(255) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Date and Time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`S.no`, `Sender`, `Receiver`, `Amount`, `Date and Time`) VALUES
(1, 'Anshika Kaur', 'Harshit Singh', 1000, '2023-06-18 21:07:30'),
(2, 'Manoj Kumar Singh', 'Kamini Sharma', 2000, '2023-06-18 21:11:51'),
(3, 'Kamini Sharma', 'Anshika Kaur', 5000, '2023-06-18 22:26:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`S.no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `S.no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
