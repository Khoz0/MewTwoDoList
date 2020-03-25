<?php


namespace App\Controllers;

use App\Modeles\DB;

class DeleteTache extends Controller
{
    public function deleteTache()
    {
        $err = "";
        if (isset($_SESSION["user"]) && isset($_GET['idListe']) && isset($_GET['idNotif'])) {
            $bdd = DB::getInstance();
            $idNotif = $_GET['idNotif'];
            $idListe = $_GET['idListe'];
            $tache = DB::getInstance()->getNotifTache($idNotif);

            if (isset($tache)) {
                DB::getInstance()->deleteTache($tache->getIdTache());
                $this->redirect("liste&id=$idListe");
            } else {
                $this->redirect("notification");
            }

            //On passe la notification comme validée
            $not = DB::getInstance()->loadNotif($idNotif);
            $not->setValide(1);
            $not->setLu(1);
            $not->sauvegarderBDD();

            exit();
        }
    }
}
