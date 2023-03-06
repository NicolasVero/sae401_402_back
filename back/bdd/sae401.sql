-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 06 mars 2023 à 14:20
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae401`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteurs`
--

CREATE TABLE `auteurs` (
  `id` int(11) NOT NULL,
  `nom` int(11) NOT NULL,
  `prenom` int(11) NOT NULL,
  `nombre_article_publies` int(11) NOT NULL,
  `mdp` int(11) NOT NULL,
  `nom_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `dossier` varchar(150) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `type` varchar(10) NOT NULL,
  `affiche` tinyint(1) NOT NULL,
  `url` varchar(255) NOT NULL,
  `tiny_url` varchar(255) NOT NULL,
  `style` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pages`
--

INSERT INTO `pages` (`id`, `id_auteur`, `dossier`, `titre`, `contenu`, `type`, `affiche`, `url`, `tiny_url`, `style`, `date`) VALUES
(28, 0, '', 'd', '<p>d</p>', 'projet', 1, './back/pages/d.html', 'd.html', 'style.css', '2006-03-23'),
(29, 0, '', 'aa', '<p>aa</p>', 'projet', 1, './back/pages/aa.html', 'aa.html', 'style.css', '2006-03-23'),
(30, 0, '', 'dgfd', '<p>gfd</p>', 'projet', 1, './back/pages/dgfd.html', 'dgfd.html', 'style.css', '2006-03-23'),
(31, 0, '', 'test', '<p>test</p>', 'projet', 1, './back/pages/test.html', 'test.html', 'style.css', '2006-03-23'),
(32, 0, '', 'gf', '<p>gf</p>', 'projet', 1, './back/pages/gf.html', 'gf.html', 'style.css', '2006-03-23');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `auteurs`
--
ALTER TABLE `auteurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `auteurs`
--
ALTER TABLE `auteurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;