-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2016 at 12:01 PM
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
-- Table structure for table `anmeldedaten`
--

CREATE TABLE `anmeldedaten` (
  `A_ID` int(11) NOT NULL,
  `K_ID` int(11) NOT NULL,
  `Nutzername` varchar(100) COLLATE utf8_bin NOT NULL,
  `Passwort` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `anmeldedaten`
--

INSERT INTO `anmeldedaten` (`A_ID`, `K_ID`, `Nutzername`, `Passwort`) VALUES
(1, 1, 'jodelmeister', 'wenjuckts');

-- --------------------------------------------------------

--
-- Table structure for table `bestellungen`
--

CREATE TABLE `bestellungen` (
  `B_ID` int(11) NOT NULL,
  `PPOS_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `bestellungen`
--

INSERT INTO `bestellungen` (`B_ID`, `PPOS_ID`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kunden`
--

CREATE TABLE `kunden` (
  `K_ID` int(11) NOT NULL,
  `O_ID` int(11) NOT NULL,
  `B_ID` int(11) DEFAULT NULL,
  `Vorname` varchar(100) COLLATE utf8_bin NOT NULL,
  `Nachname` varchar(100) COLLATE utf8_bin NOT NULL,
  `L_ID` int(11) NOT NULL,
  `B-Day` date NOT NULL,
  `Straße` varchar(100) COLLATE utf8_bin NOT NULL,
  `Hausnummer` varchar(25) COLLATE utf8_bin NOT NULL,
  `Tel. Nr.` int(255) DEFAULT NULL,
  `Log-In` tinyint(1) NOT NULL,
  `Newsletter` tinyint(1) NOT NULL,
  `e-mail` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `kunden`
--

INSERT INTO `kunden` (`K_ID`, `O_ID`, `B_ID`, `Vorname`, `Nachname`, `L_ID`, `B-Day`, `Straße`, `Hausnummer`, `Tel. Nr.`, `Log-In`, `Newsletter`, `e-mail`) VALUES
(1, 2, 1, 'jodel', 'meister', 1, '1995-04-22', 'jaja', '22b', NULL, 1, 1, 'aefawf@homo.de');

-- --------------------------------------------------------

--
-- Table structure for table `land`
--

CREATE TABLE `land` (
  `L_ID` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `land`
--

INSERT INTO `land` (`L_ID`, `Name`) VALUES
(1, 'Deutschland'),
(2, 'Frankreich'),
(3, 'Italien');

-- --------------------------------------------------------

--
-- Table structure for table `mitarbeiter`
--

CREATE TABLE `mitarbeiter` (
  `M_ID` int(11) NOT NULL,
  `Vorname` varchar(100) COLLATE utf8_bin NOT NULL,
  `Nachname` varchar(100) COLLATE utf8_bin NOT NULL,
  `Geburtstag` date NOT NULL,
  `e-mail` varchar(100) COLLATE utf8_bin NOT NULL,
  `online-status` tinyint(1) NOT NULL,
  `Tel. Nr.` varchar(100) COLLATE utf8_bin NOT NULL,
  `B_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `mitarbeiter`
--

INSERT INTO `mitarbeiter` (`M_ID`, `Vorname`, `Nachname`, `Geburtstag`, `e-mail`, `online-status`, `Tel. Nr.`, `B_ID`) VALUES
(1, 'Bene', 'B.', '1995-04-22', '', 0, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ort`
--

CREATE TABLE `ort` (
  `O_ID` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8_bin NOT NULL,
  `PLZ` varchar(255) COLLATE utf8_bin NOT NULL,
  `L_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ort`
--

INSERT INTO `ort` (`O_ID`, `Name`, `PLZ`, `L_ID`) VALUES
(1, 'Neu-Ulm', '89231', 1),
(2, 'Schwaebisch Gmuend', '73525', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produkte`
--

CREATE TABLE `produkte` (
  `P_ID` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8_bin NOT NULL,
  `Preis` float NOT NULL,
  `Beschreibung` text COLLATE utf8_bin NOT NULL,
  `Bild` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `produkte`
--

INSERT INTO `produkte` (`P_ID`, `Name`, `Preis`, `Beschreibung`, `Bild`) VALUES
(1, 'Produkt 1', 29.99, 'Geiler Scheiß', '/Brainhouse/Produktbilder/Bsp1.jpg'),
(2, 'Produkt 2', 9999.99, 'Noch Geilerer Scheiß', '/Brainhouse/Produktbilder/Bsp2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `produktpos`
--

CREATE TABLE `produktpos` (
  `PPOS_ID` int(11) NOT NULL,
  `P_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `produktpos`
--

INSERT INTO `produktpos` (`PPOS_ID`, `P_ID`) VALUES
(1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anmeldedaten`
--
ALTER TABLE `anmeldedaten`
  ADD PRIMARY KEY (`A_ID`),
  ADD KEY `K_ID` (`K_ID`);

--
-- Indexes for table `bestellungen`
--
ALTER TABLE `bestellungen`
  ADD PRIMARY KEY (`B_ID`),
  ADD KEY `PPOS_ID` (`PPOS_ID`);

--
-- Indexes for table `kunden`
--
ALTER TABLE `kunden`
  ADD PRIMARY KEY (`K_ID`),
  ADD KEY `O_ID` (`O_ID`),
  ADD KEY `B_ID` (`B_ID`),
  ADD KEY `L_ID` (`L_ID`);

--
-- Indexes for table `land`
--
ALTER TABLE `land`
  ADD PRIMARY KEY (`L_ID`);

--
-- Indexes for table `mitarbeiter`
--
ALTER TABLE `mitarbeiter`
  ADD PRIMARY KEY (`M_ID`),
  ADD KEY `B_ID` (`B_ID`);

--
-- Indexes for table `ort`
--
ALTER TABLE `ort`
  ADD PRIMARY KEY (`O_ID`),
  ADD KEY `L_ID` (`L_ID`);

--
-- Indexes for table `produkte`
--
ALTER TABLE `produkte`
  ADD PRIMARY KEY (`P_ID`);

--
-- Indexes for table `produktpos`
--
ALTER TABLE `produktpos`
  ADD PRIMARY KEY (`PPOS_ID`),
  ADD KEY `P_ID` (`P_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anmeldedaten`
--
ALTER TABLE `anmeldedaten`
  MODIFY `A_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bestellungen`
--
ALTER TABLE `bestellungen`
  MODIFY `B_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kunden`
--
ALTER TABLE `kunden`
  MODIFY `K_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `land`
--
ALTER TABLE `land`
  MODIFY `L_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mitarbeiter`
--
ALTER TABLE `mitarbeiter`
  MODIFY `M_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ort`
--
ALTER TABLE `ort`
  MODIFY `O_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `produkte`
--
ALTER TABLE `produkte`
  MODIFY `P_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `produktpos`
--
ALTER TABLE `produktpos`
  MODIFY `PPOS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `anmeldedaten`
--
ALTER TABLE `anmeldedaten`
  ADD CONSTRAINT `anmeldedaten_ibfk_1` FOREIGN KEY (`K_ID`) REFERENCES `kunden` (`K_ID`);

--
-- Constraints for table `bestellungen`
--
ALTER TABLE `bestellungen`
  ADD CONSTRAINT `bestellungen_ibfk_1` FOREIGN KEY (`PPOS_ID`) REFERENCES `produktpos` (`PPOS_ID`);

--
-- Constraints for table `kunden`
--
ALTER TABLE `kunden`
  ADD CONSTRAINT `kunden_ibfk_1` FOREIGN KEY (`O_ID`) REFERENCES `ort` (`O_ID`),
  ADD CONSTRAINT `kunden_ibfk_2` FOREIGN KEY (`B_ID`) REFERENCES `bestellungen` (`B_ID`),
  ADD CONSTRAINT `kunden_ibfk_3` FOREIGN KEY (`L_ID`) REFERENCES `land` (`L_ID`);

--
-- Constraints for table `mitarbeiter`
--
ALTER TABLE `mitarbeiter`
  ADD CONSTRAINT `mitarbeiter_ibfk_1` FOREIGN KEY (`B_ID`) REFERENCES `bestellungen` (`B_ID`);

--
-- Constraints for table `ort`
--
ALTER TABLE `ort`
  ADD CONSTRAINT `ort_ibfk_1` FOREIGN KEY (`L_ID`) REFERENCES `land` (`L_ID`);

--
-- Constraints for table `produktpos`
--
ALTER TABLE `produktpos`
  ADD CONSTRAINT `produktpos_ibfk_1` FOREIGN KEY (`P_ID`) REFERENCES `produkte` (`P_ID`);
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
