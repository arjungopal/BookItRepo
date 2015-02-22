-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2015 at 02:16 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookit`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `ISBN` varchar(13) NOT NULL,
  `AuthorName` varchar(25) NOT NULL,
  PRIMARY KEY (`ISBN`,`AuthorName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`ISBN`, `AuthorName`) VALUES
('1234', 'Vijay sivaram'),
('2000', 'Grisham'),
('2000', 'John'),
('3000', 'Sylvia Day'),
('4000', 'Clement C'),
('4000', 'Moore'),
('443434', '233'),
('4567', 'Paulo'),
('46456', '435435'),
('5000', 'Rinker'),
('5000', 'Sherri Duskey '),
('5000', 'Tom Lichtenheld'),
('6000', 'Steve'),
('69', '1'),
('79', '11'),
('hh', 'h'),
('jhj', 'j');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `ISBN` varchar(13) NOT NULL,
  `Title` varchar(40) NOT NULL,
  `Edition` varchar(10) NOT NULL,
  `Year` varchar(4) NOT NULL,
  `Price` float NOT NULL,
  `PublisherId` int(11) NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `Copies` int(11) NOT NULL,
  `Email` varchar(40) NOT NULL,
  PRIMARY KEY (`ISBN`),
  KEY `PublisherId` (`PublisherId`),
  KEY `CategoryId` (`CategoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ISBN`, `Title`, `Edition`, `Year`, `Price`, `PublisherId`, `CategoryId`, `Copies`, `Email`) VALUES
