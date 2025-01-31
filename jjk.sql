-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2025 at 07:52 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jjk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `username`, `password`) VALUES
(2, 'admin', 'adminjkk');

-- --------------------------------------------------------

--
-- Table structure for table `analytics_data`
--

CREATE TABLE `analytics_data` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `total_appointments` int(11) NOT NULL,
  `confirmed_bookings` int(11) NOT NULL,
  `revenue` float NOT NULL,
  `new_clients` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `analytics_data`
--

INSERT INTO `analytics_data` (`id`, `date`, `total_appointments`, `confirmed_bookings`, `revenue`, `new_clients`) VALUES
(1, '2024-08-01', 100, 80, 5000, 15),
(2, '2024-08-02', 120, 95, 6000, 20),
(3, '2024-08-03', 90, 70, 4000, 12),
(4, '2024-08-04', 110, 85, 5500, 18),
(5, '2024-09-04', 2, 2, 1000, 2),
(6, '2024-09-18', 4, 2, 1000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` varchar(20) DEFAULT NULL,
  `status` enum('Pending','Approved','To be Resched','Reschedule','Completed','Cancelled') DEFAULT 'Pending',
  `message` text DEFAULT NULL,
  `service_type` enum('Build','Design','Consultation','Project Management') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `client_name`, `email`, `phone_number`, `appointment_date`, `appointment_time`, `status`, `message`, `service_type`) VALUES
(17, 'Kent BeTouch', 'allenhairless@gmail.com', '092323231', '2025-02-08', '1-3pm', 'Reschedule', '', 'Build'),
(18, 'Lee Tenorio', 'edishanleetenorio03@gmail.com', '0929950384', '2025-02-07', '1-3pm', 'Reschedule', 'urgent', 'Design'),
(19, 'Lee Tenorio', 'edishanleetenorio03@gmail.com', '0929950384', '2025-01-31', '10-12pm', 'Cancelled', 'can i have an coffeee', 'Project Management');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `description` text DEFAULT NULL,
  `color` varchar(7) DEFAULT '#ff0000',
  `icon` varchar(50) DEFAULT 'fas fa-star'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `date`, `description`, `color`, `icon`) VALUES
(7, 'Meeting', '2024-09-18', 'Meeting with Ada Lovelace', '#00ff00', 'fas fa-birthday-cake'),
(8, 'Business Meeting', '2024-09-20', 'Cooperaton between san miguel corp', '#0000ff', 'fas fa-star');

-- --------------------------------------------------------

--
-- Table structure for table `pending_users`
--

CREATE TABLE `pending_users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verification_code` varchar(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pending_users`
--

INSERT INTO `pending_users` (`id`, `first_name`, `last_name`, `username`, `email`, `mobile`, `password`, `verification_code`, `created_at`) VALUES
(15, 'Los', 'Ramos', 'Shan', 'edishanlee.tenorio@cvsu.edu.ph', '09248343241', '$2y$10$klJCwth9L4UmMPDfkwwC9.Re8JgzHCWDebZ1zYe6phXVXkDRS4im2', '60135', '2025-01-22 15:29:48');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `approved` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `verification_code` varchar(255) DEFAULT NULL,
  `verified` tinyint(1) DEFAULT 0,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `token_expiry` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `mobile`, `password`, `created_at`, `verification_code`, `verified`, `password_reset_token`, `token_expiry`) VALUES
(2, 'Lee', 'Tenorio', 'dishan', 'edishanleetenorio03@gmail.com', '0929950384', '$2y$10$JqqnPciaoJX/syCH8aDRMuTDHQ0KpB6VGT1MaCK5gNI5G6XYe7n46', '2024-09-19 15:39:17', NULL, 0, NULL, NULL),
(4, 'Kent', 'Buendiva', 'Kentut', 'allenhairless@gmail.com', '092323231', '$2y$10$8vKz0OogWSy0D29j0K/W.emo6a/EEvx37zjNCJ7xlEfkfblhnE0xq', '2024-09-19 16:16:19', NULL, 0, NULL, '2025-01-24 16:10:41'),
(8, 'shane', 'lot', 'shanel', 'dishantenorio03@gmail.com', '09824853456', '$2y$10$XLpujhndDQA0enpvNm8leuNK4gW/3.BMJmdX/obmrw/og1aFvOBFe', '2025-01-16 05:14:38', NULL, 0, NULL, NULL),
(12, 'admin', 'jkk', 'admin', 'edishanlee03@icloud.com', '09299504493', '$2y$10$nAoUoNPGysBAprLrhkRUje5uMSNZnw/0MDrD887vAHmY0TWVX.GFW', '2025-01-22 08:57:56', NULL, 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `analytics_data`
--
ALTER TABLE `analytics_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending_users`
--
ALTER TABLE `pending_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `analytics_data`
--
ALTER TABLE `analytics_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pending_users`
--
ALTER TABLE `pending_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
