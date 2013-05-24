-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 23 Mai 2013 à 15:27
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `saytu`
--

-- --------------------------------------------------------

--
-- Structure de la table `autres`
--

CREATE TABLE IF NOT EXISTS `autres` (
  `idAutres` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) DEFAULT NULL,
  `marque` varchar(255) NOT NULL,
  `modele` varchar(255) DEFAULT NULL,
  `couleur` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idAutres`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `objet`
--

CREATE TABLE IF NOT EXISTS `objet` (
  `idObjet` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) DEFAULT NULL,
  `details` text,
  `statut` varchar(25) DEFAULT NULL,
  `lieuRamassage` varchar(255) DEFAULT NULL,
  `lieuPerte` varchar(255) DEFAULT NULL,
  `datePerte` datetime DEFAULT NULL,
  `dateRamassage` datetime DEFAULT NULL,
  `dateDeclaration` datetime DEFAULT NULL,
  `idProprietaire` int(11) DEFAULT NULL,
  `idRamasseur` int(11) DEFAULT NULL,
  `archive` varchar(25) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `idPiece` int(11) DEFAULT NULL,
  `idAutres` int(11) DEFAULT NULL,
  PRIMARY KEY (`idObjet`),
  KEY `idProprietaire` (`idProprietaire`),
  KEY `idRamasseur` (`idRamasseur`),
  KEY `idAutres` (`idAutres`),
  KEY `idPiece` (`idPiece`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `objet`
--

INSERT INTO `objet` (`idObjet`, `libelle`, `details`, `statut`, `lieuRamassage`, `lieuPerte`, `datePerte`, `dateRamassage`, `dateDeclaration`, `idProprietaire`, `idRamasseur`, `archive`, `tag`, `idPiece`, `idAutres`) VALUES
(2, 'cin', 'carte sarr khadim senegal', NULL, 'dakar', NULL, NULL, '2013-05-21 00:00:00', '2013-05-23 00:00:00', NULL, NULL, NULL, 'cin', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE IF NOT EXISTS `personne` (
  `idPersonne` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `telephone` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`idPersonne`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

CREATE TABLE IF NOT EXISTS `piece` (
  `idPiece` int(11) NOT NULL AUTO_INCREMENT,
  `numeroPiece` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `nomTitulaire` varchar(255) CHARACTER SET utf8 NOT NULL,
  `prenomTitulaire` varchar(255) CHARACTER SET utf8 NOT NULL,
  `dateNaissance` date DEFAULT NULL,
  PRIMARY KEY (`idPiece`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `piece`
--

INSERT INTO `piece` (`idPiece`, `numeroPiece`, `nomTitulaire`, `prenomTitulaire`, `dateNaissance`) VALUES
(1, '123456789', 'SARR', 'Khadim', '2013-05-06');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `objet`
--
ALTER TABLE `objet`
  ADD CONSTRAINT `objet_ibfk_6` FOREIGN KEY (`idProprietaire`) REFERENCES `personne` (`idPersonne`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `objet_ibfk_7` FOREIGN KEY (`idRamasseur`) REFERENCES `personne` (`idPersonne`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `objet_ibfk_8` FOREIGN KEY (`idPiece`) REFERENCES `piece` (`idPiece`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `objet_ibfk_9` FOREIGN KEY (`idAutres`) REFERENCES `autres` (`idAutres`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
