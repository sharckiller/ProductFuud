<?php
namespace App\Tests\Entity;

use App\Entity\CompteBancaire;
use PHPUnit\Framework\TestCase;

class CompteBancaireTest extends TestCase {
    public function testInvalid() {
        $p = new CompteBancaire("user1", 50);
        $this->expectException("Exception");
        $p->retirer(100);
    }

    public function testRetirer() {
        $solde = new CompteBancaire("user1", 50);
        $this->assertSame(0.0, $solde->retirer(50));
    }

    /**
     * @dataProvider retraitScenarios
     */
    public function testRetirerMultipleCases($initialBalance, $withdrawAmount, $expectedBalance) {
        $compte = new CompteBancaire("user1", $initialBalance);
        $this->assertSame($expectedBalance, $compte->retirer($withdrawAmount));
    }

    public function retraitScenarios() {
        return [
            [100, 50, 50.0],
            [200, 100, 100.0],
            [50, 50, 0.0],
        ];
    }
}
