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
/*!40000 ALTER TABLE `absences` DISABLE KEYS */;
/*!40000 ALTER TABLE `absences` ENABLE KEYS */;

-- Listage de la structure de la table tidal. cantine
CREATE TABLE IF NOT EXISTS `cantine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `semaine` varchar(1) NOT NULL DEFAULT 'A',
  `jour` int(1) NOT NULL DEFAULT 0,
  `horaire` int(1) NOT NULL DEFAULT 0,
  `classes` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table tidal.cantine : ~40 rows (environ)
/*!40000 ALTER TABLE `cantine` DISABLE KEYS */;
INSERT INTO `cantine` (`id`, `semaine`, `jour`, `horaire`, `classes`) VALUES
	(1, 'A', 1, 1, ''),
	(2, 'A', 1, 2, ''),
	(3, 'A', 1, 3, ''),
	(4, 'A', 1, 4, ''),
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
	(24, 'B', 1, 4, ''),
	(25, 'B', 2, 1, ''),
	(26, 'B', 2, 2, ''),
	(27, 'B', 2, 3, ''),
	(28, 'B', 2, 4, ''),
	(29, 'B', 3, 1, ''),
	(30, 'B', 3, 2, ''),
	(31, 'B', 3, 3, ''),
	(32, 'B', 3, 4, ''),
	(33, 'B', 4, 1, ''),
	(34, 'B', 4, 2, ''),
	(35, 'B', 4, 3, ''),
	(36, 'B', 4, 4, ''),
	(37, 'B', 5, 1, ''),
	(38, 'B', 5, 2, ''),
	(39, 'B', 5, 3, ''),
	(40, 'B', 5, 4, '');
/*!40000 ALTER TABLE `cantine` ENABLE KEYS */;

-- Listage de la structure de la table tidal. semaines
CREATE TABLE IF NOT EXISTS `semaines` (
  `semaine` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT 0,
  PRIMARY KEY (`semaine`),
  KEY `semaine` (`semaine`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table tidal.semaines : ~9 rows (environ)
/*!40000 ALTER TABLE `semaines` DISABLE KEYS */;
INSERT INTO `semaines` (`semaine`, `type`) VALUES
	(1, 0),
	(2, 0),
	(3, 0),
	(4, 0),
	(5, 0),
	(6, 0),
	(7, 0),
	(8, 0),
	(9, 0),
	(10, 0),
	(11, 0),
	(12, 0),
	(13, 0),
	(14, 0),
	(15, 0),
	(16, 0),
	(17, 0),
	(18, 0),
	(19, 0),
	(20, 0),
	(21, 0),
	(22, 0),
	(23, 0),
	(24, 0),
	(25, 0),
	(26, 0),
	(27, 0),
	(28, 0),
	(29, 0),
	(30, 0),
	(31, 0),
	(32, 0),
	(33, 0),
	(34, 0),
	(35, 0),
	(36, 0),
	(37, 0),
	(38, 0),
	(39, 0),
	(40, 0),
	(41, 0),
	(42, 0),
	(43, 0),
	(44, 0),
	(45, 0),
	(46, 0),
	(47, 0),
	(48, 0),
	(49, 0),
	(50, 0),
	(51, 0),
	(52, 0);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table tidal.users : ~0 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
