<?php

namespace Products;
use Money\Money;
//use Money\Currency;

class Product
{
    private $id;
    private $name;
    private $price;

    /**
     * Product constructor.
     * @param int $id
     * @param string $name
     * @param Money $price
     */
public function __construct(int $id, string $name, int $price) {
    $this->id = $id;
    $this->name = $name;
    $this->price = $price;
}

/**
 * @return mixed
 */
public function getId()
{
    return $this->id;
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