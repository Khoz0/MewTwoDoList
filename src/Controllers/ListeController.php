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


}
