<?php

namespace App\Classe;


class NotificationChangement extends Notification {

  function __construct($dateCreation, $contenu, $source) {
      parent::__construct($dateCreation, $contenu, $source);
    }

    public function ajouterBDD() {
      //AjouterBDD
    }

    public function supprimerBDD() {
      //SupprimerBDD
    }
}


 ?>
