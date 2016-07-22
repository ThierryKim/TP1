-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 21 Juillet 2016 à 12:34
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `tp1`
--

-- --------------------------------------------------------

--
-- Structure de la table `liste_messages`
--

CREATE TABLE IF NOT EXISTS `liste_messages` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `id_topic` int(11) NOT NULL,
  `message` varchar(2000) NOT NULL,
  `auteur` varchar(50) NOT NULL,
  `date_post` date NOT NULL,
  `url_img` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_message`),
  KEY `id_topic` (`id_topic`),
  KEY `id_topic_2` (`id_topic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `liste_topics`
--

CREATE TABLE IF NOT EXISTS `liste_topics` (
  `id_topic` int(11) NOT NULL AUTO_INCREMENT,
  `nom_topic` varchar(25) NOT NULL,
  `auteur` varchar(50) NOT NULL,
  `message_topic` varchar(500) NOT NULL,
  `date_creation` date NOT NULL,
  PRIMARY KEY (`id_topic`),
  KEY `id_topic` (`id_topic`),
  KEY `id_topic_2` (`id_topic`),
  KEY `nom_topic` (`nom_topic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `liste_users`
--

CREATE TABLE IF NOT EXISTS `liste_users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `liste_users`
--

INSERT INTO `liste_users` (`id_user`, `pseudo`, `mot_de_passe`) VALUES
(8, 'toto1', '79dd32d6b3353f2717c79549084b1c512688dccf'),
(9, 'toto2', '79dd32d6b3353f2717c79549084b1c512688dccf');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `liste_messages`
--
ALTER TABLE `liste_messages`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`id_topic`) REFERENCES `liste_topics` (`id_topic`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
