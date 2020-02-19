<?php
namespace Tests\Controllers;

use App\Controllers\AccueilController;
use PHPUnit\Framework\TestCase;

/**
 * Tests AccueilController
 */
class AccueilControllerTest extends TestCase {
    public function testIndex() {}

    /**
     * Fonction qui test si un utilisateur est bien sauvegardé si les bonnes informations sont rentrées
     * @return [type] [description]
     */
    public function testAjouterUtilisateurValide() {}

    /**
     * Fonction qui test si les erreurs sont bien captées si les informations sont mal rentées
     * (Faire plusieurs tests si besoin)
     * @return [type] [description]
     */
    public function testAjouterUtilisateurPasValide() {}

    /**
     * Fonction qui test si les informations de la personne connectée
     * sont bien prises
     * @return [type] [description]
     */
    public function testGetUtilisateurConnecte() {}
}
