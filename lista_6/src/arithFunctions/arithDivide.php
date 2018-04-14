<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 4/13/18
 * Time: 9:36 AM
 */

namespace arithFunctions;


class arithDivide implements IarithFunctions
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


    /**
     * @return float|int|mixed
     */
    public function calculate()
    {
        $result = $this->args[1] / $this->args[0];
        return $result;
    }
}