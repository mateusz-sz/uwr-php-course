<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 4/13/18
 * Time: 9:35 AM
 */

namespace arithFunctions;

class arithMultiply implements IarithFunctions
{
    private $args;

    /**
     * arithDivide constructor.
     * @param $args
     */
    public function __construct($args)
    {
        $this->args = $args;
    }

    public function calculate()
    {
        $result = $this->args[0] * $this->args[1];
        return $result;
    }
}