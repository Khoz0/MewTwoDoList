<?php

namespace App\Classe;

use App\Classe\Liste;

class Utilisateur
{
    private $nom;
    private $prenom;
    private $pseudo;
    private $mail;
    private $motDePasse;
    private $urlPhoto;
    private $listesProprietaire = array();

    function __construct($nom, $prenom, $pseudo, $mail, $motDePasse, $urlPhoto)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->pseudo = $pseudo;
        $this->mail = $mail;
        $this->motDePasse = $motDePasse;
        $this->urlPhoto = $urlPhoto;
    }

    /**
     * @return array
     */
    public function getListesProprietaire(): array
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
    public function getUrlPhoto()
    {
        return $this->urlPhoto;
    }

    /**
     * @param mixed $urlPhoto
     */
    public function setUrlPhoto($urlPhoto)
    {
        $this->urlPhoto = $urlPhoto;
    }



    public function ajouterListe($liste)
    {
        $this->listesProprietaire[$liste->getIdListe()] = $liste;
    }


    public function supprimerListe($id)
    {
        unset($this->listesProprietaire[$id]);
    }

    public function recupererListe($id): Liste
    {
        return $this->listesProprietaire[$id];
    }

    public function quitterListe($liste)
    {

    }

    public function inviterUtilisateur($liste, $utilisateurs)
    {

    }

    public function notifier($notification)
    {

    }

    public function sauvegarderBDD()
    {

    }

    public function supprimerBDD()
    {

    }


}
