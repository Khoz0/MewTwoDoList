<?php

namespace Tests\Controllers;

	use App\Controllers\AccueilController;
	use PHPUnit\Framework\TestCase;
	use App\Modeles\DB;

class UtilisateurFonctionTest {

	//Fonction qui ajoute un utilisateur dans la BDD
	public fonction ajouterUtilisateurTest()
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
	public fonction supprimerUtilisateurTest()
	{
		$requete = $bdd->prepare("delete from utilisateur where mail = 'abcd@abcd.com'");
		$requete->execute();
	}

	//Fonction qui ajoute une liste dans la BDD
	public fonction ajouterListeTest()
	{
		$id = 5000;
		$intitule = 'intitule';
		$datecrea = '1999-06-04';
		$datefin = '2030-12-25';
		$proprio = 'mdp123';

		$requete = $bdd->prepare("INSERT INTO Liste(idListe,intituleListe,dateCreation,dateFin,mailProprietaire) values(" + $id + "," + $intitule + "," + $datecrea + "," + $datefin + "," + $proprio + ")");
		$requete->execute();

	}

	//Fonction qui supprimer une liste de la BDD
	public fonction supprimerListeTest()
	{
		$requete = $bdd->prepare("delete from liste where idListe = 5000");
		$requete->execute();
	}

	//Fonction qui ajoute une tâche dans la BDD
	public fonction ajouterTacheTest()
	{
		$idT = 6000;
		$intitule = 'intituleT';
		$valide = 1;
		$idListeT = 5000;
		$mailUtilisateur = 'abcd@abcd.com';


		$requete = $bdd->prepare("INSERT INTO Tache(idTache,intituleTache,valide,idListeT,mailUtilisateur) values(" + $idT + "," + $intitule + "," + $valide + "," + $idListeT + "," + $mailUtilisateur + ")");
		$requete->execute();
	}

	//Fonction qui supprimer une tâche de la BDD
	public fonction supprimerTacheTest()
	{
		$requete = $bdd->prepare("delete from tache where idTache = 6000");
		$requete->execute();
	}

}

?>