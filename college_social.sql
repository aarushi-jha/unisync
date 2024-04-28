-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2021 at 06:47 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college_social`
--

-- --------------------------------------------------------

--
-- Table structure for table `college_comment`
--

CREATE TABLE `college_comment` (
  `id` int(11) NOT NULL,
  `post_id` varchar(250) DEFAULT NULL,
  `comment` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `college_connection`
--

CREATE TABLE `college_connection` (
  `id` int(11) NOT NULL,
  `user_id1` int(11) DEFAULT NULL,
  `user_id2` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `college_connection`
--

INSERT INTO `college_connection` (`id`, `user_id1`, `user_id2`, `status`, `created_at`) VALUES
(1, 4, 5, 0, '2021-11-28 16:51:31'),
(2, 4, 6, 1, '2021-11-28 17:00:05'),
(3, 6, 5, 0, '2021-11-28 17:20:29'),
(4, 6, 7, 1, '2021-11-29 02:57:17'),
(5, 7, 6, 1, '2021-11-29 02:57:20'),
(6, 8, 9, 1, '2021-11-29 03:35:20'),
(7, 9, 8, 1, '2021-11-29 03:37:02');

-- --------------------------------------------------------

--
-- Table structure for table `college_like`
--

CREATE TABLE `college_like` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `college_like`
--

INSERT INTO `college_like` (`id`, `post_id`, `user_id`, `created_at`) VALUES
(4, 7, 8, '2021-11-29 16:02:48'),
(8, 9, 8, '2021-11-29 16:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `college_post`
--

CREATE TABLE `college_post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `img_post` longtext DEFAULT NULL,
  `text_post` varchar(250) DEFAULT NULL,
  `statue` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `college_post`
--

INSERT INTO `college_post` (`id`, `user_id`, `img_post`, `text_post`, `statue`, `created_at`) VALUES
(3, 4, NULL, 'sfsdfd\r\ndf\r\ndfd\r\nfdfsds\r\nsdf\r\nsdf\r\nsd\r\nfd\r\nfdfddfdsfd', 1, '2021-11-28 09:21:11'),
(6, 4, 'imgonline-com-ua-CompressToSize-NTIxCQtBoxKJFMO6.jpg', NULL, 1, '2021-11-28 09:38:16'),
(7, 4, NULL, 'sdfs', 1, '2021-11-28 16:42:23'),
(8, 9, NULL, 'test post', 1, '2021-11-29 03:36:14'),
(9, 9, 'demo-computer-key-to-download-version-software-trial-64543995.jpg', NULL, 1, '2021-11-29 03:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `college_users`
--

CREATE TABLE `college_users` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `mobile` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `org` varchar(250) DEFAULT NULL,
  `profileimage` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `type` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `college_users`
--

INSERT INTO `college_users` (`id`, `name`, `email`, `mobile`, `password`, `org`, `profileimage`, `status`, `type`, `created_at`) VALUES
(1, 'A', 'dsfsdfds@gmail.com', NULL, '123456', 'ALL', NULL, 1, 2, '2021-11-28 05:47:14'),
(2, 'B', 'dsfsdfds@gmail.com', NULL, '123456', 'ALL', NULL, 1, 2, '2021-11-28 05:48:52'),
(3, 'C', 'demo@gmail.com', NULL, '1234456', 'ALL', NULL, 1, 2, '2021-11-28 05:49:27'),
(4, '0d', 'demo1@gmail.com', NULL, '123456', 'ALL', NULL, 1, 2, '2021-11-28 05:52:29'),
(5, 'r', 'cvxzc@GMAIL.COM', NULL, 'DFSD', '2', NULL, 1, 1, '2021-11-28 05:53:10'),
(6, '0af', 'ex@gmail.com', 'asdasd', '222222', 'ALL', NULL, 1, 1, '2021-11-28 16:58:17'),
(7, 'dfsa', 'dev@gmail.com', 'asfdasas@gmail.com', '123456', '1', NULL, 1, 1, '2021-11-29 02:56:47'),
(8, 'Test user', 'testuser@gmail.com', NULL, '123456', '2', NULL, 1, 1, '2021-11-29 03:33:44'),
(9, 'test2', 'test2@gmail.com', NULL, '123456', 'ALL', NULL, 1, 1, '2021-11-29 03:34:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `college_comment`
--
ALTER TABLE `college_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `college_connection`
--
ALTER TABLE `college_connection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `college_like`
--
ALTER TABLE `college_like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `college_post`
--
ALTER TABLE `college_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `college_users`
--
ALTER TABLE `college_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `college_comment`
--
ALTER TABLE `college_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `college_connection`
--
ALTER TABLE `college_connection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `college_like`
--
ALTER TABLE `college_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `college_post`
--
ALTER TABLE `college_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `college_users`
--
ALTER TABLE `college_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
