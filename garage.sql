-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2024 at 02:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `garage`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/`garage` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `garage`;

/*Table structure for table `garage` */

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `createdBy` smallint(20) DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `updatedBy` smallint(20) DEFAULT NULL,
  `deletedAt` datetime DEFAULT NULL,
  `deletedBy` smallint(20) DEFAULT NULL,
  `is_deleted` smallint(1) DEFAULT 0,
  `role_id` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `lname`, `fname`, `mname`, `address`, `contact`, `email`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`, `deletedAt`, `deletedBy`, `is_deleted`, `role_id`) VALUES
(1, 'adsfgj', 'adshfss', 'adsdfgj', 'adsfgj', '32463456575', NULL, '2023-11-26 05:12:31', NULL, NULL, NULL, '2023-12-14 06:07:27', NULL, 1, 3),
(2, 'Abogadie', 'Melvin', 'Rosales', 'pulong buhangin', '34564574565', 'astig@gmail.com', '2023-12-13 01:41:50', NULL, '2024-05-27 04:58:12', 5, NULL, NULL, 0, 3),
(3, 'Dela Cruz', 'Jermaine', 'Cancio', 'Lalakhan', '09215762559', 'delacruzjermainec@gmail.com', '2023-12-14 10:01:25', NULL, NULL, NULL, NULL, NULL, 0, 4),
(4, 'rawr', 'rawr', 'rawr', 'rawr', '12312344553', NULL, '2023-12-01 13:29:22', NULL, NULL, NULL, NULL, NULL, 0, 1),
(5, 'Fajardo', 'Ryan', 'Parulan', 'Pandi', '09123892892', 'tikoyryan@gmail.com', '2023-12-14 13:36:17', NULL, NULL, NULL, NULL, NULL, 0, 4),
(10023, 'Roque', 'Prince', 'rawr', 'Poblacion', '09123456789', NULL, '2023-12-14 06:04:28', NULL, NULL, NULL, NULL, NULL, 0, 1),
(10024, 'man', 'bat', 'is', 'Gotham', '09215762587', 'batman@gmail.com', '2023-12-15 08:19:58', 3, '2023-12-15 02:56:26', 3, NULL, NULL, 0, 4),
(10025, 'Su', 'Gang', 'Gung', 'Caypombo', '09123456723', NULL, '2023-12-15 09:28:58', 3, NULL, NULL, NULL, NULL, 0, 4),
(10026, 'Escote', 'Nino', 'Alvarado', 'Pandi', '09215762998', 'astig@gmail.com', '2023-12-15 09:30:23', 2, '2024-05-28 08:50:13', 2, NULL, NULL, 0, 4),
(10027, 'Admin', 'User', '', 'Poblacion', '09123456654', NULL, '2023-12-15 09:34:32', 2, NULL, NULL, '2023-12-17 06:55:33', 3, 1, 3),
(10028, 'Fischer', 'Jamal', 'Gwendolyn Norman', 'Qui deleniti odio la', '967', 'dujibaso@mailinator.com', '2024-09-21 10:04:05', 10027, '2024-09-21 10:04:17', 10027, NULL, NULL, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `health`
--

CREATE TABLE `health` (
  `health_id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `is_sick` smallint(1) DEFAULT 0,
  `ill_id` int(11) DEFAULT NULL,
  `date_declared` date DEFAULT NULL,
  `date_cured` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `health`
--

