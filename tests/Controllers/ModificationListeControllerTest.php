<?php
namespace Tests\Controllers;

use App\Controllers\ModificationListeController;
use PHPUnit\Framework\TestCase;
use App\Modeles\DB;

/**
 * Tests ModificationListeController
 */
class ModificationListeControllerTest extends TestCase {

	//Test si la liste a bien été modifié
    public function testmodificationListe() {

    	$fonction = new FonctionTest();

    	$res = false;

		$bdd = DB::getInstance()->getPDO();

		$fonction->ajouterUtilisateurTest();
		$fonction->ajouterListeTest();
		$fonction->modifierListeTest();


		$modif = '';
		$compteur = 0;
		$requete = $bdd->prepare("select intitule from liste where idListe = 5000");	
		while($donnees = $requete->fetch()){
			$modif = $donnees;
			$compteur++;
		}

		if($compteur == 1 && $modif == 'modif'){
			$res = true;	
		}

		$requete = $bdd->prepare("UPDATE Liste set dateFin = '2030-05-05' where idListe = 5000");
		$requete->execute();

		$modif = '';
		$compteur = 0;
		$requete = $bdd->prepare("select dateFin from liste where idListe = 5000");	
		while($donnees = $requete->fetch()){
			$modif = $donnees;
			$compteur++;
		}

		$datedeb = '';
		$requete = $bdd->prepare("select dateDebut from liste where idListe = 5000");	
		while($donnees = $requete->fetch()){
			$datedeb = $donnees;
		}

		$debut = strtotime($datedeb);
		$fin = strtotime($datefin);

		if($compteur == 1 && $modif == '2030-05-05' && $debut < $fin){
			$res = true;	
		}

		$fonction->supprimerListeTest();
		$fonction->supprimerUtilisateurTest();	

		$this->assert($res, true, 'modification reussie');

    }

}
