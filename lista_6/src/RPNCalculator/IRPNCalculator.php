<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 4/13/18
 * Time: 8:33 AM
 */

namespace RPNCalculator;


interface IRPNCalculator
{
    public function compute(string $expression): int;
}