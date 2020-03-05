<?php


namespace App\Controllers;
use App\Classe\Tache;
use App\Modeles\DB;

class ModificationTacheController extends Controller
{

    public function modifTache()
    {
        return $this->render('modifTache');
    }

    public function modificationTache($id){

        $tache = DB::getInstance()->loadTache($id);


    }
}
