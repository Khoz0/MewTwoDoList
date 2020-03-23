<?php
namespace App\Modeles;

require_once('../src/Modeles/DB.php');


if (isset($_POST['id'])) {

  $notif = json_decode($_POST['id']);
  foreach ($notif as $value) {
    DB::getInstance()->deleteNotif($value);
  }
}


 ?>
