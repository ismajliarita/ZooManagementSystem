-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2023 at 08:36 PM
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
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `description` text NOT NULL,
  `habitat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `name`, `type`, `age`, `description`, `habitat`) VALUES
(9, 'Tom', 'Cat', 67, 'Tom hate Jerry', 'Ocean'),
(10, 'Delfi', 'Delfin', 45, 'Delfin delfi', 'Ocean'),
(11, 'Foki', 'Foka', 78, 'Foka nifar foki si malazez', 'Arctic'),
(12, 'Pumi', 'Puma', 76, 'Puma eshte pumi ', 'Jungle'),
(13, 'Leart', 'tiger', 20, 'haha bro t shtina me kesh a hahah', 'Arctic'),
(14, 'Edon', 'drenushe', 20, 'haha bro t shtina me kesh a hahah', 'Arctic'),
(15, 'Uran', 'panda', 20, 'haha bro t shtina me kesh a hahah', 'Jungle'),
(16, 'Florian', 'tiger', 20, 'haha bro t shtina me kesh a hahah', 'Ocean'),
(17, 'Shimpanze', 'tiger', 20, 'haha bro t shtina me kesh a hahah', 'Desert'),
(18, 'Leart', 'tiger', 20, 'haha bro t shtina me kesh a hahah', 'Forest'),
(19, 'Leart', 'tiger', 20, 'haha bro t shtina me kesh a hahah', 'Arctic'),
(20, 'Leart', 'tiger', 20, 'haha bro t shtina me kesh a hahah', 'Arctic'),
(21, 'Leart', 'tiger', 20, 'haha bro t shtina me kesh a hahah', 'Jungle'),
(22, 'Leart', 'tiger', 20, 'haha bro t shtina me kesh a hahah', 'Ocean'),
(23, 'Leart', 'tiger', 20, 'haha bro t shtina me kesh a hahah', 'Desert'),
(24, 'Leart', 'tiger', 20, 'haha bro t shtina me kesh a hahah', 'Forest'),
(25, 'Leart', 'tiger', 20, 'haha bro t shtina me kesh a hahah', 'Arctic'),
(26, 'Leart', 'tiger', 20, 'haha bro t shtina me kesh a hahah', 'Arctic'),
(27, 'Leart', 'tiger', 20, 'haha bro t shtina me kesh a hahah', 'Jungle'),
(28, 'Leart', 'tiger', 20, 'haha bro t shtina me kesh a hahah', 'Ocean'),
(29, 'Leart', 'tiger', 20, 'haha bro t shtina me kesh a hahah', 'Desert'),
(30, 'Leart', 'tiger', 20, 'haha bro t shtina me kesh a hahah', 'Forest'),
(31, 'Leart', 'tiger', 20, 'haha bro t shtina me kesh a hahah', 'Arctic'),
(32, 'Edon', 'Kali', 19, 'asdfsdfsadf sdf sadf asdf ', 'Forest'),
(34, 'Edon', 'Kali', 19, 'asdfsdfsadf sdf sadf asdf ', 'Forest'),
(35, 'Edon', 'Njeri', 20, 'asdf sdfs dfsadf ', 'Arctic'),
(36, 'Tringa', 'Zebra', 19, 'Tringa flet andaj han mut', 'Jungle'),
(37, 'Tringa', 'Zebra', 19, 'Tringa flet andaj han mut', 'Jungle'),
(38, 'Edon', 'Njeri', 19, 'sdfp', 'Arctic'),
(39, 'Tringa', 'Zebra', 19, 'Tringa flet andaj han mut', 'Jungle'),
(40, 'Tringa', 'Zebra', 19, 'Tringa flet andaj han mut', 'Jungle'),
(41, 'Ylber', 'Njeri', 19, 'sdfasdf sdf sd', 'Desert'),
(42, 'Arita', 'Mbinjeri', 19, 'popojojo', 'Forest'),
(43, 'sdfs', 'Lion', 34, 'sdfsdfa sdf sdf sd fsd fsf d', 'Jungle'),
(44, 'Edon', 'Lion', 19, 'sadfasdf', 'Jungle'),
(45, 'Edon', '', 19, 'sdsafs f sd s', 'Arctic'),
(46, 'sdf', 'Lion', 9, 'sdfa sd fs', 'Arctic');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  `animal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(50, 'Daniel', 'Mickins', 'daniel@hotmail.com', '123', 'Helper');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
