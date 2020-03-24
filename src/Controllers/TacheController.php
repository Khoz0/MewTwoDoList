<?php


namespace App\Controllers;

use App\Classe\NotificationChangement;
use App\Classe\Tache;
use App\Modeles\DB;


class TacheController extends Controller {

    public function tache() {
    	$idTache = $_GET['idTache'];
    	$bdd = DB::getInstance()->loadListe($idTache);

        return $this->render('tache', compact('bdd', 'idTache'));
    }

    public function addUser(){
        $mail = $_GET['mail'];
        $bdd = DB::getInstance();
        $user = $bdd->loadUtilisateur($mail);
        $pseudo = $user->getPseudo();
        $idTache = $_GET['idTache'];
        $idListe = $_GET['idListe'];
        $bdd->addUserTache($mail,$idTache);
        $tache = $bdd->loadTache($idTache);
        $liste = $bdd->loadListe($idListe);
        $tache->setEtat();
        $tache->modifBDD();

        $contenu = $pseudo." s'est proposé pour la tache ".$tache->getIntituleTache()." !";
        $membres = $liste->recupererMembres();

        $idNotif = 0;
        $requeteBDD = DB::getInstance()->getPDO()->prepare("SELECT * FROM Notification");
        $requeteBDD->execute();
        while ($donnees = $requeteBDD->fetch()){
            $idNotif = $donnees['idNotification'];
        }
        foreach ($membres as $membre){
            $idNotif++;
            $bdd->createNotif($idNotif, date("Y-m-d"), null, $contenu, 0, $mail, $idListe, $membre);
        }

        $this->redirect("liste&id=$idListe");
    }

    public function deleteUser(){
        $mail = $_GET['mail'];
        $id = $_GET['idTache'];
        $idListe = $_GET['idListe'];
        DB::getInstance()->deleteUserTache($id);
        $tache = DB::getInstance()->loadTache($id);
        $tache->setEtat();
        $tache->modifBDD();

        $this->redirect("liste&id=$idListe");
    }


}
