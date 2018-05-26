<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 3/15/18
 * Time: 5:35 PM
 */

namespace Products;
require "vendor/autoload.php";
use Money\Money;


$product1 = new Product("produkt1", Money::PLN(123));
$product2 = new Product("produkt2", Money::PLN(32));
$product3 = new Product("produkt3", Money::PLN(99));
$product4 = new Product("produkt4", Money::PLN(1323));

//discounted products
$dProduct1 = new Discounted("discounted1", Money::PLN(340), 10);
$dProduct2 = new Discounted("discounted2", Money::PLN(140), 10);
$dProduct3 = new Discounted("discounted3", Money::PLN(192), 100);

$productsAll = array($product1, $product2, $product3, $product4, $dProduct1, $dProduct2, $dProduct3);
$OwnBundle = new Bundle("Zestaw", $productsAll);

$totalPrice = $OwnBundle->getPrice();


foreach($productsAll as $product) {
    echo $product->getName()
        . "   cost: "
        . $product->getPrice()->getAmount()
        . " "
        . $product->getPrice()->getCurrency()
        . PHP_EOL;
    $totalPrice = $totalPrice->add($product->getPrice());
}

echo "Total price: " . $totalPrice->getAmount() . " " .  $totalPrice->getCurrency() . PHP_EOL;