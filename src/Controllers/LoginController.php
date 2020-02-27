<?php


namespace App\Controllers;

class LoginController extends Controller
{
    public function login()
    {
        $err = "";
        if (!isset($_SESSION["user"])) {
            if (isset($_SESSION["error"])) {
                $err = unserialize($_SESSION["error"]);
                session_destroy();
                return $this->render('login', compact("err"));
            }
            return $this->render('login', compact("err"));
        } else {
            header('Location: ./?page=accueil');
            exit();
        }
    }
}