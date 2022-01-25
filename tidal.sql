-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 25 jan. 2022 à 15:39
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
-- Base de données : `tidal`
--

-- --------------------------------------------------------

--
-- Structure de la table `absences`
--

CREATE TABLE `absences` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `begin_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `absences`
--

INSERT INTO `absences` (`id`, `name`, `begin_date`, `end_date`) VALUES
(1, 'Jean claude', '2021-12-21 15:48:16', '2021-12-21 15:48:16'),
(2, 'coucou', '2021-01-01 07:30:00', '2021-01-01 17:30:00'),
(9, 'test3', '2022-01-01 07:30:00', '2022-01-11 16:23:00'),
(10, 'test', '2022-01-01 07:30:00', '2022-01-01 17:30:00'),
(17, 'Mr. Jany', '2022-01-19 19:00:00', '2022-01-29 19:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `annonce` varchar(255) NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`id`, `title`, `annonce`, `creation_time`) VALUES
(1, 'test', '123456', '2022-01-18 15:38:27');

-- --------------------------------------------------------

--
-- Structure de la table `cantine`
--

CREATE TABLE `cantine` (
  `id` int(11) NOT NULL,
  `semaine` varchar(1) NOT NULL DEFAULT 'A',
  `jour` int(1) NOT NULL DEFAULT 0,
  `horaire` int(1) NOT NULL DEFAULT 0,
  `classes` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cantine`
--

INSERT INTO `cantine` (`id`, `semaine`, `jour`, `horaire`, `classes`) VALUES
(1, 'A', 1, 1, ''),
(2, 'A', 1, 2, ''),
(3, 'A', 1, 3, ''),
(5, 'A', 2, 1, ''),
(6, 'A', 2, 1, ''),
(7, 'A', 2, 1, ''),
(8, 'A', 2, 1, ''),
(9, 'A', 3, 1, ''),
(10, 'A', 3, 1, ''),
(11, 'A', 3, 1, ''),
(12, 'A', 3, 1, ''),
(13, 'A', 4, 1, ''),
(14, 'A', 4, 1, ''),
(15, 'A', 4, 1, ''),
(16, 'A', 4, 1, ''),
(17, 'A', 5, 1, ''),
(18, 'A', 5, 1, ''),
(19, 'A', 5, 1, ''),
(20, 'A', 5, 1, ''),
(21, 'B', 1, 1, ''),
(22, 'B', 1, 2, ''),
(23, 'B', 1, 3, ''),
(25, 'B', 2, 1, ''),
(26, 'B', 2, 2, ''),
(27, 'B', 2, 3, ''),
(29, 'B', 3, 1, ''),
(30, 'B', 3, 2, ''),
(31, 'B', 3, 3, ''),
(33, 'B', 4, 1, ''),
(34, 'B', 4, 2, ''),
(35, 'B', 4, 3, ''),
(37, 'B', 5, 1, ''),
(38, 'B', 5, 2, ''),
(39, 'B', 5, 3, '');

-- --------------------------------------------------------

--
-- Structure de la table `semaines`
--

CREATE TABLE `semaines` (
  `semaine` int(11) NOT NULL,
  `type` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `semaines`
--

INSERT INTO `semaines` (`semaine`, `type`) VALUES
(1, 1),
(2, 0),
(3, 0),
(4, 0),
(5, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 1),
(10, 0),
(11, 0),
(12, 0),
(13, 0),
(14, 0),
(15, 1),
(16, 1),
(17, 0),
(18, 0),
(19, 0),
(20, 0),
(21, 0),
(22, 0),
(23, 0),
(24, 0),
(25, 0),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 0),
(37, 0),
(38, 0),
(39, 0),
(40, 0),
(41, 0),
(42, 0),
(43, 0),
(44, 1),
(45, 0),
(46, 0),
(47, 0),
(48, 0),
(49, 0),
(50, 0),
(51, 0),
(52, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `creation_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `type`, `creation_time`) VALUES
(4, 'AIDUN', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1, '2022-01-18 15:33:08'),
(5, 'test5', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1, '2022-01-24 09:55:52'),
(8, 'bernas', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1, '2022-01-24 09:56:16');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `absences`
--
ALTER TABLE `absences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cantine`
--
ALTER TABLE `cantine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `semaines`
--
ALTER TABLE `semaines`
  ADD PRIMARY KEY (`semaine`),
  ADD KEY `semaine` (`semaine`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `absences`
--
ALTER TABLE `absences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `cantine`
--
ALTER TABLE `cantine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pour la table `semaines`
--
ALTER TABLE `semaines`
  MODIFY `semaine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
