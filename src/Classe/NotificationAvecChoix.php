<?php

namespace App\Classe;

use App\Modeles\DB;

abstract class NotificationAvecChoix extends Notification {
  protected $repondu;

  function __construct($idNotif,$dateCreation, $contenu, $sourceUtilisateur, $idListe, $mailMembre) {
      parent::__construct($idNotif,$dateCreation, $contenu, $sourceUtilisateur, $idListe, $mailMembre);
      $this->repondu = false;
    }

    public function accepter(){

    }

    public function refuser(){

    }


}

?>
