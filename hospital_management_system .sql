-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2017 at 09:54 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_management_system`
--
CREATE DATABASE IF NOT EXISTS `hospital_management_system` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `hospital_management_system`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(100) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `status`) VALUES
(3, 'tahsina', '123', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `patient_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `doctors_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `patient_phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `patient_name`, `doctors_name`, `patient_phone`, `time`) VALUES
(4, 'Afsu', 'Hasina', '673738', '14:02:00'),
(5, 'Anika', 'Hasan', '223232', '17:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `bill_info`
--

CREATE TABLE `bill_info` (
  `bill_id` int(11) NOT NULL,
  `pres_id` int(11) NOT NULL,
  `reg_fee` float NOT NULL,
  `cabin` float NOT NULL,
  `medicine` float NOT NULL,
  `doctor` float NOT NULL,
  `meal` float NOT NULL,
  `other` float NOT NULL,
  `total` float NOT NULL,
  `service_charge` float NOT NULL,
  `vat` float NOT NULL,
  `gross_amount` float NOT NULL,
  `date` datetime NOT NULL,
  `is_trashed` varchar(20) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_info`
--

INSERT INTO `bill_info` (`bill_id`, `pres_id`, `reg_fee`, `cabin`, `medicine`, `doctor`, `meal`, `other`, `total`, `service_charge`, `vat`, `gross_amount`, `date`, `is_trashed`) VALUES
(9, 19, 200, 200, 4000, 5000, 200, 100, 9700, 50, 0, 9750, '0000-00-00 00:00:00', 'No'),
(10, 20, 200, 200, 4343, 2222, 200, 100, 7265, 50, 0, 7315, '0000-00-00 00:00:00', '2017-07-08 10:04:16'),
(11, 21, 200, 200, 2000, 4500, 200, 100, 7200, 50, 0, 7250, '0000-00-00 00:00:00', '2017-07-05 23:20:55'),
(13, 32, 200, 200, 500, 2000, 200, 100, 3200, 50, 120, 3370, '2017-07-04 22:55:51', '2017-07-04 23:09:02'),
(14, 33, 300, 250, 1000, 2000, 200, 50, 3800, 200, 120, 4120, '2017-07-04 22:56:53', 'No'),
(15, 23, 200, 250, 1000, 5000, 250, 100, 6800, 50, 0, 6850, '2017-07-06 23:11:52', 'No'),
(16, 5, 76, 68, 88, 77, 76, 66, 451, 87, 7878, 8416, '2017-07-07 16:09:41', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `doctors_info`
--

CREATE TABLE `doctors_info` (
  `id` int(11) NOT NULL,
  `doctor_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `available_time` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `join_date` date NOT NULL,
  `join_time` time NOT NULL,
  `is_trashed` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctors_info`
--

INSERT INTO `doctors_info` (`id`, `doctor_name`, `email`, `password`, `type`, `status`, `mobile`, `address`, `available_time`, `image`, `join_date`, `join_time`, `is_trashed`) VALUES
(22, 'sanjana', 'sanjana@gmail.com', '123', 'Pediatric', 'cmc', '88345', 'ctg', '3', '14994981812108428-1474108438.png', '2017-07-08', '01:16:00', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `doctors_reply`
--

CREATE TABLE `doctors_reply` (
  `reply_no` int(11) NOT NULL,
  `doctor-id` int(100) NOT NULL,
  `patient_id` int(100) NOT NULL,
  `reply` varchar(255) NOT NULL,
  `read_unread_status` varchar(100) NOT NULL,
  `reply_date` date NOT NULL,
  `reply_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `medicine_name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_trashed` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `medicine_name`, `price`, `category`, `is_trashed`) VALUES
(3, 'xxxsx', 'xsssxx', 'sxsx', '2017-07-07 11:39:59'),
(4, 'Omep(20mg)', '4tk/Capsule', 'Omeprazole(PPI)', 'No'),
(5, 'Xeldrin(20mg)', '6tk/Capsule', 'Omeprazole(PPI)', 'No'),
(6, 'Seclo(20mg)', '5tk/Capsule', 'Omeprazole(PPI)', 'No'),
(7, 'Pantobex(20mg)', '5tk/Capsule', 'Pantonix(PPI)', 'No'),
(8, 'Pantonix(20mg)', '4tk/Capsule', 'Pantoprazole(PPI)', 'No'),
(9, 'Lantid(15mg)', '6tk/Capsule', 'Lansoprazole(PPI)', 'No'),
(10, 'Maxpro(20mg)', '6tk/Capsule', 'Esomeprazole(PPI)', 'No'),
(11, 'Nexum(20mg)', '5tk/Capsule', 'Esomeprazole(PPI)', 'No'),
(12, 'Esonix(20mg)', '6tk/Capsule', 'Esomeprazole(PPI)', 'No'),
(13, 'Finix(20mg)', '7tk/Capsule', 'Rabeprazole(PPI)', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `patient_info`
--

CREATE TABLE `patient_info` (
  `id` int(10) NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_trashed` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patient_info`
--

INSERT INTO `patient_info` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `address`, `is_trashed`) VALUES
(13, 'shamim', 'kafi', 'shamimkafi123@gmail.com', 'bbcf249c93285cb6ebd164984ff3aac7', '01876667377', 'kutubdia', 'no'),
(14, 'nila', 'islam', 'tahsina@gmail.com', '202cb962ac59075b964b07152d234b70', '8845778', 'ctg', 'no'),
(15, 'hosna', 'ara', 'hosna@gmail.com', '202cb962ac59075b964b07152d234b70', '881233', 'ctg', 'no'),
(16, 'humi', 'anjum', 'humi@gmail.com', '202cb962ac59075b964b07152d234b70', '88655', 'ctg', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `patient_msg`
--

CREATE TABLE `patient_msg` (
  `message_no` int(11) NOT NULL,
  `patient_id` int(100) NOT NULL,
  `doctor_id` int(100) NOT NULL,
  `diseaseName` varchar(100) NOT NULL,
  `sms` varchar(255) NOT NULL,
  `read_unread_status` varchar(100) NOT NULL,
  `message_date` date NOT NULL,
  `message_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_msg`
--

INSERT INTO `patient_msg` (`message_no`, `patient_id`, `doctor_id`, `diseaseName`, `sms`, `read_unread_status`, `message_date`, `message_time`) VALUES
(1, 12, 18, 'fgh', 'fhfh', '', '2017-07-08', '5:37 am'),
(2, 14, 18, 'fever', 'vjhbkjm', '', '2017-07-08', '8:48 am'),
(3, 15, 18, 'fdfdf', 'dfdfd', '', '2017-07-08', '9:41 am');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `discount` varchar(10) NOT NULL,
  `net_amount` varchar(10) NOT NULL,
  `paid_amount` varchar(10) NOT NULL,
  `due_amount` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `is_trashed` varchar(20) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `bill_id`, `discount`, `net_amount`, `paid_amount`, `due_amount`, `date`, `is_trashed`) VALUES
(5, 21, '500', '300', '250', '50', '2017-07-04', '2017-07-06 19:29:37'),
(6, 147, '129', '-129', '4500', '-4629', '2017-07-06', '2017-07-07 16:15:14'),
(7, 97, '2507', '-2507', '400', '-2907', '2017-07-06', '2017-07-07 16:33:03'),
(8, 87, '87', '-87', '878', '-965', '2017-07-07', 'No');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_info`
--
ALTER TABLE `bill_info`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `doctors_info`
--
ALTER TABLE `doctors_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors_reply`
--
ALTER TABLE `doctors_reply`
  ADD PRIMARY KEY (`reply_no`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_info`
--
ALTER TABLE `patient_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_msg`
--
ALTER TABLE `patient_msg`
  ADD PRIMARY KEY (`message_no`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `bill_info`
--
ALTER TABLE `bill_info`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `doctors_info`
--
ALTER TABLE `doctors_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `doctors_reply`
--
ALTER TABLE `doctors_reply`
  MODIFY `reply_no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `patient_info`
--
ALTER TABLE `patient_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `patient_msg`
--
ALTER TABLE `patient_msg`
  MODIFY `message_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
