-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2017 at 05:38 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `larabook`
--

-- --------------------------------------------------------

--
-- Table structure for table `notifcations`
--

CREATE TABLE `notifcations` (
  `id` int(11) NOT NULL,
  `user_logged` int(11) NOT NULL,
  `user_hero` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `note` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifcations`
--

INSERT INTO `notifcations` (`id`, `user_logged`, `user_hero`, `status`, `note`, `updated_at`, `created_at`) VALUES
(4, 9, 8, 0, 'accepted your friend request', '2017-03-14 12:13:54', '2017-03-14 05:48:22'),
(5, 3, 8, 0, 'accepted your friend request', '2017-05-15 11:31:23', '2017-03-14 05:48:58'),
(6, 1, 8, 0, 'accepted your friend request', '2017-03-14 12:13:41', '2017-03-14 05:52:04'),
(7, 11, 1, 0, 'accepted your friend request', '2017-03-14 12:13:20', '2017-03-14 05:59:47'),
(8, 3, 1, 0, 'accepted your friend request', '2017-03-27 11:18:04', '2017-03-14 06:26:42'),
(9, 10, 1, 0, 'accepted your friend request', '2017-03-20 04:50:19', '2017-03-19 23:07:58'),
(10, 12, 13, 0, 'accepted your friend request', '2017-04-11 08:01:19', '2017-04-11 12:59:10'),
(11, 13, 12, 0, 'accepted your friend request', '2017-04-11 08:02:40', '2017-04-11 13:01:31'),
(12, 3, 17, 1, 'accepted your friend request', '2017-05-08 05:30:17', '2017-05-08 05:30:17'),
(13, 3, 21, 1, 'accepted your friend request', '2017-05-08 05:30:20', '2017-05-08 05:30:20'),
(14, 3, 12, 1, 'accepted your friend request', '2017-05-08 05:30:23', '2017-05-08 05:30:23'),
(15, 3, 22, 1, 'accepted your friend request', '2017-05-08 05:30:25', '2017-05-08 05:30:25'),
(16, 1, 17, 1, 'accepted your friend request', '2017-05-08 05:52:50', '2017-05-08 05:52:50'),
(17, 1, 12, 1, 'accepted your friend request', '2017-05-08 05:52:52', '2017-05-08 05:52:52'),
(18, 1, 21, 1, 'accepted your friend request', '2017-05-08 05:52:54', '2017-05-08 05:52:54'),
(19, 1, 22, 1, 'accepted your friend request', '2017-05-08 05:52:57', '2017-05-08 05:52:57'),
(20, 1, 14, 1, 'accepted your friend request', '2017-05-08 05:52:59', '2017-05-08 05:52:59'),
(21, 9, 1, 0, 'accepted your friend request', '2017-05-09 09:03:06', '2017-05-09 03:27:12'),
(22, 9, 11, 0, 'accepted your friend request', '2017-05-15 11:33:38', '2017-05-09 03:27:14'),
(23, 9, 12, 1, 'accepted your friend request', '2017-05-09 03:27:16', '2017-05-09 03:27:16'),
(24, 9, 22, 1, 'accepted your friend request', '2017-05-09 03:27:18', '2017-05-09 03:27:18'),
(25, 9, 17, 1, 'accepted your friend request', '2017-05-09 03:27:19', '2017-05-09 03:27:19'),
(26, 11, 12, 1, 'accepted your friend request', '2017-05-15 06:06:38', '2017-05-15 06:06:38'),
(27, 1, 3, 0, 'accepted your friend request', '2017-05-17 10:07:07', '2017-05-17 04:36:44'),
(28, 3, 10, 0, 'accepted your friend request', '2017-06-12 06:27:58', '2017-06-11 23:43:09'),
(29, 1, 10, 0, 'accepted your friend request', '2017-07-04 12:38:30', '2017-06-26 00:32:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notifcations`
--
ALTER TABLE `notifcations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notifcations`
--
ALTER TABLE `notifcations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
