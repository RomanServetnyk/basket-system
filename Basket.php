<?php

class Basket {
    private $catalogue;
    private $deliveryRules;
    private $offers;
    private $basketItems = [];

    public function __construct($catalogue, $deliveryRules, $offers) {
        $this->catalogue = $catalogue;
        $this->deliveryRules = $deliveryRules;
        $this->offers = $offers;
    }

    public function add($productCode) {
        if (isset($this->catalogue[$productCode])) {
            $this->basketItems[] = $productCode;
        } else {
            throw new Exception("Product code {$productCode} not found in catalogue.");
        }
    }

    public function total() {
        $subtotal = 0;
        $redWidgetCount = 0;
    
        // Calculate subtotal
        foreach ($this->basketItems as $item) {
            $subtotal = bcadd($subtotal, $this->catalogue[$item]['price'], 2); // Use bcadd for precision
            if ($item === 'R01') {
                $redWidgetCount++;
            }
        }
    
        // Apply special offers
        if (isset($this->offers['R01'])) {
            $offer = $this->offers['R01'];
            if ($redWidgetCount > 1) {
                $offerCount = intdiv($redWidgetCount, 2);
                $subtotal = bcsub($subtotal, bcmul($offerCount, $this->catalogue['R01']['price'] * $offer['discount'], 2), 2);
            }
        }
    
        // Apply delivery charges
        $deliveryCharge = 0;
        foreach ($this->deliveryRules as $rule) {
            if ($subtotal < $rule['threshold']) {
                $deliveryCharge = $rule['charge'];
                break;
            }
        }
    
        // Total cost
        $total = bcadd($subtotal, $deliveryCharge, 2);
        return number_format($total, 2);
    }    
}
