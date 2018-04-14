<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 4/13/18
 * Time: 9:22 AM
 */

namespace arithFunctions;

class arithAdd implements IarithFunctions
{
    private $args;

    /**
     * arithAdd constructor.
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
        $result = 0;
        foreach($this->args as $item) {
            $result += $item;
        }
        return $result;
    }
}