<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 3/22/18
 * Time: 11:59 PM
 */

namespace Products;

use Money\Money;

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
    public function __construct(int $id, string $name, Money $price) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPrice(): Money {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


}
