<?php

namespace Products;
use Money\Money;

/**
 * Created by PhpStorm.
 * User: m
 * Date: 3/16/18
 * Time: 9:08 AM
 */

class Discounted
{
    private $name;
    private $price;
    private $discount;

    /**
     * Discounted constructor.
     */
    public function __construct(string $name, Money $price, int $discount) {
        $this->name = $name;
        $this->price = $price;
        $this->discount = $discount;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @return Money
     */
    public function getPrice(): Money {
        $discountedPrice = $this->price;
        $discountedPrice = $discountedPrice->multiply(1-($this->discount/100));
        return $discountedPrice;
    }

    /**
     * @return float
     */
    public function getDiscount(): int {
        return $this->discount;
    }
}
