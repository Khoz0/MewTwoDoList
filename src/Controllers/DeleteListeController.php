<?php

namespace App\Controllers;

use App\Modeles\DB;
class DeleteListeController extends Controller
{
    public function deleteListe()
    {
        DB::getInstance()->deleteListe();
        return $this->render('accueil');

    }
}
