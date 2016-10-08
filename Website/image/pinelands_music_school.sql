-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2016 at 01:24 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pinelands_music_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `classID` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `classDate` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `roomNumber` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `instrumenthire`
--

CREATE TABLE `instrumenthire` (
  `hireID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `instrumentID` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `quantity` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `instrumenthire`
--

INSERT INTO `instrumenthire` (`hireID`, `studentID`, `instrumentID`, `startDate`, `endDate`, `quantity`) VALUES
(68, 1, 2, '2016-10-06', '2017-01-06', '2');

-- --------------------------------------------------------

--
-- Table structure for table `instruments`
--

CREATE TABLE `instruments` (
  `instrumentID` int(11) NOT NULL,
  `instrumentType` varchar(30) NOT NULL,
  `hireCost` decimal(5,2) DEFAULT NULL,
  `hireCostLesson` decimal(5,2) DEFAULT NULL,
  `conditionQuality` enum('New','Excellent','Good','Repair','Discard') NOT NULL,
  `Quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `instruments`
--

INSERT INTO `instruments` (`instrumentID`, `instrumentType`, `hireCost`, `hireCostLesson`, `conditionQuality`, `Quantity`) VALUES
(1, 'Guitar', '50.00', '5.00', 'New', 0),
(2, 'Violin', '20.00', '2.00', 'Good', 50);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `username`, `password`) VALUES
(1, 'administrator', 'pinelands');

-- --------------------------------------------------------

--
-- Table structure for table `studentclass`
--

