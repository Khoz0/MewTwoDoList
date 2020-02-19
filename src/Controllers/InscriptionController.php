<?php

namespace App\Controllers;


use App\Classe\Utilisateur;
use App\Modeles\DB;

class InscriptionController extends Controller
{
    public function inscription()
    {
        return $this->render('inscription');
    }

    public function ajouterUtilisateur(){
        DB::class;
        unset($_SESSION);
        $mail = $_POST['mail'] ?? null;
        $nomUser = $_POST['nomUser'] ?? null;
        $prenomUser  = $_POST['prenomUser'] ?? null;
        $pseudoUser  = $_POST['pseudoUser'] ?? null;
        $mdp  = $_POST['mdp'] ?? null;
        $mdpConf = $_POST['mdpConf'] ?? null;
        $photo = $_POST['photo'] ?? null;

        // On vérifie que les champs sont correctements entrés
        if (!preg_match('/^[a-zA-Z0-9]{1,50}$/', $pseudoUser)) {
            $_SESSION['error_syntx']['pseudo'] = 1;
        }

        // On teste le mot de passe
        if (!preg_match('/^[a-zA-Z0-9]{3,16}$/', $mdp)) {
            $_SESSION['error_syntx']['mdp'] = 1;
        }

        if($nomUser) {
            if(!preg_match('/^[a-zA-Zàéèëîïûü\-]{1,50}$/', $nomUser)) {
                $_SESSION['error_syntx']['nom'] = 1;
            }
        }

        if($prenomUser) {
            if(!preg_match('/^[a-zA-Zàéèëîïûü\-]{1,50}$/', $prenomUser)) {
                $_SESSION['error_syntx']['prenom'] = 1;
            }
        }

        if($mail) {
            if(!preg_match('/^[a-zA-Z0-9\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-]+$/', $mail) || strlen($mail) > 100) {
                $_SESSION['error_syntx']['mail'] = 1;
            }
        }

        if($mdp && $mdpConf) {
            if($mdp != $mdpConf) {
                $_SESSION['error_exist']['mdpConf'] = 1;
            }
        }

        $bdd = DB::getInstance()->getPDO();

        //On vérifie que le mail n'est pas utilisé par un autre utilisateur
        $results = $bdd->prepare('SELECT * FROM Utilisateur where mail = :mailVerification');
        $mailVerification = $mail;
        $results->bindParam(':mailVerification', $mailVerification);
        $results->execute();

        if($donnees = $results->fetch()){
            $_SESSION['error_exist']['mail'] = 1;
        }

        //On vérifie que le pseudo n'est pas utilisé par un autre utilisateur
        $results = $bdd->prepare('SELECT * FROM Utilisateur where pseudoUser = :pseudo');
        $pseudo = $pseudoUser;
        $results->bindParam(':pseudo', $pseudo);
        $results->execute();

        if($donnees = $results->fetch()){
            $_SESSION['error_exist']['pseudo'] = 1;
        }

        //Si jamais on a rencontré des erreurs on le signale
        if(isset($_SESSION['error_exist']) || isset($_SESSION['error_syntx'])){
            return 0;
        }else{
            $utilisateur = new Utilisateur($nomUser, $prenomUser, $pseudo, $mail, $mdp, $photo);
            $bdd = DB::getInstance();
            $bdd->addUtilisateur($utilisateur);
            return 1;
        }

    }

}