-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 28, 2022 at 10:39 PM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PSD`
--

-- --------------------------------------------------------

--
-- Table structure for table `Lesson`
--

CREATE TABLE `Lesson` (
  `semester` int DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Statement`
--

CREATE TABLE `Statement` (
  `id` int NOT NULL,
  `theoryGrade` int DEFAULT NULL,
  `labGrade` int DEFAULT NULL,
  `stAm` varchar(255) DEFAULT NULL,
  `teachingId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `am` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `EntYear` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Teacher`
--

CREATE TABLE `Teacher` (
  `id` int NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `lvl` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Teacher`
--

INSERT INTO `Teacher` (`id`, `fullname`, `lvl`) VALUES
(1, 'Άλμπερτ Αϊνσταν', 'Επίκουρος');

-- --------------------------------------------------------

--
-- Table structure for table `Teaching`
--

CREATE TABLE `Teaching` (
  `id` int NOT NULL,
  `year` int DEFAULT NULL,
  `semester` int DEFAULT NULL,
  `weightTheory` float DEFAULT NULL,
  `weightLab` float DEFAULT NULL,
  `labLimit` int DEFAULT NULL,
  `theoryLimit` int DEFAULT NULL,
  `tId` int DEFAULT NULL,
  `lId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Usr`
--

CREATE TABLE `Usr` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `psw` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `stAm` varchar(255) DEFAULT NULL,
  `tId` int DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Usr`
--

INSERT INTO `Usr` (`id`, `name`, `psw`, `role`, `stAm`, `tId`, `email`) VALUES
(7, 'admin', '$2y$10$8SOyfNccbn6QsGl9qn.vHOGGxQ9gHLGKUz/LluTfgoC6z.rV1Cqdy', 'admin', NULL, NULL, 'admin@email.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Lesson`
--
ALTER TABLE `Lesson`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Statement`
--
ALTER TABLE `Statement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachingId` (`teachingId`),
  ADD KEY `stAm` (`stAm`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`am`);

--
-- Indexes for table `Teacher`
--
ALTER TABLE `Teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Teaching`
--
ALTER TABLE `Teaching`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tId` (`tId`),
  ADD KEY `lId` (`lId`);

--
-- Indexes for table `Usr`
--
ALTER TABLE `Usr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stAm` (`stAm`),
  ADD KEY `tId` (`tId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Lesson`
--
ALTER TABLE `Lesson`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Statement`
--
ALTER TABLE `Statement`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Teacher`
--
ALTER TABLE `Teacher`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Teaching`
--
ALTER TABLE `Teaching`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Usr`
--
ALTER TABLE `Usr`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Statement`
--
ALTER TABLE `Statement`
  ADD CONSTRAINT `Statement_ibfk_1` FOREIGN KEY (`teachingId`) REFERENCES `Teaching` (`id`),
  ADD CONSTRAINT `Statement_ibfk_2` FOREIGN KEY (`stAm`) REFERENCES `Student` (`am`);

--
-- Constraints for table `Teaching`
--
ALTER TABLE `Teaching`
  ADD CONSTRAINT `Teaching_ibfk_1` FOREIGN KEY (`tId`) REFERENCES `Teacher` (`id`),
  ADD CONSTRAINT `Teaching_ibfk_2` FOREIGN KEY (`lId`) REFERENCES `Lesson` (`id`);

--
-- Constraints for table `Usr`
--
ALTER TABLE `Usr`
  ADD CONSTRAINT `Usr_ibfk_1` FOREIGN KEY (`stAm`) REFERENCES `Student` (`am`),
  ADD CONSTRAINT `Usr_ibfk_2` FOREIGN KEY (`tId`) REFERENCES `Teacher` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
