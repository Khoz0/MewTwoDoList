<?php

namespace App\Modeles;

require_once('../src/Modeles/DB.php');
require_once('../src/Classe/Tache.php');
require_once('../src/Classe/Liste.php');


if (isset($_POST['id'])) {
  if (isset($_POST['idListe'])) {
    $liste = DB::getInstance()->loadListe($_POST['idListe']);
    $tache = DB::getInstance()->loadTache($_POST['id']);
    $liste->retirerTache($tache);
    DB::getInstance()->deleteTache($_POST['id']);
  }
}
 ?>
