<?php
namespace Tests\Controllers;

use App\Controllers\AddUserController;
use PHPUnit\Framework\TestCase;

/**
 * Tests AddUserControllerTest
 */
class AddUserControllerTest extends TestCase {

	//Test si l'utilisateur a bien été ajouté
    public function testaddUser() {

        //Compte le nb de lignes avant l'insertion
        $nblignes = $this->getConnection()->getRowCount('mail')

        //On réalise l'insertion

        //Compte le nombre de lignes après l'insertion
        $this->assertSame($nblignes , $this->getConnection()->getRowCount('mail'), "Inserting failed");
    	
    }


}