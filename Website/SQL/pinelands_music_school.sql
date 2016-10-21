-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: pinelands_music_school
-- ------------------------------------------------------
-- Server version	5.5.45

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `availablejobs`
--

DROP TABLE IF EXISTS `availablejobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `availablejobs` (
  `jobID` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(40) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`jobID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `availablejobs`
--

LOCK TABLES `availablejobs` WRITE;
/*!40000 ALTER TABLE `availablejobs` DISABLE KEYS */;
INSERT INTO `availablejobs` VALUES (1,'Piano teacher','Teaching students how to git gud'),(2,'Assistant Manager','Help out the manager. Need help. Halp');
/*!40000 ALTER TABLE `availablejobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classannouncements`
--

DROP TABLE IF EXISTS `classannouncements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classannouncements` (
  `announcementID` int(11) NOT NULL AUTO_INCREMENT,
  `classID` int(11) NOT NULL,
  `title` varchar(40) DEFAULT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`announcementID`),
  KEY `classID` (`classID`),
  CONSTRAINT `classannouncements_ibfk_1` FOREIGN KEY (`classID`) REFERENCES `classes` (`classID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classannouncements`
--

LOCK TABLES `classannouncements` WRITE;
/*!40000 ALTER TABLE `classannouncements` DISABLE KEYS */;
INSERT INTO `classannouncements` VALUES (1,1,'Class tomorrow','Despite the public holiday tomorrow, we are pushing on with class. Go you troopers'),(2,3,'No class tomorrow','In spite of the public holiday tomorrow, we are having a break. Rest you troopers');
/*!40000 ALTER TABLE `classannouncements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  KEY `teacherID` (`teacherID`),
  CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`teacherID`) REFERENCES `teachers` (`teacherID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classes`
--

LOCK TABLES `classes` WRITE;
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
INSERT INTO `classes` VALUES (1,1,'Introduction to Piano','PIA101','2016-10-20','2017-01-31','Tuesday','13:00:00','14:00:00','F303',0),(2,1,'Advanced Guitar','GUI201','2016-10-20','2017-01-31','Thursday','09:00:00','10:00:00','P505',25),(3,2,'Introduction to Vilolin','VIL101','2016-10-20','2017-01-31','Tuesday','13:00:00','14:00:00','S303',25),(4,3,'Advanced Piano','PIA201','2016-10-20','2017-01-31','Friday','13:00:00','14:00:00','S304',23),(5,2,'Introduction to Violin','VIL101','2016-10-20','2017-01-31','Wednesday','11:00:00','12:00:00','S303',25);
/*!40000 ALTER TABLE `classes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instrumenthire`
--

DROP TABLE IF EXISTS `instrumenthire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instrumenthire` (
  `hireID` int(11) NOT NULL AUTO_INCREMENT,
  `studentID` int(11) NOT NULL,
  `instrumentID` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  PRIMARY KEY (`hireID`),
  KEY `studentID` (`studentID`),
  KEY `instrumentID` (`instrumentID`),
  CONSTRAINT `instrumenthire_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`) ON DELETE CASCADE,
  CONSTRAINT `instrumenthire_ibfk_2` FOREIGN KEY (`instrumentID`) REFERENCES `instruments` (`instrumentID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instrumenthire`
--

LOCK TABLES `instrumenthire` WRITE;
/*!40000 ALTER TABLE `instrumenthire` DISABLE KEYS */;
INSERT INTO `instrumenthire` VALUES (68,1,2,'2016-10-06','2017-01-06');
/*!40000 ALTER TABLE `instrumenthire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instruments`
--

DROP TABLE IF EXISTS `instruments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instruments` (
  `instrumentID` int(11) NOT NULL AUTO_INCREMENT,
  `instrumentType` varchar(30) NOT NULL,
  `hireCost` decimal(5,2) DEFAULT NULL,
  `hireCostLesson` decimal(5,2) DEFAULT NULL,
  `instrumentSize` varchar(50) DEFAULT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `conditionQuality` varchar(250) NOT NULL,
  `Quantity` int(3) NOT NULL,
  PRIMARY KEY (`instrumentID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instruments`
--

LOCK TABLES `instruments` WRITE;
/*!40000 ALTER TABLE `instruments` DISABLE KEYS */;
INSERT INTO `instruments` VALUES (1,'Guitar',50.00,5.00,'Standard','Tanglewood','New',0),(2,'Violin',20.00,2.00,'3 quarters','Stentor','Good - slight wear on D string',50);
/*!40000 ALTER TABLE `instruments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobseekers`
--

DROP TABLE IF EXISTS `jobseekers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobseekers` (
  `seekerID` int(11) NOT NULL AUTO_INCREMENT,
  `jobID` int(11) NOT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `emailAddress` varchar(45) DEFAULT NULL,
  `phoneNumber` varchar(15) DEFAULT NULL,
  `street` varchar(45) DEFAULT NULL,
  `suburb` varchar(45) DEFAULT NULL,
  `state` enum('QLD','NSW','ACT','VIC','TAS','SA','WA','NT') DEFAULT NULL,
  `postcode` char(4) NOT NULL,
  `cvPath` text,
  `accepted` enum('Yes','No','Pending') DEFAULT NULL,
  PRIMARY KEY (`seekerID`),
  KEY `jobID` (`jobID`),
  CONSTRAINT `jobseekers_ibfk_1` FOREIGN KEY (`jobID`) REFERENCES `availablejobs` (`jobID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobseekers`
--

LOCK TABLES `jobseekers` WRITE;
/*!40000 ALTER TABLE `jobseekers` DISABLE KEYS */;
INSERT INTO `jobseekers` VALUES (1,1,'Stevo','Bongo','stevo@gmail.com','0433333333','1/11 Bro Street','Vale','QLD','4011','../images/file1.doc','Pending'),(2,1,'Roggo','Nart','roggo@gmail.com','0477777777','2/11 Bro Street','Vale','QLD','4011','../images/file2.doc','Pending'),(3,2,'Uli','Williamson','uli@gmail.com','0422222222','44 Sis Street','Treet','QLD','4011','../images/file3.pdf','No');
/*!40000 ALTER TABLE `jobseekers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manager`
--

DROP TABLE IF EXISTS `manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(45) NOT NULL,
  `Password` varchar(68) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manager`
--

LOCK TABLES `manager` WRITE;
/*!40000 ALTER TABLE `manager` DISABLE KEYS */;
INSERT INTO `manager` VALUES (1,'m1234567','a329844518755c6987500cc3791e88e2d3b2722fc4a9944facc3d7fafbfbe533');
/*!40000 ALTER TABLE `manager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publicannouncements`
--

DROP TABLE IF EXISTS `publicannouncements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publicannouncements` (
  `announcementID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) DEFAULT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`announcementID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicannouncements`
--

LOCK TABLES `publicannouncements` WRITE;
/*!40000 ALTER TABLE `publicannouncements` DISABLE KEYS */;
INSERT INTO `publicannouncements` VALUES (1,'Dead servers','asdlfjasdklfjaslkdjfalksdjf servers are down alsdkf. Go you troopers'),(2,'New parking','We made new motorbike parks for lols. Cars dont need parks.');
/*!40000 ALTER TABLE `publicannouncements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studentclass`
--

DROP TABLE IF EXISTS `studentclass`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studentclass` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `studentID` int(3) NOT NULL,
  `classID` int(3) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `studentID` (`studentID`),
  KEY `classID` (`classID`),
  CONSTRAINT `studentclass_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`) ON DELETE CASCADE,
  CONSTRAINT `studentclass_ibfk_2` FOREIGN KEY (`classID`) REFERENCES `classes` (`classID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studentclass`
--

LOCK TABLES `studentclass` WRITE;
/*!40000 ALTER TABLE `studentclass` DISABLE KEYS */;
INSERT INTO `studentclass` VALUES (1,1,4),(2,1,3),(3,7,2);
/*!40000 ALTER TABLE `studentclass` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studentlogin`
--

DROP TABLE IF EXISTS `studentlogin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studentlogin` (
  `studentID` int(11) NOT NULL,
  `studentUsername` char(8) NOT NULL,
  `Password` char(64) NOT NULL,
  PRIMARY KEY (`studentUsername`),
  KEY `studentID` (`studentID`),
  CONSTRAINT `studentlogin_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studentlogin`
--

LOCK TABLES `studentlogin` WRITE;
/*!40000 ALTER TABLE `studentlogin` DISABLE KEYS */;
INSERT INTO `studentlogin` VALUES (4,'n0111241','f484d6dc2a68603c77bd165e8598e30a3cf9c5d022c6e2d96172ed5fb6814a3a'),(5,'n0114154','ad7a3f21f068766d8a1d1f91d11d7189ff5ac84a6974d6471098c4bc11e65f20'),(7,'n0571081','baef7106ebb42465df59bb63b0fc58097d853724e0bf1cba14aa6faea83e8ee0'),(1,'n1234567','0b14d501a594442a01c6859541bcb3e8164d183d32937b851835442f69d5c94e');
/*!40000 ALTER TABLE `studentlogin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `guardianFirstName` varchar(30) NOT NULL,
  `guardianLastName` varchar(30) NOT NULL,
  `guardianEmail` varchar(255) NOT NULL,
  `guardianPhoneNumber` varchar(11) DEFAULT NULL,
  `enroled` char(1) NOT NULL,
  PRIMARY KEY (`studentID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'Tom','Santos','Male','1995-07-12','39 main St','Sunnybank','QLD','4012','tomsantos@gmail.com','0426256076',NULL,NULL,NULL,NULL,NULL,'Bobbette','Fett','bobbette@gmail.com','0422396716','Y'),(4,'Rick','Pham','Male','1994-03-12','32','Forest','VIC','1234','haha@pinelands.com','','title','','','','','','','','','Y'),(5,'saldkfjsadf','alskdfjsadf','Male','1996-02-18','alskdfj','alskdjf','NSW','3333','asldkf@gmail.com','','title','','','','','','','','','Y'),(7,'Rick','Pham','Male','1995-12-31','39 melbane','Forest Lake','QLD','1234','suhangj@jj.com','','title','','','','','','','','','Y');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacherlogin`
--

DROP TABLE IF EXISTS `teacherlogin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacherlogin` (
  `teacherID` int(11) NOT NULL,
  `teacherUsername` varchar(8) NOT NULL,
  `Password` char(64) NOT NULL,
  PRIMARY KEY (`teacherUsername`),
  KEY `teacherID` (`teacherID`),
  CONSTRAINT `teacherlogin_ibfk_1` FOREIGN KEY (`teacherID`) REFERENCES `teachers` (`teacherID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacherlogin`
--

LOCK TABLES `teacherlogin` WRITE;
/*!40000 ALTER TABLE `teacherlogin` DISABLE KEYS */;
INSERT INTO `teacherlogin` VALUES (1,'t1234567','0b14d501a594442a01c6859541bcb3e8164d183d32937b851835442f69d5c94e'),(2,'t2345678','948edbe7ede5aa7423476ae29dcd7d61e7711a071aea0d83698377effa896525'),(3,'t3456789','be98c2510e417405647facb89399582fc499c3de4452b3014857f92e6baad9a9');
/*!40000 ALTER TABLE `teacherlogin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teachers` (
  `teacherID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(30) NOT NULL,
  `familyName` varchar(30) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `DOB` date NOT NULL,
  `street` varchar(50) DEFAULT NULL,
  `suburb` varchar(30) DEFAULT NULL,
  `state` enum('QLD','NSW','ACT','VIC','TAS','SA','WA','NT') DEFAULT NULL,
  `postcode` char(4) DEFAULT NULL,
  `qualifications` text,
  `emailAddress` varchar(255) NOT NULL,
  `mobileNumber` varchar(11) DEFAULT NULL,
  `otherNumber` varchar(11) DEFAULT NULL,
  `instrumentType` varchar(30) NOT NULL,
  `spokenLanguage` text NOT NULL,
  `skillLevel` enum('1','2','3','4','5') DEFAULT NULL,
  `comments` text,
  PRIMARY KEY (`teacherID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachers`
--

LOCK TABLES `teachers` WRITE;
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT INTO `teachers` VALUES (1,'bob','bobby','Male','1983-02-15','43 Turkey Street','Hawthorne','QLD','4444','Graduated','bob.bobby@gmail.com',NULL,'07123456','Piano,Guitar','English, Spanish',NULL,'Great teacher'),(2,'Hang','Su','Male','1983-01-10','42 Turkey Street','Hawthorne','QLD','4444','Graduated','suhang@gmail.com',NULL,'07234567','Guitar,Violin','English,Chinese',NULL,'Great teacher'),(3,'Luna','Brown','Female','1990-10-22','41 Turkey Street','Hawthorne','QLD','4444','Graduated','Luna123@gmail.com',NULL,'07134565','Piano','English',NULL,'Great teacher');
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachingcontract`
--

DROP TABLE IF EXISTS `teachingcontract`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  KEY `studentID` (`studentID`),
  KEY `teacherID` (`teacherID`),
  CONSTRAINT `teachingcontract_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`) ON DELETE CASCADE,
  CONSTRAINT `teachingcontract_ibfk_2` FOREIGN KEY (`teacherID`) REFERENCES `teachers` (`teacherID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachingcontract`
--

LOCK TABLES `teachingcontract` WRITE;
/*!40000 ALTER TABLE `teachingcontract` DISABLE KEYS */;
/*!40000 ALTER TABLE `teachingcontract` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-21 13:53:47
