<?php
namespace Tests\Controllers;

use App\Controllers\DeleteListeController;
use PHPUnit\Framework\TestCase;
use App\Modeles\DB;

/**
 * Tests CreationListeController
 */
class SuppressionListeControllerTest extends TestCase {

	//Test si la liste a bien été créé
    public function testsuppressionListe() {

    	$fonction = new FonctionTest();

    	$res = false;

		$bdd = DB::getInstance()->getPDO();
		$requete = $bdd->prepare("SELECT count(*) FROM Liste");
		$requete->execute();
		
		$compteur = 0;
		$compteur2 = 0;

		$fonction->ajouterUtilisateurTest();
		$fonction->ajouterListeTest();

		$requete = $bdd->prepare("SELECT count(*) FROM Liste");
		$requete->execute();

		//on compte apres l'insertion
		while($donnees = $requete->fetch()){
			$compteur++;
		}

		//Compte le nb de lignes apres l'insertion
		$nblignes = $compteur;		

		$fonction->supprimerTacheTest();

		while($donnees = $requete->fetch()){
			$compteur2++;
		}

		if($compteur2 == $nblignes - 1){
			$res = true;	
		}

		$fonction->supprimerListeTest();
		$fonction->supprimerUtilisateurTest();

		$this->assert($res, true, 'suppression reussie');

    }

}
