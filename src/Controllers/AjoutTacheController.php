<?php


namespace App\Controllers;
use App\Classe\Tache;
use App\Modeles\DB;

class AjoutTacheController extends Controller
{

    public function ajoutTache()
    {
        return $this->render('ajoutTache');
    }

    public function ajouterTache($idListe){

        $liste = DB::getInstance()->loadListe($idListe);
        $id = 0;
        $bdd = DB::getInstance();
        $requete = $bdd->getPDO()->prepare("SELECT * FROM Tache");
        $requete->execute();
        while ($donnees = $requete->fetch()){
            $id = $donnees['idTache'];
        }
        $id += 1;

        $user = unserialize($_SESSION["user"]);
        $pseudo = $user->getPseudo();

        $contenu = $pseudo." a ajouté la tâche ".$_POST['texte']." !";
        $membres = $liste->recupererMembres();

        $idNotif = 0;
        $requeteBDD = DB::getInstance()->getPDO()->prepare("SELECT * FROM Notification");
        $requeteBDD->execute();
        while ($donnees = $requeteBDD->fetch()){
            $idNotif = $donnees['idNotification'];
        }
        foreach ($membres as $membre){
            if ($membre != $user->getMail()) {
                $idNotif++;
                $bdd->createNotif($idNotif, date("Y-m-d"), null, $contenu, 0, $user->getMail(), $idListe, $membre);
            }
        }

        $tache = new Tache($id, $_POST['texte'], "En attente", $idListe, null, 0);
        $liste->ajouterTache($tache);
        $tache->sauvegarderBDD();

    }
}
