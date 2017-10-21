-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 21 oct. 2017 à 10:55
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `beehope`
--

-- --------------------------------------------------------

--
-- Structure de la table `beehope_apiary`
--

DROP TABLE IF EXISTS `beehope_apiary`;
CREATE TABLE IF NOT EXISTS `beehope_apiary` (
  `id_rucher` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `adresse` varchar(200) DEFAULT NULL,
  `adresse_2` varchar(200) DEFAULT NULL,
  `adresse_3` varchar(200) DEFAULT NULL,
  `cp` varchar(10) DEFAULT NULL,
  `ville` varchar(200) DEFAULT NULL,
  `latitude` varchar(15) DEFAULT NULL,
  `longitude` varchar(15) DEFAULT NULL,
  `creation_date` datetime NOT NULL,
  `nombre_ruches` int(10) NOT NULL,
  PRIMARY KEY (`id_rucher`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `beehope_apiary`
--

INSERT INTO `beehope_apiary` (`id_rucher`, `id_user`, `libelle`, `description`, `adresse`, `adresse_2`, `adresse_3`, `cp`, `ville`, `latitude`, `longitude`, `creation_date`, `nombre_ruches`) VALUES
(22, 1, 'Mon rucher', '', 'adresse du rucher', 'adresse du rucher', NULL, '12000', 'Rodez', NULL, NULL, '2017-10-21 09:26:49', 0);

-- --------------------------------------------------------

--
-- Structure de la table `beehope_beehive`
--

DROP TABLE IF EXISTS `beehope_beehive`;
CREATE TABLE IF NOT EXISTS `beehope_beehive` (
  `id_beehive` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) NOT NULL,
  `id_apiary` int(10) NOT NULL,
  `id_colony` int(10) DEFAULT NULL,
  `nom` varchar(100) NOT NULL,
  `beehive_type` varchar(30) NOT NULL,
  `etat` varchar(30) NOT NULL,
  `creation_date` datetime NOT NULL,
  `nombre_corps` int(5) DEFAULT NULL,
  `nombre_hausses` int(5) DEFAULT NULL,
  `nombre_cadres` int(5) DEFAULT NULL,
  `beehive_matiere` varchar(50) NOT NULL,
  `exposition_soleil` varchar(50) NOT NULL,
  `orientation` varchar(50) DEFAULT NULL,
  `vide` tinyint(1) NOT NULL,
  `commentaire` varchar(2000) NOT NULL,
  PRIMARY KEY (`id_beehive`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `beehope_beehive`
--

INSERT INTO `beehope_beehive` (`id_beehive`, `id_user`, `id_apiary`, `id_colony`, `nom`, `beehive_type`, `etat`, `creation_date`, `nombre_corps`, `nombre_hausses`, `nombre_cadres`, `beehive_matiere`, `exposition_soleil`, `orientation`, `vide`, `commentaire`) VALUES
(6, 1, 22, 6, 'idr1', '', 'Moyen', '2017-10-21 09:27:19', 5, 5, 5, 'Bois', 'Ensoleillé', 'Sud', 0, ''),
(7, 1, 22, 7, 'idr2', '', 'Excellent', '2017-10-21 09:28:25', 2, 22, 10, 'Bois', 'Ensoleillé', 'Sud', 0, ''),
(8, 1, 22, 8, 'ruche6', '', 'Mauvais', '2017-10-21 09:28:55', 2, 2, 2, 'Bois', 'Ensoleillé', 'Sud', 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `beehope_colony`
--

DROP TABLE IF EXISTS `beehope_colony`;
CREATE TABLE IF NOT EXISTS `beehope_colony` (
  `id_colony` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) NOT NULL,
  `id_beehive` int(10) NOT NULL,
  `libelle` varchar(150) NOT NULL,
  `date_derniere_visite` datetime DEFAULT NULL,
  `espece` varchar(150) DEFAULT NULL,
  `marquage` varchar(150) DEFAULT NULL,
  `agressivite` varchar(50) DEFAULT NULL,
  `reine_presente` tinyint(1) DEFAULT NULL,
  `c_commentaire` varchar(2000) DEFAULT NULL,
  `clipage` varchar(50) DEFAULT NULL,
  `activite` varchar(50) DEFAULT NULL,
  `affectation_1` varchar(50) DEFAULT NULL,
  `affectation_2` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_colony`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `beehope_colony`
--

INSERT INTO `beehope_colony` (`id_colony`, `id_user`, `id_beehive`, `libelle`, `date_derniere_visite`, `espece`, `marquage`, `agressivite`, `reine_presente`, `c_commentaire`, `clipage`, `activite`, `affectation_1`, `affectation_2`) VALUES
(6, 1, 6, 'idc1', NULL, '', 'Aucun', 'Faible', 1, '', '0', 'Faible', '', ''),
(7, 1, 7, 'ic88', NULL, '', 'Aucun', 'Faible', 1, '', '0', 'Faible', 'miel', ''),
(8, 1, 8, '2', NULL, '', 'Aucun', 'Faible', 1, '', '0', 'Faible', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `beehope_inspection`
--

DROP TABLE IF EXISTS `beehope_inspection`;
CREATE TABLE IF NOT EXISTS `beehope_inspection` (
  `id_inspection` int(10) NOT NULL AUTO_INCREMENT,
  `id_ruche` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `date_visite` datetime NOT NULL,
  `activite` varchar(50) DEFAULT NULL,
  `nombre_cadre_cuvain` int(5) DEFAULT NULL,
  `nombre_cadre_pollen` int(11) DEFAULT NULL,
  `nombre_cadre_miel` int(11) DEFAULT NULL,
  `est_malade` tinyint(1) DEFAULT NULL,
  `maladie` varchar(50) DEFAULT NULL,
  `traitement` varchar(50) DEFAULT NULL,
  `prochaine_visite` datetime DEFAULT NULL,
  `commentaire` varchar(3000) DEFAULT NULL,
  PRIMARY KEY (`id_inspection`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `beehope_inspection`
--

INSERT INTO `beehope_inspection` (`id_inspection`, `id_ruche`, `id_user`, `date_visite`, `activite`, `nombre_cadre_cuvain`, `nombre_cadre_pollen`, `nombre_cadre_miel`, `est_malade`, `maladie`, `traitement`, `prochaine_visite`, `commentaire`) VALUES
(1, 6, 1, '2017-09-23 00:01:00', 'Faible', 0, 0, 0, 1, 'Acariose', '', NULL, '');

-- --------------------------------------------------------

--
-- Structure de la table `beehope_recolte`
--

DROP TABLE IF EXISTS `beehope_recolte`;
CREATE TABLE IF NOT EXISTS `beehope_recolte` (
  `id_recolte` int(10) NOT NULL AUTO_INCREMENT,
  `id_ruche` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `quantite` varchar(30) DEFAULT NULL,
  `unite` varchar(30) DEFAULT NULL,
  `type_recolte` varchar(50) DEFAULT NULL,
  `commentaire` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id_recolte`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `beehope_user`
--

DROP TABLE IF EXISTS `beehope_user`;
CREATE TABLE IF NOT EXISTS `beehope_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `login` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `name` varchar(100) NOT NULL,
  `active` int(1) NOT NULL,
  `last_login_date` datetime NOT NULL,
  `abonnement` int(1) NOT NULL,
  `date_abonnement` datetime DEFAULT NULL,
  `expiration_abonnement` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `beehope_user`
--

INSERT INTO `beehope_user` (`id`, `login`, `password`, `name`, `active`, `last_login_date`, `abonnement`, `date_abonnement`, `expiration_abonnement`) VALUES
(1, 'demo@demo.fr', 'demo', 'Demo', 0, '0000-00-00 00:00:00', 0, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
