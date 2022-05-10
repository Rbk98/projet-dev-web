-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le : mar. 10 mai 2022 à 16:48
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
-- Structure de la table `chapter`
--

DROP TABLE IF EXISTS `chapter`;
CREATE TABLE IF NOT EXISTS `chapter` (
  `id_chapter` int(10) NOT NULL,
  `id_cover` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `nb_choices` int(10) NOT NULL,
  PRIMARY KEY (`id_chapter`,`id_cover`),
  KEY `id_cover` (`id_cover`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déclencheurs `chapter`
--
DROP TRIGGER IF EXISTS `before_delete_chapter`;
DELIMITER $$
CREATE TRIGGER `before_delete_chapter` BEFORE DELETE ON `chapter` FOR EACH ROW BEGIN DELETE 
FROM choice 
WHERE id_current_chapter = OLD.id_chapter;
DELETE FROM reading
WHERE id_chapter = OLD.id_chapter;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `choice`
--

DROP TABLE IF EXISTS `choice`;
CREATE TABLE IF NOT EXISTS `choice` (
  `id_choice` int(10) NOT NULL,
  `id_next_chapter` int(10) NOT NULL,
  `id_current_chapter` int(10) NOT NULL,
  `id_cover` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `unsafe` tinyint(1) DEFAULT '0',
  `end_cover` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_choice`,`id_next_chapter`,`id_current_chapter`) USING BTREE,
  KEY `cover` (`id_cover`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cover`
--

DROP TABLE IF EXISTS `cover`;
CREATE TABLE IF NOT EXISTS `cover` (
  `id_cover` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `genre` varchar(255) NOT NULL,
  `writer` int(10) NOT NULL,
  `date` date NOT NULL,
  `nb_lives` int(10) NOT NULL,
  `nb_chapters_max` int(10) NOT NULL,
  `nb_win` int(10) NOT NULL,
  `nb_reading` int(10) NOT NULL DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_cover`),
  KEY `writer` (`writer`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cover`
--

INSERT INTO `cover` (`id_cover`, `title`, `summary`, `genre`, `writer`, `date`, `nb_lives`, `nb_chapters_max`, `nb_win`, `nb_reading`, `image`, `status`) VALUES
(1, 'Tom Sawyer', 'Thomas Sawyer est un orphelin d\'âge indéterminé, qui ne pense qu\'à faire l\'école buissonnière, à s\'identifier aux personnages de ses romans préférés et à jouer des tours à ses camarades. ', 'Aventure', 1, '2022-04-03', 3, 4, 2, 0, NULL, 1),
(2, 'Saw', 'Deux hommes se réveillent enchaînés au mur d\'une salle de bains. Ils ignorent où ils sont et ne se connaissent pas. Ils savent juste que l\'un doit absolument tuer l\'autre, sinon dans moins de huit heures, ils seront exécutés tous les deux. Voici l\'une des situations imaginées par un machiavélique maître criminel qui impose à ses victimes des choix auxquels personne ne souhaite jamais être confronté un jour. Un détective est chargé de l\'enquête.', 'Thriller', 1, '2017-12-03', 5, 4, 2, 22, NULL, 1),
(3, 'Le tombeau des Luciolles', 'Japon, été 1945. Après le bombardement de Kobé, Seita, un adolescent de quatorze ans et sa petite sœur de quatre ans, Setsuko, orphelins, vont s\'installer chez leur tante à quelques dizaines de kilomètres de chez eux. Celle-ci leur fait comprendre qu\'ils sont une gêne pour la famille et doivent mériter leur riz quotidien. Seita décide de partir avec sa petite sœur. Ils se réfugient dans un bunker désaffecté en pleine campagne et vivent des jours heureux illuminés par la présence de milliers de lucioles. Mais bientôt la nourriture commence cruellement à manquer.', 'Drame', 1, '1988-04-16', 3, 3, 2, 38, NULL, 2),
(4, 'Astérix et Cléopatra', 'L\'histoire se passe en 50 avant Jésus-Christ. Toute la Gaule est occupée par les Romains, sauf un village d\'Armorique... C\'est le village d\'Astérix et Obélix. Leur druide, Panoramix, fabrique une potion magique qui les rend invincibles.', 'Comédie', 1, '2014-09-03', 3, 2, 6, 42, NULL, 2),
(5, 'Le cercle des poètes disparus', 'Todd Anderson, un garçon plutôt timide, est envoyé dans la prestigieuse académie de Welton, réputée pour être l\'une des plus fermées et austères des États-Unis, là où son frère avait connu de brillantes études. C\'est dans cette université qu\'il va faire la rencontre d\'un professeur de lettres anglaises plutôt étrange, Mr Keating, qui les encourage à toujours refuser l\'ordre établi. Les cours de Mr Keating vont bouleverser la vie de l\'étudiant réservé et de ses amis', 'Drame', 1, '1989-10-06', 3, 5, 12, 64, NULL, 2);

--
-- Déclencheurs `cover`
--
DROP TRIGGER IF EXISTS `before_delete_cover`;
DELIMITER $$
CREATE TRIGGER `before_delete_cover` BEFORE DELETE ON `cover` FOR EACH ROW BEGIN DELETE 
FROM chapter 
WHERE id_cover = OLD.id_cover;
DELETE FROM reading
WHERE id_cover = OLD.id_cover;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `reading`
--

DROP TABLE IF EXISTS `reading`;
CREATE TABLE IF NOT EXISTS `reading` (
  `id_user` int(10) NOT NULL,
  `id_cover` int(10) NOT NULL,
  `id_chapter` int(10) NOT NULL,
  `id_choice` int(10) NOT NULL,
  `nb_lives` int(11) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user`,`id_cover`,`id_choice`,`id_chapter`) USING BTREE,
  KEY `cover_reading` (`id_cover`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `birth` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `role` int(5) DEFAULT '0',
  `nb_reading` int(10) DEFAULT '0',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nickname`, `birth`, `password`, `mail`, `role`, `nb_reading`) VALUES
(1, 'rbk', '1998-10-28', '$2y$10$WX8b1V168kQEuxP5VmE4hOvPVVMiHKifo0J212Hvxayj2mstOZz/O', 'rgrenet@ensc.fr', 1, 5),
(2, 'correcteur', '1990-10-20', '$2y$10$vtA29soLtAW1Dyt2ptod7elIEMWAbSuyilKY1y3tNW8F1QDhMnNDy', 'correcteur@ensc.fr', 0, 0),
(3, 'correcteur_admin', '1990-10-20', '$2y$10$WkleDaQhqZzYdmbIvZJS2.Da4a77t30FBxfQMTlyXOdfLaFnKP6Tm', 'correcteur_admin@ensc.fr', 1, 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chapter`
--
ALTER TABLE `chapter`
  ADD CONSTRAINT `id_cover` FOREIGN KEY (`id_cover`) REFERENCES `cover` (`id_cover`);

--
-- Contraintes pour la table `choice`
--
ALTER TABLE `choice`
  ADD CONSTRAINT `cover` FOREIGN KEY (`id_cover`) REFERENCES `cover` (`id_cover`);

--
-- Contraintes pour la table `cover`
--
ALTER TABLE `cover`
  ADD CONSTRAINT `writer` FOREIGN KEY (`writer`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `reading`
--
ALTER TABLE `reading`
  ADD CONSTRAINT `cover_reading` FOREIGN KEY (`id_cover`) REFERENCES `cover` (`id_cover`),
  ADD CONSTRAINT `user_reading` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
