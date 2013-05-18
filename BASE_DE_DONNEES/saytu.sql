-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Sam 18 Mai 2013 à 19:50
-- Version du serveur: 5.5.8
-- Version de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `saytu`
--

-- --------------------------------------------------------

--
-- Structure de la table `objet`
--

CREATE TABLE IF NOT EXISTS `objet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idType` int(11) NOT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `numeroPiece` varchar(50) DEFAULT NULL,
  `nomTitulaire` varchar(100) DEFAULT NULL,
  `prenomTitulaire` varchar(100) DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `nomMereTitulaire` varchar(100) DEFAULT NULL,
  `prenomMereTitulaire` varchar(100) DEFAULT NULL,
  `prenomPereTitulaire` varchar(100) DEFAULT NULL,
  `marqueObjet` varchar(50) DEFAULT NULL,
  `modeleObjet` varchar(50) DEFAULT NULL,
  `couleurObjet` varchar(50) DEFAULT NULL,
  `details` text CHARACTER SET latin1,
  `statut` varchar(25) DEFAULT NULL,
  `lieuRamassage` varchar(255) DEFAULT NULL,
  `lieuPerte` varchar(255) DEFAULT NULL,
  `datePerte` datetime DEFAULT NULL,
  `dateRamassage` datetime DEFAULT NULL,
  `dateDeclaration` datetime DEFAULT NULL,
  `idProprietaire` int(11) DEFAULT NULL,
  `idRamasseur` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `archive` varchar(25) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idRamasseur` (`idRamasseur`),
  KEY `idProprietaire` (`idProprietaire`),
  KEY `idType` (`idType`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `objet`
--

INSERT INTO `objet` (`id`, `idType`, `libelle`, `numeroPiece`, `nomTitulaire`, `prenomTitulaire`, `dateNaissance`, `nomMereTitulaire`, `prenomMereTitulaire`, `prenomPereTitulaire`, `marqueObjet`, `modeleObjet`, `couleurObjet`, `details`, `statut`, `lieuRamassage`, `lieuPerte`, `datePerte`, `dateRamassage`, `dateDeclaration`, `idProprietaire`, `idRamasseur`, `photo`, `archive`, `tag`) VALUES
(1, 2, 'tricko', '19908719928', 'sarr', 'khadim', '1995-05-16', NULL, NULL, NULL, NULL, NULL, NULL, 'Carte nationale d''identite sarr khadim dakar senegal guediawaye', NULL, NULL, NULL, NULL, '2013-05-17 16:46:11', NULL, NULL, NULL, NULL, NULL, 'CIN carte nationale senegal');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE IF NOT EXISTS `personne` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `personne`
--

INSERT INTO `personne` (`id`, `nom`, `prenom`, `telephone`, `email`) VALUES
(1, 'keny', 'andre', '+221 777167300', 'andre.keny@gmail.com'),
(2, 'mbengue', 'magueye', '7798890912', 'mmbengue@estm.sn');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `idType` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`idType`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`idType`, `libelle`) VALUES
(1, 'objetRamasse'),
(2, 'rechercheObjet');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `objet`
--
ALTER TABLE `objet`
  ADD CONSTRAINT `objet_ibfk_3` FOREIGN KEY (`idRamasseur`) REFERENCES `personne` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `objet_ibfk_4` FOREIGN KEY (`idProprietaire`) REFERENCES `personne` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `objet_ibfk_5` FOREIGN KEY (`idType`) REFERENCES `type` (`idType`) ON DELETE CASCADE ON UPDATE CASCADE;
