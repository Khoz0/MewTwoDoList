<?php

namespace App\Modeles;

require('../src/Modeles/DB.php');


if (isset($_POST[''])) {
    echo $_POST['id'];
    $tache = DB::getInstance()->loadTache($_POST['id']);
    echo $_POST['id'];
}
?>
