-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 26, 2020 at 02:02 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `deussearch`
--
CREATE DATABASE IF NOT EXISTS `deussearch` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `deussearch`;

-- --------------------------------------------------------

--
-- Table structure for table `ponderation_genres`
--

CREATE TABLE `ponderation_genres` (
  `id` tinyint(4) NOT NULL,
  `name_genre` varchar(255) NOT NULL,
  `id_igdb` tinyint(4) NOT NULL,
  `nouveaute` tinyint(4) NOT NULL,
  `challenge` tinyint(4) NOT NULL,
  `stimulation` tinyint(4) NOT NULL,
  `harmonie` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ponderation_genres`
--

INSERT INTO `ponderation_genres` (`id`, `name_genre`, `id_igdb`, `nouveaute`, `challenge`, `stimulation`, `harmonie`) VALUES
(1, 'Fighting', 4, 0, 4, 1, 0),
(2, 'Shooter', 5, 1, 4, 3, 2),
(3, 'Racing', 10, 1, 3, 1, 0),
(4, 'Arcade', 33, 1, 3, 1, 0),
(5, 'Tactical', 24, 2, 3, 2, 1),
(6, 'Real Time strategy', 11, 3, 4, 1, 3),
(7, 'Strategy', 15, 2, 4, 1, 1),
(8, 'MOBA', 33, 2, 3, 3, 4),
(9, 'Hack & Slash', 25, 3, 2, 2, 1),
(10, 'RPG', 12, 4, 1, 1, 3),
(11, 'Adventure', 31, 4, 1, 2, 0),
(12, 'PLatform', 8, 3, 3, 0, 0),
(13, 'Simulator', 13, 0, 1, 0, 1),
(14, 'Quiz/triva', 26, 1, 2, 4, 0),
(15, 'Puzzle ', 9, 3, 2, 1, 0),
(16, 'Point n click', 2, 4, 1, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ponderation_genres`
--
ALTER TABLE `ponderation_genres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ponderation_genres`
--
ALTER TABLE `ponderation_genres`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
