# noinspection SqlNoDataSourceInspectionForFile

-- phpMyAdmin SQL Dump
-- version 2.8.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Erstellungszeit: 18. Oktober 2006 um 08:40
-- Server Version: 5.0.21
-- PHP-Version: 5.1.4
-- 
-- Datenbank: 'wako_neu'
-- Benutzer: 'root'
-- Passwort: ''
-- 

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle 'admins'
-- 

DROP TABLE IF EXISTS admins;
CREATE TABLE IF NOT EXISTS admins (
  Admins_ID int(11) NOT NULL,
  Admins_Benutzername varchar(40) collate latin1_general_ci default NULL,
  Admins_Passwort varchar(32) collate latin1_general_ci default NULL,
  PRIMARY KEY  (Admins_ID)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Daten für Tabelle 'admins'
-- 

INSERT INTO admins VALUES (1, 'admin01', '098f6bcd4621d373cade4e832627b4f6');

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle 'bestellungen'
-- 

DROP TABLE IF EXISTS bestellungen;
CREATE TABLE IF NOT EXISTS bestellungen (
  Bestellungen_ID int(11) NOT NULL,
  Bestellungen_Anzahl varchar(40) collate latin1_general_ci default NULL,
  Bestellungen_Preis_Total double(10,2) default NULL,
  Produkte_ID int(11) default NULL,
  Auftraege_ID int(11) default NULL,
  Warenkoerbe_ID int(11) default NULL,
  PRIMARY KEY  (Bestellungen_ID),
  KEY IDX_Bestellungen1 (Produkte_ID),
  KEY IDX_Bestellungen2 (Auftraege_ID),
  KEY IDX_Bestellungen3 (Warenkoerbe_ID)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Daten für Tabelle 'bestellungen'
-- 

INSERT INTO bestellungen VALUES (1, '1', 13.85, 6, 1, NULL);
INSERT INTO bestellungen VALUES (2, '2', 91.80, 4, 1, NULL);
INSERT INTO bestellungen VALUES (3, '1', 85.00, 3, 2, NULL);
INSERT INTO bestellungen VALUES (4, '9', 179.55, 2, 2, NULL);
INSERT INTO bestellungen VALUES (5, '1', 13.85, 6, 2, NULL);
INSERT INTO bestellungen VALUES (6, '12', 42.00, 5, 3, NULL);
INSERT INTO bestellungen VALUES (7, '3', 38.70, 1, 3, NULL);
INSERT INTO bestellungen VALUES (8, '1', 85.00, 3, NULL, 6);
INSERT INTO bestellungen VALUES (9, '100000', 350000.00, 5, 4, NULL);
INSERT INTO bestellungen VALUES (10, '1000000', 85000000.00, 3, 4, NULL);
INSERT INTO bestellungen VALUES (11, '999999999', 99999999.99, 4, 4, NULL);
INSERT INTO bestellungen VALUES (12, '77777', 1077211.45, 6, 4, NULL);
INSERT INTO bestellungen VALUES (13, '2', 25.80, 1, NULL, 12);

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle 'besucher'
-- 

DROP TABLE IF EXISTS besucher;
CREATE TABLE IF NOT EXISTS besucher (
  Besucher_ID int(11) NOT NULL,
  Besucher_Zeit datetime default NULL,
  PRIMARY KEY  (Besucher_ID),
  UNIQUE KEY IDX_Besucher1 (Besucher_ID)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Daten für Tabelle 'besucher'
-- 

INSERT INTO besucher VALUES (1, '2006-09-21 15:25:19');
INSERT INTO besucher VALUES (2, '2006-09-21 15:51:12');
INSERT INTO besucher VALUES (3, '2006-09-24 14:57:04');
INSERT INTO besucher VALUES (4, '2006-09-28 13:21:26');
INSERT INTO besucher VALUES (5, '2006-09-28 21:48:34');
INSERT INTO besucher VALUES (6, '2006-10-13 16:49:39');
INSERT INTO besucher VALUES (7, '2006-10-13 20:57:33');
INSERT INTO besucher VALUES (8, '2006-10-14 00:23:00');
INSERT INTO besucher VALUES (9, '2006-10-16 10:53:39');
INSERT INTO besucher VALUES (10, '2006-10-16 11:20:20');
INSERT INTO besucher VALUES (11, '2006-10-16 14:07:54');
INSERT INTO besucher VALUES (12, '2006-10-17 13:51:04');
INSERT INTO besucher VALUES (13, '2006-10-18 08:38:53');

-- --------------------------------------------------------


-- 
-- Tabellenstruktur für Tabelle 'kategorien'
-- 

DROP TABLE IF EXISTS kategorien;
CREATE TABLE IF NOT EXISTS kategorien (
  Kategorien_ID int(11) NOT NULL,
  Kategorien_Bezeichnung varchar(40) collate latin1_general_ci default NULL,
  PRIMARY KEY  (Kategorien_ID),
  UNIQUE KEY IDX_Kategorien1 (Kategorien_ID)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Daten für Tabelle 'kategorien'
-- 

INSERT INTO kategorien VALUES (1, 'zum anpflanzen');
INSERT INTO kategorien VALUES (2, 'Sträusse');
INSERT INTO kategorien VALUES (3, 'Kakteen');

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle 'kunden'
-- 

DROP TABLE IF EXISTS kunden;
CREATE TABLE IF NOT EXISTS kunden (
  Kunden_ID int(11) NOT NULL,
  Kunden_Name varchar(40) collate latin1_general_ci default NULL,
  Kunden_Vorname varchar(40) collate latin1_general_ci default NULL,
  Kunden_Adresse varchar(40) collate latin1_general_ci default NULL,
  Kunden_PLZ varchar(10) collate latin1_general_ci default NULL,
  Kunden_Ort varchar(40) collate latin1_general_ci default NULL,
  Kunden_Land varchar(40) collate latin1_general_ci default NULL,
  Kunden_Benutzername varchar(40) collate latin1_general_ci default NULL,
  Kunden_Passwort varchar(32) collate latin1_general_ci default NULL,
  Kunden_Gesperrt int(11) default NULL,
  PRIMARY KEY  (Kunden_ID),
  UNIQUE KEY IDX_Kunden1 (Kunden_ID)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Daten für Tabelle 'kunden'
-- 

INSERT INTO kunden VALUES (1, 'Ropelato', 'Sandro', 'Sigelwiesstrasse 46', '8451', 'Kleinandelfingen', 'Schweiz', 'sandro_ropelato', '098f6bcd4621d373cade4e832627b4f6', 0);

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle 'produkte'
-- 

DROP TABLE IF EXISTS produkte;
CREATE TABLE IF NOT EXISTS produkte (
  Produkte_ID int(11) NOT NULL,
  Produkte_Name varchar(40) collate latin1_general_ci default NULL,
  Produkte_Bestellnr varchar(40) collate latin1_general_ci default NULL,
  Produkte_Beschreibung text collate latin1_general_ci,
  Produkte_Preis double(10,2) default NULL,
  Produkte_Geloescht varchar(40) collate latin1_general_ci default NULL,
  Produkte_Bildpfad varchar(200) collate latin1_general_ci default NULL,
  Kategorien_ID int(11) default NULL,
  PRIMARY KEY  (Produkte_ID),
  UNIQUE KEY IDX_Produkte2 (Produkte_ID),
  KEY IDX_Produkte1 (Kategorien_ID)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Daten für Tabelle 'produkte'
-- 

INSERT INTO produkte VALUES (1, 'Sonnenblumen', NULL, 'Sonnenblumensamen zu sähen im Frühling.\r\nZu erwartende Grösse der Sonnenblumen: ca. 2.10 m\r\n1 Packung (250g)', 12.90, '0', './produkte_bilder/produkt_1_sonnenblume.bmp', 1);
INSERT INTO produkte VALUES (2, 'Tulpen-Zwiebeln', NULL, '5 Stk., ca. 300g.\r\nMitte - Ende März anpflanzen.', 19.95, '0', './produkte_bilder/produkt_2_tulpe.bmp', 1);
INSERT INTO produkte VALUES (3, 'Rosenstrauss', NULL, 'ca. 30 Stk.\r\nFarben: gemischt.\r\n', 85.00, '0', './produkte_bilder/produkt_3_rosenstrauss.bmp', 2);
INSERT INTO produkte VALUES (4, 'Margeritenstrauss', NULL, 'Im Tontopf. Für Aussengebrauch geeignet. Ca. 50 Blumen', 45.90, '0', './produkte_bilder/produkt_4_margeritensrtauss.bmp', 2);
INSERT INTO produkte VALUES (5, 'Kaktus grün', NULL, 'Kleiner grüner Kaktus.\r\nVorsicht, sticht!', 3.50, '0', './produkte_bilder/produkt_5_kaktus.bmp', 3);
INSERT INTO produkte VALUES (6, 'Aloe vera', NULL, 'Aloe vera, ca. 75 cm gross.\r\nAls Tischdekoration geeignet.', 13.85, '0', '', 0);

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle 'warenkoerbe'
-- 

DROP TABLE IF EXISTS warenkoerbe;
CREATE TABLE IF NOT EXISTS warenkoerbe (
  Warenkoerbe_ID int(11) NOT NULL,
  Besucher_ID int(11) default NULL,
  PRIMARY KEY  (Warenkoerbe_ID),
  UNIQUE KEY IDX_Warenkoerbe2 (Warenkoerbe_ID),
  KEY IDX_Warenkoerbe1 (Besucher_ID)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Daten für Tabelle 'warenkoerbe'
-- 

INSERT INTO warenkoerbe VALUES (1, 1);
INSERT INTO warenkoerbe VALUES (2, 2);
INSERT INTO warenkoerbe VALUES (3, 3);
INSERT INTO warenkoerbe VALUES (4, 4);
INSERT INTO warenkoerbe VALUES (5, 5);
INSERT INTO warenkoerbe VALUES (6, 6);
INSERT INTO warenkoerbe VALUES (7, 7);
INSERT INTO warenkoerbe VALUES (8, 8);
INSERT INTO warenkoerbe VALUES (9, 9);
INSERT INTO warenkoerbe VALUES (10, 10);
INSERT INTO warenkoerbe VALUES (11, 11);
INSERT INTO warenkoerbe VALUES (12, 12);
INSERT INTO warenkoerbe VALUES (13, 13);
