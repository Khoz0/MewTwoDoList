<?php

namespace App\Classe;


class NotificationChangement extends Notification {

  function __construct() {
      parent::__construct($dateCreation, $contenu, $source);
    }

    public ajouterBDD() {
      //AjouterBDD
    }

    public supprimerBDD() {
      //SupprimerBDD
    }
}


 ?>
