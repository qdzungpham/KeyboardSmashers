-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2016 at 04:30 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
CREATE DATABASE IF NOT EXISTS pinelands_music_school;
USE pinelands_music_school;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pinelands_music_school`
--


-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(30) NOT NULL,
  `familyName` varchar(30) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
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
  `guardianEmail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`studentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentID`, `firstName`, `familyName`, `gender`, `DOB`, `street`, `suburb`, `state`, `postcode`, `emailAddress`, `mobileNumber`, `preferredDay`, `preferredTime`, `preferredTeacher`, `preferredLanguage`, `preferredGender`, `enroled`, `guardianFirstName`, `guardianLastName`, `guardianPhonenumber`, `guardianEmail`) VALUES
(1, 'Tom', 'Santos', 'Male', '1995-07-12', '39 main St', 'Sunnybank', 'QLD', '4012', 'tomsantos@gmail.com', '0426256076', NULL, NULL, NULL, NULL, NULL, 'Y', NULL, NULL, NULL, NULL),
(2, 'Hang', 'Su', 'Male', '1995-02-12', '64 cook st', 'Brisbane', 'QLD', '4075', 'suhangj123@gmail.com', '422893716', 'title', '', '', '', '', 'N', '', '', '', ''),
(3, 'Hang', 'Su', 'Male', '1995-12-24', '64 cook st', 'Brisbane', 'QLD', '4075', 'suhangj@sohu.com', '0422893716', 'title', '', '', '', '', 'Y', '', '', '', '');


-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacherID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(30) NOT NULL,
  `familyName` varchar(30) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `DOB` date NOT NULL,
  `address` varchar(255) NOT NULL,      -- --------------- IS THIS NECESSARY??????????????
  `qualifications` text,
  `emailAddress` varchar(255) NOT NULL,
  `mobileNumber` varchar(11) DEFAULT NULL,
  `otherNumber` varchar(11) DEFAULT NULL,
  `instrumentType` varchar(30) NOT NULL,
  `spokenLanguage` text NOT NULL,
  `skillLevel` enum('1','2','3','4','5') DEFAULT NULL,        -- ---------- THIS NEEDS IMPROVEMENT FOR CLARITY
  `comments` text,
  PRIMARY KEY (`teacherID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacherID`, `firstName`, `familyName`, `gender`, `DOB`, `address`, `qualifications`, `emailAddress`, `mobileNumber`, `otherNumber`, `instrumentType`, `spokenLanguage`, `skillLevel`, `comments`) VALUES
(1, 'bob', 'bobby', 'Male', '1983-02-15', '39 cook st Forest Lake Brisbane', 'Graduated', 'bob.bobby@gmail.com', NULL, '07123456', 'Piano,Guitar', 'English, Spanish', NULL, 'Great teacher'),
(2, 'Hang', 'Su', 'Male', '1983-01-10', '46 main St SunyBank Brisbane', 'Graduated', 'suhang@gmail.com', NULL, '07234567', 'Guitar,Violin', 'English,Chinese', NULL, 'Great teacher'),
(3, 'Luna', 'Brown', 'Female', '1990-10-22', '', 'Graduated', 'Luna123@gmail.com', NULL, '07134565', 'Piano', 'English', NULL, 'Great teacher');


-- --------------------------------------------------------

--
-- Table structure for table `instruments`
--

