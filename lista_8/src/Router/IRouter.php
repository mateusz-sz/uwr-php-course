<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 5/23/18
 * Time: 7:29 PM
 */

namespace Router;
use Command\Command;

interface IRouter
{
    public function commandToHandler(Command $command);
}