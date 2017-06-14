-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2017 at 08:14 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_from` int(11) NOT NULL,
  `user_to` int(11) NOT NULL,
  `conversation_id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_from`, `user_to`, `conversation_id`, `msg`, `status`) VALUES
(1, 1, 3, 1, 'hello, how are you anita', 1),
(2, 10, 1, 2, 'hello hardeep whats up ?', 1),
(3, 1, 10, 2, 'i am fine, you said', 1),
(4, 3, 1, 1, 'i am fine hardeep', 1),
(5, 1, 3, 1, 'what are doing anita ?', 1),
(6, 3, 1, 1, 'i am working and litte busy, talk to you later hardeep.', 1),
(7, 10, 1, 2, 'i am also fine hardeep', 1),
(12, 1, 3, 1, 'hi anita call me later', 1),
(13, 1, 10, 2, 'hi today', 1),
(14, 1, 10, 2, 'jbada, ,a e,fbewjb', 1),
(15, 1, 3, 1, 'hi again anita', 1),
(16, 3, 1, 1, 'i am busy hardeep, i cant talk', 1),
(17, 3, 1, 1, 'hello hardeep\nits my new message', 1),
(18, 3, 11, 5, 'helli jkri \nits my new one', 1),
(19, 3, 8, 6, 'hi demo\nwhatsup', 1),
(20, 3, 17, 7, 'hi jorge what are you doing ?', 1),
(21, 10, 1, 2, 'efdvdv', 1),
(22, 10, 3, 8, 'hi anita\nits my first time', 1),
(23, 3, 17, 7, 'i am fine jorge :)', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
