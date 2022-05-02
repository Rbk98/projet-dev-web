-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le : lun. 02 mai 2022 à 07:39
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bookproject`
--

-- --------------------------------------------------------

--
-- Structure de la table `choice`
--

DROP TABLE IF EXISTS `choice`;
CREATE TABLE IF NOT EXISTS `choice` (
  `id_choice` int(10) NOT NULL,
  `id_next_story` int(10) NOT NULL,
  `id_previous_story` int(10) NOT NULL,
  `text` varchar(255) NOT NULL,
  PRIMARY KEY (`id_choice`,`id_next_story`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cover`
--

DROP TABLE IF EXISTS `cover`;
CREATE TABLE IF NOT EXISTS `cover` (
  `id_book` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `genre` varchar(255) NOT NULL,
  `writer` int(10) NOT NULL,
  `date` date NOT NULL,
  `nb_lives` int(10) NOT NULL,
  `nb_stories_max` int(10) NOT NULL,
  `nb_win` int(10) NOT NULL,
  `nb_reading` int(10) NOT NULL DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_book`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cover`
--

INSERT INTO `cover` (`id_book`, `title`, `summary`, `genre`, `writer`, `date`, `nb_lives`, `nb_stories_max`, `nb_win`, `nb_reading`, `image`, `status`) VALUES
(1, 'Tom Sawyer', 'Thomas Sawyer est un orphelin d\'âge indéterminé, qui ne pense qu\'à faire l\'école buissonnière, à s\'identifier aux personnages de ses romans préférés et à jouer des tours à ses camarades. ', 'Aventure', 1, '2022-04-03', 3, 4, 2, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `story`
--

DROP TABLE IF EXISTS `story`;
CREATE TABLE IF NOT EXISTS `story` (
  `id_story` int(10) NOT NULL,
  `id_cover` int(10) NOT NULL,
  `content` text NOT NULL,
  `nb_choices` int(10) NOT NULL,
  PRIMARY KEY (`id_story`,`id_cover`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(255) NOT NULL,
  `birth` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `role` int(5) DEFAULT '0',
  `nb_reading` int(10) DEFAULT '0',
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nickname`, `birth`, `password`, `mail`, `role`, `nb_reading`) VALUES
(1, 'rbk98', '1998-10-28', '$2y$10$tq.TY6DNqZAQ2G.o.XK/C.IyaOjkNR0NSkrveTy9YB9X84AJvKMHS', 'rebeccagnt@orange.fr', 0, 0),
(2, 'FKERL', '4444-04-24', '$2y$10$nq4h.teIswHaZhVf82HDIOHKAMOfBwmbAiZJrTg2bezROqDFUiQo.', 'rebeccagrenet1@gmail.com', 0, 0),
(3, 'rbk', '9321-12-29', '$2y$10$msJrtNDwH8Ry6RJ0009CLe7eiHyBPtdPKp9jNk6kbxu9wSNEIUbe2', 'rebeccagrenet1@gmail.com', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
