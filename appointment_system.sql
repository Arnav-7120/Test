-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2022 at 04:25 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appointment_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment form`
--

CREATE TABLE `appointment form` (
  `Choose a Rto` varchar(255) NOT NULL,
  `Choose a Department` varchar(255) NOT NULL,
  `Select Appointment Date` date NOT NULL,
  `Reschedule Appointment` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `timeslot` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `officer` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `ID` int(11) NOT NULL,
  `Name1` varchar(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Mob` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Password2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`ID`, `Name1`, `UserName`, `email`, `Mob`, `Password`, `Password2`) VALUES
(0, 'Arnav Mohanty', 'Arm', 'arnavmohanty1999@gmail.com', '9406029070', '$2y$10$qdTznb2h4qs9zQJviBHq4uSNB9t/VmrWusK379Engd8Mlh7.E11Ne', '$2y$10$4ES7UfTCKAW/B8fAAtSYdOR1HLqH6TM3vtuz.hzPNVUylnFJmivT.'),
(0, 'Arun pal', 'Ap', 'fdfcfcffc@gmail.com', '9456842563', '$2y$10$jCJW9bjp2IkWAZa./0IT4OOhIVFOQouc/bXsaU7OaESMNJqk7VEqy', '$2y$10$VQjy7fhGDqjhnyV9NI8VIOz/vO9.qeu0JQmykiz8oLjpTRWgsBVpq'),
(0, 'Arnav ', '40002732925', 'arnavmohanty@gmail.com', '9406029', '$2y$10$jcV5Gb4XZpk0u9v4DIssr.3y7PuExiEIAilto9iXJFGb45HyahVya', '$2y$10$FfzWZ1NIam9hvf.ogQz3ae7bEhtba24z//VlaMj8PBC5Nw7D6uw.2'),
(0, 'Arnav Mohan', 'am', 'f1234@gmail.com', '94060', '$2y$10$WAdJnuyV/y1.sy8FJQEe.ObVkIpGnDa/YB2zgTSEFz7XK9PUi7Jge', '$2y$10$iZL9VlGMR2XfQA7ZIjMo9Ox9eNn/mWjCPJEE96YrHBrdkAZg61jB6');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
