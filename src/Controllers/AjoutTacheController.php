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
        $bdd = DB::getInstance()->getPDO();
        $requete = $bdd->prepare("SELECT * FROM Tache");
        $requete->execute();
        while ($donnees = $requete->fetch()){
            $id = $donnees['idTache'];
        }
        $id += 1;
        $tache = new Tache($id, $_POST['texte'], "stand by", $idListe, "", 0);
        $liste->ajouterTache($tache);
        $tache->sauvegarderBDD();

    }
}