CREATE TABLE `studentclass` (
  `classID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `studentguardian`
--

CREATE TABLE `studentguardian` (
  `guardianID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `guardianFirstName` varchar(30) NOT NULL,
  `guardianLastName` varchar(30) NOT NULL,
  `guardianEmail` varchar(255) NOT NULL,
  `guardianPhoneNumber` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `studentlogin`
--

CREATE TABLE `studentlogin` (
  `studentID` int(11) NOT NULL,
  `studentUsername` char(8) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `studentlogin`
--

INSERT INTO `studentlogin` (`studentID`, `studentUsername`, `Password`) VALUES
(1, 'n1234567', 'password1');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentID` int(11) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `familyName` varchar(30) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `DOB` date NOT NULL,
  `street` varchar(50) NOT NULL,
  `suburb` varchar(30) NOT NULL,
  `state` enum('QLD','NSW','ACT','VIC','TAS','SA','WA','NT') NOT NULL,
  `postcode` char(4) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `mobileNumber` varchar(11) DEFAULT NULL,
  `preferredDay` varchar(9) DEFAULT NULL,
  `preferredTime` char(7) DEFAULT NULL,
  `preferredTeacher` varchar(60) DEFAULT NULL,
  `preferredLanguage` text,
  `preferredGender` varchar(10) DEFAULT NULL,
  `enroled` char(1) NOT NULL,
  `guardianFirstName` varchar(30) DEFAULT NULL,
  `guardianLastName` varchar(30) DEFAULT NULL,
  `guardianPhonenumber` varchar(11) DEFAULT NULL,
  `guardianEmail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentID`, `firstName`, `familyName`, `gender`, `DOB`, `street`, `suburb`, `state`, `postcode`, `emailAddress`, `mobileNumber`, `preferredDay`, `preferredTime`, `preferredTeacher`, `preferredLanguage`, `preferredGender`, `enroled`, `guardianFirstName`, `guardianLastName`, `guardianPhonenumber`, `guardianEmail`) VALUES
(1, 'Tom', 'Santos', 'Male', '1995-07-12', '39 main St', 'Sunnybank', 'QLD', '4012', 'tomsantos@gmail.com', '0426256076', NULL, NULL, NULL, NULL, NULL, 'Y', NULL, NULL, NULL, NULL),
(2, 'Hang', 'Su', 'Male', '1995-02-12', '64 cook st', 'Brisbane', 'QLD', '4075', 'suhangj123@gmail.com', '422893716', 'title', '', '', '', '', 'N', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacherlogin`
--

CREATE TABLE `teacherlogin` (
  `teacherID` int(11) NOT NULL,
  `teacherUsername` varchar(8) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacherlogin`
--

INSERT INTO `teacherlogin` (`teacherID`, `teacherUsername`, `Password`) VALUES
(1, 't1234567', 'password1');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacherID` int(11) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `familyName` varchar(30) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `DOB` date NOT NULL,
  `qualifications` text,
  `emailAddress` varchar(255) NOT NULL,
  `mobileNumber` varchar(11) DEFAULT NULL,
  `otherNumber` varchar(11) DEFAULT NULL,
  `instrumentType` varchar(30) NOT NULL,
  `spokenLanguage` text NOT NULL,
  `skillLevel` enum('1','2','3','4','5') DEFAULT NULL,
  `comments` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacherID`, `firstName`, `familyName`, `gender`, `DOB`, `qualifications`, `emailAddress`, `mobileNumber`, `otherNumber`, `instrumentType`, `spokenLanguage`, `skillLevel`, `comments`) VALUES
(1, 'bob', 'bobby', 'Male', '1983-02-15', 'Graduated', 'bob.bobby@gmail.com', NULL, '07123456', 'Piano', 'English, Spanish', NULL, 'Great teacher'),
(2, 'Hang', 'Su', 'Male', '1983-01-10', 'Graduated', 'suhang@gmail.com', NULL, '07234567', 'Guitar', 'English,Chinese', NULL, 'Great teacher'),
(3, 'Luna', 'Brown', 'Female', '1990-10-22', 'Graduated', 'Luna123@gmail.com', NULL, '07134565', 'Piano', 'English', NULL, 'Great teacher');

-- --------------------------------------------------------

--
-- Table structure for table `teachingcontract`
--

CREATE TABLE `teachingcontract` (
  `contractID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `lessonType` varchar(30) DEFAULT NULL,
  `lessonDuration` enum('30','60') NOT NULL,
  `lessonCost` decimal(5,2) NOT NULL,
  `lessonFrequency` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`classID`),
  ADD KEY `teacherID` (`teacherID`);

--
-- Indexes for table `instrumenthire`
--
ALTER TABLE `instrumenthire`
  ADD PRIMARY KEY (`hireID`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `instrumentID` (`instrumentID`);

--
-- Indexes for table `instruments`
--
ALTER TABLE `instruments`
  ADD PRIMARY KEY (`instrumentID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentclass`
--
ALTER TABLE `studentclass`
  ADD PRIMARY KEY (`classID`,`studentID`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `studentguardian`
--
ALTER TABLE `studentguardian`
  ADD PRIMARY KEY (`guardianID`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `studentlogin`
--
ALTER TABLE `studentlogin`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `teacherlogin`
--
ALTER TABLE `teacherlogin`
  ADD PRIMARY KEY (`teacherID`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacherID`);

--
-- Indexes for table `teachingcontract`
--
ALTER TABLE `teachingcontract`
  ADD PRIMARY KEY (`contractID`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `teacherID` (`teacherID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `classID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `instrumenthire`
--
ALTER TABLE `instrumenthire`
  MODIFY `hireID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `instruments`
--
ALTER TABLE `instruments`
  MODIFY `instrumentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `studentguardian`
--
ALTER TABLE `studentguardian`
  MODIFY `guardianID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `teachingcontract`
--
ALTER TABLE `teachingcontract`
  MODIFY `contractID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`teacherID`) REFERENCES `teachers` (`teacherID`);

--
-- Constraints for table `instrumenthire`
--
ALTER TABLE `instrumenthire`
  ADD CONSTRAINT `instrumenthire_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`),
  ADD CONSTRAINT `instrumenthire_ibfk_2` FOREIGN KEY (`instrumentID`) REFERENCES `instruments` (`instrumentID`);

--
-- Constraints for table `studentclass`
--
ALTER TABLE `studentclass`
  ADD CONSTRAINT `studentclass_ibfk_1` FOREIGN KEY (`classID`) REFERENCES `classes` (`classID`),
  ADD CONSTRAINT `studentclass_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`);

--
-- Constraints for table `studentguardian`
--
ALTER TABLE `studentguardian`
  ADD CONSTRAINT `studentguardian_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`);

--
-- Constraints for table `studentlogin`
--
ALTER TABLE `studentlogin`
  ADD CONSTRAINT `studentlogin_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`);

--
-- Constraints for table `teacherlogin`
--
ALTER TABLE `teacherlogin`
  ADD CONSTRAINT `teacherlogin_ibfk_1` FOREIGN KEY (`teacherID`) REFERENCES `teachers` (`teacherID`);

--
-- Constraints for table `teachingcontract`
--
ALTER TABLE `teachingcontract`
  ADD CONSTRAINT `teachingcontract_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`),
  ADD CONSTRAINT `teachingcontract_ibfk_2` FOREIGN KEY (`teacherID`) REFERENCES `teachers` (`teacherID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
