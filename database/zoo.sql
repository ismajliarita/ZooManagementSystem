-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2023 at 10:42 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zoo`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `description` text NOT NULL,
  `habitat` varchar(20) NOT NULL,
  `vet_help` int(11) NOT NULL,
  `food_time` varchar(25) NOT NULL,
  `water_time` varchar(25) NOT NULL,
  `clean_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `name`, `type`, `age`, `description`, `habitat`, `vet_help`, `food_time`, `water_time`, `clean_time`) VALUES
(17, 'Shimpanze', 'tiger', 20, 'haha bro t shtina me kesh a hahah', 'Desert', 1, '2023-01-30 20:09:51', '2023-01-30 22:39:39', 0),
(18, 'Leart', 'Tiger', 21, 'haha bro t shtina me kesh a ahaha haha hahah  haah', 'Arctic', 0, '2023-01-30 20:14:51', '2023-01-30 22:39:41', 1),
(19, 'Leart', 'tiger', 20, 'haha bro t shtina me kesh a hahah', 'Arctic', 1, '2023-01-30 20:14:47', '', 1),
(20, 'Leart', 'tiger', 20, 'haha bro t shtina me kesh a hahah', 'Arctic', 0, '2023-01-30 20:14:53', '', 0),
(21, 'Leart', 'tiger', 20, 'haha bro t shtina me kesh a hahah', 'Jungle', 0, '', '', 0),
(22, 'Leart', 'tiger', 20, 'haha bro t shtina me kesh a hahah', 'Ocean', 0, '2023-01-30 20:16:09', '2023-01-30 20:16:33', 0),
(23, 'Leart', 'tiger', 20, 'haha bro t shtina me kesh a hahah', 'Desert', 0, '', '', 0),
(24, 'Leart', 'tiger', 20, 'haha bro t shtina me kesh a hahah', 'Forest', 0, '', '', 0),
(25, 'Leart', 'tiger', 20, 'haha bro t shtina me kesh a hahah', 'Arctic', 0, '', '', 0),
(26, 'Leart', 'tiger', 20, 'haha bro t shtina me kesh a hahah', 'Arctic', 0, '', '', 0),
(27, 'Leart', 'tiger', 20, 'haha bro t shtina me kesh a hahah', 'Jungle', 0, '', '', 0),
(28, 'Leart', 'tiger', 20, 'haha bro t shtina me kesh a hahah', 'Ocean', 0, '2023-01-30 20:21:05', '2023-01-30 20:16:38', 0),
(29, 'Leart', 'tiger', 20, 'haha bro t shtina me kesh a hahah', 'Desert', 0, '', '', 0),
(30, 'Leart', 'tiger', 20, 'haha bro t shtina me kesh a hahah', 'Forest', 0, '', '', 0),
(31, 'Leart', 'tiger', 20, 'haha bro t shtina me kesh a hahah', 'Arctic', 0, '', '', 0),
(35, 'Edon', 'Njeri', 20, 'asdf sdfs dfsadf ', 'Arctic', 0, '', '', 0),
(37, 'Tringa', 'Zebra', 19, 'Tringa flet andaj han mut', 'Jungle', 0, '', '', 0),
(38, 'Edon', 'Njeri', 19, 'sdfp', 'Arctic', 0, '', '', 0),
(39, 'Tringa', 'Zebra', 19, 'Tringa flet andaj han mut', 'Jungle', 0, '', '', 0),
(43, 'sdfs', 'Lion', 34, 'sdfsdfa sdf sdf sd fsd fsf d', 'Jungle', 0, '', '', 0),
(44, 'Edon', 'Lion', 19, 'sadfasdf', 'Jungle', 0, '', '', 0),
(46, 'sdf', 'Lion', 9, 'sdfa sd fs', 'Arctic', 0, '', '', 0),
(47, 'Edon', 'Kali', 19, 'sdfsdfsdaf sdf sdf s', 'Arctic', 0, '', '', 0),
(48, 'Gent', 'Penguin', 19, 'Me fjale nuk munesh me pershkru dicka qe nuk pershkruhet', 'Arctic', 0, '', '', 0),
(49, 'Lola', 'Dog', 2, 'Lola is aritas dog', 'Forest', 0, '', '', 0),
(50, 'Lola', 'Dog', 2, 'Lola is aritas dog', 'Forest', 0, '', '', 0),
(51, 'Lola', 'Dog', 2, 'Lola is aritas dog', 'Forest', 0, '', '', 0),
(52, 'e', 'e', 4, 'fsdf', 'Forest', 0, '', '', 0),
(53, 'ssd', 'dsf', 2, 'sdfsd', 'Ocean', 0, '', '', 0),
(54, 'Edon', 'Rama', 7, 'Edon Ramadani', 'Ocean', 0, '', '', 0),
(55, 'Edon', 'Rama', 4, 'ajdjsfsh', 'Ocean', 0, '', '', 0),
(56, 'Edon', 'Lion', 9, 'sdjfskdjf dfshdk ', 'Forest', 0, '', '', 0),
(57, 'Edon', 'Lion', 9, 'sdjfskdjf dfshdk ', 'Forest', 0, '', '', 0),
(58, 'sd ', 'sdf ', 9, 'dsdd', 'Ocean', 1, '2023-01-30 20:16:46', '2023-01-30 20:16:47', 0),
(60, 'Pluto', 'Dog', 9, 'Plutoooooooooo', 'Arctic', 0, '', '', 0),
(61, 'Edon', 'Dog', 9, 'heu', 'Jungle', 0, '', '', 0),
(62, 'Ylber', 'Njeri', 19, 'Cimeri Edonit', 'Ocean', 0, '', '', 0),
(63, 'Arbnor', 'Njeri', 19, 'Nje cimer ', 'Arctic', 0, '', '', 0),
(64, 'E', 'd', 3, 'dfsdfa', 'Ocean', 0, '', '', 0),
(65, 'Edon', 'Njeri', 19, 'Edon Ramadani nga gjilani', 'Arctic', 0, '', '', 0),
(66, 'Edon', 'rama', 6, 'sdf asflajsd lfkasdj lfas', 'Jungle', 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  `animal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `url`, `animal_id`) VALUES
(13, './../images/festive.png', 29),
(14, './../images/main.png', 29),
(15, './../images/festive.png', 30),
(16, './../images/main.png', 30),
(17, './../images/nature_fantasy.png', 31),
(18, './../images/space_creature.png', 31),
(19, './../images/nature_fantasy.png', 32),
(20, './../images/wallpaper_cliff.png', 32);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `user_id` int(20) NOT NULL,
  `adults` int(3) NOT NULL DEFAULT 1,
  `children` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`user_id`, `adults`, `children`) VALUES
(28, 1, 0),
(40, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `fname` varchar(12) NOT NULL,
  `lname` varchar(12) NOT NULL,
  `email` varchar(25) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `power` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `pass`, `power`) VALUES
(1, 'test', '123', 'test@a', '321', 'User'),
(25, 'Arbnor', 'Rama', 'arama@york.citycollege.eu', 'berravo', 'User'),
(26, 'Arbnor', 'Ramabaja', 'rama@york', '123', 'User'),
(27, 'Ilber', 'Galika', 'galica.ylber@gmail.com', 'majmun', 'User'),
(28, 'Jake', 'Blake', 'jake@gmail.com', 'jaketheking', 'User'),
(29, 'Mathew', 'Anastasias', 'math@gmail.com', 'athens123', 'User'),
(40, 'admin', 'admin', 'admin@admin', 'admin', 'Admin'),
(44, 'Edon', 'Ramdi', 'ramdi@gamil', '123', 'User'),
(46, 'Matilda', 'Bonski', 'matski@gmail.com', 'bonski123', 'Helper'),
(48, 'Tringa ', 'Rexhepaj', 'trina@enail', 'tringa', 'Helper'),
(49, 'Arita', 'Ismajli', 'arita@gmail.com', 'aritamaemira', 'Admin'),
(50, 'Daniel', 'Mickins', 'daniel@hotmail.com', '123', 'Helper'),
(59, '123', '123', '21!@1', '123', 'Admin'),
(60, '123', '123', '123@123', '123', 'Helper');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `user_id` int(12) NOT NULL,
  `animal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
