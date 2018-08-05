-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.31-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for db_shop
DROP DATABASE IF EXISTS `db_shop`;
CREATE DATABASE IF NOT EXISTS `db_shop` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_shop`;


-- Dumping structure for table db_shop.tbl_admin
DROP TABLE IF EXISTS `tbl_admin`;
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
DROP TABLE IF EXISTS `tbl_books`;
CREATE TABLE IF NOT EXISTS `tbl_books` (
  `bookId` int(11) NOT NULL AUTO_INCREMENT,
  `bookName` varchar(200) NOT NULL,
  `authorName` varchar(500) NOT NULL,
  `catId` varchar(500) NOT NULL,
  `catName` varchar(500) NOT NULL,
  `price` double DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`bookId`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

-- Dumping data for table db_shop.tbl_books: 30 rows
DELETE FROM `tbl_books`;
/*!40000 ALTER TABLE `tbl_books` DISABLE KEYS */;
INSERT INTO `tbl_books` (`bookId`, `bookName`, `authorName`, `catId`, `catName`, `price`, `image`) VALUES
	(32, 'Lost Symbol', 'Dan Brown', '27', 'Mystery & Crime', 600, 'upload/345f7ff810.jpg'),
	(31, 'Inferno', 'Dan Brown', '27', 'Mystery & Crime', 600, 'upload/c59403ed0e.jpg'),
	(30, 'Origin', 'Dan Brown', '27', 'Mystery & Crime', 600, 'upload/8de8c7bc44.jpg'),
	(29, 'The Da Vinci Code', 'Dan Brown', '27', 'Mystery & Crime', 600, 'upload/185cbb686d.jpg'),
	(33, 'Deception Point', 'Dan Brown', '27', 'Mystery & Crime', 600, 'upload/d35e1c8495.jpg'),
	(34, 'Oh The Glory of It All', 'Sean Wilsey', '25', 'Non-Fiction', 600, 'upload/7687d7eef6.jpg'),
	(35, 'Be Your Own Lawyer', 'Robert Murdoch', '25', 'Non-Fiction', 600, 'upload/971c80c01a.jpg'),
	(36, 'The Great Reset', 'Richard Florida', '25', 'Non-Fiction', 600, 'upload/f476cfb53f.jpg'),
	(37, '1959', 'Fred Kaplan', '25', 'Non-Fiction', 300, 'upload/78d23be844.png'),
	(38, 'Into Thin Air', 'Jon Krakauer', '25', 'Non-Fiction', 600, 'upload/805374a620.jpg'),
	(39, 'The History of Bengal', 'Charles Stewart', '38', 'History', 600, 'upload/6a688c079c.jpg'),
	(40, 'Shesher Kobita', 'Rabindranath Tagore', '37', 'Poetry', 600, 'upload/12f0faa078.jpg'),
	(41, 'Bonolota Sen', 'Jibanananda Das', '37', 'Poetry', 600, 'upload/479c41584e.jpg'),
	(42, 'The Art of Photography', 'Bruce Barnbaum', '22', 'Arts & Photography', 600, 'upload/a5da86880d.jpg'),
	(43, 'Kite runner', 'Khaled Hosseini', '24', 'Literature & Fiction', 600, 'upload/e38fcf0202.jpg'),
	(44, 'This Road I Ride', 'Juliana Buhring', '23', 'Biographies & Memoirs', 600, 'upload/2ddbc4ae3c.jpg'),
	(45, 'The Unfinished Memoirs', 'Sheikh Mujibur Rahman', '23', 'Biographies & Memoirs', 600, 'upload/9fde3105e2.jpg'),
	(46, 'The Partition of Bengal', 'Debjani Sengupta', '38', 'History', 600, 'upload/1140ba2ddd.jpg'),
	(49, 'The Unforgiven', 'Daniel H. Murphy', '33', 'Science Fiction & Fantasy', 600, 'upload/c375f99fea.jpg'),
	(51, 'Pieces of infinity', 'Benedict Cross', '33', 'Science Fiction & Fantasy', 600, 'upload/4935b2168b.png'),
	(52, 'Rankespiel', 'B. N. Meowhin', '33', 'Science Fiction & Fantasy', 600, 'upload/f9b4070bdd.jpg'),
	(53, 'The Autobiography of an Unknown Indian ', 'Nirad C. Chaudhuri', '23', 'Biographies & Memoirs', 600, 'upload/f4fd754391.jpeg'),
	(54, 'What We Set In Motion', 'Stephanie Austin Edwards', '24', 'Literature & Fiction', 600, 'upload/cd67221e8c.jpg'),
	(55, 'Rupasi Bangla', 'Jibanananda Das', '37', 'Poetry', 600, 'upload/17ab6a21f7.jpg'),
	(56, 'Charpatra', 'Sukanta Bhattacharya', '37', 'Poetry', 600, 'upload/d87bc7e1e1.jpg'),
	(57, 'History of Modern Architecture', 'Richard Phillips', '21', 'Architecture', 600, 'upload/d113649305.jpg'),
	(58, 'The Muslim Heritage of Bengal', 'Muhammad Mojlum Khan', '38', 'History', 600, 'upload/580fb3192f.jpg'),
	(59, 'Earth Is My Witness', 'Wade Davis', '22', 'Arts & Photography', 600, 'upload/7a4f384764.jpg'),
	(60, 'What Architecture Means', 'Denise Costanzo', '21', 'Architecture', 600, 'upload/a2b2260bd0.jpg'),
	(61, 'Bangladesh', 'Mahmudul Huque', '38', 'History', 600, 'upload/6a2845f7a3.jpg');
/*!40000 ALTER TABLE `tbl_books` ENABLE KEYS */;


-- Dumping structure for table db_shop.tbl_branch
DROP TABLE IF EXISTS `tbl_branch`;
CREATE TABLE IF NOT EXISTS `tbl_branch` (
  `branchId` int(11) NOT NULL AUTO_INCREMENT,
  `branchName` varchar(150) NOT NULL,
  `branchAddress` varchar(300) NOT NULL DEFAULT '0',
  PRIMARY KEY (`branchId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_shop.tbl_branch: ~2 rows (approximately)
