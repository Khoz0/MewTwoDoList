# Projet PPIL, 2020

## Initialiser la base de données:

Creer un fichier de configuration dans **src/Config/config.ini**.

Un exemple de configuration est fourni dans **src/Config/config-exemple.ini**.

## L'arborescence se fait de cette manière :
	- dossier "src" avec toutes les sources php.
		- dossier "config" avec les configurations (informations concernant la BDD par exemple)
		- dossier "modeles" qui contient les informations de l'applications
		- dossier "vues" qui contient le code HTML
		- dossier "controlleurs" qui contient la logique de notre application
	- dossier "public" avec l'"index.php", les fichiers css, javascript ainsi que toutes les images


## Contenu du fichier src/Config/config.ini

	; Nom d'utilisateur de la base de données
	user=root

	; Mot de passe de la base de données
	pass=root

	; Le nom de la base de donnee utilisee
	db=ppil

	; Le nom d'hôte de la base de donnees
	host=localhost
