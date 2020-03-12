<?php

namespace App\Controllers;

class DeleteTacheController extends Controller {

	public function deleteTache($idTache) {
		$results = DB::getInstance()->getPDO()->prepare('DELETE FROM Tache WHERE idTache = :id ');
       $results->bindParam(':id', $idTache);
	   $results->execute();
	}

}
