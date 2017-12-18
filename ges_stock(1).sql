-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 13. Dez 2017 um 21:23
-- Server-Version: 10.1.28-MariaDB
-- PHP-Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `ges_stock`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `id_personne` int(11) NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `degre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `admin`
--

INSERT INTO `admin` (`id`, `id_personne`, `login`, `password`, `degre`) VALUES
(4, 4, 'admin', 'admin', 1),
(5, 5, 'admin2', 'admin2', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `caissier`
--

CREATE TABLE `caissier` (
  `id` int(11) NOT NULL,
  `id_personne` int(11) NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `date_creation` text NOT NULL,
  `date_last_conexion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `caissier`
--

INSERT INTO `caissier` (`id`, `id_personne`, `login`, `password`, `date_creation`, `date_last_conexion`) VALUES
(1, 8, 'caissier', 'caissier', '10-12-2017 a 02:28', '10-12-2017 a 03:40');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cat_stock`
--

CREATE TABLE `cat_stock` (
  `id_cat` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `dateCreation` datetime NOT NULL,
  `dateModification` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `cat_stock`
--

INSERT INTO `cat_stock` (`id_cat`, `libelle`, `description`, `image`, `dateCreation`, `dateModification`) VALUES
(1, 'Chaussure', 'newss', 'chau1.jpg25-11-2017a20-53.jpg', '2017-11-25 20:53:15', '0000-00-00 00:00:00'),
(2, 'Sacs', 'news sacs', 'sac1.jpg25-11-2017a20-53.jpg', '2017-11-25 20:53:45', '0000-00-00 00:00:00'),
(3, 'chemise', 'je suis une chemise', 'cyp.jpg25-11-2017a21-56.jpg', '2017-11-25 21:56:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `chaussure`
--

CREATE TABLE `chaussure` (
  `id` int(11) UNSIGNED NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `stock_id` int(11) DEFAULT NULL,
  `prix_min` int(11) NOT NULL,
  `prix_max` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `modele` text,
  `couleur` text,
  `pointure` text,
  `taille` text,
  `marque` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `dateCreation` datetime DEFAULT NULL,
  `dateModification` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `chemise`
--

CREATE TABLE `chemise` (
  `id` int(11) UNSIGNED NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `stock_id` int(11) DEFAULT NULL,
  `prix_min` int(11) NOT NULL,
  `prix_max` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `modele` text,
  `couleur` text,
  `pointure` text,
  `taille` text,
  `marque` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `dateCreation` datetime DEFAULT NULL,
  `dateModification` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `chemise`
--

INSERT INTO `chemise` (`id`, `quantite`, `stock_id`, `prix_min`, `prix_max`, `code`, `modele`, `couleur`, `pointure`, `taille`, `marque`, `type`, `dateCreation`, `dateModification`) VALUES
(1, 54, 4, 5445454, 545445454, 'jhkkjjk', 'knbmhbjhbn', 'jjhbjhk', '{pt35:{qtept35:5},pt36:{qtept36:58},pt37:{qtept37:85},pt38:{qtept38:77},pt39:{qtept39:74},pt40:{qtept40:78},pt41:{qtept41:79},pt42:{qtept42:71},pt43:{qtept43:11},pt44:{qtept44:12},pt45:{qtept45:},pt46:{qtept46:22}}', '{total:0}', 'courte manche', 'homme', '2017-11-26 01:13:23', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `id_personne` int(11) NOT NULL,
  `date_creation` text NOT NULL,
  `date_last_achat` text NOT NULL,
  `createur` text NOT NULL,
  `achats` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `client`
--

INSERT INTO `client` (`id`, `id_personne`, `date_creation`, `date_last_achat`, `createur`, `achats`) VALUES
(1, 10, '10-12-2017 a 04:48', '10-12-2017 a 04:48', '4', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_caissier` int(11) NOT NULL,
  `date_commande` text NOT NULL,
  `date_livraison` text NOT NULL,
  `info_cammande` text NOT NULL,
  `statut_commande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `titre` text NOT NULL,
  `contenu` text NOT NULL,
  `date_creation` text NOT NULL,
  `id_responsable` int(11) NOT NULL,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `message`
--

INSERT INTO `message` (`id`, `titre`, `contenu`, `date_creation`, `id_responsable`, `etat`) VALUES
(1, 'Super Promotion de Air Max', 'Nous offrons  une reduction de 12 % sur chaque Air Maxdu 2017-12-15 au 2017-12-16', '2017-12-15', 4, 4),
(2, 'Super Promotion de Air Max', 'Nous offrons  une reduction de 12 % sur chaque Air Maxdu 2017-12-15 au 2017-12-16', '2017-12-15', 4, 4),
(3, 'Super Promotion de courte manche', 'Nous offrons  une reduction de 45 % sur chaque courte manche du 2017-12-17 au 2017-12-17', '2017-12-17', 4, 4),
(4, 'Super Promotion de longue manche', 'Nous offrons  une reduction de 7 % sur chaque longue manche du 2017-12-10 au 2017-12-23', '2017-12-10', 4, 4),
(5, 'Super Promotion de courte manche', 'Nous offrons  une reduction de 12 % sur chaque courte manche du 2017-12-17 au 2017-12-16', '2017-12-17', 4, 4),
(6, 'Super Promotion de Air Max', 'Nous offrons  une reduction de 45 % sur chaque Air Max du 2017-12-22 au 2017-12-30', '2017-12-22', 4, 4),
(7, 'Super Promotion de longue manche', 'Nous offrons  une reduction de 1 % sur chaque longue manche du 2017-12-23 au 2017-12-10', '2017-12-23', 4, 3),
(8, 'bonjour la miffa', 'je suis', '09-Dec-2017  a 13:43:04', 4, 1),
(9, 'bonjour la miffa', 'je suis', '09-Dec-2017  a 13:44:02', 4, 4),
(10, 'bonjour la miffa', 'je suis', '09-Dec-2017  a 13:46:21', 4, 4),
(11, 'bonjour la miffa', 'je suis', '09-Dec-2017  a 13:47:15', 4, 4);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `personne`
--

CREATE TABLE `personne` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `email` text NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `cni` text NOT NULL,
  `image_cni` text NOT NULL,
  `image` text NOT NULL,
  `adresse` text NOT NULL,
  `telephone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `personne`
