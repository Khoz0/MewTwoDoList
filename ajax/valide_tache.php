<?php

namespace App\Modeles;

require_once('../src/Modeles/DB.php');
require_once('../src/Classe/Tache.php');


if (isset($_POST['id'])) {
  $tache = DB::getInstance()->loadTache($_POST['id']);
  $tache->setValide($_POST['valide']);
  $tache->setEtat();
  $tache->modifBDD();
}
 ?>
