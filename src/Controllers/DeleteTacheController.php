<?php

namespace App\Controllers;

use App\Modeles\DB;
class DeleteTacheController extends Controller
{
    public function deleteTache()
    {
        DB::getInstance()->deleteTache($_GET['id']);
        return $this->render('accueil');

    }
}
