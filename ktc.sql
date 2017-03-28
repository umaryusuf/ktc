-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2017 at 10:17 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ktc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(2, 'admin', '5f4dcc3b5aa765d61d8327deb882cf'),
(3, 'umar', '7a1c7943385e8cb8dc0b74ff4d3c98');

-- --------------------------------------------------------

--
-- Table structure for table `parent_info`
--

CREATE TABLE `parent_info` (
  `father_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `state` varchar(50) NOT NULL,
  `local_gov` varchar(50) NOT NULL,
  `town` varchar(50) NOT NULL,
  `tribe` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent_info`
--

INSERT INTO `parent_info` (`father_id`, `student_id`, `fullname`, `phone`, `state`, `local_gov`, `town`, `tribe`, `address`) VALUES
(1, 1, 'Yusuf Abubakar', '08020989671', 'Kaduna', 'Kaduna South', 'Barnawa', 'Hausa', 'No 78 Danwaire Street Barnawa Kaduna'),
(2, 2, 'Bello Musa', '08093452132', 'Kogi', 'Okene', 'Lokoja', 'Igala', 'No 3 Okene Street Lokoja'),
(3, 3, 'Abdullahi Ibrahim', '08099992222', 'kaduna', 'Kaduna South', 'Barnawa', 'Hausa', 'No 3 kukuja road Barnawa Kaduna'),
(4, 4, 'Bello Muhammad', '08011113545', 'kaduna', 'Kaduna North', 'Tudun Wada', 'Hausa', 'No layin kosai tudun wada kaduna'),
(5, 5, 'Abdullahi Abubakar', '07032456565', 'Katsina', 'Kankara', 'Zango', 'Hausa', 'No 5 Zango Road Kankara Katsina'),
(6, 6, 'Muhammad Bello', '08198219821', 'Adamawa', 'Mubi', 'Mubi', 'Fulani', 'No 35 Lamido Road Unguwan Rimi Kaduna'),
(7, 7, 'Bello Mustapha', '08023456543', 'kaduna', 'Igabi', 'Kawo', 'Igbira', 'NO 3 kawo mando road Kawo');

-- --------------------------------------------------------

--
-- Table structure for table `students_info`
--

CREATE TABLE `students_info` (
  `student_id` int(11) NOT NULL,
  `regno` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `phone` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `town` varchar(50) NOT NULL,
  `tribe` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `local_gov` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students_info`
--

INSERT INTO `students_info` (`student_id`, `regno`, `fullname`, `phone`, `date_of_birth`, `sex`, `town`, `tribe`, `state`, `religion`, `local_gov`, `address`) VALUES
(1, 23344, 'Umar Yusuf', '08066249684', '1996-07-17', 'Male', 'Barnawa', 'Hausa', 'Kaduna', 'Muslim', 'Kaduna South', 'No. 78 Danwaire street Barnawa kaduna'),
(2, 23447, 'Yahaya Bello', '08034567843', '1994-11-01', 'male', 'lokojja', 'Igala', 'Kogi', 'muslim', 'Okene', 'No 3 Okene Street Lokoja'),
(3, 233467, 'Sani Abdullahi', '08198989898', '1990-02-12', 'male', 'Barnawa', 'Hausa', 'kaduna', 'muslim', 'Kaduna South', 'No 3 kukuja road Barnawa Kaduna'),
(4, 235546, 'Ahmadu Bello', '08023232323', '1996-01-01', 'male', 'kaya', 'Hausa', 'Sokoto', 'muslim', 'sokoto', 'No 43 sokoto road Sokoto'),
(5, 23432, 'Maryam Abdullahi', '08080808080', '1999-12-02', 'female', 'Unguwan Sarki', 'Hausa', 'kaduna', 'muslim', 'Kaduna North', 'No 5 Alkali road Unguwan Sarki'),
(6, 23232, 'Sadiya Muhammad', '07098989898', '1992-05-12', 'female', 'Unguwan Rimi', 'Fulani', 'Adamawa', 'muslim', 'Mubi', 'No 35 Lamido Road Unguwan Rimi Kaduna'),
(7, 23234, 'Adamu Bello', '09089897676', '1992-12-12', 'male', 'Kawo', 'Igbira', 'kaduna', 'muslim', 'Igabi', 'No 3 Kawo mando road Kawo kaduna');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'umar', 'umar@umar.com', '05bb6c809136ad6c24d36012cbc3147e'),
(2, 'Farooq', 'farooq@farooq.com', '7a1c7943385e8cb8dc0b74ff4d3c9844');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent_info`
--
ALTER TABLE `parent_info`
  ADD PRIMARY KEY (`father_id`);

--
-- Indexes for table `students_info`
--
ALTER TABLE `students_info`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `parent_info`
--
ALTER TABLE `parent_info`
  MODIFY `father_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `students_info`
--
ALTER TABLE `students_info`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
