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

    public function addUser(){
        $mail = $_GET['mail'];
        $id = $_GET['idTache'];
        $idListe = $_GET['idListe'];
        DB::getInstance()->addUserTache($mail,$id);

        $this->redirect("liste&id=$idListe");
    }

    public function deleteUser(){
        $mail = $_GET['mail'];
        $id = $_GET['idTache'];
        $idListe = $_GET['idListe'];
        DB::getInstance()->deleteUserTache($id);

        $this->redirect("liste&id=$idListe");
    }


}
