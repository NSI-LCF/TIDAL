-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           10.4.21-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour tidal
CREATE DATABASE IF NOT EXISTS `tidal` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `tidal`;

-- Listage de la structure de la table tidal. absences
CREATE TABLE IF NOT EXISTS `absences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `begin_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table tidal.absences : ~0 rows (environ)
DELETE FROM `absences`;
/*!40000 ALTER TABLE `absences` DISABLE KEYS */;
/*!40000 ALTER TABLE `absences` ENABLE KEYS */;

-- Listage de la structure de la table tidal. annonces
CREATE TABLE IF NOT EXISTS `annonces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `annonce` text NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table tidal.annonces : ~0 rows (environ)
DELETE FROM `annonces`;
/*!40000 ALTER TABLE `annonces` DISABLE KEYS */;
/*!40000 ALTER TABLE `annonces` ENABLE KEYS */;

-- Listage de la structure de la table tidal. cantine
CREATE TABLE IF NOT EXISTS `cantine` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `semaine` varchar(10) NOT NULL COMMENT 'A ou B',
  `jour` int(100) NOT NULL COMMENT '1 à 5',
  `horaire` int(100) NOT NULL COMMENT '1,2,3 ou 4',
  `classes` varchar(200) NOT NULL COMMENT 'classes en passage',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table tidal.cantine : ~38 rows (environ)
DELETE FROM `cantine`;
/*!40000 ALTER TABLE `cantine` DISABLE KEYS */;
INSERT INTO `cantine` (`id`, `semaine`, `jour`, `horaire`, `classes`) VALUES
	(2, 'A', 1, 1, '1D-1C-1A'),
	(3, 'A', 1, 2, '1B-TC'),
	(4, 'A', 1, 3, 'TD-TA'),
	(5, 'A', 1, 4, 'TB'),
	(6, 'A', 2, 1, 'TB-TA'),
	(7, 'A', 2, 2, 'TD-TC'),
	(8, 'A', 2, 3, '1B-1A'),
	(9, 'A', 2, 4, '1D-1C'),
	(10, 'A', 3, 1, '1C-1A'),
	(11, 'A', 3, 2, '1D'),
	(12, 'A', 3, 3, '1B-TA-TB-TC-TD'),
	(13, 'A', 4, 1, 'TB-TA'),
	(14, 'A', 4, 2, 'TD-TC'),
	(15, 'A', 4, 3, '1B-1A'),
	(16, 'A', 4, 4, '1D-1C'),
	(17, 'A', 5, 1, '1B-1A'),
	(18, 'A', 5, 2, 'TD-TC'),
	(19, 'A', 5, 3, '1C-TB'),
	(20, 'A', 5, 4, 'TA-1D'),
	(21, 'B', 1, 1, 'TC-1B'),
	(22, 'B', 1, 2, '1A-1D-1C'),
	(23, 'B', 1, 3, 'TA-TB'),
	(24, 'B', 1, 4, 'TD'),
	(25, 'B', 2, 1, 'TC-TD'),
	(26, 'B', 2, 3, '1C-1D'),
	(27, 'B', 2, 4, '1A-1B'),
	(28, 'B', 3, 1, '1C-1D'),
	(29, 'B', 3, 2, '1A'),
	(30, 'B', 3, 3, 'TB-TC-TA-1A-TD'),
	(31, 'B', 4, 1, 'TC-TD'),
	(32, 'B', 4, 2, 'TA-TB'),
	(33, 'B', 4, 3, '1C-1D'),
	(34, 'B', 4, 4, '1A-1B'),
	(35, 'B', 5, 1, 'TC-TD'),
	(36, 'B', 5, 2, '1D-1C'),
	(37, 'B', 5, 3, 'TA-TB'),
	(38, 'B', 5, 4, '1A-1B'),
	(39, 'B', 2, 2, 'TA-TB');
/*!40000 ALTER TABLE `cantine` ENABLE KEYS */;

-- Listage de la structure de la table tidal. semaines
CREATE TABLE IF NOT EXISTS `semaines` (
  `semaine` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT 0,
  PRIMARY KEY (`semaine`),
  KEY `semaine` (`semaine`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table tidal.semaines : ~52 rows (environ)
DELETE FROM `semaines`;
/*!40000 ALTER TABLE `semaines` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `semaines` ENABLE KEYS */;

-- Listage de la structure de la table tidal. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `creation_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table tidal.users : ~2 rows (environ)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `type`, `creation_time`) VALUES
	(1, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1, '2022-06-07 16:12:59'),
	(2, 'test', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 0, '2022-06-07 16:13:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
