-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 12. Jun 2013 um 09:47
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
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `strasse` varchar(32) NOT NULL,
  `ort` varchar(32) NOT NULL,
  `plz` int(32) NOT NULL,
  `tel` varchar(32) NOT NULL,
  `mail` varchar(32) NOT NULL,
  `passwd` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `name`, `strasse`, `ort`, `plz`, `tel`, `mail`, `passwd`) VALUES
(1, 'Nico Hansi', 'Jï¿½gerweg 4', 'Lassee', 2291, '069917101995', 'nico.hansi@projectaward.at', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'Vivian Redl', 'Kaiserebersdorferstraße 79/6/12', 'Wien', 1110, '06605152792', 'vivian.redl@gmx.at', '4920fbc73dc9e741e74edab01eb3e0bd'),
(3, 'Nico', 'Jägerweg 4', 'Lassee', 2291, '0699170101995', 'h.nico@aon.at', '4920fbc73dc9e741e74edab01eb3e0bd'),
(4, 'Waltraud Hansi', 'Jägerweg 4', 'Lassee', 2291, '0699170101995', 'walt.hansi@aon.at', '60474c9c10d7142b7508ce7a50acf414');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
