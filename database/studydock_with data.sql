-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2026 at 09:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studydock`
--

DROP DATABASE IF EXISTS studydock;
CREATE DATABASE IF NOT EXISTS studydock;
USE studydock;

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE `assessment` (
  `AssessmentID` int(11) NOT NULL,
  `AssessmentName` varchar(100) DEFAULT NULL,
  `TotalMarks` decimal(5,2) DEFAULT NULL,
  `SubmissionDate` date DEFAULT NULL,
  `CourseID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`AssessmentID`, `AssessmentName`, `TotalMarks`, `SubmissionDate`, `CourseID`) VALUES
(1, 'SQL Quiz 1', 20.00, '2026-02-15', 1),
(2, 'Quantum Midterm', 100.00, '2026-03-01', 2),
(3, 'Art Essay', 50.00, '2026-02-20', 3),
(4, 'Econ Problem Set', 25.00, '2026-02-25', 4),
(5, 'Tree Lab', 40.00, '2026-03-05', 5),
(6, 'Calculus Test', 100.00, '2026-03-10', 6),
(7, 'AI Project', 100.00, '2026-04-01', 9),
(8, 'Star Map Quiz', 25.00, '2026-03-20', 10),
(9, 'DNA Lab', 50.00, '2026-03-25', 11),
(10, 'Topology Proof', 40.00, '2026-04-05', 12),
(11, 'Lit Analysis', 60.00, '2026-03-15', 13),
(12, 'Policy Memo', 30.00, '2026-04-10', 14);

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE `committee` (
  `CommitteeID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Specialization` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `committee`
--

INSERT INTO `committee` (`CommitteeID`, `UserID`, `Specialization`) VALUES
(1, 25, 'Academic Integrity'),
(2, 26, 'Curriculum Design'),
(3, 27, 'Student Affairs'),
(4, 28, 'Research Ethics');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `ContentID` int(11) NOT NULL,
  `ContentName` varchar(255) NOT NULL,
  `ContentType` varchar(50) DEFAULT NULL,
  `AccessLink` text NOT NULL,
  `CourseID` int(11) DEFAULT NULL,
  `DateUploaded` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`ContentID`, `ContentName`, `ContentType`, `AccessLink`, `CourseID`, `DateUploaded`) VALUES
(1, 'SELECT', 'Video', 'http://drive.com/s1', 1, '2026-04-13'),
(2, 'Schrodinger PDF', 'Document', 'http://drive.com/q1', 2, '2026-01-12'),
(3, 'Syllabus', 'Document', 'http://drive.com/syll', 3, '2026-01-05'),
(4, 'Week 1 Slides', 'Slides', 'http://drive.com/ec1', 4, '2026-01-15'),
(5, 'Binary Trees', 'Video', 'http://drive.com/ds1', 5, '2026-01-20'),
(6, 'Derivatives Guide', 'Document', 'http://drive.com/ma1', 6, '2026-01-22'),
(7, 'WWII Overview', 'Video', 'http://drive.com/hi1', 7, '2026-01-25'),
(8, 'Bonding Intro', 'Slides', 'http://drive.com/ch1', 8, '2026-01-28'),
(9, 'AI Ethics PDF', 'Document', 'http://cdn.link/ai1', 9, '2026-02-01'),
(10, 'Black Holes Video', 'Video', 'http://cdn.link/astro1', 10, '2026-02-05'),
(11, 'CRISPR Overview', 'Slides', 'http://cdn.link/bio1', 11, '2026-02-10'),
(12, 'Manifolds Lecture', 'Video', 'http://cdn.link/math1', 12, '2026-02-12'),
(13, 'The Odyssey Guide', 'Document', 'http://cdn.link/lit1', 13, '2026-02-15'),
(14, 'UN Charter Analysis', 'Video', 'http://cdn.link/gov1', 14, '2026-02-18'),
(15, 'Perceptrons 101', 'Slides', 'http://cdn.link/ai2', 15, '2026-02-20'),
(16, 'Supernova Data', 'Document', 'http://cdn.link/astro2', 16, '2026-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CourseID` int(11) NOT NULL,
  `CourseName` varchar(100) DEFAULT NULL,
  `Credit` int(11) DEFAULT NULL,
  `InstructorID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseID`, `CourseName`, `Credit`, `InstructorID`) VALUES
