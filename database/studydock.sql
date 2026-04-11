-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2026 at 07:03 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE `committee` (
  `CommitteeID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Specialization` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  MODIFY `AssessmentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `committee`
--
ALTER TABLE `committee`
  MODIFY `CommitteeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `ContentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `CourseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `EnrollmentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `InstructorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
  MODIFY `SubmissionID` int(11) NOT NULL AUTO_INCREMENT;

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
