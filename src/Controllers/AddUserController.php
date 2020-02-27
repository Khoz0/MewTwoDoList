<?php


namespace App\Controllers;

class AddUserController extends Controller
{

    public function addUser()
    {
        (new InscriptionController)->ajouterUtilisateur();
        if (isset($_SESSION["error_syntx"]) || isset($_SESSION["error_exist"])) {

            return $this->render('inscription');
        } else {

            header('Location: ./?page=login');
            exit();
        }

    }
}