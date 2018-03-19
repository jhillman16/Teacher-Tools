-- --------------------------------------------------------
-- Host:                         yhrz9vns005e0734.cbetxkdyhwsb.us-east-1.rds.amazonaws.com
-- Server version:               5.7.19-log - MySQL Community Server (GPL)
-- Server OS:                    Linux
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for adzripqa87ps498t
CREATE DATABASE IF NOT EXISTS `adzripqa87ps498t` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `adzripqa87ps498t`;

-- Dumping structure for table adzripqa87ps498t.AssignmentCategory
CREATE TABLE IF NOT EXISTS `AssignmentCategory` (
  `CategoryID` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table adzripqa87ps498t.Assignments
CREATE TABLE IF NOT EXISTS `Assignments` (
  `CourseID` int(11) DEFAULT NULL,
  `AssignmentID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  `DueDate` datetime(6) DEFAULT NULL,
  `CategoryID` int(10) DEFAULT NULL,
  PRIMARY KEY (`AssignmentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table adzripqa87ps498t.CategoryPercentage
CREATE TABLE IF NOT EXISTS `CategoryPercentage` (
  `CategoryID` int(10) DEFAULT NULL,
  `CourseID` int(10) DEFAULT NULL,
  `Percentage` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table adzripqa87ps498t.Courses
CREATE TABLE IF NOT EXISTS `Courses` (
  `CourseID` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `NumSeats` int(11) NOT NULL,
  `TotalStudents` int(11) NOT NULL,
  `TeacherID` int(10) NOT NULL,
  `EnrollmentNumber` int(10) NOT NULL,
  PRIMARY KEY (`CourseID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table adzripqa87ps498t.Enrollment
CREATE TABLE IF NOT EXISTS `Enrollment` (
  `CourseID` int(10) DEFAULT NULL,
  `StudentID` int(10) DEFAULT NULL,
  `EnrollmentId` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`EnrollmentId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table adzripqa87ps498t.Performance
CREATE TABLE IF NOT EXISTS `Performance` (
  `StudentID` varchar(25) DEFAULT NULL,
  `Score` float DEFAULT NULL,
  `LetterGrade` varchar(2) DEFAULT NULL,
  `CourseID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table adzripqa87ps498t.Question
CREATE TABLE IF NOT EXISTS `Question` (
  `QuizID` int(11) DEFAULT NULL,
  `Question` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `QuestionID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
-- Dumping structure for table adzripqa87ps498t.Quiz
CREATE TABLE IF NOT EXISTS `Quiz` (
  `QuizID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AssignmentID` int(11) DEFAULT NULL,
  PRIMARY KEY (`QuizID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
-- Dumping structure for table adzripqa87ps498t.Response
CREATE TABLE IF NOT EXISTS `Response` (
  `QuizID` int(11) DEFAULT NULL,
  `QuestionID` int(11) DEFAULT NULL,
  `ResponseID` int(11) DEFAULT NULL,
  `IsCorrect` int(1) DEFAULT NULL,
  `Response` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
-- Dumping structure for table adzripqa87ps498t.StudentsUser
CREATE TABLE IF NOT EXISTS `StudentsUser` (
  `UserName` varchar(25) DEFAULT NULL,
  `Password` varchar(25) DEFAULT NULL,
  `FirstName` varchar(25) DEFAULT NULL,
  `LastName` varchar(25) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `JoinedDate` date DEFAULT NULL,
  `StudentID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`StudentID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table adzripqa87ps498t.TeacherUser
CREATE TABLE IF NOT EXISTS `TeacherUser` (
  `UserName` varchar(25) DEFAULT NULL,
  `Password` varchar(25) DEFAULT NULL,
  `FirstName` varchar(25) DEFAULT NULL,
  `LastName` varchar(25) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `JoinedDate` date DEFAULT NULL,
  `TeacherID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`TeacherID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
