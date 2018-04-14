<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 4/13/18
 * Time: 8:24 AM
 */

namespace Stack;


interface IStack
{
    public function isEmpty(): bool;
    public function push($element);
    public function pop();
}