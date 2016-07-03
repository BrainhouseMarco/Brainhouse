-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 01. Jul 2016 um 21:26
-- Server-Version: 10.1.13-MariaDB
-- PHP-Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `brainhouse`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bestellung`
--

CREATE TABLE `bestellung` (
  `B_ID` int(11) NOT NULL,
  `PP_ID` int(11) NOT NULL,
  `K_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunde`
--

CREATE TABLE `kunde` (
  `K_ID` int(11) NOT NULL,
  `Vorname` varchar(30) COLLATE utf8_bin NOT NULL,
  `Nachname` varchar(30) COLLATE utf8_bin NOT NULL,
  `Telefon` varchar(30) COLLATE utf8_bin NOT NULL,
  `EMail` varchar(50) COLLATE utf8_bin NOT NULL,
  `Strasse` varchar(30) COLLATE utf8_bin NOT NULL,
  `HNR` int(3) NOT NULL,
  `O_ID` int(11) DEFAULT NULL,
  `Passwort` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `kunde`
--

INSERT INTO `kunde` (`K_ID`, `Vorname`, `Nachname`, `Telefon`, `EMail`, `Strasse`, `HNR`, `O_ID`, `Passwort`) VALUES
(1, 'Nadine', 'Niggemeier', '015005552666', 'nad97@aol.com', 'Muster', 11, 7, 'dadadada');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ort`
--

CREATE TABLE `ort` (
  `O_ID` int(11) NOT NULL,
  `Name` varchar(30) COLLATE utf8_bin NOT NULL,
  `PLZ` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `ort`
--

INSERT INTO `ort` (`O_ID`, `Name`, `PLZ`) VALUES
(6, 'Muster', 75330),
(7, 'WWWWW', 73550);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `produkt`
--

CREATE TABLE `produkt` (
  `P_ID` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_bin NOT NULL,
  `Preis` double NOT NULL,
  `Beschreibung` varchar(150) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `produkt`
--

INSERT INTO `produkt` (`P_ID`, `Name`, `Preis`, `Beschreibung`) VALUES
(1, 'Starterpaket', 319.55, 'Das brainhouse SmartHome Starterpaket – der ideale Einstieg in die Welt der intelligenten Haussteuerung'),
(2, 'Heizpaket', 231.55, 'brainhouse SmartHome Heizpaket – Ihr warmes Zuhause ganz nach Bedarf '),
(3, 'Energiesparpaket', 430.55, 'Für ein energieeffizientes Zuhause: brainhouse SmartHome Energiesparpaket\r\n'),
(4, 'Lichtpaket', 269.55, 'Smarte Beleuchtung in der Winterzeit: brainhouse SmartHome Lichtpaket'),
(5, 'Kamerapaket', 438.55, 'Mehr Sicherheit für Haus und Wohnung: brainhouse SmartHome Kamerapaket\r\n'),
(6, 'Solarpaket', 659.55, 'Das brainhouse SmartHome Solarpaket – die ideale Ergänzung zu Ihrer Photovoltaik-Anlage\r\n');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `produktpos`
--

CREATE TABLE `produktpos` (
  `PP_ID` int(11) NOT NULL,
  `P_ID` int(11) NOT NULL,
  `B_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bestellung`
--
ALTER TABLE `bestellung`
  ADD PRIMARY KEY (`B_ID`);

--
-- Indizes für die Tabelle `kunde`
--
ALTER TABLE `kunde`
  ADD PRIMARY KEY (`K_ID`);

--
-- Indizes für die Tabelle `ort`
--
ALTER TABLE `ort`
  ADD PRIMARY KEY (`O_ID`);

--
-- Indizes für die Tabelle `produkt`
--
ALTER TABLE `produkt`
  ADD PRIMARY KEY (`P_ID`);

--
-- Indizes für die Tabelle `produktpos`
--
ALTER TABLE `produktpos`
  ADD PRIMARY KEY (`PP_ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `bestellung`
--
ALTER TABLE `bestellung`
  MODIFY `B_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `kunde`
--
ALTER TABLE `kunde`
  MODIFY `K_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `ort`
--
ALTER TABLE `ort`
  MODIFY `O_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT für Tabelle `produkt`
--
ALTER TABLE `produkt`
  MODIFY `P_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT für Tabelle `produktpos`
--
ALTER TABLE `produktpos`
  MODIFY `PP_ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
