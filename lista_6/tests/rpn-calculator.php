<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 4/13/18
 * Time: 4:40 AM
 */


require_once __DIR__ . "/../vendor/autoload.php";
use RPNCalculator\RPNCalculator;

$expression = $argv[1];
$calculator = new RPNCalculator();

//echo "Wyrażenie w ONP: " . $expression . PHP_EOL;
echo $calculator->compute($expression) . PHP_EOL;