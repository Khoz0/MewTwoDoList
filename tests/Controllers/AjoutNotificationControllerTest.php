<?php
namespace Tests\Controllers;

use App\Controllers\AccueilController;
use PHPUnit\Framework\TestCase;
use App\Modeles\DB;


/**
 * Tests AddNotificationControllerTest
 */
class AddNotificationControllerTest extends TestCase {

	//Test si la notification a bien été ajouté
    public function testaddNotification() {

    	$fonction = new FonctionTest();
    	
		$res = false;

		$bdd = DB::getInstance()->getPDO();

		$requete = $bdd->prepare("SELECT count(*) FROM notification");
		$requete->execute();

		$compteur = 0;
		$compteur2 = 0;

		while($donnees = $requete->fetch()){
			$compteur++;
		}	

		//Compte le nb de lignes avant l'insertion
		$nblignes = $compteur;

		$fonction->ajouterUtilisateurTest();
		$fonction->ajouterNotificationTest();

		//Compte le nombre de lignes après l'insertion
		$nblignesdeux = $nblignes + 1;
		$requete = $bdd->prepare("SELECT count(*) FROM notification");
		$requete->execute();

		while($donnees = $requete->fetch()){
			$compteur2++;
		}
	
		if($compteur2 == $nblignesdeux){
			$res = true;	
		}

		$fonction->supprimerNotificationTest();
		$fonction->supprimerUtilisateurTest();


		$this->assert($res, true, 'insertion reussie');
    }
}