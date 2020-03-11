<?php


namespace App\Controllers;


use App\Modeles\DB;

class SessionCreateController extends Controller
{


    public function sessionCreate()
    {
        if ($this->checkPassword($_POST["mail"], $_POST["mdp"]) == 1) {
            $this->redirect('accueil');
        } else {
            $this->redirect('login');
        }

    }


    public function checkPassword($mail, $password)
    {
        $mailVerification = $mail;
        $bdd = DB::getInstance()->getPDO();

        /*Préparation des requêtes*/
        $utilisateur = $bdd->prepare("SELECT mdp FROM Utilisateur where mail = :mailVerification");

        /*On test si le mail existe dans la base de données*/
        $utilisateur->bindParam(':mailVerification', $mailVerification);
        $utilisateur->execute();

        if ($donnees = $utilisateur->fetch()) {


            if (password_verify($password, $donnees['mdp'])) {
                /*Le mot de passe correspond*/
                session_destroy();
                session_start();


                $_SESSION['user'] = serialize(DB::getInstance()->loadUtilisateur($mailVerification));
                return 1;
            } else {
                /*Le mot de passe ne correspond pas au mail*/
                $error = "Le couple d'identifiant est incorrect !";
                session_start();
                $_SESSION['error'] = serialize($error);
                return 2;
            }

        } else {
            /*Le mail n'est pas dans la base de données*/

            $error = "Le mail n'existe pas !";
            session_start();
            $_SESSION['error'] = serialize($error);
            return 0;
        }
    }
}
