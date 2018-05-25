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

-- Dumping database structure for db_shop
CREATE DATABASE IF NOT EXISTS `db_shop` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_shop`;


-- Dumping structure for table db_shop.tbl_admin
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_shop.tbl_admin: 1 rows
DELETE FROM `tbl_admin`;
/*!40000 ALTER TABLE `tbl_admin` DISABLE KEYS */;
INSERT INTO `tbl_admin` (`id`, `username`, `password`) VALUES
	(1, 'admin', '123');
/*!40000 ALTER TABLE `tbl_admin` ENABLE KEYS */;


-- Dumping structure for table db_shop.tbl_books
CREATE TABLE IF NOT EXISTS `tbl_books` (
  `bookId` int(11) NOT NULL AUTO_INCREMENT,
  `bookName` varchar(200) NOT NULL,
  `authorName` varchar(500) NOT NULL,
  PRIMARY KEY (`bookId`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table db_shop.tbl_books: 1 rows
DELETE FROM `tbl_books`;
/*!40000 ALTER TABLE `tbl_books` DISABLE KEYS */;
INSERT INTO `tbl_books` (`bookId`, `bookName`, `authorName`) VALUES
	(13, 'Computer Fundamentals', 'DR. M. Lutfar Rahman');
/*!40000 ALTER TABLE `tbl_books` ENABLE KEYS */;


-- Dumping structure for table db_shop.tbl_branch
CREATE TABLE IF NOT EXISTS `tbl_branch` (
  `branchId` int(11) NOT NULL AUTO_INCREMENT,
  `branchName` varchar(150) NOT NULL,
  `branchAddress` varchar(300) NOT NULL DEFAULT '0',
  PRIMARY KEY (`branchId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_shop.tbl_branch: ~1 rows (approximately)
DELETE FROM `tbl_branch`;
/*!40000 ALTER TABLE `tbl_branch` DISABLE KEYS */;
INSERT INTO `tbl_branch` (`branchId`, `branchName`, `branchAddress`) VALUES
	(1, 'GEC', 'GEC Circle'),
	(4, 'test', 'test');
/*!40000 ALTER TABLE `tbl_branch` ENABLE KEYS */;


-- Dumping structure for table db_shop.tbl_category
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `catId` int(11) NOT NULL AUTO_INCREMENT,
  `catName` varchar(255) NOT NULL,
  PRIMARY KEY (`catId`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table db_shop.tbl_category: 13 rows
DELETE FROM `tbl_category`;
/*!40000 ALTER TABLE `tbl_category` DISABLE KEYS */;
INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
	(1, 'Science fiction'),
	(2, 'Drama'),
	(3, 'Action and Adventure'),
	(4, 'Romance'),
	(5, 'History'),
	(6, 'Health'),
	(7, 'Travel'),
	(8, 'Math'),
	(9, 'Dictionaries'),
	(10, 'Journals'),
	(11, 'Biographies'),
	(17, 'Fantasy'),
	(19, 'test');
/*!40000 ALTER TABLE `tbl_category` ENABLE KEYS */;


-- Dumping structure for table db_shop.tbl_events
CREATE TABLE IF NOT EXISTS `tbl_events` (
  `eventId` int(11) NOT NULL AUTO_INCREMENT,
  `eventName` varchar(200) NOT NULL,
  `eventDescription` varchar(500) NOT NULL,
  PRIMARY KEY (`eventId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table db_shop.tbl_events: ~11 rows (approximately)
DELETE FROM `tbl_events`;
/*!40000 ALTER TABLE `tbl_events` DISABLE KEYS */;
INSERT INTO `tbl_events` (`eventId`, `eventName`, `eventDescription`) VALUES
	(1, 'event Nam', 'Event Description Event Description Event Description Event Description Event Description Event Description Event Description Event Descriptio'),
	(2, 'event Name', 'Event Description Event Description Event Description Event Description Event Description Event Description Event Description Event Description'),
	(3, 'event Name', 'Event Description Event Description Event Description Event Description Event Description Event Description Event Description Event Description'),
	(4, 'event Name', 'Event Description Event Description Event Description Event Description Event Description Event Description Event Description Event Description'),
	(5, 'event Name', 'Event Description Event Description Event Description Event Description Event Description Event Description Event Description Event Description'),
	(6, 'event Name', 'Event Description Event Description Event Description Event Description Event Description Event Description Event Description Event Description'),
	(7, 'event Name', 'Event Description Event Description Event Description Event Description Event Description Event Description Event Description Event Description'),
	(8, 'event Name', 'Event Description Event Description Event Description Event Description Event Description Event Description Event Description Event Description'),
	(9, 'Test', ''),
	(10, 'Test', 'Test'),
	(11, 'Test', 'Test');
/*!40000 ALTER TABLE `tbl_events` ENABLE KEYS */;


-- Dumping structure for table db_shop.tbl_offers
CREATE TABLE IF NOT EXISTS `tbl_offers` (
  `offerId` int(11) NOT NULL AUTO_INCREMENT,
  `offerName` varchar(200) NOT NULL,
  `offerDescription` varchar(500) NOT NULL,
  PRIMARY KEY (`offerId`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table db_shop.tbl_offers: 10 rows
DELETE FROM `tbl_offers`;
/*!40000 ALTER TABLE `tbl_offers` DISABLE KEYS */;
INSERT INTO `tbl_offers` (`offerId`, `offerName`, `offerDescription`) VALUES
	(1, 'Offer Nam', 'Offer Description Offer Description Offer Description Offer Description Offer Description Offer Description Offer Descriptio'),
	(2, 'Offer Name', 'Offer Description Offer Description Offer Description Offer Description Offer Description Offer Description Offer Description'),
	(3, 'Offer Name', 'Offer Description Offer Description Offer Description Offer Description Offer Description Offer Description Offer Description'),
	(4, 'Offer Name', 'Offer Description Offer Description Offer Description Offer Description Offer Description Offer Description Offer Description'),
	(5, 'Offer Name', 'Offer Description Offer Description Offer Description Offer Description Offer Description Offer Description Offer Description'),
	(6, 'Offer Name', 'Offer Description Offer Description Offer Description Offer Description Offer Description Offer Description Offer Description'),
	(7, 'Offer Name', 'Offer Description Offer Description Offer Description Offer Description Offer Description Offer Description Offer Description'),
	(8, 'Offer Name', 'Offer Description Offer Description Offer Description Offer Description Offer Description Offer Description Offer Description'),
	(11, 'test', 'test'),
	(12, 'test', 'test');
/*!40000 ALTER TABLE `tbl_offers` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
