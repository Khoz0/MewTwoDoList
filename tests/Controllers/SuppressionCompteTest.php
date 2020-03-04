<?php
namespace Tests\Controllers;

use App\Controllers\DeleteAccountController;
use PHPUnit\Framework\TestCase;
use App\Modeles\DB;

/**
 * Tests AjoutTacheControllerTest
 */
class SupprimerCompteTest extends TestCase {

     //Test si la liste a bien été ajouté à la bdd
    public function testasupprimerCompte() {
		$res = false;

		$bdd = DB::getInstance()->getPDO();
		$requete = $bdd->prepare("SELECT count(*) FROM Utilisateur");
		$requete->execute();
		
		$compteur = 0;
		$compteur2 = 0;
		
        //Compte le nb de lignes avant l'insertion
		$mail = 'abcd@abcd.com';
		$nom_user = 'bonjour';
		$prenomUser  = 'aurevoir';
		$pseudoUser  = 'pseudo';
		$mdp  = 'mdp123';

        //On réalise l'insertion
		$requete = $bdd->prepare("INSERT INTO UTILISATEUR(mail, nomUser, prenomUser, pseudoUser, mdp) values(" + $mail + "," + $nom_user + "," + $prenomUser + "," + $pseudoUser + "," + $mdp + ")");
		$requete->execute();	

        //Compte le nombre de lignes après l'insertion
		$requete = $bdd->prepare("SELECT count(*) FROM Utilisateur");
		$requete->execute();

		while($donnees = $requete->fetch()){
			$compteur++;
		}		

		$requete = $bdd->prepare("delete from utilisateur where mail = 'abcd@abcd.com'");
		$requete->execute();

		while($donnees = $requete->fetch()){
			$compteur2 --;
		}

		if($compteur2 == -1){
			$res = true;	
		}			

		$this->assert($res, true, 'suppression reussie');
		
    }
}
