<?php


namespace App\Classe;

use App\Modeles\DB;
use function PHPSTORM_META\elementType;

class Tache
{

    private $idTache;
    private $intituleTache;
    private $etat;
    private $idListeTache;
    private $mailUtilisateur;
    private $valide;
    private $utilisateurAssigne;

    /**
     * Liste constructor.
     */
    public function __construct($idTache, $intituleTache, $etat, $idListeTache, $mailUtilisateur,$valide) {
        $this->idTache = $idTache;
        $this->intituleTache = $intituleTache;
        $this->etat = $etat;
        $this->idListeTache = $idListeTache;
        $this->mailUtilisateur = $mailUtilisateur;
        $this->valide = $valide;
    }

    /**
     * @return mixed
     */
    public function getUtilisateurAssigne()
    {
        return $this->mailUtilisateur;
    }

    /**
     * @param mixed $utilisateurAssigne
     */
    public function setUtilisateurAssigne($utilisateurAssigne)
    {
        $this->mailUtilisateur = $utilisateurAssigne;
    }


    public function changeEtat($etat)
    {
        $this->etat = $etat;
    }

    public function sauvegarderBDD()
    {
      $bdd = DB::getInstance();
      $bdd->addTache($this->idTache,$this->intituleTache,$this->etat,$this->idListeTache,$this->mailUtilisateur, $this->valide);
    }

    public function modifBDD()
    {
      $bdd = DB::getInstance();
      $bdd->modifTache($this->idTache,$this->intituleTache,$this->etat,$this->idListeTache,$this->mailUtilisateur, $this->valide);
    }

    public function retirerBDD()
    {
      $bdd = DB::getInstance();
      $bdd->deleteTache($this->idTache);
    }

    /**
     * @return mixed
     */
    public function getIdTache()
    {
        return $this->idTache;
    }

    /**
     * @return mixed
     */
    public function getIntituleTache()
    {
        return $this->intituleTache;
    }


    public function setIntituleTache($intitule)
    {
        $this->intituleTache = $intitule;
    }

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @return mixed
     */
    public function getIdListeTache()
    {
        return $this->idListeTache;
    }

    /**
     * @return mixed
     */
    public function getMailUtilisateur()
    {
        return $this->mailUtilisateur;
    }

    /**
     * @return mixed
     */
    public function getValide()
    {
        return $this->valide;
    }

    /**
     * @return mixed
     */
    public function setValide($valide)
    {
        $this->valide = $valide;
    }

    public function setEtat(){
        if($this->valide){
            $this->etat = "Finie";
        }
        else{
            if($this->mailUtilisateur != null){
                $this->etat = "En cours";
            }
            else{
                $this->etat = "En attente";
            }
        }
    }






}
