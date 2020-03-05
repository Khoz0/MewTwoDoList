<?php

use App\Modeles\DB;

    $id = $_GET['id'];
    $mail= $_GET['user'];
    $bdd = DB::getInstance();
    $bdd->addMembre($mail, $id);
?>
