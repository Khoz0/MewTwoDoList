<?php

namespace App\Modeles;

use App\Classe\Utilisateur;
use App\Classe\Liste;
use Exception;
use PDO;

class DB {

    /**
     * @var Singleton
     * @access private
     * @static
     */
    private static $_instance = null;
    private $pdo;

    /**
     * Constructeur de la classe
     *
     * @param void
     * @return void
     */
    private function __construct()
    {
        try {

            if (file_exists('../src/Config/config.ini')) {
                $config = parse_ini_file('../src/Config/config.ini');
            } elseif (file_exists('src/Config/config.ini')) {
                $config = parse_ini_file('src/Config/config.ini');
            } else {
                throw new Exception('Pas de fichier de config');
            }
            $this->pdo = new PDO("mysql:host=$config[host];dbname=$config[db];charset=utf8", $config['user'], $config['pass'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance()
    {

        if (is_null(self::$_instance)) {
            self::$_instance = new DB();
        }

        return self::$_instance;
    }

    /**
     * Retourne l'instance de PDO
     * @return PDO Instance de PDO
     */
    public function getPDO()
    {
        return $this->pdo;
    }

    public function deleteUser($mail){
        $resUser = DB::getInstance()->getPDO()->prepare("DELETE FROM Utilisateur WHERE mail = :mail");
        $resUser->bindParam(":mail", $mail);
        $resUser->execute();
        $resList = DB::getInstance()->getPDO()->prepare("DELETE FROM Liste WHERE mailProprietaire = :mail");
        $resList->bindParam(":mail", $mail);
        $resList->execute();
    }


    public function loadUtilisateur($mail)
    {

        /*Préparation des requêtes*/
        $verifMail = DB::getInstance()->getPDO()->prepare("SELECT * FROM Utilisateur where mail = :mailVerification");

        /*On test si le mail existe dans la base de données*/
        $verifMail->bindParam(':mailVerification', $mail);
        $verifMail->execute();

        if ($donnees = $verifMail->fetch()) {
            $utilisateur = new Utilisateur($donnees["nomUser"], $donnees["prenomUser"], $donnees["pseudoUser"], $donnees["mail"], null, null);

            return $utilisateur;
        } else {
            return null;
        }
    }

    public function loadListe($id){
        /*Préparation des requêtes*/
        $verifId = DB::getInstance()->getPDO()->prepare("SELECT * FROM Liste where idListe = :idVerification");

        /*On test si le mail existe dans la base de données*/
        $verifId->bindParam(':idVerification', $id);
        $verifId->execute();

        if ($donnees = $verifId->fetch()) {
            $liste = new Liste($donnees["idListe"], $donnees["intituleListe"], $donnees["dateCreation"], $donnees["dateFin"], $donnees["mailProprietaire"]);

            return $liste;
        } else {
            return null;
        }
    }

    public function addUtilisateur($utilisateur){

        $mail = $utilisateur->getMail();
        $nom = $utilisateur->getNom();
        $prenom = $utilisateur->getPrenom();
        $mdp = $utilisateur->getMotDePasse();
        $pseudo = $utilisateur->getPseudo();
        $photo = $utilisateur->getUrlPhoto();

        $results = DB::getInstance()->getPDO()->prepare('INSERT INTO Utilisateur(mail, nomUser, prenomUser,pseudoUser,mdp,photo) VALUES (:mail,:nomUser, :prenomUser,:pseudoUser,:mdp,:photo)');
        $results->bindParam(':mail', $mail);
        $results->bindParam(':nomUser', $nom);
        $results->bindParam(':prenomUser', $prenom);
        $results->bindParam(':pseudoUser', $pseudo);
        $results->bindParam(':mdp', $mdp);
        $results->bindParam(':photo', $photo);
        $results->execute();

    }

    public function addListe($idListe,$intituleListe,$dateCreation, $dateFin,$mailProprietaire)
    {
        $results = DB::getInstance()->getPDO()->prepare('INSERT INTO Liste(idListe,intituleListe,dateCreation,dateFin,mailProprietaire) VALUES (:id, :intitule, :dateCrea, :dateFin, :mail)');
        $results->bindParam(':id', $idListe);
        $results->bindParam(':intitule', $intituleListe);
        $results->bindParam(':dateCrea', $dateCreation);
        $results->bindParam(':dateFin', $dateFin);
        $results->bindParam(':mail', $mailProprietaire);
        $results->execute();
    }

    public function deleteListe($idListe)
    {
        $results = DB::getInstance()->getPDO()->prepare('DELETE FROM Liste WHERE idListe = :id ');
        $results->bindParam(':id', $idListe);
        $results->execute();
    }

    public function addTache($idTache,$intituleTache,$etat, $idListeTache,$mailUtilisateur,$valide)
    {
        $results = DB::getInstance()->getPDO()->prepare('INSERT INTO Tache(idTache,intituleTache,valide,idListeT,mailUtilisateur,etat) VALUES (:id, :intitule, :val, :idListe, :mail, :etat)');
        $results->bindParam(':id', $idTache);
        $results->bindParam(':intitule', $intituleTache);
        $results->bindParam(':val', $valide);
        $results->bindParam(':idListe', $idListeTache);
        $results->bindParam(':mail', $mailUtilisateur);
        $results->bindParam(':etat', $etat);
        $results->execute();
    }

}
