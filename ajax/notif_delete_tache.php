<?php

namespace App\Modeles;

require_once('../src/Modeles/DB.php');
require_once('../src/Classe/Tache.php');
require_once('../src/Classe/Liste.php');
require_once('../src/Classe/Notification.php');
require_once('../src/Classe/NotificationAvecChoix.php');
require_once('../src/Classe/NotificationSupprTache.php');
require_once('../src/Classe/NotificationChangementProprietaire.php');






if (isset($_POST['id'])) {
    if (isset($_POST['idListe'])) {
        $liste = DB::getInstance()->loadListe($_POST['idListe']);

        $tache = DB::getInstance()->loadTache($_POST['id']);


        $bddRequete = DB::getInstance()->getPDO();
        $requete = $bddRequete->prepare("SELECT * FROM Notification");
        $requete->execute();
        $idNotif = 0;

        while ($donnees = $requete->fetch()) {
            $idNotif = $donnees['idNotification'];
        }

        $idNotif += 1;

        if (isset($_POST['mail'])) {
            $mailMembre = $_POST['mail'];

            $mailProprio =  $liste->getMailProprietaire();
            $idListe = $liste->getIdListe();
            $idTache = $tache->getIdTache();


            $contenu = "Demande de suppression de la tâche ".$tache->getIntituleTache()." de la part de ".$mailProprio.", pour la liste ".$liste->getIntituleListe();
            $date = date("Y-m-d");


            DB::getInstance()->createNotif($idNotif, $date, 0, $contenu, 0, $mailMembre, $idListe, $mailProprio);
            DB::getInstance()->createNotifAvecChoix($idNotif, 0);
            DB::getInstance()->createNotifSupprTache($idNotif, $idTache);

        }
    }
}
