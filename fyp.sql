-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2017 at 09:10 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grp`
--

CREATE TABLE `grp` (
  `grpId` int(3) NOT NULL,
  `grpNo` int(11) NOT NULL,
  `approval` int(11) NOT NULL,
  `empId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `grpNo` int(3) NOT NULL,
  `regNo` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pastproject`
--

CREATE TABLE `pastproject` (
  `id` int(5) NOT NULL,
  `title` text NOT NULL,
  `year` year(4) NOT NULL,
  `description` text NOT NULL,
  `output` text NOT NULL,
  `supervisorId` int(5) NOT NULL,
  `students` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `progressreport`
--

CREATE TABLE `progressreport` (
  `reportId` int(5) NOT NULL,
  `projectId` int(5) NOT NULL,
  `report1` blob,
  `report2` blob,
  `report3` blob,
  `final` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `projectId` int(5) NOT NULL,
  `projectTitle` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `output` text NOT NULL,
  `grpNo` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `regNo` varchar(13) NOT NULL,
  `fName` varchar(25) NOT NULL,
  `lName` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phoneNo` varchar(20) NOT NULL,
  `course` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `empId` int(20) NOT NULL,
  `fName` int(25) NOT NULL,
  `lName` int(25) NOT NULL,
  `email` int(25) NOT NULL,
  `phoneNo` int(15) NOT NULL,
  `expertise` int(50) NOT NULL,
  `privilege` varchar(10) NOT NULL DEFAULT 'Normal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grp`
--
ALTER TABLE `grp`
  ADD PRIMARY KEY (`grpId`),
  ADD KEY `empId` (`empId`),
  ADD KEY `grpNo` (`grpNo`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`grpNo`,`regNo`),
  ADD KEY `grpNo` (`grpNo`,`regNo`);

--
-- Indexes for table `pastproject`
--
ALTER TABLE `pastproject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supervisorId` (`supervisorId`);

--
-- Indexes for table `progressreport`
--
ALTER TABLE `progressreport`
  ADD PRIMARY KEY (`reportId`),
  ADD KEY `projectId` (`projectId`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`projectId`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`regNo`),
  ADD UNIQUE KEY `regNo` (`regNo`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`empId`),
  ADD KEY `empId` (`empId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pastproject`
--
ALTER TABLE `pastproject`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `progressreport`
--
ALTER TABLE `progressreport`
  MODIFY `reportId` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `projectId` int(5) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`grpNo`) REFERENCES `grp` (`grpNo`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `pastproject`
--
ALTER TABLE `pastproject`
  ADD CONSTRAINT `pastproject_ibfk_1` FOREIGN KEY (`supervisorId`) REFERENCES `supervisor` (`empId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `progressreport`
--
ALTER TABLE `progressreport`
  ADD CONSTRAINT `progressreport_ibfk_1` FOREIGN KEY (`projectId`) REFERENCES `project` (`projectId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
