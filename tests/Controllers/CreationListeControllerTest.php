<?php
namespace Tests\Controllers;

use App\Controllers\CreationListeController;
use PHPUnit\Framework\TestCase;
use App\Modeles\DB;

/**
 * Tests CreationListeController
 */
class CreationListeControllerTest extends TestCase {

	//Test si la liste a bien été créé
    public function testcreationListe($creationListe) {

    	$res = false;

		$bdd = DB::getInstance()->getPDO();
		$requete = $bdd->prepare("SELECT count(*) FROM Liste");
		$requete->execute();
		
		$compteur = 0;
		$compteur2 = 0;

		while($donnees = $requete->fetch()){
			$compteur++;
		}

		//Compte le nb de lignes avant l'insertion
		$nblignes = $compteur;

		//on ajoute un proprio
		$mail = 'abcd@abcd.com';
		$nom_user = 'bonjour';
		$prenomUser  = 'aurevoir';
		$pseudoUser  = 'pseudo';
		$mdp  = 'mdp123';

		$requete = $bdd->prepare("INSERT INTO UTILISATEUR(mail, nomUser, prenomUser, pseudoUser, mdp) values(" + $mail + "," + $nom_user + "," + $prenomUser + "," + $pseudoUser + "," + $mdp + ")");
		$requete->execute();


		$id = 5000;
		$intitule = 'intitule';
		$datecrea = '1999-06-04';
		$datefin = '2030-12-25';
		$proprio = 'mdp123';

        //On réalise l'insertion
		$requete = $bdd->prepare("INSERT INTO Liste(idListe,intituleListe,dateCreation,dateFin,mailProprietaire) values(" + $id + "," + $intitule + "," + $datecrea + "," + $datefin + "," + $proprio + "," + $etat + ")");
		$requete->execute();

		$nblignesdeux = $nblignes + 1;
		$requete = $bdd->prepare("SELECT count(*) FROM Utilisateur");
		$requete->execute();

		while($donnees = $requete->fetch()){
			$compteur2++;
		}
	
		if($compteur2 == $nblignesdeux){
			$res = true;	
		}

		$requete = $bdd->prepare("delete from utilisateur where mail = 'abcd@abcd.com'");
		$requete->execute();

		$requete = $bdd->prepare("delete from liste where idListe = 5000");
		$requete->execute();

		$this->assert($res, true, 'insertion reussie');

    }

}
