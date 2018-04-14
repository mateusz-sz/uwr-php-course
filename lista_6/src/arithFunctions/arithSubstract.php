<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 4/13/18
 * Time: 9:29 AM
 */

namespace arithFunctions;

class arithSubstract implements IarithFunctions
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
     * @param $args
     * @return int
     */
    public function calculate(): int
    {
        $result = $this->args[1] - $this->args[0];
        return $result;
    }
}