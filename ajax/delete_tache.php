<?php

namespace App\Modeles;

require_once('../src/Modeles/DB.php');
require_once('../src/Classe/Tache.php');


if (isset($_POST['id'])) {
  DB::getInstance()->deleteTache($_POST['id']);
}
 ?>
