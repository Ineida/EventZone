-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 16 juin 2019 à 22:55
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18
drop if exists database if not exists eventzone;
create database if not exists eventzone character set utf8 collate utf8_unicode_ci;
use eventzone;
grant all privileges on eventzone.* to 'formaweb_user'@'localhost' identified by 'secret';
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `eventzone`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--
DROP TABLE IF EXISTS `annonce`;
DROP TABLE IF EXISTS `commentaire`;
DROP TABLE IF EXISTS `client`;

CREATE TABLE IF NOT EXISTS `annonce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client` int(11) NOT NULL,
  `sujet` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `PR_cli` (`client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

 CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Déchargement des données de la table `client`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Sara DUPONT', 'dupont.sara@gmail.com', 'dupont'),
(2, 'user', 'user@gmail.com', 'secret');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client` int(11) NOT NULL,
  `sujet` varchar(50) NOT NULL,
  `etablissement` int(10) NOT NULL,
  `commentaire` text NOT NULL,
  `prestataire` int(11) NOT NULL,
  `note` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `PR_etab` (`etablissement`),
  KEY `PR_cli_com` (`client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

DROP TABLE IF EXISTS `etablissement`;
CREATE TABLE IF NOT EXISTS `etablissement` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `telephone` bigint(15) NOT NULL,
  `ville` varchar(50) NOT NULL DEFAULT 'Lyon',
  `pays` varchar(50) NOT NULL DEFAULT 'Fance',
  `note` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etablissement`
--

INSERT INTO `etablissement` (`id`, `nom`, `adresse`, `telephone`, `ville`, `pays`, `note`) VALUES
(1, 'Chic croque', '76 rue de paris', 350686905, 'Lyon', 'Fance', 3),
(2, 'LUZ', '76 boulevard frères lumières ', 390506576, 'Lyon', 'Fance', 4),
(3, 'Party', '7 place jean Jaurès', 345678905, 'Lyon', 'Fance', 4),
(4, 'taste and eat', '15 rue des fleurs', 354654755, 'Villeurbanne', 'Fance', 4);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chemin` varchar(100) NOT NULL,
  `sujet` varchar(50) NOT NULL,
  `salle` int(10) DEFAULT NULL,
  `prestataire` int(10) DEFAULT NULL,
  `etablissement` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `chemin` (`chemin`),
  KEY `presta` (`prestataire`),
  KEY `etab` (`etablissement`),
  KEY `salle` (`salle`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `chemin`, `sujet`, `salle`, `prestataire`, `etablissement`) VALUES
(1, 'image/prestataire/coiffure1.jpg', 'coiffure', NULL, 1, 1),
(2, 'image/prestataire/coiffure.jpg', 'coiffure', NULL, 1, 1),
(4, 'image/prestataire/deco.jpg', 'decoration', NULL, 3, 3),
(5, 'image/prestataire/deco1.jpg', 'decoration', NULL, 3, 3),
(6, 'image/prestataire/deco2.jpg', 'decoration', NULL, 3, 3),
(7, 'image/prestataire/dj.jpg', 'Dj\'s', NULL, 6, 2),
(8, 'image/prestataire/dj1.jpg\r\n', 'Dj\'s', NULL, 6, 2),
(10, 'image/prestataire/maquillage.jpg', 'maquillage', NULL, 2, 1),
(11, 'image/prestataire/maquillage1.jpg', 'maquillage', NULL, 2, 1),
(12, 'image/prestataire/maquillage2.jpg', 'maquillage', NULL, 2, 1),
(13, 'image/prestataire/wedding.jpg', 'mariage', NULL, 4, 3),
(14, 'image/prestataire/wedding1.jpg', 'mariage', NULL, 4, 3),
(15, 'image/prestataire/wedding2.jpg', 'mariage', NULL, 4, 3),
(16, 'image/prestataire/traiteur.jpg', 'traiteur', NULL, 7, 4),
(17, 'image/prestataire/traiteur1.jpg', 'traiteur', NULL, 7, 4),
(18, 'image/prestataire/salle.jpg', 'salle', 1, 8, 3),
(19, 'image/prestataire/salle1.jpg', 'salle', 1, 8, 3);

-- --------------------------------------------------------

--
-- Structure de la table `prestataire`
--

DROP TABLE IF EXISTS `prestataire`;
CREATE TABLE IF NOT EXISTS `prestataire` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `telephone` int(15) DEFAULT NULL,
  `description` text NOT NULL,
  `profession` int(7) NOT NULL,
  `etablissement` int(7) NOT NULL,
  `salle` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `PR_etab_P` (`etablissement`),
  KEY `PR_pro_P` (`profession`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `prestataire`
--

INSERT INTO `prestataire` (`id`, `nom`, `adresse`, `telephone`, `description`, `profession`, `etablissement`, `salle`) VALUES
(1, 'Ineida Moreno', '76 Rue de Paris', 657693878, 'Coiffeuse professionnel, diplôme de l\'école de Esthétique de Lyon. Exerce depuis 7 ans dans le métier. Propose des services pour les particuliers comme pour les professionnels.\r\n\r\nPeut vous proposer différents services et styles de coiffures, selon l\'occasion et vous envies. Même les cheveux crépues trouvent leurs compte avec elle.', 1, 1, 0),
(2, 'Smailine Viraragavane', '76 rue de paris', 667890987, 'Propose différents styles de maquillages et peut vous proposer des services de qualité dans son établissement ou chez vous.\r\nSelon votre budget elle peut vous aider à vous sentir encore plus belle. Les ongles et les maquillages sophistiquées sont sa spécialité n\'hésitez pas à la contacter.', 2, 1, 0),
(3, 'Manuela MAMTO', '7 place jean jaurès', 345863365, 'décoratrice de renome dans la métropole de Lyon. Elle intervient dans les grandes évènements tel que les mariages ou les bales.\r\n\r\nLes petites évènements sont également très presentes dans son agenda. Elle peut apporter ses éléments décoratifs ou utiliser les vôtres selon la demande. \r\n\r\nVous ne serez pas dessus. Elle est une des meilleurs dans la région. ', 3, 3, 0),
(4, 'Ines ', '7 place jean jaurès ', 345678777, 'La meilleur dans le domaine. Elle organise des mariages dans toute le pays. Plusieurs célébrités ont recours à ses services. \r\n\r\nElle vous aide à organiseur la journée la plus importante de votre vie et apporte la sérénité pour profiter de votre journée sans prise de tête.', 6, 3, 0),
(5, 'Emma', '7 place jean jaurès', 356798675, 'Vous souhaitez organiseur un évènements. Emma peut vous aider et vous apporter la solution dont vous avez besoin.\r\n\r\nLes anniversaires, les Baby showers, les baptême…  Elle les organise à votre goût et ressemblance. Les démarches sont effectués par la prestataire de A à Z si vous le souhaitez. Vous n\'auriez qu\'à formuler vous désir et profiter de la fête.', 7, 3, 0),
(6, 'Amina', '76 Boulevard Frères lumières ', 398767457, 'La musique est son domaine. Elle anime vous fêtes au rythme de différents musiques:\r\nHouse. Hip hop. Zouk. Rap…\r\nFormulez vous vœux et elle y sera', 5, 2, 0),
(7, 'taste and eat', '1 rue des fleures', 345678876, 'Une entreprise familiale fournisseurs des réfection des fêtes. Un goûter, un déjeuner ou encore un diner ils sont la pour vous.\r\n\r\nSi vous souhaitez réaliser votre carte, appelez les et vous aurez des chefs présents à votre événements avec des serveurs. Tout dans les règles de l\'art.', 10, 4, 0),
(8, 'party', '7 place jean Jaurès', 345677684, 'Party vous propose des lieux pour votre évènement. Petite ou grands nous avons des salles que vous conviennent. ', 4, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `profession`
--

DROP TABLE IF EXISTS `profession`;
CREATE TABLE IF NOT EXISTS `profession` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `profession`
--

INSERT INTO `profession` (`id`, `nom`) VALUES
(1, 'coiffeur/euse'),
(2, 'esthecien/nne'),
(3, 'decorateur'),
(4, 'louer de salle et equipement'),
(5, 'dj'),
(6, 'wedding planner '),
(7, 'organisateur de fêtes '),
(8, 'fleuriste'),
(9, 'vetements'),
(10, 'traiteur');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `prestataire` int(10) NOT NULL,
  `taille` varchar(50) NOT NULL,
  `platCouverts` int(10) DEFAULT NULL,
  `tables` int(10) NOT NULL,
  `chaises` int(10) NOT NULL,
  `cuisine` varchar(50) DEFAULT NULL,
  `info` text,
  PRIMARY KEY (`id`),
  KEY `PK_id_salle` (`prestataire`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id`, `prestataire`, `taille`, `platCouverts`, `tables`, `chaises`, `cuisine`, `info`) VALUES
(1, 8, '230', 300, 50, 300, '40 ', 'La cuisine est spacieux et on offre toutes les ustensiles de cuisine dont vous avez besoin. \r\n\r\nOn a des espaces extérieur avec un grand jardin pour les enfants ou des regroupement à l\'exterieur ');

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE IF NOT EXISTS `theme` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `theme` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `PR_cli` FOREIGN KEY (`users`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `PR_cli_com` FOREIGN KEY (`users`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `PR_etab` FOREIGN KEY (`etablissement`) REFERENCES `etablissement` (`id`);

--
-- Contraintes pour la table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `etab` FOREIGN KEY (`etablissement`) REFERENCES `etablissement` (`id`),
  ADD CONSTRAINT `presta` FOREIGN KEY (`prestataire`) REFERENCES `prestataire` (`id`),
  ADD CONSTRAINT `salle` FOREIGN KEY (`salle`) REFERENCES `salle` (`id`);

--
-- Contraintes pour la table `prestataire`
--
ALTER TABLE `prestataire`
  ADD CONSTRAINT `PR_etab_P` FOREIGN KEY (`etablissement`) REFERENCES `etablissement` (`id`),
  ADD CONSTRAINT `PR_pro_P` FOREIGN KEY (`profession`) REFERENCES `profession` (`id`);

--
-- Contraintes pour la table `salle`
--
ALTER TABLE `salle`
  ADD CONSTRAINT `PK_id_salle` FOREIGN KEY (`prestataire`) REFERENCES `prestataire` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
