<?php
namespace App\Classe;

use App\Modeles\DB;
use App\Classe\Utilisateur;

abstract class Notification {

  protected $idNotif;
  protected $dateCreation;
  protected $contenu;
  protected $lu;
  protected $sourceUtilisateur;
  protected $idListe;

  public function __construct($idNotif,$dateCreation, $contenu, $sourceUtilisateur, $idListe) {
      $this->idNotif = $idNotif;
      $this->dateCreation = $dateCreation;
      $this->contenu = $contenu;
      $this->lu = false;
      $this->sourceUtilisateur = $sourceUtilisateur;
      $this->idListe = $idListe;
  }

  public function ajouterBDD() {
    $bbd = DB::getInstance();
    $mail = $this->sourceUtilisateur->getMail();
    $bdd->addNotification($this->idNotif, $this->dateCreation, $this->contenu, $this->sourceUtilisateur, $this->idListe);

  }

    /**
     * @return mixed
     */
    public function getIdNotif()
    {
        return $this->idNotif;
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
    public function isLu(): bool
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
    $bbd = DB::getInstance();
    $bdd->deleteNotification($idNotif);
  }

}
?>
