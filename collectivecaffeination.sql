-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2016 at 10:44 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `collectivecaffeination`
--
CREATE DATABASE IF NOT EXISTS `collectivecaffeination` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `collectivecaffeination`;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `start_time` varchar(10) NOT NULL,
  `end_time` varchar(10) NOT NULL,
  `description` varchar(500) NOT NULL,
  `date` varchar(11) NOT NULL,
  `max_participants` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `image`, `location`, `start_time`, `end_time`, `description`, `date`, `max_participants`) VALUES
(2, 2, 'C:/xampp/htdocs/WebSys-Website/images/14224838_10210313342891663_2741232113746686469_n.jpg', '5', '1 PM', '3 PM', 'This is my first meetup! I am interested in photography and would love to talk about art, music, and web design.', ' 2016-12-10', 6),
(3, 1, 'C:/xampp/htdocs/WebSys-Website/images/11221296_10206893829807016_6719728070922099471_n.jpg', '5', '12 PM', '2 PM', 'Come study for the FOCS final! Get help from other students and do practice problems.', ' 2016-12-15', 4),
(5, 3, 'C:/xampp/htdocs/WebSys-Website/images/image-1.png', '6', '12 PM', '3 PM', 'I would love to host a movie watching meetup, so bring a warm beverage and enjoy a laughter-filled comedy!', ' 2016-12-10', 6),
(6, 4, 'C:/xampp/htdocs/WebSys-Website/images/image-3.png', '1', '4 PM', '8 PM', 'Come meet at the Union, we will go downtown to celebrate the end of the school week and get pumped for kickoff on Sunday!', ' 2016-12-11', 6);

-- --------------------------------------------------------

--
-- Table structure for table `signups`
--

CREATE TABLE `signups` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `salt` varchar(100) NOT NULL,
  `fb_link` varchar(100) NOT NULL,
  `profile_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `salt`, `fb_link`, `profile_img`) VALUES
(1, 'simonj10@rpi.edu', 'mEkCfJvwQpwPM', 'Jeremy', 'Simon', 'mEe80gGsofk.wOAWOgeH7', 'https://www.facebook.com/jeremy.simon.315', 'C:/xampp/htdocs/WebSys-Website/images/11221296_10206893829807016_6719728070922099471_n.jpg'),
(2, 'jasonk12@rpi.edu', '9WguwHrly/hjE', 'Jason', 'Kim', '9W6w6rX/0MVUp3rsuQQPI', 'https://www.facebook.com/simplejson', 'C:/xampp/htdocs/WebSys-Website/images/14224838_10210313342891663_2741232113746686469_n.jpg'),
(3, 'riversJ12@rpi.edu', 'CdrTrw.jdWNnk', 'Joanna', 'Rivers', 'Cd0Y1rEIwGCo1RO0twQZf', 'https://www.facebook.com/joanna.rivers', 'C:/xampp/htdocs/WebSys-Website/images/image-1.png'),
(4, 'fuuchsb2@rpi.edu', 'DExRRnG0wh3Ao', 'Ben', 'Fuuchs', 'DE5vyN19NY3Wi.P8Xs6G0', 'facebook.com/ben.fuuchs.34', 'C:/xampp/htdocs/WebSys-Website/images/image-3.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signups`
--
ALTER TABLE `signups`
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
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `signups`
--
ALTER TABLE `signups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
