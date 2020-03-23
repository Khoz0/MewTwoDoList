<?php


namespace App\Controllers;
use App\Modeles\DB;


class RecuperationCompte extends Controller
{

    public function recuperationCompte()
    {

        $err = "";
        if(isset($_POST['submit'])){
                if(isset($_POST['mail'])){
                    $user = DB::getInstance()->loadUtilisateur($_POST['mail']);

                    ini_set("sendmail_from","mewtwodolist@gmail.com");
                    $to      = $user->getMail();
                    $subject = 'Récupération de Compte - MewTwoDoList';

                    $message = "Bonjour ".$user->getPseudo()." !\n\nUne demande de nouveau mot de passe à été éffectuée sur votre compte, un nouveau mot de passe à été généré, pour vous connecter, utilisez ce mot de passe:\n\nAttention, nous vous conseillons vivement de modifier votre mot de passe lors de vos nouvelles connexions ! Bonne continuation sur MewTwoDoList !\n\nL'équipe de MewTwoDoList";
                    $headers = 'From: mewtwodolist@gmail.com' . "\r\n" .
                        'Reply-To: mewtwodolist@gmail.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

                    mail($to, $subject, $message, $headers);
                }else{
                if(isset($_POST['pseudo'])){

                }else{

                    $err = "Veuillez remplire un des deux champs indiqués !";
                }
            }
        }


        return $this->render('recuperationCompte',compact("err"));
    }



}