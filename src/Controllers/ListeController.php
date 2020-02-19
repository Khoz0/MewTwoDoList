<?php


namespace App\Controllers;

use App\Classe\Liste;
use App\Modeles\DB;


class ListeController extends Controller {

    public function liste() {
        return $this->render('liste');
    }


}