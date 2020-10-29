# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.27)
# Database: db_sample_product
# Generation Time: 2020-10-29 01:18:26 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table app_master_product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `app_master_product`;

CREATE TABLE `app_master_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_product` int(11) DEFAULT NULL,
  `barcode_number` char(20) DEFAULT NULL,
  `nama_product` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT '0',
  `masa_simpan` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `kode_barang` (`kode_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `app_master_product` WRITE;
/*!40000 ALTER TABLE `app_master_product` DISABLE KEYS */;

INSERT INTO `app_master_product` (`id`, `kode_product`, `barcode_number`, `nama_product`, `harga`, `masa_simpan`, `created_at`)
VALUES
	(7,565421,'31509037577 7','masker baru',0,2,'2020-10-29 07:24:08'),
	(8,990088,'75362903382 8','cream muka lama',0,1,'2020-10-29 07:25:46'),
	(9,990099,'47668478234 9','TEST',0,1,'2020-10-29 07:43:20'),
	(10,889733,'95669597222 10','cream muka',0,1,'2020-10-29 07:45:29'),
	(11,778763,'10390285790 11','serum',0,2,'2020-10-29 07:47:38'),
	(12,123344,'89893619911 12','eva',0,2,'2020-10-29 08:12:38');

/*!40000 ALTER TABLE `app_master_product` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table app_sample_product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `app_sample_product`;

CREATE TABLE `app_sample_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_product` int(11) DEFAULT NULL,
  `status` varchar(30) DEFAULT '1' COMMENT '0 = expired, 1 ready',
  `expired_date` date DEFAULT NULL,
  `berita_acara` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `kode_barang` (`kode_product`),
  CONSTRAINT `barang` FOREIGN KEY (`kode_product`) REFERENCES `app_master_product` (`kode_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `app_sample_product` WRITE;
/*!40000 ALTER TABLE `app_sample_product` DISABLE KEYS */;

INSERT INTO `app_sample_product` (`id`, `kode_product`, `status`, `expired_date`, `berita_acara`, `created_at`)
VALUES
	(17,778763,'1','2020-10-30',NULL,'2020-10-29 08:10:26'),
	(18,123344,'1','2020-11-26',NULL,'2020-10-29 08:13:23');

/*!40000 ALTER TABLE `app_sample_product` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table app_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `app_users`;

CREATE TABLE `app_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_role` (`role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `app_users` WRITE;
/*!40000 ALTER TABLE `app_users` DISABLE KEYS */;

INSERT INTO `app_users` (`id`, `role`, `nama`, `email`, `password`)
VALUES
	(7,'admin','admin','admin@gmail.com','202cb962ac59075b964b07152d234b70');

/*!40000 ALTER TABLE `app_users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
