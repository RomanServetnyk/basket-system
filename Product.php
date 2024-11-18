<?php

class Product {
    public static function getCatalogue() {
        return [
            'R01' => ['name' => 'Red widget', 'price' => 32.95],
            'G01' => ['name' => 'Green widget', 'price' => 24.95],
            'B01' => ['name' => 'Blue widget', 'price' => 7.95],
        ];
    }

    public static function getDeliveryRules() {
        return [
            ['threshold' => 50, 'charge' => 4.95],
            ['threshold' => 90, 'charge' => 2.95],
            ['threshold' => PHP_INT_MAX, 'charge' => 0],
        ];
    }

    public static function getOffers() {
        return [
            'R01' => ['type' => 'buy_one_get_half', 'discount' => 0.5], // 50% off the second
        ];
    }
}
