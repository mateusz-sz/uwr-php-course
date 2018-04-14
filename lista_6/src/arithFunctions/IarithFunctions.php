<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 4/13/18
 * Time: 9:14 AM
 */

namespace arithFunctions;

interface IarithFunctions
{
    /**
     * @param $operator
     * @param $args
     * @return mixed
     */
    public function calculate();
}