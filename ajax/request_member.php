<?php

namespace App\Modeles;

require('../src/Modeles/DB.php');
require_once('../src/Classe/Utilisateur.php');


if (isset($_POST['criteria'])) {
    $args = array();
    if (isset($_POST['arg0']))
        array_push($args, $_POST["arg0"]);
    else
        array_push($args, "");
    if (isset($_POST['arg1']))
        array_push($args, $_POST["arg1"]);
    else
        array_push($args, "");

    $res = DB::getInstance()->getUtilisateurs($_POST['criteria'], $args, $_POST['id']);

    $html = "";

    foreach ($res as $user) {
        $html .= $user->getMail() . "\/" . $user->getPhoto() . "\/" . $user->getPrenom() . "\/" . $user->getNom() . "\/" . $user->getPseudo() . "\/";
    }

    echo $html;
}

?>
