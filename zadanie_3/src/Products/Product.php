<?php

namespace Products;
use Money\Money;

class Product
{
    private $name;
    private $price;

/**
* Product constructor.
* @param $name
* @param $price
*/
public function __construct(string $name, Money $price) {
    $this->name = $name;
    $this->price = $price;
}

/**
* @return mixed
*/
public function getName() {
    return $this->name;
}

/**
* @return mixed
*/
public function getPrice(): Money {
    return $this->price;
}

}