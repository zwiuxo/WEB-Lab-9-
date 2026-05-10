<?php
class TaxiOrder {
    private $pdo;

    public function __construct($pdo = null) {
        $this->pdo = $pdo;
    }

    public function validateName($name) {
        if (empty($name)) return false;
        return "Order for $name created";
    }

    public function getPrice($passengers, $tariff) {
        $base = 100;
        if ($tariff == "Бизнес") $base = 500;
        return $base * $passengers;
    }
}
