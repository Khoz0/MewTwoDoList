<?php

namespace App\Controllers;

use App\Classes\Flash;

abstract class Controller {

	/**
	 * Rend une vue en HTML
	 * @param  string Le nom de la vue à charger
	 * @param  array Un tableau qui contient les variables
	 * Ex:
	 * ['le_nom_de_ma_variable' => 'Le contenu de ma variable']
	 */
	protected function render(string $vue, array $variables = []): void {

		// Variables des vues ici
		$titre = 'MewTwoDoList';
		extract($variables);

		// On recupere le contenu
		ob_start();
		require("../src/Vues/pages/$vue.php");
		$contenu = ob_get_clean();

		// On rend le layout
		require('../src/Vues/app.php');
	}

	public function redirect($lien) {

		return header("Location: ?page=$lien");
		die;
	}

}
