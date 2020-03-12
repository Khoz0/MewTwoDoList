<?php
namespace App\Classe;

use App\Modeles\DB;

abstract class Notification {

  protected $dateCreation;
  protected $contenu;
  protected $lu;
  protected $source;

  public function __construct($dateCreation, $contenu, $source) {
      $this->$dateCreation = $dateCreation;
      $this->$contenu = $contenu;
      $this->$lu = false;
      $this->$source = $source;
  }

  public ajouterBDD() {
    //AjouterBDD
  }

  public supprimerBDD() {
    //SupprimerBDD
  }

}
?>
