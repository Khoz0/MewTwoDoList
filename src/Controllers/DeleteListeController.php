<?php

namespace App\Controllers;

use App\Modeles\DB;
class DeleteListeController extends Controller
{
    public function deleteListe()
    {

        $liste = DB::getInstance()->loadListe($_GET['id']);
        $liste->supprimer();
        return $this->render('accueil');

    }
}
