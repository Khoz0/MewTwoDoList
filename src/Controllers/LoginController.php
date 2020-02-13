<?php


namespace App\Controllers;


class LoginController extends Controller
{
    public function login()
    {
        return $this->render('login');
    }

    public function onLogin()
    {
        echo "test";
    }
}