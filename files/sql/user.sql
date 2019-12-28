-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 10, 2018 at 03:22 PM
-- Server version: 5.5.49-log
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exo`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(255) NOT NULL,
  `pseudo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `idpublic` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `mail`, `password`, `idpublic`) VALUES
(12, 'Aniss', 'anissaallou36@gmail.com', '$2a$10$1qAz2wSx3eDc4rFv5tGb5eT7xjLRwnmea2bUS/K0WGldaQ6a/d0lW', '5aaed8d2bdcc0'),
(13, 'Bernard', 'bernard36@gmail.com', '$2a$10$1qAz2wSx3eDc4rFv5tGb5eT3wf9x5IkMdih7d.P/S/rdCojD2pzCm', '5aaed98b9672b'),
(14, 'Sangoku', 'sangoku@ggmail.com', '$2a$10$1qAz2wSx3eDc4rFv5tGb5e2Zr6U2fdVCk5eEeqVjTNEZBpcvOEe7C', '5ab41d3f2be6e'),
(15, 'Lol', 'lol@gmail.com', '$2a$10$1qAz2wSx3eDc4rFv5tGb5eKlOEANnVlwh3jtBPpTebweC9XwTT.m2', '5b6ab1a1f1d80'),
(16, 'Toto', 'lol@lol.com', '$2a$10$1qAz2wSx3eDc4rFv5tGb5e710sjfeRr4ev6CHPs3fRIdnFWJNrPZC', '5b6ab1d102f29'),
(18, 'Toto', 'lol@gmail.com', '$2a$10$1qAz2wSx3eDc4rFv5tGb5e710sjfeRr4ev6CHPs3fRIdnFWJNrPZC', '5b6ab3171c1c3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
