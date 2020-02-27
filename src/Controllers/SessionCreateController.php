<?php


namespace App\Controllers;


use App\Modeles\DB;

class SessionCreateController extends Controller
{


    public function sessionCreate()
    {
        if ($this->checkPassword($_POST["mail"], $_POST["mdp"]) == 1) {
            return $this->render('accueil');
        } else {
            header('Location: ./?page=login');
            exit();
        }

    }


    public function checkPassword($mail, $password)
    {
        $mailVerification = $mail;
        $bdd = DB::getInstance()->getPDO();

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


                $this->console_log(self::$error);
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