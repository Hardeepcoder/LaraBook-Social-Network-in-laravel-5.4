-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2017 at 12:40 PM
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
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `id` int(11) NOT NULL,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`id`, `user_one`, `user_two`) VALUES
(1, 1, 3),
(2, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `friendships`
--

CREATE TABLE `friendships` (
  `id` int(11) NOT NULL,
  `requester` int(11) NOT NULL,
  `user_requested` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friendships`
--

INSERT INTO `friendships` (`id`, `requester`, `user_requested`, `status`, `updated_at`, `created_at`) VALUES
(2, 1, 9, 1, '2017-05-09 08:57:12', '2017-03-09 23:41:37'),
(3, 9, 8, 1, '2017-03-10 11:07:15', '2017-03-09 23:44:02'),
(5, 3, 1, 1, '2017-05-17 10:06:44', '2017-03-10 00:16:13'),
(6, 11, 3, 1, '2017-03-10 11:14:13', '2017-03-10 05:19:32'),
(7, 11, 9, 1, '2017-05-09 08:57:14', '2017-03-10 05:19:35'),
(12, 8, 3, 1, '2017-03-14 11:18:58', '2017-03-14 05:48:40'),
(14, 1, 11, 1, '2017-03-14 11:29:47', '2017-03-14 05:59:20'),
(16, 12, 8, NULL, '2017-04-11 12:56:08', '2017-04-11 12:56:08'),
(17, 12, 1, 1, '2017-05-08 11:22:52', '2017-04-11 12:56:41'),
(18, 12, 9, 1, '2017-05-09 08:57:16', '2017-04-11 12:56:43'),
(20, 12, 11, 1, '2017-05-15 11:36:38', '2017-04-11 12:56:44'),
(21, 13, 12, 1, '2017-04-11 07:59:10', '2017-04-11 12:58:35'),
(22, 12, 13, 1, '2017-04-11 08:01:31', '2017-04-11 12:59:35'),
(25, 17, 8, NULL, '2017-04-23 09:50:11', '2017-04-23 09:50:11'),
(26, 17, 3, 1, '2017-05-08 11:00:17', '2017-04-23 09:50:13'),
(27, 17, 1, 1, '2017-05-08 11:22:50', '2017-04-23 09:50:16'),
(28, 17, 9, 1, '2017-05-09 08:57:19', '2017-04-23 09:50:19'),
(29, 19, 8, NULL, '2017-05-01 07:12:20', '2017-05-01 07:12:20'),
(30, 20, 8, NULL, '2017-05-02 18:37:50', '2017-05-02 18:37:50'),
(38, 22, 8, NULL, '2017-05-08 02:50:44', '2017-05-08 02:50:44'),
(41, 22, 1, 1, '2017-05-08 11:22:56', '2017-05-08 02:51:27'),
(42, 22, 9, 1, '2017-05-09 08:57:18', '2017-05-08 02:51:29'),
(43, 22, 19, NULL, '2017-05-08 02:51:44', '2017-05-08 02:51:44');

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
(7, 10, 1, 2, 'i am also fine hardeep', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(27, 1, 3, 0, 'accepted your friend request', '2017-05-17 10:07:07', '2017-05-17 04:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'This is demo post', 0, '2017-03-23 10:44:13', '0000-00-00 00:00:00'),
(2, 3, 'this is post by me, i am anita donal', 0, '2017-03-23 10:44:50', '0000-00-00 00:00:00'),
(3, 1, 'hjbv bmmjv hkvh', 0, '2017-05-08 01:49:38', '2017-05-08 01:49:38'),
(4, 9, 'have a nic day :)', 0, '2017-05-09 03:26:59', '2017-05-09 03:26:59'),
(5, 1, 'what going on today ?', 0, '2017-05-09 03:32:57', '2017-05-09 03:32:57'),
(6, 1, 'fb xvf cv cgn', 0, '2017-05-09 21:27:20', '2017-05-09 21:27:20'),
(7, 11, 'what are you doing guys ?', 0, '2017-05-15 06:08:44', '2017-05-15 06:08:44');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `about` text,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `city`, `country`, `about`, `updated_at`, `created_at`) VALUES
(1, 8, 'london', 'UK', 'I am demo user', '2017-03-01 08:21:51', '2017-02-25 00:50:09'),
(2, 3, 'New York', 'USA', 'I am Anita, how are you ?', '2017-03-20 04:34:45', '2017-02-25 00:50:09'),
(3, 1, 'Manchester', 'UK', 'I am Hardeepcoder', '2017-03-04 07:46:26', '2017-02-25 00:50:09'),
(4, 9, NULL, NULL, NULL, '2017-03-09 22:34:27', '2017-03-09 22:34:27'),
(5, 10, NULL, NULL, NULL, '2017-03-10 05:18:19', '2017-03-10 05:18:19'),
(6, 11, NULL, NULL, NULL, '2017-03-10 05:18:57', '2017-03-10 05:18:57'),
(7, 12, NULL, NULL, NULL, '2017-04-11 12:55:12', '2017-04-11 12:55:12'),
(8, 13, NULL, NULL, NULL, '2017-04-11 12:58:24', '2017-04-11 12:58:24'),
(9, 14, NULL, NULL, NULL, '2017-04-13 08:20:21', '2017-04-13 08:20:21'),
(10, 15, NULL, NULL, NULL, '2017-04-19 09:52:26', '2017-04-19 09:52:26'),
(11, 16, NULL, NULL, NULL, '2017-04-22 22:20:35', '2017-04-22 22:20:35'),
(12, 17, NULL, NULL, NULL, '2017-04-23 09:49:02', '2017-04-23 09:49:02'),
(13, 18, NULL, NULL, NULL, '2017-04-27 07:11:39', '2017-04-27 07:11:39'),
(14, 19, NULL, NULL, NULL, '2017-05-01 07:11:44', '2017-05-01 07:11:44'),
(15, 20, NULL, NULL, NULL, '2017-05-02 18:37:24', '2017-05-02 18:37:24'),
(17, 22, NULL, NULL, NULL, '2017-05-08 02:50:19', '2017-05-08 02:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `slug`, `email`, `pic`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'hardeep singh', 'male', 'hardeep-singh', 'hardeepphp@yahoo.com', '47224964-profile-pictures.jpg', '$2y$10$3v5I.PvIiK.tiiD.ZmxYfuOsTYvg5faIpFLsfwA8g/eRqHsIYyA5a', '4sQ3Wzw5I3PNZllraSWlrA75LbUvbaApLvQjti4fAQjGO1GuQB64N2qH6R3X', '2017-02-21 00:36:28', '2017-02-21 00:36:28'),
(3, 'anita donal', 'female', 'anita-donal', 'anita@yahoo.com', '47354305-profile-pictures.jpg', '$2y$10$0mgQ2Nn7vaEaUgQCk/dR3uUrG6YzRwPJJ.OemE2fYLNNr7owdLYFS', 'ckdO7DH0z4sm2zJwO6p6Y03hNqoD7wzC1DQ2tlGs7Nyua7YNeEC1KIH3CCy3', '2017-02-21 00:37:39', '2017-02-21 00:37:39'),
(8, 'demo', 'male', 'demo', 'demo@yahoo.com', '47683740-profile-pictures.png', '$2y$10$E2gGYMwRbICmZd24d60HTO3ITkNfvEpG5GVdwLXXXVCmG2JIOI3y2', '6kpxTeemLAsocj1CCGyvibuJqiNm3vYEcI0zA9vugEVJFkFO3t3fdlzUysL8', '2017-02-25 00:50:09', '2017-02-25 00:50:09'),
(9, 'john lewis', 'male', 'john-lewis', 'john@gmai.com', 'boy.png', '$2y$10$9vMn8B5A0s2OVC6Ytxaq1.5UZUKazOo1Nre1hPimVCrmN21NzULfy', 'QExPoB5xo52VaPLTRIr93dpfGCFdLxBAYYJVHqFR215tHOXEeU0RhgIfyFjy', '2017-03-09 22:34:27', '2017-03-09 22:34:27'),
(10, 'Ogran Gysn', 'male', 'ogran-gysn', 'ogran@gmail.com', 'boy.png', '$2y$10$ItcgnOyqdHWJdKvpA7kJouyx/fhbvtWpDMp4S6D4DezXgCqYLIxrO', 'DxwnjI2z7ykwfgJtMR6cTnCAZepaYQI1opqhw1e4KFKzhsYYGp0kVhflfObR', '2017-03-10 05:18:19', '2017-03-10 05:18:19'),
(11, 'Kritnia Hoyag', 'female', 'kritnia-hoyag', 'Kritnia12@yahoo.com', 'girl.png', '$2y$10$Dz44uPHcN4r2oPefa9ZOqOFVjEpLscHoNVmQm1ha0OHPSNmaemzeW', 'kVf5wlgSZNk8DpED1v36tMHmXkabpR3W7SHYT24zrznIKeOOMVPhhWKUFcAW', '2017-03-10 05:18:57', '2017-03-10 05:18:57'),
(12, 'anti', 'female', 'anti', '13005065114@umt.edu.pk', 'girl.png', '$2y$10$IVk2pIuhddsaRwjaxaCvYO2XonGUTaVjrQRf1pS5QFvqqh91/qN6a', 'Fym6nOHoPdf36BSgoM1FGb4r6k2rgrF6qguf0XCDAzl3ZS04gwaF9Tt5iNal', '2017-04-11 12:55:12', '2017-04-11 12:55:12'),
(13, 'fucking', 'male', 'fucking', 'fuckin@fucking.com', 'boy.png', '$2y$10$dC8FyH6xQBrv0NIQ2nbFluCRhqPBDnnQuQgu.GfhRygDK0dqCNwLO', 'As2a1easMqCXg0XwrJuNjsA7JOWqR2bSdzgpFp3OTV7KojbjtRu68kdvY75B', '2017-04-11 12:58:24', '2017-04-11 12:58:24'),
(15, 'khoa', 'male', 'khoa', 'sonic1293.khoa@gmail.com', 'boy.png', '$2y$10$IzIE3VMnNHGvWn9NeYAyx.zNQmB82lzJ.4II75OItYadecgw2s01W', NULL, '2017-04-19 09:52:26', '2017-04-19 09:52:26'),
(16, 'Manuel Ortega', 'male', 'manuel-ortega', 'manuel@lasindias.coop', 'boy.png', '$2y$10$YsBuF71PfUEhaFYFsDGQCustct9dx.OqDSuiiv9lYjdZ4tVuIUATK', 'TXvVmxfmDwIn5bQdxbPjbJWOdnLVJp9egyu3TVFGEgnCRl1X5OtXBacv1XBD', '2017-04-22 22:20:35', '2017-04-22 22:20:35'),
(17, 'jorge', 'male', 'jorge', 'jorge@jorge.com', 'boy.png', '$2y$10$lPuTWztKaVGK26Jl50BGhuJJxLTc.SDWerrFvscaOWlU9kerti.Q.', NULL, '2017-04-23 09:49:02', '2017-04-23 09:49:02'),
(18, 'demo', 'male', 'demo', 'demo@demo.com', 'boy.png', '$2y$10$MkTMQvHHGI7SiPhSrpBsPusWiO4Kwxe6Ff8Qv3n0LwXcoWs7NR80a', NULL, '2017-04-27 07:11:38', '2017-04-27 07:11:38'),
(19, 'nono', 'male', 'nono', 'noe@jaus.sn', 'boy.png', '$2y$10$9XNLh96YNfIp0T85lJOHROsyMJwGoX.I3yOZ9.AGnKDDpBTqxn4R2', NULL, '2017-05-01 07:11:37', '2017-05-01 07:11:37'),
(20, 'nase', 'male', 'nase', 'naser202640@gmail.com', 'boy.png', '$2y$10$5EH8PjI/LT.H0iOI1IptNOkCq/.hegkAJT.sPWg1F5s1X0jApGbPm', NULL, '2017-05-02 18:37:24', '2017-05-02 18:37:24'),
(22, 'test', 'male', 'test', 'test@test.test', 'boy.png', '$2y$10$ekIkvOFxs0jFcNEH4Hp7xeA.Ua7GBNSBTjHAEtbjQ9/ibx42.S99C', NULL, '2017-05-08 02:50:19', '2017-05-08 02:50:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friendships`
--
ALTER TABLE `friendships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifcations`
--
ALTER TABLE `notifcations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
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
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `friendships`
--
ALTER TABLE `friendships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notifcations`
--
ALTER TABLE `notifcations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
