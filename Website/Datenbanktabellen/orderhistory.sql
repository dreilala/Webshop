-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 06. Jul 2013 um 01:01
-- Server Version: 5.5.27
-- PHP-Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `mysql`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orderhistory`
--

CREATE TABLE IF NOT EXISTS `orderhistory` (
  `bestellId` int(64) NOT NULL AUTO_INCREMENT,
  `id` int(30) NOT NULL,
  `product` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `value` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`bestellId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Daten für Tabelle `orderhistory`
--

INSERT INTO `orderhistory` (`bestellId`, `id`, `product`, `value`, `date`) VALUES
(1, 2, 'Testproduct1;Tesrodukt2', '40;20', '2013-07-03 08:33:43'),
(2, 2, 'Produkt3;Produkt4;Testprodukt1', '4;16;12', '2013-07-03 08:31:37'),
(3, 2, 'Produk3;Produkt4;Testprodukt1', '4;16;12', '2013-07-03 08:32:56'),
(4, 5, 'Produkt3;Produkt4;Testprodukt1', '4;16;12', '2013-07-03 08:31:43'),
(5, 4, 'adsf', 'asdf', '2013-07-03 08:45:32');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
