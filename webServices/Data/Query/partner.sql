-- --------------------------------------------------------
-- Sunucu:                       160.153.162.194
-- Sunucu versiyonu:             5.5.45-cll-lve - MySQL Community Server (GPL)
-- Sunucu İşletim Sistemi:       Linux
-- HeidiSQL Sürüm:               9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- tablo yapısı dökülüyor db_mypartner.partner_details
CREATE TABLE IF NOT EXISTS `partner_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `partner_name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `mark_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_number` int(11) NOT NULL,
  `tax_department` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `partner_type_id` int(11) NOT NULL,
  `updated_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- db_mypartner.partner_details: 0 rows tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `partner_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `partner_details` ENABLE KEYS */;


-- tablo yapısı dökülüyor db_mypartner.partner_users
CREATE TABLE IF NOT EXISTS `partner_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `username` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `created_date` int(11) NOT NULL,
  `updated_date` int(11) NOT NULL,
  `last_login_date` int(11) NOT NULL,
  `device_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- db_mypartner.partner_users: 0 rows tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `partner_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `partner_users` ENABLE KEYS */;


-- tablo yapısı dökülüyor db_mypartner.partner_user_details
CREATE TABLE IF NOT EXISTS `partner_user_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `platform` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `os_version` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `device_token` text COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- db_mypartner.partner_user_details: 0 rows tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `partner_user_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `partner_user_details` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
