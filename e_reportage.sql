-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Ven 17 Mai 2013 à 18:39
-- Version du serveur: 5.5.8
-- Version de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `e_reportage`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `libelleCategorie` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `categorie`
--


-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `idCommentaire` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` text CHARACTER SET latin1 NOT NULL,
  `idPersonne` int(11) NOT NULL,
  `dateCommentaire` datetime NOT NULL,
  PRIMARY KEY (`idCommentaire`),
  KEY `idPersonne` (`idPersonne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `commentaire`
--


-- --------------------------------------------------------

--
-- Structure de la table `interview`
--

CREATE TABLE IF NOT EXISTS `interview` (
  `idInterview` int(11) NOT NULL AUTO_INCREMENT,
  `libelleInterview` varchar(255) CHARACTER SET latin1 NOT NULL,
  `dateInterview` datetime NOT NULL,
  `pathInterview` varchar(255) CHARACTER SET latin1 NOT NULL,
  `idPersonne` int(11) NOT NULL,
  PRIMARY KEY (`idInterview`),
  KEY `idPersonne` (`idPersonne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `interview`
--


-- --------------------------------------------------------

--
-- Structure de la table `localisation`
--

CREATE TABLE IF NOT EXISTS `localisation` (
  `idLocalisation` int(11) NOT NULL AUTO_INCREMENT,
  `pays` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `region` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `ville` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `quartier` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`idLocalisation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `localisation`
--


-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `idMedia` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `libelleMedia` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `idTypeMedia` int(11) DEFAULT NULL,
  PRIMARY KEY (`idMedia`),
  KEY `idTypeMedia` (`idTypeMedia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `media`
--


-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE IF NOT EXISTS `personne` (
  `idPersonne` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET latin1 NOT NULL,
  `prenom` varchar(255) CHARACTER SET latin1 NOT NULL,
  `adresse` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `telephone` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `dateInscription` datetime NOT NULL,
  `pseudo` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `dateNaissance` date DEFAULT NULL,
  PRIMARY KEY (`idPersonne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `personne`
--


-- --------------------------------------------------------

--
-- Structure de la table `personnepostcommentaire`
--

CREATE TABLE IF NOT EXISTS `personnepostcommentaire` (
  `idPersonne` int(11) NOT NULL,
  `idPost` int(11) NOT NULL,
  `idCommentaire` int(11) NOT NULL,
  PRIMARY KEY (`idPersonne`,`idPost`,`idCommentaire`),
  KEY `idPersonne` (`idPersonne`),
  KEY `idPost` (`idPost`),
  KEY `idCommentaire` (`idCommentaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `personnepostcommentaire`
--


-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `idPost` int(11) NOT NULL AUTO_INCREMENT,
  `idMedia` int(11) NOT NULL,
  `texte` varchar(255) CHARACTER SET latin1 NOT NULL,
  `datePost` datetime NOT NULL,
  `idCategorie` int(11) NOT NULL,
  `titre` varchar(255) CHARACTER SET latin1 NOT NULL,
  `idLocalisation` int(11) NOT NULL,
  `tag` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`idPost`),
  KEY `idMedia` (`idMedia`),
  KEY `idCategorie` (`idCategorie`),
  KEY `idLocalisation` (`idLocalisation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `post`
--


-- --------------------------------------------------------

--
-- Structure de la table `signalcommentaire`
--

CREATE TABLE IF NOT EXISTS `signalcommentaire` (
  `idPersonne` int(11) NOT NULL,
  `idCommentaire` int(11) NOT NULL,
  `dateSignalCommentaire` datetime NOT NULL,
  `motifSignalCommentaire` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`idPersonne`,`idCommentaire`),
  KEY `idPersonne` (`idPersonne`),
  KEY `idCommentaire` (`idCommentaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `signalcommentaire`
--


-- --------------------------------------------------------

--
-- Structure de la table `signalpost`
--

CREATE TABLE IF NOT EXISTS `signalpost` (
  `idPersonne` int(11) NOT NULL,
  `idPost` int(11) NOT NULL,
  `dateSignalPost` datetime NOT NULL,
  `motifSignalPost` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`idPersonne`,`idPost`),
  KEY `idPersonne` (`idPersonne`),
  KEY `idPost` (`idPost`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `signalpost`
--


-- --------------------------------------------------------

--
-- Structure de la table `typemedia`
--

CREATE TABLE IF NOT EXISTS `typemedia` (
  `idTypeMedia` int(11) NOT NULL AUTO_INCREMENT,
  `libelleTypeMedia` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`idTypeMedia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `typemedia`
--


--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`idPersonne`) REFERENCES `personne` (`idPersonne`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `interview`
--
ALTER TABLE `interview`
  ADD CONSTRAINT `interview_ibfk_1` FOREIGN KEY (`idPersonne`) REFERENCES `personne` (`idPersonne`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`idTypeMedia`) REFERENCES `typemedia` (`idTypeMedia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `personnepostcommentaire`
--
ALTER TABLE `personnepostcommentaire`
  ADD CONSTRAINT `personnepostcommentaire_ibfk_7` FOREIGN KEY (`idPersonne`) REFERENCES `personne` (`idPersonne`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personnepostcommentaire_ibfk_8` FOREIGN KEY (`idPost`) REFERENCES `post` (`idPost`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personnepostcommentaire_ibfk_9` FOREIGN KEY (`idCommentaire`) REFERENCES `commentaire` (`idCommentaire`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_4` FOREIGN KEY (`idMedia`) REFERENCES `media` (`idMedia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_5` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_6` FOREIGN KEY (`idLocalisation`) REFERENCES `localisation` (`idLocalisation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `signalcommentaire`
--
ALTER TABLE `signalcommentaire`
  ADD CONSTRAINT `signalcommentaire_ibfk_1` FOREIGN KEY (`idPersonne`) REFERENCES `personne` (`idPersonne`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `signalcommentaire_ibfk_2` FOREIGN KEY (`idCommentaire`) REFERENCES `commentaire` (`idCommentaire`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `signalpost`
--
ALTER TABLE `signalpost`
  ADD CONSTRAINT `signalpost_ibfk_1` FOREIGN KEY (`idPersonne`) REFERENCES `personne` (`idPersonne`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `signalpost_ibfk_2` FOREIGN KEY (`idPost`) REFERENCES `post` (`idPost`) ON DELETE CASCADE ON UPDATE CASCADE;
