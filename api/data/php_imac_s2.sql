-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 17 mai 2022 à 07:55
-- Version du serveur : 5.7.26
-- Version de PHP : 8.0.8

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
-- Structure de la table `clothing`
--

DROP TABLE IF EXISTS `clothing`;
CREATE TABLE IF NOT EXISTS `clothing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `url_shop` varchar(100) NOT NULL,
  `style` varchar(50) NOT NULL,
  `store` varchar(20) NOT NULL,
  `idTag` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idTag` (`idTag`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clothing`
--

INSERT INTO `clothing` (`id`, `type`, `color`, `url_shop`, `style`, `store`, `idTag`) VALUES
(4, 'jean mom oversize', 'bleu ciel', 'magasin.com', 'Alt y2k vintage', 'Le magasin', 1);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `idUser` int(11) NOT NULL,
  `idPost` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`),
  KEY `idPost` (`idPost`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contains`
--

DROP TABLE IF EXISTS `contains`;
CREATE TABLE IF NOT EXISTS `contains` (
  `idPost` int(11) NOT NULL,
  `idClothing` int(11) NOT NULL,
  KEY `idPost` (`idPost`),
  KEY `idClothing` (`idClothing`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Structure de la table `like`
--

DROP TABLE IF EXISTS `like`;
CREATE TABLE IF NOT EXISTS `like` (
  `idUser` int(11) NOT NULL,
  `idPost` int(11) NOT NULL,
  KEY `NomidUser` (`idUser`),
  KEY `NomidPost` (`idPost`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `picture` longtext NOT NULL,
  `date` date NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tag`
--

INSERT INTO `tag` (`id`, `name`) VALUES
(1, 'jean');

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
-- Contraintes pour la table `clothing`
--
ALTER TABLE `clothing`
  ADD CONSTRAINT `clothing_ibfk_1` FOREIGN KEY (`idTag`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`idPost`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `contains`
--
ALTER TABLE `contains`
  ADD CONSTRAINT `contains_ibfk_1` FOREIGN KEY (`idPost`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contains_ibfk_2` FOREIGN KEY (`idClothing`) REFERENCES `clothing` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `following`
--
ALTER TABLE `following`
  ADD CONSTRAINT `following_ibfk_1` FOREIGN KEY (`idFollower`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `following_ibfk_2` FOREIGN KEY (`idFollowing`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `like`
--
ALTER TABLE `like`
  ADD CONSTRAINT `like_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `like_ibfk_2` FOREIGN KEY (`idPost`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
