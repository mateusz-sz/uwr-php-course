<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 4/12/18
 * Time: 5:56 PM
 */

namespace Stack;

class Stack implements IStack
{
    private $elements;
    /**
     * @var int
     */
    private $which;

    /**
     * stack constructor.
     */
    public function __construct()
    {
        $this->which = -1;
    }

    /**
     * @return mixed
     */
    public function getElements()
    {
        return $this->elements;
    }

    /**
     * @return int
     */
    public function getWhich(): int
    {
        return $this->which;
    }



    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        if($this->which < 0) {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * @param $element
     */
    public function push($element)
    {
        $this->which++;
        $this->elements[$this->which] = $element;
    }


    /**
     * @return mixed
     * @throws Exception
     */
    public function pop()
    {
        if(!$this->isEmpty()) {
            $returnedElement = $this->elements[$this->which];
            $this->elements[$this->which] = '(empty)';
            $this->which--;
            return $returnedElement;
        }
        else {
            throw new Exception("Unable to pop element from an empty stack!\n");
        }
    }
}