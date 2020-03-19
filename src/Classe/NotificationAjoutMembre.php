<?php
namespace App\Classe;

use App\Modeles\DB;

class NotificationAjoutMembre extends NotificationAvecChoix {

  function __construct($idNotif,$dateCreation, $contenu, $sourceUtilisateur, $idListe, $mailMembre) {
      parent::__construct($idNotif,$dateCreation, $contenu, $sourceUtilisateur, $idListe, $mailMembre);
    }

    public function ajoutMembre() {
  }
}
?>
