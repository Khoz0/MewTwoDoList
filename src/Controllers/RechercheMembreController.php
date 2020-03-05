<?php


namespace App\Controllers;


class RechercheMembreController extends Controller
{

    public function memberSelect()
    {
        $membreSelection = (new RechercheMembreController());
        return $this->render('membreSelection', compact('membreSelection'));
    }


}