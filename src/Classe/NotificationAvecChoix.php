<?php

namespace App\Classe;

use App\Modeles\DB;

abstract class NotificationAvecChoix extends Notification {
  protected $repondu;

  function __construct($dateCreation, $contenu, $source) {
      parent::__construct($dateCreation, $contenu, $source);
      $this->repondu = false
    }

    public function ajouterBDD() {
      //AjouterBDD
    }

    public function supprimerBDD() {
      //SupprimerBDD
    }

    public function accepter(){

    }

    public function refuser(){

    }

}

?>
