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
        $user = unserialize($_SESSION['user']);
        $liste = $user->recupererListe($id);
        $_SESSION['user'] = serialize($user);

        if (($liste->getDateCreation() < $this->getDateFin() && $this->getDateFin() > date("Y-m-d")) || ($this->getDateFin() == null)) {
            if(isset($_POST['dateFin'])){
                $liste->setDateFin($this->getDateFin());
            }
            if(isset($_POST['nomListe'])){
                $liste->setIntituleListe($this->getNom());
            }
            $liste->sauvegarderBDD(true);
            $user->supprimerListe($id);
            $liste = DB::getInstance()->loadListe($id);
            $user->ajouterListe($liste);
            $_SESSION['user'] = serialize($user);
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