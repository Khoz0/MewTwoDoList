<?php


namespace App\Controllers;

use App\Classe\Liste;
use App\Modeles\DB;


class ListeController extends Controller {

    public function liste() {
    	$id = $_GET['id'];
    	$bdd = serialize(DB::getInstance()->loadListe($id));

    	/*
    	Faire : si pas de résultat, alors affiche erreur 404 ...
    	if (is_null($bdd)) {
    		// Exception ici ?
    	}
    	*/

        return $this->render('liste', compact('bdd', 'id'));
    }


}
