-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 19, 2020 at 02:50 AM
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
-- Table structure for table `cgg_user`
--

DROP TABLE IF EXISTS `cgg_user`;
CREATE TABLE IF NOT EXISTS `cgg_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(15) CHARACTER SET utf8 NOT NULL,
  `sobrenome` varchar(15) CHARACTER SET utf8 NOT NULL,
  `log` varchar(30) CHARACTER SET utf8 NOT NULL,
  `email` varchar(40) CHARACTER SET utf8 NOT NULL,
  `senha` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `matricula` decimal(15,0) DEFAULT NULL,
  `cargo` int(30) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cgg_user`
--

INSERT INTO `cgg_user` (`id`, `nome`, `sobrenome`, `log`, `email`, `senha`, `matricula`, `cargo`, `date`) VALUES
(1, 'AndrÃƒÂ©', 'FranÃƒÂ§a', 'andre.franca', 'andre@andre.com', '202cb962ac59075b964b07152d234b70', '1234567890', NULL, '2020-08-14 23:35:54');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
