-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 07 déc. 2021 à 14:55
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
-- Structure de la table `liste_profs`
--

CREATE TABLE `liste_profs` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `matiere` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `liste_profs`
--

INSERT INTO `liste_profs` (`id`, `nom`, `matiere`) VALUES
(1, 'ALVEZ', 'PHY.CHIMIE'),
(2, 'ANDREU', 'LET ESPAGN'),
(3, 'ARENY', 'catala'),
(4, 'ARMENDARES', 'E. P. S'),
(5, 'ARRIBILLAGA SALES', 'HGA'),
(6, 'AUBERT', 'TECHNOLOGI'),
(7, 'BABI', 'ARTS PLAST'),
(8, 'BADIA', 'LET MODERN'),
(9, 'BAILLAT', 'HIST. GEO.'),
(10, 'BARSELO', 'HIST. GEO.'),
(11, 'BAUDOUY', 'BIOTECHNOL'),
(12, 'BEDIN', 'E. P. S'),
(13, 'BEHAGUE', 'LETT CLASS'),
(14, 'BERNAT GABRIEL', 'MATHEMATIQ'),
(15, 'BERT', 'PHILOSOPHI'),
(16, 'BERTHOLLET', 'E. P. S'),
(17, 'BIAU', 'ECO.GE.GA'),
(18, 'BIDON', 'DESSIN ART'),
(19, 'BIRAGUE-CAVALLIE', 'BIOTECHNOL'),
(20, 'BLANCHARD PAGES', 'HIST. GEO.'),
(21, 'BLANCHET', 'LET MODERN'),
(22, 'BLANCHET', 'LET.HIS.GE'),
(23, 'BOICHARD', 'BIOTECHNOL'),
(24, 'BOIX', 'HGA'),
(25, 'BOIXAREU', 'HGA'),
(26, 'BORDATO', 'MATHEMATIQ'),
(27, 'BOUDEY', 'LET.HIS.GE'),
(28, 'BOURCEREAU', 'S. V. T.'),
(29, 'BRIANTAIS', 'ANGLAIS'),
(30, 'BUSATTO', 'ECO.GE.COM'),
(31, 'BUTHIGIEG', 'LET MODERN'),
(32, 'CABANNE', 'ECO.GE.FIN'),
(33, 'CACERES', 'catala'),
(34, 'CALL', 'HIST. GEO.'),
(35, 'CALVO', 'catala'),
(36, 'CALVO BORONAT', 'S. V. T.'),
(37, 'CAMSUZA', 'E. P. S'),
(38, 'CANTE', 'SEGPA EREA'),
(39, 'CAPARROS MARTINEZ', 'MATHEMATIQ'),
(40, 'CASALPRIM', 'catala'),
(41, 'CASANOVA', 'LET.HIS.GE'),
(42, 'CASANOVA', 'ANGLAIS'),
(43, 'CATARINO FERNANDES', 'E. P. S'),
(44, 'CELIE', 'ECO.GE.COM'),
(45, 'COMBES', 'ECO.GE.COM'),
(46, 'COMES', 'catala'),
(47, 'DA CUNHA VELHO PIRES', 'PORTUGAIS'),
(48, 'DAUCH', 'S. V. T.'),
(49, 'DE SOUSA ABREU', 'PORTUGAIS'),
(50, 'DELERIS', 'E. P. S'),
(51, 'DENAT', 'E. P. S'),
(52, 'DESERT', 'LET MODERN'),
(53, 'DETCHEVERRY', 'SEGPA EREA'),
(54, 'DHENIN', 'MATHEMATIQ'),
(55, 'DJAKOVIC', 'LET ANGLAI'),
(56, 'DRUESNES', 'HIST. GEO.'),
(57, 'ESPOT VIMARD', 'ESPAGNOL'),
(58, 'FAJOLLE', 'G.ELECTROT'),
(59, 'FARITIET', 'S. V. T.'),
(60, 'FAUROUX', 'HIST. GEO.'),
(61, 'FENES', 'catala'),
(62, 'FERREOL', 'BIOTECHNOL'),
(63, 'FIGUERAS', 'catala'),
(64, 'FITE', 'HGA'),
(65, 'FIX', 'H.TECH.CUL'),
(66, 'FIX-BORDIER', 'ECO.GE.GA'),
(67, 'FLORIACH', 'PHY.CHIMIE'),
(68, 'FORDIN', 'PHY.CHIMIE'),
(69, 'FOUILLEUL', 'H.SERV.COM'),
(70, 'GAHETE', 'LETT CLASS'),
(71, 'GAMBADE', 'LETT CLASS'),
(72, 'GILABERT PEREZAGUA', 'ESPAGNOL'),
(73, 'GIRARD', 'LET.HIS.GE'),
(74, 'GOMEZ MARQUEZ', 'MATH.SC.PH'),
(75, 'GOVIGNON', 'S. V. T.'),
(76, 'GREFFIER', 'ECO.GE.COM'),
(77, 'GREFFIER', 'ANGLAIS'),
(78, 'GREFFIER', 'E. P. S'),
(79, 'GUERRERO', 'MATHEMATIQ'),
(80, 'GUYOMARD', 'LET MODERN'),
(81, 'ILY', 'H.TECH.CUL'),
(82, 'JANY', 'MATHEMATIQ'),
(83, 'JIMENEZ', 'LET ESPAGN'),
(84, 'JUNYENT', 'ESPAGNOL'),
(85, 'KETZINGER', 'H.SERV.COM'),
(86, 'KURAS', 'ECO.GE.VEN'),
(87, 'LABOUTELEY', 'ANGLAIS'),
(88, 'LABOUTELEY', 'E. P. S'),
(89, 'LAFITTE', 'TECHNOLOGI'),
(90, 'LAFITTE', 'PHY.CHIMIE'),
(91, 'LAFITTE', 'ANGLAIS'),
(92, 'LAO', 'HIST. GEO.'),
(93, 'LEACHE', 'ESPAGNOL'),
(94, 'LEON', 'catala'),
(95, 'MANSILLA SALINAS', 'HGA'),
(96, 'MARSOL', 'catala'),
(97, 'MARTIN CALVO', 'ESPAGNOL'),
(98, 'MARTINEZ MORA', 'HGA'),
(99, 'MARTRENCHARD', 'LET ANGLAI'),
(100, 'MARTY', 'HGA'),
(101, 'MASSON', 'ANGLAIS'),
(102, 'MENANT', 'SC.ECO.SOC'),
(103, 'MESTRE', 'catala'),
(104, 'MICHARD', 'ARTS PLAST'),
(105, 'MILLET', 'LET MODERN'),
(106, 'MINGAM MORTES', 'LET MODERN'),
(107, 'MOGUEL', 'MATHEMATIQ'),
(108, 'MORTES BOUZAS', 'ESPAGNOL'),
(109, 'MOUMEN', 'ECO.GE.VEN'),
(110, 'MOUNIER', 'S. V. T.'),
(111, 'MOURET', 'TECHNOLOGI'),
(112, 'MOURET', 'MATHEMATIQ'),
(113, 'MUR', 'ECO.GE.GA'),
(114, 'NEVES', 'LET MODERN'),
(115, 'NOGUE', 'catala'),
(116, 'NOGUER', 'HGA'),
(117, 'NOGUER', 'catala'),
(118, 'NOGUERA', 'MATH.SC.PH'),
(119, 'OLIVA BARTOLOME', 'PHILOSOPHI'),
(120, 'ORDONEZ ADELLACH', 'MATHEMATIQ'),
(121, 'PAGES', 'S. V. T.'),
(122, 'PALUMBO', 'MATHEMATIQ'),
(123, 'PASSERON', 'SEGPA EREA'),
(124, 'PENIN-PEYTA', 'GENIE THER'),
(125, 'PERES', 'G.ELECTROT'),
(126, 'PERRIN', 'MATHEMATIQ'),
(127, 'PETIT', 'ANGLAIS'),
(128, 'PINCHON', 'PHY.CHIMIE'),
(129, 'PONS CAPARROS', 'MATHEMATIQ'),
(130, 'PONS IBANEZ', 'MATHEMATIQ'),
(131, 'POUEYMIRO', 'ANGLAIS'),
(132, 'PUJOL', 'PHY.CHIMIE'),
(133, 'RAHMSTORF', 'SEGPA EREA'),
(134, 'RENAUT', 'LET MODERN'),
(135, 'REY', 'ANGLAIS'),
(136, 'RIBA CASAL', 'LET MODERN'),
(137, 'RIBO', 'catala'),
(138, 'RIBOT PALUMBO', 'HIST. GEO.'),
(139, 'RICART', 'catala'),
(140, 'ROCANIERES', 'LETT CLASS'),
(141, 'ROCANIERES', 'ANGLAIS'),
(142, 'ROCHEDREUX', 'ARTS PLAST'),
(143, 'ROGUE', 'E. P. S'),
(144, 'ROSSI', 'E. P. S'),
(145, 'ROUCH', 'HIST. GEO.'),
(146, 'ROURE', 'catala'),
(147, 'RUINART DE BRIMONT', 'LET MODERN'),
(148, 'SANCHEZ', 'ESPAGNOL'),
(149, 'SAURAT', 'ANGLAIS'),
(150, 'SEBAH', 'PHY.CHIMIE'),
(151, 'SINFREU', 'catala'),
(152, 'SOURIAC', 'MATH.SC.PH'),
(153, 'STRAULINO', 'ECO.GE.GA'),
(154, 'TANG-MOIRAF', 'ECO.GE.VEN'),
(155, 'TORRES', 'catala'),
(156, 'TOUTON', 'HIST. GEO.'),
(157, 'TUDO GERMA', 'EDU MUSICA'),
(158, 'VAILLS', 'EDU MUSICA'),
(159, 'VALLS', 'catala'),
(160, 'VANNEREAU', 'TECHNOLOGI'),
(161, 'VIELLET', 'LET MODERN');

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
(1, 'Jany', 1, 'NSI', 'M'),
(2, 'Bert', 2, 'Philosophie', 'M'),
(3, 'Oliva', 2, 'Philosophie', 'M');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `liste_profs`
--
ALTER TABLE `liste_profs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `professeurs_absents`
--
ALTER TABLE `professeurs_absents`
  ADD PRIMARY KEY (`id_prof`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `liste_profs`
--
ALTER TABLE `liste_profs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT pour la table `professeurs_absents`
--
ALTER TABLE `professeurs_absents`
  MODIFY `id_prof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
