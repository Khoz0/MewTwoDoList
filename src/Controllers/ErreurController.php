<?php

namespace App\Controllers;

use App\Controllers\Controller;

class ErreurController extends Controller {

	public function _404() {
		return $this->render('404');
	}

}