CREATE TABLE `instruments` (
  `instrumentID` int(11) NOT NULL AUTO_INCREMENT,
  `instrumentType` varchar(30) NOT NULL,
  `hireCost` decimal(5,2) DEFAULT NULL,
  `hireCostLesson` decimal(5,2) DEFAULT NULL,
  `conditionQuality` varchar(250) NOT NULL,
  `Quantity` int(3) NOT NULL,
  PRIMARY KEY (`instrumentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `instruments`
--

INSERT INTO `instruments` (`instrumentID`, `instrumentType`, `hireCost`, `hireCostLesson`, `conditionQuality`, `Quantity`) VALUES
(1, 'Guitar', '50.00', '5.00', 'New', 0),
(2, 'Violin', '20.00', '2.00', 'Good - slight wear on D string', 50);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `classID` int(11) NOT NULL AUTO_INCREMENT,
  `teacherID` int(11) NOT NULL,
  `className` varchar(255) NOT NULL,
  `classIdname` varchar(6) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `classDay` enum('Monday','Tuesday','Wednesday','Thursday','Friday') NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `roomNumber` char(4) DEFAULT NULL,
  `classCapacity` int(2) NOT NULL,
  PRIMARY KEY (`classID`),
  FOREIGN KEY (`teacherID`) REFERENCES `teachers` (`teacherID`)
  ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`classID`, `teacherID`, `className`, `classIdname`, `startDate`, `endDate`, `classDay`, `startTime`, `endTime`, `roomNumber`, `classCapacity`) VALUES
(1, 1, 'Introduction to Piano', 'PIA101', '2016-10-20', '2017-01-31', 'Tuesday', '13:00:00', '14:00:00', 'F303', 0),
(2, 1, 'Advanced Guitar', 'GUI201', '2016-10-20', '2017-01-31', 'Thursday', '09:00:00', '10:00:00', 'P505', 26),
(3, 2, 'Introduction to Vilolin', 'VIL101', '2016-10-20', '2017-01-31', 'Tuesday', '13:00:00', '14:00:00', 'S303', 25),
(4, 3, 'Advanced Piano', 'PIA201', '2016-10-20', '2017-01-31', 'Friday', '13:00:00', '14:00:00', 'S304', 23),
(5, 2, 'Introduction to Violin', 'VIL101', '2016-10-20', '2017-01-31', 'Wednesday', '11:00:00', '12:00:00', 'S303', 25);


-- --------------------------------------------------------

--
-- Table structure for table `studentclass`
--

CREATE TABLE `studentclass` (
  -- ----------------------------`ID` int(3) NOT NULL,             DELETE THIS - PRIMARY KEY IS A COMBINATION KEY
  `studentID` int(3) NOT NULL,
  `classID` int(3) NOT NULL,
  PRIMARY KEY (`studentID`, `classID`),
  FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`)
  ON DELETE CASCADE,
  FOREIGN KEY (`classID`) REFERENCES `classes` (`classID`)
  ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentclass`
--

INSERT INTO `studentclass` (`studentID`, `classID`) VALUES
(1, 4),
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `instrumenthire`
--

CREATE TABLE `instrumenthire` (
  `hireID` int(11) NOT NULL AUTO_INCREMENT,
  `studentID` int(11) NOT NULL,
  `instrumentID` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  -- ---- `quantity` varchar(20) NOT NULL                  THIS FIELD ISN'T EVEN NECESSARY
  PRIMARY KEY (`hireID`),
  FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`)
  ON DELETE CASCADE,
  FOREIGN KEY (`instrumentID`) REFERENCES `instruments` (`instrumentID`)
  ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `instrumenthire`
--

INSERT INTO `instrumenthire` (`hireID`, `studentID`, `instrumentID`, `startDate`, `endDate`) VALUES
(68, 1, 2, '2016-10-06', '2017-01-06');


-- --------------------------------------------------------

--
-- Table structure for table `studentguardian`
--

CREATE TABLE `studentguardian` (
  `guardianID` int(11) NOT NULL AUTO_INCREMENT,
  `studentID` int(11) NOT NULL,
  `guardianFirstName` varchar(30) NOT NULL,
  `guardianLastName` varchar(30) NOT NULL,
  `guardianEmail` varchar(255) NOT NULL,
  `guardianPhoneNumber` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`guardianID`),
  FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`)
  ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `teachingcontract`
--

CREATE TABLE `teachingcontract` (
  `contractID` int(11) NOT NULL AUTO_INCREMENT,
  `studentID` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `lessonType` varchar(30) DEFAULT NULL,
  `lessonDuration` enum('30','60') NOT NULL,
  `lessonCost` decimal(5,2) NOT NULL,
  `lessonFrequency` tinyint(4) NOT NULL,
  PRIMARY KEY (`contractID`),
  FOREIGN KEY (`studentID`) REFERENCES `Students` (`studentID`)
  ON DELETE CASCADE,
  FOREIGN KEY (`teacherID`) REFERENCES `Teachers` (`teacherID`)
  ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,            -- THIS ID SHOULD BE RENAMED TO "managerID"
  `username` varchar(45) UNIQUE NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `username`, `password`) VALUES
(1, 'administrator', 'pinelands');


-- --------------------------------------------------------

--
-- Table structure for table `studentlogin`
--

CREATE TABLE `studentlogin` (
  `studentID` int(11) NOT NULL,
  `studentUsername` char(8) NOT NULL,
  `Password` varchar(30) NOT NULL,
  PRIMARY KEY (`studentUsername`),
  FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`)
  ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `studentlogin`
--

INSERT INTO `studentlogin` (`studentID`, `studentUsername`, `Password`) VALUES
(1, 'n1234567', 'password1'),
(3, 'n1944332', '57fcf0819b6dd');


-- --------------------------------------------------------

--
-- Table structure for table `teacherlogin`
--

CREATE TABLE `teacherlogin` (
  `teacherID` int(11) NOT NULL,
  `teacherUsername` varchar(8) NOT NULL,
  `Password` varchar(30) NOT NULL,
  PRIMARY KEY (`teacherUsername`),
  FOREIGN KEY (`teacherID`) REFERENCES `teachers` (`teacherID`)
  ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacherlogin`
--

INSERT INTO `teacherlogin` (`teacherID`, `teacherUsername`, `Password`) VALUES
(1, 't1234567', 'password1'),
(2, 't2345678', 'Hello1'),
(3, 't3456789', 'Hello2');



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
