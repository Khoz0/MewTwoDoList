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
                        $loginSession = unserialize($_SESSION['user'])->getMail();
                        $mdpChanger = $_POST['inputNewPassword'];

                        $bdd->updateUtilisateur($loginSession, null, null, $mdpChanger, null, null);

                        $this->modifier = true;
                        $user = unserialize($_SESSION['user']);
                        $user->setMotDePasse($mdpChanger);
                        $_SESSION['user'] = serialize($user);
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
        if ($donnees['photo'] != "assests/uploads/".$_FILES['inputPhoto']['name'].$loginSession && !empty($_FILES['inputPhoto']['name'])) {
            $this->modifierPhoto();
        }

        $this->verification();
        if ($this->modifier) {
            header('Location: ./?page=compte');
        }
    }

    public function modifierPseudo(){
        $bddRequete = DB::getInstance()->getPDO();
        $requete = $bddRequete->prepare("SELECT * FROM Utilisateur WHERE mail = :mail");
        $loginSession = unserialize($_SESSION['user'])->getMail();
        $requete->bindParam('mail', $loginSession);
        $requete->execute();

        $pseudo = $_POST['inputPseudo'];

        $bdd = DB::getInstance();
        $bdd->updateUtilisateur($loginSession, null, null, null, $pseudo, null);
        $this->modifier = true;

        $user = unserialize($_SESSION['user']);
        $user->setPseudo($pseudo);
        $_SESSION['user'] = serialize($user);
    }

    public function modifierNom(){
        $bdd = DB::getInstance()->getPDO();
        $requete = $bdd->prepare("SELECT * FROM Utilisateur WHERE mail = :mail");
        $loginSession = unserialize($_SESSION['user'])->getMail();
        $requete->bindParam('mail', $loginSession);
        $requete->execute();

        $nom = $_POST['inputNom'];

        $bdd = DB::getInstance();
        $bdd->updateUtilisateur($loginSession, $nom, null, null, null, null);
        $this->modifier = true;

        $user = unserialize($_SESSION['user']);
        $user->setPseudo($nom);
        $_SESSION['user'] = serialize($user);
    }

    /**
     *
     */
    public function modifierPhoto()
    {
        $bdd = DB::getInstance()->getPDO();
        $requete = $bdd->prepare("SELECT * FROM Utilisateur WHERE mail = :mail");
        $loginSession = unserialize($_SESSION['user'])->getMail();

        //On supprime l'ancienne photo de profil
        $oldPhoto = unserialize($_SESSION['user'])->getPhoto();
        unlink($oldPhoto);

        $requete->bindParam('mail', $loginSession);
        $requete->execute();
        $file_photo = $_FILES["inputPhoto"];

        if(!is_dir("assests/uploads/")){
            mkdir("assests/uploads/", 0777, true);
        }
        if(!is_file("assests/uploads/".$file_photo['name'].$loginSession)){
            move_uploaded_file($file_photo['tmp_name'], 'assests/uploads/' . basename($file_photo['name']).$loginSession);
        }
        $photo = "assests/uploads/".$file_photo['name'].$loginSession;


        $requete = $bdd->prepare("UPDATE Utilisateur SET photo = :photo WHERE mail = :mail");
        $requete->bindParam('mail', $loginSession);
        $requete->bindParam('photo', $photo);
        $requete->execute();

        $this->modifier = true;
        $user = unserialize($_SESSION['user']);
        $user->setPhoto($photo);
        $_SESSION['user'] = serialize($user);
    }

    public function modifierPrenom(){
        $bdd = DB::getInstance()->getPDO();
        $requete = $bdd->prepare("SELECT * FROM Utilisateur WHERE mail = :mail");
        $loginSession = unserialize($_SESSION['user'])->getMail();
        $requete->bindParam('mail', $loginSession);
        $requete->execute();

        $prenom = $_POST['inputPrenom'];

        $bdd->updateUtilisateur($loginSession, null, $prenom, null, null, null);
        $this->modifier = true;

        $user = unserialize($_SESSION['user']);
        $user->setPseudo($prenom);
        $_SESSION['user'] = serialize($user);
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
