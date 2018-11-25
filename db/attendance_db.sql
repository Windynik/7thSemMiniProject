-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 25, 2018 at 05:58 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_table`
--

DROP TABLE IF EXISTS `student_table`;
CREATE TABLE IF NOT EXISTS `student_table` (
  `std_roll_no` varchar(15) NOT NULL,
  `student_name` varchar(32) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `semester` int(5) NOT NULL,
  PRIMARY KEY (`std_roll_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_table`
--

INSERT INTO `student_table` (`std_roll_no`, `student_name`, `gender`, `email`, `phone`, `semester`) VALUES
('1ay15is057', 'nikhil', 'Male', 'nik@gmail.com', '9495571026', 7),
('1ay15is003', 'abhi', 'Male', 'abhi@gmail.com', '9495572222', 7),
('1ay15is000', 'adi', 'male', 'adi@gmail.com', '9393939', 5),
('1ay15is066', 'Tard', 'male', 'tard@gmail.com', '2222222', 7);

-- --------------------------------------------------------

--
-- Table structure for table `subject_table`
--

DROP TABLE IF EXISTS `subject_table`;
CREATE TABLE IF NOT EXISTS `subject_table` (
  `subject_no` varchar(15) NOT NULL,
  `subject_name` varchar(30) NOT NULL,
  `teacher_name` varchar(20) NOT NULL,
  `semester` int(5) NOT NULL,
  PRIMARY KEY (`subject_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_table`
--

INSERT INTO `subject_table` (`subject_no`, `subject_name`, `teacher_name`, `semester`) VALUES
('123kek', 'IMS', 'Kala', 1),
('123rff', 'WT', 'Ranjitha', 5),
('15is0', 'SE', 'chaya', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

DROP TABLE IF EXISTS `tbl_attendance`;
CREATE TABLE IF NOT EXISTS `tbl_attendance` (
  `attID` int(11) NOT NULL AUTO_INCREMENT,
  `std_roll_no` varchar(15) NOT NULL,
  `subject_no` varchar(15) NOT NULL,
  `attendance` varchar(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`attID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`attID`, `std_roll_no`, `subject_no`, `attendance`, `date`) VALUES
(1, '1ay15is057', '123kek', 'P', '2018-11-22'),
(3, '1ay15is057', '15is0', 'P', '2018-11-23'),
(4, '1ay15is057', '123rff', 'P', '2018-11-23'),
(5, '1ay15is057', '15is0', 'A', '2018-11-23'),
(7, '1ay15is003', '123rff', 'P', '2018-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_table`
--

DROP TABLE IF EXISTS `teacher_table`;
CREATE TABLE IF NOT EXISTS `teacher_table` (
  `teacher_id` int(20) NOT NULL AUTO_INCREMENT,
  `teacher_name` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_table`
--

INSERT INTO `teacher_table` (`teacher_id`, `teacher_name`, `gender`, `email`, `phone`) VALUES
(2, 'Jamuna', 'female', 'jamuna@gmail.com', '9898989898'),
(3, 'Marigowda', 'male', 'mari@gmail.com', '9595959595');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `type_id` int(100) NOT NULL DEFAULT '3',
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`type_id`, `username`, `password`, `id`) VALUES
(1, 'nikhil', '123', 1),
(1, 'nik', 'bnm', 2),
(2, 'adi', 'abc', 3),
(3, 'abhi', 'abc', 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
