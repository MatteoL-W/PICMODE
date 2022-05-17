-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 10 mai 2022 à 08:11
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

--
-- Contraintes pour la table `clothing`
--
ALTER TABLE `clothing`
  ADD CONSTRAINT `clothing_ibfk_1` FOREIGN KEY (`idTag`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `contains`
--
ALTER TABLE `contains`
  ADD CONSTRAINT `contains_ibfk_1` FOREIGN KEY (`idPost`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contains_ibfk_2` FOREIGN KEY (`idClothing`) REFERENCES `clothing` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