--

INSERT INTO `personne` (`id`, `nom`, `prenom`, `email`, `sexe`, `cni`, `image_cni`, `image`, `adresse`, `telephone`) VALUES
(4, 'Atiajio ', 'Vermont ', 'nandjouvermont@yahoo.fr', 'M', '111482572', 'cv-germany-graduate-jaimin-kalaiya-1-638.jpg29-11-2017a00-35admin.jpg', 'Lebenslauf-Muster-Design-07-kostenlose-Vorlage.jpg29-11-2017a00-35admin.jpg', '                  	damas                                                                                          ', '{liste:{0:690764534,1:697168213},total:2}'),
(5, 'lev sd', 'kali', 'ncesairecarlos@yahoo.fr', 'F', '1114559', 'idee-startup-matrice.png09-12-2017a03-18admin.png', 'Bildschirmfoto_vom_2017-11-24_11-51-32.png09-12-2017a03-18admin.png', '                    dschang                  ', '{liste:{0:155555,1:645666565},total:2}'),
(6, 'Cyrille', 'Hapi', 'hapi@yahoo.fr', 'M', '66843546465465', 'lebenslauf_zoll.png10-12-2017a02-26admin.png', 'lebenslauf-fachinformatikeranw.png10-12-2017a02-26admin.png', 'Ilmenau', '{liste:{0:6665654,1:654654654645},total:2}'),
(7, 'Cyrille', 'Hapi', 'hapi@yahoo.fr', 'M', '66843546465465', 'lebenslauf_zoll.png10-12-2017a02-27admin.png', 'lebenslauf-fachinformatikeranw.png10-12-2017a02-27admin.png', 'Ilmenau', '{liste:{0:6665654,1:654654654645},total:2}'),
(8, 'Cyrille ', 'Hapi', 'hapi@yahoo.fr', 'M', '66843546465465', 'lebenslauf_zoll.png10-12-2017a02-28admin.png', 'lebenslauf-fachinformatikeranw.png10-12-2017a02-28admin.png', '                                        Ilmenau                                    ', '{liste:{0:6665654,1:654654654645},total:2}'),
(9, 'ds', 'sdd', '654sd@asa', 'M', '5654', 'idee-startup-matrice.png10-12-2017a04-47admin.png', 'Lebenslauf-Muster-Design-07-kostenlose-Vorlage.jpg10-12-2017a04-47admin.jpg', 'alsjals', '{liste:{0:454,1:654654},total:2}'),
(10, 'ds de vermont', 'sdd', '654sd@asa', 'M', '5654', 'idee-startup-matrice.png10-12-2017a04-48admin.png', 'Lebenslauf-Muster-Design-07-kostenlose-Vorlage.jpg10-12-2017a04-48admin.jpg', '                    alsjals                  ', '{liste:{0:454,1:654654},total:2}');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `date_creation` text NOT NULL,
  `date_fin` text NOT NULL,
  `detail_promotion` text NOT NULL,
  `id_responsable` int(11) NOT NULL,
  `id_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `promotion`
--

INSERT INTO `promotion` (`id`, `date_creation`, `date_fin`, `detail_promotion`, `id_responsable`, `id_stock`) VALUES
(1, '2017-12-16', '2017-12-22', '06-Dec-2017  a 19:00:55', 4, 1),
(2, '2017-12-15', '2017-12-16', '06-Dec-2017  a 19:20:58', 4, 1),
(3, '2017-12-15', '2017-12-16', '06-Dec-2017  a 19:27:04', 4, 2),
(4, '2017-12-15', '2017-12-16', '06-Dec-2017  a 19:32:53', 4, 2),
(5, '2017-12-17', '2017-12-17', '06-Dec-2017  a 20:48:53', 4, 4),
(6, '2017-12-10', '2017-12-23', '06-Dec-2017  a 20:56:00', 4, 3),
(7, '2017-12-17', '2017-12-16', '06-Dec-2017  a 21:41:04', 4, 4),
(8, '2017-12-22', '2017-12-30', '07-Dec-2017  a 17:06:00', 4, 1),
(9, '2017-12-23', '2017-12-10', '09-Dec-2017  a 12:36:55', 4, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sacs`
--

