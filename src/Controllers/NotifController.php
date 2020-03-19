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

	public function deleteNotif(){
		/*$idNotif = $_GET['idNotification'];

		$bdd = DB::getInstance();
    		$bdd->deleteNotification($idNotif);
        	$liste = $bdd->loadNotif($idNotif);
    		*/
	}

	public function createNotif($type){
		//notif ajout membre
		if($type == 'ajoutMembre'){
			
		//notif changement
		}else if($type == 'changement'){
		
		//notif avec choix
		}else if($type == 'avecChoix'){

		//notif changement de proprio
		}else{

		}
	}
	
}
