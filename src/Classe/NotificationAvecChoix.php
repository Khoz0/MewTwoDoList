<?php

namespace App\Classe;

use App\Modeles\DB;

abstract class NotificationAvecChoix extends Notification {


  function __construct($idNotif,$dateCreation, $contenu, $sourceUtilisateur, $idListe, $mailMembre) {
      parent::__construct($idNotif,$dateCreation, $contenu, $sourceUtilisateur, $idListe, $mailMembre);
      $this->valide = 0;
    }

    public function accepter(){
    }

    public function refuser(){
    }

}

?>
