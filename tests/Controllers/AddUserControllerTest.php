<?php
namespace Tests\Controllers;

use App\Controllers\AccueilController;
use PHPUnit\Framework\TestCase;
use App\Modeles\DB;


/**
 * Tests AddUserControllerTest
 */
class AddUserControllerTest extends TestCase {


	//Test si l'utilisateur a bien été ajouté
    public function testaddUser() {
		$res = false;

		$bdd = DB::getInstance()->getPDO();
		$requete = $bdd->prepare("SELECT count(*) FROM Utilisateur");
		$requete->execute();
		
		$compteur = 0;
		$compteur2 = 0;
		while($donnees = $requete->fetch()){
			$compteur++;
		}		

        //Compte le nb de lignes avant l'insertion
		$nblignes = $compteur;

		$mail = 'abcd@abcd.com';
		$nom_user = 'bonjour';
		$prenomUser  = 'aurevoir';
		$pseudoUser  = 'pseudo';
		$mdp  = 'mdp123';

        //On réalise l'insertion
		$requete = $bdd->prepare("INSERT INTO UTILISATEUR(mail, nomUser, prenomUser, pseudoUser, mdp) values(" + $mail + "," + $nom_user + "," + $prenomUser + "," + $pseudoUser + "," + $mdp + ")");
		$requete->execute();

        //Compte le nombre de lignes après l'insertion
		$nblignesdeux = $nblignes + 1;
		$requete = $bdd->prepare("SELECT count(*) FROM Utilisateur");
		$requete->execute()

		while($donnees = $requete->fetch()){
			$compteur2++
		}
	
		if($compteur2 == $nblignesdeux){
			$res = true	
		}

		$requete = $bdd->prepare("delete from utilisateur where mail = 'abcd@abcd.com'");
		$requete->execute()

		$this->assert($res, true, 'insertion reussie');

    }
}
