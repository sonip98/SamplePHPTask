-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2023 at 04:48 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sampledatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `employee_gender` tinytext NOT NULL,
  `employee_bdate` varchar(255) NOT NULL,
  `fk_resto_id` int(11) NOT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_name`, `employee_gender`, `employee_bdate`, `fk_resto_id`, `deleted_at`, `created_at`) VALUES
(1, 'Thomas', 'm', '1951-01-01', 1, NULL, '2023-04-07 20:06:50'),
(2, 'Elizabeth', 'f', '1998-01-01', 1, NULL, '2023-04-07 20:10:36'),
(3, 'Johnathan', 'm', '1985-12-02', 1, NULL, '2023-04-07 20:10:53'),
(4, 'Jeffery', 'm', '1965-01-01', 7, NULL, '2023-04-07 20:11:24'),
(5, 'Fred', 'm', '2000-01-01', 8, NULL, '2023-04-07 20:12:07'),
(6, 'Jimmy', 'm', '1990-01-01', 8, NULL, '2023-04-07 20:12:19'),
(7, 'Ken', 'm', '2001-01-01', 8, NULL, '2023-04-07 20:12:33'),
(8, 'Adrian', 'm', '1998-01-01', 8, NULL, '2023-04-07 20:12:49'),
(9, 'Andrew', 'm', '1996-01-01', 8, NULL, '2023-04-07 20:13:04'),
(10, 'Fred', 'm', '1990-01-01', 8, NULL, '2023-04-07 20:13:25'),
(11, 'Teresa', 'f', '1999-01-01', 8, NULL, '2023-04-07 20:13:41'),
(12, 'Ruth', 'f', '1995-01-01', 8, NULL, '2023-04-07 20:13:55'),
(13, 'Joseph', 'm', '1985-01-01', 8, NULL, '2023-04-07 20:14:17'),
(14, 'Elias', 'm', '1969-01-01', 8, NULL, '2023-04-07 20:14:32'),
(15, 'Louise', 'm', '1955-01-01', 8, NULL, '2023-04-07 20:14:47'),
(16, 'Laurie', 'f', '2000-01-01', 8, NULL, '2023-04-07 20:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL,
  `restaurant_name` varchar(255) NOT NULL,
  `restaurant_address` varchar(255) DEFAULT NULL,
  `restaurant_category` varchar(255) NOT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `restaurant_name`, `restaurant_address`, `restaurant_category`, `deleted_at`, `created_at`) VALUES
(1, 'Paul Revere, llc', '57 OH-97, Mansfield, OH 44904, United States', 'Restaurant', NULL, '2023-04-07 19:52:05'),
(2, 'Buckeye Express Diner', '810 OH-97, Bellville, OH 44813, United States', 'Diner', NULL, '2023-04-07 19:52:32'),
(3, 'Malabar Farm Restaurant', '3645 Pleasant Valley Rd, Lucas, OH 44843, United States', 'American restaurant', NULL, '2023-04-07 19:53:50'),
(4, 'Wedgewing Family Restaurant', '167 E 3rd St, Perrysville, OH 44864, United States', 'Family restaurant', NULL, '2023-04-07 19:54:12'),
(5, 'The Alcove Restaurant & Lounge', '116 S Main St, Mt Vernon, OH 43050, United States', 'Fine dining restaurant', NULL, '2023-04-07 19:54:42'),
(6, 'Ghostwriter Public House', '49-1/2 S Main St, Johnstown, OH 43031, United States', 'Restaurant', NULL, '2023-04-07 19:55:04'),
(7, 'Yemeni Restaurant', '5426 Cleveland Ave, Columbus, OH 43231, United States', 'Yemeni Restaurant', NULL, '2023-04-07 19:55:28'),
(8, 'Addis Restaurant', '3750 Cleveland Ave, Columbus, OH 43224, United States', 'Ethiopian restaurant', NULL, '2023-04-07 19:55:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `role` tinytext NOT NULL,
  `password` varchar(255) NOT NULL,
  `deleted_at` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `role`, `password`, `deleted_at`, `created_at`) VALUES
(1, 'admin', 'Admin_first_name', 'Admin_last_name', 'admin', 'admin', '', '2023-04-07 08:15:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
