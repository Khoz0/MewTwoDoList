<?php


namespace App\Controllers;


use App\Modeles\DB;

class AddUserController extends Controller
{

    public function addUser()
    {
        (new InscriptionController)->ajouterUtilisateur();
        if (isset($_SESSION["error_syntx"]) || isset($_SESSION["error_exist"])) {
            return $this->render('inscription');
        } else {
            return $this->render('login');
        }

    }
}