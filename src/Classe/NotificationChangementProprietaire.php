<?php
namespace App\Classe;

use App\Modeles\DB;

class NotificationChangementProprietaire extends NotificationAvecChoix {

  function __construct($idNotif,$dateCreation, $contenu, $sourceUtilisateur, $idListe, $mailMembre) {
      parent::__construct($idNotif,$dateCreation, $contenu, $sourceUtilisateur, $idListe, $mailMembre);
    }



    public function changementProprietaire() {

    }

    function typeNotif()
    {
        return "notificationChangementProprietaire";
    }

    public function ajouterBDD() {
        $bdd = DB::getInstance();
        $bdd->addNotification($this);
        $bdd->createNotifChangementProprietaire($this->idNotif);
        $bdd->createNotifAvecChoix($this->idNotif,0);
    }

}

 ?>
