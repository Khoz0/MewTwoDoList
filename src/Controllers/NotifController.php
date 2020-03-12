<?php

namespace App\Controllers;


use App\Classe\Utilisateur;
use App\Modeles\DB;

class NotifController extends Controller
{
    public function notif()
    {
        return $this->render('notification');
    }
}