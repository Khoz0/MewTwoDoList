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
    }

    public function ajouterUtilisateur($mailUtilisateur){
        array_push($this->tabUtilisateur, $mailUtilisateur);
    }

    public function retirerUtilisateur($mailUtilisateur){
        if(in_array($mailUtilisateur, $this->tabUtilisateur)){
            unset($this->tabUtilisateur[array_search($mailUtilisateur, $this->tabUtilisateur)]);
        }
    }

    public function recupererMembres(){
        return $this->tabUtilisateur;
    }


    public function contientUtilisateur($mail)
    {
        return in_array($mail, $this->tabUtilisateur);
    }


	public function supprimerMembre($mail){
        unset($this->tabUtilisateur[array_search($mail,$this->tabUtilisateur)]);
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

    public function getTabTache(){
        return $this->tabTache;
    }

    public function sauvegarderBDD($inBDD){
        $bdd = DB::getInstance();
        if (!$inBDD) {
            $bdd->addListe($this->idListe, $this->intituleListe, $this->dateCreation, $this->dateFin, $this->mailProprietaire);
            $bdd->addMembre($this->mailProprietaire, $this->idListe);
            $this->ajouterUtilisateur($this->mailProprietaire);
        }else {
            $bdd->alterListe($this->idListe, $this->intituleListe, $this->dateCreation, $this->dateFin, $this->mailProprietaire);
        }
    }

    public function chargerBDD(){

    }

    public function supprimerBDD(){
        $bdd = DB::getInstance();
        $bdd->addListe($this->idListe,$this->intituleListe,$this->dateCreation,$this->dateFin,$this->mailProprietaire);
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

    /**
     * @param mixed $idListe
     */
    public function setIdListe($idListe)
    {
        $this->idListe = $idListe;
    }

    /**
     * @param mixed $intituleListe
     */
    public function setIntituleListe($intituleListe)
    {
        $this->intituleListe = $intituleListe;
    }

    /**
     * @param mixed $dateCreation
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    }

    /**
     * @param mixed $dateFin
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    }

    /**
     * @param mixed $mailProprietaire
     */
    public function setMailProprietaire($mailProprietaire)
    {
        $this->mailProprietaire = $mailProprietaire;
    }

    /**
     * @param array $tabUtilisateur
     */
    public function setTabUtilisateur(array $tabUtilisateur)
    {
        $this->tabUtilisateur = $tabUtilisateur;
    }

    /**
     * @param array $tabTache
     */
    public function setTabTache(array $tabTache)
    {
        $this->tabTache = $tabTache;
    }

    /**
     * @return array
     */
    public function getTabUtilisateur()
    {
        return $this->tabUtilisateur;
    }


}
