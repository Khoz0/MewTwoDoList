<?php
namespace Tests\Controllers;

use App\Controllers\DeleteAccountController;
use PHPUnit\Framework\TestCase;
use App\Modeles\DB;

/**
 * Tests AjoutTacheControllerTest
 */
class SuppressionCompteTest extends TestCase {

     //Test si la liste a bien été ajouté à la bdd
    public function testasupprimerCompte() {

    	$fonction = new FonctionTest();
    	
		$res = false;

		$bdd = DB::getInstance()->getPDO();
		$requete = $bdd->prepare("SELECT count(*) FROM Utilisateur");
		$requete->execute();
		
		$compteur = 0;
		$compteur2 = 0;
		
        $fonction->ajouterUtilisateurTest();	

        //Compte le nombre de lignes après l'insertion
		$requete = $bdd->prepare("SELECT count(*) FROM Utilisateur");
		$requete->execute();

		while($donnees = $requete->fetch()){
			$compteur++;
		}		

		$fonction->supprimerUtilisateurTest();

		while($donnees = $requete->fetch()){
			$compteur2 --;
		}

		if($compteur2 == -1){
			$res = true;	
		}			

		$this->assert($res, true, 'suppression reussie');
		
    }
}
