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
}

 ?>
