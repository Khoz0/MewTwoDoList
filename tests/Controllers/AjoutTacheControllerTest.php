<?php
namespace Tests\Controllers;

use App\Controllers\AjoutTacheController;
use PHPUnit\Framework\TestCase;

/**
 * Tests AjoutTacheControllerTest
 */
class AjoutTacheControllerTest extends TestCase {

     //Test si la liste a bien été ajouté à la bdd
    public function testajouterTache() {

        //Compte le nb de lignes avant l'insertion
        $nblignes = $this->getConnection()->getRowCount('idTache')

        //On réalise l'insertion

        //Compte le nombre de lignes après l'insertion
        $this->assertSame($nblignes , $this->getConnection()->getRowCount('idTache'), "Inserting failed");
    }
}