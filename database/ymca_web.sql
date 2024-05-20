-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2024 at 05:20 PM
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
-- Database: `ymca_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `court_book`
--

CREATE TABLE `court_book` (
  `cbook_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `morning` varchar(50) NOT NULL,
  `afternoon` varchar(100) NOT NULL,
  `days` int(10) NOT NULL,
  `price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `court_book`
--

INSERT INTO `court_book` (`cbook_id`, `cus_id`, `checkin`, `checkout`, `morning`, `afternoon`, `days`, `price`) VALUES
(17, 46, '2024-05-20', '2024-05-22', 'book', '', 5, 1500),
(18, 46, '2024-05-19', '2024-05-31', 'book', 'book', 7, 3500),
(19, 46, '2024-05-21', '2024-05-29', 'book', '', 4, 1200),
(20, 46, '2024-05-19', '2024-05-23', 'book', '', 3, 900),
(21, 46, '2024-05-19', '2024-05-22', 'book', 'book', 2, 1000),
(23, 47, '2024-05-22', '2024-05-29', 'book', '', 5, 1500),
(24, 47, '2024-05-22', '2024-05-27', 'book', 'book', 5, 2500),
(25, 47, '2024-05-22', '2024-05-29', 'book', 'book', 4, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(100) NOT NULL,
  `cus_email` varchar(100) NOT NULL,
  `cus_pwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`cus_id`, `cus_name`, `cus_email`, `cus_pwd`) VALUES
(44, 'bcde', 'b@mail.com', '335577'),
(45, 'cdef', 'c@mail.com', '556677'),
(46, 'chamila', 'd@mail.com', '332211'),
(47, 'sahan', 'e@mail.com', '112233');

-- --------------------------------------------------------

--
-- Table structure for table `room_book`
--

CREATE TABLE `room_book` (
  `rbook_id` int(11) NOT NULL,
  `cus_id` int(10) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `rooms` int(10) NOT NULL,
  `days` int(10) NOT NULL,
  `price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_book`
--

INSERT INTO `room_book` (`rbook_id`, `cus_id`, `checkin`, `checkout`, `rooms`, `days`, `price`) VALUES
(26, 46, '2024-05-20', '2024-05-22', 3, 5, 7500),
(27, 46, '2024-05-19', '2024-05-29', 3, 5, 7500),
(29, 46, '2024-05-21', '2024-05-23', 3, 3, 4500),
(31, 46, '2024-05-20', '2024-05-31', 3, 3, 4500),
(32, 46, '2024-05-22', '2024-05-23', 3, 3, 4500),
(34, 47, '2024-05-20', '2024-05-24', 3, 4, 6000),
(35, 47, '2024-05-22', '2024-05-30', 3, 3, 4500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `court_book`
--
ALTER TABLE `court_book`
  ADD PRIMARY KEY (`cbook_id`),
  ADD KEY `cus_id` (`cus_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `room_book`
--
ALTER TABLE `room_book`
  ADD PRIMARY KEY (`rbook_id`),
  ADD KEY `cus_id` (`cus_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `court_book`
--
ALTER TABLE `court_book`
  MODIFY `cbook_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `room_book`
--
ALTER TABLE `room_book`
  MODIFY `rbook_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `court_book`
--
ALTER TABLE `court_book`
  ADD CONSTRAINT `court_book_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `login` (`cus_id`);

--
-- Constraints for table `room_book`
--
ALTER TABLE `room_book`
  ADD CONSTRAINT `room_book_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `login` (`cus_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
