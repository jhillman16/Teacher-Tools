-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 06, 2017 at 09:23 AM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mmilton1DB`
--
CREATE DATABASE IF NOT EXISTS `mmilton1DB` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mmilton1DB`;

-- --------------------------------------------------------

--
-- Table structure for table `AssignmentCategory`
--

CREATE TABLE `AssignmentCategory` (
  `CategoryID` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Assignments`
--

CREATE TABLE `Assignments` (
  `Course` varchar(25) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `DueDate` datetime(6) NOT NULL,
  `CategoryID` int(10) NOT NULL,
  `AssignmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `CategoryPercentage`
--

CREATE TABLE `CategoryPercentage` (
  `CategoryID` int(10) NOT NULL,
  `CourseID` int(10) NOT NULL,
  `Percentage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Courses`
--

CREATE TABLE `Courses` (
  `CourseID` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `TeacherID` int(10) NOT NULL,
  `EnrollmentNumber` int(10) DEFAULT NULL,
  `Description` text NOT NULL,
  `NumSeats` int(11) NOT NULL,
  `TotalStudents` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Courses`
--

INSERT INTO `Courses` (`CourseID`, `Name`, `TeacherID`, `EnrollmentNumber`, `Description`, `NumSeats`, `TotalStudents`) VALUES
(1, 'Test', 15, NULL, 'tewwqewqew', 10, 0),
(2, 'Software Engineering', 15, NULL, 'What a class!', 29, 0),
(3, 'Software Engineering', 15, NULL, 'What a class!', 29, 0),
(4, 'Please', 11, NULL, 'Work', 10, 0),
(5, 'blah', 11, NULL, '', 10, 0),
(6, 'Try', 11, NULL, '', 10, 0),
(7, 'Yoga', 2, NULL, '', 20, 0),
(8, 'Hey', 2, NULL, 'Blah', 20, 0),
(9, 'Yoga', 2, NULL, 'Best class ever', 30, 0),
(10, 'COSC320', 2, NULL, 'Ehh\r\n', 30, 0),
(11, 'History101', 11, NULL, 'History of the World', 12, 0),
(12, 'Hello', 2, 0, 'All content and graphics on this web site are the property of the company Refsnes Data.', 30, 0),
(13, 'COSC320', 2, NULL, 'hey', 20, 0),
(14, 'FUN101', 16, NULL, 'having fun is great!', 100, 0),
(15, 'Eli', 2, NULL, 'TEST FOR ELI\r\n', 10, 0),
(16, 'qwewq', 2, NULL, 'wqeqw', 10, 0),
(17, 'Eli', 3, NULL, 'A boring class.', 100, 0),
(18, 'Eli', 3, NULL, 'A boring class.', 100, 0),
(19, 'eli', 3, NULL, 'meqweqwewq', 123, 0),
(20, 'eqweewq', 3, NULL, 'eqweqewqweqweqw', 100, 0),
(21, 'Hello World ', 19, NULL, 'I am looking for this entry.', 1008, 0),
(22, 'Art 101', 23, NULL, 'We\'re gonna do some artsy stuff.', 30, 0),
(23, 'Art 102', 23, NULL, 'We\'re gonna do more artsier stuff.', 30, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Enrollment`
--

CREATE TABLE `Enrollment` (
  `EnrollmentId` int(11) NOT NULL,
  `CourseID` int(10) NOT NULL,
  `StudentID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Enrollment`
--

INSERT INTO `Enrollment` (`EnrollmentId`, `CourseID`, `StudentID`) VALUES
(1, 7, 11),
(2, 9, 11),
(3, 13, 11),
(4, 7, 11),
(5, 7, 4),
(6, 10, 33),
(7, 13, 33),
(8, 7, 34),
(9, 4, 11),
(10, 7, 35);

-- --------------------------------------------------------

--
-- Table structure for table `Performance`
--

CREATE TABLE `Performance` (
  `StudentID` varchar(25) NOT NULL,
  `Score` float NOT NULL,
  `LetterGrade` varchar(2) NOT NULL,
  `CourseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Performance`
--

INSERT INTO `Performance` (`StudentID`, `Score`, `LetterGrade`, `CourseID`) VALUES
('mmilton1', 100, 'A', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Question`
--

CREATE TABLE `Question` (
  `QuizID` int(11) NOT NULL,
  `Question` varchar(500) NOT NULL,
  `QuestionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Question`
--

INSERT INTO `Question` (`QuizID`, `Question`, `QuestionID`) VALUES
(17, 'This is also not a question', 0),
(22, 'please', 1),
(22, 'work', 1),
(22, 'for', 1),
(22, 'everything', 1),
(23, 'WORK1', 1),
(23, 'WORK2', 1),
(25, 'Q1', 1),
(25, 'Q2', 1),
(25, 'Q3', 1),
(27, 'qq1', 1),
(27, 'qq2', 1),
(27, 'qq3', 1),
(28, '123', 1),
(28, '456', 1),
(33, 'Qq1', 1),
(33, 'Qq2', 1),
(34, 'quiz1', 1),
(34, 'quiz2', 1),
(35, 'dumb1', 1),
(35, 'dumb2', 1),
(52, 'Hahahahahaah', 1),
(52, '21', 2),
(52, '223', 3),
(53, '123', 4),
(54, 'First Question', 1),
(55, 'jjjjjjjjj', 1),
(55, '123123', 2),
(56, 'dfsfsdf1', 3),
(58, 'fun', 1),
(59, 'QuizTest13', 1),
(59, 'QuizTest13 2 ', 2),
(59, 'QuizTest 13 3', 3),
(60, 'Qwop', 4),
(60, 'qwop2', 5),
(64, 'Testest1', 1),
(65, 'Queck', 2),
(65, 'Queck2', 3),
(67, 'quack', 1),
(67, 'quackquack', 2),
(75, 'fun', 1),
(77, 'Scrimmy ', 0),
(79, 'asdfg', 1),
(79, 'a', 2),
(80, 'asddddd', 3),
(80, 'wok', 4),
(86, 'Crock', 5),
(90, 'aasd', 0),
(92, 'qop', 0),
(92, 'qw', 1),
(94, 'This is the first question', 0),
(95, 'This is the first question', 0),
(96, 'Question 1', 0),
(96, 'Question 2', 1),
(96, 'Question 3', 2),
(96, 'Question 4', 3),
(96, 'Question 5', 4),
(96, 'question 6', 5),
(99, 'What is 2+2', 0),
(99, 'What is 5+1', 1),
(100, 'How much are presentation worth', 0),
(100, 'what is the course number for Software Engineering I', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Quiz`
--

CREATE TABLE `Quiz` (
  `QuizID` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `AssignmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Quiz`
--

INSERT INTO `Quiz` (`QuizID`, `Name`, `Description`, `AssignmentID`) VALUES
(2, 'Help', 'this isnt working', 1),
(3, 'lol', 'lol', 1),
(4, 'lol1', 'lol1', 1),
(5, 'new', 'new', 1),
(6, 'new1', 'new1', 1),
(7, 'This will', 'work', 1),
(8, 'test1', 'test1', 1),
(9, 'test2', 'test2', 1),
(10, 'test3', 'test3', 1),
(11, 'lol123', 'lol123', 1),
(12, 'Test', 'To test3', 1),
(13, 'lol125', 'lol125', 1),
(14, 'a', 'a', 1),
(15, 'a', 'a', 1),
(16, 'a', 'a', 1),
(17, 'quiz589', 'This is the billionth quiz', 1),
(18, 'quiz999', 'This is the billionth and first quiz', 1),
(19, 'quiz9999', 'This is the billionth and second quiz', 1),
(20, 'quiz99999', 'This is the billionth and third quiz', 1),
(21, 'quiz999999', 'This is the billionth and fourth quiz', 1),
(22, 'quiz9999999', 'This is the billionth and fifth quiz', 1),
(23, 'quiz99999999', 'This is the billionth and sixth quiz', 1),
(24, 'a', 'a', 1),
(25, 'quiz999999999', 'This is the billionth and seventh quiz', 1),
(26, 'a', 'a', 1),
(27, 'quiz9999999999', 'This is the billionth and eighth quiz', 1),
(28, 'quiz99999999999', 'This is the billionth and ninth quiz', 1),
(29, 'a', 's', 1),
(30, 'a', 's', 1),
(31, 'a', 's', 1),
(32, 'a', '', 1),
(33, 'quiz0', 'This is the trillionth quiz', 1),
(34, 'quiz00', 'This is the trillionth and first quiz', 1),
(35, 'quiz000', 'This is the trillionth and second quiz', 1),
(36, 'quiz0000', 'This is the trillionth and third quiz', 1),
(37, 'quiz00000', 'This is the trillionth and fourth quiz', 1),
(38, 'quiz000000', 'This is the trillionth and fifth quiz', 1),
(39, 'quiz000000', 'This is the trillionth and sixth quiz', 1),
(40, 'quiz0000000', 'This is the trillionth and sixth quiz', 1),
(41, 'quiz00000000', 'This is the trillionth and seventh quiz', 1),
(42, 'quiz000000000', 'This is the trillionth and seventh quiz', 1),
(43, 'quiz0000000000', 'This is the trillionth and eigth quiz', 1),
(44, 'plshelp', 'lol', 1),
(45, 'plshelp1', 'lol2', 1),
(46, 'plshelp2', 'lol3', 1),
(47, '1', 'A', 1),
(48, 'plshelp3', '4', 1),
(49, 'plshelp4', '43', 1),
(50, 'plshelp5', '43', 1),
(51, 'plshelp7', '43', 1),
(52, 'This one works', '1', 1),
(53, 'This one 1', '1', 1),
(54, 'Problem', '12', 1),
(55, '2345', 'quic', 1),
(56, 'no workie', '1234', 1),
(57, '7777', '777', 1),
(58, 'lel', 'lol', 1),
(59, 'QuizTest13', 'Quiz', 1),
(60, 'QuizTest13 2', 'q', 1),
(61, '1', 'a', 1),
(62, '1', 'a', 1),
(63, '1', 'a', 1),
(64, 'Testtest', 'test', 1),
(65, 'Quiz TEST', '123', 1),
(66, '', '', 1),
(67, 'overtime', 'im working overtime', 1),
(68, 'QUACK', 'QUACK', 1),
(69, 'QUACK2', 'QUACK2', 1),
(70, 'b', 'b', 1),
(71, 'c', 'c', 1),
(72, 'd', 'd', 1),
(73, 'e', 'e', 1),
(74, 'f', 'f', 1),
(75, 'fun', 'fun', 1),
(76, 'a', 'a', 1),
(77, '4', 'scum', 1),
(78, 'a', 'a', 1),
(79, 'Quiz', 'bork', 1),
(80, 'Quiz', 'bork', 1),
(81, 'fsdf', 'sdfsdf', 1),
(82, 'crank', 'plum', 1),
(83, 'doesnt matter', 'wot', 1),
(84, 'doesnt matter 1', 'wot 2', 1),
(85, 'doesnt matter 2', 'wot 3', 1),
(86, 'final test', 'workwork', 1),
(87, 'The last quiz', 'works', 1),
(88, 'The last quiz', 'works', 1),
(89, 'The last quiz', 'works', 1),
(90, 'q', 'w', 1),
(91, '', '', 1),
(92, 'qwop', 'qwop', 1),
(93, 't', 't', 1),
(94, 'Quiz 55', 'Quiz for testing', 1),
(95, 'Quiz 56', 'Quiz for testing', 1),
(96, 'Quiz 57', 'Quiz for testing', 1),
(97, 'myquiz', 'a quiz', 1),
(98, 'Jacks Quiz', 'Lets see if this actually works', 1),
(99, 'Jacks Quiz', 'Lets see if this actually works', 1),
(100, 'Quiz demo', 'demo quiz functionality', 1),
(101, 'blah', 'blah', 1),
(102, 'Im done', 'Im done lol', 1),
(103, 'Im done', 'Im done lol', 1),
(104, 'Test', 't', 1),
(105, 'Test', 't', 1),
(106, 'Test', 't', 1),
(107, 'a', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Response`
--

CREATE TABLE `Response` (
  `QuizID` int(11) NOT NULL,
  `QuestionID` int(11) NOT NULL,
  `ResponseID` int(11) NOT NULL,
  `IsCorrect` int(1) NOT NULL,
  `Response` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Response`
--

INSERT INTO `Response` (`QuizID`, `QuestionID`, `ResponseID`, `IsCorrect`, `Response`) VALUES
(67, 1, 0, 0, 'quack1'),
(67, 1, 1, 0, 'quack2'),
(67, 1, 2, 0, 'quack3'),
(67, 1, 3, 0, 'quack4'),
(67, 2, 0, 0, 'quackquack1'),
(67, 2, 1, 0, 'quackquack2'),
(67, 2, 2, 0, 'quackqauack3'),
(67, 2, 3, 0, 'quackquack4'),
(75, 1, 0, 0, 'fun'),
(75, 1, 1, 0, 'fun'),
(75, 1, 2, 0, 'fun'),
(75, 1, 3, 0, 'fun'),
(77, 0, 0, 0, 'bingus'),
(77, 0, 1, 0, 'and'),
(77, 0, 2, 0, 'the'),
(77, 0, 3, 0, 'crungy spingus'),
(79, 1, 0, 0, 'correct'),
(79, 1, 1, 0, 'not'),
(79, 1, 2, 0, 'not'),
(79, 1, 3, 0, 'not'),
(79, 2, 0, 0, 'a'),
(79, 2, 1, 0, ''),
(79, 2, 2, 0, ''),
(79, 2, 3, 0, ''),
(80, 3, 0, 0, 'correct'),
(80, 3, 1, 0, 'nah'),
(80, 3, 2, 0, 'l'),
(80, 3, 3, 0, 'l'),
(80, 4, 0, 0, 'a'),
(80, 4, 1, 0, 's'),
(80, 4, 2, 0, 'd'),
(80, 4, 3, 0, 'f'),
(86, 5, 0, 0, 'plock'),
(86, 5, 1, 0, 'snap'),
(86, 5, 2, 0, 'poot'),
(86, 5, 3, 1, 'foot'),
(90, 0, 0, 0, ''),
(90, 0, 1, 0, ''),
(90, 0, 2, 0, ''),
(90, 0, 3, 0, ''),
(92, 0, 0, 0, 'qwop'),
(92, 0, 1, 0, 'qwop'),
(92, 0, 2, 1, 'qwop'),
(92, 0, 3, 0, 'qwop'),
(92, 1, 0, 0, 'qw'),
(92, 1, 1, 0, 'qw'),
(92, 1, 2, 1, 'qw'),
(92, 1, 3, 0, 'qw'),
(94, 0, 0, 0, 'First Response'),
(94, 0, 1, 0, 'First Response'),
(94, 0, 2, 1, 'First Response'),
(94, 0, 3, 0, 'First Response'),
(95, 0, 0, 0, 'Response 1'),
(95, 0, 1, 0, 'Response 2'),
(95, 0, 2, 1, 'Response 3'),
(95, 0, 3, 0, 'Response 4'),
(96, 0, 0, 0, 'Response 1'),
(96, 0, 1, 0, 'Response 2'),
(96, 0, 2, 1, 'Response 3'),
(96, 0, 3, 0, 'Response 4'),
(96, 1, 0, 1, 'Response 1'),
(96, 1, 1, 0, 'Response 2'),
(96, 1, 2, 0, 'Response 3'),
(96, 1, 3, 0, 'Response 4'),
(96, 2, 0, 1, 'Response 1'),
(96, 2, 1, 0, 'Response 2'),
(96, 2, 2, 0, 'Response 3'),
(96, 2, 3, 0, 'Response 4'),
(96, 3, 0, 0, 'Response 1'),
(96, 3, 1, 1, 'Response 2'),
(96, 3, 2, 0, 'Response 3'),
(96, 3, 3, 0, 'Response 4'),
(96, 4, 0, 0, 'Response 1'),
(96, 4, 1, 0, 'Response 2'),
(96, 4, 2, 1, 'Response 3'),
(96, 4, 3, 0, 'Response 4'),
(96, 5, 0, 0, 'Response 1'),
(96, 5, 1, 1, 'Response 2'),
(96, 5, 2, 0, 'Response 3'),
(96, 5, 3, 0, 'Response 4'),
(99, 0, 0, 1, '4'),
(99, 0, 1, 0, '5'),
(99, 0, 2, 0, '1'),
(99, 0, 3, 0, '9'),
(99, 1, 0, 1, '6'),
(99, 1, 1, 0, '8'),
(99, 1, 2, 0, '9'),
(99, 1, 3, 0, '10'),
(100, 0, 0, 0, '10'),
(100, 0, 1, 0, '20'),
(100, 0, 2, 1, '15'),
(100, 0, 3, 0, '25'),
(100, 1, 0, 0, 'COSC330'),
(100, 1, 1, 0, 'COSC425'),
(100, 1, 2, 0, ''),
(100, 1, 3, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `StudentsUser`
--

CREATE TABLE `StudentsUser` (
  `UserName` varchar(25) DEFAULT NULL,
  `Password` varchar(25) DEFAULT NULL,
  `FirstName` varchar(25) DEFAULT NULL,
  `LastName` varchar(25) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `JoinedDate` date DEFAULT NULL,
  `StudentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `StudentsUser`
--

INSERT INTO `StudentsUser` (`UserName`, `Password`, `FirstName`, `LastName`, `Email`, `JoinedDate`, `StudentID`) VALUES
('malcmalc3', 'malcmalc3', 'Malcolm', 'Milton', 'malcolm.milton23@yahoo.com', '2017-10-05', 1),
('njknk', 'kjnk', 'jkn', 'kjnkj', 'kjnk', '2017-10-05', 2),
('mmilton1', 'njekf', 'Malcolm', 'Milton', 'njjkdwnkj', '2017-10-05', 3),
('Test', 'test', 'Test', 'Test', 'test@test', '2017-10-05', 4),
('Test2', 'patest', 'Test2', 'Test2', 'test@test', '2017-10-05', 5),
('date', 'asd', 'date', 'date', 'date@date', '2017-10-16', 6),
('1234', '123', '1234', '1234', '1234', '2017-10-16', 7),
('kjnjk', 'jnkn', 'nJLN', 'jnknnjk', 'njknjkn', '2017-10-05', 8),
('kjnjk', 'jn', 'nJLN', 'jnknnjk', 'njknjkn', '2017-10-05', 9),
('evolkis1', '12345', 'Eli', 'Volkis', 'evolkis13@gmail.com', '2017-10-17', 10),
('mmilton1', 'asd', 'Malcolm', 'Milton', 'hey@yahoo.com', '2017-10-20', 11),
('jkn', 'jnnnjk', 'njn', 'njkn', 'njk', '2017-10-20', 12),
('lmlk', 'malc', 'klm', 'mkl', 'malcmalc', '2017-10-24', 13),
('', '', '', '', '', '2017-10-25', 14),
('mmilton4', 'Malcmalc3', 'Malcolm', 'Milton', 'ya@yahoo.com', '2017-10-25', 15),
('mmilton2', 'Malcmalc3', 'Malcolm', 'Milton', 'ya2@yahoo.com', '2017-10-25', 16),
('mmilton3', 'RondoMagic9', 'Malcolm', 'Milton', 'ya5@yahoo.com', '2017-10-31', 17),
('mmilton6', 'RondoMagic9', 'Malcolm', 'Milton', 'ya6@yahoo.com', '2017-10-31', 18),
('mmilton7', 'RondoMagic9', 'Malcolm', 'Milton', 'ya7@yahoo.com', '2017-10-31', 19),
('mmilton8', 'RondoMagic9', 'Malcolm', 'Milton', 'ya8@yahoo.com', '2017-10-31', 20),
('mmilton9', 'RondoMagic9', 'Malcolm', 'Milton', 'ya9@yahoo.com', '2017-11-01', 21),
('mc101', 'Mcnoony101', 'McLooly', 'McNooly', 'mclooly@gmail.com', '2017-11-01', 22),
('mmilton10', 'Heyheyhey1', 'Malcolm', 'Milton', 'ya10@yahoo.com', '2017-11-02', 23),
('mmilton11', 'Heyheyhey1', 'Malcolm', 'Milton', 'ya11@yahoo.com', '2017-11-02', 24),
('mmilton12', 'RondoMagic9', 'Malcolm', 'Milton', 'ya12@yahoo.com', '2017-11-02', 25),
('mmilton14', 'Heyheyhey1', 'Malcolm', 'Milton', 'ya14@yahoo.com', '2017-11-02', 26),
('mmilton15', 'Asdfghj1', 'Malcolm', 'Milton', 'ya15@yahoo.com', '2017-11-02', 27),
('mmilton16', 'Malcolm1', 'Malcolm', 'Milton', 'ya16@yahoo.com', '2017-11-02', 28),
('mmilton18', 'Malcolm1', 'Malcolm', 'Milton', 'ya18@yahoo.com', '2017-11-02', 29),
('mmilton19', 'Malcolm1', 'Malcolm', 'Milton', 'ya19@yahoo.com', '2017-11-02', 30),
('eporq', 'Malcolm1', 'emman', 'porq', 'ya20@yahoo.com', '2017-11-09', 31),
('mmiller1', 'Password1', 'Mark', 'Miller', 'hey50@yahoo.com', '2017-11-29', 32),
('Aturing1', '!Aasd123', 'Alan', 'Turing', 'Aturing@gmail.com', '2017-12-01', 33),
('ErikaFurudo', 'Password123', 'Louie', 'Bellucci', 'MrSadOnion@gmail.com', '2017-12-04', 34),
('loser1', 'Password1', 'Louie', 'Belluci', 'blah@gmail.com', '2017-12-06', 35);

-- --------------------------------------------------------

--
-- Table structure for table `TeacherUser`
--

CREATE TABLE `TeacherUser` (
  `UserName` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `FirstName` varchar(25) NOT NULL,
  `LastName` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `JoinedDate` date NOT NULL,
  `TeacherID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TeacherUser`
--

INSERT INTO `TeacherUser` (`UserName`, `Password`, `FirstName`, `LastName`, `Email`, `JoinedDate`, `TeacherID`) VALUES
('njknk', 'lmkl', 'jkn', 'kjnkj', 'kjnk', '2017-10-05', 1),
('mmilton1', 'jkn', 'Malcolm', 'Milton', 'njjkdwnkj', '2017-10-05', 2),
('tah', 'tah101', 'Tatiana', 'Holmer', 'hi@h', '2017-10-05', 3),
('tah', 'tah101', 'Tatiana', 'Holmer', 'hi@h', '2017-10-05', 4),
('tah', 'tah101', 'Tatiana', 'Holmer', 'hi@h', '2017-10-05', 5),
('tah', 'tah101', 'Tatiana', 'Holmer', 'hi@h', '2017-10-05', 6),
('tah', 'tah101', 'Tatiana', 'Holmer', 'hi@h', '2017-10-05', 7),
('tah', 'tah101', 'Tatiana', 'Holmer', 'hi@h', '2017-10-05', 8),
('hjbbjhb', 'jhbhj', 'bjhb', 'bhbjh', 'jbbjb', '2017-10-20', 9),
('test', 'test', 'test', 'test', 'test', '2017-10-05', 10),
('tah', 'tah1', 'Tatiana', 'Holmer', 'hi@h', '2017-10-05', 11),
('jteach', 'Password1', 'Joe', 'Teacher', 'j@gmail.com', '2017-11-01', 13),
('mjones', 'Password1', 'mike', 'jones', 'k@gmail.com', '2017-11-01', 14),
('jjones2', 'Password1', 'jim', 'jones', 'l@gmail.com', '2017-11-01', 15),
('evolkis2', '1111AAaa', 'Eli', 'Volkis', 'myemail@gmail.com', '2017-11-13', 16),
('evolkis3', '1234aaAA', 'Eli', 'Volkis', 'myemail@gmail.com', '2017-11-14', 17),
('Json', 'asAS1234', 'Jay', 'Son', 'myemail@gmail.com', '2017-11-14', 18),
('jbob1', 'jimbobsPassword1', 'Jim', 'Bob', 'jimbob@gmail.com', '2017-11-29', 19),
('mmiwdhcjk', 'Password1', 'Mark', 'Miller', 'hey20@yahoo.com', '2017-11-29', 20),
('njknknkj', 'Password2', 'bkjhbmj', 'jnknk', 'hkj@gmail.com', '2017-11-29', 21),
('tholmer1', 'Mnbvcxz1', 'Tatiana', 'Holmer', 'tatianaholmer@mail.ru', '2017-11-29', 22),
('JimBob1', 'Password1', 'Jim', 'Bob', 'JimBobTheSavior@yahoo.com', '2017-12-04', 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Courses`
--
ALTER TABLE `Courses`
  ADD PRIMARY KEY (`CourseID`);

--
-- Indexes for table `Enrollment`
--
ALTER TABLE `Enrollment`
  ADD PRIMARY KEY (`EnrollmentId`);

--
-- Indexes for table `Quiz`
--
ALTER TABLE `Quiz`
  ADD PRIMARY KEY (`QuizID`);

--
-- Indexes for table `StudentsUser`
--
ALTER TABLE `StudentsUser`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `TeacherUser`
--
ALTER TABLE `TeacherUser`
  ADD PRIMARY KEY (`TeacherID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Courses`
--
ALTER TABLE `Courses`
  MODIFY `CourseID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `Enrollment`
--
ALTER TABLE `Enrollment`
  MODIFY `EnrollmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `Quiz`
--
ALTER TABLE `Quiz`
  MODIFY `QuizID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `StudentsUser`
--
ALTER TABLE `StudentsUser`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `TeacherUser`
--
ALTER TABLE `TeacherUser`
  MODIFY `TeacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
