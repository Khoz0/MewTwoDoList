<?php


namespace App\Controllers;
use App\Modeles\DB;
use App\Classe\Tache;

class AjoutTacheController extends Controller
{

    public function ajoutTache()
    {
        return $this->render('ajoutTache');
    }

    public function ajouterTache($idListe){

        $liste = DB::getInstance()->loadListe($idListe);
        $id = 0;
        $bdd = DB::getInstance()->getPDO();
        $requete = $bdd->prepare("SELECT * FROM Tache");
        $requete->execute();
        while ($donnees = $requete->fetch()){
            $id = $donnees['idTache'];
        }
        $id += 1;
        $mail = unserialize($_SESSION['user'])->getMail();
        $tache = new Tache($id, $_POST['texte'], "stand by", $idListe, $mail, 0);
        $liste->ajouterTache($tache);
        $tache->sauvegarderBDD();

    }
}
