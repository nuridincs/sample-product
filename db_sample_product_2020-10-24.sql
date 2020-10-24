# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.27)
# Database: db_sample_product
# Generation Time: 2020-10-24 08:16:43 +0000
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
  `nama_product` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `kode_barang` (`kode_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `app_master_product` WRITE;
/*!40000 ALTER TABLE `app_master_product` DISABLE KEYS */;

INSERT INTO `app_master_product` (`id`, `kode_product`, `nama_product`, `harga`, `created_at`)
VALUES
	(1,989432,'TEST BARANG',100000,'2020-09-06 00:00:00'),
	(2,989433,'TEST BARANG 2',500000,'2020-09-06 21:59:42'),
	(3,989434,'TEST BARANG 3',200000,'2020-09-06 21:59:42');

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
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `kode_barang` (`kode_product`),
  CONSTRAINT `barang` FOREIGN KEY (`kode_product`) REFERENCES `app_master_product` (`kode_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `app_sample_product` WRITE;
/*!40000 ALTER TABLE `app_sample_product` DISABLE KEYS */;

INSERT INTO `app_sample_product` (`id`, `kode_product`, `status`, `expired_date`, `created_at`)
VALUES
	(4,989432,'1','2020-12-01','2020-10-24 12:47:11'),
	(5,989433,'1','2020-10-30','2020-10-24 12:47:11'),
	(6,989434,'0','2020-10-01','2020-10-24 12:47:11'),
	(7,989433,'1','2020-10-28','2020-10-24 14:04:25');

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
