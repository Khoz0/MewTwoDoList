<?php


namespace App\Controllers;


class SessionDestroyController extends Controller
{
    public function sessionDestroy()
    {
        session_destroy();
        header('Location: ./?page=login');
        exit();
    }
}