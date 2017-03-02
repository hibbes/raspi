-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 27. Feb 2017 um 20:20
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
-- Tabellenstruktur für Tabelle `Anmeldungen`
--

CREATE TABLE IF NOT EXISTS `Anmeldungen` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Eintrags_ID` int(11) NOT NULL,
  `Klasse` varchar(80) NOT NULL,
  `Name` varchar(80) NOT NULL,
  `Vorname` varchar(80) NOT NULL,
  `Rufname` varchar(80) NOT NULL,
  `Geburtstag` varchar(80) NOT NULL,
  `Geburtsort` varchar(80) NOT NULL,
  `Geburtsland` varchar(50) NOT NULL,
  `Geschlecht` varchar(80) NOT NULL,
  `Religion` varchar(80) NOT NULL,
  `RU` varchar(80) NOT NULL,
  `Land` varchar(80) NOT NULL,
  `Land2` varchar(80) NOT NULL,
  `Strasse` varchar(30) NOT NULL,
  `HausNr` varchar(4) NOT NULL,
  `PLZ` varchar(7) NOT NULL,
  `Ort` varchar(80) NOT NULL,
  `Teilort` varchar(80) NOT NULL,
  `Muttersprache` varchar(80) NOT NULL,
  `Schuleintrittam` varchar(80) NOT NULL,
  `Erz1Name` varchar(80) NOT NULL,
  `Erz1Vorname` varchar(80) NOT NULL,
  `Erz1Geschlecht` varchar(80) NOT NULL,
  `Erz1Strasse` varchar(80) NOT NULL,
  `Erz1HausNr` varchar(80) NOT NULL,
  `Erz1PLZ` varchar(80) NOT NULL,
  `Erz1Ort` varchar(80) NOT NULL,
  `Erz1Teilort` varchar(80) NOT NULL,
  `Erz1Telefon1` varchar(80) NOT NULL,
  `Erz1Telefon2` varchar(30) NOT NULL,
  `Erz1Handy` varchar(80) NOT NULL,
  `Erz1Email` varchar(80) NOT NULL,
  `Erz2Name` varchar(80) NOT NULL,
  `Erz2Vorname` varchar(80) NOT NULL,
  `Erz2Geschlecht` varchar(5) NOT NULL,
  `Erz2Strasse` varchar(80) NOT NULL,
  `Erz2HausNr` varchar(80) NOT NULL,
  `Erz2PLZ` varchar(80) NOT NULL,
  `Erz2Ort` varchar(80) NOT NULL,
  `Erz2Teilort` varchar(80) NOT NULL,
  `Erz2Telefon1` varchar(80) NOT NULL,
  `Erz2Telefon2` varchar(30) NOT NULL,
  `Erz2Handy` varchar(80) NOT NULL,
  `Erz2Email` varchar(80) NOT NULL,
  `Profil1` varchar(80) NOT NULL,
  `Profil1von` varchar(80) NOT NULL,
  `Profil1bis` varchar(80) NOT NULL,
  `AbgebendeSchule` varchar(80) NOT NULL,
  `Sprachwahl` varchar(80) NOT NULL,
  `Fremdsprache1` varchar(20) NOT NULL DEFAULT 'E',
  `Fremdsprache2` varchar(20) NOT NULL,
  `Foto_Einw` varchar(5) NOT NULL,
  `Geschwister` varchar(80) NOT NULL,
  `Klassenpartner` varchar(80) NOT NULL,
  `nichtKlassenpartner` varchar(80) NOT NULL,
  `erz2sorgerecht` varchar(5) NOT NULL,
  `erz2auskunftsrecht` varchar(5) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
