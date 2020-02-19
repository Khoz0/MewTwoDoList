<?php


namespace App\Classe;


use App\Modeles\DB;

class Liste {

    private $idListe;
    private $intituleListe;
    private $dateCreation;
    private $dateFin;
    private $mailProprietaire;
    private $tabUtilisateur = array();
    private $tabTache = array();

    /**
     * Liste constructor.
     */
    public function __construct($idListe, $intituleListe, $dateCreation, $dateFin, $mailProprietaire) {
        $this->idListe = $idListe;
        $this->intituleListe = $intituleListe;
        $this->dateCreation = $dateCreation;
        $this->dateFin = $dateFin;
        $this->mailProprietaire = $mailProprietaire;
        array_push($this->tabUtilisateur, $mailProprietaire);

        $bdd = DB::getInstance();
        $bdd->addListe($idListe,$intituleListe,$dateCreation,$dateFin,$mailProprietaire);
    }

    public function ajouterUtilisateur($mailUtilisateur){
        array_push($this->tabUtilisateur, $mailUtilisateur);
    }

    public function retirerUtilisateur($mailUtilisateur){
        foreach ($this->tabUtilisateur as $element){
            if ($element == $mailUtilisateur){
                unset($this->tabUtilisateur[array_search($element, $this->tabUtilisateur)]);
            }
        }
    }

    public function changerProprietaire($mailUtilisateur){
        $this->mailProprietaire = $mailUtilisateur;
    }

    public function ajouterTache($tache){
        array_push($this->tabTache, $tache);
    }

    public function retirerTache($tache){
        foreach ($this->tabTache as $element){
            if ($element == $tache){
                unset($this->tabTache[array_search($element, $this->tabTache)]);
            }
        }
    }

    public function sauvegarderBDD(){

    }

    public function chargerBDD(){

    }

    public function supprimerBDD(){

    }

    /**
     * @return mixed
     */
    public function getIdListe()
    {
        return $this->idListe;
    }

    /**
     * @return mixed
     */
    public function getIntituleListe()
    {
        return $this->intituleListe;
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * @return mixed
     */
    public function getMailProprietaire()
    {
        return $this->mailProprietaire;
    }



}