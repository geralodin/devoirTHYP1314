-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 17 Décembre 2013 à 16:37
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `etunote`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE IF NOT EXISTS `etudiants` (
  `idetudiants` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idetudiants`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `etudiants`
--

INSERT INTO `etudiants` (`idetudiants`, `nom`, `prenom`) VALUES
(1, 'Mehdi', 'Salim'),
(2, 'Himeur', 'Katia'),
(3, 'Moustakbal ', 'Jihane'),
(4, 'El', 'Frihmat'),
(5, 'Boumarsel', 'Firdaous'),
(6, 'SAID', 'Maroua');

-- --------------------------------------------------------

--
-- Structure de la table `etudiants_has_matiere`
--

CREATE TABLE IF NOT EXISTS `etudiants_has_matiere` (
  `etudiants_idetudiants` int(11) NOT NULL,
  `matiere_idmatiere` int(11) NOT NULL,
  `notes` int(11) DEFAULT NULL,
  PRIMARY KEY (`etudiants_idetudiants`,`matiere_idmatiere`),
  KEY `fk_etudiants_has_matiere_matiere1_idx` (`matiere_idmatiere`),
  KEY `fk_etudiants_has_matiere_etudiants_idx` (`etudiants_idetudiants`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `etudiants_has_matiere`
--

INSERT INTO `etudiants_has_matiere` (`etudiants_idetudiants`, `matiere_idmatiere`, `notes`) VALUES
(1, 1, 12),
(1, 2, 13),
(1, 3, 16),
(2, 1, 14);

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE IF NOT EXISTS `matiere` (
  `idmatiere` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idmatiere`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `matiere`
--

INSERT INTO `matiere` (`idmatiere`, `intitule`) VALUES
(1, 'PHP'),
(2, 'JQUERY'),
(3, 'SQL');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `etudiants_has_matiere`
--
ALTER TABLE `etudiants_has_matiere`
  ADD CONSTRAINT `fk_etudiants_has_matiere_etudiants` FOREIGN KEY (`etudiants_idetudiants`) REFERENCES `etudiants` (`idetudiants`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_etudiants_has_matiere_matiere1` FOREIGN KEY (`matiere_idmatiere`) REFERENCES `matiere` (`idmatiere`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
