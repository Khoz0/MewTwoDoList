<?php


namespace App\Controllers;

use App\Classe\Liste;
use App\Modeles\DB;


class ListeController extends Controller {

    public function liste() {
    	$id = $_GET['id'];
    	$bdd = serialize(DB::getInstance()->loadListe($id));
        return $this->render('liste', compact('bdd', 'id'));
    }


}
