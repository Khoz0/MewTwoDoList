<?php


namespace App\Controllers;

use App\Classe\Tache;
use App\Modeles\DB;


class TacheController extends Controller {

    public function tache() {
    	$idTache = $_GET['idTache'];
    	$bdd = DB::getInstance()->loadListe($idTache);

        return $this->render('tache', compact('bdd', 'idTache'));
    }


}
