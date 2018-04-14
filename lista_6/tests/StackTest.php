<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 4/13/18
 * Time: 10:53 PM
 */

use PHPUnit\Framework\TestCase;
use Stack\Stack;

class StackTest extends TestCase
{
    /**
     * @test
     */
    public function testPushandPop() {
        $testStack = new Stack();

        $testStack->push(2);
        $testStack->push(5);
        $this->assertEquals(2, $testStack->getWhich());
        $this->assertEquals(5, $testStack->pop());
        $this->assertEquals(2, $testStack->pop());
        $this->expectException(InvalidArgumentException::class);
        $testStack->pop();
    }

    /**
     * @test
     */
    public function testStackSize() {
        $testStack = new Stack();
        $this->assertEquals(-1, $testStack->getWhich());

        $testStack->push(1);
        $testStack->push(2);
        $testStack->push(3);

        $this->assertEquals(3, $testStack->getWhich()+1);
    }

    /**
     * @test
     */
    public function testIsEmpty() {
        $testStack = new Stack();
        $this->assertEquals(true, $testStack->IsEmpty());

        $testStack->push(42);
        $this->assertEquals(false, $testStack->IsEmpty());
    }
}