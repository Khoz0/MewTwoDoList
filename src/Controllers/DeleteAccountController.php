<?php

namespace App\Controllers;

use App\Modeles\DB;
class DeleteAccountController extends Controller
{
    public function deleteAccount()
    {
        if(isset($_SESSION['user'])) {
            DB::getInstance()->deleteUser(unserialize($_SESSION['user'])->getMail());
            unset($_SESSION['user']);
        }
        return $this->render('login');

    }
}