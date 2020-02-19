<?php


namespace App\Classe;


class Tache
{

    private $idTache;
    private $intituleTache;
    private $etat;
    private $idListeTache;
    private $mailUtilisateur;
    private $valide;

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

    public function ajouterUtilisateur($utilisateur)
    {
        $this->mailUtilisateur = $utilisateur;
    }

    public function retirerUtilisateur()
    {
        $this->mailUtilisateur = null;
    }

    public function changeEtat($etat)
    {
        $this->etat = $etat;
    }

    public function sauvegarderBDD()
    {

    }

    public function retirerBDD()
    {

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




}