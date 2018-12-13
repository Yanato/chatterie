-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 13 déc. 2018 à 17:02
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `chatterie`
--

-- --------------------------------------------------------

--
-- Structure de la table `acces`
--

CREATE TABLE `acces` (
  `identifiant` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `acces`
--

INSERT INTO `acces` (`identifiant`, `password`) VALUES
('crepo', 'nutella');

-- --------------------------------------------------------

--
-- Structure de la table `contenu`
--

CREATE TABLE `contenu` (
  `numPage` int(50) NOT NULL,
  `numTexte` int(50) NOT NULL,
  `texte` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contenu`
--

INSERT INTO `contenu` (`numPage`, `numTexte`, `texte`) VALUES
(1, 1, '<h1>Heading</h1>\r\ne\r\n<p>Lorem ipsum dolor sit <strong>amet</strong>, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut laboree et dolore magna vrhoe4tiue4uo. <a href=\"#\">This is a link</a></p>\r\n\r\n<ul>\r\n    <li>Item</li>\r\n    <li>Item</li>\r\n    <li>Item</li>\r\n</ul>\r\n\r\n<h2>Headeing</h2>\r\n\r\n<p>Ut enim ad <em>minim</em> veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>'),
(1, 2, 'oui biensur');

-- --------------------------------------------------------

--
-- Structure de la table `espace`
--

CREATE TABLE `espace` (
  `idEspace` int(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `capacite` int(50) NOT NULL,
  `color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `espace`
--

INSERT INTO `espace` (`idEspace`, `nom`, `capacite`, `color`) VALUES
(2, 'la', 8, '#4f35ff'),
(3, 'C', 6, '#28e600');

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE `page` (
  `id` int(1) NOT NULL,
  `nomPage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `page`
--

INSERT INTO `page` (`id`, `nomPage`) VALUES
(3, 'Les installations'),
(4, 'Livre d\'or'),
(5, 'Reservations'),
(6, 'Contact'),
(1, 'Accueil'),
(2, 'La chatterie');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `idResa` int(10) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `nbrChat` int(10) NOT NULL,
  `dateDeb` date NOT NULL,
  `dateFin` date NOT NULL,
  `conditions` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`idResa`, `nom`, `mail`, `phone`, `nbrChat`, `dateDeb`, `dateFin`, `conditions`) VALUES
(1, 'nice', 'test@test.fr', 675453676, 1, '2018-12-12', '2018-12-15', 'test'),
(2, 'nice', 'test@test.fr', 675453676, 1, '2018-12-12', '2018-12-15', 'test');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`idResa`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idResa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
