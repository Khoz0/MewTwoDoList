<?php

namespace App\Modeles;

use App\Classe\NotificationChangement;
use App\Classe\NotificationChangementProprietaire;

require_once('../src/Modeles/DB.php');
require_once('../src/Classe/Tache.php');


if (isset($_POST['id'])) {
  $tache = DB::getInstance()->loadTache($_POST['id']);
  $tache->setValide($_POST['valide']);
  $tache->setEtat();
  $tache->modifBDD();

  // Vérification de toutes les tâches de la liste et envoi de notification si elles sont toutes validées
    $liste = DB::getInstance()->loadListe($tache->getIdListeTache());
    if($liste->checkEtatTaches()){
        $user = unserialize($_SESSION["user"]);

        $contenu = "Toutes les tâches de la liste ".$liste->getIntituleListe()." sont finies !";
        $membres = $liste->recupererMembres();

        $idNotif = 0;
        $requeteBDD = DB::getInstance()->getPDO()->prepare("SELECT * FROM Notification");
        $requeteBDD->execute();
        while ($donnees = $requeteBDD->fetch()){
            $idNotif = $donnees['idNotification'];
        }
        foreach ($membres as $membre){
            $idNotif++;
            $notif = new NotificationChangement($idNotif, date("Y-m-d"), $contenu, $user->getMail(), $liste->getIdListe(), $membre);
            $notif->ajouterBDD();
            //DB::getInstance()->createNotif($idNotif, date("Y-m-d"), null, $contenu, 0, $user->getMail(), $liste->getIdListe(), $membre);
        }
    }
}
 ?>
