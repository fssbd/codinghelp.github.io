-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.9-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for codinghe_paybd
CREATE DATABASE IF NOT EXISTS `codinghe_paybd` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `codinghe_paybd`;


-- Dumping structure for table codinghe_paybd.tbcompanyinfo
CREATE TABLE IF NOT EXISTS `tbcompanyinfo` (
  `autoId` int(11) NOT NULL AUTO_INCREMENT,
  `companyName` varchar(150) NOT NULL DEFAULT '',
  `email` varchar(150) NOT NULL DEFAULT '',
  `mobile` varchar(150) NOT NULL DEFAULT '',
  `officeAddress` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`autoId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='select companyName,email,mobile,officeAddress from tbCompanyInfo';

-- Dumping data for table codinghe_paybd.tbcompanyinfo: ~0 rows (approximately)
DELETE FROM `tbcompanyinfo`;
/*!40000 ALTER TABLE `tbcompanyinfo` DISABLE KEYS */;
INSERT INTO `tbcompanyinfo` (`autoId`, `companyName`, `email`, `mobile`, `officeAddress`) VALUES
	(1, 'Best Pay BD', 'info@bestpaybd.com', '+8801829663628', 'Noapara, Raozan, Chittagong, Post Code: 4346');
/*!40000 ALTER TABLE `tbcompanyinfo` ENABLE KEYS */;


-- Dumping structure for table codinghe_paybd.tbl_admin
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table codinghe_paybd.tbl_admin: 1 rows
DELETE FROM `tbl_admin`;
/*!40000 ALTER TABLE `tbl_admin` DISABLE KEYS */;
INSERT INTO `tbl_admin` (`id`, `username`, `password`) VALUES
	(1, 'admin', '123');
/*!40000 ALTER TABLE `tbl_admin` ENABLE KEYS */;


-- Dumping structure for table codinghe_paybd.tbnoticeinfo
CREATE TABLE IF NOT EXISTS `tbnoticeinfo` (
  `autoId` int(11) NOT NULL AUTO_INCREMENT,
  `noticeName` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`autoId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='select youtube,facebook,twiter,instagram from tbSocialInfo';

-- Dumping data for table codinghe_paybd.tbnoticeinfo: ~0 rows (approximately)
DELETE FROM `tbnoticeinfo`;
/*!40000 ALTER TABLE `tbnoticeinfo` DISABLE KEYS */;
INSERT INTO `tbnoticeinfo` (`autoId`, `noticeName`) VALUES
	(1, 'Hello');
/*!40000 ALTER TABLE `tbnoticeinfo` ENABLE KEYS */;


-- Dumping structure for table codinghe_paybd.tbsocialinfo
CREATE TABLE IF NOT EXISTS `tbsocialinfo` (
  `autoId` int(11) NOT NULL AUTO_INCREMENT,
  `youtube` varchar(150) DEFAULT NULL,
  `facebook` varchar(150) DEFAULT NULL,
  `twiter` varchar(150) DEFAULT NULL,
  `instagram` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`autoId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='select youtube,facebook,twiter,instagram from tbSocialInfo';

-- Dumping data for table codinghe_paybd.tbsocialinfo: ~1 rows (approximately)
DELETE FROM `tbsocialinfo`;
/*!40000 ALTER TABLE `tbsocialinfo` DISABLE KEYS */;
INSERT INTO `tbsocialinfo` (`autoId`, `youtube`, `facebook`, `twiter`, `instagram`) VALUES
	(1, 'http://www.youtube.com/emdidar', 'http://www.facebook.com/emdidar', 'http://www.twitter.com/emdidar', 'http://www.instagram.com/emdidar');
/*!40000 ALTER TABLE `tbsocialinfo` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
