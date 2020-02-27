<?php


namespace App\Controllers;


use App\Classe\Liste;
use App\Modeles\DB;

class ModificationListeController extends Controller
{

    private $modifier = false;

    public function modificationListe()
    {
        $modificationListe = (new ModificationListeController());
        return $this->render('modificationListe', compact('modificationListe'));
    }

    public function modifierListe($id){
        $bdd = DB::getInstance()->getPDO();


        if (($this->getDateCreation() < $this->getDateFin() && $this->getDateFin() > date("Y-m-d")) || ($this->getDateFin() == null)) {
            $mail = unserialize($_SESSION['user'])->getMail();
            $liste = new Liste($id, $this->getNom(), $this->getDateCreation(), $this->getDateFin(), $mail);
            $liste->chargerBDD();
            $this->modifier = true;
        }
    }

    public function getNom(){
        return $_POST['nomListe'];
    }

    public function getDateFin(){
        return $_POST['dateFin'];
    }

    public function getModifier(){
        return $this->modifier;
    }
}