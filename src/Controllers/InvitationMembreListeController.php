
<?php


namespace App\Controllers;

class InvitationMembreListeController extends Controller
{

public function memberInvitation($mailsrc,$maildest,$idliste)

    $bdd = DB::getInstance()->getPDO();
    $requete = $bdd->prepare("SELECT * FROM utilisateur where mail = :maildest");
    $results->bindParam(':maildest', $maildest);
    $requete->execute();

    $lien = "";

    if($donnees = $results->fetch()){
        // L'utilisateur possede un compte 
        $utilisateur = DB::getInstance()->loadListe($mailsrc);
        $pseudosrc = $utilisateur->getPseudo()


        <?php
		     $to      = $maildest;
		     $subject = 'Invitation de ' + $speudo + "à rejoindre une Liste";
		     $message = 'Bonjour !'."\n".$lien;
		     $headers = 'From : '$mailsrc . "\r\n" .
		     'Reply-To:'.$mailsrc. "\r\n" .
		     'X-Mailer: PHP/' . phpversion();

		     mail($to, $subject, $message, $headers);
		 ?>

    }else{
    	// L'utilisateur ne possede pas de compte
    	// renvoyer une erreur 
    }


}