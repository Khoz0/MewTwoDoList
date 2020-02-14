<?php


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
        this . $nomUtilisateur = $nomUtilisateur;
        this . $prenom = $prenom;
        this . $pseudo = $pseudo;
        this . $mail = $mail;
        this . $motDePasse = $motDePasse;
        this . $urlPhoto = $urlPhoto;
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

    public function chargerBDD($mail)
    {

    }
}
