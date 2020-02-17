<?php


namespace App\Controllers;


use App\Modeles\DB;

class SessionCreateController extends Controller
{

    public function sessionCreate()
    {
        if ($this->checkPassword($_POST["mail"], $_POST["mdp"]) == 1) {

            $prenom = unserialize($_SESSION['user'])->getPrenom();
            $helloWorld = "Bienvenue " . $prenom . " !";
            return $this->render('accueil', compact('helloWorld'));
        } else {
            header('Location: ./?page=login');
            exit();
        }

    }

    public function checkPassword($mail, $password)
    {
        $mailVerification = $mail;
        $bdd = DB::getInstance();

        /*Préparation des requêtes*/
        $verifMail = $bdd->prepare("SELECT mdp FROM Utilisateur where mail = :mailVerification");
        $verifMdp = $bdd->prepare("SELECT mail FROM Utilisateur where mail = :mailVerification AND mdp = (:mdpVerification)");

        /*On test si le mail existe dans la base de données*/
        $verifMail->bindParam(':mailVerification', $mailVerification);
        $verifMail->execute();

        if ($donnees = $verifMail->fetch()) {
            /*Le mail est dans la base de données*/

            /*On teste si le mot de passe associé  ce mail est celui qui est entré*/
            $verifMdp->bindParam(':mailVerification', $mailVerification);
            $verifMdp->bindParam(':mdpVerification', $password);
            $verifMdp->execute();

            if ($donnees2 = $verifMdp->fetch()) {
                /*Le mot de passe correspond*/
                session_destroy();
                session_start();


                $_SESSION['user'] = serialize(DB::loadUtilisateur($mailVerification));
                return 1;
            } else {
                /*Le mot de passe ne correspond pas au mail*/
                return 2;
            }
        } else {
            /*Le mail n'est pas dans la base de données*/
            return 0;
        }
    }
}