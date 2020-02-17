<?php

namespace App\Modeles;

use App\Classe\Utilisateur;
use Exception;
use PDO;

class DB {

    /**
     * @var Singleton
     * @access private
     * @static
     */
    private static $_instance = null;

    /**
     * Constructeur de la classe
     *
     * @param void
     * @return void
     */
    private function __construct() {
    }

    /**
     * Creer une instance de PDO
     * @return PDO Instance de PDO
     */
    public static function getInstance() {

        if(is_null(self::$_instance)) {

            try {

                if(file_exists('../src/Config/config.ini')) {
                    $config = parse_ini_file('../src/Config/config.ini');
                } elseif(file_exists('src/Config/config.ini')) {
                    $config = parse_ini_file('src/Config/config.ini');
                } else {
                    throw new Exception('Pas de fichier de config');
                }


                self::$_instance = new PDO("mysql:host=$config[host];dbname=$config[db];charset=utf8", $config['user'], $config['pass'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }

        return self::$_instance;
    }

    /**
     * Creer une instance de PDO
     * @return PDO Instance de PDO
     */
    public static function getFirstInstance() {

        if(is_null(self::$_instance)) {

            try {

                if(file_exists('../src/Config/config.ini')) {
                    $config = parse_ini_file('../src/Config/config.ini');
                } elseif(file_exists('src/Config/config.ini')) {
                    $config = parse_ini_file('src/Config/config.ini');
                } else {
                    throw new Exception('Pas de fichier de config');
                }


                self::$_instance = new PDO("mysql:host=$config[host];charset=utf8", $config['user'], $config['pass'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }

        return self::$_instance;
    }

    public static function loadUtilisateur($mail)
    {

        /*Préparation des requêtes*/
        $verifMail = self::getInstance()->prepare("SELECT * FROM Utilisateur where mail = :mailVerification");

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

    public function addUtilisateur($bdd, $utilisateur){

        $results = $bdd->prepare('INSERT INTO Utilisateur(mail, nomUser, prenomUser,pseudoUser,mdp,photo) VALUES (?a,?b,?g,?d,?e,?f)');
        $results->bindParam('?a', $utilisateur::getMail());
        $results->bindParam('?b', $utilisateur::getNomUtilisateur());
        $results->bindParam('?g', $utilisateur::getPrenom());
        $results->bindParam('?d', $utilisateur::getPseudo());
        $results->bindParam('?e', $utilisateur::getMotDePasse());
        $results->bindParam('?f', $utilisateur::getUrlPhoto());
        $results->execute();

    }

}