INSERT INTO `health` (`health_id`, `emp_id`, `is_sick`, `ill_id`, `date_declared`, `date_cured`) VALUES
(1, 10023, 0, 2, '2023-12-17', '2023-12-17'),
(2, 10024, 0, 4, '2023-12-17', '2024-05-27'),
(3, 10024, 0, 6, '2023-12-17', '2023-12-17'),
(4, 10023, 0, 3, '2023-12-17', '2024-05-27'),
(5, 1, 1, 1, '2023-12-17', NULL),
(6, 10024, 0, 2, '2023-12-17', '2024-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `illness`
--

CREATE TABLE `illness` (
  `ill_id` int(11) NOT NULL,
  `ill_name` varchar(50) NOT NULL,
  `contagious` varchar(3) NOT NULL,
  `danger_level` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `illness`
--

INSERT INTO `illness` (`ill_id`, `ill_name`, `contagious`, `danger_level`) VALUES
(1, 'Prince catu Roque', 'sam', 999009099),
(2, 'Prince catu Roque', 'No', 6),
(3, 'Covid-19', 'Yes', 10),
(4, 'Migrane', 'No', 1),
(5, 'Cancer', 'No', 10),
(6, 'Aids', 'Yes', 7);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `user_id`, `firstname`, `middlename`, `lastname`, `gender`, `contact`, `address`, `email`, `date_created`) VALUES
(5, 1, 'Mike', 'D', 'Williams', 'Male', '+14526-5455-44', 'Sample Address', 'mwilliams@sample.com', '2020-10-21 13:18:19'),
(6, 2, 'Claire', 'D', 'Blake', 'Female', '+18456-5455-55', 'Sample', 'cblake@sample.com', '2020-10-21 14:57:54'),
(7, 3, 'Mike', 'D', 'Williams', 'Male', '+14526-5455-44', 'Sample Address', 'mwilliams@sample.com', '2020-10-21 13:18:19'),
(8, 4, 'Claire', 'D', 'Blake', 'Female', '+18456-5455-55', 'Sample', 'cblake@sample.com', '2020-10-21 14:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `Or_id` bigint(11) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `createdBy` smallint(20) DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `updatedBy` smallint(6) DEFAULT NULL,
  `deletedAt` datetime DEFAULT NULL,
  `deletedBy` smallint(6) DEFAULT NULL,
  `is_deleted` smallint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(30) NOT NULL,
  `package` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package`, `description`, `amount`) VALUES
(2, 'Sample Package', 'Program sample  + trainer', 3500);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(30) NOT NULL,
  `registration_id` int(30) NOT NULL,
  `amount` int(30) NOT NULL,
  `remarks` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=registration, 2= monthly payment',
  `date_created` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `registration_id`, `amount`, `remarks`, `type`, `date_created`) VALUES
(1, 2, 4500, 'First payment', 2, '2020-10-21 14:39:26'),
(2, 2, 3500, 'payment for november', 2, '2020-10-21 14:39:52');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(30) NOT NULL,
  `plan` int(30) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `plan`, `amount`) VALUES
(1, 12, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `registration_info`
--

CREATE TABLE `registration_info` (
  `id` int(30) NOT NULL,
  `member_id` int(30) NOT NULL,
  `plan_id` int(30) NOT NULL,
  `package_id` int(30) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `trainer_id` tinyint(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive, 1= Active',
  `date_created` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration_info`
--

INSERT INTO `registration_info` (`id`, `member_id`, `plan_id`, `package_id`, `start_date`, `end_date`, `trainer_id`, `status`, `date_created`) VALUES
(2, 5, 1, 2, '2020-10-21', '2021-10-21', 0, 0, '2020-10-21'),
(3, 5, 1, 2, '2020-10-21', '2021-10-21', 0, 1, '2020-10-21'),
(4, 6, 1, 2, '2019-10-19', '2020-10-19', 0, 0, '2020-10-21'),
(5, 6, 1, 2, '2020-10-21', '2021-10-21', 0, 1, '2020-10-21');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `createdBy` smallint(20) DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `updatedBy` smallint(20) DEFAULT NULL,
  `deletedAt` datetime DEFAULT NULL,
  `deletedBy` smallint(20) DEFAULT NULL,
  `is_deleted` smallint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `fname`, `lname`, `mname`, `address`, `contact`, `email`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`, `deletedAt`, `deletedBy`, `is_deleted`) VALUES
(1, 'John', 'Doe', 'A', '123 Main St', '09123456789', 'johndoe@email.com', '2024-09-21 16:15:27', 1, '2024-09-21 16:15:27', 1, NULL, NULL, 0),
(2, 'Jane', 'Smith', 'B', '456 Elm St', '09123456788', 'janesmith@email.com', '2024-09-21 16:20:30', 1, '2024-09-21 16:20:30', 1, NULL, NULL, 0),
(3, 'Alice', 'Johnson', 'C', '789 Oak St', '09123456787', 'alicejohnson@email.com', '2024-09-21 16:25:45', 1, '2024-09-21 16:25:45', 1, NULL, NULL, 0),
(4, 'Bob', 'Brown', 'D', '135 Maple St', '09123456786', 'bobbrown@email.com', '2024-09-21 16:30:12', 1, '2024-09-21 16:30:12', 1, NULL, NULL, 0),
(5, 'Charlie', 'Davis', 'E', '246 Pine St', '09123456785', 'charliedavis@email.com', '2024-09-21 16:35:00', 1, '2024-09-21 16:35:00', 1, NULL, NULL, 0),
(6, 'David', 'Wilson', 'F', '357 Cedar St', '09123456784', 'davidwilson@email.com', '2024-09-21 16:40:22', 1, '2024-09-21 16:40:22', 1, NULL, NULL, 0),
(7, 'Eve', 'Martinez', 'G', '468 Birch St', '09123456783', 'evemartinez@email.com', '2024-09-21 16:45:55', 1, '2024-09-21 16:45:55', 1, NULL, NULL, 0),
(8, 'Frank', 'Anderson', 'H', '579 Spruce St', '09123456782', 'frankanderson@email.com', '2024-09-21 16:50:18', 1, '2024-09-21 16:50:18', 1, NULL, NULL, 0),
(9, 'Grace', 'Thomas', 'I', '680 Fir St', '09123456781', 'gracethomas@email.com', '2024-09-21 16:55:35', 1, '2024-09-21 16:55:35', 1, NULL, NULL, 0),
(10, 'Hank', 'Taylor', 'J', '791 Willow St', '09123456780', 'hanktaylor@email.com', '2024-09-21 17:00:50', 1, '2024-09-21 17:00:50', 1, NULL, NULL, 0),
(11, 'John', 'Doe', 'A', '123 Main St', '09123456789', 'johndoe@email.com', '2024-09-21 16:15:27', 1, '2024-09-21 16:15:27', 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `full_name` varchar(225) NOT NULL,
  `dow` text NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `user_id`, `full_name`, `dow`, `date_from`, `date_to`, `time_from`, `time_to`) VALUES
(4, 8, 'test user', 'Injector Testing and Cleaning', '2024-09-21', '2024-09-21', '15:00:00', '16:00:00'),
(16, 8, 'test user 4', 'Underwash', '2024-10-03', '2024-10-03', '06:08:00', '06:08:00'),
(17, 8, 'test', 'Vulcanizing', '2024-09-25', '2024-09-25', '00:19:00', '00:19:00'),
(18, 8, 'test', 'Car Wash', '2024-09-19', '2024-09-19', '08:30:00', '08:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `name`, `contact`, `email`, `rate`) VALUES
(1, 'John Smith', '+18456-5455-55', 'jsmith@sample.com', 500);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `lastLogin` datetime DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `createdBy` smallint(20) DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `updatedBy` smallint(20) DEFAULT NULL,
  `deletedAt` datetime DEFAULT NULL,
  `deletedBy` smallint(20) DEFAULT NULL,
  `is_deleted` smallint(1) DEFAULT 0,
  `active` smallint(1) DEFAULT 0,
  `emp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `lastLogin`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`, `deletedAt`, `deletedBy`, `is_deleted`, `active`, `emp_id`) VALUES
(1, 'memen', '12345', NULL, '2023-12-14 14:25:09', NULL, '2023-12-16 12:27:47', 3, NULL, NULL, 0, 1, 3),
(2, 'tikoy', '123', NULL, '2023-12-14 14:25:37', NULL, NULL, NULL, NULL, NULL, 0, 1, 5),
(3, 'prince', '123', NULL, '2023-12-14 14:26:26', NULL, NULL, NULL, NULL, NULL, 0, 1, 10023),
(4, 'test', 'test', NULL, '2023-12-15 03:50:19', NULL, '2024-05-27 04:58:55', 5, NULL, NULL, 0, 0, 10023),
(1111, 'admin', 'admin', '2024-09-21 13:38:42', '2024-09-21 13:38:42', NULL, '2024-09-21 13:39:27', NULL, NULL, NULL, 0, 0, 10027),
(1115, 'test2', 'test2', NULL, '2024-09-21 02:08:02', 10027, NULL, NULL, NULL, NULL, 0, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 3 COMMENT '1=Admin,2=Staff, 3= subscriber'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'Administrator', 'admin', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `health`
--
ALTER TABLE `health`
  ADD PRIMARY KEY (`health_id`),
  ADD KEY `illness_id` (`ill_id`),
  ADD KEY `employee_id` (`emp_id`);

--
-- Indexes for table `illness`
--
ALTER TABLE `illness`
  ADD PRIMARY KEY (`ill_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration_info`
--
ALTER TABLE `registration_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10029;

--
-- AUTO_INCREMENT for table `health`
--
ALTER TABLE `health`
  MODIFY `health_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `illness`
--
ALTER TABLE `illness`
  MODIFY `ill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registration_info`
--
ALTER TABLE `registration_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1116;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `health`
--
ALTER TABLE `health`
  ADD CONSTRAINT `health_ibfk_1` FOREIGN KEY (`ill_id`) REFERENCES `illness` (`ill_id`),
  ADD CONSTRAINT `health_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
