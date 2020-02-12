-- SQL ICI
CREATE TABLE Utilisateur(
mail VARCHAR(30) NOT NULL PRIMARY KEY, 
nomUser VARCHAR(50),
prenomUser VARCHAR(50),
pseudoUser VARCHAR(50) UNIQUE,
mdp VARCHAR(16), 
photo BLOB
)

CREATE TABLE Liste(
idListe NUMBER(10) NOT NULL PRIMARY KEY, 
intituleListe VARCHAR(50),
dateCreation VARCHAR(50),
dateFin VARCHAR(50),
mailProprietaire VARCHAR(16), 
CONSTRAINT FK_User FOREIGN KEY(mailProprietaire) REFERENCES Utilisateur (mail)
)

CREATE TABLE Tache(
idTache NUMBER(10) NOT NULL PRIMARY KEY, 
intituleTache VARCHAR(50),
valide BOOLEEN(50),
idListe NUMBER(50),
mailListe VARCHAR(16), 
CONSTRAINT FK_User FOREIGN KEY(idListe) REFERENCES Liste(idListe),
CONSTRAINT FK_User FOREIGN KEY(mailListe) REFERENCES Liste(mailProprietaire)
)

CREATE TABLE Notification(
idNotification NUMBER(10) NOT NULL PRIMARY KEY, 
dateEnvoi DATE,
valide BOOLEEN,
contenu VARCHAR(200),
lu BOOLEEN, 
mail VARCHAR(50),
idListe NUMBER(10),
CONSTRAINT FK_User FOREIGN KEY(mail) REFERENCES Utilisateur(mail),
CONSTRAINT FK_User FOREIGN KEY(idListe) REFERENCES Liste(idListe)
)


CREATE TABLE NotificationAvecChangement(
idNotification NUMBER(10) NOT NULL PRIMARY KEY
)

CREATE TABLE NotificationAvecChoix(
idNotification NUMBER(10) NOT NULL PRIMARY KEY, 
repondu BOOLEEN
)

CREATE TABLE NotificationChangementProprietaire(
idNotification NUMBER(10) NOT NULL PRIMARY KEY
)

CREATE TABLE NotificationAjoutMembre(
idNotification NUMBER(10) NOT NULL PRIMARY KEY
)

CREATE TABLE Destinataire(
    mail VARCHAR(50) NOT NULL PRIMARY KEY,
idNotification NUMBER(10) NOT NULL PRIMARY KEY
)

CREATE TABLE Membre(
CONSTRAINT FK_User FOREIGN KEY(mail) REFERENCES Utilisateur(mail))  NOT NULL PRIMARY KEY,
CONSTRAINT FK_User FOREIGN KEY(idListe) REFERENCES Utilisateur(idListe))  NOT NULL PRIMARY KEY
)
