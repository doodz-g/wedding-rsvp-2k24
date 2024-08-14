-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2024 at 04:45 PM
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
-- Database: `db_rsvp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_companions`
--

CREATE TABLE `tbl_companions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_companions`
--

INSERT INTO `tbl_companions` (`id`, `user_id`, `name`, `date`) VALUES
(1, 1, 'Beverly De Guzman', '2024-08-12 20:38:35'),
(2, 1, 'Zhalia Faye de Guzman', '2024-08-13 10:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `invite_id` varchar(250) DEFAULT NULL,
  `name` varchar(250) NOT NULL,
  `will_attend` varchar(5) DEFAULT NULL,
  `will_not_attend` varchar(5) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `invite_id`, `name`, `will_attend`, `will_not_attend`, `date`) VALUES
(1, '59627970757', 'Frederick \"AGA\" De guzman', 'Yes', NULL, '2024-08-14 14:25:32'),
(2, '99060329313', 'Jerico Russell Mungcal', 'Yes', NULL, '2024-08-14 13:03:35'),
(3, '81278853393', 'Alvin Vinluan', 'Yes', NULL, '2024-08-14 12:52:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_companions`
--
ALTER TABLE `tbl_companions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_companions`
--
ALTER TABLE `tbl_companions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
