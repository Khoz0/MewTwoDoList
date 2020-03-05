<?php
namespace Tests\Controllers;

use App\Controllers\AjoutTacheController;
use PHPUnit\Framework\TestCase;
use App\Modeles\DB;


/**
 * Tests AjoutTacheControllerTest
 */
class AjoutTacheControllerTest extends TestCase {

     //Test si la liste a bien été ajouté à la bdd
    public function testajouterTache() {

    	$fonction = new FonctionTest();

		$res = false;

		$bdd = DB::getInstance()->getPDO();
		$requete = $bdd->prepare("SELECT count(*) FROM Tache");
		$requete->execute();
		
		$compteur = 0;
		$compteur2 = 0;
		while($donnees = $requete->fetch()){
			$compteur++;
		}

		$nblignes = $compteur;

		$fonction->ajouterUtilisateurTest();
		$fonction->ajouterListeTest();
		$fonction->ajouterTacheTest();

		$nblignesdeux = $nblignes + 1;
		$requete = $bdd->prepare("SELECT count(*) FROM Tache");
		$requete->execute();

		while($donnees = $requete->fetch()){
			$compteur2++;
		}
	
		if($compteur2 == $nblignesdeux){
			$res = true;	
		}

		$fonction->supprimerTacheTest();
		$fonction->supprimerListeTest();
		$fonction->supprimerUtilisateurTest();

		$this->assert($res, true, 'insertion reussie');
		
    }
}
