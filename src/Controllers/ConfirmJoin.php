<?php


namespace App\Controllers;


use App\Modeles\DB;


class ConfirmJoin extends Controller
{
    public function confirm(){

       $err = "";
        if (isset($_SESSION["user"]) && isset($_GET['idListe']) && isset($_GET['idNotif'])) {


            echo "Tous les champs sont remplis<br>";

            $bdd = DB::getInstance();

            $idListe= $_GET['idListe'];
            $user = unserialize($_SESSION["user"]);

            $liste = $bdd->loadListe($idListe);

            $ok = false;

            /*$notifs = $bdd->loadNotifs($user->getMail());

            foreach($notifs as $notif){

                if($notif->getIdNotif()==$_GET['idNotif'] && !$notif->valide()){

                    $ok = true;
                }
            }*/

            $notif = $bdd->loadNotif($_GET['idNotif']);
            if($notif != null){
                $ok = true;
            }


            foreach ($liste->getTabUtilisateur() as $usr){
                if($user->getMail()==$usr) {
                    if($notif != null){
                        $notif->setValide(1);
                        $notif->sauvegarderBDD();
                    }
                    $ok = false;
                }
            }


            if($ok) {

                $notif->setValide(1);
                $bdd->addMembre($user->getMail(), $idListe);
                $this->redirect("liste&id=$idListe");
                $liste->ajouterUtilisateur($user->getMail());
                $notif->sauvegarderBDD();
            } else {
                $this->redirect("notification");
            }
            exit();
        }
    }
}