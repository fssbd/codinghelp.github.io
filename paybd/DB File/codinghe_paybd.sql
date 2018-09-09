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


-- Dumping structure for table codinghe_paybd.tbabout
CREATE TABLE IF NOT EXISTS `tbabout` (
  `autoId` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`autoId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='select autoId,description from tbAbout';

-- Dumping data for table codinghe_paybd.tbabout: ~0 rows (approximately)
DELETE FROM `tbabout`;
/*!40000 ALTER TABLE `tbabout` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbabout` ENABLE KEYS */;


-- Dumping structure for table codinghe_paybd.tbcompanyinfo
CREATE TABLE IF NOT EXISTS `tbcompanyinfo` (
  `autoId` int(11) NOT NULL AUTO_INCREMENT,
  `companyName` varchar(150) NOT NULL DEFAULT '',
  `email` varchar(150) NOT NULL DEFAULT '',
  `mobile` varchar(150) NOT NULL DEFAULT '',
  `officeAddress` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`autoId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='select companyName,email,mobile,officeAddress from tbCompanyInfo';

-- Dumping data for table codinghe_paybd.tbcompanyinfo: ~1 rows (approximately)
DELETE FROM `tbcompanyinfo`;
/*!40000 ALTER TABLE `tbcompanyinfo` DISABLE KEYS */;
INSERT INTO `tbcompanyinfo` (`autoId`, `companyName`, `email`, `mobile`, `officeAddress`) VALUES
	(1, 'Best Pay BD', 'info@bestpaybd.com', '+8801829663628', 'Noapara, Raozan, Chittagong, Post Code: 4346');
/*!40000 ALTER TABLE `tbcompanyinfo` ENABLE KEYS */;


-- Dumping structure for table codinghe_paybd.tbcurrencyinfo
CREATE TABLE IF NOT EXISTS `tbcurrencyinfo` (
  `autoId` int(11) NOT NULL AUTO_INCREMENT,
  `currencyName` varchar(100) NOT NULL,
  `isoCode` varchar(100) NOT NULL,
  `addOrLess` double NOT NULL,
  PRIMARY KEY (`autoId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='select autoId,currencyName,isoCode,addOrLess from tbCurrencyInfo';

-- Dumping data for table codinghe_paybd.tbcurrencyinfo: ~0 rows (approximately)
DELETE FROM `tbcurrencyinfo`;
/*!40000 ALTER TABLE `tbcurrencyinfo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbcurrencyinfo` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='select autoId,noticeName from tbnoticeinfo';

-- Dumping data for table codinghe_paybd.tbnoticeinfo: ~1 rows (approximately)
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


-- Dumping structure for table codinghe_paybd.tbtestimonial
CREATE TABLE IF NOT EXISTS `tbtestimonial` (
  `autoId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `comment` varchar(350) CHARACTER SET utf8 NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`autoId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='select autoId,userId,comment,image from tbTestimonial';

-- Dumping data for table codinghe_paybd.tbtestimonial: ~3 rows (approximately)
DELETE FROM `tbtestimonial`;
/*!40000 ALTER TABLE `tbtestimonial` DISABLE KEYS */;
INSERT INTO `tbtestimonial` (`autoId`, `userId`, `comment`, `image`) VALUES
	(1, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. \r\n	Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, \r\n	pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, \r\n	v', 'female.jpg'),
	(2, 2, '100% ট্রাস্টেড সাইট। তবে রেট একটু কমালে ভাল হয়। আর ফোন নাম্বার এর ইউজ না থাকলে ভাল হয়, শুধু ইমেলই যথেষ্ট বলে আমার ধারণা।', 'female.jpg'),
	(3, 3, 'Could I... BE any more happy with this company?', 'female.jpg');
/*!40000 ALTER TABLE `tbtestimonial` ENABLE KEYS */;


-- Dumping structure for table codinghe_paybd.tbuserinfo
CREATE TABLE IF NOT EXISTS `tbuserinfo` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT '0.jpg',
  `phone` varchar(100) DEFAULT NULL,
  `verification` varchar(100) DEFAULT 'no',
  `verificationId` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'active',
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userName` (`userName`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='select userId,userName,email,password,firstName,lastName,mobile,location,image,phone,verification,verificationId,status from tbUserInfo';

-- Dumping data for table codinghe_paybd.tbuserinfo: ~1 rows (approximately)
DELETE FROM `tbuserinfo`;
/*!40000 ALTER TABLE `tbuserinfo` DISABLE KEYS */;
INSERT INTO `tbuserinfo` (`userId`, `userName`, `email`, `password`, `firstName`, `lastName`, `mobile`, `location`, `image`, `phone`, `verification`, `verificationId`, `status`) VALUES
	(1, 'emdidar', 'emdidar@gmail.com', '123', 'Didarul', 'Alam', '01829663628', 'Chittagong', '1.jpg', NULL, 'no', NULL, 'active');
/*!40000 ALTER TABLE `tbuserinfo` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
