<?php
namespace App\Classe;

use App\Modeles\DB;

abstract class NotificationChangementProprietaire extends NotificationAvecChoix {

  function __construct($dateCreation, $contenu, $source) {
      parent::__construct($dateCreation, $contenu, $source);
    }


    public ajouterBDD() {
      //AjouterBDD
    }

    public supprimerBDD() {
      //SupprimerBDD
    }

    public changementProprietaire() {
      
    }
}

 ?>
