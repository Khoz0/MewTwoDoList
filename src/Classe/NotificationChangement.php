<?php

namespace App\Classe;


class NotificationChangement extends Notification {

  function __construct($idNotif,$dateCreation, $contenu, $sourceUtilisateur, $idListe, $mailMembre) {
      parent::__construct($idNotif,$dateCreation, $contenu, $sourceUtilisateur, $idListe, $mailMembre);
    }
}


 ?>
