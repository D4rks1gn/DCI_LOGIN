-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2022 at 05:17 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dci login`
--

-- --------------------------------------------------------

--
-- Table structure for table `crud_dci`
--

CREATE TABLE `crud_dci` (
  `uid` int(11) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `first_name` varchar(30) NOT NULL DEFAULT 'User',
  `last_name` varchar(30) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `state` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crud_dci`
--

INSERT INTO `crud_dci` (`uid`, `user_name`, `first_name`, `last_name`, `date_of_birth`, `email`, `gender`, `state`) VALUES
(1, 'admin', 'admin', 'admin', '2022-07-01', 'admin@gmail.com', 'male', 'Tamil Nadu');

-- --------------------------------------------------------

--
-- Table structure for table `login_data`
--

CREATE TABLE `login_data` (
  `id` int(3) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `date-time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_data`
--

INSERT INTO `login_data` (`id`, `user_name`, `email_id`, `password`, `date-time`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2022-07-15 14:54:55'),
(2, 'shankar', 'shankar@214', 'e36746428c0084e5444890f46c97b6b8', '2022-07-15 17:05:36'),
(3, 'hepsy', 'hepsy@gmail.com', '9c611cd3724a6286603799f608c1b24a', '2022-07-20 20:06:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crud_dci`
--
ALTER TABLE `crud_dci`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`user_name`);

--
-- Indexes for table `login_data`
--
ALTER TABLE `login_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crud_dci`
--
ALTER TABLE `crud_dci`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_data`
--
ALTER TABLE `login_data`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
