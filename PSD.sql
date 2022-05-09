-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 09, 2022 at 06:26 PM
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

--
-- Dumping data for table `Lesson`
--

INSERT INTO `Lesson` (`semester`, `description`, `name`, `id`) VALUES
(3, '  linux linux', 'Linux 2', 5),
(1, 'cpp cpp cpp cpp ', 'cpp', 7),
(2, ' java java java', 'java', 8),
(12, 'schrondiger likes cats', 'quantom mechanics', 9),
(3, 'cbasdn basdbab asbdabd', 'Circuit', 10),
(1, 'asdasd asdas asd asd ', 'quantom computers', 11),
(8, 'lorem ipsum asdasd asd asd asd', 'Programmatismos', 12);

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

--
-- Dumping data for table `Statement`
--

INSERT INTO `Statement` (`id`, `theoryGrade`, `labGrade`, `stAm`, `teachingId`) VALUES
(30, NULL, NULL, '16195', 4),
(31, NULL, NULL, '16195', 3),
(32, NULL, NULL, '16195', 5),
(33, 10, 10, '16195', 7),
(34, 7, 7, '16195', 6),
(35, NULL, NULL, '16197', 4),
(36, NULL, NULL, '16197', 3),
(37, NULL, NULL, '16197', 5),
(38, 10, 10, '16197', 7),
(39, 8, 9, '16197', 6),
(40, NULL, NULL, NULL, 7),
(41, NULL, NULL, NULL, 6),
(42, NULL, NULL, NULL, 8),
(43, NULL, NULL, NULL, 4),
(44, NULL, NULL, NULL, 3),
(45, NULL, NULL, NULL, 5),
(52, NULL, NULL, '16191', 4),
(53, NULL, NULL, '16191', 3),
(54, NULL, NULL, '16191', 5);

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `am` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `EntYear` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`am`, `fullname`, `EntYear`) VALUES
('16191', 'Kon Stoi', 2022),
('16195', 'Tom Blue', 1999),
('16197', 'John Doe', 2016),
('icsd16200', 'Carl johnson', 2016);

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
(5, 'Spinoza', 'Επίκουορς'),
(6, 'Albert Einstein', 'Επίκουρος'),
(7, 'Leibnitz', 'Καθηγητής'),
(8, 'Big Smoke', 'Επίκουρος');

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

--
-- Dumping data for table `Teaching`
--

INSERT INTO `Teaching` (`id`, `year`, `semester`, `weightTheory`, `weightLab`, `labLimit`, `theoryLimit`, `tId`, `lId`) VALUES
(3, 1998, 2, 0.3, 0.7, 3, 3, 5, 8),
(4, 1998, 3, 0.5, 0.5, 2, 2, 5, 5),
(5, 2016, 12, 0.7, 0.3, 3, 3, 6, 9),
(6, 1999, 1, 0.1, 0.9, 1, 1, 7, 11),
(7, 2019, 3, 0.5, 0.5, 1, 10, 7, 10),
(8, 2022, 8, NULL, NULL, NULL, NULL, 8, 12);

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
(7, 'admin', '$2y$10$8SOyfNccbn6QsGl9qn.vHOGGxQ9gHLGKUz/LluTfgoC6z.rV1Cqdy', 'admin', NULL, NULL, 'Leibnitz'),
(14, 'icsd16191', '$2y$10$TFZPSVUk.B40ioQFv8SQaeWanTzelcP0YIatIPpiB5HeK0.F3IrG.', 'Φοιτητής', '16191', NULL, 'icsd16191@aegean.gr'),
(16, 'icsd16192', '$2y$10$532cSGIPeYdBeihHsHISj.ztKW4Pxp0nqfWrYAuQgL4d3BwjWA4iG', 'Διδάσκων', NULL, 5, 'icsd16192@aegean.gr'),
(17, 'icsd16193', '$2y$10$gsSmIDFEwCGhWCIUbtNCaeQaiLIzwBlpyW7C9bTdiIw2SIweKI/mW', 'Διδάσκων', NULL, 6, 'icsd16193@aegean.gr'),
(18, 'icsd16194', '$2y$10$47h2PYtVf/stC6jzxHw2IO5FMsrmsgsME3UlqQmpqheISpTI/c9ri', 'Διδάσκων', NULL, 7, 'icsd16194@aegean.gr'),
(19, 'icsd16195', '$2y$10$Z3MF/iKSHcbSLxkF38LKcOSRvkjEvGQKTnKjOO16sWeh9WR.uAi8u', 'Φοιτητής', '16195', NULL, 'icsd16195@aegean.gr'),
(20, 'icsd16197', '$2y$10$Lw6GZKIU0NTkkbSbhf2MA.8nAmBqSREPyGAw5p0Kgqhcl2rnyfDB6', 'Φοιτητής', '16197', NULL, 'icsd16197@aegean.gr'),
(21, 'icsd16200', '$2y$10$2d.R0616paGnnLsKlYW16.AUW7RUm6xYm/a1Pb9qOQOi9RS9Gtt8i', 'Φοιτητής', 'icsd16200', NULL, 'icsd16200@aegean.gr'),
(22, 'icsd10200', '$2y$10$DgOpe.m05e7vzPDnjLRMgu.63nQK34ScKPbgcbZiXEytIoswgFVWu', 'Διδάσκων', NULL, 8, 'icsd10200@aegean.gr');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `Statement`
--
ALTER TABLE `Statement`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `Teacher`
--
ALTER TABLE `Teacher`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Teaching`
--
ALTER TABLE `Teaching`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Usr`
--
ALTER TABLE `Usr`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
