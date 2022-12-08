-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 01:08 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `IDNumber` varchar(7) NOT NULL,
  `SubjectID` varchar(7) NOT NULL,
  `DescriptiveTitle` varchar(50) DEFAULT NULL,
  `Units` int(11) NOT NULL,
  `Grade` int(11) NOT NULL,
  `Semester` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`IDNumber`, `SubjectID`, `DescriptiveTitle`, `Units`, `Grade`, `Semester`) VALUES
('1234567', 'WSAT01', 'Web Systems', 3, 90, 'First'),
('1234567', 'NETW01', 'Networking 1', 3, 89, 'First'),
('1234567', 'PRES01', 'Presentation Skills', 3, 92, 'First'),
('1234567', 'DBMS01', 'Database Management', 3, 93, 'Second'),
('1234567', 'NETW02', 'Networking 2', 3, 87, 'Second'),
('1234567', 'IAAS01', 'Information Assurance 1', 3, 97, 'Second'),
('1234567', 'APDEV', 'Application Development', 3, 91, 'Summer'),
('1234567', 'FLS1', 'Foreign Languages', 3, 91, 'Summer');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `IDNumber` varchar(7) NOT NULL,
  `Fullname` varchar(200) NOT NULL,
  `Course` varchar(6) NOT NULL,
  `YearLevel` int(1) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `CivilStatus` varchar(15) NOT NULL,
  `Birthdate` date NOT NULL,
  `BirthPlace` varchar(150) NOT NULL,
  `Nationality` varchar(50) NOT NULL,
  `Religion` varchar(20) NOT NULL,
  `TelNumber` varchar(10) NOT NULL,
  `PhoneNumber` varchar(11) NOT NULL,
  `EmailAddress` varchar(50) NOT NULL,
  `HomeAddress` varchar(100) NOT NULL,
  `PrimaryEduc` varchar(100) NOT NULL,
  `SecondaryEduc` varchar(100) NOT NULL,
  `SeniorHS` varchar(100) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`IDNumber`, `Fullname`, `Course`, `YearLevel`, `Gender`, `CivilStatus`, `Birthdate`, `BirthPlace`, `Nationality`, `Religion`, `TelNumber`, `PhoneNumber`, `EmailAddress`, `HomeAddress`, `PrimaryEduc`, `SecondaryEduc`, `SeniorHS`, `Password`) VALUES
('1234567', 'Thirdy Raza', 'BSIT', 4, 'Male', 'Single', '0000-00-00', 'Alcala, Cagayan', 'Filipino', 'Catholic', 'None', '09550394960', 'razathird@gmail.com', 'Alcala, Cagayan', 'FNSES', 'ANHS', 'USLT', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD KEY `IDNumber` (`IDNumber`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`IDNumber`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grade`
--
ALTER TABLE `grade`
  ADD CONSTRAINT `grade_ibfk_1` FOREIGN KEY (`IDNumber`) REFERENCES `student` (`IDNumber`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
