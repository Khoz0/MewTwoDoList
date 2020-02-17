<?php

namespace App\Classe;

class Utilisateur
{
    private $nomUtilisateur;
    private $prenom;
    private $pseudo;
    private $mail;
    private $motDePasse;
    private $urlPhoto;

    function __construct($nomUtilisateur, $prenom, $pseudo, $mail, $motDePasse, $urlPhoto)
    {
        $this->$nomUtilisateur = $nomUtilisateur;
        $this->$prenom = $prenom;
        $this->$pseudo = $pseudo;
        $this->$mail = $mail;
        $this->$motDePasse = $motDePasse;
        $this->$urlPhoto = $urlPhoto;
    }

    /**
     * @return mixed
     */
    public function getNomUtilisateur()
    {
        return $this->nomUtilisateur;
    }

    /**
     * @param mixed $nomUtilisateur
     */
    public function setNomUtilisateur($nomUtilisateur)
    {
        $this->nomUtilisateur = $nomUtilisateur;
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



    public function creerListe($nom, $prenom, $pseudo, $mail, $motDePasse)
    {

    }

    public function supprimerListe($nom, $dateDebut, $dateFin)
    {

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
