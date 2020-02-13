<?php

namespace App\Controllers;


class InscriptionController extends Controller
{
    public function inscription()
    {
        return $this->render('inscription');
    }

    public function ajouterUtilisateur(){
        $mail = $_POST['mail'] ?? null;
        $nom_user = $_POST['nomUser'] ?? null;
        $prenomUser  = $_POST['prenomUser'] ?? null;
        $pseudoUser  = $_POST['pseudoUser'] ?? null;
        $mdp  = $_POST['mdp'] ?? null;
        $photo = $_POST['photo'] ?? null;

        if (is_null($mdp)) {
            return false;
        }

        if (is_null($mail)) {
            return false;
        }


        // Ensuite
        // On teste le pseudo
        if (!preg_match('/^[a-zA-Z0-9]{1,16}$/', $pseudoUser)) {
            return false;
        }

        // On teste le mot de passe
        if (!preg_match('/^[a-zA-Z0-9]{4,99}$/', $mdp)) {
            return false;
        }

        if($nom_user) {
            if(!preg_match('/^[a-zA-Z0-9\-]{1,30}$/', $nom_user)) {
                return false;
            }
        }

        if($prenomUser) {
            if(!preg_match('/^[a-zA-Z0-9\-]{1,30}$/', $prenomUser)) {
                return false;
            }
        }

        if($mail) {
            if(!preg_match('/^[a-zA-Z0-9\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-]+$/', $mail) || strlen($mail) > 100) {
                return false;
            }
        }

        $bdd = DB::getInstance();

        $req = $bdd->prepare('SELECT pseudo_user FROM utilisateur WHERE pseudo_user=? LIMIT 1');
        $req->execute([$pseudoUser]);
        $donnee = $req->fetch();
        if(!empty($donnee)) {
            return false;
        }
    }

}