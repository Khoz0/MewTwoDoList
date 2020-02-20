<?php
namespace Tests\Controllers;

use App\Controllers\CreationListeController;
use PHPUnit\Framework\TestCase;

/**
 * Tests CreationListeController
 */
class CreationListeControllerTest extends TestCase {

	//Test si la liste a bien été créé
    public function testcreationListe($creationListe) {

    	$this->empty($creationListe);

        return $creationListe
    }

    //Test si la liste a bien été ajouté à la bdd
    public function testajoutListe() {

    	//Compte le nb de lignes avant l'insertion
    	$nblignes = $this->getConnection()->getRowCount('idListe')

    	//On réalise l'insertion

    	//Compte le nombre de lignes après l'insertion
        $this->assertSame($nblignes , $this->getConnection()->getRowCount('idListe'), "Inserting failed");
    }

}