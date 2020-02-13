<?php


namespace App\Controllers;


class CompteController extends Controller {

    public function compte() {

        return $this->render('compte');
    }

    public function getPseudo(){
        $pseudo = $_GET["inputPseudo"];
        echo $pseudo;
    }
}