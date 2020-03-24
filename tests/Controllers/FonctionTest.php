<?php

namespace Tests\Controllers;

	use App\Controllers\AccueilController;
	use PHPUnit\Framework\TestCase;
	use App\Modeles\DB;

class FonctionTest {

	//Fonction qui ajoute un utilisateur dans la BDD
	public function ajouterUtilisateurTest()
	{
		$mail = 'abcd@abcd.com';
		$nom_user = 'bonjour';
		$prenomUser  = 'aurevoir';
		$pseudoUser  = 'pseudo';
		$mdp  = 'mdp123';

        //On réalise l'insertion
		$requete = $bdd->prepare("INSERT INTO UTILISATEUR(mail, nomUser, prenomUser, pseudoUser, mdp) values(" + $mail + "," + $nom_user + "," + $prenomUser + "," + $pseudoUser + "," + $mdp + ")");
		$requete->execute();
	}

	//Fonction qui supprime un utilisateur de la BDD
	public function supprimerUtilisateurTest()
	{
		$requete = $bdd->prepare("delete from utilisateur where mail = 'abcd@abcd.com'");
		$requete->execute();
	}

	//Fonction qui ajoute une liste dans la BDD
	public function ajouterListeTest()
	{
		$id = 5000;
		$intitule = 'intitule';
		$datecrea = '1999-06-04';
		$datefin = '2030-12-25';
		$proprio = 'mdp123';

		$requete = $bdd->prepare("INSERT INTO liste(idListe,intituleListe,dateCreation,dateFin,mailProprietaire) values(" + $id + "," + $intitule + "," + $datecrea + "," + $datefin + "," + $proprio + ")");
		$requete->execute();

	}

	//Fonction qui supprimer une liste de la BDD
	public function supprimerListeTest()
	{
		$requete = $bdd->prepare("delete from liste where idListe = 5000");
		$requete->execute();
	}

	//Fonction qui ajoute une tâche dans la BDD
	public function ajouterTacheTest()
	{
		$idT = 6000;
		$intitule = 'intituleT';
		$valide = 1;
		$idListeT = 5000;
		$mailUtilisateur = 'abcd@abcd.com';


		$requete = $bdd->prepare("INSERT INTO tache(idTache,intituleTache,valide,idListeT,mailUtilisateur) values(" + $idT + "," + $intitule + "," + $valide + "," + $idListeT + "," + $mailUtilisateur + ")");
		$requete->execute();
	}

	//Fonction qui supprimer une tâche de la BDD
	public function supprimerTacheTest()
	{
		$requete = $bdd->prepare("delete from tache where idTache = 6000");
		$requete->execute();
	}

	//Fonction qui ajouter une notification dans la bdd
	public function ajouterNotificationTest()
	{
		$idNotif = 5555;
		$dateenvoi = '1999-06-04';
		$valide = "null"
		$contenu = "ceci est un contenu"
		$lu = 1;
		$mailUtilisateur = 'abcd@abcd.com';
		$idListe = 5000;
		$mailMembre = 'abcd@abcd.com';

		$requete = $bdd->prepare("INSERT INTO notification(idNotification,dateEnvoi,valide,contenu,lu,mail,idListe,mailMembre) values(" + $idNotif + "," + $dateenvoi + "," + $valide + "," + $contenu + "," + $lu + "," + $mailUtilisateur + "," + $idListe + "," + $mailMembre + ")");
		$requete->execute();


	}

	//Fonction qui supprimer une notification dans la bdd
	public function supprimerNotificationTest()
	{
		$requete = $bdd->prepare("delete from notification where idNotification = 5555");
		$requete->execute();
	}

}
