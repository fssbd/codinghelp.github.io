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

-- Dumping database structure for allservice
CREATE DATABASE IF NOT EXISTS `allservice` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `allservice`;


-- Dumping structure for table allservice.tbl_admin
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table allservice.tbl_admin: 1 rows
DELETE FROM `tbl_admin`;
/*!40000 ALTER TABLE `tbl_admin` DISABLE KEYS */;
INSERT INTO `tbl_admin` (`id`, `username`, `password`) VALUES
	(1, 'admin', '123');
/*!40000 ALTER TABLE `tbl_admin` ENABLE KEYS */;


-- Dumping structure for table allservice.tbservice
CREATE TABLE IF NOT EXISTS `tbservice` (
  `serviceId` int(11) NOT NULL AUTO_INCREMENT,
  `serviceName` varchar(200) NOT NULL,
  `serviceDescription` varchar(500) NOT NULL,
  PRIMARY KEY (`serviceId`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table allservice.tbservice: ~4 rows (approximately)
DELETE FROM `tbservice`;
/*!40000 ALTER TABLE `tbservice` DISABLE KEYS */;
INSERT INTO `tbservice` (`serviceId`, `serviceName`, `serviceDescription`) VALUES
	(10, 'Service One', 'Service Description..... Service Description.....Service Description..... Service Description.....Service Description..... Service Description.....Service Description..... Service Description.....'),
	(11, 'Service Two', 'Service Description..... Service Description.....Service Description..... Service Description.....Service Description..... Service Description.....Service Description..... Service Description.....'),
	(12, 'Service Three', 'Service Description..... Service Description.....Service Description..... Service Description.....Service Description..... Service Description.....Service Description..... Service Description.....'),
	(13, 'Service Four', 'Service Description..... Service Description.....Service Description..... Service Description.....Service Description..... Service Description.....Service Description..... Service Description.....');
/*!40000 ALTER TABLE `tbservice` ENABLE KEYS */;


-- Dumping structure for table allservice.tbuserinfo
CREATE TABLE IF NOT EXISTS `tbuserinfo` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `fullName` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `gender` varchar(150) DEFAULT NULL,
  `country` varchar(150) DEFAULT NULL,
  `mobile` varchar(150) DEFAULT NULL,
  `serviceId` varchar(150) DEFAULT NULL,
  `serviceName` varchar(150) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table allservice.tbuserinfo: ~3 rows (approximately)
DELETE FROM `tbuserinfo`;
/*!40000 ALTER TABLE `tbuserinfo` DISABLE KEYS */;
INSERT INTO `tbuserinfo` (`userId`, `fullName`, `email`, `gender`, `country`, `mobile`, `serviceId`, `serviceName`, `image`, `password`) VALUES
	(10, 'test', 'test@gmail.com', 'Male', 'Bangladesh', '12345', '10', 'Service One', 'images/e96dbed4b2.jpg', '123');
/*!40000 ALTER TABLE `tbuserinfo` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
