-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2026 at 08:19 AM
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
-- Database: `caresync`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `doctor_code` varchar(20) DEFAULT NULL,
  `full_name` varchar(100) NOT NULL,
  `department` varchar(50) NOT NULL,
  `specialization` varchar(100) DEFAULT NULL,
  `experience` int(11) DEFAULT 0,
  `contact` varchar(15) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `doctor_code`, `full_name`, `department`, `specialization`, `experience`, `contact`, `email`, `password`, `created_at`) VALUES
(1, 'DOC-2026-001', 'AnweshaDas ', 'Cardiology', 'surgeon', 3, '8340778990', 'anu@gmail.com', '$2y$10$KIDdu4O6upMihZKkkQgowOxzh0UNEiK98vvp1PQ0FOKlLbOMUzi4e', '2026-03-11 06:50:01'),
(2, 'DOC-2026-002', 'Rahul', 'Neurology', 'surgeon', 1, '7896652320', 'rahul@gmail.com', '$2y$10$qcBK5E5YcfcduSDaocRNYOorw7/quicMsn/x3MIjsrY7rMIIDzxWG', '2026-03-11 06:59:27'),
(3, 'DOC-2026-003', 'Prachi ', 'General Medicine', 'medicine', 4, '9654123780', 'prachi@gmail.com', '$2y$10$m.UAmaK8MRJ8QqBXgwgI.e2uqy7qNAvldfS6oUyPeoNUOdoQHpXfK', '2026-03-11 07:04:37');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `patient_code` varchar(20) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `aadhar` varchar(12) DEFAULT NULL,
  `blood_group` varchar(5) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `patient_code`, `full_name`, `email`, `mobile`, `dob`, `gender`, `aadhar`, `blood_group`, `city`, `address`, `password`, `created_at`) VALUES
(1, 'PAT-2026-001', 'Manish Sharma', 'SHARMAMANISH5846579@GMAIL.COM', '0834077899', '2026-03-01', 'male', '123456789235', 'A+', 'Barajamda', 'Near Reliance Tower Football Ground Barajamda', '$2y$10$sjJhxMQr09ggQJRinQKBv.QczxZoFtfnFTSsknR9Hqaz7mUpaA2mK', '2026-03-10 19:14:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Manish Sharma', 'SHARMAMANISH5846579@GMAIL.COM', '$2y$10$sjJhxMQr09ggQJRinQKBv.QczxZoFtfnFTSsknR9Hqaz7mUpaA2mK', 'patient'),
(2, '', '', '$2y$10$96ToqSPqOsHpCbdq2ue8XuSNbJyAW16PflSByJCzBiUfeBNT0YFSW', 'doctor'),
(3, 'AnweshaDas ', 'anu@gmail.com', '$2y$10$KIDdu4O6upMihZKkkQgowOxzh0UNEiK98vvp1PQ0FOKlLbOMUzi4e', 'doctor'),
(5, 'Rahul', 'rahul@gmail.com', '$2y$10$qcBK5E5YcfcduSDaocRNYOorw7/quicMsn/x3MIjsrY7rMIIDzxWG', 'doctor'),
(6, 'Prachi ', 'prachi@gmail.com', '$2y$10$m.UAmaK8MRJ8QqBXgwgI.e2uqy7qNAvldfS6oUyPeoNUOdoQHpXfK', 'doctor'),
(7, 'Admin', 'admincaresync@gmail.com', '$2y$10$PEBRMAQaCN3yNrJ2b66uNuFsnyogU4var7JYFmv/aovw0ZQecKp52', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `doctor_code` (`doctor_code`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patient_code` (`patient_code`),
  ADD UNIQUE KEY `aadhar` (`aadhar`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
