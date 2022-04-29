-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le : ven. 29 avr. 2022 à 16:27
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
CREATE DATABASE IF NOT EXISTS `bookproject` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bookproject`;

-- --------------------------------------------------------

--
-- Structure de la table `choice`
--

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

CREATE TABLE IF NOT EXISTS `cover` (
  `id_book` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `genre` varchar(255) NOT NULL,
  `writter` int(10) NOT NULL,
  `date` date NOT NULL,
  `nb_lives` int(10) NOT NULL,
  `nb_stories_max` int(10) NOT NULL,
  `nb_win` int(10) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_book`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `story`
--

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

CREATE TABLE IF NOT EXISTS `user` (
  `nickname` varchar(255) NOT NULL,
  `birth` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `role` int(5) DEFAULT '0',
  `nb_reading` int(10) DEFAULT '0',
  PRIMARY KEY (`nickname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
