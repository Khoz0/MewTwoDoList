<?php


namespace App\Controllers;

use App\Modeles\DB;
use App\Classe\Utilisateur;



class CompteController extends Controller {

    private $modifier = false;

    public function compte() {
        return $this->render('compte');
    }

    public function verification(){
        $bdd = DB::getInstance()->getPDO();
        $requete = $bdd->prepare("SELECT * FROM Utilisateur WHERE mail = :mail");
        $loginSession = unserialize($_SESSION['user'])->getMail();
        $requete->bindParam('mail', $loginSession);
        $requete->execute();
        $donnees = $requete->fetch();
        if (isset($_POST['inputPassword']) && !empty($_POST["inputPassword"])){
            if (($_POST["inputPassword"]) == $donnees['mdp']){
                if (isset($_POST['inputPasswordConf']) && !empty($_POST["inputPasswordConf"]) && $_POST["inputPasswordConf"] != $_POST['inputPassword']){
                    if (isset($_POST['inputNewPassword']) && !empty($_POST["inputNewPassword"]) && $_POST['inputPasswordConf'] == $_POST['inputNewPassword']){
                        $requete = $bdd->prepare("UPDATE Utilisateur SET mdp = (:mdpChanger) WHERE mail = :mail");
                        $loginSession = unserialize($_SESSION['user'])->getMail();
                        $mdpChanger = $_POST['inputNewPassword'];
                        $requete->bindParam('mail', $loginSession);
                        $requete->bindParam('mdpChanger', $mdpChanger);
                        $requete->execute();

                        $this->modifier = true;
                    }else{
                        echo "<em> Mot de passe de confirmation manquant ou différents du nouveau mot de passe. </em>";
                        echo "<br>";
                        $this->modifier = false;
                    }
                }else{
                    echo "<em> Mot de passe de confirmation erroné </em>";
                    echo "<br>";
                    $this->modifier = false;
                }
            }else{
                echo "<em> Mot de passe différent du mot de passe de l'utilisateur. </em>";
                echo "<br>";
                $this->modifier = false;
            }
        }
    }

    public function modification(){
        $bdd = DB::getInstance()->getPDO();
        $requete = $bdd->prepare("SELECT * FROM Utilisateur WHERE mail = :mail");
        $loginSession = unserialize($_SESSION['user'])->getMail();
        $requete->bindParam('mail', $loginSession);
        $requete->execute();
        $donnees = $requete->fetch();
        if ($donnees['nomUser'] != $_POST['inputNom'] && !empty($_POST['inputNom'])) {
            $this->modifierNom();
        }
        if ($donnees['prenomUser'] != $_POST['inputPrenom'] && !empty($_POST['inputPrenom'])) {
            $this->modifierPrenom();
        }
        if ($donnees['pseudoUser'] != $_POST['inputPseudo'] && !empty($_POST['inputPseudo'])) {
            $this->modifierPseudo();
        }
        $this->verification();
        if ($this->modifier) {
            header('Location: ./?page=compte');
        }
    }

    public function modifierPseudo(){
        $bdd = DB::getInstance()->getPDO();
        $requete = $bdd->prepare("SELECT * FROM Utilisateur WHERE mail = :mail");
        $loginSession = unserialize($_SESSION['user'])->getMail();
        $requete->bindParam('mail', $loginSession);
        $requete->execute();

        $requete = $bdd->prepare("UPDATE Utilisateur SET pseudoUser = :pseudoUser WHERE mail = :mail");
        $nouveauLogin = $_POST['inputPseudo'];
        $requete->bindParam('pseudoUser', $nouveauLogin);
        $requete->bindParam('mail', $loginSession);
        $requete->execute();
        $this->modifier = true;
    }

    public function modifierNom(){
        $bdd = DB::getInstance()->getPDO();
        $requete = $bdd->prepare("SELECT * FROM Utilisateur WHERE mail = :mail");
        $loginSession = unserialize($_SESSION['user'])->getMail();
        $requete->bindParam('mail', $loginSession);
        $requete->execute();

        $requete = $bdd->prepare("UPDATE Utilisateur SET nomUser = :nomUser WHERE mail = :mail");
        $nom = $_POST['inputNom'];
        $requete->bindParam('mail', $loginSession);
        $requete->bindParam('nomUser', $nom);
        $requete->execute();
        $this->modifier = true;
    }

    public function modifierPrenom(){
        $bdd = DB::getInstance()->getPDO();
        $requete = $bdd->prepare("SELECT * FROM Utilisateur WHERE mail = :mail");
        $loginSession = unserialize($_SESSION['user'])->getMail();
        $requete->bindParam('mail', $loginSession);
        $requete->execute();

        $requete = $bdd->prepare("UPDATE Utilisateur SET prenomUser = :prenomUser WHERE mail = :mail");
        $prenom = $_POST['inputPrenom'];
        $requete->bindParam('mail', $loginSession);
        $requete->bindParam('prenomUser', $prenom);
        $requete->execute();
        $this->modifier = true;
    }

    public function getPseudo(){
        $pseudo = unserialize($_SESSION['user'])->getPseudo();
        return $pseudo;
    }

    public function getNom(){
        $nom = unserialize($_SESSION['user'])->getNom();
        return $nom;
    }

    public function getPrenom(){
        $prenom = unserialize($_SESSION['user'])->getPrenom();
        return $prenom;
    }

    public function getMail(){
        $mail = unserialize($_SESSION['user'])->getMail();
        return $mail;
    }
}
