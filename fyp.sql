-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2017 at 05:46 AM
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
(15, 'Progress Report', 'Dear Students you are required to submit your progress reports in hard copy and soft copy before 5th Friday 2017 at 1600 hours.  Upload your soft copies in here and submit hard copies at the coordinator\'s office ', '2017-03-05 06:44:10'),
(16, 'Final session', 'Grand finale in June', '2017-06-29 07:08:31'),
(17, 'Tunatest site', 'Kuna Kamag, Danny, Kelvin, na Nancy', '2017-07-24 15:14:05');

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
  `supervisor` varchar(20) NOT NULL,
  `reccomended` varchar(16) NOT NULL,
  `approval` varchar(20) DEFAULT NULL,
  `time` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conceptnote`
--

INSERT INTO `conceptnote` (`conceptid`, `studentid`, `proposedtitle`, `expectedoutput`, `conceptfile`, `supervisor`, `reccomended`, `approval`, `time`) VALUES
(1, '2014-04-02775', 'Makulaji', 'Mobile App', '', 'cvictor', 'waiting', 'waiting', '2017-04-19 09:53:00'),
(5, '$regNo', '$proptitle', '$expectedoutput', '$target_file', 'cvictor', 'no', 'disapproved', '2017-06-07 17:50:05'),
(6, '2014-04-02753', 'Nana', 'Web APP', '../concept-notes/GR5.pdf', 'cvictor', 'no', 'waiting', '2017-06-07 17:51:12'),
(8, '2014-04-02776', 'Betting for Basketball', 'Mob App', '../concept-notes/D_interior_logo.pdf', 'cmushi', 'no', 'approved', '2017-06-07 18:30:13'),
(12, '2014-04-02765', 'Baby Cot', 'Mobile App', '../concept-notes/babycot.docx', 'cmushi', 'no', 'waiting', '2017-06-29 09:22:08'),
(13, '2014-04-02765', 'Feeder', 'device', '../concept-notes/feeder.docx', 'mtunga', 'no', 'waiting', '2017-06-29 09:24:41');

-- --------------------------------------------------------

--
-- Table structure for table `grp`
--

CREATE TABLE `grp` (
  `grpId` int(7) NOT NULL,
  `grpNo` int(11) NOT NULL,
  `approval` int(11) NOT NULL,
  `empId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grp`
--

INSERT INTO `grp` (`grpId`, `grpNo`, `approval`, `empId`) VALUES
(6482, 10, 1, 'mtunga'),
(9721, 15, 1, 'mtunga'),
(10657, 21, 1, 'hkimaro'),
(13199, 27, 1, 'hkalisti'),
(14887, 18, 1, 'hkimaro'),
(16872, 31, 1, 'cmushi'),
(20087, 22, 1, 'hkimaro'),
(24083, 17, 1, 'hkimaro'),
(28728, 25, 1, 'hkalisti'),
(32413, 28, 1, 'cmushi'),
(32761, 35, 1, 'cmushi'),
(35328, 23, 1, 'hkimaro'),
(38879, 20, 1, 'hkimaro'),
(46281, 29, 1, 'cmushi'),
(53347, 33, 1, 'cmushi'),
(61580, 34, 1, 'cmushi'),
(70876, 14, 1, 'mtunga'),
(72576, 16, 1, 'hkimaro'),
(79481, 30, 1, 'cmushi'),
(87859, 24, 1, 'hkimaro'),
(88508, 12, 1, 'mtunga'),
(89959, 11, 1, 'mtunga'),
(90207, 26, 1, 'hkalisti'),
(91401, 32, 1, 'cmushi'),
(96052, 13, 1, 'mtunga'),
(99337, 19, 1, 'hkimaro'),
(2017003, 3, 1, 'cvictor'),
(2017005, 5, 1, 'cmushi'),
(2017042, 1, 1, 'hkalisti');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user` varchar(13) NOT NULL,
  `passwrd` varchar(45) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user`, `passwrd`, `role`) VALUES
('1000', '55eede497d7871e31b3b3f83be7d774b', 0),
('2014-04-02747', 'Kowero', 2),
('2014-04-02748', 'Mwaisaka', 2),
('2014-04-02753', '172522ec1028ab781d9dfd17eaca4427', 2),
('2014-04-02757', 'Mhagama', 2),
('2014-04-02765', '30035607ee5bb378c71ab434a6d05410', 2),
('2014-04-02775', '8935705368873b69917af5531f3fcb25', 2),
('2014-04-02776', '0781e795b6339868e4d2822ed8f79155', 2),
('2014-04-02795', 'Manyhnela ', 2),
('2014-04-02807', 'Wickama', 2),
('2014-04-02834', '5b5c45f1b9e444d9e441211cfb325270', 2),
('2014-04-02835', 'Jackson', 2),
('2014-04-02838', 'Gaitu', 2),
('2014-04-02841', 'Mwakalundwa', 2),
('2014-04-02854', '4125046a587515dd21fa00c0d5aeeffc', 2),
('2014-04-02915', 'Babere', 2),
('2014-04-02926', 'Mbwilo', 2),
('2014-04-02928', 'Amasi', 2),
('2014-04-02941', 'c2a49574d9a282bbfc2b53978febe37e', 2),
('2014-04-02953', 'Mwangila', 2),
('cmushi', '9ceb182d9b8ff8f677b8452a47a546eb', 1),
('cvictor', 'ffc150a160d37e92012c196b6af4160d', 1),
('hkalisti', '6b0130f25b82cafd888154c29440ff20', 1),
('hkimaro', '2f4ce07dc44d40051a58acfd5a4839c6', 0),
('kfrank', 'f9dc77cece7fa16f6edd2d1d64853e4b', 1),
('kkapis', 'fe24d2219c3c9d858d3b69916ab123d1', 1),
('mtunga', '6f0ae3c152b033b7237808cd1a74814f', 1);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `idlogs` int(11) NOT NULL,
  `time` timestamp(6) NULL DEFAULT NULL,
  `progressreport_reportId` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, '2014-04-02750'),
(1, '2014-04-02758'),
(3, '2014-04-02775'),
(3, '2014-04-02801'),
(5, '2014-04-02753'),
(5, '2014-04-02765'),
(5, '2014-04-02862'),
(10, ''),
(10, '2014-04-02753'),
(10, '2014-04-02765'),
(10, '2014-04-02776'),
(10, '2014-04-02854'),
(10, '2014-04-02941'),
(11, '2014-04-02915'),
(11, '2014-04-02926'),
(11, '2014-04-02928'),
(17, ''),
(17, '2014-04-02753'),
(17, '2014-04-02941'),
(18, '2014-04-02765'),
(18, '2014-04-02776'),
(18, '2014-04-02854'),
(19, '2014-04-02765'),
(19, '2014-04-02776'),
(19, '2014-04-02854'),
(20, '2014-04-02765'),
(20, '2014-04-02776'),
(20, '2014-04-02854'),
(21, '2014-04-02765'),
(21, '2014-04-02776'),
(21, '2014-04-02854'),
(22, '2014-04-02765'),
(22, '2014-04-02776'),
(22, '2014-04-02854'),
(23, '2014-04-02765'),
(23, '2014-04-02776'),
(23, '2014-04-02854'),
(24, '2014-04-02765'),
(24, '2014-04-02776'),
(24, '2014-04-02854'),
(25, '2014-04-02765'),
(25, '2014-04-02776'),
(25, '2014-04-02854'),
(29, '2014-04-02765'),
(29, '2014-04-02776'),
(29, '2014-04-02854'),
(30, '2014-04-02765'),
(30, '2014-04-02776'),
(30, '2014-04-02854'),
(31, '2014-04-02765'),
(31, '2014-04-02776'),
(31, '2014-04-02854'),
(32, '2014-04-02765'),
(32, '2014-04-02776'),
(32, '2014-04-02854'),
(33, '2014-04-02765'),
(33, '2014-04-02776'),
(33, '2014-04-02854'),
(34, '2014-04-02765'),
(34, '2014-04-02776'),
(34, '2014-04-02854'),
(35, ''),
(35, '2014-04-02753'),
(35, '2014-04-02941');

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
  `pastprojectfile` varchar(60) NOT NULL,
  `supervisorId` varchar(20) NOT NULL,
  `students` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pastproject`
