<?php
namespace App\Classe;

use App\Modeles\DB;
use App\Classe\Utilisateur;

abstract class Notification {

  protected $dateCreation;
  protected $contenu;
  protected $lu;
  protected $sourceUtilisateur;

  public function __construct($dateCreation, $contenu, $sourceUtilisateur) {
      $this->$dateCreation = $dateCreation;
      $this->$contenu = $contenu;
      $this->$lu = false;
      $this->$source = $source;
  }

  public function ajouterBDD() {

  }

  public function supprimerBDD() {
    //SupprimerBDD
  }

}
?>
