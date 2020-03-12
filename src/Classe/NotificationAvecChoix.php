<?php

namespace App\Classe;

use App\Modeles\DB;

abstract class NotificationAvecChoix extends Notification {
  protected $repondu;

  function __construct($dateCreation, $contenu, $source) {
      parent::__construct($dateCreation, $contenu, $source);
      $this->$repondu = false
    }

    public ajouterBDD() {
      //AjouterBDD
    }

    public supprimerBDD() {
      //SupprimerBDD
    }

    public accepter(){

    }

    public refuser(){
      
    }

}

?>
