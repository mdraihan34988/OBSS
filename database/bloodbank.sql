-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2020 at 06:52 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_donors`
--

CREATE TABLE `blood_donors` (
  `Id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `blood_group` varchar(50) NOT NULL,
  `last_donate_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_donors`
--

INSERT INTO `blood_donors` (`Id`, `username`, `name`, `blood_group`, `last_donate_date`) VALUES
(1, 'mdraihan', 'raihan', 'O+', '2020-05-10'),
(16, 'mdsajjad', 'Sajjadur rahman', 'AB+', '2020-02-10'),
(17, 'mdsajjad', 'Sajjadur rahman', 'AB+', '2020-05-10'),
(18, 'raihan', 'Islam, Md. Raihanul', 'O+', '2020-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `blood_requests`
--

CREATE TABLE `blood_requests` (
  `Id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `blood_group` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `member_status` varchar(100) NOT NULL,
  `order_stutus` varchar(100) NOT NULL,
  `service_charge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_requests`
--

INSERT INTO `blood_requests` (`Id`, `username`, `blood_group`, `quantity`, `member_status`, `order_stutus`, `service_charge`) VALUES
(2, 'mdsajjad', 'O+', 20, 'registered', 'denied', 0),
(3, 'mdraihan', 'O+', 2, 'registered', 'accepted', 100),
(4, '-------', 'O+', 1, 'unregistered', 'accepted', 100),
(5, '-------', 'O+', 10, 'unregistered', 'denied', 0);

-- --------------------------------------------------------

--
-- Table structure for table `blood_stocks`
--

CREATE TABLE `blood_stocks` (
  `Id` int(100) NOT NULL,
  `BloodGroup` varchar(100) NOT NULL,
  `Quantity` int(100) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_stocks`
--

INSERT INTO `blood_stocks` (`Id`, `BloodGroup`, `Quantity`) VALUES
(1, 'O+', 3),
(2, 'A+', 20),
(3, 'B+', 40),
(6, 'AB+', 50),
(7, 'O-', 5),
(9, 'A-', 12),
(11, 'B-', 8),
(13, 'AB-', 18);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `profession` varchar(50) NOT NULL,
  `bloodgroup` varchar(20) NOT NULL,
  `gmail` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mobile` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `username`, `password`, `dob`, `gender`, `profession`, `bloodgroup`, `gmail`, `city`, `address`, `mobile`) VALUES
(7, 'Md. Raihanul Islam', 'mdraihan', '$2y$10$q7HmT2A7K017u9vGqL5zZuB3mKm3npfY5mK9JUMLm8Kp2fzAMa9IS', '1996-04-06', 'Male', 'Student', 'O+', 'swammia908@gmail.com', 'Mohakhali', 'Mohakhali,Amtoli', '01780034452'),
(8, 'Sajjadur rahman', 'mdsajjad', '$2y$10$xVuLHmCXIyJB7PQB.pUHcOiTWQ18qNVLFk49ijui7yVMbpa7TyreK', '1995-10-10', 'Male', 'Student', 'AB+', 's@gmail.com', 'Nikunjo', 'Nikunjo2', '01788034452'),
(9, 'Islam, Md. Raihanul', 'raihan', '$2y$10$o10TnP5RbAuchcYT2xk8luQXuAfY375PKRXDOAB4JF5RRjcT4QKni', '1997-04-15', 'Male', 'Student', 'O+', 'r@gmail.com', 'Banani', 'Kamal atartuk ,Banani', '01821532456'),
(10, 'Nabil Al Nasif', 'kabbo', '$2y$10$fDTjjRXCLlGPFImNlyDxJOrM5r1DnNOh/w4/7I9isTNOacJptEEVm', '1998-04-07', 'Male', 'Bekar', 'AB+', 'k@gmail.com', 'Mirpur', 'Mirpur 11', '01788888888'),
(11, 'Rahman, Md. Sajjadur', 'sajjad', '$2y$10$87.gAbS3M7DXq366d605v.M.Ht4AaLdTlFKux3o.p3oMPyAguoCHq', '1995-04-11', 'Male', 'Programmer', 'A+', 'saj@gmail.com', 'Basundhara', 'Block c', '01780034452');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_donors`
--
ALTER TABLE `blood_donors`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `blood_requests`
--
ALTER TABLE `blood_requests`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `blood_stocks`
--
ALTER TABLE `blood_stocks`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_donors`
--
ALTER TABLE `blood_donors`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `blood_requests`
--
ALTER TABLE `blood_requests`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blood_stocks`
--
ALTER TABLE `blood_stocks`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
