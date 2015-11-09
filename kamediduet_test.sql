-- --------------------------------------------------------
-- Сервер:                       127.0.0.1
-- Версія сервера:               5.5.41-log - MySQL Community Server (GPL)
-- ОС сервера:                   Win32
-- HeidiSQL Версія:              9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for kamediduetcom_yii
CREATE DATABASE IF NOT EXISTS `kamediduetcom_yii` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `kamediduetcom_yii`;


-- Dumping structure for таблиця kamediduetcom_yii.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id_categories` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(50) NOT NULL DEFAULT '0',
  `discription` varchar(600) NOT NULL DEFAULT '0',
  `icon` char(15) DEFAULT NULL,
  PRIMARY KEY (`id_categories`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for таблиця kamediduetcom_yii.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id_comments` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_posts` int(10) unsigned NOT NULL DEFAULT '0',
  `users_name` char(50) NOT NULL DEFAULT '0',
  `users_last_name` char(50) NOT NULL DEFAULT '0',
  `users_email` char(255) NOT NULL DEFAULT '0',
  `comments` tinytext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_comments`),
  KEY `FK_comments_user` (`users_name`),
  KEY `FK_comments_posts` (`id_posts`),
  CONSTRAINT `FK_comments_posts` FOREIGN KEY (`id_posts`) REFERENCES `posts` (`id_posts`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for таблиця kamediduetcom_yii.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for таблиця kamediduetcom_yii.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id_posts` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_categories` int(10) unsigned NOT NULL DEFAULT '0',
  `title` char(50) NOT NULL DEFAULT '0',
  `discription` text,
  `short_discription` char(100) NOT NULL,
  PRIMARY KEY (`id_posts`),
  KEY `FK_posts_categories` (`id_categories`),
  CONSTRAINT `FK_posts_categories` FOREIGN KEY (`id_categories`) REFERENCES `categories` (`id_categories`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for таблиця kamediduetcom_yii.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
