<?php

namespace App\Controllers;


use App\Classe\Utilisateur;
use App\Modeles\DB;

class NotifController extends Controller
{
    public function notif()
    {
	/*
	$id = $_GET['id'] ?? $this->redirect('accueil');
	$bdd = DB :: getInstance()->loadNotification($id);

	return $this->render('notif', compact('bdd','id');
	*/

        return $this->render('notification');
    }
}
