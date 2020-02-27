<?php
namespace Tests\Controllers;

use App\Controllers\ModificationListeController;
use PHPUnit\Framework\TestCase;
use App\Modeles\DB;

/**
 * Tests CreationListeController
 */
class CreationListeControllerTest extends TestCase {

	//Test si la liste a bien été créé
    public function testmodificationListe() {

    	$res = false;

		$bdd = DB::getInstance()->getPDO();

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

		$requete = $bdd->prepare("UPDATE Liste set intitule = 'modif' where idListe = 5000");
		$requete->execute();


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

		$requete = $bdd->prepare("delete from liste where idListe = 5000");
		$requete->execute();

		$requete = $bdd->prepare("delete from utilisateur where mail = 'abcd@abcd.com'");
		$requete->execute();		

		$this->assert($res, true, 'modification reussie');

    }

}
