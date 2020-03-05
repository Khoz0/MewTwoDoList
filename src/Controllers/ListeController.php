<?php


namespace App\Controllers;

use App\Classe\Liste;
use App\Modeles\DB;


class ListeController extends Controller {

    public function liste() {
    	$id = $_GET['id'];
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
    	$bdd = DB::getInstance()->deleteListMember($mail, $idListe);

		$this->redirect("liste&id=$idListe");
	}

    public function addListMember(){
        $mail = $_GET['mail'];
        $idListe = $_GET['idListe'];
        $bdd = DB::getInstance()->addMembre($mail, $idListe);

        $this->redirect("liste&id=$idListe");
    }


}
