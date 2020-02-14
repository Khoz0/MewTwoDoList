<?php


namespace App\Controllers;

use App\Modeles\DB;


class CompteController extends Controller {

    public function compte() {

        return $this->render('compte');
    }

    public function recuperation_donnees(){
      if (isset($_SESSION["mail"])){
        $mail = $_SESSION["mail"];
        $db = DB::getInstance();
        $user = $db->prepare("SELECT * FROM Utilisateur WHERE mail = :mailVerification");
        $user->bindParam(':mailVerification', $mail);
        $user->execute();

        if($donnees = $user->fetch()){
          return $donnees;
        }


      }
    }

    public function verification(){
        $bdd = DB::getInstance();
        $requete = $bdd->prepare("SELECT * FROM Utilisateur WHERE login = :loginSession");
        $loginSession = $_SESSION['login'];
        $requete->bindParam('loginSession', $loginSession);
        $requete->execute();
        $donnees = $requete->fetch();
        if (isset($_POST['inputPassword']) && !empty($_POST["inputPassword"])){
            if (SHA1($_POST["inputPassword"]) == $donnees['mdp']){
                if (isset($_POST['inputPasswordConf']) && !empty($_POST["inputPasswordConf"]) && $_POST["inputPasswordConf"] != $_POST['inputPassword']){
                    if (isset($_POST['inputNewPassword']) && !empty($_POST["inputNewPassword"]) && $_POST['inputPasswordConf'] == $_POST['inputNewPassword']){
                        $requete = $bdd->prepare("UPDATE Utilisateur SET mdp = SHA1(:mdpChanger) WHERE login = :loginSession");
                        $loginSession = $_SESSION['login'];
                        $mdpChanger = $_POST['inputNewPassword'];
                        $requete->bindParam('loginSession', $loginSession);
                        $requete->bindParam('mdpChanger', $mdpChanger);
                        $requete->execute();
                        return "Nouveau mdp créé.";
                    }else{
                        return "Mot de passe de confirmation manquant ou différents du nouveau mot de passe.";
                    }
                }else{
                    return "Nouveau mot de passe manquant ou identique à l'ancien.";
                }
            }else{
                return "Mot de passe différent du mot de passe de l'utilisateur.";
            }
        }
    }

    public function modification(){
        $bdd = DB::getInstance();
        $requete = $bdd->prepare("SELECT * FROM Utilisateur WHERE login = :loginSession");
        $loginSession = $_SESSION['login'];
        $requete->bindParam('loginSession', $loginSession);
        $requete->execute();
        $donnees = $requete->fetch();
        if ($donnees['login'] != $_POST['inputEmail'] && !empty($_POST['inputEmail'])){
            $this->modifierEmail();
        }
        if ($donnees['nom'] != $_POST['inputNom'] && !empty($_POST['inputNom'])) {
            $this->modifierNom();
        }
        if ($donnees['prenom'] != $_POST['inputPrenom'] && !empty($_POST['inputPrenom'])) {
            $this->modifierPrenom();
        }
        if ($donnees['pseudo'] != $_POST['inputPseudo'] && !empty($_POST['inputPseudo'])) {
            $this->modifierPseudo();
        }
        $this->verification();
    }

    public function modifierPseudo(){
        $bdd = DB::getInstance();
        $requete = $bdd->prepare("SELECT * FROM Utilisateur WHERE login = :loginSession");
        $loginSession = $_SESSION['login'];
        $requete->bindParam('loginSession', $loginSession);
        $requete->execute();

        $requete = $bdd->prepare("UPDATE Utilisateur SET login = :login WHERE login = :login");
        $nouveauLogin = $_POST['email'];
        $requete->bindParam('login', $nouveauLogin);
        $requete->execute();
    }

    public function modifierNom(){
        $bdd = DB::getInstance();
        $requete = $bdd->prepare("SELECT * FROM Utilisateur WHERE login = :loginSession");
        $loginSession = $_SESSION['login'];
        $requete->bindParam('loginSession', $loginSession);
        $requete->execute();

        $requete = $bdd->prepare("UPDATE Utilisateur SET nom = :nom WHERE login = :login");
        $loginSession = $_SESSION['login'];
        $nom = $_POST['inputNom'];
        $requete->bindParam('login', $loginSession);
        $requete->bindParam('nom', $nom);
        $requete->execute();
    }

    public function modifierPrenom(){
        $bdd = DB::getInstance();
        $requete = $bdd->prepare("SELECT * FROM Utilisateur WHERE login = :loginSession");
        $loginSession = $_SESSION['login'];
        $requete->bindParam('loginSession', $loginSession);
        $requete->execute();

        $requete = $bdd->prepare("UPDATE Utilisateur SET prenom = :prenom WHERE login = :login");
        $loginSession = $_SESSION['login'];
        $prenom = $_POST['inputPrenom'];
        $requete->bindParam('login', $loginSession);
        $requete->bindParam('prenom', $prenom);
        $requete->execute();
    }

    public function modifierEmail(){
        $bdd = DB::getInstance();
        $requete = $bdd->prepare("SELECT * FROM Utilisateur WHERE login = :loginSession");
        $loginSession = $_SESSION['login'];
        $requete->bindParam('loginSession', $loginSession);
        $requete->execute();

        $requete = $bdd->prepare("UPDATE Utilisateur SET login = :login WHERE login = :login");
        $nouveauLogin = $_POST['inputEmail'];
        $requete->bindParam('login', $nouveauLogin);
        $requete->execute();
    }
}
