-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 07, 2021 at 05:56 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quantox`
--

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `grade_id` int(11) NOT NULL,
  `grade_student_id` int(11) DEFAULT NULL,
  `grade_value` int(11) DEFAULT NULL,
  `grade_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `grade_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`grade_id`, `grade_student_id`, `grade_value`, `grade_updated`, `grade_created`) VALUES
(1, 1, 5, '2021-02-07 15:49:07', '2021-02-07 15:49:07'),
(2, 1, 1, '2021-02-07 15:49:07', '2021-02-07 15:49:07'),
(3, 1, 9, '2021-02-07 15:49:19', '2021-02-07 15:49:19'),
(4, 2, 9, '2021-02-07 15:49:30', '2021-02-07 15:49:30'),
(5, 2, 1, '2021-02-07 15:49:34', '2021-02-07 15:49:34');

-- --------------------------------------------------------

--
-- Table structure for table `school_boards`
--

CREATE TABLE `school_boards` (
  `school_board_id` int(11) NOT NULL,
  `school_board_name` varchar(70) DEFAULT NULL,
  `school_board_updated` timestamp NULL DEFAULT current_timestamp(),
  `school_board_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `school_boards`
--

INSERT INTO `school_boards` (`school_board_id`, `school_board_name`, `school_board_updated`, `school_board_created`) VALUES
(1, 'CSM', '2021-02-07 13:15:33', '2021-02-07 13:15:33'),
(2, 'CSMB', '2021-02-07 13:15:33', '2021-02-07 13:15:33');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `student_school_board_id` int(11) DEFAULT NULL,
  `student_first_name` varchar(70) DEFAULT NULL,
  `student_last_name` varchar(70) DEFAULT NULL,
  `student_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `student_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_school_board_id`, `student_first_name`, `student_last_name`, `student_updated`, `student_created`) VALUES
(1, 2, 'Dejan', 'Tomic', '2021-02-07 13:22:27', '2021-02-07 13:22:27'),
(2, 1, 'Marko', 'Simic', '2021-02-07 13:22:27', '2021-02-07 13:22:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`grade_id`),
  ADD KEY `grade_student_id` (`grade_student_id`);

--
-- Indexes for table `school_boards`
--
ALTER TABLE `school_boards`
  ADD PRIMARY KEY (`school_board_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `student_school_board_id` (`student_school_board_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `school_boards`
--
ALTER TABLE `school_boards`
  MODIFY `school_board_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`grade_student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`student_school_board_id`) REFERENCES `school_boards` (`school_board_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
