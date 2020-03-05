<?php


namespace App\Controllers;


class RechercheMembreController
{

    public function memberSelect()
    {
        $membreSelection = (new RechercheMembreController());
        return $this->render('membreSelection', compact('membreSelection'));
    }


}