--

INSERT INTO `pastproject` (`id`, `title`, `year`, `description`, `output`, `pastprojectfile`, `supervisorId`, `students`) VALUES
(1, 'Book Swappers', 2015, 'A site for book lovers to showcase their book libraries and swap books with other readers', 'Web App', '..\\past-projects\\BookSwappers.pdf', 'cvictor', '2015004');

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
(2, 2, '../review-reports/Qn 2.docx', '../finalsub-reports/Bunnies-From-the-Future-FKB-MG-Books.pdf', '', '../finalsub-reports/multi-screen-consumer-whitepaper_research-studies.pdf', '../finalsub-reports/how to win friends and influence people.pdf');

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
(1, 'LGA\'s Land Valuation and Taxation Management System\r\n\r\n', 'An application that assists local governments in maintaining land and their respective tax collection data.', 'A web app', 1),
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
('2014-04-02747', 'Abubakari', ' Yasini', 'Kowero', 'abuyako@gmail.com', '+255714228208', 'Bsc. in Computer Science'),
('2014-04-02748', 'Timothy', '', 'Mwaisaka', 'timoso@yahoo.com', '+255716683434', 'Bsc. in Computer Science'),
('2014-04-02750', 'Jesse-Justin', 'S', 'Mdachi', 'jessejustinm@gmail.com', '0684597032', 'Bsc. in Computer Science'),
('2014-04-02753', 'Nancy', 'Victor', 'David', 'navish45@gmail.com', '0782120252', 'Bsc. in Computer Science'),
('2014-04-02757', 'Janeth', 'Yohana', 'Mhagama', 'janethmhagama@gmail.com', '+255785979254', 'Bsc. in Computer Science'),
('2014-04-02758', 'Raymond', NULL, 'Chacha', 'raymondchacha19@gmail.com', '0652799910', 'Bsc. in Computer Science'),
('2014-04-02763', 'Daud ', NULL, 'Shanyangi', 'shaydavid46@gmail.com', '0719707543', 'Bsc. in Computer Science'),
('2014-04-02765', 'Jerrold', 'John', 'Gwaseko', 'jjgwaseko@gmail.com', '0717939395', 'Bsc. in Computer Science'),
('2014-04-02775', 'ANETH', NULL, 'NEMES ', 'mworiaaneth114@gmail.com  ', '0753993170  ', 'Bsc. in Computer Science'),
('2014-04-02776', 'Brian', 'Jude', 'Mndeme', 'pierremory1@gmail.com', '0716879797', 'Bsc. in Computer Science'),
('2014-04-02795', 'Emmanuel ', '', 'Manyhnela ', 'emanuelian3@gmail.com', '+255752548877', 'Bsc. in Computer Science'),
('2014-04-02801', 'Godson', NULL, 'Derick', 'godsonderick@gmail.com', '0652559657', 'Bsc. in Computer Science'),
('2014-04-02807', 'Ibrahim', 'Juma', 'Wickama', 'ibrahimwickama@gmail.com', '+255653994194', 'Bsc. in Computer Science'),
('2014-04-02812', 'Jephter ', 'John', 'Saganda', 'jephtersaganda30@gmail.com', '0716474389', 'Bsc. in Computer Science'),
('2014-04-02834', 'Oswald', 'Gerald', 'Moshi', 'moswaldgerald@gmail.com', '+255762592689', 'Bsc. in Computer Science'),
('2014-04-02835', 'Jackson Paschal ', '', 'Jackson', 'paschaljackson111@gmail.com', '+255682611584', 'Bsc. in Computer Science'),
('2014-04-02838', 'Pendo ', 'P', 'Gaitu', 'cutiependo@gmail.com', '+255653175907', 'Bsc. in Computer Science'),
('2014-04-02841', 'Reuben ', 'W.', 'Mwakalundwa', '23nownii5t311a@gmail.com', '+255683950948', 'Bsc. in Computer Science'),
('2014-04-02854', 'Teodori', '', 'FAUSTINE', 'theodoryf@gmail.com ', '0653974024  ', 'Bsc. in Computer Science'),
('2014-04-02862', 'George', NULL, 'Elia', 'georgemarx90@gmail.com', '0713220532', 'Bsc. in Computer Science'),
('2014-04-02915', 'Daniel', '', 'Babere', 'danielbabere@gmail.com', '+255657316169', 'Bsc with Computer Science'),
('2014-04-02926', 'David ', 'Pius', 'Mbwilo', 'mbwilodavy@gmail.com', '+255652612459', 'Bsc. with Computer Science'),
('2014-04-02928', 'Deogratias ', 'Peter', 'Amasi', 'amasdeorsantos@gmail.com', '+255712794778', 'BSc with Computer Science'),
('2014-04-02941', 'Frank', NULL, 'Thomas', 'frankthomaseng@gmail.com', '0756618619', 'Bsc with Computer Science'),
('2014-04-02953', 'Helena', 'Charles', 'Mwangila', 'mwangilahelena@gmail.com', '+255752150498', 'Bsc. with Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `suggestedgroup`
--

CREATE TABLE `suggestedgroup` (
  `sugId` int(11) NOT NULL,
  `fMember` varchar(13) NOT NULL,
  `sMember` varchar(13) NOT NULL,
  `tMember` varchar(13) NOT NULL,
  `approval` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suggestedgroup`
--

INSERT INTO `suggestedgroup` (`sugId`, `fMember`, `sMember`, `tMember`, `approval`) VALUES
(32431, '2014-04-02801', '2014-04-02763', '', 'waiting'),
(32433, '2014-04-02750', '2014-04-02812', '2014-04-02758', 'disapproved'),
(32434, '2014-04-02941', '2014-04-02753', '', 'assigned'),
(32435, '2014-04-02941', '2014-04-02854', '2014-04-02776', 'approved'),
(32437, '2014-04-02854', '2014-04-02765', '2014-04-02776', 'assigned');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `empId` varchar(20) NOT NULL,
  `fName` varchar(25) NOT NULL,
  `lName` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phoneNo` varchar(15) NOT NULL,
  `expertise` varchar(50) NOT NULL,
  `office` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`empId`, `fName`, `lName`, `email`, `phoneNo`, `expertise`, `office`) VALUES
('cmushi', 'Cosmas', 'Mushi', 'joseph.cosmas@udsm.ac.tz', '0714141414', 'Web Programming', 'A23'),
('cvictor', 'Collins', 'Victor', 'c.victor@udsm.ac.tz', '0754545454', 'Internet Security', 'A20'),
('hkalisti', 'Mr. Henry', 'Kalisti', 'kanry2@gmail.com', '0758010101', 'Database', 'B108'),
('hkimaro', 'Dr. Honest', 'Kimaro', '', '', 'IOT', ''),
('kfrank', 'Mr. Kennedy', 'Frank', 'kenfactz@gmail.com', '', 'Data Science', ''),
('kkapis', 'Dr. Kosmas', 'Kapis', '', '', 'IT Security', 'A23'),
('mtunga', 'Ms. Mahadia', 'Tunga', 'mahadiatunga@gmail.com', '', 'Software Development', '');

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
  ADD PRIMARY KEY (`user`),
  ADD KEY `empId` (`user`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`idlogs`),
  ADD KEY `fk_logs_progressreport1_idx` (`progressreport_reportId`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `conceptnote`
--
ALTER TABLE `conceptnote`
  MODIFY `conceptid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `grp`
--
ALTER TABLE `grp`
  MODIFY `grpNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `idlogs` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pastproject`
--
ALTER TABLE `pastproject`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `sugId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32438;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `conceptnote`
--
ALTER TABLE `conceptnote`
  ADD CONSTRAINT `conceptnote_ibfk_1` FOREIGN KEY (`supervisor`) REFERENCES `supervisor` (`empId`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `fk_logs_progressreport1` FOREIGN KEY (`progressreport_reportId`) REFERENCES `progressreport` (`reportId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
