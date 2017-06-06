-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2017 at 09:26 AM
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
  `conceptid` int(15) NOT NULL,
  `studentid` varchar(13) NOT NULL,
  `proposedtitle` varchar(100) NOT NULL,
  `expectedoutput` varchar(50) NOT NULL,
  `conceptfile` varchar(100) NOT NULL,
  `supervisor` int(20) NOT NULL,
  `reccomend` varchar(16) NOT NULL,
  `approval` varchar(20) DEFAULT NULL,
  `time` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conceptnote`
--

INSERT INTO `conceptnote` (`conceptid`, `studentid`, `proposedtitle`, `expectedoutput`, `conceptfile`, `supervisor`, `reccomend`, `approval`, `time`) VALUES
(1, '2014-04-02775', 'Makulaji', 'Mobile App', '', 1002, 'waiting', 'waiting', '2017-04-19 09:53:00'),
(2, '2014-04-02765', 'Free Gaming', 'Web and Mobile App', '', 1001, 'disapproved', 'disapproved', '2017-04-19 09:54:12');

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
(2017003, 3, 1, 1002),
(2017005, 5, 1, 1001),
(2017042, 42, 1, 1002);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user` varchar(13) NOT NULL,
  `passwrd` varchar(45) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user`, `passwrd`, `role`) VALUES
('2014-04-02776', '0781e795b6339868e4d2822ed8f79155', 2),
('2014-04-02753', '7b0f81bdd2b24ba32cb27f6c16e6b900', 2),
('1001', '9ceb182d9b8ff8f677b8452a47a546eb', 1),
('1002', '31dc11e9d9e5550def91b4c26e6702dd', 1),
('2014-04-02941', 'c2a49574d9a282bbfc2b53978febe37e', 2),
('2014-04-02765', '600515d87c3796b0a4719d5640f3c551', 2),
('2014-04-02775', '8935705368873b69917af5531f3fcb25', 2),
('2014-04-02854', '4125046a587515dd21fa00c0d5aeeffc', 2),
('1000', '55eede497d7871e31b3b3f83be7d774b', 0);

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
(3, '2014-04-02775'),
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
  `review` varchar(100) NOT NULL,
  `sem1_progress` varchar(100) DEFAULT NULL,
  `sem1_final` varchar(100) DEFAULT NULL,
  `sem2_progress` varchar(100) DEFAULT NULL,
  `sem2_final` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `progressreport`
--

INSERT INTO `progressreport` (`reportId`, `projectId`, `review`, `sem1_progress`, `sem1_final`, `sem2_progress`, `sem2_final`) VALUES
(1, 1, '', 'reports/gr42.pdf', NULL, NULL, NULL),
(2, 2, '../review-reports/ACO.pdf', '../finalsub-reports/Bunnies-From-the-Future-FKB-MG-Books.pdf', '', '../finalsub-reports/multi-screen-consumer-whitepaper_research-studies.pdf', '../finalsub-reports/how to win friends and influence people.pdf');

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
(2, 'Final Year Project Management System', 'A system that manages content for final year projects carried out by finalist students at CoICT', 'Web app system', 5),
(4, 'YellowApp', 'Connect to your campus friends via your favorite.', 'Mobile App', 3);

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
('2014-04-02763', 'Daud ', NULL, 'Shanyangi', 'shaydavid46@gmail.com', '0719707543', 'Bsc. in Computer Science'),
('2014-04-02765', 'Jerrold', 'John', 'Gwaseko', 'jjgwaseko@gmail.com', '0717939395', 'Bsc. in Computer Science'),
('2014-04-02775', 'ANETH', NULL, 'NEMES ', 'mworiaaneth114@gmail.com	', '0753993170	', 'Bsc. in Computer Science'),
('2014-04-02776', 'Brian', 'Jude', 'Mndeme', 'pierremory1@gmail.com', '0716879797', 'Bsc. in Computer Science'),
('2014-04-02801', 'Godson', NULL, 'Derick', 'godsonderick@gmail.com', '0652559657', 'Bsc. in Computer Science'),
('2014-04-02854', 'Teodori', '', 'FAUSTINE', 'theodoryf@gmail.com	', '0653974024	', 'Bsc. in Computer Science'),
('2014-04-02862', 'George', NULL, 'Elia', 'georgemarx90@gmail.com', '0713220532', 'Bsc. in Computer Science'),
('2014-04-02941', 'Frank', NULL, 'Thomas', 'frankthomaseng@gmail.com', '0756618619', 'Bsc with Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `suggestedgroup`
--

CREATE TABLE `suggestedgroup` (
  `sugId` int(11) NOT NULL,
  `fMember` varchar(13) NOT NULL,
  `sMember` varchar(13) NOT NULL,
  `tMember` varchar(13) NOT NULL,
  `approval` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(1002, 'Collins', 'Victor', 'c.victor@udsm.ac.tz', '0754545454', 'Internet Security', '1');

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
  ADD PRIMARY KEY (`conceptid`),
  ADD KEY `supervisor` (`supervisor`);

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
-- Indexes for table `suggestedgroup`
--
ALTER TABLE `suggestedgroup`
  ADD UNIQUE KEY `suggestedGroup` (`sugId`);

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
-- AUTO_INCREMENT for table `conceptnote`
--
ALTER TABLE `conceptnote`
  MODIFY `conceptid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `projectId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `suggestedgroup`
--
ALTER TABLE `suggestedgroup`
  MODIFY `sugId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32431;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `conceptnote`
--
ALTER TABLE `conceptnote`
  ADD CONSTRAINT `conceptnote_ibfk_1` FOREIGN KEY (`supervisor`) REFERENCES `supervisor` (`empId`) ON DELETE CASCADE ON UPDATE NO ACTION;

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
