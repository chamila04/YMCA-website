-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 05:46 PM
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
  `checkin` varchar(100) NOT NULL,
  `checkout` varchar(100) NOT NULL,
  `morning` varchar(50) NOT NULL,
  `afternoon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `court_book`
--

INSERT INTO `court_book` (`cbook_id`, `cus_id`, `checkin`, `checkout`, `morning`, `afternoon`) VALUES
(7, 44, '2024-05-14', '2024-05-15', 'book', ''),
(11, 44, '2024-05-22', '2024-05-16', '', 'book'),
(12, 44, '2024-05-14', '2024-05-17', 'book', ''),
(15, 46, '2024-05-19', '2024-05-30', '', 'book');

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
(43, 'abcd', 'a@mail.com', '115599'),
(44, 'bcde', 'b@mail.com', '335577'),
(45, 'cdef', 'c@mail.com', '556677'),
(46, 'chamila', 'd@mail.com', '112233');

-- --------------------------------------------------------

--
-- Table structure for table `room_book`
--

CREATE TABLE `room_book` (
  `rbook_id` int(11) NOT NULL,
  `cus_id` int(10) NOT NULL,
  `checkin` varchar(100) NOT NULL,
  `checkout` varchar(100) NOT NULL,
  `rooms` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_book`
--

INSERT INTO `room_book` (`rbook_id`, `cus_id`, `checkin`, `checkout`, `rooms`) VALUES
(20, 44, '2024-05-22', '2024-05-21', 3),
(21, 44, '2024-05-14', '2024-05-27', 4),
(22, 44, '2024-05-20', '2024-05-29', 3);

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
  MODIFY `cbook_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `room_book`
--
ALTER TABLE `room_book`
  MODIFY `rbook_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