DELETE FROM `tbl_branch`;
/*!40000 ALTER TABLE `tbl_branch` DISABLE KEYS */;
INSERT INTO `tbl_branch` (`branchId`, `branchName`, `branchAddress`) VALUES
	(1, 'GEC', 'GEC Circle, Chittagong.'),
	(3, 'Andorkilla', 'Andorkilla, Chittagong.'),
	(4, 'Halishohor', 'Halishohor, Chittagong.');
/*!40000 ALTER TABLE `tbl_branch` ENABLE KEYS */;


-- Dumping structure for table db_shop.tbl_category
DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `catId` int(11) NOT NULL AUTO_INCREMENT,
  `catName` varchar(255) NOT NULL,
  PRIMARY KEY (`catId`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- Dumping data for table db_shop.tbl_category: 10 rows
DELETE FROM `tbl_category`;
/*!40000 ALTER TABLE `tbl_category` DISABLE KEYS */;
INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
	(38, 'History'),
	(37, 'Poetry'),
	(34, 'Sports & Adventure'),
	(33, 'Science Fiction & Fantasy'),
	(21, 'Architecture'),
	(22, 'Arts & Photography'),
	(23, 'Biographies & Memoirs'),
	(24, 'Literature & Fiction'),
	(25, 'Non-Fiction'),
	(27, 'Mystery & Crime');
/*!40000 ALTER TABLE `tbl_category` ENABLE KEYS */;


-- Dumping structure for table db_shop.tbl_events
DROP TABLE IF EXISTS `tbl_events`;
CREATE TABLE IF NOT EXISTS `tbl_events` (
  `eventId` int(11) NOT NULL AUTO_INCREMENT,
  `eventName` varchar(200) NOT NULL,
  `eventDescription` varchar(500) NOT NULL,
  PRIMARY KEY (`eventId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table db_shop.tbl_events: ~4 rows (approximately)
DELETE FROM `tbl_events`;
/*!40000 ALTER TABLE `tbl_events` DISABLE KEYS */;
INSERT INTO `tbl_events` (`eventId`, `eventName`, `eventDescription`) VALUES
	(3, 'Event Name', 'Event Description'),
	(4, 'Event Name', 'Event Description'),
	(5, 'Event Name', 'Event Description'),
	(6, 'Event Name', 'Event Description'),
	(9, 'Event Name', 'Event Description');
/*!40000 ALTER TABLE `tbl_events` ENABLE KEYS */;


-- Dumping structure for table db_shop.tbl_isbn
DROP TABLE IF EXISTS `tbl_isbn`;
CREATE TABLE IF NOT EXISTS `tbl_isbn` (
  `isbnId` int(11) NOT NULL AUTO_INCREMENT,
  `isbnCode` varchar(150) DEFAULT NULL,
  `bookId` int(11) DEFAULT NULL,
  `bookName` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`isbnId`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

-- Dumping data for table db_shop.tbl_isbn: ~26 rows (approximately)
DELETE FROM `tbl_isbn`;
/*!40000 ALTER TABLE `tbl_isbn` DISABLE KEYS */;
INSERT INTO `tbl_isbn` (`isbnId`, `isbnCode`, `bookId`, `bookName`) VALUES
	(14, '001', 32, 'Lost Symbol'),
	(20, '002', 31, 'Inferno'),
	(21, '003', 30, 'Origin'),
	(22, '004', 29, 'The Da Vinci Code'),
	(23, '005', 33, 'Deception Point'),
	(24, '006', 34, 'Oh The Glory of It All'),
	(25, '007', 35, 'Be Your Own Lawyer'),
	(26, '008', 36, 'The Great Reset'),
	(27, '009', 37, '1959'),
	(28, '010', 38, 'Into Thin Air'),
	(29, '011', 39, 'The History of Bengal'),
	(30, '012', 40, 'Shesher Kobita'),
	(31, '013', 41, 'Bonolota Sen'),
	(32, '014', 42, 'The Art of Photography'),
	(33, '015', 43, 'Kite runner'),
	(34, '016', 44, 'This Road I Ride'),
	(35, '017', 45, 'The Unfinished Memoirs'),
	(36, '018', 46, 'The Partition of Bengal'),
	(37, '019', 49, 'The Unforgiven'),
	(38, '020', 51, 'Pieces of infinity'),
	(39, '021', 52, 'Rankespiel'),
	(40, '022', 53, 'The Autobiography of an Unknown Indian '),
	(41, '023', 54, 'What We Set In Motion'),
	(42, '024', 55, 'Rupasi Bangla'),
	(43, '025', 56, 'Charpatra'),
	(44, '026', 57, 'History of Modern Architecture'),
	(45, '027', 58, 'The Muslim Heritage of Bengal'),
	(46, '028', 59, 'Earth Is My Witness'),
	(47, '029', 60, 'What Architecture Means'),
	(48, '030', 61, 'Bangladesh');
/*!40000 ALTER TABLE `tbl_isbn` ENABLE KEYS */;


-- Dumping structure for table db_shop.tbl_offers
DROP TABLE IF EXISTS `tbl_offers`;
CREATE TABLE IF NOT EXISTS `tbl_offers` (
  `offerId` int(11) NOT NULL AUTO_INCREMENT,
  `offerName` varchar(200) NOT NULL,
  `offerDescription` varchar(500) NOT NULL,
  PRIMARY KEY (`offerId`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table db_shop.tbl_offers: 5 rows
DELETE FROM `tbl_offers`;
/*!40000 ALTER TABLE `tbl_offers` DISABLE KEYS */;
INSERT INTO `tbl_offers` (`offerId`, `offerName`, `offerDescription`) VALUES
	(1, 'Offer Name', 'Offer Description'),
	(2, 'Offer Name', 'Offer Description'),
	(3, 'Offer Name', 'Offer Description'),
	(4, 'Offer Name', 'Offer Description'),
	(5, 'Offer Name', 'Offer Description');
/*!40000 ALTER TABLE `tbl_offers` ENABLE KEYS */;


-- Dumping structure for table db_shop.tbl_product
DROP TABLE IF EXISTS `tbl_product`;
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
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

-- Dumping data for table db_shop.tbl_product: ~54 rows (approximately)
DELETE FROM `tbl_product`;
/*!40000 ALTER TABLE `tbl_product` DISABLE KEYS */;
INSERT INTO `tbl_product` (`productId`, `bookId`, `bookName`, `authorName`, `catId`, `catName`, `branchId`, `branchName`, `price`, `image`) VALUES
	(19, 32, 'Lost Symbol', 'Dan Brown', 27, 'Mystery & Crime', 1, 'GEC', 600, 'upload/345f7ff810.jpg'),
	(20, 32, 'Lost Symbol', 'Dan Brown', 27, 'Mystery & Crime', 3, 'Andorkilla', 600, 'upload/345f7ff810.jpg'),
	(21, 31, 'Inferno', 'Dan Brown', 27, 'Mystery & Crime', 1, 'GEC', 600, 'upload/c59403ed0e.jpg'),
	(22, 31, 'Inferno', 'Dan Brown', 27, 'Mystery & Crime', 4, 'Halishohor', 600, 'upload/c59403ed0e.jpg'),
	(23, 30, 'Origin', 'Dan Brown', 27, 'Mystery & Crime', 1, 'GEC', 600, 'upload/8de8c7bc44.jpg'),
	(24, 30, 'Origin', 'Dan Brown', 27, 'Mystery & Crime', 3, 'Andorkilla', 600, 'upload/8de8c7bc44.jpg'),
	(25, 30, 'Origin', 'Dan Brown', 27, 'Mystery & Crime', 4, 'Halishohor', 600, 'upload/8de8c7bc44.jpg'),
	(26, 29, 'The Da Vinci Code', 'Dan Brown', 27, 'Mystery & Crime', 1, 'GEC', 600, 'upload/185cbb686d.jpg'),
	(27, 29, 'The Da Vinci Code', 'Dan Brown', 27, 'Mystery & Crime', 3, 'Andorkilla', 600, 'upload/185cbb686d.jpg'),
	(30, 29, 'The Da Vinci Code', 'Dan Brown', 27, 'Mystery & Crime', 4, 'Halishohor', 600, 'upload/185cbb686d.jpg'),
	(31, 33, 'Deception Point', 'Dan Brown', 27, 'Mystery & Crime', 1, 'GEC', 600, 'upload/d35e1c8495.jpg'),
	(32, 34, 'Oh The Glory of It All', 'Sean Wilsey', 25, 'Non-Fiction', 3, 'Andorkilla', 600, 'upload/7687d7eef6.jpg'),
	(33, 34, 'Oh The Glory of It All', 'Sean Wilsey', 25, 'Non-Fiction', 4, 'Halishohor', 600, 'upload/7687d7eef6.jpg'),
	(35, 35, 'Be Your Own Lawyer', 'Robert Murdoch', 25, 'Non-Fiction', 3, 'Andorkilla', 600, 'upload/971c80c01a.jpg'),
	(36, 35, 'Be Your Own Lawyer', 'Robert Murdoch', 25, 'Non-Fiction', 4, 'Halishohor', 600, 'upload/971c80c01a.jpg'),
	(37, 36, 'The Great Reset', 'Richard Florida', 25, 'Non-Fiction', 3, 'Andorkilla', 600, 'upload/f476cfb53f.jpg'),
	(38, 37, '1959', 'Fred Kaplan', 25, 'Non-Fiction', 3, 'Andorkilla', 300, 'upload/78d23be844.png'),
	(39, 38, 'Into Thin Air', 'Jon Krakauer', 25, 'Non-Fiction', 3, 'Andorkilla', 600, 'upload/805374a620.jpg'),
	(40, 38, 'Into Thin Air', 'Jon Krakauer', 25, 'Non-Fiction', 4, 'Halishohor', 600, 'upload/805374a620.jpg'),
	(41, 41, 'Bonolota Sen', 'Jibanananda Das', 37, 'Poetry', 1, 'GEC', 600, 'upload/479c41584e.jpg'),
	(44, 39, 'The History of Bengal', 'Charles Stewart', 38, 'History', 4, 'Halishohor', 600, 'upload/6a688c079c.jpg'),
	(45, 40, 'Shesher Kobita', 'Rabindranath Tagore', 37, 'Poetry', 3, 'Andorkilla', 600, 'upload/12f0faa078.jpg'),
	(46, 40, 'Shesher Kobita', 'Rabindranath Tagore', 37, 'Poetry', 4, 'Halishohor', 600, 'upload/12f0faa078.jpg'),
	(48, 41, 'Bonolota Sen', 'Jibanananda Das', 37, 'Poetry', 4, 'Halishohor', 600, 'upload/479c41584e.jpg'),
	(49, 42, 'The Art of Photography', 'Bruce Barnbaum', 22, 'Arts & Photography', 1, 'GEC', 600, 'upload/a5da86880d.jpg'),
	(50, 42, 'The Art of Photography', 'Bruce Barnbaum', 22, 'Arts & Photography', 3, 'Andorkilla', 600, 'upload/a5da86880d.jpg'),
	(52, 44, 'This Road I Ride', 'Juliana Buhring', 23, 'Biographies & Memoirs', 4, 'Halishohor', 600, 'upload/2ddbc4ae3c.jpg'),
	(53, 44, 'This Road I Ride', 'Juliana Buhring', 23, 'Biographies & Memoirs', 1, 'GEC', 600, 'upload/2ddbc4ae3c.jpg'),
	(54, 45, 'The Unfinished Memoirs', 'Sheikh Mujibur Rahman', 23, 'Biographies & Memoirs', 1, 'GEC', 600, 'upload/9fde3105e2.jpg'),
	(55, 45, 'The Unfinished Memoirs', 'Sheikh Mujibur Rahman', 23, 'Biographies & Memoirs', 3, 'Andorkilla', 600, 'upload/9fde3105e2.jpg'),
	(56, 45, 'The Unfinished Memoirs', 'Sheikh Mujibur Rahman', 23, 'Biographies & Memoirs', 4, 'Halishohor', 600, 'upload/9fde3105e2.jpg'),
	(57, 46, 'The Partition of Bengal', 'Debjani Sengupta', 38, 'History', 3, 'Andorkilla', 600, 'upload/1140ba2ddd.jpg'),
	(59, 49, 'The Unforgiven', 'Daniel H. Murphy', 33, 'Science Fiction & Fantasy', 3, 'Andorkilla', 600, 'upload/c375f99fea.jpg'),
	(61, 51, 'Pieces of infinity', 'Benedict Cross', 33, 'Science Fiction & Fantasy', 1, 'GEC', 600, 'upload/4935b2168b.png'),
	(62, 52, 'Rankespiel', 'B. N. Meowhin', 33, 'Science Fiction & Fantasy', 4, 'Halishohor', 600, 'upload/f9b4070bdd.jpg'),
	(63, 53, 'The Autobiography of an Unknown Indian ', 'Nirad C. Chaudhuri', 23, 'Biographies & Memoirs', 1, 'GEC', 600, 'upload/f4fd754391.jpeg'),
	(64, 54, 'What We Set In Motion', 'Stephanie Austin Edwards', 24, 'Literature & Fiction', 3, 'Andorkilla', 600, 'upload/cd67221e8c.jpg'),
	(65, 54, 'What We Set In Motion', 'Stephanie Austin Edwards', 24, 'Literature & Fiction', 4, 'Halishohor', 600, 'upload/cd67221e8c.jpg'),
	(66, 55, 'Rupasi Bangla', 'Jibanananda Das', 37, 'Poetry', 3, 'Andorkilla', 600, 'upload/17ab6a21f7.jpg'),
	(67, 55, 'Rupasi Bangla', 'Jibanananda Das', 37, 'Poetry', 1, 'GEC', 600, 'upload/17ab6a21f7.jpg'),
	(68, 56, 'Charpatra', 'Sukanta Bhattacharya', 37, 'Poetry', 3, 'Andorkilla', 600, 'upload/d87bc7e1e1.jpg'),
	(69, 57, 'History of Modern Architecture', 'Richard Phillips', 21, 'Architecture', 1, 'GEC', 600, 'upload/d113649305.jpg'),
	(70, 58, 'The Muslim Heritage of Bengal', 'Muhammad Mojlum Khan', 38, 'History', 3, 'Andorkilla', 600, 'upload/580fb3192f.jpg'),
	(71, 59, 'Earth Is My Witness', 'Wade Davis', 22, 'Arts & Photography', 4, 'Halishohor', 600, 'upload/7a4f384764.jpg'),
	(72, 60, 'What Architecture Means', 'Denise Costanzo', 21, 'Architecture', 1, 'GEC', 600, 'upload/a2b2260bd0.jpg'),
	(73, 60, 'What Architecture Means', 'Denise Costanzo', 21, 'Architecture', 3, 'Andorkilla', 600, 'upload/a2b2260bd0.jpg'),
	(74, 61, 'Bangladesh', 'Mahmudul Huque', 38, 'History', 1, 'GEC', 600, 'upload/6a2845f7a3.jpg'),
	(75, 61, 'Bangladesh', 'Mahmudul Huque', 38, 'History', 3, 'Andorkilla', 600, 'upload/6a2845f7a3.jpg'),
	(76, 61, 'Bangladesh', 'Mahmudul Huque', 38, 'History', 4, 'Halishohor', 600, 'upload/6a2845f7a3.jpg');
/*!40000 ALTER TABLE `tbl_product` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
