-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2014 at 05:01 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `telkom_lme`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_lme_main`
--

CREATE TABLE IF NOT EXISTS `tabel_lme_main` (
  `ID_LME` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ORDER` int(11) DEFAULT NULL,
  `ID_SITE` varchar(728) DEFAULT NULL,
  `NAMA_PROJECT` varchar(1024) NOT NULL,
  `PROJECT_SP` varchar(1024) NOT NULL,
  `SP` varchar(1024) NOT NULL,
  `WITEL` varchar(1024) NOT NULL,
  `ORDERS` varchar(1024) NOT NULL,
  PRIMARY KEY (`ID_LME`),
  KEY `FK_RELATIONSHIP_1` (`ID_ORDER`),
  KEY `FK_RELATIONSHIP_2` (`ID_SITE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_order`
--

CREATE TABLE IF NOT EXISTS `tabel_order` (
  `ID_ORDER` int(11) NOT NULL AUTO_INCREMENT,
  `SURAT_PESANAN` varchar(1024) NOT NULL,
  `TOC` date NOT NULL,
  PRIMARY KEY (`ID_ORDER`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tabel_order`
--

INSERT INTO `tabel_order` (`ID_ORDER`, `SURAT_PESANAN`, `TOC`) VALUES
(1, 'tzaaah', '1000-10-10');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_site`
--

CREATE TABLE IF NOT EXISTS `tabel_site` (
  `ID_SITE` varchar(728) NOT NULL,
  `NAMA_LOKASI` varchar(1024) NOT NULL,
  `ALAMAT` varchar(1024) NOT NULL,
  PRIMARY KEY (`ID_SITE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_site`
--

INSERT INTO `tabel_site` (`ID_SITE`, `NAMA_LOKASI`, `ALAMAT`) VALUES
('1', 'serang', 'rumah saya');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_lme_main`
--
ALTER TABLE `tabel_lme_main`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`ID_ORDER`) REFERENCES `tabel_order` (`ID_ORDER`),
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`ID_SITE`) REFERENCES `tabel_site` (`ID_SITE`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
