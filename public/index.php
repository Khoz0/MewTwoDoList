<?php

require '../vendor/autoload.php';

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);


session_start();
require('../src/routes.php');
