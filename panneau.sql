-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 06 déc. 2021 à 12:25
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `panneau`
--

-- --------------------------------------------------------

--
-- Structure de la table `decompte_des_vacances`
--

CREATE TABLE `decompte_des_vacances` (
  `id_vacance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `informations_administratives`
--

CREATE TABLE `informations_administratives` (
  `id_info` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `professeurs_absents`
--

CREATE TABLE `professeurs_absents` (
  `id_prof` int(11) NOT NULL,
  `nom_prof` text NOT NULL,
  `id_matière` int(11) NOT NULL,
  `nom_matière` text NOT NULL,
  `sexe` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `professeurs_absents`
--

INSERT INTO `professeurs_absents` (`id_prof`, `nom_prof`, `id_matière`, `nom_matière`, `sexe`) VALUES
(1, 'Jany', 1, 'NSI', 'homme'),
(2, 'Bert', 2, 'philosophie', 'homme'),
(3, 'Oliva', 2, 'philosophie', 'homme');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `professeurs_absents`
--
ALTER TABLE `professeurs_absents`
  ADD PRIMARY KEY (`id_prof`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `professeurs_absents`
--
ALTER TABLE `professeurs_absents`
  MODIFY `id_prof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
