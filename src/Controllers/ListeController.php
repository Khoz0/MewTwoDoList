<?php


namespace App\Controllers;

use App\Classe\Liste;
use App\Modeles\DB;


class ListeController extends Controller {

    public function liste() {
    	$id = $_GET['id'] ?? $this->redirect('accueil');
    	$bdd = DB::getInstance()->loadListe($id);

        /*
    	if (is_null($bdd)) {
            return $this->render('404');
        }
        */

        return $this->render('liste', compact('bdd', 'id'));
    }

	public function deleteListMember(){
		$mail = $_GET['mail'];
		$idListe = $_GET['idListe'];
		$bdd = DB::getInstance();
    	$bdd->deleteListMember($mail, $idListe);
        $liste = $bdd->loadListe($idListe);
        $liste->retirerUtilisateur($mail);
    	if($bdd->isMemberIn($mail, $idListe)) {
            $this->redirect("liste&id=$idListe");
        }
    	else{
            $this->redirect("accueil");
        }
	}

    public function addListMember(){
        $mail = $_GET['mail'];
        $idListe = $_GET['idListe'];
        $bdd = DB::getInstance();
        $bdd->addMembre($mail, $idListe);
        $liste = $bdd->loadListe($idListe);
        $liste->ajouterUtilisateur($mail);

        $this->redirect("liste&id=$idListe");
    }


}
