-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 10. Jun 2013 um 22:51
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
-- Tabellenstruktur für Tabelle `sortiment`
--

CREATE TABLE IF NOT EXISTS `sortiment` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `kategorie` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `art` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `preis` double NOT NULL,
  `gewicht` int(255) NOT NULL,
  `beschreibung` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `name_2` (`name`),
  KEY `kategorie` (`kategorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;

--
-- Daten für Tabelle `sortiment`
--

INSERT INTO `sortiment` (`id`, `name`, `kategorie`, `art`, `preis`, `gewicht`, `beschreibung`) VALUES
(1, 'Hühnermix', 'Hund', 'Tiefkühlware', 1.5, 500, NULL),
(2, 'Kuttelfleck', 'Hund', 'Tiefkühlware', 0.75, 500, 'Kutteln, roh, grob geschnitten, grün, ungeputzt'),
(3, 'Kuttelfleck', 'Hund', 'Tiefkühlware', 1.5, 500, 'Speisekuttel, roh, grob geschnitten, weiß, geputzt'),
(4, 'Lammfleisch', 'Hund', 'Tiefkühlware', 2.9, 500, 'roh, grob geschnitten'),
(5, 'Mischfutter', 'Hund', 'Tiefkühlware', 1.1, 500, 'Kopffleisch, Kutteln, Schlund, gekocht, grob geschnitten'),
(6, 'Pferdefleisch', 'Hund', 'Tiefkühlware', 2.9, 500, 'roh, grob geschnitten, mager'),
(7, 'Rinderkopffleisch', 'Hund', 'Tiefkühlware', 1.3, 500, 'gekocht, grob geschnitten, mager'),
(8, 'Rinderkopffleisch', 'Hund', 'Tiefkühlware', 1.2, 500, 'roh, grob geschnitten, mager, das optimale Hundefutter'),
(9, 'Rinderohren mit Fell', 'Hund', 'Tiefkühlware', 2, 2, 'roh, mit Fell, 2 Stk. pro Verpackung'),
(10, 'Putenhälse im Ganzen', 'Hund', 'Tiefkühlware', 7.9, 2000, 'tiefgekühlt, im Ganzen'),
(11, 'Gemischtes Futter', 'Hund', 'Tiefkühlware', 1.6, 1000, 'Fleischschlund, Kronfleisch, roh, grob geschnitten'),
(12, 'Hühnerhälse', 'Hund', 'Tiefkühlware', 2.6, 1000, 'roh'),
(13, 'Hühnermix', 'Hund', 'Tiefkühlware', 2.9, 1000, NULL),
(14, 'Hundewurst', 'Hund', 'Tiefkühlware', 2.2, 1000, NULL),
(15, 'Kalbsknochen', 'Hund', 'Tiefkühlware', 3.9, 2000, 'roh, im Ganzen'),
(16, 'Kuheuter', 'Hund', 'Tiefkühlware', 1.4, 1000, 'roh, grob geschnitten'),
(17, 'Kuttelfleck', 'Hund', 'Tiefkühlware', 1.4, 1000, 'Kutteln, roh, grob geschnitten, grün, ungeputzt'),
(18, 'Kuttelfleck', 'Hund', 'Tiefkühlware', 2.9, 1000, 'Speisekuttel, roh, grob geschnitten, weiß, geputzt'),
(19, 'Mischfutter', 'Hund', 'Tiefkühlware', 2, 1000, 'Kopffleisch, Kutteln, Schlund, gekocht, grob geschnitten'),
(20, 'Ohrwangerl', 'Hund', 'Tiefkühlware', 3.8, 1000, 'roh, Backenfleisch, grob geschnitten'),
(21, 'Putenfleisch', 'Hund', 'Tiefkühlware', 4.5, 1000, 'roh, grob geschnitten'),
(22, 'Rinderbeuschel', 'Hund', 'Tiefkühlware', 1.4, 1000, 'Rinderlunge, roh, grob geschnitten'),
(23, 'Rinderfleisch', 'Hund', 'Tiefkühlware', 1.9, 1000, 'roh, gehackt, Knochen'),
(24, 'Rinderherz', 'Hund', 'Tiefkühlware', 4.3, 1000, 'roh, grob geschnitten'),
(25, 'Rinderkopffleisch ', 'Hund', 'Tiefkühlware', 2.2, 1000, 'roh, grob geschnitten, mager, Tierfutter, vom Züchter empfohlen'),
(26, 'Rinderkopffleisch', 'Hund', 'Tiefkühlware', 1.5, 1000, 'roh, grob geschnitten, fett'),
(27, 'Rinderleber', 'Hund', 'Tiefkühlware', 2.5, 1000, 'roh, im Ganzen'),
(28, 'Spezialfutter', 'Hund', 'Tiefkühlware', 1.8, 1000, 'Rinderkopffleisch, Kutteln, Schlundfleisch, roh, grob geschnitten'),
(29, 'Welpenfutter', 'Hund', 'Tiefkühlware', 1.8, 1000, 'Rinderkopffleisch, Kutteln, Schlundfleisch, roh, fein faschiert, für Ihre Welpen, auch als Diätfutter für Hunde und Katzen, sowie allen Welpen'),
(30, 'Rindfleisch-Fertigmenü', 'Hund', 'Tiefkühlware/Fertigmenü', 1.8, 400, 'gekochtes Rindfleisch mit Reis und Gemüse, Fertigmenü für Ihren Liebling, verpackt in Plastikdose mit Klarsichtdeckel'),
(31, 'Reisflocken mit Gemüse', 'Hund', 'Tiefkühlware/Fertigmenü', 17, 4000, 'ohne Getreide'),
(32, 'Eintagsküken', 'Katze', 'Tiefkühlware/Fertigmenü', 1.5, 7, 'Junghühner (Eintagsküken), roh, tiefgekühlt, 7 Stk pro Packung'),
(33, 'Katzenfutter', 'Katze', 'Tiefkühlware/Fertigmenü', 0.8, 100, 'Rinderherz, roh, grob geschnitten, verpackt in Plastikbecher, das Lieblingsfutter für Ihre Katze'),
(34, 'Belohnungshappen', 'Hund', 'Leckerle', 4.9, 700, 'gepresste Hundepellets für die Zahnpflege'),
(35, 'Hundekuchen', 'Hund', 'Leckerle', 4.9, 1000, 'Hunde Biskuits, Belohnung und Zahnpflege ohne Zuckerzusatz, Vitamine, Calcium, Spurenelmente'),
(36, 'Fleckstangerl', 'Spezial', 'Kauspezialitäten', 1.4, 100, 'Kutteln (Pansen, Fleckstangerln), Heissluft getrocknet'),
(37, 'Fleckstangerl', 'Spezial', 'Kauspezialitäten', 10.9, 1000, 'Kutteln (Pansen, Fleckstangerln), Heissluft getrocknet'),
(38, 'Fleckstangerl', 'Spezial', 'Kauspezialitäten', 44, 5000, 'Kutteln (Pansen, Fleckstangerln), Heissluft getrocknet'),
(39, 'Hühnerfüße', 'Spezial', 'Kauspezialitäten', 4.5, 400, 'Heißluft getrocknet'),
(40, 'Hühnerflügerl', 'Spezial', 'Kauspezialitäten', 3.9, 300, 'Heißluft getrocknet'),
(41, 'Hühnerhälse', 'Spezial', 'Kauspezialitäten', 2.9, 200, 'Heißluft getrocknet, kalorienarm'),
(42, 'Hundekaughetti', 'Spezial', 'Kauspezialitäten', 1.9, 100, 'Schweinedärme, Heißluft getrocknet'),
(43, 'Kaninchenohren', 'Spezial', 'Kauspezialitäten', 1.9, 100, 'Kaninchen / Hasenohren, Heißluft getrocknet, kalorienarm'),
(44, 'Kaninchenohren', 'Spezial', 'Kauspezialitäten', 8, 500, 'Kaninchen / Hasenohren, Heißluft getrocknet, kalorienarm'),
(45, 'Kauspieß natur', 'Spezial', 'Kauspezialitäten', 1.5, 1, 'Kutteln (Pansen), Lunge, Leber, Heissluft getrocknet, per Stück foliert'),
(46, 'Knochen groß', 'Spezial', 'Kauspezialitäten', 3.9, 1, 'Heissluft getrocknet, ein willkommene Abwechslung für Ihren Hund'),
(47, 'Knochen klein', 'Spezial', 'Kauspezialitäten', 0.9, 1, 'Heissluft getrocknet, ein willkommene Abwechslung für Ihren Hund'),
(48, 'Lammohren', 'Spezial', 'Kauspezialitäten', 2.5, 100, 'Heißluft getrocknet, speziell für allergische Hunde'),
(49, 'Mixpaket', 'Spezial', 'Kauspezialitäten', 5.9, 500, 'Kauspezialitäten bunt gemixt, Heissluft getrocknet'),
(50, 'Ochsenziemer im Ganzen', 'Spezial', 'Kauspezialitäten', 3.7, 1, 'im Ganzen, Heißluft getrocknet'),
(51, 'Ochsenziemer geschnitten', 'Spezial', 'Kauspezialitäten', 3.7, 5, 'geschnitten, Heißluft getrocknet'),
(52, 'Ochsenziemer geschnitten', 'Spezial', 'Kauspezialitäten', 29.9, 50, 'geschnitten, Heißluft getrocknet'),
(53, 'Pferdelunge', 'Spezial', 'Kauspezialitäten', 4.9, 250, 'Heißluft getrocknet'),
(54, 'Rinder-Sehnen', 'Spezial', 'Kauspezialitäten', 4.9, 500, 'Achillessehnen, Nackensehnen, Heissluft getrocknet'),
(55, 'Rindergurgel', 'Spezial', 'Kauspezialitäten', 0.9, 1, 'Rinderluftröhre, Heissluft getrocknet'),
(56, 'Rinderhufe', 'Spezial', 'Kauspezialitäten', 3.9, 5, 'Heißluft getrocknet'),
(57, 'Rinderkopfhaut', 'Spezial', 'Kauspezialitäten', 2.6, 1, 'Heißluft getrocknet'),
(58, 'Rinderkopfhaut', 'Spezial', 'Kauspezialitäten', 5.9, 500, 'Heißluft getrocknet'),
(59, 'Rinderleber', 'Spezial', 'Kauspezialitäten', 1.5, 100, 'Heißluft getrocknet'),
(60, 'Rinderlunge', 'Spezial', 'Kauspezialitäten', 1.4, 100, 'Rinderbeuschel, Heißluft getrocknet'),
(61, 'Rinderlunge', 'Spezial', 'Kauspezialitäten', 6.5, 500, 'Rinderbeuschel, Heißluft getrocknet'),
(62, 'Rinderlunge', 'Spezial', 'Kauspezialitäten', 35, 3000, 'Rinderbeuschel, Heißluft getrocknet'),
(63, 'Rindernasen', 'Spezial', 'Kauspezialitäten', 6, 500, 'Heißluft getrocknet'),
(64, 'Rinderohren', 'Spezial', 'Kauspezialitäten', 0.6, 1, 'Heißluft getrocknet'),
(65, 'Rinderohren', 'Spezial', 'Kauspezialitäten', 47, 100, 'Heißluft getrocknet'),
(66, 'Rinderpansen', 'Spezial', 'Kauspezialitäten', 6.5, 500, 'Kutteln, Heissluft getrocknet'),
(67, 'Rinderschlund Rindergrugel', 'Spezial', 'Kauspezialitäten', 2.7, 3, 'Rinderluftröhre, Heissluft getrocknet'),
(68, 'Rinderschlund geschnitten', 'Spezial', 'Kauspezialitäten', 4.5, 500, 'Rinderluftröhre, Heissluft getrocknet, geschnitten'),
(69, 'Rinderschlund geschnitten', 'Spezial', 'Kauspezialitäten', 8, 1000, 'Rinderluftröhre, Heissluft getrocknet, geschnitten'),
(70, 'Rindfleisch', 'Spezial', 'Kauspezialitäten', 1.8, 100, '100 %iges Muskelfleisch, Heissluft getrocknet'),
(71, 'Rindfleisch', 'Spezial', 'Kauspezialitäten', 7.9, 500, '100 %iges Muskelfleisch, Heissluft getrocknet'),
(72, 'Rindfleisch im Ganzen', 'Spezial', 'Kauspezialitäten', 1.8, 1, '100 %iges Muskelfleisch, Heissluft getrocknet'),
(73, 'Schweinerüssel', 'Spezial', 'Kauspezialitäten', 5, 500, 'Heißluft getrocknet'),
(74, 'Schweine Schwänze', 'Spezial', 'Kauspezialitäten', 5.2, 500, 'Heißluft getrocknet'),
(75, 'Schweineohren', 'Spezial', 'Kauspezialitäten', 0.69, 1, 'Heißluft getrocknet'),
(76, 'Schweineohren', 'Spezial', 'Kauspezialitäten', 54, 100, 'Heißluft getrocknet'),
(77, 'Schweineohren', 'Spezial', 'Kauspezialitäten', 9.9, 1000, 'Heißluft getrocknet'),
(78, 'Trockenfisch', 'Spezial', 'Kauspezialitäten', 7.9, 500, 'Blauwhittling, ganz'),
(79, 'Bosch Active', 'Hund', 'Alleinfutter/Trockenfutter', 34.9, 15000, 'Alleinfutter für ausgewachsene Hunde bis 40kg mit normaler Aktivität'),
(80, 'Busch Adult', 'Hund', 'Alleinfutter/Trockenfutter', 4.9, 1000, 'Alleinfutter für ausgewachsene Hunde bis 40kg mit normaler Aktivität'),
(81, 'Bosch Adult', 'Hund', 'Alleinfutter/Trockenfutter', 32.9, 15000, 'Alleinfutter für ausgewachsene Hunde bis 40kg mit normaler Aktivität'),
(82, 'Bosch Adult Menue', 'Hund', 'Alleinfutter/Trockenfutter', 33.9, 15000, 'Alleinfutter für ausgewachsene Hunde mit normaler Aktivität'),
(83, 'Bosch Light', 'Hund', 'Alleinfutter/Trockenfutter', 30.9, 12500, 'Alleinfutter für ausgewachsene übergewichtige Hunde'),
(84, 'Bosch Senior', 'Hund', 'Alleinfutter/Trockenfutter', 30.9, 12500, 'Alleinfutter für ältere Hunde ab 7 Jahren'),
(85, 'Bosch Sensitive', 'Hund', 'Alleinfutter/Trockenfutter', 45.9, 15000, 'Alleinfutter für ausgewachsene und ernährungssensible Hunde (mit Lamm und Reis)'),
(86, 'Bosch VI-MIN', 'Hund', 'Zusatzfutter/Trockenfutter', 9.9, 1000, 'Mineralstoffmischung, Ergänzungsfutter, Vitamine, 1kg Dose'),
(87, 'Reisflocken mit Gemüse', 'Hund', 'Zusatzfutter/Trockenfutter', 5.9, 800, 'ohne Getreide'),
(88, 'Reisflocken mit Gemüse', 'Hund', 'Zusatzfutter/Trockenfutter', 17.9, 4000, 'ohne Getreide'),
(89, 'Reisflocken mit Gemüse', 'Hund', 'Zusatzfutter/Trockenfutter', 29.9, 10000, 'ohne Getreide'),
(90, 'Sanabelle Adult', 'Katze', 'Alleinfutter Nass/Trocken', 3.3, 400, 'Alleinfutter für ausgewachsene Hauskatzen'),
(91, 'Sanabelle Dental', 'Katze', 'Alleinfutter Nass/Trocken', 4.5, 400, 'Alleinfutter für ausgewachsene Katzen mit Mundhygiene Problemen'),
(92, 'Sanabelle Elegance Hair&Skin', 'Katze', 'Alleinfutter Nass/Trocken', 4.4, 400, 'Alleinfutter für ausgewachsene Rassekatzen für ein elegantes glänzendes Haarkleid'),
(93, 'Sanabelle Grande', 'Katze', 'Alleinfutter Nass/Trocken', 4.4, 400, 'Alleinfutter für ausgewachsene Katzen großer Rassen'),
(94, 'Sanabelle Kitten', 'Katze', 'Alleinfutter Nass/Trocken', 3.6, 400, 'Alleinfutter für Jungkatzen und tragende Zuchtkatzen'),
(95, 'Sanabelle Light', 'Katze', 'Alleinfutter Nass/Trocken', 3.3, 400, 'Alleinfutter für ausgewachsene übergewichtige Katzen'),
(96, 'Sanabelle Senior', 'Katze', 'Alleinfutter Nass/Trocken', 3.6, 400, 'Alleinfutter für Seniorkatzen'),
(97, 'Sanabelle Sensitive', 'Katze', 'Alleinfutter Nass/Trocken', 3.6, 400, 'Alleinfutter für ausgewachsene Langhaarkatzen'),
(98, 'Sanabelle Urinary', 'Katze', 'Alleinfutter Nass/Trocken', 4.5, 400, 'Alleinfutter für ausgewachsene Katzen, die sensible im Bereich der harnabführenden Organe reagieren'),
(99, 'Rindfleisch', 'Spezial', 'Kauspezialitäten', 1.8, 100, '100 %iges Muskelfleisch, Heissluft getrocknet');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
