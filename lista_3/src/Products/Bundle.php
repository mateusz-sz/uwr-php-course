<?php

namespace Products;
use Money\Money;
use Products\IProduct;

class Bundle
{
    private $name;
    private $price;
    private $products;
    private $count;

    /**
     * Bundle constructor.
     * @param $name
     */
    public function __construct(string $name, array $products) {
        $this->name = $name;
        $this->products = $products;
    }

    /**
     * @return mixed
     */
    public function getPrice(): Money {
        $this->price = Money::PLN(0);
        return $this->price;
    }

    public function addProduct(Product $newProduct) {
        $this->products[$this->count] = $newProduct;
        $this->count++;
    }


}