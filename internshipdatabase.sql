-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2019 at 06:33 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internshipdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(300) NOT NULL,
  `contact_person` varchar(300) NOT NULL,
  `website` varchar(300) NOT NULL,
  `description` varchar(300) NOT NULL,
  `tier_rate` int(11) NOT NULL,
  `notes` varchar(300) NOT NULL,
  `TypeOfCompany` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `contact_person`, `website`, `description`, `tier_rate`, `notes`, `TypeOfCompany`) VALUES
(1, 'test', 'test1', 'www.test123.com', 'test12345', 1, 'test123', NULL),
(2, 'test2', 'test2345', 'www.test12.com.au', 'test2', 2, 'test1234', NULL),
(3, 'abc', 'abc', 'abc', 'abc', 1, 'abc', 'information technology'),
(4, 'b', 'b', 'b', 'b', 4, 'b', 'information technology'),
(5, 'c', 'c', 'c', 'c', 2, 'c', 'film and video '),
(6, 'Pineapple', 'Jayme MVC', 'pineapplepen.com', 'best solution at pineapple', 5, 'The best company ever', 'information technology');

-- --------------------------------------------------------

--
-- Table structure for table `companytierrate`
--

CREATE TABLE `companytierrate` (
  `companyTier` int(11) NOT NULL,
  `companyMinimumRate` int(11) NOT NULL,
  `companyMaximumRate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companytierrate`
--

INSERT INTO `companytierrate` (`companyTier`, `companyMinimumRate`, `companyMaximumRate`) VALUES
(1, 2, 3),
(2, 0, 0),
(3, 0, 0),
(4, 0, 0),
(5, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseId` int(11) NOT NULL,
  `courseName` varchar(300) NOT NULL,
  `schoolName` varchar(300) DEFAULT NULL,
  `courseType` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseId`, `courseName`, `schoolName`, `courseType`) VALUES
(1, 'Bachelor of IT(MAD)', 'AIT', 'information technology'),
(2, 'Bachelor of IT(GP)', 'AIT', 'information technology'),
(3, 'Bachelor of IT(GP)', 'AIT', 'information technology'),
(4, 'Dipoloma of IT\r\n', 'AIT', 'information technology'),
(5, 'Bachelor of interactive media (film)', 'AIT', 'film and video '),
(6, 'Diploma fo interactive media ', 'AIT', 'film and video '),
(7, 'Diploma of interactive media ', 'AIT', '2d animation '),
(8, 'Bachelor of interactive media (2d animation)', 'AIT', '2d animation '),
(9, 'Diploma of interactive media', 'AIT', '3d design'),
(10, 'Bachelor of interactive media (3d design)', 'AIT', '3d design'),
(11, 'Diploma of interactive media ', 'AIT', '\r\nGame design'),
(12, 'Bachelor of interactive media (game design)', 'AIT', '\r\nGame design'),
(13, 'Diploma of digital design', 'AIT', 'Digital Design');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `enrollment_id` int(11) NOT NULL,
  `company_name` varchar(300) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `student_id` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `message_type` varchar(300) NOT NULL,
  `color` varchar(7) NOT NULL,
  `to_whom` varchar(300) NOT NULL,
  `content` varchar(300) NOT NULL,
  `date` datetime NOT NULL,
  `remind_date` varchar(20) NOT NULL,
  `status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `message_type`, `color`, `to_whom`, `content`, `date`, `remind_date`, `status`) VALUES
(1, 'test', 'red', 'nobody', 'blablablbalbalblab', '2019-09-21 15:00:00', '2', 'todo'),
(2, 'title', 'yellow', 'Pedro', 'test', '2019-09-25 00:00:00', '2', 'todo'),
(3, '123', 'red', 'pedro', 'test', '2019-09-25 00:00:00', '3', 'todo'),
(4, 'dds', '#0071c5', 'dd', 'cxxccxcx', '2019-09-11 10:00:00', '10', 'ToDo'),
(5, 'dds', '#0071c5', 'dd', 'cxxccxcx', '2019-09-11 10:00:00', '10', 'ToDo'),
(6, 'test', '', 'test', 'test', '2019-09-12 10:00:00', '6', 'ToDo'),
(7, 'teta', '#228B22', 'teta', 'teta', '2019-09-13 10:00:00', '7', 'ToDo'),
(8, 'tewr', '#A020F0', 'rewewre', '44434', '2019-09-06 10:00:00', '4', 'ToDo'),
(9, 'sdsdsd', '#FF4500', 'dds', 'dsddds', '2019-08-27 10:00:00', '5', 'ToDo'),
(10, 'teaerdfas', '#A020F0', 'dsfs', 'vvgdfgd', '2019-09-12 10:00:00', '5', 'ToDo'),
(11, 'dssddsd', '#8B0000', 'ddssdd', 'dsdfdsf', '2019-09-04 10:00:00', '4', 'ToDo'),
(12, 'cxxc', '#0071c5', 'cxc', 'ccx', '2019-09-05 10:00:00', '4', 'ToDo'),
(13, 'zxxc', '#FFD700', 'xzcxzc', 'vzzxzcx', '2019-08-28 10:00:00', '3', 'ToDo'),
(14, 'zxcx', '#FF4500', 'xzcz', 'xcxzxcx', '2019-08-30 10:00:00', '4', 'ToDo'),
(15, '', '', '', '', '2019-08-31 10:00:00', '', 'ToDo'),
(16, 'sdf', '#FF4500', 'dsfsdf', 'fddfdf', '2019-09-07 10:00:00', 'dsff', 'ToDo'),
(17, 'cxxzc', '#FFD700', 'xcxzc', 'xcff', '2019-08-29 10:00:00', '1', 'ToDo'),
(18, '', '', '', '', '2019-10-04 10:00:00', '', 'ToDo'),
(19, 'Test', '#FFD700', 'myself', 'lets go', '2019-10-13 18:00:00', '', 'todo'),
(20, 'new test 02/10', '#0071c5', 'mymyself', 'bla bla', '2019-10-05 10:00:00', '3', 'ToDo'),
(21, 'sdfdfsd', '#FFD700', 'fdssdfsd', 'dfgfdgfg', '2019-10-03 20:00:00', '1', ''),
(22, '', '', '', '', '2019-10-04 10:00:00', '', 'ToDo'),
(23, '', '', '', '', '2019-10-03 10:00:00', '', 'ToDo'),
(25, 'test', '', 'pedroferraz2012@gmail.com', 'this is a message', '2019-10-12 11:00:00', '', 'ToDo');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `s_id` int(11) NOT NULL,
  `first_name` varchar(300) NOT NULL,
  `last_name` varchar(300) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(300) NOT NULL,
  `notes` varchar(300) NOT NULL,
  `student_id` varchar(300) NOT NULL,
  `courses` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`s_id`, `first_name`, `last_name`, `dob`, `email`, `notes`, `student_id`, `courses`) VALUES
(1, 'bob', 'johnson', '2016-02-09', 'bob@gmail.com', 'test123', '0000', NULL),
(2, 'abc', 'abc', '2016-02-09', 'abc@gmail.com', 'test', '6000', NULL),
(3, 'abc', 'abc', '2019-10-02', 'abc', 'abc', '6000', 'Bachelor of IT(GP)'),
(4, 'Joohn', 'John', '2019-10-10', 'email@email.com', 'This is a student', '9999', 'Bachelor of IT(MAD)');

-- --------------------------------------------------------

--
-- Table structure for table `student_assets`
--

CREATE TABLE `student_assets` (
  `asset_id` int(11) NOT NULL,
  `student_id` varchar(300) NOT NULL,
  `tech_skill` int(11) NOT NULL,
  `soft_skill` int(11) NOT NULL,
  `coding_ability` int(11) NOT NULL,
  `social_ability` int(11) NOT NULL,
  `punctuality_reliability` int(11) NOT NULL,
  `team_dynamics` int(11) NOT NULL,
  `job_ready_professionalism` int(11) NOT NULL,
  `hardworking` int(11) NOT NULL,
  `qualifications` varchar(300) NOT NULL,
  `qualification_rating` int(11) NOT NULL,
  `work_experience` varchar(300) NOT NULL,
  `work_ex_rating` int(11) NOT NULL,
  `overall_asset_rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_assets`
--

INSERT INTO `student_assets` (`asset_id`, `student_id`, `tech_skill`, `soft_skill`, `coding_ability`, `social_ability`, `punctuality_reliability`, `team_dynamics`, `job_ready_professionalism`, `hardworking`, `qualifications`, `qualification_rating`, `work_experience`, `work_ex_rating`, `overall_asset_rating`) VALUES
(1, '4', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `techstack`
--

CREATE TABLE `techstack` (
  `skill_id` int(11) NOT NULL,
  `skill_name` varchar(300) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vacancies`
--

CREATE TABLE `vacancies` (
  `vac_id` int(11) NOT NULL,
  `vacancy_name` varchar(300) NOT NULL,
  `salary` varchar(300) NOT NULL,
  `company_id` int(11) NOT NULL,
  `vacancy_status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseId`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`enrollment_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `student_assets`
--
ALTER TABLE `student_assets`
  ADD PRIMARY KEY (`asset_id`);

--
-- Indexes for table `techstack`
--
ALTER TABLE `techstack`
  ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `vacancies`
--
ALTER TABLE `vacancies`
  ADD PRIMARY KEY (`vac_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_assets`
--
ALTER TABLE `student_assets`
  MODIFY `asset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `techstack`
--
ALTER TABLE `techstack`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `vac_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
