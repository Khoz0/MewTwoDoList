<?php
namespace App\Controllers;

class InvitationMembreListeController extends Controller{

    public function memberInvitation($mailsrc,$maildest,$idliste)
    {

        $bdd = DB::getInstance()->getPDO();
        $requete = $bdd->prepare("SELECT * FROM utilisateur where mail = :maildest");
        $requete->bindParam(':maildest', $maildest);
        $requete->execute();

        $lien = "";

        if ($donnees = $requete->fetch()) {
            // L'utilisateur possede un compte
            $utilisateur = DB::getInstance()->loadListe($mailsrc);
            $pseudosrc = $utilisateur->getPseudo();

                 $to = $maildest;
                 $subject = 'Invitation de ' . $pseudosrc . "à rejoindre une Liste";
                 $message = 'Bonjour !' . "\n" . $lien;
                 $headers = 'From : '.$mailsrc . "\r\n" .
            'Reply-To:' . $mailsrc . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

                 mail($to, $subject, $message, $headers);

        } else {
            // L'utilisateur ne possede pas de compte
            // renvoyer une erreur
        }
}


}