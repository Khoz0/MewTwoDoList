<?php


namespace App\Controllers;

use App\Classe\Liste;
use App\Modeles\DB;


class CreationListeController extends Controller {

    private $modifier = false;

    public function creationListe(){
        return $this->render('creationListe');
    }

    public function ajoutListe(){
        $id = 0;
        $bdd = DB::getInstance()->getPDO();
        $requete = $bdd->prepare("SELECT * FROM Liste");
        $requete->execute();
        while ($donnees = $requete->fetch()){
            $id = $donnees['idListe'];
        }
        $id += 1;
        $mail = unserialize($_SESSION['user'])->getMail();
        if (($this->getDateCreation() < $this->getDateFin() && $this->getDateFin() > date("d/m/Y")) || ($this->getDateFin() == null)) {
            echo "ok";
            new Liste($id, $this->getNom(), $this->getDateCreation(), $this->getDateFin(), $mail);
            $this->modifier = true;
        }
    }

    public function getNom(){
        return $_POST['nomListe'];
    }

    public function getDateCreation(){
        return $_POST['dateDebut'];
    }

    public function getDateFin(){
        return $_POST['dateFin'];

    }

    public function getModifier(){
        return $this->modifier;
    }

}