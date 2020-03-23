<?php


namespace App\Controllers;
use App\Modeles\DB;
use App\PHPMAILER\PHPMailer;

class RecuperationCompte extends Controller
{
    public function sendMail($user){
        $mail = new PHPmailer();

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';//SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'mewtwodolist@gmail.com';
        $mail->Password = 'Coucou54';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('mewtwodolist@gmail.com', 'MewTwoDoList - Support');
        $mail->addAddress($user->getMail());




        $mail->Subject  = 'Recuperation de Compte - MewTwoDoList';

        $mail->isHTML(true);
        $str = $user->getMail();

        $password = $this->generatePass();

        $bdd = DB::getInstance();
        $bdd->updateUtilisateur($str, null, null, password_hash($password, PASSWORD_DEFAULT), null, null);



        $mail->Body  = "<html><head></head><body style=\"text-align: center\">
                    <h1>Bonjour $str !</h1>
                    <br>
                    <br>
                    <h3>
                    Une demande de nouveau mot de passe a été éffectuée sur votre compte, un nouveau mot de passe a été généré, pour vous connecter, utilisez ce mot de passe:
                     </h3>
                     <br>
                     <br>
                     <h4>
                     $password
                     </h4>
                  <br>
                  <br>
                        <h3>
                            Attention, nous vous conseillons vivement de modifier votre mot de passe lors de vos nouvelles connexions !
                             </h3>
                     <br>
                        <h3>
                            Bonne continuation sur MewTwoDoList !
                             </h3>
                     <br>
                     <br>
                       
                        <h3>L'équipe de MewTwoDoList
                    </h3>
                    
                    
                    </body></html>";

        $mail->addReplyTo('mewtwodolist@gmail.com','Support');

        if(!$mail->send()) {
            $err = 'Erreur, message non envoyé.';
        } else {
            $err = 'Le message a bien été envoyé !';
        }

        return $err;
    }

    public function recuperationCompte()
    {
        $err = "";
        if(isset($_POST['submit'])){
                if(isset($_POST['mail'])){



                    $user = DB::getInstance()->loadUtilisateur($_POST['mail']);

                    if(!$user==null)
                    $err = $this->sendMail($user);
                    else
                        $err = "Ce compte n'existe pas !";



                }else{
                if(isset($_POST['pseudo'])){

                    $user = DB::getInstance()->getUtilisateur($_POST['pseudo']);
                    if(!$user==null)
                    $err = $this->sendMail($user);
                    else
                        $err = "Ce compte n'existe pas !";
                }else{


                    $err = "Veuillez remplire un des deux champs indiqués !";
                }
            }
        }


        return $this->render('recuperationCompte',compact("err"));
    }

    function generatePass() {
        $charactersList = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ&(-_)=$!@%£+°[]#';

        $pass = '';
        for ($cpt = 0; $cpt < 8; $cpt++) {
            $pass .= $charactersList[rand(0, strlen($charactersList) - 1)];
        }
        return $pass;
    }

}