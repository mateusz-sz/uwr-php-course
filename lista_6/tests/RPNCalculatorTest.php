<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 4/13/18
 * Time: 10:48 PM
 */

use PHPUnit\Framework\TestCase;
use RPNCalculator\RPNCalculator;

class RPNCalculatorTest extends TestCase
{
    /**
     * @test
     */
    public function testRPNCalculatorCompute() {
        $testCalculator = new RPNCalculator();

        $this->assertEquals(35, $testCalculator->compute("2 3 + 5 * 10 +"));
    }
}