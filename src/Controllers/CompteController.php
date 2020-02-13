<?php


namespace App\Controllers;


class CompteController extends Controller {

    public function compte() {

        return $this->render('compte');
    }

    public function verification(){
        /*if (isset($_POST['inputPassword']) && !empty($_POST["inputPassword"])){
            if (SHA1($_POST["inputPassword"]) == $donnees['mdp']){
                if (isset($_POST['nouveauMdp']) && !empty($_POST["nouveauMdp"]) && $_POST["nouveauMdp"] != $_POST['ancienMdp']){
                    if (isset($_POST['confirmationMdp']) && !empty($_POST["confirmationMdp"]) && $_POST['nouveauMdp'] == $_POST['confirmationMdp']){
                        $requete = $bdd->prepare("UPDATE Utilisateur SET mdp = SHA1(:mdpChanger) WHERE login = :loginSession");
                        $loginSession = $_SESSION['login'];
                        $mdpChanger = $_POST['confirmationMdp'];
                        $requete->bindParam('loginSession', $loginSession);
                        $requete->bindParam('mdpChanger', $mdpChanger);
                        $requete->execute();
                        return "Nouveau mdp créé.";
                    }else{
                        return "Mot de passe de confirmation manquant ou différents du nouveau mot de passe."
                    }
                }else{
                    return "Nouveau mot de passe manquant ou identique à l'ancien."
                }
            }else{
                return "Mot de passe différent du mot de passe de l'utilisateur."
            }
        }*/
    }

    public function getPseudo(){
        return $_POST["inputPseudo"];
    }

    public function getNom(){
        return $_POST["inputNom"];
    }

    public function getPrenom(){
        return $_POST["inputPrenom"];
    }

    public function getMail(){
        return $_POST["inputEmail"];
    }

    public function getMdp(){
        return $_POST["inputNewPassword"];
    }
}