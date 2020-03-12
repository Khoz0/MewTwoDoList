<?php

namespace App\Controllers;

use App\Modeles\DB;

class DeleteTacheController extends Controller {

	public function deleteTache() {
		$idTache = $_GET['idTache'];

		// Faire autorisation TODO

		$results = DB::getInstance()->getPDO()->prepare('DELETE FROM Tache WHERE idTache = :id');
		$results->bindParam(':id', $idTache);
		$results->execute();

		$this->redirect('liste');
	}

}
