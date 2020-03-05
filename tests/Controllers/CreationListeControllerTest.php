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
    public function testcreationListe() {

    	$fonction = new FonctionTest();

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

		$fonction->ajouterUtilisateurTest();
		$fonction->ajouterListeTest();

		while($donnees = $requete->fetch()){
			$compteur2++;
		}
	
		if($compteur2 == $nblignesdeux){
			$res = true;	
		}

		$fonction->supprimerTacheTest();
		$fonction->supprimerListeTest();

		$this->assert($res, true, 'insertion reussie');

    }

}
