-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2016 at 12:37 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bh_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bestellung`
--

CREATE TABLE `bestellung` (
  `B_ID` int(11) NOT NULL,
  `PP_ID` int(11) NOT NULL,
  `K_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `kunde`
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
  `Passwort` varchar(30) COLLATE utf8_bin NOT NULL,
  `Newsletter` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `kunde`
--

INSERT INTO `kunde` (`K_ID`, `Vorname`, `Nachname`, `Telefon`, `EMail`, `Strasse`, `HNR`, `O_ID`, `Passwort`, `Newsletter`) VALUES
(1, 'Nadine', 'Niggemeier', '015005552666', 'nad97@aol.com', 'Muster', 11, 7, 'dadadada', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ort`
--

CREATE TABLE `ort` (
  `O_ID` int(11) NOT NULL,
  `Name` varchar(30) COLLATE utf8_bin NOT NULL,
  `PLZ` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ort`
--

INSERT INTO `ort` (`O_ID`, `Name`, `PLZ`) VALUES
(6, 'Muster', 75330),
(7, 'WWWWW', 73550);

-- --------------------------------------------------------

--
-- Table structure for table `produkt`
--

CREATE TABLE `produkt` (
  `P_ID` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_bin NOT NULL,
  `Preis` double NOT NULL,
  `Beschreibung` varchar(150) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `produkt`
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
-- Table structure for table `produktpos`
--

CREATE TABLE `produktpos` (
  `PP_ID` int(11) NOT NULL,
  `P_ID` int(11) NOT NULL,
  `B_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bestellung`
--
ALTER TABLE `bestellung`
  ADD PRIMARY KEY (`B_ID`),
  ADD KEY `PP_ID` (`PP_ID`),
  ADD KEY `K_ID` (`K_ID`);

--
-- Indexes for table `kunde`
--
ALTER TABLE `kunde`
  ADD PRIMARY KEY (`K_ID`),
  ADD KEY `O_ID` (`O_ID`);

--
-- Indexes for table `ort`
--
ALTER TABLE `ort`
  ADD PRIMARY KEY (`O_ID`);

--
-- Indexes for table `produkt`
--
ALTER TABLE `produkt`
  ADD PRIMARY KEY (`P_ID`);

--
-- Indexes for table `produktpos`
--
ALTER TABLE `produktpos`
  ADD PRIMARY KEY (`PP_ID`),
  ADD KEY `P_ID` (`P_ID`),
  ADD KEY `B_ID` (`B_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bestellung`
--
ALTER TABLE `bestellung`
  MODIFY `B_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kunde`
--
ALTER TABLE `kunde`
  MODIFY `K_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ort`
--
ALTER TABLE `ort`
  MODIFY `O_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `produkt`
--
ALTER TABLE `produkt`
  MODIFY `P_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `produktpos`
--
ALTER TABLE `produktpos`
  MODIFY `PP_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bestellung`
--
ALTER TABLE `bestellung`
  ADD CONSTRAINT `K_ID` FOREIGN KEY (`K_ID`) REFERENCES `kunde` (`K_ID`),
  ADD CONSTRAINT `PP_ID` FOREIGN KEY (`PP_ID`) REFERENCES `produktpos` (`PP_ID`);

--
-- Constraints for table `kunde`
--
ALTER TABLE `kunde`
  ADD CONSTRAINT `O_ID` FOREIGN KEY (`O_ID`) REFERENCES `ort` (`O_ID`);

--
-- Constraints for table `produktpos`
--
ALTER TABLE `produktpos`
  ADD CONSTRAINT `B_ID` FOREIGN KEY (`B_ID`) REFERENCES `bestellung` (`B_ID`),
  ADD CONSTRAINT `P_ID` FOREIGN KEY (`P_ID`) REFERENCES `produkt` (`P_ID`);
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
