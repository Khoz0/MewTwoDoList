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

  public function __construct($idNotif,$dateCreation, $contenu, $sourceUtilisateur, $idListe) {
      $this->idNotif = $idNotif;
      $this->dateCreation = $dateCreation;
      $this->contenu = $contenu;
      $this->lu = false;
      $this->source = $sourceUtilisateur;
      $this->idListe = $idListe;
  }

  public function ajouterBDD() {
    $bdd = DB::getInstance();
    $mail = $this->sourceUtilisateur->getMail();
    $bdd->addNotification($this->idNotif, $this->dateCreation, $this->contenu, $this->sourceUtilisateur, $this->idListe);

  }

  public function supprimerBDD() {
    $bdd = DB::getInstance();
    $bdd->deleteNotification($this->idNotif);
  }

}
?>
