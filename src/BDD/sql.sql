CREATE TABLE IF NOT EXISTS Utilisateur(
	mail VARCHAR(80) NOT NULL PRIMARY KEY,
	nomUser VARCHAR(50),
	prenomUser VARCHAR(50),
	pseudoUser VARCHAR(50) UNIQUE,
	mdp VARCHAR(16),
	photo BLOB
);

CREATE TABLE IF NOT EXISTS Liste(
	idListe INTEGER(10) NOT NULL PRIMARY KEY,
	intituleListe VARCHAR(50),
	dateCreation VARCHAR(50),
	dateFin VARCHAR(50),
	mailProprietaire VARCHAR(16),
	CONSTRAINT FK_Liste FOREIGN KEY(mailProprietaire) REFERENCES Utilisateur (mail)
);

CREATE TABLE IF NOT EXISTS Tache(
	idTache INTEGER(10) NOT NULL PRIMARY KEY,
	intituleTache VARCHAR(50),
	valide BOOLEAN,
	idListeT INTEGER(50),
	mailUtilisateur VARCHAR(16),
	CONSTRAINT FK_Tache1 FOREIGN KEY(idListeT) REFERENCES Liste(idListe),
	CONSTRAINT FK_Tache2 FOREIGN KEY(mailUtilisateur) REFERENCES Liste(mailProprietaire)
);

CREATE TABLE IF NOT EXISTS Notification(
	idNotification INTEGER(10) NOT NULL PRIMARY KEY,
	dateEnvoi DATE,
	valide BOOLEAN,
	contenu VARCHAR(200),
	lu BOOLEAN,
	mail VARCHAR(50),
	idListe INTEGER(10),
	CONSTRAINT FK_Notification1 FOREIGN KEY(mail) REFERENCES Utilisateur(mail),
	CONSTRAINT FK_Notification2 FOREIGN KEY(idListe) REFERENCES Liste(idListe)
);


CREATE TABLE IF NOT EXISTS NotificationAvecChangement(
	idNotification INTEGER(10) NOT NULL PRIMARY KEY
);

CREATE TABLE IF NOT EXISTS NotificationAvecChoix(
	idNotification INTEGER(10) NOT NULL PRIMARY KEY,
	repondu BOOLEAN
);

CREATE TABLE IF NOT EXISTS NotificationChangementProprietaire(
	idNotification INTEGER(10) NOT NULL PRIMARY KEY
);

CREATE TABLE IF NOT EXISTS NotificationAjoutMembre(
	idNotification INTEGER(10) NOT NULL PRIMARY KEY
);

CREATE TABLE IF NOT EXISTS Destinataire(
	mail VARCHAR(50) NOT NULL PRIMARY KEY,
	idNotification INTEGER(10) NOT NULL
);
