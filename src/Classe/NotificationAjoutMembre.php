<?php
namespace App\Classe;

use App\Modeles\DB;

class NotificationAjoutMembre extends NotificationAvecChoix {

  function __construct($idNotif,$dateCreation, $contenu, $sourceUtilisateur, $idListe, $mailMembre) {
      parent::__construct($idNotif,$dateCreation, $contenu, $sourceUtilisateur, $idListe, $mailMembre);
    }

    public function ajoutMembre() {
  }

    function typeNotif()
    {
        return "notificationAjoutMembre";
    }

    public function ajouterBDD() {
        $bdd = DB::getInstance();
        $bdd->addNotification($this);
        $bdd->createNotifAjoutMembre($this->idNotif);
        $bdd->createNotifAvecChoix($this->idNotif,0);
    }
}
?>
