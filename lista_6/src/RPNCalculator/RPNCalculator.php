<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 4/13/18
 * Time: 5:15 AM
 */

namespace RPNCalculator;
use Stack\Stack;
use arithFunctions\arithAdd;
use arithFunctions\arithSubstract;
use arithFunctions\arithMultiply;
use arithFunctions\arithDivide;

class RPNCalculator implements IRPNCalculator
{
    public $stack;
    public $explodedExpression;


    public function __construct()
    {
        $this->stack = new Stack();
        $this->explodedExpression = 0;
    }


    public function compute(string $expression): int
    {
        $this->explodedExpression = explode(" ", $expression);
        foreach($this->explodedExpression as $item) {

            if(is_numeric($item)) {
                $this->stack->push(intval($item));
            }
            else {
                $args[0] = $this->stack->pop();
                $args[1] = $this->stack->pop();

                switch($item) {
                    case "+":
                        $add = new arithAdd($args);
                        $result = $add->calculate();
                        $this->stack->push($result);
                        break;
                    case "-":
                        $sub = new arithSubstract($args);
                        $result = $sub->calculate();
                        $this->stack->push($result);
                        break;
                    case "*":
                        $mul = new arithMultiply($args);
                        $result = $mul->calculate();
                        $this->stack->push($result);
                        break;
                    case "/":
                        $div = new arithDivide($args);
                        $result = $div->calculate();
                        $this->stack->push($result);
                        break;
                }
            }
        }
        $finalResult = $this->stack->pop();
        return $finalResult;
    }
}