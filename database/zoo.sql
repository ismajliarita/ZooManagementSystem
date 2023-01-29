-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2023 at 09:18 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
  `habitat` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL,
  `age` int(4) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `habitat`, `name`, `type`, `age`, `description`) VALUES
(1, 'Forest', 'Grizzie', 'Grizzly Bear', 9, 'Strongest, most powerful animal since the extintion of dinosaurs. The sheer power of a female bear wildly overshadows the power of John Cena. The strength of a grizzly bear is incredibly powerful compared to humans. A grizzly can lift up to 1500 pounds and can reach speeds of up to 30 miles per hour. It also has powerful jaws and sharp claws that can crush bones and tear flesh. Its bite force is estimated to be around 1,200 pounds per square inch, making it one of the most powerful predators in the animal kingdom. Comparatively, the bite force of a human is only around 200 pounds per square inch, making it miniscule in comparison. Its muscular limbs ensure it can run up to 30 miles per hour, making it extremely fast and agile. The strength of a grizzly bear is no joke; it is a force to be reckoned with. Grizzly bear fortitudine est incredibilis. Eorum corpore robusto et dentibus acutis, sunt animalia formidolosa et terribilia. Adversarii eorum causam desperant, quia ursi habent robur incredibile et ad resistendum sunt paratissimi. In lucta, ursi sunt proficui et non cedunt facile. Eorum corpore robusto et dentibus acutis, sunt animalia formidolosa et terribilia. Adversarii eorum causam desperant, quia ursi habent robur incredibile et ad resistendum sunt paratissimi. In lucta, ursi sunt proficui et non cedunt facile. Eorum corpore robusto et dentibus acutis, sunt animalia formidolosa et terribilia. Adversarii eorum causam desperant, quia ursi habent robur incredibile et ad resistendum sunt paratissimi. In lucta, ursi sunt proficui et non cedunt facile. Eorum corpore robusto et dentibus acutis, sunt animalia formidolosa et terribilia. Adversarii eorum causam desperant, quia ursi habent robur incredibile et ad resistendum sunt paratissimi. In lucta, ursi sunt proficui et non cedunt facile.'),
(2, 'Ocean', 'Nemo', 'Ocellaris Clownfish', 2, 'Nemo is placed in an aquarium in the office of dentist Philip Sherman in Sydney. He meets the \"Tank Gang\" led by Gill, a Moorish idol. The Tank Gang tell Nemo that he is to be given to Sherman\'s niece Darla, who killed her previous fish. Gill decides to help Nemo and devises an escape plan: Nemo can fit inside the aquarium\'s filter tube and must block it with a pebble, obliging Sherman to put the fish into plastic bags while he cleans the tank, and allow them to roll out the window and into the harbor. Nemo attempts to place the pebble, but fails and is almost killed. \r\n\r\nMarlin and Dory awaken, but the mask falls into a deep trench. Descending after the mask, they are soon pursued by an anglerfish. Dory memorizes the address on the goggles and they escape. The two disregard directions from a school of moonfish, taking what Marlin believes is a safer route. After being stung by a forest of jellyfish, they are knocked unconscious and awaken in the East Australian Current with a group of sea turtles, including Crush and his son, Squirt. The story of Marlin\'s quest is relayed across the ocean to Sydney, where a pelican named Nigel tells the Tank Gang. Nemo then succeeds in blocking the filter and soon the aquarium is covered in green algae.'),
(3, 'Jungle', 'Mufasa', 'Lion', 56, 'Mufasa was born the first son of Ahadi and Uru, in Pride Rock, the eldest brother of Askari, and as the heir to the throne of Pride Rock, while his younger brother served as the leader of the Lion Guard. When the two were adolescents, Askari returned to Pride Rock after a solo patrol in the Outlands. He informed Mufasa of his victory over a rogue lion’s attempt to take over the Pride Lands. In response, Mufasa playfully nicknamed him \"Scar,\" after the facial wound he had received from the incident. However, Scar became increasingly jealous of his brother’s position, partially due to the venom from his wound, and tries to overthrow him by using his roar, but ends up losing it for doing such.'),
(4, 'Arctic', 'Happy Feet', 'Penguin', 2, 'Penguins are highly social birds, living in large colonies of up to several thousand individuals. Most species of penguin live in the Southern Hemisphere and are native to countries such as New Zealand, Chile, Argentina, and Antarctica. Penguins are uniquely adapted to the cold temperatures of their habitats. They have thick coats of feathers and a layer of fat that helps to insulate their bodies. Penguins are incredibly efficient swimmers, able to reach speeds of up to 15 miles per hour! Penguins are also excellent divers, able to dive up to 200 meters deep in search of food. Penguins have a unique way of communicating with one another. They use a variety of vocalizations, body language, and postures to express themselves.'),
(5, 'Desert', 'Aladin', 'Meerkat', 260, 'The meerkat or suricate is a small mongoose found in southern Africa. It is characterised by a broad head, large eyes, a pointed snout, long legs, a thin tapering tail, and a brindled coat pattern. The head-and-body length is around 24–35 cm, and the weight is typically between 0.62 and 0.97 kg.'),
(7, 'Ocean', 'a', 'a', 2, 'a'),
(8, 'Jungle', 'assd', 'asss', 2, '12ewdasd'),
(9, 'Jungle', 'adasd', 'asdasd', 2, 'asdasd'),
(10, 'Jungle', 'adasd', 'asdasd', 2, 'asdasd'),
(11, 'Jungle', 'adasd', 'asdasd', 2, 'asdasd'),
(12, 'Jungle', 'adasd', 'asdasd', 2, 'asdasd'),
(13, 'Jungle', 'adasd', 'asdasd', 2, 'asdasd'),
(14, 'Jungle', 'adasd', 'asdasd', 2, 'asdasd'),
(15, 'Jungle', 'adasd', 'asdasd', 2, 'asdasd'),
(16, 'Jungle', 'adasd', 'asdasd', 2, 'asdasd'),
(17, 'Jungle', 'adasd', 'asdasd', 2, 'asdasd'),
(18, 'Jungle', 'adasd', 'asdasd', 2, 'asdasd'),
(19, 'Jungle', 'adasd', 'asdasd', 2, 'asdasd'),
(20, 'Jungle', 'adasd', 'asdasd', 2, 'asdasd'),
(21, 'Jungle', 'adasd', 'asdasd', 2, 'asdasd'),
(22, 'Jungle', 'adasd', 'asdasd', 2, 'asdasd'),
(23, 'Jungle', 'adasd', 'asdasd', 2, 'asdasd'),
(24, 'Jungle', 'adasd', 'asdasd', 2, 'asdasd'),
(25, 'Jungle', 'adasd', 'asdasd', 2, 'asdasd'),
(26, 'Jungle', 'adasd', 'asdasd', 2, 'asdasd'),
(27, 'Jungle', 'adasd', 'asdasd', 2, 'asdasd'),
(28, 'Jungle', 'adasd', 'asdasd', 2, 'asdasd'),
(29, 'Jungle', 'Manny', 'Panda', 12, 'Panda anda manda benanda'),
(30, 'Jungle', 'Manny', 'Panda', 12, 'Panda anda manda benanda'),
(31, 'Forest', 'Jake', 'Grizzly Bear', 5555, 'YESYESYEYSEYSEYSEYSEYSEYSEYSEY'),
(32, 'Jungle', 'gjingellbell', 'Meerkat', 6, 'vdsdhfg ds fsd ');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  `animal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
