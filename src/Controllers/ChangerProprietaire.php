<?php


namespace App\Controllers;


use App\Classe\NotificationChangementProprietaire;
use App\Modeles\DB;

class ChangerProprietaire extends Controller {

    public function changerProprietaire(){
        $bdd = DB::getInstance();
        $bddRequete = DB::getInstance()->getPDO();
        $requete = $bddRequete->prepare("SELECT * FROM Notification");
        $requete->execute();
        $idNotif = 0;
        while ($donnees = $requete->fetch()){
            $idNotif = $donnees['idNotification'];
        }
        $idNotif += 1;
        $mailProprio = $_GET['mailProprio'];
        $mailMembre = $_GET['mailMembre'];
        $idListe = $_GET['id'];
        $liste = $bdd->loadListe($idListe);
        $contenu = "Demande de changement de propriétaire de la part de ".$mailProprio.", pour la liste ".$liste->getIntituleListe();
        $notification = new NotificationChangementProprietaire($idNotif, date("Y-m-d"), $contenu, $mailProprio, $idListe, $mailMembre);
        $notification->ajouterBDD();
        header("Location: ?page=liste&id=".$idListe);
        //return $this->render('liste', compact('liste', 'id'));
    }

}