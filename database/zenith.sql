-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2025 at 10:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zenith`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `Event_Id` int(11) NOT NULL,
  `Event_Title` varchar(100) NOT NULL,
  `E_Description` varchar(100) NOT NULL,
  `Image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`Event_Id`, `Event_Title`, `E_Description`, `Image`) VALUES
(3, 'test', 'just testing add event', 0x75706c6f6164732f6576656e74732f6576656e745f313734393735383737372e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `Service_Id` int(11) NOT NULL,
  `Title` text NOT NULL,
  `INTRODUCTION` text DEFAULT NULL,
  `CONCLUSION` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`Service_Id`, `Title`, `INTRODUCTION`, `CONCLUSION`) VALUES
(24, 'Research & Developmen', 'At ZENITH-RW LTD, we engage in cutting-edge research and experimental development within the fields of natural sciences and engineering.', 'Our initiatives not only contribute to scientific advancements but also provide valuable insights and competitive advantages for our clients.'),
(27, 'Management Consultancy', 'ZENITH-RW LTD provides comprehensive management consultancy services aimed at enhancing organizational performance and achieving strategic goals. Our team of experienced consultants offers tailored solutions across several key areas', 'Our collaborative approach emphasizes co-creation, ensuring solutions are tailored to the unique contexts and objectives of our clients.'),
(28, 'Research & Development', 'At ZENITH-RW LTD, we engage in cutting-edge research and experimental development within the fields of natural sciences and engineering. Collaborating with academic institutions, government agencies, and industry partners, we aim to advance knowledge and foster innovation.', 'Our initiatives not only contribute to scientific advancements but also provide valuable insights and competitive advantages for our clients.'),
(34, 'ggggg', 'hkoofgffgg', 'jjkjjkjk,rffjirgio');

-- --------------------------------------------------------

--
-- Table structure for table `service_point`
--

CREATE TABLE `service_point` (
  `Point_id` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Service_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_point`
--

INSERT INTO `service_point` (`Point_id`, `Title`, `Description`, `Service_Id`) VALUES
(13, 'Sustainable Technologie', 'We develop solutions that minimize environmental impact, such as renewable energy systems and effi', 24),
(14, 'Engineering Innovations ', 'Our applied research efforts design and optimize new materials, processes, and systems to enhance pe', 24),
(19, 'Strategic Planning ', 'We assist organizations in defining their vision, mission, and long-term objectives, developing acti', 27),
(20, 'Operational Improvement ', 'Our consultants analyze existing processes, identifying opportunities for optimization that enhance ', 27),
(21, 'Change Management: ', 'We guide organizations through transitions, ensuring that changes are implemented smoothly and embra', 27),
(22, 'Sustainable Technologies', ' We develop solutions that minimize environmental impact, such as renewable energy systems and effic', 28),
(27, 'jhhee5e m5e555555e', 'hiiii', 34);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_Id` int(11) NOT NULL,
  `User_name` varchar(20) NOT NULL,
  `User_Email` varchar(30) NOT NULL,
  `User_Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_Id`, `User_name`, `User_Email`, `User_Password`) VALUES
(4, 'nicolepromesse', 'nicolepromesseirakoze@gmail.co', '123'),
(6, 'nicole', 'numuflore@gmail.com', '123'),
(7, 'nicolepromesse', 'numuflore@gmail.com', '123'),
(8, 'kenny', 'emmylavie3@gmail.com', '34'),
(9, 'kennyh', 'nnnn@gmail.com', '12'),
(10, 'peter', 'peter@gmail.com', '678'),
(11, 'nicole', 'nicolepromesseirakoze@gmail.co', '123'),
(12, 'peter', 'nnnn@gmail.com', '234'),
(13, 'hh', 'nnnn@gmail.com', '23'),
(14, 'peter', 'nnnn@gmail.com', 'dd'),
(15, 'hh', 'ff@gmail.com', '56'),
(16, 'nicole', 'ff@gmail.com', '234'),
(17, 'flaman', 'flam@gmail.com', '1234'),
(18, 'sangwa', 'malise@gmail.com', 'rty'),
(19, 'chris', 'chris@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`Event_Id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`Service_Id`);

--
-- Indexes for table `service_point`
--
ALTER TABLE `service_point`
  ADD PRIMARY KEY (`Point_id`),
  ADD KEY `Service_Id` (`Service_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `Event_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `Service_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `service_point`
--
ALTER TABLE `service_point`
  MODIFY `Point_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `service_point`
--
ALTER TABLE `service_point`
  ADD CONSTRAINT `service_point_ibfk_1` FOREIGN KEY (`Service_Id`) REFERENCES `service` (`Service_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