(1, 'Intro to SQL', 3, 1),
(2, 'Quantum Mechanics', 4, 3),
(3, 'Renaissance Art', 2, 5),
(4, 'Macroeconomics', 3, 6),
(5, 'Data Structures', 4, 1),
(6, 'Advanced Calculus', 4, 4),
(7, 'Modern History', 3, 2),
(8, 'Organic Chemistry', 4, 3),
(9, 'Intro to AI', 4, 7),
(10, 'Astrophysics 101', 3, 8),
(11, 'Genetic Engineering', 4, 11),
(12, 'Topology Basics', 3, 9),
(13, 'World Literature', 2, 10),
(14, 'Global Governance', 3, 12),
(15, 'Neural Networks', 4, 7),
(16, 'Stellar Evolution', 3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `EnrollmentID` int(11) NOT NULL,
  `EnrollmentDate` date DEFAULT NULL,
  `StudentID` int(11) DEFAULT NULL,
  `CourseID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`EnrollmentID`, `EnrollmentDate`, `StudentID`, `CourseID`) VALUES
(1, '2026-01-01', 1, 1),
(2, '2026-01-01', 1, 5),
(3, '2026-01-02', 2, 6),
(4, '2026-01-02', 3, 2),
(5, '2026-01-02', 4, 2),
(6, '2026-01-03', 5, 8),
(7, '2026-01-03', 6, 7),
(8, '2026-01-04', 7, 3),
(9, '2026-01-04', 8, 4),
(10, '2026-01-05', 9, 1),
(11, '2026-01-05', 9, 5),
(12, '2026-01-05', 10, 3),
(13, '2026-01-10', 19, 9),
(14, '2026-01-10', 20, 9),
(15, '2026-01-11', 21, 10),
(16, '2026-01-11', 22, 10),
(17, '2026-01-12', 23, 11),
(18, '2026-01-12', 24, 11),
(19, '2026-01-13', 25, 12),
(20, '2026-01-13', 26, 12),
(21, '2026-01-14', 27, 13),
(22, '2026-01-14', 28, 13),
(23, '2026-01-15', 29, 14),
(24, '2026-01-15', 30, 14),
(25, '2026-01-16', 31, 15),
(26, '2026-01-16', 32, 15),
(27, '2026-01-17', 33, 16),
(28, '2026-01-17', 19, 16),
(29, '2026-01-18', 20, 1),
(30, '2026-01-18', 21, 5),
(31, '2026-01-19', 22, 2),
(32, '2026-01-19', 23, 6);

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `InstructorID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Department` varchar(50) DEFAULT NULL,
  `University` varchar(100) DEFAULT NULL,
  `Degree` varchar(50) DEFAULT NULL,
  `Subject` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`InstructorID`, `UserID`, `Department`, `University`, `Degree`, `Subject`) VALUES
(1, 19, 'Science', 'MIT', 'PhD', 'Computer Science'),
(2, 20, 'Humanities', 'Harvard', 'Masters', 'History'),
(3, 21, 'Engineering', 'Stanford', 'PhD', 'Physics'),
(4, 22, 'Math', 'Cambridge', 'PhD', 'Applied Math'),
(5, 23, 'Arts', 'Yale', 'Masters', 'Digital Art'),
(6, 24, 'Business', 'INSEAD', 'PhD', 'Economics'),
(7, 59, 'Computer Science', 'UC Berkeley', 'PhD', 'Artificial Intelligence'),
(8, 60, 'Physics', 'Caltech', 'PhD', 'Astrophysics'),
(9, 61, 'Mathematics', 'Princeton', 'PhD', 'Topology'),
(10, 62, 'Literature', 'Oxford', 'Masters', 'Poetry'),
(11, 63, 'Biology', 'Johns Hopkins', 'PhD', 'Genetics'),
(12, 64, 'Social Sciences', 'LSE', 'PhD', 'Global Politics');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `UserID` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Role` enum('Student','Instructor','Committee','Admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`UserID`, `FirstName`, `LastName`, `Phone`, `Role`) VALUES
(1, 'Liam', 'Smith', '555-0101', 'Student'),
(2, 'Olivia', 'Johnson', '555-0102', 'Student'),
(3, 'Noah', 'Williams', '555-0103', 'Student'),
(4, 'Emma', 'Brown', '555-0104', 'Student'),
(5, 'Oliver', 'Jones', '555-0105', 'Student'),
(6, 'Ava', 'Garcia', '555-0106', 'Student'),
(7, 'Elijah', 'Miller', '555-0107', 'Student'),
(8, 'Sophia', 'Davis', '555-0108', 'Student'),
(9, 'James', 'Rodriguez', '555-0109', 'Student'),
(10, 'Isabella', 'Martinez', '555-0110', 'Student'),
(11, 'William', 'Hernandez', '555-0111', 'Student'),
(12, 'Mia', 'Lopez', '555-0112', 'Student'),
(13, 'Benjamin', 'Gonzalez', '555-0113', 'Student'),
(14, 'Charlotte', 'Wilson', '555-0114', 'Student'),
(15, 'Lucas', 'Anderson', '555-0115', 'Student'),
(16, 'Amelia', 'Thomas', '555-0116', 'Student'),
(17, 'Henry', 'Taylor', '555-0117', 'Student'),
(18, 'Evelyn', 'Moore', '555-0118', 'Student'),
(19, 'Alexander', 'Jackson', '555-0119', 'Instructor'),
(20, 'Harper', 'Martin', '555-0120', 'Instructor'),
(21, 'Sebastian', 'Lee', '555-0121', 'Instructor'),
(22, 'Audrey', 'Perez', '555-0122', 'Instructor'),
(23, 'Jack', 'Thompson', '555-0123', 'Instructor'),
(24, 'Luna', 'White', '555-0124', 'Instructor'),
(25, 'Daniel', 'Harris', '555-0125', 'Committee'),
(26, 'Chloe', 'Sanchez', '555-0126', 'Committee'),
(27, 'Matthew', 'Clark', '555-0127', 'Committee'),
(28, 'Layla', 'Ramirez', '555-0128', 'Committee'),
(29, 'Jackson', 'Lewis', '555-0129', 'Admin'),
(30, 'Zoe', 'Robinson', '555-0130', 'Admin'),
(31, 'Ethan', 'White', '555-0201', 'Student'),
(32, 'Sophia', 'Harris', '555-0202', 'Student'),
(33, 'Mason', 'Clark', '555-0203', 'Student'),
(34, 'Isabella', 'Lewis', '555-0204', 'Student'),
(35, 'Jacob', 'Young', '555-0205', 'Student'),
(36, 'Emma', 'Walker', '555-0206', 'Student'),
(37, 'William', 'Hall', '555-0207', 'Student'),
(38, 'Mia', 'Allen', '555-0208', 'Student'),
(39, 'Michael', 'King', '555-0209', 'Student'),
(40, 'Abigail', 'Wright', '555-0210', 'Student'),
(41, 'Alexander', 'Scott', '555-0211', 'Student'),
(42, 'Emily', 'Torres', '555-0212', 'Student'),
(43, 'Daniel', 'Nguyen', '555-0213', 'Student'),
(44, 'Madison', 'Hill', '555-0214', 'Student'),
(45, 'James', 'Adams', '555-0215', 'Student'),
(46, 'Elizabeth', 'Nelson', '555-0216', 'Student'),
(47, 'Benjamin', 'Baker', '555-0217', 'Student'),
(48, 'Avery', 'Rivera', '555-0218', 'Student'),
(49, 'Logan', 'Campbell', '555-0219', 'Student'),
(50, 'Sofia', 'Mitchell', '555-0220', 'Student'),
(51, 'David', 'Carter', '555-0221', 'Student'),
(52, 'Ella', 'Roberts', '555-0222', 'Student'),
(53, 'Joseph', 'Gomez', '555-0223', 'Student'),
(54, 'Scarlett', 'Phillips', '555-0224', 'Student'),
(55, 'Jackson', 'Evans', '555-0225', 'Student'),
(56, 'Victoria', 'Turner', '555-0226', 'Student'),
(57, 'Samuel', 'Diaz', '555-0227', 'Student'),
(58, 'Aria', 'Parker', '555-0228', 'Student'),
(59, 'Sebastian', 'Cruz', '555-0229', 'Instructor'),
(60, 'Grace', 'Edwards', '555-0230', 'Instructor'),
(61, 'Owen', 'Collins', '555-0231', 'Instructor'),
(62, 'Chloe', 'Reyes', '555-0232', 'Instructor'),
(63, 'Theodore', 'Stewart', '555-0233', 'Instructor'),
(64, 'Aurora', 'Morris', '555-0234', 'Instructor'),
(65, 'Julian', 'Morales', '555-0235', 'Committee'),
(66, 'Luna', 'Murphy', '555-0236', 'Committee'),
(67, 'Christopher', 'Cook', '555-0237', 'Committee'),
(68, 'Pila', 'Rogers', '555-0238', 'Committee'),
(69, 'Wyatt', 'Morgan', '555-0239', 'Admin'),
(70, 'Hazel', 'Peterson', '555-0240', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudentID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Major` varchar(50) DEFAULT NULL,
  `Street` varchar(100) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `UserID`, `DateOfBirth`, `Major`, `Street`, `City`, `Country`) VALUES
(1, 1, '2002-05-12', 'Computer Science', '123 Pine St', 'Seattle', 'USA'),
(2, 2, '2001-08-24', 'Mathematics', '456 Oak Ave', 'Toronto', 'Canada'),
(3, 3, '2003-01-15', 'Biology', '789 Maple Rd', 'London', 'UK'),
(4, 4, '2002-11-30', 'Physics', '101 Cedar Ln', 'Sydney', 'Australia'),
(5, 5, '2001-04-05', 'Chemistry', '202 Birch Blvd', 'Berlin', 'Germany'),
(6, 6, '2002-07-22', 'History', '303 Elm St', 'Paris', 'France'),
(7, 7, '2003-09-10', 'Literature', '404 Walnut Dr', 'Dublin', 'Ireland'),
(8, 8, '2001-12-14', 'Economics', '505 Cherry Ct', 'Tokyo', 'Japan'),
(9, 9, '2002-02-28', 'Computer Science', '606 Ash Way', 'Seoul', 'South Korea'),
(10, 10, '2003-06-05', 'Fine Arts', '707 Spruce Pl', 'New York', 'USA'),
(11, 11, '2001-10-19', 'Mathematics', '808 Willow Ter', 'Chicago', 'USA'),
(12, 12, '2002-03-11', 'Sociology', '909 Poplar Cir', 'Vancouver', 'Canada'),
(13, 13, '2003-08-27', 'Computer Science', '111 Aspen Ct', 'Austin', 'USA'),
(14, 14, '2001-05-15', 'Engineering', '222 Beech St', 'Melbourne', 'Australia'),
(15, 15, '2002-12-01', 'Philosophy', '333 Sycamore Rd', 'Oxford', 'UK'),
(16, 16, '2003-04-20', 'Psychology', '444 Hickory Ln', 'Oslo', 'Norway'),
(17, 17, '2002-10-05', 'Business', '555 Juniper Dr', 'Madrid', 'Spain'),
(18, 18, '2001-09-25', 'Political Science', '666 Laurel Way', 'Rome', 'Italy'),
(19, 31, '2004-01-10', 'Computer Science', '12 North St', 'Boston', 'USA'),
(20, 32, '2003-05-15', 'Physics', '88 Maple Dr', 'Montreal', 'Canada'),
(21, 33, '2002-09-20', 'Engineering', '432 Oak Ln', 'London', 'UK'),
(22, 34, '2004-03-25', 'Mathematics', '76 Birch Rd', 'Sydney', 'Australia'),
(23, 35, '2003-07-30', 'Biology', '901 Pine St', 'Berlin', 'Germany'),
(24, 36, '2002-12-05', 'Chemistry', '222 Cedar Ave', 'Paris', 'France'),
(25, 37, '2004-02-14', 'Computer Science', '54 Ash Blvd', 'Singapore', 'Singapore'),
(26, 38, '2003-06-18', 'Psychology', '101 Elm Ter', 'Toronto', 'Canada'),
(27, 39, '2002-10-22', 'Philosophy', '87 Walnut Wy', 'Dublin', 'Ireland'),
(28, 40, '2004-04-28', 'History', '333 Spruce Ct', 'Vienna', 'Austria'),
(29, 41, '2003-08-01', 'Fine Arts', '12 Willow Ln', 'Amsterdam', 'Netherlands'),
(30, 42, '2002-11-12', 'Economics', '56 Poplar St', 'Zurich', 'Switzerland'),
(31, 43, '2004-05-19', 'Engineering', '77 Aspen Dr', 'San Francisco', 'USA'),
(32, 44, '2003-09-24', 'Political Science', '99 Beech Rd', 'Melbourne', 'Australia'),
(33, 45, '2002-01-29', 'Sociology', '11 Sycamore St', 'Stockholm', 'Sweden'),
(34, 46, '2004-06-03', 'Business', '44 Hickory Ave', 'Oslo', 'Norway'),
(35, 47, '2003-10-08', 'Computer Science', '66 Juniper Dr', 'Madrid', 'Spain'),
(36, 48, '2002-02-13', 'Physics', '82 Laurel Way', 'Rome', 'Italy');

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `SubmissionID` int(11) NOT NULL,
  `ReceivedGrade` decimal(5,2) DEFAULT NULL,
  `StudentID` int(11) DEFAULT NULL,
  `AssessmentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`SubmissionID`, `ReceivedGrade`, `StudentID`, `AssessmentID`) VALUES
(1, 18.50, 1, 1),
(2, 15.00, 9, 1),
(3, 85.00, 3, 2),
(4, 92.00, 4, 2),
(5, 45.00, 7, 3),
(6, 22.00, 8, 4),
(7, 38.00, 1, 5),
(8, 35.50, 9, 5),
(9, 78.00, 2, 6),
(10, 42.00, 10, 3),
(11, 95.00, 19, 7),
(12, 88.50, 20, 7),
(13, 22.00, 21, 8),
(14, 24.50, 22, 8),
(15, 48.00, 23, 9),
(16, 41.00, 24, 9),
(17, 35.00, 25, 10),
(18, 39.50, 26, 10),
(19, 55.00, 27, 11),
(20, 58.00, 28, 11),
(21, 28.00, 29, 12),
(22, 25.50, 30, 12),
(23, 82.00, 31, 7),
(24, 76.00, 32, 7),
(25, 15.00, 33, 8),
(26, 21.00, 19, 8),
(27, 88.00, 20, 1),
(28, 74.00, 21, 5),
(29, 91.00, 22, 2),
(30, 84.00, 23, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
  ADD PRIMARY KEY (`AssessmentID`),
  ADD KEY `assessment_ibfk_1` (`CourseID`);

--
-- Indexes for table `committee`
--
ALTER TABLE `committee`
  ADD PRIMARY KEY (`CommitteeID`),
  ADD UNIQUE KEY `UserID` (`UserID`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`ContentID`),
  ADD KEY `content_ibfk_1` (`CourseID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseID`),
  ADD KEY `course_ibfk_1` (`InstructorID`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`EnrollmentID`),
  ADD KEY `enrollment_ibfk_1` (`StudentID`),
  ADD KEY `enrollment_ibfk_2` (`CourseID`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`InstructorID`),
  ADD UNIQUE KEY `UserID` (`UserID`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentID`),
  ADD UNIQUE KEY `UserID` (`UserID`);

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`SubmissionID`),
  ADD KEY `submission_ibfk_1` (`StudentID`),
  ADD KEY `submission_ibfk_2` (`AssessmentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessment`
--
ALTER TABLE `assessment`
  MODIFY `AssessmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `committee`
--
ALTER TABLE `committee`
  MODIFY `CommitteeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `ContentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `CourseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `EnrollmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `InstructorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
  MODIFY `SubmissionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessment`
--
ALTER TABLE `assessment`
  ADD CONSTRAINT `assessment_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`) ON DELETE CASCADE;

--
-- Constraints for table `committee`
--
ALTER TABLE `committee`
  ADD CONSTRAINT `committee_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `profile` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`) ON DELETE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`InstructorID`) REFERENCES `instructor` (`InstructorID`) ON DELETE SET NULL;

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`) ON DELETE CASCADE,
  ADD CONSTRAINT `enrollment_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`) ON DELETE CASCADE;

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `profile` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `profile` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `submission`
--
ALTER TABLE `submission`
  ADD CONSTRAINT `submission_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`) ON DELETE CASCADE,
  ADD CONSTRAINT `submission_ibfk_2` FOREIGN KEY (`AssessmentID`) REFERENCES `assessment` (`AssessmentID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
