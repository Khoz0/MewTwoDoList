<?php


namespace App\Controllers;


class LoginController extends Controller
{
    public function login()
    {
        if (!isset($_SESSION["user"])) {
            return $this->render('login');
        } else {
            header('Location: ./?page=accueil');
            exit();
        }
    }

    public function onLogin()
    {
        echo "test";
    }
}