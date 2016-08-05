# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: snotra (MySQL 5.5.50-0ubuntu0.12.04.1)
# Database: dnd
# Generation Time: 2016-08-05 13:24:54 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table links
# ------------------------------------------------------------

DROP TABLE IF EXISTS `links`;

CREATE TABLE `links` (
  `id` char(36) NOT NULL DEFAULT '',
  `label` varchar(255) NOT NULL DEFAULT '',
  `url` text NOT NULL,
  `skill_id` char(36) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table ranks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ranks`;

CREATE TABLE `ranks` (
  `id` char(36) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `skill_id` char(36) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table skills
# ------------------------------------------------------------

DROP TABLE IF EXISTS `skills`;

CREATE TABLE `skills` (
  `id` char(36) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `talent_id` char(36) NOT NULL DEFAULT '',
  `rank_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table skills_stats
# ------------------------------------------------------------

DROP TABLE IF EXISTS `skills_stats`;

CREATE TABLE `skills_stats` (
  `skill_id` char(36) NOT NULL DEFAULT '',
  `stat_id` char(36) NOT NULL DEFAULT '',
  `score` int(11) NOT NULL,
  PRIMARY KEY (`skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table skills_tree
# ------------------------------------------------------------

DROP TABLE IF EXISTS `skills_tree`;

CREATE TABLE `skills_tree` (
  `id` char(36) NOT NULL DEFAULT '',
  `parent_id` char(36) DEFAULT NULL,
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  `skill_id` char(36) NOT NULL DEFAULT '',
  `level` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table stats
# ------------------------------------------------------------

DROP TABLE IF EXISTS `stats`;

CREATE TABLE `stats` (
  `id` char(36) NOT NULL DEFAULT '',
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table talents
# ------------------------------------------------------------

DROP TABLE IF EXISTS `talents`;

CREATE TABLE `talents` (
  `id` char(36) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` char(36) NOT NULL DEFAULT '',
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `role` varchar(20) NOT NULL DEFAULT '',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table users_skills
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users_skills`;

CREATE TABLE `users_skills` (
  `user_id` char(36) NOT NULL DEFAULT '',
  `skill_id` char(36) NOT NULL DEFAULT '',
  `rank_id` char(36) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table users_stats
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users_stats`;

CREATE TABLE `users_stats` (
  `user_id` char(36) NOT NULL DEFAULT '',
  `stat_id` char(36) NOT NULL DEFAULT '',
  `score` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
