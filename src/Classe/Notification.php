<?php
namespace App\Classe;

use App\Modeles\DB;
use App\Classe\Utilisateur;

abstract class Notification {

  protected $idNotif;
  protected $dateCreation;
  protected $contenu;
  protected $lu;
  protected $valide;
  protected $sourceUtilisateur;
  protected $destUtilisateur;
  protected $idListe;

  public function __construct($idNotif,$dateCreation, $contenu, $sourceUtilisateur, $idListe, $mailMembre) {
      $this->idNotif = $idNotif;
      $this->dateCreation = $dateCreation;
      $this->contenu = $contenu;
      $this->lu = 0;
      $this->valide = 0;
      $this->sourceUtilisateur = $sourceUtilisateur;
      $this->idListe = $idListe;
      $this->destUtilisateur = $mailMembre;
      $this->idListe = $idListe;
  }

  public function ajouterBDD() {
    $bdd = DB::getInstance();
    $bdd->addNotification($this);
  }


  abstract function typeNotif();
    /**
     * @return mixed
     */
    public function getIdNotif()
    {
        return $this->idNotif;
    }

    public function setValide($bool){
        $this->valide = $bool;
    }

    public function valide(){
        return $this->valide ;
    }

    /**
     * @param mixed $idNotif
     */
    public function setIdNotif($idNotif)
    {
        $this->idNotif = $idNotif;
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * @param mixed $dateCreation
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param mixed $contenu
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    /**
     * @return bool
     */
    public function isLu()
    {
        return $this->lu;
    }

    /**
     * @param bool $lu
     */
    public function setLu(bool $lu)
    {
        $this->lu = $lu;
    }

    /**
     * @return mixed
     */
    public function getSourceUtilisateur()
    {
        return $this->sourceUtilisateur;
    }

    /**
     * @param mixed $sourceUtilisateur
     */
    public function setSourceUtilisateur($sourceUtilisateur)
    {
        $this->sourceUtilisateur = $sourceUtilisateur;
    }

    /**
     * @return mixed
     */
    public function getIdListe()
    {
        return $this->idListe;
    }

    /**
     * @param mixed $idListe
     */
    public function setIdListe($idListe)
    {
        $this->idListe = $idListe;
    }

  public function supprimerBDD() {
    $bdd = DB::getInstance();
    $bdd->deleteNotification($this->idNotif);
  }

  public function sauvegarderBDD(){
        DB::getInstance()->alterNotif($this->idNotif, $this->lu,$this->valide);

  }

    /**
     * @return mixed
     */
    public function getIdNotification()
    {
        return $this->idNotif;
    }

    /**
     * @return mixed
     */
    public function getLu()
    {
        return $this->lu;
    }

    /**
     * @return mixed
     */
    public function getDestUtilisateur()
    {
        return $this->destUtilisateur;
    }

}
?>
