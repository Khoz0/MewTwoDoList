SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE IF NOT EXISTS ppil;
ALTER DATABASE ppil DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE ppil;

DROP TABLE  IF EXISTS `Images`;
DROP TABLE IF EXISTS `Destinataire`;
CREATE TABLE `Destinataire` (
  `mail` varchar(100) NOT NULL,
  `idNotification` int(10) NOT NULL,
  PRIMARY KEY (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `Liste`;
CREATE TABLE `Liste` (
  `idListe` int(10) NOT NULL,
  `intituleListe` varchar(50) DEFAULT NULL,
  `dateCreation` varchar(50) DEFAULT NULL,
  `dateFin` varchar(50) DEFAULT NULL,
  `mailProprietaire` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idListe`),
  KEY `FK_Liste` (`mailProprietaire`),
  CONSTRAINT `FK_Liste` FOREIGN KEY (`mailProprietaire`) REFERENCES `Utilisateur` (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Membre`;
CREATE TABLE `Membre` (
  `mail` varchar(100) DEFAULT NULL,
  `idListe` int(10) DEFAULT NULL,
  KEY `FK_Membre1` (`mail`),
  KEY `FK_Membre2` (`idListe`),
  CONSTRAINT `FK_Membre1` FOREIGN KEY (`mail`) REFERENCES `Utilisateur` (`mail`),
  CONSTRAINT `FK_Membre2` FOREIGN KEY (`idListe`) REFERENCES `Liste` (`idListe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Notification`;
CREATE TABLE `Notification` (
  `idNotification` int(10) NOT NULL,
  `dateEnvoi` date DEFAULT NULL,
  `valide` tinyint(1) DEFAULT NULL,
  `contenu` varchar(200) DEFAULT NULL,
  `lu` tinyint(1) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `idListe` int(10) DEFAULT NULL,
  PRIMARY KEY (`idNotification`),
  KEY `FK_Notification1` (`mail`),
  KEY `FK_Notification2` (`idListe`),
  CONSTRAINT `FK_Notification1` FOREIGN KEY (`mail`) REFERENCES `Utilisateur` (`mail`),
  CONSTRAINT `FK_Notification2` FOREIGN KEY (`idListe`) REFERENCES `Liste` (`idListe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `NotificationAjoutMembre`;
CREATE TABLE `NotificationAjoutMembre` (
  `idNotification` int(10) NOT NULL,
  PRIMARY KEY (`idNotification`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `NotificationAvecChangement`;
CREATE TABLE `NotificationAvecChangement` (
  `idNotification` int(10) NOT NULL,
  PRIMARY KEY (`idNotification`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `NotificationAvecChoix`;
CREATE TABLE `NotificationAvecChoix` (
  `idNotification` int(10) NOT NULL,
  `repondu` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idNotification`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `NotificationChangementProprietaire`;
CREATE TABLE `NotificationChangementProprietaire` (
  `idNotification` int(10) NOT NULL,
  PRIMARY KEY (`idNotification`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tache`;
CREATE TABLE `Tache` (
  `idTache` int(10) NOT NULL,
  `intituleTache` varchar(50) DEFAULT NULL,
  `valide` tinyint(1) DEFAULT NULL,
  `idListeT` int(50) DEFAULT NULL,
  `mailUtilisateur` varchar(100) DEFAULT NULL,
  `etat` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`idTache`),
  KEY `FK_Tache1` (`idListeT`),
  KEY `FK_Tache2` (`mailUtilisateur`),
  CONSTRAINT `FK_Tache1` FOREIGN KEY (`idListeT`) REFERENCES `Liste` (`idListe`),
  CONSTRAINT `FK_Tache2` FOREIGN KEY (`mailUtilisateur`) REFERENCES `Utilisateur` (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Utilisateur`;
CREATE TABLE `Utilisateur` (
  `mail` varchar(100) NOT NULL,
  `nomUser` varchar(50) DEFAULT NULL,
  `prenomUser` varchar(50) DEFAULT NULL,
  `pseudoUser` varchar(50) DEFAULT NULL,
  `mdp` varchar(16) DEFAULT NULL,
  `photo` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`mail`),
  UNIQUE KEY `pseudoUser` (`pseudoUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
