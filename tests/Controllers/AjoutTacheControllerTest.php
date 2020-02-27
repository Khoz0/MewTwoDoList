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

		//creation proprio

		$mail = 'abcd@abcd.com';
		$nom_user = 'bonjour';
		$prenomUser  = 'aurevoir';
		$pseudoUser  = 'pseudo';
		$mdp  = 'mdp123';

		$requete = $bdd->prepare("INSERT INTO UTILISATEUR(mail, nomUser, prenomUser, pseudoUser, mdp) values(" + $mail + "," + $nom_user + "," + $prenomUser + "," + $pseudoUser + "," + $mdp + ")");
		$requete->execute();

		//creation liste

		$id = 5000;
		$intitule = 'intitule';
		$datecrea = '1999-06-04';
		$datefin = '2030-12-25';
		$proprio = 'mdp123';

        //On réalise l'insertion
		$requete = $bdd->prepare("INSERT INTO Liste(idListe,intituleListe,dateCreation,dateFin,mailProprietaire) values(" + $id + "," + $intitule + "," + $datecrea + "," + $datefin + "," + $proprio + "," + $etat + ")");
		$requete->execute();


		//creation tache

		$idT = 6000;
		$intitule = 'intituleT';


		$requete = $bdd->prepare("INSERT INTO Tache(idTache,intituleTache,valide,idListeT,mailUtilisateur) values(" + $idT + "," + $intitule + ", TRUE ," + $id + "," + $proprio + ")");
		$requete->execute();



		$nblignesdeux = $nblignes + 1;
		$requete = $bdd->prepare("SELECT count(*) FROM Tache");
		$requete->execute();

		while($donnees = $requete->fetch()){
			$compteur2++;
		}
	
		if($compteur2 == $nblignesdeux){
			$res = true;	
		}

		$requete = $bdd->prepare("delete from utilisateur where mail = 'abcd@abcd.com'");
		$requete->execute();

		$requete = $bdd->prepare("delete from liste where idListe = 5000");
		$requete->execute();

		$requete = $bdd->prepare("delete from tache where idTache = 6000");
		$requete->execute();

		$this->assert($res, true, 'insertion reussie');
		
    }
}