('1234', 'Mahabharat', 'First', '2000', 881, 10, 6, 0, ''),
('2000', 'GRAY MOUNTAIN', 'Second', '2013', 12, 9, 5, 2, ''),
('3000', 'CAPTIVATED BY YOU', 'First', '2011', 6, 6, 5, 9, ''),
('4000', 'NIGHT BEFORE CHRISTMAS', 'Third', '2009', 13, 6, 6, 8, ''),
('443434', '324324', '342', '2013', 2, 6, 6, 2, ''),
('4567', 'Alchemist', 'First', '1988', 20, 22, 9, 0, ''),
('46456', '5656', '54656', '2014', 55, 6, 6, 4, ''),
('5000', 'GOODNIGHT, GOODNIGHT', 'Second', '1999', 4, 10, 6, 3, ''),
('6000', 'Spiderman', 'First', '2007', 4, 9, 7, 6, ''),
('69', '69', '3', '2013', 1, 6, 6, 0, ''),
('79', '3', '32', '2011', 21, 6, 6, 12, ''),
('hh', 'hh', 'h', 'hh', 8, 6, 7, 8, ''),
('jhj', 'h', 'jh', 'jh', 8, 10, 7, 7, '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `CategoryId` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  PRIMARY KEY (`CategoryId`),
  UNIQUE KEY `Name` (`Name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryId`, `Name`) VALUES
(10, '11'),
(6, 'Bed Time Stories'),
(7, 'Comic'),
(5, 'Fiction'),
(9, 'Romance           ');

-- --------------------------------------------------------

--
-- Table structure for table `loanedbooks`
--

CREATE TABLE IF NOT EXISTS `loanedbooks` (
  `LoanNumber` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(40) NOT NULL,
  `ISBN` varchar(30) NOT NULL,
  `IssueDate` date NOT NULL,
  `DueDate` date NOT NULL,
  `ReturnDate` date DEFAULT NULL,
  `NumberOfExtension` int(11) NOT NULL,
  PRIMARY KEY (`LoanNumber`,`Email`,`ISBN`,`IssueDate`),
  KEY `Email` (`Email`),
  KEY `ISBN` (`ISBN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `loanedbooks`
--

INSERT INTO `loanedbooks` (`LoanNumber`, `Email`, `ISBN`, `IssueDate`, `DueDate`, `ReturnDate`, `NumberOfExtension`) VALUES
(11, 'asha@gmail.com', '2000', '2014-12-05', '2014-12-19', '2014-12-05', 0),
(12, 'asha@gmail.com', '4000', '2014-12-05', '2015-01-02', '2014-12-06', 2),
(13, 'asha@gmail.com', '6000', '2014-12-05', '2014-12-26', '2014-12-05', 1),
(14, 'arjun@gmail.com', '2000', '2014-12-05', '2014-12-19', '2014-12-06', 0),
(15, 'pavan@gmail.com', '5000', '2014-12-05', '2014-12-19', '2014-12-06', 0),
(16, 'pavan@gmail.com', '2000', '2014-12-05', '2014-12-19', '2014-12-06', 0),
(17, 'mani@gmail.com', '4000', '2014-12-05', '2014-12-04', '2014-12-05', 0),
(18, 'asha@gmail.com', '1234', '2014-12-05', '2014-12-26', '2014-12-06', 1),
(19, 'asha@gmail.com', '3000', '2014-12-05', '2014-12-19', '2014-12-06', 0),
(20, 'arjun@gmail.com', '1234', '2014-12-06', '2014-12-20', '2014-12-06', 0),
(21, 'arjun@gmail.com', '6000', '2014-12-06', '2014-12-20', '2014-12-06', 0),
(22, 'asha@gmail.com', '2000', '2014-12-03', '2014-12-05', '2014-12-06', 0),
(23, 'asha@gmail.com', '3000', '2014-12-05', '2014-12-07', '2014-12-06', 0),
(24, 'asha@gmail.com', '5000', '2014-12-06', '2014-12-27', NULL, 1),
(25, 'arjun@gmail.com', '4567', '2014-12-06', '2014-12-20', '2014-12-06', 0),
(26, 'arjun@gmail.com', '1234', '2014-12-06', '2014-12-20', NULL, 0),
(27, 'arjun@gmail.com', '69', '2014-12-06', '2014-12-20', NULL, 0),
(28, 'asha@gmail.com', '1234', '2014-12-06', '2014-12-20', NULL, 0),
(29, 'asha@gmail.com', '4567', '2014-12-06', '2014-12-20', NULL, 0),
(30, 'ooad@gmail.com', '1234', '2015-02-05', '2015-02-19', NULL, 0),
(31, 'ooad@gmail.com', '3000', '2015-02-05', '2015-02-19', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE IF NOT EXISTS `publisher` (
  `PublisherId` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(25) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Phone` varchar(12) NOT NULL,
  `Email` varchar(40) NOT NULL,
  PRIMARY KEY (`PublisherId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`PublisherId`, `Name`, `Address`, `Phone`, `Email`) VALUES
(6, 'Hachette Book Group', 'something,France', '212364-1200', 'Hachette@hachette.com'),
(9, 'HarperCollins', 'New York, NY 10022', '2122077000', 'harpencollins@harpercollins.com'),
(10, 'Pearson', 'Dallas,Tx', '6777999999', 'Pearson@pearson.com'),
(21, 'McGril', 'New York, NY 10022', '6866666666', 'mcgril@mcgril.com'),
(22, 'Random', 'XYZ', '8888888888', 'random@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Email` varchar(40) NOT NULL,
  `Fname` varchar(22) NOT NULL,
  `Lname` varchar(22) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Email`, `Fname`, `Lname`, `Address`, `Phone`) VALUES
('123@gmail.com', 'hg', 'hg', 'hg hg TER', '5645645666'),
('admin@library.com', 'Admin', 'Admin', 'XXXX NY NY', '8999999999'),
('arjun@gmail.com', 'Arjun', 'Gopal', 'Mccc Dallas Tx', '4777777777'),
('asha@gmail.com', 'Asha', 'Thomas', 'McCallum Dallas Tx', '7888888888'),
('mani@gmail.com', 'Mani ', 'George ', 'ABC  NY  NY ', '5778994559'),
('ooad@gmail.com', 'hghg', 'hghg', 'hghg hghg hghg', '1234567890'),
('pavan@gmail.com', 'Pavan', 'G', 'Chatham Dallas Tx', '6779999999'),
('random@gmail.com', 'Rand', 'random', 'xyz xyz xyz', '9999999999');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE IF NOT EXISTS `userlogin` (
  `Email` varchar(40) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Role` varchar(1) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`Email`, `Password`, `Role`) VALUES
('123@gmail.com', 'c1337889a5edf8dd4db7173a84741863', '1'),
('admin@library.com', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', '2'),
('arjun@gmail.com', 'b56e0b4ea4962283bee762525c2d490f', '1'),
('asha@gmail.com', 'b56e0b4ea4962283bee762525c2d490f', '1'),
('mani@gmail.com', '05950ad192c8639dfcf5674dd56e4990', '1'),
('ooad@gmail.com', 'cd84d683cc5612c69efe115c80d0b7dc', '1'),
('pavan@gmail.com', 'b56e0b4ea4962283bee762525c2d490f', '1'),
('random@gmail.com', 'b56e0b4ea4962283bee762525c2d490f', '1');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE IF NOT EXISTS `wishlist` (
  `Email` varchar(40) NOT NULL,
  `ISBN` varchar(13) NOT NULL,
  PRIMARY KEY (`Email`,`ISBN`),
  KEY `ISBN` (`ISBN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`Email`, `ISBN`) VALUES
('arjun@gmail.com', '1234'),
('ooad@gmail.com', '1234');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `author`
--
ALTER TABLE `author`
  ADD CONSTRAINT `BookISBN` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`) ON UPDATE CASCADE;

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`PublisherId`) REFERENCES `publisher` (`PublisherId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`CategoryId`) REFERENCES `category` (`CategoryId`) ON UPDATE CASCADE;

--
-- Constraints for table `loanedbooks`
--
ALTER TABLE `loanedbooks`
  ADD CONSTRAINT `loanedbooks_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `user` (`Email`),
  ADD CONSTRAINT `loanedbooks_ibfk_2` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`) ON UPDATE CASCADE;

--
-- Constraints for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD CONSTRAINT `userlogin_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `user` (`Email`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `user` (`Email`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
