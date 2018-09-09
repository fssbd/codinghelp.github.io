-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.31-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5278
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for codinghe_paybd
DROP DATABASE IF EXISTS `codinghe_paybd`;
CREATE DATABASE IF NOT EXISTS `codinghe_paybd` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `codinghe_paybd`;

-- Dumping structure for table codinghe_paybd.tbcompanyinfo
DROP TABLE IF EXISTS `tbcompanyinfo`;
CREATE TABLE IF NOT EXISTS `tbcompanyinfo` (
  `autoId` int(11) NOT NULL AUTO_INCREMENT,
  `companyName` varchar(150) NOT NULL DEFAULT '',
  `email` varchar(150) NOT NULL DEFAULT '',
  `mobile` varchar(150) NOT NULL DEFAULT '',
  `officeAddress` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`autoId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='select companyName,email,mobile,officeAddress from tbCompanyInfo';

-- Data exporting was unselected.
-- Dumping structure for table codinghe_paybd.tbcurrencyinfo
DROP TABLE IF EXISTS `tbcurrencyinfo`;
CREATE TABLE IF NOT EXISTS `tbcurrencyinfo` (
  `autoId` int(11) NOT NULL AUTO_INCREMENT,
  `currencyName` varchar(100) NOT NULL,
  `isoCode` varchar(100) NOT NULL,
  `addOrLess` double NOT NULL,
  PRIMARY KEY (`autoId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='select autoId,currencyName,isoCode,addOrLess from tbCurrencyInfo';

-- Data exporting was unselected.
-- Dumping structure for table codinghe_paybd.tbl_admin
DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table codinghe_paybd.tbnoticeinfo
DROP TABLE IF EXISTS `tbnoticeinfo`;
CREATE TABLE IF NOT EXISTS `tbnoticeinfo` (
  `autoId` int(11) NOT NULL AUTO_INCREMENT,
  `noticeName` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`autoId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='select autoId,noticeName from tbnoticeinfo';

-- Data exporting was unselected.
-- Dumping structure for table codinghe_paybd.tbsestimonials
DROP TABLE IF EXISTS `tbsestimonials`;
CREATE TABLE IF NOT EXISTS `tbsestimonials` (
  `autoId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `comment` varchar(350) CHARACTER SET utf8 NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`autoId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='select autoId,userId,comment,image from tbSestimonials';

-- Data exporting was unselected.
-- Dumping structure for table codinghe_paybd.tbsocialinfo
DROP TABLE IF EXISTS `tbsocialinfo`;
CREATE TABLE IF NOT EXISTS `tbsocialinfo` (
  `autoId` int(11) NOT NULL AUTO_INCREMENT,
  `youtube` varchar(150) DEFAULT NULL,
  `facebook` varchar(150) DEFAULT NULL,
  `twiter` varchar(150) DEFAULT NULL,
  `instagram` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`autoId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='select youtube,facebook,twiter,instagram from tbSocialInfo';

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
