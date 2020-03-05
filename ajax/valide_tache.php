<?php

import_once("src/Modeles/DB.php")

use DB;

Db::getInstance;

if (isset($_POST['id'])) {
  echo $_POST['id'];
  $tache = DB::getInstance()->loadTache($_POST['id']);
  echo $_POST['id'];
}
 ?>
