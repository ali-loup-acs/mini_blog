-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 30 Novembre 2016 à 16:58
-- Version du serveur :  5.6.28-0ubuntu0.15.04.1
-- Version de PHP :  5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `kevinn`
--

-- --------------------------------------------------------

--
-- Structure de la table `M1_Article`
--

CREATE TABLE IF NOT EXISTS `M1_Article` (
`id` int(9) NOT NULL,
  `auteur_id` int(9) NOT NULL,
  `titre` varchar(31) NOT NULL,
  `message` varchar(65000) NOT NULL,
  `categorie_id` int(9) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `M1_Auteur`
--

CREATE TABLE IF NOT EXISTS `M1_Auteur` (
`id` int(9) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `M1_Categorie`
--

CREATE TABLE IF NOT EXISTS `M1_Categorie` (
`id` int(9) NOT NULL,
  `nom` varchar(37) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `M1_Article`
--
ALTER TABLE `M1_Article`
 ADD PRIMARY KEY (`auteur_id`), ADD UNIQUE KEY `id` (`id`), ADD UNIQUE KEY `auteur_id` (`auteur_id`), ADD KEY `categorie_id` (`categorie_id`);

--
-- Index pour la table `M1_Auteur`
--
ALTER TABLE `M1_Auteur`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `M1_Categorie`
--
ALTER TABLE `M1_Categorie`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `M1_Article`
--
ALTER TABLE `M1_Article`
MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `M1_Auteur`
--
ALTER TABLE `M1_Auteur`
MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `M1_Categorie`
--
ALTER TABLE `M1_Categorie`
MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `M1_Article`
--
ALTER TABLE `M1_Article`
ADD CONSTRAINT `M1_Article_ibfk_1` FOREIGN KEY (`auteur_id`) REFERENCES `M1_Auteur` (`id`),
ADD CONSTRAINT `M1_Article_ibfk_2` FOREIGN KEY (`categorie_id`) REFERENCES `M1_Categorie` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
