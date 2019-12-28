-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 20, 2018 at 07:46 PM
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
-- Table structure for table `minichat`
--

CREATE TABLE IF NOT EXISTS `minichat` (
  `ID` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `id_user` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `minichat`
--

INSERT INTO `minichat` (`ID`, `pseudo`, `message`, `id_user`) VALUES
(1, 'Aniss', 'Salut !', 0),
(2, 'Bernard', 'Comment tu vas Aniss ?', 0),
(3, 'Aniss', 'Plutôt bien', 0),
(4, 'Aniss', 'Tu sais comment va Pedro ?', 0),
(5, 'Pedro', 'Je vois que ça parle de moi par ici ', 0),
(6, 'Aniss', 'lol', 0),
(7, 'Aniss', 'lol', 0),
(8, 'Aniss', 'j''ai des soucis à l''exercice 2.2', 0),
(9, 'Pedro', 'Moi non-plus impossible de comprendre le résultat que retourne le js', 0),
(10, 'Aniss', 'oui moi aussi', 0),
(11, 'Aniss', 'j', 0),
(12, 'Aniss', 'jj', 0),
(13, 'Aniss', 'lol', 0),
(14, 'Aniss', '', 0),
(15, 'Aniss', 'lol', 0),
(16, 'Aniss', 'lol', 0),
(17, 'Aniss', 'lol', 0),
(18, 'Aniss', 'lol', 0),
(19, 'Aniss', 'a', 0),
(20, 'a', '', 0),
(21, 'Aniss', 'lol', 0),
(22, 'Aniss', 'a', 0),
(23, 'Aniss', 'lol', 0),
(24, 'Aniss', 'lol', 0),
(25, 'Aniss', 'lol', 0),
(26, 'Aniss', '', 0),
(27, 'Aniss', 'Bonjour', 0),
(28, 'Bernard', 'Je n''ai pas compris le dernier exercice', 0),
(29, 'Sangoku', 'Quelle méthode as-tu utilisé pour ton formulaire ?', 0),
(30, 'Bernard', 'La méthode POST', 0),
(31, 'Aniss', 'Vérifies dans fichier error logs', 0),
(32, 'Bernard', 'Merci', 0),
(33, 'Sangoku', 'J''ai un crash au niveau de mon code en JS', 0),
(34, 'Aniss', 'Tu n''as pas correctement initialisé ta variable tableau', 0),
(35, 'Sangoku ', 'C''est à dire ?', 0),
(36, 'Aniss', 'Il te manque les crochets', 0),
(39, 'Aniss', 'error', 0),
(40, 'Aniss', 'error', 0),
(41, 'Aniss', 'Salut Trump', 0),
(42, 'Aniss', 'Trump', 0),
(43, 'Aniss', 'Salut Trump', 0),
(44, 'Aniss', 'Trump', 0),
(45, 'Aniss', 'haha', 0),
(46, 'Aniss', 'hahaha', 0),
(47, 'Aniss', 'Trump', 0),
(48, 'Aniss', 'trump', 0),
(49, 'Aniss', 'héhé', 0),
(50, 'Aniss', 'javascript', 0),
(51, 'Aniss', 'trump', 0),
(52, 'Aniss', 'php/mysql', 0),
(53, 'Aniss', 'constructeur', 0),
(54, 'Sangoku', 'ça va être dur l''appel ', 0),
(55, 'Bernard', 'J''utilise MySQLi pour appeler la procédure stockée', 0),
(56, 'Aniss', 'Il faut penser à fermer la connexion à la base de données', 0),
(57, 'Aniss', '...', 0),
(58, 'Sangoku', 'lol', 0),
(59, 'Aniss', 'mdrrrr', 0),
(60, 'Sangoku', 'ça bug', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `minichat`
--
ALTER TABLE `minichat`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_user` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `minichat`
--
ALTER TABLE `minichat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
