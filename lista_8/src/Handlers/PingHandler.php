<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 5/23/18
 * Time: 7:24 PM
 */

namespace Handlers;
use Command\PingCommand;

class PingHandler
{
    public function __invoke(PingCommand $command)
    {
        echo 'PING!' . PHP_EOL;
    }
}