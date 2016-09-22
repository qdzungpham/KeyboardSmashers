CREATE DATABASE IF NOT EXISTS Pinelands_Music_School;
USE Pinelands_Music_School;

CREATE TABLE Teachers (
	teacherID INT AUTO_INCREMENT NOT NULL,
    firstName VARCHAR(30) NOT NULL,
    familyName VARCHAR(30) NOT NULL,
    gender ENUM('Male', 'Female') NOT NULL, 
    DOB DATE NOT NULL, 
    qualifications TEXT,
    emailAddress VARCHAR(255) NOT NULL,
    mobileNumber VARCHAR(11),
    otherNumber VARCHAR(11),
    instrumentType VARCHAR(30) NOT NULL,
    spokenLanguage TEXT NOT NULL,
    skillLevel ENUM('1', '2', '3', '4', '5'),
    comments TEXT,
    PRIMARY KEY (teacherID)
    );
    
CREATE TABLE Students (
	studentID INT AUTO_INCREMENT NOT NULL,
    firstName VARCHAR(30) NOT NULL,
    familyName VARCHAR(30) NOT NULL,
    gender ENUM('Male', 'Female') NOT NULL, 
    DOB DATE NOT NULL, 
    street VARCHAR(50) NOT NULL,
    suburb VARCHAR(30) NOT NULL,
    state ENUM('QLD', 'NSW', 'ACT', 'VIC', 'TAS', 'SA', 'WA', 'NT') NOT NULL,
    postcode CHAR(4) NOT NULL,
    emailAddress VARCHAR(255) NOT NULL,
    mobileNumber VARCHAR(11),
    otherNumber VARCHAR(11),
    preferredDay VARCHAR(9),
    preferredTime CHAR(7),
    preferredTeacher VARCHAR(60),
    preferredLanguage TEXT,
    preferredGender ENUM('Male', 'Female'),
    PRIMARY KEY (studentID)
    );
    
CREATE TABLE StudentGuardian (
	guardianID INT AUTO_INCREMENT NOT NULL,
    studentID INT NOT NULL,
    guardianFirstName VARCHAR(30) NOT NULL,
    guardianLastName VARCHAR(30) NOT NULL,
    guardianEmail VARCHAR(255) NOT NULL,
	guardianPhoneNumber VARCHAR(11),
	FOREIGN KEY (studentID) REFERENCES Students(studentID),
    PRIMARY KEY (guardianID)
    );
    
CREATE TABLE TeachingContract (
	contractID INT AUTO_INCREMENT NOT NULL,
    studentID INT NOT NULL,
    teacherID INT NOT NULL,
    startDate DATE NOT NULL,
    endDate DATE NOT NULL,
    lessonType VARCHAR(30),
    lessonDuration ENUM('30', '60') NOT NULL,
    lessonCost DECIMAL(5, 2) NOT NULL,
    lessonFrequency TINYINT NOT NULL,
    CHECK (lessonFrequency IN(1, 2, 3)),
    FOREIGN KEY (studentID) REFERENCES Students(studentID),
    FOREIGN KEY (teacherID) REFERENCES Teachers(teacherID),
    PRIMARY KEY (contractID)
    );
    
CREATE TABLE Instruments(
	instrumentID INT AUTO_INCREMENT NOT NULL,
    instrumentType VARCHAR(30) NOT NULL,
    hireCost DECIMAL(5, 2), 
    hireCostLesson DECIMAL(5, 2),
    conditionQuality ENUM('New', 'Excellent', 'Good', 'Repair', 'Discard') NOT NULL,
    PRIMARY KEY (instrumentID)
    );
    
CREATE TABLE InstrumentHire(
	hireID INT AUTO_INCREMENT NOT NULL,
    studentID INT NOT NULL,
    instrumentID INT NOT NULL,
    startDate DATE NOT NULL,
    endDate DATE NOT NULL,
	FOREIGN KEY (studentID) REFERENCES Students(studentID),
    FOREIGN KEY (instrumentID) REFERENCES Instruments(instrumentID),
    PRIMARY KEY (hireID)
    );
    
CREATE TABLE Classes(
	classID INT AUTO_INCREMENT NOT NULL,
    teacherID INT NOT NULL,
    classDate DATE NOT NULL,
    startTime TIME NOT NULL,
    endTime TIME NOT NULL,
    roomNumber CHAR(4),
	FOREIGN KEY (teacherID) REFERENCES Teachers(teacherID),
    PRIMARY KEY (classID)
    );
    
CREATE TABLE StudentClass(
	classID INT NOT NULL,
    studentID INT NOT NULL,
    FOREIGN KEY (classID) REFERENCES Classes(classID),
    FOREIGN KEY (studentID) REFERENCES Students(studentID),
    PRIMARY KEY (classID, studentID)
    );
