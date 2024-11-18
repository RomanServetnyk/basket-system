<?php

require_once 'Basket.php';
require_once 'Product.php';

// Setup - Initialize data
$catalogue = Product::getCatalogue();
$deliveryRules = Product::getDeliveryRules();
$offers = Product::getOffers();

// Create a new instance of Basket
$basket = new Basket($catalogue, $deliveryRules, $offers);

// Test cases
function testBasket($items, $expectedTotal) {
    global $catalogue, $deliveryRules, $offers; // Ensure these variables are accessible
    $basket = new Basket($catalogue, $deliveryRules, $offers); // Create a new basket for each test
    foreach ($items as $item) {
        $basket->add($item);
    }
    $total = $basket->total();
    echo "Products: " . implode(", ", $items) . " | Total: $" . $total . " | Expected: $" . $expectedTotal . "\n";
}

// Test scenarios
testBasket(['B01', 'G01'], '37.85');
testBasket(['R01', 'R01'], '54.38');
testBasket(['R01', 'G01'], '60.85');
testBasket(['B01', 'B01', 'R01', 'R01', 'R01'], '98.28');
