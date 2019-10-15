-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 15, 2019 at 02:22 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buildingpermit`
--

-- --------------------------------------------------------

--
-- Table structure for table `bp_applicants`
--

CREATE TABLE `bp_applicants` (
  `id` int(255) NOT NULL,
  `lname` text NOT NULL,
  `fname` text NOT NULL,
  `mi` text NOT NULL,
  `tin` text NOT NULL,
  `add_no` text NOT NULL,
  `street` text NOT NULL,
  `barangay` text NOT NULL,
  `municipality` text NOT NULL,
  `zip_code` text NOT NULL,
  `tel_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bp_building`
--

CREATE TABLE `bp_building` (
  `id` int(255) NOT NULL,
  `applicant_id` int(255) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bp_forms`
--

CREATE TABLE `bp_forms` (
  `id` int(255) NOT NULL,
  `building_id` int(255) DEFAULT NULL,
  `type` varchar(100) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bp_users`
--

CREATE TABLE `bp_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pw` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bp_users`
--

INSERT INTO `bp_users` (`id`, `username`, `pw`) VALUES
(1, 'admin', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bp_applicants`
--
ALTER TABLE `bp_applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bp_building`
--
ALTER TABLE `bp_building`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bp_forms`
--
ALTER TABLE `bp_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bp_users`
--
ALTER TABLE `bp_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bp_applicants`
--
ALTER TABLE `bp_applicants`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bp_building`
--
ALTER TABLE `bp_building`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bp_forms`
--
ALTER TABLE `bp_forms`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bp_users`
--
ALTER TABLE `bp_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
