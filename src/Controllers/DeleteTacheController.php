<?php

namespace App\Controllers;

use App\Modeles\DB;
class DeleteTacheController extends Controller
{
    public function deleteTache()
    {
        DB::getInstance()->deleteTache($_GET['idTache']);
        return $this->render('accueil');

    }
}