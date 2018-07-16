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

-- Dumping database structure for codinghe_store
CREATE DATABASE IF NOT EXISTS `codinghe_store` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `codinghe_store`;


-- Dumping structure for table codinghe_store.tbl_admin
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table codinghe_store.tbl_admin: 1 rows
DELETE FROM `tbl_admin`;
/*!40000 ALTER TABLE `tbl_admin` DISABLE KEYS */;
INSERT INTO `tbl_admin` (`id`, `username`, `password`) VALUES
	(1, 'admin', '123');
/*!40000 ALTER TABLE `tbl_admin` ENABLE KEYS */;


-- Dumping structure for table codinghe_store.tbl_books
CREATE TABLE IF NOT EXISTS `tbl_books` (
  `bookId` int(11) NOT NULL AUTO_INCREMENT,
  `bookName` varchar(200) NOT NULL,
  `authorName` varchar(500) NOT NULL,
  `catId` varchar(500) NOT NULL,
  `catName` varchar(500) NOT NULL,
  `price` double DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`bookId`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Dumping data for table codinghe_store.tbl_books: 1 rows
DELETE FROM `tbl_books`;
/*!40000 ALTER TABLE `tbl_books` DISABLE KEYS */;
INSERT INTO `tbl_books` (`bookId`, `bookName`, `authorName`, `catId`, `catName`, `price`, `image`) VALUES
	(25, 'Deyal', 'Humaion Ahmed', '4', 'Romance', 300, 'upload/87d6115532.jpg');
/*!40000 ALTER TABLE `tbl_books` ENABLE KEYS */;


-- Dumping structure for table codinghe_store.tbl_branch
CREATE TABLE IF NOT EXISTS `tbl_branch` (
  `branchId` int(11) NOT NULL AUTO_INCREMENT,
  `branchName` varchar(150) NOT NULL,
  `branchAddress` varchar(300) NOT NULL DEFAULT '0',
  PRIMARY KEY (`branchId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table codinghe_store.tbl_branch: ~2 rows (approximately)
DELETE FROM `tbl_branch`;
/*!40000 ALTER TABLE `tbl_branch` DISABLE KEYS */;
INSERT INTO `tbl_branch` (`branchId`, `branchName`, `branchAddress`) VALUES
	(1, 'GEC', 'GEC Circle'),
	(3, 'Andorkilla', 'Andorkilla, Chittagong');
/*!40000 ALTER TABLE `tbl_branch` ENABLE KEYS */;


-- Dumping structure for table codinghe_store.tbl_category
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `catId` int(11) NOT NULL AUTO_INCREMENT,
  `catName` varchar(255) NOT NULL,
  PRIMARY KEY (`catId`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table codinghe_store.tbl_category: 12 rows
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
	(17, 'Fantasy');
/*!40000 ALTER TABLE `tbl_category` ENABLE KEYS */;


-- Dumping structure for table codinghe_store.tbl_events
CREATE TABLE IF NOT EXISTS `tbl_events` (
  `eventId` int(11) NOT NULL AUTO_INCREMENT,
  `eventName` varchar(200) NOT NULL,
  `eventDescription` varchar(500) NOT NULL,
  PRIMARY KEY (`eventId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table codinghe_store.tbl_events: ~7 rows (approximately)
DELETE FROM `tbl_events`;
/*!40000 ALTER TABLE `tbl_events` DISABLE KEYS */;
INSERT INTO `tbl_events` (`eventId`, `eventName`, `eventDescription`) VALUES
	(1, 'event Nam', 'Event Description Event Description Event Description Event Description Event Description Event Description Event Description Event Descriptio'),
	(2, 'event Name', 'Event Description Event Description Event Description Event Description Event Description Event Description Event Description Event Description'),
	(3, 'event Name', 'Event Description Event Description Event Description Event Description Event Description Event Description Event Description Event Description'),
	(4, 'event Name', 'Event Description Event Description Event Description Event Description Event Description Event Description Event Description Event Description'),
	(5, 'event Name', 'Event Description Event Description Event Description Event Description Event Description Event Description Event Description Event Description'),
	(6, 'event Name', 'Event Description Event Description Event Description Event Description Event Description Event Description Event Description Event Description'),
	(9, '2', '2');
/*!40000 ALTER TABLE `tbl_events` ENABLE KEYS */;


-- Dumping structure for table codinghe_store.tbl_offers
CREATE TABLE IF NOT EXISTS `tbl_offers` (
  `offerId` int(11) NOT NULL AUTO_INCREMENT,
  `offerName` varchar(200) NOT NULL,
  `offerDescription` varchar(500) NOT NULL,
  PRIMARY KEY (`offerId`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table codinghe_store.tbl_offers: 8 rows
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
	(8, 'Offer Name', 'Offer Description Offer Description Offer Description Offer Description Offer Description Offer Description Offer Description');
/*!40000 ALTER TABLE `tbl_offers` ENABLE KEYS */;


-- Dumping structure for table codinghe_store.tbl_product
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `productId` int(11) NOT NULL AUTO_INCREMENT,
  `bookId` int(11) DEFAULT NULL,
  `bookName` varchar(250) DEFAULT NULL,
  `authorName` varchar(250) DEFAULT NULL,
  `catId` int(11) DEFAULT NULL,
  `catName` varchar(250) DEFAULT NULL,
  `branchId` int(11) DEFAULT NULL,
  `branchName` varchar(250) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table codinghe_store.tbl_product: ~2 rows (approximately)
DELETE FROM `tbl_product`;
/*!40000 ALTER TABLE `tbl_product` DISABLE KEYS */;
INSERT INTO `tbl_product` (`productId`, `bookId`, `bookName`, `authorName`, `catId`, `catName`, `branchId`, `branchName`, `price`, `image`) VALUES
	(11, 25, 'Deyal', 'Humaion Ahmed', 4, 'Romance', 1, 'GEC', 300, 'upload/87d6115532.jpg'),
	(12, 25, 'Deyal', 'Humaion Ahmed', 4, 'Romance', 3, 'Andorkilla', 300, 'upload/87d6115532.jpg');
/*!40000 ALTER TABLE `tbl_product` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
