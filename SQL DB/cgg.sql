-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 19, 2020 at 02:49 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projeto`
--

-- --------------------------------------------------------

--
-- Table structure for table `cgg`
--

DROP TABLE IF EXISTS `cgg`;
CREATE TABLE IF NOT EXISTS `cgg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` varchar(30) CHARACTER SET utf8 NOT NULL,
  `task` varchar(10) CHARACTER SET utf8 NOT NULL,
  `apk` varchar(30) CHARACTER SET utf8 NOT NULL,
  `version` varchar(15) CHARACTER SET utf8 NOT NULL,
  `model` varchar(10) CHARACTER SET utf8 NOT NULL,
  `comment` longtext CHARACTER SET utf8 NOT NULL,
  `solution` longtext CHARACTER SET utf8,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cgg`
--

INSERT INTO `cgg` (`id`, `iduser`, `task`, `apk`, `version`, `model`, `comment`, `solution`, `date`) VALUES
(1, 'andre.franca', 'SEL-120233', 'Teste APK', '0.0.1', 'SM-013M', '34567890-\r\nwertyuio\r\nxsdcfghjklÃ§~\r\ncvbnm,.\r\n34567890', 'ploiuyhgtfrdesxazxcf\r\nçlokijuhygtfrcdfgty7u890876t5\r\n.,mnbvcxsdertyuio\r\n[´-p0o9i8u7y6trfdcghj', '2020-08-16 09:13:11'),
(7, 'andre.franca', 'SEL-00123', 'Boua', '12.23.45', 'SM-A111M', '( TRIM( TRIM( TRIM( TRIM( TRIM( TRIM( TRIM( TRIM( TRIM( TRIM( iuytrew\r\nfsfs\r\n\r\nfsfsfs\r\n\r\nsfsfsfs\r\n\r\n)))))))))))))))', NULL, '2020-08-16 09:44:23'),
(9, 'andre.franca', 'SEL-123456', 'Eita', '1.10.234', 'SM-O0015O', 'QWERTYUIOP\r\n1234567890\r\nASDFGHJKL', NULL, '2020-08-16 10:37:39'),
(11, 'andre.franca', 'SEL-678543', 'TERESA', '34.76543.01', 'SM-E334R', '56789\r\nÃ‡LKNJBVC\r\n,MNBV BVGH\r\n-098UYTFGC\r\n\r\nKJHGBBNJKLOIUY', NULL, '2020-08-17 22:55:42'),
(12, 'ze.buchudo', 'SEL-120233', 'Teste APK', '0.0.11', 'SM-013M', '34567890-\r\nwertyuio\r\nxsdcfghjklÃ§~\r\ncvbnm,.\r\n34567890', 'ploiuyhgtfrdesxazxcf\r\nçlokijuhygtfrcdfgty7u890876t5\r\n.,mnbvcxsdertyuio\r\n[´-p0o9i8u7y6trfdcghj', '2020-08-16 09:13:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cgg`
--
ALTER TABLE `cgg` ADD FULLTEXT KEY `comment` (`comment`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
