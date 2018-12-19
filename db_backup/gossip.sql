-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2018 at 09:41 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gossip`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `uploaded_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `title`, `article`, `uploaded_at`, `created_at`) VALUES
(1, 5, 'Testing', 'This is anther test hope that  it will work', '2018-08-29 20:36:07', '2018-08-29 20:36:07'),
(2, 6, 'Hello this is Slava', 'This is slava', '2018-08-29 20:37:27', '2018-08-29 20:37:27'),
(3, 7, 'Hafello everyone', 'HAFFFFFFF i like to play all day & all night', '2018-08-29 20:41:00', '2018-08-29 20:41:00'),
(4, 5, 'what the damn hell', 'what the damn hell what the damn hell what the damn hellwhat the damn hellwhat the damn hell', '2018-08-29 22:07:03', '2018-08-29 22:07:03'),
(5, 5, 'bla bla', 'vbla bla vbla bla bla bla bla bla bla bla vbla bla bla bla bla bla bla bla vbla bla bla bla bla bla bla bla vbla bla bla bla bla bla bla bla vbla bla bla bla bla bla bla bla vbla bla bla bla bla bla bla bla vbla bla bla bla bla bla bla bla vbla bla bla bla bla bla bla bla vbla bla bla bla bla bla', '2018-08-29 22:08:30', '2018-08-29 22:08:30'),
(6, 7, 'haf haf', 'haf hafhaf hafhaf hafhaf hafhaf hafhaf hafhaf hafhaf hafhaf hafhaf hafhaf hafhaf hafhaf hafhaf hafhaf hafhaf hafhaf hafhaf hafhaf hafhaf haf', '2018-08-29 22:12:58', '2018-08-29 22:12:58'),
(7, 8, 'holyyyyy mother of god', 'dfjwdfjqw\'dfjpodwjfpoqwjkfpoqewfoqewpjfpqwejfpwef', '2018-08-29 22:16:49', '2018-08-29 22:16:49');

-- --------------------------------------------------------

--
-- Table structure for table `profile_image`
--

CREATE TABLE `profile_image` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile_image`
--

INSERT INTO `profile_image` (`id`, `user_id`, `file_name`) VALUES
(1, 5, '2018.08.29.19.34.09-or.png'),
(2, 6, 'default_img.png'),
(3, 7, '2018.08.29.19.40.02-dog.jpg'),
(4, 8, '2018.08.29.21.16.08-roger.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, '\'-\'', '\'-\'', '\'-\''),
(2, '\'--\'', '\'--\'', '\'--\''),
(3, '\'_\'', '\'_\'', '\'_\''),
(4, '\'__\'', '\'__\'', '\'__\''),
(5, 'Or Gal', 'or@gmail.com', '$2y$10$mYX6gTABZ0RuanO.AVAevui6CzJYgqggYh4Uu5vUdGAshnNX6BYQi'),
(6, 'Slava vinish', 'slava@gmail.com', '$2y$10$3N1colSxthxfm/893FByAOznJAwuKnryAJ2Jpa7tcawTahQEppKni'),
(7, 'Joe', 'joe@gmail.com', '$2y$10$rqs1AtFp0pLmXFKEAM8xSuOTKjZ/mmuQi7a.SynJ5ADmmoUnPTG56'),
(8, 'roger', 'roger@gmail.com', '$2y$10$XrJ2RmBERwxMEDCtJS7bPuxQ6EQNd4IbTDGEbo9fyaHKHm19uZNuu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `post` ADD FULLTEXT KEY `article` (`article`);

--
-- Indexes for table `profile_image`
--
ALTER TABLE `profile_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `profile_image`
--
ALTER TABLE `profile_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