CREATE TABLE `sacs` (
  `id` int(11) UNSIGNED NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `stock_id` int(11) DEFAULT NULL,
  `prix_min` int(11) NOT NULL,
  `prix_max` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `modele` text,
  `couleur` text,
  `pointure` text,
  `taille` text,
  `marque` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `dateCreation` datetime DEFAULT NULL,
  `dateModification` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `stock`
--

CREATE TABLE `stock` (
  `id_stock` int(11) NOT NULL,
  `nom_article` varchar(255) NOT NULL,
  `cat_stock_id` int(11) NOT NULL,
  `tab_cat` text NOT NULL,
  `image` text NOT NULL,
  `dateCreation` date NOT NULL,
  `dateModification` date NOT NULL,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `stock`
--

INSERT INTO `stock` (`id_stock`, `nom_article`, `cat_stock_id`, `tab_cat`, `image`, `dateCreation`, `dateModification`, `etat`) VALUES
(1, 'Air Max', 1, '{total:0}', 'chau2jpg25-11-2017a20-55.jpg', '2017-11-25', '0000-00-00', 1),
(2, 'Jordan', 1, '{total:0}', 'chau3jpg25-11-2017a20-55.jpg', '2017-11-25', '0000-00-00', 0),
(3, 'longue manche', 1, '{total:0}', 'sac4jpg28-11-2017a11-53.jpg', '2017-11-25', '0000-00-00', 1),
(4, 'courte manche', 1, '{total:0}', 'sac1.jpg28-11-2017a11-54.jpg', '2017-11-25', '0000-00-00', 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `caissier`
--
ALTER TABLE `caissier`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `cat_stock`
--
ALTER TABLE `cat_stock`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indizes für die Tabelle `chaussure`
--
ALTER TABLE `chaussure`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indizes für die Tabelle `chemise`
--
ALTER TABLE `chemise`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indizes für die Tabelle `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `sacs`
--
ALTER TABLE `sacs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indizes für die Tabelle `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_stock`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `caissier`
--
ALTER TABLE `caissier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `cat_stock`
--
ALTER TABLE `cat_stock`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `chaussure`
--
ALTER TABLE `chaussure`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `chemise`
--
ALTER TABLE `chemise`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT für Tabelle `personne`
--
ALTER TABLE `personne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `sacs`
--
ALTER TABLE `sacs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
