<?php
namespace Tests\Controllers;

use App\Controllers\AccueilController;
use PHPUnit\Framework\TestCase;
use App\Modeles\DB;

/**
 * Tests DeleteUserControllerTest
 */
class DeleteNotificationControllerTest extends TestCase {

	//Test si l'utilisateur a bien été supprimé de la BDD
    public function testsuppNotification() {

    	$fonction = new FonctionTest();
    	
		$res = false;

		$bdd = DB::getInstance()->getPDO();
		$requete = $bdd->prepare("SELECT count(*) FROM notification");
		$requete->execute();

		$compteur = 0;
		$compteur2 = 0;

		$fonction->ajouterUtilisateurTest();
		$fonction->ajouterNotificationTest();

		//on compte apres l'insertion
		while($donnees = $requete->fetch()){
			$compteur++;
		}

		//Compte le nb de lignes apres l'insertion
		$nblignes = $compteur;

		$fonction->supprimerNotificationTest();

		while($donnees = $requete->fetch()){
			$compteur2++;
		}

		if($compteur2 == $nblignes - 1){
			$res = true;
		}
		
		$fonction->supprimerUtilisateurTest();

		$this->assert($res, true, 'suppression reussie');

    }
}
?>