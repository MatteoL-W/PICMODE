-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 16 avr. 2022 à 15:36
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `php_imac_s2`
--

-- --------------------------------------------------------

--
-- Structure de la table `example`
--

DROP TABLE IF EXISTS `example`;
CREATE TABLE IF NOT EXISTS `example` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `example_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `example`
--

INSERT INTO `example` (`id`, `example_name`, `description`) VALUES
(2, 'test', 'testttttttttttttttt');

-- --------------------------------------------------------

--
-- Structure de la table `following`
--

DROP TABLE IF EXISTS `following`;
CREATE TABLE IF NOT EXISTS `following` (
  `idFollower` int(11) NOT NULL,
  `idFollowing` int(11) NOT NULL,
  KEY `idFollower` (`idFollower`),
  KEY `idFollowing` (`idFollowing`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `picture` text NOT NULL,
  `date` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `description`, `picture`, `date`) VALUES
(1, 'lalalala je suis la description', 'coucou je suis la photo', 'ma date est cool'),
(2, 'new description', 'new photo', 'date actuelle');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `mail_address` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `date_of_birth` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `profile_picture` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `mail_address`, `password`, `date_of_birth`, `name`, `firstname`, `profile_picture`) VALUES
(1, 'MiamMatt', 'matteo@gmail.com', 'OnePiece', '2001-10-09', 'matteo', 'leclerq', 'photo');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `following`
--
ALTER TABLE `following`
  ADD CONSTRAINT `following_ibfk_1` FOREIGN KEY (`idFollower`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `following_ibfk_2` FOREIGN KEY (`idFollowing`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
