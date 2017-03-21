-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2017 at 06:28 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

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
  `title` varchar(70) NOT NULL,
  `description` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `title`, `description`, `time`) VALUES
(12, 'Concept Note Submission', 'Submit your concept notes before the 13th week of the second sememster', '2017-03-03 14:02:34'),
(13, 'Reminder: Submission Deadline for Concept Notes', 'You are all reminded to submit your concept notes on time to avoid penalties.', '2017-03-03 14:02:34'),
(15, 'Progress Report', 'Dear Students you are required to submit your progress reports in hard copy and soft copy before 5th Friday 2017 at 1600 hours.  Upload your soft copies in here and submit hard copies at the coordinator\'s office ', '2017-03-05 06:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `conceptnote`
--

CREATE TABLE `conceptnote` (
  `conceptid` varchar(15) NOT NULL,
  `studentid` varchar(13) NOT NULL,
  `proposedtitle` varchar(100) NOT NULL,
  `problemstatement` text NOT NULL,
  `significance` varchar(120) NOT NULL,
  `expectedoutput` varchar(50) NOT NULL,
  `approval` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conceptnote`
--

INSERT INTO `conceptnote` (`conceptid`, `studentid`, `proposedtitle`, `problemstatement`, `significance`, `expectedoutput`, `approval`) VALUES
('con1', '2014-04-02775', 'Makulaji', 'Watu hawali vizuri', 'Itawasaidia wanafunzi wa CoICT wale vizuri', 'Mobile App', 'waiting'),
('con2', '2014-04-02765', 'Free Gaming', 'People are paying too much for games', 'People will spend less on games', 'Web and Mobile App', 'disapproved');

-- --------------------------------------------------------

--
-- Table structure for table `grp`
--

CREATE TABLE `grp` (
  `grpId` int(7) NOT NULL,
  `grpNo` int(11) NOT NULL,
  `approval` int(11) NOT NULL,
  `empId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grp`
--

INSERT INTO `grp` (`grpId`, `grpNo`, `approval`, `empId`) VALUES
(2017005, 5, 1, 1001),
(2017042, 42, 1, 1002);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user` varchar(13) NOT NULL,
  `password` varchar(45) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user`, `password`, `role`) VALUES
('2014-04-02776', 'MNDEME', 2),
('2014-04-02753', 'DAVID', 2),
('1001', 'COSMAS', 0),
('1002', 'KOSMAS', 1),
('2014-04-02941', 'THOMAS', 2),
('2014-04-02765', 'GWASEKO', 2),
('2014-04-02775', 'NEMES', 2),
('2014-04-02854', 'FAUSTINE', 2);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `grpNo` int(3) NOT NULL,
  `regNo` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`grpNo`, `regNo`) VALUES
(5, '2014-04-02753'),
(5, '2014-04-02765'),
(5, '2014-04-02862'),
(42, '2014-04-02776'),
(42, '2014-04-02941');

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
  `report1` varchar(100) DEFAULT NULL,
  `report2` varchar(100) DEFAULT NULL,
  `report3` varchar(100) DEFAULT NULL,
  `final` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `progressreport`
--

INSERT INTO `progressreport` (`reportId`, `projectId`, `report1`, `report2`, `report3`, `final`) VALUES
(1, 1, 'reports/gr42.pdf', NULL, NULL, NULL),
(2, 2, 'reports/gr5.pdf', NULL, NULL, NULL);

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

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`projectId`, `projectTitle`, `description`, `output`, `grpNo`) VALUES
(1, 'LGA\'s Land Valuation and Taxation Management System\r\n\r\n', 'An application that assists local governments in maintaining land and their respective tax collection data.', 'A web app', 42),
(2, 'Final Year Project Management System', 'A system that manages content for final year projects carried out by finalist students at CoICT', 'Web app system', 5);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `regNo` varchar(13) NOT NULL,
  `fName` varchar(25) NOT NULL,
  `mName` varchar(25) DEFAULT NULL,
  `lName` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phoneNo` varchar(20) NOT NULL,
  `course` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`regNo`, `fName`, `mName`, `lName`, `email`, `phoneNo`, `course`) VALUES
('2014-04-02753', 'Nancy', 'Victor', 'David', 'navish45@gmail.com', '0782120252', 'Bsc. in Computer Science'),
('2014-04-02765', 'Jerrold', 'John', 'Gwaseko', 'jjgwaseko@gmail.com', '0717939395', 'Bsc. in Computer Science'),
('2014-04-02775', 'ANETH', NULL, 'NEMES ', 'mworiaaneth114@gmail.com	', '0753993170	', 'Bsc. in Computer Science'),
('2014-04-02776', 'Brian', 'Jude', 'Mndeme', 'pierremory1@gmail.com', '0716879797', 'Bsc. in Computer Science'),
('2014-04-02854', 'Teodori', '', 'FAUSTINE', 'theodoryf@gmail.com	', '0653974024	', 'Bsc. in Computer Science'),
('2014-04-02862', 'George', NULL, 'Elia', 'georgemarx90@gmail.com', '0713220532', 'Bsc. in Computer Science'),
('2014-04-02941', 'Frank', NULL, 'Thomas', 'frankthomaseng@gmail.com', '0756618619', 'Bsc with Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `empId` int(20) NOT NULL,
  `fName` varchar(25) NOT NULL,
  `lName` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phoneNo` varchar(15) NOT NULL,
  `expertise` varchar(50) NOT NULL,
  `privilege` varchar(10) NOT NULL DEFAULT 'Normal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`empId`, `fName`, `lName`, `email`, `phoneNo`, `expertise`, `privilege`) VALUES
(1001, 'Cosmas', 'Mushi', 'joseph.cosmas@udsm.ac.tz', '0714141414', 'Web Programming', '2'),
(1002, 'Kosmas', 'Kapis', 'k.kapis@udsm.ac.tz', '0754545454', 'Internet Security', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conceptnote`
--
ALTER TABLE `conceptnote`
  ADD PRIMARY KEY (`conceptid`);

--
-- Indexes for table `grp`
--
ALTER TABLE `grp`
  ADD PRIMARY KEY (`grpId`),
  ADD KEY `empId` (`empId`),
  ADD KEY `grpNo` (`grpNo`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pastproject`
--
ALTER TABLE `pastproject`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `progressreport`
--
ALTER TABLE `progressreport`
  MODIFY `reportId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `projectId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
