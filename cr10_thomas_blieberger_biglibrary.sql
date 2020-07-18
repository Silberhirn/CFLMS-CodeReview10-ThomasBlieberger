-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 18. Jul 2020 um 02:41
-- Server-Version: 10.4.13-MariaDB
-- PHP-Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr10_thomas_blieberger_biglibrary`
--
CREATE DATABASE IF NOT EXISTS `cr10_thomas_blieberger_biglibrary` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cr10_thomas_blieberger_biglibrary`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `author`
--

INSERT INTO `author` (`id`, `name`, `surname`) VALUES
(1, 'Ennio', 'Morricone'),
(2, 'AC/DC', ''),
(3, 'Simon', 'Singh'),
(4, 'Matthias T.J.', 'Grimme'),
(5, 'Ewald', 'Plachutta'),
(6, 'T.C.', 'Boyle'),
(7, 'Amon Amarth', ''),
(8, 'Guy', 'Ritchie'),
(9, 'Dennis', 'Berry'),
(10, 'Todd', 'Phillips');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `media`
--

CREATE TABLE `media` (
  `ISBN` bigint(13) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `publish_date` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `type` enum('book','CD','DVD') NOT NULL,
  `status` enum('available','reserved') NOT NULL,
  `fk_author_id` int(11) NOT NULL,
  `fk_publisher_id` int(11) NOT NULL,
  `short_description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `media`
--

INSERT INTO `media` (`ISBN`, `title`, `publish_date`, `image`, `type`, `status`, `fk_author_id`, `fk_publisher_id`, `short_description`) VALUES
(190759205228, 'Berserker', '2019-05-03', 'img/AmonAmarth-Berserker.jpg', 'CD', 'reserved', 7, 7, 'Berserker ist das elfte Studioalbum der schwedischen Melodic-Death-Metal-Band Amon Amarth. Es wurde am 3. Mai 2019 durch Metal Blade Records veröffentlicht und erreichte Platz eins der deutschen und Schweizer Albumcharts.'),
(602557000795, 'Morricone 60', '2016-01-01', 'img/Morricone_60.jpg', 'CD', 'reserved', 1, 5, 'Wie kaum ein anderer hat sich der Italiener Ennio Morricone einen Namen als Filmkomponist gemacht. Auch nachdem er gerade erst seinen 88. Geburtstag gefeiert hat, denkt er doch noch keineswegs ans Aufhören. '),
(888750367723, 'Iron Man 2', '2010-01-01', 'img/Iron_Man_2.jpg', 'CD', 'available', 2, 6, 'Mit einem Einspielergebnis von weltweit über 600 Millionen Dollar zählt die Marvel-Comic-Verfil- mung \"Iron Man\" zu den größten Blockbustern aller Zeiten. Mit mehr als 200 Millionen verkauften Alben sind AC/DC eine der erfolgreichsten Bands der Musikgeschichte. Nun steuern Angus Young, Brian Johnson und Co. die Musik zur Fortsetzung des 2008er-Smashs bei: für \"AC/DC: Iron Man 2\" wurden aus den zehn AC/DC-Studioalben, die zwischen 1976 und 2008 erschienen, fünfzehn Songs ausgewählt.'),
(7613059328341, 'The Gentlemen', '2020-07-01', 'img/Gentlemen.jpg', 'DVD', 'available', 8, 8, 'The Gentlemen ist eine Action-Filmkomödie des Regisseurs Guy Ritchie aus dem Jahr 2019. Zu den Hauptdarstellern gehören Matthew McConaughey, Charlie Hunnam, Henry Golding und Michelle Dockery. Premiere hatte der Film am 3. Dezember 2019 in London. Der deutsche Kinostart war am 27. Februar 2020.'),
(9120052891454, 'Highlander - Gesamtedition', '2019-11-01', 'img/Highlander.jpg', 'DVD', 'available', 9, 9, 'Highlander – Es kann nur einen geben ist ein Spielfilm von Russell Mulcahy aus dem Jahr 1986, den man im weiteren Sinne dem Fantasy-Genre zuordnen kann. Er enthält jedoch auch viele Elemente von Actionfilmen und historischen Filmen. Der Film startete am 28. August 1986 in den deutschen Kinos.'),
(9783423330527, 'Fermats Letzter Satz', '2000-01-01', 'img/Fermats_Letzter_Satz.jpg', 'book', 'available', 3, 4, '1636 behauptete der französische Jurist Pierre de Fermat, den Beweis für eine scheinbar simple Gleichung gefunden zu haben. Doch der Nachwelt blieb er die Lösung schuldig. Seither versuchten die klügsten Köpfe, Fermats letzten Satz zu beweisen. Simon Singh beschreibt diese von Affären und Intrigen begleitete Jagd nach der Lösung. Nach siebenjähriger geheimer Arbeit präsentierte Andrew Wiles seinen staunenden Kollegen den 180 Seiten langen Beweis: Nach über 350 Jahren war die Lösung gefunden!'),
(9783446232693, 'Die Frauen', '2009-01-01', 'img/Die_Frauen.jpg', 'book', 'available', 6, 1, 'Das Leben des exzentrischen Stararchitekten Frank Lloyd Wright und die Beziehungen zu seinen Frauen: T.C. Boyle besichtigt eine amerikanische Ikone und mit ihr eine ganze Ära. Vor dem Panorama einer scheinheilig-puritanischen Gesellschaft in den Zwanziger-und Dreissigerjahren schillern die Figuren Wrights und seiner Frauen umso eindrucksvoller.'),
(9783570305393, 'Joker', '2020-03-12', 'img/Joker.jpg', 'DVD', 'reserved', 10, 10, 'Joker ist eine US-amerikanische Comicverfilmung von Todd Phillips aus dem Jahr 2019, basierend auf Figuren aus dem DC-Universum. Der Film erzählt die Ursprungsgeschichte von Arthur Fleck, dargestellt von Joaquin Phoenix, der unter dem Namen Joker später der notorische Gegenspieler von Batman wird.'),
(9783701503100, 'Die Gute Küche', '1993-01-01', 'img/Die_Gute_Küche.jpg', 'book', 'reserved', 5, 2, 'Das österreichische Jahrhundert-Kochbuch von Ewald Plachutta und Christoph Wagner: Rund 1000 Rezepte, alle vielfach erprobt und nachgekocht, decken das gesamte Repertoire österreichischer Kochkunst ab. Alle Rezepte sind übersichtlich aufgebaut und mit zahlreichen Geheimtipps aus der Profiküche versehen.'),
(9783931406707, 'Japan Bondage', '2011-01-01', 'img/Japan_Bondage.jpg', 'book', 'reserved', 4, 3, 'Die Kunst der japanischen Fesselung, auch Shibari genannt, ist für viele Bondage-Liebhaber faszinierend und verlockt dazu, auch bei eigenen Fesselungen daraus Inspiration und Anregung zu ziehen. Japanische Fachbegriffe, verschiedene Seil-Schulen und Formalien, die dem Laien schwierig erscheinen, ließen bisher viele davor zurückschrecken, es einfach mal selbst auszuprobieren.'),
(9783931406714, 'Das Bondage-Handbuch', '2011-01-01', 'img/Das_Bondage_Handbuch.jpeg', 'book', 'available', 4, 3, 'Bondage? Erotisches Fesseln? Hier wird gezeigt, wie man\'s richtig macht! Das Bondage-Handbuch mit etwa 250 teilweise ganzseitigen Fotos ist das Standardwerk und mehr als nur eine Einführung in dieses Thema. Es vermittelt umfassend und verantwortungsbewusst, was man beachten muss, damit alles beim Fesseln seiner Partnerin, seines Partners klappt, Bondage Spaß macht und nichts Unvorhergesehenes passiert.');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `publisher`
--

CREATE TABLE `publisher` (
  `id` int(11) NOT NULL,
  `publisher_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `size` enum('small','medium','big') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `publisher`
--

INSERT INTO `publisher` (`id`, `publisher_name`, `address`, `size`) VALUES
(1, 'Carl Hanser Verlag', 'Vilshofener Straße 10 D-81679 München', 'small'),
(2, 'Heyne Verlag', 'Neumarkter Str. 28 D-81673 München', 'big'),
(3, 'Charon Verlag', 'unknown', 'small'),
(4, 'dtv', 'Tumblingerstraße 21, D-80337 München', 'medium'),
(5, 'Universal Music', '2220 Colorado Avenue Santa Monica, California', 'big'),
(6, 'Albert Productions', 'unknown', 'medium'),
(7, 'Metal Blade Records', 'Friedrichstraße 38, D-73033 Göppingen', 'small'),
(8, 'Concorde Video', 'unknown', 'medium'),
(9, 'SchröderMedia HandelsGmbH', 'unknown', 'medium'),
(10, 'Warner Home Video', '4000 Warner Boulevard Burbank, CA 91522 USA', 'big');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `fk_author_id` (`fk_author_id`),
  ADD KEY `fk_publisher_id` (`fk_publisher_id`);

--
-- Indizes für die Tabelle `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT für Tabelle `publisher`
--
ALTER TABLE `publisher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`fk_author_id`) REFERENCES `author` (`id`),
  ADD CONSTRAINT `media_ibfk_2` FOREIGN KEY (`fk_publisher_id`) REFERENCES `publisher` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
