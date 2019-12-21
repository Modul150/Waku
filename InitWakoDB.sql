-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 21. Dez 2019 um 20:30
-- Server-Version: 10.4.6-MariaDB
-- PHP-Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `wako_neu`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `admins`
--

CREATE TABLE `admins` (
  `Admins_ID` int(11) NOT NULL,
  `Admins_Benutzername` varchar(40) NOT NULL,
  `Admins_Passwort` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `admins`
--

INSERT INTO `admins` (`Admins_ID`, `Admins_Benutzername`, `Admins_Passwort`) VALUES
(1, 'admin01', '098f6bcd4621d373cade4e832627b4f6');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bestellungen`
--

CREATE TABLE `bestellungen` (
  `Bestellungen_ID` int(11) NOT NULL,
  `Kunden_Id` int(11) NOT NULL,
  `Bestellungen_Preis_Total` decimal(10,2) NOT NULL,
  `Bestellungs_Datum` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `bestellungen`
--

INSERT INTO `bestellungen` (`Bestellungen_ID`, `Kunden_Id`, `Bestellungen_Preis_Total`, `Bestellungs_Datum`) VALUES
(1, 0, '13.85', '2019-12-21 18:20:23'),
(2, 0, '91.80', '2019-12-21 18:20:23'),
(3, 0, '85.00', '2019-12-21 18:20:23'),
(4, 0, '179.55', '2019-12-21 18:20:23'),
(5, 0, '13.85', '2019-12-21 18:20:23'),
(6, 0, '42.00', '2019-12-21 18:20:23'),
(7, 0, '38.70', '2019-12-21 18:20:23'),
(8, 0, '85.00', '2019-12-21 18:20:23'),
(9, 0, '350000.00', '2019-12-21 18:20:23'),
(10, 0, '85000000.00', '2019-12-21 18:20:23'),
(11, 0, '99999999.99', '2019-12-21 18:20:23'),
(12, 0, '1077211.45', '2019-12-21 18:20:23'),
(13, 0, '25.80', '2019-12-21 18:20:23');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bestellungen_positionen`
--

CREATE TABLE `bestellungen_positionen` (
  `Bestellungs_positionen_Id` int(11) NOT NULL,
  `Bestellungen_Id` int(11) NOT NULL,
  `Produkte_Id` int(11) NOT NULL,
  `Menge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `besucher`
--

CREATE TABLE `besucher` (
  `Besucher_ID` int(11) NOT NULL,
  `Besucher_Zeit` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `besucher`
--

INSERT INTO `besucher` (`Besucher_ID`, `Besucher_Zeit`) VALUES
(1, '2006-09-21 15:25:19'),
(2, '2006-09-21 15:51:12'),
(3, '2006-09-24 14:57:04'),
(4, '2006-09-28 13:21:26'),
(5, '2006-09-28 21:48:34'),
(6, '2006-10-13 16:49:39'),
(7, '2006-10-13 20:57:33'),
(8, '2006-10-14 00:23:00'),
(9, '2006-10-16 10:53:39'),
(10, '2006-10-16 11:20:20'),
(11, '2006-10-16 14:07:54'),
(12, '2006-10-17 13:51:04'),
(13, '2006-10-18 08:38:53'),
(14, '2019-12-14 15:18:33'),
(15, '2019-12-21 14:26:48'),
(16, '2019-12-21 14:17:10'),
(17, '2019-12-21 14:21:50'),
(18, '2019-12-21 19:20:45'),
(19, '2019-12-21 19:21:37');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kategorien`
--

CREATE TABLE `kategorien` (
  `Kategorien_ID` int(11) NOT NULL,
  `Kategorien_Bezeichnung` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `kategorien`
--

INSERT INTO `kategorien` (`Kategorien_ID`, `Kategorien_Bezeichnung`) VALUES
(1, 'zum anpflanzen'),
(2, 'Sträusse'),
(3, 'Kakteen');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunden`
--

CREATE TABLE `kunden` (
  `Kunden_ID` int(11) NOT NULL,
  `Kunden_Name` varchar(40) NOT NULL,
  `Kunden_Vorname` varchar(40) NOT NULL,
  `Kunden_Adresse` varchar(40) NOT NULL,
  `Kunden_PLZ` int(10) NOT NULL,
  `Kunden_Ort` varchar(40) NOT NULL,
  `Kunden_Land` varchar(40) NOT NULL,
  `Kunden_Benutzername` varchar(40) NOT NULL,
  `Kunden_Passwort` varchar(40) NOT NULL,
  `Kunden_Gesperrt` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `kunden`
--

INSERT INTO `kunden` (`Kunden_ID`, `Kunden_Name`, `Kunden_Vorname`, `Kunden_Adresse`, `Kunden_PLZ`, `Kunden_Ort`, `Kunden_Land`, `Kunden_Benutzername`, `Kunden_Passwort`, `Kunden_Gesperrt`) VALUES
(1, 'Ropelato', 'Sandro', 'Sigelwiesstrasse 46', 8451, 'Kleinandelfingen', 'Schweiz', 'sandro_ropelato', '098f6bcd4621d373cade4e832627b4f6', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `produkte`
--

CREATE TABLE `produkte` (
  `Produkte_ID` int(11) NOT NULL,
  `Produkte_Name` varchar(40) NOT NULL,
  `Produkte_Bestellnr` int(11) DEFAULT NULL,
  `Produkte_Beschreibung` text DEFAULT NULL,
  `Produkte_Preis` double(10,2) NOT NULL,
  `Produkte_Geloescht` tinyint(4) NOT NULL DEFAULT 0,
  `Produkte_Bildpfad` varchar(200) DEFAULT NULL,
  `Kategorien_ID` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `produkte`
--

INSERT INTO `produkte` (`Produkte_ID`, `Produkte_Name`, `Produkte_Bestellnr`, `Produkte_Beschreibung`, `Produkte_Preis`, `Produkte_Geloescht`, `Produkte_Bildpfad`, `Kategorien_ID`) VALUES
(1, 'Sonnenblumen', NULL, 'Sonnenblumensamen zu sähen im Frühling.\r\nZu erwartende Grösse der Sonnenblumen: ca. 2.10 m\r\n1 Packung (250g)', 12.90, 0, './produkte_bilder/produkt_1_sonnenblume.bmp', 1),
(2, 'Tulpen-Zwiebeln', NULL, '5 Stk., ca. 300g.\r\nMitte - Ende März anpflanzen.', 19.95, 0, './produkte_bilder/produkt_2_tulpe.bmp', 1),
(3, 'Rosenstrauss', NULL, 'ca. 30 Stk.\r\nFarben: gemischt.\r\n', 85.00, 0, './produkte_bilder/produkt_3_rosenstrauss.bmp', 2),
(4, 'Margeritenstrauss', NULL, 'Im Tontopf. Für Aussengebrauch geeignet. Ca. 50 Blumen', 45.90, 0, './produkte_bilder/produkt_4_margeritensrtauss.bmp', 2),
(5, 'Kaktus grün', NULL, 'Kleiner grüner Kaktus.\r\nVorsicht, sticht!', 3.50, 0, './produkte_bilder/produkt_5_kaktus.bmp', 3),
(6, 'Aloe vera', NULL, 'Aloe vera, ca. 75 cm gross.\r\nAls Tischdekoration geeignet.', 13.85, 0, '', 0);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Admins_ID`);

--
-- Indizes für die Tabelle `bestellungen`
--
ALTER TABLE `bestellungen`
  ADD PRIMARY KEY (`Bestellungen_ID`),
  ADD KEY `Kunden_Id` (`Kunden_Id`);

--
-- Indizes für die Tabelle `bestellungen_positionen`
--
ALTER TABLE `bestellungen_positionen`
  ADD PRIMARY KEY (`Bestellungs_positionen_Id`),
  ADD KEY `Bestellungen_Id` (`Bestellungen_Id`),
  ADD KEY `Produkte_Id` (`Produkte_Id`);

--
-- Indizes für die Tabelle `besucher`
--
ALTER TABLE `besucher`
  ADD PRIMARY KEY (`Besucher_ID`),
  ADD UNIQUE KEY `IDX_Besucher1` (`Besucher_ID`);

--
-- Indizes für die Tabelle `kategorien`
--
ALTER TABLE `kategorien`
  ADD PRIMARY KEY (`Kategorien_ID`),
  ADD UNIQUE KEY `IDX_Kategorien1` (`Kategorien_ID`);

--
-- Indizes für die Tabelle `kunden`
--
ALTER TABLE `kunden`
  ADD PRIMARY KEY (`Kunden_ID`),
  ADD UNIQUE KEY `IDX_Kunden1` (`Kunden_ID`);

--
-- Indizes für die Tabelle `produkte`
--
ALTER TABLE `produkte`
  ADD PRIMARY KEY (`Produkte_ID`),
  ADD UNIQUE KEY `IDX_Produkte2` (`Produkte_ID`),
  ADD KEY `IDX_Produkte1` (`Kategorien_ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `admins`
--
ALTER TABLE `admins`
  MODIFY `Admins_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `bestellungen`
--
ALTER TABLE `bestellungen`
  MODIFY `Bestellungen_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT für Tabelle `bestellungen_positionen`
--
ALTER TABLE `bestellungen_positionen`
  MODIFY `Bestellungs_positionen_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `besucher`
--
ALTER TABLE `besucher`
  MODIFY `Besucher_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT für Tabelle `kategorien`
--
ALTER TABLE `kategorien`
  MODIFY `Kategorien_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `kunden`
--
ALTER TABLE `kunden`
  MODIFY `Kunden_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `produkte`
--
ALTER TABLE `produkte`
  MODIFY `Produkte_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
