<?php

namespace App\Controllers;

use App\Controllers\Controller;

class AccueilController extends Controller {

	public function index() {
		$helloWorld = "Hello world";

		return $this->render('accueil', compact('helloWorld'));
	}

}
