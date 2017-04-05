-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 03. Apr 2017 um 00:04
-- Server Version: 5.5.52
-- PHP-Version: 5.4.45-0+deb7u5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `anmeldungen`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Ref_Anmeldungen`
--

CREATE TABLE IF NOT EXISTS `Ref_Anmeldungen` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Eintrags_ID` int(11) NOT NULL,
  `Klasse` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Vorname` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Rufname` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Geburtstag` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Geburtsort` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Geburtsland` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Geschlecht` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Religion` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `RU` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Land` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Land2` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Strasse` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `HausNr` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PLZ` varchar(7) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Ort` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Teilort` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Muttersprache` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Schuleintrittam` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Erz1Name` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Erz1Vorname` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Erz1Geschlecht` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Erz1Strasse` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Erz1HausNr` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Erz1PLZ` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Erz1Ort` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Erz1Teilort` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Erz1Telefon1` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Erz1Telefon2` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Erz1Handy` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Erz1Email` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Erz2Name` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Erz2Vorname` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Erz2Geschlecht` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Erz2Strasse` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Erz2HausNr` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Erz2PLZ` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Erz2Ort` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Erz2Teilort` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Erz2Telefon1` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Erz2Telefon2` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Erz2Handy` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Erz2Email` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Profil1` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Profil1von` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Profil1bis` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `AbgebendeSchule` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `SonstigeSchule` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Sprachwahl` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Fremdsprache1` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'E',
  `Fremdsprache2` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Foto_Einw` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Geschwister` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Klassenpartner` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nichtKlassenpartner` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `erz2sorgerecht` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `erz2auskunftsrecht` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `reinw` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `schwimmen` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
