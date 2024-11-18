# basket-system

## Overview
This project is a proof of concept for a basket system for Acme Widget Co. It calculates the total price of a basket based on product prices, delivery rules, and special offers.

## Files
* ```Basket.php```: Implements the main basket logic.
* ```Product.php```: Provides product catalogue, delivery rules, and special offers.
* ```test.php```: Contains test cases to verify the implementation.

## Assumptions
1. Delivery rules apply to the subtotal after applying offers.
2. The "buy one get the second half price" offer applies only to **Red Widgets (R01)** and discounts every second item.
3. PHP ```intdiv``` is used to handle pairs for "buy one get the second half price."

## How to Run
1. Make sure PHP is installed on your system.
2. Save the files in the same directory.
3. Run the test script
```bash
php test.php
```
## Extensibility
* New products can be added to the catalogue in ```Product.php```.
* Delivery rules can be updated or reordered in ```Product.php```.
* Additional offers can be added with new logic in ```Basket.php```.

## Expected Output
Now running ```php test.php``` should give the following output:
```
Products: B01, G01 | Total: $37.85 | Expected: $37.85
Products: R01, R01 | Total: $54.38 | Expected: $54.38
Products: R01, G01 | Total: $60.85 | Expected: $60.85
Products: B01, B01, R01, R01, R01 | Total: $98.28 | Expected: $98.28
```