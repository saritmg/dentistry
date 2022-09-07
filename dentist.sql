-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2018 at 09:55 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dentist1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'sarita', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `app_id` int(100) NOT NULL,
  `dental_code` varchar(100) NOT NULL,
  `dentist_id` varchar(200) NOT NULL,
  `app_date` varchar(200) NOT NULL,
  `app_time` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`app_id`, `dental_code`, `dentist_id`, `app_date`, `app_time`, `status`) VALUES
(1, '101-Teeth clean', '1-James shrestha', '05/24/2018', '11 AM', 'Pending'),
(2, '101-Teeth clean', '1-James shrestha', '05/24/2018', '11 AM', 'Cancelled'),
(3, '100-Root Canal', '2-Anish Ghale', '05/23/2018', '10 AM', 'Pending'),
(4, '102-Braces', '5-Barsha Thapa', '05/26/2018', '9 AM', 'Pending'),
(5, '103-Gum Clean', '8-Maunata Karki', '05/23/2018', '10 AM', 'Not Confirmed'),
(6, '104-Partial Denture', '4-Jasmine Budathoki', '06/01/2018', '5 PM', 'Confirmed'),
(7, '105-Tooth Replacement', '7-Fiona Gurung', '05/29/2018', '2 PM', 'Pending'),
(8, '102-Braces', '6-Manas Rai', '06/04/2018', '6 PM', 'Not Confirmed'),
(9, '102-Braces', '3-Amit Tamang', '05/26/2018', '2 PM', 'Not Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_date`
--

CREATE TABLE `appointment_date` (
  `id` int(11) NOT NULL,
  `app_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment_date`
--

INSERT INTO `appointment_date` (`id`, `app_date`) VALUES
(1, '05/15/2018'),
(2, '05/19/2018'),
(3, '05/21/2018'),
(4, '05/23/2018'),
(5, '05/24/2018'),
(6, '05/26/2018'),
(7, '05/28/2018'),
(8, '05/29/2018'),
(9, '05/31/2018'),
(10, '06/01/2018'),
(11, '06/02/2018'),
(12, '06/04/2018'),
(13, '05/31/2018');

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE `clinic` (
  `clinic_id` int(11) NOT NULL,
  `clinic_name` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `opening_hour` varchar(200) NOT NULL,
  `closing_hour` varchar(200) NOT NULL,
  `no_of_rooms` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`clinic_id`, `clinic_name`, `location`, `opening_hour`, `closing_hour`, `no_of_rooms`) VALUES
(1, 'Dental Clinic', 'Tokha, Kathmandu', '9 A.M', '8 P.M', 30);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'kriti', 'kriti@gmail.com', 'feedaback', 'this is good one'),
(2, 'jason', 'jason@gmail.com', 'hello', 'Hello from other side'),
(3, 'hira maya', 'hira@hotmail.com', 'hello', 'hello this is hari');

-- --------------------------------------------------------

--
-- Table structure for table `dental_codes`
--

CREATE TABLE `dental_codes` (
  `code_id` int(11) NOT NULL,
  `codes` varchar(200) NOT NULL,
  `unit_cost` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dental_codes`
--

INSERT INTO `dental_codes` (`code_id`, `codes`, `unit_cost`, `description`) VALUES
(1, '100', 'Rs.100', 'Root Canal'),
(2, '101', 'Rs. 120', 'Teeth clean'),
(3, '102', 'Rs. 250', 'Braces'),
(4, '103', 'Rs. 270', 'Gum Clean'),
(5, '104', 'Rs. 420', 'Partial Denture'),
(6, '105', 'Rs. 500', 'Tooth Replacement');

-- --------------------------------------------------------

--
-- Table structure for table `dentist`
--

CREATE TABLE `dentist` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `age` int(100) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `dtype` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dentist`
--

INSERT INTO `dentist` (`id`, `name`, `gender`, `age`, `phone`, `address`, `email`, `dtype`) VALUES
(1, 'James shrestha', 'male', 22, '9843567890', 'united kingdom', 'james@gmail.com', 'Permanent'),
(2, 'Anish Ghale', 'Male', 20, '9870657890', 'Kathmandu', 'anish@gmail.com', 'Trainee'),
(3, 'Amit Tamang', 'Male', 32, '9856472875', 'Pokhara', 'amit@gmail.com', 'Permanent'),
(4, 'Jasmine Budathoki', 'Female', 24, '9887953421', 'Dharan', 'jasmine@gmail.com', 'Visiting'),
(5, 'Barsha Thapa', 'Female', 54, '9887953421', 'Kathmandu', 'barsha@yahoo.com', 'Permanent'),
(6, 'Manas Rai', 'Male', 54, '986789085', 'Kathmandu', 'manas@gmail.com', 'Permanent'),
(7, 'Fiona Gurung', 'Female', 24, '9854679876', 'Gongabu', 'fiona@gmail.com', 'Trainee'),
(8, 'Maunata Karki', 'Female', 32, '9878654389', 'Kathmandu', 'maunata@hotmail.com', 'Trainee');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `address`, `gender`, `designation`, `age`) VALUES
(1, 'Jess Tamang', 'Kathmandu', 'Female', 'Professor', '45'),
(2, 'Ram karki', 'Gongabu', 'Male', 'Clinical Professor', '55'),
(3, 'Ravi Author', 'Dharan', 'Male', 'Post-Doctoral Fellow', '30'),
(4, 'Harry Shrestha', 'Pokhara', 'Male', 'Research Associate', '35'),
(5, 'Eliza Raimajhi', 'Butwal', 'Female', 'Assistant Professor', '28'),
(6, 'Umesh Magar', 'Lamjung', 'Male', 'Clinical Professor', '45'),
(7, 'Priya Hamal', 'Kathmandu', 'Female', 'Cleaner', '22'),
(8, 'name', 'address', 'gender', 'designation', 'age');

-- --------------------------------------------------------

--
-- Table structure for table `festive_offer`
--

CREATE TABLE `festive_offer` (
  `festiveId` int(11) NOT NULL,
  `festName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `festive_offer`
--

INSERT INTO `festive_offer` (`festiveId`, `festName`) VALUES
(1, 'festival 101'),
(2, 'festival 102'),
(3, 'festival 103'),
(4, 'festival 104'),
(5, 'festival 105'),
(6, 'festival 106'),
(7, 'festival 107');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `offerId` int(11) NOT NULL,
  `festId` int(11) NOT NULL,
  `festTitle` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `discount` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`offerId`, `festId`, `festTitle`, `name`, `description`, `discount`) VALUES
(1, 2, 'fest', 'openings', 'opening discount', '60'),
(4, 1, 'fest1', 'new year', 'this is new year ', '100'),
(5, 4, 'fest 2', 'summer break', 'this is fest 2', '150'),
(6, 3, 'fest 3', 'Clearance ', 'this is fest 3', '100'),
(7, 6, 'fest 4', 'Holidays', 'this is fest 4', '120');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `phone`, `age`, `address`, `email`, `password`) VALUES
(1, 'Sarita Tamang', '9867546738', '20', 'Kathmandu', 'sarita@gmail.com', 'sarita123'),
(2, 'Jason Rai', '9867456327', '22', 'Boudhanath', 'jason@gmail.com', 'jason.r'),
(3, 'Sudeep Dhungel', '9854632876', '24', 'Dhankuta', 'sudeep@gmail.com', 'sudip1'),
(4, 'Ramesh Aryal', '9854623456', '19', 'Dilibazar', 'ramesh@yahoo.com', 'ramesh.ar'),
(5, 'Riya Raya', '9865745637', '23', 'Kathmandu', 'riya@hotmail.com', 'riya.ra'),
(6, 'Debi Gurung', '9865754632', '11', 'Pokhara', 'debi@yahoo.com', 'debi.grg'),
(7, 'Sanam Mohan', '9854632175', '15', 'Banasthali', 'sanam@gmail.com', 'sanam.m'),
(8, 'Ram Krishna Adhikari', '9867546734', '22', 'Sundhara', 'ram@gmail.com', 'ram.kr'),
(9, 'Buddha Lama', '9876354672', '38', 'Tokha', 'buddha@gmail.com', 'buddha.la'),
(10, 'Amit Poudel', '9854673829', '22', 'Kathmandu', 'amit@gmail.com', 'amit.p');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `appointment_date`
--
ALTER TABLE `appointment_date`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`clinic_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dental_codes`
--
ALTER TABLE `dental_codes`
  ADD PRIMARY KEY (`code_id`);

--
-- Indexes for table `dentist`
--
ALTER TABLE `dentist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `festive_offer`
--
ALTER TABLE `festive_offer`
  ADD PRIMARY KEY (`festiveId`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`offerId`),
  ADD KEY `packageId` (`festId`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `app_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `appointment_date`
--
ALTER TABLE `appointment_date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `clinic`
--
ALTER TABLE `clinic`
  MODIFY `clinic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dental_codes`
--
ALTER TABLE `dental_codes`
  MODIFY `code_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dentist`
--
ALTER TABLE `dentist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `festive_offer`
--
ALTER TABLE `festive_offer`
  MODIFY `festiveId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `offerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_ibfk_1` FOREIGN KEY (`festId`) REFERENCES `festive_offer` (`festiveId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
