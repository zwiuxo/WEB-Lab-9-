<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../code/TaxiOrder.php';

class TaxiOrderTest extends TestCase {
    
    private $taxi;

    protected function setUp(): void {
        $this->taxi = new TaxiOrder();
    }

    public function testValidateName() {
        $result = $this->taxi->validateName("Vlad");
        $this->assertEquals("Order for Vlad created", $result);
    }

    public function testPriceCalculation() {
        $price = $this->taxi->getPrice(2, "Бизнес");
        $this->assertEquals(1000, $price);
    }

    public function testWithMock() {
        $pdoMock = $this->createMock(PDO::class);
        $order = new TaxiOrder($pdoMock);
        
        $this->assertNotNull($order);
    }
}
