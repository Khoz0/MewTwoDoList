<?php

namespace App\Classe;

use App\Classe\Liste;

use App\Modeles\DB;
class Utilisateur
{
    private $nom;
    private $prenom;
    private $pseudo;
    private $mail;
    private $motDePasse;
    private $photo;
    private $listesProprietaire = array();
    private $tabNotification = array();

    function __construct($nom, $prenom, $pseudo, $mail, $motDePasse, $urlPhoto)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->pseudo = $pseudo;
        $this->mail = $mail;
        $this->motDePasse = $motDePasse;
        $this->photo = $urlPhoto;
        $this->listesProprietaire = array();
    }

    /**
     * @return array
     */
    public function getListesProprietaire()
    {
        return $this->listesProprietaire;
    }

    /**
     * @param array $listesProprietaire
     */
    public function setListesProprietaire(array $listesProprietaire)
    {
        $this->listesProprietaire = $listesProprietaire;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getMotDePasse()
    {
        return $this->motDePasse;
    }

    /**
     * @param mixed $motDePasse
     */
    public function setMotDePasse($motDePasse)
    {
        $this->motDePasse = $motDePasse;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }



    public function ajouterListe($liste)
    {
        $this->listesProprietaire[$liste->getIdListe()] = $liste;
    }

    public function supprimer() {
        $bdd = DB::getInstance();
        //On supprime toutes les listes desquelles il est propriétaire
        unset($this->listesProprietaire);

        //On le retire des listes desquelles il est membre
        $listesTotal = $bdd->recupererListesMembres($this->mail);
        foreach ($listesTotal as $liste) {
            $liste->supprimerMembre($this->mail);
        }
    }

    public function supprimerListe($id)
    {
        unset($this->listesProprietaire[$id]);
    }

    public function recupererListe($id)
    {
        return $this->listesProprietaire[$id-1];
    }

    public function quitterListe($liste)
    {

    }

    public function inviterUtilisateur($liste, $utilisateurs)
    {

    }

    public function notifier($notification)
    {
        array_push($this->tabNotification, $notification);
    }

    /**
     * @return array
     */
    public function getTabNotification()
    {
        return $this->tabNotification;
    }

    public function sauvegarderBDD()
    {

    }

    public function supprimerBDD()
    {

    }


}
