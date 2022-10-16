-- Adminer 4.8.1 MySQL 5.5.5-10.9.3-MariaDB-1:10.9.3+maria~ubu2204 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `data`;
CREATE DATABASE `data` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `data`;

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE `utilisateur` (
                               `id` int(11) NOT NULL AUTO_INCREMENT,
                               `pseudo` varchar(100) DEFAULT NULL,
                               `mdp` varchar(255) DEFAULT NULL,
                               PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO `utilisateur` (`id`, `pseudo`, `mdp`) VALUES
                                                      (1,	'francis',	'toto'),
                                                      (2,	'Jean Claude',	NULL),
                                                      (3,	'fafretrezt',	'ztreztreztrez');

-- 2022-10-15 11:43:01

-- Adminer 4.8.1 MySQL 5.5.5-10.9.3-MariaDB-1:10.9.3+maria~ubu2204 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `messagerie`;
CREATE DATABASE `messagerie` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `messagerie`;

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
                           `id` int(11) NOT NULL AUTO_INCREMENT,
                           `message` text NOT NULL,
                           `pseudo` text NOT NULL,
                           PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

INSERT INTO `message` (`id`, `message`, `pseudo`) VALUES
                                                      (21,	'coucou',	'brigitte'),
                                                      (22,	'hello brigitte !',	'francois');

-- 2022-10-16 09:27:12